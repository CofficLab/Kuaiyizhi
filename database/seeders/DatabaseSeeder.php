<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        if (User::where('email', 'admin@qq.com')->count() == 0) {
            User::factory()->create([
                'name'     => 'Test User',
                'email'    => 'admin@qq.com',
                'password' => bcrypt("password"),
            ]);
        }

        $this->call(IdeaSeeder::class);
    }
}
