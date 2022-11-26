@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <style>
        #menu{
            background-color: #cccccc;
            padding:50px;
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
            <div style="background-color:#9b963c; padding: 5px; border-radius: 10px;border:1px solid black">
                <ul>

                            <li class="menu_puce" style="background-color: rgba(255,0,0,0);">
                                <form style="display:inline; background-color: #4e5662; border-radius: 10px" action="{{route('home.search')}}" method="GET">
                                    <input type="text" style="border-radius: 10px; border-right: 0px; border:3px solid #4e5662; background-color: #9b9b9b" name="survey_question">
                                    <button style="background-color: rgba(25,255,0,0); border:0px; color: white;"> Recherche </button>
                                </form>
                            </li>
                        @auth
                        <li class="menu_puce"><a href="{{route('survey.index')}}">Mes sondages</a></li>
                        <li class="menu_puce" style="background-color:blue; color:white;">{{auth()->user()->name}}</li>
                        <li class="menu_puce" style="background-color:red">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                                @csrf
                                <button style="border:0px;background-color:red; color:white"> Déconnexion </button>
                            </form>
                        </li>
                        @else
                            <li class="menu_puce" style="background-color:#50501f; color:white;">Visiteur</li>
                            <li class="menu_puce">
                                <a href="{{ route('login') }}"><button style="background-color: rgba(25,255,0,0); border:0px">Connexion</button></a>
                            </li>
                            <li class="menu_puce">
                                <a href="{{ route('register') }}"><button style="background-color: rgba(25,255,0,0); border:0px">Inscription</button></a>
                            </li>
                        @endauth
                </ul>
            </div>
                <!-- =============== SURVEYS ============== -->
                <h1> Bienvenu sur Survey 🗳 </h1>
                @auth
                    <p> <strong>Hello {{auth()->user()->name}} ✌</strong></p>
                    <p>Découvre ou recherche des sondages et vote !</p>
                @else
                    <p> <strong>Hello visiteur ✌</strong></p>
                    <p>Découvre ou recherche des sondages et connecte toi pour voter !</p>
                @endauth
                <hr>
                <h2>Tout les Sondages </h2>
                <p style="background-color: #306060; color: white; border-radius: 5px; display: inline-block; padding:5px;"> {{count($surveys) > 0 ? count($surveys). " sondages existants " : "Aucuns sondages crée" }}</p>
                @if(!empty($message))
                    <p style="background-color: {{$color}}; color: white; padding:5px; border-radius: 5px"> {{$message}} </p>
                @endif

                    <ul style="list-style-type: none">
                        @for($i=0; $i<count($surveys); $i++)
                            <div style="background-color: #b0b0b0; padding:25px;border-radius: 5px;margin:25px;">
                                <li><h3>{{ $i+1 .". ".$surveys[$i]-> question }}</li></h3>
                                <ul style="list-style-type: none">
                                    @for($e = 0; $e < count($surveys[$i]->responses); $e++)
                                        <li> {{ $surveys[$i]->responses[$e]->title }}
                                            <form style="width: 100%; display: inline-block" action="{{route('response.vote')}}" method="POST">
                                                @csrf
                                                <input style="width: 15%;" type="hidden" name="id" value="{{$surveys[$i]->responses[$e]->id}}">
                                                <progress style="width: 60%;" max="100" value="{{$pourcent[$i][$e]}}"></progress>
                                                <p style="width: 25%; display: inline-block">{{$pourcent[$i][$e]}}% ({{$surveys[$i]->responses[$e]->count}} Votes)</p>
                                                <button style="width: 5%; background-color:green; color:white; border:1px solid green; border-radius: 5px"> + </button>
                                                <hr>
                                            </form>
                                        </li>
                                    @endfor
                                </ul>
                                </li>
                                <br>
                                <li> Auteur <span style="background-color: blue; border:0px; color: white; padding: 3px; border-radius: 5px">{{$surveys[$i]-> owner }}</span></li>
                            </div>
                        @endfor
                    </ul>
            <p>Copyright © 2022 <a style="color:blue; text-decoration: underline" href="https://linktr.ee/16h16" target="_blank">Hamza Echamlali</a></p>
        </div>
    </div>
@endsection





