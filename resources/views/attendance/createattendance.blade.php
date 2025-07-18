@extends('Layout.layout')

@section('content')

    <div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
        <div class="grid grid-cols-1">
            <div>
                <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                    <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                        <a href="javaScript:;">Attendance Setting</a>
                        <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5"
                                d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z"
                                fill="currentColor" />
                        </svg>
                    </li>
                    <li>Manage Attendance</li>
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
                        <h2 class="text-base font-semibold mb-4">Session</h2>
                        <select id="rolename" name="rolename" class="form-select" required>
                            <option value="" disabled selected>Select Session</option>
                        </select>
                    </div>
                    <div class="p-1">
                        <h2 class="text-base font-semibold mb-4">Program</h2>
                        <select id="rolename" name="rolename" class="form-select" required>
                            <option value="" disabled selected>Select Program</option>
                        </select>
                    </div>
                    <div class="p-1">
                        <h2 class="text-base font-semibold mb-4">Year</h2>
                        <select id="selectOption" class="form-select">
                            <option value="" disabled selected>Select Year</option>
                        </select>
                    </div>
                    <div class="p-1">
                        <h2 class="text-base font-semibold mb-4">Batch</h2>
                        <select id="selectOption" class="form-select">
                            <option value="" disabled selected>Select Batch</option>
                        </select>
                    </div>
                    <div class="p-1">
                        <h2 class="text-base font-semibold mb-4">Subject</h2>
                        <select id="selectOption" class="form-select">
                            <option value="" disabled selected>Select Subject</option>
                        </select>
                    </div>
                    <div class="p-1">
                        <h2 class="text-base font-semibold mb-4">Venues</h2>
                        <select id="selectOption" class="form-select">
                            <option value="" disabled selected>Select Venues</option>
                        </select>
                    </div>
                    <div class="p-1">
                        <h2 class="text-base font-semibold mb-4">Teacher</h2>
                        <select id="selectOption" class="form-select">
                            <option value="" disabled selected>Select Teacher</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">

            <div x-data="modals">
                @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_add' && $permission->description == 'Can Add Device')
                            <div class="flex flex-wrap items-center gap-5">
                                <button type="button"
                                    class="btn flex items-center gap-2 bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]"
                                    @click="toggle">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 7.00005L7 7.00005M7 7.00005L1 7.00005M7 7.00005L7 1M7 7.00005L7 13"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                    Add New
                                </button>
                            </div>
                            @break


                        @endif


                    @endforeach
                @endforeach
                <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto"
                    :class="open && '!block'">
                    <div id="overlay"></div>
                    <div class="main clearfix lds-ring">
                        <div class="loading"></div>
                    </div>
                    <div class="flex items-start justify-center min-h-screen " @click.self="open = false">
                        <div x-show="open" x-transition x-transition.duration.300
                            class="bg-white dark:bg-dark dark:border-gray/20  border-lightgray/10  overflow-hidden  w-full max-w-5xl">
                            <div
                                class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                <h5 class="font-semibold text-lg">Add Attendance</h5>
                                <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path
                                            d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-5 space-y-4">
                            <form method="post" id="deviceForm" action="{{ route('saveattendance') }}">
                                    @csrf
                                    <div class="text-lightgray text-sm font-normal">
                                        <div
                                            class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Program</h2>
                                                <select id="selectprogram" name="program" class="form-select">
                                                    <option value="" disabled selected>Select Program</option>
                                                    @foreach($programsData as $program)
                                                        <option value="{{ $program['id'] }}">
                                                            {{ $program['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Year</h2>
                                                <select id="selectyear" name="year" class="form-select">
                                                    <option value="" disabled selected>Select Program First</option>
                                                </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Batch</h2>
                                                <select id="selectbatch" name="batch" class="form-select" required>
                                                    <option value="" disabled selected>Select Year First</option>
                                                </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Subject</h2>
                                                <select id="selectsubject" name="subject" class="form-select">
                                                    <option value="" disabled selected>Select Year First</option>
                                                </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Lecture Type</h2>
                                                <select id="lecturetype" name="lecturetype" class="form-select" required>
                                                    <option value="" disabled selected>Select Lecture Type</option>
                                                    <option value="1">CPCs</option>
                                                    <option value="2">Field Visit</option>
                                                    <option value="3">Guest Speaker</option>
                                                    <option value="4">House Hold Survery</option>
                                                    <option value="5">Lecture</option>
                                                    <option value="6">Moudular Text</option>
                                                    <option value="7">Monthly Class Test</option>
                                                    <option value="8">Online</option>
                                                    <option value="9">OSPE & VIVA</option>
                                                    <option value="10">SDL</option>
                                                    <option value="11">Sendup</option>
                                                    <option value="12">Test Assessment</option>
                                                    <option value="13">Tutorial-Lab</option>
                                                    <option value="14">Wards-Clinical Rotation</option>
                                                </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Venue</h2>
                                                <select id="selectvune" name="venue" class="form-select" required>
                                                    <option value="" disabled selected>Select Venue</option>
                                                    @foreach($venueData as $venue)
                                                        <option value="{{ $venue['id'] }}">
                                                            {{ $venue['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <input id="device_id" name="device_id" type="hidden" value="">
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Assign to Teacher</h2>
                                                <select id="selectteacher" name="teacher" class="form-select">
                                                    <option value="" disabled selected>Select Program First</option>
                                                </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Co-Teachers</h2>
                                                <select id="coteacher" name="coteacher" class="form-select" required>
                                                    <option value="" disabled selected>Select Assign Teacher First</option>
                                                </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Reason</h2>
                                                <input id="reason" name="reason" type="text" class="form-input w-full"
                                                    placeholder="Reason">
                                            </div>
                                        </div>
                                        <div
                                            class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Select Date</h2>
                                                <div id="date-range-picker" class="flex items-center">
                                                    <div class="relative">
                                                        <input id="datepicker-range-start" name="start_date" type="text"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Select start date">
                                                        <input id="user_id" name="user_id" type="hidden"
                                                            value="{{ $user->id }}">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Select Start and End Time</h2>
                                                <div id="time-picker" class="flex items-center">
                                                    <div class="relative">
                                                        <input id="timepicker-range-start" name="start_time" type="text"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Select start time">
                                                        <input id="user_id" name="user_id" type="hidden"
                                                            value="{{ $user->id }}">
                                                    </div>
                                                    <span class="mx-4 text-gray-500">to</span>
                                                    <div class="relative">
                                                        <input id="timepicker-range-end" name="end_time" type="text"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Select end time">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                            <div class="p-1">
                                                <button type="button" id="machineattendance"
                                                    class="btn bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">Machine
                                                    Attendance</button>
                                                <button type="button" id="getstudents"
                                                    class="btn bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">Get
                                                    Students</button>
                                            </div>
                                        </div>
                                        <div
                                            class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Filter By:</h2>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="status" id="status" value="1"
                                                        class="form-radio text-primary" checked="">
                                                    <span class="text-sm">All</span>
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="status" id="status" value="2"
                                                        class="form-radio text-primary">
                                                    <span class="text-sm">Present</span>
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="status" id="status" value="3"
                                                        class="form-radio text-primary">
                                                    <span class="text-sm">Absent</span>
                                                </label>
                                                <!-- <label class="inline-flex items-center">
                                                    <input type="radio" name="status" id="status" value="4"
                                                        class="form-radio text-primary">
                                                    <span class="text-sm">Leave</span>
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="status" id="status" value="5"
                                                        class="form-radio text-primary">
                                                    <span class="text-sm">Late</span>
                                                </label> -->
                                            </div>
                                        </div>
                                    </div>
                                    <table id="attendanceTable" border="1">
                                        <thead>
                                            <tr>
                                                <th>Student Name</th>
                                                <th>Roll Number</th>
                                                <th>Present</th>
                                                <th>Absent</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Students Data Dynamically Add Hoga -->
                                        </tbody>
                                    </table>

                                    <div
                                        class="left-0 right-0 flex justify-end items-center gap-4 p-4 bg-white border-t border-gray/20 dark:bg-dark dark:border-gray/50">
                                        <button type="button"
                                            class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10"
                                            @click="toggle">Discard</button>
                                        <button type="submit"
                                            class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Save
                                            Record</button>
                                    </div>
                                </form>
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
                                        <p class="">Venue Name</p>
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
                                            Program Name
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
                                            Year Name
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
                                            Batch Name
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
                                            Device Serial Number
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
                                            Date
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
                                            Start Time
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
                                            End Time
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
                                            Teacher
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
                                            Co-Teacher
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
                                            Created By
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
                                        <span x-text="item.venue_name"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.program_name"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.year_name"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.batch_name"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.subject_name"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.device_sn"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.date"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.starttime"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.endtime"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.teacher_name"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.coteacher_name"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.createdby_name"></span>
                                    </td>
                                </tr>
                            </template>

                                <!-- Display message when no batches are available -->
                                <template x-if="isEmpty()">
                                    <tr>
                                        <td colspan="4" class="text-center py-3 text-black">No matching records found.</td>
                                    </tr>
                                </template>
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
    window.mergedData = @json($attendancedata);
    console.log(window.mergedData); // Debug to ensure data is being passed correctly
</script>
    <!-- Datatables Js -->
    <script src="{{ asset('public/assets/js/gernelsettingdata/datatableattendance.js') }}"></script>
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




        // document.addEventListener('DOMContentLoaded', function () {
        //     let startPicker = flatpickr("#timepicker-range-start", {
        //         enableTime: true,
        //         noCalendar: true,
        //         dateFormat: "h:i K", // 12-hour format with AM/PM
        //         time_24hr: false, // 12-hour mode
        //         onOpen: function (selectedDates, dateStr, instance) {
        //             instance.set("time_24hr", false); // Ensure 12-hour format
        //         },
        //         onChange: function (selectedDates, dateStr, instance) {
        //             endPicker.set('minTime', dateStr);
        //         }
        //     });

        //     let endPicker = flatpickr("#timepicker-range-end", {
        //         enableTime: true,
        //         noCalendar: true,
        //         dateFormat: "h:i K",
        //         time_24hr: false,
        //         onOpen: function (selectedDates, dateStr, instance) {
        //             instance.set("time_24hr", false);
        //         },
        //         onChange: function (selectedDates, dateStr, instance) {
        //             startPicker.set('maxTime', dateStr);
        //         }
        //     });
        // });

        document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#timepicker-range-start", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "h:i K", // 12-hour format with AM/PM
                time_24hr: false, // Ensure 12-hour format
            });

            flatpickr("#timepicker-range-end", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "h:i K", // 12-hour format with AM/PM
                time_24hr: false, // Ensure 12-hour format
            });
        });


        document.addEventListener('DOMContentLoaded', function () {
            const today = new Date(); // Get today's date

            flatpickr("#datepicker-range-start", {
                dateFormat: "Y-m-d",
                maxDate: today, // Disable future dates
                onChange: function (selectedDates, dateStr, instance) {
                    document.querySelector("#datepicker-range-end")._flatpickr.set('minDate', selectedDates[0]);
                }
            });

            flatpickr("#datepicker-range-end", {
                dateFormat: "Y-m-d",
                maxDate: today, // Disable future dates
                onChange: function (selectedDates, dateStr, instance) {
                    document.querySelector("#datepicker-range-start")._flatpickr.set('maxDate', selectedDates[0]);
                }
            });
        });


        document.getElementById('machineattendance').addEventListener('click', function () {
            var baseUrl = '{{ env("APP_URL") }}/Attendance/machineattendance'; // Get the base URL dynamically
            const selectprogram = document.getElementById('selectprogram').value;
            const selectyear = document.getElementById('selectyear').value;
            const selectbatch = document.getElementById('selectbatch').value;
            const selectsubject = document.getElementById('selectsubject').value;
            const lecturetype = document.getElementById('lecturetype').value;
            const selectvune = document.getElementById('selectvune').value;
            const selectteacher = document.getElementById('selectteacher').value;
            const coteacher = document.getElementById('coteacher').value;
            const reason = document.getElementById('reason').value;
            const daterangepicker = document.getElementById('datepicker-range-start').value;
            const timepickerstart = document.getElementById('timepicker-range-start').value;
            const timepickerend = document.getElementById('timepicker-range-end').value;
            const deviceid = document.getElementById('device_id').value;
            $("#overlay").show();
            $(".lds-ring").show();
            console.log(selectprogram, selectyear, selectbatch, selectsubject, lecturetype, selectvune);
            console.log(selectteacher, coteacher, reason);
            console.log(daterangepicker, timepickerstart, timepickerend);

            $.ajax({
                url: baseUrl,
                method: 'POST', // Change the method if necessary
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token here
                },
                data: {
                    selectprogram: selectprogram,
                    selectyear: selectyear,
                    selectbatch: selectbatch,
                    selectsubject: selectsubject,
                    lecturetype: lecturetype,
                    selectvune: selectvune,
                    selectteacher: selectteacher,
                    coteacher: coteacher,
                    reason: reason,
                    daterangepicker: daterangepicker,
                    timepickerstart: timepickerstart,
                    timepickerend: timepickerend,
                    deviceid: deviceid,
                },
                success: function (response) {
                    console.log(response);
                    let finalStudents = response.finalStudents;
                    let tableBody = $('#attendanceTable tbody');
                    tableBody.empty(); // Purana data remove karo

                    finalStudents.forEach(student => {
                        let isMatched = parseInt(student.is_matched) === 1; // Ensure integer comparison
                        // Console par isMatched ki value aur datatype check karein
                        console.log(`is_matched value: ${student.is_matched}, type: ${typeof student.is_matched}`);
                        console.log(`isMatched value: ${isMatched}, type: ${typeof isMatched}`);
                        let row = `
                                <tr>
                                    <td style="text-align: center;">${student.username}</td>
                                    <td style="text-align: center;">${student.classrollno}</td>
                                    <td style="text-align: center;"><input type="radio" name="status_${student.classrollno}" value="1" ${isMatched ? 'checked' : ''}></td>
                                    <td style="text-align: center;">
                                    <input type="hidden" name="student_ids[${student.classrollno}]" value="${student.id}">
                                    <input type="radio" name="status_${student.classrollno}" value="0" ${!isMatched ? 'checked' : ''}></td>
                                </tr>
                            `;
                        tableBody.append(row);
                    });
                    setTimeout(function () {
                        $("#overlay").hide();
                        $(".lds-ring").hide();
                    }, 5000); // Hide the loader after 2 seconds (2000 milliseconds)
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });


        document.getElementById('selectvune').addEventListener('change', function () {
            var venueId = this.value; // Selected venue ID
            console.log("Selected Venue ID:", venueId);
            var baseUrl = '{{ env("APP_URL") }}/Studentsetting'; // Get the base URL dynamically
            fetch(`${baseUrl}/getdevice/${venueId}`)
                .then(response => response.json())
                .then(data => {
                    console.log("API Response:", data);

                    if (data.ipaddress) {
                        document.getElementById('device_id').value = data.ipaddress; // IP Address ko set karna
                    } else {
                        document.getElementById('device_id').value = ""; // Agar IP na mile to empty rakhna
                    }
                })
                .catch(error => console.error('Error fetching device data:', error));
        });


        document.getElementById('selectprogram').addEventListener('change', function () {
            var programId = this.value;
            var baseUrl = '{{ env("APP_URL") }}/Studentsetting'; // Get the base URL dynamically
            console.log(programId);
            if (programId) {
                fetch(`${baseUrl}/get-years/${programId}`)
                    .then(response => response.json())
                    .then(data => {
                        var yearSelect = document.getElementById('selectyear');
                        yearSelect.innerHTML = '<option value="" disabled selected>Select Year</option>';

                        data.years.forEach(function (year) {
                            var option = document.createElement('option');
                            option.value = year.id;
                            option.textContent = year.name;
                            yearSelect.appendChild(option);
                        });
                    });

                fetch(`${baseUrl}/getTeacher/${programId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        var selectteacher = document.getElementById('selectteacher');
                        selectteacher.innerHTML = '<option value="" disabled selected>Select Assign to Teacher</option>';

                        data.teachers.forEach(function (teacher) {
                            var option = document.createElement('option');
                            option.value = teacher.id;
                            option.textContent = teacher.name;
                            selectteacher.appendChild(option);
                        });
                    });
            } else {
                document.getElementById('selectyear').innerHTML = '<option value="" disabled selected>Select Year</option>';
            }
        });

        // Populate Co-Teachers dropdown excluding selected teacher
        function populateCoTeachers(teachers, excludeId = null) {
            const coTeacher = document.getElementById('coteacher');
            coTeacher.innerHTML = '<option value="" disabled selected>Select Co-Teachers</option>';

            teachers.forEach(teacher => {
                if (teacher.id !== excludeId) {
                    const option = document.createElement('option');
                    option.value = teacher.id;
                    option.textContent = teacher.name;
                    coTeacher.appendChild(option);
                }
            });
        }

        // Event listener for Assign to Teacher dropdown
        document.getElementById('selectteacher').addEventListener('change', function () {
            var baseUrl = '{{ env("APP_URL") }}/Studentsetting'; // Get the base URL dynamically
            const selectedTeacherId = this.value;
            const programId = document.getElementById('selectprogram').value;
            // Fetch the teacher list again (assumes you have a list saved in memory)
            fetch(`${baseUrl}/getTeacher/${programId}`)
                .then(response => response.json())
                .then(data => {
                    populateCoTeachers(data.teachers, parseInt(selectedTeacherId));
                });
        });

        document.getElementById('selectyear').addEventListener('change', function () {
            var yearId = this.value;
            var baseUrl = '{{ env("APP_URL") }}/Studentsetting'; // Get the base URL dynamically
            console.log(yearId);
            if (yearId) {
                fetch(`${baseUrl}/getsubject/${yearId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        var selectsubject = document.getElementById('selectsubject');
                        selectsubject.innerHTML = '<option value="" disabled selected>Select Subject</option>';

                        data.subjects.forEach(function (subject) {
                            var option = document.createElement('option');
                            option.value = subject.id;
                            option.textContent = subject.name;
                            selectsubject.appendChild(option);
                        });
                    });

                fetch(`${baseUrl}/getBatch/${yearId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        var selectbatch = document.getElementById('selectbatch');
                        selectbatch.innerHTML = '<option value="" disabled selected>Select Batch</option>';

                        data.batches.forEach(function (batche) {
                            var option = document.createElement('option');
                            option.value = batche.id;
                            option.textContent = batche.name;
                            selectbatch.appendChild(option);
                        });
                    });
            } else {
                document.getElementById('selectteacher').innerHTML = '<option value="" disabled selected>Frist Create Teacher</option>';
            }
        });


    </script>
    <!-- JavaScript to Handle Adding and Removing Venues -->

@endsection