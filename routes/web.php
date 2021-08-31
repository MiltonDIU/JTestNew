<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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
//Route::get('/home', 'HomeController@index');
//
//Route::get('/clear-cache', function() {
//    Artisan::call('cache:clear');
//    Artisan::call('view:clear');
//    Artisan::call('config:cache');
//    return '<h1>Cache facade value cleared</h1>';
//});
//Route::get('/next-exam/{id}', 'Admin\\ReportController@nextExamGet');
//Route::post('/next-exam/enrole', 'Admin\\ReportController@nextExamEnrole');
//
//Route::group([
//    'prefix' => Config("authorization.route-prefix"),
//    'middleware' => ['web', 'auth']],
//    function() {
//        Route::group(['middleware' => Config("authorization.middleware")], function() {
//            Route::resource('users', 'Admin\\UsersController', ['except' => [
//                'create', 'store', 'show'
//            ]]);
//            Route::resource('roles', 'Admin\\RolesController');
//            Route::get('/permissions', 'Admin\\PermissionsController@index');
//            Route::post('/permissions', 'Admin\\PermissionsController@update');
//            Route::post('/permissions/getSelectedRoutes', 'Admin\\PermissionsController@getSelectedRoutes');
//            Route::get('/password/reset', 'Admin\\UsersController@reset');
//            Route::resource('settings', 'Admin\\SettingsController',['except' => [ 'destroy']]);
//            Route::resource('schedule', 'Admin\\ScheduleController');
//            Route::get('student', 'Admin\\ScheduleController@student');
//            Route::resource('results', 'Admin\\ResultController1');
//            Route::resource('notice', 'Admin\\NoticeController');
//            Route::post('exam-schedule-status', 'Admin\\ScheduleController@examScheduleStatus');
//            Route::post('student-paid-status', 'Admin\\ReportController@studentPaidStatus');
//            Route::post('student-refund', 'Admin\\ReportController@studentRefund');
//            Route::get('report/exam-level/{exam_id}/schedule/{id}/{alias}', 'Admin\\ReportController@currentExamStudentList');
//            Route::get('report/exam-level/{exam_id}/schedule/{id}/{alias}/admit-and-profile', 'Admin\\ReportController@admitAndProfile');
//            Route::get('student-list-download/exam-level/{exam_id}/schedule/{id}/download', 'Admin\\ReportController@studentListDownload');
//            Route::get('student-list-profile/exam-level/{exam_id}/schedule/{id}/download', 'Admin\\ReportController@studentListProfileDownload');
//            Route::get('student-list-profile/exam-level/{exam_id}/schedule/{id}/download/{min}', 'Admin\\ReportController@studentListProfileDownloadMinMax');
//            Route::get('student-list-admit/exam-level/{exam_id}/schedule/{id}/download', 'Admin\\ReportController@studentListAdmitDownload');
//            Route::get('student-list-admit/exam-level/{exam_id}/schedule/{id}/download/{min}', 'Admin\\ReportController@studentListAdmitDownloadMinMax');
//            Route::get('list-of-examinees/exam-level/{exam_id}/schedule/{id}/download', 'Admin\\ReportController@ListOfExaminees');
//            // Route::get('email-send/exam-level/{exam_id}/schedule/{id}', 'Admin\\ReportController@emailSend');
//            Route::post('email-send', 'Admin\\ReportController@emailSend');
//            Route::get('signature-sheet/exam-level/{exam_id}/schedule/{id}/download', 'Admin\\ReportController@signatureSheet');
//            Route::resource('result', 'Admin\\ResultController');
//
//            Route::resource('/exam-level', 'Admin\\ExamLevelController');
//            Route::resource('/notice-category', 'Admin\\NoticeCategoryController');
//            Route::resource('/gallery-category', 'Admin\GalleryCategoryController');
//            Route::resource('/gallery', 'Admin\GalleryController');
//            Route::resource('/question', 'Admin\QuestionController');
//            Route::resource('/religion', 'Admin\\ReligionController');
//            Route::resource('/contact', 'Admin\\ContactController');
//            Route::get('/notify/',  'Admin\\NotifyController@notify');
//            Route::get('/profile/{id}', 'Admin\\UserActivityController@profile');
//            Route::get('/profile/{id}/edit', 'Admin\\UserActivityController@profileEdit');
//            Route::get('/admit/{id}', 'Admin\\UserActivityController@admit');
//
//            //admin and user common method
//            Route::get('/readmission', 'Admin\\UsersController@readmission');
//
//
//
//
//            Route::get('profile/{id}/exam-level/{exam_id}/schedule/{s_id}/download', 'Admin\\ReportController@profileDownload');
//            Route::get('/profile', 'Admin\\UserActivityController@profile');
//
////user profile update
//            Route::get('/admit', 'Admin\\UserActivityController@admit');
//            Route::resource('user-activity', 'Admin\\UserActivityController');
//            Route::get('/password/reset', 'Admin\\UserActivityController@reset');
//            Route::post('/reset/password', 'Admin\\UserActivityController@passwordReset');
//
//        });
//        Route::get('/', 'Admin\\DashboardController@index');
//    });
//
//
//Route::get('register/verify/{token}', 'Auth\RegisterController@verify');
////login with facebook
//
//Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
//Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');

//all peoples

//Route::get('notice', 'HomeController@notice');
//Route::get('notice/details/{id}/{title}', 'HomeController@noticeDetails');
//Route::get('result', 'HomeController@result');
//Route::get('result/details/{id}/{title}', 'HomeController@resultDetails');
//Route::get('contact', 'HomeController@contact');
//Route::post('checkResult', 'HomeController@checkResult');
//Route::post('result-view', 'HomeController@resultCheck');
//Route::get('syllabus', 'HomeController@syllabus');
//Route::get('admit', 'HomeController@admit');
//Route::post('admit-download', 'HomeController@admitDownload');
//Route::get('/admit/{id}', 'Admin\\UserActivityController@admit');
//Route::get('gallery', 'HomeController@gallery');
//Route::get('question-answer', 'HomeController@questionAnswer');
//
//Route::get('get-schedule-list','Auth\RegisterController@getScheduleList');
//Route::get('get-schedule/{id}',function ($id){
//    $states = DB::table("schedules")
//        ->where("exam_level_id",$id)
//        ->where("status",'1')
//        ->pluck("title","id");
//    return response()->json($states);
//});
//
//Route::post('readmission', 'Admin\\ScheduleController@reAdmission');
