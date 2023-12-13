<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassInfo;
use Illuminate\Support\Facades\Log;

class ClassInfoController extends Controller
{
    public function getNewClassMainData()
    {
        $data = ClassInfo::orderBy('created_at', 'desc')->take(8)->get();
        Log::debug($data);
        return response()->json($data);
    }
}
