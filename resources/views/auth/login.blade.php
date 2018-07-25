@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="module module-login span4 offset4">

                    <form class="form-validate" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="module-head">
                            <h3>Sign In</h3>
                        </div>
                        <div class="module-body">
                            <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" placeholder="Enter email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" placeholder="Enter password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="module-foot">
                            <div class="control-group">
                                <div class="controls clearfix">
                                    <button type="submit" class="btn btn-primary pull-right">Login</button>
                                    <label class="checkbox remember">
                                        <input type="checkbox" class="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Remember Me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/.wrapper-->

    <div class="footer">
        <div class="container">


            <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b> All rights reserved.
        </div>
    </div>
@endsection
