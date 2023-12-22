<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Lesson;
use App\Models\Chapter;
use App\Models\Classinfo;

class LessonController extends Controller
{
    public function updateLessonProgress(Request $request) {
        Log::debug($request);

        Lesson::where('LessonID', $request->lessonId)
        ->update([
            'LessonProgress' => $request->progressPercentage,
            'LessonFlg' => $request->lessonFlg,
        ]);

        $chapterID = Lesson::where('LessonID', $request->lessonId)->value('ChapterID');

        Log::debug($chapterID);

        $allLessonsCompleted = Lesson::where('ChapterID', $chapterID)
        ->where('LessonFlg', 0) // 아직 완료되지 않은 강의
        ->doesntExist(); // 완료되지 않은 강의가 하나도 없다면 true 반환

        // 모든 강의가 완료되었다면 챕터 플래그를 1로 업데이트
        if ($allLessonsCompleted) {
            Chapter::where('ChapterID', $chapterID)
            ->update(['ChapterFlg' => 1]);
            
            // 해당 강의의 모든 챕터가 1인지 확인
            $classID = Chapter::where('ChapterID', $chapterID)->value('ClassID');
            $allChaptersCompleted = Chapter::where('ClassID', $classID)
            ->where('ChapterFlg', 0) // 아직 완료되지 않은 챕터
            ->doesntExist(); // 완료되지 않은 챕터가 하나도 없다면 true 반환
            
            // 모든 챕터가 완료되었다면 강의 플래그를 1로 업데이트
            if ($allChaptersCompleted) {
                Classinfo::where('ClassID', $classID)
                ->update(['ClassFlg' => 1]);
            }
            Log::debug($allLessonsCompleted);
        }

    }
}
