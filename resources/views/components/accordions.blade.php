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
                <li>Accordions</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Basic</h2>
            <div class="space-y-2" x-data="{ current: 1 }">
                <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                    <button type="button" class="p-4 w-full flex items-center text-gray" :class="{'!text-dark dark:!text-white' : current === 1}" x-on:click="current === 1 ? current = null : current = 1">
                        Accordion Item #1
                        <div class="ml-auto" :class="{'rotate-180' : current === 1}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                    </button>
                    <div x-cloak x-show="current === 1" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                    <button type="button" class="p-4 w-full flex items-center text-gray" :class="{'!text-dark dark:!text-white' : current === 2}" x-on:click="current === 2 ? current = null : current = 2">
                        Accordion Item #2
                        <div class="ml-auto" :class="{'rotate-180' : current === 2}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                    </button>
                    <div x-cloak x-show="current === 2" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                    <button type="button" class="p-4 w-full flex items-center text-gray" :class="{'!text-dark dark:!text-white' : current === 3}" x-on:click="current === 3 ? current = null : current = 3">
                        Accordion Item #3
                        <div class="ml-auto" :class="{'rotate-180' : current === 3}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                    </button>
                    <div x-cloak x-show="current === 3" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Accordion Without Spacing</h2>
            <div x-data="{ current: 1 }" class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg dark:divide-gray/20 divide-y-2 divide-lightgray/10">
                <div>
                    <button type="button" class="p-4 w-full flex items-center text-gray" :class="{'!text-dark dark:!text-white' : current === 1}" x-on:click="current === 1 ? current = null : current = 1">
                        Accordion Item #1
                        <div class="ml-auto" :class="{'rotate-180' : current === 1}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                    </button>
                    <div x-cloak x-show="current === 1" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" class="p-4 w-full flex items-center text-gray" :class="{'!text-dark dark:!text-white' : current === 2}" x-on:click="current === 2 ? current = null : current = 2">
                        Accordion Item #2
                        <div class="ml-auto" :class="{'rotate-180' : current === 2}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                    </button>
                    <div x-cloak x-show="current === 2" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" class="p-4 w-full flex items-center text-gray" :class="{'!text-dark dark:!text-white' : current === 3}" x-on:click="current === 3 ? current = null : current = 3">
                        Accordion Item #3
                        <div class="ml-auto" :class="{'rotate-180' : current === 3}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                    </button>
                    <div x-cloak x-show="current === 3" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Accordion With Color</h2>
            <div class="space-y-2" x-data="{ current: 1 }">
                <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden">
                    <button type="button" class="p-4 w-full flex items-center text-gray bg-gray/5" :class="{'!text-dark dark:!text-white bg-lightgray/10 dark:bg-lightgray/20' : current === 1}" x-on:click="current === 1 ? current = null : current = 1">
                        Accordion Item #1
                        <div class="ml-auto" :class="{'rotate-180' : current === 1}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                    </button>
                    <div x-cloak x-show="current === 1" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden">
                    <button type="button" class="p-4 w-full flex items-center text-gray bg-gray/5" :class="{'!text-dark dark:!text-white bg-lightgray/10 dark:bg-lightgray/20' : current === 2}" x-on:click="current === 2 ? current = null : current = 2">
                        Accordion Item #2
                        <div class="ml-auto" :class="{'rotate-180' : current === 2}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                    </button>
                    <div x-cloak x-show="current === 2" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden">
                    <button type="button" class="p-4 w-full flex items-center text-gray bg-gray/5" :class="{'!text-dark dark:!text-white bg-lightgray/10 dark:bg-lightgray/20' : current === 3}" x-on:click="current === 3 ? current = null : current = 3">
                        Accordion Item #3
                        <div class="ml-auto" :class="{'rotate-180' : current === 3}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                    </button>
                    <div x-cloak x-show="current === 3" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Accordion With Icons</h2>
            <div class="space-y-2" x-data="{ current: 1 }">
                <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                    <button type="button" class="p-4 w-full flex gap-2.5 items-center text-gray" :class="{'!text-dark dark:!text-white' : current === 1}" x-on:click="current === 1 ? current = null : current = 1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 256 256">
                            <path d="M224,64V176a16,16,0,0,1-16,16H155.43L128,160l-27.43,32H48a16,16,0,0,1-16-16V64A16,16,0,0,1,48,48H208A16,16,0,0,1,224,64Z" opacity="0.2"></path>
                            <path d="M134.08,154.79a8,8,0,0,0-12.15,0l-48,56A8,8,0,0,0,80,224h96a8,8,0,0,0,6.07-13.21ZM97.39,208,128,172.29,158.61,208ZM232,64V176a24,24,0,0,1-24,24H192a8,8,0,0,1,0-16h16a8,8,0,0,0,8-8V64a8,8,0,0,0-8-8H48a8,8,0,0,0-8,8V176a8,8,0,0,0,8,8H64a8,8,0,0,1,0,16H48a24,24,0,0,1-24-24V64A24,24,0,0,1,48,40H208A24,24,0,0,1,232,64Z"></path>
                        </svg>
                        Accordion Item #1
                        <div class="ml-auto" :class="{'rotate-180' : current === 1}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                    </button>
                    <div x-cloak x-show="current === 1" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                    <button type="button" class="p-4 w-full flex gap-2.5 items-center text-gray" :class="{'!text-dark dark:!text-white' : current === 2}" x-on:click="current === 2 ? current = null : current = 2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 256 256">
                            <path d="M128,129.09V232a8,8,0,0,1-3.84-1l-88-48.16a8,8,0,0,1-4.16-7V80.2a8,8,0,0,1,.7-3.27Z" opacity="0.2"></path>
                            <path d="M223.68,66.15,135.68,18h0a15.88,15.88,0,0,0-15.36,0l-88,48.17a16,16,0,0,0-8.32,14v95.64a16,16,0,0,0,8.32,14l88,48.17a15.88,15.88,0,0,0,15.36,0l88-48.17a16,16,0,0,0,8.32-14V80.18A16,16,0,0,0,223.68,66.15ZM128,32h0l80.34,44L128,120,47.66,76ZM40,90l80,43.78v85.79L40,175.82Zm96,129.57V133.82L216,90v85.78Z"></path>
                        </svg>
                        Accordion Item #2
                        <div class="ml-auto" :class="{'rotate-180' : current === 2}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                    </button>
                    <div x-cloak x-show="current === 2" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                    <button type="button" class="p-4 w-full flex gap-2.5 items-center text-gray" :class="{'!text-dark dark:!text-white' : current === 3}" x-on:click="current === 3 ? current = null : current = 3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 256 256">
                            <path d="M240,128l-48,40H64L16,128,64,88H192Z" opacity="0.2"></path>
                            <path d="M69.12,94.15,28.5,128l40.62,33.85a8,8,0,1,1-10.24,12.29l-48-40a8,8,0,0,1,0-12.29l48-40a8,8,0,0,1,10.24,12.3Zm176,27.7-48-40a8,8,0,1,0-10.24,12.3L227.5,128l-40.62,33.85a8,8,0,1,0,10.24,12.29l48-40a8,8,0,0,0,0-12.29ZM162.73,32.48a8,8,0,0,0-10.25,4.79l-64,176a8,8,0,0,0,4.79,10.26A8.14,8.14,0,0,0,96,224a8,8,0,0,0,7.52-5.27l64-176A8,8,0,0,0,162.73,32.48Z"></path>
                        </svg>
                        Accordion Item #3
                        <div class="ml-auto" :class="{'rotate-180' : current === 3}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path fill="currentColor" d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"></path>
                            </svg>
                        </div>
                    </button>
                    <div x-cloak x-show="current === 3" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Accordion Without Arrow</h2>
            <div class="space-y-2" x-data="{ current: 1 }">
                <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                    <button type="button" class="p-4 w-full text-start text-gray" :class="{'!text-dark dark:!text-white' : current === 1}" x-on:click="current === 1 ? current = null : current = 1">
                        Accordion Item #1
                    </button>
                    <div x-cloak x-show="current === 1" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                    <button type="button" class="p-4 w-full text-start text-gray" :class="{'!text-dark dark:!text-white' : current === 2}" x-on:click="current === 2 ? current = null : current = 2">
                        Accordion Item #2
                    </button>
                    <div x-cloak x-show="current === 2" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                    <button type="button" class="p-4 w-full text-start text-gray" :class="{'!text-dark dark:!text-white' : current === 3}" x-on:click="current === 3 ? current = null : current = 3">
                        Accordion Item #3
                    </button>
                    <div x-cloak x-show="current === 3" x-collapse>
                        <div class="space-y-2 p-4 text-lightgray text-sm font-normal dark:border-gray/20 border-t-2 border-lightgray/10">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection