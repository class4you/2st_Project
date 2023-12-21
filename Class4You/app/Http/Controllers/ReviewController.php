<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\Enrollment;
use App\Models\ClassInfo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    //강의게시판_수강평불러오기
    public function getClassReviewIndex($ClassID) {
        // Log::debug(Auth::check());
        // Log::debug(Auth::id());
        // Log::debug($ClassID);
        $UserID = Auth::id();

        $EnrollmentData = Enrollment::select('EnrollmentID')
            ->where('UserID', $UserID) 
            ->where('ClassID', $ClassID)
            ->first();
            
        $EnrollmentData =  $EnrollmentData ? true : false;

        $result = Review::select('reviews.ReviewID',
            'reviews.EnrollmentID',
            'reviews.ReviewComment',
            'reviews.ReviewRating',
            'reviews.created_at',
            'users.UserID',
            'users.UserEmail',
            'class_infos.ClassID')
            ->join('enrollments','reviews.EnrollmentID','enrollments.EnrollmentID')
            ->join('class_infos','class_infos.ClassID','enrollments.ClassID')
            ->join('users','enrollments.UserID','users.UserID')
            ->where('enrollments.ClassID', $ClassID)
            // ->orderBy('enrollments.created_at', 'desc')
            ->orderBy('reviews.created_at', 'desc')
            ->get();

        // Log::debug($EnrollmentData);
        // Log::debug($result);

        // Log::debug($result);
        return response()->json([
            'reviewsData' => $result,
            'enrollmentData' => $EnrollmentData
        ]);
    }
    
    //강의게시판_수강평작성
    // public function postClassReviewStore(Request $request) {
    //     // $reviewUserData = User::find(auth()->id());
    //     // $validator = Validator::make(request()->all(), [
    //     //     'UserID' => 'required',
    //     //     'ReviewComment' => 'required|max:200'
    //     // ]);

    //     $reviewData = [
    //         'ReviewComment' => $request->input('ReviewComment'),
    //         'ReviewRating' => $request->input('ReviewRating'),
    //         'UserID' => auth()->id(), // 현재 로그인한 사용자의 ID
    //     ];

    //     //$reviewUserData에 가져올 다른 데이터가 있다면 여기서 처리
    //     //예시
    //     // $reviewUserData['UserID'] = $reviewData->UserID;

    //     $result = Review::create($reviewData);

    //     // $reviewData['data'] = $result;

    //     // return response()->json($reviewData);
    //     // return response()->json(['reviewData' => $reviewData, 'result' => $result]);
    //     return response()->json(['result' => $result]);
    // }

    // 강의게시판_수강평작성
    public function postClassReviewData(Request $request) {

        // Log::debug($request->UserID);
        // Log::debug($request->ClassID);

        // 유저가 제출한 리뷰 데이터의 사용자 ID와 클래스 ID에 해당하는 수강 아이디 조회
        // 유저가 수강한 강의 조회
        $EnrollmentData = Enrollment::select('EnrollmentID')
            ->where('UserID', $request->UserID) 
            ->where('ClassID', $request->ClassID) 
            ->first();

        // 조회한 수강 아이디($EnrollmentData)를 리뷰 데이터($request)에 추가    
        $request->merge(['EnrollmentID' => $EnrollmentData->EnrollmentID]);
        $data = $request->only('EnrollmentID', 'ReviewComment', 'ReviewRating');
    
        // Log::debug($data);

        // 리뷰 데이터($data)를 Review모델을 사용해 데이터베이스에 저장.
        // Review::create($data)데이터 베이스에 레코드 추가해줌.
        $result = Review::create($data);
    }

    // 강의게시판_수강평수정
    // public function putClassReviewData(Request $request, $ReviewID) {

    //     $classReviewData = $request->only('ReviewComment', 'ReviewRating');
    //     $result = Review::find($ReviewID);

    //     $result->update($ReviewID);
    // }

    // 강의게시판_수강평삭제
    public function deletClassReview($ReviewID) {

        // $result = Review::find($ReviewID);
        // 리뷰아이디를 찾아서 첫번째 값을 삭제해주면되나?

        $result = Review::select('ReviewID')
            ->join('Enrollments','reviews.EnrollmentID','enrollments.EnrollmentID')
            ->where('UserID', $UserID) 
            ->where('ClassID', $ClassID) 
            ->first();
        
        // 컨트롤러까지 못오는것 같음 로그 아예 안찍힘
        Log::debug($result);

        $result->delete();
        // $result->destroy();
    }
}
