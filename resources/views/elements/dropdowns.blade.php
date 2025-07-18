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
                <li>Dropdowns</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Dropdowns</h2>
            <div class="flex flex-wrap justify-center gap-3">
                <div x-data="{ dropdown: false}" class="dropdown">
                    <button class="btn bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85] flex items-center justify-center gap-1.5" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">Dropdown Menu
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                        </svg>
                    </button>
                    <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms="" class="right-0 whitespace-nowrap" style="display: none;">
                        <li><a href="javascript:;">Action</a></li>
                        <li><a href="javascript:;">Another action</a></li>
                        <li><a href="javascript:;">Something else here</a></li>
                    </ul>
                </div>
                <div x-data="{ dropdown: false}" class="dropdown">
                    <button class="btn bg-dark dark:bg-white dark:text-dark dark:border-white border border-dark rounded-md text-white transition-all duration-300 hover:bg-dark/[0.85] hover:border-dark/[0.85] flex items-center justify-center gap-1.5" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">Dropdown Menu
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                            <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                        </svg>
                    </button>
                    <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms="" class="right-0 whitespace-nowrap" style="display: none;">
                        <li><a href="javascript:;">Action</a></li>
                        <li><a href="javascript:;">Another action</a></li>
                        <li><a href="javascript:;">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Dropdowns Split Button</h2>
            <div class="flex flex-wrap gap-5 justify-center">
                <div x-data="{ dropdown: false}" class="dropdown">
                    <button type="button" class="flex items-center bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">
                        <span class="px-2.5">Primary</span>
                        <p class="bg-white bg-opacity-20 w-10 h-10 py-3 align-middle rounded-r" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mx-auto">
                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                            </svg>
                        </p>
                    </button>
                    <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms="" class="right-0 whitespace-nowrap" style="display: none;">
                        <li><a href="javascript:;">Action</a></li>
                        <li><a href="javascript:;">Another action</a></li>
                        <li><a href="javascript:;">Something else here</a></li>
                    </ul>
                </div>
                <div x-data="{ dropdown: false}" class="dropdown">
                    <button type="button" class="flex items-center bg-dark dark:bg-white dark:text-dark dark:border-white border border-dark rounded-md text-white transition-all duration-300 hover:bg-dark/[0.85] hover:border-dark/[0.85]">
                        <span class="px-2.5">Black</span>
                        <p class="bg-white bg-opacity-20 w-10 h-10 py-3 align-middle rounded-r" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mx-auto">
                                <path d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z" fill="currentColor"></path>
                            </svg>
                        </p>
                    </button>
                    <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms="" class="right-0 whitespace-nowrap" style="display: none;">
                        <li><a href="javascript:;">Action</a></li>
                        <li><a href="javascript:;">Another action</a></li>
                        <li><a href="javascript:;">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Dropdowns Profile</h2>
            <div class="relative">
                <div class="profile inline-block" x-data="dropdown" @click.outside="open = false">
                    <button type="button" class="flex items-center gap-2.5" @click="toggle()">
                        <img class="h-[38px] w-[38px] rounded-full" src="{{ asset('assets/images/user.png') }}" alt="Header Avatar">
                        <div class="text-start">
                            <div class="flex items-center gap-1">
                                <span class="hidden xl:block text-sm font-semibold">William Robbie</span>
                                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.29241 5.20759C0.901881 4.81707 0.90188 4.18391 1.29241 3.79338C1.68293 3.40286 2.31609 3.40286 2.70662 3.79338L5.99951 7.08627L9.2924 3.79338C9.68293 3.40286 10.3161 3.40286 10.7066 3.79338C11.0971 4.18391 11.0971 4.81707 10.7066 5.20759L6.70662 9.2076C6.31609 9.59812 5.68293 9.59812 5.2924 9.2076L1.29241 5.20759Z" fill="currentColor"></path>
                                </svg>
                            </div>
                            <span class="hidden xl:block text-xs text-lightgray">CEO &amp; Founder</span>
                        </div>
                    </button>
                    <ul x-show="open" x-transition="" x-transition.duration.300ms="" style="display: none;">
                        <li>
                            <a href="javaScript:;" class="flex items-center gap-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="9.99996" cy="4.99984" r="3.33333" fill="currentColor"></circle>
                                    <ellipse opacity="0.33" cx="9.99996" cy="14.1668" rx="5.83333" ry="3.33333" fill="currentColor"></ellipse>
                                </svg>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="javaScript:;" class="flex items-center gap-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M10.3564 1.6665C9.42824 1.6665 8.58294 2.16709 6.89234 3.16827L6.32055 3.50688C4.62995 4.50806 3.78465 5.00865 3.32055 5.83317C2.85645 6.6577 2.85645 7.65887 2.85645 9.66122V10.3385C2.85645 12.3408 2.85645 13.342 3.32055 14.1665C3.78465 14.991 4.62995 15.4916 6.32055 16.4928L6.89234 16.8314C8.58294 17.8326 9.42824 18.3332 10.3564 18.3332C11.2846 18.3332 12.1299 17.8326 13.8205 16.8314L14.3923 16.4928C16.0829 15.4916 16.9282 14.991 17.3923 14.1665C17.8564 13.342 17.8564 12.3408 17.8564 10.3385V9.66122C17.8564 7.65887 17.8564 6.6577 17.3923 5.83317C16.9282 5.00865 16.0829 4.50806 14.3923 3.50688L13.8205 3.16827C12.1299 2.16709 11.2846 1.6665 10.3564 1.6665Z" fill="currentColor"></path>
                                    <path d="M10.3564 6.875C8.63056 6.875 7.23145 8.27411 7.23145 10C7.23145 11.7259 8.63056 13.125 10.3564 13.125C12.0823 13.125 13.4814 11.7259 13.4814 10C13.4814 8.27411 12.0823 6.875 10.3564 6.875Z" fill="currentColor"></path>
                                </svg>
                                Setting
                            </a>
                        </li>
                        <li>
                            <a href="javaScript:;" class="flex items-center gap-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15 11.6667C15 15.3486 12.0152 18.3333 8.33329 18.3333C7.3037 18.3333 6.32863 18.0999 5.45809 17.6832C5.15888 17.5399 4.8199 17.4896 4.49945 17.5754L3.47775 17.8487C2.67247 18.0642 1.93575 17.3275 2.15122 16.5222L2.42459 15.5005C2.51033 15.1801 2.46004 14.8411 2.31679 14.5419C1.90002 13.6713 1.66663 12.6963 1.66663 11.6667C1.66663 7.98477 4.65139 5 8.33329 5C12.0152 5 15 7.98477 15 11.6667ZM5.41663 12.5C5.87686 12.5 6.24996 12.1269 6.24996 11.6667C6.24996 11.2064 5.87686 10.8333 5.41663 10.8333C4.95639 10.8333 4.58329 11.2064 4.58329 11.6667C4.58329 12.1269 4.95639 12.5 5.41663 12.5ZM8.33329 12.5C8.79353 12.5 9.16663 12.1269 9.16663 11.6667C9.16663 11.2064 8.79353 10.8333 8.33329 10.8333C7.87306 10.8333 7.49996 11.2064 7.49996 11.6667C7.49996 12.1269 7.87306 12.5 8.33329 12.5ZM11.25 12.5C11.7102 12.5 12.0833 12.1269 12.0833 11.6667C12.0833 11.2064 11.7102 10.8333 11.25 10.8333C10.7897 10.8333 10.4166 11.2064 10.4166 11.6667C10.4166 12.1269 10.7897 12.5 11.25 12.5Z" fill="currentColor"></path>
                                    <path opacity="0.3" d="M14.9868 12.0902C15.0767 12.053 15.1654 12.0134 15.2528 11.9716C15.4959 11.8552 15.7713 11.8143 16.0317 11.884L16.8618 12.1061C17.5161 12.2812 18.1147 11.6826 17.9396 11.0283L17.7175 10.1982C17.6479 9.9378 17.6887 9.66238 17.8051 9.41927C18.1437 8.71196 18.3334 7.91971 18.3334 7.08317C18.3334 4.09163 15.9082 1.6665 12.9167 1.6665C10.6583 1.6665 8.72276 3.04859 7.90967 5.01309C8.04977 5.0043 8.19105 4.99984 8.33337 4.99984C12.0153 4.99984 15 7.98461 15 11.6665C15 11.8088 14.9956 11.9501 14.9868 12.0902Z" fill="currentColor"></path>
                                </svg>
                                Message
                            </a>
                        </li>
                        <li>
                            <a href="javaScript:;" class="flex items-center gap-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M1.87496 10C1.87496 5.51269 5.51265 1.875 9.99996 1.875C14.4873 1.875 18.125 5.51269 18.125 10V12.3272C18.1901 12.3042 18.2602 12.2917 18.3333 12.2917C18.6785 12.2917 18.9583 12.5715 18.9583 12.9167V14.5833C18.9583 14.9285 18.6785 15.2083 18.3333 15.2083C17.9881 15.2083 17.7083 14.9285 17.7083 14.5833V14.1667H16.875V10C16.875 6.20304 13.7969 3.125 9.99996 3.125C6.203 3.125 3.12496 6.20304 3.12496 10V14.1667H2.29163V14.5833C2.29163 14.9285 2.0118 15.2083 1.66663 15.2083C1.32145 15.2083 1.04163 14.9285 1.04163 14.5833V12.9167C1.04163 12.5715 1.32145 12.2917 1.66663 12.2917C1.73968 12.2917 1.8098 12.3042 1.87496 12.3272V10Z" fill="currentColor"></path>
                                    <path d="M6.66663 11.708C6.66663 11.0002 6.66663 10.6463 6.49189 10.4002C6.40396 10.2764 6.28724 10.1741 6.15102 10.1014C5.88034 9.95697 5.51475 9.99034 4.78357 10.0571C3.5515 10.1696 2.93546 10.2258 2.494 10.5337C2.27057 10.6896 2.083 10.8883 1.94308 11.1173C1.66663 11.5699 1.66663 12.1662 1.66663 13.3589V14.8086C1.66663 15.9894 1.66663 16.5798 1.9486 17.0357C2.05415 17.2064 2.18644 17.3603 2.34078 17.492C2.75315 17.8438 3.35507 17.9538 4.5589 18.1736C5.40606 18.3283 5.82965 18.4056 6.14226 18.2427C6.25762 18.1826 6.35958 18.1012 6.44235 18.0032C6.66663 17.7375 6.66663 17.322 6.66663 16.4911V11.708Z" fill="currentColor"></path>
                                    <path d="M13.3333 11.708C13.3333 11.0002 13.3333 10.6463 13.508 10.4002C13.596 10.2764 13.7127 10.1741 13.8489 10.1014C14.1196 9.95697 14.4852 9.99034 15.2164 10.0571C16.4484 10.1696 17.0645 10.2258 17.5059 10.5337C17.7294 10.6896 17.9169 10.8883 18.0568 11.1173C18.3333 11.5699 18.3333 12.1662 18.3333 13.3589V14.8086C18.3333 15.9894 18.3333 16.5798 18.0513 17.0357C17.9458 17.2064 17.8135 17.3603 17.6591 17.492C17.2468 17.8438 16.6449 17.9538 15.441 18.1736C14.5939 18.3283 14.1703 18.4056 13.8577 18.2427C13.7423 18.1826 13.6403 18.1012 13.5576 18.0032C13.3333 17.7375 13.3333 17.322 13.3333 16.4911V11.708Z" fill="currentColor"></path>
                                </svg>
                                Support
                            </a>
                        </li>
                        <li>
                            <a href="javaScript:;" class="!text-danger flex items-center gap-2">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M10.3564 1.6665C9.42824 1.6665 8.58294 2.16709 6.89234 3.16827L6.32055 3.50688C4.62995 4.50806 3.78465 5.00865 3.32055 5.83317C2.85645 6.6577 2.85645 7.65887 2.85645 9.66122V10.3385C2.85645 12.3408 2.85645 13.342 3.32055 14.1665C3.78465 14.991 4.62995 15.4916 6.32055 16.4928L6.89234 16.8314C8.58294 17.8326 9.42824 18.3332 10.3564 18.3332C11.2846 18.3332 12.1299 17.8326 13.8205 16.8314L14.3923 16.4928C16.0829 15.4916 16.9282 14.991 17.3923 14.1665C17.8564 13.342 17.8564 12.3408 17.8564 10.3385V9.66122C17.8564 7.65887 17.8564 6.6577 17.3923 5.83317C16.9282 5.00865 16.0829 4.50806 14.3923 3.50688L13.8205 3.16827C12.1299 2.16709 11.2846 1.6665 10.3564 1.6665Z" fill="currentColor"></path>
                                    <path d="M10.3564 6.875C8.63056 6.875 7.23145 8.27411 7.23145 10C7.23145 11.7259 8.63056 13.125 10.3564 13.125C12.0823 13.125 13.4814 11.7259 13.4814 10C13.4814 8.27411 12.0823 6.875 10.3564 6.875Z" fill="currentColor"></path>
                                </svg>
                                Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Dropdowns Profile</h2>
            <div class="relative">
                <div class="notification h-6 inline-block" x-data="dropdown" @click.outside="open = false">
                    <button type="button" class="text-lightgray hover:bg-primary/10 bg-gray/10 h-10 w-10 rounded items-center flex justify-center hover:text-primary" @click="toggle()">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M18.7491 9V9.7041C18.7491 10.5491 18.9903 11.3752 19.4422 12.0782L20.5496 13.8012C21.5612 15.3749 20.789 17.5139 19.0296 18.0116C14.4273 19.3134 9.57274 19.3134 4.97036 18.0116C3.21105 17.5139 2.43882 15.3749 3.45036 13.8012L4.5578 12.0782C5.00972 11.3752 5.25087 10.5491 5.25087 9.7041V9C5.25087 5.13401 8.27256 2 12 2C15.7274 2 18.7491 5.13401 18.7491 9Z" fill="currentColor"></path>
                            <path d="M12.75 6C12.75 5.58579 12.4142 5.25 12 5.25C11.5858 5.25 11.25 5.58579 11.25 6V10C11.25 10.4142 11.5858 10.75 12 10.75C12.4142 10.75 12.75 10.4142 12.75 10V6Z" fill="currentColor"></path>
                            <path d="M7.24316 18.5449C7.8941 20.5501 9.77767 21.9997 11.9998 21.9997C14.222 21.9997 16.1055 20.5501 16.7565 18.5449C13.611 19.1352 10.3886 19.1352 7.24316 18.5449Z" fill="currentColor"></path>
                        </svg>
                    </button>
                    <div class="noti-area space-y-[22px]" x-show="open" x-transition="" x-transition.duration.300ms="" style="display: none;">
                        <div class="flex items-center gap-2">
                            <h4 class="font-semibold text-dark dark:text-white">Notifications</h4>
                            <div x-data="{ dropdown: false}" class="dropdown ml-auto">
                                <a href="javaScript:;" class="text-lightgray h-3 flex items-center justify-center" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                    <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                                        <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                                        <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                                    </svg>
                                </a>
                                <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms="" class="right-0 whitespace-nowrap" style="display: none;">
                                    <li><a href="javascript:;">All</a></li>
                                    <li><a href="javascript:;">Read</a></li>
                                    <li><a href="javascript:;">Unread</a></li>
                                </ul>
                            </div>
                        </div>
                        <ul class="mt-5 space-y-[22px]">
                            <li>
                                <a href="#" class="flex items-center gap-2.5">
                                    <div class="w-9 h-9 bg-primary/10 rounded-full flex items-center justify-center shrink-0">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M15.8333 9.94775V12.4998C15.8333 15.5104 13.5528 17.9882 10.625 18.3001V12.4998C10.625 12.1547 10.3452 11.8748 10 11.8748C9.65483 11.8748 9.37501 12.1547 9.37501 12.4998V18.3001C6.44724 17.9882 4.16668 15.5104 4.16668 12.4998V9.94775C4.16668 8.55831 5.03029 7.37058 6.25001 6.89204C6.62112 6.74645 7.02519 6.6665 7.44793 6.6665L12.5521 6.6665C12.9748 6.6665 13.3789 6.74645 13.75 6.89204C14.9697 7.37058 15.8333 8.55831 15.8333 9.94775Z" fill="#267DFF"></path>
                                            <path d="M15.8333 12.2918V11.0418H18.3333C18.6785 11.0418 18.9583 11.3216 18.9583 11.6668C18.9583 12.012 18.6785 12.2918 18.3333 12.2918H15.8333Z" fill="#267DFF"></path>
                                            <path d="M14.5796 16.1137C14.8386 15.7859 15.0632 15.4296 15.2479 15.0503L17.3629 16.108C17.6716 16.2623 17.7967 16.6378 17.6423 16.9465C17.488 17.2552 17.1125 17.3804 16.8038 17.226L14.5796 16.1137Z" fill="#267DFF"></path>
                                            <path d="M4.75217 15.0503C4.93683 15.4296 5.1614 15.7859 5.42042 16.1137L3.19622 17.226C2.88749 17.3804 2.51206 17.2552 2.35768 16.9465C2.20329 16.6378 2.32841 16.2623 2.63714 16.108L4.75217 15.0503Z" fill="#267DFF"></path>
                                            <path d="M4.16668 11.0418H1.66668C1.3215 11.0418 1.04168 11.3216 1.04168 11.6668C1.04168 12.012 1.3215 12.2918 1.66668 12.2918H4.16668V11.0418Z" fill="#267DFF"></path>
                                            <path d="M14.4612 7.27908L16.8038 6.10764C17.1125 5.95325 17.488 6.07837 17.6423 6.3871C17.7967 6.69583 17.6716 7.07126 17.3629 7.22564L15.3496 8.2324C15.1198 7.85843 14.8171 7.53406 14.4612 7.27908Z" fill="#267DFF"></path>
                                            <path d="M5.53879 7.27908C5.18297 7.53406 4.88024 7.85843 4.6504 8.2324L2.63714 7.22564C2.32841 7.07126 2.20329 6.69583 2.35768 6.3871C2.51206 6.07837 2.88749 5.95325 3.19622 6.10764L5.53879 7.27908Z" fill="#267DFF"></path>
                                            <path d="M13.75 6.89221V6.25C13.75 4.17893 12.0711 2.5 10 2.5C7.92895 2.5 6.25002 4.17893 6.25002 6.25V6.89221C6.62112 6.74661 7.02519 6.66667 7.44793 6.66667H12.5521C12.9748 6.66667 13.3789 6.74661 13.75 6.89221Z" fill="#267DFF"></path>
                                            <g opacity="0.5">
                                                <path d="M5.31339 1.31988C5.12192 1.60709 5.19952 1.99513 5.48673 2.1866L7.45307 3.49749C7.7877 3.18769 8.17893 2.93816 8.60951 2.76614L6.18011 1.14654C5.8929 0.955069 5.50486 1.03268 5.31339 1.31988Z" fill="#267DFF"></path>
                                                <path d="M12.547 3.49755C12.2124 3.18774 11.8212 2.9382 11.3906 2.76618L13.8201 1.14654C14.1073 0.955069 14.4953 1.03268 14.6868 1.31988C14.8783 1.60709 14.8006 1.99513 14.5134 2.1866L12.547 3.49755Z" fill="#267DFF"></path>
                                            </g>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 11.875C10.3452 11.875 10.625 12.1548 10.625 12.5V18.3333H9.37502V12.5C9.37502 12.1548 9.65484 11.875 10 11.875Z" fill="#267DFF"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-dark dark:text-white">You have a bug that needs</p>
                                        <p class="text-xs text-gray mt-0.5">Just now</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2.5">
                                    <div class="w-9 h-9 bg-purple/10 rounded-full flex items-center justify-center shrink-0">
                                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="10" cy="5.49984" r="3.33333" fill="#7B6AFE"></circle>
                                            <ellipse opacity="0.5" cx="10" cy="14.6668" rx="5.83333" ry="3.33333" fill="#7B6AFE"></ellipse>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-dark dark:text-white">New user registered</p>
                                        <p class="text-xs text-gray mt-0.5">59 minutes ago</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center gap-2.5">
                                    <div class="w-9 h-9 bg-primary/10 rounded-full flex items-center justify-center shrink-0">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M15.8333 9.94775V12.4998C15.8333 15.5104 13.5528 17.9882 10.625 18.3001V12.4998C10.625 12.1547 10.3452 11.8748 10 11.8748C9.65483 11.8748 9.37501 12.1547 9.37501 12.4998V18.3001C6.44724 17.9882 4.16668 15.5104 4.16668 12.4998V9.94775C4.16668 8.55831 5.03029 7.37058 6.25001 6.89204C6.62112 6.74645 7.02519 6.6665 7.44793 6.6665L12.5521 6.6665C12.9748 6.6665 13.3789 6.74645 13.75 6.89204C14.9697 7.37058 15.8333 8.55831 15.8333 9.94775Z" fill="#267DFF"></path>
                                            <path d="M15.8333 12.2918V11.0418H18.3333C18.6785 11.0418 18.9583 11.3216 18.9583 11.6668C18.9583 12.012 18.6785 12.2918 18.3333 12.2918H15.8333Z" fill="#267DFF"></path>
                                            <path d="M14.5796 16.1137C14.8386 15.7859 15.0632 15.4296 15.2479 15.0503L17.3629 16.108C17.6716 16.2623 17.7967 16.6378 17.6423 16.9465C17.488 17.2552 17.1125 17.3804 16.8038 17.226L14.5796 16.1137Z" fill="#267DFF"></path>
                                            <path d="M4.75217 15.0503C4.93683 15.4296 5.1614 15.7859 5.42042 16.1137L3.19622 17.226C2.88749 17.3804 2.51206 17.2552 2.35768 16.9465C2.20329 16.6378 2.32841 16.2623 2.63714 16.108L4.75217 15.0503Z" fill="#267DFF"></path>
                                            <path d="M4.16668 11.0418H1.66668C1.3215 11.0418 1.04168 11.3216 1.04168 11.6668C1.04168 12.012 1.3215 12.2918 1.66668 12.2918H4.16668V11.0418Z" fill="#267DFF"></path>
                                            <path d="M14.4612 7.27908L16.8038 6.10764C17.1125 5.95325 17.488 6.07837 17.6423 6.3871C17.7967 6.69583 17.6716 7.07126 17.3629 7.22564L15.3496 8.2324C15.1198 7.85843 14.8171 7.53406 14.4612 7.27908Z" fill="#267DFF"></path>
                                            <path d="M5.53879 7.27908C5.18297 7.53406 4.88024 7.85843 4.6504 8.2324L2.63714 7.22564C2.32841 7.07126 2.20329 6.69583 2.35768 6.3871C2.51206 6.07837 2.88749 5.95325 3.19622 6.10764L5.53879 7.27908Z" fill="#267DFF"></path>
                                            <path d="M13.75 6.89221V6.25C13.75 4.17893 12.0711 2.5 10 2.5C7.92895 2.5 6.25002 4.17893 6.25002 6.25V6.89221C6.62112 6.74661 7.02519 6.66667 7.44793 6.66667H12.5521C12.9748 6.66667 13.3789 6.74661 13.75 6.89221Z" fill="#267DFF"></path>
                                            <g opacity="0.5">
                                                <path d="M5.31339 1.31988C5.12192 1.60709 5.19952 1.99513 5.48673 2.1866L7.45307 3.49749C7.7877 3.18769 8.17893 2.93816 8.60951 2.76614L6.18011 1.14654C5.8929 0.955069 5.50486 1.03268 5.31339 1.31988Z" fill="#267DFF"></path>
                                                <path d="M12.547 3.49755C12.2124 3.18774 11.8212 2.9382 11.3906 2.76618L13.8201 1.14654C14.1073 0.955069 14.4953 1.03268 14.6868 1.31988C14.8783 1.60709 14.8006 1.99513 14.5134 2.1866L12.547 3.49755Z" fill="#267DFF"></path>
                                            </g>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 11.875C10.3452 11.875 10.625 12.1548 10.625 12.5V18.3333H9.37502V12.5C9.37502 12.1548 9.65484 11.875 10 11.875Z" fill="#267DFF"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-dark dark:text-white">You have a bug that needs</p>
                                        <p class="text-xs text-gray mt-0.5">5 hours ago</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="text-end">
                            <a href="javascript:;" class="text-gray font-semibold text-sm hover:text-primary duration-300">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Quick Selection</h2>
            <div class="flex justify-center">
                <div x-data="{ dropdown: false}" class="dropdown mx-auto">
                    <a href="javaScript:;" class="text-lightgray hover:bg-primary/10 bg-gray/10 h-10 w-10 rounded items-center flex justify-center hover:text-primary" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                        <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                            <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                            <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                        </svg>
                    </a>
                    <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms="" class="right-0 whitespace-nowrap" style="display: none;">
                        <li><a href="javascript:;">All</a></li>
                        <li><a href="javascript:;">Read</a></li>
                        <li><a href="javascript:;">Unread</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection