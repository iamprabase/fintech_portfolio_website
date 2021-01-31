@extends('layouts/backend.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-home"></i>About Us Page Settings</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.aboutus.get') }}">About</a></li>
    </ul>
</div>
<div class="row">
<div class="col-md-12 mb-3">
    <div id="accordionJumbotron">
        <div class="card">
            <div class="card-header" id="jumbotron">
            <h5 class="mb-0">

                <h3 class="tile-title">Setup Form
                <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseJumbotron" aria-expanded="true" aria-controls="collapseJumbotron">
                Open/Close
                </button></h3>
            </h5>
            </div>

            <div id="collapseJumbotron" class="collapse" aria-labelledby="jumbotron" data-parent="#accordionJumbotron">
            <div class="card-body">
                <div class="col-md-12">
                    <form class="row" action="{{ route('admin.aboutus.update', [$about->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group col-md-6">
                            <label class="control-label">Title</label>
                            <input class="form-control" name="title" type="text" placeholder="Enter Title" value="{{$about->title}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Section</label><br/>
                            <select class="form-control select2" name="section">
                                <option value="aboutus">About Fintech</option>
                                <option value="mission">Mission</option>
                                <option value="vision">Vision</option>
                                <option value="goals">Goals</option>
                                <option value="values">Values</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label"> Image</label>
                            <input class="form-control" type="file" name="image">
                            @if($about->image)
                                <img src="{{asset($about->image)}}" alt="Image" width="50%" height="50%">
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Description</label>
                            <textarea class="form-control" id="ckeditor" name="description" rows="4" placeholder="Enter Description" >{{$about->description}} </textarea>
                        </div>
                        <div class="form-group col-md-12 align-self-end">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                        </div>
                    </form>
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
    $('.select2').val("{{$about->section}}").trigger('change');
</script>
@endsection
