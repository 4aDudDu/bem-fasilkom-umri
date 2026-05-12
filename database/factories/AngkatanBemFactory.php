<?php

namespace Database\Factories;

use App\Models\AngkatanBem;
use Illuminate\Database\Eloquent\Factories\Factory;

class AngkatanBemFactory extends Factory
{
    protected $model = AngkatanBem::class;

    public function definition(): array
    {
        $tahunAwal = $this->faker->year();
        
        return [
            'tahun_awal' => $tahunAwal,
            'tahun_akhir' => $tahunAwal + 1,
            'deskripsi' => $this->faker->sentence(),
            'is_active' => false,
        ];
    }

    public function active()
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => true,
        ]);
    }
}
