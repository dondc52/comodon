<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            User::create([
                'name' => 'Test ' . $i,
                'email' => 'test'.$i.'@gmail.com',
                'password' => Hash::make('123456'),
            ]);
        }
    }
}
