<?php

namespace Database\Factories;

use App\Models\Division;
use App\Models\AngkatanBem;
use Illuminate\Database\Eloquent\Factories\Factory;

class DivisionFactory extends Factory
{
    protected $model = Division::class;

    public function definition(): array
    {
        $names = ['Internal', 'External', 'Marketing', 'Acara', 'Sponsorship', 'Media', 'Kreatif'];
        $name = $this->faker->randomElement($names);

        return [
            'name' => $name,
            'slug' => str()->slug($name),
            'description' => $this->faker->sentence(),
            'icon' => 'hero-' . $this->faker->randomElement(['users', 'chart', 'cog']),
            'color' => $this->faker->hexColor(),
            'order' => $this->faker->numberBetween(0, 10),
            'angkatan_bem_id' => AngkatanBem::factory(),
        ];
    }
}
