<?php

namespace App\Http\Controllers;

use App\Models\Responses;
use Illuminate\Http\Request;

class ResponsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Responses::create([
            'title' => $request->title,
            'count' => $request->count,
            'user_id' => auth()->user()->id,
            'surveys_id' => $request->surveys_id,
        ]);

        return to_route('survey.index', ["message"=>"Réponse au sondage ajouté!","color"=>"green"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Responses  $responses
     * @return \Illuminate\Http\Response
     */
    public function show(Responses $responses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Responses  $responses
     * @return \Illuminate\Http\Response
     */
    public function edit(Responses $responses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Responses  $responses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Responses $responses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Responses  $responses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Responses $responses)
    {
        //
    }

    public function vote(Request $request)
    {
        $response = Responses::findOrFail($request->id);

        $response-> update([
            "count" => $response->count+1,
        ]);
        return to_route('vote', ["message"=>"Vote comptabilisé!","color"=>"green"]);
}
}
