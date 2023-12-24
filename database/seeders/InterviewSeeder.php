<?php

namespace Database\Seeders;

use App\Models\Interview;
use Illuminate\Database\Seeder;

class InterviewSeeder extends Seeder
{
    public function run(): void
    {
        Interview::factory(3)
            ->create();
    }
}
