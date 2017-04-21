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
                        <h3>Add Publisher Logo</h3>
                    </div>
                    <ol class="breadcrumb navbar-text navbar-right no-bg">
                        <li class="current-parent">
                            <a class="current-parent" href="{{ route('dashboard.index') }}">
                                <i class="fa fa-fw fa-home"></i>
                            </a>
                        </li>
                        <li><a href="{{ route('publishers.index') }}">Publishers</a></li>
                        <li>{!! $publisher->name !!}</li>
                        <li class="active">Add Publisher Logo</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- END Sub-Navbar with Header and Breadcrumbs-->

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="panel-title">Upload Logo</h6>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'publishers.logo.store', 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
                        {!! Form::hidden('id', $publisher->id) !!}
                        {!! Form::hidden('uuid', $publisher->uuid) !!}
                        <div class="form-group">
                            {!! Form::label('image', 'Logo image', ['class' => 'control-label col-sm-3']) !!}
                            <div class="col-sm-6">
                                {!! Form::file('image', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <button type="submit" class="btn btn-default">Save uploaded image</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
