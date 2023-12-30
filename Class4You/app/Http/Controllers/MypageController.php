<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
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
            ->orderBy('enrollments.created_at', 'desc')
            ->get();

        $boardData = User::select('boards.BoardTitle', 'boards.BoardFlg', 'boards.created_at', 'boards.BoardID')
            ->join('boards', 'boards.UserID', 'users.UserID')
            ->where('boards.UserID', $UserID)
            ->whereNull('boards.deleted_at')
            ->orderBy('boards.created_at', 'desc')
            ->get();


        $enrollments = Enrollment::where('UserID', $UserID)->get();

        $classIDs = $enrollments->pluck('ClassID');

        // $chapters = collect();
        // foreach ($classIDs as $classID) {
        //     $chapterCount = Classinfo::join('Chapters', 'class_infos.ClassID', '=', 'Chapters.ClassID')
        //         ->select(DB::raw('DATE_FORMAT(Chapters.updated_at, "%a") as day'), 'class_infos.ClassID')
        //         ->where('class_infos.ClassID', $classID)
        //         ->whereBetween('Chapters.updated_at', [$request->weekStart, $request->weekEnd])
        //         ->count();
        
        //     if ($chapterCount > 0) {
        //         $classCount = Classinfo::where('ClassID', $classID)
        //             ->where('ClassFlg', 1)
        //             ->count();
        
        //         $chapters[$classID] = [
        //             'classCount' => $classCount,
        //             'chapterCount' => $chapterCount
        //         ];
        //     }
        // }

        // ==============================================================================================
        // 주간 통계
        $weeklyStats = collect();

        // 클래스 플래그가 1인 요일 정보
        $classFlagDays = Classinfo::select(
                'class_infos.ClassID',
                DB::raw('DATE_FORMAT(class_infos.updated_at, "%a") as day'),
                DB::raw('SUM(class_infos.ClassFlg) as classFlagCount'),
            )
            ->whereIn('class_infos.ClassID', $classIDs)
            ->whereBetween('class_infos.updated_at', [$request->weekStart, $request->weekEnd])
            ->groupBy('class_infos.ClassID', 'day')
            ->get();

        $chaptersFlagDays = Classinfo::join('Chapters', 'class_infos.ClassID', 'Chapters.ClassID')
            ->select('Chapters.ChapterID',
                DB::raw('DATE_FORMAT(Chapters.updated_at, "%a") as day'),
                DB::raw('SUM(Chapters.ChapterFlg) as chapterFlagCount')
            )
            ->whereIn('class_infos.ClassID', $classIDs)
            ->whereBetween('Chapters.updated_at', [$request->weekStart, $request->weekEnd])
            ->groupBy('class_infos.ClassID', 'day', 'Chapters.ChapterID')
            ->get();
            
        
        // Log::debug($chaptersFlagDays);
        // 월 화 수 목 금 토 일에 해당하는 요일 목록
        $weekDays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        
        // 월 화 수 목 금 토 일에 해당하는 데이터 그룹화
        $groupedData = [];
        foreach ($weekDays as $day) {
            $groupedData[$day] = [
                'classFlagCount' => 0,
                'chapterFlagCount' => 0,
            ];
        }
        
        // 결과 반영
        foreach ($classFlagDays as $result) {
            // Log::debug($result);
            $day = $result->day;
            $groupedData[$day]['classFlagCount'] = ($groupedData[$day]['classFlagCount'] ?? 0) + $result->classFlagCount;
        }

        foreach ($chaptersFlagDays as $result) {
            // Log::debug($result);
            $day = $result->day;
        
            // 날짜가 배열에 이미 존재하면 기존 값을 더하고, 없으면 현재 값으로 초기화
            $groupedData[$day]['chapterFlagCount'] = ($groupedData[$day]['chapterFlagCount'] ?? 0) + $result->chapterFlagCount;
        }
        
        // 챕터 값이 있는 경우에만 추가
        if (!empty($classFlagDays) || !empty($chapterFlagDays)) {
            $weeklyStats = $groupedData;
        }
        
        
        // Log::debug($weeklyStats);
        // ==============================================================================================



        // ==============================================================================================
        // 연간 통계
        $monthlyStats = collect();

        // 클래스 플래그가 1인 월별 정보
        // $classFlagMonths = Classinfo::join('Chapters', 'class_infos.ClassID', '=', 'Chapters.ClassID')
        //     ->select(
        //         DB::raw('YEAR(Chapters.updated_at) as year'),
        //         DB::raw('MONTH(Chapters.updated_at) as month'),
        //         DB::raw('SUM(class_infos.ClassFlg) as classFlagCount'),
        //         DB::raw('SUM(Chapters.ChapterFlg) as chapterFlagCount')
        //     )
        //     ->whereIn('class_infos.ClassID', $classIDs)
        //     ->whereBetween('Chapters.updated_at', [$yearStart, $yearEnd])
        //     ->groupBy('year', 'month')
        //     ->get();

        $classFlagMonths = Classinfo::select(
                'class_infos.ClassID',
                DB::raw('YEAR(class_infos.updated_at) as year'),
                DB::raw('MONTH(class_infos.updated_at) as month'),
                DB::raw('SUM(class_infos.ClassFlg) as classFlagCount'),
            )
            ->whereIn('class_infos.ClassID', $classIDs)
            ->whereBetween('class_infos.updated_at', [$request->yearStart, $request->yearEnd])
            ->groupBy('class_infos.ClassID', 'year', 'month')  // class_infos.ClassID 추가
            ->get();


        $chaptersFlagMonths =  Classinfo::join('Chapters', 'class_infos.ClassID', '=', 'Chapters.ClassID')
            ->select(
                DB::raw('YEAR(Chapters.updated_at) as year'),
                DB::raw('MONTH(Chapters.updated_at) as month'),
                DB::raw('SUM(Chapters.ChapterFlg) as chapterFlagCount')
            )
            ->whereIn('class_infos.ClassID', $classIDs)
            ->whereBetween('Chapters.updated_at', [$request->yearStart, $request->yearEnd])
            ->groupBy('year', 'month')
            ->get();
        
        // 1월부터 12월까지의 데이터 그룹화
        $monthlyStatsData = [];
        for ($month = 1; $month <= 12; $month++) {
            $monthlyStatsData[$month] = [
                'classFlagCount' => 0,
                'chapterFlagCount' => 0,
            ];
        }
        
        // 결과 반영
        foreach ($classFlagMonths as $result) {
            // Log::debug($result);
            $month = $result->month;
            $monthlyStatsData[$month]['classFlagCount'] = ($monthlyStatsData[$month]['classFlagCount'] ?? 0) + $result->classFlagCount;
        }

        foreach ($chaptersFlagMonths as $result) {
            // Log::debug($result);
            $month = $result->month;
            $monthlyStatsData[$month]['chapterFlagCount'] = $result->chapterFlagCount;
        }
        
        // 챕터 값이 있는 경우에만 추가
        if (!empty($classFlagMonths) || !empty($chapterFlagMonths)) {
            $monthlyStats = $monthlyStatsData;
        }
        // ==============================================================================================


        // ==============================================================================================
        // 최근 강의 결과

        $recentClassInfoData = DB::table('class_infos')
            ->where('updated_at', '=', DB::table('class_infos')->max('updated_at'))
            ->get();

        $recentClassData = User::join('enrollments', 'users.UserID', 'enrollments.UserID')
            ->join('class_infos', 'enrollments.ClassID', 'class_infos.ClassID')
            ->join('chapters', 'class_infos.ClassID', 'chapters.ClassID')
            // ->join('lessons', 'chapters.ChapterID', 'lessons.ChapterID')
            ->where('users.UserID', $UserID)
            ->whereRaw('class_infos.updated_at = (SELECT MAX(class_infos.updated_at) FROM class_infos)')
            ->get();

        // 플래그가 1인 챕터 개수 세기
        $flaggedChaptersCount =  $recentClassData->where('ChapterFlg', 1)->count();

        Log::debug($flaggedChaptersCount);
        // 전체 챕터 개수 세기
        $totalChaptersCount =  $recentClassData->where('ChapterID')->count();
        Log::debug($totalChaptersCount);

        // 퍼센트 계산
        $percentageFlaggedChapters = ($totalChaptersCount > 0) ? ($flaggedChaptersCount / $totalChaptersCount) * 100 : 0;

        Log::debug($percentageFlaggedChapters);
        
        // ==============================================================================================

        // $chapters = collect();
        // foreach ($classIDs as $classID) {
        //     $result = Classinfo::join('Chapters', 'class_infos.ClassID', 'Chapters.ClassID')
        //         ->select(DB::raw('DATE_FORMAT(Chapters.updated_at, "%a") as day'), 'class_infos.ClassID')
        //         ->where('class_infos.ClassID', $classID)
        //         ->whereBetween('Chapters.updated_at', [$request->weekStart, $request->weekEnd])
        //         // ->groupBy(DB::raw('DATE_FORMAT(Chapters.updated_at, "%a")'))
        //         ->get();

        //     $groupedData = $result->groupBy('day')->map(function ($group) {
        //         return [
        //             'classCount' => $group->where('ClassFlg', 1)->count(),
        //             'chapterCount' => $group->count(),
        //         ];
        //     });

        //     $chapters[$classID] = $groupedData;
        // }
        


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
            'weeklyStats' =>  $weeklyStats,
            'monthlyStats' =>  $monthlyStats,
            'recentClassInfoData' => $recentClassInfoData,
            'flaggedChaptersCount' =>  $flaggedChaptersCount,
            'totalChaptersCount' =>  $totalChaptersCount,
            'percentageFlaggedChapters' =>  $percentageFlaggedChapters,
        ]);
    }

    function putUserAddressData(Request $request) {

        $user = User::find($request->UserID);
        if(Auth::check()) {
            $loggedInUserId = Auth::id(); // 현재 로그인된 사용자의 ID를 가져옴
            $requestUserId = $request->UserID; // 예시로 리퀘스트에서 user_id를 가져옴
            if ($loggedInUserId == $requestUserId) {
                $user->update([
                    'UserPostcode' => $request->UserPostcode,
                    'UserRoadAddress' => $request->UserRoadAddress,
                    'UserDetailedAddress' => $request->UserDetailedAddress,
                ]);
                return response()->json($user);
            }
        }

    }

    function putUserbasicData(Request $request) {
        Log::debug($request->UserPhoneNumber);

        $user = User::find($request->UserID);

        if(Auth::check()) {
            $loggedInUserId = Auth::id(); // 현재 로그인된 사용자의 ID를 가져옴
            $requestUserId = $request->UserID; // 예시로 리퀘스트에서 user_id를 가져옴
            if ($loggedInUserId == $requestUserId) {
                $user->update(['UserPhoneNumber' => $request->UserPhoneNumber]);
                Log::debug($user);
                return response()->json($user);
            }
        }
    }

    function putUserpasswordData(Request $request) {
        // Log::debug($request);

        $result = User::find($request->UserID);
        if(Auth::check()) {
            $loggedInUserId = Auth::id(); // 현재 로그인된 사용자의 ID를 가져옴
            $requestUserId = $request->UserID; // 예시로 리퀘스트에서 user_id를 가져옴
            if ($loggedInUserId == $requestUserId) {
                if(!$result || !(Hash::check($request->UserPassword, $result->UserPassword))) {
                    return response()->json([
                        'success' => false,
                        'message' => '아이디와 비밀번호를 확인해주세요.',
                    ]);
                }
                $request->NewUserPassword = Hash::make($request->NewUserPassword);
                $result->update(['UserPassword' => $request->NewUserPassword]);
                return response()->json([
                    'success' => true,
                    'message' => '비밀번호 변경하셨습니다.',
                ]);
            }
        }
    }
}
