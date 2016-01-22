<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Survey;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.survey.create');
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
        return str_random(6).md5(time());
        $data = json_encode($request->all());
        $result = Survey::create([
            'user_id' => Auth::user()->id,
            'content' => $data,
        ]);
        if ($result) {
            return 'true';
        }

        return 'false';
    }

    /**
     * Display the specified resource.
     *
     * @param int $id ID
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.survey.show', compact('id'));
    }

    /**
     * Get Data
     *
     * @param Int $id ID
     *
     * @return string
     */
    public function getData($id)
    {
        $survey = Survey::findorfail($id);
        return $survey->content;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id ID
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Get Link Module
     *
     * @return json
     */
    public function listModules()
    {
        $modules = \App\Admin\Module::all();

        return json_encode($modules);
    }
}
