<?php

namespace Database\Factories;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LaporanFactory extends Factory
{
    protected $model = Laporan::class;

    public function definition(): array
    {
        $kategoriOptions = array_keys(Laporan::$kategoriLaporan);
        $statusOptions = array_keys(Laporan::$statuses);

        return [
            'nama' => $this->faker->name(),
            'nim' => $this->faker->numerify('#########'),
            'email' => $this->faker->email(),
            'kategori_laporan' => $this->faker->randomElement($kategoriOptions),
            'isi_laporan' => $this->faker->paragraphs(3, true),
            'bukti' => null,
            'status' => $this->faker->randomElement($statusOptions),
            'noted_at' => $this->faker->optional()->dateTimeThisMonth(),
            'catatan_admin' => $this->faker->optional()->sentence(),
        ];
    }
}
