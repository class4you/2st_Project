<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\User;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
    public function postReportData(Request $request) {

        Log::debug("리퀘스트값");
        Log::debug($request);

        $data = new Report;
        $data->UserID = Auth::id();

        $data->fill($request->all());
        $data->save();

        Log::debug("데이터-----------------------------");
        Log::debug($data);

        return response()->json(['success' => true]);
    }
}
