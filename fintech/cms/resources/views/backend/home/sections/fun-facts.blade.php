
<div class="col-md-12 mb-3">
    <div id="accordionFunFacts">
        <div class="card">
            <div class="card-header" id="funfacts">
            <h5 class="mb-0">
                <h3 class="tile-title">Fun Facts Setup
                <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseFunFacts" aria-expanded="true" aria-controls="collapseFunFacts">
                Open/Close
                </button></h3>
            </h5>
            </div>

            <div id="collapseFunFacts" class="collapse" aria-labelledby="funfacts" data-parent="#accordionFunFacts">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group col-md-12 align-self-end">
                        <button class="btn btn-default" id="addMoreFunFacts"><i class="fa fa-fw fa-lg fa-plus"></i>Add More</button>
                    </div>
                    <form class="row" action="{{ route('admin.homefunfacts.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group col-md-12">
                            <label class="control-label"> Title</label>
                            <input class="form-control" name="funfacts_title" type="text" placeholder="Enter Overview Title" value="{{ $funfacts_title && !old('funfacts_title')?$funfacts_title:old('funfacts_title') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Description</label>
                            <textarea class="form-control" rows="4" name="funfacts_sub_title" placeholder="Enter Sescription" spellcheck="true" style="margin-top: 0px; margin-bottom: 0px; height: 135px;">{{ $funfacts_sub_title && !old('funfacts_sub_title')?$funfacts_sub_title:old('funfacts_sub_title') }}</textarea>

                        </div>
                        <div class="table-responsive">
                        <table class="table funFacts">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody id="appendfunFacts">
                            @if($funfacts->first())
                            @php $i = 0 @endphp
                            @foreach($funfacts as $funfact)
                                <tr class="featuredRow">
                                    <input type="hidden" name="row_num[{{$i}}]" value="{{$i}}">
                                    <input type="hidden" name="row_id[{{$i}}]" value="{{$funfact->id}}">
                                    <td>
                                        <input class="form-control" name="icon_title[{{$i}}]" type="text" placeholder="Enter Icon Title" value="{{$funfact->key}}" >
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="icon_sub_title[{{$i}}]" placeholder="Enter Icon Sub Title" value="{{$funfact->value}}"></input>
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
