<?php

namespace App\Http\Controllers\Admin;

use App\Models\ExamLevel;
use App\Http\Requests;

use App\Models\Schedule;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Session;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', compact( 'roles'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update($id, Request $request)
    {

        $requestData = $request->all();
        $user = User::findOrFail($id);
        $user->update($requestData);

        $notification = array(
            'message' => 'User updated!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);

        return redirect(Config("authorization.route-prefix") . '/users');
    }

    public function destroy($id)
    {
        User::destroy($id);
        $notification = array(
            'message' => 'User deleted!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect(Config("authorization.route-prefix") . '/users');
    }


    public function readmission(){
        $examLevels = ExamLevel::where('status','1')->pluck('title','id');
        $users = User::all();
        return view('admin.users.readmission',compact('users','examLevels'));
    }


    function currentExamStudentList($exam_level_id,$id){
        $userSchedule = UserSchedule::where('schedule_id',$id)->where('exam_level_id',$exam_level_id)
            ->orderBy('created_at', 'asc')->get();
        return view('admin.report.studentList',compact('userSchedule'));
    }

}
