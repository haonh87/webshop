@if(isset($message_account))
    <div class="cmsmasters_row_inner">
        <div class="woocommerce-message woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" role="alert">
            {!! $message_account !!}
        </div>
    </div>
@endif
@if(Session::has('message_cart'))
    <div class="cmsmasters_row_inner">
        <div class="woocommerce-message" role="alert">
            {!! Session::get('message_cart') !!}
        </div>
    </div>
@endif
@if(Session::has('message'))
    <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ Session::get('message') }}</strong>
    </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-error fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ Session::get('error') }}</strong>
    </div>
@endif