<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResearchersRequest;
use App\Models\ResearcherLinks;
use App\Models\Researchers;
use App\Models\ResearchersType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ResearchersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->user_role->slug == "researcher") {

            $researchers = Researchers::where('email', Auth::user()->email)->get();

        } else $researchers = Researchers::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.researchers.list', ['researchers' => $researchers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $researchers_type = ResearchersType::all();

        return view('admin.researchers.create', ['researchers_type' => $researchers_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ResearchersRequest $request)
    {

        //check if email exists
        $researcher_email=$request->input('email');
        $researcher= Researchers::where('email', '=', $researcher_email)->get();

        if (count($researcher) > 0) {
            return redirect()->back()->with('error', 'Istraživač sa zadatim mejlom već postoji!');
        }

        $researcher = Researchers::create($request->all());

        $photo = $request->file('photo');
        $fileName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME).'_'.$researcher->id.'.'.$photo->extension();


        $path = $photo->storeAs('public/researchers',$fileName);

        $researcher->photo = $fileName;

        $links_name = $request->input('links_name');
        $links = $request->input('links');

        if (isset($links_name) && isset($links)) {
            foreach ($links_name as $key => $name) {
                if (isset($links[$key]) && isset($name)) {
                    $link = new ResearcherLinks();
                    $link->link_name = $name;
                    $link->link = $links[$key];
                    $link->researcher_id = $researcher->id;
                    $link->save();
                }
            }
        }

        $researcher->save();

        return redirect()->back()->with('message', 'Istraživač uspešno dodat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->user_role->slug == "researcher" && Auth::user()->researcher->id != $id) abort('403');

        $researcher = Researchers::find($id);

        return view('admin.researchers.show', ['researcher' => $researcher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->user_role->slug == "researcher" && Auth::user()->researcher->id != $id) abort('403');

        $researcher = Researchers::find($id);
        $researchers_type = ResearchersType::all();

        return view('admin.researchers.edit', [
            'researcher' => $researcher,
            'researchers_type' => $researchers_type
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResearchersRequest $request, $id)
    {
        if (Auth::user()->user_role->slug == "researcher" && Auth::user()->researcher->id != $id) abort('403');

        $researcher = Researchers::find($id);

        //check if email exists
        $researcher_email=$request->input('email');
        $existing_email = Researchers::where('email', '=', $researcher_email)->where('id', '!=', $id)->get();

        if (count($existing_email) > 0) {
            return redirect()->back()->with('error', 'Istraživač sa zadatim mejlom već postoji!');
        }

        //if email is changed it should also change an email of user
        if (isset($researcher->user)) {
            $user = User::find($researcher->user->id);
            $user->email = $request->email;

            //if researcher wants to change his password, it needs to be saved for user that is connected to researcher
            if (Auth::user()->user_role->slug == "researcher") {
                if ($request->input('password')) $user->password = Hash::make($request->input('password'));
            }

            $user->save();

        }

        $researcher->fullname= $request->fullname;
        $researcher->email= $request->email;
        $researcher->title= $request->title;
        $researcher->titula= $request->titula;
        $researcher->type_id= $request->type_id;

        if($request->has('photo')) {
            $photo = $request->file('photo');
            $fileName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME).'_'.$researcher->id.'.'.$photo->extension();

            $path = $photo->storeAs('public/researchers',$fileName);

            $researcher->photo = $fileName;
        }

        $links = $request->input("links");
        $links_name = $request->input("links_name");
        $researcher_links = $researcher->researcher_links;

        foreach ($researcher_links as $link) {
            if (!isset($links_name) || !array_key_exists($link->id, $links_name)) {
                $link->delete();
            }
        }

        if (isset($links_name) && isset($links)) {
            foreach ($links_name as $key => $name) {
                if (isset($links[$key]) && isset($name)) {
                    $researcher_link = ResearcherLinks::find($key);
                    $researcher_link->link_name = $name;
                    $researcher_link->link = $links[$key];
                    $researcher_link->save();
                }
            }
        }

        $new_links = $request->input("new_links");
        $new_links_name = $request->input("new_links_name");

        if (isset($new_links_name) && isset($new_links) && count($new_links) == count($new_links_name)) {
            foreach($new_links_name as $key => $name) {
                if (isset($new_links[$key]) && isset($name)) {
                    $researcher_link = new ResearcherLinks();
                    $researcher_link->link_name = $name;
                    $researcher_link->link = $new_links[$key];
                    $researcher_link->researcher_id = $researcher->id;
                    $researcher_link->save();
                }                    // else error
            }
        }

        $researcher->save();

        return redirect()->back()->with('message', 'Istraživač uspešno izmenjen!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->user_role->slug == "researcher" && Auth::user()->researcher->id != $id) abort('403');

        $filePath = 'public/researchers/'. Researchers::find($id)->photo;
        if (Storage::exists($filePath)) Storage::delete($filePath);

        Researchers::destroy($id);

        return redirect()->back()->with('message', 'Istraživač uspešno obrisan!');
    }
}
