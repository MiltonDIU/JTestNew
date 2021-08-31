<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Result;
use App\Schedule;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Http\Requests\ResultRequest;
use File;
class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $results = Result::all();
        return view('admin.results.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.results.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ResultRequest $request)
    {
        $requestData = $request->all();

        /*
        if ($request->hasFile('result_file')) {
            $uploadPath = public_path('/uploads/results');
            $extension = $request->file('result_file')->getClientOriginalExtension();
            $fileName = rand(1111111, 9999999) . '.' . $extension;
            $request->file('result_file')->move($uploadPath, $fileName);
            $requestData['result_file'] = $fileName;
        }
        */

        $file = $request->file('result_file');

        $filename = $file->getClientOriginalName();
        $path = 'upload/results';
        $file->move($path, $filename);
        $file = $path.'/'.$filename;
        $customerArr = $this->csvToArray($file);

       // dd($customerArr);

        for ($i = 0; $i < count($customerArr); $i++) {
            //Excel::firstOrCreate($customerArr[$i]);
            Result::create($customerArr[$i]);
        }



        //Result::create($requestData);
        $notification = array(
            'message' => 'Result file has been  successfully Uploaded!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('admin/result');
    }
    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;
        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else{



                    $find = Result::where('student_id',$row[1])->first();
                    if ($find == null){
                        $data[] = array_combine($header, $row);
                    }else{
                        $data2['allready']= $row[1];
                    }

                }
            }
            fclose($handle);
        }
        return $data;
    }
/*
    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;
        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }
    */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $result = Result::findOrFail($id);

        return view('admin.results.show', compact('result'));
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
        $result = Result::findOrFail($id);
        $schedules = Schedule::pluck('title','id');
        return view('admin.results.edit',compact('schedules','result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ResultRequest $request, $id)
    {
        $result = Result::findOrFail($id);
        $requestData = $request->all();

        if ($request->hasFile('result_file')) {
if(isset($result->result_file)){
    File::delete(public_path('/uploads/results/'.$result->result_file));
}

            $uploadPath = public_path('/uploads/results');
            $extension = $request->file('result_file')->getClientOriginalExtension();
            $fileName = rand(1111111, 9999999) . '.' . $extension;
            $request->file('result_file')->move($uploadPath, $fileName);
            $requestData['result_file'] = $fileName;
        }


        $result->update($requestData);
        $notification = array(
            'message' => 'Result file has been  successfully updated!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('admin/result');
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
        Result::destroy($id);
        $notification = array(
            'message' => 'Result file has been  successfully deleted!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('admin/result');
    }
}
