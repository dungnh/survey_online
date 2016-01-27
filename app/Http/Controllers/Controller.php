<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Admin\AppLanguage;
use App\Admin\User;
use App\Admin\Configuration;
use View;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Construct
     */
    public function __construct()
    {
        $info_user = User::find(Auth::id());
        $list_language = AppLanguage::all();
        $setting_title = Configuration::first();
        if($setting_title) 
        $setting_title = unserialize($setting_title->properties)['title'];
        View::share('list_language', $list_language);
        View::share('info_user', $info_user);
        View::share('title_all', $setting_title);
    }
}
