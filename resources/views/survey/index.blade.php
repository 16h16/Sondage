@extends('layouts.app')

@section('title')
    Survey menu
@endsection

@section('content')
    <div style="text-align: center;">
        <div style="background-color:#d5d5d5; display: inline-block; border-radius: 10px;padding:50px;">
            <div style="display: inline-block; background-color: blue; padding: 10px; width: 20px; color: white; border-radius: 10px"><a style="color: white; text-decoration: none"href="{{route('home')}}">⮐</a></div>
            @if(!empty($message))
                <p style="background-color: {{$color}}; color: white; padding:5px; border-radius: 5px"> {{$message}} </p>
            @endif
            @if(session('status'))
                <p>{{session('status')}}</p>
            @endif
            <h1> Mes sondages</h1>
            <p><strong> Bienvenu dans ton gestionnaire de sondage!</strong></p>
            <p> Ici tu créer des sondage facilement en deux étapes</p>
            <hr>

            <ul style="list-style-type: none;margin:0px; padding: 0px;">
                <h2> 1. Créer ton sondage </h2>
                <p> Crée ton nouveau sondage en ajoutant un titre. </p>
                <li>
                    <form action="{{route('survey.store')}}" method="POST">
                        @csrf

                        <input type="text" name="question" placeholder="Nouveau sondage">
                        <button style="background-color:green; color:white; border:1px solid green; border-radius: 5px; font-size: 1em">+</button>
                    </form>
                </li>
                <h2> 2. Edite tes sondages </h2>
                <p> Ajoute des réponses ou supprime des sondage deja existants. </p>
                <p style="background-color: #306060; color: white; border-radius: 5px; display: inline-block; padding:5px;"> {{count($surveys) > 0 ? count($surveys). " sondages crée " : "Aucuns sondages existants" }}</p>
                @foreach($surveys as $survey)
                    <div style="background-color: #b0b0b0; padding:25px;border-radius: 5px;margin:25px;">
                        <li>Titre : {{ $survey -> question }}
                            <a href="{{route('survey.delete', $survey)}}"><button style="background-color:red; color:white; border:1px solid red; border-radius: 5px"> X </button></a>
                            <ul style="list-style-type: none; padding: 0px;">
                                <p style="background-color: #404280; color: white; border-radius: 5px; display: inline-block; padding:5px;"> {{count($survey->responses) > 0 ? count($survey->responses). " réponses existante " : "aucunes réponses existante" }}</p>
                                @foreach($survey->responses as $response)
                                    <li> {{ $response->title }} </li>
                                @endforeach
                                <li>
                                    <form action="{{route('response.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="surveys_id" value="{{$survey->id}}">
                                        <input type="hidden" name="count" value="{{0}}">
                                        <br>
                                        <input type="text" placeholder="Nouvelle réponse" name="title">
                                        <button style="background-color:blue; color:white; border:1px solid blue; border-radius: 5px; font-size: 1em"> +</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
