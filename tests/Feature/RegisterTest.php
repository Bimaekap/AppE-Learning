<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pengguna;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_register()
    {
        $data = Pengguna::factory()->create([
            'name' => 'bimaeka123',
            'password' => '12345678',
            'role' => 'admin',
            'created_at' => null,
            'updated_at' => null
        ]);

        $this->assertModelExists($data);      
      

    }

    public function test_login()
    
    {

        $response = $this->post('/login-index', [
            'name' => 'bimaeka123',
            'password' => '12345678',
            
        ]);
        // $response->assertRedirect(route('dashboard-admin'));
        $response->assertStatus(302);

    }
}
