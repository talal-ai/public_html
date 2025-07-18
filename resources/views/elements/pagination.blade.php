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
                <li>Pagination</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Default Pagination</h2>
            <div class="overflow-scroll">
                <ul class="flex items-center gap-1 justify-center">
                    <li>
                        <a href="javascript:;" class="text-primary flex items-center justify-center hover:bg-dark/10 dark:hover:bg-white/10 w-7 h-7 rounded-md">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.29289 10.7071C7.68342 11.0976 8.31658 11.0976 8.70711 10.7071C9.09763 10.3166 9.09763 9.68342 8.70711 9.29289L5.41421 6L8.70711 2.70711C9.09763 2.31658 9.09763 1.68342 8.70711 1.29289C8.31658 0.902369 7.68342 0.902369 7.29289 1.29289L3.29289 5.29289C2.90237 5.68342 2.90237 6.31658 3.29289 6.70711L7.29289 10.7071Z" fill="currentColor"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="flex items-center justify-center bg-gray/20 w-7 h-7 rounded-md duration-300">1</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="flex items-center justify-center hover:bg-dark/10 dark:hover:bg-white/10 w-7 h-7 rounded-md duration-300">2</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="flex items-center justify-center hover:bg-dark/10 dark:hover:bg-white/10 w-7 h-7 rounded-md duration-300">3</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="flex items-center justify-center hover:bg-dark/10 dark:hover:bg-white/10 w-7 h-7 rounded-md duration-300">4</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="flex items-center justify-center hover:bg-dark/10 dark:hover:bg-white/10 w-7 h-7 rounded-md duration-300">5</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="text-primary flex items-center justify-center hover:bg-dark/10 dark:hover:bg-white/10 w-7 h-7 rounded-md duration-300">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.70711 1.29289C4.31658 0.902369 3.68342 0.902369 3.29289 1.29289C2.90237 1.68342 2.90237 2.31658 3.29289 2.70711L6.58579 6L3.29289 9.29289C2.90237 9.68342 2.90237 10.3166 3.29289 10.7071C3.68342 11.0976 4.31658 11.0976 4.70711 10.7071L8.70711 6.70711C9.09763 6.31658 9.09763 5.68342 8.70711 5.29289L4.70711 1.29289Z" fill="currentColor"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Solid Pagination</h2>
            <div class="overflow-scroll">
                <ul class="flex items-center gap-1 justify-center">
                    <li>
                        <a href="javascript:;" class="bg-gray/20 hover:bg-primary hover:text-white duration-300 flex items-center justify-center hover:bg-dark/10 w-7 h-7 rounded-md">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.29289 10.7071C7.68342 11.0976 8.31658 11.0976 8.70711 10.7071C9.09763 10.3166 9.09763 9.68342 8.70711 9.29289L5.41421 6L8.70711 2.70711C9.09763 2.31658 9.09763 1.68342 8.70711 1.29289C8.31658 0.902369 7.68342 0.902369 7.29289 1.29289L3.29289 5.29289C2.90237 5.68342 2.90237 6.31658 3.29289 6.70711L7.29289 10.7071Z" fill="currentColor"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bg-gray/20 hover:bg-primary hover:text-white flex items-center justify-center bg-primary text-white w-7 h-7 rounded-md duration-300">1</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bg-gray/20 hover:bg-primary hover:text-white flex items-center justify-center hover:bg-dark/10 w-7 h-7 rounded-md duration-300">2</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bg-gray/20 hover:bg-primary hover:text-white flex items-center justify-center hover:bg-dark/10 w-7 h-7 rounded-md duration-300">3</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bg-gray/20 hover:bg-primary hover:text-white flex items-center justify-center hover:bg-dark/10 w-7 h-7 rounded-md duration-300">4</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bg-gray/20 hover:bg-primary hover:text-white flex items-center justify-center hover:bg-dark/10 w-7 h-7 rounded-md duration-300">5</a>
                    </li>
                    <li>
                        <a href="javascript:;" class="bg-gray/20 hover:bg-primary hover:text-white flex items-center justify-center hover:bg-dark/10 w-7 h-7 rounded-md duration-300">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.70711 1.29289C4.31658 0.902369 3.68342 0.902369 3.29289 1.29289C2.90237 1.68342 2.90237 2.31658 3.29289 2.70711L6.58579 6L3.29289 9.29289C2.90237 9.68342 2.90237 10.3166 3.29289 10.7071C3.68342 11.0976 4.31658 11.0976 4.70711 10.7071L8.70711 6.70711C9.09763 6.31658 9.09763 5.68342 8.70711 5.29289L4.70711 1.29289Z" fill="currentColor"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg md:col-span-2">
            <h2 class="text-base font-semibold mb-4">Full Pagination</h2>
            <div class="overflow-scroll">
                <ul class="flex justify-center items-center -space-x-px m-auto">
                    <li class="mr-2">
                        <button type="button" class="flex justify-center h-9 w-9 items-center rounded transition border border-gray/20 hover:border-gray/60">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.29289 10.7071C7.68342 11.0976 8.31658 11.0976 8.70711 10.7071C9.09763 10.3166 9.09763 9.68342 8.70711 9.29289L5.41421 6L8.70711 2.70711C9.09763 2.31658 9.09763 1.68342 8.70711 1.29289C8.31658 0.902369 7.68342 0.902369 7.29289 1.29289L3.29289 5.29289C2.90237 5.68342 2.90237 6.31658 3.29289 6.70711L7.29289 10.7071Z" fill="currentColor"></path>
                            </svg>
                        </button>
                    </li>
                    <li><button type="button" class="flex justify-center h-9 w-9 items-center rounded transition border border-gray/20 hover:border-gray/60">1</button></li>
                    <li><button type="button" class="flex justify-center h-9 w-9 items-center rounded transition border border-gray/20 hover:border-gray/60">2</button></li>
                    <li><button type="button" class="flex justify-center h-9 w-9 items-center rounded transition border border-gray/20 hover:border-gray/60">3</button></li>
                    <li>
                        <p class="flex justify-center h-9 w-9 items-center rounded transition border border-gray/20 hover:border-gray/60">...</p>
                    </li>
                    <li><button type="button" class="flex justify-center h-9 w-9 items-center rounded transition border border-gray/20 hover:border-gray/60">9</button></li>
                    <li class="!ml-2">
                        <button type="button" class="flex justify-center px-2.5 py-2.5 rounded transition border border-gray/20 hover:border-gray/60">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.70711 1.29289C4.31658 0.902369 3.68342 0.902369 3.29289 1.29289C2.90237 1.68342 2.90237 2.31658 3.29289 2.70711L6.58579 6L3.29289 9.29289C2.90237 9.68342 2.90237 10.3166 3.29289 10.7071C3.68342 11.0976 4.31658 11.0976 4.70711 10.7071L8.70711 6.70711C9.09763 6.31658 9.09763 5.68342 8.70711 5.29289L4.70711 1.29289Z" fill="currentColor"></path>
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg md:col-span-2">
            <h2 class="text-base font-semibold mb-4">Button Pagination</h2>
            <div class="flex flex-wrap items-center justify-center sm:justify-between gap-3 overflow-scroll">
                <div class="text-left text-lightgray">Showing <span class="font-semibold text-dark dark:text-white">1</span> to <span class="font-semibold text-dark dark:text-white">10</span> of <span class="font-semibold text-dark dark:text-white">154</span> results.</div>
                <div class="flex items-center gap-2.5">
                    <button type="button" class="btn flex items-center gap-2 border text-primary border-transparent rounded-md transition-all duration-300 bg-primary/10 opacity-60 cursor-not-allowed">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.29289 10.7071C7.68342 11.0976 8.31658 11.0976 8.70711 10.7071C9.09763 10.3166 9.09763 9.68342 8.70711 9.29289L5.41421 6L8.70711 2.70711C9.09763 2.31658 9.09763 1.68342 8.70711 1.29289C8.31658 0.902369 7.68342 0.902369 7.29289 1.29289L3.29289 5.29289C2.90237 5.68342 2.90237 6.31658 3.29289 6.70711L7.29289 10.7071Z" fill="currentColor"></path>
                        </svg>
                        Previous
                    </button>
                    <button type="button" class="btn flex items-center gap-2 border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">
                        Next
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.70711 1.29289C4.31658 0.902369 3.68342 0.902369 3.29289 1.29289C2.90237 1.68342 2.90237 2.31658 3.29289 2.70711L6.58579 6L3.29289 9.29289C2.90237 9.68342 2.90237 10.3166 3.29289 10.7071C3.68342 11.0976 4.31658 11.0976 4.70711 10.7071L8.70711 6.70711C9.09763 6.31658 9.09763 5.68342 8.70711 5.29289L4.70711 1.29289Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg md:col-span-2">
            <h2 class="text-base font-semibold mb-4">Large Pagination</h2>
            <div class="flex items-center gap-2.5 justify-between overflow-scroll">
                <button type="button" class="btn flex items-center gap-2 bg-gray/10 border border-gray/10 rounded-md transition-all duration-300 hover:bg-gray/[0.15] hover:border-gray/[0.15]">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.29289 10.7071C7.68342 11.0976 8.31658 11.0976 8.70711 10.7071C9.09763 10.3166 9.09763 9.68342 8.70711 9.29289L5.41421 6L8.70711 2.70711C9.09763 2.31658 9.09763 1.68342 8.70711 1.29289C8.31658 0.902369 7.68342 0.902369 7.29289 1.29289L3.29289 5.29289C2.90237 5.68342 2.90237 6.31658 3.29289 6.70711L7.29289 10.7071Z" fill="currentColor"></path>
                    </svg>
                    Previous
                </button>
                <div>
                    <ul class="flex items-center gap-1 justify-center">
                        <li>
                            <a href="javascript:;" class="flex items-center justify-center border border-gray/10 bg-gray/10 w-10 h-10 rounded-md duration-300">1</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="flex items-center justify-center border border-transparent hover:border-gray/10 hover:bg-gray/10 w-10 h-10 rounded-md duration-300">2</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="flex items-center justify-center border border-transparent hover:border-gray/10 hover:bg-gray/10 w-10 h-10 rounded-md duration-300">3</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="flex items-center justify-center border border-transparent hover:border-gray/10 hover:bg-gray/10 w-10 h-10 rounded-md duration-300">4</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="flex items-center justify-center border border-transparent hover:border-gray/10 hover:bg-gray/10 w-10 h-10 rounded-md duration-300">5</a>
                        </li>
                    </ul>
                </div>
                <button type="button" class="btn flex items-center gap-2 bg-gray/10 border border-gray/10 rounded-md transition-all duration-300 hover:bg-gray/[0.15] hover:border-gray/[0.15]">
                    Light
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.70711 1.29289C4.31658 0.902369 3.68342 0.902369 3.29289 1.29289C2.90237 1.68342 2.90237 2.31658 3.29289 2.70711L6.58579 6L3.29289 9.29289C2.90237 9.68342 2.90237 10.3166 3.29289 10.7071C3.68342 11.0976 4.31658 11.0976 4.70711 10.7071L8.70711 6.70711C9.09763 6.31658 9.09763 5.68342 8.70711 5.29289L4.70711 1.29289Z" fill="currentColor"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection