@extends('layouts/backend.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-briefcase"></i> Portfolio Page Settings</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.portfolio.get') }}">Portfolio</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <div id="accordionPortfolio">
            <div class="card">
                <div class="card-header" id="Portfolio">
                <h5 class="mb-0">
                    <h3 class="tile-title">Portfolio Setup
                    <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapsePortfolio" aria-expanded="true" aria-controls="collapsePortfolio">
                    Open/Close
                    </button></h3>
                </h5>
                </div>

                <div id="collapsePortfolio" class="collapse" aria-labelledby="Portfolio" data-parent="#accordionPortfolio">
                <div class="card-body">
                    <div class="col-md-12">
                    <form class="row" action="{{ route('admin.homeportfolio.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group col-md-12">
                            <label class="control-label"> Title</label>
                            <input class="form-control" name="overview_title" type="text" placeholder="Enter Name" value="{{ $overview_title && !old('overview_title')?$overview_title:old('overview_title') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Description</label>
                            <textarea class="form-control" rows="4" name="overview_sub_title" placeholder="Enter Sub Title" spellcheck="true" style="margin-top: 0px; margin-bottom: 0px; height: 135px;">{{ $overview_sub_title && !old('overview_sub_title')?$overview_sub_title:old('overview_sub_title') }}</textarea>
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
                <a href="{{ route('admin.portfolio.create.get') }}"><input value="Create New" type="button" class="btn btn-info" ></a>
            </div>
        </div>
        <div class="tile-body">
            <div class="table-responsive">
            <table class="table table-hover table-bordered dataTable">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Featured</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($portfolios as $portfolio)
                        <tr>
                            <td>{{$portfolio->name}}</td>
                            <td>{{$portfolio->title}}</td>
                            <td>{!!$portfolio->description!!}</td>
                            <td>{{$portfolio->set_featured==1?"Yes" : "No"}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('admin.portfolio.edit.get', [$portfolio->id]) }}"> <i class="fa fa-edit"></i> </a>
                                <button class="swalBtn btn btn-danger" href="javascript:void(0)" data-href="{{ route('admin.portfolio.delete', [$portfolio->id]) }}"> <i class="fa fa-trash"></i> </button>
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
