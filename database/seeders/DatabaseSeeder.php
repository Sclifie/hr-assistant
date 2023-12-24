<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PositionSeeder::class,
            InterviewSeeder::class,
        ]);
        $first_user = new User([
            'name' => 'Gleb',
            'email' => 'sclifie@gmail.com',
            'password' => Hash::make('sclifie@gmail.com')
        ]);
        
        $first_user->save();
        
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
