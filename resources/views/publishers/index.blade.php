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
                        <button type="button" class="btn btn-primary">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default shadow-box b-a-0 m-t-3">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="small text-muted text-uppercase"><strong>Name</strong></th>
                            <th class="small text-muted text-uppercase"><strong>Founded At</strong></th>
                            <th class="small text-muted text-uppercase"><strong>Social</strong></th>
                            <th class="small text-muted text-uppercase"><strong>Address</strong></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($publishers as $publisher)
                            <tr>
                                <td class="v-a-m">
                                    <div class="media">
                                        <div class="media-left media-middle media-middle">
                                            <a href="#" data-toggle="tooltip" data-placement="top" title data-original-title="Publisher Logo">
                                                <div class="avatar avatar-image">
                                                    <img class="media-object img-circle" src="" alt="Avatar">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="media-body media-auto">
                                            <h5 class="m-b-0">
                                                {{ $publisher->name }}
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td class="v-a-m">{{ $publisher->founded_at->format('Y-m-d') }}</td>
                                <td class="v-a-m">
                                    @if (!empty($publisher->twitter))
                                        <a href="http://twitter.com/{{ $publisher->twitter }}" data-toggle="tooltip" data-placement="top" title data-original-title="Twitter Profile" target="_blank"><i class="fa fa-fw fa-twitter-square text-muted fa-lg"></i></a>
                                    @endif

                                    @if (!empty($publisher->website))
                                        <a href="{{ $publisher->website }}" data-toggle="tooltip" data-placement="top" title data-original-title="Website" target="_blank"><i class="fa fa-fw fa-globe text-muted fa-lg"></i></a>
                                    @endif
                                </td>
                                <td class="v-a-m">
                                    {{ $publisher->address }}<br>
                                    {{ $publisher->city }} {{ $publisher->zip }}<br>
                                    {{ $publisher->country }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
