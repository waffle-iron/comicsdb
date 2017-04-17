@extends('layouts.app')

@section('content')
    <!-- START Sub-Navbar with Header only-->
    <div class="sub-navbar sub-navbar__header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header m-t-0">
                        <h3 class="m-t-0">Publishers</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Sub-Navbar with Header only-->

    <!-- START Sub-Navbar with Header and Breadcrumbs-->
    <div class="sub-navbar sub-navbar__header-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 sub-navbar-column">
                    <div class="sub-navbar-header">
                        <h3>{{ $publisher->name }}</h3>
                    </div>
                    <ol class="breadcrumb navbar-text navbar-right no-bg">
                        <li class="current-parent">
                            <a class="current-parent" href="{{ route('dashboard.index') }}">
                                <i class="fa fa-fw fa-home"></i>
                            </a>
                        </li>
                        <li><a href="{{ route('publishers.index') }}">Publishers</a></li>
                        <li class="active">{{ $publisher->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- END Sub-Navbar with Header and Breadcrumbs-->

    <div class="container">
        <div class="row">
            <div class="col-lg-4 m-b-2">
                <div class="media">
                    <div class="media-left p-r-2">
                        <div class="center-block">
                            <div class="avatar avatar-image avatar-lg center-block">
                                <img class="img-circle center-block m-t-1 m-b-2" src="{{ Storage::url('/publishers/'.$publisher->uuid.'.png') }}">
                            </div>
                        </div>
                    </div>
                    <div class="media-body">
                        <h4 class="m-b-0">{{ $publisher->name }}</h4>
                        <p class="m-t-0">
                            Founded at {{ $publisher->founded_at->format('Y') }}
                        </p>
                        <div class="btn-toolbar" role="toolbar">
                            <div class="btn-group" role="group">
                                <a role="button" href="{{ route('publishers.edit', ['id' => $publisher->id]) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title data-original-title="Edit">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                            </div>
                            <div class="btn-group" role="group" data-toggle="tooltip" data-placement="top" title data-original-title="Delete">
                                <a role="button" href="#deletePublisherModal" class="btn btn-default deletePublisher" data-toggle="modal">
                                    <i class="fa fa-fw fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hr-text hr-text-left m-t-2">
                    <h6 class="text-white">
                        <strong>Address</strong>
                    </h6>
                </div>
                {{ $publisher->address }}<br>
                {{ $publisher->city }}, {{ $publisher->state }} {{ $publisher->zip }}<br>
                {{ $publisher->country }}
                <div class="hr-text hr-text-left m-t-2">
                    <h6 class="text-white">
                        <strong>Social</strong>
                    </h6>
                </div>
                @if($publisher->twitter)
                <a href="https://twitter.com/{{ $publisher->twitter }}" target="_blank" data-toggle="tooltip" data-placement="top" title data-original-title="Twitter Profile">
                    <i class="fa fa-fw fa-twitter-square text-muted fa-lg"></i>
                </a>
                @endif
                @if($publisher->website)
                <a href="{{ $publisher->website }}" target="_blank" data-toggle="tooltip" data-placement="top" title data-original-title="Website">
                    <i class="fa fa-fw fa-globe text-muted fa-lg"></i>
                </a>
                @endif
            </div>

            <div class="col-lg-8 m-b-2">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="panel panel-default shadow-box b-t-2 b-t-primary b-r-0 b-l-0 b-b-0">
                        <div class="panel-body">
                            <h3 class="display-4 text-center m-t-2">{{ $publisher->volumes()->count() }}</h3>
                            <p class="text-muted small text-uppercase m-t-0 m-b-2 text-center">
                                <strong>Volumes</strong>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="panel panel-default shadow-box b-t-2 b-t-primary b-r-0 b-l-0 b-b-0">
                        <div class="panel-body">
                            <h3 class="display-4 text-center m-t-2">{{ $publisher->amountOfIssues() }}</h3>
                            <p class="text-muted small text-uppercase m-t-0 m-b-2 text-center">
                                <strong>Issues</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Publisher Modal -->
    <div class="modal fade" id="deletePublisherModal" tabindex="-1" role="dialog" aria-labelledby="deletePublisherModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content b-a-0">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                    <h4 class="modal-title" id="deletePublisherModalLabel">Remove Publisher</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove the Publisher?
                </div>
                <div class="modal-footer">
                    {!! Form::open(['route' => ['publishers.delete'], 'method' => 'delete']) !!}
                    {!! Form::hidden('id', $publisher->id) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Remove Publisher</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
