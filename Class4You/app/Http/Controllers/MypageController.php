<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class MypageController extends Controller
{
    function getUserClassData () {
        $UserID = Auth::id();

        $data = User::where('UserID', $UserID)
        ->first();

        // Log::debug($data);

        return response()->json($data);
    }
}
