@extends('layouts/backend.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-th"></i> Contact US Settings</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.contactus.get') }}">Contact Us</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <div id="accordionContactUs">
            <div class="card">
                <div class="card-header" id="contactus">
                <h5 class="mb-0">
                    <h3 class="tile-title">Homepage Contact Us Section
                    <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseContactUs" aria-expanded="true" aria-controls="collapseContactUs">
                    Open/Close
                    </button></h3>
                </h5>
                </div>

                <div id="collapseContactUs" class="collapse" aria-labelledby="contactus" data-parent="#accordionContactUs">
                <div class="card-body">
                    <div class="col-md-12">
                    <form class="row" action="{{ route('admin.homecontactus.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group col-md-6">
                            <label class="control-label"> Overview Title</label>
                            <input class="form-control" name="overview_title" type="text" placeholder="Enter Overview Title" value="{{ $overview_title && !old('overview_title')?$overview_title:old('overview_title') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Overview Sub Title</label>
                            <input class="form-control" name="overview_sub_title" type="text" placeholder="Enter Overview Title" value="{{ $overview_sub_title && !old('overview_sub_title')?$overview_sub_title:old('overview_sub_title') }}">

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
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Contact Form Details</h3>
        <div class="tile-body">
            <div class="table-responsive">
            <table class="table table-hover table-bordered dataTable">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Message Title</th>
                        <th>Message </th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{!!$contact->phone_number!!}</td>
                            <td>{{$contact->msg_subject}}</td>
                            <td>{{$contact->message}}</td>
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
