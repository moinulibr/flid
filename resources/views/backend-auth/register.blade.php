@extends('backend-layouts.auth-master')

@section('content')
    <div class="row">
        <div class="col-xl-5 col-lg-6 col-md-7 mx-auto mt-5">
          <div class="card radius-10">
            <div class="card-body p-4">
              <div class="text-center">
                <h4>Sign Up</h4>
                <p>Creat New account</p>
              </div>
              <form class="form-body row g-3" method="post" action="{{ route('register.perform') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                {{-- <div class="col-12 col-lg-12">
                  <div class="d-grid gap-2">
                    <a href="javascript:;" class="btn border border-2 border-dark"><img src="https://flid.org/rd/assets/img/icon/google.png" width="20" alt="" /><span class="ms-3 fw-500">Sign in with Google</span></a>                    
                  </div>
                </div>
                <div class="col-12 col-lg-12">
                  <div class="position-relative border-bottom my-3">
                    <div class="position-absolute seperator-2 translate-middle-y">OR</div>
                  </div>
                </div> --}}
                <div class="col-12">
                  <label for="inputName" class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="inputName" placeholder="Your name" required="required">
                  @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="col-12">
                  <label for="inputEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="inputEmail" placeholder="abc@example.com" required="required">
                  @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                  @endif
                </div>
                <div class="col-12">
                  <label for="inputPassword"  class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="inputPassword" placeholder="Your password" required="required">
                  @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                  @endif
                </div>
                <div class="col-12">
                    <label for="inputPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                  </div>
                  <div class="col-12">
                    <label for="phone" class="form-label">Phone/Mobile Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Phone/Mobile Number" required="required">
                    @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                    @endif
                  </div> 
                  <div class="col-12">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" max="90" class="form-control" id="designation" name="designation" value="{{ old('designation') }}" placeholder="Designation" required="required">
                    @if ($errors->has('designation'))
                        <span class="text-danger text-left">{{ $errors->first('designation') }}</span>
                    @endif
                  </div>
                  <div class="col-12">
                    <label for="office_address" class="form-label">Office Address</label>
                    <textarea name="office_address" id="office_address" class="form-control" cols="5" rows="2" required="required"  placeholder="Office Address" ></textarea>
                    @if ($errors->has('office_address'))
                        <span class="text-danger text-left">{{ $errors->first('office_address') }}</span>
                    @endif
                  </div>
                <div class="col-12">
                  <label for="photo" class="form-label">Upload your photo</label>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <img id="blah"  />
                        <input required name="photo" type='file'  onchange="readURL(this);" style="margin-top: 10px;" />
                        <p>Maximum upload file size: 500 MB.</p>
                    </div>
                    @if ($errors->has('photo'))
                        <span class="text-danger text-left">{{ $errors->first('photo') }}</span>
                    @endif
              </div>
                <div class="col-12 col-lg-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked required>
                    <label class="form-check-label" for="flexCheckChecked">
                      I agree the Terms and Conditions
                    </label>
                  </div>
                </div>
                <div class="col-12 col-lg-12">
                  <div class="d-grid">
                    <button type="submit" class="btn btn-dark">Sign Up</button>
                  </div>
                </div>
                <div class="col-12 col-lg-12 text-center">
                  <p class="mb-0">Already have an account? <a href="{{ route('login.show') }}">Sign in</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
