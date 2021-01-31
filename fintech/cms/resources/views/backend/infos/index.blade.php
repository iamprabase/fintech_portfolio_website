@extends('layouts/backend.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-th"></i> Info Settings</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.info.get') }}">Info</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <div id="accordionInfo">
            <div class="card">
                <div class="card-header" id="info">
                <h5 class="mb-0">
                    <h3 class="tile-title">App Download Area Setup
                    <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseInfo" aria-expanded="true" aria-controls="collapseInfo">
                    Open/Close
                    </button></h3>
                </h5>
                </div>

                <div id="collapseInfo" class="collapse" aria-labelledby="info" data-parent="#accordionInfo">
                <div class="card-body">
                    <div class="col-md-12">
                    <form class="row" action="{{ route('admin.homeinfo.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group col-md-6">
                            <label class="control-label"> Overview Title</label>
                            <input class="form-control" name="overview_title" type="text" placeholder="Enter Overview Title" value="{{ $overview_title && !old('overview_title')?$overview_title:old('overview_title') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Overview Sub Title</label>
                            <input class="form-control" name="overview_sub_title" type="text" placeholder="Enter Overview Title" value="{{ $overview_sub_title && !old('overview_sub_title')?$overview_sub_title:old('overview_sub_title') }}">

                        </div>
                        <div class="form-group col-md-12 align-self-end">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
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
