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
                <h4>{{ $volumes->count() . ' Volumes' }}</h4>
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

        <div class="row m-t-3" id="grid" data-columns>
            @foreach ($volumes as $volume)
                <div class="box">
                    <div class="thumbnail shadow-box b-a-0">
                        <a href="{{ route('volumes.show', ['id' => $volume->id]) }}">
                            <img data-src="holder.js/100px200p?theme=image&font=FontAwesome" src="{{ Storage::url('/issues/'.$volume->getLastIssue()->uuid.'.png') }}">
                        </a>
                        <div class="caption">
                            <h5 class="m-b-0">
                                <span>
                                    {{ $volume->name }}
                                    <span class="pull-right text-gray-light">
                                        <i class="fa fa-calendar"></i> {{ $volume->year }}
                                    </span>
                                </span>
                                @if (isset($volume->number))
                                    <br><small>Volume {{ $volume->number }}</small>
                                @endif
                            </h5>
                            <p class="text-gray-light m-t-1 m-b-1">
                                {!! nl2br($volume->description) !!}
                            </p>
                            <p class="text-gray m-t-1 m-b-1">
                                {{ $volume->publisher()->first()->name }}
                            </p>
                            <div class="label label-success">
                                <span>{{ $volume->issues()->count() }} Issues</span>
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
