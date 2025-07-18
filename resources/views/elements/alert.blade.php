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
                <li>Alerts</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Basic Alert</h2>
            <div class="grid grid-cols-1 gap-5">
                <div class="rounded p-3 bg-primary/10 text-primary">A simple primary alert—check it out!</div>
                <div class="rounded p-3 bg-purple/10 text-purple">A simple purple alert—check it out!</div>
                <div class="rounded p-3 bg-success/10 text-success">A simple Success alert—check it out!</div>
                <div class="rounded p-3 bg-warning/10 text-warning">A simple Warning alert—check it out!</div>
                <div class="rounded p-3 bg-danger/10 text-danger">A simple Danger alert—check it out!</div>
                <div class="rounded p-3 bg-dark/10 dark:bg-white/10">A simple black alert—check it out!</div>
                <div class="rounded p-3 bg-gray/10">A simple light alert—check it out!</div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Outline Alert</h2>
            <div class="grid grid-cols-1 gap-5">
                <div class="rounded p-3 bg-primary/10 text-primary border border-primary/60">A simple primary alert—check it out!</div>
                <div class="rounded p-3 bg-purple/10 text-purple border border-purple/60">A simple purple alert—check it out!</div>
                <div class="rounded p-3 bg-success/10 text-success border border-success/60">A simple Success alert—check it out!</div>
                <div class="rounded p-3 bg-warning/10 text-warning border border-warning/60">A simple Warning alert—check it out!</div>
                <div class="rounded p-3 bg-danger/10 text-danger border border-danger/60">A simple Danger alert—check it out!</div>
                <div class="rounded p-3 bg-dark/10 dark:bg-white/10 border border-dark/60 dark:border-white/40">A simple black alert—check it out!</div>
                <div class="rounded p-3 bg-gray/10 border border-gray/60">A simple light alert—check it out!</div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Alert With Close Button</h2>
            <div class="grid grid-cols-1 gap-5">
                <div class="rounded p-3 bg-primary text-white border border-primary/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple primary alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-purple text-white border border-purple/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple purple alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-success text-white border border-success/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple Success alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-warning text-white border border-warning/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple Warning alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-danger text-white border border-danger/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple Danger alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-dark text-white dark:text-dark dark:bg-white border border-dark/60 dark:border-white/40 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple black alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-gray/20 border border-gray/10 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple light alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Outline Alert With Close Button</h2>
            <div class="grid grid-cols-1 gap-5">
                <div class="rounded p-3 bg-primary/10 text-primary border border-primary/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple primary alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-purple/10 text-purple border border-purple/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple purple alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-success/10 text-success border border-success/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple Success alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-warning/10 text-warning border border-warning/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple Warning alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-danger/10 text-danger border border-danger/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple Danger alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-dark/10 dark:bg-white/10 border border-dark/60 dark:border-white/40 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple black alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-gray/10 border border-gray/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple light alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Alert With Accent Border</h2>
            <div class="grid grid-cols-1 gap-5">
                <div class="p-3 bg-primary/10 text-primary border-l-4 border-primary/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple primary alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-3 bg-success/10 text-success border-l-4 border-success/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple Success alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-3 bg-warning/10 text-warning border-l-4 border-warning/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple Warning alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-3 bg-danger/10 text-danger border-l-4 border-danger/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">A simple Danger alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Alert With Icons</h2>
            <div class="grid grid-cols-1 gap-5">
                <div class="rounded p-3 bg-primary/10 text-primary border border-primary/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M16.25 10.0781V13.125H3.75V10C3.74998 9.17521 3.9132 8.35858 4.23027 7.59717C4.54734 6.83576 5.01198 6.14464 5.5974 5.56365C6.18282 4.98265 6.87745 4.52328 7.64125 4.212C8.40504 3.90073 9.22289 3.74371 10.0477 3.75C13.4937 3.77578 16.25 6.63203 16.25 10.0781Z" fill="currentColor" />
                        <path d="M9.375 1.25V0.625C9.375 0.45924 9.44085 0.300269 9.55806 0.183058C9.67527 0.065848 9.83424 0 10 0C10.1658 0 10.3247 0.065848 10.4419 0.183058C10.5592 0.300269 10.625 0.45924 10.625 0.625V1.25C10.625 1.41576 10.5592 1.57473 10.4419 1.69194C10.3247 1.80915 10.1658 1.875 10 1.875C9.83424 1.875 9.67527 1.80915 9.55806 1.69194C9.44085 1.57473 9.375 1.41576 9.375 1.25ZM15.625 3.75C15.7071 3.75006 15.7884 3.73395 15.8643 3.70259C15.9402 3.67122 16.0091 3.62521 16.0672 3.56719L16.6922 2.94219C16.8095 2.82491 16.8753 2.66585 16.8753 2.5C16.8753 2.33415 16.8095 2.17509 16.6922 2.05781C16.5749 1.94054 16.4159 1.87465 16.25 1.87465C16.0841 1.87465 15.9251 1.94054 15.8078 2.05781L15.1828 2.68281C15.0953 2.77022 15.0357 2.88163 15.0115 3.00293C14.9874 3.12424 14.9998 3.24998 15.0471 3.36424C15.0945 3.47851 15.1746 3.57616 15.2775 3.64483C15.3804 3.71349 15.5013 3.7501 15.625 3.75ZM3.93281 3.56719C3.99088 3.62526 4.05982 3.67132 4.13569 3.70275C4.21156 3.73417 4.29288 3.75035 4.375 3.75035C4.45712 3.75035 4.53844 3.73417 4.61431 3.70275C4.69018 3.67132 4.75912 3.62526 4.81719 3.56719C4.87526 3.50912 4.92132 3.44018 4.95275 3.36431C4.98417 3.28844 5.00035 3.20712 5.00035 3.125C5.00035 3.04288 4.98417 2.96156 4.95275 2.88569C4.92132 2.80982 4.87526 2.74088 4.81719 2.68281L4.19219 2.05781C4.07491 1.94054 3.91585 1.87465 3.75 1.87465C3.58415 1.87465 3.42509 1.94054 3.30781 2.05781C3.19054 2.17509 3.12465 2.33415 3.12465 2.5C3.12465 2.66585 3.19054 2.82491 3.30781 2.94219L3.93281 3.56719ZM10.7297 5.63359C10.6484 5.61922 10.565 5.62109 10.4845 5.63911C10.4039 5.65712 10.3277 5.69092 10.2603 5.73856C10.1928 5.7862 10.1355 5.84672 10.0916 5.91664C10.0477 5.98656 10.018 6.06448 10.0044 6.14592C9.99079 6.22735 9.99344 6.31067 10.0122 6.39107C10.031 6.47148 10.0655 6.54737 10.1137 6.61436C10.162 6.68135 10.223 6.73812 10.2934 6.78138C10.3637 6.82464 10.4419 6.85354 10.5234 6.86641C12.0055 7.11562 13.125 8.4625 13.125 10C13.125 10.1658 13.1908 10.3247 13.3081 10.4419C13.4253 10.5592 13.5842 10.625 13.75 10.625C13.9158 10.625 14.0747 10.5592 14.1919 10.4419C14.3092 10.3247 14.375 10.1658 14.375 10C14.375 7.85938 12.807 5.98203 10.7281 5.63359H10.7297ZM18.125 13.75V15.625C18.125 15.9565 17.9933 16.2745 17.7589 16.5089C17.5245 16.7433 17.2065 16.875 16.875 16.875H3.125C2.79348 16.875 2.47554 16.7433 2.24112 16.5089C2.0067 16.2745 1.875 15.9565 1.875 15.625V13.75C1.875 13.4185 2.0067 13.1005 2.24112 12.8661C2.47554 12.6317 2.79348 12.5 3.125 12.5V10C3.125 8.17664 3.84933 6.42795 5.13864 5.13864C6.42795 3.84933 8.17664 3.125 10 3.125H10.0531C13.8148 3.15313 16.8758 6.27266 16.8758 10.0781V12.5C17.2072 12.5002 17.5249 12.632 17.7592 12.8664C17.9934 13.1008 18.125 13.4186 18.125 13.75ZM4.375 12.5H15.625V10.0781C15.625 6.95312 13.1211 4.39766 10.043 4.375H10C8.50816 4.375 7.07742 4.96763 6.02252 6.02252C4.96763 7.07742 4.375 8.50816 4.375 10V12.5ZM16.875 15.625V13.75H3.125V15.625H16.875Z" fill="currentColor" />
                    </svg>
                    A simple primary alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-success/10 text-success border border-success/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M18.75 5V15C18.75 15.3315 18.6183 15.6495 18.3839 15.8839C18.1495 16.1183 17.8315 16.25 17.5 16.25H2.5C2.16848 16.25 1.85054 16.1183 1.61612 15.8839C1.3817 15.6495 1.25 15.3315 1.25 15V5C1.25 4.66848 1.3817 4.35054 1.61612 4.11612C1.85054 3.8817 2.16848 3.75 2.5 3.75H17.5C17.8315 3.75 18.1495 3.8817 18.3839 4.11612C18.6183 4.35054 18.75 4.66848 18.75 5Z" fill="currentColor" />
                        <path d="M11.0673 7.94219L6.69229 12.3172C6.63425 12.3753 6.56531 12.4214 6.48944 12.4529C6.41357 12.4843 6.33224 12.5005 6.2501 12.5005C6.16797 12.5005 6.08664 12.4843 6.01077 12.4529C5.93489 12.4214 5.86596 12.3753 5.80792 12.3172L3.93292 10.4422C3.81564 10.3249 3.74976 10.1659 3.74976 10C3.74976 9.83415 3.81564 9.67509 3.93292 9.55782C4.05019 9.44054 4.20925 9.37466 4.3751 9.37466C4.54096 9.37466 4.70002 9.44054 4.81729 9.55782L6.2501 10.9914L10.1829 7.05782C10.241 6.99975 10.3099 6.95368 10.3858 6.92226C10.4617 6.89083 10.543 6.87466 10.6251 6.87466C10.7072 6.87466 10.7885 6.89083 10.8644 6.92226C10.9403 6.95368 11.0092 6.99975 11.0673 7.05782C11.1254 7.11588 11.1714 7.18482 11.2028 7.26069C11.2343 7.33656 11.2505 7.41788 11.2505 7.5C11.2505 7.58213 11.2343 7.66344 11.2028 7.73931C11.1714 7.81518 11.1254 7.88412 11.0673 7.94219ZM16.6923 7.05782C16.6342 6.99971 16.5653 6.95361 16.4894 6.92215C16.4136 6.8907 16.3322 6.87451 16.2501 6.87451C16.168 6.87451 16.0866 6.8907 16.0108 6.92215C15.9349 6.95361 15.866 6.99971 15.8079 7.05782L11.8751 10.9914L11.0673 10.1828C10.95 10.0655 10.791 9.99966 10.6251 9.99966C10.4593 9.99966 10.3002 10.0655 10.1829 10.1828C10.0656 10.3001 9.99976 10.4592 9.99976 10.625C9.99976 10.7909 10.0656 10.9499 10.1829 11.0672L11.4329 12.3172C11.491 12.3753 11.5599 12.4214 11.6358 12.4529C11.7116 12.4843 11.793 12.5005 11.8751 12.5005C11.9572 12.5005 12.0386 12.4843 12.1144 12.4529C12.1903 12.4214 12.2592 12.3753 12.3173 12.3172L16.6923 7.94219C16.7504 7.88415 16.7965 7.81521 16.828 7.73934C16.8594 7.66347 16.8756 7.58214 16.8756 7.5C16.8756 7.41787 16.8594 7.33654 16.828 7.26067C16.7965 7.18479 16.7504 7.11586 16.6923 7.05782Z" fill="currentColor" />
                    </svg>
                    A simple Success alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-warning/10 text-warning border border-warning/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <pth opacity="0.3" d="M16.8329 16.875H3.16727C2.18133 16.875 1.56258 15.843 2.04148 15.007L8.8743 3.14218C9.36648 2.28281 10.6337 2.28281 11.1259 3.14218L17.9587 15.007C18.4376 15.843 17.8188 16.875 16.8329 16.875Z" fill="currentColor" />
                        <path d="M18.5001 14.6945L11.6681 2.82969C11.4973 2.53901 11.2536 2.29799 10.961 2.13052C10.6685 1.96305 10.3372 1.87495 10.0001 1.87495C9.66299 1.87495 9.33174 1.96305 9.03916 2.13052C8.74659 2.29799 8.50286 2.53901 8.33214 2.82969L1.50011 14.6945C1.33584 14.9757 1.24927 15.2955 1.24927 15.6211C1.24927 15.9467 1.33584 16.2665 1.50011 16.5477C1.66865 16.8401 1.91196 17.0824 2.20508 17.2498C2.49819 17.4172 2.83056 17.5035 3.16807 17.5H16.8321C17.1694 17.5032 17.5014 17.4167 17.7942 17.2494C18.0871 17.0821 18.3301 16.8399 18.4985 16.5477C18.663 16.2666 18.7499 15.9469 18.7502 15.6213C18.7504 15.2957 18.6641 14.9758 18.5001 14.6945ZM17.4165 15.9219C17.357 16.0235 17.2714 16.1074 17.1688 16.1651C17.0661 16.2227 16.9499 16.252 16.8321 16.25H3.16807C3.05032 16.252 2.93415 16.2227 2.83146 16.1651C2.72877 16.1074 2.64326 16.0235 2.5837 15.9219C2.52975 15.8305 2.50129 15.7264 2.50129 15.6203C2.50129 15.5142 2.52975 15.4101 2.5837 15.3188L9.41573 3.45391C9.47649 3.3528 9.56239 3.26913 9.66506 3.21104C9.76774 3.15295 9.8837 3.12242 10.0017 3.12242C10.1196 3.12242 10.2356 3.15295 10.3383 3.21104C10.4409 3.26913 10.5268 3.3528 10.5876 3.45391L17.4196 15.3188C17.4731 15.4104 17.501 15.5147 17.5005 15.6207C17.4999 15.7268 17.4709 15.8308 17.4165 15.9219ZM9.37511 11.25V8.12501C9.37511 7.95925 9.44095 7.80027 9.55816 7.68306C9.67537 7.56585 9.83435 7.50001 10.0001 7.50001C10.1659 7.50001 10.3248 7.56585 10.442 7.68306C10.5593 7.80027 10.6251 7.95925 10.6251 8.12501V11.25C10.6251 11.4158 10.5593 11.5747 10.442 11.6919C10.3248 11.8092 10.1659 11.875 10.0001 11.875C9.83435 11.875 9.67537 11.8092 9.55816 11.6919C9.44095 11.5747 9.37511 11.4158 9.37511 11.25ZM10.9376 14.0625C10.9376 14.2479 10.8826 14.4292 10.7796 14.5834C10.6766 14.7375 10.5302 14.8577 10.3589 14.9286C10.1876 14.9996 9.99907 15.0182 9.81721 14.982C9.63535 14.9458 9.4683 14.8565 9.33719 14.7254C9.20608 14.5943 9.11679 14.4273 9.08062 14.2454C9.04445 14.0635 9.06301 13.875 9.13397 13.7037C9.20493 13.5324 9.32509 13.386 9.47926 13.283C9.63343 13.18 9.81469 13.125 10.0001 13.125C10.2487 13.125 10.4872 13.2238 10.663 13.3996C10.8388 13.5754 10.9376 13.8139 10.9376 14.0625Z" fill="currentColor" />
                    </svg>
                    A simple Warning alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
                <div class="rounded p-3 bg-danger/10 text-danger border border-danger/60 flex items-center gap-2" x-show="showElement" x-data="{ showElement: true }">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M17.5 7.15234V12.8477C17.5001 12.9298 17.484 13.0111 17.4526 13.0869C17.4212 13.1628 17.3752 13.2318 17.3172 13.2898L13.2898 17.3172C13.2318 17.3752 13.1628 17.4212 13.0869 17.4526C13.0111 17.484 12.9298 17.5001 12.8477 17.5H7.15234C7.07024 17.5001 6.98894 17.484 6.91306 17.4526C6.83719 17.4212 6.76824 17.3752 6.71016 17.3172L2.68281 13.2898C2.62479 13.2318 2.57878 13.1628 2.54741 13.0869C2.51605 13.0111 2.49994 12.9298 2.5 12.8477V7.15234C2.49994 7.07024 2.51605 6.98894 2.54741 6.91306C2.57878 6.83719 2.62479 6.76824 2.68281 6.71016L6.71016 2.68281C6.76824 2.62479 6.83719 2.57878 6.91306 2.54741C6.98894 2.51605 7.07024 2.49994 7.15234 2.5H12.8477C12.9298 2.49994 13.0111 2.51605 13.0869 2.54741C13.1628 2.57878 13.2318 2.62479 13.2898 2.68281L17.3172 6.71016C17.3752 6.76824 17.4212 6.83719 17.4526 6.91306C17.484 6.98894 17.5001 7.07024 17.5 7.15234Z" fill="currentColor" />
                        <path d="M9.37501 10.625V6.25001C9.37501 6.08425 9.44085 5.92527 9.55806 5.80806C9.67528 5.69085 9.83425 5.62501 10 5.62501C10.1658 5.62501 10.3247 5.69085 10.4419 5.80806C10.5592 5.92527 10.625 6.08425 10.625 6.25001V10.625C10.625 10.7908 10.5592 10.9497 10.4419 11.0669C10.3247 11.1842 10.1658 11.25 10 11.25C9.83425 11.25 9.67528 11.1842 9.55806 11.0669C9.44085 10.9497 9.37501 10.7908 9.37501 10.625ZM18.125 7.15235V12.8477C18.1255 13.0119 18.0934 13.1746 18.0305 13.3262C17.9676 13.4779 17.8752 13.6156 17.7586 13.7313L13.7313 17.7586C13.6156 17.8752 13.4779 17.9676 13.3262 18.0305C13.1746 18.0934 13.0119 18.1255 12.8477 18.125H7.15235C6.98814 18.1255 6.82546 18.0934 6.67377 18.0305C6.52208 17.9676 6.38441 17.8752 6.26876 17.7586L2.24141 13.7313C2.12483 13.6156 2.03241 13.4779 1.96951 13.3262C1.9066 13.1746 1.87448 13.0119 1.87501 12.8477V7.15235C1.87448 6.98814 1.9066 6.82546 1.96951 6.67377C2.03241 6.52208 2.12483 6.38441 2.24141 6.26876L6.26876 2.24141C6.38441 2.12483 6.52208 2.03241 6.67377 1.96951C6.82546 1.9066 6.98814 1.87448 7.15235 1.87501H12.8477C13.0119 1.87448 13.1746 1.9066 13.3262 1.96951C13.4779 2.03241 13.6156 2.12483 13.7313 2.24141L17.7586 6.26876C17.8752 6.38441 17.9676 6.52208 18.0305 6.67377C18.0934 6.82546 18.1255 6.98814 18.125 7.15235ZM16.875 7.15235L12.8477 3.12501H7.15235L3.12501 7.15235V12.8477L7.15235 16.875H12.8477L16.875 12.8477V7.15235ZM10 12.5C9.81459 12.5 9.63333 12.555 9.47916 12.658C9.32499 12.761 9.20483 12.9074 9.13387 13.0787C9.06291 13.25 9.04435 13.4385 9.08052 13.6204C9.11669 13.8023 9.20598 13.9693 9.33709 14.1004C9.46821 14.2315 9.63525 14.3208 9.81711 14.357C9.99897 14.3932 10.1875 14.3746 10.3588 14.3036C10.5301 14.2327 10.6765 14.1125 10.7795 13.9584C10.8825 13.8042 10.9375 13.6229 10.9375 13.4375C10.9375 13.1889 10.8387 12.9504 10.6629 12.7746C10.4871 12.5988 10.2486 12.5 10 12.5Z" fill="currentColor" />
                    </svg>
                    A simple Danger alert—check it out!
                    <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Alert Additional Content</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="rounded p-3 border border-primary/60 bg-primary/10 text-primary" x-show="showElement" x-data="{ showElement: true }">
                    <div class="flex items-center gap-2">
                        <span class="text-lg">A simple primary alert—check it out!</span>
                        <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="rounded p-3 border border-success/60 bg-success/10 text-success" x-show="showElement" x-data="{ showElement: true }">
                    <div class="flex items-center gap-2">
                        <span class="text-lg">A simple primary alert—check it out!</span>
                        <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="rounded p-3 border border-warning/60 bg-warning/10 text-warning" x-show="showElement" x-data="{ showElement: true }">
                    <div class="flex items-center gap-2">
                        <span class="text-lg">A simple Warning alert—check it out!</span>
                        <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="rounded p-3 border border-danger/60 bg-danger/10 text-danger" x-show="showElement" x-data="{ showElement: true }">
                    <div class="flex items-center gap-2">
                        <span class="text-lg">A simple Danger alert—check it out!</span>
                        <button type="button" x-on:click="showElement = false" class="ml-auto hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="mt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Alert Examples</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
                <div class="rounded p-4 border border-purple bg-purple/10 text-purple relative text-center" x-show="showElement" x-data="{ showElement: true }">
                    <button type="button" x-on:click="showElement = false" class="absolute right-2 top-2 hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                    <span>
                        <svg class="w-12 h-12 mx-auto" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M16.25 10.0781V13.125H3.75V10C3.74998 9.17521 3.9132 8.35858 4.23027 7.59717C4.54734 6.83576 5.01198 6.14464 5.5974 5.56365C6.18282 4.98265 6.87745 4.52328 7.64125 4.212C8.40504 3.90073 9.22289 3.74371 10.0477 3.75C13.4937 3.77578 16.25 6.63203 16.25 10.0781Z" fill="currentColor" />
                            <path d="M9.375 1.25V0.625C9.375 0.45924 9.44085 0.300269 9.55806 0.183058C9.67527 0.065848 9.83424 0 10 0C10.1658 0 10.3247 0.065848 10.4419 0.183058C10.5592 0.300269 10.625 0.45924 10.625 0.625V1.25C10.625 1.41576 10.5592 1.57473 10.4419 1.69194C10.3247 1.80915 10.1658 1.875 10 1.875C9.83424 1.875 9.67527 1.80915 9.55806 1.69194C9.44085 1.57473 9.375 1.41576 9.375 1.25ZM15.625 3.75C15.7071 3.75006 15.7884 3.73395 15.8643 3.70259C15.9402 3.67122 16.0091 3.62521 16.0672 3.56719L16.6922 2.94219C16.8095 2.82491 16.8753 2.66585 16.8753 2.5C16.8753 2.33415 16.8095 2.17509 16.6922 2.05781C16.5749 1.94054 16.4159 1.87465 16.25 1.87465C16.0841 1.87465 15.9251 1.94054 15.8078 2.05781L15.1828 2.68281C15.0953 2.77022 15.0357 2.88163 15.0115 3.00293C14.9874 3.12424 14.9998 3.24998 15.0471 3.36424C15.0945 3.47851 15.1746 3.57616 15.2775 3.64483C15.3804 3.71349 15.5013 3.7501 15.625 3.75ZM3.93281 3.56719C3.99088 3.62526 4.05982 3.67132 4.13569 3.70275C4.21156 3.73417 4.29288 3.75035 4.375 3.75035C4.45712 3.75035 4.53844 3.73417 4.61431 3.70275C4.69018 3.67132 4.75912 3.62526 4.81719 3.56719C4.87526 3.50912 4.92132 3.44018 4.95275 3.36431C4.98417 3.28844 5.00035 3.20712 5.00035 3.125C5.00035 3.04288 4.98417 2.96156 4.95275 2.88569C4.92132 2.80982 4.87526 2.74088 4.81719 2.68281L4.19219 2.05781C4.07491 1.94054 3.91585 1.87465 3.75 1.87465C3.58415 1.87465 3.42509 1.94054 3.30781 2.05781C3.19054 2.17509 3.12465 2.33415 3.12465 2.5C3.12465 2.66585 3.19054 2.82491 3.30781 2.94219L3.93281 3.56719ZM10.7297 5.63359C10.6484 5.61922 10.565 5.62109 10.4845 5.63911C10.4039 5.65712 10.3277 5.69092 10.2603 5.73856C10.1928 5.7862 10.1355 5.84672 10.0916 5.91664C10.0477 5.98656 10.018 6.06448 10.0044 6.14592C9.99079 6.22735 9.99344 6.31067 10.0122 6.39107C10.031 6.47148 10.0655 6.54737 10.1137 6.61436C10.162 6.68135 10.223 6.73812 10.2934 6.78138C10.3637 6.82464 10.4419 6.85354 10.5234 6.86641C12.0055 7.11562 13.125 8.4625 13.125 10C13.125 10.1658 13.1908 10.3247 13.3081 10.4419C13.4253 10.5592 13.5842 10.625 13.75 10.625C13.9158 10.625 14.0747 10.5592 14.1919 10.4419C14.3092 10.3247 14.375 10.1658 14.375 10C14.375 7.85938 12.807 5.98203 10.7281 5.63359H10.7297ZM18.125 13.75V15.625C18.125 15.9565 17.9933 16.2745 17.7589 16.5089C17.5245 16.7433 17.2065 16.875 16.875 16.875H3.125C2.79348 16.875 2.47554 16.7433 2.24112 16.5089C2.0067 16.2745 1.875 15.9565 1.875 15.625V13.75C1.875 13.4185 2.0067 13.1005 2.24112 12.8661C2.47554 12.6317 2.79348 12.5 3.125 12.5V10C3.125 8.17664 3.84933 6.42795 5.13864 5.13864C6.42795 3.84933 8.17664 3.125 10 3.125H10.0531C13.8148 3.15313 16.8758 6.27266 16.8758 10.0781V12.5C17.2072 12.5002 17.5249 12.632 17.7592 12.8664C17.9934 13.1008 18.125 13.4186 18.125 13.75ZM4.375 12.5H15.625V10.0781C15.625 6.95312 13.1211 4.39766 10.043 4.375H10C8.50816 4.375 7.07742 4.96763 6.02252 6.02252C4.96763 7.07742 4.375 8.50816 4.375 10V12.5ZM16.875 15.625V13.75H3.125V15.625H16.875Z" fill="currentColor" />
                        </svg>
                    </span>
                    <p class="text-lg mt-3">Primary alert</p>
                    <p class="mt-2">Lorem Ipsum is simply dummy text.</p>
                </div>
                <div class="rounded p-4 border border-success bg-success/10 text-success relative text-center" x-show="showElement" x-data="{ showElement: true }">
                    <button type="button" x-on:click="showElement = false" class="absolute right-2 top-2 hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                    <span>
                        <svg class="w-12 h-12 mx-auto" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M18.75 5V15C18.75 15.3315 18.6183 15.6495 18.3839 15.8839C18.1495 16.1183 17.8315 16.25 17.5 16.25H2.5C2.16848 16.25 1.85054 16.1183 1.61612 15.8839C1.3817 15.6495 1.25 15.3315 1.25 15V5C1.25 4.66848 1.3817 4.35054 1.61612 4.11612C1.85054 3.8817 2.16848 3.75 2.5 3.75H17.5C17.8315 3.75 18.1495 3.8817 18.3839 4.11612C18.6183 4.35054 18.75 4.66848 18.75 5Z" fill="currentColor" />
                            <path d="M11.0673 7.94219L6.69229 12.3172C6.63425 12.3753 6.56531 12.4214 6.48944 12.4529C6.41357 12.4843 6.33224 12.5005 6.2501 12.5005C6.16797 12.5005 6.08664 12.4843 6.01077 12.4529C5.93489 12.4214 5.86596 12.3753 5.80792 12.3172L3.93292 10.4422C3.81564 10.3249 3.74976 10.1659 3.74976 10C3.74976 9.83415 3.81564 9.67509 3.93292 9.55782C4.05019 9.44054 4.20925 9.37466 4.3751 9.37466C4.54096 9.37466 4.70002 9.44054 4.81729 9.55782L6.2501 10.9914L10.1829 7.05782C10.241 6.99975 10.3099 6.95368 10.3858 6.92226C10.4617 6.89083 10.543 6.87466 10.6251 6.87466C10.7072 6.87466 10.7885 6.89083 10.8644 6.92226C10.9403 6.95368 11.0092 6.99975 11.0673 7.05782C11.1254 7.11588 11.1714 7.18482 11.2028 7.26069C11.2343 7.33656 11.2505 7.41788 11.2505 7.5C11.2505 7.58213 11.2343 7.66344 11.2028 7.73931C11.1714 7.81518 11.1254 7.88412 11.0673 7.94219ZM16.6923 7.05782C16.6342 6.99971 16.5653 6.95361 16.4894 6.92215C16.4136 6.8907 16.3322 6.87451 16.2501 6.87451C16.168 6.87451 16.0866 6.8907 16.0108 6.92215C15.9349 6.95361 15.866 6.99971 15.8079 7.05782L11.8751 10.9914L11.0673 10.1828C10.95 10.0655 10.791 9.99966 10.6251 9.99966C10.4593 9.99966 10.3002 10.0655 10.1829 10.1828C10.0656 10.3001 9.99976 10.4592 9.99976 10.625C9.99976 10.7909 10.0656 10.9499 10.1829 11.0672L11.4329 12.3172C11.491 12.3753 11.5599 12.4214 11.6358 12.4529C11.7116 12.4843 11.793 12.5005 11.8751 12.5005C11.9572 12.5005 12.0386 12.4843 12.1144 12.4529C12.1903 12.4214 12.2592 12.3753 12.3173 12.3172L16.6923 7.94219C16.7504 7.88415 16.7965 7.81521 16.828 7.73934C16.8594 7.66347 16.8756 7.58214 16.8756 7.5C16.8756 7.41787 16.8594 7.33654 16.828 7.26067C16.7965 7.18479 16.7504 7.11586 16.6923 7.05782Z" fill="currentColor" />
                        </svg>
                    </span>
                    <p class="text-lg mt-3">Success alert</p>
                    <p class="mt-2">Lorem Ipsum is simply dummy text.</p>
                </div>
                <div class="rounded p-4 border border-warning bg-warning/10 text-warning relative text-center" x-show="showElement" x-data="{ showElement: true }">
                    <button type="button" x-on:click="showElement = false" class="absolute right-2 top-2 hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                    <span>
                        <svg class="w-12 h-12 mx-auto" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <pth opacity="0.3" d="M16.8329 16.875H3.16727C2.18133 16.875 1.56258 15.843 2.04148 15.007L8.8743 3.14218C9.36648 2.28281 10.6337 2.28281 11.1259 3.14218L17.9587 15.007C18.4376 15.843 17.8188 16.875 16.8329 16.875Z" fill="currentColor" />
                            <path d="M18.5001 14.6945L11.6681 2.82969C11.4973 2.53901 11.2536 2.29799 10.961 2.13052C10.6685 1.96305 10.3372 1.87495 10.0001 1.87495C9.66299 1.87495 9.33174 1.96305 9.03916 2.13052C8.74659 2.29799 8.50286 2.53901 8.33214 2.82969L1.50011 14.6945C1.33584 14.9757 1.24927 15.2955 1.24927 15.6211C1.24927 15.9467 1.33584 16.2665 1.50011 16.5477C1.66865 16.8401 1.91196 17.0824 2.20508 17.2498C2.49819 17.4172 2.83056 17.5035 3.16807 17.5H16.8321C17.1694 17.5032 17.5014 17.4167 17.7942 17.2494C18.0871 17.0821 18.3301 16.8399 18.4985 16.5477C18.663 16.2666 18.7499 15.9469 18.7502 15.6213C18.7504 15.2957 18.6641 14.9758 18.5001 14.6945ZM17.4165 15.9219C17.357 16.0235 17.2714 16.1074 17.1688 16.1651C17.0661 16.2227 16.9499 16.252 16.8321 16.25H3.16807C3.05032 16.252 2.93415 16.2227 2.83146 16.1651C2.72877 16.1074 2.64326 16.0235 2.5837 15.9219C2.52975 15.8305 2.50129 15.7264 2.50129 15.6203C2.50129 15.5142 2.52975 15.4101 2.5837 15.3188L9.41573 3.45391C9.47649 3.3528 9.56239 3.26913 9.66506 3.21104C9.76774 3.15295 9.8837 3.12242 10.0017 3.12242C10.1196 3.12242 10.2356 3.15295 10.3383 3.21104C10.4409 3.26913 10.5268 3.3528 10.5876 3.45391L17.4196 15.3188C17.4731 15.4104 17.501 15.5147 17.5005 15.6207C17.4999 15.7268 17.4709 15.8308 17.4165 15.9219ZM9.37511 11.25V8.12501C9.37511 7.95925 9.44095 7.80027 9.55816 7.68306C9.67537 7.56585 9.83435 7.50001 10.0001 7.50001C10.1659 7.50001 10.3248 7.56585 10.442 7.68306C10.5593 7.80027 10.6251 7.95925 10.6251 8.12501V11.25C10.6251 11.4158 10.5593 11.5747 10.442 11.6919C10.3248 11.8092 10.1659 11.875 10.0001 11.875C9.83435 11.875 9.67537 11.8092 9.55816 11.6919C9.44095 11.5747 9.37511 11.4158 9.37511 11.25ZM10.9376 14.0625C10.9376 14.2479 10.8826 14.4292 10.7796 14.5834C10.6766 14.7375 10.5302 14.8577 10.3589 14.9286C10.1876 14.9996 9.99907 15.0182 9.81721 14.982C9.63535 14.9458 9.4683 14.8565 9.33719 14.7254C9.20608 14.5943 9.11679 14.4273 9.08062 14.2454C9.04445 14.0635 9.06301 13.875 9.13397 13.7037C9.20493 13.5324 9.32509 13.386 9.47926 13.283C9.63343 13.18 9.81469 13.125 10.0001 13.125C10.2487 13.125 10.4872 13.2238 10.663 13.3996C10.8388 13.5754 10.9376 13.8139 10.9376 14.0625Z" fill="currentColor" />
                        </svg>
                    </span>
                    <p class="text-lg mt-3">Warning alert</p>
                    <p class="mt-2">Lorem Ipsum is simply dummy text.</p>
                </div>
                <div class="rounded p-4 border border-danger bg-danger/10 text-danger relative text-center" x-show="showElement" x-data="{ showElement: true }">
                    <button type="button" x-on:click="showElement = false" class="absolute right-2 top-2 hover:opacity-80 rotate-0 hover:rotate-180 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                        </svg>
                    </button>
                    <span>
                        <svg class="w-12 h-12 mx-auto" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M17.5 7.15234V12.8477C17.5001 12.9298 17.484 13.0111 17.4526 13.0869C17.4212 13.1628 17.3752 13.2318 17.3172 13.2898L13.2898 17.3172C13.2318 17.3752 13.1628 17.4212 13.0869 17.4526C13.0111 17.484 12.9298 17.5001 12.8477 17.5H7.15234C7.07024 17.5001 6.98894 17.484 6.91306 17.4526C6.83719 17.4212 6.76824 17.3752 6.71016 17.3172L2.68281 13.2898C2.62479 13.2318 2.57878 13.1628 2.54741 13.0869C2.51605 13.0111 2.49994 12.9298 2.5 12.8477V7.15234C2.49994 7.07024 2.51605 6.98894 2.54741 6.91306C2.57878 6.83719 2.62479 6.76824 2.68281 6.71016L6.71016 2.68281C6.76824 2.62479 6.83719 2.57878 6.91306 2.54741C6.98894 2.51605 7.07024 2.49994 7.15234 2.5H12.8477C12.9298 2.49994 13.0111 2.51605 13.0869 2.54741C13.1628 2.57878 13.2318 2.62479 13.2898 2.68281L17.3172 6.71016C17.3752 6.76824 17.4212 6.83719 17.4526 6.91306C17.484 6.98894 17.5001 7.07024 17.5 7.15234Z" fill="currentColor" />
                            <path d="M9.37501 10.625V6.25001C9.37501 6.08425 9.44085 5.92527 9.55806 5.80806C9.67528 5.69085 9.83425 5.62501 10 5.62501C10.1658 5.62501 10.3247 5.69085 10.4419 5.80806C10.5592 5.92527 10.625 6.08425 10.625 6.25001V10.625C10.625 10.7908 10.5592 10.9497 10.4419 11.0669C10.3247 11.1842 10.1658 11.25 10 11.25C9.83425 11.25 9.67528 11.1842 9.55806 11.0669C9.44085 10.9497 9.37501 10.7908 9.37501 10.625ZM18.125 7.15235V12.8477C18.1255 13.0119 18.0934 13.1746 18.0305 13.3262C17.9676 13.4779 17.8752 13.6156 17.7586 13.7313L13.7313 17.7586C13.6156 17.8752 13.4779 17.9676 13.3262 18.0305C13.1746 18.0934 13.0119 18.1255 12.8477 18.125H7.15235C6.98814 18.1255 6.82546 18.0934 6.67377 18.0305C6.52208 17.9676 6.38441 17.8752 6.26876 17.7586L2.24141 13.7313C2.12483 13.6156 2.03241 13.4779 1.96951 13.3262C1.9066 13.1746 1.87448 13.0119 1.87501 12.8477V7.15235C1.87448 6.98814 1.9066 6.82546 1.96951 6.67377C2.03241 6.52208 2.12483 6.38441 2.24141 6.26876L6.26876 2.24141C6.38441 2.12483 6.52208 2.03241 6.67377 1.96951C6.82546 1.9066 6.98814 1.87448 7.15235 1.87501H12.8477C13.0119 1.87448 13.1746 1.9066 13.3262 1.96951C13.4779 2.03241 13.6156 2.12483 13.7313 2.24141L17.7586 6.26876C17.8752 6.38441 17.9676 6.52208 18.0305 6.67377C18.0934 6.82546 18.1255 6.98814 18.125 7.15235ZM16.875 7.15235L12.8477 3.12501H7.15235L3.12501 7.15235V12.8477L7.15235 16.875H12.8477L16.875 12.8477V7.15235ZM10 12.5C9.81459 12.5 9.63333 12.555 9.47916 12.658C9.32499 12.761 9.20483 12.9074 9.13387 13.0787C9.06291 13.25 9.04435 13.4385 9.08052 13.6204C9.11669 13.8023 9.20598 13.9693 9.33709 14.1004C9.46821 14.2315 9.63525 14.3208 9.81711 14.357C9.99897 14.3932 10.1875 14.3746 10.3588 14.3036C10.5301 14.2327 10.6765 14.1125 10.7795 13.9584C10.8825 13.8042 10.9375 13.6229 10.9375 13.4375C10.9375 13.1889 10.8387 12.9504 10.6629 12.7746C10.4871 12.5988 10.2486 12.5 10 12.5Z" fill="currentColor" />
                        </svg>
                    </span>
                    <p class="text-lg mt-3">Warning alert</p>
                    <p class="mt-2">Lorem Ipsum is simply dummy text.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection