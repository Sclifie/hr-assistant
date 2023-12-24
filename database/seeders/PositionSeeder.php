<?php

namespace Database\Seeders;

use App\Enums\PositionNameEnum;
use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        foreach (PositionNameEnum::cases() as $position) {
            Position::create(['name' => $position->value]);
        }
    }
}
