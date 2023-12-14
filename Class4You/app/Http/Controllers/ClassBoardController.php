<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class ClassBoardController extends Controller
{
    // public function classBoardIndex() {
    //     $result = ClassInfo::all();

    //     return view('classboardmain',['data' => $result]);
    // }
    //
    public function classBoardIndex() {
        $result1 = $this->getDataForFirstSection();
        $result2 = $this->getDataForSecondSection();
        $result3 = $this->getDataForThirdSection();
        $result4 = $this->getDataForFourthSection();
    
        return view('classboardmain', ['data1' => $result1, 'data2' => $result2, 'data3' => $result3, 'data4' => $result4]);
    }
    
    private function getDataForFirstSection() {
        // private 왜 썼을까
        return ClassInfo::where('ClassDifficulty', 1)->take(4)->get();
    }
    
    private function getDataForSecondSection() {
        
        return ClassInfo::where('ClassDifficulty', 2)->take(4)->get();
    }
    
    private function getDataForThirdSection() {
        
        return ClassInfo::where('ClassDifficulty', 3)->take(4)->get();
    }

    private function getDataForFourthSection() {
        
        return ClassInfo::where('ClassDifficulty', 4)->take(4)->get();
    }
}
