
<div class="col-md-12 mb-3">
    <div id="accordionAccount">
        <div class="card">
            <div class="card-header" id="account">
            <h5 class="mb-0">
                <h3 class="tile-title">Account Setup
                <button class="btn btn-link pull-right" data-toggle="collapse" data-target="#collapseAccount" aria-expanded="true" aria-controls="collapseAccount">
                Open/Close
                </button></h3>
            </h5>
            </div>

            <div id="collapseAccount" class="collapse" aria-labelledby="account" data-parent="#accordionAccount">
            <div class="card-body">
                <div class="col-md-12">
                    <form class="row" action="{{ route('admin.accountsetup.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                            <label class="control-label"> Overview Title</label>
                            <input class="form-control" name="overview_title" type="text" placeholder="Enter Overview Title" value="{{ $account_overview_title && !old('account_overview_title')?$account_overview_title:old('account_overview_title') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Overview Sub Title</label>
                            <input class="form-control" name="overview_sub_title" type="text" placeholder="Enter Overview Title" value="{{ $account_overview_sub_title && !old('account_overview_sub_title')?$account_overview_sub_title:old('account_overview_sub_title') }}">

                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label"> Button Text</label>
                            <input class="form-control" name="btn_title" type="text" placeholder="Enter Overview Title" value="{{ $account_btn_title && !old('account_btn_title')?$account_btn_title:old('account_btn_title') }}">
                        </div>
                        <div class="form-group col-md-8">
                            <label class="control-label"> Redirect To</label>
                            <input class="form-control" name="btn_redirect" type="text" placeholder="Enter Redirection Link" value="{{ $account_btn_redirect && !old('account_btn_redirect')?$account_btn_redirect:old('account_btn_redirect') }}">
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
