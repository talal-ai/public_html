@extends('Layout.layout')

@section('content')

<!-- Start All Card -->
<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg space-y-6">
                <div class="flex items-center gap-2.5">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.6679 7C15.6679 6.58579 16.0037 6.25 16.4179 6.25H22C22.4142 6.25 22.75 6.58579 22.75 7V12.5458C22.75 12.96 22.4142 13.2958 22 13.2958C21.5858 13.2958 21.25 12.96 21.25 12.5458V7.75H16.4179C16.0037 7.75 15.6679 7.41421 15.6679 7Z" fill="#267DFF" />
                            <path opacity="0.3" d="M20.1873 7.75L14.0916 13.8027C13.5778 14.3134 13.2447 14.6423 12.9673 14.8527C12.7073 15.0499 12.5857 15.072 12.5052 15.072C12.4247 15.072 12.3031 15.0499 12.0431 14.8526C11.7658 14.6421 11.4327 14.3132 10.919 13.8024L10.6448 13.5296C10.1755 13.063 9.77105 12.6607 9.40375 12.382C9.01003 12.0832 8.57254 11.8572 8.03395 11.8574C7.49535 11.8576 7.05802 12.0839 6.66452 12.383C6.29742 12.662 5.89326 13.0645 5.42433 13.5315L1.47078 17.4686C1.17728 17.7608 1.17628 18.2357 1.46856 18.5292C1.76084 18.8227 2.23571 18.8237 2.52922 18.5314L6.44789 14.6292C6.96167 14.1175 7.29478 13.7881 7.57219 13.5772C7.83228 13.3795 7.95393 13.3574 8.03449 13.3574C8.11506 13.3573 8.23672 13.3794 8.49695 13.5769C8.77452 13.7875 9.10787 14.1167 9.62203 14.628L9.89627 14.9007C10.3651 15.367 10.7692 15.7688 11.1362 16.0474C11.5297 16.346 11.9668 16.5719 12.505 16.572C13.0432 16.572 13.4804 16.3462 13.8739 16.0477C14.241 15.7692 14.6452 15.3674 15.1142 14.9013L21.2501 8.80858V7.75H20.1873Z" fill="#267DFF" />
                        </svg>
                    </span>
                    <p class="font-semibold">Student App Installed Custom2</p>
                </div>
                <div class="flex items-center gap-2.5 xl:gap-[30px] flex-wrap">
                    <span class="text-lg font-bold">
                        404K
                    </span>
                    <!-- <p class="flex items-center gap-2.5 text-gray flex-wrap">This week
                        <span class="bg-success/10 text-success flex items-center gap-1 rounded-full py-1 px-2.5 text-xs">
                            3.47%
                            <span class="">
                                <svg width="10" height="10" class="inline-block" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.73684 9.21053C5.73684 9.64654 5.38338 10 4.94737 10C4.51135 10 4.15789 9.64654 4.15789 9.21053L4.15789 2.69543L2.34772 4.50561C2.03941 4.81392 1.53954 4.81392 1.23123 4.50561C0.922923 4.1973 0.922923 3.69743 1.23123 3.38913L4.38913 0.231232C4.53718 0.0831764 4.73799 -1.83028e-08 4.94737 0C5.15675 1.83066e-08 5.35756 0.0831765 5.50561 0.231232L8.66351 3.38913C8.97181 3.69743 8.97181 4.1973 8.66351 4.50561C8.3552 4.81392 7.85533 4.81392 7.54702 4.50561L5.73684 2.69543V9.21053Z" fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                    </p> -->
                </div>
            </div>
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg space-y-6">
                <div class="flex items-center gap-2.5">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle opacity="0.3" cx="15" cy="6" r="3" fill="#7B6AFE" />
                            <ellipse opacity="0.3" cx="16" cy="17" rx="5" ry="3" fill="#7B6AFE" />
                            <circle cx="9.00098" cy="6" r="4" fill="#7B6AFE" />
                            <ellipse cx="9.00098" cy="17.001" rx="7" ry="4" fill="#7B6AFE" />
                        </svg>
                    </span>
                    <p class="font-semibold">Parents App Installed Custom</p>
                </div>
                <div class="flex items-center gap-2.5 xl:gap-[30px] flex-wrap">
                    <span class="text-lg font-bold">
                        300K
                    </span>
                    <!-- <p class="flex items-center gap-2.5 text-gray flex-wrap">This week
                        <span class="bg-danger/10 text-danger flex items-center gap-1 rounded-full py-1 px-2.5 text-xs">
                            2.14%
                            <span class="">
                                <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.23684 0.789474C6.23684 0.353459 5.88338 0 5.44737 0C5.01135 0 4.65789 0.353459 4.65789 0.789474L4.65789 7.30457L2.84772 5.49439C2.53941 5.18608 2.03954 5.18608 1.73123 5.49439C1.42292 5.8027 1.42292 6.30257 1.73123 6.61087L4.88913 9.76877C5.03718 9.91682 5.23799 10 5.44737 10C5.65675 10 5.85756 9.91682 6.00561 9.76877L9.16351 6.61087C9.47181 6.30257 9.47181 5.8027 9.16351 5.49439C8.8552 5.18608 8.35533 5.18608 8.04702 5.49439L6.23684 7.30457V0.789474Z" fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                    </p> -->
                </div>
            </div>
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg space-y-6">
                <div class="flex items-center gap-2.5">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.2696 16.265L20.9751 12.1852C21.1514 11.1662 20.3677 10.2342 19.3348 10.2342H14.1537C13.6402 10.2342 13.2491 9.77328 13.3323 9.26598L13.9949 5.22142C14.1026 4.56435 14.0719 3.892 13.9047 3.24752C13.7662 2.71364 13.3543 2.28495 12.8126 2.11093L12.6676 2.06435C12.3402 1.95918 11.9829 1.98365 11.6742 2.13239C11.3344 2.29611 11.0859 2.59473 10.9938 2.94989L10.518 4.78374C10.3667 5.36723 10.1462 5.93045 9.86194 6.46262C9.44659 7.24017 8.8044 7.86246 8.13687 8.43769L6.69813 9.67749C6.29247 10.0271 6.07944 10.5506 6.1256 11.0844L6.93776 20.4771C7.01226 21.3386 7.73256 22 8.59634 22H13.245C16.7263 22 19.6973 19.5744 20.2696 16.265Z" fill="#FF51A4" />
                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2.96767 9.48508C3.36893 9.46777 3.71261 9.76963 3.74721 10.1698L4.71881 21.4063C4.78122 22.1281 4.21268 22.7502 3.48671 22.7502C2.80289 22.7502 2.25 22.1954 2.25 21.5129V10.2344C2.25 9.83275 2.5664 9.5024 2.96767 9.48508Z" fill="#FF51A4" />
                        </svg>
                    </span>
                    <p class="font-semibold">Teachers App Installed Custom</p>
                </div>
                <div class="flex items-center gap-2.5 xl:gap-[30px] flex-wrap">
                    <span class="text-lg font-bold">
                        340K
                    </span>
                    <!-- <p class="flex items-center gap-2.5 text-gray flex-wrap">This week
                        <span class="bg-danger/10 text-danger flex items-center gap-1 rounded-full py-1 px-2.5 text-xs">
                            1.42%
                            <span class="">
                                <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.23684 0.789474C6.23684 0.353459 5.88338 0 5.44737 0C5.01135 0 4.65789 0.353459 4.65789 0.789474L4.65789 7.30457L2.84772 5.49439C2.53941 5.18608 2.03954 5.18608 1.73123 5.49439C1.42292 5.8027 1.42292 6.30257 1.73123 6.61087L4.88913 9.76877C5.03718 9.91682 5.23799 10 5.44737 10C5.65675 10 5.85756 9.91682 6.00561 9.76877L9.16351 6.61087C9.47181 6.30257 9.47181 5.8027 9.16351 5.49439C8.8552 5.18608 8.35533 5.18608 8.04702 5.49439L6.23684 7.30457V0.789474Z" fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                    </p> -->
                </div>
            </div>
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg space-y-6">
                <div class="flex items-center gap-2.5">
                    <span>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M21 11.0975V16.0909C21 19.1875 21 20.7358 20.2659 21.4123C19.9158 21.735 19.4739 21.9377 19.0031 21.9915C18.016 22.1045 16.8633 21.0849 14.5578 19.0458C13.5388 18.1445 13.0292 17.6938 12.4397 17.5751C12.1494 17.5166 11.8506 17.5166 11.5603 17.5751C10.9708 17.6938 10.4612 18.1445 9.44216 19.0458C7.13673 21.0849 5.98402 22.1045 4.99692 21.9915C4.52615 21.9377 4.08421 21.735 3.73411 21.4123C3 20.7358 3 19.1875 3 16.0909V11.0975C3 6.80891 3 4.6646 4.31802 3.3323C5.63604 2 7.75736 2 12 2C16.2426 2 18.364 2 19.682 3.3323C21 4.6646 21 6.80891 21 11.0975Z" fill="#FF7C51" />
                            <path d="M9 5.25C8.58579 5.25 8.25 5.58579 8.25 6C8.25 6.41421 8.58579 6.75 9 6.75H15C15.4142 6.75 15.75 6.41421 15.75 6C15.75 5.58579 15.4142 5.25 15 5.25H9Z" fill="#FF7C51" />
                        </svg>
                    </span>
                    <p class="font-semibold">Total Students Custom</p>
                </div>
                <div class="flex items-center gap-2.5  xl:gap-[30px] flex-wrap">
                    <span class="text-lg font-bold">
                        140K
                    </span>
                    <!-- <p class="flex items-center gap-2.5 text-gray flex-wrap">This week
                        <span class="bg-success/10 text-success flex items-center gap-1 rounded-full py-1 px-2.5 text-xs">
                            6.70%
                            <span class="">
                                <svg width="10" height="10" class="inline-block" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.73684 9.21053C5.73684 9.64654 5.38338 10 4.94737 10C4.51135 10 4.15789 9.64654 4.15789 9.21053L4.15789 2.69543L2.34772 4.50561C2.03941 4.81392 1.53954 4.81392 1.23123 4.50561C0.922923 4.1973 0.922923 3.69743 1.23123 3.38913L4.38913 0.231232C4.53718 0.0831764 4.73799 -1.83028e-08 4.94737 0C5.15675 1.83066e-08 5.35756 0.0831765 5.50561 0.231232L8.66351 3.38913C8.97181 3.69743 8.97181 4.1973 8.66351 4.50561C8.3552 4.81392 7.85533 4.81392 7.54702 4.50561L5.73684 2.69543V9.21053Z" fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                    </p> -->
                </div>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-5">
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                <h2 class="font-semibold">Visitors Overview</h2>
                <p class="text-lightgray">Aug 25- Sep 25
                    <span>
                        <svg width="20" height="20" class="inline-block" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.91895 10.337L9.69134 13.1959C9.86896 13.3791 10.1311 13.3791 10.3087 13.1959L15.6668 7.67055C16.0011 7.32577 15.7984 6.66666 15.3581 6.66666H10.5893L6.91895 10.337Z" fill="currentColor" />
                            <path opacity="0.5" d="M9.41073 6.66666H4.64191C4.20156 6.66666 3.9989 7.32577 4.33324 7.67055L6.33873 9.73866L9.41073 6.66666Z" fill="currentColor" />
                        </svg>
                    </span>
                </p>
                <div class="grid grid-cols-2 gap-5 mt-[30px]">
                    <div class="text-center">
                        <div id="visitors"></div>
                        <p class="text-gray text-sm mt-4">Campaign</p>
                        <p class="font-semibold mt-2 text-lg">80%</p>
                    </div>
                    <div class="text-center">
                        <div id="direct"></div>
                        <p class="text-gray text-sm mt-4">Direct</p>
                        <p class="font-semibold mt-2 text-lg">20%</p>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                <h2 class="font-semibold">Visitors Overview</h2>
                <div class="grid grid-cols-2 items-center gap-5">
                    <div id="photoclick"></div>
                    <div>
                        <p class="text-gray text-sm mt-4">Photo Clicks</p>
                        <p class="font-semibold mt-2 text-lg">70%</p>
                        <div x-data="{ dropdown: false}" class="dropdown ml-auto mt-2">
                            <a href="javaScript:;" class="text-lightgray h-3 flex items-center z-0" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
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
                <div class="grid grid-cols-2 items-center gap-5">
                    <div id="linkclick"></div>
                    <div>
                        <p class="text-gray text-sm mt-4">Link Clicks</p>
                        <p class="font-semibold mt-2 text-lg">30%</p>
                        <div x-data="{ dropdown: false}" class="dropdown ml-auto mt-2">
                            <a href="javaScript:;" class="text-lightgray h-3 flex items-center z-0" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
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
    </div>
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">
        <div class="grid grid-cols-1 gap-5">
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                <h2 class="mb-[30px]">Product Analysis</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-5 items-center">
                    <div class="space-y-5 xl:col-span-2">
                        <div class="bg-primary/10 flex items-stretch py-4 px-2.5 gap-5 rounded-lg">
                            <div class="bg-primary w-1 shrink-0"></div>
                            <div class="flex items-center gap-3.5">
                                <p class="text-2xl font-bold">325</p>
                                <div class="text-sm space-y-3">
                                    <p class="text-gray">/14G525</p>
                                    <p class="text-lightgray">Products Input</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-purple/10 flex items-stretch py-4 px-2.5 gap-5 rounded-lg">
                            <div class="bg-purple w-1 shrink-0"></div>
                            <div class="flex items-center gap-3.5">
                                <p class="text-2xl font-bold">325</p>
                                <div class="text-sm space-y-3">
                                    <p class="text-gray">/14G525</p>
                                    <p class="text-lightgray">Products Input</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="linechart" class="xl:col-span-3"></div>
                </div>
            </div>
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                <h2 class="mb-[30px]">Account Summary</h2>
                <div class="grid sm:grid-cols-3 gap-5">
                    <div class="flex items-center gap-2 md:gap-3.5 flex-wrap">
                        <div class="relative w-12 h-12">
                            <svg viewbox="0 0 36 36" class="block my-0 mx-auto w-12 h-12">
                                <path class="fill-none stroke-primary/20 stroke-[4]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                <path class="fill-none stroke-primary stroke-[4]" stroke-dasharray="80, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                            </svg>
                            <svg class="absolute inset-1/2 -translate-x-1/2 -translate-y-1/2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.8 1.20001L1.20001 10.8M1.20001 10.8V1.20001M1.20001 10.8H10.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray">Video Lectures</p>
                            <p class="font-bold text-lg">12/15</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 md:gap-3.5 flex-wrap">
                        <div class="relative w-12 h-12">
                            <svg viewbox="0 0 36 36" class="block my-0 mx-auto w-12 h-12">
                                <path class="fill-none stroke-purple/20 stroke-[4]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                <path class="fill-none stroke-purple stroke-[4]" stroke-dasharray="40, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                            </svg>
                            <svg class="absolute inset-1/2 -translate-x-1/2 -translate-y-1/2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.20896 10.8L10.8 1.2M10.8 1.2V10.8M10.8 1.2H1.20896" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray">Youtube Subscribe</p>
                            <p class="font-bold text-lg">12/15</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 md:gap-3.5 flex-wrap">
                        <div class="relative w-12 h-12">
                            <svg viewbox="0 0 36 36" class="block my-0 mx-auto w-12 h-12">
                                <path class="fill-none stroke-orange/20 stroke-[4]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                <path class="fill-none stroke-orange stroke-[4]" stroke-dasharray="30, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                            </svg>
                            <svg class="absolute inset-1/2 -translate-x-1/2 -translate-y-1/2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.20896 10.8L10.8 1.2M10.8 1.2V10.8M10.8 1.2H1.20896" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray">Instagram Followers</p>
                            <p class="font-bold text-lg">12/15</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="mb-[30px]">World Sale</h2>
            <div class="space-y-5">
                <img src="{{ asset('public/assets/images/map-light.png') }}" class="dark:hidden mx-auto" alt="">
                <img src="{{ asset('public/assets/images/map-dark.png') }}" class="dark:block hidden mx-auto" alt="">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-9">
                    <div class="space-y-[30px]">
                        <div class="grid grid-cols-9 gap-5 items-center">
                            <div class="col-span-2">
                                <p>India</p>
                            </div>
                            <div class="w-full h-2 bg-orange/10 rounded-md col-span-7">
                                <div class="bg-orange h-2 rounded-md w-11/12 text-center flex justify-center items-center"></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-9 gap-5 items-center">
                            <div class="col-span-2">
                                <p>Russia</p>
                            </div>
                            <div class="w-full h-2 bg-primary/10 rounded-md col-span-7">
                                <div class="bg-primary h-2 rounded-md w-9/12 text-center flex justify-center items-center"></div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-[30px]">
                        <div class="grid grid-cols-9 gap-5 items-center">
                            <div class="col-span-2">
                                <p>China</p>
                            </div>
                            <div class="w-full h-2 bg-purple/10 rounded-md col-span-7">
                                <div class="bg-purple h-2 rounded-md w-9/12 text-center flex justify-center items-center"></div>
                            </div>
                        </div>
                        <div class="grid grid-cols-9 gap-5 items-center">
                            <div class="col-span-2">
                                <p>USA</p>
                            </div>
                            <div class="w-full h-2 bg-warning/10 rounded-md col-span-7">
                                <div class="bg-warning h-2 rounded-md w-6/12 text-center flex justify-center items-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="font-semibold mb-[30px]">Your Uploaded Assets</h2>
            <div class="overflow-auto">
                <table class="min-w-[640px] w-full product-table">
                    <thead>
                        <tr class="text-left">
                            <th>
                                <input type="checkbox" id="checkboxWebsite" class="form-checkbox">
                            </th>
                            <th>
                                Website
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor" />
                                </svg>
                            </th>
                            <th>
                                Asset Name
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor" />
                                </svg>
                            </th>
                            <th>
                                Status
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor" />
                                </svg>
                            </th>
                            <th>
                                Categories
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor" />
                                </svg>
                            </th>
                            <th>
                                Tags
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor" />
                                </svg>
                            </th>
                            <th>
                                Date
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor" />
                                </svg>
                            </th>
                            <th>
                                Country
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor" />
                                </svg>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-left">
                            <td>
                                <input type="checkbox" id="checkboxGoogle" class="form-checkbox">
                            </td>
                            <td>Google</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('public/assets/images/public/assets/1.png') }}" class="w-[50px] rounded-full" alt="">
                                    <p class="line-clamp-1 max-w-[200px] truncate">Abstract Element</p>
                                </div>
                            </td>
                            <td><span class="bg-primary text-white font-bold text-sm py-1.5 px-3 rounded-full">Private</span></td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.5 11.202L11 13.535V17.131L17.197 13L14.5 11.202ZM12.697 10L10 8.202L7.303 10L10 11.798L12.697 10ZM18 8.869L16.303 10L18 11.131V8.87V8.869ZM17.197 7L11 2.869V6.465L14.5 8.798L17.197 7ZM5.5 8.798L9 6.465V2.869L2.803 7L5.5 8.798ZM2.803 13L9 17.131V13.535L5.5 11.202L2.803 13ZM2 11.131L3.697 10L2 8.869V11.131ZM1.11994e-08 7C-2.46193e-05 6.8354 0.0405779 6.67335 0.118205 6.52821C0.195832 6.38308 0.308084 6.25935 0.445 6.168L9.445 0.167997C9.60933 0.058358 9.80245 -0.000152588 10 -0.000152588C10.1975 -0.000152588 10.3907 0.058358 10.555 0.167997L19.555 6.168C19.6919 6.25935 19.8042 6.38308 19.8818 6.52821C19.9594 6.67335 20 6.8354 20 7V13C20 13.1646 19.9594 13.3266 19.8818 13.4718C19.8042 13.6169 19.6919 13.7406 19.555 13.832L10.555 19.832C10.3907 19.9416 10.1975 20.0001 10 20.0001C9.80245 20.0001 9.60933 19.9416 9.445 19.832L0.445 13.832C0.308084 13.7406 0.195832 13.6169 0.118205 13.4718C0.0405779 13.3266 -2.46193e-05 13.1646 1.11994e-08 13V7Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">3D Elements</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.5 9C1.5 10.2295 1.81872 10.6436 2.45617 11.4718C3.72897 13.1253 5.86359 15 9 15C12.1364 15 14.271 13.1253 15.5438 11.4718C16.1813 10.6436 16.5 10.2295 16.5 9C16.5 7.77047 16.1813 7.35639 15.5438 6.52825C14.271 4.87467 12.1364 3 9 3C5.86359 3 3.72897 4.87467 2.45617 6.52825C1.81872 7.3564 1.5 7.77047 1.5 9Z" fill="currentColor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.1875 9C6.1875 7.4467 7.4467 6.1875 9 6.1875C10.5533 6.1875 11.8125 7.4467 11.8125 9C11.8125 10.5533 10.5533 11.8125 9 11.8125C7.4467 11.8125 6.1875 10.5533 6.1875 9ZM7.3125 9C7.3125 8.06802 8.06802 7.3125 9 7.3125C9.93198 7.3125 10.6875 8.06802 10.6875 9C10.6875 9.93198 9.93198 10.6875 9 10.6875C8.06802 10.6875 7.3125 9.93198 7.3125 9Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">13,423</p>
                                </div>
                            </td>
                            <td>31 Jan 2022</td>
                            <td>India</td>
                        </tr>
                        <tr class="text-left">
                            <td>
                                <input type="checkbox" id="checkboxAmazon" class="form-checkbox">
                            </td>
                            <td>Amazon</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('public/assets/images/public/assets/2.png') }}" class="w-[50px] rounded-full" alt="">
                                    <p class="line-clamp-1 max-w-[200px] truncate">Abstract Minimalist Character</p>
                                </div>
                            </td>
                            <td><span class="bg-success text-white font-bold text-sm py-1.5 px-3 rounded-full">Public</span></td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.828 18L2.808 18.02L2.787 18H0.992C0.728813 17.9997 0.476497 17.895 0.290489 17.7088C0.104482 17.5226 -1.33455e-07 17.2702 0 17.007V0.993C0.00183004 0.730378 0.1069 0.479017 0.292513 0.293218C0.478126 0.107418 0.72938 0.00209465 0.992 0H19.008C19.556 0 20 0.445 20 0.993V17.007C19.9982 17.2696 19.8931 17.521 19.7075 17.7068C19.5219 17.8926 19.2706 17.9979 19.008 18H2.828ZM18 12V2H2V16L12 6L18 12ZM18 14.828L12 8.828L4.828 16H18V14.828ZM6 8C5.46957 8 4.96086 7.78929 4.58579 7.41421C4.21071 7.03914 4 6.53043 4 6C4 5.46957 4.21071 4.96086 4.58579 4.58579C4.96086 4.21071 5.46957 4 6 4C6.53043 4 7.03914 4.21071 7.41421 4.58579C7.78929 4.96086 8 5.46957 8 6C8 6.53043 7.78929 7.03914 7.41421 7.41421C7.03914 7.78929 6.53043 8 6 8Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">Images</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.5 9C1.5 10.2295 1.81872 10.6436 2.45617 11.4718C3.72897 13.1253 5.86359 15 9 15C12.1364 15 14.271 13.1253 15.5438 11.4718C16.1813 10.6436 16.5 10.2295 16.5 9C16.5 7.77047 16.1813 7.35639 15.5438 6.52825C14.271 4.87467 12.1364 3 9 3C5.86359 3 3.72897 4.87467 2.45617 6.52825C1.81872 7.3564 1.5 7.77047 1.5 9Z" fill="currentColor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.1875 9C6.1875 7.4467 7.4467 6.1875 9 6.1875C10.5533 6.1875 11.8125 7.4467 11.8125 9C11.8125 10.5533 10.5533 11.8125 9 11.8125C7.4467 11.8125 6.1875 10.5533 6.1875 9ZM7.3125 9C7.3125 8.06802 8.06802 7.3125 9 7.3125C9.93198 7.3125 10.6875 8.06802 10.6875 9C10.6875 9.93198 9.93198 10.6875 9 10.6875C8.06802 10.6875 7.3125 9.93198 7.3125 9Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">15,576</p>
                                </div>
                            </td>
                            <td>2 Feb 2022</td>
                            <td>UK</td>
                        </tr>
                        <tr class="text-left">
                            <td>
                                <input type="checkbox" id="checkboxFacebook" class="form-checkbox">
                            </td>
                            <td>Facebook</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('public/assets/images/public/assets/3.png') }}" class="w-[50px] rounded-full" alt="">
                                    <p class="line-clamp-1 max-w-[200px] truncate">Assets Name</p>
                                </div>
                            </td>
                            <td><span class="bg-primary text-white font-bold text-sm py-1.5 px-3 rounded-full">Private</span></td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray">
                                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.00001 10.535V0H14V3H8.00001V14C7.99981 14.8805 7.70909 15.7363 7.17294 16.4348C6.63679 17.1332 5.88517 17.6352 5.03463 17.863C4.1841 18.0907 3.28218 18.0315 2.46875 17.6944C1.65533 17.3573 0.975843 16.7613 0.53568 15.9987C0.0955161 15.2361 -0.0807315 14.3496 0.0342702 13.4767C0.149272 12.6037 0.549096 11.7931 1.17174 11.1705C1.79438 10.5479 2.60504 10.1482 3.47801 10.0333C4.35098 9.9184 5.23747 10.0948 6.00001 10.535Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">Music</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.5 9C1.5 10.2295 1.81872 10.6436 2.45617 11.4718C3.72897 13.1253 5.86359 15 9 15C12.1364 15 14.271 13.1253 15.5438 11.4718C16.1813 10.6436 16.5 10.2295 16.5 9C16.5 7.77047 16.1813 7.35639 15.5438 6.52825C14.271 4.87467 12.1364 3 9 3C5.86359 3 3.72897 4.87467 2.45617 6.52825C1.81872 7.3564 1.5 7.77047 1.5 9Z" fill="currentColor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.1875 9C6.1875 7.4467 7.4467 6.1875 9 6.1875C10.5533 6.1875 11.8125 7.4467 11.8125 9C11.8125 10.5533 10.5533 11.8125 9 11.8125C7.4467 11.8125 6.1875 10.5533 6.1875 9ZM7.3125 9C7.3125 8.06802 8.06802 7.3125 9 7.3125C9.93198 7.3125 10.6875 8.06802 10.6875 9C10.6875 9.93198 9.93198 10.6875 9 10.6875C8.06802 10.6875 7.3125 9.93198 7.3125 9Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">24,981</p>
                                </div>
                            </td>
                            <td>5 April 2022</td>
                            <td>Canada</td>
                        </tr>
                        <tr class="text-left">
                            <td>
                                <input type="checkbox" id="checkboxInstagram" class="form-checkbox">
                            </td>
                            <td>Instagram</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('public/assets/images/public/assets/4.png') }}" class="w-[50px] rounded-full" alt="">
                                    <p class="line-clamp-1 max-w-[200px] truncate">Tuhinulla</p>
                                </div>
                            </td>
                            <td><span class="bg-success text-white font-bold text-sm py-1.5 px-3 rounded-full">Public</span></td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray">
                                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 5.2L21.213 1.55C21.288 1.49746 21.3759 1.4665 21.4672 1.4605C21.5586 1.4545 21.6498 1.4737 21.731 1.51599C21.8122 1.55829 21.8802 1.62206 21.9276 1.70035C21.9751 1.77865 22.0001 1.86846 22 1.96V14.04C22.0001 14.1315 21.9751 14.2214 21.9276 14.2996C21.8802 14.3779 21.8122 14.4417 21.731 14.484C21.6498 14.5263 21.5586 14.5455 21.4672 14.5395C21.3759 14.5335 21.288 14.5025 21.213 14.45L16 10.8V15C16 15.2652 15.8946 15.5196 15.7071 15.7071C15.5196 15.8946 15.2652 16 15 16H1C0.734784 16 0.48043 15.8946 0.292893 15.7071C0.105357 15.5196 0 15.2652 0 15V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H15C15.2652 0 15.5196 0.105357 15.7071 0.292893C15.8946 0.48043 16 0.734784 16 1V5.2ZM16 8.359L20 11.159V4.84L16 7.64V8.358V8.359ZM2 2V14H14V2H2ZM4 4H6V6H4V4Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">Video</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.5 9C1.5 10.2295 1.81872 10.6436 2.45617 11.4718C3.72897 13.1253 5.86359 15 9 15C12.1364 15 14.271 13.1253 15.5438 11.4718C16.1813 10.6436 16.5 10.2295 16.5 9C16.5 7.77047 16.1813 7.35639 15.5438 6.52825C14.271 4.87467 12.1364 3 9 3C5.86359 3 3.72897 4.87467 2.45617 6.52825C1.81872 7.3564 1.5 7.77047 1.5 9Z" fill="currentColor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.1875 9C6.1875 7.4467 7.4467 6.1875 9 6.1875C10.5533 6.1875 11.8125 7.4467 11.8125 9C11.8125 10.5533 10.5533 11.8125 9 11.8125C7.4467 11.8125 6.1875 10.5533 6.1875 9ZM7.3125 9C7.3125 8.06802 8.06802 7.3125 9 7.3125C9.93198 7.3125 10.6875 8.06802 10.6875 9C10.6875 9.93198 9.93198 10.6875 9 10.6875C8.06802 10.6875 7.3125 9.93198 7.3125 9Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">15,576</p>
                                </div>
                            </td>
                            <td>2 March 2022</td>
                            <td>USA</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End All Card -->

@endsection

@section('script')

    <!-- ApexCharts js -->
    <script src="{{ asset('public/assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('public/assets/js/apex-analytics.js') }}"></script>

@endsection