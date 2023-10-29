<?php

namespace App\Livewire\Pages;

use App\Models\Keys;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

class LiveKey extends Component
{

    public $input_type = "password";
    public $live_key = '';

    public $key_type = 'live';

    public $copied = false;

    public function __construct()
    {
        $this->fetch_live_key();
    }

    public function toggle_type()
    {
        $this->input_type = ($this->input_type === 'password') ? 'text' : 'password';
    }


    // fetch user live key
    public function fetch_live_key()
    {
        try {
            $user_id = User::first()->id; // fetches only the first user

            $fetch_key = Keys::where(['user_id' => $user_id, 'status' => true, 'type' => 'live'])->first();

            $this->live_key = $fetch_key->value;

        } catch (QueryException $e) {
            Log::error('Database error while fetching the API live key: ' . $e->getMessage());

            return redirect()->route('dashboard')->with('error', 'Database error.');
        } catch (\Exception $e) {
            Log::error('An unexpected error occurred: ' . $e->getMessage());

            return redirect()->route('dashboard')->with('error', 'An unexpected error occurred.');
        }
    }

    // create new live key
    public function create_live_key()
    {
        try {
            $key = bin2hex(random_bytes(32));

            $user_id = User::first()->id; // the first user after running the seeder

            // dd($this->deactivate_keys($user_id));

            $this->deactivate_keys($user_id); // deactivate all keys

            // dd("hello");

            $hashed_key = md5($key);

            $create_key = Keys::create([
                'user_id' => $user_id,
                'value' => $hashed_key,
                'type' => $this->key_type,
                'status' => true
            ]);

            if (!$create_key) {
                session()->flash('error', 'Sorry live key could not be generated.');

                return redirect()->route('dashboard')->with(['error' => 'Sorry live key could not be generated']);
            }

            $this->live_key = $hashed_key;

            return back()->with('success', 'Api live key generated successfully');
        } catch (QueryException $e) {
            Log::error('Database error while creating an API live key: ' . $e->getMessage());

            return redirect()->route('dashboard')->with('error', 'Database error.');
        } catch (\Exception $e) {
            Log::error('An unexpected error occurred: ' . $e->getMessage());
            return redirect()->route('dashboard')->with('error', 'An unexpected error occurred.');
        }
    }

    public function deactivate_keys($user_id)
    {
        try {

            Keys::where('user_id', $user_id)->update(['status' => false]);

            return true;
        } catch (QueryException $e) {
            Log::error('Database error while creating an API live key: ' . $e->getMessage());

            return redirect()->route('dashboard')->with('error', 'Database error.');
        } catch (\Exception $e) {
            Log::error('An unexpected error occurred: ' . $e->getMessage());
            return redirect()->route('dashboard')->with('error', 'An unexpected error occurred.');
        }
    }
    public function render()
    {
        return view('livewire.pages.live-key');
    }
}
