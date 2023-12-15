<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use App\Models\Board;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Board::create([
        //     'BoardCategotyID' => 1,
        //     'UserID' => 1,
        //     'ClassID' => 0,
        //     'BoardTitle' => 1,
        //     'BoardComment' => 1,
        //     'BoardView' => 0,
        //     'BoardRecommended' => 0,
        //     'BoardNotRecommended' => 0,
        // ]);
        \App\Models\Board::factory(300)->create();
    }
}
