@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <style>
        #menu{
            background-color:black;
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
                        <li class="menu_puce">
                            <form style="display:inline">
                                <input type="text">
                                <button> Search </button>
                            </form>
                        </li>
                        <li class="menu_puce" style="background-color:green;"><a href="">New survey</a></li>
                        <li class="menu_puce"><a href="">My surveys</a></li>
                        <li class="menu_puce" style="background-color:silver;">Username</li>
                        <li class="menu_puce"><a href="{{route('reset.passwords')}}">Change password</a></li>
                        <li class="menu_puce" style="background-color:red">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline">
                                @csrf
                                <button style="border:0px;background-color:red"> Logout </button>
                            </form>
                        </li>
                    @else
                        <li class="menu_puce"><a href="{{ route('login') }}">Log in</a></li>
                        <li class="menu_puce"><a href="{{ route('register') }}">Register</a></li>
                    @endauth
            </ul>
        </div>
    </div>
@endsection





