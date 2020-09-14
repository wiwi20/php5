@extends('layouts.app')

@section('content')
    <header class="headerclass">
        <h1 class="model-title float-left">News</h1>
        <a class="nav-link float-right" href="{{route('news.create')}}">maak een nieuwsbericht</a>
    </header>

    <div class="container">
        @if($message = Session::get('seccess'))
            <div class="alert alert-seccess alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            @foreach($newItems as $newItem)
                <div class="col-sm card border-0">
                    <h2 class="card-title">{{$newItem['title']}}</h2>
                    <p class="card-text">{{$newItem['description']}}</p>
                    <img class="card-img" src="{{$newItem['image']}}" alt="{{$newItem['title']}}">
                    <a class="btn btn-light" href="{{route('news.show', $newItem['id'])}}">Lees meer</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

