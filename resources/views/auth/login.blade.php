@extends('layouts.simple')

@section('content')
 <div id="page-container" class="main-content-boxed">
      <!-- Main Container -->
      <main id="main-container">
        <!-- Page Content -->
        <div class="bg-gd-dusk">
          <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
            <!-- Header -->
            <div class="py-30 px-5 text-center">
              <a class="link-effect font-w700" href="{{url('/')}}">
                <i class="si si-fire"></i>
                <span class="font-size-xl text-primary-dark">Zanella</span><span class="font-size-xl">Dev</span>
              </a>
              <h1 class="h2 font-w700 mt-50 mb-10">Welcome to Your Dashboard</h1>
              <h2 class="h4 font-w400 text-muted mb-0">Please sign in</h2>
            </div>
            <!-- END Header -->

            <!-- Sign In Form -->
            <div class="row justify-content-center px-5">
              <div class="col-sm-8 col-md-6 col-xl-4">

                <form class="js-validation-signin" action="{{ route('login') }}" method="post">
                    @csrf
                  <div class="form-group row">
                    <div class="col-12">
                      <div class="form-material floating">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        <label for="login-username">Email</label>

                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                    </div>
                  </div>



                  <div class="form-group row">

                            <div class="col-12">
                                 <div class="form-material floating">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label for="password">{{ __('Password') }}</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                 </div>
                            </div>
                        </div>




                        <div class="form-group row">
                            <div class="col-sm-5 mb-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>


                            <div class="col-sm-7 mb-5">
                                <a class="btn btn-block btn-noborder p-0 text-right" href="{{ route('password.request') }}">
                                    <i class="fa fa-warning text-muted mr-5"></i>  {{ __('Forgot Password?') }}
                                </a>
                            </div>
                        </div>
                  <div class="form-group row gutters-tiny">
                    <div class="col-12 mb-10">
                      <button type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-primary">
                        <i class="si si-login mr-10"></i> Sign In
                      </button>
                    </div>

                  </div>
                </form>
              </div>
            </div>
            <!-- END Sign In Form -->
          </div>
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>

@endsection


@section('js_after')
 <!-- Page JS Plugins -->
    <script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('js/pages/op_auth_signin.min.js')}}"></script>
@endsection
