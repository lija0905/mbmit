<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\ProjectsRequest;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.projects.list', ["projects" => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectsRequest $request)
    {

        $project = Projects::create($request->all());

        if($request->has('photo')) $project->photo = Helper::storePhoto($request->file('photo'), $project->id, "projects");

        $project->save();

        return redirect()->back()->with('message', 'Projekat uspešno dodat!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Projects::find($id);

        return  view('admin.projects.show', [ 'project' => $project ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Projects::find($id);

        return view('admin.projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectsRequest $request, $id)
    {
        $project = Projects::find($id);

        $project->title= $request->title;
        $project->naslov= $request->naslov;
        $project->content= $request->input('content');
        $project->sadrzaj= $request->sadrzaj;
        $project->video= $request->video;

        // if there is already a photo, it is destroyed if the new one is uploaded
        if($request->has('photo')) {
            if (isset($project->photo)) Helper::removePhoto($project->photo, "projects");
            $project->photo = Helper::storePhoto($request->file('photo'), $project->id, "projects");
        }

        $project->save();

        return redirect()->back()->with('message', 'Projekat uspešno izmenjen!');
    }

    public function destroyPhoto(Request $request) {

        $id = $request->input("project_id");
        $project = Projects::find($id);

        Helper::removePhoto($project->photo, "projects");

        $project->photo = null;
        $project->save();

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
        Helper::removePhoto(Projects::find($id)->photo, "projects");

        Projects::destroy($id);

        return redirect()->back()->with('message', 'Projekat uspešno obrisan!');
    }
}
