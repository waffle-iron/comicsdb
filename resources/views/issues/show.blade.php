@extends('layouts.app')

@section('content')
    <!-- START Sub-Navbar with Header only-->
    <div class="sub-navbar sub-navbar__header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header m-t-0">
                        <h3 class="m-t-0">Issues</h3>
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
                        <h3>#{{ $issue->number }}<br><small>{{ $issue->name }}</small></h3>
                    </div>
                    <ol class="breadcrumb navbar-text navbar-right no-bg">
                        <li class="current-parent">
                            <a class="current-parent" href="{{ route('dashboard.index') }}">
                                <i class="fa fa-fw fa-home"></i>
                            </a>
                        </li>
                        <li><a href="{{ route('issues.index') }}">Issues</a></li>
                        <li class="active">#{{ $issue->number }} {{ $issue->name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- END Sub-Navbar with Header and Breadcrumbs-->

    <div class="container">
        <div class="row">
            <div class="col-lg-4 m-b-2">
                <div class="img-container">
                    <img class="img-thumbnail m-t-1 m-b-2 shadow-box" id="issueImage" data-src="holder.js/100px200p?theme=image&font=FontAwesome" src="{{ Storage::url('/issues/'.$issue->uuid.'.png') }}" width="100%">
                    <div class="editContainer">
                        <a href="#changeLogoModal" type="button" class="btn btn-sm btn-gray-darker" data-toggle="modal">
                            <i class="fa fa-fw fa-pencil"></i>
                        </a>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ $issue->name }}&nbsp;
                            <div class="pull-right">
                                <a role="button" href="{{ route('issues.edit', ['id' => $issue->id]) }}" class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title data-original-title="Edit">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <a role="button" href="#deleteIssueModal" class="btn btn-xs btn-default deleteIssue" data-toggle="modal">
                                    <i class="fa fa-fw fa-trash"></i>
                                </a>
                            </div>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="hr-text hr-text-left">
                            <h6 class="text-white bg-white-i">
                                <strong>Number</strong>
                            </h6>
                        </div>
                        <p class="m-t-0">
                            Issue #{{ $issue->number }}
                        </p>
                        <div class="hr-text hr-text-left m-t-2">
                            <h6 class="text-white bg-white-i">
                                <strong>Volume</strong>
                            </h6>
                        </div>
                        <p>
                            <a href="{{ route('volumes.show', ['id' => $issue->volume()->first()->id]) }}">
                                {{ $issue->volume()->first()->name }}
                            </a>
                        </p>

                        <div class="hr-text hr-text-left m-t-2">
                            <h6 class="text-white bg-white-i">
                                <strong>Intro</strong>
                            </h6>
                        </div>
                        <p>{!! nl2br($issue->intro) !!}</p>

                        <div class="hr-text hr-text-left m-t-2">
                            <h6 class="text-white bg-white-i">
                                <strong>Store Date</strong>
                            </h6>
                        </div>
                        <p><i class="fa fa-fw fa-calendar"></i> {{ $issue->store_date->format('m/d/Y') }}</p>

                        @if (isset($issue->cover_date))
                            <div class="hr-text hr-text-left m-t-2">
                                <h6 class="text-white bg-white-i">
                                    <strong>Cover Date</strong>
                                </h6>
                            </div>
                            <p><i class="fa fa-fw fa-calendar"></i> {{ $issue->cover_date->format('F Y') }}</p>
                        @endif
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Internal Information
                    </div>
                    <div class="panel-body">
                        <p style="line-height: 10px;">
                            <strong>Created</strong>
                            <span class="pull-right"><small class="text-gray-light"><i class="fa fa-fw fa-calendar"></i> {{ $issue->created_at->format('m/d/Y') }} <i class="fa fa-fw fa-clock-o"></i> {{ $issue->created_at->format('h:iA') }}</small></span>
                        </p>
                        <p style="line-height: 10px;">
                            <strong>Last updated</strong>
                            <span class="pull-right"><small class="text-gray-light"><i class="fa fa-fw fa-calendar"></i> {{ $issue->updated_at->format('m/d/Y') }} <i class="fa fa-fw fa-clock-o"></i> {{ $issue->updated_at->format('h:iA') }}</small></span>
                        </p>
                        <p style="line-height: 10px;">
                            <strong>UUID</strong>
                            <span class="pull-right"><samp><small class="text-gray-light">{{ $issue->uuid }}</small></samp></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 m-b-2">
                <div class="hr-text hr-text-left">
                    <h6 class="text-white">
                        <strong>Characters</strong>
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Issue Modal -->
    <div class="modal fade" id="deleteIssueModal" tabindex="-1" role="dialog" aria-labelledby="deleteIssueModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content b-a-0">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                    <h4 class="modal-title" id="deleteIssueModalLabel">Remove Volume</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove the Issue?
                </div>
                <div class="modal-footer">
                    {!! Form::open(['route' => ['issues.delete'], 'method' => 'delete']) !!}
                    {!! Form::hidden('id', $issue->id) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Remove Issue</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Change Logo Modal -->
    <div class="modal fade" id="changeLogoModal" tabindex="-1" role="dialog" aria-labelledby="changeLogoModalLabel">
        <div class="modal-dialog" role="document">
            <form @submit.prevent="saveLogo" enctype="multipart/form-data">
                <div class="modal-content b-a-0">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                        <h4 class="modal-title" id="changeLogoModalLabel">Change Issue Logo</h4>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="modal-footer">
                        {!! Form::hidden('uuid', $issue->uuid, ['v-model' => 'uuid']) !!}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-danger" value="Change Logo">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        // create a root instance
        var app = new Vue({
            el: '#app',
            data: {
                uuid: '{!! $issue->uuid !!}',
                image: ''
            },

            methods: {
                saveLogo: function(e) {
                    e.preventDefault();
                    data = new FormData();
                    this.image = e.target[1].files[0];
                    data.append('uuid', this.uuid);
                    data.append('image', this.image);

                    this.$http.post('/api/issues/logo?api_token={{ Auth::user()->api_token }}', data).then(response => {
                        d = new Date();
                        $('#issueImage').attr("src", "{{ Storage::url('/issues/'.$issue->uuid.'.png?') }}"+d.getTime());
                        $('#changeLogoModal').modal('hide');
                        this.image = '';
                    });
                }
            }
        })
    </script>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $('.editContainer').hide();
        });
    </script>
@endsection
