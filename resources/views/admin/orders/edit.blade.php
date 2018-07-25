@extends('layouts.admin.app')

@section('content')
    <div class="page-header">
        <h1>ORDER / Edit </h1>
    </div>
    <div class="row">
    @if(Session::has('message'))
        <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ Session::get('message') }}</strong>
      </div>
    @endif
        <div class="col-md-12">
            <form action="{{ action('Admin\OrderController@update', $order->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <table class="table">
                    <tbody>
                      <tr class="success">
                        <td>ID</td>
                        <td>{{$order->id}}</td>
                    </tr>
                    <tr class="warning">
                        <td>Status</td>
                        <td>
                            <div class="form-group">
                              <select class="form-control" id="status" name="status" style="width:24% !important">
                                    <option value="0"<?php if($order->status == 0){echo "selected";} ?>>None</option>
                                    <option value="1" <?php if($order->status == 1){echo "selected";} ?>>Ordered</option>
                              </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Payment</td>
                        <td>
                            <input type="text" name = "payment" value="{{ $order->payment_type }}" required>
                        </td>
                    </tr>
                        <td>Note</td>
                        <td>
                            <input type="text" name = "note" value="{{ $order->note }}" required>
                        </td>
                      </tr>
                      </tr>
                        <td>Deliver date</td>
                        <td>
                            <input type="text" name = "deliver_date" value="{{ $order->deliver_date }}" required>
                        </td>
                      </tr>
                      </tr>
                        <td>Total</td>
                        <td>
                            <input type="text" name = "total" value="{{ $order->total }}" required>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            <a class="btn btn-default" href="{{ action('Admin\OrderController@index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</a>
            </form>
        </div>
    </div>


@endsection