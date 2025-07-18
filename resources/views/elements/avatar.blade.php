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
                <li>Avatar</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Avatar Rounded</h2>
            <div class="flex flex-wrap items-center gap-5">
                <img src="{{ asset('assets/images/avatar-9.png') }}" class="h-24 w-24 flex-none rounded-full object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-10.png') }}" class="h-20 w-20 flex-none rounded-full object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-11.png') }}" class="h-16 w-16 flex-none rounded-full object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-12.png') }}" class="h-12 w-12 flex-none rounded-full object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-13.png') }}" class="h-10 w-10 flex-none rounded-full object-cover" alt="avatar">
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Avatar Square</h2>
            <div class="flex flex-wrap items-center gap-5">
                <img src="{{ asset('assets/images/avatar-19.png') }}" class="h-24 w-24 flex-none rounded-md object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-20.png') }}" class="h-20 w-20 flex-none rounded-md object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-21.png') }}" class="h-16 w-16 flex-none rounded-md object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-22.png') }}" class="h-12 w-12 flex-none rounded-md object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-23.png') }}" class="h-10 w-10 flex-none rounded-md object-cover" alt="avatar">
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Avatar With Dots</h2>
            <div class="flex flex-wrap items-center gap-5">
                <div class="relative h-24 w-24">
                    <img src="{{ asset('assets/images/avatar-9.png') }}" class="h-24 w-24 flex-none rounded-full object-cover" alt="avatar">
                    <span class="absolute bottom-0 h-7 w-7 rounded-full bg-danger ring-2 ring-white dark:ring-darkborder right-0"></span>
                </div>
                <div class="relative h-20 w-20">
                    <img src="{{ asset('assets/images/avatar-10.png') }}" class="h-20 w-20 flex-none rounded-full object-cover" alt="avatar">
                    <span class="absolute bottom-0 h-6 w-6 rounded-full bg-warning ring-2 ring-white dark:ring-darkborder right-0"></span>
                </div>
                <div class="relative h-16 w-16">
                    <img src="{{ asset('assets/images/avatar-11.png') }}" class="h-16 w-16 flex-none rounded-full object-cover" alt="avatar">
                    <span class="absolute bottom-0 h-5 w-5 rounded-full bg-success ring-2 ring-white dark:ring-darkborder right-0"></span>
                </div>
                <div class="relative h-12 w-12">
                    <img src="{{ asset('assets/images/avatar-12.png') }}" class="h-12 w-12 flex-none rounded-full object-cover" alt="avatar">
                    <span class="absolute bottom-0 h-4 w-4 rounded-full bg-gray ring-2 ring-white dark:ring-darkborder right-0"></span>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Avatar Square With Dots</h2>
            <div class="flex flex-wrap items-center gap-5">
                <div class="relative h-24 w-24">
                    <img src="{{ asset('assets/images/avatar-19.png') }}" class="h-24 w-24 flex-none rounded-md object-cover" alt="avatar">
                    <span class="absolute -bottom-2 -right-2 h-7 w-7 rounded-full bg-danger ring-2 ring-white dark:ring-darkborder"></span>
                </div>
                <div class="relative h-20 w-20">
                    <img src="{{ asset('assets/images/avatar-20.png') }}" class="h-20 w-20 flex-none rounded-md object-cover" alt="avatar">
                    <span class="absolute -bottom-2 -right-2 h-6 w-6 rounded-full bg-warning ring-2 ring-white dark:ring-darkborder"></span>
                </div>
                <div class="relative h-16 w-16">
                    <img src="{{ asset('assets/images/avatar-21.png') }}" class="h-16 w-16 flex-none rounded-md object-cover" alt="avatar">
                    <span class="absolute -bottom-2 -right-2 h-5 w-5 rounded-full bg-success ring-2 ring-white dark:ring-darkborder"></span>
                </div>
                <div class="relative h-12 w-12">
                    <img src="{{ asset('assets/images/avatar-22.png') }}" class="h-12 w-12 flex-none rounded-md object-cover" alt="avatar">
                    <span class="absolute -bottom-2 -right-2 h-4 w-4 rounded-full bg-gray ring-2 ring-white dark:ring-darkborder"></span>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Avatar Group</h2>
            <div class="flex items-center justify-start -space-x-4">
                <img src="{{ asset('assets/images/avatar-2.png') }}" class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-3.png') }}" class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-9.png') }}" class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-10.png') }}" class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-11.png') }}" class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover" alt="avatar">
                <span class="flex justify-center items-center w-10 h-10 text-center rounded-full object-cover bg-white dark:bg-dark font-bold text-xs ring-2 ring-lightgray/10 dark:ring-gray/20">+99</span>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Avatar With Text</h2>
            <div class="flex items-center space-x-2">
                <img class="w-10 h-10 rounded-full" src="{{ asset('assets/images/avatar-1.png') }}" alt="">
                <div>
                    <h6>Stevens Lackson</h6>
                    <p class="text-xs text-lightgray">Frontend Developer</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Avatar Rounded With Alphabet</h2>
            <div class="flex flex-wrap gap-5">
                <div class="h-12 w-12 rounded-full flex items-center justify-center font-semibold bg-primary/10 text-base uppercase text-primary">DH</div>
                <div class="h-12 w-12 rounded-full flex items-center justify-center font-semibold bg-purple/10 text-base uppercase text-purple">DH</div>
                <div class="h-12 w-12 rounded-full flex items-center justify-center font-semibold bg-success/10 text-base uppercase text-success">DH</div>
                <div class="h-12 w-12 rounded-full flex items-center justify-center font-semibold bg-warning/10 text-base uppercase text-warning">DH</div>
                <div class="h-12 w-12 rounded-full flex items-center justify-center font-semibold bg-danger/10 text-base uppercase text-danger">DH</div>
                <div class="h-12 w-12 rounded-full flex items-center justify-center font-semibold bg-dark/10 text-base uppercase dark:bg-white/10">DH</div>
                <div class="h-12 w-12 rounded-full flex items-center justify-center font-semibold bg-gray/10 text-base uppercase">DH</div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Avatar Square With Alphabet</h2>
            <div class="flex flex-wrap gap-5">
                <div class="h-12 w-12 rounded-md flex items-center justify-center font-semibold bg-primary/10 text-base uppercase text-primary">DH</div>
                <div class="h-12 w-12 rounded-md flex items-center justify-center font-semibold bg-purple/10 text-base uppercase text-purple">DH</div>
                <div class="h-12 w-12 rounded-md flex items-center justify-center font-semibold bg-success/10 text-base uppercase text-success">DH</div>
                <div class="h-12 w-12 rounded-md flex items-center justify-center font-semibold bg-warning/10 text-base uppercase text-warning">DH</div>
                <div class="h-12 w-12 rounded-md flex items-center justify-center font-semibold bg-danger/10 text-base uppercase text-danger">DH</div>
                <div class="h-12 w-12 rounded-md flex items-center justify-center font-semibold bg-dark/10 text-base uppercase dark:bg-white/10">DH</div>
                <div class="h-12 w-12 rounded-md flex items-center justify-center font-semibold bg-gray/10 text-base uppercase">DH</div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Avatar With Icon</h2>
            <div class="flex flex-wrap gap-5">
                <div class="h-12 w-12 rounded-md flex items-center justify-center font-semibold bg-primary/10 text-base uppercase text-primary">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle opacity="0.3" cx="12" cy="6" r="4" fill="currentColor"></circle>
                        <ellipse cx="12" cy="17" rx="7" ry="4" fill="currentColor"></ellipse>
                    </svg>
                </div>
                <div class="h-12 w-12 rounded-md flex items-center justify-center font-semibold bg-purple/10 text-base uppercase text-purple">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle opacity="0.3" cx="12" cy="6" r="4" fill="currentColor"></circle>
                        <ellipse cx="12" cy="17" rx="7" ry="4" fill="currentColor"></ellipse>
                    </svg>
                </div>
                <div class="h-12 w-12 rounded-md flex items-center justify-center font-semibold bg-success/10 text-base uppercase text-success">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle opacity="0.3" cx="12" cy="6" r="4" fill="currentColor"></circle>
                        <ellipse cx="12" cy="17" rx="7" ry="4" fill="currentColor"></ellipse>
                    </svg>
                </div>
                <div class="h-12 w-12 rounded-md flex items-center justify-center font-semibold bg-warning/10 text-base uppercase text-warning">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle opacity="0.3" cx="12" cy="6" r="4" fill="currentColor"></circle>
                        <ellipse cx="12" cy="17" rx="7" ry="4" fill="currentColor"></ellipse>
                    </svg>
                </div>
                <div class="h-12 w-12 rounded-md flex items-center justify-center font-semibold bg-danger/10 text-base uppercase text-danger">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle opacity="0.3" cx="12" cy="6" r="4" fill="currentColor"></circle>
                        <ellipse cx="12" cy="17" rx="7" ry="4" fill="currentColor"></ellipse>
                    </svg>
                </div>
                <div class="h-12 w-12 rounded-md flex items-center justify-center font-semibold bg-dark/10 text-base uppercase dark:bg-white/10">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle opacity="0.3" cx="12" cy="6" r="4" fill="currentColor"></circle>
                        <ellipse cx="12" cy="17" rx="7" ry="4" fill="currentColor"></ellipse>
                    </svg>
                </div>
                <div class="h-12 w-12 rounded-md flex items-center justify-center font-semibold bg-gray/10 text-base uppercase">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle opacity="0.3" cx="12" cy="6" r="4" fill="currentColor"></circle>
                        <ellipse cx="12" cy="17" rx="7" ry="4" fill="currentColor"></ellipse>
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Avatar With Border</h2>
            <div class="flex flex-wrap items-center gap-5">
                <img src="{{ asset('assets/images/avatar-9.png') }}" class="h-16 w-16 flex-none border border-primary p-1 rounded-full object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-10.png') }}" class="h-16 w-16 flex-none border border-purple p-1 rounded-full object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-11.png') }}" class="h-16 w-16 flex-none border border-success p-1 rounded-full object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-12.png') }}" class="h-16 w-16 flex-none border border-warning p-1 rounded-full object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-13.png') }}" class="h-16 w-16 flex-none border border-danger p-1 rounded-full object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-14.png') }}" class="h-16 w-16 flex-none border border-dark dark:border-white p-1 rounded-full object-cover" alt="avatar">
                <img src="{{ asset('assets/images/avatar-15.png') }}" class="h-16 w-16 flex-none border dark:border-gray/20 border-lightgray/10 p-1 rounded-full object-cover" alt="avatar">
            </div>
        </div>
    </div>
</div>

@endsection