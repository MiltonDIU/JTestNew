<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Religion;
use Illuminate\Http\Request;
use App\Http\Requests\ReligionRequest;
use Session;
class ReligionController extends Controller
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
            $religion = Religion::where('title', 'LIKE', "%$keyword%")
                ->orWhere('alias', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $religion = Religion::paginate($perPage);
        }

        return view('admin.religion.index', compact('religion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.religion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ReligionRequest $request)
    {
        
        $requestData = $request->all();
        
        Religion::create($requestData);
        $notification = array(
            'message' => 'Religion has been  successfully created!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('admin/religion');
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
        $religion = Religion::findOrFail($id);

        return view('admin.religion.show', compact('religion'));
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
        $religion = Religion::findOrFail($id);

        return view('admin.religion.edit', compact('religion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ReligionRequest $request, $id)
    {
        
        $requestData = $request->all();
        
        $religion = Religion::findOrFail($id);
        $religion->update($requestData);
        $notification = array(
            'message' => 'Religion has been  successfully updated!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('admin/religion');
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
        Religion::destroy($id);
        $notification = array(
            'message' => 'Religion has been  successfully deleted!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('admin/religion');
    }
}
