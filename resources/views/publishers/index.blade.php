@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">Publishers</div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Founded At</th>
                                <th>Social Media</th>
                                <th>Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($publishers as $publisher)
                                <tr>
                                    <td>{{ $publisher->name }}</td>
                                    <td>{{ $publisher->founded_at->format('Y-m-d') }}</td>
                                    <td>
                                        @if (!empty($publisher->twitter))
                                            <a href="http://twitter.com/{{ $publisher->twitter }}" class="btn btn-xs btn-info" target="_blank">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        @endif

                                        @if (!empty($publisher->website))
                                            <a href="{{ $publisher->website }}" class="btn btn-xs btn-default" target="_blank">
                                                <i class="fa fa-globe"></i>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $publisher->address }}<br>
                                        {{ $publisher->city }} {{ $publisher->zip }}<br>
                                        {{ $publisher->country }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
