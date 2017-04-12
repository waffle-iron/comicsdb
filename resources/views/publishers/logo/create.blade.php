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
            <div class="panel panel-default b-a-1 b-info shadow-box">
                <div class="panel-heading">
                    Information for Logo Upload
                </div>
                <div class="panel-body">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed posuere lectus blandit, fermentum erat vel, facilisis libero. Vestibulum dignissim laoreet massa non hendrerit. Vestibulum placerat magna vel lobortis tempor. Nulla est tortor, ullamcorper eu justo tincidunt, auctor vulputate ante. Praesent eu ipsum a est venenatis semper nec vitae ex. Quisque tincidunt porttitor nibh, eu mattis mi laoreet non. Curabitur et ligula sed augue rhoncus egestas sit amet vitae augue. Aliquam vel egestas nibh.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                {!! Form::open(['route' => 'publishers.logo.store', 'method' => 'post', 'files' => true]) !!}
                {!! Form::hidden('id', $publisher->id) !!}
                {!! Form::hidden('uuid', $publisher->uuid) !!}
                <div class="form-group">
                    {!! Form::label('image', 'Logo image') !!}
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Save uploaded image</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
