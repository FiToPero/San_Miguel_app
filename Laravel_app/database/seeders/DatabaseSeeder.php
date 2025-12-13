<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Crear roles y permisos primero
        $this->call([
            \BezhanSalleh\FilamentShield\Database\Seeders\ShieldSeeder::class,
        ]);

        // Crear usuario admin
        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin1234'),
            'email_verified_at' => now(), 
        ]);

        // Asignar rol super_admin
        $admin->assignRole('super_admin');

        // Crear datos de prueba
        $this->call([
            CategorySeeder::class,
            SupplierSeeder::class,  
            ProductSeeder::class,
        ]);

    }
}
