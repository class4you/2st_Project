<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function postCommentData(Request $request) {
        // $userId = Auth::id();
        // Log::debug($request);
        $data = $request->only('UserID', 'BoardID', 'CommentContent', 'CommentID');
        Log::debug($data);
        // Log::debug($request);
        $result = Comment::create($data);

        $responseData = Comment::select('comments.CommentID',
            'comments.CommentContent',
            'comments.created_at',
            'users.UserID',
            'users.UserEmail',
            'boards.BoardID')
            ->join('users','users.UserID','comments.UserID')
            ->join('boards','boards.UserID','users.UserID')
            ->where('boards.BoardID', $result->BoardID)
            ->orderBy('comments.created_at','desc')
            ->get();

        Log::debug($result);
        Log::debug($responseData);
        return response()->json($responseData);
        // return response()->json($result);
    }

    public function putCommentData(Request $request) {

        Log::debug($request);

        $data = $request->only('UserID', 'BoardID', 'CommentContent', 'CommentID');
        Log::debug($data);

        $result = Comment::where('CommentID', $request->CommentID)->update($data);
        Log::debug($result);

        $responseData = Comment::select('comments.CommentID',
            'comments.CommentContent',
            'comments.created_at',
            'users.UserID',
            'users.UserEmail',
            'boards.BoardID')
            ->join('users','users.UserID','comments.UserID')
            ->join('boards','boards.UserID','users.UserID')
            ->where('boards.BoardID', $request->BoardID)
            ->orderBy('comments.created_at','desc')
            ->get();

        Log::debug('리뷰로그--------------------------------------------------------------');
        Log::debug($responseData);
        return response()->json($responseData);
    }

    public function delCommentData($CommentID) {
        Log::debug($CommentID);
        $data = Comment::destroy($CommentID);

        return response()->json($data);
    }
}
