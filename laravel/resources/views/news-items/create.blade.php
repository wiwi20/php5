@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="createheaderclass">
                    <h1 class="float-left">Voeg een nieuwsbericht toe</h1>
                    <a class="nav-link float-right" href="{{route('news')}}">Terug naar nieuwsoverzicht</a>
                </header>
            </div>
        </div>
    </div>
    @guest
        <div class="container">
            <div class="col-12 createmain">
                <p>Login om nieuwsbericht toe te voegen</p>
            </div>
        </div>
    @endguest
    @auth
    <div class="container">
        <div class="col-12 createmain">
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
                    @if ($errors->has('image'))
                        <span class="alert-danger form-check-inline">{{$errors->first('image')}}</span>
                    @endif
                </div>
                <div class="form-group status">
                    <label for="status">status:</label>
                    <input type="text" class="form-control" id="status" name="status" value="1">
                    @if ($errors->has('status'))
                        <span class="alert-danger form-check-inline">{{$errors->first('status')}}</span>
                    @endif
                </div>
                <button type="submit" class="btn-primary btn-block">Review Opslaan</button>
            </form>
         </div>
    </div>
    @endauth
@endsection
