@extends('Layout.layout')

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
                <li>Quiz Management</li>
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
                            <option>BDS</option>
                            <option>MBBS</option>
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
        <div class="flex flex-wrap gap-3 ">
            <div x-data="modals">
                <div class="flex flex-wrap items-center gap-5">
                    Add New Quiz-><svg style="cursor: pointer;" @click="toggle" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                <h5 class="font-semibold text-lg">Add Quiz</h5>
                                <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path
                                            d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-5 space-y-4">
                                <div class="text-lightgray text-sm font-normal">
                                    <form action="{{ route('quizcreate') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div
                                            class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Quiz Submission Date</h2>
                                                <div id="date-range-picker" class="flex items-center">
                                                    <div class="relative">
                                                        <input id="datepicker-range-start" name="start_date" type="text"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Select start date">
                                                    </div>
                                                    <span class="mx-4 text-gray-500">to</span>
                                                    <div class="relative">
                                                        <input id="datepicker-range-end" name="end_date" type="text"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Select end date">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="p-1">
                                                <input id="created_by" name="created_by" type="hidden"
                                                    class="form-input w-full" value="{{ $user->id }}" required>
                                                <h2 class="text-base font-semibold mb-4">Program</h2>
                                                <select id="selectprogram-add" name="program_id" class="form-select">
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
                                                <select id="selectyear-add" name="year_id" class="form-select">
                                                    <option value="" disabled selected>Select Program First</option>
                                                </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Select Type</h2>
                                                <select id="selecttype-add" name="quiz_type" class="form-select">
                                                    <option value="" disabled selected>Select Year First</option>
                                                </select>
                                            </div>
                                            <div class="p-1" id="batchesdisplay" style="display:none;">
                                                <h2 class="text-base font-semibold mb-4">Batches</h2>
                                                <!-- Button to toggle dropdown -->
                                                <button id="batchesdropdownSearchButton"
                                                    data-dropdown-toggle="batchesdropdownSearch"
                                                    class="w-full inline-flex items-center justify-between px-4 text-sm font-medium"
                                                    type="button" onclick="batchestoggleDropdown()"
                                                    style="height: 48px; color: rgb(5 12 23 / var(--tw-text-opacity)); background-color: #F4F5F8; border-radius: 5px; border: 2px solid #E8EAF0;">
                                                    <span>Select Batches</span> <!-- Added span for better alignment -->
                                                    <svg style="color: #6B7280;" class="w-2.5 h-2.5 ms-2.5"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 10 6">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                    </svg>
                                                </button>

                                                <!-- Dropdown menu -->
                                                <div id="batchesdropdownSearch"
                                                    class="absolute z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                                                    <div class="p-3">
                                                        <label for="batches-input-group-search"
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
                                                            <input type="text" id="batches-input-group-search"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Search user" onkeyup="batchesfilterList()">
                                                        </div>
                                                    </div>
                                                    <ul id="batchescheckboxList"
                                                        class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                                        aria-labelledby="batchesdropdownSearchButton">
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="p-1" id="studentdisplay" style="display:none;">
                                                <h2 class="text-base font-semibold mb-4">Student's List</h2>
                                                <!-- Button to toggle dropdown -->
                                                <button id="studentsdropdownSearchButton"
                                                    data-dropdown-toggle="studentsdropdownSearch"
                                                    class="w-full inline-flex items-center justify-between px-4 text-sm font-medium"
                                                    type="button" onclick="studentstoggleDropdown()"
                                                    style="height: 48px; color: rgb(5 12 23 / var(--tw-text-opacity)); background-color: #F4F5F8; border-radius: 5px; border: 2px solid #E8EAF0;">
                                                    <span>Select Student's</span>
                                                    <!-- Added span for better alignment -->
                                                    <svg style="color: #6B7280;" class="w-2.5 h-2.5 ms-2.5"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 10 6">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                    </svg>
                                                </button>

                                                <!-- Dropdown menu -->
                                                <div id="studentsdropdownSearch"
                                                    class="absolute z-10 hidden bg-white rounded-lg shadow w-60 dark:bg-gray-700">
                                                    <div class="p-3">
                                                        <label for="students-input-group-search"
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
                                                            <input type="text" id="students-input-group-search"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Search user"
                                                                onkeyup="studentsfilterList()">
                                                        </div>
                                                    </div>
                                                    <ul id="studentscheckboxList"
                                                        class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                                                        aria-labelledby="studentsdropdownSearchButton">
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Group</h2>
                                                <select id="selectgroupid" class="form-select" name="group_id">
                                                    <option value="" disabled selected>Select Option</option>
                                                    @foreach($questiongroupsData as $questiongroups)
                                                        <option value="{{ $questiongroups['id'] }}">
                                                            {{ $questiongroups['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Quiz Title</h2>
                                                <input id="quiz_title" name="quiz_title" type="text"
                                                    class="form-input w-full" placeholder="Quiz Title" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Minimum Percentage</h2>
                                                <input id="percentage" name="percentage" type="number"
                                                    class="form-input w-full" placeholder="Minimum Percentage" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Quiz Time (in minutes)</h2>
                                                <input id="quiztime" name="quiztime" type="number"
                                                    class="form-input w-full" placeholder=">Quiz Time" required>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Set Total Questions</h2>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="totalquestion"
                                                        id="totalquestion_number_yes" class="form-radio text-primary"
                                                        value="1">
                                                    <span class="text-sm">Yes</span>
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="totalquestion"
                                                        id="totalquestion_number_no" class="form-radio text-primary"
                                                        checked="" value="0">
                                                    <span class="text-sm">No</span>
                                                </label>
                                                <!-- Span for showing error message -->
                                                <span id="error-message"
                                                    style="display: none; color: red; font-size: 12px;">Please select a
                                                    group first.</span>
                                            </div>

                                            <div id="totalQuestionsContainer" class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Number Of Question (Total
                                                    Questions
                                                    5)</h2>
                                                <input id="totalquestion_number_input" name="totalquestion_number_input"
                                                    type="text" class="form-input w-full"
                                                    placeholder="Number Of Question">
                                                <input id="totalquestion_number" name="totalquestion_number"
                                                    type="hidden" class="form-input w-full" value="">
                                            </div>

                                        </div>
                                        <div
                                            class="mt-16 grid grid-cols-1 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 p-4">
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Change Default Settings</h2>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="set_default_setting"
                                                        id="set_default_setting_yes" class="form-radio text-primary"
                                                        value="1">
                                                    <span class="text-sm">Yes</span>
                                                </label>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="set_default_setting"
                                                        id="set_default_setting_no" class="form-radio text-primary"
                                                        checked="" value="0">
                                                    <span class="text-sm">No</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div id="checkboxContainer"
                                            class="mt-16 grid grid-cols-1 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 p-4 hidden">
                                            <div class="p-1">
                                                <div class="grid grid-cols-1 gap-3">
                                                    <label class="inline-flex items-center">
                                                        <input type="checkbox" id="see_ans_sheet" name="see_ans_sheet"
                                                            class="form-checkbox text-primary" checked="">
                                                        <span class="text-sm">See Answer Sheet</span>
                                                    </label>
                                                    <label class="inline-flex items-center">
                                                        <input type="checkbox" id="show_corr_anssheet"
                                                            name="show_corr_anssheet" class="form-checkbox text-primary"
                                                            checked="">
                                                        <span class="text-sm">Show Correct Ans In Answer Sheet</span>
                                                    </label>
                                                    <label class="inline-flex items-center">
                                                        <input type="checkbox" id="show_wrong_anssheet"
                                                            name="show_wrong_anssheet"
                                                            class="form-checkbox text-primary" checked="">
                                                        <span class="text-sm">Show Only Wrong Ans In Answer Sheet</span>
                                                    </label>
                                                    <label class="inline-flex items-center">
                                                        <input type="checkbox" id="random_question"
                                                            name="random_question" class="form-checkbox text-primary"
                                                            checked="">
                                                        <span class="text-sm">Random Question</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="mt-16 grid grid-cols-1 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 p-4">
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Quiz Instruction</h2>
                                                <textarea name="quiz_instruction" id="editor1" rows="10" cols="80">
                                                </textarea>
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
            <!--modal end -->
            Add Question-> <a href="{{ route(name: 'addnewquestion') }}"><svg style="cursor: pointer;" @click="toggle"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                        d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                        stroke="#1C274C" stroke-width="1.5" />
                    <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="#1C274C" stroke-width="1.5"
                        stroke-linecap="round" />
                </svg></a>
            Question Group-> <a href="{{ route(name: 'addnewquestiongroup') }}"><svg style="cursor: pointer;"
                    @click="toggle" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                        d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                        stroke="#1C274C" stroke-width="1.5" />
                    <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="#1C274C" stroke-width="1.5"
                        stroke-linecap="round" />
                </svg></a>
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
                                    <p>Start Date</p>
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
                                    <p class="">End Date</p>
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
                            <th width="20%">
                                <div class="flex items-center justify-between gap-2">
                                    <p class="">Quiz Time (in minutes)</p>
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
                                        Group Name
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
                                        <span x-text="item.start_date"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.end_date"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.quiztime"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.programName"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.yearname"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.username"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.groupname"></span>
                                    </td>
                                    <td>
                                        <template x-if="checkStatus(item.start_date, item.end_date) === 'expired'">
                                            <div class="rounded p-3 bg-danger/10 text-danger mt-3 text-center">
                                                Expired
                                            </div>
                                        </template>
                                        <template x-if="checkStatus(item.start_date, item.end_date) === 'active'">
                                            <div class="rounded p-3 bg-success/10 text-success mt-3 text-center">
                                                Active
                                            </div>
                                        </template>
                                        <template x-if="checkStatus(item.start_date, item.end_date) === 'not_active'">
                                            <div class="rounded p-3 bg-warning/10 text-warning mt-3 text-center">
                                                Not Active
                                            </div>
                                        </template>
                                    </td>
                                    <td>
                                        <div class="mt-3 flex gap-8 items-center justify-center">
                                            <svg style="cursor: pointer;" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                @click="handleDownload(item.id)">
                                                <path
                                                    d="M9 4.45962C9.91153 4.16968 10.9104 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C3.75612 8.07914 4.32973 7.43025 5 6.82137"
                                                    stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                                <path
                                                    d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
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

@endsection

@section('script')
<script>
    window.mergedData = @json($quizsData);
    console.log(window.mergedData); // Debug to ensure data is being passed correctly
</script>
<!-- Datatables Js -->
<script src="{{ asset('public/assets/js/gernelsettingdata/datatableassignment.js') }}"></script>
<script src="{{ asset('public/assets/js/data-search.js') }}"></script>
<script>
    tinymce.init({
        selector: '#editor1',
        plugins: 'image media link code table lists fullscreen', // Add advanced plugins
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code fullscreen', // Define the toolbar with advanced options
        menubar: 'file edit view insert format tools table help', // Enable the menubar
        image_advtab: true, // Advanced tab for images
        content_css: 'https://www.tiny.cloud/css/codepen.min.css' // Custom CSS if needed
    });
</script>
<script>
    window.checkStatus = function (startDate, endDate) {
        const today = new Date().toISOString().split('T')[0];

        const start = new Date(startDate);
        const end = new Date(endDate);
        const current = new Date(today);

        if (end < current) {
            return 'expired'; // End date is in the past, so expired
        } else if (start <= current && end >= current) {
            return 'active'; // Start date is today or earlier, and end date is in the future
        } else if (start > current) {
            return 'not_active'; // Start date is in the future, not active yet
        }
    }
</script>
<script>
    function myComponent() {
        return {
            handleDownload(quizId) {
                var baseUrl = '{{ env("APP_URL") }}/lms';
                console.log('Quiz ID:', quizId);
                window.location.href = baseUrl + `/viewquiz/${quizId}`; // Redirect to the download URL
            }
        }
    }
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    // Event listener for the 'Yes' radio button
    document.getElementById('totalquestion_number_yes').addEventListener('click', function () {
        // Get the selected group_id
        var groupId = document.getElementById('selectgroupid').value;
        const errorMessage = document.getElementById('error-message'); // Get the error message element
        var baseUrl = '{{ env("APP_URL") }}/quiz'; // Get the base URL dynamically

        if (!groupId) {
            // Show the error message if no group is selected
            errorMessage.style.display = 'block';
            return;
        }

        // Fetch total questions for the selected group
        fetch(`${baseUrl}/gettotalquestionofgroup/${groupId}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Display the total questions dynamically
                const totalQuestions = data.totalQuestions; // Assuming the API returns this
                document.querySelector('#totalQuestionsContainer h2').innerHTML = `Number Of Question (Total Questions available ${totalQuestions})`;

                // Update hidden input value
                document.getElementById('totalquestion_number').value = totalQuestions;
            })
            .catch(error => {
                console.error('Error fetching total questions:', error);
            });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const yesRadio = document.getElementById('totalquestion_number_yes');
        const noRadio = document.getElementById('totalquestion_number_no');
        const totalQuestionsContainer = document.getElementById('totalQuestionsContainer');
        const selectGroup = document.getElementById('selectgroupid');
        const errorMessage = document.getElementById('error-message'); // Get the error message element

        // Function to show the input field
        function showInputField() {
            totalQuestionsContainer.style.display = 'block'; // Show input field
        }

        // Function to hide the input field
        function hideInputField() {
            totalQuestionsContainer.style.display = 'none'; // Hide input field
        }

        // Reset radio buttons and hide input when group is changed
        selectGroup.addEventListener('change', function () {
            // Set "No" radio as checked
            noRadio.checked = true;
            // Hide the input field and reset error message
            hideInputField();
            errorMessage.style.display = 'none';
            var groupId = document.getElementById('selectgroupid').value;
            var baseUrl = '{{ env("APP_URL") }}/quiz'; // Get the base URL dynamically

            // Fetch total questions for the selected group
            fetch(`${baseUrl}/gettotalquestionofgroup/${groupId}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // Display the total questions dynamically
                    const totalQuestions = data.totalQuestions; // Assuming the API returns this

                    // Update hidden input value
                    document.getElementById('totalquestion_number').value = totalQuestions;
                })
                .catch(error => {
                    console.error('Error fetching total questions:', error);
                });
        });


        yesRadio.addEventListener('change', function () {
            const groupId = selectGroup.value;
            console.log(groupId);
            if (!groupId) {
                // Show the error message if no group is selected
                errorMessage.style.display = 'block';
                return;
            }
            // Hide the error message if group is selected
            errorMessage.style.display = 'none';
            showInputField(); // Show input field when "Yes" is selected
        });

        noRadio.addEventListener('change', function () {
            hideInputField(); // Hide input field when "No" is selected
        });

        // Initial state
        hideInputField(); // Start with input hidden
    });
</script>
<script>
    function createOptions() {
        // Get the number of options entered
        const numberOfOptions = document.getElementById('optionNumber').value;

        // Get the container where we want to add the radio buttons and inputs
        const optionsContainer = document.getElementById('optionsContainer');

        // Clear any existing options before generating new ones
        optionsContainer.innerHTML = '';

        // Create the inputs based on the number entered
        for (let i = 1; i <= numberOfOptions; i++) {
            // Create a div to hold the input and radio button
            const optionDiv = document.createElement('div');
            optionDiv.classList.add('flex', 'items-center', 'mb-2');

            // Create the radio button
            const radioButton = document.createElement('input');
            radioButton.type = 'radio';
            radioButton.name = 'quizOption';
            radioButton.value = `Option ${i}`;
            radioButton.id = `optionRadio${i}`;

            // Create the input field for the option
            const optionInput = document.createElement('input');
            optionInput.type = 'text';
            optionInput.placeholder = `Option ${i}`;
            optionInput.classList.add('ml-2', 'form-input', 'rounded-md');

            // Append the radio button and input field to the div
            optionDiv.appendChild(radioButton);
            optionDiv.appendChild(optionInput);

            // Append the div to the options container
            optionsContainer.appendChild(optionDiv);
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const yesRadio = document.getElementById('set_default_setting_yes');
        const noRadio = document.getElementById('set_default_setting_no');
        const checkboxContainer = document.getElementById('checkboxContainer');

        yesRadio.addEventListener('change', function () {
            if (yesRadio.checked) {
                checkboxContainer.classList.remove('hidden');
                checkboxContainer.classList.remove('disabled');
            }
        });

        noRadio.addEventListener('change', function () {
            if (noRadio.checked) {
                checkboxContainer.classList.add('hidden');
                checkboxContainer.classList.add('disabled');
                // Optionally, uncheck all checkboxes if needed
                checkboxContainer.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
                    checkbox.checked = true;
                });
            }
        });
    });

</script>
<script type="text/javascript">


    document.getElementById('selectprogram-add').addEventListener('change', function () {
        var programId = this.value;
        var baseUrl = '{{ env("APP_URL") }}/Studentsetting'; // Get the base URL dynamically
        console.log(programId);
        if (programId) {
            fetch(`${baseUrl}/get-years/${programId}`)
                .then(response => response.json())
                .then(data => {
                    var yearSelect = document.getElementById('selectyear-add');
                    yearSelect.innerHTML = '<option value="" disabled selected>Select Year</option>';

                    data.years.forEach(function (year) {
                        var option = document.createElement('option');
                        option.value = year.id;
                        option.textContent = year.name;
                        yearSelect.appendChild(option);
                    });
                });
        } else {
            document.getElementById('selectyear-add').innerHTML = '<option value="" disabled selected>Select Year</option>';
        }
    });


    function batchestoggleDropdown() {
        document.getElementById("batchesdropdownSearch").classList.toggle('hidden');
    }

    // Function to filter the checkbox list based on search input
    function batchesfilterList() {
        const input = document.getElementById("batches-input-group-search").value.toLowerCase();
        const checkboxes = document.querySelectorAll("#batchescheckboxList li");

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
        const dropdown = document.getElementById("batchesdropdownSearch");
        if (!event.target.matches('#batchesdropdownSearchButton') && !event.target.matches('#batches-input-group-search') && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    };







    function studentstoggleDropdown() {
        document.getElementById("studentsdropdownSearch").classList.toggle('hidden');
    }

    // Function to filter the checkbox list based on search input
    function studentsfilterList() {
        const input = document.getElementById("students-input-group-search").value.toLowerCase();
        const checkboxes = document.querySelectorAll("#studentscheckboxList li");

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
        const dropdown = document.getElementById("studentsdropdownSearch");
        if (!event.target.matches('#studentsdropdownSearchButton') && !event.target.matches('#students-input-group-search') && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    };




    document.getElementById('selectyear-add').addEventListener('change', function () {
        var yearId = this.value;
        var baseUrl = '{{ env("APP_URL") }}/Studentsetting'; // Get the base URL dynamically
        console.log(yearId);

        // Get the select element for program
        var programSelect = document.getElementById('selectprogram-add');

        // Get the selected value
        var selectedProgramValue = programSelect.value;

        // Print or use the selected value
        console.log('Selected Program Value:', selectedProgramValue);

        var typeSelect = document.getElementById('selecttype-add');

        // Clear all previous options
        typeSelect.innerHTML = "";

        // Add default option
        var defaultOption = document.createElement('option');
        defaultOption.value = "";
        defaultOption.text = "Select Assignment Type";
        defaultOption.disabled = true;
        defaultOption.selected = true;
        typeSelect.appendChild(defaultOption);

        // Add new options after selecting a year
        var options = [
            { value: "1", text: "Whole Class" },
            { value: "2", text: "Specific Batch" },
            { value: "3", text: "Specific Student's" }
        ];

        options.forEach(function (optionData) {
            var option = document.createElement('option');
            option.value = optionData.value;
            option.text = optionData.text;
            typeSelect.appendChild(option);
            document.getElementById('batchesdisplay').style.display = 'none'; // Hide the div for other values
            document.getElementById('studentdisplay').style.display = 'none'; // Hide the div for other values
        });

        if (yearId) {

            fetch(`${baseUrl}/getBatch/${yearId}`)
                .then(response => response.json())
                .then(data => {
                    console.log('batches' + data);
                    var batchesCheckboxList = document.getElementById('batchescheckboxList');
                    batchesCheckboxList.innerHTML = ''; // Clear the current checkbox list

                    // Loop through the years and add them as checkboxes in the list
                    data.batches.forEach(function (batche) {
                        var li = document.createElement('li');

                        // Create the div container for the checkbox
                        var div = document.createElement('div');
                        div.className = 'flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600';

                        // Create the checkbox input element
                        var checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.id = `checkbox-item-${batche.id}`;
                        checkbox.value = batche.id;
                        checkbox.name = 'batches[]';
                        checkbox.className = 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500';

                        // Create the label element
                        var label = document.createElement('label');
                        label.setAttribute('for', `checkbox-item-${batche.id}`);
                        label.className = 'w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300';
                        label.textContent = batche.name;

                        // Append the checkbox and label to the div
                        div.appendChild(checkbox);
                        div.appendChild(label);

                        // Append the div to the li
                        li.appendChild(div);

                        // Append the li to the ul
                        batchesCheckboxList.appendChild(li);
                    });
                });

            fetch(`${baseUrl}/getstudent/${yearId}/${selectedProgramValue}`)
                .then(response => response.json())
                .then(data => {
                    console.log('students' + data);

                    var studentsCheckboxList = document.getElementById('studentscheckboxList');
                    studentsCheckboxList.innerHTML = ''; // Clear the current checkbox list

                    // Loop through the years and add them as checkboxes in the list
                    data.students.forEach(function (student) {
                        var li = document.createElement('li');

                        // Create the div container for the checkbox
                        var div = document.createElement('div');
                        div.className = 'flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600';

                        // Create the checkbox input element
                        var checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.id = `checkbox-item-${student.id}`;
                        checkbox.value = student.id;
                        checkbox.name = 'students[]';
                        checkbox.className = 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500';

                        // Create the label element
                        var label = document.createElement('label');
                        label.setAttribute('for', `checkbox-item-${student.id}`);
                        label.className = 'w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300';
                        label.textContent = student.name;

                        // Append the checkbox and label to the div
                        div.appendChild(checkbox);
                        div.appendChild(label);

                        // Append the div to the li
                        li.appendChild(div);

                        // Append the li to the ul
                        studentsCheckboxList.appendChild(li);
                    });
                });
        }
    });


    document.getElementById('selecttype-add').addEventListener('change', function () {
        var typeId = this.value;
        var baseUrl = '{{ env("APP_URL") }}/Studentsetting'; // Get the base URL dynamically
        console.log(typeId);
        if (typeId == 2) {
            document.getElementById('batchesdisplay').style.display = 'block'; // Show the div
        } else {
            document.getElementById('batchesdisplay').style.display = 'none'; // Hide the div for other values
        }

        if (typeId == 3) {
            document.getElementById('studentdisplay').style.display = 'block'; // Show the div
        } else {
            document.getElementById('studentdisplay').style.display = 'none'; // Hide the div for other values
        }
    });




    document.addEventListener('DOMContentLoaded', function () {
        flatpickr("#datepicker-range-start", {
            dateFormat: "Y-m-d",
            onChange: function (selectedDates, dateStr, instance) {
                document.querySelector("#datepicker-range-end")._flatpickr.set('minDate', selectedDates[0]);
            }
        });

        flatpickr("#datepicker-range-end", {
            dateFormat: "Y-m-d",
            onChange: function (selectedDates, dateStr, instance) {
                document.querySelector("#datepicker-range-start")._flatpickr.set('maxDate', selectedDates[0]);
            }
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