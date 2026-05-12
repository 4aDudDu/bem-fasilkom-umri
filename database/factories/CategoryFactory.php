<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->word();

        return [
            'name' => ucfirst($name),
            'slug' => str()->slug($name),
            'description' => $this->faker->sentence(),
            'icon' => 'hero-' . $this->faker->randomElement(['newspaper', 'photo', 'calendar', 'chat-bubble']),
            'color' => $this->faker->hexColor(),
            'is_active' => true,
        ];
    }
}
