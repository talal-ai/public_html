@extends('Layout.layout3')

@section('content')
<style type="text/css">
    .bg-green {
        background-color: #006335;
        color: #fff;
    }

    #successIcon {
        display: none;
    }

    #paymentmethod {
        display: none;
    }

    #statusMessage2 {
        display: none;
    }
</style>
<!-- Toast Container -->
<div id="toast-container" class="fixed top-4 right-4 space-y-4 z-50"></div>

<div class="flex min-h-screen">
    <!-- Sidebar for Steps with Background Image -->
    <aside class="hidden lg:block w-1/4 p-8 text-white bg-cover"
        style="margin: 15px; border-radius: 20px; background-image: url('{{ asset('public/assets/images/adminssion/sidebar.avif') }}');">

        <div class="sidebar-menu" style="margin-top: 50%;">
            <ul class="space-y-6">
            @guest

                <li class="step-card active" data-step="1">
                    <div class="flex items-center space-x-3">
                        <!-- Icon for Step 1 -->

                        <svg class="w-6 h-6 text-gray-300" stroke="currentColor" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.5 9L11.5 12L8.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12.5 9L15.5 12L12.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                                stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <a href="{{ route('admissionform') }}">
                        <span class="text-lg font-semibold">Sign Up</span>
                        </a>
                    </div>
                    <div class="flex items-center space-x-3">
                        <p id="username-help" class="text-xs text-gray-500" style="
    padding-left: 9%;
">Enter your Signup detail.</p>
                    </div>
                </li>
                @endguest
                <li class="step-card" data-step="4">
                    <div class="flex items-center space-x-3">
                        <!-- Icon -->
                        <svg class="w-6 h-6 text-gray-300" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.5 9L11.5 12L8.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12.5 9L15.5 12L12.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                                stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                        </svg>

                        @auth
                            <!-- Logout Link -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="text-lg font-semibold text-red-500 hover:text-red-700">Logout</button>
                            </form>
                        @else
                            <!-- Login Link -->
                            <a href="{{ route('loginadmissionform') }}">
                                <span class="text-lg font-semibold">Login</span>
                            </a>
                        @endauth
                    </div>
                </li>
                <li class="step-card" data-step="2">
                    <div class="flex items-center space-x-3">
                        <!-- Icon for Step 2 -->

                        <svg class="w-6 h-6 text-gray-300" stroke="currentColor" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.5 9L11.5 12L8.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12.5 9L15.5 12L12.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                                stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <span class="text-lg font-semibold">Select Program</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <p id="username-help" class="text-xs text-gray-500" style="
    padding-left: 9%;
">Select Your Program.</p>
                    </div>
                </li>
                <li class="step-card" data-step="3">
                    <div class="flex items-center space-x-3">
                        <!-- Icon for Step 3 -->

                        <svg class="w-6 h-6 text-gray-300" stroke="currentColor" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.5 9L11.5 12L8.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12.5 9L15.5 12L12.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                                stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <span class="text-lg font-semibold">Personal Detail</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <p id="username-help" class="text-xs text-gray-500" style="
    padding-left: 9%;
">Enter your Personal detail.</p>
                    </div>
                </li>
                <li class="step-card" data-step="3">
                    <div class="flex items-center space-x-3">
                        <!-- Icon for Step 3 -->

                        <svg class="w-6 h-6 text-gray-300" stroke="currentColor" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.5 9L11.5 12L8.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12.5 9L15.5 12L12.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                                stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <span class="text-lg font-semibold">Parent Detail</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <p id="username-help" class="text-xs text-gray-500" style="
    padding-left: 9%;
">Enter your Parent detail.</p>
                    </div>
                </li>
                <li class="step-card" data-step="3">
                    <div class="flex items-center space-x-3">
                        <!-- Icon for Step 3 -->

                        <svg class="w-6 h-6 text-gray-300" stroke="currentColor" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.5 9L11.5 12L8.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12.5 9L15.5 12L12.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                                stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <span class="text-lg font-semibold">Academic Detail</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <p id="username-help" class="text-xs text-gray-500" style="
    padding-left: 9%;
">Enter your Academic detail.</p>
                    </div>
                </li>
                <li class="step-card" data-step="3">
                    <div class="flex items-center space-x-3">
                        <!-- Icon for Step 3 -->

                        <svg class="w-6 h-6 text-gray-300" stroke="currentColor" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.5 9L11.5 12L8.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12.5 9L15.5 12L12.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                                stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <span class="text-lg font-semibold">Make Payment</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <p id="username-help" class="text-xs text-gray-500" style="
    padding-left: 9%;
">Choose Your Paymentmethod.</p>
                    </div>
                </li>
                <li class="step-card" data-step="4">
                    <div class="flex items-center space-x-3">
                        <!-- Icon for Step 4 -->

                        <svg class="w-6 h-6 text-gray-300" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.5 9L11.5 12L8.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12.5 9L15.5 12L12.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7"
                                stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <a href="{{ route('login') }}"><span class="text-lg font-semibold">Back To Home</span></a>
                    </div>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-12 flex items-center justify-center">
        <div class="w-full max-w-lg">
            <div class="md:p-10 p-6 flex items-center justify-center sm:justify-between w-full flex-wrap gap-5">
                <div class="flex items-center gap-5">

                    <img src="{{ asset('public/assets/images/logo-dark.png') }}" class="dark-logo h-20 logo dark:hidden"
                        alt="logo" />
                    <img src="{{ asset('public/assets/images/logo-dark.png') }}"
                        class="light-logo h-20 logo hidden dark:block" alt="logo" />


                    <img src="{{ asset('public/assets/images/dentistry.png') }}" class="dark-logo h-20 logo dark:hidden"
                        alt="logo" />
                    <img src="{{ asset('public/assets/images/dentistry.png') }}"
                        class="light-logo h-20 logo hidden dark:block" alt="logo" />


                    <img src="{{ asset('public/assets/images/nursing.png') }}" class="dark-logo h-20 logo dark:hidden"
                        alt="logo" />
                    <img src="{{ asset('public/assets/images/nursing.png') }}"
                        class="light-logo h-20 logo hidden dark:block" alt="logo" />


                    <img src="{{ asset('public/assets/images/healthscience.png') }}"
                        class="dark-logo h-20 logo dark:hidden" alt="logo" />
                    <img src="{{ asset('public/assets/images/healthscience.png') }}"
                        class="light-logo h-20 logo hidden dark:block" alt="logo" />
                </div>
            </div>

            <!-- Step 1: Sign Up -->
            <section class="content">
                <h2 class="text-3xl font-bold mb-4">Login</h2>
                <form class="space-y-4 " method="post" action="{{ route('processLoginadmission') }}">
                    @csrf
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" required class="input-field">
                        <p id="email-help" class="text-xs text-red-500 hidden">Email is required</p>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" required class="input-field">
                        <p id="password-help" class="text-xs text-red-500 hidden">Password is required</p>
                    </div>
                    <button type="submit" class="btn-primary w-full">Login</button>
                </form>
                <h6 class="text-small font-bold mb-4">If you pay your admission fee and Account is not login with Email than Login with you TransactionID  <a href="{{ route('loginadmissionformtransactionid') }}"
                        style="cursor: pointer;">Click Here</a></h6>
                <h6 class="text-small font-bold mb-4">If not have a account <a href="{{ route('admissionform') }}"
                        style="cursor: pointer;">Sign up</a></h6>
            </section>




        </div>

    </main>
</div>
@endsection