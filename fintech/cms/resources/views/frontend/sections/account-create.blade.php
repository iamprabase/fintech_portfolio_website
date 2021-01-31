<!-- Start Account Create Area -->
@if($account_btn_title)
<section class="account-create-area">
    <div class="container">
        <div class="account-create-content">
        @if($account_title)
            <h2>{{$account_title->value}}</h2>
        @endif
        @if($account_sub_title)
            <p>{{$account_sub_title->value}}</p>
        @endif
        <a href="{{ $account_btn_redirect?$account_btn_redirect->value : '#'}}" class="btn btn-primary">{{$account_btn_title->value}}</a>
        </div>
    </div>
</section>
@endif
<!-- End Account Create Area -->
