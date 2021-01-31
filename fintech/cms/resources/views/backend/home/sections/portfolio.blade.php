
<div class="col-md-12 mb-3">
    <div id="accordionPortfolio">
        <div class="card">
            <div class="card-header" id="portfolio">
            <h5 class="mb-0">
                <h3 class="tile-title">Portfolio Setup
                <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapsePortfolio" aria-expanded="true" aria-controls="collapsePortfolio">
                Open/Close
                </button></h3>
            </h5>
            </div>

            <div id="collapsePortfolio" class="collapse" aria-labelledby="portfolio" data-parent="#accordionPortfolio">
            <div class="card-body">
                <div class="col-md-12">
                     <div class="text-center">
                        <a href="{{ route('admin.portfolio.get') }}"><input value="Go To Portfolio" type="button" class="btn btn-info" ></a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
