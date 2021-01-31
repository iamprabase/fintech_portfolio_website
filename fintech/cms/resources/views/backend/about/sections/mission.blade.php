
<div class="col-md-12 mb-3">
    <div id="accordionMission">
        <div class="card">
            <div class="card-header" id="missions>
            <h5 class="mb-0">
                <h3 class="tile-title">Mission
                <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseMission" aria-expanded="true" aria-controls="collapseMission">
                Open/Close
                </button></h3>
            </h5>
            </div>

            <div id="collapseMission" class="collapse" aria-labelledby="missions" data-parent="#accordionMission">
            <div class="card-body">
                <div class="col-md-12">
                    @if($mission)
                        <div class="pull-right">
                            <a href="{{ route('admin.aboutus.patch', [$mission->id]) }}"><input value="Edit" type="button" class="btn btn-info" ></a>
                        </div>
                        <img src="{{asset($mission->image)}}" alt="Image" width="50%" height="50%">
                        <h1>{{$mission->title}}</h1>
                        <p>{!!$mission->description!!}</p>
                    @endif
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
