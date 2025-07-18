@extends('Layout.layout')

@section('content')
<!-- &amp;&amp; -->
<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 gap-4" x-data="contact">
        <div class="flex gap-5 relative overflow-hidden">
            <div class="bg-white inset-y-0 dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-l-lg xl:rounded-lg py-5 absolute w-80 z-20 flex-none -left-80 xl:static overflow-hidden"
                :class="isShowContactList  '!left-0'">
                <div class="px-5">
                    <div class="flex items-center gap-5">
                        <form class="w-full">
                            <div class="relative">
                                <input type="text" id="search"
                                    class="form-input ps-10 h-[42px] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 border-2 border-gray/10 bg-gray/[8%] rounded-full text-sm text-dark placeholder:text-lightgray/80 focus:ring-0 focus:border-primary/80 focus:outline-0"
                                    placeholder="Search..." required="">
                                <button type="button" class="absolute inset-y-0 left-3 flex items-center">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_87_857)">
                                            <circle cx="8.625" cy="8.625" r="7.125" stroke="#267DFF" stroke-width="2">
                                            </circle>
                                            <path opacity="0.3" d="M15 15L16.5 16.5" stroke="#267DFF" stroke-width="2"
                                                stroke-linecap="round"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_87_857">
                                                <rect width="18" height="18" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="h-[calc(100vh-320px)] overflow-auto space-y-[30px] px-5 mt-[30px]">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('public/assets/images/avatar-9.png') }}" class="h-[42px] rounded-full" alt="">
                        <div class="flex-1">
                            <p class="text-sm font-semibold line-clamp-1">Charles Macomber</p>
                            <p class="mt-1 text-xs text-gray line-clamp-1">charlesm@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('public/assets/images/avatar-10.png') }}" class="h-[42px] rounded-full" alt="">
                        <div class="flex-1">
                            <p class="text-sm font-semibold line-clamp-1">Gary Collins</p>
                            <p class="mt-1 text-xs text-gray line-clamp-1">garycollins@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('public/assets/images/avatar-11.png') }}" class="h-[42px] rounded-full" alt="">
                        <div class="flex-1">
                            <p class="text-sm font-semibold line-clamp-1">Sabila Sayma</p>
                            <p class="mt-1 text-xs text-gray line-clamp-1">sabilas1@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('public/assets/images/avatar-12.png') }}" class="h-[42px] rounded-full" alt="">
                        <div class="flex-1">
                            <p class="text-sm font-semibold line-clamp-1">Alice Davis</p>
                            <p class="mt-1 text-xs text-gray line-clamp-1">alicedavis@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('public/assets/images/avatar-13.png') }}" class="h-[42px] rounded-full" alt="">
                        <div class="flex-1">
                            <p class="text-sm font-semibold line-clamp-1">Edward Castiglia</p>
                            <p class="mt-1 text-xs text-gray line-clamp-1">edwardc@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('public/assets/images/avatar-14.png') }}" class="h-[42px] rounded-full" alt="">
                        <div class="flex-1">
                            <p class="text-sm font-semibold line-clamp-1">Julie Dick</p>
                            <p class="mt-1 text-xs text-gray line-clamp-1">juliedick123@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('public/assets/images/avatar-15.png') }}" class="h-[42px] rounded-full" alt="">
                        <div class="flex-1">
                            <p class="text-sm font-semibold line-clamp-1">Bob Briscoe</p>
                            <p class="mt-1 text-xs text-gray line-clamp-1">bobBriscoe@gmail.com</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('public/assets/images/avatar-16.png') }}" class="h-[42px] rounded-full" alt="">
                        <div class="flex-1">
                            <p class="text-sm font-semibold line-clamp-1">Juanita Thompson</p>
                            <p class="mt-1 text-xs text-gray line-clamp-1">juanitathompson@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-dark/90 dark:bg-white/5 backdrop-blur-sm lg:hidden z-[5] w-full h-full absolute rounded-md hidden"
                :class="isShowContactList &amp;&amp; '!block xl:!hidden'"
                @click="isShowContactList = !isShowContactList"></div>
            <!-- <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg flex-grow min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]"> -->
            <div class="flex-grow flex flex-col gap-7 h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)] overflow-y-auto"
                x-data="{ activeTab : 'activity' }">
                <div
                    class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg p-5 flex-1 sm:flex-none relative">
                    <div class="flex items-center gap-5 justify-between flex-wrap">
                        <div class="flex items-center gap-2.5">
                            <button type="button" class="xl:hidden hover:text-primary duration-300"
                                @click="isShowContactList = !isShowContactList">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8"
                                        fill="currentColor"></rect>
                                    <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8"
                                        fill="currentColor"></rect>
                                    <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                                </svg>
                            </button>
                            <img src="{{ asset('public/assets/images/avatar-18.png') }}" class="h-20 rounded-full" alt="">
                            <div>
                                <p class="text-sm font-bold line-clamp-1">Candy Chambers</p>
                                <p class="mt-2 text-xs font-semibold text-lightgray">CEO & Founder</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-5">
                            <div class="space-y-2.5 text-center text-lightgray dark:text-gray">
                                <a href="javascript:;"
                                    class="dark:border-gray/20 border-2 border-lightgray/10 w-9 h-9 flex items-center justify-center rounded-full">
                                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13 7.50005L7 7.50005M7 7.50005L1 7.50005M7 7.50005L7 1.5M7 7.50005L7 13.5"
                                            stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    </svg>
                                </a>
                                <span class="text-xs">Log</span>
                            </div>
                            <div class="space-y-2.5 text-center text-lightgray dark:text-gray">
                                <a href="javascript:;"
                                    class="dark:border-gray/20 border-2 border-lightgray/10 w-9 h-9 flex items-center justify-center rounded-full">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.66666 10.4999C1.66666 7.35722 1.66666 5.78587 2.64297 4.80956C3.61928 3.83325 5.19063 3.83325 8.33332 3.83325H11.6667C14.8094 3.83325 16.3807 3.83325 17.357 4.80956C18.3333 5.78587 18.3333 7.35722 18.3333 10.4999C18.3333 13.6426 18.3333 15.214 17.357 16.1903C16.3807 17.1666 14.8094 17.1666 11.6667 17.1666H8.33332C5.19063 17.1666 3.61928 17.1666 2.64297 16.1903C1.66666 15.214 1.66666 13.6426 1.66666 10.4999Z"
                                            stroke="currentColor" stroke-width="1.6" />
                                        <path
                                            d="M5 7.16675L6.79908 8.66598C8.32961 9.94142 9.09488 10.5791 10 10.5791C10.9051 10.5791 11.6704 9.94142 13.2009 8.66598L15 7.16675"
                                            stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                    </svg>
                                </a>
                                <span class="text-xs">Mail</span>
                            </div>
                            <div class="space-y-2.5 text-center text-lightgray dark:text-gray">
                                <a href="javascript:;"
                                    class="dark:border-gray/20 border-2 border-lightgray/10 w-9 h-9 flex items-center justify-center rounded-full">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.36467 4.93006L8.90551 5.89917C9.3936 6.77374 9.19766 7.92102 8.42894 8.68975C8.42893 8.68975 8.42894 8.68975 8.42893 8.68975C8.42882 8.68987 7.49659 9.62231 9.18711 11.3128C10.877 13.0027 11.8094 12.0718 11.8102 12.071C11.8102 12.071 11.8102 12.071 11.8102 12.071C12.5789 11.3023 13.7262 11.1063 14.6008 11.5944L15.5699 12.1353C16.8905 12.8723 17.0464 14.7243 15.8857 15.8851C15.1881 16.5826 14.3337 17.1253 13.3891 17.1611C11.799 17.2214 9.09858 16.819 6.38976 14.1102C3.68095 11.4014 3.27852 8.70094 3.3388 7.11082C3.37461 6.16625 3.91735 5.31178 4.61485 4.61428C5.77564 3.45349 7.62765 3.60945 8.36467 4.93006Z"
                                            stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                    </svg>
                                </a>
                                <span class="text-xs">Call</span>
                            </div>
                            <div class="space-y-2.5 text-center text-lightgray dark:text-gray">
                                <div x-data="{ dropdown: false}" class="dropdown ml-auto">
                                    <a href="javaScript:;"
                                        class="dark:border-gray/20 border-2 border-lightgray/10 w-9 h-9 flex items-center justify-center rounded-full"
                                        @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                        <svg width="18" height="5" viewBox="0 0 18 5" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2" cy="2.5" r="2" fill="currentColor" />
                                            <circle cx="9" cy="2.5" r="2" fill="currentColor" />
                                            <circle cx="16" cy="2.5" r="2" fill="currentColor" />
                                        </svg>
                                    </a>
                                    <ul x-show="dropdown" @click.away="dropdown = false" x-transition=""
                                        x-transition.duration.300ms="" class="right-0 whitespace-nowrap">
                                        <li><a href="javascript:;">All</a></li>
                                        <li><a href="javascript:;">Read</a></li>
                                        <li><a href="javascript:;">Unread</a></li>
                                    </ul>
                                </div>
                                <span class="text-xs">Log</span>
                            </div>
                        </div>
                    </div>
                    <div class="h-[2px] bg-gray/10 dark:bg-gray/20 block my-[30px]"></div>
                    <div class="flex items-center gap-3 flex-wrap">
                        <button @click="activeTab = 'activity'"
                            :class="activeTab === 'activity' ? 'text-white border-primary bg-primary' : 'hover:text-white hover:bg-primary hover:border-primary text-gray'"
                            class="text-xs/none duration-300 font-bold uppercase dark:border-gray/20 border-2 border-lightgray/10 rounded-full py-3.5 px-5">
                            Activity
                        </button>
                        <button @click="activeTab = 'notes'"
                            :class="activeTab === 'notes' ? 'text-white border-primary bg-primary' : 'hover:text-white hover:bg-primary hover:border-primary text-gray'"
                            class="text-xs/none duration-300 font-bold uppercase dark:border-gray/20 border-2 border-lightgray/10 rounded-full py-3.5 px-5">
                            Notes
                        </button>
                        <button @click="activeTab = 'emails'"
                            :class="activeTab === 'emails' ? 'text-white border-primary bg-primary' : 'hover:text-white hover:bg-primary hover:border-primary text-gray'"
                            class="text-xs/none duration-300 font-bold uppercase dark:border-gray/20 border-2 border-lightgray/10 rounded-full py-3.5 px-5">
                            Emails
                        </button>
                        <button @click="activeTab = 'meetings'"
                            :class="activeTab === 'meetings' ? 'text-white border-primary bg-primary' : 'hover:text-white hover:bg-primary hover:border-primary text-gray'"
                            class="text-xs/none duration-300 font-bold uppercase dark:border-gray/20 border-2 border-lightgray/10 rounded-full py-3.5 px-5">
                            Meetings
                        </button>
                    </div>
                </div>
                <div x-show="activeTab === 'activity'"
                    class="p-5 dark:border-gray/20 border-2 border-lightgray/10 rounded-lg flex-grow">
                    <div class="flex items-center gap-5 flex-wrap justify-between">
                        <p class="font-semibold">Upcoming Activity</>
                        <div class="flex items-center gap-2.5">
                            <div x-data="{ dropdown: false}" class="dropdown">
                                <a href="javaScript:;"
                                    class="font-semibold uppercase dark:border-gray/20 border-2 border-lightgray/10 gap-2 py-2 px-3.5 rounded-lg items-center flex justify-center"
                                    @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                    <div class="flex items-center gap-1.5">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.8333 2.5H4.16666C2.98815 2.5 2.39889 2.5 2.03277 2.8435C1.66666 3.187 1.66666 3.73985 1.66666 4.84555V5.4204C1.66666 6.28527 1.66666 6.7177 1.88299 7.07618C2.09932 7.43466 2.49455 7.65715 3.285 8.10212L5.71253 9.46865C6.24287 9.7672 6.50805 9.91648 6.69792 10.0813C7.09331 10.4246 7.33672 10.8279 7.44702 11.3226C7.49999 11.5602 7.49999 11.8382 7.49999 12.3941L7.49999 14.6187C7.49999 15.3766 7.49999 15.7556 7.70993 16.0511C7.91986 16.3465 8.29273 16.4923 9.03845 16.7838C10.604 17.3958 11.3867 17.7018 11.9434 17.3537C12.5 17.0055 12.5 16.2099 12.5 14.6187V12.3941C12.5 11.8382 12.5 11.5602 12.553 11.3226C12.6633 10.8279 12.9067 10.4246 13.3021 10.0813C13.4919 9.91648 13.7571 9.7672 14.2875 9.46865L16.715 8.10212C17.5054 7.65715 17.9007 7.43466 18.117 7.07618C18.3333 6.7177 18.3333 6.28527 18.3333 5.4204V4.84555C18.3333 3.73985 18.3333 3.187 17.9672 2.8435C17.6011 2.5 17.0118 2.5 15.8333 2.5Z"
                                                stroke="currentColor" stroke-width="1.6" />
                                        </svg>
                                        Filter
                                    </div>
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.29289 4.70711C0.902369 4.31658 0.902369 3.68342 1.29289 3.29289C1.68342 2.90237 2.31658 2.90237 2.70711 3.29289L6 6.58579L9.29289 3.29289C9.68342 2.90237 10.3166 2.90237 10.7071 3.29289C11.0976 3.68342 11.0976 4.31658 10.7071 4.70711L6.70711 8.70711C6.31658 9.09763 5.68342 9.09763 5.29289 8.70711L1.29289 4.70711Z"
                                            fill="#267DFF" />
                                    </svg>
                                </a>
                                <ul x-show="dropdown" @click.away="dropdown = false" x-transition=""
                                    x-transition.duration.300ms="" class="right-0 whitespace-nowrap">
                                    <li><a href="javascript:;">All</a></li>
                                    <li><a href="javascript:;">Read</a></li>
                                    <li><a href="javascript:;">Unread</a></li>
                                </ul>
                            </div>
                            <div x-data="{ dropdown: false}" class="dropdown">
                                <a href="javaScript:;"
                                    class="font-semibold uppercase dark:border-gray/20 border-2 border-gray/20 gap-2 py-2 px-3.5 rounded-lg items-center flex justify-center"
                                    @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                    <div class="flex items-center gap-1.5">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.66666 10C1.66666 6.85734 1.66666 5.286 2.64297 4.30968C3.61928 3.33337 5.19063 3.33337 8.33332 3.33337H11.6667C14.8094 3.33337 16.3807 3.33337 17.357 4.30968C18.3333 5.286 18.3333 6.85734 18.3333 10V11.6667C18.3333 14.8094 18.3333 16.3808 17.357 17.3571C16.3807 18.3334 14.8094 18.3334 11.6667 18.3334H8.33332C5.19063 18.3334 3.61928 18.3334 2.64297 17.3571C1.66666 16.3808 1.66666 14.8094 1.66666 11.6667V10Z"
                                                stroke="currentColor" stroke-width="1.6" />
                                            <path d="M5.83334 3.33337V2.08337" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" />
                                            <path d="M14.1667 3.33337V2.08337" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" />
                                            <path d="M2.08334 7.5H17.9167" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                            <path
                                                d="M15 14.1667C15 14.6269 14.6269 15 14.1667 15C13.7064 15 13.3333 14.6269 13.3333 14.1667C13.3333 13.7064 13.7064 13.3333 14.1667 13.3333C14.6269 13.3333 15 13.7064 15 14.1667Z"
                                                fill="currentColor" />
                                            <path
                                                d="M15 10.8333C15 11.2936 14.6269 11.6667 14.1667 11.6667C13.7064 11.6667 13.3333 11.2936 13.3333 10.8333C13.3333 10.3731 13.7064 10 14.1667 10C14.6269 10 15 10.3731 15 10.8333Z"
                                                fill="currentColor" />
                                            <path
                                                d="M10.8333 14.1667C10.8333 14.6269 10.4602 15 9.99999 15C9.53975 15 9.16666 14.6269 9.16666 14.1667C9.16666 13.7064 9.53975 13.3333 9.99999 13.3333C10.4602 13.3333 10.8333 13.7064 10.8333 14.1667Z"
                                                fill="currentColor" />
                                            <path
                                                d="M10.8333 10.8333C10.8333 11.2936 10.4602 11.6667 9.99999 11.6667C9.53975 11.6667 9.16666 11.2936 9.16666 10.8333C9.16666 10.3731 9.53975 10 9.99999 10C10.4602 10 10.8333 10.3731 10.8333 10.8333Z"
                                                fill="currentColor" />
                                            <path
                                                d="M6.66667 14.1667C6.66667 14.6269 6.29357 15 5.83333 15C5.3731 15 5 14.6269 5 14.1667C5 13.7064 5.3731 13.3333 5.83333 13.3333C6.29357 13.3333 6.66667 13.7064 6.66667 14.1667Z"
                                                fill="currentColor" />
                                            <path
                                                d="M6.66667 10.8333C6.66667 11.2936 6.29357 11.6667 5.83333 11.6667C5.3731 11.6667 5 11.2936 5 10.8333C5 10.3731 5.3731 10 5.83333 10C6.29357 10 6.66667 10.3731 6.66667 10.8333Z"
                                                fill="currentColor" />
                                        </svg>
                                        Today
                                    </div>
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.29289 4.70711C0.902369 4.31658 0.902369 3.68342 1.29289 3.29289C1.68342 2.90237 2.31658 2.90237 2.70711 3.29289L6 6.58579L9.29289 3.29289C9.68342 2.90237 10.3166 2.90237 10.7071 3.29289C11.0976 3.68342 11.0976 4.31658 10.7071 4.70711L6.70711 8.70711C6.31658 9.09763 5.68342 9.09763 5.29289 8.70711L1.29289 4.70711Z"
                                            fill="#267DFF" />
                                    </svg>
                                </a>
                                <ul x-show="dropdown" @click.away="dropdown = false" x-transition=""
                                    x-transition.duration.300ms="" class="right-0 whitespace-nowrap">
                                    <li><a href="javascript:;">All</a></li>
                                    <li><a href="javascript:;">Read</a></li>
                                    <li><a href="javascript:;">Unread</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-[30px] grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="p-5 bg-gray/5 rounded-lg">
                            <div class="flex items-center justify-between gap-4">
                                <div class="inline-block text-primary bg-primary/10 py-2 px-3 text-sm rounded-lg">
                                    <span>Low</span>
                                </div>
                                <div x-data="{ dropdown: false}" class="dropdown">
                                    <a href="javaScript:;" class="text-lightgray hover:text-primary"
                                        @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                        <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                                            <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                                            <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                                        </svg>
                                    </a>
                                    <ul x-show="dropdown" @click.away="dropdown = false" x-transition=""
                                        x-transition.duration.300ms="" class="right-0 whitespace-nowrap"
                                        style="display: none;">
                                        <li><a href="javascript:;">All</a></li>
                                        <li><a href="javascript:;">Read</a></li>
                                        <li><a href="javascript:;">Unread</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-5">
                                <p class="font-semibold text-lg">Brainstorming</p>
                                <p class="text-gray mt-3">Brainstorming brings team members' diverse experience into
                                    play.</p>
                            </div>
                            <div class="mt-5 flex items-center justify-between gap-4 sm:flex-row flex-col">
                                <div class="flex items-center justify-start -space-x-4">
                                    <img src="{{ asset('public/assets/images/avatar-2.png') }}"
                                        class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover"
                                        alt="avatar">
                                    <img src="{{ asset('public/assets/images/avatar-3.png') }}"
                                        class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover"
                                        alt="avatar">
                                    <img src="{{ asset('public/assets/images/avatar-9.png') }}"
                                        class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover"
                                        alt="avatar">
                                </div>
                                <div class="flex items-center flex-wrap gap-2.5">
                                    <div class="text-sm flex items-center gap-1.5">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.9961 19.6054L12.6845 20.0129L11.9961 19.6054ZM12.493 18.7659L11.8046 18.3584L12.493 18.7659ZM9.50692 18.7659L8.81848 19.1734V19.1734L9.50692 18.7659ZM10.0038 19.6054L10.6923 19.1979L10.0038 19.6054ZM2.1822 14.5873L2.9213 14.2812H2.9213L2.1822 14.5873ZM7.14043 17.4089L7.12664 18.2088L7.14043 17.4089ZM4.66268 17.0678L4.35653 17.8069L4.35653 17.8069L4.66268 17.0678ZM19.8178 14.5873L20.5569 14.8935V14.8935L19.8178 14.5873ZM14.8595 17.4089L14.8457 16.609L14.8595 17.4089ZM17.3373 17.0678L17.6434 17.8069H17.6434L17.3373 17.0678ZM17.9781 2.50877L17.5601 3.19089L17.9781 2.50877ZM19.4912 4.02192L20.1734 3.60392V3.60392L19.4912 4.02192ZM4.02186 2.50877L3.60386 1.82666V1.82666L4.02186 2.50877ZM2.50871 4.02192L1.8266 3.60392H1.8266L2.50871 4.02192ZM8.6192 17.6091L9.02142 16.9175L9.02141 16.9175L8.6192 17.6091ZM12.6845 20.0129L13.1814 19.1734L11.8046 18.3584L11.3076 19.1979L12.6845 20.0129ZM8.81848 19.1734L9.3154 20.0129L10.6923 19.1979L10.1954 18.3584L8.81848 19.1734ZM11.3076 19.1979C11.1745 19.4229 10.8254 19.4229 10.6923 19.1979L9.3154 20.0129C10.0681 21.2845 11.9318 21.2845 12.6845 20.0129L11.3076 19.1979ZM9.62498 2.63337H12.375V1.03337H9.62498V2.63337ZM19.3666 9.62504V10.5417H20.9666V9.62504H19.3666ZM2.63331 10.5417V9.62504H1.03331V10.5417H2.63331ZM1.03331 10.5417C1.03331 11.5985 1.03288 12.4312 1.07878 13.104C1.12517 13.7839 1.22155 14.3586 1.44309 14.8935L2.9213 14.2812C2.79397 13.9738 2.7159 13.5935 2.67507 12.995C2.63375 12.3894 2.63331 11.6204 2.63331 10.5417H1.03331ZM7.15421 16.609C6.00338 16.5892 5.41979 16.5155 4.96883 16.3287L4.35653 17.8069C5.11613 18.1216 5.97598 18.1889 7.12664 18.2088L7.15421 16.609ZM1.44309 14.8935C1.98947 16.2126 3.03747 17.2605 4.35653 17.8069L4.96883 16.3287C4.0418 15.9447 3.30529 15.2082 2.9213 14.2812L1.44309 14.8935ZM19.3666 10.5417C19.3666 11.6204 19.3662 12.3894 19.3249 12.995C19.2841 13.5935 19.206 13.9738 19.0787 14.2812L20.5569 14.8935C20.7784 14.3586 20.8748 13.7839 20.9212 13.104C20.9671 12.4312 20.9666 11.5985 20.9666 10.5417H19.3666ZM14.8733 18.2088C16.0239 18.1889 16.8838 18.1216 17.6434 17.8069L17.0311 16.3287C16.5802 16.5155 15.9966 16.5892 14.8457 16.609L14.8733 18.2088ZM19.0787 14.2812C18.6947 15.2082 17.9582 15.9447 17.0311 16.3287L17.6434 17.8069C18.9625 17.2605 20.0105 16.2126 20.5569 14.8935L19.0787 14.2812ZM12.375 2.63337C13.8908 2.63337 14.9715 2.63422 15.8128 2.71421C16.6421 2.79306 17.1558 2.94316 17.5601 3.19089L18.3961 1.82666C17.6982 1.39899 16.9107 1.21138 15.9642 1.12139C15.0296 1.03253 13.8598 1.03337 12.375 1.03337V2.63337ZM20.9666 9.62504C20.9666 8.14021 20.9675 6.97041 20.8786 6.03582C20.7886 5.08933 20.601 4.30182 20.1734 3.60392L18.8091 4.43992C19.0569 4.84417 19.207 5.3579 19.2858 6.18727C19.3658 7.02855 19.3666 8.10923 19.3666 9.62504H20.9666ZM17.5601 3.19089C18.0692 3.50284 18.4972 3.93085 18.8091 4.43992L20.1734 3.60392C19.7295 2.87957 19.1205 2.27055 18.3961 1.82666L17.5601 3.19089ZM9.62498 1.03337C8.14015 1.03337 6.97035 1.03253 6.03576 1.12139C5.08927 1.21138 4.30176 1.39899 3.60386 1.82666L4.43986 3.19089C4.84411 2.94316 5.35784 2.79306 6.18721 2.71421C7.02849 2.63422 8.10917 2.63337 9.62498 2.63337V1.03337ZM2.63331 9.62504C2.63331 8.10923 2.63416 7.02855 2.71415 6.18727C2.793 5.3579 2.9431 4.84417 3.19082 4.43992L1.8266 3.60392C1.39893 4.30182 1.21132 5.08933 1.12133 6.03582C1.03247 6.97041 1.03331 8.14021 1.03331 9.62504H2.63331ZM3.60386 1.82666C2.87951 2.27055 2.27049 2.87957 1.8266 3.60392L3.19082 4.43992C3.50278 3.93085 3.93079 3.50284 4.43986 3.19089L3.60386 1.82666ZM10.1954 18.3584C10.0103 18.0458 9.84387 17.7629 9.68112 17.5396C9.50852 17.3028 9.30573 17.0829 9.02142 16.9175L8.21699 18.3006C8.24223 18.3153 8.29059 18.3482 8.3881 18.482C8.49545 18.6293 8.61807 18.8348 8.81848 19.1734L10.1954 18.3584ZM7.12664 18.2088C7.53124 18.2157 7.78006 18.2208 7.96799 18.2416C8.14108 18.2608 8.19439 18.2875 8.217 18.3006L9.02141 16.9175C8.73446 16.7506 8.43812 16.6839 8.14408 16.6513C7.86488 16.6204 7.5291 16.6155 7.15421 16.609L7.12664 18.2088ZM13.1814 19.1734C13.3819 18.8348 13.5045 18.6293 13.6118 18.482C13.7093 18.3482 13.7577 18.3153 13.7829 18.3006L12.9785 16.9175C12.6942 17.0829 12.4914 17.3028 12.3188 17.5396C12.156 17.7629 11.9896 18.0458 11.8046 18.3584L13.1814 19.1734ZM14.8457 16.609C14.4708 16.6155 14.135 16.6204 13.8558 16.6513C13.5618 16.6839 13.2655 16.7506 12.9785 16.9175L13.7829 18.3006C13.8055 18.2875 13.8588 18.2608 14.0319 18.2416C14.2199 18.2208 14.4687 18.2157 14.8733 18.2088L14.8457 16.609Z"
                                                fill="currentColor" />
                                            <path d="M7.33331 8.25H14.6666" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                            <path d="M7.33331 11.4584H12.375" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                        </svg>
                                        12 comments
                                    </div>
                                    <div class="text-sm flex items-center gap-1.5">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.5 9.16663L11.9167 9.16663" stroke="currentColor"
                                                stroke-width="1.6" stroke-linecap="round" />
                                            <path
                                                d="M9.16669 2.75H15.125C15.5507 2.75 15.7636 2.75 15.9423 2.77353C17.1763 2.93599 18.1474 3.90704 18.3098 5.14105C18.3334 5.31976 18.3334 5.53261 18.3334 5.95833"
                                                stroke="currentColor" stroke-width="1.6" />
                                            <path
                                                d="M1.83331 6.37064C1.83331 5.56166 1.83331 5.15716 1.89688 4.82023C2.17673 3.33699 3.33693 2.17679 4.82017 1.89694C5.1571 1.83337 5.56159 1.83337 6.37058 1.83337C6.72504 1.83337 6.90226 1.83337 7.07259 1.8493C7.80691 1.91797 8.50346 2.20649 9.07126 2.67718C9.20296 2.78635 9.32828 2.91167 9.57892 3.16231L10.0833 3.66671C10.8311 4.41451 11.205 4.7884 11.6528 5.03751C11.8987 5.17436 12.1596 5.28243 12.4303 5.35958C12.9231 5.50004 13.4518 5.50004 14.5094 5.50004H14.8519C17.2649 5.50004 18.4714 5.50004 19.2556 6.20538C19.3278 6.27026 19.3964 6.33892 19.4613 6.41105C20.1666 7.19528 20.1666 8.40178 20.1666 10.8148V12.8334C20.1666 16.2903 20.1666 18.0188 19.0927 19.0928C18.0188 20.1667 16.2903 20.1667 12.8333 20.1667H9.16665C5.70968 20.1667 3.9812 20.1667 2.90725 19.0928C1.83331 18.0188 1.83331 16.2903 1.83331 12.8334V6.37064Z"
                                                stroke="currentColor" stroke-width="1.6" />
                                        </svg>
                                        0 Files
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-5 bg-gray/5 rounded-lg">
                            <div class="flex items-center justify-between gap-4">
                                <div class="inline-block text-primary bg-primary/10 py-2 px-3 text-sm rounded-lg">
                                    <span>Low</span>
                                </div>
                                <div x-data="{ dropdown: false}" class="dropdown">
                                    <a href="javaScript:;" class="text-lightgray hover:text-primary"
                                        @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                        <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                                            <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                                            <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                                        </svg>
                                    </a>
                                    <ul x-show="dropdown" @click.away="dropdown = false" x-transition=""
                                        x-transition.duration.300ms="" class="right-0 whitespace-nowrap"
                                        style="display: none;">
                                        <li><a href="javascript:;">All</a></li>
                                        <li><a href="javascript:;">Read</a></li>
                                        <li><a href="javascript:;">Unread</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-5">
                                <p class="font-semibold text-lg">Brainstorming</p>
                                <p class="text-gray mt-3">Brainstorming brings team members' diverse experience into
                                    play.</p>
                            </div>
                            <div class="mt-5 flex items-center justify-between gap-4 sm:flex-row flex-col">
                                <div class="flex items-center justify-start -space-x-4">
                                    <img src="{{ asset('public/assets/images/avatar-2.png') }}"
                                        class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover"
                                        alt="avatar">
                                    <img src="{{ asset('public/assets/images/avatar-3.png') }}"
                                        class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover"
                                        alt="avatar">
                                    <img src="{{ asset('public/assets/images/avatar-9.png') }}"
                                        class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover"
                                        alt="avatar">
                                </div>
                                <div class="flex items-center flex-wrap gap-2.5">
                                    <div class="text-sm flex items-center gap-1.5">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.9961 19.6054L12.6845 20.0129L11.9961 19.6054ZM12.493 18.7659L11.8046 18.3584L12.493 18.7659ZM9.50692 18.7659L8.81848 19.1734V19.1734L9.50692 18.7659ZM10.0038 19.6054L10.6923 19.1979L10.0038 19.6054ZM2.1822 14.5873L2.9213 14.2812H2.9213L2.1822 14.5873ZM7.14043 17.4089L7.12664 18.2088L7.14043 17.4089ZM4.66268 17.0678L4.35653 17.8069L4.35653 17.8069L4.66268 17.0678ZM19.8178 14.5873L20.5569 14.8935V14.8935L19.8178 14.5873ZM14.8595 17.4089L14.8457 16.609L14.8595 17.4089ZM17.3373 17.0678L17.6434 17.8069H17.6434L17.3373 17.0678ZM17.9781 2.50877L17.5601 3.19089L17.9781 2.50877ZM19.4912 4.02192L20.1734 3.60392V3.60392L19.4912 4.02192ZM4.02186 2.50877L3.60386 1.82666V1.82666L4.02186 2.50877ZM2.50871 4.02192L1.8266 3.60392H1.8266L2.50871 4.02192ZM8.6192 17.6091L9.02142 16.9175L9.02141 16.9175L8.6192 17.6091ZM12.6845 20.0129L13.1814 19.1734L11.8046 18.3584L11.3076 19.1979L12.6845 20.0129ZM8.81848 19.1734L9.3154 20.0129L10.6923 19.1979L10.1954 18.3584L8.81848 19.1734ZM11.3076 19.1979C11.1745 19.4229 10.8254 19.4229 10.6923 19.1979L9.3154 20.0129C10.0681 21.2845 11.9318 21.2845 12.6845 20.0129L11.3076 19.1979ZM9.62498 2.63337H12.375V1.03337H9.62498V2.63337ZM19.3666 9.62504V10.5417H20.9666V9.62504H19.3666ZM2.63331 10.5417V9.62504H1.03331V10.5417H2.63331ZM1.03331 10.5417C1.03331 11.5985 1.03288 12.4312 1.07878 13.104C1.12517 13.7839 1.22155 14.3586 1.44309 14.8935L2.9213 14.2812C2.79397 13.9738 2.7159 13.5935 2.67507 12.995C2.63375 12.3894 2.63331 11.6204 2.63331 10.5417H1.03331ZM7.15421 16.609C6.00338 16.5892 5.41979 16.5155 4.96883 16.3287L4.35653 17.8069C5.11613 18.1216 5.97598 18.1889 7.12664 18.2088L7.15421 16.609ZM1.44309 14.8935C1.98947 16.2126 3.03747 17.2605 4.35653 17.8069L4.96883 16.3287C4.0418 15.9447 3.30529 15.2082 2.9213 14.2812L1.44309 14.8935ZM19.3666 10.5417C19.3666 11.6204 19.3662 12.3894 19.3249 12.995C19.2841 13.5935 19.206 13.9738 19.0787 14.2812L20.5569 14.8935C20.7784 14.3586 20.8748 13.7839 20.9212 13.104C20.9671 12.4312 20.9666 11.5985 20.9666 10.5417H19.3666ZM14.8733 18.2088C16.0239 18.1889 16.8838 18.1216 17.6434 17.8069L17.0311 16.3287C16.5802 16.5155 15.9966 16.5892 14.8457 16.609L14.8733 18.2088ZM19.0787 14.2812C18.6947 15.2082 17.9582 15.9447 17.0311 16.3287L17.6434 17.8069C18.9625 17.2605 20.0105 16.2126 20.5569 14.8935L19.0787 14.2812ZM12.375 2.63337C13.8908 2.63337 14.9715 2.63422 15.8128 2.71421C16.6421 2.79306 17.1558 2.94316 17.5601 3.19089L18.3961 1.82666C17.6982 1.39899 16.9107 1.21138 15.9642 1.12139C15.0296 1.03253 13.8598 1.03337 12.375 1.03337V2.63337ZM20.9666 9.62504C20.9666 8.14021 20.9675 6.97041 20.8786 6.03582C20.7886 5.08933 20.601 4.30182 20.1734 3.60392L18.8091 4.43992C19.0569 4.84417 19.207 5.3579 19.2858 6.18727C19.3658 7.02855 19.3666 8.10923 19.3666 9.62504H20.9666ZM17.5601 3.19089C18.0692 3.50284 18.4972 3.93085 18.8091 4.43992L20.1734 3.60392C19.7295 2.87957 19.1205 2.27055 18.3961 1.82666L17.5601 3.19089ZM9.62498 1.03337C8.14015 1.03337 6.97035 1.03253 6.03576 1.12139C5.08927 1.21138 4.30176 1.39899 3.60386 1.82666L4.43986 3.19089C4.84411 2.94316 5.35784 2.79306 6.18721 2.71421C7.02849 2.63422 8.10917 2.63337 9.62498 2.63337V1.03337ZM2.63331 9.62504C2.63331 8.10923 2.63416 7.02855 2.71415 6.18727C2.793 5.3579 2.9431 4.84417 3.19082 4.43992L1.8266 3.60392C1.39893 4.30182 1.21132 5.08933 1.12133 6.03582C1.03247 6.97041 1.03331 8.14021 1.03331 9.62504H2.63331ZM3.60386 1.82666C2.87951 2.27055 2.27049 2.87957 1.8266 3.60392L3.19082 4.43992C3.50278 3.93085 3.93079 3.50284 4.43986 3.19089L3.60386 1.82666ZM10.1954 18.3584C10.0103 18.0458 9.84387 17.7629 9.68112 17.5396C9.50852 17.3028 9.30573 17.0829 9.02142 16.9175L8.21699 18.3006C8.24223 18.3153 8.29059 18.3482 8.3881 18.482C8.49545 18.6293 8.61807 18.8348 8.81848 19.1734L10.1954 18.3584ZM7.12664 18.2088C7.53124 18.2157 7.78006 18.2208 7.96799 18.2416C8.14108 18.2608 8.19439 18.2875 8.217 18.3006L9.02141 16.9175C8.73446 16.7506 8.43812 16.6839 8.14408 16.6513C7.86488 16.6204 7.5291 16.6155 7.15421 16.609L7.12664 18.2088ZM13.1814 19.1734C13.3819 18.8348 13.5045 18.6293 13.6118 18.482C13.7093 18.3482 13.7577 18.3153 13.7829 18.3006L12.9785 16.9175C12.6942 17.0829 12.4914 17.3028 12.3188 17.5396C12.156 17.7629 11.9896 18.0458 11.8046 18.3584L13.1814 19.1734ZM14.8457 16.609C14.4708 16.6155 14.135 16.6204 13.8558 16.6513C13.5618 16.6839 13.2655 16.7506 12.9785 16.9175L13.7829 18.3006C13.8055 18.2875 13.8588 18.2608 14.0319 18.2416C14.2199 18.2208 14.4687 18.2157 14.8733 18.2088L14.8457 16.609Z"
                                                fill="currentColor" />
                                            <path d="M7.33331 8.25H14.6666" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                            <path d="M7.33331 11.4584H12.375" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                        </svg>
                                        12 comments
                                    </div>
                                    <div class="text-sm flex items-center gap-1.5">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.5 9.16663L11.9167 9.16663" stroke="currentColor"
                                                stroke-width="1.6" stroke-linecap="round" />
                                            <path
                                                d="M9.16669 2.75H15.125C15.5507 2.75 15.7636 2.75 15.9423 2.77353C17.1763 2.93599 18.1474 3.90704 18.3098 5.14105C18.3334 5.31976 18.3334 5.53261 18.3334 5.95833"
                                                stroke="currentColor" stroke-width="1.6" />
                                            <path
                                                d="M1.83331 6.37064C1.83331 5.56166 1.83331 5.15716 1.89688 4.82023C2.17673 3.33699 3.33693 2.17679 4.82017 1.89694C5.1571 1.83337 5.56159 1.83337 6.37058 1.83337C6.72504 1.83337 6.90226 1.83337 7.07259 1.8493C7.80691 1.91797 8.50346 2.20649 9.07126 2.67718C9.20296 2.78635 9.32828 2.91167 9.57892 3.16231L10.0833 3.66671C10.8311 4.41451 11.205 4.7884 11.6528 5.03751C11.8987 5.17436 12.1596 5.28243 12.4303 5.35958C12.9231 5.50004 13.4518 5.50004 14.5094 5.50004H14.8519C17.2649 5.50004 18.4714 5.50004 19.2556 6.20538C19.3278 6.27026 19.3964 6.33892 19.4613 6.41105C20.1666 7.19528 20.1666 8.40178 20.1666 10.8148V12.8334C20.1666 16.2903 20.1666 18.0188 19.0927 19.0928C18.0188 20.1667 16.2903 20.1667 12.8333 20.1667H9.16665C5.70968 20.1667 3.9812 20.1667 2.90725 19.0928C1.83331 18.0188 1.83331 16.2903 1.83331 12.8334V6.37064Z"
                                                stroke="currentColor" stroke-width="1.6" />
                                        </svg>
                                        0 Files
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-5 bg-gray/5 rounded-lg">
                            <div class="flex items-center justify-between gap-4">
                                <div class="inline-block text-primary bg-primary/10 py-2 px-3 text-sm rounded-lg">
                                    <span>Low</span>
                                </div>
                                <div x-data="{ dropdown: false}" class="dropdown">
                                    <a href="javaScript:;" class="text-lightgray hover:text-primary"
                                        @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                        <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                                            <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                                            <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                                        </svg>
                                    </a>
                                    <ul x-show="dropdown" @click.away="dropdown = false" x-transition=""
                                        x-transition.duration.300ms="" class="right-0 whitespace-nowrap"
                                        style="display: none;">
                                        <li><a href="javascript:;">All</a></li>
                                        <li><a href="javascript:;">Read</a></li>
                                        <li><a href="javascript:;">Unread</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-5">
                                <p class="font-semibold text-lg">Brainstorming</p>
                                <p class="text-gray mt-3">Brainstorming brings team members' diverse experience into
                                    play.</p>
                            </div>
                            <div class="mt-5 flex items-center justify-between gap-4 sm:flex-row flex-col">
                                <div class="flex items-center justify-start -space-x-4">
                                    <img src="{{ asset('public/assets/images/avatar-2.png') }}"
                                        class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover"
                                        alt="avatar">
                                    <img src="{{ asset('public/assets/images/avatar-3.png') }}"
                                        class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover"
                                        alt="avatar">
                                    <img src="{{ asset('public/assets/images/avatar-9.png') }}"
                                        class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover"
                                        alt="avatar">
                                </div>
                                <div class="flex items-center flex-wrap gap-2.5">
                                    <div class="text-sm flex items-center gap-1.5">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.9961 19.6054L12.6845 20.0129L11.9961 19.6054ZM12.493 18.7659L11.8046 18.3584L12.493 18.7659ZM9.50692 18.7659L8.81848 19.1734V19.1734L9.50692 18.7659ZM10.0038 19.6054L10.6923 19.1979L10.0038 19.6054ZM2.1822 14.5873L2.9213 14.2812H2.9213L2.1822 14.5873ZM7.14043 17.4089L7.12664 18.2088L7.14043 17.4089ZM4.66268 17.0678L4.35653 17.8069L4.35653 17.8069L4.66268 17.0678ZM19.8178 14.5873L20.5569 14.8935V14.8935L19.8178 14.5873ZM14.8595 17.4089L14.8457 16.609L14.8595 17.4089ZM17.3373 17.0678L17.6434 17.8069H17.6434L17.3373 17.0678ZM17.9781 2.50877L17.5601 3.19089L17.9781 2.50877ZM19.4912 4.02192L20.1734 3.60392V3.60392L19.4912 4.02192ZM4.02186 2.50877L3.60386 1.82666V1.82666L4.02186 2.50877ZM2.50871 4.02192L1.8266 3.60392H1.8266L2.50871 4.02192ZM8.6192 17.6091L9.02142 16.9175L9.02141 16.9175L8.6192 17.6091ZM12.6845 20.0129L13.1814 19.1734L11.8046 18.3584L11.3076 19.1979L12.6845 20.0129ZM8.81848 19.1734L9.3154 20.0129L10.6923 19.1979L10.1954 18.3584L8.81848 19.1734ZM11.3076 19.1979C11.1745 19.4229 10.8254 19.4229 10.6923 19.1979L9.3154 20.0129C10.0681 21.2845 11.9318 21.2845 12.6845 20.0129L11.3076 19.1979ZM9.62498 2.63337H12.375V1.03337H9.62498V2.63337ZM19.3666 9.62504V10.5417H20.9666V9.62504H19.3666ZM2.63331 10.5417V9.62504H1.03331V10.5417H2.63331ZM1.03331 10.5417C1.03331 11.5985 1.03288 12.4312 1.07878 13.104C1.12517 13.7839 1.22155 14.3586 1.44309 14.8935L2.9213 14.2812C2.79397 13.9738 2.7159 13.5935 2.67507 12.995C2.63375 12.3894 2.63331 11.6204 2.63331 10.5417H1.03331ZM7.15421 16.609C6.00338 16.5892 5.41979 16.5155 4.96883 16.3287L4.35653 17.8069C5.11613 18.1216 5.97598 18.1889 7.12664 18.2088L7.15421 16.609ZM1.44309 14.8935C1.98947 16.2126 3.03747 17.2605 4.35653 17.8069L4.96883 16.3287C4.0418 15.9447 3.30529 15.2082 2.9213 14.2812L1.44309 14.8935ZM19.3666 10.5417C19.3666 11.6204 19.3662 12.3894 19.3249 12.995C19.2841 13.5935 19.206 13.9738 19.0787 14.2812L20.5569 14.8935C20.7784 14.3586 20.8748 13.7839 20.9212 13.104C20.9671 12.4312 20.9666 11.5985 20.9666 10.5417H19.3666ZM14.8733 18.2088C16.0239 18.1889 16.8838 18.1216 17.6434 17.8069L17.0311 16.3287C16.5802 16.5155 15.9966 16.5892 14.8457 16.609L14.8733 18.2088ZM19.0787 14.2812C18.6947 15.2082 17.9582 15.9447 17.0311 16.3287L17.6434 17.8069C18.9625 17.2605 20.0105 16.2126 20.5569 14.8935L19.0787 14.2812ZM12.375 2.63337C13.8908 2.63337 14.9715 2.63422 15.8128 2.71421C16.6421 2.79306 17.1558 2.94316 17.5601 3.19089L18.3961 1.82666C17.6982 1.39899 16.9107 1.21138 15.9642 1.12139C15.0296 1.03253 13.8598 1.03337 12.375 1.03337V2.63337ZM20.9666 9.62504C20.9666 8.14021 20.9675 6.97041 20.8786 6.03582C20.7886 5.08933 20.601 4.30182 20.1734 3.60392L18.8091 4.43992C19.0569 4.84417 19.207 5.3579 19.2858 6.18727C19.3658 7.02855 19.3666 8.10923 19.3666 9.62504H20.9666ZM17.5601 3.19089C18.0692 3.50284 18.4972 3.93085 18.8091 4.43992L20.1734 3.60392C19.7295 2.87957 19.1205 2.27055 18.3961 1.82666L17.5601 3.19089ZM9.62498 1.03337C8.14015 1.03337 6.97035 1.03253 6.03576 1.12139C5.08927 1.21138 4.30176 1.39899 3.60386 1.82666L4.43986 3.19089C4.84411 2.94316 5.35784 2.79306 6.18721 2.71421C7.02849 2.63422 8.10917 2.63337 9.62498 2.63337V1.03337ZM2.63331 9.62504C2.63331 8.10923 2.63416 7.02855 2.71415 6.18727C2.793 5.3579 2.9431 4.84417 3.19082 4.43992L1.8266 3.60392C1.39893 4.30182 1.21132 5.08933 1.12133 6.03582C1.03247 6.97041 1.03331 8.14021 1.03331 9.62504H2.63331ZM3.60386 1.82666C2.87951 2.27055 2.27049 2.87957 1.8266 3.60392L3.19082 4.43992C3.50278 3.93085 3.93079 3.50284 4.43986 3.19089L3.60386 1.82666ZM10.1954 18.3584C10.0103 18.0458 9.84387 17.7629 9.68112 17.5396C9.50852 17.3028 9.30573 17.0829 9.02142 16.9175L8.21699 18.3006C8.24223 18.3153 8.29059 18.3482 8.3881 18.482C8.49545 18.6293 8.61807 18.8348 8.81848 19.1734L10.1954 18.3584ZM7.12664 18.2088C7.53124 18.2157 7.78006 18.2208 7.96799 18.2416C8.14108 18.2608 8.19439 18.2875 8.217 18.3006L9.02141 16.9175C8.73446 16.7506 8.43812 16.6839 8.14408 16.6513C7.86488 16.6204 7.5291 16.6155 7.15421 16.609L7.12664 18.2088ZM13.1814 19.1734C13.3819 18.8348 13.5045 18.6293 13.6118 18.482C13.7093 18.3482 13.7577 18.3153 13.7829 18.3006L12.9785 16.9175C12.6942 17.0829 12.4914 17.3028 12.3188 17.5396C12.156 17.7629 11.9896 18.0458 11.8046 18.3584L13.1814 19.1734ZM14.8457 16.609C14.4708 16.6155 14.135 16.6204 13.8558 16.6513C13.5618 16.6839 13.2655 16.7506 12.9785 16.9175L13.7829 18.3006C13.8055 18.2875 13.8588 18.2608 14.0319 18.2416C14.2199 18.2208 14.4687 18.2157 14.8733 18.2088L14.8457 16.609Z"
                                                fill="currentColor" />
                                            <path d="M7.33331 8.25H14.6666" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                            <path d="M7.33331 11.4584H12.375" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                        </svg>
                                        12 comments
                                    </div>
                                    <div class="text-sm flex items-center gap-1.5">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.5 9.16663L11.9167 9.16663" stroke="currentColor"
                                                stroke-width="1.6" stroke-linecap="round" />
                                            <path
                                                d="M9.16669 2.75H15.125C15.5507 2.75 15.7636 2.75 15.9423 2.77353C17.1763 2.93599 18.1474 3.90704 18.3098 5.14105C18.3334 5.31976 18.3334 5.53261 18.3334 5.95833"
                                                stroke="currentColor" stroke-width="1.6" />
                                            <path
                                                d="M1.83331 6.37064C1.83331 5.56166 1.83331 5.15716 1.89688 4.82023C2.17673 3.33699 3.33693 2.17679 4.82017 1.89694C5.1571 1.83337 5.56159 1.83337 6.37058 1.83337C6.72504 1.83337 6.90226 1.83337 7.07259 1.8493C7.80691 1.91797 8.50346 2.20649 9.07126 2.67718C9.20296 2.78635 9.32828 2.91167 9.57892 3.16231L10.0833 3.66671C10.8311 4.41451 11.205 4.7884 11.6528 5.03751C11.8987 5.17436 12.1596 5.28243 12.4303 5.35958C12.9231 5.50004 13.4518 5.50004 14.5094 5.50004H14.8519C17.2649 5.50004 18.4714 5.50004 19.2556 6.20538C19.3278 6.27026 19.3964 6.33892 19.4613 6.41105C20.1666 7.19528 20.1666 8.40178 20.1666 10.8148V12.8334C20.1666 16.2903 20.1666 18.0188 19.0927 19.0928C18.0188 20.1667 16.2903 20.1667 12.8333 20.1667H9.16665C5.70968 20.1667 3.9812 20.1667 2.90725 19.0928C1.83331 18.0188 1.83331 16.2903 1.83331 12.8334V6.37064Z"
                                                stroke="currentColor" stroke-width="1.6" />
                                        </svg>
                                        0 Files
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-5 bg-gray/5 rounded-lg">
                            <div class="flex items-center justify-between gap-4">
                                <div class="inline-block text-primary bg-primary/10 py-2 px-3 text-sm rounded-lg">
                                    <span>Low</span>
                                </div>
                                <div x-data="{ dropdown: false}" class="dropdown">
                                    <a href="javaScript:;" class="text-lightgray hover:text-primary"
                                        @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                        <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                                            <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                                            <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                                        </svg>
                                    </a>
                                    <ul x-show="dropdown" @click.away="dropdown = false" x-transition=""
                                        x-transition.duration.300ms="" class="right-0 whitespace-nowrap"
                                        style="display: none;">
                                        <li><a href="javascript:;">All</a></li>
                                        <li><a href="javascript:;">Read</a></li>
                                        <li><a href="javascript:;">Unread</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-5">
                                <p class="font-semibold text-lg">Brainstorming</p>
                                <p class="text-gray mt-3">Brainstorming brings team members' diverse experience into
                                    play.</p>
                            </div>
                            <div class="mt-5 flex items-center justify-between gap-4 sm:flex-row flex-col">
                                <div class="flex items-center justify-start -space-x-4">
                                    <img src="{{ asset('public/assets/images/avatar-2.png') }}"
                                        class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover"
                                        alt="avatar">
                                    <img src="{{ asset('public/assets/images/avatar-3.png') }}"
                                        class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover"
                                        alt="avatar">
                                    <img src="{{ asset('public/assets/images/avatar-9.png') }}"
                                        class="h-10 w-10 flex-none rounded-full ring-2 ring-lightgray/10 dark:ring-gray/20 object-cover"
                                        alt="avatar">
                                </div>
                                <div class="flex items-center flex-wrap gap-2.5">
                                    <div class="text-sm flex items-center gap-1.5">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.9961 19.6054L12.6845 20.0129L11.9961 19.6054ZM12.493 18.7659L11.8046 18.3584L12.493 18.7659ZM9.50692 18.7659L8.81848 19.1734V19.1734L9.50692 18.7659ZM10.0038 19.6054L10.6923 19.1979L10.0038 19.6054ZM2.1822 14.5873L2.9213 14.2812H2.9213L2.1822 14.5873ZM7.14043 17.4089L7.12664 18.2088L7.14043 17.4089ZM4.66268 17.0678L4.35653 17.8069L4.35653 17.8069L4.66268 17.0678ZM19.8178 14.5873L20.5569 14.8935V14.8935L19.8178 14.5873ZM14.8595 17.4089L14.8457 16.609L14.8595 17.4089ZM17.3373 17.0678L17.6434 17.8069H17.6434L17.3373 17.0678ZM17.9781 2.50877L17.5601 3.19089L17.9781 2.50877ZM19.4912 4.02192L20.1734 3.60392V3.60392L19.4912 4.02192ZM4.02186 2.50877L3.60386 1.82666V1.82666L4.02186 2.50877ZM2.50871 4.02192L1.8266 3.60392H1.8266L2.50871 4.02192ZM8.6192 17.6091L9.02142 16.9175L9.02141 16.9175L8.6192 17.6091ZM12.6845 20.0129L13.1814 19.1734L11.8046 18.3584L11.3076 19.1979L12.6845 20.0129ZM8.81848 19.1734L9.3154 20.0129L10.6923 19.1979L10.1954 18.3584L8.81848 19.1734ZM11.3076 19.1979C11.1745 19.4229 10.8254 19.4229 10.6923 19.1979L9.3154 20.0129C10.0681 21.2845 11.9318 21.2845 12.6845 20.0129L11.3076 19.1979ZM9.62498 2.63337H12.375V1.03337H9.62498V2.63337ZM19.3666 9.62504V10.5417H20.9666V9.62504H19.3666ZM2.63331 10.5417V9.62504H1.03331V10.5417H2.63331ZM1.03331 10.5417C1.03331 11.5985 1.03288 12.4312 1.07878 13.104C1.12517 13.7839 1.22155 14.3586 1.44309 14.8935L2.9213 14.2812C2.79397 13.9738 2.7159 13.5935 2.67507 12.995C2.63375 12.3894 2.63331 11.6204 2.63331 10.5417H1.03331ZM7.15421 16.609C6.00338 16.5892 5.41979 16.5155 4.96883 16.3287L4.35653 17.8069C5.11613 18.1216 5.97598 18.1889 7.12664 18.2088L7.15421 16.609ZM1.44309 14.8935C1.98947 16.2126 3.03747 17.2605 4.35653 17.8069L4.96883 16.3287C4.0418 15.9447 3.30529 15.2082 2.9213 14.2812L1.44309 14.8935ZM19.3666 10.5417C19.3666 11.6204 19.3662 12.3894 19.3249 12.995C19.2841 13.5935 19.206 13.9738 19.0787 14.2812L20.5569 14.8935C20.7784 14.3586 20.8748 13.7839 20.9212 13.104C20.9671 12.4312 20.9666 11.5985 20.9666 10.5417H19.3666ZM14.8733 18.2088C16.0239 18.1889 16.8838 18.1216 17.6434 17.8069L17.0311 16.3287C16.5802 16.5155 15.9966 16.5892 14.8457 16.609L14.8733 18.2088ZM19.0787 14.2812C18.6947 15.2082 17.9582 15.9447 17.0311 16.3287L17.6434 17.8069C18.9625 17.2605 20.0105 16.2126 20.5569 14.8935L19.0787 14.2812ZM12.375 2.63337C13.8908 2.63337 14.9715 2.63422 15.8128 2.71421C16.6421 2.79306 17.1558 2.94316 17.5601 3.19089L18.3961 1.82666C17.6982 1.39899 16.9107 1.21138 15.9642 1.12139C15.0296 1.03253 13.8598 1.03337 12.375 1.03337V2.63337ZM20.9666 9.62504C20.9666 8.14021 20.9675 6.97041 20.8786 6.03582C20.7886 5.08933 20.601 4.30182 20.1734 3.60392L18.8091 4.43992C19.0569 4.84417 19.207 5.3579 19.2858 6.18727C19.3658 7.02855 19.3666 8.10923 19.3666 9.62504H20.9666ZM17.5601 3.19089C18.0692 3.50284 18.4972 3.93085 18.8091 4.43992L20.1734 3.60392C19.7295 2.87957 19.1205 2.27055 18.3961 1.82666L17.5601 3.19089ZM9.62498 1.03337C8.14015 1.03337 6.97035 1.03253 6.03576 1.12139C5.08927 1.21138 4.30176 1.39899 3.60386 1.82666L4.43986 3.19089C4.84411 2.94316 5.35784 2.79306 6.18721 2.71421C7.02849 2.63422 8.10917 2.63337 9.62498 2.63337V1.03337ZM2.63331 9.62504C2.63331 8.10923 2.63416 7.02855 2.71415 6.18727C2.793 5.3579 2.9431 4.84417 3.19082 4.43992L1.8266 3.60392C1.39893 4.30182 1.21132 5.08933 1.12133 6.03582C1.03247 6.97041 1.03331 8.14021 1.03331 9.62504H2.63331ZM3.60386 1.82666C2.87951 2.27055 2.27049 2.87957 1.8266 3.60392L3.19082 4.43992C3.50278 3.93085 3.93079 3.50284 4.43986 3.19089L3.60386 1.82666ZM10.1954 18.3584C10.0103 18.0458 9.84387 17.7629 9.68112 17.5396C9.50852 17.3028 9.30573 17.0829 9.02142 16.9175L8.21699 18.3006C8.24223 18.3153 8.29059 18.3482 8.3881 18.482C8.49545 18.6293 8.61807 18.8348 8.81848 19.1734L10.1954 18.3584ZM7.12664 18.2088C7.53124 18.2157 7.78006 18.2208 7.96799 18.2416C8.14108 18.2608 8.19439 18.2875 8.217 18.3006L9.02141 16.9175C8.73446 16.7506 8.43812 16.6839 8.14408 16.6513C7.86488 16.6204 7.5291 16.6155 7.15421 16.609L7.12664 18.2088ZM13.1814 19.1734C13.3819 18.8348 13.5045 18.6293 13.6118 18.482C13.7093 18.3482 13.7577 18.3153 13.7829 18.3006L12.9785 16.9175C12.6942 17.0829 12.4914 17.3028 12.3188 17.5396C12.156 17.7629 11.9896 18.0458 11.8046 18.3584L13.1814 19.1734ZM14.8457 16.609C14.4708 16.6155 14.135 16.6204 13.8558 16.6513C13.5618 16.6839 13.2655 16.7506 12.9785 16.9175L13.7829 18.3006C13.8055 18.2875 13.8588 18.2608 14.0319 18.2416C14.2199 18.2208 14.4687 18.2157 14.8733 18.2088L14.8457 16.609Z"
                                                fill="currentColor" />
                                            <path d="M7.33331 8.25H14.6666" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                            <path d="M7.33331 11.4584H12.375" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round" />
                                        </svg>
                                        12 comments
                                    </div>
                                    <div class="text-sm flex items-center gap-1.5">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.5 9.16663L11.9167 9.16663" stroke="currentColor"
                                                stroke-width="1.6" stroke-linecap="round" />
                                            <path
                                                d="M9.16669 2.75H15.125C15.5507 2.75 15.7636 2.75 15.9423 2.77353C17.1763 2.93599 18.1474 3.90704 18.3098 5.14105C18.3334 5.31976 18.3334 5.53261 18.3334 5.95833"
                                                stroke="currentColor" stroke-width="1.6" />
                                            <path
                                                d="M1.83331 6.37064C1.83331 5.56166 1.83331 5.15716 1.89688 4.82023C2.17673 3.33699 3.33693 2.17679 4.82017 1.89694C5.1571 1.83337 5.56159 1.83337 6.37058 1.83337C6.72504 1.83337 6.90226 1.83337 7.07259 1.8493C7.80691 1.91797 8.50346 2.20649 9.07126 2.67718C9.20296 2.78635 9.32828 2.91167 9.57892 3.16231L10.0833 3.66671C10.8311 4.41451 11.205 4.7884 11.6528 5.03751C11.8987 5.17436 12.1596 5.28243 12.4303 5.35958C12.9231 5.50004 13.4518 5.50004 14.5094 5.50004H14.8519C17.2649 5.50004 18.4714 5.50004 19.2556 6.20538C19.3278 6.27026 19.3964 6.33892 19.4613 6.41105C20.1666 7.19528 20.1666 8.40178 20.1666 10.8148V12.8334C20.1666 16.2903 20.1666 18.0188 19.0927 19.0928C18.0188 20.1667 16.2903 20.1667 12.8333 20.1667H9.16665C5.70968 20.1667 3.9812 20.1667 2.90725 19.0928C1.83331 18.0188 1.83331 16.2903 1.83331 12.8334V6.37064Z"
                                                stroke="currentColor" stroke-width="1.6" />
                                        </svg>
                                        0 Files
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="activeTab === 'notes'" class="flex-grow">
                    <div class="grid grid-cols-1 gap-7">
                        <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                            <p class="font-semibold p-5">Add New Note</p>
                            <div class="py-5 dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                                <textarea id="addNote" rows="5"
                                    class="form-control w-full h-full text-sm p-0 !border-none placeholder:text-gray focus:ring-0 bg-transparent"
                                    placeholder="Type Message:" spellcheck="false"></textarea>
                            </div>
                            <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                                <div class="flex items-center gap-5 justify-between flex-wrap">
                                    <div class="flex items-center gap-5 flex-wrap">
                                        <div class="flex items-center flex-wrap gap-5">
                                            <button class="text-lightgray hover:text-primary duration-300">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.5 3.75H17.5" stroke="currentColor" stroke-width="1.6"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.5 7.91675H10.3917" stroke="currentColor"
                                                        stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.5 12.0833H17.5" stroke="currentColor" stroke-width="1.6"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.5 16.25H10.3917" stroke="currentColor"
                                                        stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <button class="text-lightgray hover:text-primary duration-300">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.5 3.75H17.5" stroke="currentColor" stroke-width="1.6"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.04999 7.91675H13.95" stroke="currentColor"
                                                        stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.5 12.0833H17.5" stroke="currentColor" stroke-width="1.6"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6.04999 16.25H13.95" stroke="currentColor"
                                                        stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <button class="text-lightgray hover:text-primary duration-300">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.5 3.75H17.5" stroke="currentColor" stroke-width="1.6"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9.60834 7.91675H17.5" stroke="currentColor"
                                                        stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M2.5 12.0833H17.5" stroke="currentColor" stroke-width="1.6"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M9.60834 16.25H17.5" stroke="currentColor"
                                                        stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <div class="w-px bg-gray h-[18px]"></div>
                                            <button class="text-lightgray hover:text-primary duration-300">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.99998 2.5H6.66665C5.0953 2.5 4.30962 2.5 3.82147 2.98816C3.33331 3.47631 3.33331 4.26199 3.33331 5.83333V6.625M9.99998 2.5H13.3333C14.9047 2.5 15.6903 2.5 16.1785 2.98816C16.6666 3.47631 16.6666 4.26199 16.6666 5.83333V6.625M9.99998 2.5V17.5"
                                                        stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M5.83331 17.5H14.1666" stroke="currentColor"
                                                        stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <button class="text-lightgray hover:text-primary duration-300">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2.5 18.3334H12.5M7.5 1.66675H17.5M7.5 18.3334L12.5 1.66675"
                                                        stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <button class="text-lightgray hover:text-primary duration-300">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M9.99998 2.5H6.66665C5.0953 2.5 4.30962 2.5 3.82147 2.98816C3.33331 3.47631 3.33331 4.26199 3.33331 5.83333V6.625M9.99998 2.5H13.3333C14.9047 2.5 15.6903 2.5 16.1785 2.98816C16.6666 3.47631 16.6666 4.26199 16.6666 5.83333V6.625M9.99998 2.5V7.5M9.99998 17.5V12.5"
                                                        stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M5.83331 17.5H14.1666" stroke="currentColor"
                                                        stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M3.33331 10H16.6666" stroke="currentColor"
                                                        stroke-width="1.6" stroke-linecap="round" />
                                                </svg>
                                            </button>
                                            <button class="text-lightgray hover:text-primary duration-300">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3.33331 17.5H16.6666" stroke="currentColor"
                                                        stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path
                                                        d="M3.33331 2.5V7.5C3.33331 11.1819 6.31808 14.1667 9.99998 14.1667C13.6819 14.1667 16.6666 11.1819 16.6666 7.5V2.5"
                                                        stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                            <button class="text-lightgray hover:text-primary duration-300">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.16669 3.84066C4.16669 2.64004 5.13998 1.66675 6.3406 1.66675H10C12.3012 1.66675 14.1667 3.53223 14.1667 5.83341C14.1667 8.1346 12.3012 10.0001 10 10.0001H4.16669V3.84066Z"
                                                        stroke="currentColor" stroke-width="1.6" />
                                                    <path
                                                        d="M4.16669 10H11.6667C13.9679 10 15.8334 11.8655 15.8334 14.1667C15.8334 16.4679 13.9679 18.3333 11.6667 18.3333H5.88237C4.93483 18.3333 4.16669 17.5652 4.16669 16.6176V10Z"
                                                        stroke="currentColor" stroke-width="1.6" />
                                                </svg>
                                            </button>
                                            <button class="text-lightgray hover:text-primary duration-300">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.59792 14.8391L13.1736 8.5447C13.9631 7.78898 13.9631 6.56372 13.1736 5.80801C12.3842 5.05229 11.1041 5.05229 10.3146 5.808L3.78656 12.0568C2.28652 13.4927 2.28652 15.8207 3.78656 17.2565C5.2866 18.6924 7.71864 18.6924 9.21868 17.2565L15.8421 10.9165C18.0526 8.8005 18.0526 5.36977 15.8421 3.25376C13.6315 1.13775 10.0474 1.13775 7.83682 3.25376L2.5 8.36225"
                                                        stroke="currentColor" stroke-width="1.6"
                                                        stroke-linecap="round" />
                                                </svg>
                                            </button>
                                            <button class="text-lightgray hover:text-primary duration-300">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.8021 15.4065L11.2014 16.0072C9.21085 17.9978 5.9835 17.9978 3.99293 16.0072C2.00236 14.0166 2.00236 10.7893 3.99293 8.79871L4.59363 8.198"
                                                        stroke="currentColor" stroke-width="1.6"
                                                        stroke-linecap="round" />
                                                    <path d="M8.19781 11.802L11.8021 8.19775" stroke="currentColor"
                                                        stroke-width="1.6" stroke-linecap="round" />
                                                    <path
                                                        d="M8.19781 4.59363L8.79852 3.99293C10.7891 2.00236 14.0164 2.00236 16.007 3.99293C17.9976 5.9835 17.9976 9.21085 16.007 11.2014L15.4063 11.8021"
                                                        stroke="currentColor" stroke-width="1.6"
                                                        stroke-linecap="round" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="button"
                                            class="bg-primary text-white py-3 px-[18px] rounded-full text-sm font-semibold">
                                            Add Note
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                            <p class="font-semibold p-5">Note</p>
                            <div class="p-5 dark:border-gray/20 border-t-2 border-lightgray/10">
                                <div class="space-y-5" x-data="{ current: 1 }">
                                    <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                                        <button type="button"
                                            class="p-4 w-full flex-wrap flex sm:flex-row flex-col sm:items-center gap-4 text-gray dark:!text-white"
                                            :class="{'!text-dark dark:!text-white' : current === 1}"
                                            x-on:click="current === 1 ? current = null : current = 1">
                                            <div class="flex items-center gap-4">
                                                <div class="ml-auto rotate-180" :class="{'rotate-180' : current === 1}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        class="w-5 h-5">
                                                        <path fill="currentColor"
                                                            d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="flex items-center gap-1.5">
                                                    <svg class="text-primary shrink-0" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3"
                                                            d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                                            fill="currentColor" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M7.25 10C7.25 9.58579 7.58579 9.25 8 9.25H16C16.4142 9.25 16.75 9.58579 16.75 10C16.75 10.4142 16.4142 10.75 16 10.75H8C7.58579 10.75 7.25 10.4142 7.25 10Z"
                                                            fill="currentColor" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M7.25 14C7.25 13.5858 7.58579 13.25 8 13.25H13C13.4142 13.25 13.75 13.5858 13.75 14C13.75 14.4142 13.4142 14.75 13 14.75H8C7.58579 14.75 7.25 14.4142 7.25 14Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                    Note by Bob Briscoe
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-5 sm:ml-auto text-gray">
                                                <div class="flex items-center gap-1.5">
                                                    <svg class="shrink-0" width="20" height="20" viewBox="0 0 20 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1.66666 9.99992C1.66666 6.85722 1.66666 5.28587 2.64297 4.30956C3.61928 3.33325 5.19063 3.33325 8.33332 3.33325H11.6667C14.8094 3.33325 16.3807 3.33325 17.357 4.30956C18.3333 5.28587 18.3333 6.85722 18.3333 9.99992V11.6666C18.3333 14.8093 18.3333 16.3806 17.357 17.3569C16.3807 18.3333 14.8094 18.3333 11.6667 18.3333H8.33332C5.19063 18.3333 3.61928 18.3333 2.64297 17.3569C1.66666 16.3806 1.66666 14.8093 1.66666 11.6666V9.99992Z"
                                                            stroke="currentColor" stroke-width="1.6" />
                                                        <path d="M5.83334 3.33325V2.08325" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round" />
                                                        <path d="M14.1667 3.33325V2.08325" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round" />
                                                        <path d="M2.08334 7.5H17.9167" stroke="currentColor"
                                                            stroke-width="1.6" stroke-linecap="round" />
                                                        <path
                                                            d="M15 14.1667C15 14.6269 14.6269 15 14.1667 15C13.7064 15 13.3333 14.6269 13.3333 14.1667C13.3333 13.7064 13.7064 13.3333 14.1667 13.3333C14.6269 13.3333 15 13.7064 15 14.1667Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M15 10.8333C15 11.2936 14.6269 11.6667 14.1667 11.6667C13.7064 11.6667 13.3333 11.2936 13.3333 10.8333C13.3333 10.3731 13.7064 10 14.1667 10C14.6269 10 15 10.3731 15 10.8333Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.8333 14.1667C10.8333 14.6269 10.4602 15 9.99999 15C9.53975 15 9.16666 14.6269 9.16666 14.1667C9.16666 13.7064 9.53975 13.3333 9.99999 13.3333C10.4602 13.3333 10.8333 13.7064 10.8333 14.1667Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.8333 10.8333C10.8333 11.2936 10.4602 11.6667 9.99999 11.6667C9.53975 11.6667 9.16666 11.2936 9.16666 10.8333C9.16666 10.3731 9.53975 10 9.99999 10C10.4602 10 10.8333 10.3731 10.8333 10.8333Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M6.66667 14.1667C6.66667 14.6269 6.29357 15 5.83333 15C5.3731 15 5 14.6269 5 14.1667C5 13.7064 5.3731 13.3333 5.83333 13.3333C6.29357 13.3333 6.66667 13.7064 6.66667 14.1667Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M6.66667 10.8333C6.66667 11.2936 6.29357 11.6667 5.83333 11.6667C5.3731 11.6667 5 11.2936 5 10.8333C5 10.3731 5.3731 10 5.83333 10C6.29357 10 6.66667 10.3731 6.66667 10.8333Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                    Today, 12:00 PM
                                                </div>
                                                <div class="ml-auto rotate-180" :class="{'rotate-180' : current === 1}">
                                                    <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="2" cy="2" r="2" fill="currentColor" />
                                                        <circle cx="9" cy="2" r="2" fill="currentColor" />
                                                        <circle cx="16" cy="2" r="2" fill="currentColor" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </button>
                                        <div x-show="current === 1" x-collapse>
                                            <div
                                                class="space-y-3 p-5 dark:border-gray/20 border-t-2 border-lightgray/10">
                                                <p class="font-semibold">Dashhub Dashboard UI Kit</p>
                                                <p class="text-gray">An advanced Dashboard / SaaS UI kit and design
                                                    system for Figma. It can help you quickly build Dashboard, SaaS and
                                                    other projects, and has a very good user experience.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                                        <button type="button"
                                            class="p-4 w-full flex-wrap flex sm:flex-row flex-col sm:items-center gap-4 text-gray dark:!text-white"
                                            :class="{'!text-dark dark:!text-white' : current === 2}"
                                            x-on:click="current === 2 ? current = null : current = 2">
                                            <div class="flex items-center gap-4">
                                                <div class="ml-auto rotate-180" :class="{'rotate-180' : current === 2}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        class="w-5 h-5">
                                                        <path fill="currentColor"
                                                            d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="flex items-center gap-1.5">
                                                    <svg class="text-primary shrink-0" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3"
                                                            d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                                            fill="currentColor" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M7.25 10C7.25 9.58579 7.58579 9.25 8 9.25H16C16.4142 9.25 16.75 9.58579 16.75 10C16.75 10.4142 16.4142 10.75 16 10.75H8C7.58579 10.75 7.25 10.4142 7.25 10Z"
                                                            fill="currentColor" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M7.25 14C7.25 13.5858 7.58579 13.25 8 13.25H13C13.4142 13.25 13.75 13.5858 13.75 14C13.75 14.4142 13.4142 14.75 13 14.75H8C7.58579 14.75 7.25 14.4142 7.25 14Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                    Note by Bob Briscoe
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-5 sm:ml-auto text-gray">
                                                <div class="flex items-center gap-1.5">
                                                    <svg class="shrink-0" width="20" height="20" viewBox="0 0 20 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1.66666 9.99992C1.66666 6.85722 1.66666 5.28587 2.64297 4.30956C3.61928 3.33325 5.19063 3.33325 8.33332 3.33325H11.6667C14.8094 3.33325 16.3807 3.33325 17.357 4.30956C18.3333 5.28587 18.3333 6.85722 18.3333 9.99992V11.6666C18.3333 14.8093 18.3333 16.3806 17.357 17.3569C16.3807 18.3333 14.8094 18.3333 11.6667 18.3333H8.33332C5.19063 18.3333 3.61928 18.3333 2.64297 17.3569C1.66666 16.3806 1.66666 14.8093 1.66666 11.6666V9.99992Z"
                                                            stroke="currentColor" stroke-width="1.6" />
                                                        <path d="M5.83334 3.33325V2.08325" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round" />
                                                        <path d="M14.1667 3.33325V2.08325" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round" />
                                                        <path d="M2.08334 7.5H17.9167" stroke="currentColor"
                                                            stroke-width="1.6" stroke-linecap="round" />
                                                        <path
                                                            d="M15 14.1667C15 14.6269 14.6269 15 14.1667 15C13.7064 15 13.3333 14.6269 13.3333 14.1667C13.3333 13.7064 13.7064 13.3333 14.1667 13.3333C14.6269 13.3333 15 13.7064 15 14.1667Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M15 10.8333C15 11.2936 14.6269 11.6667 14.1667 11.6667C13.7064 11.6667 13.3333 11.2936 13.3333 10.8333C13.3333 10.3731 13.7064 10 14.1667 10C14.6269 10 15 10.3731 15 10.8333Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.8333 14.1667C10.8333 14.6269 10.4602 15 9.99999 15C9.53975 15 9.16666 14.6269 9.16666 14.1667C9.16666 13.7064 9.53975 13.3333 9.99999 13.3333C10.4602 13.3333 10.8333 13.7064 10.8333 14.1667Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M10.8333 10.8333C10.8333 11.2936 10.4602 11.6667 9.99999 11.6667C9.53975 11.6667 9.16666 11.2936 9.16666 10.8333C9.16666 10.3731 9.53975 10 9.99999 10C10.4602 10 10.8333 10.3731 10.8333 10.8333Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M6.66667 14.1667C6.66667 14.6269 6.29357 15 5.83333 15C5.3731 15 5 14.6269 5 14.1667C5 13.7064 5.3731 13.3333 5.83333 13.3333C6.29357 13.3333 6.66667 13.7064 6.66667 14.1667Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M6.66667 10.8333C6.66667 11.2936 6.29357 11.6667 5.83333 11.6667C5.3731 11.6667 5 11.2936 5 10.8333C5 10.3731 5.3731 10 5.83333 10C6.29357 10 6.66667 10.3731 6.66667 10.8333Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                    Today, 12:00 PM
                                                </div>
                                                <div class="ml-auto rotate-180" :class="{'rotate-180' : current === 2}">
                                                    <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="2" cy="2" r="2" fill="currentColor" />
                                                        <circle cx="9" cy="2" r="2" fill="currentColor" />
                                                        <circle cx="16" cy="2" r="2" fill="currentColor" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </button>
                                        <div x-show="current === 2" x-collapse>
                                            <div
                                                class="space-y-3 p-5 dark:border-gray/20 border-t-2 border-lightgray/10">
                                                <p class="font-semibold">Dashhub Dashboard UI Kit</p>
                                                <p class="text-gray">An advanced Dashboard / SaaS UI kit and design
                                                    system for Figma. It can help you quickly build Dashboard, SaaS and
                                                    other projects, and has a very good user experience.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="activeTab === 'emails'"
                    class="p-5 dark:border-gray/20 border-2 border-lightgray/10 rounded-lg flex-grow">
                    <div class="flex items-center gap-5 flex-wrap justify-between">
                        <p class="font-semibold">Emails</>
                        <div class="flex items-center gap-2.5">
                            <div>
                                <select id="selectDays"
                                    class="form-select h-10 px-5 rounded-full border-none uppercase font-semibold text-xs">
                                    <option>Last 7 days</option>
                                    <option>Last 30 days</option>
                                    <option>Last 90 days</option>
                                </select>
                            </div>
                            <button type="button"
                                class="btn bg-primary h-10 border border-primary rounded-full text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">Create
                                Emails</button>
                        </div>
                    </div>
                    <div class="mt-7 grid grid-cols-1 gap-7">
                        <div class="p-5 dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                            <div class="flex sm:flex-row flex-col sm:items-center gap-5">
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('public/assets/images/avatar-1.png') }}" class="h-[42px] w-[42px] rounded-full" alt="">
                                    <div class="space-y-1">
                                        <p class="font-semibold text-sm">Charles Macomber</p>
                                        <p class="text-lightgray dark:text-gray text-xs font-semibold">How are you
                                            today?</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 sm:ml-auto text-gray">
                                    <div class="flex items-center gap-1.5">
                                        <svg class="shrink-0" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.66666 9.99992C1.66666 6.85722 1.66666 5.28587 2.64297 4.30956C3.61928 3.33325 5.19063 3.33325 8.33332 3.33325H11.6667C14.8094 3.33325 16.3807 3.33325 17.357 4.30956C18.3333 5.28587 18.3333 6.85722 18.3333 9.99992V11.6666C18.3333 14.8093 18.3333 16.3806 17.357 17.3569C16.3807 18.3333 14.8094 18.3333 11.6667 18.3333H8.33332C5.19063 18.3333 3.61928 18.3333 2.64297 17.3569C1.66666 16.3806 1.66666 14.8093 1.66666 11.6666V9.99992Z"
                                                stroke="currentColor" stroke-width="1.6"></path>
                                            <path d="M5.83334 3.33325V2.08325" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round"></path>
                                            <path d="M14.1667 3.33325V2.08325" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round"></path>
                                            <path d="M2.08334 7.5H17.9167" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round"></path>
                                            <path
                                                d="M15 14.1667C15 14.6269 14.6269 15 14.1667 15C13.7064 15 13.3333 14.6269 13.3333 14.1667C13.3333 13.7064 13.7064 13.3333 14.1667 13.3333C14.6269 13.3333 15 13.7064 15 14.1667Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M15 10.8333C15 11.2936 14.6269 11.6667 14.1667 11.6667C13.7064 11.6667 13.3333 11.2936 13.3333 10.8333C13.3333 10.3731 13.7064 10 14.1667 10C14.6269 10 15 10.3731 15 10.8333Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M10.8333 14.1667C10.8333 14.6269 10.4602 15 9.99999 15C9.53975 15 9.16666 14.6269 9.16666 14.1667C9.16666 13.7064 9.53975 13.3333 9.99999 13.3333C10.4602 13.3333 10.8333 13.7064 10.8333 14.1667Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M10.8333 10.8333C10.8333 11.2936 10.4602 11.6667 9.99999 11.6667C9.53975 11.6667 9.16666 11.2936 9.16666 10.8333C9.16666 10.3731 9.53975 10 9.99999 10C10.4602 10 10.8333 10.3731 10.8333 10.8333Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M6.66667 14.1667C6.66667 14.6269 6.29357 15 5.83333 15C5.3731 15 5 14.6269 5 14.1667C5 13.7064 5.3731 13.3333 5.83333 13.3333C6.29357 13.3333 6.66667 13.7064 6.66667 14.1667Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M6.66667 10.8333C6.66667 11.2936 6.29357 11.6667 5.83333 11.6667C5.3731 11.6667 5 11.2936 5 10.8333C5 10.3731 5.3731 10 5.83333 10C6.29357 10 6.66667 10.3731 6.66667 10.8333Z"
                                                fill="currentColor"></path>
                                        </svg>
                                        Today, 12:00 PM
                                    </div>
                                    <div class="ml-auto rotate-180">
                                        <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                                            <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                                            <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm/loose text-gray mt-7">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book.</p>
                            <div class="mt-7 flex flex-wrap items-center gap-2.5">
                                <button type="button"
                                    class="flex items-center gap-2.5 border-2 border-gray/10 py-3 px-3.5 rounded-full">
                                    <svg class="text-purple" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.95196 1.77103e-07H9.04804C10.9806 -1.06016e-05 12.4952 -1.91331e-05 13.6769 0.158858C14.8864 0.321477 15.8409 0.660832 16.59 1.40997C17.3392 2.15912 17.6785 3.11356 17.8411 4.3231C18 5.50481 18 7.01936 18 8.95197V9.02588C18 10.6239 18 11.9321 17.9132 12.9973C17.826 14.0677 17.6473 14.9621 17.2473 15.705C17.0708 16.0326 16.854 16.326 16.59 16.59C15.8409 17.3392 14.8864 17.6785 13.6769 17.8411C12.4952 18 10.9806 18 9.04803 18H8.95197C7.01936 18 5.50481 18 4.3231 17.8411C3.11356 17.6785 2.15912 17.3392 1.40997 16.59C0.745834 15.9259 0.402864 15.0993 0.22048 14.0738C0.0413158 13.0665 0.00854123 11.8133 0.00173226 10.2571C3.76836e-07 9.86121 3.7671e-07 9.44253 3.7671e-07 9.00084L1.77103e-07 8.95196C-1.06016e-05 7.01935 -1.91331e-05 5.50481 0.158858 4.3231C0.321477 3.11356 0.660832 2.15912 1.40997 1.40997C2.15912 0.660832 3.11356 0.321477 4.3231 0.158858C5.50481 -1.91331e-05 7.01935 -1.06016e-05 8.95196 1.77103e-07Z"
                                            fill="currentColor" />
                                        <path
                                            d="M16.7431 10.0722L16.5571 10.0465C14.1763 9.71682 11.9976 10.9545 10.8882 12.8201C9.45701 9.19917 5.67496 6.72978 1.44897 7.33658L1.25996 7.36384C1.25592 7.86335 1.2558 8.40689 1.2558 9.00023C1.2558 9.44285 1.2558 9.85895 1.25752 10.2518C1.26438 11.8208 1.29945 12.9691 1.45687 13.8542C1.61108 14.7211 1.87344 15.2778 2.29795 15.7023C2.77487 16.1792 3.42013 16.4529 4.49042 16.5968C5.57877 16.7431 7.00891 16.7444 8.99998 16.7444C10.9911 16.7444 12.4212 16.7431 13.5095 16.5968C14.5798 16.4529 15.2251 16.1792 15.702 15.7023C15.8778 15.5265 16.0218 15.3321 16.1415 15.1098C16.4192 14.5942 16.5793 13.9044 16.6615 12.8955C16.7247 12.1203 16.7396 11.1977 16.7431 10.0722Z"
                                            fill="currentColor" />
                                        <path
                                            d="M14.0233 5.65123C14.0233 6.57598 13.2736 7.32564 12.3489 7.32564C11.4241 7.32564 10.6744 6.57598 10.6744 5.65123C10.6744 4.72647 11.4241 3.97681 12.3489 3.97681C13.2736 3.97681 14.0233 4.72647 14.0233 5.65123Z"
                                            fill="currentColor" />
                                    </svg>
                                    Schedule.png
                                </button>
                                <button type="button"
                                    class="flex items-center gap-2.5 border-2 border-gray/10 py-3 px-3.5 rounded-full">
                                    <svg class="text-primary" width="18" height="15" viewBox="0 0 18 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M0 7C0 4.04127 0 2.5619 0.817162 1.56618C0.966758 1.3839 1.1339 1.21676 1.31618 1.06716C2.3119 0.25 3.79127 0.25 6.75 0.25C9.70873 0.25 11.1881 0.25 12.1838 1.06716C12.3661 1.21676 12.5332 1.3839 12.6828 1.56618C13.5 2.5619 13.5 4.04127 13.5 7V7.9C13.5 10.8587 13.5 12.3381 12.6828 13.3338C12.5332 13.5161 12.3661 13.6832 12.1838 13.8328C11.1881 14.65 9.70873 14.65 6.75 14.65C3.79127 14.65 2.3119 14.65 1.31618 13.8328C1.1339 13.6832 0.966758 13.5161 0.817162 13.3338C0 12.3381 0 10.8587 0 7.9V7Z"
                                            fill="currentColor" />
                                        <path
                                            d="M13.5 5.20032L14.0925 4.90406C15.8438 4.02841 16.7195 3.59058 17.3597 3.98629C18 4.38199 18 5.361 18 7.31901V7.58163C18 9.53964 18 10.5186 17.3597 10.9144C16.7195 11.3101 15.8438 10.8722 14.0925 9.99658L13.5 9.70032V5.20032Z"
                                            fill="currentColor" />
                                    </svg>
                                    Schedule.png
                                </button>
                            </div>
                        </div>
                        <div class="p-5 dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                            <div class="flex sm:flex-row flex-col sm:items-center gap-5">
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('public/assets/images/avatar-1.png') }}" class="h-[42px] w-[42px] rounded-full" alt="">
                                    <div class="space-y-1">
                                        <p class="font-semibold text-sm">Charles Macomber</p>
                                        <p class="text-lightgray dark:text-gray text-xs font-semibold">How are you
                                            today?</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 sm:ml-auto text-gray">
                                    <div class="flex items-center gap-1.5">
                                        <svg class="shrink-0" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.66666 9.99992C1.66666 6.85722 1.66666 5.28587 2.64297 4.30956C3.61928 3.33325 5.19063 3.33325 8.33332 3.33325H11.6667C14.8094 3.33325 16.3807 3.33325 17.357 4.30956C18.3333 5.28587 18.3333 6.85722 18.3333 9.99992V11.6666C18.3333 14.8093 18.3333 16.3806 17.357 17.3569C16.3807 18.3333 14.8094 18.3333 11.6667 18.3333H8.33332C5.19063 18.3333 3.61928 18.3333 2.64297 17.3569C1.66666 16.3806 1.66666 14.8093 1.66666 11.6666V9.99992Z"
                                                stroke="currentColor" stroke-width="1.6"></path>
                                            <path d="M5.83334 3.33325V2.08325" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round"></path>
                                            <path d="M14.1667 3.33325V2.08325" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round"></path>
                                            <path d="M2.08334 7.5H17.9167" stroke="currentColor" stroke-width="1.6"
                                                stroke-linecap="round"></path>
                                            <path
                                                d="M15 14.1667C15 14.6269 14.6269 15 14.1667 15C13.7064 15 13.3333 14.6269 13.3333 14.1667C13.3333 13.7064 13.7064 13.3333 14.1667 13.3333C14.6269 13.3333 15 13.7064 15 14.1667Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M15 10.8333C15 11.2936 14.6269 11.6667 14.1667 11.6667C13.7064 11.6667 13.3333 11.2936 13.3333 10.8333C13.3333 10.3731 13.7064 10 14.1667 10C14.6269 10 15 10.3731 15 10.8333Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M10.8333 14.1667C10.8333 14.6269 10.4602 15 9.99999 15C9.53975 15 9.16666 14.6269 9.16666 14.1667C9.16666 13.7064 9.53975 13.3333 9.99999 13.3333C10.4602 13.3333 10.8333 13.7064 10.8333 14.1667Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M10.8333 10.8333C10.8333 11.2936 10.4602 11.6667 9.99999 11.6667C9.53975 11.6667 9.16666 11.2936 9.16666 10.8333C9.16666 10.3731 9.53975 10 9.99999 10C10.4602 10 10.8333 10.3731 10.8333 10.8333Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M6.66667 14.1667C6.66667 14.6269 6.29357 15 5.83333 15C5.3731 15 5 14.6269 5 14.1667C5 13.7064 5.3731 13.3333 5.83333 13.3333C6.29357 13.3333 6.66667 13.7064 6.66667 14.1667Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M6.66667 10.8333C6.66667 11.2936 6.29357 11.6667 5.83333 11.6667C5.3731 11.6667 5 11.2936 5 10.8333C5 10.3731 5.3731 10 5.83333 10C6.29357 10 6.66667 10.3731 6.66667 10.8333Z"
                                                fill="currentColor"></path>
                                        </svg>
                                        Today, 12:00 PM
                                    </div>
                                    <div class="ml-auto rotate-180">
                                        <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                                            <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                                            <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm/loose text-gray mt-7">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since
                                the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                                specimen book.</p>
                            <div class="mt-7 flex items-center flex-wrap gap-2.5">
                                <button type="button"
                                    class="flex items-center gap-2.5 border-2 border-gray/10 py-3 px-3.5 rounded-full">
                                    <svg class="text-purple" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.95196 1.77103e-07H9.04804C10.9806 -1.06016e-05 12.4952 -1.91331e-05 13.6769 0.158858C14.8864 0.321477 15.8409 0.660832 16.59 1.40997C17.3392 2.15912 17.6785 3.11356 17.8411 4.3231C18 5.50481 18 7.01936 18 8.95197V9.02588C18 10.6239 18 11.9321 17.9132 12.9973C17.826 14.0677 17.6473 14.9621 17.2473 15.705C17.0708 16.0326 16.854 16.326 16.59 16.59C15.8409 17.3392 14.8864 17.6785 13.6769 17.8411C12.4952 18 10.9806 18 9.04803 18H8.95197C7.01936 18 5.50481 18 4.3231 17.8411C3.11356 17.6785 2.15912 17.3392 1.40997 16.59C0.745834 15.9259 0.402864 15.0993 0.22048 14.0738C0.0413158 13.0665 0.00854123 11.8133 0.00173226 10.2571C3.76836e-07 9.86121 3.7671e-07 9.44253 3.7671e-07 9.00084L1.77103e-07 8.95196C-1.06016e-05 7.01935 -1.91331e-05 5.50481 0.158858 4.3231C0.321477 3.11356 0.660832 2.15912 1.40997 1.40997C2.15912 0.660832 3.11356 0.321477 4.3231 0.158858C5.50481 -1.91331e-05 7.01935 -1.06016e-05 8.95196 1.77103e-07Z"
                                            fill="currentColor" />
                                        <path
                                            d="M16.7431 10.0722L16.5571 10.0465C14.1763 9.71682 11.9976 10.9545 10.8882 12.8201C9.45701 9.19917 5.67496 6.72978 1.44897 7.33658L1.25996 7.36384C1.25592 7.86335 1.2558 8.40689 1.2558 9.00023C1.2558 9.44285 1.2558 9.85895 1.25752 10.2518C1.26438 11.8208 1.29945 12.9691 1.45687 13.8542C1.61108 14.7211 1.87344 15.2778 2.29795 15.7023C2.77487 16.1792 3.42013 16.4529 4.49042 16.5968C5.57877 16.7431 7.00891 16.7444 8.99998 16.7444C10.9911 16.7444 12.4212 16.7431 13.5095 16.5968C14.5798 16.4529 15.2251 16.1792 15.702 15.7023C15.8778 15.5265 16.0218 15.3321 16.1415 15.1098C16.4192 14.5942 16.5793 13.9044 16.6615 12.8955C16.7247 12.1203 16.7396 11.1977 16.7431 10.0722Z"
                                            fill="currentColor" />
                                        <path
                                            d="M14.0233 5.65123C14.0233 6.57598 13.2736 7.32564 12.3489 7.32564C11.4241 7.32564 10.6744 6.57598 10.6744 5.65123C10.6744 4.72647 11.4241 3.97681 12.3489 3.97681C13.2736 3.97681 14.0233 4.72647 14.0233 5.65123Z"
                                            fill="currentColor" />
                                    </svg>
                                    Schedule.png
                                </button>
                                <button type="button"
                                    class="flex items-center gap-2.5 border-2 border-gray/10 py-3 px-3.5 rounded-full">
                                    <svg class="text-primary" width="18" height="15" viewBox="0 0 18 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M0 7C0 4.04127 0 2.5619 0.817162 1.56618C0.966758 1.3839 1.1339 1.21676 1.31618 1.06716C2.3119 0.25 3.79127 0.25 6.75 0.25C9.70873 0.25 11.1881 0.25 12.1838 1.06716C12.3661 1.21676 12.5332 1.3839 12.6828 1.56618C13.5 2.5619 13.5 4.04127 13.5 7V7.9C13.5 10.8587 13.5 12.3381 12.6828 13.3338C12.5332 13.5161 12.3661 13.6832 12.1838 13.8328C11.1881 14.65 9.70873 14.65 6.75 14.65C3.79127 14.65 2.3119 14.65 1.31618 13.8328C1.1339 13.6832 0.966758 13.5161 0.817162 13.3338C0 12.3381 0 10.8587 0 7.9V7Z"
                                            fill="currentColor" />
                                        <path
                                            d="M13.5 5.20032L14.0925 4.90406C15.8438 4.02841 16.7195 3.59058 17.3597 3.98629C18 4.38199 18 5.361 18 7.31901V7.58163C18 9.53964 18 10.5186 17.3597 10.9144C16.7195 11.3101 15.8438 10.8722 14.0925 9.99658L13.5 9.70032V5.20032Z"
                                            fill="currentColor" />
                                    </svg>
                                    Schedule.png
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="activeTab === 'meetings'"
                    class="p-5 dark:border-gray/20 border-2 border-lightgray/10 rounded-lg flex-grow">
                    <div class="flex items-center gap-5 flex-wrap justify-between">
                        <p class="font-semibold">Upcoming Meeting</>
                        <div class="flex items-center gap-2.5">
                            <div>
                                <select id="selectUser"
                                    class="form-select h-10 px-5 rounded-full border-none uppercase font-semibold text-xs">
                                    <option>All Users</option>
                                    <option>Charles M</option>
                                </select>
                            </div>
                            <button type="button"
                                class="btn bg-primary h-10 border border-primary rounded-full text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">Create
                                Emails</button>
                        </div>
                    </div>
                    <div class="mt-7 grid grid-cols-1 gap-7">
                        <div class="p-5 dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                            <div class="flex md:flex-row flex-col items-start gap-2.5">
                                <div
                                    class="text-primary w-9 h-9 border-2 border-primary/[12%] flex items-center rounded-full justify-center shrink-0">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.36464 4.43031L8.90548 5.39941C9.39357 6.27398 9.19763 7.42126 8.42891 8.18999C8.4289 8.19 8.42891 8.19 8.4289 8.19C8.42879 8.19011 7.49656 9.12255 9.18707 10.8131C10.8769 12.5029 11.8093 11.5721 11.8101 11.5712C11.8102 11.5712 11.8102 11.5712 11.8102 11.5712C12.5789 10.8025 13.7262 10.6066 14.6007 11.0947L15.5698 11.6355C16.8904 12.3725 17.0464 14.2245 15.8856 15.3853C15.1881 16.0828 14.3336 16.6256 13.3891 16.6614C11.799 16.7217 9.09854 16.3192 6.38973 13.6104C3.68092 10.9016 3.27849 8.20118 3.33877 6.61107C3.37458 5.6665 3.91732 4.81203 4.61482 4.11452C5.77561 2.95373 7.62762 3.10969 8.36464 4.43031Z"
                                            stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="flex sm:flex-row flex-col sm:items-center gap-5">
                                        <p class="font-semibold">Meeting Schedule with Charles Macomber</p>
                                        <div class="flex items-center gap-5 sm:ml-auto text-gray">
                                            <div class="flex items-center gap-1.5">
                                                <svg class="shrink-0" width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M1.66666 9.99992C1.66666 6.85722 1.66666 5.28587 2.64297 4.30956C3.61928 3.33325 5.19063 3.33325 8.33332 3.33325H11.6667C14.8094 3.33325 16.3807 3.33325 17.357 4.30956C18.3333 5.28587 18.3333 6.85722 18.3333 9.99992V11.6666C18.3333 14.8093 18.3333 16.3806 17.357 17.3569C16.3807 18.3333 14.8094 18.3333 11.6667 18.3333H8.33332C5.19063 18.3333 3.61928 18.3333 2.64297 17.3569C1.66666 16.3806 1.66666 14.8093 1.66666 11.6666V9.99992Z"
                                                        stroke="currentColor" stroke-width="1.6"></path>
                                                    <path d="M5.83334 3.33325V2.08325" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M14.1667 3.33325V2.08325" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M2.08334 7.5H17.9167" stroke="currentColor"
                                                        stroke-width="1.6" stroke-linecap="round"></path>
                                                    <path
                                                        d="M15 14.1667C15 14.6269 14.6269 15 14.1667 15C13.7064 15 13.3333 14.6269 13.3333 14.1667C13.3333 13.7064 13.7064 13.3333 14.1667 13.3333C14.6269 13.3333 15 13.7064 15 14.1667Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M15 10.8333C15 11.2936 14.6269 11.6667 14.1667 11.6667C13.7064 11.6667 13.3333 11.2936 13.3333 10.8333C13.3333 10.3731 13.7064 10 14.1667 10C14.6269 10 15 10.3731 15 10.8333Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M10.8333 14.1667C10.8333 14.6269 10.4602 15 9.99999 15C9.53975 15 9.16666 14.6269 9.16666 14.1667C9.16666 13.7064 9.53975 13.3333 9.99999 13.3333C10.4602 13.3333 10.8333 13.7064 10.8333 14.1667Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M10.8333 10.8333C10.8333 11.2936 10.4602 11.6667 9.99999 11.6667C9.53975 11.6667 9.16666 11.2936 9.16666 10.8333C9.16666 10.3731 9.53975 10 9.99999 10C10.4602 10 10.8333 10.3731 10.8333 10.8333Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M6.66667 14.1667C6.66667 14.6269 6.29357 15 5.83333 15C5.3731 15 5 14.6269 5 14.1667C5 13.7064 5.3731 13.3333 5.83333 13.3333C6.29357 13.3333 6.66667 13.7064 6.66667 14.1667Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M6.66667 10.8333C6.66667 11.2936 6.29357 11.6667 5.83333 11.6667C5.3731 11.6667 5 11.2936 5 10.8333C5 10.3731 5.3731 10 5.83333 10C6.29357 10 6.66667 10.3731 6.66667 10.8333Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                Today, 12:00 PM
                                            </div>
                                            <div class="ml-auto rotate-180">
                                                <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                                                    <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                                                    <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm/loose text-gray mt-5">Lorem Ipsum is simply dummy text of the
                                        printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                        dummy text ever since the 1500s, when an unknown printer took a galley of type
                                        and scrambled it to make a type specimen book.</p>
                                    <div class="mt-7 flex md:flex-row flex-col md:items-center gap-5 md:gap-10">
                                        <div class="space-y-2">
                                            <p class="text-gray">Reminder</p>
                                            <p class="font-semibold">20 min Before</p>
                                        </div>
                                        <div class="md:w-[2px] md:h-14 h-[2px] w-full bg-gray/[14%] shrink-0"></div>
                                        <div class="space-y-2">
                                            <p class="text-gray">Duration</p>
                                            <p class="font-semibold">1 Hour</p>
                                        </div>
                                        <div class="md:w-[2px] md:h-14 h-[2px] w-full bg-gray/[14%] shrink-0"></div>
                                        <div class="space-y-2">
                                            <p class="text-gray">Attendance</p>
                                            <div class="flex items-center gap-2.5">
                                                <div class="flex items-center justify-start -space-x-1">
                                                    <img src="{{ asset('public/assets/images/avatar-2.png') }}"
                                                        class="h-5 w-5 flex-none rounded-full ring-2 ring-white dark:ring-gray/20 object-cover"
                                                        alt="avatar">
                                                    <img src="{{ asset('public/assets/images/avatar-3.png') }}"
                                                        class="h-5 w-5 flex-none rounded-full ring-2 ring-white dark:ring-gray/20 object-cover"
                                                        alt="avatar">
                                                    <img src="{{ asset('public/assets/images/avatar-9.png') }}"
                                                        class="h-5 w-5 flex-none rounded-full ring-2 ring-white dark:ring-gray/20 object-cover"
                                                        alt="avatar">
                                                </div>
                                                <p class="text-gray">Alice Davis, <span class="text-primary">+5
                                                        more</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-5 dark:border-gray/20 border-2 border-lightgray/10 rounded-lg">
                            <div class="flex md:flex-row flex-col items-start gap-2.5">
                                <div
                                    class="text-primary w-9 h-9 border-2 border-primary/[12%] flex items-center rounded-full justify-center shrink-0">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.36464 4.43031L8.90548 5.39941C9.39357 6.27398 9.19763 7.42126 8.42891 8.18999C8.4289 8.19 8.42891 8.19 8.4289 8.19C8.42879 8.19011 7.49656 9.12255 9.18707 10.8131C10.8769 12.5029 11.8093 11.5721 11.8101 11.5712C11.8102 11.5712 11.8102 11.5712 11.8102 11.5712C12.5789 10.8025 13.7262 10.6066 14.6007 11.0947L15.5698 11.6355C16.8904 12.3725 17.0464 14.2245 15.8856 15.3853C15.1881 16.0828 14.3336 16.6256 13.3891 16.6614C11.799 16.7217 9.09854 16.3192 6.38973 13.6104C3.68092 10.9016 3.27849 8.20118 3.33877 6.61107C3.37458 5.6665 3.91732 4.81203 4.61482 4.11452C5.77561 2.95373 7.62762 3.10969 8.36464 4.43031Z"
                                            stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="flex sm:flex-row flex-col sm:items-center gap-5">
                                        <p class="font-semibold">Meeting Schedule with Charles Macomber</p>
                                        <div class="flex items-center gap-5 sm:ml-auto text-gray">
                                            <div class="flex items-center gap-1.5">
                                                <svg class="shrink-0" width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M1.66666 9.99992C1.66666 6.85722 1.66666 5.28587 2.64297 4.30956C3.61928 3.33325 5.19063 3.33325 8.33332 3.33325H11.6667C14.8094 3.33325 16.3807 3.33325 17.357 4.30956C18.3333 5.28587 18.3333 6.85722 18.3333 9.99992V11.6666C18.3333 14.8093 18.3333 16.3806 17.357 17.3569C16.3807 18.3333 14.8094 18.3333 11.6667 18.3333H8.33332C5.19063 18.3333 3.61928 18.3333 2.64297 17.3569C1.66666 16.3806 1.66666 14.8093 1.66666 11.6666V9.99992Z"
                                                        stroke="currentColor" stroke-width="1.6"></path>
                                                    <path d="M5.83334 3.33325V2.08325" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M14.1667 3.33325V2.08325" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M2.08334 7.5H17.9167" stroke="currentColor"
                                                        stroke-width="1.6" stroke-linecap="round"></path>
                                                    <path
                                                        d="M15 14.1667C15 14.6269 14.6269 15 14.1667 15C13.7064 15 13.3333 14.6269 13.3333 14.1667C13.3333 13.7064 13.7064 13.3333 14.1667 13.3333C14.6269 13.3333 15 13.7064 15 14.1667Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M15 10.8333C15 11.2936 14.6269 11.6667 14.1667 11.6667C13.7064 11.6667 13.3333 11.2936 13.3333 10.8333C13.3333 10.3731 13.7064 10 14.1667 10C14.6269 10 15 10.3731 15 10.8333Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M10.8333 14.1667C10.8333 14.6269 10.4602 15 9.99999 15C9.53975 15 9.16666 14.6269 9.16666 14.1667C9.16666 13.7064 9.53975 13.3333 9.99999 13.3333C10.4602 13.3333 10.8333 13.7064 10.8333 14.1667Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M10.8333 10.8333C10.8333 11.2936 10.4602 11.6667 9.99999 11.6667C9.53975 11.6667 9.16666 11.2936 9.16666 10.8333C9.16666 10.3731 9.53975 10 9.99999 10C10.4602 10 10.8333 10.3731 10.8333 10.8333Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M6.66667 14.1667C6.66667 14.6269 6.29357 15 5.83333 15C5.3731 15 5 14.6269 5 14.1667C5 13.7064 5.3731 13.3333 5.83333 13.3333C6.29357 13.3333 6.66667 13.7064 6.66667 14.1667Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M6.66667 10.8333C6.66667 11.2936 6.29357 11.6667 5.83333 11.6667C5.3731 11.6667 5 11.2936 5 10.8333C5 10.3731 5.3731 10 5.83333 10C6.29357 10 6.66667 10.3731 6.66667 10.8333Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                Today, 12:00 PM
                                            </div>
                                            <div class="ml-auto rotate-180">
                                                <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                                                    <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                                                    <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm/loose text-gray mt-5">Lorem Ipsum is simply dummy text of the
                                        printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                        dummy text ever since the 1500s, when an unknown printer took a galley of type
                                        and scrambled it to make a type specimen book.</p>
                                    <div class="mt-7 flex md:flex-row flex-col md:items-center gap-5 md:gap-10">
                                        <div class="space-y-2">
                                            <p class="text-gray">Reminder</p>
                                            <p class="font-semibold">20 min Before</p>
                                        </div>
                                        <div class="md:w-[2px] md:h-14 h-[2px] w-full bg-gray/[14%] shrink-0"></div>
                                        <div class="space-y-2">
                                            <p class="text-gray">Duration</p>
                                            <p class="font-semibold">1 Hour</p>
                                        </div>
                                        <div class="md:w-[2px] md:h-14 h-[2px] w-full bg-gray/[14%] shrink-0"></div>
                                        <div class="space-y-2">
                                            <p class="text-gray">Attendance</p>
                                            <div class="flex items-center gap-2.5">
                                                <div class="flex items-center justify-start -space-x-1">
                                                    <img src="{{ asset('public/assets/images/avatar-2.png') }}"
                                                        class="h-5 w-5 flex-none rounded-full ring-2 ring-white dark:ring-gray/20 object-cover"
                                                        alt="avatar">
                                                    <img src="{{ asset('public/assets/images/avatar-3.png') }}"
                                                        class="h-5 w-5 flex-none rounded-full ring-2 ring-white dark:ring-gray/20 object-cover"
                                                        alt="avatar">
                                                    <img src="{{ asset('public/assets/images/avatar-9.png') }}"
                                                        class="h-5 w-5 flex-none rounded-full ring-2 ring-white dark:ring-gray/20 object-cover"
                                                        alt="avatar">
                                                </div>
                                                <p class="text-gray">Alice Davis, <span class="text-primary">+5
                                                        more</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("contact", () => ({
            isShowContactList: false,
        }));
    });
</script>
@endsection