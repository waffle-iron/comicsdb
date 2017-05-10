@extends('layouts.app')

@section('content')
<!-- START Sub-Navbar with Header only-->
<div class="sub-navbar sub-navbar__header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header m-t-0">
                    <h3 class="m-t-0">Dashboard</h3>
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
                    <h3>Dashboard</h3>
                </div>
                <ol class="breadcrumb navbar-text navbar-right no-bg">
                    <li class="current-parent">
                        <a class="current-parent" href="{{ url('/') }}">
                            <i class="fa fa-fw fa-home"></i>
                        </a>
                    </li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- END Sub-Navbar with Header and Breadcrumbs-->


<div class="container">

    <!-- START Content -->
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="panel panel-default b-l-2 b-l-primary shadow-box b-t-0 b-r-0 b-b-0">
                <div class="panel-heading b-b-0">
                    Publishers
                </div>
                <div class="panel-body text-center p-t-0">
                    <h1 class="m-t-0 m-b-0 f-w-300">{{ $newestPublishers->count() }}</h1>
                    <p>New Publishers</p>
                </div>
                <div class="panel-footer text-center">
                    <a href="{{ route('publishers.index') }}" class="text-gray-light">
                        See All <i class="m-l-1 fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4">
            <div class="panel panel-default b-l-2 b-l-success shadow-box b-t-0 b-r-0 b-b-0">
                <div class="panel-heading b-b-0">
                    Volumes
                </div>
                <div class="panel-body text-center p-t-0">
                    <h1 class="m-t-0 m-b-0 f-w-300">{{ $newestVolumes->count() }}</h1>
                    <p>New Volumes</p>
                </div>
                <div class="panel-footer text-center">
                    <a href="{{ route('volumes.index') }}" class="text-gray-light">
                        See All <i class="m-l-1 fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4">
            <div class="panel panel-default b-l-2 b-l-danger shadow-box b-t-0 b-r-0 b-b-0">
                <div class="panel-heading b-b-0">
                    Issues
                </div>
                <div class="panel-body text-center p-t-0">
                    <h1 class="m-t-0 m-b-0 f-w-300">{{ $newestIssues->count() }}</h1>
                    <p>New Issues</p>
                </div>
                <div class="panel-footer text-center">
                    <a href="{{ route('issues.index') }}" class="text-gray-light">
                        See All <i class="m-l-1 fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4">
            <div class="panel panel-default b-l-2 b-l-soft-purple shadow-box b-t-0 b-r-0 b-b-0">
                <div class="panel-heading b-b-0">
                    Creators
                </div>
                <div class="panel-body text-center p-t-0">
                    <h1 class="m-t-0 m-b-0 f-w-300">{{ $newestCreators->count() }}</h1>
                    <p>New Creators</p>
                </div>
                <div class="panel-footer text-center">
                    <a href="{{ route('creators.index') }}" class="text-gray-light">
                        See All <i class="m-l-1 fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Publishers -->
    <div class="row m-t-1">
        <div class="col-lg-12">
            <div class="hr-text hr-text-left m-b-2">
                <h6 class="text-white">
                    <strong>Latest Publishers</strong>
                </h6>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($newestPublishers->take(6) as $publisher)
            <div class="col-lg-2">
                <div class="box">
                    <div class="thumbnail shadow-box b-a-0">
                        <a href="{{ route('publishers.show', ['id' => $publisher->id]) }}">
                            <img data-src="holder.js/100px200?theme=image&font=FontAwesome" src="{{ Storage::url('/publishers/'.$publisher->uuid.'.png') }}">
                        </a>
                        <div class="caption">
                            <div class="text-center">
                                <span>{{ $publisher->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Latest Volumes -->
    <div class="row m-t-1">
        <div class="col-lg-12">
            <div class="hr-text hr-text-left m-b-2">
                <h6 class="text-white">
                    <strong>Latest Volumes</strong>
                </h6>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($newestVolumes->take(6) as $volume)
            <div class="col-lg-2">
                <div class="box">
                    <div class="thumbnail shadow-box b-a-0">
                        <a href="{{ route('volumes.show', ['id' => $volume->id]) }}">
                            <img data-src="holder.js/100px200p?theme=image&font=FontAwesome" src="{{ Storage::url('/issues/'.$volume->getLastIssue()->uuid.'.png') }}">
                        </a>
                        <div class="caption">
                            <div class="text-center">
                                <p class="m-l-0 m-r-0 m-t-0 m-b-0 small">
                                    <strong>{{ $volume->name }}</strong>
                                    @if (isset($volume->number))
                                        <br>Volume #{{ $volume->number }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Latest Issues -->
    <div class="row m-t-1">
        <div class="col-lg-12">
            <div class="hr-text hr-text-left m-b-2">
                <h6 class="text-white">
                    <strong>Latest Issues</strong>
                </h6>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($newestIssues->take(6) as $newestIssue)
            <div class="col-lg-2">
                <div class="box">
                    <div class="thumbnail shadow-box b-a-0">
                        <a href="{{ route('issues.show', ['id' => $newestIssue->id]) }}">
                            <img data-src="holder.js/100px200p?theme=image&font=FontAwesome" src="{{ Storage::url('/issues/'.$newestIssue->uuid.'.png') }}">
                        </a>
                        <div class="caption">
                            <div class="text-center">
                                <p class="m-l-0 m-r-0 m-t-0 m-b-0 small"><strong>{{ $newestIssue->volume()->first()->name }}</strong></p>
                                <p class="m-l-0 m-r-0 m-t-0 m-b-0 small">Issue #{{ $newestIssue->number }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Latest Creators -->
    <div class="row m-t-1">
        <div class="col-lg-12">
            <div class="hr-text hr-text-left m-b-2">
                <h6 class="text-white">
                    <strong>Latest Creators</strong>
                </h6>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($newestCreators->take(6) as $newestCreator)
            <div class="col-lg-2">
                <div class="box">
                    <a href="{{ route('creators.show', ['id' => $newestCreator->id]) }}">
                        <div class="panel panel-default shadow-box b-a-0">
                            <div class="panel-body">
                                <div class="avatar avatar-lg center-block">
                                    <img class="img-circle img-thumbnail center-block m-t-1 m-b-2" data-src="holder.js/80x80?theme=image&font=FontAwesome" src="{{ Storage::url('/creators/'.$newestCreator->uuid.'.png') }}">
                                </div>
                                <h5 class="text-center">
                                    <span>{{ $newestCreator->firstname }} {{ $newestCreator->lastname }}</span><br>
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <!-- END Content -->

</div>
@endsection
