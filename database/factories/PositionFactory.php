<?php

namespace Database\Factories;

use App\Enums\PositionNameEnum;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PositionFactory extends Factory
{
    protected $model = Position::class;
    
    public function definition(): array
    {
        $rand_key = array_rand(PositionNameEnum::cases(), 1);
        return [
            'name' => PositionNameEnum::cases()[$rand_key]->value,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
