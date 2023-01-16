<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppBuilder | Admin Dashboard</title>
    <meta name="description" content="AppBuilder - Resume / CV / Portfolio" />
    <meta name="keywords" content="php, laravel, livewire, js, jquery, css3, bootstrap, CV, portfolio" />
    <meta name="author" content="AppBuilder" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/backend/favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/backend/favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/backend/favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/backend/favicon_io/site.webmanifest')}}">

    @include('backend.layouts.partials.styles')

</head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>Sign in to continue to AppBuilder.MS dashboard.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset('assets/backend/images/profile-img.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="auth-logo">
                            <a href="/" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="{{asset('assets/backend/images/profile.svg')}}" alt="" class="" height="60">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter email" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group auth-pass-inputgroup">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password" required autocomplete="current-password" aria-label="Password" aria-describedby="password-addon">
                                        <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                <div class="mt-3 d-grid">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        {{ __('Login') }}
                                    </button>
                                </div>

                                <div class="mt-4 text-center">
                                    @if (Route::has('password.request'))
                                        <a class="text-muted" href="{{ route('password.request') }}">
                                            <i class="mdi mdi-lock me-1"></i>
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>



                    </div>
                </div>

                <div class="mt-5 text-center">

                    <div>
                        <p>Don't have an account ? <a href="{{route('register')}}" class="fw-medium text-primary"> {{ __('Register') }} </a> </p>
                        <p>© {{date('Y')}} Developed by AppBuilderMS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end account-pages -->

@include('backend.layouts.partials.scripts')
</body>
</html>
