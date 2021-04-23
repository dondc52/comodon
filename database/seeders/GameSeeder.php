<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            Game::create([
                'name' => 'Test ' . $i,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            ]);
        }
    }
}
