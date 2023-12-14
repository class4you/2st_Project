<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class ClassBoardController extends Controller
{
    public function classBoardIndex() {
        $result = ClassInfo::all();

        return view('classboardmain',['data' => $result]);
    }
    //
    // public function classBoardAllShow($id) {
    //     $result = ClassInfo::where();

    //     return view('classboardall',['data' => $result]);
    // }
}
