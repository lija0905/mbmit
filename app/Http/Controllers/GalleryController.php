<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\GalleriesRequest;
use App\Models\Gallery;
use App\Models\GalleryPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.gallery.list', [ 'galleries' => $galleries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleriesRequest $request)
    {
        $gallery = Gallery::create($request->all());

        if ($request->has('photos')) $this->uploadPhotos($request->file('photos'), $gallery->id);

        return redirect()->back()->with('message', 'Galerija uspešno dodata!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::find($id);

        return view('admin.gallery.show', [ 'gallery' => $gallery ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);

        return view('admin.gallery.edit', [ 'gallery' => $gallery ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);

        $gallery->title= $request->title;
        $gallery->naziv= $request->naziv;
        $gallery->description= $request->input('description');
        $gallery->opis= $request->opis;

        if ($request->has('photos')) $this->uploadPhotos($request->file('photos'), $gallery->id);

        $gallery->save();

        return redirect()->back()->with('message', 'Galerija uspešno izmenjena!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        foreach ($gallery->photos as $photo) {
            Helper::removePhoto($photo->photo, "gallery/gallery" );
        }

        Gallery::destroy($id);

        return redirect()->back()->with('message', 'Galerija uspešno obrisana!');
    }

    protected function uploadPhotos($photos, $gallery_id) {

        foreach ($photos as $photo) {
            $fileName = Helper::storePhoto($photo, $gallery_id, "gallery/gallery");

            GalleryPhoto::create([
                "gallery_id" => $gallery_id,
                "photo" => $fileName
            ]);

        }
    }
}
