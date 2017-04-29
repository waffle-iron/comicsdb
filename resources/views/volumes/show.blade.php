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
                <img class="img-thumbnail m-t-1 m-b-2 shadow-box" data-src="holder.js/100px200p?theme=image&font=FontAwesome" src="{{ Storage::url('/issues/'.$volume->getLastIssue()->uuid.'.png') }}" width="100%">
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
                <div class="hr-text hr-text-left m-t-2">
                    <h6 class="text-white">
                        <strong>Publisher</strong>
                    </h6>
                </div>
                <a href="{{ route('publishers.show', ['id' => $volume->publisher()->first()->id]) }}">
                    {{ $volume->publisher()->first()->name }}
                </a>
                <div class="hr-text hr-text-left m-t-2">
                    <h6 class="text-white">
                        <strong>Year</strong>
                    </h6>
                </div>
                {{ $volume->year }}
            </div>

            <div class="col-lg-8 m-b-2">
                @if ($volume->description)
                    <div class="hr-text hr-text-left m-t-2">
                        <h6 class="text-white">
                            <strong>Description</strong>
                        </h6>
                    </div>
                    <p class="lead">{!! nl2br($volume->description) !!}</p>
                @endif
                <div class="hr-text hr-text-left m-b-1">
                    <h6 class="text-white">
                        <strong>Issues</strong>
                    </h6>
                </div>
                <div class="row m-t-3" id="grid" data-columns>
                    @foreach($volume->issues()->orderBy('number', 'desc')->get() as $issue)
                        <div class="box">
                            <div class="shadow-box-dark">
                                <div class="thumbnail b-a-0">
                                    <a href="{{ route('issues.show', ['id' => $issue->id]) }}">
                                        <img data-src="holder.js/100px200p?theme=image&font=FontAwesome" src="{{ Storage::url('/issues/'.$issue->uuid.'.png') }}">
                                    </a>
                                </div>
                            </div>
                            <div class="caption text-center m-t-0 p-t-0 p-b-0">
                                <h6 class="m-b-0">
                                    Issue #{{ $issue->number }}
                                </h6>
                                <small>{{ $issue->name }}</small>
                                <p class="small text-gray-light">
                                    {{  $issue->cover_date->format('F Y') }}
                                </p>
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
