
<div class="col-md-12 mb-3">
    <div id="accordionGoals">
        <div class="card">
            <div class="card-header" id="goals">
            <h5 class="mb-0">
                <h3 class="tile-title">Goals
                <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseGoals" aria-expanded="true" aria-controls="collapseGoals">
                Open/Close
                </button></h3>
            </h5>
            </div>

            <div id="collapseGoals" class="collapse" aria-labelledby="goals" data-parent="#accordionGoals">
            <div class="card-body">
                <div class="col-md-12">
                    @if($goals)
                        <div class="pull-right">
                            <a href="{{ route('admin.aboutus.patch', [$goals->id]) }}"><input value="Edit" type="button" class="btn btn-info" ></a>
                        </div>
                        <img src="{{asset($goals->image)}}" alt="Image" width="50%" height="50%">
                        <h1>{{$goals->title}}</h1>
                        <p>{!!$goals->description!!}</p>
                    @endif
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
