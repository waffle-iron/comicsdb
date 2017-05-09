@extends('layouts.app')

@section('content')
    <!-- START Sub-Navbar with Header only-->
    <div class="sub-navbar sub-navbar__header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header m-t-0">
                        <h3 class="m-t-0">Creators</h3>
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
                        <h3>Creators</h3>
                    </div>
                    <ol class="breadcrumb navbar-text navbar-right no-bg">
                        <li class="current-parent">
                            <a class="current-parent" href="{{ route('dashboard.index') }}">
                                <i class="fa fa-fw fa-home"></i>
                            </a>
                        </li>
                        <li class="active">Creators</li>
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
                        <a class="btn btn-primary" href="{{ route('creators.create') }}">
                            <i class="fa fa-fw fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-t-3" id="grid" data-columns>
            @foreach ($creators as $creator)
                <div class="box">
                    <a href="{{ route('creators.show', ['id' => $creator->id]) }}">
                        <div class="panel panel-default shadow-box b-a-0">
                            <div class="panel-body">
                                <div class="avatar avatar-lg center-block">
                                    <img class="img-circle img-thumbnail center-block m-t-1 m-b-2" data-src="holder.js/80x80?theme=image&font=FontAwesome" src="{{ Storage::url('/creators/'.$creator->uuid.'.png') }}">
                                </div>
                                <h5 class="text-center">
                                    <span>{{ $creator->firstname }} {{ $creator->lastname }}</span><br>
                                </h5>
                                <p class="m-t-0 text-center">
                                <div class="label label-primary pull-right">{{ $creator->issues()->count() }} Issues</div>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="text-center">
            {{ $creators->links() }}
        </div>
    </div>
@endsection
