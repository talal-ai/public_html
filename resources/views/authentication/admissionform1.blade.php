@extends('Layout.layout3')

@section('content')
<!-- Toast Container -->
<div id="toast-container" class="fixed top-4 right-4 space-y-4 z-50"></div>

<div class="flex min-h-screen">
    <!-- Sidebar for Steps with Background Image -->
    <aside class="hidden lg:block w-1/4 p-8 text-white bg-cover" style="margin: 15px; border-radius: 20px; background-image: url('{{ asset('public/assets/images/adminssion/sidebar.avif') }}');">

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
                   
<svg class="w-6 h-6 text-gray-300" stroke="currentColor" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.5 9L11.5 12L8.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12.5 9L15.5 12L12.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
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
                    
<svg class="w-6 h-6 text-gray-300" stroke="currentColor" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.5 9L11.5 12L8.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12.5 9L15.5 12L12.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
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
                    
<svg class="w-6 h-6 text-gray-300" stroke="currentColor" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.5 9L11.5 12L8.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12.5 9L15.5 12L12.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
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
                    
<svg class="w-6 h-6 text-gray-300" stroke="currentColor" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.5 9L11.5 12L8.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12.5 9L15.5 12L12.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
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
                    
<svg class="w-6 h-6 text-gray-300" stroke="currentColor" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.5 9L11.5 12L8.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12.5 9L15.5 12L12.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
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

<svg class="w-6 h-6 text-gray-300" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M8.5 9L11.5 12L8.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12.5 9L15.5 12L12.5 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
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
             <!-- Progress Bar -->
        <div class="relative w-full bg-gray-200 rounded-full h-2.5 mb-8">
            <div id="progress-bar" class="absolute top-0 left-0 h-2.5 bg-blue-500 rounded-full transition-all duration-300"></div>
        </div>

        <!-- Step 1: Sign Up -->
        <section class="content" id="step-1">
            <h2 class="text-3xl font-bold mb-4">Please Provide your personal Detail Again</h2>
            <form id="signup-form" class="space-y-4 forms-to-submit" method="post">
            @csrf
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Email</label>
                    @if($sessionId)
                    <input type="hidden" id="sessionid" name="sessionid" value="{{ $sessionId }}">
                    @endif
                    <input type="email" id="email" name="email" required class="input-field">
                    <p id="email-help" class="text-xs text-red-500 hidden">Email is required</p>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="input-field">
                    <p id="password-help" class="text-xs text-red-500 hidden">Password is required</p>
                </div>
                <button type="submit" id="next-to-program" class="btn-primary w-full">Continue</button>
            </form>
            <h6 class="text-small font-bold mb-4">Already Have a account <a href="{{ route('loginadmissionform') }}" style="cursor: pointer;">Login</a></h6>
        </section>

        <!-- Step 2: Select Program -->
        <section class="content hidden" id="step-2">
            <h2 class="text-3xl font-bold mb-4">Select a Program</h2>
            <form id="program-form" class="space-y-4 forms-to-submit" method="post">
            @csrf
            <input type="hidden" id="selected_program" name="selected_program" required class="input-field" value="">
            <div class="program-list space-y-4">
                <div class="program-item hover:bg-blue-100 p-4 rounded-lg border border-gray-300" style="cursor: pointer;font-weight: 600;" data-program="1">MBBS</div>
                <div class="program-item hover:bg-blue-100 p-4 rounded-lg border border-gray-300" style="cursor: pointer;font-weight: 600;" data-program="2">BDS</div>
                <div class="program-item hover:bg-blue-100 p-4 rounded-lg border border-gray-300" style="cursor: pointer;font-weight: 600;" data-program="3">NURSING</div>
            </div>
            <!-- Button Container -->
    <div class="flex justify-between mt-4">
        <button id="back-to-signup" class="btn-secondary w-1/2 mr-2 hidden">Back</button>
        <button type="submit" id="next-to-type" class="btn-primary w-1/2 ml-2">Next</button>
    </div>
    </form>
        </section>

        <!-- Step 3: Select Type  -->
        <section class="content hidden" id="step-3">
            <h2 class="text-3xl font-bold mb-4">Type of Application</h2>
            <form id="type-form" class="space-y-4 forms-to-submit" method="post">
            @csrf
            <input type="hidden" id="selected_type" name="selected_type" required class="input-field" value="">
            <div class="program-list space-y-4">
                <div class="type-item hover:bg-blue-100 p-4 rounded-lg border border-gray-300" style="cursor: pointer;font-weight: 600;" data-type="1">Open</div>
                <div class="type-item hover:bg-blue-100 p-4 rounded-lg border border-gray-300" style="cursor: pointer;font-weight: 600;" data-type="2">Overseas</div>
            </div>
            <!-- Button Container -->
    <div class="flex justify-between mt-4">
        <button id="back-to-program" class="btn-secondary w-1/2 mr-2 hidden">Back</button>
        <button type="submit" id="next-to-personal" class="btn-primary w-1/2 ml-2">Next</button>
    </div>
    </form>
        </section>

        <!-- Step 4: Personal Complete Form -->
<section class="content hidden w-full " id="step-4">
    <h2 class="text-3xl font-bold mb-4">Personal Details</h2>
    <form id="user-form" class="space-y-4 forms-to-submit" method="post">
    @csrf
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" id="name" name="name" required class="input-field">
        <p id="name-help" class="text-xs text-red-500 hidden">Name is required</p>
    </div>
    <div>
        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
        <input type="number" id="phone" name="phone" required class="input-field">
        <p id="phone-help" class="text-xs text-red-500 hidden">Phone number is required</p>
    </div>
    <div>
        <label for="cnic" class="block text-sm font-medium text-gray-700">B From / CNIC</label>
        <input type="number" id="cnic" name="cnic" required class="input-field">
        <p id="cnic-help" class="text-xs text-red-500 hidden">CNIC is required</p>
    </div>
    <div>
        <label for="city" class="block text-sm font-medium text-gray-700">City</label>
        <input type="text" id="city" name="city" required class="input-field">
        <p id="city-help" class="text-xs text-red-500 hidden">City is required</p>
    </div>
    <div>
        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
        <input type="text" id="address" name="address" required class="input-field">
        <p id="address-help" class="text-xs text-red-500 hidden">Address is required</p>
    </div>
    <!-- Button Container -->
    <div class="flex justify-between mt-4">
        <button id="back-to-type" class="btn-secondary w-1/2 mr-2">Back</button>
        <button type="submit" id="next-to-parent" class="btn-primary w-1/2 ml-2">Next</button>
    </div>
</form>

</section>


<!-- Step 5: Personal Complete Form -->
<section class="content hidden w-full " id="step-5">
    <h2 class="text-3xl font-bold mb-4">Parent Details</h2>
    <form id="parent-form" class="space-y-4 forms-to-submit" method="post">
    @csrf
        <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Father Name</label>
                    <input type="text" id="fathername" name="fathername" required class="input-field">
                    <p id="fathername-help" class="text-xs text-red-500 hidden">Enter your Father Name</p>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Father Phone</label>
                    <input type="number" id="fatherphone" name="fatherphone" required class="input-field">
                    <p id="fatherphone-help" class="text-xs text-red-500 hidden">Enter your Phone</p>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Father CNIC</label>
                    <input type="number" id="fathercnic" name="fathercnic" required class="input-field">
                    <p id="fathercnic-help" class="text-xs text-red-500 hidden">Father CNIC</p>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Father Email</label>
                    <input type="email" id="fatheremail" name="fatheremail" required class="input-field">
                    <p id="fatheremail-help" class="text-xs text-red-500 hidden">Father Email</p>
                </div>
        <!-- Button Container -->
        <div class="flex justify-between mt-4">
            <button id="back-to-personal" class="btn-secondary w-1/2 mr-2">Back</button>
            <button  type="submit" id="next-to-academic" class="btn-primary w-1/2 ml-2">Next</button>
        </div>
    </form>
</section>


<!-- Step 6: Academic Form -->
<section class="content hidden w-full " id="step-6">
    <h2 class="text-3xl font-bold mb-4">Academic Details</h2>
    <h3 class="text-3xl mb-4" style="font-size: 18px;font-weight: 500;">Matric / O Levels</h3>
    <form id="academic-form" class="space-y-4 forms-to-submit" method="post">
    @csrf
        <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Total Marks</label>
                    <input type="text" id="totalmarks" name="totalmarks" required class="input-field">
                    <p id="totalmarks-help" class="text-xs text-red-500 hidden">Enter your Total Marks</p>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Obtain Marks
</label>
                    <input type="number" id="obtainmarks" name="obtainmarks" required class="input-field">
                    <p id="obtainmarks-help" class="text-xs text-red-500 hidden">Enter your Obtain Marks</p>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Passing Year</label>
                    <input type="number" id="year" name="year" required class="input-field">
                    <p id="year-help" class="text-xs text-red-500 hidden">Enter Passing Year</p>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Board / University </label>
                    <input type="text" id="board" name="board" required class="input-field">
                    <p id="board-help" class="text-xs text-red-500 hidden">Enter Board / University </p>
                </div>
        <!-- Button Container -->
        <div class="flex justify-between mt-4">
            <button id="back-to-parent" class="btn-secondary w-1/2 mr-2">Back</button>
            <button type="submit" id="next-to-academic-inter" class="btn-primary w-1/2 ml-2">Next</button>
        </div>
    </form>
</section>

<!-- Step 7: Academic Form -->
<section class="content hidden w-full " id="step-7">
    <h2 class="text-3xl font-bold mb-4">Academic Details</h2>
    <h3 class="text-3xl mb-4" style="font-size: 18px;font-weight: 500;">FSC / A Levels</h3>
    <form id="academic1-form" class="space-y-4 forms-to-submit" method="post">
        @csrf
        <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Total Marks</label>
                    <input type="text" id="fsctotalmarks" name="fsctotalmarks"  class="input-field">
                    <p id="fsctotalmarks-help" class="text-xs text-red-500 hidden">Enter your Total Marks</p>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Obtain Marks</label>
                    <input type="number" id="fscobtainmarks" name="fscobtainmarks"  class="input-field">
                    <p id="fscobtainmarks-help" class="text-xs text-red-500 hidden">Enter your Obtain Marks</p>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Bio Marks</label>
                    <input type="number" id="fscbiomarks" name="fscbiomarks"  class="input-field">
                    <p id="fscbiomarks-help" class="text-xs text-red-500 hidden">Enter your Bio Obtain Marks</p>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Chemistry Marks</label>
                    <input type="number" id="fscchemistrymarks" name="fscchemistrymarks"  class="input-field">
                    <p id="fscchemistrymarks-help" class="text-xs text-red-500 hidden">Enter your Chemistry Obtain Marks</p>
                </div>
                  <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Phy / com Marks</label>
                    <input type="number" id="fscphymarks" name="fscphymarks"  class="input-field">
                    <p id="fscphymarks-help" class="text-xs text-red-500 hidden">Enter your Phy / com Obtain Marks</p>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Passing Year</label>
                    <input type="number" id="fscyear" name="fscyear"  class="input-field">
                    <p id="fscyear-help" class="text-xs text-red-500 hidden">Enter Passing Year</p>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Board / University </label>
                    <input type="text" id="fscboard" name="fscboard"  class="input-field">
                    <p id="fscboard-help" class="text-xs text-red-500 hidden">Enter Board / University </p>
                </div>
        <!-- Button Container -->
        <div class="flex justify-between mt-4">
            <button id="back-to-academic" class="btn-secondary w-1/2 mr-2">Back</button>
            <button type="submit" id="next-to-academic-test" class="btn-primary w-1/2 ml-2">Next</button>
        </div>
    </form>
</section>

<!-- Step 7: Academic Form -->
<section class="content hidden w-full " id="step-8">
    <h2 class="text-3xl font-bold mb-4">Entry Test (Optional)</h2>
    <h3 class="text-3xl mb-4" style="font-size: 18px;font-weight: 500;"></h3>
    <form id="academic2-form" class="space-y-4 forms-to-submit" method="post">
        @csrf
        <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Entry Test Obtained Marks (Optional)</label>
                    <input type="text" id="etobtainmarks" name="etobtainmarks"  class="input-field">
                    <p id="etobtainmarks-help" class="text-xs text-red-500 hidden">Entry Test Obtained Marks</p>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Entry Test Type (Optional)</label>
                    <input type="text" id="ettype" name="ettype"  class="input-field">
                    <p id="ettype-help" class="text-xs text-red-500 hidden">Entry Test Type</p>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Test Passing Year (Optional)</label>
                    <input type="number" id="etpassingyear" name="etpassingyear"  class="input-field">
                    <p id="etpassingyear-help" class="text-xs text-red-500 hidden">Test Passing Year</p>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Testing Body (Optional)</label>
                    <input type="text" id="ettestingbody" name="ettestingbody"  class="input-field">
                    <p id="ettestingbody-help" class="text-xs text-red-500 hidden">Testing Body</p>
                </div>
        <!-- Button Container -->
        <div class="flex justify-between mt-4">
            <button id="back-to-academic-inter" class="btn-secondary w-1/2 mr-2">Back</button>
            <button type="submit"  id="next-to-payment" class="btn-primary w-1/2 ml-2">Submit</button>
        </div>
    </form>
</section>
<style type="text/css">
    .bg-green
    {
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
<!-- Step 8: Payment Method Form -->
<section class="content hidden w-full" id="step-9">
<div class="bg-white shadow-lg rounded-lg p-10 max-w-lg text-center">
        <!-- Success Icon -->
        <i id="successIcon" class="fas fa-check-circle text-green-500 text-6xl mb-4"></i>
        <h2 id="reviewMessage" class="text-3xl font-bold text-gray-800 mb-4">Your Application is Submitting..</h2>
        <p id="statusMessage" class="text-gray-600 mb-6">Thank You For Submitting Your Information Again.</p>
        <p id="statusMessage2" class="text-gray-600 mb-6"></p>
        <!-- Progress Bar -->
        <div class="relative pt-1 mb-4">
            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                <div id="progressBar" style="width:0%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
            </div>
            <span id="progressText" class="text-sm font-medium text-green-600">0% Complete</span>
        </div>
        <div id="paymentmethod" x-data="{ activeTab: 0 }" class="mx-auto w-full mt-6 border-t pt-12">
  </div>
    </div>

</section>




        <!-- Step 4: Thank You -->
        <section class="content hidden" id="step-10">
            <h2 class="text-3xl font-bold mb-4">Thank You!</h2>
            <p class="text-lg mb-8">Thank you for your submission. You can now log out or continue.</p>
            <button id="logout-button" class="btn-secondary w-full">Logout</button>
        </section>
        </div>

    </main>
</div>
@endsection