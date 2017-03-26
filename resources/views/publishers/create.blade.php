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
                        <h3>Create Publisher</h3>
                    </div>
                    <ol class="breadcrumb navbar-text navbar-right no-bg">
                        <li class="current-parent">
                            <a class="current-parent" href="{{ route('dashboard.index') }}">
                                <i class="fa fa-fw fa-home"></i>
                            </a>
                        </li>
                        <li><a href="{{ route('publishers.index') }}">Publishers</a></li>
                        <li class="active">Create Publisher</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- END Sub-Navbar with Header and Breadcrumbs-->

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                {!! Form::open(['route' => 'publishers.store']) !!}
                <div class="panel panel-default b-a-0 shadow-box">
                    <div class="panel-body">
                        {!! Form::token() !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('founded_at', 'Founded') !!}
                            {!! Form::text('founded_at', null, ['class' => 'form-control', 'name' => 'daterange-date-picker']) !!}
                        </div>
                        <div class="hr-text hr-text-left">
                            <h6 class="text-white bg-white-i">
                                <strong>Social</strong>
                            </h6>
                        </div>
                        <div class="form-group">
                            {!! Form::label('twitter', 'Twitter account') !!}
                            <div class="input-group">
                                <span class="input-group-addon">https://twitter.com/</span>
                                {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('website', 'Website') !!}
                            {!! Form::text('website', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="hr-text hr-text-left">
                            <h6 class="text-white bg-white-i">
                                <strong>Address</strong>
                            </h6>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        <button type="submit" class="btn btn-primary">Save Publisher</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="/assets/vendor/js/moment.min.js"></script>
    <script src="/assets/vendor/js/daterangepicker.min.js"></script>
    <script>
        $(function() {
            $('input[name="daterange-date-picker"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minDate: "1960-01-01",
                maxDate: "{{ \Carbon\Carbon::now()->format('Y-m-d') }}",
                locale: {
                    format: "YYYY-MM-DD",
                }
            });
        });
    </script>
@endsection
