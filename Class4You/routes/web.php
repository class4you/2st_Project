<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassBoardController;
use App\Http\Controllers\ClassInfoController;
use App\Http\Controllers\ClassNoteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ReportController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});



Route::middleware('my.user.validation')->post('/login', [UserController::class, 'loginpost']);

Route::get('/registration', function () {
    return view('welcome');
});

Route::get('/registrationtest', [UserController::class, 'kakaoregist']);

Route::middleware('my.user.validation')->post('/registration', [UserController::class, 'store']);

Route::middleware('my.user.validation')->post('/registrationEmailDoubleCheck', [UserController::class, 'emaildoublecheck']);

Route::get('/logout', [UserController::class, 'logout']);

// 이메일 인증

Route::post('/emailChkSubmit', [UserController::class, 'googleemailchk']);

Route::get('/tokenChkSubmit', [UserController::class, 'tokendatachk']);

Route::put('/tokenChkUpdate', [UserController::class, 'tokendataupdate']);


// 네이버 로그인
// Route::get('/login/naver', function () {
//     return Socialite::driver('naver')->redirect();
// });

// Route::post('/login/naver/callback', function () {
//     $user = Socialite::driver('naver')->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))->user();
//     dd($user);
// });



// Route::post('/login/kakao/callback', function () {
//     $user = Socialite::driver('kakao')->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))->user();
// });




// Route::get('/logout/kakao/callback', [UserController::class, 'kakaologout']);

// Route::get('/login/kakao/callback', function () {
//     return view('welcome');
// });

// 카카오 로그인

Route::get('/login/kakao', function (Request $request) {
    session()->put('before_url', $request->before_url);
    return Socialite::driver('kakao')->redirect();
});

Route::get('/login/kakao/callback', [UserController::class, 'kakaologin']);

Route::get('/getUserData', [UserController::class, 'getuserdata']);




// 클래스보드 테스트용
// Route::get('/classBoard', function () {
//     return view('classBoardMain');
// });
Route::get('/classBoard/{ClassLanguageName}', [ClassInfoController::class, 'classBoardIndex'])->name('classboardmain');

Route::get('/getNewClassMainData', [ClassInfoController::class, 'getNewClassMainData']);

Route::get('/classBoardDetail/{ClassID}', [ClassInfoController::class, 'getClassBoardDetailShow'])->name('classboarddetail');

// 수강 정보 확인 컨트롤러
// Route::get('/classBoardDetail/{ClassID}', [ClassBoardController::class, 'getClassBoardDetailShow']);

// 수강 신청 컨트롤러
Route::post('/classEnrollAppPost', [EnrollmentController::class, 'postClassEnrollData']);

// 강의 수강평

Route::post('/classboarddetailreview', [ReviewController::class, 'postClassReviewData']);
Route::get('/classboarddetailreview/{ClassID}', [ReviewController::class, 'getClassReviewIndex']);
// Route::put('/classboarddetailreview/{ClassID}', [ReviewController::class, 'putClassReviewData']);
Route::put('/classboarddetailreview', [ReviewController::class, 'putClassReviewData']);
Route::delete('/classboarddetailreview/{ReviewID}', [ReviewController::class, 'deletClassReview']);


// 강의 질문
Route::post('/board/data', [BoardController::class, 'postClassQuestion']);
Route::delete('/board/data/{BoardID}', [BoardController::class, 'delClassQuestion']);
Route::put('/board/data', [BoardController::class, 'putClassQuestion']);


// 강의 시청

Route::get('/classwatch/{ClassID}', function () {
    return view('welcome');
});

Route::get('/classwatchview/{ClassID}', [ChapterController::class, 'getNewClassWatchData']);

Route::put('/lessonprogress', [LessonController::class, 'updateLessonProgress']);

// 강의 노트
Route::post('/classwatchnote', [ClassNoteController::class, 'postClassNoteData']);
Route::get('/classwatchnote/{ClassID}', [ClassNoteController::class, 'getClassNoteIndex']);
Route::delete('/classwatchnote/{ClassNoteID}', [ClassNoteController::class, 'delClassNoteData']);
Route::put('/classwatchnote', [ClassNoteController::class, 'putClassNoteData']);

// test
// Route::prefix('reviews')->group(function () {
//     Route::get('/classboarddetailreview/{ClassID}', [ReviewController::class, 'getClassReviewIndex']);
//     Route::post('/classboarddetailreview/{ClassID}', [ReviewController::class, 'postClassReviewStore']);
// });

// 기존

Route::get('/classBoardViewAll/{ClassDifficultyID}/{ClassLanguageName}', [ClassInfoController::class, 'getClassBoardShow'])->name('classboardall');






// 게시판 작업

// Route::get('/board/{page}', [BoardController::class, 'getBoardMainData']);

Route::get('/board', function () {
    return view('welcome');
});

Route::get('/board/data', [BoardController::class, 'getBoardMainData']);

Route::post('/boardInsert', [BoardController::class, 'postBoardData']);

Route::get('/boarddetail/{BoardID}', [BoardController::class, 'getBoardDetailShow']);

Route::delete('/boarddetail/{BoardID}', [BoardController::class, 'delBoardDetailData']);


Route::put('/boardUpdate', [BoardController::class, 'putBoardUpdate']);
// 코멘트 작업
Route::post('/comments', [CommentController::class, 'postCommentData']);
Route::put('/comments', [CommentController::class, 'putCommentData']);
Route::delete('/comments/{CommentID}', [CommentController::class, 'delCommentData']);

// 해결 처리
Route::put('/boardCompleteUpdate', [BoardController::class, 'putBoardCompleteUpdate']);

// 추천 비추천 처리

Route::put('/boardRecommendedUpdate', [BoardController::class, 'putBoardRecommendedUpdate']);
Route::put('/boardNotRecommendedUpdate', [BoardController::class, 'putBoardNotRecommendedUpdate']);

// 게시판 조회수 처리
Route::put('/boardViewsUpdate', [BoardController::class, 'putBoardViewUpdate']);

// 마이페이지 작업
Route::middleware('checkUserId')->get('/getmypagedashboard', [MyPageController::class, 'getUserClassData']);

Route::middleware('my.user.validation')->put('/useraddressdataupdate', [MyPageController::class, 'putUserAddressData']);
Route::middleware('my.user.validation')->put('/userbasicdataupdate', [MyPageController::class, 'putUserbasicData']);
Route::middleware('my.user.validation')->put('/userpassworddataupdate', [MyPageController::class, 'putUserpasswordData']);
Route::delete('/deleteduserdata', [MyPageController::class, 'deleteUserpasswordData']);

// 게시글 신고
Route::post('/reportSubmit', [ReportController::class, 'postReportData']);


// 자유게시판 디테일페이지로 이동 라우터
// Route::get('/boardDetail', [BoardController::class, 'getBoardDetailShow']);
// Route::get('/classboarddetail/{ClassID}', [ClassInfoController::class, 'getClassBoardDetailShow']);


// 클래스보드 vue 컴포넌트 테스트용
// Route::get('/classBoardMain/{ClassLanguageName}', [ClassInfoController::class, 'classBoardIndex']);

// Route::get('/classdetailboard', function () {
//     return view('classBoardDetail');
// });

// 관리자 로그인
Route::post('/instructorlogin', [InstructorController::class, 'instructorloginpost']);
// 로그아웃
Route::get('/instructorlogout', [InstructorController::class, 'instructorlogoutget']);
// 유저 정보 리스트 데이터
Route::get('/instructoruserdata', [InstructorController::class, 'instructoruserdata']);
// 유저 계정 정지
Route::post('/instructoruserstate', [InstructorController::class, 'instructoruserstate']);
// 유저 강의 정보 리스트 데이터
Route::get('/instructoruserclassdata', [InstructorController::class, 'instructoruserclassdata']);
// 유저 계정 상태 리스트 데이터
Route::get('/instructoruserstatedata', [InstructorController::class, 'instructoruserstatedata']);
// 유저 계정 상태 수정
Route::put('/instructoruserstateput', [InstructorController::class, 'instructoruserstateput']);


// 게시물 정보 리스트 데이터
Route::get('/instructoruserboardquestion', [InstructorController::class, 'instructoruserboardquestion']);
// 게시물 전체 정보 리스트 데이터
Route::get('/instructoruserboardcommunity', [InstructorController::class, 'instructoruserboardcommunity']);
// 관리자 계정 문의하기
Route::post('/instructorinquiry', [InstructorController::class, 'instructorinquiry']);
// 관리자 회원가입
// Route::post('/instructorregist', [InstructorController::class, 'postRegistInstructor']);

Route::any("{slug}", function ($slug) {
    return view('welcome');
});

Route::any("{slug1}/{slug2}", function ($slug1, $slug2) {
    return view('welcome');
});

