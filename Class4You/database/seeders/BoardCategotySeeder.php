<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BoardCategoty;

class BoardCategotySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BoardCategoty::create([
            'BoardCategotyName' => '자유게시판'
        ]);

        BoardCategoty::create([
            'BoardCategotyName' => '질문게시판'
        ]);
    }
}
