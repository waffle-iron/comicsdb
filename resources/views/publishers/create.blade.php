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
                {!! Form::open(['route' => 'publishers.store']) !!}
                {!! Form::token() !!}
                {!! Form::hidden('uuid', \Webpatser\Uuid\Uuid::generate(4)) !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'Name *') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('founded_at', 'Founded') !!}
                    {!! Form::text('founded_at', null, ['class' => 'form-control']) !!}
                </div>
                <div class="hr-text hr-text-left">
                    <h6 class="text-white">
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
                    <h6 class="text-white">
                        <strong>Address</strong>
                    </h6>
                </div>
                <div class="form-group">
                    {!! Form::label('address', 'Address') !!}
                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('city', 'City') !!}
                    {!! Form::text('city', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('state', 'State') !!}
                    {!! Form::text('state', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('zip', 'Zipcode') !!}
                    {!! Form::text('zip', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('country', 'Country') !!}
                    {!! Form::select('country', $countries, null, ['id' => 'country', 'class' => 'form-control select2 select2-input']) !!}
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Save Publisher</button>
                </div>
                {!! Form::close() !!}
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
            $('input[name="founded_at"]').daterangepicker({
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
