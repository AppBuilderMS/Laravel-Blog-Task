<!-- Vendor JS Files -->
<script src="{{asset('assets/frontend/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets/frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>

@vite(['resources/js/app.js'])

@livewireScripts
@stack('f_scripts')
