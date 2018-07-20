@extends('layouts.master')
@section('script')
@stop
@section('content')
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('index') }}"><i class="fa fa-home"></i></a></li>
            {!!$sub_navi !!}
        </ul>
        <div class="row">
            @include('frontend.sidebar')
            <div class='col-md-9'>
                <br><br>
                <form action="
                {{route('myaccount.update',['myaccount' => Auth::user()->id])}}
                {{-- action('Frontend\MyAccountController@update', $user->id) --}}
                " method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label for="txtlastname">{{ trans('name') }}</label>
                            <input type="text" class="form-control" id="txtname" required="" name="txtname"  placeholder="{{ trans('name') }}"  value="{{Auth::user()->name }}"/>
                            <span class="has-error">{{$errors->first('txtname')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="txtemail">{{ trans('lang.email') }}</label>
                            <input type="email" class="form-control" id="txtemail" name="txtemail" required=""  placeholder="{{ trans('lang.email') }}"  value="{{Auth::user()->email }}"/>
                            <span class="has-error">{{$errors->first('txtemail')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="txtbirthday">{{ trans('lang.birth_day') }}</label>
                            <input type="date" value="{{Auth::user()->birthdate}}" class="form-control" id="txtbirthday" name="txtbirthday" required=""  placeholder="{{ trans('lang.birth_day') }}">
                            <span class="has-error">{{$errors->first('txtbirthday')}}</span>
                        </div>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="txtgender" id="inlineRadio1" value="0"
                                @if(Auth::user()->gender != 1) checked
                                        @endif
                                        > {{ trans('lang.female') }}
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="txtgender" id="inlineRadio2" value="1" @if(Auth::user()->gender == 1) checked
                                        @endif> {{ trans('lang.male') }}
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">{{ trans('lang.submit') }}</button>
                        <a class="btn btn-primary" href="{{ route('index') }}">{{ trans('lang.close') }}</a>
                    </div>
                </form>
                <div class="col-md-12">&nbsp;</div>
                <div class="clearfix"></div>

            </div>
            </div>
    <div class="col-md-12">&nbsp;</div>
    <div class="clearfix"></div>
@stop