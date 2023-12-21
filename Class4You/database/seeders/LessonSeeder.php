<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::create([
            'ChapterID' => 1,
            'LessonTitle' => 'PHP란 무엇인가?',
            'LessonContent' => 'PHP에 대한 간단한 설명',
            'LessonVideo' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/_pgXmFIihAk?si=a1in9yBZndDhFMsY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>'
        ]);
    }
}
