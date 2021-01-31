
<div class="col-md-12 mb-3">
    <div id="accordionValues">
        <div class="card">
            <div class="card-header" id="values">
            <h5 class="mb-0">
                <h3 class="tile-title">Values
                <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseValues" aria-expanded="true" aria-controls="collapseValues">
                Open/Close
                </button></h3>
            </h5>
            </div>

            <div id="collapseValues" class="collapse" aria-labelledby="values" data-parent="#accordionValues">
            <div class="card-body">
                <div class="col-md-12">
                    @if($values)
                        <div class="pull-right">
                            <a href="{{ route('admin.aboutus.patch', [$values->id]) }}"><input value="Edit" type="button" class="btn btn-info" ></a>
                        </div>
                        <img src="{{asset($values->image)}}" alt="Image" width="50%" height="50%">
                        <h1>{{$values->title}}</h1>
                        <p>{!!$values->description!!}</p>
                    @endif
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
