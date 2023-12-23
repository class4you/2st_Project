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
            'ChapterID' => 3,
            'LessonTitle' => '1. 문학이란 무엇인가?',
            'LessonContent' => 'PHP에 대한 간단한 설명',
            'LessonVideoID' => 'j59HTVY1oCc'
        ]);

        Lesson::create([
            'ChapterID' => 3,
            'LessonTitle' => '2. 엑스재팬 설치',
            'LessonContent' => 'PHP개발환경 구성',
            'LessonVideoID' => 'a_80o2lDYec&t=49s'
        ]);

        Lesson::create([
            'ChapterID' => 3,
            'LessonTitle' => '3. 키보드를 사용하여 컴퓨터 부스기',
            'LessonContent' => 'xampp 실행',
            'LessonVideoID' => 'L_Xd8ig4P6s'
        ]);

        Lesson::create([
            'ChapterID' => 4,
            'LessonTitle' => '4. 생기초 생활기록부',
            'LessonContent' => '뭐 내용 많음',
            'LessonVideoID' => '3ijCQaUlOsc'
        ]);

        Lesson::create([
            'ChapterID' => 4,
            'LessonTitle' => '5. 변기수 표현법',
            'LessonContent' => '뭐 내용 많음',
            'LessonVideoID' => 'ytk55T0pL_U'
        ]);

        Lesson::create([
            'ChapterID' => 4,
            'LessonTitle' => '6. 조석처리',
            'LessonContent' => '뭐 내용 많음',
            'LessonVideoID' => 'o-QxXe5kfoE'
        ]);
    }
}
