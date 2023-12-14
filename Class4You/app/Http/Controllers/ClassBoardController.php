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
        $result = ClassInfo::get();

        return view('classBoardMain',['data' => $result]);
    }
    //
    public function classBoardShow($id) {

    }
}
