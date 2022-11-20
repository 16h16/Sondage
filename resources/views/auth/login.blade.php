@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <form action="{{ route('login') }}" method="POST">
        @csrf
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
            <button> Login </button>
        </div>
    </form>
@endsection


