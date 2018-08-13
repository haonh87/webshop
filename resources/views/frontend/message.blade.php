@if(Session::has('message_cart'))
    <div class="woocommerce-message" role="alert">
        {!! Session::get('message_cart') !!}
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