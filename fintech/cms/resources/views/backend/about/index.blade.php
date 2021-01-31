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
                        <form class="row" action="{{ route('admin.aboutus.post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-6">
                                <label class="control-label">Title</label>
                                <input class="form-control" name="title" type="text" placeholder="Enter Title" value="">
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

                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" id="ckeditor" name="description" rows="4" placeholder="Enter Description" > </textarea>
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

<div class="col-md-12 mb-3">
    <div id="accordionFunFacts">
        <div class="card">
            <div class="card-header" id="funfacts">
            <h3 class="tile-title">Bullets Setup
            <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseFunFacts" aria-expanded="true" aria-controls="collapseFunFacts">
            Open/Close
            </button></h3>
            </div>

            <div id="collapseFunFacts" class="collapse" aria-labelledby="funfacts" data-parent="#accordionFunFacts">
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group col-md-12 align-self-end">
                            <button class="btn btn-default" id="addMoreFunFacts"><i class="fa fa-fw fa-lg fa-plus"></i>Add More</button>
                        </div>
                        <form class="row" action="{{ route('admin.bullets.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="table-responsive">
                            <table class="table funFacts">
                                <thead>
                                <tr>
                                    <th>Point</th>
                                    <th>Section</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>
                                <tbody id="appendfunFacts">
                                @if($bullets->first())
                                @php $i = 0 @endphp
                                @foreach($bullets as $bullet)
                                    <tr class="featuredRow">
                                        <input type="hidden" name="row_num[{{$i}}]" value="{{$i}}">
                                        <input type="hidden" name="row_id[{{$i}}]" value="{{$bullet->id}}">
                                        <td>
                                            <input type="text" class="form-control" name="point[{{$i}}]" placeholder="Enter Point" value="{{$bullet->point}}"></input>
                                        </td>
                                        <td>
                                            {{ucfirst($bullet->section)}}
                                            <input type="hidden" class="form-control" name="section[{{$i}}]" placeholder="Enter Point" value="{{$bullet->section}}"></input>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger removeRow" type="button"><i class="fa fa-fw fa-lg fa-times-circle"></i>Remove</button>
                                        </td>
                                    </tr>
                                    @php $i++ @endphp
                                @endforeach
                                @endif
                                </tbody>
                            </table>
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

<div class="row">
    @include('backend/about/sections.profile')
    @include('backend/about/sections.mission')
    @include('backend/about/sections.vision')
    @include('backend/about/sections.values')
    @include('backend/about/sections.goals')
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

    $(document).on('click', '.removeRow', function(e){
        if(e.target.className=="fa fa-fw fa-lg fa-times-circle") e.target.parentElement.parentElement.parentElement.remove();
        else e.target.parentElement.parentElement.remove();
    });

    function addMoreFunFacts(countRows){
        let hiddenIndex = `<input type="hidden" name="row_num[${countRows}]" value="${countRows}">`
        let titleInputBox = `<select class="form-control select2" name="section[${countRows}]"><option value="mission">Mission</option><option value="vision">Vision</option><option value="goals">Goals</option><option value="values">Values</option>
        </select>`;
        let subtitleBox = `<input  type="text" class="form-control" name="point[${countRows}]" placeholder="Enter Point"></selec>`;
        let removeBtnFeatured = `<button class="btn btn-danger removeRow" type="button"><i class="fa fa-fw fa-lg fa-times-circle"></i>Remove</button>`;

        let row = `<tr class="featuredRow">
                        ${hiddenIndex}
                        <td>${subtitleBox}</td>
                        <td>${titleInputBox}</td>
                        <td>${removeBtnFeatured}</td>
                    </tr>`
        $('.funFacts').find('#appendfunFacts').append(row);
    }
    $('#addMoreFunFacts').click(function(e){
        // if(parseInt($('.funFacts').find('#appendfunFacts').find('tr').length)===3) return;
        let countRows = parseInt($('.funFacts').find('#appendfunFacts').find('tr').last().children().first().val());
        if(countRows!=undefined && !isNaN(countRows))  countRows += 1;
        else if(isNaN(countRows)) countRows = 0;
        addMoreFunFacts(countRows);
    });
</script>
@endsection
