<?php

namespace Database\Factories;

use App\Models\Berita;
use App\Models\User;
use App\Models\Category;
use App\Models\AngkatanBem;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeritaFactory extends Factory
{
    protected $model = Berita::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(5);

        return [
            'title' => $title,
            'slug' => str()->slug($title),
            'thumbnail' => 'https://via.placeholder.com/600x400?text=' . urlencode(substr($title, 0, 20)),
            'description' => $this->faker->paragraph(3),
            'content' => $this->faker->paragraphs(10, true),
            'category_id' => Category::factory(),
            'author_id' => User::firstOrCreate(['email' => 'admin@bem.test'], ['name' => 'Admin BEM', 'password' => bcrypt('password')]),
            'angkatan_bem_id' => AngkatanBem::factory(),
            'published_at' => $this->faker->dateTimeThisYear(),
            'views' => $this->faker->numberBetween(0, 1000),
            'is_published' => true,
            'tags' => json_encode($this->faker->words(5)),
        ];
    }

    public function published()
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => true,
            'published_at' => now(),
        ]);
    }

    public function draft()
    {
        return $this->state(fn (array $attributes) => [
            'is_published' => false,
            'published_at' => null,
        ]);
    }
}
