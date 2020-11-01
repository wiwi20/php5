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

                        {{ __('You are logged in as an user!') }}

                            <div class="row col-12 ">
                                <p>Je gegevens:</p>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Gebruikdersnaam</th>
                                        <th>studenten/docentnummer</th>
                                        <th>emailadres</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ Auth::user()->name }}</td>
                                            <td>{{ Auth::user()->schoolnummer }}</td>
                                            <td>{{ Auth::user()->email }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
