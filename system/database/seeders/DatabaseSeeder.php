<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        \App\Models\Admin::factory()->create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),

        ]);

        \App\Models\Bidang::factory()->create([
            'bidang_nama' => 'PAUD',

        ]);

         \App\Models\Bidang::factory()->create([
            'bidang_nama' => 'SD',

        ]);

          \App\Models\Bidang::factory()->create([
            'bidang_nama' => 'SMP',

        ]);
    }
}
