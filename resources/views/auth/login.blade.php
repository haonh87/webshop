<html>
<head>
    <link href="{{ asset('admins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('admins/css/login.css') }}" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body id="LoginForm">
<div class="container">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Đăng nhập</h2>
                <p>Vui lòng nhập tài khoản và mật khẩu</p>
            </div>
            <form id="login" class="form-validate login-admin" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
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
                    <input id="password" type="password" placeholder="Enter password" class="form-control"
                           name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                    @endif
                </div>
                <div class="form-group text-left">
                    <label class="checkbox remember">
                        <input type="checkbox" class="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Ghi nhớ
                    </label>
                </div>
                <div class="forgot">
                    <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Đăng nhập</button>

            </form>
        </div>
        <p class="botto-text"> Designed by HITGroup</p>
    </div>
</div>
</div>
<script src="{{ asset('admins/bootstrap/js/bootstrap.min.js') }} "></script>
</body></html>