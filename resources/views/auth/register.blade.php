@extends('layouts.app')

@section('title')
    Registration
@endsection

@section('content')
    <div style="text-align: center;">
        <div style="background-color:#d5d5d5; display: inline-block; border-radius: 10px;padding:20px;">
            <div style="display: inline-block; background-color: blue; padding: 10px; width: 20px; color: white; border-radius: 10px"><a style="color: white; text-decoration: none"href="{{route('home')}}">⮐</a></div>
            <h1> Inscription </h1>
            <p><strong>Inscris tes informations d'inscription</strong></p>
            @if(session('status'))
                <p>{{session('status')}}</p>
            @endif
<p></p>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div>
                    <input type="text" name="name" placeholder="Login">
                    @error('name')
                    <p> {{$message}}</p>
                    @enderror
                </div>
                <br>
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
                    <input type="password" name="password_confirmation" placeholder="Confirmation mot de passe">
                    @error('password')
                    <p> {{$message}}</p>
                    @enderror
                </div>
                <div>
                    <br>
                    <button style="display:inline;background-color:white;border-radius: 5px;padding:5px;margin: 4px;border:0px"> S'inscrire </button>
                    <p>Tu as déjà un compte ? <a href="{{ route('login') }}">Connecte-toi</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection

