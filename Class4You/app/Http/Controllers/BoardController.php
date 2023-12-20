<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\BoardCategory;
use App\Models\BoardLanguagelink;
use App\Models\User;
use App\Models\comments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function getBoardMainData()
    {
        $data = Board::orderBy('created_at', 'desc')
        ->paginate(10);

        Log::debug($data);
        return response()->json($data);
    }
    
    public function postBoardData(Request $request) {
        $data = $request->only('BoardCategoryID', 'UserID', 'BoardTitle', 'BoardComment');
        
        $result = Board::create($data);
    }

    
    // 자유게시판 디테일페이지로 이동
    public function getBoardDetailShow($BoardID) {


        $data = Board::join('users', 'boards.UserID', 'users.UserID')
            ->where('BoardID', $BoardID)
            ->first();

        return response()->json($data);
    }

    // 자유게시판 디테일 페이지 댓글 출력
    public function getBoardDetailCommentShow($BoardID)
    {
        $data = Board::join('boards.UserID')
            ->w ('comment.CommentID', 'users.UserID', 'boards.BoardID', 'Comment.InstruductorID')
    }

}
