@extends('layouts.app')

@section('content')
    <div class="container">
        <header class="headerclass">
            <h1 class="float-left">Nieuwsberichten</h1>
            @if(Auth::user() && (Auth::user()->validatie > 5 ))
            <a class="nav-link float-right" href="{{route('news.create')}}">maak een nieuwsbericht</a>
            @endif
        </header>

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row col-12 nieuws">
            <div class="dropdown categories-index">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" value="">Show all</button>
                <ul class="dropdown-menu" role="menu">
                    <?php $categories=DB::table('categories')->get();?>
                    @foreach ($categories as $category)
                        <li class="categories"><a href="{{url('category',$category->id)}}">{{$category->title}}</a></li>
                    @endforeach
                </ul>
            </div>
                @foreach($newsItems as $newsItem)
                    @if($newsItem->status==1)
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
                    @endif
                @endforeach
        </div>
    </div>
@endsection

