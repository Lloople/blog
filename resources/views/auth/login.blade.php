@extends('backend.layouts.app')

@section('content')
    <div class="flex-row">
        <div class="w-4/5 mx-auto">
            <div class="text-center">
                <h1 class="mb-8">Login</h1>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="mt-8 flex-row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="block">E-Mail Address</label>

                            <input id="email" type="email" class="block border p-2 rounded border-grey-light mx-auto" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong class="text-red">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="mt-8 flex-row form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="block">Password</label>

                            <input id="password" type="password" class="block border p-2 rounded border-grey-light mx-auto" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong class="text-red">{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group mt-8">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="rounded p-2 bg-blue-light text-white block mx-auto w-1/5">
                                    Login
                                </button>

                                <a class="block mx-auto w-1/6 no-underline mt-8 text-xs" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
