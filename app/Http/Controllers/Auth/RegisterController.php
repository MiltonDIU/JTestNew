<?php

namespace App\Http\Controllers\Auth;

use App\ExamLevel;
use App\Http\Requests\RegistrationRequest;
use App\Religion;
use App\Role;
use App\Schedule;
use App\Setting;
use App\User;
use App\Http\Controllers\Controller;
use App\UserSchedule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Mail;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showRegistrationForm()
    {
        $schedules = Schedule::where('status',1)->pluck('title','id');
        $religions = Religion::pluck('title','id');
        $examLevels = ExamLevel::where('status',1)->pluck('title','id');

        return view('auth.register',compact('schedules','religions','examLevels'));
    }


//dimensions:min_width=250,min_height=500'
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'gender' => $data['gender'],
            'role_id' => 2,
            'password' => bcrypt($data['password']),
            'email_token' => str_random(30),
        ]);
    }

    public function register(RegistrationRequest $request)
    {
        //dd($request);
        // Laravel validation
        //$validator = $this->validator($request->all());

        //if ($validator->fails()) {
        //    $this->throwValidationException($request, $validator);
        //}


        // Using database transactions is useful here because stuff happening is actually a transaction
        // I don't know what I said in the last line! Weird!
        DB::beginTransaction();
        try {

            $user = $this->create($request->only('name', 'email', 'password','mobile','gender'));
            $profileData = $request->only('father_name', 'mother_name', 'dob', 'nationality', 'religion_id','identity','identity_type','address');
            if ($request->hasFile('avatar')) {
                $uploadPath = public_path('/uploads/avatar');
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $fileName = rand(1111111, 9999999) . '.' . $extension;
                $request->file('avatar')->move($uploadPath, $fileName);
                $profileData['avatar'] = $fileName;
            }
            if ($request->hasFile('identity_file')) {
                $uploadPath = public_path('/uploads/identity');
                $extension = $request->file('identity_file')->getClientOriginalExtension();
                $fileName = rand(1111111, 9999999) . '.' . $extension;
                $request->file('identity_file')->move($uploadPath, $fileName);
                $profileData['identity_file'] = $fileName;
            }
            if ($request->hasFile('signature')) {
                $uploadPath = public_path('/uploads/signature');
                $extension = $request->file('signature')->getClientOriginalExtension();
                $fileName = rand(1111111, 9999999) . '.' . $extension;
                $request->file('signature')->move($uploadPath, $fileName);
                $profileData['signature'] = $fileName;
            }

            $userScheduleData = $request->only('schedule_id','exam_level_id');
            //UserSchedule table data and role number assign
//            $schedule = Schedule::find($request->input('schedule_id'));
//            $exam_code = $schedule['exam_code'];
//            $schedule_id =  $schedule['id'];
//            $totalUserThisSchedule = UserSchedule::where('schedule_id',$schedule_id)->get();
//            $tuts = $totalUserThisSchedule->count()+1;
//            $userScheduleData['role_number']=$exam_code+$tuts;

            $user->profile()->create($profileData);
            $user->user_schedule()->create($userScheduleData);
            // After creating the user send an email with the random token generated in the create method above
            $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name]));
            Mail::to($user->email)->send($email);
            DB::commit();
            $notification = array(
                'message' => 'Account activation code has been sent to your email, now activate your account!',
                //'message' => 'Your Account has been created successfully!',
                'alert-type' => 'success'
            );
            Session::flash('notification',$notification);
            return redirect('login');
        } catch (Exception $e) {
            DB::rollback();
            return back();
        }
    }
    public function verify($token)
    {
        $user = User::where("verified",0)->where('email_token',$token)->get()->toArray();
        if(empty($user)){
            $notification = array(
                'message' => 'You token is invalid or already verified.',
                'alert-type' => 'success'
            );
            Session::flash('notification',$notification);
            return redirect('login');
        }else{
            User::where('email_token',$token)->firstOrFail()->verified();
            $notification = array(
                'message' => 'Your account is activated. Please log in now.',
                'alert-type' => 'success'
            );
            Session::flash('notification',$notification);
            return redirect('login');
        }
    }

    public function getScheduleList(Request $request)
    {
        $states = DB::table("schedules")
            ->where("exam_level_id",$request->exam_level_id)
            ->where("status",'1')
            ->pluck("title","id");
        return response()->json($states);
    }

}
