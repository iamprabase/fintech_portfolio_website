@extends('layouts/backend.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-cogs"></i> Site Settings</h1>
        <!-- <p>Start a beautiful journey here</p> -->
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.settings.get') }}">Site Settings</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title"> Update Site Settings</h3>
            <form action="{{ route('admin.settings.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile-body">

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label> Site Title</label>
                                    <input class="form-control" name="site_title" type="text" placeholder="Enter Site Title" value="{{ $setting && !old('site_title')?$setting->site_title:old('site_title') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label> Site Sub Title </label>
                                    <input class="form-control"  name="site_sub_title" type="text" value="{{ $setting && !old('site_sub_title')?$setting->site_sub_title : old('site_sub_title') }}" placeholder="Enter Site Sub Title" >
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 mb-3">
                                    <label> Upload Site Icon</label>
                                    <input class="form-control" type="file" name="site-icon">
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-4 mb-3">
                                    <label> Upload Site Logo</label>
                                    <input class="form-control" type="file" name="site-logo">
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-4 mb-3">
                                    <label> Upload Site Logo 2</label>
                                    <input class="form-control" type="file" name="site-logo-2">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tile-body">

                            <div class="row mb-12">
                                <div class="col-md-12 mb-3">
                                    <label> Footer Text</label>
                                    <input class="form-control" name="footer_text" value="{{ $setting && !old('footer_text')?$setting->footer_text : old('footer_text') }}" type="text" placeholder="Enter Footer Text">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tile-body">

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label> App Store Link</label>
                                    <input class="form-control" name="app_store_link" type="text" value="{{ $setting && !old('app_store_link')?$setting->app_store_link : old('app_store_link') }}" placeholder="Enter App Store Link">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label> Play Store Link </label>
                                    <input class="form-control"  name="play_store_link" value="{{ $setting && !old('play_store_link')?$setting->play_store_link : old('play_store_link') }}"  type="text"placeholder="Enter Play Store" >
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tile-body">

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label> Facebook Link</label>
                                    <input class="form-control" name="fb_link" value="{{ $setting && !old('fb_link')? $setting->fb_link : old('fb_link') }}"  type="text" placeholder="Enter Facebook Link">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label> Twitter Link </label>
                                    <input class="form-control"  name="twitter_link" value="{{ $setting && !old('twitter_link')? $setting->twitter_link : old('twitter_link') }}" type="text"placeholder="Enter Twitter Link" >
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tile-body">

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label> Instagram Link</label>
                                    <input class="form-control" name="insta_link" value="{{ $setting && !old('insta_link')?$setting->insta_link : old('insta_link') }}" type="text" placeholder="Enter Instagram Link">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label> Linked In Link </label>
                                    <input class="form-control"  name="linked_link" value="{{ $setting && !old('linked_link')? $setting->linked_link: old('linked_link') }}" type="text"placeholder="Enter Linked In Link" >
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tile-body">
                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <label> Location</label>
                                    <input class="form-control" name="location" value="{{ $setting && !old('location')?$setting->location : old('location') }}" type="text" placeholder="Enter Location" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email</label>
                                    <input class="form-control"  name="email" value="{{ $setting && !old('email')? $setting->email : old('email') }}" type="email"placeholder="Enter Email address"  required>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 mb-4">
                                    <label>Mobile No</label>
                                    <input class="form-control" name="phone" value="{{ $setting && !old('phone')? $setting->phone : old('phone') }}" type="text" placeholder="Enter Phone Number" required>
                                </div>
                                <!-- <div class="col-md-6 mb-4">
                                    <label>Fax</label>
                                    <input class="form-control" name="fax" value="{{ $setting && !old('fax')?$setting->fax : old('fax') }}" type="text" placeholder="Enter Fax Number">
                                </div> -->
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="tile-body">

                            <div class="row mb-3">
                                <div class="col-md-4 mb-3">
                                    <label> Meta Title</label>
                                    <input class="form-control" name="meta_title" value="{{ $setting && !old('meta_title')? $setting->meta_title : old('meta_title') }}"  type="text" placeholder="Enter Meta Title" >
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label> Meta Keywords</label>
                                    <input class="form-control"  name="meta_keywords" value="{{ $setting && !old('meta_keywords')? $setting->meta_keywords : old('meta_keywords') }}" type="text"placeholder="Enter Meta Keywords" >
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label> Meta Description</label>
                                    <textarea class="form-control" rows="10" name="meta_description" placeholder="Enter Meta Description" spellcheck="true" style="margin-top: 0px; margin-bottom: 0px; height: 135px;">{{ $setting && !old('meta_description')? $setting->meta_description : old('meta_description') }}</textarea>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-10">
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
@section('customscripts')
<script>
    @if($errors->any())
        let errors = @json($errors->all());
        errors.forEach(error => {
            showNotification("Error:- ", error, 'fa fa-remove', 'warning');
        });
    @endif

</script>
@endsection
