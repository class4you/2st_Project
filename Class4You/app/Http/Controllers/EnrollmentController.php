<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EnrollmentController extends Controller
{
    public function postClassEnrollData(Request $request) {

        Log::debug($request);

        $data = $request->only('UserID', 'ClassID');
        
        $result = Enrollment::create($data);
    }
}
