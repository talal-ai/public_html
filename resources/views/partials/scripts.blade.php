<script src="{{ asset('public/assets/js/alpine-collaspe.min.js') }}"></script>
<script src="{{ asset('public/assets/js/alpine-persist.min.js') }}"></script>
<script src="{{ asset('public/assets/js/alpine.min.js') }}" defer></script>
<script src="{{ asset('public/assets/js/custom.js') }}"></script>
<script src="{{ asset('public/build/assets/app-ClxcITQn.js') }}"></script>
@yield('script')
<script>
    document.querySelectorAll('.positive-only').forEach(function (input) {
        input.addEventListener('input', function () {
            if (this.value < 0) {
                this.value = 0;
            }
        });
    });
</script>

