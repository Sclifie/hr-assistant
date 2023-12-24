<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Interview;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;
    
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'address' => $this->faker->word(),
            'email' => $this->faker->unique()->safeEmail(),
            'status' => $this->faker->randomElement(['open','passed','rejected']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
    
    public function fromInterview(Interview $interview)
    {
        return $this->state([
            'full_name' => $interview->full_name,
            'email' => $interview->email,
            'position' => $this->faker->jobTitle,
            'status' => $this->faker->randomElement(['open', 'passed', 'rejected']),
        ]);
    }
}
