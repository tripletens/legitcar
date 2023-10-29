<?php

namespace Tests\Feature;

use App\Livewire\Pages\TestKey;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TestKeyComponentTest extends TestCase
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
        Livewire::test(TestKey::class)
            ->assertViewIs('livewire.pages.test-key');
    }
}
