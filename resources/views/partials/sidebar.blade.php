<nav class="sidebar fixed z-50 flex-none w-[226px] border-r-2 border-lightgray/[8%] dark:border-gray/20 transition-all duration-300">
    <div class="bg-white dark:bg-dark h-full">
        <!-- <div class="p-3.5">
            <a href="{{ route('admin_dashboard') }}" class="main-logo w-full">
                <img src="{{ asset('public/assets/images/logo-dark1.png') }}" class="mx-auto dark-logo h-8 logo dark:hidden" alt="logo" style="height: 6rem !important;" />
                <img src="{{ asset('public/assets/images/logo-light1.png') }}" class="mx-auto light-logo h-8 logo hidden dark:block" alt="logo" />
                <img src="{{ asset('public/assets/images/logo-icon.svg') }}" class="logo-icon h-8 mx-auto hidden" alt="">
            </a>
        </div> -->
        <div class="flex items-center gap-2.5 py-2.5 pe-2.5">
            <div class="h-[2px] bg-lightgray/10 dark:bg-gray/50 block flex-1"></div>
            <button type="button" class="shrink-0 btn-toggle hover:text-primary duration-300" @click="$store.app.toggleSidebar()">
                <svg class="w-3.5" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.2" d="M5.46133 6.00002L11.1623 12L12.4613 10.633L8.05922 6.00002L12.4613 1.36702L11.1623 0L5.46133 6.00002Z" fill="currentColor" />
                    <path d="M0 6.00002L5.70101 12L7 10.633L2.59782 6.00002L7 1.36702L5.70101 0L0 6.00002Z" fill="currentColor" />
                </svg>
            </button>
        </div>
        @php

        // Get the current path
        $currentPath = request()->path(); 
        $usertype = $user->type;
        if($currentPath == '/') {
            $activemenu = 'dashboard';
            $activeitem = 'analysis';
        }else{
            // Split the path by '/'

            $pathSegments = explode('/', $currentPath);

            // Set the variables based on the segments
            $activemenu = isset($pathSegments[0]) ? $pathSegments[0] : 'dashboard';
            $activeitem = isset($pathSegments[1]) ? $pathSegments[1] : 'analysis';
        }
        @endphp

        <div class="h-[calc(100vh-93px)] overflow-y-auto overflow-x-hidden space-y-16 px-4 pt-2 pb-4">
            <ul class="relative flex flex-col gap-1 text-sm" x-data="{ activeMenu: '{{$activemenu}}', activeItem:'{{$activeitem}}' }">
            
                        @if($usertype == 1)
                            <li class="menu nav-item">
                                <a class="nav-link group" :class="{'active': activeMenu === 'admin_dashboard'}" href="{{ route('admin_dashboard') }}">
                                    <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 16C9.85038 16.6303 10.8846 17 12 17C13.1154 17 14.1496 16.6303 15 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                        <span class="pl-1.5">Dashboard</span>
                                    </div>
                                </a>
                            </li>
                        @endif

                        @if($usertype == 2)
                            <li class="menu nav-item">
                                <a class="nav-link group" :class="{'active': activeMenu === 'student_dashboard'}" href="{{ route('student_dashboard') }}">
                                    <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 16C9.85038 16.6303 10.8846 17 12 17C13.1154 17 14.1496 16.6303 15 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                        <span class="pl-1.5">Dashboard</span>
                                    </div>
                                </a>
                            </li>
                        @endif

                        @if($usertype == 4)
                            <li class="menu nav-item">
                                <a class="nav-link group" :class="{'active': activeMenu === 'teacher_dashboard'}" href="{{ route('teacher_dashboard') }}">
                                    <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 16C9.85038 16.6303 10.8846 17 12 17C13.1154 17 14.1496 16.6303 15 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                        <span class="pl-1.5">Dashboard</span>
                                    </div>
                                </a>
                            </li>
                        @endif

                        @if($usertype == 5)
                            <li class="menu nav-item">
                                <a class="nav-link group" :class="{'active': activeMenu === 'adminuser_dashboard'}" href="{{ route('adminuser_dashboard') }}">
                                    <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 16C9.85038 16.6303 10.8846 17 12 17C13.1154 17 14.1496 16.6303 15 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                        <span class="pl-1.5">Dashboard</span>
                                    </div>
                                </a>
                            </li>
                        @endif

                        @if($usertype == 6)
                            <li class="menu nav-item">
                                <a class="nav-link group" :class="{'active': activeMenu === 'faultyuser_dashboard'}" href="{{ route('faultyuser_dashboard') }}">
                                    <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 16C9.85038 16.6303 10.8846 17 12 17C13.1154 17 14.1496 16.6303 15 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                        <span class="pl-1.5">Dashboard</span>
                                    </div>
                                </a>
                            </li>
                        @endif
                       
                        
                <li class="menu nav-item">
                    <a class="nav-link group" :class="{'active': activeMenu === 'ion'}" href="{{ route('ion') }}">
                        <div class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="#1C274C" stroke-width="1.5"/>
                            <path d="M8 13H10.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M8 9H14.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M8 17H9.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M3 14V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157M21 14C21 17.7712 21 19.6569 19.8284 20.8284M4.17157 20.8284C5.34315 22 7.22876 22 11 22H13C16.7712 22 18.6569 22 19.8284 20.8284M19.8284 20.8284C20.7715 19.8853 20.9554 18.4796 20.9913 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>

                            <span class="pl-1.5">Noticboard</span>
                        </div>
                    </a>
                </li>
               


                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'CC')
                <li class="menu nav-item">
                    <a href="javaScript:;" class="nav-link group items-center justify-between" :class="{'active' : activeMenu === 'students'}" @click="activeMenu === 'students' ? activeMenu = null : activeMenu = 'students'">
                        <div class="flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18 14C18 18.4183 14.4183 22 10 22C8.76449 22 7.5944 21.7199 6.54976 21.2198C6.19071 21.0479 5.78393 20.9876 5.39939 21.0904L4.17335 21.4185C3.20701 21.677 2.32295 20.793 2.58151 19.8267L2.90955 18.6006C3.01245 18.2161 2.95209 17.8093 2.7802 17.4502C2.28008 16.4056 2 15.2355 2 14C2 9.58172 5.58172 6 10 6C14.4183 6 18 9.58172 18 14ZM6.5 15C7.05228 15 7.5 14.5523 7.5 14C7.5 13.4477 7.05228 13 6.5 13C5.94772 13 5.5 13.4477 5.5 14C5.5 14.5523 5.94772 15 6.5 15ZM10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15ZM13.5 15C14.0523 15 14.5 14.5523 14.5 14C14.5 13.4477 14.0523 13 13.5 13C12.9477 13 12.5 13.4477 12.5 14C12.5 14.5523 12.9477 15 13.5 15Z" fill="currentColor" />
                                <path opacity="0.3" d="M17.9841 14.5084C18.092 14.4638 18.1985 14.4163 18.3033 14.3661C18.5951 14.2264 18.9256 14.1774 19.238 14.261L20.2342 14.5275C21.0193 14.7376 21.7376 14.0193 21.5275 13.2342L21.261 12.238C21.1774 11.9256 21.2264 11.595 21.3661 11.3033C21.7725 10.4545 22 9.50385 22 8.5C22 4.91015 19.0899 2 15.5 2C12.79 2 10.4673 3.6585 9.49158 6.0159C9.6597 6.00535 9.82924 6 10 6C14.4183 6 18 9.58172 18 14C18 14.1708 17.9947 14.3403 17.9841 14.5084Z" fill="currentColor" />
                            </svg>
                            <span class="pl-1.5">Admission</span>
                        </div>
                        <div class="w-4 h-4 flex items-center justify-center dropdown-icon" :class="{'!rotate-180' : activeMenu === 'students'}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                            </svg>
                        </div>
                    </a>
                    <ul x-cloak x-show="activeMenu === 'students'" x-collapse class="sub-menu flex flex-col gap-1">
                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Application')
                        <li><a :class="{'active': activeItem === 'application'}" href="{{ route('application') }}">Application</a></li>
                        @break
                            @endif
                        @endforeach
                    @endforeach

                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Account Book')
                        <li><a :class="{'active': activeItem === 'accountbook'}" href="{{ route('accountbook') }}">Account Book</a></li>
                        @break
                            @endif
                        @endforeach
                    @endforeach

                    </ul>
                </li>
                @break
                            @endif
                        @endforeach
                    @endforeach


                @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Global Setting')

                <li class="menu nav-item">
                    <a href="javaScript:;" class="nav-link group items-center justify-between" :class="{'active' : activeMenu === 'gernelsetting'}" @click="activeMenu === 'gernelsetting' ? activeMenu = null : activeMenu = 'gernelsetting'">
                        <div class="flex items-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="3" stroke="#1C274C" stroke-width="1.5"></circle>
                            <path d="M3.66122 10.6392C4.13377 10.9361 4.43782 11.4419 4.43782 11.9999C4.43781 12.558 4.13376 13.0638 3.66122 13.3607C3.33966 13.5627 3.13248 13.7242 2.98508 13.9163C2.66217 14.3372 2.51966 14.869 2.5889 15.3949C2.64082 15.7893 2.87379 16.1928 3.33973 16.9999C3.80568 17.8069 4.03865 18.2104 4.35426 18.4526C4.77508 18.7755 5.30694 18.918 5.83284 18.8488C6.07287 18.8172 6.31628 18.7185 6.65196 18.5411C7.14544 18.2803 7.73558 18.2699 8.21895 18.549C8.70227 18.8281 8.98827 19.3443 9.00912 19.902C9.02332 20.2815 9.05958 20.5417 9.15224 20.7654C9.35523 21.2554 9.74458 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8478 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.9021C15.0117 19.3443 15.2977 18.8281 15.7811 18.549C16.2644 18.27 16.8545 18.2804 17.3479 18.5412C17.6837 18.7186 17.9271 18.8173 18.1671 18.8489C18.693 18.9182 19.2249 18.7756 19.6457 18.4527C19.9613 18.2106 20.1943 17.807 20.6603 17C20.8677 16.6407 21.029 16.3614 21.1486 16.1272M20.3387 13.3608C19.8662 13.0639 19.5622 12.5581 19.5621 12.0001C19.5621 11.442 19.8662 10.9361 20.3387 10.6392C20.6603 10.4372 20.8674 10.2757 21.0148 10.0836C21.3377 9.66278 21.4802 9.13092 21.411 8.60502C21.3591 8.2106 21.1261 7.80708 20.6601 7.00005C20.1942 6.19301 19.9612 5.7895 19.6456 5.54732C19.2248 5.22441 18.6929 5.0819 18.167 5.15113C17.927 5.18274 17.6836 5.2814 17.3479 5.45883C16.8544 5.71964 16.2643 5.73004 15.781 5.45096C15.2977 5.1719 15.0117 4.6557 14.9909 4.09803C14.9767 3.71852 14.9404 3.45835 14.8478 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74458 2.35523 9.35523 2.74458 9.15224 3.23463C9.05958 3.45833 9.02332 3.71848 9.00912 4.09794C8.98826 4.65566 8.70225 5.17191 8.21891 5.45096C7.73557 5.73002 7.14548 5.71959 6.65205 5.4588C6.31633 5.28136 6.0729 5.18269 5.83285 5.15108C5.30695 5.08185 4.77509 5.22436 4.35427 5.54727C4.03866 5.78945 3.80569 6.19297 3.33974 7C3.13231 7.35929 2.97105 7.63859 2.85138 7.87273" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                            <span class="pl-1.5">Global Setting</span>
                        </div>
                        <div class="w-4 h-4 flex items-center justify-center dropdown-icon" :class="{'!rotate-180' : activeMenu === 'gernelsetting'}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                            </svg>
                        </div>
                    </a>
                    <ul x-cloak x-show="activeMenu === 'gernelsetting'" x-collapse class="sub-menu flex flex-col gap-1">
                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View User Management')
                    <li><a :class="{'active': activeItem === 'usermanagement'}" href="{{ route('usermanagement') }}">User Management</a></li>
                    @break
                            @endif
                        @endforeach
                    @endforeach

                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Teacher Management')
                    <li><a :class="{'active': activeItem === 'teachermanagement'}" href="{{ route('teachermanagement') }}">Teacher Management</a></li>
                        @break
                            @endif
                        @endforeach
                    @endforeach

                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Session')
                    <li><a :class="{'active': activeItem === 'createsession'}" href="{{ route('createsession') }}">Session</a></li>
                    @break
                            @endif
                        @endforeach
                    @endforeach

                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Program')
                    <li><a :class="{'active': activeItem === 'createprogram'}" href="{{ route('createprogram') }}">Program</a></li>
                    @break
                            @endif
                        @endforeach
                    @endforeach

                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Year')
                    <li><a :class="{'active': activeItem === 'createyear'}" href="{{ route('createyear') }}">Year</a></li>
                    @break
                            @endif
                        @endforeach
                    @endforeach

                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Batch')
                    <li><a :class="{'active': activeItem === 'createbatch'}" href="{{ route('createbatch') }}">Batch</a></li>
                    @break
                            @endif
                        @endforeach
                    @endforeach

                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Subject Management')
                    <li><a :class="{'active': activeItem === 'subjectmanagement'}" href="{{ route('subjectmanagement') }}">Subject Management</a></li>
                    @break
                            @endif
                        @endforeach
                    @endforeach

                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Venue Management')
                    <li><a :class="{'active': activeItem === 'createvenue'}" href="{{ route('createvenue') }}">Venues</a></li>
                    @break
                            @endif
                        @endforeach
                    @endforeach

                    
                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Role Management')
                        <li><a :class="{'active': activeItem === 'rolessetting'}" href="{{ route('rolessetting') }}">Roles Management</a></li>
                        @break
                            @endif
                        @endforeach
                    @endforeach
                    </ul>
                </li>
                @break
                            @endif
                        @endforeach
                    @endforeach


                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Student Setting')


                <li class="menu nav-item">
                    <a href="javaScript:;" class="nav-link group items-center justify-between" :class="{'active' : activeMenu === 'Studentsetting'}" @click="activeMenu === 'Studentsetting' ? activeMenu = null : activeMenu = 'Studentsetting'">
                        <div class="flex items-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="6" r="4" stroke="#1C274C" stroke-width="1.5"/>
                        <path d="M15 9C16.6569 9 18 7.65685 18 6C18 4.34315 16.6569 3 15 3" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M5.88915 20.5843C6.82627 20.8504 7.88256 21 9 21C12.866 21 16 19.2091 16 17C16 14.7909 12.866 13 9 13C5.13401 13 2 14.7909 2 17C2 17.3453 2.07657 17.6804 2.22053 18" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M18 14C19.7542 14.3847 21 15.3589 21 16.5C21 17.5293 19.9863 18.4229 18.5 18.8704" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                            <span class="pl-1.5">Student Section</span>
                        </div>
                        <div class="w-4 h-4 flex items-center justify-center dropdown-icon" :class="{'!rotate-180' : activeMenu === 'Studentsetting'}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                            </svg>
                        </div>
                    </a>
                    <ul x-cloak x-show="activeMenu === 'Studentsetting'" x-collapse class="sub-menu flex flex-col gap-1">
                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Student Management')
                    <li><a :class="{'active': activeItem === 'studentmanagement'}" href="{{ route('studentmanagement') }}">Student Management</a></li>
                    @break
                            @endif
                        @endforeach
                    @endforeach
                    

                    </ul>
                </li>
                @break
                            @endif
                        @endforeach
                    @endforeach




                    

                   
    @if($usertype != 2)
    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View LMS')

                <li class="menu nav-item">
                    <a href="javaScript:;" class="nav-link group items-center justify-between" :class="{'active' : activeMenu === 'lms'}" @click="activeMenu === 'lms' ? activeMenu = null : activeMenu = 'lms'">
                        <div class="flex items-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M21 18C21 18.5967 20.7629 19.169 20.341 19.591C19.919 20.0129 19.3467 20.25 18.75 20.25H8.25C8.84674 20.25 9.41903 20.0129 9.84099 19.591C10.2629 19.169 10.5 18.5967 10.5 18C10.5 17.0625 9.75 16.5 9.75 16.5H20.25C20.25 16.5 21 17.0625 21 18Z" fill="currentColor"></path>
                                            <path d="M9 9.75C9 9.55109 9.07902 9.36032 9.21967 9.21967C9.36032 9.07902 9.55109 9 9.75 9H15.75C15.9489 9 16.1397 9.07902 16.2803 9.21967C16.421 9.36032 16.5 9.55109 16.5 9.75C16.5 9.94891 16.421 10.1397 16.2803 10.2803C16.1397 10.421 15.9489 10.5 15.75 10.5H9.75C9.55109 10.5 9.36032 10.421 9.21967 10.2803C9.07902 10.1397 9 9.94891 9 9.75ZM9.75 13.5H15.75C15.9489 13.5 16.1397 13.421 16.2803 13.2803C16.421 13.1397 16.5 12.9489 16.5 12.75C16.5 12.5511 16.421 12.3603 16.2803 12.2197C16.1397 12.079 15.9489 12 15.75 12H9.75C9.55109 12 9.36032 12.079 9.21967 12.2197C9.07902 12.3603 9 12.5511 9 12.75C9 12.9489 9.07902 13.1397 9.21967 13.2803C9.36032 13.421 9.55109 13.5 9.75 13.5ZM21.75 18C21.75 18.7956 21.4339 19.5587 20.8713 20.1213C20.3087 20.6839 19.5456 21 18.75 21H8.25C7.45435 21 6.69129 20.6839 6.12868 20.1213C5.56607 19.5587 5.25 18.7956 5.25 18V6C5.25 5.60218 5.09196 5.22064 4.81066 4.93934C4.52936 4.65804 4.14782 4.5 3.75 4.5C3.35218 4.5 2.97064 4.65804 2.68934 4.93934C2.40804 5.22064 2.25 5.60218 2.25 6C2.25 6.53812 2.70281 6.90188 2.7075 6.90563C2.83163 7.00115 2.92273 7.13313 2.96804 7.28306C3.01334 7.43299 3.01057 7.59335 2.96011 7.74162C2.90965 7.8899 2.81404 8.01866 2.68668 8.10983C2.55933 8.201 2.40663 8.25002 2.25 8.25C2.08781 8.25028 1.93003 8.19725 1.80094 8.09906C1.69219 8.01937 0.75 7.27594 0.75 6C0.75 5.20435 1.06607 4.44129 1.62868 3.87868C2.19129 3.31607 2.95435 3 3.75 3H16.5C17.2956 3 18.0587 3.31607 18.6213 3.87868C19.1839 4.44129 19.5 5.20435 19.5 6V15.75H20.25C20.4123 15.75 20.5702 15.8026 20.7 15.9C20.8125 15.9806 21.75 16.7241 21.75 18ZM9.02438 16.2637C9.07562 16.1125 9.17342 15.9813 9.30376 15.889C9.4341 15.7968 9.59031 15.7481 9.75 15.75H18V6C18 5.60218 17.842 5.22064 17.5607 4.93934C17.2794 4.65804 16.8978 4.5 16.5 4.5H6.34594C6.61119 4.95535 6.75064 5.47302 6.75 6V18C6.75 18.3978 6.90804 18.7794 7.18934 19.0607C7.47064 19.342 7.85218 19.5 8.25 19.5C8.64782 19.5 9.02936 19.342 9.31066 19.0607C9.59196 18.7794 9.75 18.3978 9.75 18C9.75 17.4619 9.29719 17.0981 9.2925 17.0944C9.16469 17.0029 9.06963 16.8729 9.02136 16.7233C8.97308 16.5738 8.97414 16.4127 9.02438 16.2637ZM20.25 18C20.2406 17.7221 20.1334 17.4565 19.9472 17.25H11.1347C11.2101 17.4929 11.2483 17.7457 11.2481 18C11.2488 18.5267 11.1101 19.0443 10.8459 19.5H18.75C19.1478 19.5 19.5294 19.342 19.8107 19.0607C20.092 18.7794 20.25 18.3978 20.25 18Z" fill="currentColor"></path>
                                        </svg>
                            <span class="pl-1.5">LMS</span>
                        </div>
                        <div class="w-4 h-4 flex items-center justify-center dropdown-icon" :class="{'!rotate-180' : activeMenu === 'lms'}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                            </svg>
                        </div>
                    </a>
                    <ul x-cloak x-show="activeMenu === 'lms'" x-collapse class="sub-menu flex flex-col gap-1">
                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Assignments')
                    <li><a :class="{'active': activeItem === 'assignment'}" href="{{ route('assignment') }}">Assignments</a></li>
                    @break
                            @endif
                        @endforeach
                    @endforeach

                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Quiz')
                    <li><a :class="{'active': activeItem === 'quiz'}" href="{{ route('quiz') }}">Quiz</a></li>
                    @break
                            @endif
                        @endforeach
                    @endforeach


                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Videolecture')
                                 <li><a :class="{'active': activeItem === 'videolecture'}" href="{{ route('videolecture') }}">Video Lecture</a></li>
                              @break
                            @endif
                        @endforeach
                    @endforeach
                    <li><a :class="{'active': activeItem === 'videolecture1'}" target="_blank" href="https://www.microsoft.com/en-us/microsoft-teams/group-chat-software">Microsoft Team</a></li>

                    </ul>
                </li>
                @break
                            @endif
                        @endforeach
                    @endforeach
    @endif


    @if($usertype == 2)
                <li class="menu nav-item">
                    <a href="javaScript:;" class="nav-link group items-center justify-between" :class="{'active' : activeMenu === 'students'}" @click="activeMenu === 'students' ? activeMenu = null : activeMenu = 'students'">
                        <div class="flex items-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M21 18C21 18.5967 20.7629 19.169 20.341 19.591C19.919 20.0129 19.3467 20.25 18.75 20.25H8.25C8.84674 20.25 9.41903 20.0129 9.84099 19.591C10.2629 19.169 10.5 18.5967 10.5 18C10.5 17.0625 9.75 16.5 9.75 16.5H20.25C20.25 16.5 21 17.0625 21 18Z" fill="currentColor"></path>
                                            <path d="M9 9.75C9 9.55109 9.07902 9.36032 9.21967 9.21967C9.36032 9.07902 9.55109 9 9.75 9H15.75C15.9489 9 16.1397 9.07902 16.2803 9.21967C16.421 9.36032 16.5 9.55109 16.5 9.75C16.5 9.94891 16.421 10.1397 16.2803 10.2803C16.1397 10.421 15.9489 10.5 15.75 10.5H9.75C9.55109 10.5 9.36032 10.421 9.21967 10.2803C9.07902 10.1397 9 9.94891 9 9.75ZM9.75 13.5H15.75C15.9489 13.5 16.1397 13.421 16.2803 13.2803C16.421 13.1397 16.5 12.9489 16.5 12.75C16.5 12.5511 16.421 12.3603 16.2803 12.2197C16.1397 12.079 15.9489 12 15.75 12H9.75C9.55109 12 9.36032 12.079 9.21967 12.2197C9.07902 12.3603 9 12.5511 9 12.75C9 12.9489 9.07902 13.1397 9.21967 13.2803C9.36032 13.421 9.55109 13.5 9.75 13.5ZM21.75 18C21.75 18.7956 21.4339 19.5587 20.8713 20.1213C20.3087 20.6839 19.5456 21 18.75 21H8.25C7.45435 21 6.69129 20.6839 6.12868 20.1213C5.56607 19.5587 5.25 18.7956 5.25 18V6C5.25 5.60218 5.09196 5.22064 4.81066 4.93934C4.52936 4.65804 4.14782 4.5 3.75 4.5C3.35218 4.5 2.97064 4.65804 2.68934 4.93934C2.40804 5.22064 2.25 5.60218 2.25 6C2.25 6.53812 2.70281 6.90188 2.7075 6.90563C2.83163 7.00115 2.92273 7.13313 2.96804 7.28306C3.01334 7.43299 3.01057 7.59335 2.96011 7.74162C2.90965 7.8899 2.81404 8.01866 2.68668 8.10983C2.55933 8.201 2.40663 8.25002 2.25 8.25C2.08781 8.25028 1.93003 8.19725 1.80094 8.09906C1.69219 8.01937 0.75 7.27594 0.75 6C0.75 5.20435 1.06607 4.44129 1.62868 3.87868C2.19129 3.31607 2.95435 3 3.75 3H16.5C17.2956 3 18.0587 3.31607 18.6213 3.87868C19.1839 4.44129 19.5 5.20435 19.5 6V15.75H20.25C20.4123 15.75 20.5702 15.8026 20.7 15.9C20.8125 15.9806 21.75 16.7241 21.75 18ZM9.02438 16.2637C9.07562 16.1125 9.17342 15.9813 9.30376 15.889C9.4341 15.7968 9.59031 15.7481 9.75 15.75H18V6C18 5.60218 17.842 5.22064 17.5607 4.93934C17.2794 4.65804 16.8978 4.5 16.5 4.5H6.34594C6.61119 4.95535 6.75064 5.47302 6.75 6V18C6.75 18.3978 6.90804 18.7794 7.18934 19.0607C7.47064 19.342 7.85218 19.5 8.25 19.5C8.64782 19.5 9.02936 19.342 9.31066 19.0607C9.59196 18.7794 9.75 18.3978 9.75 18C9.75 17.4619 9.29719 17.0981 9.2925 17.0944C9.16469 17.0029 9.06963 16.8729 9.02136 16.7233C8.97308 16.5738 8.97414 16.4127 9.02438 16.2637ZM20.25 18C20.2406 17.7221 20.1334 17.4565 19.9472 17.25H11.1347C11.2101 17.4929 11.2483 17.7457 11.2481 18C11.2488 18.5267 11.1101 19.0443 10.8459 19.5H18.75C19.1478 19.5 19.5294 19.342 19.8107 19.0607C20.092 18.7794 20.25 18.3978 20.25 18Z" fill="currentColor"></path>
                                        </svg>
                            <span class="pl-1.5">LMS</span>
                        </div>
                        <div class="w-4 h-4 flex items-center justify-center dropdown-icon" :class="{'!rotate-180' : activeMenu === 'students'}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                            </svg>
                        </div>
                    </a>
                    <ul x-cloak x-show="activeMenu === 'students'" x-collapse class="sub-menu flex flex-col gap-1">
                    <li><a :class="{'active': activeItem === 'studentassignment'}" href="{{ route('studentassignment') }}">Assignments</a></li>
                    <li><a :class="{'active': activeItem === 'studentquiz'}" href="{{ route('studentquiz') }}">Quiz</a></li>
                    </ul>
                </li>
    @endif


                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Mentorship')
                                <li class="menu nav-item">
                                    <a href="javaScript:;" class="nav-link group items-center justify-between" :class="{'active' : activeMenu === 'mentorship'}" @click="activeMenu === 'mentorship' ? activeMenu = null : activeMenu = 'mentorship'">
                                        <div class="flex items-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M21 18C21 18.5967 20.7629 19.169 20.341 19.591C19.919 20.0129 19.3467 20.25 18.75 20.25H8.25C8.84674 20.25 9.41903 20.0129 9.84099 19.591C10.2629 19.169 10.5 18.5967 10.5 18C10.5 17.0625 9.75 16.5 9.75 16.5H20.25C20.25 16.5 21 17.0625 21 18Z" fill="currentColor"></path>
                                                            <path d="M9 9.75C9 9.55109 9.07902 9.36032 9.21967 9.21967C9.36032 9.07902 9.55109 9 9.75 9H15.75C15.9489 9 16.1397 9.07902 16.2803 9.21967C16.421 9.36032 16.5 9.55109 16.5 9.75C16.5 9.94891 16.421 10.1397 16.2803 10.2803C16.1397 10.421 15.9489 10.5 15.75 10.5H9.75C9.55109 10.5 9.36032 10.421 9.21967 10.2803C9.07902 10.1397 9 9.94891 9 9.75ZM9.75 13.5H15.75C15.9489 13.5 16.1397 13.421 16.2803 13.2803C16.421 13.1397 16.5 12.9489 16.5 12.75C16.5 12.5511 16.421 12.3603 16.2803 12.2197C16.1397 12.079 15.9489 12 15.75 12H9.75C9.55109 12 9.36032 12.079 9.21967 12.2197C9.07902 12.3603 9 12.5511 9 12.75C9 12.9489 9.07902 13.1397 9.21967 13.2803C9.36032 13.421 9.55109 13.5 9.75 13.5ZM21.75 18C21.75 18.7956 21.4339 19.5587 20.8713 20.1213C20.3087 20.6839 19.5456 21 18.75 21H8.25C7.45435 21 6.69129 20.6839 6.12868 20.1213C5.56607 19.5587 5.25 18.7956 5.25 18V6C5.25 5.60218 5.09196 5.22064 4.81066 4.93934C4.52936 4.65804 4.14782 4.5 3.75 4.5C3.35218 4.5 2.97064 4.65804 2.68934 4.93934C2.40804 5.22064 2.25 5.60218 2.25 6C2.25 6.53812 2.70281 6.90188 2.7075 6.90563C2.83163 7.00115 2.92273 7.13313 2.96804 7.28306C3.01334 7.43299 3.01057 7.59335 2.96011 7.74162C2.90965 7.8899 2.81404 8.01866 2.68668 8.10983C2.55933 8.201 2.40663 8.25002 2.25 8.25C2.08781 8.25028 1.93003 8.19725 1.80094 8.09906C1.69219 8.01937 0.75 7.27594 0.75 6C0.75 5.20435 1.06607 4.44129 1.62868 3.87868C2.19129 3.31607 2.95435 3 3.75 3H16.5C17.2956 3 18.0587 3.31607 18.6213 3.87868C19.1839 4.44129 19.5 5.20435 19.5 6V15.75H20.25C20.4123 15.75 20.5702 15.8026 20.7 15.9C20.8125 15.9806 21.75 16.7241 21.75 18ZM9.02438 16.2637C9.07562 16.1125 9.17342 15.9813 9.30376 15.889C9.4341 15.7968 9.59031 15.7481 9.75 15.75H18V6C18 5.60218 17.842 5.22064 17.5607 4.93934C17.2794 4.65804 16.8978 4.5 16.5 4.5H6.34594C6.61119 4.95535 6.75064 5.47302 6.75 6V18C6.75 18.3978 6.90804 18.7794 7.18934 19.0607C7.47064 19.342 7.85218 19.5 8.25 19.5C8.64782 19.5 9.02936 19.342 9.31066 19.0607C9.59196 18.7794 9.75 18.3978 9.75 18C9.75 17.4619 9.29719 17.0981 9.2925 17.0944C9.16469 17.0029 9.06963 16.8729 9.02136 16.7233C8.97308 16.5738 8.97414 16.4127 9.02438 16.2637ZM20.25 18C20.2406 17.7221 20.1334 17.4565 19.9472 17.25H11.1347C11.2101 17.4929 11.2483 17.7457 11.2481 18C11.2488 18.5267 11.1101 19.0443 10.8459 19.5H18.75C19.1478 19.5 19.5294 19.342 19.8107 19.0607C20.092 18.7794 20.25 18.3978 20.25 18Z" fill="currentColor"></path>
                                                        </svg>
                                            <span class="pl-1.5">Mentorship</span>
                                        </div>
                                        <div class="w-4 h-4 flex items-center justify-center dropdown-icon" :class="{'!rotate-180' : activeMenu === 'mentorship'}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <ul x-cloak x-show="activeMenu === 'mentorship'" x-collapse class="sub-menu flex flex-col gap-1">
                                    <li><a :class="{'active': activeItem === 'mentorshipagreement'}" href="{{ route('mentorshipagreement') }}">MentorShip Agreement</a></li>
                                    <li><a :class="{'active': activeItem === 'sendrequestbyadmin'}" href="{{ route('sendrequestbyadmin') }}">Send Request</a></li>
                                     <li><a :class="{'active': activeItem === 'listofacceptance'}" href="{{ route('listofacceptance') }}">List of Acceptance</a></li>
                                       <li><a :class="{'active': activeItem === 'createteacherlist'}" href="{{ route('createteacherlist') }}">Create Teacher List</a></li>
                                    <li><a :class="{'active': activeItem === 'users'}" href="{{ route('users') }}">User List</a></li>
                                    </ul>
                                </li>                 
                             @break
                            @endif
                        @endforeach
                    @endforeach

 @if($usertype == 4)
                    <li class="menu nav-item">
                                    <a href="javaScript:;" class="nav-link group items-center justify-between" :class="{'active' : activeMenu === 'mentorship'}" @click="activeMenu === 'mentorship' ? activeMenu = null : activeMenu = 'mentorship'">
                                        <div class="flex items-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M21 18C21 18.5967 20.7629 19.169 20.341 19.591C19.919 20.0129 19.3467 20.25 18.75 20.25H8.25C8.84674 20.25 9.41903 20.0129 9.84099 19.591C10.2629 19.169 10.5 18.5967 10.5 18C10.5 17.0625 9.75 16.5 9.75 16.5H20.25C20.25 16.5 21 17.0625 21 18Z" fill="currentColor"></path>
                                                            <path d="M9 9.75C9 9.55109 9.07902 9.36032 9.21967 9.21967C9.36032 9.07902 9.55109 9 9.75 9H15.75C15.9489 9 16.1397 9.07902 16.2803 9.21967C16.421 9.36032 16.5 9.55109 16.5 9.75C16.5 9.94891 16.421 10.1397 16.2803 10.2803C16.1397 10.421 15.9489 10.5 15.75 10.5H9.75C9.55109 10.5 9.36032 10.421 9.21967 10.2803C9.07902 10.1397 9 9.94891 9 9.75ZM9.75 13.5H15.75C15.9489 13.5 16.1397 13.421 16.2803 13.2803C16.421 13.1397 16.5 12.9489 16.5 12.75C16.5 12.5511 16.421 12.3603 16.2803 12.2197C16.1397 12.079 15.9489 12 15.75 12H9.75C9.55109 12 9.36032 12.079 9.21967 12.2197C9.07902 12.3603 9 12.5511 9 12.75C9 12.9489 9.07902 13.1397 9.21967 13.2803C9.36032 13.421 9.55109 13.5 9.75 13.5ZM21.75 18C21.75 18.7956 21.4339 19.5587 20.8713 20.1213C20.3087 20.6839 19.5456 21 18.75 21H8.25C7.45435 21 6.69129 20.6839 6.12868 20.1213C5.56607 19.5587 5.25 18.7956 5.25 18V6C5.25 5.60218 5.09196 5.22064 4.81066 4.93934C4.52936 4.65804 4.14782 4.5 3.75 4.5C3.35218 4.5 2.97064 4.65804 2.68934 4.93934C2.40804 5.22064 2.25 5.60218 2.25 6C2.25 6.53812 2.70281 6.90188 2.7075 6.90563C2.83163 7.00115 2.92273 7.13313 2.96804 7.28306C3.01334 7.43299 3.01057 7.59335 2.96011 7.74162C2.90965 7.8899 2.81404 8.01866 2.68668 8.10983C2.55933 8.201 2.40663 8.25002 2.25 8.25C2.08781 8.25028 1.93003 8.19725 1.80094 8.09906C1.69219 8.01937 0.75 7.27594 0.75 6C0.75 5.20435 1.06607 4.44129 1.62868 3.87868C2.19129 3.31607 2.95435 3 3.75 3H16.5C17.2956 3 18.0587 3.31607 18.6213 3.87868C19.1839 4.44129 19.5 5.20435 19.5 6V15.75H20.25C20.4123 15.75 20.5702 15.8026 20.7 15.9C20.8125 15.9806 21.75 16.7241 21.75 18ZM9.02438 16.2637C9.07562 16.1125 9.17342 15.9813 9.30376 15.889C9.4341 15.7968 9.59031 15.7481 9.75 15.75H18V6C18 5.60218 17.842 5.22064 17.5607 4.93934C17.2794 4.65804 16.8978 4.5 16.5 4.5H6.34594C6.61119 4.95535 6.75064 5.47302 6.75 6V18C6.75 18.3978 6.90804 18.7794 7.18934 19.0607C7.47064 19.342 7.85218 19.5 8.25 19.5C8.64782 19.5 9.02936 19.342 9.31066 19.0607C9.59196 18.7794 9.75 18.3978 9.75 18C9.75 17.4619 9.29719 17.0981 9.2925 17.0944C9.16469 17.0029 9.06963 16.8729 9.02136 16.7233C8.97308 16.5738 8.97414 16.4127 9.02438 16.2637ZM20.25 18C20.2406 17.7221 20.1334 17.4565 19.9472 17.25H11.1347C11.2101 17.4929 11.2483 17.7457 11.2481 18C11.2488 18.5267 11.1101 19.0443 10.8459 19.5H18.75C19.1478 19.5 19.5294 19.342 19.8107 19.0607C20.092 18.7794 20.25 18.3978 20.25 18Z" fill="currentColor"></path>
                                                        </svg>
                                            <span class="pl-1.5">Mentorship</span>
                                        </div>
                                        <div class="w-4 h-4 flex items-center justify-center dropdown-icon" :class="{'!rotate-180' : activeMenu === 'mentorship'}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <ul x-cloak x-show="activeMenu === 'mentorship'" x-collapse class="sub-menu flex flex-col gap-1">
                                    <li><a :class="{'active': activeItem === 'mentorshipagreement'}" href="{{ route('mentorshipagreement') }}">MentorShip Agreement</a></li>
                                    <li><a :class="{'active': activeItem === 'sendrequestbyteacher'}" href="{{ route('sendrequestbyteacher') }}">Send Request</a></li>
                                    <li><a :class="{'active': activeItem === 'users'}" href="{{ route('users') }}">User List</a></li>
                                    </ul>
                                </li>
    @endif
    
    @if($usertype == 2)
                    <li class="menu nav-item">
                                    <a href="javaScript:;" class="nav-link group items-center justify-between" :class="{'active' : activeMenu === 'mentorship'}" @click="activeMenu === 'mentorship' ? activeMenu = null : activeMenu = 'mentorship'">
                                        <div class="flex items-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path opacity="0.3" d="M21 18C21 18.5967 20.7629 19.169 20.341 19.591C19.919 20.0129 19.3467 20.25 18.75 20.25H8.25C8.84674 20.25 9.41903 20.0129 9.84099 19.591C10.2629 19.169 10.5 18.5967 10.5 18C10.5 17.0625 9.75 16.5 9.75 16.5H20.25C20.25 16.5 21 17.0625 21 18Z" fill="currentColor"></path>
                                                            <path d="M9 9.75C9 9.55109 9.07902 9.36032 9.21967 9.21967C9.36032 9.07902 9.55109 9 9.75 9H15.75C15.9489 9 16.1397 9.07902 16.2803 9.21967C16.421 9.36032 16.5 9.55109 16.5 9.75C16.5 9.94891 16.421 10.1397 16.2803 10.2803C16.1397 10.421 15.9489 10.5 15.75 10.5H9.75C9.55109 10.5 9.36032 10.421 9.21967 10.2803C9.07902 10.1397 9 9.94891 9 9.75ZM9.75 13.5H15.75C15.9489 13.5 16.1397 13.421 16.2803 13.2803C16.421 13.1397 16.5 12.9489 16.5 12.75C16.5 12.5511 16.421 12.3603 16.2803 12.2197C16.1397 12.079 15.9489 12 15.75 12H9.75C9.55109 12 9.36032 12.079 9.21967 12.2197C9.07902 12.3603 9 12.5511 9 12.75C9 12.9489 9.07902 13.1397 9.21967 13.2803C9.36032 13.421 9.55109 13.5 9.75 13.5ZM21.75 18C21.75 18.7956 21.4339 19.5587 20.8713 20.1213C20.3087 20.6839 19.5456 21 18.75 21H8.25C7.45435 21 6.69129 20.6839 6.12868 20.1213C5.56607 19.5587 5.25 18.7956 5.25 18V6C5.25 5.60218 5.09196 5.22064 4.81066 4.93934C4.52936 4.65804 4.14782 4.5 3.75 4.5C3.35218 4.5 2.97064 4.65804 2.68934 4.93934C2.40804 5.22064 2.25 5.60218 2.25 6C2.25 6.53812 2.70281 6.90188 2.7075 6.90563C2.83163 7.00115 2.92273 7.13313 2.96804 7.28306C3.01334 7.43299 3.01057 7.59335 2.96011 7.74162C2.90965 7.8899 2.81404 8.01866 2.68668 8.10983C2.55933 8.201 2.40663 8.25002 2.25 8.25C2.08781 8.25028 1.93003 8.19725 1.80094 8.09906C1.69219 8.01937 0.75 7.27594 0.75 6C0.75 5.20435 1.06607 4.44129 1.62868 3.87868C2.19129 3.31607 2.95435 3 3.75 3H16.5C17.2956 3 18.0587 3.31607 18.6213 3.87868C19.1839 4.44129 19.5 5.20435 19.5 6V15.75H20.25C20.4123 15.75 20.5702 15.8026 20.7 15.9C20.8125 15.9806 21.75 16.7241 21.75 18ZM9.02438 16.2637C9.07562 16.1125 9.17342 15.9813 9.30376 15.889C9.4341 15.7968 9.59031 15.7481 9.75 15.75H18V6C18 5.60218 17.842 5.22064 17.5607 4.93934C17.2794 4.65804 16.8978 4.5 16.5 4.5H6.34594C6.61119 4.95535 6.75064 5.47302 6.75 6V18C6.75 18.3978 6.90804 18.7794 7.18934 19.0607C7.47064 19.342 7.85218 19.5 8.25 19.5C8.64782 19.5 9.02936 19.342 9.31066 19.0607C9.59196 18.7794 9.75 18.3978 9.75 18C9.75 17.4619 9.29719 17.0981 9.2925 17.0944C9.16469 17.0029 9.06963 16.8729 9.02136 16.7233C8.97308 16.5738 8.97414 16.4127 9.02438 16.2637ZM20.25 18C20.2406 17.7221 20.1334 17.4565 19.9472 17.25H11.1347C11.2101 17.4929 11.2483 17.7457 11.2481 18C11.2488 18.5267 11.1101 19.0443 10.8459 19.5H18.75C19.1478 19.5 19.5294 19.342 19.8107 19.0607C20.092 18.7794 20.25 18.3978 20.25 18Z" fill="currentColor"></path>
                                                        </svg>
                                            <span class="pl-1.5">Mentorship</span>
                                        </div>
                                        <div class="w-4 h-4 flex items-center justify-center dropdown-icon" :class="{'!rotate-180' : activeMenu === 'mentorship'}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <ul x-cloak x-show="activeMenu === 'mentorship'" x-collapse class="sub-menu flex flex-col gap-1">
                                    <li><a :class="{'active': activeItem === 'mentorshipagreement'}" href="{{ route('mentorshipagreement') }}">MentorShip Agreement</a></li>
                                    <li><a :class="{'active': activeItem === 'receivedrequestfromteacher'}" href="{{ route('receivedrequestfromteacher') }}">Request From Teacher</a></li>
                                    <li><a :class="{'active': activeItem === 'users'}" href="{{ route('users') }}">User List</a></li>
                                    </ul>
                                </li>
    @endif


    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Library')
                        <li class="menu nav-item">
                            <a href="javaScript:;" class="nav-link group items-center justify-between" :class="{'active' : activeMenu === 'librarysetting'}" @click="activeMenu === 'librarysetting' ? activeMenu = null : activeMenu = 'librarysetting'">
                                <div class="flex items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.8978 16H7.89778C6.96781 16 6.50282 16 6.12132 16.1022C5.08604 16.3796 4.2774 17.1883 4 18.2235" stroke="#1C274D" stroke-width="1.5"/>
                                <path d="M8 7H16" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M8 10.5H13" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M19.5 19H8" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M10 22C7.17157 22 5.75736 22 4.87868 21.1213C4 20.2426 4 18.8284 4 16V8C4 5.17157 4 3.75736 4.87868 2.87868C5.75736 2 7.17157 2 10 2H14C16.8284 2 18.2426 2 19.1213 2.87868C20 3.75736 20 5.17157 20 8M14 22C16.8284 22 18.2426 22 19.1213 21.1213C20 20.2426 20 18.8284 20 16V12" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>

                                    <span class="pl-1.5">Library Section</span>
                                </div>
                                <div class="w-4 h-4 flex items-center justify-center dropdown-icon" :class="{'!rotate-180' : activeMenu === 'Studentsetting'}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                        <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </a>
                            <ul x-cloak x-show="activeMenu === 'librarysetting'" x-collapse class="sub-menu flex flex-col gap-1">
                            @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Book List')
                                 <li><a :class="{'active': activeItem === 'bookmanagement'}" href="{{ route('bookmanagement') }}">Books List</a></li>
                                 @break
                            @endif
                        @endforeach
                    @endforeach
                                 <li><a :class="{'active': activeItem === 'bookshow'}" href="{{ route('bookshow') }}">All Books</a></li>
                                 @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Category List')
                                 <li><a :class="{'active': activeItem === 'addcategory'}" href="{{ route('addcategory') }}">Category List</a></li>
                                 @break
                            @endif
                        @endforeach
                    @endforeach
                            </ul>
                        </li>
                        @break
                            @endif
                        @endforeach
                    @endforeach

               



                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Attendance')

                <li class="menu nav-item">
                    <a href="javaScript:;" class="nav-link group items-center justify-between" :class="{'active' : activeMenu === 'attendancesetting'}" @click="activeMenu === 'attendancesetting' ? activeMenu = null : activeMenu = 'attendancesetting'">
                        <div class="flex items-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 6C7 6.55228 6.55228 7 6 7C5.44772 7 5 6.55228 5 6C5 5.44772 5.44772 5 6 5C6.55228 5 7 5.44772 7 6Z" fill="#1C274C"/>
                        <path d="M10 6C10 6.55228 9.55228 7 9 7C8.44772 7 8 6.55228 8 6C8 5.44772 8.44772 5 9 5C9.55228 5 10 5.44772 10 6Z" fill="#1C274C"/>
                        <path d="M13 6C13 6.55228 12.5523 7 12 7C11.4477 7 11 6.55228 11 6C11 5.44772 11.4477 5 12 5C12.5523 5 13 5.44772 13 6Z" fill="#1C274C"/>
                        <path d="M2 9.5H22" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M9 21L9 10" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M2 12C2 7.28596 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28596 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2.49073 19.5618 2.16444 18.1934 2.0551 16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>

                            <span class="pl-1.5">Attendance Setting</span>
                        </div>
                        <div class="w-4 h-4 flex items-center justify-center dropdown-icon" :class="{'!rotate-180' : activeMenu === 'attendancesetting'}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                            </svg>
                        </div>
                    </a>
                    <ul x-cloak x-show="activeMenu === 'attendancesetting'" x-collapse class="sub-menu flex flex-col gap-1">

                    <li><a :class="{'active': activeItem === 'createattendance'}" href="{{ route('createattendance') }}">Attendance Listing</a></li>
                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Manage Devices')
                    <li><a :class="{'active': activeItem === 'createdevice'}" href="{{ route('createdevice') }}">Manage Devices</a></li>
                     @break
                            @endif
                        @endforeach
                    @endforeach


                    </ul>
                </li>
                @break
                            @endif
                        @endforeach
                    @endforeach

                @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Feedback')

                <li class="menu nav-item">
                    <a href="javaScript:;" class="nav-link group items-center justify-between" :class="{'active' : activeMenu === 'feedback'}" @click="activeMenu === 'feedback' ? activeMenu = null : activeMenu = 'feedback'">
                        <div class="flex items-center">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 5.854V20.9999" stroke="#1C274D" stroke-width="1.5"/>
                            <path d="M5 9L9 10" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M19 9L15 10" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M5 13L9 14" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M19 13L15 14" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M20.082 3.01775L20.1081 3.76729L20.082 3.01775ZM16.5 3.48744L16.2849 2.76895V2.76895L16.5 3.48744ZM13.6738 4.80275L13.2982 4.15363L13.2982 4.15363L13.6738 4.80275ZM3.9824 3.07489L3.93639 3.82348L3.9824 3.07489ZM7 3.48744L7.19136 2.76227V2.76227L7 3.48744ZM10.2823 4.87546L9.93167 5.53847L10.2823 4.87546ZM13.6276 20.0692L13.9804 20.7311L13.6276 20.0692ZM17 18.6334L16.8086 17.9082H16.8086L17 18.6334ZM19.9851 18.2228L20.032 18.9714L19.9851 18.2228ZM10.3724 20.0692L10.0196 20.7311H10.0196L10.3724 20.0692ZM7 18.6334L7.19136 17.9082H7.19136L7 18.6334ZM4.01486 18.2228L3.96804 18.9714H3.96804L4.01486 18.2228ZM22.75 10.5384C22.75 10.1242 22.4142 9.78839 22 9.78839C21.5858 9.78839 21.25 10.1242 21.25 10.5384H22.75ZM21.25 7C21.25 7.41421 21.5858 7.75 22 7.75C22.4142 7.75 22.75 7.41421 22.75 7H21.25ZM1.25 10.5707C1.25 10.9849 1.58579 11.3207 2 11.3207C2.41421 11.3207 2.75 10.9849 2.75 10.5707H1.25ZM2.75 14C2.75 13.5858 2.41421 13.25 2 13.25C1.58579 13.25 1.25 13.5858 1.25 14H2.75ZM20.0559 2.2682C18.9175 2.30785 17.4296 2.42627 16.2849 2.76895L16.7151 4.20594C17.6643 3.92179 18.9892 3.80627 20.1081 3.76729L20.0559 2.2682ZM16.2849 2.76895C15.2899 3.06684 14.1706 3.64868 13.2982 4.15363L14.0495 5.45188C14.9 4.95969 15.8949 4.45149 16.7151 4.20594L16.2849 2.76895ZM3.93639 3.82348C4.90238 3.88285 5.99643 3.99829 6.80864 4.21262L7.19136 2.76227C6.23055 2.50873 5.01517 2.38695 4.02841 2.3263L3.93639 3.82348ZM6.80864 4.21262C7.77076 4.46651 8.95486 5.02196 9.93167 5.53847L10.6328 4.21244C9.63736 3.68606 8.32766 3.06211 7.19136 2.76227L6.80864 4.21262ZM13.9804 20.7311C14.9714 20.2028 16.1988 19.6205 17.1914 19.3585L16.8086 17.9082C15.6383 18.217 14.2827 18.8701 13.2748 19.4074L13.9804 20.7311ZM17.1914 19.3585C17.9943 19.1466 19.0732 19.0313 20.032 18.9714L19.9383 17.4743C18.9582 17.5356 17.7591 17.6574 16.8086 17.9082L17.1914 19.3585ZM10.7252 19.4074C9.71727 18.8701 8.3617 18.217 7.19136 17.9082L6.80864 19.3585C7.8012 19.6205 9.0286 20.2028 10.0196 20.7311L10.7252 19.4074ZM7.19136 17.9082C6.24092 17.6574 5.04176 17.5356 4.06168 17.4743L3.96804 18.9714C4.9268 19.0313 6.00566 19.1466 6.80864 19.3585L7.19136 17.9082ZM21.25 16.1436C21.25 16.8293 20.6817 17.4278 19.9383 17.4743L20.032 18.9714C21.5062 18.8791 22.75 17.6798 22.75 16.1436H21.25ZM22.75 4.93319C22.75 3.46989 21.5847 2.21495 20.0559 2.2682L20.1081 3.76729C20.7229 3.74588 21.25 4.25161 21.25 4.93319H22.75ZM1.25 16.1436C1.25 17.6798 2.49378 18.8791 3.96804 18.9714L4.06168 17.4743C3.31831 17.4278 2.75 16.8293 2.75 16.1436H1.25ZM13.2748 19.4074C12.4825 19.8297 11.5175 19.8297 10.7252 19.4074L10.0196 20.7311C11.2529 21.3885 12.7471 21.3885 13.9804 20.7311L13.2748 19.4074ZM13.2982 4.15363C12.4801 4.62709 11.4617 4.6507 10.6328 4.21244L9.93167 5.53847C11.2239 6.22177 12.791 6.18025 14.0495 5.45188L13.2982 4.15363ZM2.75 4.9978C2.75 4.30062 3.30243 3.78451 3.93639 3.82348L4.02841 2.3263C2.47017 2.23053 1.25 3.49864 1.25 4.9978H2.75ZM22.75 16.1436V10.5384H21.25V16.1436H22.75ZM22.75 7V4.93319H21.25V7H22.75ZM2.75 10.5707V4.9978H1.25V10.5707H2.75ZM2.75 16.1436V14H1.25V16.1436H2.75Z" fill="#1C274D"/>
                            </svg>

                            <span class="pl-1.5">Feedback Section</span>
                        </div>
                        <div class="w-4 h-4 flex items-center justify-center dropdown-icon" :class="{'!rotate-180' : activeMenu === 'feedback'}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                            </svg>
                        </div>
                    </a>
                    <ul x-cloak x-show="activeMenu === 'feedback'" x-collapse class="sub-menu flex flex-col gap-1">
                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Course Evaluation')
                    <li><a :class="{'active': activeItem === 'coursesurvey'}" href="{{ route('showSurvey', 'coursesurvey') }}">Course Evaluation</a></li>
                    @break
                            @endif
                        @endforeach
                    @endforeach

                    @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_view' && $permission->description == 'Can View Faulty Survey')
                    <li><a :class="{'active': activeItem === 'faultysurvey'}" href="{{ route('showSurvey', 'faultysurvey') }}">Faculty Survey</a></li>
                    @break
                            @endif
                        @endforeach
                    @endforeach

                    </ul>
                </li>
                @break
                            @endif
                        @endforeach
                    @endforeach

            </ul>
        </div>
    </div>
</nav>