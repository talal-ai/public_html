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

            <section class="content w-full">
            @auth
        @php
            $user = auth()->user();
            $status = $user->status;
        @endphp
    @endauth
    <?php
            if( $status == 3){
                ?>
                <div class="bg-white shadow-lg rounded-lg p-10 max-w-lg text-center">
                        <div  x-data="{ activeTab: 0 }" class="mx-auto w-full mt-6 border-t pt-12">
                    <!-- Tab List -->
                    <ul role="tablist" class="-mb-px flex items-stretch gap-2 text-slate-500">
                        <!-- Tab 1 -->
                        <li> <button @click="activeTab = 0" :aria-selected="activeTab === 0" :class="{ 'bg-green': activeTab === 0 }" class="flex gap-2 items-center rounded-full px-6 h-10 py-2 text-sm font-medium" role="tab" aria-selected="false"><span>Online Payment</span></button> </li> <!-- Tab 2 -->
                        <li> <button @click="activeTab = 1" :aria-selected="activeTab === 1" :class="{ 'bg-green': activeTab === 1 }" class="flex gap-2 items-center rounded-full px-6 h-10 py-2 text-sm font-medium bg-orange-50 text-orange-600" role="tab" aria-selected="true"><span>Manual Payment</span></button> </li>
                    </ul> <!-- Panels -->
                      <div role="tabpanels" class="rounded-b-md border rounded-xl overflow-hidden border-gray-200 mt-2 bg-white">
                    <!-- Panel 1 -->
                            <section x-show="activeTab === 0" role="tabpanel" class="p-8" style="display: none;">
                            <!-- Online Payment Content -->
                            <div id="online-content" class="tab-content mt-4">
                                <p class="text-sm text-gray-700">Proceed with online payment to continue with the application process.</p>
                                <button type="button" class="btn-primary w-full mt-4" id="online-payment-button">Pay Online</button>
                            </div>
                            </section> <!-- Panel 2 -->
                            <section x-show="activeTab === 1" role="tabpanel" class="p-8" style="">
                            <!-- Manual Payment Content -->
                            <div id="manual-content" class="tab-content mt-4">
                            <div id="manual-content" class="tab-content mt-4">
                                    <p class="text-sm text-gray-700">Students Can Deposit Rs.2500 Through EasyPaisa Account keep this screen shot with you.</p>
                                    <p class="text-sm text-gray-700">
                                        0331-4796609<br>
                                        Easypaisa account<br>
                                        Account title Firdous Hameed<br>
                                        </p>
                                <!-- <p class="text-sm text-gray-700">Please download the challan form and follow the instructions to pay manually.</p>
                                <button type="button" class="btn-primary w-full mt-4" id="download-challan-button"><i class="fas fa-download mr-2"></i> Download Challan Form</button> -->
                                <button type="button" class="btn-primary w-full mt-4" id="download-challan-button"><i class="fas fa-download mr-2"></i> Upload Receipt of Payment</button>
                            </div>
                                <!-- <button type="button" class="btn-primary w-full mt-4" id="download-challan-button"><i class="fas fa-download mr-2"></i> Download Challan Form</button> -->
                               
                            </div>
                            </section>
                        </div>
                        </div>
                    </div>
                <?php
            }elseif( $status == 2){
                ?>
                <div class="bg-white shadow-lg rounded-lg p-10 max-w-lg text-center">
                        <div  x-data="{ activeTab: 0 }" class="mx-auto w-full mt-6 border-t pt-12">
                        <p class="text-sm text-gray-700">Thank you For Uploading Receipt . Please Re login after 12 hours to check the status of your application.</p>
                   
                        </div>
                    </div>
                   

                <?php
            }elseif( $status == 1){
                    ?>
                        <div class="bg-white shadow-lg rounded-lg p-10 max-w-lg text-center">
                                        <div  x-data="{ activeTab: 0 }" class="mx-auto w-full mt-6 border-t pt-12">
                                    <!-- Tab List -->
                                
                                    <div id="manual-content" class="tab-content mt-4">
                                                <p class="text-sm text-gray-700">Thank You For your Payment, Now Please Upload Required Documents and Click Final Submission.</p>
                                                <button type="button" class="btn-primary w-full mt-4" id="download-challan-button"><i class="fas fa-download mr-2"></i> Upload Metric Document</button>
                                                <button type="button" class="btn-primary w-full mt-4" id="download-challan-button"><i class="fas fa-download mr-2"></i> Upload FSC Document</button>
                                                <button type="button" class="btn-primary w-full mt-4" id="download-challan-button"><i class="fas fa-download mr-2"></i> Upload Entry Test Document</button>
                                                <button type="button" class="btn-primary w-full mt-4" id="download-challan-button"> Final Submission</button>
                                            </div>
                                        </div>
                                    </div>

                            <?php
                                }else{
                                    ?>
                                     <div class="bg-white shadow-lg rounded-lg p-10 max-w-lg text-center">
                                        <div  x-data="{ activeTab: 0 }" class="mx-auto w-full mt-6 border-t pt-12">
                                    <!-- Tab List -->
                                
                                    <div id="manual-content" class="tab-content mt-4">
                                                <p class="text-sm text-gray-700">Thank You Now Aggerate is: 75%. Our Admission Team Will Call your if Required.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                        ?>

                </section>




        </div>

    </main>
</div>
@endsection