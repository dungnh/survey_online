<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Module;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_module = Module::with('actions')->paginate(\Config::get('custom.items_per_page'));

        return view('admin.modules.module', compact('list_module'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action_configs = \Config::get('action');

        return view('admin.modules.createmodule', compact('action_configs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module_id = $request->input('module_id');
        $module = new Module();
        $results = $module->saveData($request, $module_id);
        if (!$results) {
            return redirect()->route('cpanel.module.index')
                        ->with('status', 'fail')
                        ->with('msg', trans('cpanel_alert.not_save'));
        } else {
            return redirect()->route('cpanel.module.index')
                            ->with('status', 'success')
                            ->with('msg', trans('cpanel_alert.successfully'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $modules = Module::with('actions')->get()->find($id);
        $action_configs = \Config::get('action');

        return view('admin.modules.updatemodule', compact('modules', 'action_configs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = new Module();
        $results = $module->deleteData($id);
        if (!$results) {
            return redirect()->route('cpanel.module.index')
                        ->with('status', 'fail')
                        ->with('msg', trans('cpanel_alert.not_delete'));
        } else {
            return redirect()->route('cpanel.module.index')
                            ->with('status', 'success')
                            ->with('msg', trans('cpanel_alert.successfully'));
        }
    }
}
