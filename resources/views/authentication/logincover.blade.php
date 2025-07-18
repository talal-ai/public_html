@extends('Layout.layout2')

@section('content')

<div class="bg-white dark:bg-dark text-dark dark:text-white">
    <!-- Start Content -->
    <div class="relative">
        <div class="md:p-10 p-6 flex items-center justify-center sm:justify-between absolute w-full flex-wrap gap-5">
            <a href="{{ route('index') }}" class="main-logo">
                <img src="{{ asset('assets/images/logo-dark.png') }}" class="dark-logo h-8 logo dark:hidden" alt="logo" />
                <img src="{{ asset('assets/images/logo-light.png') }}" class="light-logo h-8 logo hidden dark:block" alt="logo" />
            </a>
            <div class="flex items-center gap-4">
                <div class="text-lightgray lg:text-white lg:hover:text-white hover:text-primary duration-300 md:block hidden">
                    <a href="javascript:;" x-show="$store.app.mode === 'light'" @click="$store.app.toggleMode('dark')" style="display: none;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M22 11.9999C22 17.5228 17.5228 21.9999 12 21.9999C10.8358 21.9999 9.71801 21.801 8.67887 21.4352C8.24138 20.3767 8 19.2165 8 17.9999C8 15.7787 8.80467 13.7454 10.1384 12.1757C11.31 13.8813 13.2744 14.9999 15.5 14.9999C17.8615 14.9999 19.9289 13.7405 21.0672 11.8568C21.3065 11.4607 22 11.5372 22 11.9999Z" fill="currentColor" />
                            <path d="M2 12C2 16.3586 4.78852 20.0659 8.67887 21.4353C8.24138 20.3768 8 19.2166 8 18C8 15.7788 8.80467 13.7455 10.1384 12.1758C9.42027 11.1303 9 9.86422 9 8.5C9 6.13845 10.2594 4.07105 12.1432 2.93276C12.5392 2.69347 12.4627 2 12 2C6.47715 2 2 6.47715 2 12Z" fill="currentColor" />
                        </svg>
                    </a>
                    <a href="javascript:;" x-show="$store.app.mode === 'dark'" @click="$store.app.toggleMode('light')">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 12C18 15.3137 15.3137 18 12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12Z" fill="currentColor" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C12.4142 1.25 12.75 1.58579 12.75 2V3C12.75 3.41421 12.4142 3.75 12 3.75C11.5858 3.75 11.25 3.41421 11.25 3V2C11.25 1.58579 11.5858 1.25 12 1.25ZM1.25 12C1.25 11.5858 1.58579 11.25 2 11.25H3C3.41421 11.25 3.75 11.5858 3.75 12C3.75 12.4142 3.41421 12.75 3 12.75H2C1.58579 12.75 1.25 12.4142 1.25 12ZM20.25 12C20.25 11.5858 20.5858 11.25 21 11.25H22C22.4142 11.25 22.75 11.5858 22.75 12C22.75 12.4142 22.4142 12.75 22 12.75H21C20.5858 12.75 20.25 12.4142 20.25 12ZM12 20.25C12.4142 20.25 12.75 20.5858 12.75 21V22C12.75 22.4142 12.4142 22.75 12 22.75C11.5858 22.75 11.25 22.4142 11.25 22V21C11.25 20.5858 11.5858 20.25 12 20.25Z" fill="currentColor" />
                            <g opacity="0.3">
                                <path d="M4.39838 4.39838C4.69127 4.10549 5.16615 4.10549 5.45904 4.39838L5.85188 4.79122C6.14477 5.08411 6.14477 5.55898 5.85188 5.85188C5.55898 6.14477 5.08411 6.14477 4.79122 5.85188L4.39838 5.45904C4.10549 5.16615 4.10549 4.69127 4.39838 4.39838Z" fill="currentColor" />
                                <path d="M19.6009 4.39864C19.8938 4.69153 19.8938 5.16641 19.6009 5.4593L19.2081 5.85214C18.9152 6.14503 18.4403 6.14503 18.1474 5.85214C17.8545 5.55924 17.8545 5.08437 18.1474 4.79148L18.5402 4.39864C18.8331 4.10575 19.308 4.10575 19.6009 4.39864Z" fill="currentColor" />
                                <path d="M18.1474 18.1474C18.4403 17.8545 18.9152 17.8545 19.2081 18.1474L19.6009 18.5402C19.8938 18.8331 19.8938 19.308 19.6009 19.6009C19.308 19.8938 18.8331 19.8938 18.5402 19.6009L18.1474 19.2081C17.8545 18.9152 17.8545 18.4403 18.1474 18.1474Z" fill="currentColor" />
                                <path d="M5.85188 18.1477C6.14477 18.4406 6.14477 18.9154 5.85188 19.2083L5.45904 19.6012C5.16615 19.8941 4.69127 19.8941 4.39838 19.6012C4.10549 19.3083 4.10549 18.8334 4.39838 18.5405L4.79122 18.1477C5.08411 17.8548 5.55898 17.8548 5.85188 18.1477Z" fill="currentColor" />
                            </g>
                        </svg>
                    </a>
                </div>
                <p class="lg:bg-white/10 bg-primary text-white p-3.5 rounded-lg">Don't have an account? <a href="{{ route('signinCover') }}" class="font-semibold underline underline-offset-4">Sign Up for Free</a></p>
            </div>
        </div>
        <div class="min-h-screen place-content-center flex">
            <div class="flex w-full">
                <div class="p-10 flex flex-col w-full lg:w-1/2 pt-44 lg:py-[132px] justify-center">
                    <div class="max-w-[500px] mx-auto w-full">
                        <p class="text-3xl font-semibold">Welcome Back!</p>
                        <p class="text-gray mt-5">Sign in to your account and join us</p>
                        <form class="mt-[60px] space-y-5">
                            <div class="relative">
                                <input id="inputemail" type="email" class="form-input h-[66px] bg-transparent dark:bg-transparent text-base rounded-[10px] ps-5 pe-14" placeholder="Email ID">
                                <span class="text-primary absolute right-5 top-1/2 -translate-y-1/2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M14.2 3H9.8C5.65164 3 3.57746 3 2.28873 4.31802C1 5.63604 1 7.75736 1 12C1 16.2426 1 18.364 2.28873 19.682C3.57746 21 5.65164 21 9.8 21H14.2C18.3484 21 20.4225 21 21.7113 19.682C23 18.364 23 16.2426 23 12C23 7.75736 23 5.63604 21.7113 4.31802C20.4225 3 18.3484 3 14.2 3Z" fill="currentColor" />
                                        <path d="M19.1284 8.034C19.4784 7.74231 19.5257 7.22209 19.234 6.87206C18.9423 6.52204 18.4221 6.47474 18.0721 6.76643L15.6973 8.74542C14.671 9.60063 13.9585 10.1925 13.357 10.5794C12.7747 10.9539 12.3798 11.0796 12.0002 11.0796C11.6206 11.0796 11.2258 10.9539 10.6435 10.5794C10.0419 10.1925 9.32941 9.60063 8.30315 8.74542L5.92837 6.76643C5.57834 6.47474 5.05812 6.52204 4.76643 6.87206C4.47474 7.22209 4.52204 7.74231 4.87206 8.034L7.28821 10.0475C8.2632 10.86 9.05344 11.5185 9.75091 11.9671C10.4775 12.4344 11.185 12.7296 12.0002 12.7296C12.8154 12.7296 13.523 12.4344 14.2495 11.9671C14.947 11.5185 15.7372 10.86 16.7122 10.0474L19.1284 8.034Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                            <div class="relative">
                                <input id="inputpassword" type="password" class="form-input h-[66px] bg-transparent dark:bg-transparent text-base rounded-[10px] ps-5 pe-14" placeholder="Password">
                                <span class="text-primary absolute right-5 top-1/2 -translate-y-1/2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M2 12C2 13.6394 2.42496 14.1915 3.27489 15.2957C4.97196 17.5004 7.81811 20 12 20C16.1819 20 19.028 17.5004 20.7251 15.2957C21.575 14.1915 22 13.6394 22 12C22 10.3606 21.575 9.80853 20.7251 8.70433C19.028 6.49956 16.1819 4 12 4C7.81811 4 4.97196 6.49956 3.27489 8.70433C2.42496 9.80853 2 10.3606 2 12Z" fill="currentColor" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 12C8.25 9.92893 9.92893 8.25 12 8.25C14.0711 8.25 15.75 9.92893 15.75 12C15.75 14.0711 14.0711 15.75 12 15.75C9.92893 15.75 8.25 14.0711 8.25 12ZM9.75 12C9.75 10.7574 10.7574 9.75 12 9.75C13.2426 9.75 14.25 10.7574 14.25 12C14.25 13.2426 13.2426 14.25 12 14.25C10.7574 14.25 9.75 13.2426 9.75 12Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                            <div class="flex items-center gap-2 justify-between flex-wrap">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" id="keepme" class="form-checkbox text-success rounded-full">
                                    <span>Keep me signed in</span>
                                </label>
                                <span>
                                    <a href="{{ route('resetPasswordCover') }}" class="hover:text-primary duration-300">Forgot Password?</a>
                                </span>
                            </div>
                            <div class="!mt-[50px]">
                                <button type="button" class="btn bg-primary py-6 uppercase tracking-widest font-bold text-sm rounded-[10px] text-white w-full hover:bg-primary/90 duration-300">
                                    Sign In
                                </button>
                            </div>
                        </form>
                        <div class="flex items-center gap-2.5 mt-[30px]">
                            <span class="flex-auto">
                                <img src="{{ asset('assets/images/left-border.png') }}" alt="">
                            </span>
                            <span class="shrink-0 text-gray">OR</span>
                            <span class="flex-auto">
                                <img src="{{ asset('assets/images/right-border.png') }}" alt="">
                            </span>
                        </div>
                        <div class="mt-[30px] flex items-center justify-between gap-2.5 flex-wrap">
                            <a href="javascript:;" class="flex items-center text-sm font-semibold bg-gray/10 justify-center p-3.5 gap-3.5 border-2 border-gray/10 dark:border-gray/20 rounded-[10px] flex-1 hover:bg-gray/20 duration-300">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_645_8948)">
                                        <path d="M24.266 12.2764C24.266 11.4607 24.1999 10.6406 24.0588 9.83807H12.74V14.4591H19.2217C18.9528 15.9494 18.0885 17.2678 16.823 18.1056V21.1039H20.69C22.9608 19.0139 24.266 15.9274 24.266 12.2764Z" fill="#4285F4" />
                                        <path d="M12.74 24.0008C15.9764 24.0008 18.7058 22.9382 20.6944 21.1039L16.8274 18.1055C15.7516 18.8375 14.3626 19.252 12.7444 19.252C9.61376 19.252 6.95934 17.1399 6.00693 14.3003H2.01648V17.3912C4.05359 21.4434 8.20278 24.0008 12.74 24.0008V24.0008Z" fill="#34A853" />
                                        <path d="M6.00253 14.3003C5.49987 12.8099 5.49987 11.1961 6.00253 9.70575V6.61481H2.01649C0.31449 10.0056 0.31449 14.0004 2.01649 17.3912L6.00253 14.3003V14.3003Z" fill="#FBBC04" />
                                        <path d="M12.74 4.74966C14.4508 4.7232 16.1043 5.36697 17.3433 6.54867L20.7694 3.12262C18.6 1.0855 15.7207 -0.034466 12.74 0.000808666C8.20277 0.000808666 4.05359 2.55822 2.01648 6.61481L6.00252 9.70575C6.95052 6.86173 9.60935 4.74966 12.74 4.74966V4.74966Z" fill="#EA4335" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_645_8948">
                                            <rect width="24" height="24" fill="white" transform="translate(0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                Google
                            </a>
                            <a href="javascript:;" class="flex items-center text-sm font-semibold bg-gray/10 justify-center p-3.5 gap-3.5 border-2 border-gray/10 dark:border-gray/20 rounded-[10px] flex-1 hover:bg-gray/20 duration-300">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_645_8955)">
                                        <path d="M24.5 12C24.5 5.37258 19.1274 0 12.5 0C5.87258 0 0.5 5.37258 0.5 12C0.5 17.9895 4.8882 22.954 10.625 23.8542V15.4688H7.57812V12H10.625V9.35625C10.625 6.34875 12.4166 4.6875 15.1576 4.6875C16.4701 4.6875 17.8438 4.92188 17.8438 4.92188V7.875H16.3306C14.84 7.875 14.375 8.80008 14.375 9.75V12H17.7031L17.1711 15.4688H14.375V23.8542C20.1118 22.954 24.5 17.9895 24.5 12Z" fill="#1877F2" />
                                        <path d="M17.1711 15.4688L17.7031 12H14.375V9.75C14.375 8.80102 14.84 7.875 16.3306 7.875H17.8438V4.92188C17.8438 4.92188 16.4705 4.6875 15.1576 4.6875C12.4166 4.6875 10.625 6.34875 10.625 9.35625V12H7.57812V15.4688H10.625V23.8542C11.8674 24.0486 13.1326 24.0486 14.375 23.8542V15.4688H17.1711Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_645_8955">
                                            <rect width="24" height="24" fill="white" transform="translate(0.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                Facebook
                            </a>
                            <a href="javascript:;" class="flex items-center text-sm font-semibold bg-gray/10 justify-center p-3.5 gap-3.5 border-2 border-gray/10 dark:border-gray/20 rounded-[10px] flex-1 hover:bg-gray/20 duration-300">
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.9231 11.4231H0.5V0H11.9231V11.4231Z" fill="#F1511B" />
                                    <path d="M24.5 11.4231H13.0769V0H24.499V11.4231H24.5Z" fill="#80CC28" />
                                    <path d="M11.9231 24H0.5V12.5769H11.9231V24Z" fill="#00ADEF" />
                                    <path d="M24.5 24H13.0769V12.5769H24.499V24H24.5Z" fill="#FBBC09" />
                                </svg>
                                Microsoft
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:flex w-1/2 bg-primary flex-col py-[132px] justify-center bg-[url('../images/bg-cover.png')] bg-cover bg-no-repeat bg-center">
                    <div>
                        <img src="{{ asset('assets/images/login-cover.png') }}" class="mx-auto" alt="">
                        <div class="max-w-[500px] mx-auto w-full px-4">
                            <p class="text-sm font-semibold text-white/60 uppercase tracking-widest mt-4">contrary to popular belief</p>
                            <p class="text-[22px]/9 text-white mt-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
</div>

@endsection
