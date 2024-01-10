<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enrollment;
use App\Models\ClassInfo;
use App\Models\ClassNote;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ClassNoteController extends Controller
{
    //강의 노트 불러오기 : /classwatch/ 안에서 이루어지는거니까 똑같은 라우터를 쓰나?
    public function getClassNoteIndex($ClassID) {

        $UserID = Auth::id();

        $EnrollmentData = Enrollment::select('EnrollmentID')
            ->where('UserID', $UserID) 
            ->where('ClassID', $ClassID)
            ->first();
            
        $EnrollmentData =  $EnrollmentData ? true : false;

        $result = ClassNote::select('class_notes.ClassNoteID',
            'class_notes.ClassNoteComment',
            'enrollments.UserID',
            'enrollments.ClassID')
            ->join('enrollments','class_notes.EnrollmentID','enrollments.EnrollmentID')
            ->where('enrollments.UserID', $UserID)
            ->where('enrollments.ClassID', $ClassID)
            ->orderBy('class_notes.created_at', 'desc')
            ->get();
        
        Log::debug($result);
        Log::debug($EnrollmentData);

        return response()->json([
            'noteData' => $result,
            'enrollmentData' => $EnrollmentData
        ]);

    }
    
    // 강의 노트 작성
    public function postClassNoteData(Request $request) {

        Log::debug($request->UserID);
        Log::debug($request->ClassID);
        Log::debug($request);

        $EnrollmentData = Enrollment::select('EnrollmentID')
            ->where('UserID', $request->UserID) 
            ->where('ClassID', $request->ClassID) 
            ->first();

        $request->merge(['EnrollmentID' => $EnrollmentData->EnrollmentID]);
        $data = $request->only('EnrollmentID', 'ClassNoteComment');
        

        Log::debug($data);

        $result = ClassNote::create($data);

        Log::debug("-------------------------------------------");
        Log::debug($result);

        
            // Log::debug($responseData);

        return response()->json($result);
    }

}
