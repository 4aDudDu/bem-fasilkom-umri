<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@fasilkom.umri.ac.id'],
            [
                'name' => 'Admin BEM',
                'password' => Hash::make('password'),
                'is_admin' => true,
                'is_active' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
