@extends('Layout.layout')
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
@section('style')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .email-tag {
        display: inline-flex;
        align-items: center;
        background-color: #E9F2FF;
        padding: 5px 10px;
        border-radius: 10px;
        margin: 2px;
        font-size: 12px;
        color: #333;
    }

    .email-tag span {
        margin-right: 8px;
    }

    .email-tag .remove-tag {
        cursor: pointer;
        color: red;
        font-weight: bold;
    }

    .hidden {
        display: none;
    }
</style>
@endsection
@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 gap-4 flex-1" x-data="email">
        <div class="flex gap-5 items-stretch relative overflow-hidden" x-data="{activeTab:'inbox'}">

            <?php
$user = auth()->user();
$type = $user->type;
if ($type == 1 ||$type == 5) {
                ?>
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-l-lg xl:rounded-lg p-5 absolute w-[200px] z-20 flex-none -left-[410px] xl:static overflow-hidden overflow-y-auto h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]"
                :class="isShowChatMenu && '!left-0'">
                <div class="flex flex-col space-y-5">
                    <button @click="activeTab = 'compose'" :class="activeTab === 'compose' ? '' : ''"
                        class="bg-primary text-white px-5 py-2.5 flex items-center gap-2.5 rounded-lg">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                d="M2.70837 18.3334C2.70837 17.9882 2.9882 17.7084 3.33337 17.7084H16.6667C17.0119 17.7084 17.2917 17.9882 17.2917 18.3334C17.2917 18.6786 17.0119 18.9584 16.6667 18.9584H3.33337C2.9882 18.9584 2.70837 18.6786 2.70837 18.3334Z"
                                fill="currentColor" />
                            <path opacity="0.5"
                                d="M15.9005 6.14298C16.9246 5.11895 16.9246 3.45867 15.9005 2.43465C14.8765 1.41062 13.2162 1.41062 12.1922 2.43465L11.6007 3.02614C11.6088 3.05059 11.6172 3.07539 11.6259 3.10051C11.8427 3.72541 12.2518 4.5446 13.0213 5.31411C13.7908 6.08362 14.61 6.49268 15.2349 6.70948C15.2599 6.71815 15.2846 6.72652 15.3089 6.73458L15.9005 6.14298Z"
                                fill="currentColor" />
                            <path
                                d="M11.6259 2.99963L11.6004 3.0251C11.6085 3.04956 11.6169 3.07436 11.6256 3.09948C11.8424 3.72437 12.2515 4.54356 13.021 5.31307C13.7905 6.08258 14.6097 6.49164 15.2346 6.70844C15.2594 6.71704 15.2839 6.72534 15.308 6.73334L9.59978 12.4416C9.21494 12.8264 9.02248 13.0189 8.81031 13.1843C8.56002 13.3796 8.28922 13.5469 8.00268 13.6835C7.75977 13.7992 7.50159 13.8853 6.98525 14.0574L4.26243 14.965C4.00833 15.0497 3.72819 14.9836 3.5388 14.7942C3.34941 14.6048 3.28327 14.3247 3.36797 14.0706L4.27558 11.3477C4.44769 10.8314 4.53375 10.5732 4.64952 10.3303C4.78607 10.0438 4.95344 9.77298 5.14866 9.52269C5.31414 9.31053 5.50657 9.1181 5.89139 8.73328L11.6259 2.99963Z"
                                fill="currentColor" />
                        </svg>
                        <span class="text-sm">Compose</span>
                    </button>
                    <button @click="activeTab = 'inbox'" :class="activeTab === 'inbox' ? 'text-primary' : 'hover:text-primary text-gray'" class="flex items-center gap-3 justify-between">
                        <div class="flex items-center gap-2.5">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.59976 8.83304L6.79915 9.83253C8.32968 11.108 9.09495 11.7457 10.0001 11.7457C10.9052 11.7457 11.6705 11.108 13.201 9.83253L14.4004 8.83304C14.6953 8.58729 14.8427 8.46442 14.9214 8.29644C15.0001 8.12847 15.0001 7.93653 15.0001 7.55267V5.83329C15.0001 5.5661 15.0001 5.31708 14.9985 5.0847C14.9888 3.6088 14.9171 2.80401 14.3899 2.27682C13.7797 1.66663 12.7976 1.66663 10.8334 1.66663H9.16674C7.20255 1.66663 6.22046 1.66663 5.61027 2.27682C5.08308 2.80401 5.00983 3.6088 5.00007 5.0847C4.99854 5.31708 5.00007 5.5661 5.00007 5.83329V7.55267C5.00007 7.93653 5.00007 8.12847 5.07875 8.29644C5.15742 8.46442 5.30487 8.58729 5.59976 8.83304ZM7.70833 4.99996C7.70833 4.65478 7.98816 4.37496 8.33333 4.37496H11.6667C12.0118 4.37496 12.2917 4.65478 12.2917 4.99996C12.2917 5.34514 12.0118 5.62496 11.6667 5.62496H8.33333C7.98816 5.62496 7.70833 5.34514 7.70833 4.99996ZM8.54167 7.49996C8.54167 7.15478 8.82149 6.87496 9.16667 6.87496H10.8333C11.1785 6.87496 11.4583 7.15478 11.4583 7.49996C11.4583 7.84514 11.1785 8.12496 10.8333 8.12496H9.16667C8.82149 8.12496 8.54167 7.84514 8.54167 7.49996Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M6.79891 9.83262L5.59952 8.83314C5.30463 8.58739 5.15718 8.46452 5.0785 8.29654C4.99983 8.12857 4.99983 7.93663 4.99983 7.55277V5.83339C4.99983 5.7423 4.99965 5.65332 4.99947 5.56639C4.99914 5.39834 4.99882 5.23795 4.99983 5.0848C3.91647 5.19137 3.18723 5.43207 2.64294 5.97637C1.66663 6.95268 1.66663 8.52472 1.66663 11.6674C1.66663 14.8101 1.66663 16.3815 2.64294 17.3578C3.61925 18.3341 5.1906 18.3341 8.33328 18.3341H11.6666C14.8093 18.3341 16.3807 18.3341 17.357 17.3578C18.3333 16.3815 18.3333 14.8101 18.3333 11.6674C18.3333 8.52472 18.3333 6.95268 17.357 5.97637C16.8124 5.43177 16.0826 5.19096 14.9983 5.08447C14.9998 5.31685 14.9998 5.5662 14.9998 5.83339V7.55277C14.9998 7.93663 14.9998 8.12857 14.9212 8.29654C14.8425 8.46452 14.695 8.58739 14.4001 8.83314L13.2007 9.83262C11.6702 11.1081 10.905 11.7458 9.99983 11.7458C9.0947 11.7458 8.32944 11.1081 6.79891 9.83262Z"
                                    fill="currentColor" />
                            </svg>
                            <span class="text-sm">Inbox</span>
                        </div>
                        <p class="text-xs font-semibold">
                            {{ $totalNotifications }}
                        </p>
                    </button>
                    <button @click="activeTab = 'sent'" :class="activeTab === 'sent' ? 'text-primary' : 'hover:text-primary text-gray'" class="flex items-center gap-3 justify-between">
                        <div class="flex items-center gap-2.5">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.7856 13.3018C11.8917 13.514 11.7994 13.772 11.5826 13.8686L3.74788 17.3625C2.50135 17.9184 1.20838 16.684 1.82582 15.5276L4.45251 10.6078C4.6568 10.2252 4.6568 9.77481 4.45251 9.39217L1.82582 4.47241C1.20838 3.31595 2.50135 2.08158 3.74788 2.63747L6.6848 3.94719C7.0372 4.10434 7.32415 4.37889 7.49671 4.724L11.7856 13.3018Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M12.9447 12.8254C13.0444 13.0249 13.2835 13.1104 13.4871 13.0196L17.5059 11.2275C18.609 10.7355 18.609 9.26516 17.5059 8.77322L10.0911 5.4666C9.73387 5.30728 9.37381 5.68361 9.54874 6.03348L12.9447 12.8254Z"
                                    fill="currentColor" />
                            </svg>
                            <span class="text-sm">Sent</span>
                        </div>
                        <p class="text-xs font-semibold"></p>
                    </button>
                </div>
            </div>
            <?php
}
       ?>

            <div class="bg-dark/90 dark:bg-white/5 backdrop-blur-sm lg:hidden z-[5] w-full h-full absolute rounded-lg hidden"
                :class="isShowChatMenu && '!block xl:!hidden'" @click="isShowChatMenu = !isShowChatMenu"></div>
            <div x-show="activeTab === 'compose'" class="flex flex-row items-start gap-4 relative w-full">
                <div
                    class="w-full flex flex-col flex-1 rounded-lg bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 overflow-y-auto h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                    <div class="p-5 dark:border-gray/20 border-b-2 border-lightgray/10">
                        <div class="flex items-center gap-5">
                            <button type="button" class="xl:hidden hover:text-primary duration-300"
                                @click="isShowChatMenu = !isShowChatMenu">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8"
                                        fill="currentColor"></rect>
                                    <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8"
                                        fill="currentColor"></rect>
                                    <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                                </svg>
                            </button>
                            <p class="font-semibold text-sm flex-1">New Notification</p>
                        </div>
                        <div class="flex items-center gap-5">
                            <div class="text-lightgray text-sm font-normal">
                                <div
                                    class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                    <div class="p-1">
                                        <span onclick="toggleVisibility()" class="text-sm/none shrink-0"
                                            style="background-color: #E9F2FF; padding: 10px; border-radius: 10px; margin-top: 10px; cursor: pointer;">
                                            Specific User
                                        </span>
                                    </div>

                                    <div class="p-1">
                                        <span class="text-sm/none shrink-0" onclick="toggleProgramsVisibility()"
                                            style="background-color: #E9F2FF;padding: 10px;border-radius: 10px;margin-top: 10px;cursor:pointer;">
                                            Specific Program
                                        </span>
                                    </div>
                                    <div class="p-1">
                                        <span class="text-sm/none shrink-0" onclick="toggleYearsVisibility()"
                                            style="background-color: #E9F2FF;padding: 10px;border-radius: 10px;margin-top: 10px;cursor:pointer;">Specific
                                            Year</span>
                                    </div>
                                    <div class="p-1">
                                        <span class="text-sm/none shrink-0" onclick="toggleBatchesVisibility()"
                                            style="background-color: #E9F2FF;padding: 10px;border-radius: 10px;margin-top: 10px;cursor:pointer;">Specific
                                            Batch</span>
                                    </div>
                                    <div class="p-1">
                                        <span class="text-sm/none shrink-0"
                                            style="background-color: #E9F2FF;padding: 10px;border-radius: 10px;margin-top: 10px;cursor:pointer;">Specific
                                            student</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <form action="{{ route('submitnotification') }}" method="POST" id="notificationForm"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="userid" id="userid" value="{{ $user->id }}">
                        <!-- Div to show/hide -->
                        <div id="specificUserDiv" class="p-5 dark:border-gray/20 border-b-2 border-lightgray/10 hidden">
                            <div class="flex items-center gap-6">
                                <span class="text-sm/none shrink-0">To:</span>
                                <div id="emailSelectContainer"
                                    class="form-control w-full text-sm flex flex-wrap items-center gap-2 p-2 border-gray-300 rounded">
                                    <select id="emailSelect" name="emails[]" class="form-control w-full"
                                        multiple="multiple" style="width: 100%;">
                                        <!-- Options will be loaded dynamically -->
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Hidden Programs Div -->
                        <div id="programsDiv" class="p-5 dark:border-gray/20 border-b-2 border-lightgray/10 hidden">
                            <div class="flex items-center gap-5">
                                <span class="text-sm/none shrink-0">Programs:</span>
                                @foreach($programsData as $program)
                                    <!-- Program 1 -->
                                    <div class="flex items-center gap-2">
                                        <input type="checkbox" id="program1" name="programs[]" value="{{ $program['id'] }}"
                                            class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                        <label for="program1" class="text-sm text-gray-700">
                                            {{ $program['name'] }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div id="yearssDiv" class="p-5 dark:border-gray/20 border-b-2 border-lightgray/10 hidden">
                            <div class="flex items-center gap-6">
                                <span class="text-sm/none shrink-0">Select Year(s):</span>
                                <div id="yearSelectContainer"
                                    class="form-control w-full text-sm flex flex-wrap items-center gap-2 p-2 border-gray-300 rounded">
                                    <select id="yearSelect" name="years[]" class="form-control w-full"
                                        multiple="multiple" style="width: 100%;">
                                        <!-- Options will be loaded dynamically -->
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div id="batchesDiv" class="p-5 dark:border-gray/20 border-b-2 border-lightgray/10 hidden">
                            <div class="flex items-center gap-6">
                                <span class="text-sm/none shrink-0">Select Batch(s):</span>
                                <div class="text-lightgray text-sm font-normal">
                                    <div
                                        class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4"
                                                style="margin-bottom: 12PX;font-size: 14PX;line-height:0px;">Select
                                                Program
                                            </h2>
                                            <select id="selectprogram" name="program" class="form-select" required
                                                style="font-size: 10PX;height: 40PX;">
                                                <option value="" disabled selected>Select Option</option>
                                                @foreach($programsData as $program)
                                                    <option value="{{ $program['id'] }}">
                                                        {{ $program['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4"
                                                style="margin-bottom: 12PX;font-size: 14PX;line-height:0px;">Select Year
                                            </h2>
                                            <select id="selectyear" name="selectyear" class="form-select" required
                                                style="font-size: 10PX;height: 40PX;">
                                                <option value="" disabled selected>Select Program First</option>
                                            </select>
                                        </div>

                                        <div class="p-1">
                                            <h2 class="font-semibold mb-4"
                                                style="font-size: 13px;line-height: 14px;margin-bottom:5px;">
                                                Select
                                                Batch
                                            </h2>
                                            <!-- Button to toggle dropdown -->
                                            <button id="batchdropdownSearchButton"
                                                data-dropdown-toggle="batchdropdownSearch"
                                                class="w-full inline-flex items-center justify-between px-4 font-medium"
                                                type="button" onclick="batchtoggleDropdown()"
                                                style="height: 42px;font-size: 11px;line-height: 10px; color: rgb(5 12 23 / var(--tw-text-opacity)); background-color: #F4F5F8; border-radius: 5px; border: 2px solid #E8EAF0;">
                                                <span>Select Batch</span> <!-- Added span for better alignment -->
                                                <svg style="color: #6B7280;" class="w-2.5 h-2.5 ms-2.5"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                </svg>
                                            </button>

                                            <!-- Dropdown menu -->
                                            <div id="batchdropdownSearch"
                                                class="absolute z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                                                <div class="p-3">
                                                    <label for="batch-input-group-search" class="sr-only">Search</label>
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                                                            style="margin-left: 10px;">
                                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                            </svg>
                                                        </div>
                                                        <input type="text" id="batch-input-group-search"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Search user" onkeyup="batchfilterList()">
                                                    </div>
                                                </div>
                                                <ul id="batchcheckboxList"
                                                    class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="batchdropdownSearchButton">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-5 dark:border-gray/20 border-b-2 border-lightgray/10">
                            <div class="flex items-center gap-5">
                                <span class="text-sm/none shrink-0">Subject:</span>
                                <input type="text" id="inputSubject" name="inputSubject" placeholder="Type Subject"
                                    class="form-control w-full text-sm p-0 !border-none placeholder:text-gray focus:ring-0 bg-transparent">
                            </div>
                        </div>

                        <div class="p-5 dark:border-gray/20 border-b-2 border-lightgray/10 flex-1">
                            <textarea style="height:200px;"
                                class="form-control w-full  text-sm p-0 !border-none placeholder:text-gray focus:ring-0 bg-transparent"
                                id="textareaMessage" name="textareaMessage" placeholder="Type Message:"></textarea>
                            <div id="filePreviewContainer" class="mt-2 flex flex-col gap-2"></div>
                        </div>

                        <div class="dark:border-gray/20 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-5 flex-wrap">
                                    <button type="button" id="submitnotification"
                                        class="flex items-center gap-5 bg-primary text-white py-3 px-3.5 rounded-full text-sm font-semibold">
                                        Send
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.6065 11.9716C10.7021 12.1626 10.619 12.3948 10.4239 12.4818L3.37261 15.6263C2.25074 16.1266 1.08706 15.0156 1.64276 13.9748L4.00678 9.54704C4.19064 9.20267 4.19064 8.79733 4.00678 8.45296L1.64276 4.02517C1.08706 2.98435 2.25074 1.87342 3.37261 2.37372L6.01584 3.55247C6.333 3.6939 6.59126 3.941 6.74656 4.2516L10.6065 11.9716Z"
                                                fill="currentColor"></path>
                                            <path opacity="0.3"
                                                d="M11.6498 11.5429C11.7395 11.7224 11.9546 11.7994 12.1379 11.7177L15.7548 10.1048C16.7476 9.66201 16.7476 8.33869 15.7548 7.89594L9.08152 4.91999C8.75999 4.7766 8.43593 5.1153 8.59338 5.43018L11.6498 11.5429Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </button>
                                    <div class="flex items-center flex-wrap gap-5">
                                        <!-- File Upload Button -->
                                        <button id="uploadButton"
                                            class="text-lightgray hover:text-primary duration-300">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.93764 13.3551L11.8558 7.69016C12.5663 7.01001 12.5663 5.90728 11.8558 5.22713C11.1453 4.54699 9.99323 4.54698 9.28268 5.22713L3.40741 10.851C2.05738 12.1433 2.05738 14.2385 3.40741 15.5308C4.75745 16.8231 6.94629 16.8231 8.29632 15.5308L14.2574 9.82478C16.2469 7.92037 16.2469 4.83272 14.2574 2.92831C12.2678 1.0239 9.04218 1.0239 7.05265 2.92831L2.24951 7.52596"
                                                    stroke="currentColor" stroke-width="1.6" stroke-linecap="round">
                                                </path>
                                            </svg>
                                        </button>
                                        <input type="file" id="fileInput" name="attachments[]" class="hidden"
                                            accept=".jpg,.jpeg,.png,.pdf" multiple />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div x-show="activeTab === 'inbox'" x-data="{selectedMail: false}"
                class="flex flex-row items-start gap-4 relative w-full h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                <div
                    class="lg:max-w-[300px] xl:max-w-md w-full flex-1 rounded-lg bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 overflow-hidden">
                    <div
                        class="bg-white dark:bg-dark dark:border-gray/20 border-b-2 border-lightgray/10 p-5 flex justify-between items-center gap-2.5">
                        <div class="flex items-center gap-2.5">
                            <button type="button" class="xl:hidden hover:text-primary duration-300"
                                @click="isShowChatMenu = !isShowChatMenu">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8"
                                        fill="currentColor" />
                                    <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8"
                                        fill="currentColor" />
                                    <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                </svg>
                            </button>
                            <input type="checkbox" id="checkMail" class="form-checkbox m-0">
                            <!-- <span class="text-xs">20 messages </span> -->
                            <p class="font-semibold line-clamp-1">Notification List </p>
                        </div>
                    </div>
                    <div class="overflow-y-auto h-[calc(100vh-258px)] sm:h-[calc(100vh-274px)] ">
                        @foreach($noticesData as $notice)
                            <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail"
                                onclick="showMessage({{ $notice->id }})" id="message-{{ $notice->id }}">
                                <div class="flex items-start gap-3.5">
                                    <div class="text-left flex-1">
                                        <!-- Display the Creator's Name -->
                                        <div class="flex items-center gap-1 justify-between">
                                            <p class="text-sm font-semibold">
                                                {{ $notice->created_by_name }}
                                            </p>
                                        </div>

                                        <!-- Display the Notice Subject -->
                                        <p class="text-xs font-semibold text-lightgray mt-2">
                                            {{ $notice->subject_title }}
                                        </p>

                                        <!-- Display the Notice Message -->
                                        <p class="mt-2 text-gray text-xs">
                                            {{ Str::limit($notice->message, 50, '...') }}
                                        </p>
                                    </div>
                                </div>
                            </button>
                            <div class="text-right mt-1">
                                <p class="text-xs text-gray">
                                    {{ \Carbon\Carbon::parse($notice->created_at)->format('d M Y, h:i A') }}
                                </p>
                            </div>
                            <div class="h-[2px] bg-lightgray/10 w-full dark:bg-gray/20"></div>

                            <!-- Display the Created At Field -->

                        @endforeach
                    </div>


                </div>
                <div class="flex-1 flex flex-col gap-2 justify-between overflow-y-auto rounded-lg absolute top-0 -right-full w-full bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 md:static h-full"
                    :class="selectedMail && '!right-0'">
                    <div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-3.5 flex-1">
                                    <button @click="selectedMail = !selectedMail"
                                        class="text-gray hover:text-primary md:hidden">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.0303 6.46967C9.73744 6.17678 9.26256 6.17678 8.96967 6.46967L3.96967 11.4697C3.67678 11.7626 3.67678 12.2374 3.96967 12.5303L8.96967 17.5303C9.26256 17.8232 9.73744 17.8232 10.0303 17.5303C10.3232 17.2374 10.3232 16.7626 10.0303 16.4697L5.56066 12L10.0303 7.53033C10.3232 7.23744 10.3232 6.76256 10.0303 6.46967Z"
                                                fill="currentColor" />
                                            <g opacity="0.5">
                                                <path
                                                    d="M6.31066 11.25H14.5C15.4534 11.25 16.8667 11.5298 18.0632 12.3914C19.298 13.2804 20.25 14.7556 20.25 17C20.25 17.4142 19.9142 17.75 19.5 17.75C19.0858 17.75 18.75 17.4142 18.75 17C18.75 15.2444 18.0353 14.2196 17.1868 13.6087C16.3 12.9702 15.2133 12.75 14.5 12.75L6.31066 12.75L5.56066 12L6.31066 11.25Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M3.80691 11.7129C3.77024 11.8013 3.75 11.8983 3.75 12C3.75 11.9023 3.76897 11.8046 3.80691 11.7129Z"
                                                    fill="currentColor" />
                                            </g>
                                        </svg>
                                    </button>
                                    <!-- <img src="{{ asset('public/assets/images/avatar-9.png') }}" class="h-[42px] rounded-full" alt=""> -->
                                    <div class="space-y-1.5">
                                        <div class="flex items-center gap-2.5 gap-y-1 flex-wrap">
                                            <div class="flex items-center gap-1.5">
                                                <p class="font-semibold text-sm" id="subjecttext"></p>
                                            </div>
                                            <p class="text-gray text-xs" id="sendbyemailid"></p>
                                        </div>
                                        <!-- <div class="flex items-center gap-5">
                                            <p class="text-gray text-xs">To: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                            <p class="text-gray text-xs">Cc: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- <div class="shrink-0 sm:block hidden">
                                    <p class="text-gray text-xs">20 Messages</p>
                                </div> -->
                            </div>
                        </div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5" id="message1">
                            <div class="space-y-5">
                                <div>
                                    <p class="mt-2 text-xs/loose font-normal text-gray" id="notificationmessage"> Please
                                        Select the notification</p>
                                        <div id="attachmentContainer"></div>
                                </div>
                                <!--here pdf file with icon-->
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-5 flex-wrap">
                                    <button type="button"
                                        class="flex items-center gap-5 bg-primary text-white py-3 px-3.5 rounded-full text-sm font-semibold">
                                        Send To
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.6065 11.9716C10.7021 12.1626 10.619 12.3948 10.4239 12.4818L3.37261 15.6263C2.25074 16.1266 1.08706 15.0156 1.64276 13.9748L4.00678 9.54704C4.19064 9.20267 4.19064 8.79733 4.00678 8.45296L1.64276 4.02517C1.08706 2.98435 2.25074 1.87342 3.37261 2.37372L6.01584 3.55247C6.333 3.6939 6.59126 3.941 6.74656 4.2516L10.6065 11.9716Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M11.6498 11.5429C11.7395 11.7224 11.9546 11.7994 12.1379 11.7177L15.7548 10.1048C16.7476 9.66201 16.7476 8.33869 15.7548 7.89594L9.08152 4.91999C8.75999 4.7766 8.43593 5.1153 8.59338 5.43018L11.6498 11.5429Z"
                                                fill="currentColor" />
                                        </svg>
                                    </button>
                                </div>
                                <div>
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.17017 4C9.582 2.83481 10.6932 2 11.9995 2C13.3057 2 14.4169 2.83481 14.8288 4"
                                                stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M20.4995 6H3.49945" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                            <path
                                                d="M18.8329 8.5L18.3729 15.3991C18.1959 18.054 18.1074 19.3815 17.2424 20.1907C16.3774 21 15.047 21 12.3862 21H11.6129C8.95205 21 7.62165 21 6.75664 20.1907C5.89163 19.3815 5.80313 18.054 5.62614 15.3991L5.1662 8.5"
                                                stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M9.49951 11L9.99951 16" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                            <path d="M14.4995 11L13.9995 16" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="activeTab === 'sent'" x-data="{selectedMail: false}"
                class="flex flex-row items-start gap-4 relative w-full h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                <div
                    class="lg:max-w-[300px] xl:max-w-md w-full flex-1 rounded-lg bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 overflow-hidden">
                    <div
                        class="bg-white dark:bg-dark dark:border-gray/20 border-b-2 border-lightgray/10 p-5 flex justify-between items-center gap-2.5">
                        <div class="flex items-center gap-2.5">
                            <button type="button" class="xl:hidden hover:text-primary duration-300"
                                @click="isShowChatMenu = !isShowChatMenu">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8"
                                        fill="currentColor" />
                                    <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8"
                                        fill="currentColor" />
                                    <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                </svg>
                            </button>
                            <input type="checkbox" id="checkSendMail7" class="form-checkbox m-0">
                            <!-- <span class="text-xs">20 messages </span> -->
                            <p class="font-semibold line-clamp-1">Notification List</p>
                        </div>
                    </div>
                    <!-- <div class="overflow-y-auto h-[calc(100vh-258px)] sm:h-[calc(100vh-274px)] ">
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail8" class="form-checkbox m-0">
                                    <img src="{{ asset('public/assets/images/avatar-10.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Bob Briscoe</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </div>
                            </div>
                        </button>
                        <div class="h-[2px] bg-lightgray/10 w-full dark:bg-gray/20"></div> 
                    </div> -->
                </div>
                <div class="flex-1 flex flex-col gap-2 justify-between overflow-y-auto rounded-lg absolute top-0 -right-full w-full bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 md:static h-full"
                    :class="selectedMail && '!right-0'">
                    <div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-3.5 flex-1">
                                    <button @click="selectedMail = !selectedMail"
                                        class="text-gray hover:text-primary md:hidden">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.0303 6.46967C9.73744 6.17678 9.26256 6.17678 8.96967 6.46967L3.96967 11.4697C3.67678 11.7626 3.67678 12.2374 3.96967 12.5303L8.96967 17.5303C9.26256 17.8232 9.73744 17.8232 10.0303 17.5303C10.3232 17.2374 10.3232 16.7626 10.0303 16.4697L5.56066 12L10.0303 7.53033C10.3232 7.23744 10.3232 6.76256 10.0303 6.46967Z"
                                                fill="currentColor" />
                                            <g opacity="0.5">
                                                <path
                                                    d="M6.31066 11.25H14.5C15.4534 11.25 16.8667 11.5298 18.0632 12.3914C19.298 13.2804 20.25 14.7556 20.25 17C20.25 17.4142 19.9142 17.75 19.5 17.75C19.0858 17.75 18.75 17.4142 18.75 17C18.75 15.2444 18.0353 14.2196 17.1868 13.6087C16.3 12.9702 15.2133 12.75 14.5 12.75L6.31066 12.75L5.56066 12L6.31066 11.25Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M3.80691 11.7129C3.77024 11.8013 3.75 11.8983 3.75 12C3.75 11.9023 3.76897 11.8046 3.80691 11.7129Z"
                                                    fill="currentColor" />
                                            </g>
                                        </svg>
                                    </button>
                                    <img src="{{ asset('assets/images/avatar-9.png') }}" class="h-[42px] rounded-full"
                                        alt="">
                                    <div class="space-y-1.5">
                                        <div class="flex items-center gap-2.5 gap-y-1 flex-wrap">
                                            <!-- <div class="flex items-center gap-1.5">
                                                <p class="font-semibold text-sm">New Project Lead</p>
                                            </div>
                                            <p class="text-gray text-xs">juliedick@gmail.com</p> -->
                                        </div>
                                        <!-- <div class="flex items-center gap-5">
                                            <p class="text-gray text-xs">To: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                            <p class="text-gray text-xs">Cc: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- <div class="shrink-0 sm:block hidden">
                                    <p class="text-gray text-xs">20 Messages</p>
                                </div> -->
                            </div>
                        </div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="space-y-5">
                                <div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-5 flex-wrap">
                                    <button type="button"
                                        class="flex items-center gap-5 bg-primary text-white py-3 px-3.5 rounded-full text-sm font-semibold">
                                        Send
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.6065 11.9716C10.7021 12.1626 10.619 12.3948 10.4239 12.4818L3.37261 15.6263C2.25074 16.1266 1.08706 15.0156 1.64276 13.9748L4.00678 9.54704C4.19064 9.20267 4.19064 8.79733 4.00678 8.45296L1.64276 4.02517C1.08706 2.98435 2.25074 1.87342 3.37261 2.37372L6.01584 3.55247C6.333 3.6939 6.59126 3.941 6.74656 4.2516L10.6065 11.9716Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M11.6498 11.5429C11.7395 11.7224 11.9546 11.7994 12.1379 11.7177L15.7548 10.1048C16.7476 9.66201 16.7476 8.33869 15.7548 7.89594L9.08152 4.91999C8.75999 4.7766 8.43593 5.1153 8.59338 5.43018L11.6498 11.5429Z"
                                                fill="currentColor" />
                                        </svg>
                                    </button>
                                </div>
                                <div>
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.17017 4C9.582 2.83481 10.6932 2 11.9995 2C13.3057 2 14.4169 2.83481 14.8288 4"
                                                stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M20.4995 6H3.49945" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                            <path
                                                d="M18.8329 8.5L18.3729 15.3991C18.1959 18.054 18.1074 19.3815 17.2424 20.1907C16.3774 21 15.047 21 12.3862 21H11.6129C8.95205 21 7.62165 21 6.75664 20.1907C5.89163 19.3815 5.80313 18.054 5.62614 15.3991L5.1662 8.5"
                                                stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M9.49951 11L9.99951 16" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                            <path d="M14.4995 11L13.9995 16" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<!-- jQuery (required for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("email", () => ({
            isShowChatMenu: false,
            selectMail: false,
        }));
    });
</script>
<script>

    function showMessage(noticeId) {
        // Use the passed notice ID
        var noticeIdfinal = noticeId;
        console.log("Notice ID:", noticeIdfinal);

        var baseUrl = '{{ env("APP_URL") }}'; // Get the base URL dynamically
        fetch(`${baseUrl}/getnoticfication/${noticeIdfinal}`)
    .then(response => response.json())
    .then(data => {
        console.log(data.notice);

        if (data) {
            // Update the subject text
            document.getElementById("subjecttext").innerText = data.notice.subject_title || "No Subject";

            // Update the email
            document.getElementById("sendbyemailid").innerText = data.notice.created_by?.email || "No Email";

            // Update the notification message
            document.getElementById("notificationmessage").innerText = data.notice.message || "No Message";

            // Clear any existing attachment previews
            const attachmentContainer = document.getElementById("attachmentContainer");
            attachmentContainer.innerHTML = "";

            // Add attachments dynamically
            data.notice.attachments.forEach((attachment) => {
                // Extract year and month from created_at
                const createdAt = new Date(attachment.created_at);
                const year = createdAt.getFullYear();
                const month = (createdAt.getMonth() + 1).toString();

                // Generate the file path
                const filePath = `public/uploads/notifications/${year}/${month}/${attachment.file_name}`;

                // Create the attachment preview div
                const attachmentDiv = document.createElement("div");
                attachmentDiv.className = "flex items-center gap-2.5 py-3 px-3.5 border-2 border-gray/10 rounded-full cursor-pointer";

                // Add the icon span
                const iconSpan = document.createElement("span");
                iconSpan.className = "text-purple";
                iconSpan.innerHTML = `
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M8.95147 1.77103e-07H9.04755C10.9802 -1.06016e-05 12.4947 -1.91331e-05 13.6764 0.158858C14.886 0.321477 15.8404 0.660832 16.5895 1.40997C17.3387 2.15912 17.678 3.11356 17.8407 4.3231C17.9995 5.50481 17.9995 7.01936 17.9995 8.95197V9.02588C17.9995 10.6239 17.9995 11.9321 17.9127 12.9973C17.8255 14.0677 17.6468 14.9621 17.2468 15.705C17.0703 16.0326 16.8535 16.326 16.5895 16.59C15.8404 17.3392 14.886 17.6785 13.6764 17.8411C12.4947 18 10.9802 18 9.04754 18H8.95148C7.01887 18 5.50432 18 4.32261 17.8411C3.11307 17.6785 2.15863 17.3392 1.40949 16.59C0.745346 15.9259 0.402375 15.0993 0.219992 14.0738C0.0408275 13.0665 0.00805295 11.8133 0.00124398 10.2571C-0.000487904 9.86121 -0.000487905 9.44254 -0.000487905 9.00084L-0.000488104 8.95196C-0.000498883 7.01935 -0.000507414 5.50481 0.158369 4.3231C0.320989 3.11356 0.660343 2.15912 1.40949 1.40997C2.15863 0.660832 3.11307 0.321477 4.32261 0.158858C5.50432 -1.91331e-05 7.01887 -1.06016e-05 8.95147 1.77103e-07Z" fill="currentColor"></path>
                        <path d="M16.7426 10.0721L16.5566 10.0463C14.1758 9.7167 11.9971 10.9544 10.8877 12.82C9.45654 9.19904 5.67448 6.72965 1.4485 7.33646L1.25948 7.36372C1.25544 7.86323 1.25533 8.40676 1.25533 9.00011C1.25533 9.44273 1.25533 9.85883 1.25705 10.2517C1.26391 11.8207 1.29898 12.969 1.4564 13.8541C1.6106 14.721 1.87296 15.2776 2.29748 15.7021C2.7744 16.1791 3.41966 16.4527 4.48995 16.5966C5.5783 16.743 7.00844 16.7443 8.99951 16.7443C10.9906 16.7443 12.4207 16.743 13.5091 16.5966C14.5794 16.4527 15.2246 16.1791 15.7015 15.7021C15.8773 15.5264 16.0214 15.332 16.1411 15.1097C16.4187 14.5941 16.5789 13.9043 16.6611 12.8954C16.7242 12.1202 16.7391 11.1975 16.7426 10.0721Z" fill="currentColor"></path>
                        <path d="M14.0228 5.65123C14.0228 6.57598 13.2731 7.32564 12.3484 7.32564C11.4236 7.32564 10.674 6.57598 10.674 5.65123C10.674 4.72647 11.4236 3.97681 12.3484 3.97681C13.2731 3.97681 14.0228 4.72647 14.0228 5.65123Z" fill="currentColor"></path>
                    </svg>
                `;

                // Add the file name span
                const fileNameSpan = document.createElement("span");
                fileNameSpan.className = "text-xs";
                fileNameSpan.innerText = attachment.file_name;

                // Make the div clickable for download
                attachmentDiv.addEventListener("click", () => {
                    window.location.href = `/${filePath}`;
                });

                // Append the elements
                attachmentDiv.appendChild(iconSpan);
                attachmentDiv.appendChild(fileNameSpan);
                attachmentContainer.appendChild(attachmentDiv);
            });

            console.log('Data successfully updated in the UI.');
        } else {
            console.error('No notice data found.');
        }
    })
    .catch(error => {
        console.error('Error fetching data:', error);

        document.getElementById("subjecttext").innerText = "Error fetching data";
        document.getElementById("sendbyemailid").innerText = "";
        document.getElementById("notificationmessage").innerText = "Please try again later.";
    });

    }

    function toggleVisibility() {
        var div = document.getElementById('specificUserDiv');
        var emailSelect = document.getElementById('emailSelect'); // Get the tags container

        if (div.classList.contains('hidden')) {
            div.classList.remove('hidden'); // Show the div
        } else {
            div.classList.add('hidden'); // Hide the div

            $(emailSelect).val([]).trigger('change'); // Clear the selection and update Select2
        }

        var batchesDiv = document.getElementById('batchesDiv'); // Get the year selection div
        batchesDiv.classList.add('hidden'); // Hide the div
        // Get all the checkboxes inside the batch dropdown and uncheck them
        var batchCheckboxes = document.querySelectorAll('#batchcheckboxList input[type="checkbox"]');
        batchCheckboxes.forEach(function (checkbox) {
            checkbox.checked = false; // Uncheck each checkbox
        });



        var programsDiv = document.getElementById('programsDiv');
        programsDiv.classList.add('hidden'); // Hide the div

        var yearssDiv = document.getElementById('yearssDiv'); // Get the year selection div
        var yearSelect = document.getElementById('yearSelect'); // Get the Select2 dropdown element

        yearssDiv.classList.add('hidden'); // Hide the div
        // If the div is being hidden, clear the selected years in the Select2 dropdown
        if (yearssDiv.classList.contains('hidden')) {
            // Clear the selected options in the Select2 dropdown
            $(yearSelect).val([]).trigger('change'); // Clear the selection and update Select2
        }


    }


    function toggleProgramsVisibility() {
        var div = document.getElementById('programsDiv');
        var checkboxes = div.querySelectorAll('input[type="checkbox"]'); // Get all checkboxes inside the 'programsDiv'
        div.classList.toggle('hidden'); // Toggle the 'hidden' class

        // Uncheck all checkboxes
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = false; // Uncheck the checkbox
        });

        var yearssDiv = document.getElementById('yearssDiv'); // Get the year selection div
        var yearSelect = document.getElementById('yearSelect'); // Get the Select2 dropdown element

        yearssDiv.classList.add('hidden'); // Hide the div

        // If the div is being hidden, clear the selected years in the Select2 dropdown
        if (yearssDiv.classList.contains('hidden')) {
            // Clear the selected options in the Select2 dropdown
            $(yearSelect).val([]).trigger('change'); // Clear the selection and update Select2
        }

        var batchesDiv = document.getElementById('batchesDiv'); // Get the year selection div
        batchesDiv.classList.add('hidden'); // Hide the div
        // Get all the checkboxes inside the batch dropdown and uncheck them
        var batchCheckboxes = document.querySelectorAll('#batchcheckboxList input[type="checkbox"]');
        batchCheckboxes.forEach(function (checkbox) {
            checkbox.checked = false; // Uncheck each checkbox
        });


        var specificUserDiv = document.getElementById('specificUserDiv');
        specificUserDiv.classList.add('hidden'); // Hide the 'specificUserDiv'
        var emailSelect = document.getElementById('emailSelect'); // Get the tags container
        $(emailSelect).val([]).trigger('change'); // Clear the selection and update Select2
    }

    // Function to toggle the visibility of the year selection dropdown
    function toggleYearsVisibility() {
        var div = document.getElementById('yearssDiv'); // Get the year selection div
        var yearSelect = document.getElementById('yearSelect'); // Get the Select2 dropdown element

        // Toggle the visibility of the div
        div.classList.toggle('hidden');

        // If the div is being hidden, clear the selected years in the Select2 dropdown
        if (div.classList.contains('hidden')) {
            // Clear the selected options in the Select2 dropdown
            $(yearSelect).val([]).trigger('change'); // Clear the selection and update Select2
        }


        var programsDiv = document.getElementById('programsDiv');
        programsDiv.classList.add('hidden'); // Hide the div

        var batchesDiv = document.getElementById('batchesDiv'); // Get the year selection div
        batchesDiv.classList.add('hidden'); // Hide the div
        // Get all the checkboxes inside the batch dropdown and uncheck them
        var batchCheckboxes = document.querySelectorAll('#batchcheckboxList input[type="checkbox"]');
        batchCheckboxes.forEach(function (checkbox) {
            checkbox.checked = false; // Uncheck each checkbox
        });


        var specificUserDiv = document.getElementById('specificUserDiv');
        specificUserDiv.classList.add('hidden'); // Hide the 'specificUserDiv'
        var emailSelect = document.getElementById('emailSelect'); // Get the tags container
        $(emailSelect).val([]).trigger('change'); // Clear the selection and update Select2

    }

    // Function to toggle the visibility of the year selection dropdown
    function toggleBatchesVisibility() {
        var batchesDiv = document.getElementById('batchesDiv'); // Get the year selection div

        // Toggle the visibility of the div
        batchesDiv.classList.toggle('hidden');

        // Get all the checkboxes inside the batch dropdown and uncheck them
        var batchCheckboxes = document.querySelectorAll('#batchcheckboxList input[type="checkbox"]');
        batchCheckboxes.forEach(function (checkbox) {
            checkbox.checked = false; // Uncheck each checkbox
        });

        var yearssDiv = document.getElementById('yearssDiv'); // Get the year selection div
        var yearSelect = document.getElementById('yearSelect'); // Get the Select2 dropdown element

        yearssDiv.classList.add('hidden'); // Hide the div

        // If the div is being hidden, clear the selected years in the Select2 dropdown
        if (yearssDiv.classList.contains('hidden')) {
            // Clear the selected options in the Select2 dropdown
            $(yearSelect).val([]).trigger('change'); // Clear the selection and update Select2
        }

        var programsDiv = document.getElementById('programsDiv');
        programsDiv.classList.add('hidden'); // Hide the div

        var specificUserDiv = document.getElementById('specificUserDiv');
        specificUserDiv.classList.add('hidden'); // Hide the 'specificUserDiv'
        var emailSelect = document.getElementById('emailSelect'); // Get the tags container
        $(emailSelect).val([]).trigger('change'); // Clear the selection and update Select2

    }



    $(document).ready(function () {
        // Array of years with their corresponding IDs
        var years = @json($YearsData);

        // Initialize Select2 on the select element
        $('#yearSelect').select2({
            placeholder: 'Select Year(s)',
            allowClear: true
        });

        // Populate the Select2 dropdown dynamically
        years.forEach(function (year) {
            $('#yearSelect').append(new Option(year.name, year.id));
        });

        // Handle the select change event to display the selected years
        $('#yearSelect').on('change', function () {
            var selectedValues = $(this).val(); // Get selected values (IDs)
            console.log('Selected IDs:', selectedValues);

            var selectedTexts = $('#yearSelect').select2('data').map(function (item) {
                return item.name; // Get displayed texts
            });
            console.log('Displayed Years:', selectedTexts);
        });




        // Array of years with their corresponding IDs
        var emails = @json($UsersData);

        // Initialize Select2 on the select element
        $('#emailSelect').select2({
            placeholder: 'Select Email(s)',
            allowClear: true
        });

        // Populate the Select2 dropdown dynamically
        emails.forEach(function (email) {
            $('#emailSelect').append(new Option(email.email, email.id));
        });

        // Handle the select change event to display the selected years
        $('#emailSelect').on('change', function () {
            var selectedValues = $(this).val(); // Get selected values (IDs)
            console.log('Selected IDs:', selectedValues);

            var selectedTexts = $('#emailSelect').select2('data').map(function (item) {
                return item.email; // Get displayed texts
            });
            console.log('Displayed Years:', selectedTexts);
        });
    });



    document.addEventListener("DOMContentLoaded", function () {
        const emailInput = document.getElementById("emailInput");
        const emailTagsContainer = document.getElementById("emailTagsContainer");

        // Function to create an email tag
        function createEmailTag(email) {
            const emailTag = document.createElement("div");
            emailTag.classList.add("email-tag");
            emailTag.innerHTML = `
            <span>${email}</span>
            <span class="remove-tag" onclick="this.parentElement.remove()">x</span>
        `;
            emailTagsContainer.insertBefore(emailTag, emailInput);
        }

        // Listen for input changes
        emailInput.addEventListener("input", function (event) {
            const value = event.target.value.trim();
            if (value.includes(",")) {
                const emails = value.split(",");
                emails.forEach(email => {
                    if (email.trim() !== "") {
                        createEmailTag(email.trim());
                    }
                });
                event.target.value = ""; // Clear the input field
            }
        });
    });



    document.addEventListener('DOMContentLoaded', function () {
        const submitButton = document.getElementById('submitnotification');
        const form = document.getElementById('notificationForm');

        submitButton.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent form submission to check the fields

            const subject = document.getElementById('inputSubject').value.trim();
            const message = document.getElementById('textareaMessage').value.trim();

            let isValid = true;

            // Hide any existing error messages
            document.querySelectorAll('.text-red-500').forEach(el => el.classList.add('hidden'));

            // Check if subject is empty
            if (!subject) {
                showToast('Subject is required.', 'bg-danger');
                isValid = false;
            }

            // Check if message is empty
            if (!message) {
                showToast('Message is required.', 'bg-danger');
                isValid = false;
            }

            // If all fields are valid, submit the form
            if (isValid) {
                form.submit();
            }
        });

        // Show the toast notification with custom message
        function showToast(message, bgClass) {
            const toast = document.createElement('div');
            toast.classList.add(bgClass, 'text-white', 'py-3', 'px-4', 'rounded-md', 'max-w-[240px]', 'fixed', 'top-5', 'right-5', 'z-[99999]');
            toast.setAttribute('x-data', '{ toastVisible: true, toastTimer: null }');
            toast.setAttribute('x-init', 'toastTimer = setTimeout(() => toastVisible = false, 6000)');
            toast.innerHTML = `
                <div x-show="toastVisible" class="transition ease-out duration-300" x-transition:enter="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="opacity-100" x-transition:leave-end="opacity-0">
                    <span>${message}</span>
                </div>
            `;
            document.body.appendChild(toast);
        }
    });







    //Edit Forma
    // Function to toggle dropdown visibility
    function batchtoggleDropdown() {
        document.getElementById("batchdropdownSearch").classList.toggle('hidden');
    }

    // Function to filter the checkbox list based on search input
    function batchfilterList() {
        const input = document.getElementById("batch-input-group-search").value.toLowerCase();
        const checkboxes = document.querySelectorAll("#batchcheckboxList li");

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
        const dropdown = document.getElementById("batchdropdownSearch");
        if (!event.target.matches('#batchdropdownSearchButton') && !event.target.matches('#batch-input-group-search') && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    };




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
        } else {
            document.getElementById('selectyear').innerHTML = '<option value="" disabled selected>Select Year</option>';
        }
    });


    document.getElementById('selectyear').addEventListener('change', function () {
        var yearId = this.value;
        var baseUrl = '{{ env("APP_URL") }}/Studentsetting'; // Get the base URL dynamically
        console.log(yearId);
        if (yearId) {
            fetch(`${baseUrl}/getBatch/${yearId}`)
                .then(response => response.json())
                .then(data => {
                    var selectBatch = document.getElementById('batchcheckboxList');
                    selectBatch.innerHTML = ''; // Clear the previous batches

                    // Loop through the returned batches and create checkboxes
                    data.batches.forEach(function (batch) {
                        // Create a list item
                        var li = document.createElement('li');

                        // Create the div container for the checkbox
                        var div = document.createElement('div');
                        div.className = 'flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600';

                        // Create the checkbox input element
                        var checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.id = `checkbox-item-${batch.id}`;
                        checkbox.value = batch.id;
                        checkbox.name = 'batches[]';
                        checkbox.className = 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500';

                        // Create the label element
                        var label = document.createElement('label');
                        label.setAttribute('for', `checkbox-item-${batch.id}`);
                        label.className = 'w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300';
                        label.textContent = batch.name;

                        // Append the checkbox and label to the div
                        div.appendChild(checkbox);
                        div.appendChild(label);

                        // Append the div to the li
                        li.appendChild(div);

                        // Append the li to the batch list container
                        selectBatch.appendChild(li);
                    });
                })
                .catch(error => {
                    console.error('Error fetching batches:', error);
                });
        } else {
            document.getElementById('batchcheckboxList').innerHTML = '<option value="" disabled selected>First Create Batches</option>';
        }
    });




</script>
<script>
    const uploadButton = document.getElementById("uploadButton");
    const fileInput = document.getElementById("fileInput");
    const filePreviewContainer = document.getElementById("filePreviewContainer");

    uploadButton.addEventListener("click", () => {
        fileInput.click();
    });

    fileInput.addEventListener("change", (event) => {
        const dt = new DataTransfer();
        const files = Array.from(event.target.files);

        files.forEach((file) => {
            // Add the file to DataTransfer object
            dt.items.add(file);

            // Create a wrapper div for the preview and input
            const previewDiv = document.createElement("div");
            previewDiv.className =
                "flex items-center justify-between p-2 border border-lightgray/20 rounded text-sm bg-gray-100 dark:bg-gray-800";

            // Display the file name
            const fileNameInput = document.createElement("input");
            fileNameInput.type = "text";
            fileNameInput.className =
                "text-gray-800 bg-transparent border-none focus:ring-0";
            fileNameInput.value = file.name;
            fileNameInput.readOnly = true;

            // Add a close button to remove the file preview and input
            const closeButton = document.createElement("button");
            closeButton.textContent = "✕";
            closeButton.className =
                "text-red-500 hover:text-red-700 font-bold ml-2 cursor-pointer";
            closeButton.addEventListener("click", () => {
                // Remove the file from DataTransfer
                for (let i = 0; i < dt.items.length; i++) {
                    if (dt.items[i].getAsFile() === file) {
                        dt.items.remove(i);
                        break;
                    }
                }

                // Remove the preview
                previewDiv.remove();

                // Update the file input
                fileInput.files = dt.files;
            });

            // Append elements to the preview div
            previewDiv.appendChild(fileNameInput);
            previewDiv.appendChild(closeButton);

            // Append the preview div to the container
            filePreviewContainer.appendChild(previewDiv);
        });

        // Update the file input with the new files
        fileInput.files = dt.files;
    });

</script>
@endsection