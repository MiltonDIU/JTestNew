<?php

namespace App\Http\Controllers;

use App\Models\ExamLevel;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Http\Requests\AdmitCardRequest;
use App\Http\Requests\StudentResultRequest;
use App\Models\Notice;
use App\Models\Profile;
use App\Models\Question;
use App\Models\Result;
use App\Models\Schedule;
use App\Models\UserSchedule;
use Illuminate\Http\Request;
use Validator;
use Session;
use PDF;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('theme.home');
    }
    public function contact()
    {

        return view('theme.contact');
    }
    public function notice(){
        $notices = Notice::where('status',1)->orderBy('created_at', 'desc')->get();
        return view('theme.notice',compact('notices'));
    }
    public function noticeDetails($id){
        $notice = Notice::findOrFail($id);
        $notices = Notice::where('status',1)->where('notice_category_id',1)->orderBy('created_at', 'desc')->get()->take(5);
        $notices2 = Notice::where('status',1)->orderBy('created_at', 'desc')->get()->take(5);
        return view('theme.noticeDetails',compact('notice','notices','notices2'));
    }

    public function result(){
        //$result = Result::where('status',1)->orderBy('created_at', 'desc')->get();
        //return view('theme.result',compact('result'));

        return view('theme.result.index');
    }
    public function syllabus(){
               return view('theme.syllabus');
    }
    public function resultDetails($id){
        $result = Result::findOrFail($id);
        return view('theme.resultDetails',compact('result'));
    }

    public function checkResult(Request $request){
        $id=$request->input('studentId');
        $row = Result::where('student_id',$id)->first();
        $id = $row->id;
        $userData = Result::find($id);
            $data['status'] = 'ok';
            $data['result'] = $userData;
            $data['type'] = gettype($userData);
        echo json_encode($data);

    }
    public function resultCheck(StudentResultRequest $request){
        $studentId=$request->input('studentId');
        $year=$request->input('testYear');
        $dobYear=$request->input('dobYear');
        $dobMonth=$request->input('dobMonth');
        $dobDay=$request->input('dobDay');
        $row = Result::where('student_id',$studentId)->where('dob_day',$dobDay)->where('dob_month',$dobMonth)->where('dob_year',$dobYear)->where('test_year',$year)->first();


        if($row==null){
            $notification = array(
                'message' => 'Data not found!',
                'alert-type' => 'success'
            );
            Session::flash('notification',$notification);

           return redirect('result');
        }else{
            return view('theme.result.show',compact('row'));
        }

    }

    public function admit(){
        //$examLevel = ExamLevel::where('status','1')->get();
//        return view('theme.admit',compact('examLevel'));
        return view('theme.admit_card_form');
    }


    public function admitDownload(AdmitCardRequest $request){
        $identity=$request->input('identity');
        $year=$request->input('testYear');
        $dobYear=$request->input('dobYear');
        $dobMonth=$request->input('dobMonth');
        $dobDay=$request->input('dobDay');
        $date_of_birth = "$dobYear-$dobMonth-$dobDay";
        $row = Profile::where('identity',$identity)->where('dob',$date_of_birth)->first();
        //dd($row);
        //$row = Profile::where('identity',$identity)->where('dob_day',$dobDay)->where('dob_month',$dobMonth)->where('dob_year',$dobYear)->where('test_year',$year)->first();


        if($row==null){
            $notification = array(
                'message' => 'Data not found!',
                'alert-type' => 'success'
            );
            Session::flash('notification',$notification);
            return redirect('admit');
        }else{
            $user_id= $row->user_id;
            $admit = UserSchedule::where('user_id',$user_id)->where('status',1)->get()->last();

            if ($admit===null){
                $notification = array(
                    'message' => 'Data not found!',
                    'alert-type' => 'success'
                );
                Session::flash('notification',$notification);
                return redirect('admit');
            }else{

                $schedule=Schedule::where('id',$admit->schedule_id)->where('admit','1')->get()->last();

                if ($schedule){
                    $pdf = PDF::loadView('admin.report.admit',['admit'=>$admit]);
                    return  $pdf->setPaper('a4')->download("$admit->role_number.pdf");
                }else{
                    $notification = array(
                        'message' => 'Your admit cart currently not generate!',
                        'alert-type' => 'success'
                    );
                    Session::flash('notification',$notification);
                    return redirect('admit');
                }

            }

        }

    }




    public function gallery(){
        $galleryCategory = GalleryCategory::where('is_active','1')->orderBy('created_at','desc')->get();
        return view('theme.gallery',compact('galleryCategory'));
    }

    public function questionAnswer(){
        $questions = Question::where('is_active','1')->orderBy('created_at','desc')->get();
        return view('theme.question_answer',compact('questions'));
    }
}
