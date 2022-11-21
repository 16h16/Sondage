@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <style>
        #menu{
            background-color: #cccccc;
            padding:5px;
            display: inline-block;
            border-radius: 5px;
        }

        .menu_puce{
            display:inline;
            background-color:white;
            border-radius: 5px;
            padding:5px;
            margin: 4px;
        }

        a{
            color: black;
            text-decoration:none;
        }
        ul{
            padding:0px;
        }

        progress {
            background-image:
                -webkit-linear-gradient(-45deg,
                transparent 33%, rgba(0, 0, 0, .1) 33%,
                rgba(0,0, 0, .1) 66%, transparent 66%),
                -webkit-linear-gradient(top,
                rgba(255, 255, 255, .25),
                rgba(0, 0, 0, .25)),
                -webkit-linear-gradient(left, #09c, #f44);
            border-radius: 2px;
            background-size: 35px 20px, 100% 100%, 100% 100%;
        }
    </style>
    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif
    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif
    <div style="text-align:center">
        <div id="menu">
            <ul>
                    @auth
                        <li class="menu_puce" style="background-color: rgba(255,0,0,0);">
                            <form style="display:inline; background-color: #4e5662; border-radius: 10px" action="{{route('home.search')}}" method="GET">
                                <input type="text" style="border-radius: 10px; border-right: 0px; border:3px solid #cccccc; background-color: #9b9b9b" name="survey_question">
                                <button style="background-color: rgba(25,255,0,0); border:0px; color: white"> Recherche </button>
                            </form>
                        </li>
                        <li class="menu_puce"><a href="{{route('survey.index')}}">Mes sondages</a></li>
                        <li class="menu_puce" style="background-color:blue; color:white;">{{auth()->user()->name}}</li>
                        <li class="menu_puce" style="background-color:red">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                                @csrf
                                <button style="border:0px;background-color:red; color:white"> Déconnexion </button>
                            </form>
                        </li>

                        <!-- =============== SURVEYS ============== -->

                        <h1> Sondages </h1>
                        <p>Bienvenu {{auth()->user()->name}}</p>
                        <p>Découvre ou recherche des sondages et vote !</p>
                    <p style="border: 2px dotted black"> {{count($surveys) > 0 ? count($surveys). " sondages crée : " : "Aucuns sondages crée" }}</p>
                    @if(!empty($message))
                        <p style="background-color: {{$color}}; color: white; padding:5px; border-radius: 5px"> {{$message}} </p>
                    @endif
                        <ul style="list-style-type: none">
                            @for($i=0; $i<count($surveys); $i++)
                                <p><br> </p>
                                <li><h3>{{ $surveys[$i]-> question }}</li></h3>
                                    <ul style="list-style-type: none">
                                        <br>
                                        @for($e = 0; $e < count($surveys[$i]->responses); $e++)
                                            <li> {{ $surveys[$i]->responses[$e]->title }}
                                                <form style="display: inline-block" action="{{route('response.vote')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$surveys[$i]->responses[$e]->id}}">
                                                    <progress max="100" value="{{$pourcent[$i][$e]}}"></progress> {{$pourcent[$i][$e]}}% ({{$surveys[$i]->responses[$e]->count}} Votes )
                                                    <button style="background-color:green; color:white; border:1px solid green; border-radius: 5px"> + </button>
                                                </form>
                                            </li>
                                        @endfor
                                    </ul>
                                </li>
                            <br>
                                <li> Owner <span style="background-color: blue; border:0px; color: white; padding: 3px; border-radius: 5px">{{$surveys[$i]-> owner }}</span></li>
                                <p> <br> <hr> </p>
                            @endfor
                        </ul>

                        <!-- ====================================== -->
                    @else
                        <h1> Welcom to survey </h1>
                        <li class="menu_puce">
                            <a href="{{ route('login') }}"><button style="background-color: rgba(25,255,0,0); border:0px">Connection</button></a>
                        </li>
                    <li class="menu_puce"><a href="{{ route('register') }}"><button style="background-color: rgba(25,255,0,0); border:0px">Registration</button></a></li>
                    @endauth
            </ul>
        </div>
    </div>
@endsection





