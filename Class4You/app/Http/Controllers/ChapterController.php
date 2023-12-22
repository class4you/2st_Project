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

        $chapterData = Chapter::join('lessons', 'lessons.ChapterID', 'chapters.ChapterID')
            ->where('chapters.ClassID', $ClassID)
            ->get();

        // foreach($chapterData as $chapterData) {
        //     $aaa = $chapterData -> ChapterID;
        //     $lessonData = Lesson::join('chapters', 'chapters.ChapterID', '')
        // }

        // $lessonData = Lesson::

        // Log::debug($ClassID);
        // Log::debug($classData);
        // Log::debug($ClassID);
        // Log::debug($chapterData);
        // Log::debug($aaa);

        return response()->json([
            'classData' => $classData,
            'ChapterData' => $chapterData,
        ]);
    }
}
