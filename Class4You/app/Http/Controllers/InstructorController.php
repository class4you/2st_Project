<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClassInfo;
use App\Models\UserStatus;
use App\Models\Enrollment;
use App\Models\Board;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InstructorController extends Controller
{
    //
    public function instructorloginpost(Request $request) {
        // Log::debug('여긴 관리자 로그인 부');
        // Log::debug($request);

        $result = Instructor::where('InstructorEmail', $request->InstructorEmail)->first();

        if(!$result || !(Hash::check($request->InstructorPassword, $result->InstructorPassword))) {
            return response()->json([
                'success' => false,
                'message' => '아이디와 비밀번호를 확인해주세요.',
            ]);
        }

        Auth::guard('admin')->login($result);

        session(['admin' => $result]);
        session()->save();
        
        $instructorId = Auth::guard('admin')->id();
        if (Auth::guard('admin')->check()) {
            // session(['user' => Auth::user()]);
            $adminChk = Instructor::where('InstructorID', $instructorId)->where('InstructorFlg', 1)->first();
            // $instructorIdChk = ($instructorId == 1) ? true : false;
            $adminChk =  $adminChk ? true : false;
            $sessionInstructorDataCheck = Auth::guard('admin')->check();

            return response()->json([
                'success' => true,
                'message' => '로그인이 성공적으로 수행되었습니다.',
                'sessionInstructorDataCheck' => $sessionInstructorDataCheck,
                // 'sessionCheckUserName' => $sessionDataUserName,
                // 'sessionCheckUserEmail' => $sessionDataUserEmail,
                'instructorId' => $instructorId,
                'instructorIdChk' =>  $adminChk,
            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => '인증 에러가 발생했습니다.',
            ]);
        }
    }

    public function instructorlogoutget() {
        // 로그아웃 처리
        Auth::guard('admin')->logout();
        
        $sessioninstructorDataCheck = Auth::guard('admin')->check();

        return response()->json([
            'message' => '로그아웃 성공',
            'sessioninstructorDataCheck' => $sessioninstructorDataCheck,
        ]);
    }

    public function instructoruserdata(Request $request) {
        // Log::debug($request);
        $instructorId = Auth::guard('admin')->id();

        if($instructorId == 1) {
            $userDataQuery = User::select('users.UserID', 'users.UserEmail', 'users.UserName', 'users.UserBirthDate', 'users.UserPostcode', 'users.UserRoadAddress', 'users.UserDetailedAddress', 'users.created_at', 'users.deleted_at', 'user_statuses.UserStatusID', 'user_statuses.UserStatus', 'user_statuses.SuspensionType', 'user_statuses.SuspendedUntil')
            ->leftJoin('user_statuses', function($join) {
                $join->on('users.UserID', '=', 'user_statuses.UserID');
            })
            ->withTrashed()
            ->orderBy('users.created_at', 'desc');
        }

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $userDataQuery->where(function ($query) use ($searchTerm) {
                $query->orWhere('users.UserName', 'LIKE', "%{$searchTerm}%");
            });
        }
        $userData = $userDataQuery->paginate(10);

        return response()->json([
            'userData' => $userData,
        ]);
    }

    public function instructoruserclassdata(Request $request) {

        $instructorId = Auth::guard('admin')->id();

        if($instructorId == 1) {
            $ClassDataQuery = Enrollment::select('enrollments.UserID', 'enrollments.ClassID', 'class_infos.ClassTitle', 'class_infos.ClassPrice', 'class_infos.ClassDifficultyID', 'enrollments.created_at', 'enrollments.EnrollmentFlg')
                ->join('users', 'enrollments.UserID' ,'users.UserID')
                ->join('class_infos', 'enrollments.ClassID', 'class_infos.ClassID')
                ->orderBy('users.created_at', 'desc');
        }

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $ClassDataQuery->where(function ($query) use ($searchTerm) {
                $query->orWhere('class_infos.ClassTitle', 'LIKE', "%{$searchTerm}%");
            });
        }

        $ClassData = $ClassDataQuery->paginate(10);

        return response()->json([
            'classData' => $ClassData,
        ]);

    }

    public function instructoruserboardquestion(Request $request) {

        $instructorId = Auth::guard('admin')->id();

        if($instructorId == 1) {
            $boardQuestionDataQuery = Board::whereNotNull('ClassID')
                ->withTrashed()
                ->orderBy('boards.created_at', 'desc');
        }

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $boardQuestionDataQuery->where(function ($query) use ($searchTerm) {
                $query->orWhere('BoardTitle', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('BoardComment', 'LIKE', "%{$searchTerm}%");
            });
        }

        $BoardData = $boardQuestionDataQuery->paginate(10);

        return response()->json([
            'boardData' => $BoardData,
        ]);

    }

    public function instructoruserboardcommunity(Request $request) {
        $instructorId = Auth::guard('admin')->id();

        if($instructorId == 1) {
            $boardQuestionDataQuery = Board::whereNull('ClassID')
                ->withTrashed()
                ->orderBy('boards.created_at', 'desc');
        }

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $boardQuestionDataQuery->where(function ($query) use ($searchTerm) {
                $query->orWhere('BoardTitle', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('BoardComment', 'LIKE', "%{$searchTerm}%");
            });
        }

        $BoardData = $boardQuestionDataQuery->paginate(10);

        return response()->json([
            'boardData' => $BoardData,
        ]);

    }

    public function instructoruserstate(Request $request) {

        Log::debug($request);
        if($request->ban == 'ban') {
            $UserStateDate = UserStatus::create([
                'UserID' => $request->UserID,
                'UserStatus' => '1',
                'SuspensionType' => '2',
            ]);


            return response()->json([
                'userStateData' => $UserStateDate,
            ]);

        } else {
            $UserStateDate = UserStatus::create([
                'UserID' => $request->UserID,
                'UserStatus' => '1',
                'SuspensionType' => '1',
                'SuspendedUntil' => $request->Date,
            ]);

            return response()->json([
                'userStateData' => $UserStateDate,
            ]);
        }
    }

    public function instructoruserstatedata(Request $request) {
        $instructorId = Auth::guard('admin')->id();

        if($instructorId == 1) {
            $userStateDataQuery = UserStatus::select(
                'UserStatusID',
                'UserID',
                'UserStatus',
                'SuspensionType',
                'SuspendedUntil',
                'created_at'
            )
            ->addSelect(DB::raw('(
                SELECT COUNT(*)
                FROM user_statuses t2
                WHERE t2.UserID = user_statuses.UserID AND t2.created_at >= user_statuses.created_at
            ) as status_count'))
            ->orderBy('created_at', 'desc');

        }
        
        // if ($request->has('search')) {
            //     $searchTerm = $request->input('search');
            //     $userStateDataQuery->where(function ($query) use ($searchTerm) {
                //         $query->where('UserID', $searchTerm);
                //     });
                // }
        $userStateData = $userStateDataQuery->paginate(10);
        
        return response()->json([
            'userStateData' => $userStateData,
        ]);
    }

    public function postRegistInstructor(Request $request) {
        $admindata = [
            'Email' => $request->InstructorEmail,
            'PhoneNumber' => $request->InstructorPhoneNumber,
            'FullName' => $request->InstructorFullName,
        ];

        Mail::send('mail.mail_form_admin', ['data' => $admindata], function($message) use ($admindata, $request) {
            $message->to('jmh4912@naver.com')->subject('강사 문의하기');
            $message->from('dldmldltmd@gmail.com');
        });

    }

    public function instructoruserstateput(Request $request) {
        Log::debug($request);
        if($request->value == 0) {
            $UserStateDate = UserStatus::where('UserStatusID', $request->UserStatusID)
            ->update([
                'UserStatus' => '0',
                'SuspensionType' => '0',
                'SuspendedUntil' => null,
            ]);
            
            $UserStateDate = UserStatus::where('UserStatusID', $request->UserStatusID)->first();

            return response()->json([
                'userStateData' => $UserStateDate,
            ]);
        } else if ($request->value == 1) {
            $UserStateDate = UserStatus::where('UserStatusID', $request->UserStatusID)
            ->update([
                'UserStatus' => '1',
                'SuspensionType' => '2',
                'SuspendedUntil' => null,
            ]);

            $UserStateDate = UserStatus::where('UserStatusID', $request->UserStatusID)->first();

            Log::debug($UserStateDate);
            return response()->json([
                'userStateData' => $UserStateDate,
            ]);
        }
    }

    // public function postRegistInstructor(Request $request) {

    //     Log::debug("request");
    //     Log::debug($request);

    //     $data = $request->only('InstructorEmail', 'InstructorFullName', 'InstructorPassword');

    //     // 비밀번호 암호화
    //     $data['InstructorPassword'] = Hash::make($data['InstructorPassword']);

    //     $result = Instructor::create($data);

        
    //     $admindata = [
    //         'email' => $request->InstructorEmail,
    //     ];

    //     Mail::send('mail.mail_form_admin', ['data' => $admindata], function($message) use ($data, $request) {
    //         $message->to('jmh4912@naver.com')->subject('강사 회원가입 요청');
    //         $message->from('dldmldltmd@gmail.com');
    //     });


    //     Log::debug("result");
    //     Log::debug($result);

    //     return response()->json($result);
    // }
}
