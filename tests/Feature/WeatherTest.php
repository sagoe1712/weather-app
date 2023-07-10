<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class WeatherTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testGetWeatherByGeo()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password')
        ]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertSuccessful();

        $token = $response->json('token');

        $response = $this->getJson('/api/weather/geo/-78.543/38.123', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertSuccessful();

    }

    public function testGetWeatherByCity()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password')
        ]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertSuccessful();

        $token = $response->json('token');

        $response = $this->getJson('/api/weather/city/uk/london', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertSuccessful();

    }
}
