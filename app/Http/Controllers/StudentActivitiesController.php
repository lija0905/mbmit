<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\StudentActivityRequest;
use App\Models\StudentActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_activities = StudentActivity::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.student-activities.list', [ 'student_activities' => $student_activities ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student-activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentActivityRequest $request)
    {
        $student_activity = StudentActivity::create($request->all());

        if ($request->has('photo')) $student_activity->photo = Helper::storePhoto($request->file('photo'), $student_activity->id, "student-activities");

        $student_activity->save();

        return redirect()->back()->with('message', 'Aktivnost uspešno dodata!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_activity = StudentActivity::find($id);

        return view('admin.student-activities.show', [ 'student_activity' => $student_activity ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student_activity = StudentActivity::find($id);

        return view('admin.student-activities.edit', [ 'student_activity' => $student_activity ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentActivityRequest $request, $id)
    {
        $student_activity = StudentActivity::find($id);

        $student_activity->title= $request->title;
        $student_activity->naslov= $request->naslov;
        $student_activity->content= $request->input('content');
        $student_activity->sadrzaj= $request->sadrzaj;
        $student_activity->video= $request->video;

        if($request->has('photo')) {
            // if there is already a photo, it is destroyed if the new one is uploaded
            if (isset($student_activity->photo)) Helper::removePhoto($student_activity->photo, "student-activities");
            $student_activity->photo = Helper::storePhoto($request->file('photo'), $student_activity->id, "student-activities");
        }

        $student_activity->save();

        return redirect()->back()->with('message', 'Aktivnost uspešno izmenjena!');
    }

    public function destroyPhoto(Request $request) {

        $id = $request->input("activity_id");
        $student_activity = StudentActivity::find($id);

        Helper::removePhoto($student_activity->photo, "student-activities");

        $student_activity->photo = null;
        $student_activity->save();

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

        Helper::removePhoto(StudentActivity::find($id)->photo, "student-activities");

        StudentActivity::destroy($id);

        return redirect()->back()->with('message', 'Aktivnost uspešno obrisana!');
    }
}
