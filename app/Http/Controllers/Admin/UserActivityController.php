<?php

namespace App\Http\Controllers\Admin;
use App\ExamLevel;
use App\Religion;
use App\Schedule;
use App\User;
use App\UserSchedule;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Validator;
use PDF;
class UserActivityController extends Controller
{

    public function profile($id=null){

        if(isset($id)){
            $user = User::findOrFail($id);
        }else{
            $id = Auth::User()->id;
            $user = User::findOrFail($id);
            //dd($user->user_schedule);
        }


//dd($user->user_schedule->last()->schedule->title);


        //dd($user->user_schedule->last()->exam_level_id);
        return view('admin.users.profile', compact('user'));
    }
    public function admit($id=null){
        if(isset($id)){
            $user_id = $id;
        }else{
            $user_id = Auth::id();
        }
      $admit = UserSchedule::where('user_id',$user_id)->get()->where('status','1')->last();
    $pdf = PDF::loadView('admin.report.admit',['admit'=>$admit]);
    return  $pdf->setPaper('a4')->download("$admit->role_number.pdf");
    //return view('admin.report.admit',compact('admit'));
    }
public function profileEdit($id){
    $schedules = Schedule::pluck('title','id');
    $examLevels  = ExamLevel::pluck('title','id');
    $religions   = Religion::pluck('title','id');
    $user = User::Find($id);
        return view('admin.users.editProfile',compact('schedules','examLevels','religions','user'));
}

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $userData = $request->only('name','email','mobile','gender');

        $user->update($userData);
        $profile = $request->only('dob','nationality','father_name','mother_name','religion_id','identity','address');

        if ($request->hasFile('identity_file')) {
            $uploadPath = public_path('/uploads/identity');
            $extension = $request->file('identity_file')->getClientOriginalExtension();
            $fileName = rand(1111111, 9999999) . '.' . $extension;
            $request->file('identity_file')->move($uploadPath, $fileName);
            $profile['identity_file'] = $fileName;
            if ($user->profile->identity_file != null) {
                $existingPath = $uploadPath.'/'.$user->profile->identity_file;
                if (file_exists($existingPath)) {
                    unlink($existingPath);
                }
            }
        }

        if ($request->hasFile('avatar')) {
            $uploadPath = public_path('/uploads/avatar');
            $extension = $request->file('avatar')->getClientOriginalExtension();
            $fileName = rand(1111111, 9999999) . '.' . $extension;
            $request->file('avatar')->move($uploadPath, $fileName);
            $profile['avatar'] = $fileName;
            if ($user->profile->avatar != null) {
                $existingPath = $uploadPath.'/'.$user->profile->avatar;
                if (file_exists($existingPath)) {
                    unlink($existingPath);
                }
            }
        }


        if ($request->hasFile('signature')) {
            $uploadPath = public_path('/uploads/signature');
            $extension = $request->file('signature')->getClientOriginalExtension();
            $fileName = rand(1111111, 9999999) . '.' . $extension;
            $request->file('signature')->move($uploadPath, $fileName);
            $profile['signature'] = $fileName;
            if ($user->profile->signature != null) {
                $existingPath = $uploadPath.'/'.$user->profile->signature;
                if (file_exists($existingPath)) {
                    unlink($existingPath);
                }
            }
        }
        $user->profile()->update($profile);
        $notification = array(
            'message' => $userData['name']."'s profile has been updated",
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return back();
    }
    public function reset(){
        return view('admin.users.reset');
    }
    public function passwordReset(Request $request){
        $this->validate($request, [
            'password' => 'required|string|min:6|max:20|confirmed'
        ]);
        $user_id = Auth::User()->id;
        $user = User::findOrFail($user_id);
        $password = $_POST['password'];
        $user->password = bcrypt($password);
        $user->save();
        $notification = array(
            'message' => 'your password has been successfully updated',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect(Config("authorization.route-prefix") . '/');
    }
}
