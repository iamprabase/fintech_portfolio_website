@extends('layouts/backend.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-cogs"></i> Add New Blog</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.blog.get') }}">Blog</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
        <div class="tile-body">
            <form action="{{$action}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($hidden_method) <input type="hidden" name="_method" value="{{$hidden_method}}"/>@endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Title</label>
                        <input class="form-control" name="title" type="text" placeholder="Enter blog title" value="{{$blog?$blog->title:old('title')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Short description</label>
                        <input class="form-control" name="short_description" type="text" placeholder="Enter blog short_description" value="{{$blog?$blog->short_description:old('short_description')}}">
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Status</label>
                    <select class="form-control select2" name="status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                        <option value="To be Published">To be Published</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">Published Date</label>
                    <input class="form-control datePicker" name="published_at"  type="text" placeholder="Select Date"  value="{{$blog?$blog->published_at:old('published_at')}}" autocomplete="off">
                  </div>
                </div>
                <div class="col-ms-6">
                    <div class="form-group">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" id="ckeditor" name="description" rows="4" placeholder="Enter port$blog Description" >{{$blog?$blog->description:old('description')}} </textarea>
                    </div>
                </div>
                 <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Image</label>
                        <input class="form-control" name="image" type="file">
                    </div>
                </div>
                @if($blog)
                    <div class="col-md-12 mb-3">
                        @if($blog->image)
                            <label class="control-label">Current Image</label>
                            <div class="col-md-12 text-center">
                                <img src="{{asset($blog->image)}}" alt="Current Image" style="height: 150px;width: auto;">
                            </div>
                        @endif
                    </div>
                @endif
                <div class="col-md-4 mb-3">
                    <label> Meta Title</label>
                    <input class="form-control" name="meta_title" value="{{ $blog && !old('meta_title')? $blog->meta_title : old('meta_title') }}"  type="text" placeholder="Enter Meta Title" >
                </div>
                <div class="col-md-8 mb-3">
                    <label> Meta Keywords</label>
                    <input class="form-control"  name="meta_keywords" value="{{ $blog && !old('meta_keywords')? $blog->meta_keywords : old('meta_keywords') }}" type="text"placeholder="Enter Meta Keywords" >
                </div>
                <div class="col-md-12 mb-3">
                    <label> Meta Description</label>
                    <textarea class="form-control" rows="10" name="meta_description" placeholder="Enter Meta Description" spellcheck="true" style="margin-top: 0px; margin-bottom: 0px; height: 135px;">{{ $blog && !old('meta_description')? $blog->meta_description : old('meta_description') }}</textarea>
                </div>
                <div class="col-md-6">
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                    </div>
                </div>
            </div>
            </form>
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
    @if($blog)
        $('.select2').val("{{$blog->status}}").trigger('change');
    @endif
</script>
@endsection
