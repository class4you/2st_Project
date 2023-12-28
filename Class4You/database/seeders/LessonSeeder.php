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
    
        for ($i = 1; $i <= 175; $i++) {
            $lessonCount = rand(2, 5);

            for ($j = 1; $j <= $lessonCount; $j++) {
                Lesson::create([
                    'ChapterID' => $i,
                    'LessonTitle' => $this->getHtmlTitle(),
                    'LessonContent' => $this->getHtmlContent(),
                    'LessonVideoID' => $this->getHtmlVideoID(),
                ]);
            }
        }


        for ($i = 176; $i <= 347; $i++) {
            $lessonCount = rand(2, 5); 

            for ($j = 1; $j <= $lessonCount; $j++) {
                Lesson::create([
                    'ChapterID' => $i, 
                    'LessonTitle' => $this->getCssTitle(),
                    'LessonContent' => $this->getCssContent(),
                    'LessonVideoID' => $this->getCssVideoID(),
                ]);
            }
        }

        
        for ($i = 348; $i <= 558; $i++) {
            $lessonCount = rand(2, 5); 

            for ($j = 1; $j <= $lessonCount; $j++) {
                Lesson::create([
                    'ChapterID' => $i, 
                    'LessonTitle' => $this->getCssTitle(),
                    'LessonContent' => $this->getCssContent(),
                    'LessonVideoID' => $this->getCssVideoID(),
                ]);
            }
        }

                
        for ($i = 559; $i <= 642; $i++) {
            $lessonCount = rand(2, 5); 

            for ($j = 1; $j <= $lessonCount; $j++) {
                Lesson::create([
                    'ChapterID' => $i, 
                    'LessonTitle' => $this->getCssTitle(),
                    'LessonContent' => $this->getCssContent(),
                    'LessonVideoID' => $this->getCssVideoID(),
                ]);
            }
        }

        for ($i = 643; $i <= 799; $i++) {
            $lessonCount = rand(2, 5); 

            for ($j = 1; $j <= $lessonCount; $j++) {
                Lesson::create([
                    'ChapterID' => $i, 
                    'LessonTitle' => $this->getCssTitle(),
                    'LessonContent' => $this->getCssContent(),
                    'LessonVideoID' => $this->getCssVideoID(),
                ]);
            }
        }

        for ($i = 800; $i <= 964; $i++) {
            $lessonCount = rand(2, 5); 

            for ($j = 1; $j <= $lessonCount; $j++) {
                Lesson::create([
                    'ChapterID' => $i, 
                    'LessonTitle' => $this->getCssTitle(),
                    'LessonContent' => $this->getCssContent(),
                    'LessonVideoID' => $this->getCssVideoID(),
                ]);
            }
        }
    }

    protected function getHtmlTitle()
    {
        $titles = ['Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice', 'Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice', 'Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice'];
        return $titles[array_rand($titles)];
    }

    protected function getHtmlContent()
    {
        $contents = ['This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.'];
        return $contents[array_rand($contents)];
    }

    protected function getHtmlVideoID()
    {
        $videoIDs = ['common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4'];
        return $videoIDs[array_rand($videoIDs)];
    }

    protected function getCssTitle()
    {
        $titles = ['Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice', 'Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice', 'Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice'];
        return $titles[array_rand($titles)];
    }

    protected function getCssContent()
    {
        $contents = ['This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.'];
        return $contents[array_rand($contents)];
    }

    protected function getCssVideoID()
    {
        $videoIDs = ['common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4'];
        return $videoIDs[array_rand($videoIDs)];
    }

    
    protected function getJsTitle()
    {
        $titles = ['Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice', 'Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice', 'Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice'];
        return $titles[array_rand($titles)];
    }

    protected function getJsContent()
    {
        $contents = ['This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.'];
        return $contents[array_rand($contents)];
    }

    protected function getJsVideoID()
    {
        $videoIDs = ['common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4'];
        return $videoIDs[array_rand($videoIDs)];
    }

    protected function getPhpTitle()
    {
        $titles = ['Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice', 'Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice', 'Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice'];
        return $titles[array_rand($titles)];
    }

    protected function getPhpContent()
    {
        $contents = ['This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.'];
        return $contents[array_rand($contents)];
    }

    protected function getPhpVideoID()
    {
        $videoIDs = ['common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4'];
        return $videoIDs[array_rand($videoIDs)];
    }

    protected function getJavaTitle()
    {
        $titles = ['Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice', 'Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice', 'Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice'];
        return $titles[array_rand($titles)];
    }

    protected function getJavaContent()
    {
        $contents = ['This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.'];
        return $contents[array_rand($contents)];
    }

    protected function getJavaVideoID()
    {
        $videoIDs = ['common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4'];
        return $videoIDs[array_rand($videoIDs)];
    }

    protected function getDbTitle()
    {
        $titles = ['Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice', 'Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice', 'Common Introduction', 'Common Advanced Techniques', 'Common Hands-on Practice'];
        return $titles[array_rand($titles)];
    }

    protected function getDbContent()
    {
        $contents = ['This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.', 'This is a common content for all chapters.', 'Common content for better understanding.'];
        return $contents[array_rand($contents)];
    }

    protected function getDbVideoID()
    {
        $videoIDs = ['common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4', 'common_video1.mp4', 'common_video2.mp4'];
        return $videoIDs[array_rand($videoIDs)];
    }
}
