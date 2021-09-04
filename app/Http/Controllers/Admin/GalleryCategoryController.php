<?php

namespace App\Http\Controllers\Admin;

use App\Models\GalleryCategory;
use App\Http\Requests\GalleryCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Gallery;
class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $galleryCategory = GalleryCategory::where('title', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('is_active', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $galleryCategory = GalleryCategory::paginate($perPage);
        }

        return view('admin.gallery-category.index', compact('galleryCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryCategoryRequest $request)
    {
        $requestData = $request->all();
        GalleryCategory::create($requestData);
        $notification = array(
            'message' => 'Gallery Category has been  successfully created!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('admin/gallery-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $galleryCategory = GalleryCategory::with('gallery')->findOrFail($id);
        return view('admin.gallery-category.show', compact('galleryCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleryCategory = GalleryCategory::findOrFail($id);

        return view('admin.gallery-category.edit', compact('galleryCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryCategoryRequest $request, $id)
    {
        $requestData = $request->all();
        $galleryCategory = GalleryCategory::findOrFail($id);
        $galleryCategory->update($requestData);
        $notification = array(
            'message' => 'Gallery Category has been  successfully updated!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('admin/gallery-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galleries = GalleryCategory::findOrFail($id);
        if ($galleries->gallery->count()>0){
            foreach ($galleries->gallery as $gallery){
                if ($gallery->url != null) {
                    $existingPath = $gallery->url;
                    if (file_exists( $existingPath)) {
                        unlink(public_path($existingPath));
                    }
                }
            }
        }
        GalleryCategory::destroy($id);
        $notification = array(
            'message' => 'Gallery Category has been  successfully deleted!',
            'alert-type' => 'success'
        );
        Session::flash('notification',$notification);
        return redirect('admin/gallery-category');
    }
}
