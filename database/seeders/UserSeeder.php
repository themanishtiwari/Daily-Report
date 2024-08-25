<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', "test@gmail.com")->first();
        if(!isset($user)){
            User::create([
                'name'          => "Test User",
                'email'         => "test@gmail.com",
                'phone'         => "8514748514",
                'password'      => Hash::make("00000000")
            ]);
        }
    }
}
