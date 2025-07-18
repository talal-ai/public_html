@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Forms</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z" fill="currentColor" />
                    </svg>
                </li>
                <li>Switches</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Switches Solid</h2>
            <div class="togglebutton inline-block">
                <label for="toggleD1" class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" id="toggleD1" class="sr-only">
                        <div class="block band bg-gray/20 w-[54px] h-[29px]"></div>
                        <div class="dot absolute left-[3px] top-[2px] bg-white w-6 h-6 transition"></div>
                    </div>
                </label>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Switches Solid Rounded</h2>
            <div class="togglebutton inline-block">
                <label for="toggleD2" class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" id="toggleD2" class="sr-only">
                        <div class="block band bg-gray/20 w-[54px] h-[29px] rounded-full"></div>
                        <div class="dot absolute left-[3px] top-[2px] bg-white w-6 h-6 rounded-full transition"></div>
                    </div>
                </label>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Switches Solid Rounded Small</h2>
            <div class="togglebutton inline-block">
                <label for="toggleD5" class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" id="toggleD5" class="sr-only">
                        <div class="block band bg-gray/20 w-7 h-4 rounded-full"></div>
                        <div class="dot absolute left-1 top-1/2 -translate-y-1/2 right-0 bg-white w-2.5 h-2.5 rounded-full transition"></div>
                    </div>
                </label>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Switches Outline</h2>
            <div class="togglebutton out-line inline-block">
                <label for="toggleD3" class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" id="toggleD3" class="sr-only">
                        <div class="block band border border-gray/20 w-[52px] h-[29px]"></div>
                        <div class="dot absolute left-1 top-[3.5px] bg-gray/20 w-[22PX] h-[22PX] transition dark:bg-gray/60"></div>
                    </div>
                </label>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Switches Outline Rounded</h2>
            <div class="togglebutton out-line inline-block">
                <label for="toggleD4" class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" id="toggleD4" class="sr-only">
                        <div class="block band border border-gray/20 w-[52px] h-[29px] rounded-full"></div>
                        <div class="dot absolute left-[5px] top-[3.5px] bg-gray/20 w-[22PX] h-[22PX] rounded-full transition dark:bg-gray/60"></div>
                    </div>
                </label>
            </div>
        </div>
    </div>
</div>

@endsection