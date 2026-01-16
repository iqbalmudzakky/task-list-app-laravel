<?php

namespace Database\Seeders;

use App\Models\Task;
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
      // Seed users
      User::factory(10)->create();
      User::factory(2)->unverified()->create(); // Create 2 custom method (unverified) users
      
      // Seed tasks
      Task::factory(20)->create();

      // User::factory()->create([
      //     'name' => 'Test User',
      //     'email' => 'test@example.com',
      // ]);
    }
}
