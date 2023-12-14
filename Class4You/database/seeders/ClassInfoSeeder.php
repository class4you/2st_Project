<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\ClassInfo;

class ClassInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cnt = 1;
        while($cnt <= 4) {
            // 이미지 디렉터리 경로
            $imageDirectory = public_path('img/html/'.$cnt.'st/');

            // 이미지 파일 목록
            $imageFiles = File::files($imageDirectory);

            foreach ($imageFiles as $imageFile) {
            // 이미지 파일 경로
            $imagePath = 'img/html/'.$cnt.'st/' . $imageFile->getFilename();
                ClassInfo::create([
                    'InstructorID' => 1,
                    'CategoryID' => 1,
                    'CourseLanguageID' => 1,
                    'ClassImg' => $imagePath,
                    'ClassTitle' => '강의 더미 데이터 제목입니다. 난이도는 '.$cnt.' 단계 입니다',
                    'ClassDescription' => '강의 더미 데이터 내용입니다. 난이도는 '.$cnt.' 단계 입니다',
                    'ClassPrice' => 0,
                    'ClassDifficulty' => $cnt,
                ]);
            }
            $cnt++;
        }

        $cnt = 1;
        while($cnt <= 4) {
            // 이미지 디렉터리 경로
            $imageDirectory = public_path('img/css/'.$cnt.'st/');

            // 이미지 파일 목록
            $imageFiles = File::files($imageDirectory);

            foreach ($imageFiles as $imageFile) {
            // 이미지 파일 경로
            $imagePath = 'img/css/'.$cnt.'st/' . $imageFile->getFilename();
                ClassInfo::create([
                    'InstructorID' => 1,
                    'CategoryID' => 1,
                    'CourseLanguageID' => 1,
                    'ClassImg' => $imagePath,
                    'ClassTitle' => '강의 더미 데이터 제목입니다. 난이도는 '.$cnt.' 단계 입니다',
                    'ClassDescription' => '강의 더미 데이터 내용입니다. 난이도는 '.$cnt.' 단계 입니다',
                    'ClassPrice' => 0,
                    'ClassDifficulty' => $cnt,
                ]);
            }
            $cnt++;
        }

        $cnt = 1;
        while($cnt <= 4) {
            // 이미지 디렉터리 경로
            $imageDirectory = public_path('img/css/'.$cnt.'st/');

            // 이미지 파일 목록
            $imageFiles = File::files($imageDirectory);

            foreach ($imageFiles as $imageFile) {
            // 이미지 파일 경로
            $imagePath = 'img/css/'.$cnt.'st/' . $imageFile->getFilename();
                ClassInfo::create([
                    'InstructorID' => 1,
                    'CategoryID' => 1,
                    'CourseLanguageID' => 1,
                    'ClassImg' => $imagePath,
                    'ClassTitle' => '강의 더미 데이터 제목입니다. 난이도는 '.$cnt.' 단계 입니다',
                    'ClassDescription' => '강의 더미 데이터 내용입니다. 난이도는 '.$cnt.' 단계 입니다',
                    'ClassPrice' => 0,
                    'ClassDifficulty' => $cnt,
                ]);
            }
            $cnt++;
        }

    }
}
