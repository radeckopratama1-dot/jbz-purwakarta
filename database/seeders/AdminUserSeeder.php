<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@jbzpurwakarta.org'],
            [
                'name' => 'Radecko Pratama (Admin PDD)',
                'password' => Hash::make('jbzpurwakarta2026'),
            ]
        );
    }
}
