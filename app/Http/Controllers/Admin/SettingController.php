<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Configuration;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = new Configuration();
        $info_config = $config->first();
        $config_id = $info_config ? $info_config->id : '';
        $properties = $info_config ? $info_config->properties : '';
        $array_properties = unserialize($properties);
        return view('admin.config.index', compact('config_id', 'array_properties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $config = new Configuration();
        $config_id = $request->input('config_id');
        $config_id = $config->saveData($request, $config_id);

        return redirect()->route('cpanel.config.index')->with('status', 'Configuration updated!');
    }
}
