@extends('layouts.app')

@section('content')
    <!-- START Sub-Navbar with Header only-->
    <div class="sub-navbar sub-navbar__header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header m-t-0">
                        <h3 class="m-t-0">Volumes</h3>
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
                        <h3>{{ $volume->name }}</h3>
                    </div>
                    <ol class="breadcrumb navbar-text navbar-right no-bg">
                        <li class="current-parent">
                            <a class="current-parent" href="{{ route('dashboard.index') }}">
                                <i class="fa fa-fw fa-home"></i>
                            </a>
                        </li>
                        <li><a href="{{ route('volumes.index') }}">Volumes</a></li>
                        <li class="active">{{ $volume->name }}</li>
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
                                <img class="img-circle center-block m-t-1 m-b-2" src="{{ Storage::url('/volumes/'.$volume->uuid.'.png') }}">
                            </div>
                        </div>
                    </div>
                    <div class="media-body">
                        <h4 class="m-b-0">{{ $volume->name }}</h4>
                        @if (!empty($volume->number))
                            <p class="m-t-0">
                                Volume {{ $volume->number }}
                            </p>
                        @endif
                        <div class="btn-toolbar" role="toolbar">
                            <div class="btn-group" role="group">
                                <a role="button" href="{{ route('volumes.edit', ['id' => $volume->id]) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title data-original-title="Edit">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                            </div>
                            <div class="btn-group" role="group" data-toggle="tooltip" data-placement="top" title data-original-title="Delete">
                                <a role="button" href="#deleteVolumeModal" class="btn btn-default deleteVolume" data-toggle="modal">
                                    <i class="fa fa-fw fa-trash"></i>
                                </a>
                            </div>
                            <div class="btn-group" role="group" data-toggle="tooltip" data-placement="top" title data-original-title="Add Issue">
                                <a role="button" href="{{ route('issues.create', ['volume' => $volume->id]) }}" class="btn btn-primary">
                                    Add Issue
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hr-text hr-text-left m-t-2">
                    <h6 class="text-white">
                        <strong>Publisher</strong>
                    </h6>
                </div>
                {{ $volume->publisher()->first()->name }}
                <div class="hr-text hr-text-left m-t-2">
                    <h6 class="text-white">
                        <strong>Year</strong>
                    </h6>
                </div>
                {{ $volume->year }}
            </div>

            <div class="col-lg-8 m-b-2">
                <div class="row">
                    @foreach($volume->issues()->get() as $issue)
                        <div class="col-md-4 col-lg-4">
                            <div class="panel panel-default shadow-box b-l-2 b-t-0 b-r-0 b-b-0">
                                <div class="panel-body">

                                </div>
                                <div class="panel-footer">
                                    <div class="text-center">
                                        <p class="m-l-0 m-r-0 m-t-0 m-b-0"><strong>Issue #{{ $issue->number }}</strong></p>
                                        <p class="m-l-0 m-r-0 m-t-0 m-b-0"><small>{{ $issue->name }}</small></p>
                                        <p class="text-muted m-l-0 m-r-0 m-t-0 m-b-0"><small>{{ $issue->store_date->format('F Y') }}</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Publisher Modal -->
    <div class="modal fade" id="deleteVolumeModal" tabindex="-1" role="dialog" aria-labelledby="deleteVolumeModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content b-a-0">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                    <h4 class="modal-title" id="deleteVolumeModalLabel">Remove Volume</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove the Volume?
                </div>
                <div class="modal-footer">
                    {!! Form::open(['route' => ['volumes.delete'], 'method' => 'delete']) !!}
                    {!! Form::hidden('id', $volume->id) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Remove Volume</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
