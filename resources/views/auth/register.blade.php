@extends('layouts.app')

@section('title')
    Registration
@endsection

@section('content')
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
            <button> Register </button>
        </div>
    </form>
@endsection

