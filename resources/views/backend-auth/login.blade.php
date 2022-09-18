@extends('backend-layouts.auth-master')

@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
            <div class="card radius-10">
                <div class="card-body p-4">
                    <div class="text-center">
                        <h4>Sign In</h4>
                        <p>Sign In to your account</p>
                    </div>
                    <form class="form-body row g-3" method="post" action="{{ route('login.perform') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        @include('backend-layouts.partials.messages')
                        {{-- <div class="col-12 col-lg-12">
                            <div class="d-grid gap-2">
                                <a href="{{ route('social.oauth', 'google') }}" class="btn border border-2 border-dark"><img src="https://flid.org/rd/assets/img/icon/google.png" width="20" alt="" /><span class="ms-3 fw-500">Sign in with Google</span></a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="position-relative border-bottom my-3">
                                <div class="position-absolute seperator-2 translate-middle-y">OR</div>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="inputEmail" value="{{ old('email') }}" placeholder="abc@example.com" required="required" autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="col-12">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword" value="{{ old('password') }}" placeholder="Your password" required="required">
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="remember" value="1" role="switch" id="flexSwitchCheckRemember" >
                                <label class="form-check-label" for="flexSwitchCheckRemember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 text-end">
                            <a href="{{ route('forget.password.get') }}">Forgot Password?</a>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="d-grid">
                                <button  type="submit" class="btn btn-dark">Sign In</button>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 text-center">
                            <p class="mb-0">Don't have an account? <a href="{{ route('register.show') }}">Sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
