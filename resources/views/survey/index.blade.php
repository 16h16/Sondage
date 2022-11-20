@extends('layouts.app')

@section('title')
    Survey menu
@endsection

@section('content')
    <div style="text-align: center;">
        <div style="background-color:#d5d5d5; display: inline-block; border-radius: 10px;padding:20px;">
            <div style="display: inline-block; background-color: blue; padding: 10px; width: 20px; color: white; border-radius: 10px"><a style="color: white; text-decoration: none"href="{{route('home')}}">⮐</a></div>
            <h1> My surveys</h1>
            <ul style="list-style-type: none;margin:0px; padding: 0px;">
                @foreach($surveys as $survey)
                    <p> <br> </p>
                    <li>{{ $survey -> question }}
                        <a href="{{route('survey.delete', $survey)}}"><button style="background-color:red; color:white; border:1px solid red; border-radius: 5px"> X </button></a>
                        <ul style="list-style-type: none; padding: 0px;">
                            @foreach($survey->responses as $response)
                                <li> {{ $response->title }} </li>
                            @endforeach
                            <li>
                                <form action="{{route('response.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="surveys_id" value="{{$survey->id}}">
                                    <input type="hidden" name="count" value="{{0}}">
                                    <br>
                                    <input type="text" placeholder="Create a new response" name="title">
                                    <button style="background-color:blue; color:white; border:1px solid blue; border-radius: 5px; font-size: 1em"> +</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <p> <br> <hr> </p>
                @endforeach
                <li>
                    <p> <br> </p>
                    <form action="{{route('survey.store')}}" method="POST">
                        @csrf
                        <input type="text" name="question" placeholder="Create a new survey">
                        <button style="background-color:green; color:white; border:1px solid green; border-radius: 5px; font-size: 1em">+</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

@endsection
