@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table>
            <thead>
                <tr>
                    <th>title</th>
                </tr>
            </thead>
            <tbody>
            @foreach($newsItems as $newsItem)
                <tr>
                    <td>{{$newsItem['title']}}</td>
                </tr>
            @endforeach
            </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection

