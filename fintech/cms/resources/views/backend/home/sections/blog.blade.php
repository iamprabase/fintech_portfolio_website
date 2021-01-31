
<div class="col-md-12 mb-3">
    <div id="accordionBlog">
        <div class="card">
            <div class="card-header" id="blog">
            <h5 class="mb-0">
                <h3 class="tile-title">Blog Setup
                <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true" aria-controls="collapseBlog">
                Open/Close
                </button></h3>
            </h5>
            </div>

            <div id="collapseBlog" class="collapse" aria-labelledby="blog" data-parent="#accordionBlog">
            <div class="card-body">
                <div class="col-md-12">
                     <div class="text-center">
                        <a href="{{ route('admin.blog.get') }}"><input value="Go To Blog" type="button" class="btn btn-info" ></a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
