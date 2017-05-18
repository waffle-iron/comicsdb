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
                            <div class="btn-group btn-group-sm pull-right">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Actions <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('issues.edit', ['id' => $issue->id]) }}">
                                            <i class="fa fa-fw fa-pencil"></i> Edit
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#deleteIssueModal" class="deleteIssue" data-toggle="modal">
                                            <i class="fa fa-fw fa-trash"></i> Delete
                                        </a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-user"></i> Manage Creators
                                        </a>
                                    </li>
                                </ul>
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
                <div class="row" v-if="!editMode">
                    <div class="col-md-12">
                        <button class="btn btn-primary pull-right m-b-1" @click="activateEditMode()">Edit Page</button>
                    </div>
                </div>
                <div class="row" v-if="editMode">
                    <div class="col-md-12">
                        <button class="btn btn-primary pull-right m-b-1" @click="deactivateEditMode()">Cancel Edit-Mode</button>
                    </div>
                </div>
                <div class="hr-text hr-text-left">
                    <h6 class="text-white">
                        <strong>Creators</strong>
                    </h6>
                </div>
                <div class="row" v-show="editMode">
                    <div class="col-md-12">
                        <select id="creatorsearchbox" name="creatorsearchbox" class="form-control selectpicker" data-live-search="true" @change="creatorSelected" v-model="selectedCreatorId">
                            <option></option>
                            @foreach($creators as $creator)
                                <option value="{{ $creator->id }}">{{ $creator->firstname }} {{ $creator->lastname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 m-t-1" id="creator" v-for="(creator, key, index) in creators">
                        <div class="media">
                            <div class="media-left media-middle" v-if="editMode">
                                <button class="btn btn-danger btn-xs" @click="removeCreator(creator.id, key)"><i class="fa fa-close"></i></button>
                            </div>
                            <div class="media-left media-middle">
                                <div class="avatar avatar-lg">
                                    <a :href="'/creators/' + creator.id">
                                        <img class="img-thumbnail" :src="'/storage/creators/' + creator.uuid + '.png'">
                                    </a>
                                </div>
                            </div>
                            <div class="media-body media-middle">
                                <h5 class="m-t-0 m-b-0"><a :href="'/creators/' + creator.id">@{{ creator.firstname }} @{{ creator.lastname }}</a></h5>
                                <div v-if="!editMode">
                                    <p class="m-t-0 m-b-0 text-gray-light"><div class="badge">writer</div></p>
                                </div>
                                <div v-show="editMode">
                                    <dl>
                                        <dd>
                                            <input type="checkbox"> artist
                                        </dd>
                                        <dd>
                                            <input type="checkbox"> colorist
                                        </dd>
                                        <dd>
                                            <input type="checkbox"> cover
                                        </dd>
                                        <dd>
                                            <input type="checkbox"> editor
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-t-3 hr-text hr-text-left">
                    <h6 class="text-white">
                        <strong>Characters</strong>
                    </h6>
                </div>
                <div class="row" v-if="editMode">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Search for Add something...">
                    </div>
                </div>
                <div class="row">

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
                editMode: false,
                uuid: '{!! $issue->uuid !!}',
                issueId: '{!! $issue->id !!}',
                image: '',
                creators: [],
                selectedCreatorId: 0,
                selectedCreator: null
            },

            mounted() {
                this.getCreators();
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
                },

                activateEditMode: function() {
                    this.editMode = true;
                },

                deactivateEditMode: function() {
                    this.editMode = false;
                },

                removeCreator: function(id, index) {
                    this.deleteCreator(this.issueId, id);
                    this.creators.splice(index, 1);
                },

                getCreators: function() {
                    this.$http.get('/api/issues/{{ $issue->id }}/creators?api_token={{ Auth::user()->api_token }}').then(response => {
                        this.creators = response.body;
                    }, response => {
                        console.log(response);
                    });
                },

                creatorSelected: function() {
                    this.$http.get('/api/creators/' + this.selectedCreatorId + '?api_token={{ Auth::user()->api_token }}').then(response => {
                        this.selectedCreator = response.body;
                        this.creators.push(this.selectedCreator);

                        this.addCreator(this.issueId, this.selectedCreatorId);

                        this.creators.sort(function(a, b) {
                            return a.lastname.localeCompare(b.lastname);
                        });
                    }, response => {
                        console.log(response);
                    });
                },

                addCreator: function(issue, creator) {
                    this.$http.post('/api/issues/' + issue + '/creators/' + creator + '?api_token={{ Auth::user()->api_token }}');
                },

                deleteCreator: function(issue, creator) {
                    this.$http.delete('/api/issues/' + issue + '/creators/' + creator + '?api_token={{ Auth::user()->api_token }}').then(response => {
                        console.log(response);
                    }, response => {
                        console.log(response);
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

        $('.selectpicker').selectpicker({
            style: 'btn-info',
            size: 4
        });
    </script>
@endsection
