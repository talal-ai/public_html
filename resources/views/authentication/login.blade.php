@extends('Layout.layout2')

@section('content')

<div style="background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover; background-image: url('{{ asset('public/assets/images/adminssion/bodaybackground.avif') }}');"
    class="bg-white dark:bg-dark text-dark dark:text-white bg-[url('../images/autho-light-bg.avif')] dark:bg-[url('../images/autho-dark-bg.avif')] bg-fixed bg-cover bg-center min-h-screen">
    <!-- Start Content -->
    <div class="relative">
    <!-- sm:justify-between -->
        <div class="md:p-10 p-6 flex items-center justify-center  w-full flex-wrap gap-5">
            <div class="flex items-center gap-5">
                <a href="{{ route('index') }}" class="main-logo">
                    <img src="{{ asset('public/assets/images/logo-dark.png') }}" class="dark-logo h-8 logo dark:hidden"
                        alt="logo" />
                    <img src="{{ asset('public/assets/images/logo-dark.png') }}"
                        class="light-logo h-8 logo hidden dark:block" alt="logo" />
                </a>
                <a href="{{ route('index') }}" class="main-logo">
                    <img src="{{ asset('public/assets/images/dentistry.png') }}" class="dark-logo h-8 logo dark:hidden"
                        alt="logo" />
                    <img src="{{ asset('public/assets/images/dentistry.png') }}"
                        class="light-logo h-8 logo hidden dark:block" alt="logo" />
                </a>
                <a href="{{ route('index') }}" class="main-logo">
                    <img src="{{ asset('public/assets/images/nursing.png') }}" class="dark-logo h-8 logo dark:hidden"
                        alt="logo" />
                    <img src="{{ asset('public/assets/images/nursing.png') }}"
                        class="light-logo h-8 logo hidden dark:block" alt="logo" />
                </a>
                <a href="{{ route('index') }}" class="main-logo">
                    <img src="{{ asset('public/assets/images/healthscience.png') }}"
                        class="dark-logo h-8 logo dark:hidden" alt="logo" />
                    <img src="{{ asset('public/assets/images/healthscience.png') }}"
                        class="light-logo h-8 logo hidden dark:block" alt="logo" />
                </a>
            </div>
        </div>
        <div class="md:p-10 p-6 flex items-center justify-center sm:justify-between w-full flex-wrap gap-5">
            <div class="flex items-center gap-5" style="margin: 0 auto;">
                <p class="text-3xl "
                    style="text-align: center;color: #006335;font-family: fantasy;line-height: 60px;font-size:45px;">
                    RAHBAR LMS<br>TURNING THINGS AROUND</p>
            </div>
        </div>
        <div class="md:p-10 p-6 flex items-center justify-center sm:justify-between w-full flex-wrap gap-5">
            <div class="flex items-center gap-5" style="margin: 0 auto;">
                <p style="font-size: 20px;"><a href="{{ route('admissionform') }}"
                        class="font-semibold underline underline-offset-4 text-success"
                        style="color: #006335;text-decoration: none;">Click here for New Admissions</a></p>
            </div>
        </div>
        <!-- min-h-[calc(100vh-192px)] p-7 -->
        <div class=" flex justify-center items-center">
            <div
                class="sm:p-[60px] p-9 border-2 border-gray/10 dark:border-gray/20 bg-white/10 dark:bg-white/[0.02] backdrop-blur-3xl max-w-[620px] mx-auto rounded-lg w-full">
                <p class="text-3xl font-semibold">Log In</p>
                <!-- <p class="text-gray mt-5">Let’s get started with your 30 days free trial</p> -->
                <form class="mt-[60px] space-y-5" action="{{ route('processLogin') }}" method="POST">
                    @csrf
                    <div class="relative">
                        <input type="email" id="inputemail" name="inputemail"
                            class="form-input h-[66px] bg-transparent dark:bg-transparent text-base rounded-[10px] ps-5 pe-14"
                            placeholder="Email ID">
                        <span class="text-primary absolute right-5 top-1/2 -translate-y-1/2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M14.2 3H9.8C5.65164 3 3.57746 3 2.28873 4.31802C1 5.63604 1 7.75736 1 12C1 16.2426 1 18.364 2.28873 19.682C3.57746 21 5.65164 21 9.8 21H14.2C18.3484 21 20.4225 21 21.7113 19.682C23 18.364 23 16.2426 23 12C23 7.75736 23 5.63604 21.7113 4.31802C20.4225 3 18.3484 3 14.2 3Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M19.1284 8.034C19.4784 7.74231 19.5257 7.22209 19.234 6.87206C18.9423 6.52204 18.4221 6.47474 18.0721 6.76643L15.6973 8.74542C14.671 9.60063 13.9585 10.1925 13.357 10.5794C12.7747 10.9539 12.3798 11.0796 12.0002 11.0796C11.6206 11.0796 11.2258 10.9539 10.6435 10.5794C10.0419 10.1925 9.32941 9.60063 8.30315 8.74542L5.92837 6.76643C5.57834 6.47474 5.05812 6.52204 4.76643 6.87206C4.47474 7.22209 4.52204 7.74231 4.87206 8.034L7.28821 10.0475C8.2632 10.86 9.05344 11.5185 9.75091 11.9671C10.4775 12.4344 11.185 12.7296 12.0002 12.7296C12.8154 12.7296 13.523 12.4344 14.2495 11.9671C14.947 11.5185 15.7372 10.86 16.7122 10.0474L19.1284 8.034Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="relative">
                        <input type="password" id="inputpassword" name="inputpassword"
                            class="form-input h-[66px] bg-transparent dark:bg-transparent text-base rounded-[10px] ps-5 pe-14"
                            placeholder="Password">
                        <span id="togglePassword" class="text-primary absolute right-5 top-1/2 -translate-y-1/2"
                            style="cursor: pointer;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3"
                                    d="M2 12C2 13.6394 2.42496 14.1915 3.27489 15.2957C4.97196 17.5004 7.81811 20 12 20C16.1819 20 19.028 17.5004 20.7251 15.2957C21.575 14.1915 22 13.6394 22 12C22 10.3606 21.575 9.80853 20.7251 8.70433C19.028 6.49956 16.1819 4 12 4C7.81811 4 4.97196 6.49956 3.27489 8.70433C2.42496 9.80853 2 10.3606 2 12Z"
                                    fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.25 12C8.25 9.92893 9.92893 8.25 12 8.25C14.0711 8.25 15.75 9.92893 15.75 12C15.75 14.0711 14.0711 15.75 12 15.75C9.92893 15.75 8.25 14.0711 8.25 12ZM9.75 12C9.75 10.7574 10.7574 9.75 12 9.75C13.2426 9.75 14.25 10.7574 14.25 12C14.25 13.2426 13.2426 14.25 12 14.25C10.7574 14.25 9.75 13.2426 9.75 12Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                    </div>
                    {{-- Display error for inputemail --}}
                    @error('inputemail')
                        <div class="mt-2 text-sm" style="color: #f56565;">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="text-center">
                        <a href="{{ route('resetPassword') }}" class="hover:text-primary duration-300">Forgot
                            Password?</a>
                    </div>
                    <div class="!mt-[50px]">
                        <button type="submit"
                            class="btn bg-primary py-6 uppercase tracking-widest font-bold text-sm rounded-[10px] text-white w-full hover:bg-primary/90 duration-300">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <footer class="py-7 px-3 text-center">
            <p class="font-semibold">
                &copy;
                <script>
                    var year = new Date(); document.write(year.getFullYear());
                </script>
                RAHBAR LAHORE
            </p>
        </footer>
    </div>
    <!-- End Content -->
</div>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#inputpassword');

    togglePassword.addEventListener('click', function () {
        // Toggling the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Changing the icon color or style based on the visibility state
        this.classList.toggle('active'); // You can use this to change the SVG style when active
    });

</script>
@endsection