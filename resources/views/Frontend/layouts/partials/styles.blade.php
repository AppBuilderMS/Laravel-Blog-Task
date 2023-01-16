@vite(['resources/css/app.css'])
<!-- Template Main CSS File -->
<link href="{{asset('assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{asset('assets/frontend/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/frontend/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

<!--Custom Files-->
<link href="{{asset('assets/frontend/css/custom.css')}}" rel="stylesheet">

@livewireStyles
@stack('f_styles')

