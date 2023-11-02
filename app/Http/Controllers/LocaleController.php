<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{

    public function setLocale(Request $request) {

        $language = $request->input('language');

        App::setLocale($language);
        session()->put('locale', $language);

        return redirect()->back();
    }
}
