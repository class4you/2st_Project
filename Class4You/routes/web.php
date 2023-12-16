<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassBoardController;
use App\Http\Controllers\ClassInfoController;

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

Route::get('/logout', [UserController::class, 'logout']);

// Route::get('/classBoard', function () {
//     return view('classBoardMain');
// });

Route::get('/classBoard', [ClassInfoController::class, 'classBoardIndex'])->name('classboardmain');

Route::get('/classBoardViewAll/{ClassDifficulty}', [ClassInfoController::class, 'getClassBoardShow'])->name('classboardall');

// Route::get('/classdetailboard', function () {
//     return view('classBoardDetail');
// });

Route::get('/classBoardDetail/{ClassID}', [ClassInfoController::class, 'getClassBoardDetailShow'])->name('classboarddetail');

Route::any("{slug}", function ($slug) {
    return view('welcome');
});
