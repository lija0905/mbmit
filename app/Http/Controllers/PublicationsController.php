<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationsRequest;
use App\Models\Publications;
use App\Models\PublicationsType;
use App\Models\Researchers;
use App\Models\ResearchersType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if researcher is logged in he is only able to see his publications
        if (Auth::user()->user_role->slug == "researcher") {
            $publications = Publications::join('publications_authors', 'publications.id', 'publication_id')
                ->where('publications_authors.author_id', Auth::user()->researcher->id)->select('publications.*')->get();

        } else $publications = Publications::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.publications.list', ['publications' => $publications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publications_type = PublicationsType::all();
        $researchers = Researchers::all();

        return view('admin.publications.create', [ 'publications_type' => $publications_type, 'researchers' => $researchers ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicationsRequest $request)
    {
        $publication = new Publications();

        //set fields
        $publication->title = $request->input('title');
        $publication->naziv = $request->input('naziv');
        $publication->abstract = $request->input('abstract');
        $publication->opis = $request->input('opis');
        $publication->link = $request->input('link');
        $publication->type_id = $request->input('type_id');

        $publication->save();

        //add existing authors
        $authors = $request->input('authors');
        if (isset($authors) && count($authors) > 0) {
            foreach($authors as $author) {
                $publication->authors()->attach($author, ['created_at' => now(), 'updated_at' => now()]);
            }
        }

        //create new author(researcher) and attach it to publication
        $new_authors = $request->input('new_authors');
        if (isset($new_authors) && count($new_authors) > 0) {
            foreach ($new_authors as $author) {
                $new_author = new Researchers();
                $new_author->fullname = $author['fullname'];
                $new_author->title = $author['title'];
                $new_author->titula = $author['titula'];
                $new_author->type_id = ResearchersType::where('type_name', 'Eksterni')->value('id');
                $new_author->save();

                $publication->authors()->attach($new_author->id, [ 'created_at' => now(), 'updated_at' => now() ]);

            }
        }


        return response()->json(['success' => 'true', 'message' => "Publikacija uspešno dodata!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$this->is_my_publication($id)) abort('403');

        $publication = Publications::find($id);

        return view('admin.publications.show', ['publication' => $publication]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (!$this->is_my_publication($id)) abort('403');

        $publication = Publications::find($id);
        $publications_type = PublicationsType::all();
        $researchers = Researchers::all();

        return view('admin.publications.edit', ['publication' => $publication, 'publications_type' => $publications_type, 'researchers' => $researchers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublicationsRequest $request, $id)
    {

        //if researcher is logged in he is only able to see his publications
        if (!$this->is_my_publication($id)) abort('403');

        $publication = Publications::find($id);

        //set fields
        $publication->title = $request->input('title');
        $publication->naziv = $request->input('naziv');
        $publication->abstract = $request->input('abstract');
        $publication->opis = $request->input('opis');
        $publication->link = $request->input('link');
        $publication->type_id = $request->input('type_id');

        $publication->save();

        //if there is new EXISTING author it will be added in authors
        $authors = $request->input('authors');
        $existing_authors = $publication->authors()->pluck('author_id')->toArray();

        //resolve this $publication->authors()->pluck('author_id')->toArray() nes ne radi
        if (isset($authors) && count($authors) > 0) {
            foreach($authors as $author) {
                if (!in_array(intval($author), $existing_authors)) {
                    $publication->authors()->attach($author, ['created_at' => now(), 'updated_at' => now()]);
                }
            }
            //if there is removed EXISTING author it will be deleted from authors
            foreach ($existing_authors as $author) {
                if (!in_array(strval($author), $authors)) {
                    $publication->authors()->detach($author);
                }
            }
        }

        //create new author(researcher) and attach it to publication
        $new_authors = $request->input('new_authors');
        if (isset($new_authors) && count($new_authors) > 0) {
            foreach ($new_authors as $author) {
                $new_author = new Researchers();
                $new_author->fullname = $author['fullname'];
                $new_author->title = $author['title'];
                $new_author->titula = $author['titula'];
                $new_author->type_id = ResearchersType::where('type_name', 'Eksterni')->value('id');
                $new_author->save();

                $publication->authors()->attach($new_author->id, [ 'created_at' => now(), 'updated_at' => now() ]);

            }
        }

        return response()->json(['success' => 'true', 'message' => "Publikacija uspešno izmenjena!"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$this->is_my_publication($id)) abort('403');

        Publications::destroy($id);

        return redirect()->back()->with('message', 'Publikacija uspešno obrisana!');
    }


    //if researcher is logged in he is only able to see his publications
    protected function is_my_publication($publication_id) {
        $is_researcher = Auth::user()->user_role->slug == "researcher";
        $belongs_to_researcher = Publications::join('publications_authors', 'publications.id', 'publication_id')->where('publications.id', $publication_id)
            ->where('publications_authors.author_id',  Auth::user()->researcher->id)->first();

        if ($is_researcher && !isset($belongs_to_researcher)) return false;

        return true;
    }
}
