@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Elements</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z" fill="currentColor" />
                    </svg>
                </li>
                <li>Badges</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Badges</h2>
            <div class="flex flex-wrap gap-5 items-center">
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 bg-primary text-white">Primary</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 bg-purple text-white">Purple</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 bg-success text-white">Succcess</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 bg-warning text-white">Warning</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 bg-danger text-white">Danger</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 bg-dark text-white dark:text-dark dark:bg-white">Black</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 bg-gray/10">Light</div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Badges Rounded</h2>
            <div class="flex flex-wrap gap-5 items-center">
                <div class="inline-flex items-center rounded-full text-xs justify-center px-1.5 py-0.5 bg-primary text-white">Primary</div>
                <div class="inline-flex items-center rounded-full text-xs justify-center px-1.5 py-0.5 bg-purple text-white">Purple</div>
                <div class="inline-flex items-center rounded-full text-xs justify-center px-1.5 py-0.5 bg-success text-white">Succcess</div>
                <div class="inline-flex items-center rounded-full text-xs justify-center px-1.5 py-0.5 bg-warning text-white">Warning</div>
                <div class="inline-flex items-center rounded-full text-xs justify-center px-1.5 py-0.5 bg-danger text-white">Danger</div>
                <div class="inline-flex items-center rounded-full text-xs justify-center px-1.5 py-0.5 bg-dark text-white dark:text-dark dark:bg-white">Black</div>
                <div class="inline-flex items-center rounded-full text-xs justify-center px-1.5 py-0.5 bg-gray/10">Light</div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Badges Outline</h2>
            <div class="flex flex-wrap gap-5 items-center">
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 border border-purple text-purple">Primary</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 border border-info text-info">Info</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 border border-success text-success">Succcess</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 border border-warning text-warning">Warning</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 border border-danger text-danger">Danger</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 border border-dark dark:border-white">Black</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 border border-gray/20 text-dark dark:text-white">Light</div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Badges Lighten</h2>
            <div class="flex flex-wrap gap-5 items-center">
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 bg-primary/10 text-primary">Primary</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 bg-purple/10 text-purple">Purple</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 bg-success/10 text-success">Succcess</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 bg-warning/10 text-warning">Warning</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 bg-danger/10 text-danger">Danger</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 bg-dark/10 dark:bg-white/10">Black</div>
                <div class="inline-flex items-center rounded text-xs justify-center px-1.5 py-0.5 bg-gray/10">Light</div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Badges With Dots</h2>
            <div class="flex flex-wrap gap-5 items-center">
                <div class="inline-flex items-center text-xs justify-center px-1.5 py-0.5 text-primary">
                    <span class="h-1.5 w-1.5 rounded-full bg-current me-1.5"></span>
                    <span>Primary</span>
                </div>
                <div class="inline-flex items-center text-xs justify-center px-1.5 py-0.5 text-purple">
                    <span class="h-1.5 w-1.5 rounded-full bg-current me-1.5"></span>
                    <span>Info</span>
                </div>
                <div class="inline-flex items-center text-xs justify-center px-1.5 py-0.5 text-success">
                    <span class="h-1.5 w-1.5 rounded-full bg-current me-1.5"></span>
                    <span>Succcess</span>
                </div>
                <div class="inline-flex items-center text-xs justify-center px-1.5 py-0.5 text-warning">
                    <span class="h-1.5 w-1.5 rounded-full bg-current me-1.5"></span>
                    <span>Warning</span>
                </div>
                <div class="inline-flex items-center text-xs justify-center px-1.5 py-0.5 text-danger">
                    <span class="h-1.5 w-1.5 rounded-full bg-current me-1.5"></span>
                    <span>Danger</span>
                </div>
                <div class="inline-flex items-center text-xs justify-center px-1.5 py-0.5 text-black dark:text-white">
                    <span class="h-1.5 w-1.5 rounded-full bg-current me-1.5"></span>
                    <span>Black</span>
                </div>
                <div class="inline-flex items-center text-xs justify-center px-1.5 py-0.5 text-gray">
                    <span class="h-1.5 w-1.5 rounded-full bg-current me-1.5"></span>
                    <span>Secondary</span>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Badges With Size</h2>
            <div class="flex flex-wrap gap-5 items-center">
                <div><span class="bg-primary text-white text-[10px] px-1.5 py-0.5 rounded"><span class="h-1 w-1 relative -top-px rounded-full bg-white inline-block mr-1"></span> Small</span></div>
                <div><span class="bg-purple text-white text-[10px] px-2 py-1 text-xs rounded"><span class="h-1.5 w-1.5 relative -top-px rounded-full bg-white inline-block mr-1"></span> Small</span></div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Badges In Buttons</h2>
            <div class="flex flex-wrap gap-5 items-center">
                <button type="button" class="btn bg-dark dark:bg-white dark:text-dark dark:border-white border border-dark rounded-md text-white transition-all duration-300 hover:bg-dark/[0.85] hover:border-dark/[0.85] relative">Messages
                    <span class="absolute top-0 left-full -translate-x-1/2 -translate-y-1/2 h-3 w-3 bg-primary border border-white rounded-full"></span>
                </button>
                <button type="button" class="btn bg-dark dark:bg-white dark:text-dark dark:border-white border border-dark rounded-md text-white transition-all duration-300 hover:bg-dark/[0.85] hover:border-dark/[0.85]">Notifications
                    <span class="px-1 bg-primary text-white rounded ml-1">4</span>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection