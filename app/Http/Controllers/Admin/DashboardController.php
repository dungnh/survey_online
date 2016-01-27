<?php

namespace app\Http\Controllers\Admin;

use App\User;
use App\Admin\StaticPage;
use App\Admin\Service;
use App\Admin\Contact;
use App\Admin\Member;
use App\Admin\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Router;

class DashboardController extends Controller
{
    /**
     * Get index 
     *
     * @return respone
     */
    public function index()
    {
        $title = 'Dashboard';
        return view('admin.dashboard.index', compact('title'));
    }
}
