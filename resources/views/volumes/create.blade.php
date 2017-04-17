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
                        <h3>Create Volume</h3>
                    </div>
                    <ol class="breadcrumb navbar-text navbar-right no-bg">
                        <li class="current-parent">
                            <a class="current-parent" href="{{ route('dashboard.index') }}">
                                <i class="fa fa-fw fa-home"></i>
                            </a>
                        </li>
                        <li><a href="{{ route('volumes.index') }}">Volumes</a></li>
                        <li class="active">Create Volume</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- END Sub-Navbar with Header and Breadcrumbs-->

    <div class="container">
        @if (count($errors) > 0)
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="alert b-l-danger bg-white b-r-a-0 b-l-3 b-r-0 b-b-0 b-t-0 shadow-box" role="alert">
                        <div class="media">
                            <div class="media-left">
                                <span class="fa fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                    <i class="fa fa-close fa-stack-1x text-white"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h5 class="m-b-1 media-heading">Some errors occured</h5>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                {!! Form::open(['route' => 'volumes.store']) !!}
                {!! Form::token() !!}
                {!! Form::hidden('uuid', \Webpatser\Uuid\Uuid::generate(4)) !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'Name *') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('number', 'Number') !!}
                    {!! Form::text('number', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('year', 'Year *') !!}
                    {!! Form::text('year', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('publisher_id', 'Publisher *') !!}
                    {!! Form::select('publisher_id', $publishers, null, ['id' => 'publisher_id', 'class' => 'form-control select2 select2-input']) !!}
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Save Volume</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="/assets/vendor/js/moment.min.js"></script>
    <script src="/assets/vendor/js/select2.min.js"></script>
    <script src="/assets/vendor/js/bootstrap-select.min.js"></script>
@endsection
