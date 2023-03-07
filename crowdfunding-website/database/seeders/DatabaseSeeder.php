<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Role::factory(3)->create()->each(
            function ($role) {
                \App\Models\User::factory(5)->create([
                    'role_id' => $role->id,
                ]);
            }
        );
    }
}
