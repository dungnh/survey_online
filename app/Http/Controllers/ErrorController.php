<?php

namespace app\Http\Controllers;

use App\Admin\AppLanguage;

class ErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function error()
    {
        $list_language = AppLanguage::all();
        View::share('list_language', $list_language);

        return view('errors.404');
    }
}
