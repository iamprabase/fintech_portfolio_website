@extends('layouts/backend.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-home"></i>Page Slider Page Settings</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.pageslider.get') }}">Page Slider</a></li>
    </ul>
</div>


<div class="col-md-12 mb-3">
    <div id="accordionFeatured">
        <div class="card">
            <div class="card-header" id="featured">
            <h5 class="mb-0">
                <h3 class="tile-title">Page Slider
                <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseFeatured" aria-expanded="true" aria-controls="collapseFeatured">
                Open/Close
                </button></h3>
            </h5>
            </div>

            <div id="collapseFeatured" class="collapse" aria-labelledby="featured" data-parent="#accordionFeatured">
            <div class="card-body">
                <div class="col-md-12">
                     <div class="form-group col-md-12 align-self-end">
                        <button class="btn btn-default" id="addMoreFeatured"><i class="fa fa-fw fa-lg fa-plus"></i>Add More</button>
                    </div>
                    <form class="row" action="{{ route('admin.pageslider.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <table class="table featured">
                                <thead>
                                <tr>
                                    <th>Picture</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>
                                <tbody id="appendFeatured">
                                    @if($pageSlider->first())
                                    @php $i = 0 @endphp
                                    @foreach($pageSlider as $feat)
                                        <tr class="featuredRow">
                                            <input type="hidden" name="row_num[{{$i}}]" value="{{$i}}">
                                            <input type="hidden" name="row_id[{{$i}}]" value="{{$feat->id}}">
                                            <td>
                                                <input class="form-control" type="file" name="featured_image[{{$i}}]">
                                                <div class="col-md-12 mb-3">
                                                <label class="control-label">Current Image</label>
                                                <div class="col-md-12 text-center">
                                                    <img src="{{asset($feat->image)}}" alt="Current Image" style="height: 150px;width: auto;">
                                                </div>
                                                </div>
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

    function addMoreFeatured(countRows){
        let hiddenIndex = `<input type="hidden" name="row_num[${countRows}]" value="${countRows}">`
        let fileInputFeatured = `<input class="form-control" type="file" name="featured_image[${countRows}]">`;
        let removeBtnFeatured = `<button class="btn btn-danger removeRow" type="button"><i class="fa fa-fw fa-lg fa-times-circle"></i>Remove</button>`;

        let row = `<tr class="featuredRow">
                        ${hiddenIndex}
                        <td>${fileInputFeatured}</td>
                        <td>${removeBtnFeatured}</td>
                    </tr>`
        $('.featured').find('#appendFeatured').append(row);
    }
    $('#addMoreFeatured').click(function(e){
        let countRows = parseInt($('.featured').find('#appendFeatured').find('tr').last().children().first().val());
        if(countRows!=undefined && !isNaN(countRows))  countRows += 1;
        else if(isNaN(countRows)) countRows = 0;
        addMoreFeatured(countRows);
    });
</script>
@endsection
