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
                <li>Loader</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Border Spinner</h2>
            <div class="flex flex-wrap items-center gap-5">
                <div class="animate-spin inline-block w-8 h-8 border-[3px] border-l-transparent border-primary rounded-full"></div>
                <div class="animate-spin inline-block w-8 h-8 border-[3px] border-l-transparent border-purple rounded-full"></div>
                <div class="animate-spin inline-block w-8 h-8 border-[3px] border-l-transparent border-success rounded-full"></div>
                <div class="animate-spin inline-block w-8 h-8 border-[3px] border-l-transparent border-warning rounded-full"></div>
                <div class="animate-spin inline-block w-8 h-8 border-[3px] border-l-transparent border-danger rounded-full"></div>
                <div class="animate-spin inline-block w-8 h-8 border-[3px] border-l-transparent dark:border-l-transparent border-dark dark:border-white rounded-full"></div>
                <div class="animate-spin inline-block w-8 h-8 border-[3px] border-l-transparent border-gray/20 rounded-full"></div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Spinner Sizes</h2>
            <div class="flex flex-wrap items-center gap-5">
                <div class="animate-spin inline-block w-10 h-10 border-[3px] border-l-transparent border-primary rounded-full"></div>
                <div class="animate-spin inline-block w-9 h-9 border-[3px] border-l-transparent border-purple rounded-full"></div>
                <div class="animate-spin inline-block w-8 h-8 border-[3px] border-l-transparent border-success rounded-full"></div>
                <div class="animate-spin inline-block w-7 h-7 border-[3px] border-l-transparent border-warning rounded-full"></div>
                <div class="animate-spin inline-block w-6 h-6 border-[3px] border-l-transparent border-danger rounded-full"></div>
                <div class="animate-spin inline-block w-5 h-5 border-[3px] border-l-transparent dark:border-l-transparent border-dark dark:border-white rounded-full"></div>
                <div class="animate-spin inline-block w-4 h-4 border-[3px] border-l-transparent border-gray/20 rounded-full"></div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Spinner Opacity</h2>
            <div class="flex flex-wrap items-center gap-6">
                <div class="relative">
                    <span class="inline-block w-5 h-5">
                        <span class="animate-ping inline-flex h-full w-full rounded-full bg-primary/50"></span>
                    </span>
                </div>
                <div class="relative">
                    <span class="inline-block w-5 h-5">
                        <span class="animate-ping inline-flex h-full w-full rounded-full bg-purple/50"></span>
                    </span>
                </div>
                <div class="relative">
                    <span class="inline-block w-5 h-5">
                        <span class="animate-ping inline-flex h-full w-full rounded-full bg-success/50"></span>
                    </span>
                </div>
                <div class="relative">
                    <span class="inline-block w-5 h-5">
                        <span class="animate-ping inline-flex h-full w-full rounded-full bg-warning/50"></span>
                    </span>
                </div>
                <div class="relative">
                    <span class="inline-block w-5 h-5">
                        <span class="animate-ping inline-flex h-full w-full rounded-full bg-danger/50"></span>
                    </span>
                </div>
                <div class="relative">
                    <span class="inline-block w-5 h-5">
                        <span class="animate-ping inline-flex h-full w-full rounded-full bg-dark/50 dark:bg-white/50"></span>
                    </span>
                </div>
                <div class="relative">
                    <span class="inline-block w-5 h-5">
                        <span class="animate-ping inline-flex h-full w-full rounded-full bg-gray/20"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Spinner Custom</h2>
            <div class="flex items-center flex-wrap justify-center gap-5">
                <div class="animate-spin border-8 border-gray/10 border-l-purple rounded-full w-14 h-14 inline-block align-middle">
                </div>
                <div class="animate-[spin_2s_linear_infinite] border-8 border-gray/10 border-l-purple border-r-success rounded-full w-14 h-14 inline-block align-middle">
                </div>
                <div class="animate-[spin_3s_linear_infinite] border-8 border-r-gray/10 border-l-purple border-t-dark dark:border-t-white border-b-success rounded-full w-14 h-14 inline-block align-middle">
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Spinner Buttons</h2>
            <div class="flex flex-wrap gap-5">
                <button type="button" class="btn flex items-center gap-1.5 bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round" class="inline-block h-5 w-5 animate-[spin_2s_linear_infinite] align-middle">
                        <line x1="12" y1="2" x2="12" y2="6"></line>
                        <line x1="12" y1="18" x2="12" y2="22"></line>
                        <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                        <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                        <line x1="2" y1="12" x2="6" y2="12"></line>
                        <line x1="18" y1="12" x2="22" y2="12"></line>
                        <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                        <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                    </svg>
                    Primary
                </button>
                <button type="button" class="btn flex items-center gap-1.5 bg-success border border-success rounded-md text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">
                    <span class="animate-spin border-2 border-white border-l-transparent rounded-full w-5 h-5 inline-block align-middle"></span>
                    Success
                </button>
                <button type="button" class="btn flex items-center gap-1.5 bg-purple border border-purple rounded-md text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]">
                    <span class="animate-ping w-3 h-3 inline-block rounded-full bg-white/30 group-hover:bg-white "></span>
                    Purple
                </button>
            </div>
        </div>
    </div>
</div>

@endsection