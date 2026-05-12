<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\AngkatanBem;
use App\Models\Category;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\Division;
use App\Models\Member;
use App\Models\HeroCarousel;
use App\Models\Agenda;
use App\Models\Laporan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@bem.test'],
            [
                'name' => 'Admin BEM',
                'password' => bcrypt('password'),
                'is_admin' => true,
                'is_active' => true,
            ]
        );

        // Create test user
        $testUser = User::firstOrCreate(
            ['email' => 'test@bem.test'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
                'is_admin' => false,
                'is_active' => true,
            ]
        );

        // Create angkatan (generations)
        $angkatanBems = [
            ['tahun_awal' => 2024, 'tahun_akhir' => 2025, 'is_active' => true],
            ['tahun_awal' => 2025, 'tahun_akhir' => 2026, 'is_active' => false],
            ['tahun_awal' => 2023, 'tahun_akhir' => 2024, 'is_active' => false],
        ];

        foreach ($angkatanBems as $angkatan) {
            AngkatanBem::firstOrCreate($angkatan);
        }

        $currentAngkatan = AngkatanBem::where('is_active', true)->first();

        // Create categories
        $categoryData = [
            ['name' => 'Pengumuman', 'icon' => 'hero-bell', 'color' => '#3b82f6'],
            ['name' => 'Acara', 'icon' => 'hero-calendar', 'color' => '#8b5cf6'],
            ['name' => 'Berita', 'icon' => 'hero-newspaper', 'color' => '#ec4899'],
            ['name' => 'Tutorial', 'icon' => 'hero-book-open', 'color' => '#06b6d4'],
            ['name' => 'Lainnya', 'icon' => 'hero-star', 'color' => '#f59e0b'],
        ];

        $categories = collect();
        foreach ($categoryData as $cat) {
            $category = Category::firstOrCreate(
                ['slug' => str()->slug($cat['name'])],
                array_merge($cat, ['is_active' => true])
            );
            $categories->push($category);
        }

        // Create hero carousel
        HeroCarousel::firstOrCreate(
            ['title' => 'Selamat Datang di BEM Fasilkom'],
            [
                'subtitle' => 'Bersama membangun organisasi yang progresif',
                'image' => 'https://via.placeholder.com/1200x600?text=BEM+Fasilkom',
                'button_text' => 'Explore More',
                'button_link' => '#berita',
                'order' => 1,
                'is_active' => true,
                'angkatan_bem_id' => $currentAngkatan->id,
                'overlay_opacity' => 0.4,
            ]
        );

        HeroCarousel::factory(2)->create([
            'angkatan_bem_id' => $currentAngkatan->id,
        ]);

        // Create divisions
        $divisionNames = ['Internal', 'External', 'Media & Kreatif', 'Sponsorship', 'Acara'];
        $divisions = collect();
        
        foreach ($divisionNames as $idx => $name) {
            $division = Division::firstOrCreate(
                ['name' => $name, 'angkatan_bem_id' => $currentAngkatan->id],
                [
                    'slug' => str()->slug($name),
                    'description' => "Divisi $name BEM Fasilkom",
                    'color' => ['#0ea5e9', '#06b6d4', '#0891b2', '#06b6d4', '#0ea5e9'][$idx],
                    'order' => $idx + 1,
                ]
            );
            $divisions->push($division);
        }

        // Create members
        $positions = ['Ketua', 'Wakil Ketua', 'Sekretaris', 'Bendahara'];
        foreach ($divisions->take(4) as $idx => $division) {
            Member::firstOrCreate(
                ['nim' => '2024' . str_pad($idx + 1, 5, '0', STR_PAD_LEFT), 'division_id' => $division->id],
                [
                    'name' => $positions[$idx],
                    'photo' => 'https://via.placeholder.com/300x300?text=' . urlencode($positions[$idx]),
                    'jabatan' => $positions[$idx],
                    'angkatan_bem_id' => $currentAngkatan->id,
                    'instagram' => strtolower(str()->slug($positions[$idx])),
                    'email' => strtolower(str()->slug($positions[$idx])) . '@bem.test',
                    'bio' => 'Jabatan ' . $positions[$idx] . ' BEM Fasilkom',
                    'order' => $idx + 1,
                ]
            );
        }

        // Create team members for each division
        foreach ($divisions as $division) {
            Member::factory(3)->create([
                'division_id' => $division->id,
                'angkatan_bem_id' => $currentAngkatan->id,
            ]);
        }

        // Create berita
        Berita::factory(5)->create([
            'author_id' => $admin->id,
            'angkatan_bem_id' => $currentAngkatan->id,
            'category_id' => $categories->random()->id,
        ]);

        // Create gallery
        Gallery::factory(12)->create([
            'angkatan_bem_id' => $currentAngkatan->id,
            'category_id' => $categories->random()->id,
        ]);

        // Create agenda
        Agenda::factory(8)->create([
            'angkatan_bem_id' => $currentAngkatan->id,
        ]);

        // Create laporan samples
        Laporan::factory(10)->create();

        $this->command->info('Database seeded successfully!');
    }
}
