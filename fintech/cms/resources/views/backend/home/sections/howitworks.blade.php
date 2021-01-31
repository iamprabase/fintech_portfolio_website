
<div class="col-md-12 mb-3">
    <div id="accordionOverview">
        <div class="card">
            <div class="card-header" id="overview">
            <h5 class="mb-0">

                <h3 class="tile-title">Overview Setup
                <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseOverview" aria-expanded="true" aria-controls="collapseOverview">
                Open/Close
                </button></h3>
            </h5>
            </div>

            <div id="collapseOverview" class="collapse" aria-labelledby="overview" data-parent="#accordionOverview">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group col-md-12 align-self-end">
                        <button class="btn btn-default" id="addMoreOverview"><i class="fa fa-fw fa-lg fa-plus"></i>Add More</button>
                    </div>
                    <form class="row" action="{{ route('admin.home.overviewsetup.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-12">
                            <label class="control-label"> Overview Title</label>
                            <input class="form-control" name="overview_title" type="text" placeholder="Enter Overview Title" value="{{ $overview_title && !old('overview_title')?$overview_title:old('overview_title') }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Overview Sub Title</label>
                            <textarea class="form-control" rows="4" name="overview_sub_title" placeholder="Enter Overview Sub Title" spellcheck="true" style="margin-top: 0px; margin-bottom: 0px; height: 135px;">{{ $overview_sub_title && !old('overview_sub_title')?$overview_sub_title:old('overview_sub_title') }}</textarea>
                        </div>
                        <div class="table-responsive">
                        <table class="table overview">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Icon</th>
                                <th>Display</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tbody id="appendOverview">
                            @if($overview->first())
                            @php $i = 0 @endphp
                            @foreach($overview as $ovrv)
                                <tr class="featuredRow">
                                    <input type="hidden" name="row_num[{{$i}}]" value="{{$i}}">
                                    <input type="hidden" name="row_id[{{$i}}]" value="{{$ovrv->id}}">
                                    <td>
                                        <input class="form-control" name="icon_title[{{$i}}]" type="text" placeholder="Enter Icon Title" value="{{$ovrv->title}}" >
                                    </td>
                                    <td>
                                        <textarea class="form-control" rows="4" name="icon_sub_title[{{$i}}]" placeholder="Enter Icon Sub Title" spellcheck="true" style="margin-top: 0px; margin-bottom: 0px; height: auto;">{{$ovrv->sub_title}}</textarea>
                                    </td>
                                    <td>
                                        <input class="form-control" type="file" name="overview_image[{{$i}}]">
                                    </td>
                                    <td>
                                        <div class="toggle-flip">
                                        <label>
                                            <input type="checkbox" name="active[{{$i}}]" value="{{$ovrv->active}}">
                                            <span class="flip-indecator"
                                            @if($ovrv->active)
                                                data-toggle-on="OFF" data-toggle-off="ON"
                                            @else
                                                data-toggle-on="ON" data-toggle-off="OFF"

                                            ></span>
                                            @endif
                                            </label>
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


