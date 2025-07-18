@extends('Layout.layout')
@section('style')
<style>
    .cke_notifications_area {
        display: none;
    }
</style>
@endsection
@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">LMS</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                            d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z"
                            fill="currentColor" />
                    </svg>
                </li>
                <li>Assignment List</li>
            </ul>
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
                                    <p>Student Name</p>
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
                                    <p>Student Rollno</p>
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
                                    <p class="">Submited Date</p>
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
                            <th width="15%">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="">
                                        Total Marks
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
                                        Obtain Marks
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
                                        Status
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
                            <template x-for="(item, index) in items" :key="index" x-data="myComponent()">
                                <tr x-show="checkView(index + 1)" class="">
                                    <td>
                                        <span x-text="item.username"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.classrollno"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.submit_date"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.totalmarks"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.obtain_marks"></span>
                                    </td>
                                    <td>
                                        <div x-show="item.obtain_marks !== null"
                                            class="rounded p-3 bg-success/10 text-success mt-3 text-center">
                                            <span> Checked</span>
                                        </div>
                                        <div x-show="item.obtain_marks === null"
                                            class="rounded p-3 bg-warning/10 text-warning mt-3 text-center">
                                            Pending
                                        </div>
                                    </td>
                                    <td>
                                        <div class="mt-3 flex gap-8 items-center justify-center">
                                            <svg style="cursor: pointer;" id="downloadassignment" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                style="margin-right:10px;"
                                                @click="handleDownload(item.program_id, item.year_id, item.subject_id,item.year,item.month,item.filename )">
                                                <path opacity="0.5"
                                                    d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12"
                                                    stroke="#1C274C" stroke-width="1.5" />
                                                <path
                                                    d="M2 14C2 11.1997 2 9.79961 2.54497 8.73005C3.02433 7.78924 3.78924 7.02433 4.73005 6.54497C5.79961 6 7.19974 6 10 6H14C16.8003 6 18.2004 6 19.27 6.54497C20.2108 7.02433 20.9757 7.78924 21.455 8.73005C22 9.79961 22 11.1997 22 14C22 16.8003 22 18.2004 21.455 19.27C20.9757 20.2108 20.2108 20.9757 19.27 21.455C18.2004 22 16.8003 22 14 22H10C7.19974 22 5.79961 22 4.73005 21.455C3.78924 20.9757 3.02433 20.2108 2.54497 19.27C2 18.2004 2 16.8003 2 14Z"
                                                    stroke="#1C274C" stroke-width="1.5" />
                                                <path d="M12 11L12 17M12 17L14.5 14.5M12 17L9.5 14.5" stroke="#1C274C"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                            <svg style="cursor: pointer;" class="edit-assignment-icon"
                                                :data-assignment-id="item.assignmentId" width="24" height="24"
                                                :data-userid-id="item.user_id" 
                                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 5.854V20.9999" stroke="#1C274D" stroke-width="1.5" />
                                                <path d="M5 9L9 10" stroke="#1C274D" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                                <path d="M19 9L15 10" stroke="#1C274D" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                                <path d="M5 13L9 14" stroke="#1C274D" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                                <path d="M19 13L15 14" stroke="#1C274D" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                                <path
                                                    d="M20.082 3.01775L20.1081 3.76729L20.082 3.01775ZM16.5 3.48744L16.2849 2.76895V2.76895L16.5 3.48744ZM13.6738 4.80275L13.2982 4.15363L13.2982 4.15363L13.6738 4.80275ZM3.9824 3.07489L3.93639 3.82348L3.9824 3.07489ZM7 3.48744L7.19136 2.76227V2.76227L7 3.48744ZM10.2823 4.87546L9.93167 5.53847L10.2823 4.87546ZM13.6276 20.0692L13.9804 20.7311L13.6276 20.0692ZM17 18.6334L16.8086 17.9082H16.8086L17 18.6334ZM19.9851 18.2228L20.032 18.9714L19.9851 18.2228ZM10.3724 20.0692L10.0196 20.7311H10.0196L10.3724 20.0692ZM7 18.6334L7.19136 17.9082H7.19136L7 18.6334ZM4.01486 18.2228L3.96804 18.9714H3.96804L4.01486 18.2228ZM22.75 10.5384C22.75 10.1242 22.4142 9.78839 22 9.78839C21.5858 9.78839 21.25 10.1242 21.25 10.5384H22.75ZM21.25 7C21.25 7.41421 21.5858 7.75 22 7.75C22.4142 7.75 22.75 7.41421 22.75 7H21.25ZM1.25 10.5707C1.25 10.9849 1.58579 11.3207 2 11.3207C2.41421 11.3207 2.75 10.9849 2.75 10.5707H1.25ZM2.75 14C2.75 13.5858 2.41421 13.25 2 13.25C1.58579 13.25 1.25 13.5858 1.25 14H2.75ZM20.0559 2.2682C18.9175 2.30785 17.4296 2.42627 16.2849 2.76895L16.7151 4.20594C17.6643 3.92179 18.9892 3.80627 20.1081 3.76729L20.0559 2.2682ZM16.2849 2.76895C15.2899 3.06684 14.1706 3.64868 13.2982 4.15363L14.0495 5.45188C14.9 4.95969 15.8949 4.45149 16.7151 4.20594L16.2849 2.76895ZM3.93639 3.82348C4.90238 3.88285 5.99643 3.99829 6.80864 4.21262L7.19136 2.76227C6.23055 2.50873 5.01517 2.38695 4.02841 2.3263L3.93639 3.82348ZM6.80864 4.21262C7.77076 4.46651 8.95486 5.02196 9.93167 5.53847L10.6328 4.21244C9.63736 3.68606 8.32766 3.06211 7.19136 2.76227L6.80864 4.21262ZM13.9804 20.7311C14.9714 20.2028 16.1988 19.6205 17.1914 19.3585L16.8086 17.9082C15.6383 18.217 14.2827 18.8701 13.2748 19.4074L13.9804 20.7311ZM17.1914 19.3585C17.9943 19.1466 19.0732 19.0313 20.032 18.9714L19.9383 17.4743C18.9582 17.5356 17.7591 17.6574 16.8086 17.9082L17.1914 19.3585ZM10.7252 19.4074C9.71727 18.8701 8.3617 18.217 7.19136 17.9082L6.80864 19.3585C7.8012 19.6205 9.0286 20.2028 10.0196 20.7311L10.7252 19.4074ZM7.19136 17.9082C6.24092 17.6574 5.04176 17.5356 4.06168 17.4743L3.96804 18.9714C4.9268 19.0313 6.00566 19.1466 6.80864 19.3585L7.19136 17.9082ZM21.25 16.1436C21.25 16.8293 20.6817 17.4278 19.9383 17.4743L20.032 18.9714C21.5062 18.8791 22.75 17.6798 22.75 16.1436H21.25ZM22.75 4.93319C22.75 3.46989 21.5847 2.21495 20.0559 2.2682L20.1081 3.76729C20.7229 3.74588 21.25 4.25161 21.25 4.93319H22.75ZM1.25 16.1436C1.25 17.6798 2.49378 18.8791 3.96804 18.9714L4.06168 17.4743C3.31831 17.4278 2.75 16.8293 2.75 16.1436H1.25ZM13.2748 19.4074C12.4825 19.8297 11.5175 19.8297 10.7252 19.4074L10.0196 20.7311C11.2529 21.3885 12.7471 21.3885 13.9804 20.7311L13.2748 19.4074ZM13.2982 4.15363C12.4801 4.62709 11.4617 4.6507 10.6328 4.21244L9.93167 5.53847C11.2239 6.22177 12.791 6.18025 14.0495 5.45188L13.2982 4.15363ZM2.75 4.9978C2.75 4.30062 3.30243 3.78451 3.93639 3.82348L4.02841 2.3263C2.47017 2.23053 1.25 3.49864 1.25 4.9978H2.75ZM22.75 16.1436V10.5384H21.25V16.1436H22.75ZM22.75 7V4.93319H21.25V7H22.75ZM2.75 10.5707V4.9978H1.25V10.5707H2.75ZM2.75 16.1436V14H1.25V16.1436H2.75Z"
                                                    fill="#1C274D" />
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
<div id="assignmentEditModal"
    class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto">
    <div class="flex items-start justify-center min-h-screen" id="modalContent">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-lightgray/10 overflow-hidden w-full max-w-5xl">
            <div
                class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                <h5 class="font-semibold text-lg">Assignment Detail</h5>
                <button type="button" class="text-lightgray hover:text-primary" id="closeModal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                        <path
                            d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"
                            fill="currentColor"></path>
                    </svg>
                </button>
            </div>
            @php
                $today = date('Y-m-d');
            @endphp
            <div class="p-5 space-y-4">
                <form  action="{{ route('updateassignmentby') }}" method="POST">
                    @csrf
                    <div class="text-lightgray text-sm font-normal">
                        <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Marks Assign</h2>
                                <input id="assignmentID-edit" name="assignmentID-edit" type="hidden"
                                    class="form-input w-full">
                                    <input id="userid-edit" name="userid-edit" type="hidden"
                                    class="form-input w-full">
                                    <input id="assignmentsubmitdate-edit" name="assignmentsubmitdate-edit" type="hidden"
                                    class="form-input w-full" value="{{$today}}">
                                    <input id="assignmentsubmitbyid-edit" name="assignmentsubmitbyid-edit" type="hidden"
                                    class="form-input w-full" value="{{ $user->id }}">
                                <input id="obtainmarks-edit" name="obtainmarks-edit" type="number"
                                    class="form-input w-full positive-only" placeholder="Marks Assign" required>
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
<script>
    window.mergedData = @json($assignmentsData);
    console.log(window.mergedData); // Debug to ensure data is being passed correctly
</script>
<!-- Datatables Js -->
<script src="{{ asset('public/assets/js/gernelsettingdata/datatableassignment.js') }}"></script>
<script src="{{ asset('public/assets/js/data-search.js') }}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    function myComponent() {
        return {
            handleDownload(programId, yearId, subjectId, year, month, filename) {
                var baseUrl = '{{ env("APP_URL") }}/lms';
                console.log('Program ID:', programId);
                console.log('Year ID:', yearId);
                console.log('Suject ID:', subjectId);
                console.log('File Name:', filename);
                console.log('Year:', year);
                console.log('Month:', month);
                window.location.href = baseUrl + `/downloadassignment/${programId}/${yearId}/${subjectId}/${year}/${month}/${filename}`; // Redirect to the download URL
            }
        }
    }
    $(document).ready(function () {

        function populateModal(assignmentId,userId) {
            $('#assignmentID-edit').val(assignmentId);
            $('#userid-edit').val(userId);
        }


        // Function to handle SVG click and open modal
        $('.edit-assignment-icon').on('click', function () {
            var assignmentId = $(this).data('assignment-id');
            var userId = $(this).data('userid-id');
            console.log(assignmentId);
            console.log(userId);
            $("#overlay").show();
            $(".lds-ring").show();
            populateModal(assignmentId,userId);
            setTimeout(function () {
                $('#assignmentEditModal').removeClass('hidden');
            }, 2000); // Hide the loader after 2 seconds (2000 milliseconds)
            setTimeout(function () {
                $("#overlay").hide();
                $(".lds-ring").hide();
            }, 5000); // Hide the loader after 2 seconds (2000 milliseconds)

        });

        // Function to close the modal
        $('#closeModal, #closeModalButton').on('click', function () {
            $('#assignmentEditModal').addClass('hidden');
        });
    });
</script>
@endsection