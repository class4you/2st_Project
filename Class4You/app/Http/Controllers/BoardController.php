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

        // Log::debug($boardComment);

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

    // 자유게시판 수정페이지 이동
    public function putBoardShow($BoardID) {

        $result = Board::find($BoardID);

        return response()->json($result);
    }

    public function putBoardUpdate(Request $request) {

        // Log::debug($request);
        $data = $request->only('BoardCategoryID', 'BoardID', 'UserID', 'BoardTitle', 'BoardComment');
        
        // $result = Board::find($BoardID);

        Board::where('BoardID', $request->BoardID)->update($data);

        // Log::debug($data);
    }

    public function putBoardCompleteUpdate(Request $request) {
        // Log::debug($request);
        // $UserID = Auth::id();
        $boardId = $request->input('BoardID');

        $board = Board::find($boardId);

        if(Auth::check()) {
            $loggedInUserId = Auth::id(); // 현재 로그인된 사용자의 ID를 가져옴
            $requestUserId = $request->UserID; // 예시로 리퀘스트에서 user_id를 가져옴
            if ($loggedInUserId == $requestUserId) {
                $board->update(['BoardFlg' => 1]);
                return response()->json(['message' => 'Board Flag Updated'], 200);
            }
        }
    }

    public function putBoardRecommendedUpdate(Request $request) { 
        $boardId = $request->input('BoardID');
        
        $board = Board::find($boardId);
        Log::debug($board);
        
        
        if ($board) {
            // 보드가 존재하는 경우, 추천 수를 1 증가시키고 저장
            // 업데이트된 추천 수를 응답
            $board->BoardRecommended += 1;
            $board->save();
            return response()->json(['updated_recommendation' => $board->BoardRecommended]);
        } else {
            // 보드가 존재하지 않는 경우
            return response()->json(['error' => 'Board not found'], 404);
        }

    }
    public function putBoardNotRecommendedUpdate(Request $request) { 
        $boardId = $request->input('BoardID');
        
        $board = Board::find($boardId);
        Log::debug($board);
        
        
        if ($board) {
            // 보드가 존재하는 경우, 추천 수를 1 증가시키고 저장
            // 업데이트된 추천 수를 응답
            $board->BoardNotRecommended += 1;
            $board->save();
            return response()->json(['updated_recommendation' => $board->BoardRecommended]);
        } else {
            // 보드가 존재하지 않는 경우
            return response()->json(['error' => 'Board not found'], 404);
        }
    }

}
