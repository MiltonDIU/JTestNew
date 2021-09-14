<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::get();
            return view('admin.settings.index',compact('settings'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return redirect('/admin/settings');


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingRequest $request)
    {
        $requestData = $request->only('title','meta_keyword','meta_description','copyright','test_date','powered','content','contact','admit_message');
        if ($request->hasFile('logo')) {
            $uploadPath = public_path('/uploads/logo');
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileName = rand(1111111, 9999999) . '.' . $extension;
            $request->file('logo')->move($uploadPath, $fileName);
            $requestData['logo'] = $fileName;
        }
        if ($request->hasFile('diu_logo')) {
            $uploadPath = public_path('/uploads/logo');
            $extension = $request->file('diu_logo')->getClientOriginalExtension();
            $fileName = rand(1111111, 9999999) . '.' . $extension;
            $request->file('diu_logo')->move($uploadPath, $fileName);
            $requestData['diu_logo'] = $fileName;
        }
        if ($request->hasFile('diil_logo')) {
            $uploadPath = public_path('/uploads/logo');
            $extension = $request->file('diil_logo')->getClientOriginalExtension();
            $fileName = rand(1111111, 9999999) . '.' . $extension;
            $request->file('diil_logo')->move($uploadPath, $fileName);
            $requestData['diil_logo'] = $fileName;
        }
        if ($request->hasFile('signature')) {
            $uploadPath = public_path('/uploads/signature');
            $extension = $request->file('signature')->getClientOriginalExtension();
            $fileName = rand(1111111, 9999999) . '.' . $extension;
            $request->file('signature')->move($uploadPath, $fileName);
            $requestData['signature'] = $fileName;
        }
        $requestData['user_id']=Auth::User()->id;

        Setting::create($requestData);
        $notification = array(
            'message' => 'Site settings has been  successfully created',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('/admin/settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $settings = Setting::findOrFail($id);
        return view('admin.settings.show', compact('settings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings = Setting::findOrFail($id);
        return view('admin.settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {
        $settings = Setting::findOrFail($id);
        $requestData = $request->only('title','meta_keyword','meta_description','test_date','copyright','powered','content','contact','admit_message');
        if ($request->hasFile('logo')) {
            $uploadPath = public_path('/uploads/logo');
            $extension = $request->file('logo')->getClientOriginalExtension();
            $fileName = rand(1111111, 9999999) . '.' . $extension;
            $request->file('logo')->move($uploadPath, $fileName);
            $requestData['logo'] = $fileName;
        }
        if ($request->hasFile('diu_logo')) {
            $uploadPath = public_path('/uploads/logo');
            $extension = $request->file('diu_logo')->getClientOriginalExtension();
            $fileName = rand(1111111, 9999999) . '.' . $extension;
            $request->file('diu_logo')->move($uploadPath, $fileName);
            $requestData['diu_logo'] = $fileName;
        }
        if ($request->hasFile('diil_logo')) {
            $uploadPath = public_path('/uploads/logo');
            $extension = $request->file('diil_logo')->getClientOriginalExtension();
            $fileName = rand(1111111, 9999999) . '.' . $extension;
            $request->file('diil_logo')->move($uploadPath, $fileName);
            $requestData['diil_logo'] = $fileName;
        }
        if ($request->hasFile('signature')) {
            $uploadPath = public_path('/uploads/signature');
            $extension = $request->file('signature')->getClientOriginalExtension();
            $fileName = rand(1111111, 9999999) . '.' . $extension;
            $request->file('signature')->move($uploadPath, $fileName);
            $requestData['signature'] = $fileName;
        }
        $requestData['user_id']=Auth::User()->id;

        $settings->update($requestData);
        $notification = array(
            'message' => 'Settings has been  successfully updated',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect(Config("authorization.route-prefix") . '/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
