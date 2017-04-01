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
                        <li>Publishers</li>
                        <li class="active">Publishers List</li>
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
                        <img data-src="holder.js/100px200?theme=image&font=FontAwesome" src="#" data-holder style="height: 200px; width: 100%;">
                        <div class="caption">
                            <div class="pull-right m-t-1">
                                <i class="fa fa-star-o"></i> {{ $publisher->founded_at->format('Y') }}
                            </div>
                            <h4>{{ $publisher->name }}</h4>
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
