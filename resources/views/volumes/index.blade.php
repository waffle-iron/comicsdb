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
                        <h3>Volumes</h3>
                    </div>
                    <ol class="breadcrumb navbar-text navbar-right no-bg">
                        <li class="current-parent">
                            <a class="current-parent" href="{{ route('dashboard.index') }}">
                                <i class="fa fa-fw fa-home"></i>
                            </a>
                        </li>
                        <li class="active">Volumes</li>
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
                        <a class="btn btn-primary" href="{{ route('volumes.create') }}">
                            <i class="fa fa-fw fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-t-3">
            @foreach ($volumes as $volume)
                <div class="col-lg-3">
                    <div class="panel panel-default shadow-box b-l-2 b-t-0 b-r-0 b-b-0">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <h3 class="f-w-300 m-t-0 m-b-0 text-gray-light">{{ $volume->name }}</h3>
                                    <p class="f-w-300 m-t-0 m-b-0">
                                        &nbsp;
                                        @if (isset($volume->number))
                                            Vol. {{ $volume->number }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-gray-light">
                            <div class="row">
                                <div class="col-lg-6">
                                    <i class="m-r-1 fa fa-newspaper-o"></i>
                                    {{ $volume->publisher()->first()->name }}
                                </div>
                                <div class="col-lg-6 text-right">
                                    <i class="m-r-1 fa fa-file"></i>
                                    0
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center">
            {{ $volumes->links() }}
        </div>
    </div>
@endsection
