<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\GalleryCategory;
use App\Helpers\SettingsHelper;
use App\Http\Requests\GalleryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Session;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        //dd($notices);
        return view('admin.galleries.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery_categories = GalleryCategory::where('is_active',1)->pluck('title','id');

        return view('admin.galleries.create',compact('gallery_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $userData=$request->all();
        if ($request->hasFile('url')) {
            //$uploadPath = public_path('/assets/uploads/avatar');
            $uploadPath = SettingsHelper::makeFilePath("upload/gallery");
            $extension = $request->file('url')->getClientOriginalExtension();
            $fileName = $this->makeIdentity($request->ip()).$this->makeVerificationCode($request->ip()).'.' . $extension;
            $request->file('url')->move($uploadPath, $fileName);
            $userData['url'] = $uploadPath.'/'.$fileName;

//            if ($user->avatar != null) {
//                $existingPath = $uploadPath.'/'.$user->avatar;
//                if (file_exists( $existingPath)) {
//                    unlink(public_path($existingPath));
//                }
//            }
        }
        Gallery::create($userData);
        $notification = array(
            'message' => 'Gallery has been  successfully created!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('/admin/gallery');

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
        $gallery = Gallery::findOrFail($id);
        $gallery_categories = GalleryCategory::pluck('title','id');
        return view('admin.galleries.edit', compact('gallery_categories','gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryRequest $request, $id)
    {
        $requestData = $request->all();
        $gallery = Gallery::findOrFail($id);
        if ($request->hasFile('url')) {
            //$uploadPath = public_path('/assets/uploads/avatar');
            $uploadPath = SettingsHelper::makeFilePath("upload/gallery");

            $extension = $request->file('url')->getClientOriginalExtension();
            $fileName = $this->makeIdentity($request->ip()).$this->makeVerificationCode($request->ip()).'.' . $extension;
            $request->file('url')->move($uploadPath, $fileName);
            $requestData['url'] = $uploadPath.'/'.$fileName;
            if ($gallery->url != null) {
                $existingPath = $gallery->url;
                if (file_exists( $existingPath)) {
                    unlink(public_path($existingPath));
                }
            }
        }
        $gallery->update($requestData);
        $notification = array(
            'message' => 'Gallery has been  successfully updated',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect(Config("authorization.route-prefix") . '/gallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        Gallery::destroy($id);
        if ($gallery->url != null) {
            $existingPath = $gallery->url;
            if (file_exists( $existingPath)) {
                unlink(public_path($existingPath));
            }
        }
        $notification = array(
            'message' => 'Gallery Single Image has been  successfully deleted',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect(Config("authorization.route-prefix") . '/gallery');
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
