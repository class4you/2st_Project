<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\BoardCategory;
use App\Models\BoardLanguagelink;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function getBoardMainData()
    {
        $boardData = Board::join('users', 'boards.UserID', 'users.UserID')
            ->orderBy('boards.created_at', 'desc')
            ->paginate(10);

        $userCntData = User::select('users.UserEmail', DB::raw('count(*) as cnt'))
            ->join('comments', 'users.UserID', 'comments.UserID')
            ->groupBy('users.UserEmail')
            ->limit(10)
            ->get();

        // Log::debug($UserCntData);

        Log::debug($boardData);

        return response()->json([
            'boardData' => $boardData,
            'userCntData' => $userCntData
        ]);
    }
    
    public function postBoardData(Request $request) {
        $data = $request->only('BoardCategoryID', 'UserID', 'BoardTitle', 'BoardComment');
        
        $result = Board::create($data);
    }

    
    // 자유게시판 디테일페이지로 이동
    public function getBoardDetailShow($BoardID) {

        $UserID = Auth::id();

        if(isset($UserID)) {
            // $userData = '로그인을 해주세요.';
            $userData = User::select('UserEmail', 'UserID')
            ->where('UserID', $UserID)
            ->first();
        } else {
            $userData = [
                'UserEmail' => '게스트입니다. 로그인해주세요',
                'UserID' => null
            ];
        }
        

        $boardData = Board::join('users', 'boards.UserID', 'users.UserID')
            ->where('BoardID', $BoardID)
            ->first();

        $boardComment = Comment::select('users.UserEmail', 'comments.CommentContent', 'comments.created_at', 'comments.CommentID', 'users.UserID')
            ->join('boards', 'comments.BoardID', 'boards.BoardID')
            ->join('users', 'comments.UserID', 'users.UserID')
            ->where('comments.BoardID', $BoardID)
            ->orderBy('comments.created_at', 'desc')
            ->get();

        Log::debug($boardComment);

        return response()->json([
            'boardData' => $boardData,
            'userID' => $userData,
            'commentData' => $boardComment
        ]);
    }
    // 자유게시판 디테일 페이지 댓글 불러오기
    // public function getBoardDetailComments($BoardID) {
    //     $UserID = Auth::id();

    //     // 댓글 불러오기
    //     $comments = Comment::select(
    //             'comment.CommentID',
    //             'comment.UserID',
    //             'comment.InstructorID',
    //             'comment.Comment_Content',
    //             'comment.created_at',
    //             'comment.updated_at',
    //             'comment.deleted_at',
    //             'Boards.UserID as BoardUserID', // 수정된 부분
    //             'Boards.InstructorID as BoardInstructorID' // 수정된 부분
    //         )
    //         ->join('Boards', 'comment.BoardID', '=', 'Boards.BoardID') // 수정된 부분
    //         ->where('comment.BoardID', $BoardID)
    //         ->orderBy('comment.created_at', 'desc')
    //         ->get();

    //     return response()->json($comments);
    // }
    
    // 자유게시판 삭제
    public function delBoardDetailData($BoardID) {

        Board::destroy($BoardID);
    }

}
