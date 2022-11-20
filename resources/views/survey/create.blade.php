@extends('layouts.app')

@section('title')
    Create a new survey
@endsection


@section('content')
    <form action="{{route('survey.store')}}" method="POST">
        @csrf
        <div>
            <input type="text" name="question">
        </div>

        <div>
            <button> New survey </button>
        </div>
    </form>
@endsection

