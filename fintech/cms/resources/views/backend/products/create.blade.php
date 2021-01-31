@extends('layouts/backend.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-cogs"></i> Create Products</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.products.get') }}">Products</a></li>
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
                        <label class="control-label">Product Title</label>
                        <input class="form-control" name="title" type="text" placeholder="Enter product title" value="{{$product?$product->title:old('title')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Set Featured</label>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="set_featured" value="1" {{$product?$product->set_featured==1?"checked":"":""}}>Yes
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="set_featured" value="0" {{$product?$product->set_featured==0?"checked":"":"checked"}}>No
                        </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Description</label>
                <textarea class="form-control" id="ckeditor" name="description" rows="4" placeholder="Enter product Description" >{{$product?$product->description:old('description')}} </textarea>
            </div>

            <div class="form-group">
                <label class="control-label">Description Second</label><br/>
                <i class="fa fa-arrow-down"></i><small>Click the <b>source</b> button to view html code.Creates a side by side two columns layouts. </small>
                @php $divTag = "<div class='col-md-6'><div class='single-payment-experience-box'><h3>Heaading 1</h3><p>Content 1.</p></div></div><div class='col-md-6'><div class='single-payment-experience-box'><h3>Heding 2</h3><p>Content 2.</p></div></div>"; @endphp
                <textarea class="form-control" id="ckeditor_details" name="description_details" rows="4" placeholder="Enter product Description" >{{$product?$product->description_details:$divTag}} </textarea>
            </div>

            <div class="form-group">
                <label class="control-label">Image</label>
                <input class="form-control" name="image" type="file">
            </div>
            @if($product)
            <div class="form-group">
                @if($product->image)
                    <label class="control-label">Current Image</label>
                    <div class="col-md-12 text-center">
                        <img src="{{asset($product->image)}}" alt="Current Image" style="height: 150px;width: auto;">
                    </div>
                @endif
            </div>
            @endif
            <div class="tile-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
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

</script>
@endsection
