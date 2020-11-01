@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center dash">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in as an admin!') }}
                            <table class="table table-bordered table-responsive-lg">
                                <tr>
                                    <th>Titel</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Category_id</th>
                                    <th>Status</th>
                                    <th>Changestatus</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach($newsItems as $newsItem)
                                    <tr>
                                        <td>{{$newsItem->title}}</td>
                                        <td>{{$newsItem->description}}</td>
                                        <td>{{$newsItem->image}}</td>
                                        <td>{{$newsItem->category_id}}</td>
                                        <td>{{$newsItem->status}}</td>
                                        <td>
                                            <form action="{{ route('admin.changeStatus', $newsItem->id)}}" method="post">
                                                {{csrf_field()}}
                                                @if($newsItem->status==1)
                                                    <button class="btn btn-primary">active</button>
                                                @else
                                                    <button class="btn btn-primary">niet-active</button>
                                                @endif
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.destroy', $newsItem->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <input class="btn btn-danger" type="submit" value="Delete" />
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
