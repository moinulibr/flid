@extends('backend-layouts.auth-master')

@section('content')
    <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-7 mx-auto">
            <div class="reset-passowrd">
                <div class="card radius-10 w-100 mt-8">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body p-4">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <form class="form-body row g-3" action="{{ route('reset.password.post') }}" method="POST">
                            @csrf
                        <input type="text" name="token" value="{{ $token }}" hidden>
                          <div class="col-12">
                            <label for="email_address" class="form-label">E-Mail Address</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="abc@example.com" name="email" required autofocus >
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                          </div>

                          <div class="col-12">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" id="password" class="form-control" name="password" required autofocus  placeholder="New Password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                          </div>

                          <div class="col-12">
                            <label for="password-confirm" class="form-label">Confirm New Password</label>
                            <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus placeholder="Confirm New Password" >
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                          </div>

                          <div class="col-12 col-lg-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark">Reset Password</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection