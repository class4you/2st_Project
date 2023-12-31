<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classinfo;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChapterController extends Controller
{
    public function getNewClassWatchData($ClassID) {

        $UserID = Auth::id();

        $completedChapters = Chapter::where('ClassID', $ClassID)
        ->where('ChapterFlg', 1)
        ->count();

        // $completedChapters = Chapter::where('ClassID', $ClassID)
        // ->where('ChapterFlg', 0)
        // ->count();
    
        $totalChapters = Chapter::where('ClassID', $ClassID)->count();


        // Log::debug($completedChapters);
        // Log::debug($totalChapters);
        
        $completedLessons = Lesson::whereIn('ChapterID', function ($query) use ($ClassID) {
            $query->select('ChapterID')
                ->from('chapters')
                ->where('ClassID', $ClassID)
                ->where('ChapterFlg', 1);
        })->where('LessonFlg', 1)->count();
        
        $totalLessons = Lesson::whereIn('ChapterID', function ($query) use ($ClassID) {
            $query->select('ChapterID')
                ->from('chapters')
                ->where('ClassID', $ClassID);
        })->count();
        
        if ($totalChapters > 0 && $totalLessons > 0) {
            $classProgress = (($completedChapters + $completedLessons) / ($totalChapters + $totalLessons)) * 100;
        } else {
            $classProgress = 0;
        }
        
        // Log::debug($classProgress);

        $classData = Classinfo::where('ClassID', $ClassID)
            ->first();

        $chapterData = Chapter::where('chapters.ClassID', $ClassID)
            ->get();

        foreach($chapterData as $chapterLessonData) {
            $lessonData = Lesson::where('ChapterID', $chapterLessonData -> ChapterID)
                ->get();
            $allLessonData[$chapterLessonData->ChapterID] = $lessonData;
        };

        return response()->json([
            'classData' => $classData,  
            'chapterData' => $chapterData,
            'lessonData' => $allLessonData,
            'classProgressData' => $classProgress,
            'totalChapters' => $totalChapters,
            'completedChapters' =>$completedChapters
        ]);

        // $lessonData = Lesson::

        // Log::debug($ClassID);
        // Log::debug($classData);
        // Log::debug($ClassID);
        // Log::debug($chapterData);
        // Log::debug($aaa);

    }

    // public function postvideochkData($lessonID) {

    //     Log::debug($lessonID);

    // }
}
