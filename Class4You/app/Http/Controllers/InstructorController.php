<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    //
    public function instructorloginpost(Request $request) {
        // Log::debug('여긴 관리자 로그인 부');
        // Log::debug($request);

        $result = Instructor::where('InstructorEmail', $request->InstructorEmail)->first();

        if(!$result || !(Hash::check($request->InstructorPassword, $result->InstructorPassword))) {
            return response()->json([
                'success' => false,
                'message' => '아이디와 비밀번호를 확인해주세요.',
            ]);
        }

        Auth::guard('admin')->login($result);

        session(['admin' => $result]);
        session()->save();
        
        $instructorId = Auth::guard('admin')->id();
        if (Auth::guard('admin')->check()) {
            // session(['user' => Auth::user()]);
            $instructorIdChk = ($instructorId == 1) ? true : false;
            $sessionInstructorDataCheck = Auth::guard('admin')->check();

            return response()->json([
                'success' => true,
                'message' => '로그인이 성공적으로 수행되었습니다.',
                'sessionInstructorDataCheck' => $sessionInstructorDataCheck,
                // 'sessionCheckUserName' => $sessionDataUserName,
                // 'sessionCheckUserEmail' => $sessionDataUserEmail,
                'instructorId' => $instructorId,
                'instructorIdChk' => $instructorIdChk,
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => '인증 에러가 발생했습니다.',
            ]);
        }
    }
}
