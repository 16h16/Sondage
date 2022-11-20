<?php

namespace App\Http\Controllers;

use App\Models\Surveys;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $surveys = Surveys::all();
        //dd($surveys[0]->question);
        return view('home',['surveys'=>$surveys]);
    }
}
