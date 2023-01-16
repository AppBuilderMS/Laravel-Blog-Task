<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppBuilderMS | Dashboard</title>
    <meta name="description" content="AppBuilder - Resume / CV / Portfolio" />
    <meta name="keywords" content="php, laravel, livewire, js, jquery, css3, bootstrap, CV, portfolio" />
    <meta name="author" content="AppBuilder" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/backend/favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/backend/favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/backend/favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/backend/favicon_io/site.webmanifest')}}">

    @include('backend.layouts.partials.styles')
</head>

<body data-sidebar="dark">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">


    @include('backend.layouts.partials.header')

    @include('backend.layouts.partials.sidebar')



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                @if(isset($breadcrumbs))
                    @include('backend.layouts.partials.breadcrums')
                @endif

                {{$slot}}
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        @include('backend.layouts.partials.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@include('backend.layouts.partials.scripts')

</body>
</html>
