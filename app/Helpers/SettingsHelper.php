<?php
/**
 * Created by PhpStorm.
 * User: DIU
 * Date: 10/28/2017
 * Time: 9:22 AM
 */

namespace App\Helpers;
use App\Models\Gallery;
use App\Models\Notice;
use App\Models\Schedule;
use App\Models\Slider;
use App\Models\User;
use App\Models\UserSchedule;
use DB;
use App\Models\Setting;
use Auth;
use File;
class SettingsHelper
{
    public static function config(){
        $settings=Setting::first();
        $data['title']=$settings['title'];
        $data['logo']=$settings['logo'];
        $data['diu_logo']=$settings['diu_logo'];
        $data['diil_logo']=$settings['diil_logo'];
        $data['meta_keyword']=$settings['meta_keyword'];
        $data['meta_description']=$settings['meta_description'];
        $data['copyright']=$settings['copyright'];
        $data['content']=$settings['content'];
        $data['test_date']=$settings['test_date'];
        $data['powered']=$settings['powered'];
        $data['signature']=$settings['signature'];
        $data['contact']=$settings['contact'];
        $data['admit_message']=$settings['admit_message'];
        return $data;
    }
    public static function admit(){
        $user_id = Auth::id();
        $userSchedule = UserSchedule::where('user_id',$user_id)->get()->last();
        $data['status'] = $userSchedule['status'];
        $schedule=Schedule::where('status',1)->first();
        $data['yes']=$schedule['admit'];
        return $data;
    }


    public static function notice(){

        $notice = Notice::get()->where('status',1)->take(10);

        return $notice;
    }

    public static function noticeHome(){

        $notice = Notice::orderBy('created_at', 'desc')->where('status',1)->take(5)->get();

        return $notice;
    }

    public static function gallery(){
        $galleries = Gallery::orderBy('created_at', 'desc')->where('is_active',1)->take(10)->get();
        return $galleries;
    }

        public static function sliders($page_name){
        $sliders = Slider::orderBy('created_at', 'desc')->where('is_active',1)->where('page_name',$page_name)->get();
        return $sliders;
    }




//create file directory
    public static function makeFilePath($path){
        $year_path = $path.'/'.date('Y');
        if (File::exists($year_path)) {
            if (File::exists($year_path.'/'.date('m'))){
                $uploadPath = $year_path.'/'.date('m');
            }else{
                File::makeDirectory($year_path.'/'.date('m'));
                $uploadPath = $year_path.'/'.date('m');
            }
        }else{
            File::makeDirectory($year_path);
            $month_path =$year_path.'/'.date('m');
            File::makeDirectory($month_path);
            $uploadPath = $month_path;
        }
        return $uploadPath;
    }
}
