<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Enrollment;
use App\Models\Classinfo;
use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Support\Facades\DB;
// use App\Models\Board;

class MypageController extends Controller
{
    function getUserClassData (Request $request) {

        Log::debug($request);
        $UserID = Auth::id();

        $userData = User::where('UserID', $UserID)
        ->first();

        $classData = User::select('class_infos.ClassImg', 'class_infos.Classtitle', 'class_infos.ClassDescription', 'class_infos.ClassID')
            ->join('enrollments', 'users.UserID', 'enrollments.UserID')
            ->join('class_infos', 'class_infos.ClassID', 'enrollments.ClassID')
            ->where('enrollments.UserID', $UserID)
            ->get();

        $boardData = User::select('boards.BoardTitle', 'boards.BoardFlg', 'boards.created_at', 'boards.BoardID')
            ->join('boards', 'boards.UserID', 'users.UserID')
            ->where('boards.UserID', $UserID)
            ->get();

        $enrollments = Enrollment::where('UserID', $UserID)->get();

        $classIDs = $enrollments->pluck('ClassID');


        $chapters = collect();
        foreach ($classIDs as $classID) {
            $chapterCount = Classinfo::join('Chapters', 'class_infos.ClassID', '=', 'Chapters.ClassID')
                ->select('class_infos.ClassID')
                ->where('class_infos.ClassID', $classID)
                ->whereBetween('Chapters.updated_at', ['2023-12-25', '2023-12-31'])
                ->count();
        
            // 챕터가 하나 이상 있는 경우에만 추가
            if ($chapterCount > 0) {
                $classCount = Classinfo::where('ClassID', $classID)
                    ->where('ClassFlg', 1)
                    ->count();
        
                $chapters[$classID] = [
                    'classCount' => $classCount,
                    'chapterCount' => $chapterCount
                ];
            }
        }
        
        
        Log::debug($chapters);


        // foreach ($classIDs as $classID) {
        //     $chapter = Classinfo::join('Chapters', 'class_infos.ClassID', '=', 'Chapters.ClassID')
        //     ->join('Lessons', 'Chapters.ChapterID', '=', 'Lessons.ChapterID')
        //     ->select('Chapters.*', 'Lessons.*')
        //     ->where('class_infos.ClassID', $classID)
        //     // ->where('Lessons.LessonFlg', '1')
        //     ->get();
            
        //     if ($chapter->isNotEmpty()) {
        //         $chapters[$classID] = $chapter;
        //     }
        // }

        // // 클래스별 챕터 수와 플래그가 1인 챕터의 퍼센트를 저장할 배열
        // $classInfo = [];

        // foreach ($chapters as $classChapters) {
        //     $totalChapters = count($classChapters);

        //     // Log::debug($classChapters);

        //     // Log::debug($totalChapters);

        //     if ($totalChapters > 0) {
        //         $flaggedChapters = $classChapters->filter(function ($chapter) {
        //             return $chapter->LessonFlg === '1';
        //         });

        //         // Log::debug($flaggedChapters);
                
        //         $totalFlaggedChapters = $flaggedChapters->count();
                
        //         // Log::debug($totalFlaggedChapters);
        //         // 퍼센트 계산
        //         $percent = ($totalFlaggedChapters / $totalChapters) * 100;

        //         // Log::debug($percent);
        //         // 결과를 배열에 저장
        //         $classInfo[] = [
        //             'ClassID' => $classChapters->first()->ClassID,
        //             'TotalChapters' => $totalChapters,
        //             'TotalFlaggedChapters' => $totalFlaggedChapters,
        //             'Percent' => $percent,
        //         ];

        //     }
        // }

        // Log::debug($UserID);
        // Log::debug($userData);
        // Log::debug($classData);

        // $chapters = collect();

        // foreach ($classIDs as $classID) {
        //     $classChapters = Chapter::where('ClassID', $classID)->get();
        //     if (!$classChapters->isEmpty()) {
        //         foreach ($classChapters as $chapter) {
        //             $chapterID = $chapter->ChapterID;
        
        //             // 챕터 아이디를 기반으로 해당 챕터에 속하는 리슨을 가져옴
        //             $Lessons = Lesson::where('ChapterID', $chapterID)->get();

        //             // 현재 챕터에 대한 리슨 값을 별도의 배열로 저장
        //             $chapter->Lessons = $Lessons->toArray();

        //             // $chapter 객체에는 현재 챕터와 그에 대한 리슨 값들이 별도의 배열로 포함됨
        //             $chapters->push($chapter);
        //             // Log::debug($chapter);
        //         }
        //     }
        // }


        // Log::debug($chapters);
        
        
        // $chapters = Chapter::where('ClassID', $classIDs)
        //     ->get();

        // Log::debug($enrollments);
        // Log::debug($classIDs);
        // $chapters = Chapter::where('class_id', $classId)->get();
        // $lessons = Lesson::whereIn('chapter_id', $chapters->pluck('id'))->get();

        // $totalChapters = $chapters->count();
        // $completedChapters = $chapters->filter(function ($chapter) {
        //     return $chapter->chapter_flg == 1;
        // })->count();

        // $totalLessons = $lessons->count();
        // $completedLessons = $lessons->filter(function ($lesson) {
        //     return $lesson->LessonFlg == 1;
        // })->count();

        // $classProgress = ($completedLessons / $totalLessons) * 100;
    

        // Log::debug($boardData);
        

        return response()->json([
            'userData' => $userData,
            'classData' => $classData,
            'boardData' => $boardData,
            'chapters' => $chapters,
        ]);
    }

    function getUserClassTotalData() {

    }
}
