<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'owner@irgibintaro.com'],
            [
                'name' => 'Owner Irgi Bintaro',
                'password' => Hash::make('Owner12345!'),
            ]
        );
    }
}
