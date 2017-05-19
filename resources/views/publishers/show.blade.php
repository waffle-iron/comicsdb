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
                        <h3>{{ $publisher->name }}</h3>
                    </div>
                    <ol class="breadcrumb navbar-text navbar-right no-bg">
                        <li class="current-parent">
                            <a class="current-parent" href="{{ route('dashboard.index') }}">
                                <i class="fa fa-fw fa-home"></i>
                            </a>
                        </li>
                        <li><a href="{{ route('publishers.index') }}">Publishers</a></li>
                        <li class="active">{{ $publisher->name }}</li>
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
                    <img class="img-thumbnail m-t-0 m-b-2 shadow-box" id="publisherImage" data-src="holder.js/100px200p?theme=image&font=FontAwesome" src="{{ Storage::url('/publishers/'.$publisher->uuid.'.png') }}" width="100%">
                    <div class="editContainer">
                        <a href="#changeLogoModal" type="button" class="btn btn-sm btn-default" data-toggle="modal">
                            <i class="fa fa-fw fa-pencil"></i>
                        </a>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ $publisher->name }}
                            <div class="pull-right">
                                <a role="button" href="{{ route('publishers.edit', ['id' => $publisher->id]) }}" class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title data-original-title="Edit">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <a role="button" href="#deletePublisherModal" class="btn btn-xs btn-default deletePublisher" data-toggle="modal">
                                    <i class="fa fa-fw fa-trash"></i>
                                </a>
                                <a role="button" href="{{ route('volumes.create', ['publisher' => $publisher->id]) }}" class="btn btn-xs btn-primary">
                                    Add Volume
                                </a>
                            </div>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="hr-text hr-text-left">
                            <h6 class="text-white bg-white-i">
                                <strong>Founded at</strong>
                            </h6>
                        </div>
                        <p>
                            <i class="fa fa-fw fa-calendar"></i> {{ $publisher->founded_at->format('Y') }}
                        </p>
                        <div class="hr-text hr-text-left m-t-2">
                            <h6 class="text-white bg-white-i">
                                <strong>Description</strong>
                            </h6>
                        </div>
                        <p>{!! nl2br($publisher->description) !!}</p>
                        <div class="hr-text hr-text-left m-t-2">
                            <h6 class="text-white bg-white-i">
                                <strong>Aliases</strong>
                            </h6>
                        </div>
                        <ul class="nav nav-pills nav-stacked m-b-2">
                            <li v-for="(item, key, index) in aliases">
                                <i class="fa fa-fw fa-star m-r-1 text-lighting-yellow"></i>
                                <span class="text-gray">@{{ item.alias }} <button v-show="aliasEditMode" @click="deleteAlias(item.id, key)" class="btn btn-xs btn-default pull-right"><i class="fa fa-close text-danger"></i></button></span>
                            </li>
                        </ul>
                        <div class="input-group input-group-sm" v-show="aliasEditMode">
                            <input type="text" class="form-control" id="aliasInputBox" ref="aliasInput" v-model="newAlias">
                            <span class="input-group-btn">
                        <button class="btn btn-default" type="button" @click="addAlias"><i class="fa fa-check text-success"></i></button>
                    </span>
                        </div>
                        <button type="button" v-show="!aliasEditMode" @click="activateAliasEditMode" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i> Edit Aliases</button>
                        <button type="button" v-show="aliasEditMode" @click="deactivateAliasEditMode" class="btn btn-sm btn-default m-t-1"><i class="fa fa-close"></i> Hide Edit Mode</button>
                        <div class="hr-text hr-text-left m-t-2">
                            <h6 class="text-white bg-white-i">
                                <strong>Address</strong>
                            </h6>
                        </div>
                        {{ $publisher->address }}<br>
                        {{ $publisher->city }}, {{ $publisher->state }} {{ $publisher->zip }}<br>
                        {{ $publisher->country }}
                        <div class="hr-text hr-text-left m-t-2">
                            <h6 class="text-white bg-white-i">
                                <strong>Social</strong>
                            </h6>
                        </div>
                        @if($publisher->twitter)
                            <a href="https://twitter.com/{{ $publisher->twitter }}" target="_blank" data-toggle="tooltip" data-placement="top" title data-original-title="Twitter Profile">
                                <i class="fa fa-fw fa-twitter-square text-muted fa-lg"></i>
                            </a>
                        @endif
                        @if($publisher->website)
                            <a href="{{ $publisher->website }}" target="_blank" data-toggle="tooltip" data-placement="top" title data-original-title="Website">
                                <i class="fa fa-fw fa-globe text-muted fa-lg"></i>
                            </a>
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
                            <span class="pull-right"><small class="text-gray-light"><i class="fa fa-fw fa-calendar"></i> {{ $publisher->created_at->format('m/d/Y') }} <i class="fa fa-fw fa-clock-o"></i> {{ $publisher->created_at->format('h:iA') }}</small></span>
                        </p>
                        <p style="line-height: 10px;">
                            <strong>Last updated</strong>
                            <span class="pull-right"><small class="text-gray-light"><i class="fa fa-fw fa-calendar"></i> {{ $publisher->updated_at->format('m/d/Y') }} <i class="fa fa-fw fa-clock-o"></i> {{ $publisher->updated_at->format('h:iA') }}</small></span>
                        </p>
                        <p style="line-height: 10px;">
                            <strong>UUID</strong>
                            <span class="pull-right"><samp><small class="text-gray-light">{{ $publisher->uuid }}</small></samp></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 m-b-2">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="panel panel-default shadow-box b-t-0 b-l-primary b-r-0 b-l-2 b-b-0">
                            <div class="panel-body text-center p-t-0">
                                <h1 class="f-w-300">
                                    <a href="{{ route('volumes.index.byPublisher', ['publisherId' => $publisher->id]) }}">
                                        {{ $publisher->volumes()->count() }}
                                    </a>
                                </h1>
                                <p>Volumes</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="panel panel-default shadow-box b-t-0 b-l-primary b-r-0 b-l-2 b-b-0">
                            <div class="panel-body text-center p-t-0">
                                <h1 class="f-w-300">{{ $publisher->issues()->count() }}</h1>
                                <p>Issues</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 m-b-2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default b-a-0 shadow-box">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-lg-6">Creators</div>
                                    <div class="col-lg-6 text-right">
                                        <div class="label label-primary">
                                            {{ $publisher->creators()->unique()->count() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group scroll-600 custom-scrollbar">
                                @foreach($publisher->creators()->sortBy('lastname')->unique() as $creator)
                                    <li class="list-group-item no-bg">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="avatar">
                                                    <img class="img-circle" data-src="holder.js/35x35?theme=image&font=FontAwesome" src="{{ Storage::url('/creators/'.$creator->uuid.'.png') }}">
                                                </div>
                                            </div>
                                            <div class="media-body media-middle">
                                                <a href="{{ route('creators.show', ['id' => $creator->id]) }}">
                                                    {{ $creator->firstname }} {{ $creator->lastname }}
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
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
                    {!! Form::hidden('id', $publisher->id) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Remove Publisher</button>
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
                    <h4 class="modal-title" id="changeLogoModalLabel">Change Publisher Logo</h4>
                </div>
                <div class="modal-body">
                    <input type="file" name="image" id="image">
                </div>
                <div class="modal-footer">
                    {!! Form::hidden('uuid', $publisher->uuid, ['v-model' => 'uuid']) !!}
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
                aliases: [],
                aliasEditMode: false,
                newAlias: '',
                uuid: '{!! $publisher->uuid !!}',
                image: ''
            },

            mounted() {
                this.getAliases();
            },

            methods: {
                getAliases: function() {
                    this.$http.get('/api/alias/{{ $publisher->id }}?api_token={{ Auth::user()->api_token }}').then(response => {
                        this.aliases = response.body;
                    }, response => {
                        console.log(response);
                    });
                },
                activateAliasEditMode: function() {
                    this.aliasEditMode = true;

                    Vue.nextTick(() => {
                    this.$refs['aliasInput'].focus()
                    })
                },
                deactivateAliasEditMode: function() {
                    this.aliasEditMode = false;
                },
                addAlias: function() {
                    this.aliases.push({'alias': this.newAlias});
                    this.$http.post('/api/alias?api_token={{ Auth::user()->api_token }}', {alias: this.newAlias, publisher_id: '{{$publisher->id}}'});
                    this.newAlias = '';
                },
                deleteAlias: function(id, index) {
                    console.log(id, index);
                    this.aliases.splice(index, 1);
                    this.$http.delete('/api/alias/' + id + '?api_token={{ Auth::user()->api_token }}');
                },
                saveLogo: function(e) {
                    e.preventDefault();
                    data = new FormData();
                    this.image = e.target[1].files[0];
                    data.append('uuid', this.uuid);
                    data.append('image', this.image);

                    this.$http.post('/api/publishers/logo?api_token={{ Auth::user()->api_token }}', data).then(response => {
                        d = new Date();
                        $('#publisherImage').attr("src", "{{ Storage::url('/publishers/'.$publisher->uuid.'.png?') }}"+d.getTime());
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
