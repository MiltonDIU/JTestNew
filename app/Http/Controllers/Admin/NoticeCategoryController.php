<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\NoticeCategory;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Http\Requests\NoticeCategoryRequest;

class NoticeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $noticecategory = NoticeCategory::where('title', 'LIKE', "%$keyword%")
                ->orWhere('alias', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $noticecategory = NoticeCategory::paginate($perPage);
        }

        return view('admin.notice-category.index', compact('noticecategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.notice-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(NoticeCategoryRequest $request)
    {

        $requestData = $request->all();
        $requestData['user_id'] = Auth::id();
        NoticeCategory::create($requestData);
        $notification = array(
            'message' => 'Notice Category has been  successfully created!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);


        return redirect('admin/notice-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $noticecategory = NoticeCategory::findOrFail($id);

        return view('admin.notice-category.show', compact('noticecategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $noticecategory = NoticeCategory::findOrFail($id);

        return view('admin.notice-category.edit', compact('noticecategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(NoticeCategoryRequest $request, $id)
    {

        $requestData = $request->all();
        $requestData['user_id'] = Auth::id();
        $noticecategory = NoticeCategory::findOrFail($id);
        $noticecategory->update($requestData);
        $notification = array(
            'message' => 'Notice Category has been  successfully updated!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('admin/notice-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        NoticeCategory::destroy($id);
        $notification = array(
            'message' => 'Notice Category has been  successfully deleted!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('admin/notice-category');
    }
}
