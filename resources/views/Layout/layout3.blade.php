<!DOCTYPE html>
<html lang="en">

    @include('partials.headadmission')
    
    
    <body class="bg-gray-100 font-sans" style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover; background-image: url('{{ asset('public/assets/images/adminssion/bodaybackground.avif') }}');">
        @yield('content')


        <!-- All javascirpt -->
        @include('partials.scriptadmission')

    </body>        
</html>
