<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

class HomeController extends Controller
{
    /**
     * Index page
     *
     * @return redirect
     */
    public function index()
    {
        // $language = $request->route('language');
        // if (!$language) {
        //     $language = new Language();
        //     $default_language = $language->getDefaultLanguage();
        // } else {
        //     $default_language = $language;
        // }

        // return redirect("/$default_language/index");
        return redirect("cpanel");
    }

    /**
     * Home page
     *
     * @return redirect
     */
    public function home()
    {
        // $title = 'Home';

        // return view('home', compact('title'));
        return redirect("cpanel");
    }
}
