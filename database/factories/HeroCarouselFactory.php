<?php

namespace Database\Factories;

use App\Models\HeroCarousel;
use App\Models\AngkatanBem;
use Illuminate\Database\Eloquent\Factories\Factory;

class HeroCarouselFactory extends Factory
{
    protected $model = HeroCarousel::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'subtitle' => $this->faker->sentence(),
            'image' => 'https://via.placeholder.com/1200x600?text=' . urlencode($this->faker->word()),
            'button_text' => $this->faker->word(),
            'button_link' => $this->faker->url(),
            'order' => $this->faker->numberBetween(0, 10),
            'is_active' => true,
            'angkatan_bem_id' => AngkatanBem::factory(),
            'overlay_opacity' => 0.4,
        ];
    }
}
