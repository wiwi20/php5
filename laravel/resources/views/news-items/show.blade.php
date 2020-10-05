@extends('layouts.app1')

@section('content')
    <header class="headerclass">
        @if($newsItem)
            <h1 class="model-title float-left">{{$newsItem['title']}}</h1>
        @else
            <h1 class="model-title float-left">{{ $error }}</h1>
        @endif
        <a class="nav-link float-right" href="{{route('news')}}">terug naar nieuwsbericht</a>
    </header>

    <div class="container">
        @if($newsItem )
            <article>
                <p>{{$newsItem['description']}}</p>
                <img class="card-img" src="{{$newsItem['image']}}" alt="{{$newsItem['title']}}">
            </article>
        @endif
    </div>
@endsection

