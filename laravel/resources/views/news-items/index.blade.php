@extends('layouts.app1')

@section('content')
    <div class="container">
        <header class="headerclass">
            <a class="nav-link float-right" href="{{route('news.create')}}">maak een nieuwsbericht</a>
        </header>

        @if($message = Session::get('seccess'))
            <div class="alert alert-seccess alert-block">
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

