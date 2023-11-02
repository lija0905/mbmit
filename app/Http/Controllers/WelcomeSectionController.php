<?php

namespace App\Http\Controllers;

use App\Http\Requests\WelcomeSectionRequest;
use App\Models\WelcomeSection;
use Illuminate\Http\Request;

class WelcomeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section = WelcomeSection::all();

        return view('admin.welcome-section.list', [ 'section' => $section ]);
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
        $section = WelcomeSection::find($id);

        return view('admin.welcome-section.show', [ 'section' => $section ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = WelcomeSection::find($id);

        return view('admin.welcome-section.edit', [ 'section' => $section ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WelcomeSectionRequest $request, $id)
    {
        $slide = WelcomeSection::find($id);

        $slide->title= $request->title;
        $slide->naslov= $request->naslov;
        $slide->description = $request->input('description');
        $slide->opis= $request->opis;

        $slide->save();

        return redirect()->back()->with('message', 'Tekst uspešno izmenjen!');
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
