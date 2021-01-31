
<div class="col-md-12 mb-3">
    <div id="accordionProfile">
        <div class="card">
            <div class="card-header" id="profiles">
            <h5 class="mb-0">
                <h3 class="tile-title">Profile
                <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true" aria-controls="collapseProfile">
                Open/Close
                </button></h3>
            </h5>
            </div>

            <div id="collapseProfile" class="collapse" aria-labelledby="profiles" data-parent="#accordionProfile">
            <div class="card-body">
                <div class="col-md-12">
                    @if($profile)
                        <div class="pull-right">
                            <a href="{{ route('admin.aboutus.patch', [$profile->id]) }}"><input value="Edit" type="button" class="btn btn-info" ></a>
                        </div>
                        <img src="{{asset($profile->image)}}" alt="Image" width="50%" height="50%">
                        <h1>{{$profile->title}}</h1>
                        <p>{!!$profile->description!!}</p>
                    @endif
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
