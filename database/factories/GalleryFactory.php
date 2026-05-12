<?php

namespace Database\Factories;

use App\Models\Gallery;
use App\Models\Category;
use App\Models\AngkatanBem;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(3);

        return [
            'title' => $title,
            'slug' => str()->slug($title),
            'image' => 'https://via.placeholder.com/600x600?text=' . urlencode(substr($title, 0, 15)),
            'description' => $this->faker->sentence(),
            'category_id' => Category::factory(),
            'angkatan_bem_id' => AngkatanBem::factory(),
            'order' => $this->faker->numberBetween(0, 100),
            'is_published' => true,
        ];
    }
}
