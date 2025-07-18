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
                <a href="{{ route('loginCover') }}" class="lg:bg-white/10 bg-primary text-white p-3.5 rounded-lg capitalize flex items-center gap-2.5">
                    <svg width="24" height="24" class="inline-block" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M20.75 12C20.75 11.5858 20.4142 11.25 20 11.25H10.75V12.75H20C20.4142 12.75 20.75 12.4142 20.75 12Z" fill="white" />
                        <path d="M10.75 18C10.75 18.3034 10.5673 18.5768 10.287 18.6929C10.0068 18.809 9.68417 18.7449 9.46967 18.5304L3.46967 12.5304C3.32902 12.3897 3.25 12.1989 3.25 12C3.25 11.8011 3.32902 11.6103 3.46967 11.4697L9.46967 5.46969C9.68417 5.25519 10.0068 5.19103 10.287 5.30711C10.5673 5.4232 10.75 5.69668 10.75 6.00002V18Z" fill="white" />
                    </svg>
                    Back To home
                </a>
            </div>
        </div>
        <div class="min-h-screen place-content-center flex">
            <div class="flex w-full">
                <div class="p-10 flex flex-col w-full lg:w-1/2 pt-44 lg:py-[132px] justify-center">
                    <div class="max-w-[500px] mx-auto w-full">
                        <p class="text-3xl font-semibold">Two-step Authentication</p>
                        <p class="text-gray mt-5 leading-9">Enter the authentication code below we sent to
                            <span class="text-primary block">+1 603-756-4530</span>
                        </p>
                        <form class="mt-[60px]">
                            <div class="flex flex-row gap-1.5 sm:gap-4 justify-between">
                                <input type="text" id="code1" class="form-input h-[66px] bg-transparent dark:bg-transparent text-base rounded-[10px] p-2 text-center flex-1" maxlength="1">
                                <input type="text" id="code2" class="form-input h-[66px] bg-transparent dark:bg-transparent text-base rounded-[10px] p-2 text-center flex-1" maxlength="1">
                                <input type="text" id="code3" class="form-input h-[66px] bg-transparent dark:bg-transparent text-base rounded-[10px] p-2 text-center flex-1" maxlength="1">
                                <input type="text" id="code4" class="form-input h-[66px] bg-transparent dark:bg-transparent text-base rounded-[10px] p-2 text-center flex-1" maxlength="1">
                                <input type="text" id="code5" class="form-input h-[66px] bg-transparent dark:bg-transparent text-base rounded-[10px] p-2 text-center flex-1" maxlength="1">
                                <input type="text" id="code6" class="form-input h-[66px] bg-transparent dark:bg-transparent text-base rounded-[10px] p-2 text-center flex-1" maxlength="1">
                            </div>
                            <div class="text-center mt-[30px]">
                                <a href="javascript:;">Resend code</a>
                            </div>
                            <div class="mt-[30px] flex items-center gap-5">
                                <button type="button" class="btn bg-primary py-6 uppercase tracking-widest font-bold text-sm rounded-[10px] text-white w-1/2 sm:w-2/3 hover:bg-primary/90 duration-300">
                                    Verify
                                </button>
                                <button type="button" class="btn border-2 border-gray/10 dark:border-gray/20 bg-gray/10 py-6 uppercase tracking-widest font-bold text-sm rounded-[10px] w-1/2 sm:w-1/3 hover:bg-gray/20 duration-300">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="hidden lg:flex w-1/2 bg-primary flex-col py-[132px] justify-center bg-[url('../images/bg-cover.png')] bg-cover bg-no-repeat bg-center">
                    <div>
                        <img src="{{ asset('assets/images/forgot-cover.png') }}" class="mx-auto" alt="">
                        <div class="max-w-[500px] mx-auto w-full px-4">
                            <p class="text-sm font-semibold text-white/60 uppercase tracking-widest mt-4">contrary to popular belief</p>
                            <p class="text-[22px]/9 text-white mt-4">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
</div>

@endsection
