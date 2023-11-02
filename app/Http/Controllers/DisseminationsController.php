<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\DisseminationsRequest;
use App\Models\Disseminations;
use App\Models\GalleryPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DisseminationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disseminations = Disseminations::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.disseminations.list', ['disseminations' => $disseminations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.disseminations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisseminationsRequest $request)
    {
        $dissemination = Disseminations::create($request->all());

        if ($request->has('photo')) $dissemination->photo = Helper::storePhoto($request->file('photo'), $dissemination->id, "disseminations");
        if ($request->has('photos'))  $this->uploadPhotos($request->file('photos'), $dissemination->id);

        $dissemination->save();

        return redirect()->back()->with('message', 'Diseminacija uspešno dodata!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dissemination = Disseminations::find($id);

        return  view('admin.disseminations.show', [ 'dissemination' => $dissemination ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dissemination = Disseminations::find($id);

        return  view('admin.disseminations.edit', [ 'dissemination' => $dissemination ]);
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
        $dissemination = Disseminations::find($id);

        $dissemination->title= $request->title;
        $dissemination->naslov= $request->naslov;
        $dissemination->content= $request->input('content');
        $dissemination->sadrzaj= $request->sadrzaj;
        $dissemination->video= $request->video;
        $dissemination->link = $request->link;

        if($request->has('photo')) {
            //if photo already exists, first remove from storage old one, and then upload new one
            if(isset($dissemination->photo)) Helper::removePhoto($dissemination->photo, "disseminations");
            $dissemination->photo = Helper::storePhoto($request->file('photo'), $dissemination->id, "disseminations");
        }
        if ($request->has('photos')) $this->uploadPhotos($request->file('photos'), $dissemination->id);

        $dissemination->save();

        return redirect()->back()->with('message', 'Diseminacija uspešno izmenjena!');
    }

    public function destroyPhoto(Request $request) {

        $id = $request->input("dissemination_id");
        $dissemination = Disseminations::find($id);

        Helper::removePhoto($dissemination->photo, "disseminations");

        $dissemination->photo = null;
        $dissemination->save();

        return response()->json(['success' => 'true', 'message' => "Slika uspešno izbrisana!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $dissemination = Disseminations::find($id);

        //remove all photos from Storage
        foreach ($dissemination->photos as $photo) {
            Helper::removePhoto($photo->photo, "gallery/disseminations");
        }
        //remove cover photo from Storage
        Helper::removePhoto($dissemination->photo, "disseminations");

        Disseminations::destroy($id);

        return redirect()->back()->with('message', 'Diseminacija uspešno obrisana!');
    }

    protected function uploadPhotos($photos, $dissemination_id) {

        foreach ($photos as $photo) {
            $fileName = Helper::storePhoto($photo, $dissemination_id, 'gallery/disseminations');

            GalleryPhoto::create([
                "dissemination_id" => $dissemination_id,
                "photo" => $fileName
            ]);

        }
    }
}
