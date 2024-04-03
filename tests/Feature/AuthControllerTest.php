<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase; // This trait will refresh the database after each test case

    /**
     * Test registering a user.
     *
     * @return void
     */
    public function test_register()
    {
        // Create dummy user data
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'myPassword12'
        ];

        // Simulate a POST request to the /register endpoint with the user data
        $response = $this->postJson(route('register'), $userData);

        // Assert that the response status code is 201 (Created)
        $response->assertStatus(201);

        // Assert that the response JSON contains the expected user data
        $response->assertJson(['user' => $userData]);

        // Assert that the user record is stored in the database
        $this->assertDatabaseHas('users', [
            'email' => $userData['email']
        ]);
    }
}
