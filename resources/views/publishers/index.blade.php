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
                <h4>{{ $publishers->count() . ' Publishers' }}</h4>
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

        <div class="row m-t-3" id="grid" data-columns>
            @foreach($publishers as $publisher)
                <div class="box">
                    <div class="thumbnail shadow-box b-a-0">
                        <a href="{{ route('publishers.show', ['id' => $publisher->id]) }}">
                            <img data-src="holder.js/100px200?theme=image&font=FontAwesome" src="{{ Storage::url('/publishers/'.$publisher->uuid.'.png') }}">
                        </a>
                        <div class="caption">
                            <h5 class="m-b-0">
                                <span>{{ $publisher->name }}</span>
                                <small class="pull-right">
                                    <i class="fa fa-calendar"></i> {{ $publisher->founded_at->year }}
                                </small>
                            </h5>
                            <p class="text-gray-light m-t-1 m-b-1">
                                {{ nl2br($publisher->description) }}
                            </p>
                            <div class="label label-success">
                                <span>{{ $publisher->amountOfIssues() }} Issues</span>
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
