@extends('backend-layouts.auth-master')

@section('content')
    <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-7 mx-auto">
            <div class="reset-passowrd">
                <div class="card radius-10 w-100 mt-8">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h4>Reset password</h4>
                            <p>You will receive an e-mail in maximum 60 seconds</p>
                        </div>
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        @endif
  
                      {{-- <form action="{{ route('forget.password.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Send Password Reset Link
                              </button>
                          </div>
                      </form> --}}
                      <form class="form-body row g-3" action="{{ route('forget.password.post') }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="abc@example.com" name="email" required autofocus >
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark">Send</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection