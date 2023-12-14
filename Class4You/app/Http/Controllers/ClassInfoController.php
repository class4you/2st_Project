<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassInfo;
use Illuminate\Support\Facades\Log;

class ClassInfoController extends Controller
{
    public function getNewClassMainData()
    {
        // $data = ClassInfo::orderBy('created_at', 'desc')->take(8)->get();

        $data = ClassInfo::select('*')
        ->join('class_languagelinks', 'class_infos.ClassID', 'class_languagelinks.ClassID')
        ->join('class_languages', 'class_languagelinks.ClassLanguageID', 'class_languages.ClassLanguageID')
        ->get();

        
        // $data = ClassInfo::select('class_infos.*', 'class_language.*')
        // ->join('class_languagelinks', 'class_infos.ClassLanguageID', '=', 'class_languagelinks.ClassLanguageID')
        // ->join('class_language', 'class_languagelinks.ClassLanguageID', '=', 'class_language.ClassLanguageID')
        // ->orderBy('class_infos.created_at', 'desc')
        // ->take(8)
        // ->get();
        Log::debug($data);
        
        Log::debug($data);
        return response()->json($data);
    }
}
