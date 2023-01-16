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
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/frontend/favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/frontend/favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/frontend/favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/frontend/favicon_io/site.webmanifest')}}">

    @include('backend.layouts.partials.styles')

</head>

<body>

<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-5">
                    <h1 class="display-2 fw-medium">4<i class="bx bx-buoy bx-spin text-primary display-3"></i>4</h1>
                    <h4 class="text-uppercase">Sorry, page not found.</h4>
                    <div class="mt-5 text-center">
                        <a class="btn btn-primary waves-effect waves-light" href="{{route('dashboard.dashboard')}}">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-6">
                <div>
                    <img src="{{asset('assets/backend/images/error-img.png')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

@include('backend.layouts.partials.scripts')

</body>
</html>
