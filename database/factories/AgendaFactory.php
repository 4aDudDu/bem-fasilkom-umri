<?php

namespace Database\Factories;

use App\Models\Agenda;
use App\Models\AngkatanBem;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgendaFactory extends Factory
{
    protected $model = Agenda::class;

    public function definition(): array
    {
        $title = $this->faker->sentence();
        $waktuMulai = $this->faker->dateTimeBetween('now', '+3 months');

        return [
            'title' => $title,
            'slug' => str()->slug($title),
            'description' => $this->faker->paragraph(),
            'poster' => 'https://via.placeholder.com/400x600?text=' . urlencode(substr($title, 0, 15)),
            'lokasi' => $this->faker->address(),
            'waktu_mulai' => $waktuMulai,
            'waktu_selesai' => \Carbon\Carbon::instance($waktuMulai)->addHours(2),
            'registrasi_link' => $this->faker->url(),
            'angkatan_bem_id' => AngkatanBem::factory(),
            'is_published' => true,
        ];
    }
}
