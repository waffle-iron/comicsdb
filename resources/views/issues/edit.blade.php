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
                        <h3>#{{ $issue->number }} {{ $issue->name }}</h3>
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
        @if (count($errors) > 0)
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default b-a-0 shadow-box">
                    <div class="panel-heading">
                        <h4 class="panel-title">Edit Issue</h4>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'issues.update', 'class' => 'form-horizontal']) !!}
                        {!! Form::token() !!}
                        {!! Form::hidden('id', $issue->id) !!}
                        <div class="form-group">
                            {!! Form::label('volume_id', 'Volume', ['class' => 'control-label col-sm-3 required']) !!}
                            <div class="col-sm-6">
                                {!! Form::select('volume_id', $volumes, $issue->volume()->first()->id, ['class' => 'form-control selectpicker', 'data-live-search' => true]) !!}
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                            {!! Form::label('number', 'Number', ['class' => 'control-label col-sm-3 required']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('number', $issue->number, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name', ['class' => 'control-label col-sm-3']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('name', $issue->name, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('intro', 'Intro', ['class' => 'control-label col-sm-3']) !!}
                            <div class="col-sm-6">
                                {!! Form::textarea('intro', $issue->intro, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="hr-text hr-text-left">
                            <h6 class="text-white bg-white-i">Dates</h6>
                        </div>
                        <div class="form-group{{ $errors->has('cover_date') ? ' has-error' : '' }}">
                            {!! Form::label('cover_date', 'Cover Date', ['class' => 'control-label col-sm-3']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('cover_date', $issue->cover_date, ['class' => 'form-control datepicker datepicker-empty']) !!}
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('store_date') ? ' has-error' : '' }}">
                            {!! Form::label('store_date', 'Store Date', ['class' => 'control-label col-sm-3 required']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('store_date', $issue->store_date->format('Y-m-d'), ['class' => 'form-control datepicker']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button type="submit" class="btn btn-default">Update Issue</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="/assets/vendor/js/moment.min.js"></script>
    <script src="/assets/vendor/js/daterangepicker.min.js"></script>
    <script src="/assets/vendor/js/select2.min.js"></script>
    <script src="/assets/vendor/js/bootstrap-select.min.js"></script>
    <script>
        $(function() {
            $('input[name="store_date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minDate: "1930-01-01",
                maxDate: "{{ \Carbon\Carbon::now()->format('Y-m-d') }}",
                locale: {
                    format: "YYYY-MM-DD",
                },
                autoUpdateInput: false
            }, function (chosen_date) {
                $('input[name="store_date"]').val(chosen_date.format('YYYY-MM-DD'));
            });

            $('input[name="cover_date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minDate: "1930-01-01",
                maxDate: "{{ \Carbon\Carbon::now()->format('Y-m-d') }}",
                locale: {
                    format: "YYYY-MM-DD",
                },
                autoUpdateInput: false
            }, function (chosen_date) {
                $('input[name="cover_date"]').val(chosen_date.format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection
