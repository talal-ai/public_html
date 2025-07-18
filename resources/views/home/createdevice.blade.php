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
                <li>Manage Device's</li>
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
                                            <select id="rolename" name="rolename" class="form-select" required>
                                                <option value="" disabled selected>Select Role</option>
                                                @foreach ($programsData as $programs)
                                                    <option value="{{ $programs['id'] }}">
                                                        {{ $programs['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
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
                <div class="flex items-start justify-center min-h-screen " @click.self="open = false">
                    <div x-show="open" x-transition x-transition.duration.300
                        class="bg-white dark:bg-dark dark:border-gray/20  border-lightgray/10  overflow-hidden  w-full max-w-5xl">
                        <div
                            class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                            <h5 class="font-semibold text-lg">Add Device</h5>
                            <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                    <path
                                        d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"
                                        fill="currentColor"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-5 space-y-4">
                        <form action="{{ route('devicecreate') }}" method="POST" id="deviceForm">
                        @csrf
                            <div class="text-lightgray text-sm font-normal">
                                <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                    <div class="p-1">
                                        <h2 class="text-base font-semibold mb-4">Name</h2>
                                        <input id="devicename" name="devicename" type="text" class="form-input w-full" placeholder="Name">
                                    </div>
                                    <div class="p-1">
                                        <h2 class="text-base font-semibold mb-4">IP Address</h2>
                                        <input id="ipaddress" name="ipaddress" type="text" class="form-input w-full"
                                            placeholder="Code">
                                    </div>
                                    <div class="p-1">
                                        <h2 class="text-base font-semibold mb-4">Status</h2>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="status" id="status" value="1" class="form-radio text-primary"
                                                checked="">
                                            <span class="text-sm">Active</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="status" id="status" value="0" class="form-radio text-primary"
                                                checked="">
                                            <span class="text-sm">Inactive</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Starts component -->
   <div x-data="{ openIndex: null }">
    <div class="border rounded-md overflow-hidden">
     <!-- Accordion Item 1 -->
     <div class="border-b"> <button type="button" @click="openIndex === 0 ? openIndex = null : openIndex = 0" class="w-full flex justify-between items-center p-4 focus:outline-none text-gray-500 focus:text-orange-500"> <span>Tag Venue to this Device</span> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 transform transition-transform" :class="{ 'rotate-45': openIndex === 0 }">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
       </svg> </button>
      <div x-show="openIndex === 0" class="p-4 border-t text-sm bg-gray-50 text-gray-500" style="display: none;">
      <div class="text-lightgray text-sm font-normal">
                                   


      <div class="flex flex-col md:flex-row md:space-x-4">
    <!-- Available Venues -->
    <div class="w-full md:w-1/2 mb-4 md:mb-0">
        <h2 class="text-lg font-semibold mb-2 text-center md:text-left">Available Venue</h2>
        <table class="bg-white border rounded p-4 max-h-64 overflow-y-auto">
            <thead style="background-color: #7780a11a;">
                <tr>
                    <th>Name</th>
                    <th>Add</th>
                </tr>
            </thead>
            <tbody id="available-venues">
                @foreach ($venueData as $venue)
                <tr class="hover:bg-gray-100" 
                data-venue-id="{{ $venue['id'] }}" 
                data-venue-name="{{ $venue['name'] }}">
    <td class="text-center">{{ $venue['name'] }}</td>
    <td class="text-center">
        <button style="width: 40%;margin: 0 auto;" class="add-venue border w-10 h-10 flex items-center justify-center text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">
            <!-- Heroicon for Add -->
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 7.00005L7 7.00005M7 7.00005L1 7.00005M7 7.00005L7 1M7 7.00005L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
        </button>
    </td>
</tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Selected Venues -->
    <div class="w-full md:w-1/2" style="margin-left: 25px;">
        <h2 class="text-lg font-semibold mb-2 text-center md:text-left">Selected Venue</h2>
        <table class="bg-white border rounded p-4 max-h-64 overflow-y-auto">
            <thead style="background-color: #7780a11a;">
                <tr>
                    <th>Name</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody id="selected-venues">
                <!-- Selected items will appear here -->
            </tbody>
        </table>
    </div>
</div>

                                </div>
      </div>
     </div> 
     </div>
     </div> 
     <!--Starts component-->
     <!-- Hidden field for selected data -->
    <input type="hidden" id="selected-data" name="selected_data">
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
                                    <p class="">Name</p>
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
                                        Ip Address
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
                                        Venue Name
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
                        <template x-for="(device, index) in devices" :key="index">
                            <template x-for="(info, infoIndex) in device.additional_info" :key="infoIndex">
                                <tr x-show="checkView(index + 1)">
                                    <td>
                                        <span x-text="device.name"></span>
                                    </td>
                                    <td>
                                        <span x-text="device.ipaddress"></span>
                                    </td>
                                    <td>
                                        <span x-text="info.venue_name"></span>
                                    </td>
                                </tr>
                            </template>
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
    window.devices = @json($deviceDetailsData);
    console.log(window.devices); // Debug to ensure data is being passed correctly
</script>
<!-- Datatables Js -->
<script src="{{ asset('public/assets/js/gernelsettingdata/datatabledevice.js') }}"></script>
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
<!-- JavaScript to Handle Adding and Removing Venues -->
<script>
     document.addEventListener('DOMContentLoaded', function () {
    // Function to add a venue
    function addVenue() {
        var row = this.parentElement.parentElement;
        var clonedRow = row.cloneNode(true);
        clonedRow.querySelector('button').innerHTML = `
            <!-- Heroicon for Remove -->
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.29166 5.13898C2.29166 4.75545 2.57947 4.44454 2.93451 4.44454L5.15471 4.44417C5.59584 4.43209 5.985 4.12909 6.13511 3.68084C6.13905 3.66906 6.14359 3.65452 6.15987 3.60177L6.25553 3.29169C6.31407 3.10157 6.36508 2.93594 6.43644 2.78789C6.7184 2.20299 7.24005 1.79683 7.84288 1.69285C7.99547 1.66653 8.15706 1.66664 8.34254 1.66677H11.2409C11.4264 1.66664 11.588 1.66653 11.7406 1.69285C12.3434 1.79683 12.8651 2.20299 13.147 2.78789C13.2184 2.93594 13.2694 3.10157 13.3279 3.29169L13.4236 3.60177C13.4399 3.65452 13.4444 3.66906 13.4484 3.68084C13.5985 4.12909 14.0648 4.43246 14.5059 4.44454H16.6488C17.0038 4.44454 17.2917 4.75545 17.2917 5.13898C17.2917 5.5225 17.0038 5.83341 16.6488 5.83341H2.93451C2.57947 5.83341 2.29166 5.5225 2.29166 5.13898Z" fill="currentColor" />
                        <path opacity="0.3" d="M9.67232 18.3333H10.3281C12.5843 18.3333 13.7125 18.3333 14.4459 17.6139C15.1794 16.8946 15.2545 15.7146 15.4046 13.3547L15.6208 9.95428C15.7023 8.67382 15.743 8.03358 15.375 7.62788C15.007 7.22217 14.3856 7.22217 13.1429 7.22217H6.85755C5.61477 7.22217 4.99337 7.22217 4.62541 7.62788C4.25744 8.03358 4.29815 8.67382 4.37959 9.95428L4.59584 13.3547C4.74593 15.7146 4.82097 16.8946 5.55446 17.6139C6.28795 18.3333 7.41607 18.3333 9.67232 18.3333Z" fill="currentColor" />
                    </svg>
        `;
        clonedRow.querySelector('button').className = 'remove-venue border w-10 h-10 flex items-center justify-center text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10';

        document.getElementById('selected-venues').appendChild(clonedRow);
        row.remove();
        addRemoveListeners(); // Update the event listeners
    }

    // Function to remove a venue
    function removeVenue() {
        var row = this.parentElement.parentElement;
        var clonedRow = row.cloneNode(true);
        clonedRow.querySelector('button').innerHTML = `
            <!-- Heroicon for Add -->
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 7.00005L7 7.00005M7 7.00005L1 7.00005M7 7.00005L7 1M7 7.00005L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
        `;
        clonedRow.querySelector('button').className = 'add-venue border w-10 h-10 flex items-center justify-center text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10';

        document.getElementById('available-venues').appendChild(clonedRow);
        row.remove();
        addAddListeners(); // Update the event listeners
    }

    // Function to add event listeners to "Add" buttons
    function addAddListeners() {
        document.querySelectorAll('.add-venue').forEach(function (button) {
            button.removeEventListener('click', addVenue); // Remove previous event listeners
            button.addEventListener('click', addVenue); // Add new event listener
        });
    }

    // Function to add event listeners to "Remove" buttons
    function addRemoveListeners() {
        document.querySelectorAll('.remove-venue').forEach(function (button) {
            button.removeEventListener('click', removeVenue); // Remove previous event listeners
            button.addEventListener('click', removeVenue); // Add new event listener
        });
    }

    // Initial event listener setup
    addAddListeners();
    addRemoveListeners();
});








document.getElementById('deviceForm').addEventListener('submit', function () {
        let selectedData = [];
        document.querySelectorAll('#selected-venues tr').forEach(function (row) {
            let venueid = row.getAttribute('data-venue-id');
            let venuename = row.getAttribute('data-venue-name');
            selectedData.push({ venue_id: venueid, venue_name: venuename });
        });

        // Set the hidden input value
        document.getElementById('selected-data').value = JSON.stringify(selectedData);
    });




    </script>
@endsection