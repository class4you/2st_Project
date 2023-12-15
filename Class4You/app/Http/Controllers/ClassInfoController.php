<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassInfo;
use App\Models\ClassLanguagelink;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ClassInfoController extends Controller
{
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
        return response()->json($data);
    }

    // public function getClassBoardShow($classdiffinum) {
    
    //     $result = ClassInfo::where('ClassDifficulty', $classdiffinum)->get();
    //     // var_dump($result);
    //     foreach ($result as $item) {
    //         $classdiffinumValue = $item->classdiffinum;
    //         // 이제 $classdiffinumValue를 사용할 수 있음
    //     }
        
    //     return view('classBoardViewAll',['data' => $result]);
    // }

    public function getClassBoardShow($classdiffinum) {

        $msg = "";
    
        $result = ClassInfo::where('ClassDifficulty', $classdiffinum)->get();
        // var_dump($result);
        foreach ($result as $item) {
            $classdiffinumValue = $item->classdiffinum;
            // 이제 $classdiffinumValue를 사용할 수 있음
            if($classdiffinum === "1") {
                $msg = "아직 방향성을 찾지 못한 분들을 위한 1단계";
            } else if($classdiffinum === "2") {
                $msg = "아직 방향성을 찾지 못한 분들을 위한 2단계";
            } else if($classdiffinum === "3") {
                $msg = "아직 방향성을 찾지 못한 분들을 위한 3단계";
            } else if($classdiffinum === "4") {
                $msg = "아직 방향성을 찾지 못한 분들을 위한 4단계";
            }
        }
        
        return view('classBoardViewAll',['data' => $result, 'msg' => $msg]);
    }

    
    
}
