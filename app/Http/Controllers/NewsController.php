<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\NewsRequest;
use App\Models\GalleryPhoto;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_news = News::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.news.list', [ 'all_news' => $all_news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $news = News::create($request->all());

        if ($request->has('photo')) $news->photo = Helper::storePhoto($request->file("photo"), $news->id, "news");
        if ($request->has('photos'))  $this->uploadPhotos($request->file('photos'), $news->id);

        $news->save();

        return redirect()->back()->with('message', 'Vest uspešno dodata!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);

        return view('admin.news.show', [ 'news' => $news ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);

        return view('admin.news.edit', [ 'news'=>$news ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $news = News::find($id);

        $news->title= $request->title;
        $news->naslov= $request->naslov;
        $news->content= $request->input('content');
        $news->sadrzaj= $request->sadrzaj;

        if ($request->has('photo')) {
            //if photo already exists, first remove from storage old one, and then upload new one
            if (isset($news->photo)) Helper::removePhoto($news->photo, "news");
            $news->photo = Helper::storePhoto($request->file('photo'), $news->id, "news");
        }

        if ($request->has('photos'))  $this->uploadPhotos($request->file('photos'), $news->id);

        $news->save();

        return redirect()->back()->with('message', 'Vest uspešno izmenjena!');
    }

    public function destroyPhoto(Request $request) {

        $id = $request->input("news_id");
        $news = News::find($id);

        Helper::removePhoto($news->photo, "news");

        $news->photo = null;
        $news->save();

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
        $news = News::find($id);

        foreach ($news->photos as $photo) {
            Helper::removePhoto($photo->photo, "gallery/news");
        }

        Helper::removePhoto($news->photo, "news");

        News::destroy($id);

        return redirect()->back()->with('message', 'Vest uspešno obrisana!');
    }

    protected function uploadPhotos($photos, $news_id) {

        foreach ($photos as $photo) {
            $fileName = Helper::storePhoto($photo, $news_id, "gallery/news");

            GalleryPhoto::create([
                "news_id" => $news_id,
                "photo" => $fileName
            ]);

        }
    }
}
