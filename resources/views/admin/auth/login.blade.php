@extends('layouts.app')

@section('content')

    <div class="">
        <div class="form-box" id="login-box">
            <div class="header">Access to the administrative area {{ config('app.name', 'Laravel') }}</div>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login') }}">
                {{ csrf_field() }}
                <div class="body bg-gray">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div>
                            <input id="email" type="email" class="form-control" name="email"
                                   value="{{ old('email') }}" required autofocus placeholder="Email">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div>
                            <input id="password" type="password" class="form-control" name="password" required
                                   placeholder="Password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                </div>

                <div class="footer">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </form>

            <div class="margin text-center">
                <span>Sign in using social networks</span>
                <br/>
                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

            </div>
        </div>
    </div>
@endsection
