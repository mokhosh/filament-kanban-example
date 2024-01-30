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
        $users = \App\Models\User::factory(50)->create();

        \App\Models\User::factory()->create([
            'name' => 'Mo',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        \App\Models\Task::factory(30)
            ->recycle($users)
            ->create();
    }
}
