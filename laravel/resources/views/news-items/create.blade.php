@extends('layouts.app1')

@section('content')
    <header class="jumbotron">
        <h1 class="modal-title float-left">Voeg een nieuwsbericht toe</h1>
        <a class=""nav-link float-right href="{{route('news')}}">Terug naar nieuwsoverzicht</a>
    </header>

    <div class="container">
        <form method="post" action="{{ route('news.store') }}">
            @csrf
            <div class="form-group">
                <label for="category">Categorie</label>
                <select class="category" id="category" name="category">
                    @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{$category['title']}}</option>
                    @endforeach
                </select>
                @if ($errors->has('title'))
                    <span class="error">{{$errors->first('category')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="text" class="form-control" id="title" name="title">
                @if ($errors->has('title'))
                    <span class="alert-danger form-check-inline">{{$errors->first('title')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Beschrijving:</label>
                <input type="text" class="form-control" id="description" name="description">
                @if ($errors->has('description'))
                    <span class="alert-danger form-check-inline">{{$errors->first('description')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="image">Afbeelding URL</label>
                <input type="text" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn-primary btn-block">Review Opslaan</button>
        </form>
    </div>
@endsection
