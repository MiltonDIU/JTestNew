<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ExamLevel;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Http\Requests\ExamLevelRequest;

class ExamLevelController extends Controller
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
            $exam_level = ExamLevel::where('title', 'LIKE', "%$keyword%")
                ->orWhere('alias', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $exam_level = ExamLevel::paginate($perPage);
        }

        return view('admin.exam-level.index', compact('exam_level'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.exam-level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ExamLevelRequest $request)
    {
        
        $requestData = $request->all();
        
        ExamLevel::create($requestData);
        $notification = array(
            'message' => 'Exam Level has been  successfully created!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);

        return redirect('admin/exam-level');
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
        $exam_level = ExamLevel::findOrFail($id);

        return view('admin.exam-level.show', compact('exam_level'));
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
        $exam_level = ExamLevel::findOrFail($id);

        return view('admin.exam-level.edit', compact('exam_level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ExamLevelRequest $request, $id)
    {
        
        $requestData = $request->all();
        
        $exam_level = ExamLevel::findOrFail($id);
        $exam_level->update($requestData);

        $notification = array(
            'message' => 'Exam Level has been  successfully updated!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);

        return redirect('admin/exam-level');
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
        ExamLevel::destroy($id);
        $notification = array(
            'message' => 'Exam Level has been  successfully deleted!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);

        return redirect('admin/exam-level');
    }
}
