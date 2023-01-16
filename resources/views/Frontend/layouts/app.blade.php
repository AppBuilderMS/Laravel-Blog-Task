<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppBuilderMS | Blog</title>
    <meta name="description" content="AppBuilder - Resume / CV / Portfolio" />
    <meta name="keywords" content="php, laravel, livewire, js, jquery, css3, bootstrap, CV, portfolio" />
    <meta name="author" content="AppBuilder" />
    {{--<!-- Favicons -->--}}
    <link href="{{asset('assets/backend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/backend/favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/backend/favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/backend/favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/backend/favicon_io/site.webmanifest')}}">

    @include('frontend.layouts.partials.styles')
</head>

<body>

@include('frontend.layouts.partials.header')

{{--<main id="main">--}}

{{$slot}}

{{--</main><!-- End #main -->--}}

@include('frontend.layouts.partials.footer')

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@include('frontend.layouts.partials.scripts')
</body>

</html>
