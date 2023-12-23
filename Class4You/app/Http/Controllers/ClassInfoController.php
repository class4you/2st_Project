<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassInfo;
use App\Models\Instructor;
use App\Models\Enrollment;
use App\Models\ClassLanguagelink;
use App\Models\ClassDiffiBanner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ClassInfoController extends Controller
{
    private $sharedData;
    public function getNewClassMainData()
    {
        $data = ClassInfo::select('class_infos.ClassID', 'class_infos.ClassImg', 'class_infos.ClassTitle', 'class_infos.ClassDescription')
        ->orderBy('created_at', 'desc')
        ->take(8)
        ->get();
    
        foreach ($data as $classInfo) {
            $langData = ClassLanguagelink::select('class_languages.ClassLanguageName')
                ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
                ->where('class_languagelinks.ClassID', $classInfo->ClassID)
                ->get();
        
            // $classInfo 객체에 'languages' 키로 $langData를 할당
            $classInfo->languages = $langData;
            
            // 결과 확인
            // Log::debug($classInfo);
        }
        // Log::debug($data);
        return response()->json($data);
    }

    // 강의 게시판 메인페이지 불러오기
    public function classBoardIndex($ClassLanguageName) {
        $this->sharedData = $ClassLanguageName;
        $result1 = $this->getDataForFirstSection();
        $result2 = $this->getDataForSecondSection();
        $result3 = $this->getDataForThirdSection();
        $result4 = $this->getDataForFourthSection();

    
        // $resultLang = $this->classBoardLangName();

    //  뷰로 전달하는 배열을 올바르게 구성하려면 데이터와 메시지 변수를 각각 분리하고, 
    //  뷰로 전달할 때 각각의 변수에 대한 키를 지정해야함.
        return view('classboardmain', [
            'classInfo1' => $result1, 
            'classInfo2' => $result2['classInfo2'], 
            'msg2' => $result2['msg2'],
            'classInfo3' => $result3, 
            'classInfo4' => $result4,
            
        ]);

        // return response()->json([
        //     'classInfo1' => $result1, 
        //     'classInfo2' => $result2['classInfo2'], 
        //     'msg2' => $result2['msg2'],
        //     'classInfo3' => $result3, 
        //     'classInfo4' => $result4,
        // ]);
    }
    
    // 1단계 클래스 가져올때 가지고 있는 강의언어이름 같이 가져오기
    private function getDataForFirstSection() {
        $id = $this->sharedData;
        $classInfo1 = ClassInfo::join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
            ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
            ->where('ClassDifficultyID', 1)
            ->where('class_languages.ClassLanguageName', $id)
            ->take(4)
            ->get();
        
        foreach ($classInfo1 as $info) {
            $classID = $info->ClassID;

            $langData = ClassInfo::select('class_languages.ClassLanguageName')
                ->join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
                ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
                ->where('class_infos.ClassID', $classID)
                ->get();
    
            // $info 객체에 'languages' 키로 $langData를 할당
            $info->languages = $langData;
            
        }
        $classInfo1->languages = $langData;

        return $classInfo1;
    }

    // 1단계 클래스 가져오기
    // private function getDataForFirstSection() {

    //     return ClassInfo::where('ClassDifficultyID', 1)->take(4)->get();
    // }
    
    // private function getDataForSecondSection() {

    //     return ClassInfo::where('ClassDifficultyID', 2)->take(4)->get();
    // }

    // 단계별 클래스 문구 삽입해봄
    // 2단계 클래스 가져오기
    private function getDataForSecondSection() {
        $msg2 = "이제 첫발을 뗀 당신을 위한 2단계";

        $id = $this->sharedData;

        $classInfo2 = ClassInfo::join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
        ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
        ->where('ClassDifficultyID', 2)
        ->where('class_languages.ClassLanguageName', $id)
        ->take(4)
        ->get();

        foreach ($classInfo2 as $info) {
            $classID = $info->ClassID;

            $langData = ClassInfo::select('class_languages.ClassLanguageName')
                ->join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
                ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
                ->where('class_infos.ClassID', $classID)
                ->get();
    
            // $info 객체에 'languages' 키로 $langData를 할당
            $info->languages = $langData;
        }
        $classInfo2->languages = $langData;

        return ['classInfo2' => $classInfo2, 'msg2' => $msg2];
    }
    
    // 3단계 클래스 가져오기
    private function getDataForThirdSection() {
        $id = $this->sharedData;

        $classInfo3 = ClassInfo::join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
        ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
        ->where('ClassDifficultyID', 3)
        ->where('class_languages.ClassLanguageName', $id)
        ->take(4)
        ->get();

        foreach ($classInfo3 as $info) {
            $classID = $info->ClassID;

            $langData = ClassInfo::select('class_languages.ClassLanguageName')
                ->join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
                ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
                ->where('class_infos.ClassID', $classID)
                ->get();
    
            // $info 객체에 'languages' 키로 $langData를 할당
            $info->languages = $langData;
        }
        $classInfo3->languages = $langData;
        
        return $classInfo3;
    }

    // 4단계 클래스 가져오기
    private function getDataForFourthSection() {
        $id = $this->sharedData;

        $classInfo4 = ClassInfo::join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
        ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
        ->where('ClassDifficultyID', 4)
        ->where('class_languages.ClassLanguageName', $id)
        ->take(4)
        ->get();

        foreach ($classInfo4 as $info) {
            $classID = $info->ClassID;

            $langData = ClassInfo::select('class_languages.ClassLanguageName')
                ->join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
                ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
                ->where('class_infos.ClassID', $classID)
                ->get();
    
            // $info 객체에 'languages' 키로 $langData를 할당
            $info->languages = $langData;
        }
        $classInfo4->languages = $langData;
        
        return $classInfo4;
    }

    // public function getClassBoardShow($classdiffinum) {
    
    //     $result = ClassInfo::where('ClassDifficultyID', $classdiffinum)->get();
    //     // var_dump($result);
    //     foreach ($result as $item) {
    //         $classdiffinumValue = $item->classdiffinum;
    //         // 이제 $classdiffinumValue를 사용할 수 있음
    //     }
        
    //     return view('classBoardViewAll',['data' => $result]);
    // }

    // 해당 단계별 언어 전체보기
    // public function getClassBoardShow($ClassDiffinum, $ClassLanguageName) {

    //     $msg = "";
    
    //     $result = ClassInfo::join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
    //         ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
    //         ->where('class_languages.ClassLanguageName', $ClassLanguageName)
    //         ->where('class_infos.ClassDifficultyID', $ClassDiffinum)
    //         ->get();
        
    //     // var_dump($result);
    //     foreach ($result as $item) {
    //         $classdiffinumValue = $item->ClassDiffinum;

    //         $classID = $item->ClassID;

    //         $langData = ClassInfo::select('class_languages.ClassLanguageName')
    //         ->join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
    //         ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
    //         ->where('class_infos.ClassID', $classID)
    //         ->get();

    //         $item->languages = $langData;

    //         if($classdiffinumValue === "1") {
    //             $msg = "아직 방향성을 찾지 못한 분들을 위한 1단계";
    //         } else if($classdiffinumValue === "2") {
    //             $msg = "이제 첫발을 뗀 당신을 위한 2단계";
    //         } else if($classdiffinumValue === "3") {
    //             $msg = "1단계와 2단계를 완강한 당신을 위한 3단계";
    //         } else if($classdiffinumValue === "4") {
    //             $msg = "3단계까지 완강한 당신 이제 현업 기술을 위한 4단계";
    //         }
    //     }

    //     $resultBanner = ClassDiffiBanner::select('ClassDiffiBanner')
    //         ->where('ClassDifficultyID', $ClassDiffinum)
    //         ->get();

    //         // Log::debug($resultBanner);
        
    //     return view('classBoardViewAll',['data' => $result, 'msg' => $msg, 'banner' => $resultBanner]);
    // }

    // test 해당 단계별 언어 전체보기
    public function getClassBoardShow($ClassDifficultyID, $ClassLanguageName) {

        $msg = "";
    
        $result = ClassInfo::join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
            ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
            ->where('class_languages.ClassLanguageName', $ClassLanguageName)
            ->where('class_infos.ClassDifficultyID', $ClassDifficultyID)
            ->paginate(10);
            // ->get();
                   
        // var_dump($result);
        foreach ($result as $item) {
            $classdiffinumValue = $item->ClassDifficultyID;

            $classID = $item->ClassID;

            $langData = ClassInfo::select('class_languages.ClassLanguageName')
            ->join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
            ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
            ->where('class_infos.ClassID', $classID)
            ->get();

            $item->languages = $langData;

            if($classdiffinumValue === 1) {
                $msg = "아직 방향성을 찾지 못한 분들을 위한 1단계";
            } else if($classdiffinumValue === 2) {
                $msg = "이제 첫발을 뗀 당신을 위한 2단계";
            } else if($classdiffinumValue === 3) {
                $msg = "1단계와 2단계를 완강한 당신을 위한 3단계";
            } else if($classdiffinumValue === 4) {
                $msg = "3단계까지 완강한 당신 이제 현업 기술을 위한 4단계";
            }
        }

        $resultBanner = ClassDiffiBanner::select('ClassDiffiBanner')
            ->where('ClassDifficultyID', $ClassDifficultyID)
            ->get();

            // Log::debug($resultBanner);
        
        return view('classBoardViewAll',['data' => $result, 'msg' => $msg, 'banner' => $resultBanner]);
    }

    // 해당 단계별 언어 전체보기
    // public function getClassBoardShow($classdiffinum) {

    //     $msg = "";
    
    //     $result = ClassInfo::where('ClassDifficultyID', $classdiffinum)->get();
    //     // var_dump($result);
    //     foreach ($result as $item) {
    //         $classdiffinumValue = $item->classdiffinum;
    //         // 이제 $classdiffinumValue를 사용할 수 있음
    //         if($classdiffinum === "1") {
    //             $msg = "아직 방향성을 찾지 못한 분들을 위한 1단계";
    //         } else if($classdiffinum === "2") {
    //             $msg = "이제 첫발을 뗀 당신을 위한 2단계";
    //         } else if($classdiffinum === "3") {
    //             $msg = "1단계와 2단계를 완강한 당신을 위한 3단계";
    //         } else if($classdiffinum === "4") {
    //             $msg = "3단계까지 완강한 당신 이제 현업 기술을 위한 4단계";
    //         }
    //     }
        
    //     return view('classBoardViewAll',['data' => $result, 'msg' => $msg]);
    // }

    // ClassLanguageName가져오기
    // public function classBoardLangName() {
    //     $result = [];

    //     $data = ClassInfo::select('class_infos.ClassID', 'class_infos.ClassTitle', 'class_infos.ClassDifficultyID')
    //         ->get();

    //     foreach($data as $classInfo) {
    //         $langData = ClassInfo::select('class_languages.ClassLanguageName')
    //             ->join('class_languagelinks', 'class_infos.ClassID', '=', 'class_languagelinks.ClassID')
    //             ->join('class_languages','class_languagelinks.ClassLanguageID','=','class_languages.ClassLanguageID')
    //             ->where('class_infos.ClassID', $classInfo->ClassID)
    //             ->get();

    //         // $classInfo 객체에 'languages' 키로 $langData를 할당
    //         $classInfo->languages = $langData;
    //         $result[] = $classInfo;

    //         // 결과 확인
    //         Log::debug($classInfo);
    //     }

    //     return ['data' => $result];
    // }

    // 강의 디테일페이지 불러오기
    public function getClassBoardDetailShow($ClassID) {
        // Log::debug('***** getClassBoardDetailShow Start *****');
        // $result = ClassInfo::where('class_infos.ClassID', $ClassID)->first();

        // 선택한 강의 디테일 정보 가져오기
        $result = ClassInfo::join('instructors','instructors.InstructorID','class_infos.InstructorID')
            ->where('class_infos.ClassID', $ClassID)
            ->first();

        // $result = ClassInfo::select('class_infos.*', DB::raw(count(enrollments.UserID)))
		// 	->join('instructors','instructors.InstructorID','class_infos.InstructorID')
        //     ->join('enrollments','enrollments.ClassID','class_infos.ClassID')
        //     ->where('class_infos.ClassID', $ClassID)
		// 	->groupBy('class_infos.ClassID')
        //     ->first();

        // 선택한 강의 디테일 정보 + 수강한 UserID가져오기
        // $result = ClassInfo::join('instructors','instructors.InstructorID','class_infos.InstructorID')
        //     ->join('enrollments','enrollments.ClassID','class_infos.ClassID')
        //     ->where('class_infos.ClassID', $ClassID)
        //     ->get();

        //     foreach ($result as $classInfo) {
        //         $classID = $classInfo->ClassID; // 강의의 정보
        //         $instructorID = $classInfo->InstructorID; // 강의의 강사 ID
            
        //         // enrollments 테이블의 UserID 등의 정보
        //         $enrolledUsers = $classInfo->enrollments; // enrollments 모델의 컬렉션
            
        //         foreach ($enrolledUsers as $enrollment) {
        //             $userID = $enrollment->UserID; // 각 수강생의 ID 등의 정보
                    
        //         }
        //     }
        

        // Log::debug($ClassID);
        Log::debug($result);

        // 해당 강의 태그 정보 가져오기
        // classboardshow와 다르게 한가지 정보만 가지고 오기 때문에 if문 사용
        if ($result) {
            $classID = $result->ClassID;

            $langData = ClassInfo::select('class_languages.ClassLanguageName')
            ->join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
            ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
            ->where('class_infos.ClassID', $classID)
            ->get();
            
            // $userId = Auth::id();
            // $userId2 = Auth::user();
            // $userId3 = auth()->user();
            // Log::debug($userId);
            // Log::debug($userId2);
            // Log::debug($userId3);

            // $result->UserID = $userId;

            $result->languages = $langData;


            // return view('classBoardDetail', ['data' => $result]);
        // Log::debug('***** getClassBoardDetailShow End *****');
            return response()->json($result);
        }    
    }

    // public function getClassBoardTabClassInfo($ClassID) {
    //     $result = ClassInfo::where('ClassID', $ClassID)->first();

    //     if($result) {
    
    //     }

    //     return ['data' => $result];
    // }
    
}
