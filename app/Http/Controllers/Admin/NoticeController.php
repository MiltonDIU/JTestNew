<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use App\Models\NoticeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::orderBy('created_at', 'desc')->get();
        //dd($notices);
        return view('admin.notices.index',compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notice_categories = NoticeCategory::where('status',1)->pluck('title','id');

        return view('admin.notices.create',compact('notice_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeRequest $request)
    {
         $requestData = $request->only('title','alias','content','status','notice_category_id');
        $requestData['user_id']= Auth::id();
        Notice::create($requestData);
        $notification = array(
            'message' => 'Notice has been  successfully created!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('/admin/notice');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Notice::findOrFail($id);

        return view('admin.notices.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::findOrFail($id);
        $notice_categories = NoticeCategory::pluck('title','id');
        return view('admin.notices.edit', compact('notice','notice_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoticeRequest $request, $id)
    {
        $requestData = $request->all();
        $notice = Notice::findOrFail($id);
        $requestData['user_id']=Auth::id();
        $notice->update($requestData);
        $notification = array(
            'message' => 'Notice has been  successfully updated',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect(Config("authorization.route-prefix") . '/notice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notice::destroy($id);
        $notification = array(
            'message' => 'Notice has been  successfully deleted',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect(Config("authorization.route-prefix") . '/notice');
    }
}
