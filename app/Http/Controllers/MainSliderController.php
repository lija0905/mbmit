<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainSliderRequest;
use App\Models\MainSlider;
use Illuminate\Http\Request;

class MainSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = MainSlider::all();

        return view('admin.main-slider.list', [ 'slider' => $slider ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = MainSlider::find($id);

        return view('admin.main-slider.show', [ 'slide' => $slide ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = MainSlider::find($id);

        return view('admin.main-slider.edit', [ 'slide' => $slide ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MainSliderRequest $request, $id)
    {
        $slide = MainSlider::find($id);

        $slide->title= $request->title;
        $slide->naslov= $request->naslov;
        $slide->description = $request->input('description');
        $slide->opis= $request->opis;
        $slide->link= $request->link;

        if($request->has('photo')) {
            $photo = $request->file('photo');
            $fileName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME).'_'.$slide->id.'.'.$photo->extension();

            $path = $photo->storeAs('public/main-slider',$fileName);

            $slide->photo = $fileName;
        }


        $slide->save();

        return redirect()->back()->with('message', 'Slajd uspešno izmenjen!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
