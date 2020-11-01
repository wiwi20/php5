@extends('layouts.app')

@section('content')
    <div class="container zoekresult">
        <header class="headerclass">
            <?php $cat_titles=DB::table('categories')->select('title')->where('id', $id_)->get();?>
                @foreach($cat_titles as $cat_t)
                    <h1 class="float-left">Alle gevonden resultaat categorie: {{$cat_t->title}}</h1>
                    <a class="nav-link float-right" href="{{route('news')}}">terug naar nieuwsbericht</a>
                @endforeach
        </header>
        <div class="row col-12 ">
            <table class="table">
            <thead>
                <tr>
                    <th>Niewsbericht title</th>
                    <th>Niewsbericht beschrijving</th>
                    <th>Niewsbericht image</th>
                    <th>Niewsbericht category id</th>
                </tr>
            </thead>
            <tbody>
            @foreach($category_item as $newsItem)
                <tr>
                    <td>{{$newsItem['title']}}</td>
                    <td>{{$newsItem['description']}}</td>
                    <td>{{$newsItem['image']}}</td>
                    <td>{{$newsItem['category_id']}}</td>
                </tr>
            @endforeach

            </tbody>
            </table>
        </div>
    </div>
@endsection

