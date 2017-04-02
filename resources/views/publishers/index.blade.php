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
                        <h3>Publishers</h3>
                    </div>
                    <ol class="breadcrumb navbar-text navbar-right no-bg">
                        <li class="current-parent">
                            <a class="current-parent" href="{{ route('dashboard.index') }}">
                                <i class="fa fa-fw fa-home"></i>
                            </a>
                        </li>
                        <li class="active">Publishers</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- END Sub-Navbar with Header and Breadcrumbs-->

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-5 col-xs-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-fw fa-search"></i>
                        </button>
                    </span>
                </div>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6 col-sm-offset-2 col-lg-offset-3 col-md-offset-1 col-sm-4 col-sm-offset-2 hidden-xs">
                <!-- START Toolbar -->
                <div class="btn-toolbar pull-right">
                    <div class="btn-group" role="group">
                        <a class="btn btn-primary" href="{{ route('publishers.create') }}">
                            <i class="fa fa-fw fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-t-3">
            @foreach($publishers as $publisher)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="thumbnail shadow-box b-a-0">
                        <img data-src="holder.js/100px200?theme=image&font=FontAwesome" src="{{ Storage::url('/publishers/'.$publisher->uuid.'.png') }}" data-holder style="height: 100%; width: 100%;">
                        <div class="caption">
                            <div class="pull-right m-t-1">
                                <i class="fa fa-star-o"></i> {{ $publisher->founded_at->format('Y') }}
                            </div>
                            <h4>{{ $publisher->name }}</h4>
                            <div class="btn-group pull-left">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-fw fa-gear"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <!-- View publisher in detail -->
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-eye text-gray-lighter m-r-1"></i> View
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <!-- Edit publisher -->
                                    <li>
                                        <a href="{{ route('publishers.edit', ['id' => $publisher->id]) }}">
                                            <i class="fa fa-fw fa-edit text-gray-lighter m-r-1"></i> Edit
                                        </a>
                                    </li>
                                    <!-- Delete publisher -->
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-trash text-gray-lighter m-r-1"></i> Delete
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <!-- Upload publishers logo -->
                                    <li>
                                        <a href="{{ route('publishers.logo.add', ['id' => $publisher->id]) }}">
                                            <i class="fa fa-fw fa-image text-gray-lighter m-r-1"></i> Upload Logo
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <p class="text-gray-light m-t-1 m-b-0 text-right" style="line-height: 10px;">
                                <small>
                                    {{ $publisher->address }}<br>
                                    {{ $publisher->city }}, {{ $publisher->state }} {{ $publisher->zip }}<br>
                                    {{ $publisher->country }}
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center">
            {{ $publishers->links() }}
        </div>
    </div>
@endsection
