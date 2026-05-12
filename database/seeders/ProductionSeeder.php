<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AngkatanBem;
use App\Models\Division;
use App\Models\Member;

class ProductionSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Angkatan 2025/2026
        $angkatan = AngkatanBem::firstOrCreate(
            ['tahun' => '2025/2026'],
            [
                'deskripsi' => 'Badan Eksekutif Mahasiswa Fakultas Ilmu Komputer UMRI Periode 2025/2026',
                'is_active' => true
            ]
        );

        // 2. Buat Divisi/Departemen (Jika belum ada)
        $divisions = [
            'Advokasma' => 'Departemen Advokasi Kajian Mahasiswa',
            'Hubris' => 'Departemen Hubungan Internal & External Mahasiswa',
            'Sosgam' => 'Departemen Sosial Agama',
            'KPM' => 'Departemen Kreasi Pengembangan Mahasiswa',
            'Komdigi' => 'Departemen Komunikasi Digital',
            'Inti' => 'Pengurus Inti',
        ];

        $divModels = [];
        foreach ($divisions as $key => $name) {
            $divModels[$key] = Division::firstOrCreate(
                ['name' => $name],
                ['angkatan_bem_id' => $angkatan->id]
            );
        }

        // 3. Masukkan Anggota Inti
        $intiMembers = [
            ['name' => 'Muhammad Ryandi', 'nim' => '220402183', 'jabatan' => 'Gubernur', 'order' => 1],
            ['name' => 'Radhitya Pratama Wibowo', 'nim' => '220401020', 'jabatan' => 'Wakil Gubernur', 'order' => 2],
            ['name' => 'Aina Khatrun Nada', 'nim' => '220401065', 'jabatan' => 'Sekretaris', 'order' => 3],
            ['name' => 'Amanda Yayuri', 'nim' => '220402083', 'jabatan' => 'Bendahara', 'order' => 4],
        ];

        foreach ($intiMembers as $m) {
            Member::updateOrCreate(
                ['nim' => $m['nim']],
                array_merge($m, [
                    'division_id' => $divModels['Inti']->id,
                    'angkatan_bem_id' => $angkatan->id
                ])
            );
        }

        // 4. Departemen Advokasma
        $advokasma = [
            ['name' => 'Devialdi Maisa Putra', 'nim' => '220402129', 'jabatan' => 'Kepala Departemen'],
            ['name' => 'Syahdan Ghafarul Nahwi', 'nim' => '220401104', 'jabatan' => 'Anggota'],
            ['name' => 'Faiz Arrafi', 'nim' => '220401171', 'jabatan' => 'Anggota'],
            ['name' => 'Sakhila Ramadanadiva Arvi', 'nim' => '220402199', 'jabatan' => 'Anggota'],
        ];
        $this->seedDept($advokasma, $divModels['Advokasma']->id, $angkatan->id);

        // 5. Departemen Hubris
        $hubris = [
            ['name' => 'M. Avin Alya', 'nim' => '220401034', 'jabatan' => 'Kepala Departemen'],
            ['name' => 'Fatahillah Dhea Anaqoh', 'nim' => '220402052', 'jabatan' => 'Anggota'],
            ['name' => 'Mohd. Robih Apriyanto', 'nim' => '220401167', 'jabatan' => 'Anggota'],
            ['name' => 'Alan Maulidan', 'nim' => '230401055', 'jabatan' => 'Anggota'],
        ];
        $this->seedDept($hubris, $divModels['Hubris']->id, $angkatan->id);

        // 6. Departemen Sosgam
        $sosgam = [
            ['name' => 'Fiki Firmansyah', 'nim' => '220401013', 'jabatan' => 'Kepala Departemen'],
            ['name' => 'Muhammad Haekal Hafizh', 'nim' => '220401172', 'jabatan' => 'Anggota'],
            ['name' => 'Syanaz Oktavia Ramadana', '230402167', 'jabatan' => 'Anggota'],
            ['name' => 'Afyuadri Putra', 'nim' => '220401191', 'jabatan' => 'Anggota'],
        ];
        // Fix for missing 'nim' key in Syanaz
        $sosgam[2] = ['name' => 'Syanaz Oktavia Ramadana', 'nim' => '230402167', 'jabatan' => 'Anggota'];
        $this->seedDept($sosgam, $divModels['Sosgam']->id, $angkatan->id);

        // 7. Departemen KPM
        $kpm = [
            ['name' => 'Muhammad Fauzan Ahsandi', 'nim' => '220401036', 'jabatan' => 'Kepala Departemen'],
            ['name' => 'Rendy Rahmadani Saputra', 'nim' => '220402044', 'jabatan' => 'Anggota'],
            ['name' => 'Oktaviani Ghina Salsabila', 'nim' => '220402065', 'jabatan' => 'Anggota'],
            ['name' => 'Rizky Ramadhan Rangkuti', 'nim' => '220402021', 'jabatan' => 'Anggota'],
        ];
        $this->seedDept($kpm, $divModels['KPM']->id, $angkatan->id);

        // 8. Departemen Komdigi
        $komdigi = [
            ['name' => 'Adryan Mahaputra', 'nim' => '220401223', 'jabatan' => 'Kepala Departemen'],
            ['name' => 'Rani Aprilia Sari', 'nim' => '230402164', 'jabatan' => 'Anggota'],
            ['name' => 'M. Ridho Ryansyah Putra', 'nim' => '230401208', 'jabatan' => 'Anggota'],
            ['name' => 'Eka Widiastuti', 'nim' => '220402061', 'jabatan' => 'Anggota'],
        ];
        $this->seedDept($komdigi, $divModels['Komdigi']->id, $angkatan->id);
    }

    private function seedDept($members, $divId, $angkatanId)
    {
        foreach ($members as $m) {
            Member::updateOrCreate(
                ['nim' => $m['nim']],
                array_merge($m, [
                    'division_id' => $divId,
                    'angkatan_bem_id' => $angkatanId
                ])
            );
        }
    }
}
