@extends('layouts.app')

@section('content')
    <!-- START Sub-Navbar with Header only-->
    <div class="sub-navbar sub-navbar__header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header m-t-0">
                        <h3 class="m-t-0">Issues</h3>
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
                        <h3>#{{ $issue->number }} <small>{{ $issue->name }}</small></h3>
                    </div>
                    <ol class="breadcrumb navbar-text navbar-right no-bg">
                        <li class="current-parent">
                            <a class="current-parent" href="{{ route('dashboard.index') }}">
                                <i class="fa fa-fw fa-home"></i>
                            </a>
                        </li>
                        <li><a href="{{ route('issues.index') }}">Issues</a></li>
                        <li class="active">#{{ $issue->number }} {{ $issue->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- END Sub-Navbar with Header and Breadcrumbs-->

    <div class="container">
        <div class="row">
            <div class="col-lg-4 m-b-2">
                <img class="img-thumbnail m-t-1 m-b-2 shadow-box" data-src="holder.js/100px200p?theme=image&font=FontAwesome" src="{{ Storage::url('/issues/'.$issue->uuid.'.png') }}" width="100%">
                <h4 class="m-b-0">{{ $issue->name }}</h4>
                <p class="m-t-0">
                    Issue #{{ $issue->number }}
                </p>
                <div class="btn-toolbar" role="toolbar">
                    <div class="btn-group" role="group">
                        <a role="button" href="{{ route('issues.edit', ['id' => $issue->id]) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title data-original-title="Edit">
                            <i class="fa fa-fw fa-pencil"></i>
                        </a>
                    </div>
                    <div class="btn-group" role="group" data-toggle="tooltip" data-placement="top" title data-original-title="Delete">
                        <a role="button" href="#deleteIssueModal" class="btn btn-default deleteIssue" data-toggle="modal">
                            <i class="fa fa-fw fa-trash"></i>
                        </a>
                    </div>
                </div>
                <div class="hr-text hr-text-left m-t-2">
                    <h6 class="text-white">
                        <strong>Volume</strong>
                    </h6>
                </div>
                <p>
                    <a href="{{ route('volumes.show', ['id' => $issue->volume()->first()->id]) }}">
                        {{ $issue->volume()->first()->name }}
                    </a>
                </p>

                <div class="hr-text hr-text-left m-t-2">
                    <h6 class="text-white">
                        <strong>Intro</strong>
                    </h6>
                </div>
                <p>{!! nl2br($issue->intro) !!}</p>

                <div class="hr-text hr-text-left m-t-2">
                    <h6 class="text-white">
                        <strong>Dates</strong>
                    </h6>
                </div>
                @if (isset($issue->cover_date))
                    <p><i class="fa fa-calendar m-r-2"></i> Cover date {{ $issue->cover_date->format('Y-m-d') }}</p>
                @endif
                <p><i class="fa fa-calendar m-r-2"></i> Store date {{ $issue->store_date->format('Y-m-d') }}</p>
            </div>

            <div class="col-lg-8 m-b-2">
                <div class="hr-text hr-text-left">
                    <h6 class="text-white">
                        <strong>Characters</strong>
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Publisher Modal -->
    <div class="modal fade" id="deleteIssueModal" tabindex="-1" role="dialog" aria-labelledby="deleteIssueModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content b-a-0">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                    <h4 class="modal-title" id="deleteIssueModalLabel">Remove Volume</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove the Issue?
                </div>
                <div class="modal-footer">
                    {!! Form::open(['route' => ['volumes.delete'], 'method' => 'delete']) !!}
                    {!! Form::hidden('id', $issue->id) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Remove Issue</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
