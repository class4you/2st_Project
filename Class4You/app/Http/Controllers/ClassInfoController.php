<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassInfo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ClassInfoController extends Controller
{
    public function getNewClassMainData()
    {
        // $data = ClassInfo::orderBy('created_at', 'desc')->take(8)->get();

        $data = ClassInfo::select('class_languagelinks.ClassID', 'class_infos.ClassImg', 'class_infos.ClassTitle', 'class_infos.ClassDescription', 'class_languages.ClassLanguageName')
        ->join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
        ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
        ->whereIn('class_infos.ClassID', [1])
        ->orderBy('class_infos.created_at', 'desc')
        ->take(8)
        ->get();

        // $data = ClassInfo::select('class_infos.*', 'class_languages.*', 'class_languagelinks.*')
        // ->join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
        // ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
        // ->orderBy('class_infos.created_at', 'desc')
        // ->take(8)
        // ->get();
        
        // $data = ClassInfo::select('class_infos.ClassID', 'class_infos.ClassImg', 'class_infos.ClassTitle', 'class_infos.ClassDescription', DB::raw('GROUP_CONCAT(class_languages.ClassLanguageName) as LanguageNames'))
        // ->join('class_languagelinks', 'class_infos.ClassID', '=', 'class_languagelinks.ClassID')
        // ->join('class_languages', 'class_languagelinks.ClassLanguageID', '=', 'class_languages.ClassLanguageID')
        // ->whereIn('class_infos.ClassID', [1]) // 원하는 강의 아이디(1번)를 지정
        // ->groupBy('class_infos.ClassID', 'class_infos.ClassImg', 'class_infos.ClassTitle', 'class_infos.ClassDescription')
        // ->get();
        
        Log::debug($data);
        
        Log::debug($data);
        return response()->json($data);
    }
}
