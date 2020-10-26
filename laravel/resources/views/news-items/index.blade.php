@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="headerclass">
            <h1 class="float-left">Nieuwsberichten</h1>
            @if(Auth::user())
            <a class="nav-link float-right" href="{{route('news.create')}}">maak een nieuwsbericht</a>
            @endif
        </header>

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row col-12 nieuws">
            @foreach($newsItems as $newsItem)
                    <div class="col-12 card border-0 col-md-12">
                        <h2 class="card-title">{{$newsItem['title']}}</h2>
                    </div>
                    <div class="col-sm card border-0 col-md-2">
                        <img class="card-img" src="{{$newsItem['image']}}" alt="{{$newsItem['title']}}">
                    </div>
                    <div class="col-sm card border-0 col-md-10">
                        <p class="card-text">{{$newsItem['description']}}</p>
                        <div><a class="btn btn-light" href="{{route('news.show', $newsItem['id'])}}">Lees meer</a></div>
                    </div>
            @endforeach
        </div>
    </div>
@endsection

