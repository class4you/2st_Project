<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\Comment;
use App\Models\User;
use App\Models\Report;
use App\Models\Instructor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    // 게시판 신고 함수
    public function postReportData(Request $request) {

        Log::debug("리퀘스트값==============================================");
        Log::debug($request);

        $data = new Report;
        $data->UserID = Auth::id();

        $data->fill($request->all());
        $data->save();

        Log::debug("데이터-----------------------------");
        Log::debug($data);

        return response()->json(['success' => true]);
    }

    // 댓글 신고 함수
    public function postCommentReportData(Request $request) {

        // Log::all("postCommentReportData method called");
        Log::debug("리퀘스트값==============================================");
        Log::debug($request);
        
        $data = $request->only('ReportID','BoardID','CommentID','UserID','ReportContent','ReportState');
        $data['UserID'] = Auth::id(); 

        $result = Report::create($data);

        Log::debug($result);

        $responseData = Report::all();

        return response()->json($responseData);

    }

    // 관리자 신고 게시글 리스트 출력 함수
    public function getAdminBoardReportData() {

        // Log::debug("리퀘스트값");
        // Log::debug($request);
        
        $boardReportData = Report::get();

        Log::debug("데이터값==============================================================");
        Log::debug($boardReportData);

        return response()->json(['boardReportData' => $boardReportData]);
    }
}
