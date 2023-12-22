<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classinfo;
use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChapterController extends Controller
{
    public function getNewClassWatchData($ClassID) {

        // $UserID = Auth::id();

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
