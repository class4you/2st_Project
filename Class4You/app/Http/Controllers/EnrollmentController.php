<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EnrollmentController extends Controller
{
    public function getNewClassWatchData($ClassID) {

        // $UserID = Auth::id();

        $classData = Classinfo::where('ClassID', $ClassID)
            ->first();

        $chapterData = Chapter::join('lessons', 'lessons.ChapterID', 'chapters.ChapterID')
            ->where('chapters.ClassID', $ClassID)
            ->get();

        // $lessonData = Lesson::

        Log::debug($ClassID);
        Log::debug($classData);
        Log::debug($ClassID);
        Log::debug($chapterData);

        return response()->json([
            'boardData' => $classData,
            'userID' => $chapterData,
        ]);
    }
}
