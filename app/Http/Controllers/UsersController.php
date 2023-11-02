<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UserCreateRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Models\Researchers;
use App\Models\ResearchersType;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.users.list', [ 'users' => $users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.users.create', ['roles' => $roles ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {

        $user_email = $request->input('email');
        $role = Role::find($request->input('role_id'));

        // if user is type researcher and he doesn't exist as researcher it will create it, they are connected through email, it has to be unique in researchers table also!
        // The type of researcher is default Junior, and researcher can change it later
        // if researcher already exists, it will just add it in users table and put role 'researcher'
        $researcher_profile = Researchers::where('email', $user_email)->get();

        if ($role->slug == "researcher" && !isset($researcher_profile[0])) {

            //default set to Junior
            $researcher_type = ResearchersType::where('type_name', 'Junior')->get();

            Researchers::create([
               'fullname' => $request->input('name'),
               'email' => $request->input('email'),
               'type_id' => $researcher_type[0]->id,
            ]);

        }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role_id' => intval($request->input('role_id')),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->back()->with('message', 'Korisnik uspešno dodat!');

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
        $user = User::find($id);
        $roles = Role::all();

        return view('admin.users.edit', [ 'user' => $user, 'roles' => $roles ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);

        // if email of researcher is changed, it should be changed in researchers table also
        if (isset($user->researcher)) {
            $researcher = Researchers::find($user->researcher->id);
            $researcher->email = $request->email;

            $researcher->save();
        }

        $user->name= $request->name;
        $user->email= $request->email;
        $user->role_id= $request->role_id;

        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->back()->with('message', 'Korisnik uspešno izmenjen!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->back()->with('message', 'Korisnik uspešno obrisan!');
    }

    public function logout() {

        Auth::logout();

        return redirect('/admin/login');
    }
}
