<?php

namespace App\Http\Controllers;

use App\Models\Surveys;
use Illuminate\Http\Request;

class SurveysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('survey.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Surveys::create([
            "owner" => auth()->user()->name,
            "user_id" => auth()->user()->id,
            "question" =>  $request -> question,
        ]);

        return to_route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surveys  $surveys
     * @return \Illuminate\Http\Response
     */
    public function show(Surveys $surveys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surveys  $surveys
     * @return \Illuminate\Http\Response
     */
    public function edit(Surveys $surveys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surveys  $surveys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surveys $surveys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surveys  $surveys
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surveys $surveys)
    {
        //
    }
}
