<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassBoardController;
use App\Http\Controllers\ClassInfoController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\EnrollmentController;

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

Route::middleware('my.user.validation')->post('/registration', [UserController::class, 'store']);

Route::get('/logout', [UserController::class, 'logout']);

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
Route::put('/classboarddetailreview/{ClassID}', [ReviewController::class, 'putClassReviewData']);
Route::delete('/classboarddetailreview/{ReviewID}', [ReviewController::class, 'deletClassReview']);


Route::get('/classwatch/{ClassID}', function () {
    return view('welcome');
});

Route::get('/classwatchview/{ClassID}', [ChapterController::class, 'getNewClassWatchData']);


// 강의 시청



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


// 코멘트 작업
Route::post('/comments', [CommentController::class, 'postCommentData']);
Route::delete('/comments/{CommentID}', [CommentController::class, 'delCommentData']);






// 마이페이지 작업
Route::get('/getmypagedashboard', [MyPageController::class, 'getUserClassData']);

// 자유게시판 디테일페이지로 이동 라우터
// Route::get('/boardDetail', [BoardController::class, 'getBoardDetailShow']);
// Route::get('/classboarddetail/{ClassID}', [ClassInfoController::class, 'getClassBoardDetailShow']);


// 클래스보드 vue 컴포넌트 테스트용
// Route::get('/classBoardMain/{ClassLanguageName}', [ClassInfoController::class, 'classBoardIndex']);

// Route::get('/classdetailboard', function () {
//     return view('classBoardDetail');
// });





Route::any("{slug}", function ($slug) {
    return view('welcome');
});

Route::any("{slug1}/{slug2}", function ($slug1, $slug2) {
    return view('welcome');
});