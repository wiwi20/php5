@extends('layouts.app1')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="createheaderclass">
                    @if($newsItem)
                        <h1 class="float-left">Nieuwsbericht details</h1>
                        <a class="nav-link float-right" href="{{route('news')}}">terug naar nieuwsbericht</a>
                    @else
                        <h1 class="model-title float-left">{{ $error }}</h1>
                    @endif
                </header>
            </div>
        </div>
    </div>
    <div class="container">
            <div class="row col-12 nieuws">
                @if($newsItem )
                    <div class="col-12 card border-0 col-md-12">
                        <h2 class="card-title">{{$newsItem['title']}}</h2>
                    </div>
                    <div class="col-sm card border-0 col-md-2">
                        <img class="card-img" src="{{$newsItem['image']}}" alt="{{$newsItem['title']}}">
                    </div>
                    <div class="col-sm card border-0 col-md-10">
                        <p class="card-text">{{$newsItem['description']}}</p>
                    </div>
                @endif
            </div>
    </div>
@endsection

