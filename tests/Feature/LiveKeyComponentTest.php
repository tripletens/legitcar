<?php

namespace Tests\Feature;

use App\Livewire\Pages\LiveKey;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;

class LiveKeyComponentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testRenderMethodReturnsView()
    {
        // Simulate an authenticated user if needed
        $user = User::factory()->create([
            'name' => 'test account',
            'email' => 'test@legitcar.com',
            'password' => bcrypt('password'),
        ]);
        // Your user data or factory;
        $this->actingAs($user);

        // Assert that the 'render' method returns the expected view
        Livewire::test(LiveKey::class)
            ->assertViewIs('livewire.pages.live-key');
    }
}
