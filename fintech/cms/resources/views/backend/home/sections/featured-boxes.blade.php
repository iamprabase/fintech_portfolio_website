
<div class="col-md-12 mb-3">
    <div id="accordionFeatured">
        <div class="card">
            <div class="card-header" id="featured">
            <h5 class="mb-0">
                <h3 class="tile-title">Featured Box Setup
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
                    <form class="row" action="{{ route('admin.home.featuredsetup.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <table class="table featured">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Featured Icon</th>
                                    <th>Display</th>
                                    <th>Remove</th>
                                </tr>
                                </thead>
                                <tbody id="appendFeatured">
                                    @if($featured->first())
                                    @php $i = 0 @endphp
                                    @foreach($featured as $feat)
                                        <tr class="featuredRow">
                                            <input type="hidden" name="row_num[{{$i}}]" value="{{$i}}">
                                            <input type="hidden" name="row_id[{{$i}}]" value="{{$feat->id}}">
                                            <td>
                                                <input class="form-control" name="featured_title[{{$i}}]" type="text" placeholder="Enter Fetaured Title" value="{{$feat->title}}" >
                                            </td>
                                            <td>
                                                <input class="form-control" type="file" name="featured_image[{{$i}}]">
                                            </td>
                                            <td>
                                                <div class="toggle-flip">
                                                    <label>
                                                        <input type="checkbox" name="active[{{$i}}]" value="{{$feat->active}}">
                                                        <span class="flip-indecator"
                                                        @if($feat->active)
                                                            data-toggle-on="OFF" data-toggle-off="ON"
                                                        @else
                                                            data-toggle-on="ON" data-toggle-off="OFF"
                                                        @endif
                                                        ></span>
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
