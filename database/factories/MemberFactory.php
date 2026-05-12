<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\Division;
use App\Models\AngkatanBem;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition(): array
    {
        $positions = ['Ketua', 'Wakil Ketua', 'Sekretaris', 'Bendahara', 'Kepala Divisi', 'Wakil Kepala Divisi', 'Anggota'];

        return [
            'name' => $this->faker->name(),
            'nim' => $this->faker->unique()->numerify('#########'),
            'photo' => 'https://via.placeholder.com/300x300?text=' . urlencode($this->faker->firstName()),
            'jabatan' => $this->faker->randomElement($positions),
            'division_id' => Division::factory(),
            'angkatan_bem_id' => AngkatanBem::factory(),
            'instagram' => $this->faker->userName(),
            'email' => $this->faker->email(),
            'bio' => $this->faker->sentence(),
            'order' => $this->faker->numberBetween(0, 50),
        ];
    }
}
