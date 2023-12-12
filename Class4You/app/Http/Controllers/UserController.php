<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class UserController extends Controller
{
    // 회원가입
    function store (Request $request) {

        Log::debug($request);
        $data = $request->only('UserEmail', 'UserPassword', 'UserName', 'UserPhoneNumber', 'UserBirthDate', 'UserAddress', 'UserTermsofUse', 'UserPrivacy');
        // 비밀번호 암호화
        $data['UserPassword'] = Hash::make($data['UserPassword']);
        // Log::info($request);
        // 회원가입 정보 DB 저장
        $result = User::create($data);

        // // Eloquent 모델을 사용하여 데이터베이스에 저장
        // $user = User::create($validatedData);
        

        // 저장된 사용자를 반환하거나 다른 작업을 수행할 수 있습니다.
        // return response()->json(['user' => $user, 'message' => 'User created successfully']);
    }
}
