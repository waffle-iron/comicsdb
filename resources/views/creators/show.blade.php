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
                        <h3>{{ $creator->firstname }} {{ $creator->lastname }}</h3>
                    </div>
                    <ol class="breadcrumb navbar-text navbar-right no-bg">
                        <li class="current-parent">
                            <a class="current-parent" href="{{ route('dashboard.index') }}">
                                <i class="fa fa-fw fa-home"></i>
                            </a>
                        </li>
                        <li><a href="{{ route('creators.index') }}">Creators</a></li>
                        <li class="active">{{ $creator->firstname }} {{ $creator->lastname }}</li>
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
                    <img class="img-thumbnail m-t-1 m-b-2 shadow-box" id="creatorImage" data-src="holder.js/100px200p?theme=image&font=FontAwesome" src="{{ Storage::url('/creators/'.$creator->uuid.'.png') }}" width="100%">
                    <div class="editContainer">
                        <a href="#changeProfileImageModal" type="button" class="btn btn-sm btn-gray-darker" data-toggle="modal">
                            <i class="fa fa-fw fa-pencil"></i>
                        </a>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ $creator->firstname }} {{ $creator->lastname }}
                            <div class="pull-right">
                                <a role="button" href="{{ route('creators.edit', ['id' => $creator->id]) }}" class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title data-original-title="Edit">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                                <a role="button" href="#deleteCreatorModal" class="btn btn-xs btn-default deleteCreator" data-toggle="modal">
                                    <i class="fa fa-fw fa-trash"></i>
                                </a>
                            </div>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="hr-text hr-text-left">
                            <h6 class="text-white bg-white-i">
                                <strong>Gender</strong>
                            </h6>
                        </div>
                        <p class="m-t-0">
                            @if ($creator->gender == 'male')
                                <i class="fa fa-fw fa-mars text-united-nations-blue"></i> Male
                            @else
                                <i class="fa fa-fw fa-venus text-brilliant-rose"></i> Female
                            @endif
                        </p>
                        <div class="hr-text hr-text-left">
                            <h6 class="text-white bg-white-i">
                                <strong>Dates</strong>
                            </h6>
                        </div>
                        @if ($creator->birthdate)
                            <strong>Birthdate</strong>
                            <p>
                                <i class="fa fa-fw fa-calendar-o"></i> {{ $creator->birthdate->format('m/d/Y') }}
                            </p>
                        @endif
                        @if ($creator->deathdate)
                            <strong>Day of Death</strong>
                            <p>
                                <i class="fa fa-fw fa-calendar-o"></i> {{ $creator->deathdate->format('m/d/Y') }}
                            </p>
                        @endif
                        <div class="hr-text hr-text-left">
                            <h6 class="text-white bg-white-i">
                                <strong>Address</strong>
                            </h6>
                        </div>
                        <p>
                            {{ $creator->city }}<br>
                            {{ $creator->country }}
                        </p>
                        <div class="hr-text hr-text-left m-t-2">
                            <h6 class="text-white bg-white-i">
                                <strong>Social</strong>
                            </h6>
                        </div>
                        @if($creator->twitter)
                            <a href="https://twitter.com/{{ $creator->twitter }}" target="_blank" data-toggle="tooltip" data-placement="top" title data-original-title="Twitter Profile">
                                <i class="fa fa-fw fa-twitter-square text-muted fa-lg"></i>
                            </a>
                        @endif
                        @if($creator->email)
                            <a href="mailto:{{ $creator->email }}" target="_blank" data-toggle="tooltip" data-placement="top" title data-original-title="Email address">
                                <i class="fa fa-fw fa-envelope-o text-muted fa-lg"></i>
                            </a>
                        @endif
                        @if($creator->website)
                            <a href="{{ $creator->website }}" target="_blank" data-toggle="tooltip" data-placement="top" title data-original-title="Website">
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
                            <span class="pull-right"><small class="text-gray-light"><i class="fa fa-fw fa-calendar"></i> {{ $creator->created_at->format('m/d/Y') }} <i class="fa fa-fw fa-clock-o"></i> {{ $creator->created_at->format('h:iA') }}</small></span>
                        </p>
                        <p style="line-height: 10px;">
                            <strong>Last updated</strong>
                            <span class="pull-right"><small class="text-gray-light"><i class="fa fa-fw fa-calendar"></i> {{ $creator->updated_at->format('m/d/Y') }} <i class="fa fa-fw fa-clock-o"></i> {{ $creator->updated_at->format('h:iA') }}</small></span>
                        </p>
                        <p style="line-height: 10px;">
                            <strong>UUID</strong>
                            <span class="pull-right"><samp><small class="text-gray-light">{{ $creator->uuid }}</small></samp></span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 m-b-2">
                <div class="hr-text hr-text-left">
                    <h6 class="text-white">
                        <strong>Issues</strong>
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Issue Modal -->
    <div class="modal fade" id="deleteCreatorModal" tabindex="-1" role="dialog" aria-labelledby="deleteCreatorModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content b-a-0">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                    <h4 class="modal-title" id="deleteCreatorModalLabel">Remove Creator</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove the Creator?
                </div>
                <div class="modal-footer">
                    {!! Form::open(['route' => ['creators.delete'], 'method' => 'delete']) !!}
                    {!! Form::hidden('id', $creator->id) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Remove Creator</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Change Logo Modal -->
    <div class="modal fade" id="changeProfileImageModal" tabindex="-1" role="dialog" aria-labelledby="changeProfileImageModalLabel">
        <div class="modal-dialog" role="document">
            <form @submit.prevent="saveLogo" enctype="multipart/form-data">
                <div class="modal-content b-a-0">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#xD7;</span></button>
                        <h4 class="modal-title" id="changeLogoModalLabel">Change Profile Image</h4>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="modal-footer">
                        {!! Form::hidden('uuid', $creator->uuid, ['v-model' => 'uuid']) !!}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-danger" value="Change Profile Image">
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
                uuid: '{!! $creator->uuid !!}',
                image: ''
            },

            methods: {
                saveLogo: function(e) {
                    e.preventDefault();
                    data = new FormData();
                    this.image = e.target[1].files[0];
                    data.append('uuid', this.uuid);
                    data.append('image', this.image);

                    this.$http.post('/api/creators/logo?api_token={{ Auth::user()->api_token }}', data).then(response => {
                        d = new Date();
                        $('#creatorImage').attr("src", "{{ Storage::url('/creators/'.$creator->uuid.'.png?') }}"+d.getTime());
                        $('#changeProfileImageModal').modal('hide');
                        this.image = '';
                    });
                }
            }
        })
    </script>
@endsection
