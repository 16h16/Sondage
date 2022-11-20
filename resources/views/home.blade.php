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
    </style>
    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif
    <div style="text-align:center">
        <div id="menu">
            <ul>
                    @auth
                        <li class="menu_puce" style="background-color: rgba(255,0,0,0);">
                            <form style="display:inline; background-color: #4e5662; border-radius: 10px">
                                <input type="text" style="border-radius: 10px; border-right: 0px; border:3px solid #cccccc; background-color: #9b9b9b">
                                <button style="background-color: rgba(25,255,0,0); border:0px; color: white"> Search </button>
                            </form>
                        </li>
                        <li class="menu_puce"><a href="{{route('survey.index')}}">My surveys</a></li>
                        <li class="menu_puce" style="background-color:blue; color:white;">{{auth()->user()->name}}</li>
                        <li class="menu_puce" style="background-color:red">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                                @csrf
                                <button style="border:0px;background-color:red; color:white"> Logout </button>
                            </form>
                        </li>

                        <!-- =============== SURVEYS ============== -->
                        <h1> Surveys </h1>
                        <ul style="list-style-type: none">
                            @foreach($surveys as $survey)
                                <p> <br> </p>
                                <li><h3>{{ $survey -> question }}</li></h3>
                                    <ul style="list-style-type: none">
                                        <br>
                                        @foreach($survey->responses as $response)
                                            <li> {{ $response->title }}
                                                <form style="display: inline-block" action="{{route('response.vote')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$response->id}}">
                                                    <button style="background-color:green; color:white; border:1px solid green; border-radius: 5px"> {{$response->count}} 👍 </button>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            <br>
                                <li> Owner <span style="background-color: blue; border:0px; color: white; padding: 3px; border-radius: 5px">{{$survey -> owner }}</span></li>
                                <p> <br> <hr> </p>
                            @endforeach
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





