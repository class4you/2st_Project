<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //강의게시판_수강평불러오기
    public function getClassReviewIndex() {
        $result = Comment::select()
        ->join()
        ->where()
        ->get();

        return response()->json($result);
    }
    
    //강의게시판_수강평작성
    public function postClassReviewStore(Request $request) {
        $reviewUserData = User::find(auth()->id());

        $reviewData = [
            'ReviewContent' => $request->input('ReviewContent'),
            'ReviewRating' => $request->input('ReviewRating'),
            'UserID' => auth()->id(), // 현재 로그인한 사용자의 ID
        ];

        //$reviewUserData에 가져올 다른 데이터가 있다면 여기서 처리
        //예시
        //$reviewUserData['UserName'] = $reviewUserData->name;

        $result = Review::create($reviewData);

        return response()->json($review);
    }
}
