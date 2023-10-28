<?php

namespace App\Livewire\Pages;
use Illuminate\Support\Str;
use Livewire\Component;

class TestKey extends Component
{
    public $inputtype = "password";

    public function toggle_type(){
        $this->inputtype = ($this->inputtype === 'password') ? 'text' : 'password';
    }


    // fetch user test key


    // create new test key

    public function create_test_key(){
        $key = Str::random(40);

        $user_id 
    }

    // copy test key

    public function render()
    {
        return view('livewire.pages.test-key');
    }
}
