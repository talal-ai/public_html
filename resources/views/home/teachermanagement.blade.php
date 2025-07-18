@extends('Layout.layout')

@section('content')


@section('content')
@if (session('success'))
    <div x-data="{ toastVisible: true, toastTimer: null }"
        x-init="toastTimer = setTimeout(() => toastVisible = false, 6000)">
        <div x-show="toastVisible"
            class="bg-success text-white py-3 px-4 rounded-md max-w-[240px] fixed top-5 right-5 z-[99999]"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <span>
                {{ session('success') }}
            </span>
        </div>
    </div>
@endif

@if (session('error'))

    <div x-data="{ toastVisible: true, toastTimer: null }"
        x-init="toastTimer = setTimeout(() => toastVisible = false, 6000)">
        <div x-show="toastVisible"
            class="bg-danger text-white py-3 px-4 rounded-md max-w-[240px] fixed top-5 right-5 z-[99999]"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <span>
                {{ session('error') }}
            </span>
        </div>
    </div>
@endif
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
                <li>Teacher's Management</li>
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
                <div class="p-1">
                    <h2 class="text-base font-semibold mb-4">Program</h2>
                    <form>
                        <select id="selectOption" class="form-select">
                            <option>Select Option</option>
                            @foreach($programsData as $program)
                                <option value="{{ $program['id'] }}">
                                    {{ $program['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="p-1">
                    <h2 class="text-base font-semibold mb-4">Year</h2>
                    <form>
                        <select id="selectOption" class="form-select">
                            <option>Select Option</option>
                            <option>1st Prof Demo</option>
                        </select>
                    </form>
                </div>
                <div class="p-1">
                    <h2 class="text-base font-semibold mb-4">Subject</h2>
                    <form>
                        <select id="selectOption" class="form-select">
                            <option>Select Option</option>
                            <option>Operating System</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
        <div class="flex flex-wrap gap-5 ">
            <div x-data="modals">
                <div class="flex flex-wrap items-center gap-5">
                    @foreach($user->permissionss as $role)
                        @foreach($role->permissions as $permission)
                            @if($permission->name == 'can_add' && $permission->description == 'Can Add Teacher')
                                Add New-><svg style="cursor: pointer;" @click="toggle" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5"
                                        d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                        stroke="#1C274C" stroke-width="1.5" />
                                    <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="#1C274C" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                                @break
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto"
                    :class="open && '!block'">
                    <div class="flex items-start justify-center min-h-screen " @click.self="open = false">
                        <div x-show="open" x-transition x-transition.duration.300
                            class="bg-white dark:bg-dark dark:border-gray/20  border-lightgray/10  overflow-hidden  w-full max-w-5xl">
                            <div
                                class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                <h5 class="font-semibold text-lg">Add Teacher</h5>
                                <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path
                                            d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-5 space-y-4">
                                <form action="{{ route('createteacher') }}" method="POST">
                                    @csrf
                                    <div class="text-lightgray text-sm font-normal">
                                        <div
                                            class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Roles</h2>
                                                <select id="rolename" name="rolename" class="form-select" required>
                                                    <option value="" disabled selected>Select Option</option>
                                                    @foreach($rolesData as $role)
                                                        <option value="{{ $role['id'] }}">
                                                            {{ $role['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Full Name</h2>
                                                <input id="fullnameteacher" name="fullnameteacher" type="text"
                                                    class="form-input w-full" placeholder="Full Name" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Email</h2>
                                                <input id="email" name="email" type="email" class="form-input w-full"
                                                    placeholder="Email" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Whatsapp Number</h2>
                                                <input id="whatsappnumber" name="whatsappnumber" type="number"
                                                    class="form-input w-full positive-only" min="0"
                                                    placeholder="Whatsapp Number" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Latest Qualification</h2>
                                                <input id="latestqualification" name="latestqualification" type="text"
                                                    class="form-input w-full" placeholder="Latest Qualification"
                                                    required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">PMDC Number</h2>
                                                <input id="pmdcnumber" name="pmdcnumber" type="text"
                                                    class="form-input w-full" placeholder="PMDC Number" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Employee ID</h2>
                                                <input id="employeeid" name="employeeid" type="text"
                                                    class="form-input w-full" placeholder="Employee ID" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Desination</h2>
                                                <!-- Button to toggle dropdown -->
                                                <button id="desinationdropdownSearchButton"
                                                    data-dropdown-toggle="desinationdropdownSearch"
                                                    class="w-full inline-flex items-center justify-between px-4 text-sm font-medium"
                                                    type="button" onclick="desinationtoggleDropdown()"
                                                    style="height: 48px; color: rgb(5 12 23 / var(--tw-text-opacity)); background-color: #F4F5F8; border-radius: 5px; border: 2px solid #E8EAF0;">
                                                    <span>Select Desination</span>
                                                    <!-- Added span for better alignment -->
                                                    <svg style="color: #6B7280;" class="w-2.5 h-2.5 ms-2.5"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 10 6">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4">
                                                        </path>
                                                    </svg>
                                                </button>

                                                <!-- Dropdown menu -->
                                                <div id="desinationdropdownSearch"
                                                    class="absolute z-10 bg-white rounded-lg shadow w-60 dark:bg-gray-700 hidden">
                                                    <div class="p-3">
                                                        <label for="desination-input-group-search"
                                                            class="sr-only">Search</label>
                                                        <div class="relative">
                                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                                                                style="margin-left: 10px;">
                                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <input type="text" id="desination-input-group-search"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Search user"
                                                                onkeyup="desinationfilterList()">
                                                        </div>
                                                    </div>
                                                    <ul id="desination"
                                                        class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                                        aria-labelledby="desinationdropdownSearchButton-edit">
                                                        <li>
                                                            <div
                                                                class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                <input type="checkbox" id="checkbox-item-12" value="12"
                                                                    name="desination[]"
                                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"><label
                                                                    for="checkbox-item-12"
                                                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">HOD</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div
                                                                class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                <input type="checkbox" id="checkbox-item-14" value="14"
                                                                    name="desination[]"
                                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"><label
                                                                    for="checkbox-item-14"
                                                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Professor</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div
                                                                class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                <input type="checkbox" id="checkbox-item-15" value="15"
                                                                    name="desination[]"
                                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"><label
                                                                    for="checkbox-item-15"
                                                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Associate
                                                                    Professor</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div
                                                                class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                <input type="checkbox" id="checkbox-item-16" value="16"
                                                                    name="desination[]"
                                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"><label
                                                                    for="checkbox-item-16"
                                                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Assistant
                                                                    Professor</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div
                                                                class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                <input type="checkbox" id="checkbox-item-17" value="17"
                                                                    name="desination[]"
                                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"><label
                                                                    for="checkbox-item-17"
                                                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Demonstrator</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Program</h2>
                                                <select id="program" name="program" class="form-select" required>
                                                    <option value="" disabled selected>Select Option</option>
                                                    @foreach($programsData as $program)
                                                        <option value="{{ $program['id'] }}">
                                                            {{ $program['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Year</h2>
                                                <!-- Button to toggle dropdown -->
                                                <button id="yeardropdownSearchButton"
                                                    data-dropdown-toggle="yeardropdownSearch"
                                                    class="w-full inline-flex items-center justify-between px-4 text-sm font-medium"
                                                    type="button" onclick="yeartoggleDropdown()"
                                                    style="height: 48px; color: rgb(5 12 23 / var(--tw-text-opacity)); background-color: #F4F5F8; border-radius: 5px; border: 2px solid #E8EAF0;">
                                                    <span>Select Year</span> <!-- Added span for better alignment -->
                                                    <svg style="color: #6B7280;" class="w-2.5 h-2.5 ms-2.5"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 10 6">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                    </svg>
                                                </button>

                                                <!-- Dropdown menu -->
                                                <div id="yeardropdownSearch"
                                                    class="absolute z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                                                    <div class="p-3">
                                                        <label for="year-input-group-search"
                                                            class="sr-only">Search</label>
                                                        <div class="relative">
                                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                                                                style="margin-left: 10px;">
                                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                                </svg>
                                                            </div>
                                                            <input type="text" id="year-input-group-search"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Search user" onkeyup="yearfilterList()">
                                                        </div>
                                                    </div>
                                                    <ul id="yearcheckboxList"
                                                        class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                                        aria-labelledby="yeardropdownSearchButton">
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Subject</h2>
                                                <!-- Button to toggle dropdown -->
                                                <button id="subjectdropdownSearchButton"
                                                    data-dropdown-toggle="subjectdropdownSearch"
                                                    class="w-full inline-flex items-center justify-between px-4 text-sm font-medium"
                                                    type="button" onclick="subjecttoggleDropdown()"
                                                    style="height: 48px; color: rgb(5 12 23 / var(--tw-text-opacity)); background-color: #F4F5F8; border-radius: 5px; border: 2px solid #E8EAF0;">
                                                    <span>Select Subject</span> <!-- Added span for better alignment -->
                                                    <svg style="color: #6B7280;" class="w-2.5 h-2.5 ms-2.5"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 10 6">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                    </svg>
                                                </button>

                                                <!-- Dropdown menu -->
                                                <div id="subjectdropdownSearch"
                                                    class="absolute z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                                                    <div class="p-3">
                                                        <label for="subject-input-group-search"
                                                            class="sr-only">Search</label>
                                                        <div class="relative">
                                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                                                                style="margin-left: 10px;">
                                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 20 20">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                                </svg>
                                                            </div>
                                                            <input type="text" id="subject-input-group-search"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Search user" onkeyup="subjectfilterList()">
                                                        </div>
                                                    </div>
                                                    <ul id="subjectcheckboxList"
                                                        class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                                        aria-labelledby="subjectdropdownSearchButton">
                                                        @foreach($subjectsData as $subjects)
                                                            <li>
                                                                <div
                                                                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                    <input id="checkbox-item-1" type="checkbox"
                                                                        name="subject[]" value="{{ $subjects['id'] }}"
                                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                                    <label for="checkbox-item-1"
                                                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">
                                                                        {{ $subjects['name'] }}
                                                                    </label>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Password</h2>
                                                <input id="password" name="password" type="text"
                                                    class="form-input w-full" placeholder="password" required>
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
            Excel-><a href="{{ route('exportSurveyStats_faulty') }}" class="inline-block">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    style="margin-right:10px;">
                    <path opacity="0.5"
                        d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12"
                        stroke="#1C274C" stroke-width="1.5" />
                    <path
                        d="M2 14C2 11.1997 2 9.79961 2.54497 8.73005C3.02433 7.78924 3.78924 7.02433 4.73005 6.54497C5.79961 6 7.19974 6 10 6H14C16.8003 6 18.2004 6 19.27 6.54497C20.2108 7.02433 20.9757 7.78924 21.455 8.73005C22 9.79961 22 11.1997 22 14C22 16.8003 22 18.2004 21.455 19.27C20.9757 20.2108 20.2108 20.9757 19.27 21.455C18.2004 22 16.8003 22 14 22H10C7.19974 22 5.79961 22 4.73005 21.455C3.78924 20.9757 3.02433 20.2108 2.54497 19.27C2 18.2004 2 16.8003 2 14Z"
                        stroke="#1C274C" stroke-width="1.5" />
                    <path d="M12 11L12 17M12 17L14.5 14.5M12 17L9.5 14.5" stroke="#1C274C" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            Pdf-><a href="{{ route('exportSurveyStatsFaultyToPDF') }}" class="inline-block">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    style="margin-right:10px;">
                    <path opacity="0.5"
                        d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12"
                        stroke="#1C274C" stroke-width="1.5" />
                    <path
                        d="M2 14C2 11.1997 2 9.79961 2.54497 8.73005C3.02433 7.78924 3.78924 7.02433 4.73005 6.54497C5.79961 6 7.19974 6 10 6H14C16.8003 6 18.2004 6 19.27 6.54497C20.2108 7.02433 20.9757 7.78924 21.455 8.73005C22 9.79961 22 11.1997 22 14C22 16.8003 22 18.2004 21.455 19.27C20.9757 20.2108 20.2108 20.9757 19.27 21.455C18.2004 22 16.8003 22 14 22H10C7.19974 22 5.79961 22 4.73005 21.455C3.78924 20.9757 3.02433 20.2108 2.54497 19.27C2 18.2004 2 16.8003 2 14Z"
                        stroke="#1C274C" stroke-width="1.5" />
                    <path d="M12 11L12 17M12 17L14.5 14.5M12 17L9.5 14.5" stroke="#1C274C" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
            Import-><a href="{{ route('exportSurveyStatsFaultyToPDF') }}" class="inline-block">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 17L12 10M12 10L15 13M12 10L9 13" stroke="#1C274C" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M16 7H12H8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                    <path opacity="0.5"
                        d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                        stroke="#1C274C" stroke-width="1.5" />
                </svg>

            </a>
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
                                    <p>Whatsappnumber</p>
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
                                    <p class="">Latest Qualification</p>
                                    <div class="flex flex-col">
                                        <svg @click="sort('job', 'asc')" fill="none" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'job' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('job', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'job' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>
                            <th width="10%">
                                <div class="flex items-center justify-between gap-2">
                                    <span>
                                        PMDC Number
                                    </span>
                                    <div class="flex flex-col">
                                        <svg @click="sort('year', 'asc')" fill="none" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'year' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('year', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'year' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>
                            <th width="15%">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="">
                                        Employee ID
                                    </span>
                                    <div class="flex flex-col">
                                        <svg @click="sort('country', 'asc')" fill="none" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                            viewBox="0 0 24 24" stroke="currentColor"
                                            class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'country' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('country', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'country' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>
                            <th width="15%">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="">
                                        Program
                                    </span>
                                    <div class="flex flex-col">
                                        <svg @click="sort('country', 'asc')" fill="none" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                            viewBox="0 0 24 24" stroke="currentColor"
                                            class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'country' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('country', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'country' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>
                            <th width="15%">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="">
                                        Year
                                    </span>
                                    <div class="flex flex-col">
                                        <svg @click="sort('country', 'asc')" fill="none" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                            viewBox="0 0 24 24" stroke="currentColor"
                                            class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'country' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('country', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'country' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>
                            <th width="15%">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="">
                                        Subject
                                    </span>
                                    <div class="flex flex-col">
                                        <svg @click="sort('country', 'asc')" fill="none" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                            viewBox="0 0 24 24" stroke="currentColor"
                                            class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'country' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('country', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'country' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>
                            <th width="15%">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="">
                                        Action
                                    </span>
                                    <div class="flex flex-col">
                                        <svg @click="sort('country', 'asc')" fill="none" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                            viewBox="0 0 24 24" stroke="currentColor"
                                            class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'country' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('country', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'country' && sorted.rule === 'desc'}">
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
                                        <span x-text="item.whatsappnumber"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.latestqualification"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.pmdcnumber"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.employeeid"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.program"></span>
                                    </td>
                                    <td>
                                        <div class="flex justify-center">
                                            <div x-data="{ dropdown: false}" class="dropdown mx-auto">
                                                <!-- Trigger for the Dropdown -->
                                                <a href="javascript:;"
                                                    class="text-lightgray hover:bg-primary/10 bg-gray/10 h-10 w-10 rounded items-center flex justify-center hover:text-primary"
                                                    @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                                    <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                                                        <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                                                        <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                                                    </svg>
                                                </a>

                                                <!-- Dropdown Menu -->
                                                <ul x-show="dropdown" @click.away="dropdown = false" x-transition=""
                                                    x-transition.duration.300ms=""
                                                    class="absolute right-0 whitespace-nowrap bg-white shadow-md rounded py-2 z-10"
                                                    style="display: none;">

                                                    <!-- Iterate over item.year array -->
                                                    <template x-for="year in item.year">
                                                        <li>
                                                            <a href="javascript:;"
                                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                                <span x-text="year"></span>
                                                            </a>
                                                        </li>
                                                    </template>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex justify-center">
                                            <div x-data="{ dropdown: false}" class="dropdown mx-auto">
                                                <!-- Trigger for the Dropdown -->
                                                <a href="javascript:;"
                                                    class="text-lightgray hover:bg-primary/10 bg-gray/10 h-10 w-10 rounded items-center flex justify-center hover:text-primary"
                                                    @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                                    <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                                                        <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                                                        <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                                                    </svg>
                                                </a>

                                                <!-- Dropdown Menu -->
                                                <ul x-show="dropdown" @click.away="dropdown = false" x-transition=""
                                                    x-transition.duration.300ms=""
                                                    class="absolute right-0 whitespace-nowrap bg-white shadow-md rounded py-2 z-10"
                                                    style="display: none;">

                                                    <!-- Iterate over item.year array -->
                                                    <template x-for="subject in item.subject">
                                                        <li>
                                                            <a href="javascript:;"
                                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                                <span x-text="subject"></span>
                                                            </a>
                                                        </li>
                                                    </template>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mt-3 flex gap-8 items-center justify-center">

                                            <svg style="cursor: pointer;" @click="open = true" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="edit-teacher-icon" :data-teacher-id="item.id">
                                                <path opacity="0.5" d="M4 22H20" stroke="#1C274C" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                                <path
                                                    d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z"
                                                    stroke="#1C274C" stroke-width="1.5" />
                                                <path opacity="0.5"
                                                    d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428"
                                                    stroke="#1C274C" stroke-width="1.5" />
                                            </svg>

                                            <svg style="cursor: pointer;" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5"
                                                    d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4"
                                                    stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M20.5001 6H3.5" stroke="#1C274C" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                                <path
                                                    d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                    stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                                <path opacity="0.5" d="M9.5 11L10 16" stroke="#1C274C"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path opacity="0.5" d="M14.5 11L14 16" stroke="#1C274C"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                            </svg>


                                        </div>
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
<style>
    .space-y-5> :not([hidden])~ :not([hidden]) {
        margin-top: 0 !important;
        /* Override margin-top */
    }
</style>
<!-- The overlay element -->
<div id="overlay"></div>
<div class="main clearfix lds-ring">
    <div class="loading"></div>
</div>
<div id="teacherEditModal"
    class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto">
    <div class="flex items-start justify-center min-h-screen" id="modalContent">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-lightgray/10 overflow-hidden w-full max-w-5xl">
            <div
                class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                <h5 class="font-semibold text-lg">Edit Teacher</h5>
                <button type="button" class="text-lightgray hover:text-primary" id="closeModal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                        <path
                            d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"
                            fill="currentColor"></path>
                    </svg>
                </button>
            </div>
            <div class="p-5 space-y-4">
                <form id="teacherEditForm" action="{{ route('updateteacher') }}" method="POST">
                    @csrf
                    <div class="text-lightgray text-sm font-normal">
                        <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Roles</h2>
                                <select id="rolename-edit" name="rolename-edit" class="form-select" required>
                                    <option value="" disabled selected>Select Option</option>
                                    @foreach($rolesData as $role)
                                        <option value="{{ $role['id'] }}">
                                            {{ $role['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Full Name</h2>
                                <input id="teacherID-edit" name="teacherID-edit" type="hidden"
                                    class="form-input w-full">
                                <input id="fullnameteacher-edit" name="fullnameteacher-edit" type="text"
                                    class="form-input w-full" placeholder="Full Name" required>
                            </div>
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Email</h2>
                                <input id="email-edit" name="email-edit" type="email" class="form-input w-full"
                                    placeholder="Email" required>
                            </div>
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Whatsapp Number</h2>
                                <input id="whatsappnumber-edit" name="whatsappnumber-edit" type="number"
                                    class="form-input w-full positive-only" min="0" placeholder="Whatsapp Number"
                                    required>
                            </div>
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Latest Qualification</h2>
                                <input id="latestqualification-edit" name="latestqualification-edit" type="text"
                                    class="form-input w-full" placeholder="Latest Qualification" required>
                            </div>
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">PMDC Number</h2>
                                <input id="pmdcnumber-edit" name="pmdcnumber-edit" type="text" class="form-input w-full"
                                    placeholder="PMDC Number" required>
                            </div>
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Employee ID</h2>
                                <input id="employeeid-edit" name="employeeid-edit" type="text" class="form-input w-full"
                                    placeholder="Employee ID" required>
                            </div>
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Desination</h2>
                                <!-- Button to toggle dropdown -->
                                <button id="desinationdropdownSearchButton-edit"
                                    data-dropdown-toggle="desinationdropdownSearch-edit"
                                    class="w-full inline-flex items-center justify-between px-4 text-sm font-medium"
                                    type="button" onclick="desinationtoggleDropdown_edit()"
                                    style="height: 48px; color: rgb(5 12 23 / var(--tw-text-opacity)); background-color: #F4F5F8; border-radius: 5px; border: 2px solid #E8EAF0;">
                                    <span>Select Desination</span> <!-- Added span for better alignment -->
                                    <svg style="color: #6B7280;" class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4"></path>
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="desinationdropdownSearch-edit"
                                    class="absolute z-10 bg-white rounded-lg shadow w-60 dark:bg-gray-700 hidden">
                                    <div class="p-3">
                                        <label for="desination-input-group-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                                                style="margin-left: 10px;">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"></path>
                                                </svg>
                                            </div>
                                            <input type="text" id="desination-input-group-search-edit"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Search user" onkeyup="desinationfilterList_edit()">
                                        </div>
                                    </div>
                                    <ul id="desination-edit"
                                        class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="desinationdropdownSearchButton-edit">
                                        <li>
                                            <div
                                                class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input type="checkbox" id="checkbox-item-1" value="1"
                                                    name="desination-edit[]"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"><label
                                                    for="checkbox-item-12"
                                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">HOD</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div
                                                class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input type="checkbox" id="checkbox-item-2" value="2"
                                                    name="desination-edit[]"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"><label
                                                    for="checkbox-item-14"
                                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Professor</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div
                                                class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input type="checkbox" id="checkbox-item-3" value="3"
                                                    name="desination-edit[]"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"><label
                                                    for="checkbox-item-15"
                                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Associate
                                                    Professor</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div
                                                class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input type="checkbox" id="checkbox-item-4" value="4"
                                                    name="desination-edit[]"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"><label
                                                    for="checkbox-item-16"
                                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Assistant
                                                    Professor</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div
                                                class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <input type="checkbox" id="checkbox-item-5" value="5"
                                                    name="desination-edit[]"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"><label
                                                    for="checkbox-item-17"
                                                    class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Demonstrator</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Program</h2>
                                <select id="program-edit" name="program-edit" class="form-select" data-userid=""
                                    required>
                                    <option value="" disabled selected>Select Option</option>
                                    @foreach($programsData as $program)
                                        <option value="{{ $program['id'] }}">
                                            {{ $program['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Year</h2>
                                <!-- Button to toggle dropdown -->
                                <button id="yeardropdownSearchButton-edit"
                                    data-dropdown-toggle="yeardropdownSearch-edit"
                                    class="w-full inline-flex items-center justify-between px-4 text-sm font-medium"
                                    type="button" onclick="yeartoggleDropdown_edit()"
                                    style="height: 48px; color: rgb(5 12 23 / var(--tw-text-opacity)); background-color: #F4F5F8; border-radius: 5px; border: 2px solid #E8EAF0;">
                                    <span>Select Year</span> <!-- Added span for better alignment -->
                                    <svg style="color: #6B7280;" class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="yeardropdownSearch-edit"
                                    class="absolute z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                                    <div class="p-3">
                                        <label for="year-input-group-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                                                style="margin-left: 10px;">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                </svg>
                                            </div>
                                            <input type="text" id="year-input-group-search-edit"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Search user" onkeyup="yearfilterList_edit()">
                                        </div>
                                    </div>
                                    <ul id="yearcheckboxList-edit"
                                        class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="yeardropdownSearchButton-edit">
                                    </ul>
                                </div>
                            </div>
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Subject</h2>
                                <!-- Button to toggle dropdown -->
                                <button id="subjectdropdownSearchButton-edit"
                                    data-dropdown-toggle="subjectdropdownSearch-edit"
                                    class="w-full inline-flex items-center justify-between px-4 text-sm font-medium"
                                    type="button" onclick="subjecttoggleDropdown_edit()"
                                    style="height: 48px; color: rgb(5 12 23 / var(--tw-text-opacity)); background-color: #F4F5F8; border-radius: 5px; border: 2px solid #E8EAF0;">
                                    <span>Select Subject</span> <!-- Added span for better alignment -->
                                    <svg style="color: #6B7280;" class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="subjectdropdownSearch-edit"
                                    class="absolute z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                                    <div class="p-3">
                                        <label for="subject-input-group-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                                                style="margin-left: 10px;">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                </svg>
                                            </div>
                                            <input type="text" id="subject-input-group-search-edit"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Search user" onkeyup="subjectfilterList_edit()">
                                        </div>
                                    </div>
                                    <ul id="subjectcheckboxList-edit"
                                        class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="subjectdropdownSearchButton-edit">
                                        @foreach($subjectsData as $subjects)
                                            <li>
                                                <div
                                                    class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input id="checkbox-item-1" type="checkbox" name="subject[]"
                                                        value="{{ $subjects['id'] }}"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="checkbox-item-1"
                                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">
                                                        {{ $subjects['name'] }}
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Password</h2>
                                <input id="password-edit" name="password-edit" type="text" class="form-input w-full"
                                    placeholder="password">
                            </div>
                        </div>
                    </div>
                    <div
                        class="left-0 right-0 flex justify-end items-center gap-4 p-4 bg-white border-t border-gray/20 dark:bg-dark dark:border-gray/50">
                        <button type="button" id="closeModalButton"
                            class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10"
                            @click="toggle">Discard</button>
                        <button type="submit"
                            class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Pass the teachers data to JavaScript -->
<script>
    window.mergedData = @json($userWithTeacherData);
    console.log(window.mergedData); // Debug to ensure data is being passed correctly
</script>

<!-- Datatables Js -->
<script src="{{ asset('public/assets/js/gernelsettingdata/datatableteacher.js') }}"></script>
<script src="{{ asset('public/assets/js/data-search.js') }}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    // Function to toggle dropdown visibility
    function yeartoggleDropdown() {
        document.getElementById("yeardropdownSearch").classList.toggle('hidden');
    }

    // Function to filter the checkbox list based on search input
    function yearfilterList() {
        const input = document.getElementById("year-input-group-search").value.toLowerCase();
        const checkboxes = document.querySelectorAll("#yearcheckboxList li");

        checkboxes.forEach(li => {
            const label = li.textContent.toLowerCase();
            if (label.includes(input)) {
                li.style.display = "";
            } else {
                li.style.display = "none";
            }
        });
    }

    // Close dropdown when clicking outside
    window.onclick = function (event) {
        const dropdown = document.getElementById("yeardropdownSearch");
        if (!event.target.matches('#yeardropdownSearchButton') && !event.target.matches('#year-input-group-search') && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    };

    document.getElementById('program').addEventListener('change', function () {
        var programId = this.value;
        var baseUrl = '{{ env("APP_URL") }}/Studentsetting'; // Get the base URL dynamically
        console.log(programId);
        if (programId) {
            fetch(`${baseUrl}/get-years/${programId}`)
                .then(response => response.json())
                .then(data => {
                    var yearCheckboxList = document.getElementById('yearcheckboxList');
                    yearCheckboxList.innerHTML = ''; // Clear the current checkbox list

                    // Loop through the years and add them as checkboxes in the list
                    data.years.forEach(function (year) {
                        var li = document.createElement('li');

                        // Create the div container for the checkbox
                        var div = document.createElement('div');
                        div.className = 'flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600';

                        // Create the checkbox input element
                        var checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.id = `checkbox-item-${year.id}`;
                        checkbox.value = year.id;
                        checkbox.name = 'years[]';
                        checkbox.className = 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500';

                        // Create the label element
                        var label = document.createElement('label');
                        label.setAttribute('for', `checkbox-item-${year.id}`);
                        label.className = 'w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300';
                        label.textContent = year.name;

                        // Append the checkbox and label to the div
                        div.appendChild(checkbox);
                        div.appendChild(label);

                        // Append the div to the li
                        li.appendChild(div);

                        // Append the li to the ul
                        yearCheckboxList.appendChild(li);
                    });
                });
        } else {
            // Clear the year checkbox list if no program is selected
            document.getElementById('yearcheckboxList').innerHTML = '';
        }
    });





    //Edit Forma
    // Function to toggle dropdown visibility
    function desinationtoggleDropdown() {
        document.getElementById("desinationdropdownSearch").classList.toggle('hidden');
    }

    // Function to filter the checkbox list based on search input
    function desinationfilterList() {
        const input = document.getElementById("desination-input-group-search").value.toLowerCase();
        const checkboxes = document.querySelectorAll("#desinationcheckboxList li");

        checkboxes.forEach(li => {
            const label = li.textContent.toLowerCase();
            if (label.includes(input)) {
                li.style.display = "";
            } else {
                li.style.display = "none";
            }
        });
    }

    // Close dropdown when clicking outside
    window.onclick = function (event) {
        const dropdown = document.getElementById("desinationdropdownSearch");
        if (!event.target.matches('#desinationdropdownSearchButton') && !event.target.matches('#desination-input-group-search') && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    };




    //Edit Forma
    // Function to toggle dropdown visibility
    function desinationtoggleDropdown_edit() {
        document.getElementById("desinationdropdownSearch-edit").classList.toggle('hidden');
    }

    // Function to filter the checkbox list based on search input
    function desinationfilterList_edit() {
        const input = document.getElementById("desination-input-group-search-edit").value.toLowerCase();
        const checkboxes = document.querySelectorAll("#desinationcheckboxList-edit li");

        checkboxes.forEach(li => {
            const label = li.textContent.toLowerCase();
            if (label.includes(input)) {
                li.style.display = "";
            } else {
                li.style.display = "none";
            }
        });
    }

    // Close dropdown when clicking outside
    window.onclick = function (event) {
        const dropdown = document.getElementById("desinationdropdownSearch-edit");
        if (!event.target.matches('#desinationdropdownSearchButton-edit') && !event.target.matches('#desination-input-group-search-edit') && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    };




    //Edit Forma
    // Function to toggle dropdown visibility
    function yeartoggleDropdown_edit() {
        document.getElementById("yeardropdownSearch-edit").classList.toggle('hidden');
    }

    // Function to filter the checkbox list based on search input
    function yearfilterList_edit() {
        const input = document.getElementById("year-input-group-search-edit").value.toLowerCase();
        const checkboxes = document.querySelectorAll("#yearcheckboxList-edit li");

        checkboxes.forEach(li => {
            const label = li.textContent.toLowerCase();
            if (label.includes(input)) {
                li.style.display = "";
            } else {
                li.style.display = "none";
            }
        });
    }

    // Close dropdown when clicking outside
    window.onclick = function (event) {
        const dropdown = document.getElementById("yeardropdownSearch-edit");
        if (!event.target.matches('#yeardropdownSearchButton-edit') && !event.target.matches('#year-input-group-search-edit') && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    };

    document.getElementById('program-edit').addEventListener('change', function () {
        var programId = this.value;
        // Assuming you have an element with the attribute data-userid
        var teacherIdElement = document.querySelector('[data-userid]');
        var teacherId = teacherIdElement ? teacherIdElement.getAttribute('data-userid') : null;
        console.log(teacherId);
        var baseUrl = '{{ env("APP_URL") }}/Studentsetting'; // Get the base URL dynamically
        console.log(programId);

        if (programId) {
            // Fetch the years related to the selected program
            fetch(`${baseUrl}/get-years/${programId}`)
                .then(response => response.json())
                .then(data => {
                    var yearCheckboxList = document.getElementById('yearcheckboxList-edit');
                    yearCheckboxList.innerHTML = ''; // Clear the current checkbox list

                    // Fetch the already assigned years for the teacher
                    fetch(`${baseUrl}/get-assigned-years/${teacherId}`)
                        .then(response => response.json())
                        .then(assignedData => {
                            console.log(assignedData.yearassignedid);
                            var assignedYears = assignedData.yearassignedid; // Get the array of assigned year IDs

                            // Loop through the years and add them as checkboxes in the list
                            data.years.forEach(function (year) {
                                var li = document.createElement('li');

                                // Create the div container for the checkbox
                                var div = document.createElement('div');
                                div.className = 'flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600';

                                // Create the checkbox input element
                                var checkbox = document.createElement('input');
                                checkbox.type = 'checkbox';
                                checkbox.id = `checkbox-item-${year.id}`;
                                checkbox.value = year.id;
                                checkbox.name = 'years-edit[]';
                                checkbox.className = 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500';

                                // Check if this year is already assigned to the teacher
                                if (assignedYears.includes(year.id)) {
                                    checkbox.checked = true; // Set the checkbox as checked if it's assigned
                                }

                                // Create the label element
                                var label = document.createElement('label');
                                label.setAttribute('for', `checkbox-item-${year.id}`);
                                label.className = 'w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300';
                                label.textContent = year.name;

                                // Append the checkbox and label to the div
                                div.appendChild(checkbox);
                                div.appendChild(label);

                                // Append the div to the li
                                li.appendChild(div);

                                // Append the li to the ul
                                yearCheckboxList.appendChild(li);
                            });
                        });
                });
        } else {
            // Clear the year checkbox list if no program is selected
            document.getElementById('yearcheckboxList-edit').innerHTML = '';
        }
    });

    //end edit form








    // Function to toggle dropdown visibility
    function subjecttoggleDropdown() {
        document.getElementById("subjectdropdownSearch").classList.toggle('hidden');
    }

    // Function to filter the checkbox list based on search input
    function subjectfilterList() {
        const input = document.getElementById("subject-input-group-search").value.toLowerCase();
        const checkboxes = document.querySelectorAll("#subjectcheckboxList li");

        checkboxes.forEach(li => {
            const label = li.textContent.toLowerCase();
            if (label.includes(input)) {
                li.style.display = "";
            } else {
                li.style.display = "none";
            }
        });
    }

    // Close dropdown when clicking outside
    window.onclick = function (event) {
        const dropdown = document.getElementById("subjectdropdownSearch");
        if (!event.target.matches('#subjectdropdownSearchButton') && !event.target.matches('#subject-input-group-search') && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    };



    //edit subject Form 

    // Function to toggle dropdown visibility
    function subjecttoggleDropdown_edit() {
        document.getElementById("subjectdropdownSearch-edit").classList.toggle('hidden');
    }

    // Function to filter the checkbox list based on search input
    function subjectfilterList_edit() {
        const input = document.getElementById("subject-input-group-search-edit").value.toLowerCase();
        const checkboxes = document.querySelectorAll("#subjectcheckboxList-edit li");

        checkboxes.forEach(li => {
            const label = li.textContent.toLowerCase();
            if (label.includes(input)) {
                li.style.display = "";
            } else {
                li.style.display = "none";
            }
        });
    }

    // Close dropdown when clicking outside
    window.onclick = function (event) {
        const dropdown = document.getElementById("subjectdropdownSearch-edit");
        if (!event.target.matches('#subjectdropdownSearchButton-edit') && !event.target.matches('#subject-input-group-search-edit') && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    };


    //end of edit subject 
</script>
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








    $(document).ready(function () {

        function populateModal(data, teacherId) {
            var baseUrl = '{{ env("APP_URL") }}/Studentsetting'; // Get the base URL dynamically
            // Example: Populate other fields if needed
            $('#fullnameteacher-edit').val(data.name);
            $('#teacherID-edit').val(data.id);
            $('#email-edit').val(data.email);
            $('#whatsappnumber-edit').val(data.whatsappnumber);
            $('#latestqualification-edit').val(data.latestqualification);
            $('#pmdcnumber-edit').val(data.pmdcnumber);
            $('#employeeid-edit').val(data.employeeid);
            $('#program-edit').val(data.program);
            $('#program-edit').attr('data-userid', data.id);
            // Set the correct role in the select box
            let roleId = data.userroles.role_id;  // Get the role_id from the response
            $('#rolename-edit').val(roleId);
            // Handle checkbox selection for subjects
            let selectedSubjects = data.subjects; // This is the array [1, 2] from the response

            // Loop through each checkbox in the subject list and check if the value is in the selectedSubjects array
            $('#subjectcheckboxList-edit input[type="checkbox"]').each(function () {
                var subjectId = parseInt($(this).val()); // Get the value of the checkbox as an integer

                if (selectedSubjects.includes(subjectId)) {
                    $(this).prop('checked', true); // Check the checkbox if the subjectId is in the response
                }
            });

            // Teacher desinations array
            var teacherdesinations = data.teacherdesinations; // Example: [1, 2, 3]

            // Iterate through all checkboxes in the dropdown
            document.querySelectorAll("#desination-edit input[type='checkbox']").forEach(function (checkbox) {
                // If the checkbox value exists in teacherdesinations array, check it
                if (teacherdesinations.includes(parseInt(checkbox.value))) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false; // Uncheck if not in the array
                }
            });

            // Fetch years related to the selected program
            var programId = data.program; // Get the program ID from the data
            if (programId) {
                fetch(`${baseUrl}/get-years/${programId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('second program year data', data);
                        var yearCheckboxList = document.getElementById('yearcheckboxList-edit');
                        yearCheckboxList.innerHTML = ''; // Clear the current checkbox list

                        // Fetch the already assigned years for the teacher
                        fetch(`${baseUrl}/get-assigned-years/${teacherId}`)
                            .then(response => response.json())
                            .then(assignedData => {
                                console.log('assigned years on load', assignedData.yearassignedid);
                                var assignedYears = assignedData.yearassignedid; // Get the array of assigned year IDs

                                // Loop through the years and add them as checkboxes in the list
                                data.years.forEach(function (year) {
                                    var li = document.createElement('li');

                                    // Create the div container for the checkbox
                                    var div = document.createElement('div');
                                    div.className = 'flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600';

                                    // Create the checkbox input element
                                    var checkbox = document.createElement('input');
                                    checkbox.type = 'checkbox';
                                    checkbox.id = `checkbox-item-${year.id}`;
                                    checkbox.value = year.id;
                                    checkbox.name = 'years-edit[]';
                                    checkbox.className = 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500';

                                    // Check if this year is already assigned to the teacher
                                    if (assignedYears.includes(year.id)) {
                                        checkbox.checked = true; // Set the checkbox as checked if it's assigned
                                    }

                                    // Create the label element
                                    var label = document.createElement('label');
                                    label.setAttribute('for', `checkbox-item-${year.id}`);
                                    label.className = 'w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300';
                                    label.textContent = year.name;

                                    // Append the checkbox and label to the div
                                    div.appendChild(checkbox);
                                    div.appendChild(label);

                                    // Append the div to the li
                                    li.appendChild(div);

                                    // Append the li to the ul
                                    yearCheckboxList.appendChild(li);
                                });
                            });
                    });
            } else {
                // Clear the year checkbox list if no program is selected
                document.getElementById('yearcheckboxList-edit').innerHTML = '';
            }
        }

        // Function to handle SVG click and open modal
        $('.edit-teacher-icon').on('click', function () {
            var teacherId = $(this).data('teacher-id');
            console.log(teacherId);
            var baseUrl = '{{ env("APP_URL") }}/gernelsetting'; // Get the base URL dynamically
            $("#overlay").show();
            $(".lds-ring").show();
            // Fetch the years related to the selected program
            fetch(`${baseUrl}/get-teacher-data/${teacherId}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    populateModal(data, teacherId);
                    setTimeout(function () {
                        $('#teacherEditModal').removeClass('hidden');
                    }, 2000); // Hide the loader after 2 seconds (2000 milliseconds)
                    setTimeout(function () {
                        $("#overlay").hide();
                        $(".lds-ring").hide();
                    }, 5000); // Hide the loader after 2 seconds (2000 milliseconds)
                });
        });

        // Function to close the modal
        $('#closeModal, #closeModalButton').on('click', function () {
            $('#teacherEditModal').addClass('hidden');
        });
    });

</script>



@endsection