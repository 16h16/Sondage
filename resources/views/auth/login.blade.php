@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div style="text-align: center;">
        <div style="background-color:#d5d5d5; display: inline-block; border-radius: 10px;padding:50px;">
            <div style="display: inline-block; background-color: blue; padding: 10px; width: 20px; color: white; border-radius: 10px"><a style="color: white; text-decoration: none"href="{{route('home')}}">⮐</a></div>
            <h1> Connexion </h1>
            <p><strong>Inscris tes informations de connexion</strong></p>
            @if(session('status'))
                <p>{{session('status')}}</p>
            @endif
            <p></p>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <input type="email" name="email" placeholder="Email">
                    @error('email')
                    <p> {{$message}}</p>
                    @enderror
                </div>
                <br>
                <div>
                    <input type="password" name="password" placeholder="Mot de passe">
                    @error('password')
                    <p> {{$message}}</p>
                    @enderror
                </div>
                <br>
                <div>
                    <button style="display:inline;background-color:white;border-radius: 5px;padding:5px;margin: 4px;border:0px"> Se connecter </button>
                </div>
            </form>
            <p>Tu n'as pas encore de compte ? <a href="{{ route('register') }}"> Inscris-toi </a></p>
        </div>
    </div>

@endsection


