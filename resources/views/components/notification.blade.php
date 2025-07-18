@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Components</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z" fill="currentColor" />
                    </svg>
                </li>
                <li>Notification</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Basic Notification</h2>
            <div x-data="{ toastVisible: false, toastTimer: null }">
                <div x-clock x-show="toastVisible" class="bg-dark text-white dark:text-dark dark:bg-white py-3 px-4 rounded-md max-w-[240px] fixed bottom-5 right-5 z-[99999]" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <span>Hello, world! This is a toast message.</span>
                </div>
                <button class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10" x-on:click="
                        if (toastVisible) {
                        clearTimeout(toastTimer);
                        toastTimer = setTimeout(() => toastVisible = false, 3000);
                        } else {
                        toastVisible = true;
                        toastTimer = setTimeout(() => toastVisible = false, 3000);
                        }
                    ">
                    Open Notification
                </button>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Notification With Close</h2>
            <div x-data="{ notificationOpen: false }">
                <button x-on:click="notificationOpen = true" class="btn bg-gray/10 border border-gray/10 rounded-md transition-all duration-300 hover:bg-gray/[0.15] hover:border-gray/[0.15]">Click Me!</button>
                <div x-show="notificationOpen" class="bg-dark dark:text-dark dark:bg-white flex items-start gap-3 text-white py-3 px-4 rounded-md max-w-[250px] fixed bottom-5 right-5 z-[99999]" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                    <span>Hello, world! This is a toast message.</span>
                    <button type="button" x-on:click="notificationOpen = false" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Position Notification</h2>
            <div class="flex flex-wrap items-center gap-5">
                <div x-data="{ toastVisible: false, toastTimer: null }">
                    <div x-clock x-show="toastVisible" class="bg-dark dark:text-dark dark:bg-white text-white py-3 px-4 rounded-md max-w-[240px] fixed top-5 left-5 z-[99999]" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <span>Hello, world! This is a toast message.</span>
                    </div>
                    <button class="btn hover:bg-gray/10 border border-gray/10 rounded-md transition-all duration-300" x-on:click="
                        if (toastVisible) {
                            clearTimeout(toastTimer);
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        } else {
                            toastVisible = true;
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        }
                        ">
                        Top Left
                    </button>
                </div>
                <div x-data="{ toastVisible: false, toastTimer: null }">
                    <div x-clock x-show="toastVisible" class="bg-dark dark:text-dark dark:bg-white text-white py-3 px-4 rounded-md max-w-[240px] mx-auto fixed top-5 left-0 right-0 z-[99999]" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <span>Hello, world! This is a toast message.</span>
                    </div>
                    <button class="btn hover:bg-gray/10 border border-gray/10 rounded-md transition-all duration-300" x-on:click="
                        if (toastVisible) {
                            clearTimeout(toastTimer);
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        } else {
                            toastVisible = true;
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        }
                        ">
                        Top Center
                    </button>
                </div>
                <div x-data="{ toastVisible: false, toastTimer: null }">
                    <div x-clock x-show="toastVisible" class="bg-dark dark:text-dark dark:bg-white text-white py-3 px-4 rounded-md max-w-[240px] fixed top-5 right-5 z-[99999]" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <span>Hello, world! This is a toast message.</span>
                    </div>
                    <button class="btn hover:bg-gray/10 border border-gray/10 rounded-md transition-all duration-300" x-on:click="
                        if (toastVisible) {
                            clearTimeout(toastTimer);
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        } else {
                            toastVisible = true;
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        }
                        ">
                        Top Right
                    </button>
                </div>
                <div x-data="{ toastVisible: false, toastTimer: null }">
                    <div x-clock x-show="toastVisible" class="bg-dark dark:text-dark dark:bg-white text-white py-3 px-4 rounded-md max-w-[240px] fixed bottom-5 right-5 z-[99999]" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <span>Hello, world! This is a toast message.</span>
                    </div>
                    <button class="btn hover:bg-gray/10 border border-gray/10 rounded-md transition-all duration-300" x-on:click="
                        if (toastVisible) {
                            clearTimeout(toastTimer);
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        } else {
                            toastVisible = true;
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        }
                        ">
                        Bottom Right
                    </button>
                </div>
                <div x-data="{ toastVisible: false, toastTimer: null }">
                    <div x-clock x-show="toastVisible" class="bg-dark dark:text-dark dark:bg-white text-white py-3 px-4 rounded-md max-w-[240px] mx-auto fixed bottom-5 right-0 left-0 z-[99999]" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <span>Hello, world! This is a toast message.</span>
                    </div>
                    <button class="btn hover:bg-gray/10 border border-gray/10 rounded-md transition-all duration-300" x-on:click="
                        if (toastVisible) {
                            clearTimeout(toastTimer);
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        } else {
                            toastVisible = true;
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        }
                        ">
                        Bottom Center
                    </button>
                </div>
                <div x-data="{ toastVisible: false, toastTimer: null }">
                    <div x-clock x-show="toastVisible" class="bg-dark dark:text-dark dark:bg-white text-white py-3 px-4 rounded-md max-w-[240px] fixed bottom-5 left-5 z-[99999]" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <span>Hello, world! This is a toast message.</span>
                    </div>
                    <button class="btn hover:bg-gray/10 border border-gray/10 rounded-md transition-all duration-300" x-on:click="
                        if (toastVisible) {
                            clearTimeout(toastTimer);
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        } else {
                            toastVisible = true;
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        }
                        ">
                        Bottom Left
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Notification Color</h2>
            <div class="flex flex-wrap items-center gap-5">
                <div x-data="{ toastVisible: false, toastTimer: null }">
                    <div x-clock x-show="toastVisible" class="bg-primary text-white py-3 px-4 rounded-md max-w-[240px] fixed bottom-5 right-5 z-[99999]" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <span>Hello, world! This is a toast message.</span>
                    </div>
                    <button class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10" x-on:click="
                        if (toastVisible) {
                            clearTimeout(toastTimer);
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        } else {
                            toastVisible = true;
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        }
                        ">
                        primary
                    </button>
                </div>
                <div x-data="{ toastVisible: false, toastTimer: null }">
                    <div x-clock x-show="toastVisible" class="bg-purple text-white py-3 px-4 rounded-md max-w-[240px] fixed bottom-5 right-5 z-[99999]" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <span>Hello, world! This is a toast message.</span>
                    </div>
                    <button class="btn border text-purple border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-purple bg-purple/10" x-on:click="
                        if (toastVisible) {
                            clearTimeout(toastTimer);
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        } else {
                            toastVisible = true;
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        }
                        ">
                        purple
                    </button>
                </div>
                <div x-data="{ toastVisible: false, toastTimer: null }">
                    <div x-clock x-show="toastVisible" class="bg-success text-white py-3 px-4 rounded-md max-w-[240px] fixed bottom-5 right-5 z-[99999]" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <span>Hello, world! This is a toast message.</span>
                    </div>
                    <button class="btn border text-success border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-success bg-success/10" x-on:click="
                        if (toastVisible) {
                            clearTimeout(toastTimer);
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        } else {
                            toastVisible = true;
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        }
                        ">
                        success
                    </button>
                </div>
                <div x-data="{ toastVisible: false, toastTimer: null }">
                    <div x-clock x-show="toastVisible" class="bg-warning text-white py-3 px-4 rounded-md max-w-[240px] fixed bottom-5 right-5 z-[99999]" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <span>Hello, world! This is a toast message.</span>
                    </div>
                    <button class="btn border text-warning border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-warning bg-warning/10" x-on:click="
                        if (toastVisible) {
                            clearTimeout(toastTimer);
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        } else {
                            toastVisible = true;
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        }
                        ">
                        warning
                    </button>
                </div>
                <div x-data="{ toastVisible: false, toastTimer: null }">
                    <div x-clock x-show="toastVisible" class="bg-danger text-white py-3 px-4 rounded-md max-w-[240px] fixed bottom-5 right-5 z-[99999]" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <span>Hello, world! This is a toast message.</span>
                    </div>
                    <button class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10" x-on:click="
                        if (toastVisible) {
                            clearTimeout(toastTimer);
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        } else {
                            toastVisible = true;
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        }
                        ">
                        danger
                    </button>
                </div>
                <div x-data="{ toastVisible: false, toastTimer: null }">
                    <div x-clock x-show="toastVisible" class="bg-dark dark:text-dark dark:bg-white text-white py-3 px-4 rounded-md max-w-[240px] fixed bottom-5 right-5 z-[99999]" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <span>Hello, world! This is a toast message.</span>
                    </div>
                    <button class="btn dark:hover:bg-white border border-transparent rounded-md  transition-all duration-300 dark:hover:text-dark dark:bg-white/10 hover:text-white hover:bg-dark bg-dark/10" x-on:click="
                        if (toastVisible) {
                            clearTimeout(toastTimer);
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        } else {
                            toastVisible = true;
                            toastTimer = setTimeout(() => toastVisible = false, 3000);
                        }
                        ">
                        dark
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
