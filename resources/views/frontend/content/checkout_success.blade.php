@extends('layouts.master')
@section('script')
    <script>
        var timeleft = 10;
        var downloadTimer = setInterval(function(){
            timeleft--;
            document.getElementById("countdowntimer").textContent = timeleft;
            if(timeleft <= 0) {
                window.location.href = '{{ route('index') }}';
            }
        },1000);
    </script>
@stop
@section('content')
    <div id="content">
        @include('frontend.header_line', ['name' => 'Đặt hàng thàng công'])
        @include('frontend.message')
        <div class="middle_inner">
            <div class="content_wrap fullwidth">
                <div class="middle_content entry">
                    <div class="woocommerce">
                        <p style="padding-bottom: 5px; font-weight: bold">Cảm ơn quý khách đã mua sắm tại gymbeo, nhân viên cskh sẽ liên hệ với quý khách để xác nhận đơn hàng.</p>
                        <p> Tự động chuyển hướng về trang chủ sau <span id="countdowntimer">10 </span> giây</p>
                        <p class="woocommerce-mini-cart__buttons buttons">
                            <a href="{{ route('index') }}" class="button wc-forward" id="go-home">Về Trang Chủ</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
