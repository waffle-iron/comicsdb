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
                <div class="panel panel-default b-a-0 box-shadow">
                    <div class="panel-heading">
                        <h6 class="panel-title">Create Publisher</h6>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'publishers.store', 'class' => 'form-horizontal', 'files' => true]) !!}
                        {!! Form::token() !!}
                        {!! Form::hidden('uuid', \Webpatser\Uuid\Uuid::generate(4)) !!}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Name', ['class' => 'control-label col-sm-3 required']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', ['class' => 'control-label col-sm-3']) !!}
                            <div class="col-sm-6">
                                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('founded_at', 'Founded', ['class' => 'control-label col-sm-3 required']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('founded_at', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Logo', ['class' => 'control-label col-sm-3 required']) !!}
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" readonly>
                                    <label class="input-group-btn">
                                        <span class="btn btn-default">
                                            Browse&hellip; <input name="image" id="image" type="file" style="display: none;">
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="hr-text hr-text-left">
                            <h6 class="text-white bg-white-i">
                                <strong>Social</strong>
                            </h6>
                        </div>
                        <div class="form-group">
                            {!! Form::label('twitter', 'Twitter account', ['class' => 'control-label col-sm-3']) !!}
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">https://twitter.com/</span>
                                    {!! Form::text('twitter', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('website', 'Website', ['class' => 'control-label col-sm-3']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('website', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="hr-text hr-text-left">
                            <h6 class="text-white bg-white-i">
                                <strong>Address</strong>
                            </h6>
                        </div>
                        <div class="form-group">
                            {!! Form::label('address', 'Address', ['class' => 'control-label col-sm-3']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('address', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('city', 'City', ['class' => 'control-label col-sm-3']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('city', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('state', 'State', ['class' => 'control-label col-sm-3']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('state', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('zip', 'Zipcode', ['class' => 'control-label col-sm-3']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('zip', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('country', 'Country', ['class' => 'control-label col-sm-3']) !!}
                            <div class="col-sm-6">
                                {!! Form::select('country', $countries, null, ['id' => 'country', 'class' => 'form-control select2 select2-input']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button type="submit" class="btn btn-default">Save Publisher</button>
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
            $('input[name="founded_at"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minDate: "1930-01-01",
                maxDate: "{{ \Carbon\Carbon::now()->format('Y-m-d') }}",
                locale: {
                    format: "YYYY-MM-DD",
                }
            });
        });

        $(function() {

            // We can attach the `fileselect` event to all file inputs on the page
            $(document).on('change', ':file', function() {
                var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
            });

            // We can watch for our custom `fileselect` event like this
            $(document).ready( function() {
                $(':file').on('fileselect', function(event, numFiles, label) {

                    var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                    if( input.length ) {
                        input.val(log);
                    } else {
                        if( log ) alert(log);
                    }

                });
            });

        });
    </script>
@endsection
