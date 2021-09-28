<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ExamLevelController;
use App\Http\Controllers\Admin\ReligionController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\NoticeCategoryController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\UserActivityController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NotifyController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\SliderController;

Route::get('/', [HomeController::class, 'index'])->name('home');



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/clear-cache', function() {
//    Artisan::call('cache:clear');
//    Artisan::call('view:clear');
//    Artisan::call('config:cache');
//    return '<h1>Cache facade value cleared</h1>';
//});
Route::get('/next-exam/{id}', [ReportController::class, 'nextExamGet']);
Route::post('/next-exam/{enrole}', [ReportController::class, 'nextExamEnrole']);

Route::group([
    'prefix' => Config("authorization.route-prefix"),
    'middleware' => ['web', 'auth']],
    function() {
        Route::group(['middleware' => Config("authorization.middleware")], function() {
            Route::get('/', [DashboardController::class, 'index']);
            Route::resource('users', UsersController::class,['except'=>[ 'create', 'store', 'show']]);
            Route::resource('roles', RolesController::class);
            Route::resource('permissions', PermissionsController::class);
            Route::resource('settings', SettingsController::class,['except' => [ 'destroy']]);
            Route::resource('exam-level', ExamLevelController::class);
            Route::resource('religion', ReligionController::class);
            Route::resource('schedule', ScheduleController::class);
            Route::resource('notice-category', NoticeCategoryController::class);
            Route::resource('notice', NoticeController::class);
            Route::resource('result', ResultController::class);
            Route::resource('gallery-category', GalleryCategoryController::class);
            Route::resource('gallery', GalleryController::class);
            Route::resource('question', QuestionController::class);
            Route::resource('contact', ContactController::class);
            Route::resource('user-activity', UserActivityController::class);
            Route::resource('slider', SliderController::class);

            //individual method
            Route::get('/readmission', [UsersController::class,'readmission']);

            Route::get('report/exam-level/{exam_id}/schedule/{id}/{alias}', [ReportController::class, 'currentExamStudentList']);
            Route::post('student-refund', [ReportController::class, 'studentRefund']);

            Route::get('student-refund', [ReportController::class, 'studentRefund']);
            Route::get('report/exam-level/{exam_id}/schedule/{id}/{alias}/admit-and-profile', [ReportController::class, 'admitAndProfile']);

            Route::get('/permissions', [PermissionsController::class, 'index']);
            Route::post('/permissions', [PermissionsController::class, 'update']);
            Route::post('/permissions/getSelectedRoutes', [PermissionsController::class,'getSelectedRoutes']);


            Route::post('exam-schedule-status', [ScheduleController::class,'examScheduleStatus']);
            Route::post('student-paid-status', [ReportController::class,'studentPaidStatus']);

            Route::get('student-list-download/exam-level/{exam_id}/schedule/{id}/download', [ReportController::class,'studentListDownload']);


            Route::get('student-list-profile/exam-level/{exam_id}/schedule/{id}/download', [ReportController::class,'studentListProfileDownload']);
            Route::get('student-list-profile/exam-level/{exam_id}/schedule/{id}/download/{min}', [ReportController::class,'studentListProfileDownloadMinMax']);
            Route::get('student-list-admit/exam-level/{exam_id}/schedule/{id}/download', [ReportController::class,'studentListAdmitDownload']);
            Route::get('student-list-admit/exam-level/{exam_id}/schedule/{id}/download/{min}', [ReportController::class,'studentListAdmitDownloadMinMax']);
            Route::get('list-of-examinees/exam-level/{exam_id}/schedule/{id}/download', [ReportController::class,'ListOfExaminees']);
             Route::get('email-send/exam-level/{exam_id}/schedule/{id}', [ReportController::class,'emailSend']);
            Route::post('email-send', 'Admin\\ReportController@emailSend');
            Route::get('signature-sheet/exam-level/{exam_id}/schedule/{id}/download', [ReportController::class,'signatureSheet']);
//
//
//
//
//
//
//
//
            Route::get('/notify/',  [NotifyController::class,'notify']);
            Route::get('/profile/{id}', [UserActivityController::class,'profile']);
            Route::get('/profile/{id}/edit', [UserActivityController::class,'profileEdit']);
            Route::get('/admit/{id}', [UserActivityController::class,'admit']);
//
//            //admin and user common method
//

            Route::get('profile/{id}/exam-level/{exam_id}/schedule/{s_id}/download', [ReportController::class,'profileDownload']);
            Route::get('/profile', [UserActivityController::class,'profile']);
//
////user profile update
            Route::get('/admit', [UserActivityController::class,'admit']);
//
            Route::get('/password/reset', [UserActivityController::class,'reset']);
            Route::post('/reset/password', [UserActivityController::class,'passwordReset']);
//
//        });

        });

        Route::get('/', [DashboardController::class, 'index']);
    });


Route::get('register/verify/{token}', [RegisterController::class,'verify']);
////login with facebook
//
//Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
//Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');

//all peoples

Route::get('/notice', [HomeController::class,'notice']);
Route::get('/notice/details/{id}/{title}', [HomeController::class,'noticeDetails']);

Route::get('result', [HomeController::class,'result']);
Route::get('result/details/{id}/{title}', [HomeController::class,'resultDetails']);
Route::get('contact', [HomeController::class,'contact']);
Route::post('result-view', [HomeController::class,'resultCheck']);
Route::post('checkResult', [HomeController::class,'checkResult']);

Route::get('syllabus', [HomeController::class,'syllabus']);
Route::get('admit', [HomeController::class,'admit']);
Route::post('admit-download', [HomeController::class,'admitDownload']);

Route::get('/admit/{id}', [UserActivityController::class,'admit']);
Route::get('/gallery', [HomeController::class,'gallery']);
Route::get('/question-answer', [HomeController::class,'questionAnswer']);


//
Route::get('get-schedule-list',[RegisterController::class,'getScheduleList']);
Route::get('get-schedule/{id}',function ($id){
    $states = DB::table("schedules")
        ->where("exam_level_id",$id)
        ->where("status",'1')
        ->pluck("title","id");
    return response()->json($states);
});
Route::post('readmission', [ScheduleController::class,'reAdmission']);
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
