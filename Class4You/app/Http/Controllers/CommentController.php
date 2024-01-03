<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function postCommentData(Request $request) {
        // $userId = Auth::id();
        // Log::debug($request);
        $data = $request->only('UserID', 'BoardID', 'CommentContent', 'CommentID');

        // Log::debug($request);
        $result = Comment::create($data);
    }

    public function delCommentData($CommentID) {
        // Log::debug($CommentID);
        Comment::destroy($CommentID);
    }
}
