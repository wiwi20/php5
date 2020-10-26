@extends('layouts.app')

@section('content')
    <div class="container zoekresult">
        <header class="headerclass">
            <h1 class="float-left">Alle gevonden resultaat</h1>
        </header>
        <div class="row col-12 ">
            <table class="table">
            <thead>
                <tr>
                    <th>Niewsbericht title</th>
                    <th>Niewsbericht beschrijving</th>
                    <th>Niewsbericht image</th>
                </tr>
            </thead>
            <tbody>
            @foreach($newsItems as $newsItem)
                <tr>
                    <td>{{$newsItem['title']}}</td>
                    <td>{{$newsItem['description']}}</td>
                    <td>{{$newsItem['image']}}</td>
                </tr>
            @endforeach
            </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection

