<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Interview;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class InterviewFactory extends Factory
{
    protected $model = Interview::class;
    
    public function definition(): array
    {
        $statuses = [
            'open', 'rejected', 'passed',
        ];
        
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'status' => $this->faker->randomElement($statuses),
            'employee_id' => null,
            'position_id' => fn() => Position::inRandomOrder()->first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
    
    public function status($status): Factory
    {
        return $this->state(function (array $attributes) use ($status) {
            return [
                'status' => $status,
            ];
        });
    }
}
