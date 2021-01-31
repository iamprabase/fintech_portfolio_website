@extends('layouts/backend.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-users"></i> Board Of Directors Page Settings</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.bod.get') }}">Board Of Directors</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
        <div class="col-md-12 mb-5">
            <div class="pull-right">
                <a href="{{ route('admin.bod.create.get') }}"><input value="Create New" type="button" class="btn btn-info" ></a>
            </div>
        </div>
        <div class="tile-body">
            <div class="table-responsive">
            <table class="table table-hover table-bordered dataTable">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($bods as $bod)
                        <tr>
                            <td>{{$bod->name}}</td>
                            <td>{{$bod->title}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('admin.bod.edit.get', [$bod->id]) }}"> <i class="fa fa-edit"></i> </a>
                                <button class="swalBtn btn btn-danger" href="javascript:void(0)" data-href="{{ route('admin.bod.delete', [$bod->id]) }}"> <i class="fa fa-trash"></i> </button>
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
