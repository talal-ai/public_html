@extends('Layout.layout')
@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Global Setting</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                            d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z"
                            fill="currentColor" />
                    </svg>
                </li>
                <li>Users Management</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <!-- <h2 class="text-base font-semibold mb-4">Criteria</h2> -->
            <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                <div class="p-1">
                    <h2 class="text-base font-semibold mb-4">Date</h2>
                    <div id="reportrange">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span id="date-range-span"></span> <i class="fa fa-caret-down"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
        <div class="flex flex-wrap gap-5 ">
            <div x-data="modals">
                @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_add' && $permission->description == 'Can Add Usermanagement')
                            <div class="flex w-full gap-4" style="padding-top: 15px;">
                                <div class="flex flex-wrap items-center gap-5">

                                    Admin user-><svg style="cursor: pointer;" @click="toggle" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                            stroke="#1C274C" stroke-width="1.5" />
                                        <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="#1C274C" stroke-width="1.5"
                                            stroke-linecap="round" />
                                    </svg>
                                </div>
                            </div>
                            @break
                        @endif
                    @endforeach
                @endforeach
                <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto"
                    :class="open && '!block'">
                    <div class="flex items-start justify-center min-h-screen " @click.self="open = false">
                        <div x-show="open" x-transition x-transition.duration.300
                            class="bg-white dark:bg-dark dark:border-gray/20  border-lightgray/10  overflow-hidden  w-full max-w-5xl">
                            <div
                                class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                <h5 class="font-semibold text-lg">Add Admin User</h5>
                                <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path
                                            d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-5 space-y-4">
                                <form action="{{ route('createadminusers') }}" method="POST">
                                    @csrf
                                    <div class="text-lightgray text-sm font-normal">
                                        <div
                                            class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Role Assign</h2>
                                                <select id="rolename" name="rolename" class="form-select" required>
                                                    <option value="" disabled selected>Select Role</option>
                                                    @foreach($rolesData as $roles)
                                                        <option value="{{ $roles['id'] }}">
                                                            {{ $roles['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Name</h2>
                                                <input id="name" name="name" type="text" class="form-input w-full"
                                                    placeholder="Name" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Designation</h2>
                                                <input id="designation" name="designation" type="text"
                                                    class="form-input w-full" placeholder="Designation">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Department</h2>
                                                <input id="department" name="department" type="text"
                                                    class="form-input w-full" placeholder="Department">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Email</h2>
                                                <!-- <input id="email" name="email" type="email" class="form-input w-full"
                                                placeholder="Email" required> -->
                                                <label class="flex">
                                                    <input id="email" name="email" class="form-input rounded-r-none"
                                                        placeholder="Email" type="text">
                                                    <div
                                                        class="flex items-center justify-center rounded-r border-l-0 border-2 border-gray/10 bg-gray/[8%] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 px-3.5">
                                                        <span>@rmdc.edu.pk</span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Password</h2>
                                                <input id="password" name="password" type="text"
                                                    class="form-input w-full" placeholder="Password" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Whatsapp</h2>
                                                <input id="whatsapp" name="whatsapp" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Whatsapp" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Address</h2>
                                                <input id="address" name="address" type="text" class="form-input w-full"
                                                    placeholder="Address">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Latest Degree</h2>
                                                <input id="latestdegree" name="latestdegree" type="text"
                                                    class="form-input w-full" placeholder="Latest Degree">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">University</h2>
                                                <input id="latestdegreeuniversity" name="latestdegreeuniversity"
                                                    type="text" class="form-input w-full" placeholder="university">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Year of passing</h2>
                                                <input id="latestdegreepassing" name="latestdegreepassing" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Year of passing">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Document</h2>
                                                <input id="latestdocument" name="latestdocument" type="file"
                                                    class="form-input w-full">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Degree Name</h2>
                                                <input id="degreename" name="degreename" type="text"
                                                    class="form-input w-full" placeholder="Degree Name">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">University</h2>
                                                <input id="degreeuniversity" name="degreeuniversity" type="text"
                                                    class="form-input w-full" placeholder="university">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Year of passing</h2>
                                                <input id="degreepassing" name="degreepassing" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Year of passing">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Document</h2>
                                                <input id="degreedocument" name="degreedocument" type="file"
                                                    class="form-input w-full">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Diploma Name</h2>
                                                <input id="diplomaname" name="diplomaname" type="text"
                                                    class="form-input w-full" placeholder="Diploma Name">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">University</h2>
                                                <input id="diplomauniversity" name="diplomauniversity" type="text"
                                                    class="form-input w-full" placeholder="university">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Year of passing</h2>
                                                <input id="diplomapassing" name="diplomapassing" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Year of passing">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Document</h2>
                                                <input id="diplomadocument" name="diplomadocument" type="file"
                                                    class="form-input w-full">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Pay Package</h2>
                                                <input id="paypackage" name="paypackage" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Pay Package" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Leave Allocated </h2>
                                                <input id="leaveallocated" name="leaveallocated" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Leave Allocated" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Leave Availed </h2>
                                                <input id="leaveavailed" name="leaveavailed" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Leave Availed" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Short Leave Availed </h2>
                                                <input id="shortleaveavailed" name="shortleaveavailed" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Short Leave Availed" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Pic</h2>
                                                <input id="adminuserpic" name="adminuserpic" type="file"
                                                    class="form-input w-full">
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="left-0 right-0 flex justify-end items-center gap-4 p-4 bg-white border-t border-gray/20 dark:bg-dark dark:border-gray/50">
                                        <button type="button"
                                            class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10"
                                            @click="toggle">Discard</button>
                                        <button type="submit"
                                            class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div x-data="modals">
                @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_add' && $permission->description == 'Can Add Usermanagement')
                            <div class="flex w-full gap-4" style="padding-top: 15px;">
                                <div class="flex flex-wrap items-center gap-5">

                                    Faculty User-><svg style="cursor: pointer;" @click="toggle" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                            stroke="#1C274C" stroke-width="1.5" />
                                        <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="#1C274C" stroke-width="1.5"
                                            stroke-linecap="round" />
                                    </svg>
                                </div>
                            </div>
                            @break
                        @endif
                    @endforeach
                @endforeach
                <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto"
                    :class="open && '!block'">
                    <div class="flex items-start justify-center min-h-screen " @click.self="open = false">
                        <div x-show="open" x-transition x-transition.duration.300
                            class="bg-white dark:bg-dark dark:border-gray/20  border-lightgray/10  overflow-hidden  w-full max-w-5xl">
                            <div
                                class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                <h5 class="font-semibold text-lg">Add Faculty User</h5>
                                <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path
                                            d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-5 space-y-4">
                                <form action="{{ route('createfaultyusers') }}" method="POST">
                                    @csrf
                                    <div class="text-lightgray text-sm font-normal">
                                        <div
                                            class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Role Assign</h2>
                                                <select id="rolename" name="rolename" class="form-select" required>
                                                    <option value="" disabled selected>Select Role</option>
                                                    @foreach($rolesData as $roles)
                                                        <option value="{{ $roles['id'] }}">
                                                            {{ $roles['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Name</h2>
                                                <input id="name" name="name" type="text" class="form-input w-full"
                                                    placeholder="Name">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Email</h2>
                                                <!-- <input id="email" name="email" type="email" class="form-input w-full"
                                                placeholder="Email" required> -->
                                                <label class="flex">
                                                    <input id="email" name="email" class="form-input rounded-r-none"
                                                        placeholder="Email" type="text">
                                                    <div
                                                        class="flex items-center justify-center rounded-r border-l-0 border-2 border-gray/10 bg-gray/[8%] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 px-3.5">
                                                        <span>@rmdc.edu.pk</span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Password</h2>
                                                <input id="password" name="password" type="text"
                                                    class="form-input w-full" placeholder="Password">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Department</h2>
                                                <input id="department" name="department" type="text"
                                                    class="form-input w-full" placeholder="Department">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Designation</h2>
                                                <input id="designation" name="designation" type="text"
                                                    class="form-input w-full" placeholder="Designation">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Whatsapp</h2>
                                                <input id="whatsapp" name="whatsapp" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Whatsapp">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Degree Name</h2>
                                                <input id="degreename" name="degreename" type="text"
                                                    class="form-input w-full" placeholder="Degree Name">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">University</h2>
                                                <input id="degreeuniversity" name="degreeuniversity" type="text"
                                                    class="form-input w-full" placeholder="university">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Year of passing</h2>
                                                <input id="degreepassing" name="degreepassing" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Year of passing">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Document</h2>
                                                <input id="degreedocument" name="degreedocument" type="file"
                                                    class="form-input w-full">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Degree Name</h2>
                                                <input id="degreename1" name="degreename1" type="text"
                                                    class="form-input w-full" placeholder="Degree Name">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">University</h2>
                                                <input id="degreeuniversity1" name="degreeuniversity1" type="text"
                                                    class="form-input w-full" placeholder="university">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Year of passing</h2>
                                                <input id="degreepassing1" name="degreepassing1" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Year of passing">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Document</h2>
                                                <input id="degreedocument1" name="degreedocument1" type="file"
                                                    class="form-input w-full">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Degree Name</h2>
                                                <input id="degreename2" name="degreename2" type="text"
                                                    class="form-input w-full" placeholder="Degree Name">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">University</h2>
                                                <input id="degreeuniversity2" name="degreeuniversity2" type="text"
                                                    class="form-input w-full" placeholder="university">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Year of passing</h2>
                                                <input id="degreepassing2" name="degreepassing2" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Year of passing">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Document</h2>
                                                <input id="degreedocument2" name="degreedocument2" type="file"
                                                    class="form-input w-full">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Diploma Name</h2>
                                                <input id="diplomaname" name="diplomaname" type="text"
                                                    class="form-input w-full" placeholder="Diploma Name">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">University</h2>
                                                <input id="diplomauniversity" name="diplomauniversity" type="text"
                                                    class="form-input w-full" placeholder="university">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Year of passing</h2>
                                                <input id="diplomapassing" name="diplomapassing" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Year of passing">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Document</h2>
                                                <input id="diplomadocument" name="diplomadocument" type="file"
                                                    class="form-input w-full">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Diploma Name</h2>
                                                <input id="diplomaname1" name="diplomaname1" type="text"
                                                    class="form-input w-full" placeholder="Diploma Name">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">University</h2>
                                                <input id="diplomauniversity1" name="diplomauniversity1" type="text"
                                                    class="form-input w-full" placeholder="university">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Year of passing</h2>
                                                <input id="diplomapassing1" name="diplomapassing1" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Year of passing">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Document</h2>
                                                <input id="diplomadocument1" name="diplomadocument1" type="file"
                                                    class="form-input w-full">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Diploma Name</h2>
                                                <input id="diplomaname2" name="diplomaname2" type="text"
                                                    class="form-input w-full" placeholder="Diploma Name">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">University</h2>
                                                <input id="diplomauniversity2" name="diplomauniversity2" type="text"
                                                    class="form-input w-full" placeholder="university">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Year of passing</h2>
                                                <input id="diplomapassing2" name="diplomapassing2" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Year of passing">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Document</h2>
                                                <input id="diplomadocument2" name="diplomadocument2" type="file"
                                                    class="form-input w-full">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Picture</h2>
                                                <input id="picture" name="picture" type="file"
                                                    class="form-input w-full">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Bank Account Number</h2>
                                                <input id="bankaccount" name="bankaccount" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Bank Account Number">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Eobi Account Number</h2>
                                                <input id="eobiaccount" name="eobiaccount" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Eobi Account Number">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Pay Package</h2>
                                                <input id="paypackage" name="paypackage" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Pay Package">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Registration Number</h2>
                                                <input id="registrationnumber" name="registrationnumber" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Registration Number">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Registration Authority</h2>
                                                <input id="registrationauthority" name="registrationauthority"
                                                    type="number" class="form-input w-full positive-only" min="0"
                                                    placeholder="Registration Authority">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">License Issue Date</h2>
                                                <input id="licenseissuedate" name="licenseissuedate" type="date"
                                                    class="form-input w-full">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">License Expiry Date</h2>
                                                <input id="licenseexpirydate" name="licenseexpirydate" type="date"
                                                    class="form-input w-full">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Date of birth</h2>
                                                <input id="dateofbirth" name="dateofbirth" type="date"
                                                    class="form-input w-full">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">CNIC/Passport Number</h2>
                                                <input id="cnic" name="cnic" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="CNIC/Passport Number">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Date of Joining</h2>
                                                <input id="dateofjoining" name="dateofjoining" type="date"
                                                    class="form-input w-full">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Tentative Date of Retirement
                                                </h2>
                                                <input id="tentativedate" name="tentativedate" type="date"
                                                    class="form-input w-full">
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class=" left-0 right-0 flex justify-end items-center gap-4 p-4 bg-white border-t border-gray/20 dark:bg-dark dark:border-gray/50">
                                        <button type="button"
                                            class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10"
                                            @click="toggle">Discard</button>
                                        <button type="submit"
                                            class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Data</h2>
            <div class="overflow-auto space-y-4" x-data="dataTable()" x-init="
            initData()
            $watch('searchInput', value => {
            search(value)
            })">
                <div class="flex justify-between items-center gap-3">
                    <div class="flex space-x-2 items-center">
                        <p>Show</p>
                        <select id="filter" class="form-select !w-20" x-model="view" @change="changeView()">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div>
                        <input id="search" x-model="searchInput" type="text" class="form-input" placeholder="Search...">
                    </div>
                </div>
                <div class="overflow-auto">
                    <table class="min-w-[640px] w-full">
                        <thead>
                            <th width="20%">
                                <div class="flex items-center justify-between gap-2">
                                    <p>Name</p>
                                    <div class="flex flex-col">
                                        <svg @click="sort('name', 'asc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('name', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>
                            <th width="20%">
                                <div class="flex items-center justify-between gap-2">
                                    <p>Email</p>
                                    <div class="flex flex-col">
                                        <svg @click="sort('name', 'asc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('name', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>
                            <th width="20%">
                                <div class="flex items-center justify-between gap-2">
                                    <p>Whatspp</p>
                                    <div class="flex flex-col">
                                        <svg @click="sort('name', 'asc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('name', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>
                            <th width="20%">
                                <div class="flex items-center justify-between gap-2">
                                    <p>Designation</p>
                                    <div class="flex flex-col">
                                        <svg @click="sort('name', 'asc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('name', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>
                            <th width="20%">
                                <div class="flex items-center justify-between gap-2">
                                    <p>Type</p>
                                    <div class="flex flex-col">
                                        <svg @click="sort('name', 'asc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('name', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>
                        </thead>
                        <tbody>
                            <template x-for="(item, index) in items" :key="index">
                                <tr x-show="checkView(index + 1)" class="">
                                    <td>
                                        <span x-text="item.name"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.email"></span>
                                    </td>
                                    <td>
                                        <!-- Display WhatsApp (either admin or faulty) -->
                                        <span
                                            x-text="item.admin_whatsapp ? item.admin_whatsapp : item.faulty_whatsapp"></span>
                                    </td>
                                    <td>
                                        <!-- Display designation (either admin or faulty) -->
                                        <span
                                            x-text="item.admin_designation ? item.admin_designation : item.faulty_designation"></span>
                                    </td>
                                    <td>
                                        <span
                                            x-text="item.type === 5 ? 'Admin User' : (item.type === 6 ? 'Faulty User' : '')"></span>
                                    </td>
                                </tr>
                            </template>
                            <tr x-show="isEmpty()">
                                <td colspan="5" class="text-center py-3 text-black">No matching records found.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="inline-flex items-center gap-1">
                    <li><button type="button" @click.prevent="changePage(1)"
                            class="flex justify-center px-2 h-9 items-center rounded transition border border-gray/20 hover:border-gray/60">First</button>
                    </li>
                    <li><button type="button" @click="changePage(currentPage - 1)"
                            class="flex justify-center px-2 h-9 items-center rounded transition border border-gray/20 hover:border-gray/60">Prev</button>
                    </li>
                    <template x-for="item in pages">
                        <li><button @click="changePage(item)" type="button"
                                class="flex justify-center h-9 w-9 items-center rounded transition border border-gray/20 hover:border-gray/60"
                                x-bind:class="{ 'border-primary text-primary': currentPage === item }"><span
                                    x-text="item"></span></button></li>
                    </template>
                    <li><button @click="changePage(currentPage + 1)" type="button"
                            class="flex justify-center px-2 h-9 items-center rounded transition border border-gray/20 hover:border-gray/60">Next</button>
                    </li>
                    <li><button @click.prevent="changePage(pagination.lastPage)" type="button"
                            class="flex justify-center px-2 h-9 items-center rounded transition border border-gray/20 hover:border-gray/60">Last</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    window.mergedData = @json($adminusersData);
    console.log(window.mergedData); // Debug to ensure data is being passed correctly
</script>
<!-- Datatables Js -->
<script src="{{ asset('public/assets/js/gernelsettingdata/datatableadminusers.js') }}"></script>
<script src="{{ asset('public/assets/js/data-search.js') }}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<script type="text/javascript">
    $(function () {
        // .subtract(1, 'days')
        var start = moment();
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

    });

    // $('body').on('click', '.ranges li', function () {
    //     console.log('adil');
    //     var date = $('#date-range-span').text();
    //     console.log(date);
    // });

    $('body').on('click', '.ranges li', function () {
        var date = $(this).text();
        if (date !== 'Custom Range') {
            console.log('adil');
            var dateString = $('#date-range-span').text();
            var dates = dateString.split(' - ');
            var startDate = dates[0];
            var endDate = dates[1];

            // Format dates as DD-MM-YYYY
            var startMonth = startDate.split(' ')[0];
            var startDay = startDate.split(' ')[1].replace(',', '');
            var startYear = startDate.split(', ')[1];

            var endMonth = endDate.split(' ')[0];
            var endDay = endDate.split(' ')[1].replace(',', '');
            var endYear = endDate.split(', ')[1];

            // Map month names to numbers
            var monthMap = {
                'January': '01',
                'February': '02',
                'March': '03',
                'April': '04',
                'May': '05',
                'June': '06',
                'July': '07',
                'August': '08',
                'September': '09',
                'October': '10',
                'November': '11',
                'December': '12'
            };

            var formattedStartDate = `${startDay}-${monthMap[startMonth]}-${startYear}`;
            var formattedEndDate = `${endDay}-${monthMap[endMonth]}-${endYear}`;

            console.log('Start Date:', formattedStartDate);
            console.log('End Date:', formattedEndDate);
        }
    });

    $('body').on('click', '.drp-buttons', function () {
        console.log('adil1');
        var dateString = $('#date-range-span').text();
        var dates = dateString.split(' - ');
        var startDate = dates[0];
        var endDate = dates[1];

        // Format dates as DD-MM-YYYY
        var startMonth = startDate.split(' ')[0];
        var startDay = startDate.split(' ')[1].replace(',', '');
        var startYear = startDate.split(', ')[1];

        var endMonth = endDate.split(' ')[0];
        var endDay = endDate.split(' ')[1].replace(',', '');
        var endYear = endDate.split(', ')[1];

        // Map month names to numbers
        var monthMap = {
            'January': '01',
            'February': '02',
            'March': '03',
            'April': '04',
            'May': '05',
            'June': '06',
            'July': '07',
            'August': '08',
            'September': '09',
            'October': '10',
            'November': '11',
            'December': '12'
        };

        var formattedStartDate = `${startDay}-${monthMap[startMonth]}-${startYear}`;
        var formattedEndDate = `${endDay}-${monthMap[endMonth]}-${endYear}`;

        console.log('Start Date:', formattedStartDate);
        console.log('End Date:', formattedEndDate);
    });


</script>

@endsection