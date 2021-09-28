<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SettingsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Session;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('created_at', 'desc')->get();
        //dd($notices);
        return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $userData=$request->all();
        if ($request->hasFile('img_url')) {
            //$uploadPath = public_path('/assets/uploads/avatar');
            $uploadPath = SettingsHelper::makeFilePath("upload/slider");
            $extension = $request->file('img_url')->getClientOriginalExtension();
            $fileName = $this->makeIdentity($request->ip()).$this->makeVerificationCode($request->ip()).'.' . $extension;
            $request->file('img_url')->move($uploadPath, $fileName);
            $userData['img_url'] = $uploadPath.'/'.$fileName;
        }
        Slider::create($userData);
        $notification = array(
            'message' => 'Slider has been  successfully created!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('/admin/slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {

        $requestData = $request->all();
        $slider = Slider::findOrFail($id);
        if ($request->hasFile('img_url')) {
            //$uploadPath = public_path('/assets/uploads/avatar');
            $uploadPath = SettingsHelper::makeFilePath("upload/slider");

            $extension = $request->file('img_url')->getClientOriginalExtension();
            $fileName = $this->makeIdentity($request->ip()).$this->makeVerificationCode($request->ip()).'.' . $extension;
            $request->file('img_url')->move($uploadPath, $fileName);
            $requestData['img_url'] = $uploadPath.'/'.$fileName;
            if ($slider->img_url != null) {
                $existingPath = $slider->img_url;
                if (file_exists( $existingPath)) {
                    unlink(public_path($existingPath));
                }
            }
        }
        $slider->update($requestData);
        $notification = array(
            'message' => 'Slider has been  successfully updated',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect(Config("authorization.route-prefix") . '/slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        Slider::destroy($id);
        if ($slider->img_url != null) {
            $existingPath = $slider->img_url;
            if (file_exists( $existingPath)) {
                unlink(public_path($existingPath));
            }
        }
        $notification = array(
            'message' => 'Slider Single Image has been  successfully deleted',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect(Config("authorization.route-prefix") . '/slider');
    }


    public function makeVerificationCode($ip){
        $time = time();
        $ipd=$this->removeDot($ip);
        return $time.$ipd;
    }

    public function makeIdentity($ip){
        $time = time();
        $ipd=$this->removeDot($ip);
        return $ipd.$time.$ipd;
    }
    public function removeDot($ip){
        return str_replace(".","",$ip);
    }
}
