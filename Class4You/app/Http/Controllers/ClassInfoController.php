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

    public function classBoardIndex() {
        $result1 = $this->getDataForFirstSection();
        $result2 = $this->getDataForSecondSection();
        $result3 = $this->getDataForThirdSection();
        $result4 = $this->getDataForFourthSection();
    //  뷰로 전달하는 배열을 올바르게 구성하려면 데이터와 메시지 변수를 각각 분리하고, 
    //  뷰로 전달할 때 각각의 변수에 대한 키를 지정해야함.
        return view('classboardmain', [
            'data1' => $result1, 
            'data2' => $result2['data2'], 
            'msg2' => $result2['msg2'],
            'data3' => $result3, 
            'data4' => $result4
        ]);
    }
    
    private function getDataForFirstSection() {
        // private 왜 썼을까
        return ClassInfo::where('ClassDifficulty', 1)->take(4)->get();
    }
    
    // private function getDataForSecondSection() {

    //     return ClassInfo::where('ClassDifficulty', 2)->take(4)->get();
    // }

    private function getDataForSecondSection() {
        $msg2 = "이제 첫발을 뗀 당신을 위한 2단계";
        $data2 = ClassInfo::where('ClassDifficulty', 2)->take(4)->get();

        return ['data2' => $data2, 'msg2' => $msg2];
    }
    
    private function getDataForThirdSection() {
        
        return ClassInfo::where('ClassDifficulty', 3)->take(4)->get();
    }

    private function getDataForFourthSection() {
        
        return ClassInfo::where('ClassDifficulty', 4)->take(4)->get();
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
                $msg = "이제 첫발을 뗀 당신을 위한 2단계";
            } else if($classdiffinum === "3") {
                $msg = "1단계와 2단계를 완강한 당신을 위한 3단계";
            } else if($classdiffinum === "4") {
                $msg = "3단계까지 완강한 당신 이제 현업 기술을 위한 4단계";
            }
        }
        
        return view('classBoardViewAll',['data' => $result, 'msg' => $msg]);
    }

    public function classBoardLangName() {
        $result = [];

        $data = ClassInfo::select('class_infos.ClassID', 'class_infos.ClassTitle')
            ->get();

        foreach($data as $classInfo) {
            $langData = ClassInfo::select('class_languages.ClassLanguageName')
                ->join('class_infos', 'class_infos.ClassID', '=', 'class_languagelinks.ClassID')
                ->join('class_languagelinks','class_languagelinks.ClassLanguageID','=','class_languages.ClassLanguageID')
                ->where('class_infos.ClassID', $classInfo->ClassID)
                ->get();

            // $classInfo 객체에 'languages' 키로 $langData를 할당
            $classInfo->languages = $langData;
            $result[] = $classInfo;

            // 결과 확인
            // Log::debug($classInfo);
        }
        return ['data' => $result];
    }
    
}
