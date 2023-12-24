<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Interview;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        Employee::factory(3)->create();
    }
}
