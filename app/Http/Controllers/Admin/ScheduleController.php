<?php

namespace App\Http\Controllers\Admin;

use App\Models\ExamLevel;
use App\Http\Requests\ScheduleRequest;
use App\Models\Schedule;
use App\Models\User;
use App\Models\UserSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use PDF;
class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::orderBy('created_at', 'desc')->paginate(10);
$exam_level = ExamLevel::where('status',1)->get();
        return view('admin.schedule.index',compact('schedules','exam_level'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
$examLevels = ExamLevel::pluck('title','id');
        return view('admin.schedule.create',compact('examLevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        $requestData = $request->getData();

        Schedule::create($requestData);
        $notification = array(
            'message' => 'Exam Schedule has been  successfully created',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('/admin/schedule');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('admin.schedule.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $examLevels = ExamLevel::pluck('title','id');
        $schedule = Schedule::findOrFail($id);
        //dd($schedule);
        return view('admin.schedule.edit', compact('schedule','examLevels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, $id)
    {
        $requestData = $request->getData();
        $schedule = Schedule::findOrFail($id);

        $schedule->update($requestData);
        $notification = array(
            'message' => 'Exam Schedule has been  successfully updated',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect(Config("authorization.route-prefix") . '/schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Schedule::destroy($id);
        $notification = array(
            'message' => 'Exam Schedule has been  successfully deleted',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect(Config("authorization.route-prefix") . '/schedule');
    }


    function examScheduleStatus(Request $request){
        if($request->ajax()){
            $data = Schedule::find($request->idea_id);
            if (!is_null($data)) {
               if ($data->status==1){
                   $data->status = 0;
                   $data->save();
                   return "Not Active";
               }else{
                   $data->status = 1;
                   $data->save();
                   return "Active";
               }
            }
        }
        /*if($request->ajax()){
            $data = Schedule::find($request->idea_id);
            if (!is_null($data)) {
                $allSchedule = Schedule::all();
                foreach ($allSchedule as $all){
                    $all->status = 0;
                    $all->save();
                }
                $data->status = 1;
                $data->save();
                return "Active";
            }else{
                return "not found!";
            }
        }*/
    }
    public function getScheduleList(Request $request)
    {
        $states = DB::table("schedules")
            ->where("exam_level_id",$request->exam_level_id)
            ->where("status",'1')
            ->pluck("title","id");
        return response()->json($states);
    }

    public function reAdmission(Request $request){

        $userScheduleData = $request->only('schedule_id','exam_level_id');
        $user_id = $request->input('user_id');
        $user = User::find($user_id);


//        $schedule = Schedule::find($request->input('schedule_id'));
//        $exam_code = $schedule['exam_code'];
//        $schedule_id =  $schedule->id;
//        $totalUserThisSchedule = UserSchedule::where('schedule_id',$schedule_id)->get();
//        $tuts = $totalUserThisSchedule->count()+1;
//        $userScheduleData['role_number']=$exam_code+$tuts;


$already_reg = UserSchedule::where('user_id',$user_id)
    ->where('exam_level_id',$request->input('exam_level_id'))
    ->where('schedule_id',$request->input('schedule_id'))
    ->first();
if ($already_reg!=null){
    $notification = array(
        'message' => 'Student already registered for this exam level under same schedule',
        'alert-type' => 'success'
    );
    Session::flash('notification',$notification);
     return redirect(Config("authorization.route-prefix") . '/readmission');
}else{
    $user->user_schedule()->create($userScheduleData);
    $notification = array(
        'message' => 'Registration Successful',
        'alert-type' => 'success'
    );
    Session::flash('notification',$notification);
    return redirect(Config("authorization.route-prefix") . '/readmission');
}

    }
}

