@extends('layouts.master')
@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
    </script>
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
                <form action="{{ route('myaccount.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                            <label for="txtlastname">{{ trans('name') }}</label>
                            <input type="text"  required="" class="form-control" id="txtname" name="txtname" placeholder="{{ trans('name') }}"
                                   value="{{  Session::getOldInput('txtlastname') }}"/>
                            <span class="has-error">{{$errors->first('txtname')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="txtemail">{{ trans('lang.email') }}</label>
                            <input type="email" required="" class="form-control" id="txtemail" name="txtemail" placeholder="{{ trans('lang.email') }}"
                                   value="{{  Session::getOldInput('txtemail') }}"/>
                            <span class="has-error">{{$errors->first('txtemail')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="txtpassword">{{ trans('lang.password') }}</label>
                            <input type="password" required="" class="form-control" id="txtpassword" name="txtpassword"
                                   placeholder="{{ trans('lang.password') }}">
                            <span class="has-error">{{$errors->first('txtpassword')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="txtpassword_confirmation">{{ trans('lang.confirm_password') }}</label>
                            <input type="password" required="" class="form-control" id="txtpassword_confirmation" name="txtpassword_confirmation"
                                    placeholder="{{ trans('lang.confirm_password') }}">
                            <span class="has-error">{{$errors->first('txtpassword_confirmation')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="txtbirthday">{{ trans('lang.birth_day') }}</label>
                            <input required="" type="date" class="form-control" id="txtbirthday" name="txtbirthday"
                                   placeholder="{{ trans('lang.birth_day') }}">
                            <span class="has-error">{{$errors->first('txtbirthday')}}</span>
                        </div>
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="txtgender" id="inlineRadio1" value="0"> {{ trans('lang.male') }}
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="txtgender" id="inlineRadio2" checked value="1">{{ trans('lang.female') }}
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success">{{ trans('lang.submit') }}</button>
                        <a class="btn btn-primary" href="{{ route('index') }}">{{ trans('lang.close') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-12">&nbsp;</div>
    <div class="clearfix"></div>
@stop