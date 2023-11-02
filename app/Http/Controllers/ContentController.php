<?php

namespace App\Http\Controllers;

use App\Models\Disseminations;
use App\Models\Gallery;
use App\Models\GalleryPhoto;
use App\Models\LanguageOptions;
use App\Models\MainSlider;
use App\Models\News;
use App\Models\Projects;
use App\Models\Publications;
use App\Models\PublicationsType;
use App\Models\Researchers;
use App\Models\StudentActivity;
use App\Models\WelcomeSection;
use Illuminate\Http\Request;

class ContentController extends Controller
{

    public function index() {

        $news = News::orderBy('created_at', 'desc')->take('10')->get();
        $main_slider = MainSlider::all();
        $section = WelcomeSection::all()[0];

        return view('client.index', ['news' => $news, 'main_slider' => $main_slider, 'section' => $section ]);

    }

    //Researchers Page
    public function researchers() {

        $senior_researchers = Researchers::where('type_id', '2')->get();
        $junior_researchers = Researchers::where('type_id', '1')->get();
        $external_researchers = Researchers::where('type_id', '3')->get();

        if (count($senior_researchers) == 0 && count($junior_researchers) == 0  && count($external_researchers) == 0) return view('client.no-data');


        return view('client.researchers', ['senior_researchers' => $senior_researchers,'junior_researchers' => $junior_researchers,'external_researchers' => $external_researchers]);
    }

    //Publications Page
    public function publications($type) {

        $type = ucfirst(str_replace("_", " ", $type));

        $publication_type = PublicationsType::where('type_name_en', $type)->first();
        $publications = Publications::where('type_id', $publication_type->id)->orderBy('created_at', 'desc')->orderBy('type_id', 'asc')->paginate(10);

        if (count($publications) == 0) return view('client.no-data');

        return view('client.publications', ['publications' => $publications]);

    }

    //Projects Page
    public function projects() {

        $projects = Projects::orderBy('created_at', 'desc')->paginate(10);

        if (count($projects) == 0) return view('client.no-data');


        return view('client.projects', ['projects' => $projects]);

    }

    //Student Activities Page
    public function student_activities() {

        $student_activities = StudentActivity::orderBy('created_at', 'desc')->paginate(10);

        if (count($student_activities) == 0) return view('client.no-data');

        return view('client.student-activities', ['student_activities' => $student_activities]);

    }

    //Disseminations Page
    public function disseminations(){

        $disseminations = Disseminations::orderBy('created_at', 'desc')->paginate(10);

        if (count($disseminations) == 0) return view('client.no-data');

        return view('client.disseminations', ['disseminations' => $disseminations]);
    }

    //All News
    public function news() {

        $news = News::orderBy('created_at', 'desc')->paginate(10);

        if (count($news) == 0) return view('client.no-data');

        return view('client.news', ['news' => $news]);
    }

    // Contact Page
    public function contact() {

        return view('client.contact');
    }

    public function getGallery($type, $id) {

        if ($type == "disseminations") $item = Disseminations::find($id);
        else $item = News::find($id);

        return view('client.dissemination-news-gallery', ['item' => $item, 'type' => $type]);
    }

    public function galleries() {

        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(10);

        if (count($galleries) == 0) return view('client.no-data');

        return view('client.galleries', ['galleries' => $galleries]);
    }

    //get Alumni
    public function alumni() {

        $alumni = Researchers::where('type_id', '4')->get();

        if (count($alumni) == 0) return view('client.no-data');

        return view('client.alumni', [ 'alumni' => $alumni ]);
    }
}
