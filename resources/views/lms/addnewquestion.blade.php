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
                <li>Question Management</li>
            </ul>
        </div>
    </div>
    <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
        <div class="flex flex-wrap gap-2 ">
            <div x-data="modals">
                <div class="flex flex-wrap items-center gap-2">
                    Add New Question-><svg style="cursor: pointer;" @click="toggle" width="24" height="24"
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
                                <h5 class="font-semibold text-lg">Add Question</h5>
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
                                    <form action="{{ route('createquestion') }}" method="POST">
                                        @csrf
                                        <input id="userid" name="userid" type="hidden" class="form-input w-full"
                                            value="{{ $user->id }}" required>
                                        <div
                                            class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Group</h2>

                                                <select id="selectOption" name="questiongroupid" class="form-select">
                                                    <option value="" disabled selected>Select Option</option>
                                                    @foreach($questiongroupData as $questiongroup)
                                                        <option value="{{ $questiongroup['id'] }}">
                                                            {{ $questiongroup['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Question Type</h2>

                                                <select id="questionType" name="questiontype" class="form-select"
                                                    onchange="handleQuestionTypeChange()">
                                                    <option value="" disabled selected>Question Type</option>
                                                    <option value="1">Multiple Choice</option>
                                                    <option value="2">Short Answer</option>
                                                    <option value="3">Long Answer</option>
                                                </select>

                                            </div>

                                            <!-- Shuffle Answer Field (Initially hidden) -->
                                            <div class="p-1" id="shuffleAnswerField" style="display: none;">
                                                <h2 class="text-base font-semibold mb-4">Shuffle Answer</h2>

                                                <select id="shuffleAnswer" name="shuffleanswer" class="form-select">
                                                    <option value="" disabled selected>Shuffle Answer</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>

                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Marks *</h2>
                                                <input id="marks" name="marks" type="number" class="form-input w-full"
                                                    placeholder="Code" required>
                                            </div>
                                        </div>
                                        <div
                                            class="mt-16 grid grid-cols-1 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 p-4">
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Question Detail</h2>
                                                <textarea name="questiondetail" id="editor1" rows="10" cols="80">
                                                </textarea>
                                            </div>
                                        </div>
                                        <!-- Number Of Options Field (Initially hidden) -->
                                        <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4"
                                            id="numberOfOptionsField" style="display: none;">
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Number Of Options</h2>
                                                <label class="flex">
                                                    <input id="optionNumber" name="numberofoption"
                                                        class="form-input rounded-r-none"
                                                        placeholder="Number Of Options" type="number" min="1">
                                                    <button type="button"
                                                        class="rounded-l-none btn bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]"
                                                        onclick="createOptions()">Create</button>
                                                </label>
                                            </div>
                                        </div>
                                        <div
                                            class="grid grid-cols-1 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 p-4">
                                            <div class="p-1">
                                                <!-- Container for dynamically generated inputs -->
                                                <div id="optionsContainer" class="mt-8 p-4"></div>
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
            <!--modal end -->
            Add Quiz-> <a href="{{ route(name: 'quiz') }}"><svg style="cursor: pointer;" @click="toggle" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                    <p class="">Question Group</p>
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
                                        Marks
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
                                        Question Type
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
                                        Shuffle Answer
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
                                        Options List
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
                                        <div x-html="item.questiondetail"></div>
                                    </td>
                                    <td>
                                        <span x-text="item.question_group.name"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.marks"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.creator.name"></span>
                                    </td>
                                    <td>
                                        <span
                                            x-text="item.questiontype === '1' ? 'Multiple Choice' : (item.questiontype === '2' ? 'Short Answer' : (item.questiontype === '3' ? 'Long Answer' : ''))"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.shuffleanswer === 1 ? 'Yes' : 'No'"></span>
                                        <!-- Show Yes/No based on shuffleanswer -->
                                    </td>
                                    <td>
                                        <div class="flex justify-center">
                                            <div x-data="{ dropdown: false }" class="dropdown mx-auto">
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

                                                    <!-- Iterate over item.options array -->
                                                    <template x-for="option in item.options" :key="option . id">
                                                        <li>
                                                            <a href="javascript:;"
                                                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                                <span x-text="option.option_name"></span>
                                                                <!-- Display option name -->
                                                            </a>
                                                        </li>
                                                    </template>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span x-text="item.status"></span>
                                    </td>
                                    <td>
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
    window.mergedData = @json($questionsData);
    console.log(window.mergedData); // Debug to ensure data is being passed correctly
</script>
<!-- Datatables Js -->
<script src="{{ asset('public/assets/js/gernelsettingdata/datatableteacher.js') }}"></script>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    function handleQuestionTypeChange() {
        const questionType = document.getElementById('questionType').value;

        // Elements to toggle visibility
        const shuffleAnswerField = document.getElementById('shuffleAnswerField');
        const numberOfOptionsField = document.getElementById('numberOfOptionsField');
        const optionsContainer = document.getElementById('optionsContainer');
        const optionNumberField = document.getElementById('optionNumber');
        const optionsList = document.getElementById('optionsList');

        // Show Shuffle Answer and Number Of Options only for "Multiple Choice" (value = 1)
        if (questionType === '1') {
            shuffleAnswerField.style.display = 'block';
            numberOfOptionsField.style.display = 'block';
            optionNumberField.value = '';
        } else {
            // Hide fields and reset options
            shuffleAnswerField.style.display = 'none';
            numberOfOptionsField.style.display = 'none';
            optionsContainer.innerHTML = '';
            optionsList.innerHTML = '';  // Clear existing options
        }
    }
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
            radioButton.name = 'correct_option'; // Name it for selecting correct option
            radioButton.value = i; // Value represents option index (1, 2, etc.)
            radioButton.id = `optionRadio${i}`;

            // Create the input field for the option
            const optionInput = document.createElement('input');
            optionInput.type = 'text';
            optionInput.placeholder = `Option ${i}`;
            optionInput.name = `option_text_${i}`; // Add the name attribute to match `option_text_x`
            optionInput.classList.add('ml-2', 'form-input', 'rounded-md');

            // Append the radio button and input field to the div
            optionDiv.appendChild(radioButton);
            optionDiv.appendChild(optionInput);

            // Append the div to the options container
            optionsContainer.appendChild(optionDiv);
        }
    }
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


</script>

@endsection