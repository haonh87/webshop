    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">{{ trans('lang.sign_in') }}</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">{{ trans('lang.forgot_password') }}?</a></div>
            </div>
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form id="loginform" class="form-horizontal" role="form" method = "post" action="{{ route('login') }}">
                @if($errors->has('login_error'))
                    <span style="color:red; font-weight: bold">
                        {{ $errors->first('login_error') }}
                    </span>
                @endif
                    <div style="margin-bottom: 25px" class="input-group ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="email" class="form-control" name="email" value="{{ Input::old('email') }}" placeholder="email" required>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password" maxlength="20" minlength="6" required>
                    </div>
                    <div class="input-group">
                        <div class="checkbox">
                            <label>
                                <input id="login-remember" type="checkbox" name="remember" value="1"> {{ trans('lang.remember_me')  }}
                            </label>
                        </div>
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->
                        <div class="col-md-12 controls">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <input type="submit" value="Login" id="btn-login" href="#" class="btn btn-success" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>