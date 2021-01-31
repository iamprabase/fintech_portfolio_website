@extends('layouts/backend.app')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-home"></i> Home Page Settings</h1>
        <!-- <p>Start a beautiful journey here</p> -->
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.home.get') }}">Home Page</a></li>
    </ul>
</div>
<div class="row">
    @include('backend/home/sections.hero')
    @include('backend/home/sections.featured-boxes')
    @include('backend/home/sections.howitworks')
    @include('backend/home/sections.services')
    @include('backend/home/sections.fun-facts')
    @include('backend/home/sections.contact-us')
    @include('backend/home/sections.portfolio')
    @include('backend/home/sections.info')
    @include('backend/home/sections.blog')
    @include('backend/home/sections.accountsetup')
</div>
@endsection
@section('customscripts')
<script>
    @if($errors->any())
        let errors = @json($errors->all());
        errors.forEach(error => {
            showNotification("Error:- ", error, 'fa fa-remove', 'warning');
        });
    @endif

    $(document).on('click', '.flip-indecator', function(e){
        if(e.target.previousElementSibling.value == "") e.target.previousElementSibling.value = 1;
        else e.target.previousElementSibling.value = "";
    });

    $(document).on('click', '.removeRow', function(e){
        if(e.target.className=="fa fa-fw fa-lg fa-times-circle") e.target.parentElement.parentElement.parentElement.remove();
        else e.target.parentElement.parentElement.remove();
    });

    function addMoreFeatured(countRows){
        let hiddenIndex = `<input type="hidden" name="row_num[${countRows}]" value="${countRows}">`
        let titleInputBox = `<input class="form-control" name="featured_title[${countRows}]" type="text" placeholder="Enter Fetaured Title" >`;
        let fileInputFeatured = `<input class="form-control" type="file" name="featured_image[${countRows}]">`;
        let displayFetaured = `<div class="toggle-flip">
                            <label>
                                <input type="checkbox"  name="active[${countRows}]" value="">
                                    <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                </label>
                            </div>`;
        let removeBtnFeatured = `<button class="btn btn-danger removeRow" type="button"><i class="fa fa-fw fa-lg fa-times-circle"></i>Remove</button>`;

        let row = `<tr class="featuredRow">
                        ${hiddenIndex}
                        <td>${titleInputBox}</td>
                        <td>${fileInputFeatured}</td>
                        <td>${displayFetaured}</td>
                        <td>${removeBtnFeatured}</td>
                    </tr>`
        $('.featured').find('#appendFeatured').append(row);
    }
    $('#addMoreFeatured').click(function(e){
        let countRows = parseInt($('.featured').find('#appendFeatured').find('tr').last().children().first().val());
        if(countRows!=undefined && !isNaN(countRows))  countRows += 1;
        else if(isNaN(countRows)) countRows = 0;
        addMoreFeatured(countRows);
    });

    function addMoreOverview(countRows){
        let hiddenIndex = `<input type="hidden" name="row_num[${countRows}]" value="${countRows}">`
        let titleInputBox = `<input class="form-control" name="icon_title[${countRows}]" type="text" placeholder="Enter Icon Title" >`;
        let subtitleBox = `<textarea class="form-control" rows="4" name="icon_sub_title[${countRows}]" placeholder="Enter Icon Sub Title" spellcheck="true" style="margin-top: 0px; margin-bottom: 0px; height: auto;"></textarea>`;
        let fileInputFeatured = `<input class="form-control" type="file" name="overview_image[${countRows}]">`;
        let displayFetaured = `<div class="toggle-flip">
                            <label>
                                <input type="checkbox"  name="active[${countRows}]" value="">
                                    <span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                </label>
                            </div>`;
        let removeBtnFeatured = `<button class="btn btn-danger removeRow" type="button"><i class="fa fa-fw fa-lg fa-times-circle"></i>Remove</button>`;

        let row = `<tr class="featuredRow">
                        ${hiddenIndex}
                        <td>${titleInputBox}</td>
                        <td>${subtitleBox}</td>
                        <td>${fileInputFeatured}</td>
                        <td>${displayFetaured}</td>
                        <td>${removeBtnFeatured}</td>
                    </tr>`
        $('.overview').find('#appendOverview').append(row);
    }
    $('#addMoreOverview').click(function(e){
        let countRows = parseInt($('.overview').find('#appendOverview').find('tr').last().children().first().val());
        if(countRows!=undefined && !isNaN(countRows))  countRows += 1;
        else if(isNaN(countRows)) countRows = 0;
        addMoreOverview(countRows);
    });

    function addMoreFunFacts(countRows){
        let hiddenIndex = `<input type="hidden" name="row_num[${countRows}]" value="${countRows}">`
        let titleInputBox = `<input class="form-control" name="icon_title[${countRows}]" type="text" placeholder="Enter Icon Title" >`;
        let subtitleBox = `<input  type="text" class="form-control" name="icon_sub_title[${countRows}]" placeholder="Enter Icon Sub Title"></input>`;
        let removeBtnFeatured = `<button class="btn btn-danger removeRow" type="button"><i class="fa fa-fw fa-lg fa-times-circle"></i>Remove</button>`;

        let row = `<tr class="featuredRow">
                        ${hiddenIndex}
                        <td>${titleInputBox}</td>
                        <td>${subtitleBox}</td>
                        <td>${removeBtnFeatured}</td>
                    </tr>`
        $('.funFacts').find('#appendfunFacts').append(row);
    }
    $('#addMoreFunFacts').click(function(e){
        if(parseInt($('.funFacts').find('#appendfunFacts').find('tr').length)===3) return;
        let countRows = parseInt($('.funFacts').find('#appendfunFacts').find('tr').last().children().first().val());
        if(countRows!=undefined && !isNaN(countRows))  countRows += 1;
        else if(isNaN(countRows)) countRows = 0;
        addMoreFunFacts(countRows);
    });
</script>
@endsection
