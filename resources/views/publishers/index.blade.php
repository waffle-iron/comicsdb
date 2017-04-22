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
                    <div class=" panel panel-default shadow-box">
                        <div class="panel-body">
                            <div class="media">
                                <a href="{{ route('publishers.show', ['id' => $publisher->id]) }}">
                                    <div class="media-body text-center">
                                        <img data-src="holder.js/100px200?theme=image&font=FontAwesome" src="{{ Storage::url('/publishers/'.$publisher->uuid.'.png') }}" style="height: 80px;">
                                        <h5 class="m-b-0 m-t-2">
                                            <span>{{ $publisher->name }}</span>
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="panel-footer text-gray-light">
                            <i class="fa fa-newspaper-o m-r-1"></i> {{ $publisher->amountOfIssues()}} Issues
                            <div class="pull-right">
                                <div class="btn-group pull-left dropup">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-fw fa-gear"></i>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <!-- View publisher in detail -->
                                        <li>
                                            <a href="{{ route('publishers.show', ['id' => $publisher->id]) }}">
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
                                            <a href="#deletePublisherModal" class="deletePublisher" data-toggle="modal" data-id="{{ $publisher->id }}">
                                                <i class="fa fa-fw fa-trash text-gray-lighter m-r-1"></i> Delete
                                            </a>
                                        </li>
                                        <li role="separator" class="divider"></li>
                                    @if (!Storage::disk('publishers')->exists($publisher->uuid . '.png'))
                                        <!-- Upload publishers logo -->
                                            <li>
                                                <a href="{{ route('publishers.logo.add', ['id' => $publisher->id]) }}">
                                                    <i class="fa fa-fw fa-image text-gray-lighter m-r-1"></i> Upload Logo
                                                </a>
                                            </li>
                                    @endif
                                    @if (Storage::disk('publishers')->exists($publisher->uuid . '.png'))
                                        <!-- Remove publishers logo -->
                                            <li>
                                                <a href="#deleteLogoModal" class="deleteLogo" data-toggle="modal" data-id="{{ $publisher->id }}">
                                                    <i class="fa fa-fw fa-image text-gray-lighter m-r-1"></i> Remove Logo
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center">
            {{ $publishers->links() }}
        </div>
    </div>

    <!-- Delete Logo Modal -->
    <div class="modal fade" id="deleteLogoModal" tabindex="-1" role="dialog" aria-labelledby="deleteLogoModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content b-a-0">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                    <h4 class="modal-title" id="deleteLogoModalLabel">Remove Publishers Logo</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove the Publisher Logo?
                </div>
                <div class="modal-footer">
                    {!! Form::open(['route' => ['publishers.logo.delete'], 'method' => 'delete']) !!}
                    {!! Form::hidden('id', 0) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Remove Logo</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Publisher Modal -->
    <div class="modal fade" id="deletePublisherModal" tabindex="-1" role="dialog" aria-labelledby="deletePublisherModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content b-a-0">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                    <h4 class="modal-title" id="deletePublisherModalLabel">Remove Publisher</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove the Publisher?
                </div>
                <div class="modal-footer">
                    {!! Form::open(['route' => ['publishers.delete'], 'method' => 'delete']) !!}
                    {!! Form::hidden('id', 0) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Remove Publisher</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- END Live Demo -->
@endsection

@section('javascript')
    <script>
        $('.deleteLogo').click(function() {
            var id = $(this).data('id');
            $('input[name="id"]').val(id);
        });

        $('.deletePublisher').click(function() {
            var id = $(this).data('id');
            $('input[name="id"]').val(id);
        });
    </script>
@endsection
