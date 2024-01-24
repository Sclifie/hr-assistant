<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ImageFactory extends Factory
{
    protected $model = Image::class;
    
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'path' => $this->faker->image(storage_path('app/public/images/interview/1')),
            'volume' => null,
            'size' => '640x480',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
    
    public function configure()
    {
        return $this->afterCreating(function (Image $image){
            $image->volume = round((filesize($image->path) / 1024), 4);
            $image->saveQuietly();
        });
    }
}
