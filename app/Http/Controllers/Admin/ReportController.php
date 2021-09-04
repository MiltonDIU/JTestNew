<?php

namespace App\Http\Controllers\Admin;

use App\Models\Schedule;
use App\Models\UserSchedule;
use App\Models\ExamLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Mail;
use Auth;
use Session;
class ReportController extends Controller
{
 private  $email=array();
 private $subject;
    function currentExamStudentList($exam_level_id,$id){
        $userSchedule = UserSchedule::where('schedule_id',$id)->where('exam_level_id',$exam_level_id)
            ->orderBy('role_number', 'asc')->get();
        return view('admin.report.studentList',compact('userSchedule'));
    }


    function admitAndProfile($exam_level_id,$id){
        $userSchedule = UserSchedule::where('schedule_id',$id)->where('exam_level_id',$exam_level_id)->where('status',1)
            ->orderBy('role_number', 'asc')->get();
        return view('admin.report.admit-profile',compact('userSchedule'));
    }




    public function studentListDownload($exam_level_id, $id){
         $exam_level = ExamLevel::find($exam_level_id);
        $studentLists = UserSchedule::where('schedule_id',$id)->where('exam_level_id',$exam_level_id)->where('status',1)
            ->orderBy('role_number', 'asc')->get();
        $pdf = PDF::loadView('admin.report.studentListDownload',['studentLists'=>$studentLists,'exam_level'=>$exam_level]);
        //return view('admin.report.studentListDownload',compact('studentLists'));
       return $pdf->setPaper('a4')->download("StudentList.pdf");
    }
    public function ListOfExaminees($exam_level_id, $id){
        $studentLists = UserSchedule::where('schedule_id',$id)->where('exam_level_id',$exam_level_id)->where('status',1)->orderBy('role_number', 'asc')->get();
return view('admin/report/ListOfExaminees',compact('studentLists'));
    }
    public function studentListProfileDownload($exam_level_id, $schedule_id_id){
        $studentLists = UserSchedule::where('schedule_id',$schedule_id_id)->where('exam_level_id',$exam_level_id)->where('status',1)
            ->orderBy('role_number', 'asc')->get();
             if($studentLists->count() > 0){
//               return view('admin.report.studentListProfileDownload',compact('studentLists'));
                 $pdf = PDF::loadView('admin.report.studentListProfileDownload',compact('studentLists'));
        return $pdf->setPaper('a4')->download($studentLists->first()->exam_level->title.'__'.$studentLists->first()->schedule->title.'.pdf');
             }else{
                    $notification = array(
                        'message' => 'Not found paid students in this exam sessions.!',
                        'alert-type' => 'success'
                    );
                    Session::flash('notification',$notification);
                    return redirect()->back();
             }


    }

    public function studentListProfileDownloadMinMax($exam_level_id, $schedule_id_id,$min){
        $max = $min+49;
        $studentLists = UserSchedule::where('schedule_id',$schedule_id_id)->where('exam_level_id',$exam_level_id)->where('status',1)->whereBetween('role_number',[$min,$max])
            ->orderBy('role_number', 'asc')->get();
        if($studentLists->count() > 0){
//               return view('admin.report.studentListProfileDownload',compact('studentLists'));
            $pdf = PDF::loadView('admin.report.studentListProfileDownload',compact('studentLists'));
            return $pdf->setPaper('a4')->download($studentLists->first()->exam_level->title.'__'.$studentLists->first()->schedule->title.'.pdf');
        }else{
            $notification = array(
                'message' => 'Not found paid students in this exam sessions.!',
                'alert-type' => 'success'
            );
            Session::flash('notification',$notification);
            return redirect()->back();
        }

    }

    public function studentListAdmitDownload($exam_level_id, $schedule_id_id){
        $studentLists = UserSchedule::where('schedule_id',$schedule_id_id)->where('exam_level_id',$exam_level_id)->where('status',1)
            ->orderBy('role_number', 'asc')->get();
        if($studentLists->count() > 0){
//               return view('admin.report.studentListAdmitDownload',compact('studentLists'));
            $pdf = PDF::loadView('admin.report.studentListAdmitDownload',compact('studentLists'));
            return $pdf->setPaper('a4')->download($studentLists->first()->exam_level->title.'__'.$studentLists->first()->schedule->title.'.pdf');
        }else{
            $notification = array(
                'message' => 'Not found paid students in this exam sessions.!',
                'alert-type' => 'success'
            );
            Session::flash('notification',$notification);
            return redirect()->back();
        }
    }

    public function studentListAdmitDownloadMinMax($exam_level_id, $schedule_id_id,$min){
        $max = $min+49;
        $studentLists = UserSchedule::where('schedule_id',$schedule_id_id)->where('exam_level_id',$exam_level_id)->where('status',1)->whereBetween('role_number',[$min,$max])
            ->orderBy('role_number', 'asc')->get();
        if($studentLists->count() > 0){
//               return view('admin.report.studentListAdmitDownload',compact('studentLists'));
            $pdf = PDF::loadView('admin.report.studentListAdmitDownload',compact('studentLists'));
            return $pdf->setPaper('a4')->download($studentLists->first()->exam_level->title.'__'.$studentLists->first()->schedule->title.'.pdf');
        }else{
            $notification = array(
                'message' => 'Not found paid students in this exam sessions.!',
                'alert-type' => 'success'
            );
            Session::flash('notification',$notification);
            return redirect()->back();
        }
    }




    //public function emailSend($exam_level_id, $schedule_id_id){
    public function emailSend(Request $request){

        $this->subject = $request->input('subject');
        $studentLists = UserSchedule::where('schedule_id',$request->input('schedule'))->where('exam_level_id',$request->input('exam_level'))->get();
       // dd($studentLists);
        $data = array(
            'message2' => $request->input('message'),
            'subject' => $request->input('subject'),
        );
        foreach ($studentLists as $list){
            $this->email[]= $list->user->email;
        }
        Mail::send('emails.sendEmail', $data, function ($message) {
            $message->from('milton2913@gmail.com', 'J-Test');
            $message->to($this->email)->subject($this->subject);
        });

        $notification = array(
            'message' => 'Email has been  successfully Send!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return back();

    }

    public function signatureSheet($exam_level_id, $id){
  $exam_level = ExamLevel::find($exam_level_id);
        $studentLists = UserSchedule::where('schedule_id',$id)->where('exam_level_id',$exam_level_id)->where('status',1)
            ->orderBy('role_number', 'asc')->get();
        $schedule = Schedule::where('status',1)->first();
        $pdf = PDF::loadView('admin.report.signatureSheet',compact('schedule','studentLists','exam_level'));

        //return view('admin.report.signatureSheet',compact('studentLists','schedule','exam_level'));
        return $pdf->setPaper('a4')->download("signature-sheet.pdf");
    }
    public function profileDownload($user_id,$exam_level_id,$id){

       if(Auth::User()->role_id > 1){
           $user_id = Auth::User()->id;
                }

        $student = UserSchedule::where('schedule_id',$id)->where('exam_level_id',$exam_level_id)->where('user_id',$user_id)->get()->last();
//       return view('admin.report.profileDownload',compact('student'));
        $pdf = PDF::loadView('admin.report.profileDownload',compact('student'));
        return $pdf->setPaper('a4')->download("$student->role_number.pdf");
    }



    function studentPaidStatus(Request $request)
    {

        $data = UserSchedule::find($request->input('id'));

               if (!is_null($data)) {
            if ($data->status == 1) {
                $data->status = '0';
                $data->save();
                $notification = array(
                    'message' => 'Student did not paid!',
                    'alert-type' => 'success'
                );
                Session::flash('notification',$notification);
            } else {

//generate roll number
if ($data->role_number==null){
            $schedule = Schedule::find($request->input('schedule_id'));
            $exam_code = $request->input('exam_code');
            $schedule_id =  $schedule['id'];
            $totalUserThisSchedule = UserSchedule::where('schedule_id',$schedule_id)->where('role_number','!=',null)->get();
            $tuts = $totalUserThisSchedule->count()+1;
            $data->role_number=$exam_code+$tuts;
}

//end of generate roll number
            $data->status = '1';
            $data->save();
                $notification = array(
                    'message' => 'Student paid successfully, now if admit card is ready then download!',
                    'alert-type' => 'success'
                );
                Session::flash('notification',$notification);
            }
        } else {
                   $notification = array(
                       'message' => 'Student not found!',
                       'alert-type' => 'success'
                   );
                   Session::flash('notification',$notification);
        }
        return back();
    }


    function studentRefund(Request $request)
    {

        $data = UserSchedule::find($request->input('id'));
        if ($data) {
            $refund = array();
            if ($data->status != '1') {
                $notification = array(
                    'message' => 'Student did not paid!',
                    'alert-type' => 'success'
                );
                Session::flash('notification',$notification);
            } else {
                if ($data->if_refund=='0'){
                    $refund['if_refund'] ='1';
                    $notification = array(
                        'message' => 'The student refund was tracked and he was removed from the list of students who said yes',
                        'alert-type' => 'success'
                    );
                }else{
                    $refund['if_refund'] = 0;
                    $notification = array(
                        'message' => 'The student refund cancel was tracked and he was add from the list of students who said yes',
                        'alert-type' => 'success'
                    );
                }
                $data->update($refund);
                Session::flash('notification',$notification);
            }
        } else {
            $notification = array(
                'message' => 'Student not found!',
                'alert-type' => 'success'
            );
            Session::flash('notification',$notification);
        }
        return back();
    }
public function nextExamGet($id){
        $userSchedule = UserSchedule::find($id);
        $schedules = Schedule::with('exam_level')->where('status','1')->get();
    echo '<form class="form-horizontal" action="'.url('next-exam/enrole').'" method="post"><div class"row">';
echo '<input type="hidden" name="_token" value="'.csrf_token().'">';
echo '<input type="hidden" name="user_id" value="'.$userSchedule->user_id.'">';
echo '<input type="hidden" name="user_schedule_id" value="'.$userSchedule->id.'">';

  echo '<div class="col-md-8"><select class="form-control col-lg-8" id="schedule_id" name="schedule">';
    foreach ($schedules as $schedule){
        $value = $schedule->title.'('.$schedule->exam_level['title'].')';
        echo "<option value='".$schedule->id.'_'.$schedule->exam_level['id']."'>$value</option>";
    }
  echo '</select></div><div class="col-md-2"><button class="btn btn-primary" type="submit">Save</button></div></div></form>';
}





    public function nextExamEnrole(Request $request){

        $user_schedule_id = $request->input('user_schedule_id');
        $userSchedule = UserSchedule::find($user_schedule_id);
        $schedule = $request->input('schedule');
        $split = explode("_", $schedule);
        $userScheduleData['schedule_id'] = $split[0];
        $userScheduleData['exam_level_id'] = $split[1];
        $userScheduleData['user_id'] = $request->input('user_id');
        $userScheduleData['previous_schedule'] = $userSchedule->schedule_id;

        $new = UserSchedule::create($userScheduleData);
        $data['next_schedule']=$new->schedule_id;
        $data['if_next_exam'] = '1';
        $userSchedule->update($data);
        if ($new){
            $notification = array(
                'message' => 'Student shifted next exam date',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Student not shifted next exam date',
                'alert-type' => 'success'
            );
        }
        Session::flash('notification',$notification);
        return back();
    }

}
