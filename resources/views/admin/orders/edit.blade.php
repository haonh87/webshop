@extends('layouts.admin.app')

@section('content')
    <div class="row">
    @if(Session::has('message'))
        <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ Session::get('message') }}</strong>
      </div>
    @endif
    <div class="module-head">
        <h1>
            <span>Sửa thông tin đơn hàng</span>
        </h1>
    </div>
    <div class="module-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ action('Admin\OrderController@update', $order->id) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Trạng thái đơn hàng</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="0"<?php if($order->status == 0){echo "selected";} ?>>None</option>
                                    <option value="1" <?php if($order->status == 1){echo "selected";} ?>>Ordered</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="payment">Phương thức thanh toán</label>
                                <input type="text" class="form-control" name="payment" value="{{ $order->payment_type }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="note">Ghi chú</label>
                                <input type="text" class="form-control" name="note" value="{{ $order->note }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="deliver_date">Ngày hoàn thành đơn hàng</label>
                                <input type="text" class="form-control" name="deliver_date" value="{{ $order->deliver_date }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total">Tổng giá</label>
                                <input type="text" class="form-control" name="total" value="{{ $order->total }}" required>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>

                    <a class="btn btn-default" href="{{ action('Admin\OrderController@index') }}">Back</a>
                    <button class="btn btn-primary" type="submit" >Cập nhật</a>
                </form>
            </div>
        </div>
    </div>
@endsection