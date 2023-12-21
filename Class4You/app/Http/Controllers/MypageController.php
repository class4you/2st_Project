<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Enrollment;
use App\Models\Classinfo;
// use App\Models\Board;

class MypageController extends Controller
{
    function getUserClassData () {
        $UserID = Auth::id();

        $userData = User::where('UserID', $UserID)
        ->first();

        $classData = User::select('class_infos.ClassImg', 'class_infos.Classtitle', 'class_infos.ClassDescription', 'class_infos.ClassID')
            ->join('enrollments', 'users.UserID', 'enrollments.UserID')
            ->join('class_infos', 'class_infos.ClassID', 'enrollments.ClassID')
            ->where('enrollments.UserID', $UserID)
            ->get();

        $boardData = User::select('boards.BoardTitle', 'boards.BoardFlg', 'boards.created_at', 'boards.BoardID')
            ->join('boards', 'boards.UserID', 'users.UserID')
            ->where('boards.UserID', $UserID)
            ->get();

        Log::debug($boardData);

        return response()->json([
            'userData' => $userData,
            'classData' => $classData,
            'boardData' => $boardData,
        ]);
    }
}
