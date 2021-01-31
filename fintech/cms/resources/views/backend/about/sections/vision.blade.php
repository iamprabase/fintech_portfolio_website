
<div class="col-md-12 mb-3">
    <div id="accordionVision">
        <div class="card">
            <div class="card-header" id="vision">
            <h5 class="mb-0">
                <h3 class="tile-title">Vision
                <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseVision" aria-expanded="true" aria-controls="collapseVision">
                Open/Close
                </button></h3>
            </h5>
            </div>

            <div id="collapseVision" class="collapse" aria-labelledby="vision" data-parent="#accordionVision">
            <div class="card-body">
                <div class="col-md-12">
                    @if($vision)
                        <div class="pull-right">
                            <a href="{{ route('admin.aboutus.patch', [$vision->id]) }}"><input value="Edit" type="button" class="btn btn-info" ></a>
                        </div>
                        <img src="{{asset($vision->image)}}" alt="Image" width="50%" height="50%">
                        <h1>{{$vision->title}}</h1>
                        <p>{!!$vision->description!!}</p>
                    @endif
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
