@extends('layouts/backend.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-th"></i> Services Page Settings</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.services.get') }}">Services</a></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12 mb-3">
        <div id="accordionJumbotron">
            <div class="card">
                <div class="card-header" id="jumbotron">
                <h5 class="mb-0">

                    <h3 class="tile-title">Add Section
                    <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseJumbotron" aria-expanded="true" aria-controls="collapseJumbotron">
                    Open/Close
                    </button></h3>
                </h5>
                </div>

                <div id="collapseJumbotron" class="collapse" aria-labelledby="jumbotron" data-parent="#accordionJumbotron">
                <div class="card-body">
                    <div class="col-md-12">
                        <form class="row" action="{{ route('admin.services.section.post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-12">
                                <label class="control-label">Title</label>
                                <input class="form-control" name="title" type="text" placeholder="Enter Title" value="{{$servicesection->first()?$servicesection->first()->title:null}}">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label"> Image</label>
                                <input class="form-control" type="file" name="image">

                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" id="ckeditor" name="description" rows="4" placeholder="Enter Description" >{{$servicesection->first()?$servicesection->first()->description:null}} </textarea>
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
<div class="row">
    <div class="col-md-12 mb-3">
        <div id="accordionServices">
            <div class="card">
                <div class="card-header" id="services">
                <h5 class="mb-0">
                    <h3 class="tile-title">Services Setup
                    <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseServices" aria-expanded="true" aria-controls="collapseServices">
                    Open/Close
                    </button></h3>
                </h5>
                </div>

                <div id="collapseServices" class="collapse" aria-labelledby="services" data-parent="#accordionServices">
                <div class="card-body">
                    <div class="col-md-12">
                    <form class="row" action="{{ route('admin.homeservices.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group col-md-6">
                            <label class="control-label"> Overview Title</label>
                            <input class="form-control" name="overview_title" type="text" placeholder="Enter Overview Title" value="{{ $overview_title && !old('overview_title')?$overview_title:old('overview_title') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Foreground Image</label>
                            <input class="form-control" type="file" name="hero_back">

                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Description</label>
                            <textarea class="form-control" rows="4" name="overview_sub_title" placeholder="Enter Overview Sub Title" spellcheck="true" style="margin-top: 0px; margin-bottom: 0px; height: 135px;">{{ $overview_sub_title && !old('overview_sub_title')?$overview_sub_title:old('overview_sub_title') }}</textarea>

                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label"> Button Text</label>
                            <input class="form-control" name="btn_title" type="text" placeholder="Enter Overview Title" value="{{ $btn_title && !old('btn_title')?$btn_title:old('btn_title') }}">
                        </div>
                        <div class="form-group col-md-8">
                            <label class="control-label"> Redirect To</label>
                            <input class="form-control" name="btn_redirect" type="text" placeholder="Enter Redirection Link" value="{{ $btn_redirect && !old('btn_redirect')?$btn_redirect:old('btn_redirect') }}">
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
    <div class="col-md-12">
        <div class="tile">
        <div class="col-md-12 mb-5">
            <div class="pull-right">
                <a href="{{ route('admin.services.create.get') }}"><input value="Create New" type="button" class="btn btn-info" ></a>
            </div>
        </div>
        <div class="tile-body">
            <div class="table-responsive">
            <table class="table table-hover table-bordered dataTable">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Featured</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($services as $service)
                        <tr>
                            <td>{{$service->title}}</td>
                            <td>{!!$service->description!!}</td>
                            <td>{{$service->set_featured==1?"Yes" : "No"}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('admin.services.edit.get', [$service->id]) }}"> <i class="fa fa-edit"></i> </a>
                                <button class="swalBtn btn btn-danger" href="javascript:void(0)" data-href="{{ route('admin.services.delete', [$service->id]) }}"> <i class="fa fa-trash"></i> </button>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
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
