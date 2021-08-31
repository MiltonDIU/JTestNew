<?php

namespace App\Http\Controllers\Admin;

use App\Notice;
use App\Schedule;
use App\Setting;
use App\User;
use App\UserSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class DashboardController extends Controller
{
    function index(){

        $student=User::where('role_id',2)->get()->count();
        $schedule=Schedule::all()->count();

        $cStudent = UserSchedule::with('schedule')->whereHas('schedule', function($query) {
                $query->where('status',1);
            })->get()->count();


        $totalPaidStudent = UserSchedule::where('status',1)->get()->count();

        $refundStudent = UserSchedule::where('if_refund','1')->get()->count();
        $nextExam = UserSchedule::where('if_next_exam','1')->get()->count();

        $notice = Notice::all()->count();

        $paidStudent = UserSchedule::with('schedule')->whereHas('schedule', function($query) {
            $query->where('status',1);
        })->where('status',1)->get()->count();
        $notice = Notice::all()->count();
        if(Auth::user()->role->name ==="Admin"){
            return view('admin.dashboard',compact('refundStudent','nextExam','student','cStudent','schedule','notice','paidStudent','totalPaidStudent'));
        }else{
            return view('admin.welcome');
        }

    }
}
