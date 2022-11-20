@extends('layouts.app')

@section('title')
    Change password
@endsection

@section('content')
    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ request()->token }}">
        <div>
            <input type="email" name="email" value="{{ request()->email }}">
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
            <button> Reset </button>
        </div>
    </form>
@endsection


