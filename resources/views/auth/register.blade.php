@extends('layouts.app')

@section('title')
    Registration
@endsection

@section('content')
    <div style="text-align: center;">
        <div style="background-color:#d5d5d5; display: inline-block; border-radius: 10px;padding:20px;">
            <div style="display: inline-block; background-color: blue; padding: 10px; width: 20px; color: white; border-radius: 10px"><a style="color: white; text-decoration: none"href="{{route('home')}}">⮐</a></div>
            <h1> Registration </h1>
<p></p>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div>
                    <input type="text" name="name" placeholder="name">
                    @error('name')
                    <p> {{$message}}</p>
                    @enderror
                </div>
                <div>
                    <input type="email" name="email" placeholder="email">
                    @error('email')
                    <p> {{$message}}</p>
                    @enderror
                </div>
                <div>
                    <input type="password" name="password" placeholder="password">
                    @error('password')
                    <p> {{$message}}</p>
                    @enderror
                </div>
                <div>
                    <input type="password" name="password_confirmation" placeholder="password confirmation">
                    @error('password')
                    <p> {{$message}}</p>
                    @enderror
                </div>
                <div>
                    <br>
                    <button> Register </button>
                </div>
            </form>
        </div>
    </div>
@endsection

