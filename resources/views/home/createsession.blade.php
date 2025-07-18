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
                <li>Manage Session</li>
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
                <div class="flex flex-wrap items-center gap-5">
                    Add New-><svg style="cursor: pointer;" @click="toggle" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                            d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                            stroke="#1C274C" stroke-width="1.5" />
                        <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="#1C274C" stroke-width="1.5"
                            stroke-linecap="round" />
                    </svg>
                </div>
                <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto"
                    :class="open && '!block'">
                    <div class="flex items-start justify-center min-h-screen " @click.self="open = false">
                        <div x-show="open" x-transition x-transition.duration.300
                            class="bg-white dark:bg-dark dark:border-gray/20  border-lightgray/10  overflow-hidden  w-full max-w-5xl">
                            <div
                                class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                <h5 class="font-semibold text-lg">Add Session</h5>
                                <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path
                                            d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-5 space-y-4">
                                <form action="{{ route('sessioncreate') }}" method="POST">
                                    @csrf
                                    <div class="text-lightgray text-sm font-normal">
                                        <div
                                            class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Name</h2>
                                                <input id="name" name="name" type="text" class="form-input w-full"
                                                    placeholder="Name" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Description</h2>
                                                <textarea name="description" id="description" cols="30" rows="10"
                                                    class="form-input w-full" rows="10"
                                                    placeholder="Description"></textarea>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Status</h2>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="status" value="1"
                                                        class="form-radio text-primary" checked="">
                                                    <span class="text-sm">Active</span>
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="status" value="0"
                                                        class="form-radio text-primary" checked="">
                                                    <span class="text-sm">Inactive</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="fixed bottom-0 left-0 right-0 flex justify-end items-center gap-4 p-4 bg-white border-t border-gray/20 dark:bg-dark dark:border-gray/50">
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
                                    <p>name</p>
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
                                    <p>Description</p>
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
                                    <p class="">Status</p>
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
                                        <span x-text="item.description"></span>
                                    </td>
                                    <td>
                                        <div class="togglebutton inline-block">
                                            <label for="toggleD2" class="flex items-center cursor-pointer">
                                                <div class="relative">
                                                    <input type="checkbox" id="toggleD2" class="sr-only"
                                                        x-bind:checked="item.status === 1">
                                                    <div class="block band bg-gray/20 w-[54px] h-[29px] rounded-full">
                                                    </div>
                                                    <div
                                                        class="dot absolute left-[3px] top-[2px] bg-white w-6 h-6 rounded-full transition">
                                                    </div>
                                                </div>
                                            </label>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="mt-3 flex gap-8 items-center justify-center">

                                            <svg style="cursor: pointer;" @click="open = true" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="edit-session-icon" :data-session-id="item.id">
                                                <path opacity="0.5" d="M4 22H20" stroke="#1C274C" stroke-width="1.5"
                                                    stroke-linecap="round" />
                                                <path
                                                    d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z"
                                                    stroke="#1C274C" stroke-width="1.5" />
                                                <path opacity="0.5"
                                                    d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428"
                                                    stroke="#1C274C" stroke-width="1.5" />
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
<!-- The overlay element -->
<div id="overlay"></div>
<div class="main clearfix lds-ring">
    <div class="loading"></div>
</div>
<div id="sessionEditModal"
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
                <form action="{{ route('sessionupdate') }}" method="POST">
                    @csrf
                    <div class="text-lightgray text-sm font-normal">
                        <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Name</h2>
                                <input id="sessionID-edit" name="sessionID-edit" type="hidden"
                                    class="form-input w-full">
                                <input id="name-edit" name="name-edit" type="text" class="form-input w-full"
                                    placeholder="Name" required>
                            </div>
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Description</h2>
                                <textarea name="description-edit" id="description-edit" cols="30" rows="10"
                                    class="form-input w-full" rows="10" placeholder="Description"></textarea>
                            </div>
                            <div class="p-1">
                                <h2 class="text-base font-semibold mb-4">Status</h2>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="status" value="1" class="form-radio text-primary"
                                        checked="">
                                    <span class="text-sm">Active</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="status" value="0" class="form-radio text-primary"
                                        checked="">
                                    <span class="text-sm">Inactive</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div
                        class="fixed bottom-0 left-0 right-0 flex justify-end items-center gap-4 p-4 bg-white border-t border-gray/20 dark:bg-dark dark:border-gray/50">
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
    window.sessionsData = @json($sessionsData);
   // console.log(window.sessionsData);
</script>
<!-- Datatables Js -->
<script src="{{ asset('public/assets/js/gernelsettingdata/datatablesession.js') }}"></script>
<script src="{{ asset('public/assets/js/data-search.js') }}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        function populateModal(data,sessionId) {
            // Example: Populate other fields if needed
            $('#name-edit').val(data.name);
            $('#sessionID-edit').val(data.id);
            $('#description-edit').val(data.description);
            // Set the status radio button
            if (data.status === 1) {
                $('input[name="status"][value="1"]').prop('checked', true);
            } else if (data.status === 0) {
                $('input[name="status"][value="0"]').prop('checked', true);
            }
        }

        // Function to handle SVG click and open modal
        $('.edit-session-icon').on('click', function () {
            var sessionId = $(this).data('session-id');
            console.log(sessionId);
            var baseUrl = '{{ env("APP_URL") }}/gernelsetting'; // Get the base URL dynamically
            $("#overlay").show();
            $(".lds-ring").show();
            // Fetch the years related to the selected program
            fetch(`${baseUrl}/get-session-data/${sessionId}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data,sessionId);
                    populateModal(data);
                    setTimeout(function () {
                        $('#sessionEditModal').removeClass('hidden');
                    }, 2000); // Hide the loader after 2 seconds (2000 milliseconds)
                    setTimeout(function () {
                        $("#overlay").hide();
                        $(".lds-ring").hide();
                    }, 3000); // Hide the loader after 2 seconds (2000 milliseconds)
                });
        });
        // Function to close the modal
        $('#closeModal, #closeModalButton').on('click', function () {
            $('#sessionEditModal').addClass('hidden');
        });
    });























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