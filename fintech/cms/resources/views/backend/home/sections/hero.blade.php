
<div class="col-md-12 mb-3">
    <div id="accordionJumbotron">
        <div class="card">
            <div class="card-header" id="jumbotron">
            <h5 class="mb-0">

                <h3 class="tile-title">Jumbotron Setup
                <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseJumbotron" aria-expanded="true" aria-controls="collapseJumbotron">
                Open/Close
                </button></h3>
            </h5>
            </div>

            <div id="collapseJumbotron" class="collapse" aria-labelledby="jumbotron" data-parent="#accordionJumbotron">
            <div class="card-body">
                <div class="col-md-12">
                    <form class="row" action="{{ route('admin.home.herosetup.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                            <label class="control-label">Hero Title</label>
                            <input class="form-control" name="hero_title" type="text" placeholder="Enter Hero Title" value="{{ $hero && !old('hero_title')?$hero->hero_title:old('hero_title') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Hero Background Image</label>
                            <input class="form-control" type="file" name="hero_back">

                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label">Display</label>
                            <div class="toggle-flip">
                                <label>
                                    <input type="checkbox"  name="back_hero_active" value="{{ $hero?$hero->back_hero_active:'' }}">
                                    @if($hero)
                                        <span class="flip-indecator"
                                        @if($hero->back_hero_active)
                                            data-toggle-on="OFF" data-toggle-off="ON"
                                        @else
                                            data-toggle-on="ON" data-toggle-off="OFF"
                                        @endif
                                        ></span>
                                    @else
                                        <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                    @endif
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Hero Sub Title</label>
                            <textarea class="form-control" rows="4" name="hero_sub_title" placeholder="Enter Hero Sub Title" spellcheck="true" style="margin-top: 0px; margin-bottom: 0px; height: 135px;">{{ $hero && !old('hero_sub_title')?$hero->hero_sub_title:old('hero_sub_title') }}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Hero Front Image</label>
                                <input class="form-control" type="file" name="hero_front">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label">Display</label>
                            <div class="toggle-flip">
                                <label>
                                    <input type="checkbox"  name="front_hero_active" value="{{ $hero?$hero->front_hero_active:'' }}">
                                    @if($hero)
                                        <span class="flip-indecator"
                                        @if($hero->front_hero_active)
                                            data-toggle-on="OFF" data-toggle-off="ON"
                                        @else
                                            data-toggle-on="ON" data-toggle-off="OFF"
                                        @endif
                                        ></span>
                                    @else
                                        <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                    @endif
                                </label>
                            </div>
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
