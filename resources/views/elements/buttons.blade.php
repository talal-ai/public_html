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
                <li>Buttons</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Buttons</h2>
            <div class="flex flex-wrap gap-5">
                <button type="button" class="btn bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">Primary</button>
                <button type="button" class="btn bg-purple border border-purple rounded-md text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]">Purple</button>
                <button type="button" class="btn bg-success border border-success rounded-md text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">Success</button>
                <button type="button" class="btn bg-warning border border-warning rounded-md text-white transition-all duration-300 hover:bg-warning/[0.85] hover:border-warning/[0.85]">Warning</button>
                <button type="button" class="btn bg-danger border border-danger rounded-md text-white transition-all duration-300 hover:bg-danger/[0.85] hover:border-danger/[0.85]">Danger</button>
                <button type="button" class="btn bg-dark dark:bg-white dark:text-dark dark:border-white border border-dark rounded-md text-white transition-all duration-300 hover:bg-dark/[0.85] hover:border-dark/[0.85]">black</button>
                <button type="button" class="btn bg-gray/10 border border-gray/10 rounded-md transition-all duration-300 hover:bg-gray/[0.15] hover:border-gray/[0.15]">Light</button>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Buttons</h2>
            <div class="flex flex-wrap gap-5">
                <button type="button" class="btn bg-primary border border-primary rounded-full text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">Primary</button>
                <button type="button" class="btn bg-purple border border-purple rounded-full text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]">Purple</button>
                <button type="button" class="btn bg-success border border-success rounded-full text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">Success</button>
                <button type="button" class="btn bg-warning border border-warning rounded-full text-white transition-all duration-300 hover:bg-warning/[0.85] hover:border-warning/[0.85]">Warning</button>
                <button type="button" class="btn bg-danger border border-danger rounded-full text-white transition-all duration-300 hover:bg-danger/[0.85] hover:border-danger/[0.85]">Danger</button>
                <button type="button" class="btn bg-dark dark:bg-white dark:text-dark dark:border-white border border-dark rounded-full text-white transition-all duration-300 hover:bg-dark/[0.85] hover:border-dark/[0.85]">black</button>
                <button type="button" class="btn bg-gray/10 border border-gray/10 rounded-full transition-all duration-300 hover:bg-gray/[0.15] hover:border-gray/[0.15]">Light</button>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Outlined Buttons</h2>
            <div class="flex flex-wrap gap-5">
                <button type="button" class="btn border text-primary border-primary rounded-md transition-all duration-300 hover:bg-primary hover:text-white">Primary</button>
                <button type="button" class="btn border text-purple border-purple rounded-md transition-all duration-300 hover:bg-purple hover:text-white">Purple</button>
                <button type="button" class="btn border text-success border-success rounded-md transition-all duration-300 hover:bg-success hover:text-white">Success</button>
                <button type="button" class="btn border text-warning border-warning rounded-md transition-all duration-300 hover:bg-warning hover:text-white">Warning</button>
                <button type="button" class="btn border text-danger border-danger rounded-md transition-all duration-300 hover:bg-danger hover:text-white">Danger</button>
                <button type="button" class="btn dark:hover:bg-white dark:hover:text-dark dark:text-white dark:border-white border border-dark rounded-md text-dark hover:text-white transition-all duration-300 hover:bg-dark hover:border-dark">black</button>
                <button type="button" class="btn hover:bg-gray/10 border border-gray/10 rounded-full transition-all duration-300">Light</button>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Ghost Buttons</h2>
            <div class="flex flex-wrap gap-5">
                <button type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:bg-primary/10">Primary</button>
                <button type="button" class="btn border text-purple border-transparent rounded-md transition-all duration-300 hover:bg-purple/10">Purple</button>
                <button type="button" class="btn border text-success border-transparent rounded-md transition-all duration-300 hover:bg-success/10">Success</button>
                <button type="button" class="btn border text-warning border-transparent rounded-md transition-all duration-300 hover:bg-warning/10">Warning</button>
                <button type="button" class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:bg-danger/10">Danger</button>
                <button type="button" class="btn dark:hover:bg-white/10 border border-transparent rounded-md  transition-all duration-300 hover:bg-dark/10">black</button>
                <button type="button" class="btn hover:bg-gray/10 border border-transparent rounded-full transition-all duration-300">Light</button>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Soft Buttons</h2>
            <div class="flex flex-wrap gap-5">
                <button type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Primary</button>
                <button type="button" class="btn border text-purple border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-purple bg-purple/10">Purple</button>
                <button type="button" class="btn border text-success border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-success bg-success/10">Success</button>
                <button type="button" class="btn border text-warning border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-warning bg-warning/10">Warning</button>
                <button type="button" class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10">Danger</button>
                <button type="button" class="btn dark:hover:bg-white border border-transparent rounded-md  transition-all duration-300 dark:hover:text-dark dark:bg-white/10 hover:text-white hover:bg-dark bg-dark/10">black</button>
                <button type="button" class="btn hover:bg-gray/10 bg-transparent border border-transparent rounded-full transition-all duration-300">Light</button>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Disabled Buttons</h2>
            <div class="flex flex-wrap gap-5">
                <button type="button" class="btn bg-primary border border-primary rounded-md text-white transition-all duration-300 opacity-60 cursor-not-allowed">Primary</button>
                <button type="button" class="btn bg-purple border border-purple rounded-md text-white transition-all duration-300 opacity-60 cursor-not-allowed">Purple</button>
                <button type="button" class="btn bg-success border border-success rounded-md text-white transition-all duration-300 opacity-60 cursor-not-allowed">Success</button>
                <button type="button" class="btn bg-warning border border-warning rounded-md text-white transition-all duration-300 opacity-60 cursor-not-allowed">Warning</button>
                <button type="button" class="btn bg-danger border border-danger rounded-md text-white transition-all duration-300 opacity-60 cursor-not-allowed">Danger</button>
                <button type="button" class="btn bg-dark dark:bg-white dark:text-dark dark:border-white border border-dark rounded-md text-white transition-all duration-300 opacity-60 cursor-not-allowed">black</button>
                <button type="button" class="btn bg-gray/10 border border-gray/10 rounded-md transition-all duration-300 opacity-60 cursor-not-allowed">Light</button>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Button Loader</h2>
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
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Buttons Soft Sizes</h2>
            <div class="flex flex-wrap items-center gap-5">
                <button type="button" class="py-0.5 px-3 bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">Primary</button>
                <button type="button" class="py-1 px-3 bg-purple border border-purple rounded-md text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]">Purple</button>
                <button type="button" class="py-2 px-3 bg-success border border-success rounded-md text-white transition-all duration-300 hover:bg-success/[0.85] hover:border-success/[0.85]">Success</button>
                <button type="button" class="py-2.5 px-4 bg-gray/10 border border-gray/10 rounded-md transition-all duration-300 hover:bg-gray/[0.15] hover:border-gray/[0.15]">Light</button>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Buttons With Leading Icon</h2>
            <div class="flex flex-wrap items-center gap-5">
                <button type="button" class="btn flex items-center gap-2 bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 7.00005L7 7.00005M7 7.00005L1 7.00005M7 7.00005L7 1M7 7.00005L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    Add Event
                </button>
                <button type="button" class="btn flex items-center gap-2 bg-purple border border-purple rounded-md text-white transition-all duration-300 hover:bg-purple/[0.85] hover:border-purple/[0.85]">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1116_30887)">
                            <path d="M9.57342 2.71912L10.1913 2.1012C11.2151 1.07739 12.8751 1.07739 13.8989 2.1012C14.9227 3.125 14.9227 4.78491 13.8989 5.80871L13.2809 6.42663M9.57342 2.71912C9.57342 2.71912 9.65066 4.03219 10.8093 5.19079C11.9679 6.34939 13.2809 6.42663 13.2809 6.42663M9.57342 2.71912L3.89259 8.39994C3.50782 8.78472 3.31543 8.97711 3.14997 9.18923C2.9548 9.43947 2.78746 9.71022 2.65094 9.99669C2.5352 10.2395 2.44916 10.4977 2.27708 11.0139L1.54791 13.2014M13.2809 6.42663L7.60011 12.1075C7.21533 12.4922 7.02295 12.6846 6.81082 12.8501C6.56059 13.0453 6.28984 13.2126 6.00336 13.3491C5.7605 13.4649 5.50239 13.5509 4.98616 13.723L2.79865 14.4521M2.79865 14.4521L2.26393 14.6304C2.00989 14.7151 1.72981 14.6489 1.54046 14.4596C1.35111 14.2702 1.28499 13.9902 1.36967 13.7361L1.54791 13.2014M2.79865 14.4521L1.54791 13.2014" stroke="currentColor" stroke-width="1.6" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1116_30887">
                                <rect width="16" height="16" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    Edit Content
                </button>
                <button type="button" class="btn flex items-center gap-2 bg-danger border border-danger rounded-md text-white transition-all duration-300 hover:bg-danger/[0.85] hover:border-danger/[0.85]">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.29166 5.13898C2.29166 4.75545 2.57947 4.44454 2.93451 4.44454L5.15471 4.44417C5.59584 4.43209 5.985 4.12909 6.13511 3.68084C6.13905 3.66906 6.14359 3.65452 6.15987 3.60177L6.25553 3.29169C6.31407 3.10157 6.36508 2.93594 6.43644 2.78789C6.7184 2.20299 7.24005 1.79683 7.84288 1.69285C7.99547 1.66653 8.15706 1.66664 8.34254 1.66677H11.2409C11.4264 1.66664 11.588 1.66653 11.7406 1.69285C12.3434 1.79683 12.8651 2.20299 13.147 2.78789C13.2184 2.93594 13.2694 3.10157 13.3279 3.29169L13.4236 3.60177C13.4399 3.65452 13.4444 3.66906 13.4484 3.68084C13.5985 4.12909 14.0648 4.43246 14.5059 4.44454H16.6488C17.0038 4.44454 17.2917 4.75545 17.2917 5.13898C17.2917 5.5225 17.0038 5.83342 16.6488 5.83342H2.93451C2.57947 5.83342 2.29166 5.5225 2.29166 5.13898Z" fill="currentColor" />
                        <path opacity="0.3" d="M9.67232 18.3333H10.3281C12.5843 18.3333 13.7125 18.3333 14.4459 17.6139C15.1794 16.8946 15.2545 15.7146 15.4046 13.3547L15.6208 9.95428C15.7023 8.67382 15.743 8.03358 15.375 7.62788C15.007 7.22217 14.3856 7.22217 13.1429 7.22217H6.85755C5.61477 7.22217 4.99337 7.22217 4.62541 7.62788C4.25744 8.03358 4.29815 8.67382 4.37959 9.95428L4.59584 13.3547C4.74593 15.7146 4.82097 16.8946 5.55446 17.6139C6.28795 18.3333 7.41607 18.3333 9.67232 18.3333Z" fill="currentColor" />
                    </svg>
                    Danger
                </button>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Buttons With Leading Icon</h2>
            <div class="flex flex-wrap gap-5">
                <button type="button" class="border w-10 h-10 flex items-center justify-center text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 7.00005L7 7.00005M7 7.00005L1 7.00005M7 7.00005L7 1M7 7.00005L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
                <button type="button" class="bg-gray/10 w-10 h-10 flex items-center justify-center hover:bg-dark hover:text-white dark:hover:bg-white dark:hover:text-dark border border-transparent rounded-md transition-all duration-300">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.57342 2.71915L10.1913 2.10123C11.2151 1.07742 12.8751 1.07742 13.8989 2.10123C14.9227 3.12503 14.9227 4.78494 13.8989 5.80874L13.2809 6.42666M9.57342 2.71915C9.57342 2.71915 9.65066 4.03223 10.8093 5.19082C11.9679 6.34942 13.2809 6.42666 13.2809 6.42666M9.57342 2.71915L3.89259 8.39997C3.50782 8.78475 3.31543 8.97714 3.14997 9.18926C2.9548 9.4395 2.78746 9.71025 2.65094 9.99672C2.5352 10.2396 2.44916 10.4977 2.27708 11.0139L1.54791 13.2014M13.2809 6.42666L7.60011 12.1075C7.21533 12.4923 7.02295 12.6847 6.81082 12.8501C6.56059 13.0453 6.28984 13.2126 6.00336 13.3491C5.7605 13.4649 5.50239 13.5509 4.98616 13.723L2.79865 14.4522M2.79865 14.4522L2.26393 14.6304C2.00989 14.7151 1.72981 14.649 1.54046 14.4596C1.35111 14.2703 1.28499 13.9902 1.36967 13.7361L1.54791 13.2014M2.79865 14.4522L1.54791 13.2014" stroke="currentColor" stroke-width="1.6" />
                    </svg>
                </button>
                <button type="button" class="border w-10 h-10 flex items-center justify-center text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.29166 5.13898C2.29166 4.75545 2.57947 4.44454 2.93451 4.44454L5.15471 4.44417C5.59584 4.43209 5.985 4.12909 6.13511 3.68084C6.13905 3.66906 6.14359 3.65452 6.15987 3.60177L6.25553 3.29169C6.31407 3.10157 6.36508 2.93594 6.43644 2.78789C6.7184 2.20299 7.24005 1.79683 7.84288 1.69285C7.99547 1.66653 8.15706 1.66664 8.34254 1.66677H11.2409C11.4264 1.66664 11.588 1.66653 11.7406 1.69285C12.3434 1.79683 12.8651 2.20299 13.147 2.78789C13.2184 2.93594 13.2694 3.10157 13.3279 3.29169L13.4236 3.60177C13.4399 3.65452 13.4444 3.66906 13.4484 3.68084C13.5985 4.12909 14.0648 4.43246 14.5059 4.44454H16.6488C17.0038 4.44454 17.2917 4.75545 17.2917 5.13898C17.2917 5.5225 17.0038 5.83341 16.6488 5.83341H2.93451C2.57947 5.83341 2.29166 5.5225 2.29166 5.13898Z" fill="currentColor" />
                        <path opacity="0.3" d="M9.67232 18.3333H10.3281C12.5843 18.3333 13.7125 18.3333 14.4459 17.6139C15.1794 16.8946 15.2545 15.7146 15.4046 13.3547L15.6208 9.95428C15.7023 8.67382 15.743 8.03358 15.375 7.62788C15.007 7.22217 14.3856 7.22217 13.1429 7.22217H6.85755C5.61477 7.22217 4.99337 7.22217 4.62541 7.62788C4.25744 8.03358 4.29815 8.67382 4.37959 9.95428L4.59584 13.3547C4.74593 15.7146 4.82097 16.8946 5.55446 17.6139C6.28795 18.3333 7.41607 18.3333 9.67232 18.3333Z" fill="currentColor" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Buttons Group</h2>
            <div class="inline-flex">
                <button type="button" class="btn border rounded-s-md rounded-e-none text-white transition-all duration-300 bg-primary/[0.85] border-primary/[0.85]">Primary</button>
                <button type="button" class="btn bg-primary border border-primary rounded-none text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">Primary</button>
                <button type="button" class="btn bg-primary border border-primary rounded-e-md rounded-s-none text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">Primary</button>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Buttons With Icons Group</h2>
            <div class="inline-flex">
                <button type="button" class="btn border rounded-s-md rounded-e-none text-white transition-all duration-300 bg-primary/[0.85] border-primary/[0.85] flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                        <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216ZM80,108a12,12,0,1,1,12,12A12,12,0,0,1,80,108Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,176,108Zm-1.08,48c-10.29,17.79-27.39,28-46.92,28s-36.63-10.2-46.92-28a8,8,0,1,1,13.84-8c7.47,12.91,19.21,20,33.08,20s25.61-7.1,33.08-20a8,8,0,1,1,13.84,8Z"></path>
                    </svg>
                    Primary
                </button>
                <button type="button" class="btn bg-primary border border-primary rounded-none text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85] flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                        <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216ZM80,108a12,12,0,1,1,12,12A12,12,0,0,1,80,108Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,176,108Zm-1.08,48c-10.29,17.79-27.39,28-46.92,28s-36.63-10.2-46.92-28a8,8,0,1,1,13.84-8c7.47,12.91,19.21,20,33.08,20s25.61-7.1,33.08-20a8,8,0,1,1,13.84,8Z"></path>
                    </svg>
                    Primary
                </button>
                <button type="button" class="btn bg-primary border border-primary rounded-e-md rounded-s-none text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85] flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 256 256">
                        <path d="M224,128a96,96,0,1,1-96-96A96,96,0,0,1,224,128Z" opacity="0.2"></path>
                        <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216ZM80,108a12,12,0,1,1,12,12A12,12,0,0,1,80,108Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,176,108Zm-1.08,48c-10.29,17.79-27.39,28-46.92,28s-36.63-10.2-46.92-28a8,8,0,1,1,13.84-8c7.47,12.91,19.21,20,33.08,20s25.61-7.1,33.08-20a8,8,0,1,1,13.84,8Z"></path>
                    </svg>
                    Primary
                </button>
            </div>
        </div>
    </div>
</div>

@endsection