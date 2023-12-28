<?php

namespace Database\Factories;

use App\Models\HireOrder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class HireOrderFactory extends Factory
{
    protected $model = HireOrder::class;
    
    public function definition(): array
    {
        return [
            'salary' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
