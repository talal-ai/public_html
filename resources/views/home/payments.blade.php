@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="font-semibold text-lightgray flex items-center gap-4 sm:gap-[30px] gap-y-4 whitespace-nowrap overflow-auto">
                <li>
                    <a href="{{ route('ecommerce') }}" class="hover:text-dark duration-300 dark:hover:text-white">Overview</a>
                </li>
                <li>
                    <a href="{{ route('orderList') }}" class="hover:text-dark duration-300 dark:hover:text-white">Order List</a>
                </li>
                <li>
                    <a href="{{ route('accounts') }}" class="hover:text-dark duration-300 dark:hover:text-white">Accounts</a>
                </li>
                <li>
                    <a href="{{ route('payments') }}" class="text-dark dark:text-white duration-300">Payments</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 xl:grid-cols-3 xl:gap-5 gap-y-5">
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-3 xl:gap-5 lg:col-span-2 space-y-5 xl:space-y-0">
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg md:col-span-3 xl:col-span-2">
                <div class="flex items-center gap-5 mb-[30px] justify-between flex-wrap">
                    <h2 class="font-semibold">Top Selling Categories</h2>
                    <ul class="flex gap-5 items-center text-sm">
                        <li>
                            <a href="javascript:;">12 Hours</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="text-gray hover:text-dark dark:hover:text-white">Day</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="text-gray hover:text-dark dark:hover:text-white">Week</a>
                        </li>
                    </ul>
                </div>
                <div class="space-y-[30px]">
                    <div class="flex items-stretch gap-8 sm:gap-[30px] xl:justify-between flex-wrap bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                        <div>
                            <p class="text-gray text-sm">User Sign-in</p>
                            <p class="font-semibold text-lg mt-2">36,899</p>
                        </div>
                        <div class="w-[2px] bg-gray/10 hidden lg:block"></div>
                        <div>
                            <p class="text-gray text-sm">Admin Sign-in</p>
                            <p class="font-semibold text-lg mt-2">75</p>
                        </div>
                        <div class="w-[2px] bg-gray/10 hidden lg:block"></div>
                        <div>
                            <p class="text-gray text-sm">Failed Attempts</p>
                            <p class="font-semibold text-lg mt-2">300</p>
                        </div>
                    </div>
                    <div>
                        <ul class="flex items-center flex-wrap gap-5">
                            <li>
                                <a href="#" class="btn bg-dark dark:bg-white dark:text-dark text-white">Clients Charter</a>
                            </li>
                            <li>
                                <a href="#" class="btn bg-gray/5">Agents Chart</a>
                            </li>
                        </ul>
                        <div id="topselling"></div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg space-y-5 md:col-span-3 xl:col-auto">
                <div>
                    <div class="flex items-center gap-2">
                        <h4 class="font-semibold text-dark dark:text-white">Notifications</h4>
                        <div x-data="{ dropdown: false}" class="dropdown ml-auto">
                            <a href="javaScript:;" class="text-lightgray h-3 flex items-center justify-center" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="2" cy="2" r="2" fill="currentColor" />
                                    <circle cx="9" cy="2" r="2" fill="currentColor" />
                                    <circle cx="16" cy="2" r="2" fill="currentColor" />
                                </svg>
                            </a>
                            <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms="" class="right-0 whitespace-nowrap">
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
                                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M15.8333 9.94775V12.4998C15.8333 15.5104 13.5528 17.9882 10.625 18.3001V12.4998C10.625 12.1547 10.3452 11.8748 10 11.8748C9.65483 11.8748 9.37501 12.1547 9.37501 12.4998V18.3001C6.44724 17.9882 4.16668 15.5104 4.16668 12.4998V9.94775C4.16668 8.55831 5.03029 7.37058 6.25001 6.89204C6.62112 6.74645 7.02519 6.6665 7.44793 6.6665L12.5521 6.6665C12.9748 6.6665 13.3789 6.74645 13.75 6.89204C14.9697 7.37058 15.8333 8.55831 15.8333 9.94775Z" fill="#267DFF" />
                                        <path d="M15.8333 12.2918V11.0418H18.3333C18.6785 11.0418 18.9583 11.3216 18.9583 11.6668C18.9583 12.012 18.6785 12.2918 18.3333 12.2918H15.8333Z" fill="#267DFF" />
                                        <path d="M14.5796 16.1137C14.8386 15.7859 15.0632 15.4296 15.2479 15.0503L17.3629 16.108C17.6716 16.2623 17.7967 16.6378 17.6423 16.9465C17.488 17.2552 17.1125 17.3804 16.8038 17.226L14.5796 16.1137Z" fill="#267DFF" />
                                        <path d="M4.75217 15.0503C4.93683 15.4296 5.1614 15.7859 5.42042 16.1137L3.19622 17.226C2.88749 17.3804 2.51206 17.2552 2.35768 16.9465C2.20329 16.6378 2.32841 16.2623 2.63714 16.108L4.75217 15.0503Z" fill="#267DFF" />
                                        <path d="M4.16668 11.0418H1.66668C1.3215 11.0418 1.04168 11.3216 1.04168 11.6668C1.04168 12.012 1.3215 12.2918 1.66668 12.2918H4.16668V11.0418Z" fill="#267DFF" />
                                        <path d="M14.4612 7.27908L16.8038 6.10764C17.1125 5.95325 17.488 6.07837 17.6423 6.3871C17.7967 6.69583 17.6716 7.07126 17.3629 7.22564L15.3496 8.2324C15.1198 7.85843 14.8171 7.53406 14.4612 7.27908Z" fill="#267DFF" />
                                        <path d="M5.53879 7.27908C5.18297 7.53406 4.88024 7.85843 4.6504 8.2324L2.63714 7.22564C2.32841 7.07126 2.20329 6.69583 2.35768 6.3871C2.51206 6.07837 2.88749 5.95325 3.19622 6.10764L5.53879 7.27908Z" fill="#267DFF" />
                                        <path d="M13.75 6.89221V6.25C13.75 4.17893 12.0711 2.5 10 2.5C7.92895 2.5 6.25002 4.17893 6.25002 6.25V6.89221C6.62112 6.74661 7.02519 6.66667 7.44793 6.66667H12.5521C12.9748 6.66667 13.3789 6.74661 13.75 6.89221Z" fill="#267DFF" />
                                        <g opacity="0.5">
                                            <path d="M5.31339 1.31988C5.12192 1.60709 5.19952 1.99513 5.48673 2.1866L7.45307 3.49749C7.7877 3.18769 8.17893 2.93816 8.60951 2.76614L6.18011 1.14654C5.8929 0.955069 5.50486 1.03268 5.31339 1.31988Z" fill="#267DFF" />
                                            <path d="M12.547 3.49755C12.2124 3.18774 11.8212 2.9382 11.3906 2.76618L13.8201 1.14654C14.1073 0.955069 14.4953 1.03268 14.6868 1.31988C14.8783 1.60709 14.8006 1.99513 14.5134 2.1866L12.547 3.49755Z" fill="#267DFF" />
                                        </g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 11.875C10.3452 11.875 10.625 12.1548 10.625 12.5V18.3333H9.37502V12.5C9.37502 12.1548 9.65484 11.875 10 11.875Z" fill="#267DFF" />
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
                                        <circle cx="10" cy="5.49984" r="3.33333" fill="#7B6AFE" />
                                        <ellipse opacity="0.5" cx="10" cy="14.6668" rx="5.83333" ry="3.33333" fill="#7B6AFE" />
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
                                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M15.8333 9.94775V12.4998C15.8333 15.5104 13.5528 17.9882 10.625 18.3001V12.4998C10.625 12.1547 10.3452 11.8748 10 11.8748C9.65483 11.8748 9.37501 12.1547 9.37501 12.4998V18.3001C6.44724 17.9882 4.16668 15.5104 4.16668 12.4998V9.94775C4.16668 8.55831 5.03029 7.37058 6.25001 6.89204C6.62112 6.74645 7.02519 6.6665 7.44793 6.6665L12.5521 6.6665C12.9748 6.6665 13.3789 6.74645 13.75 6.89204C14.9697 7.37058 15.8333 8.55831 15.8333 9.94775Z" fill="#267DFF" />
                                        <path d="M15.8333 12.2918V11.0418H18.3333C18.6785 11.0418 18.9583 11.3216 18.9583 11.6668C18.9583 12.012 18.6785 12.2918 18.3333 12.2918H15.8333Z" fill="#267DFF" />
                                        <path d="M14.5796 16.1137C14.8386 15.7859 15.0632 15.4296 15.2479 15.0503L17.3629 16.108C17.6716 16.2623 17.7967 16.6378 17.6423 16.9465C17.488 17.2552 17.1125 17.3804 16.8038 17.226L14.5796 16.1137Z" fill="#267DFF" />
                                        <path d="M4.75217 15.0503C4.93683 15.4296 5.1614 15.7859 5.42042 16.1137L3.19622 17.226C2.88749 17.3804 2.51206 17.2552 2.35768 16.9465C2.20329 16.6378 2.32841 16.2623 2.63714 16.108L4.75217 15.0503Z" fill="#267DFF" />
                                        <path d="M4.16668 11.0418H1.66668C1.3215 11.0418 1.04168 11.3216 1.04168 11.6668C1.04168 12.012 1.3215 12.2918 1.66668 12.2918H4.16668V11.0418Z" fill="#267DFF" />
                                        <path d="M14.4612 7.27908L16.8038 6.10764C17.1125 5.95325 17.488 6.07837 17.6423 6.3871C17.7967 6.69583 17.6716 7.07126 17.3629 7.22564L15.3496 8.2324C15.1198 7.85843 14.8171 7.53406 14.4612 7.27908Z" fill="#267DFF" />
                                        <path d="M5.53879 7.27908C5.18297 7.53406 4.88024 7.85843 4.6504 8.2324L2.63714 7.22564C2.32841 7.07126 2.20329 6.69583 2.35768 6.3871C2.51206 6.07837 2.88749 5.95325 3.19622 6.10764L5.53879 7.27908Z" fill="#267DFF" />
                                        <path d="M13.75 6.89221V6.25C13.75 4.17893 12.0711 2.5 10 2.5C7.92895 2.5 6.25002 4.17893 6.25002 6.25V6.89221C6.62112 6.74661 7.02519 6.66667 7.44793 6.66667H12.5521C12.9748 6.66667 13.3789 6.74661 13.75 6.89221Z" fill="#267DFF" />
                                        <g opacity="0.5">
                                            <path d="M5.31339 1.31988C5.12192 1.60709 5.19952 1.99513 5.48673 2.1866L7.45307 3.49749C7.7877 3.18769 8.17893 2.93816 8.60951 2.76614L6.18011 1.14654C5.8929 0.955069 5.50486 1.03268 5.31339 1.31988Z" fill="#267DFF" />
                                            <path d="M12.547 3.49755C12.2124 3.18774 11.8212 2.9382 11.3906 2.76618L13.8201 1.14654C14.1073 0.955069 14.4953 1.03268 14.6868 1.31988C14.8783 1.60709 14.8006 1.99513 14.5134 2.1866L12.547 3.49755Z" fill="#267DFF" />
                                        </g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10 11.875C10.3452 11.875 10.625 12.1548 10.625 12.5V18.3333H9.37502V12.5C9.37502 12.1548 9.65484 11.875 10 11.875Z" fill="#267DFF" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-dark dark:text-white">You have a bug that needs</p>
                                    <p class="text-xs text-gray mt-0.5">5 hours ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2.5">
                                <div class="w-9 h-9 bg-purple/10 rounded-full flex items-center justify-center shrink-0">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="10" cy="5.49984" r="3.33333" fill="#7B6AFE" />
                                        <ellipse opacity="0.5" cx="10" cy="14.6668" rx="5.83333" ry="3.33333" fill="#7B6AFE" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-dark dark:text-white">Password Changed</p>
                                    <p class="text-xs text-gray mt-0.5">9 hours ago</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <div class="flex items-center gap-2">
                        <h4 class="font-semibold text-dark dark:text-white">Activities</h4>
                        <div x-data="{ dropdown: false}" class="dropdown ml-auto">
                            <a href="javaScript:;" class="text-lightgray h-3 flex items-center justify-center" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="2" cy="2" r="2" fill="currentColor" />
                                    <circle cx="9" cy="2" r="2" fill="currentColor" />
                                    <circle cx="16" cy="2" r="2" fill="currentColor" />
                                </svg>
                            </a>
                            <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms="" class="right-0 whitespace-nowrap">
                                <li><a href="javascript:;">This Month</a></li>
                                <li><a href="javascript:;">Last Year</a></li>
                                <li><a href="javascript:;">Last 5 year</a></li>
                            </ul>
                        </div>
                    </div>
                    <ul class="mt-5 space-y-[22px]">
                        <li>
                            <a href="#" class="flex items-center gap-2.5">
                                <div class="w-9 h-9 bg-primary/10 rounded-full flex items-center justify-center shrink-0">
                                    <img src="{{ asset('public/assets/images/avatar-1.png') }}" class="rounded-full" alt="">
                                </div>
                                <div>
                                    <p class="text-sm text-dark dark:text-white">Edited the details of Project</p>
                                    <p class="text-xs text-gray mt-0.5">Just now</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2.5">
                                <div class="w-9 h-9 bg-purple/10 rounded-full flex items-center justify-center shrink-0">
                                    <img src="{{ asset('public/assets/images/avatar-2.png') }}" class="rounded-full" alt="">
                                </div>
                                <div>
                                    <p class="text-sm text-dark dark:text-white">Released a new version</p>
                                    <p class="text-xs text-gray mt-0.5">59 minutes ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center gap-2.5">
                                <div class="w-9 h-9 bg-primary/10 rounded-full flex items-center justify-center shrink-0">
                                    <img src="{{ asset('public/assets/images/avatar-3.png') }}" alt="">
                                </div>
                                <div>
                                    <p class="text-sm text-dark dark:text-white">Submitted a bug</p>
                                    <p class="text-xs text-gray mt-0.5">5 hours ago</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg md:col-span-3 lg:col-span-5 xl:col-span-3">
                <div class="flex items-center gap-5 mb-[30px] justify-between flex-wrap">
                    <h2 class="font-semibold">Statement</h2>
                    <ul class="flex gap-5 items-center text-sm">
                        <li>
                            <a href="javascript:;">This Year</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="text-gray hover:text-dark dark:hover:text-white">2022</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="text-gray hover:text-dark dark:hover:text-white">2021</a>
                        </li>
                    </ul>
                </div>
                <div class="overflow-auto">
                    <table class="min-w-[640px] w-full">
                        <thead>
                            <tr class="text-left">
                                <th>Order ID</th>
                                <th>Details</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Invoice</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>68975784</td>
                                <td>Darknight transparency 36 Icons Pack</td>
                                <td>Nov 24, 2022</td>
                                <td>$38.00</td>
                                <td>
                                    <a href="javascript:;">
                                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.99951 16.0005H17.9995V9.00049H19.9995V17.0005C19.9995 17.5528 19.5518 18.0005 18.9995 18.0005H0.999512C0.447232 18.0005 -0.000488281 17.5528 -0.000488281 17.0005V9.00049H1.99951V16.0005Z" fill="#267DFF" />
                                            <path d="M10.9995 7.00049H15.9995L9.99951 13.0005L3.99951 7.00049H8.99951V0.000488281H10.9995V7.00049Z" fill="#267DFF" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>69873125</td>
                                <td>Seller Fee</td>
                                <td>Aug 10, 2022</td>
                                <td>$-2.60</td>
                                <td>
                                    <a href="javascript:;">
                                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.99951 16.0005H17.9995V9.00049H19.9995V17.0005C19.9995 17.5528 19.5518 18.0005 18.9995 18.0005H0.999512C0.447232 18.0005 -0.000488281 17.5528 -0.000488281 17.0005V9.00049H1.99951V16.0005Z" fill="#267DFF" />
                                            <path d="M10.9995 7.00049H15.9995L9.99951 13.0005L3.99951 7.00049H8.99951V0.000488281H10.9995V7.00049Z" fill="#267DFF" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>63214789</td>
                                <td>Cartoon Mobile Emoji Phone Pack</td>
                                <td>May 6, 2022</td>
                                <td>$76.00</td>
                                <td>
                                    <a href="javascript:;">
                                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.99951 16.0005H17.9995V9.00049H19.9995V17.0005C19.9995 17.5528 19.5518 18.0005 18.9995 18.0005H0.999512C0.447232 18.0005 -0.000488281 17.5528 -0.000488281 17.0005V9.00049H1.99951V16.0005Z" fill="#267DFF" />
                                            <path d="M10.9995 7.00049H15.9995L9.99951 13.0005L3.99951 7.00049H8.99951V0.000488281H10.9995V7.00049Z" fill="#267DFF" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>65432178</td>
                                <td>Iphone 12 Pro Mockup Mega Bundle</td>
                                <td>Apr 30, 2022</td>
                                <td>$-5.00</td>
                                <td>
                                    <a href="javascript:;">
                                        <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.99951 16.0005H17.9995V9.00049H19.9995V17.0005C19.9995 17.5528 19.5518 18.0005 18.9995 18.0005H0.999512C0.447232 18.0005 -0.000488281 17.5528 -0.000488281 17.0005V9.00049H1.99951V16.0005Z" fill="#267DFF" />
                                            <path d="M10.9995 7.00049H15.9995L9.99951 13.0005L3.99951 7.00049H8.99951V0.000488281H10.9995V7.00049Z" fill="#267DFF" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <div class="flex items-center gap-2 mb-[30px]">
                <h4 class="font-semibold text-dark dark:text-white">Wallet</h4>
                <div x-data="{ dropdown: false}" class="dropdown ml-auto">
                    <a href="javaScript:;" class="text-lightgray h-3 flex items-center justify-center" @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                        <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                            <circle cx="9" cy="2" r="2" fill="currentColor"></circle>
                            <circle cx="16" cy="2" r="2" fill="currentColor"></circle>
                        </svg>
                    </a>
                    <ul x-show="dropdown" @click.away="dropdown = false" x-transition="" x-transition.duration.300ms="" class="right-0 whitespace-nowrap" style="display: none;">
                        <li><a href="javascript:;">Credit Card</a></li>
                        <li><a href="javascript:;">Debit Card</a></li>
                    </ul>
                </div>
            </div>
            <div class="max-w-md mx-auto">
                <div class="bg-dark border-2 border-lightgray/20 rounded-[10px] px-[30px] pt-5 pb-20">
                    <div class="flex items-stretch gap-2.5 text-lg/none">
                        <p class="font-bold text-white">Maglo.</p>
                        <span class="bg-success shrink-0 w-[2px]"></span>
                        <p class="text-gray">Universal Bank</p>
                    </div>
                    <div class="flex items-end justify-between mt-10">
                        <span>
                            <svg width="38" height="30" viewBox="0 0 38 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M34.2585 29.8721L3.79186 30.0004C1.77319 30.0121 0.104588 28.3552 0.0929192 26.3365L-0.000427026 3.82784C-0.0120956 1.80918 1.64484 0.140573 3.6635 0.128904L34.1301 0.000549536C36.1488 -0.011119 37.8174 1.64582 37.8291 3.66448L37.9224 26.1731C37.9341 28.2035 36.2771 29.8721 34.2585 29.8721Z" fill="#7780A1" />
                                <path d="M14.6559 25.9745C14.4925 25.9745 14.3408 25.8928 14.2591 25.7411C14.1424 25.5311 14.2358 25.2627 14.4458 25.146C15.0759 24.8193 15.9394 24.2008 16.4295 23.1507C17.0596 21.8088 16.8845 20.3502 16.6162 20.2335C16.5462 20.1985 16.2895 20.3385 16.1261 20.4202C15.7177 20.6303 15.1459 20.922 14.4808 20.7003C13.8274 20.4786 13.5123 19.9068 13.3606 19.6268C12.3571 17.8181 12.0304 13.0924 13.0689 10.7353C13.419 9.95353 13.8857 9.48678 14.4692 9.34676C15.0643 9.20674 15.5543 9.45178 15.9511 9.65014C16.2778 9.8135 16.4411 9.88351 16.5345 9.82517C16.9429 9.58013 16.9312 8.07488 16.3478 6.88469C15.8461 5.83452 14.9826 5.22776 14.3408 4.90104C14.1308 4.79602 14.0374 4.52764 14.1541 4.31761C14.2591 4.10758 14.5275 4.01422 14.7375 4.13091C15.496 4.51597 16.5228 5.23942 17.1296 6.5113C17.7364 7.7715 18.0281 9.94185 16.9779 10.5836C16.4528 10.9103 15.9394 10.6536 15.5427 10.4436C15.2393 10.2919 14.9476 10.1402 14.6675 10.2102C14.2825 10.3036 14.0141 10.747 13.8624 11.097C12.9522 13.1507 13.2323 17.6198 14.1191 19.2067C14.2708 19.4751 14.4458 19.7668 14.7609 19.8718C15.0526 19.9768 15.3326 19.8485 15.7294 19.6384C16.1144 19.4401 16.5462 19.2184 17.0012 19.4401C17.9814 19.9068 17.9231 22.0188 17.2229 23.5241C16.6278 24.8076 15.601 25.5311 14.8426 25.9278C14.7959 25.9628 14.7259 25.9745 14.6559 25.9745Z" fill="#050C17" />
                                <path d="M13.2795 11.529L5.39153 11.564C5.14649 11.564 4.94812 11.3656 4.94812 11.1322C4.94812 10.8872 5.14649 10.6888 5.37986 10.6888L13.2678 10.6538C13.5129 10.6538 13.7112 10.8522 13.7112 11.0855C13.7229 11.3306 13.5245 11.529 13.2795 11.529Z" fill="#050C17" />
                                <path d="M13.3139 19.4171L5.42596 19.4521C5.18092 19.4521 4.98254 19.2538 4.98254 19.0204C4.98254 18.7754 5.18091 18.577 5.41428 18.577L13.3022 18.542C13.5473 18.542 13.7456 18.7404 13.7456 18.9737C13.7456 19.2071 13.5589 19.4171 13.3139 19.4171Z" fill="#050C17" />
                                <path d="M23.8503 25.9401C23.7803 25.9401 23.7103 25.9284 23.6519 25.8934C22.8935 25.5083 21.8666 24.7849 21.2599 23.513C20.5364 22.0194 20.4664 19.9074 21.4466 19.429C21.9016 19.2073 22.3334 19.429 22.7185 19.6157C23.1152 19.8141 23.3952 19.9424 23.6869 19.8374C24.0137 19.7207 24.2004 19.3707 24.317 19.1606C25.1805 17.562 25.4256 13.093 24.5037 11.051C24.3404 10.7009 24.072 10.2575 23.6869 10.1758C23.4536 10.1175 23.3019 9.88414 23.3602 9.65076C23.4186 9.41739 23.6519 9.2657 23.8853 9.32405C24.4687 9.46407 24.9471 9.91913 25.2972 10.7009C26.359 13.0463 26.0673 17.7721 25.0872 19.5924C24.9355 19.8724 24.6204 20.4559 23.9787 20.6776C23.3136 20.9109 22.7418 20.6192 22.3334 20.4092C22.17 20.3275 21.9017 20.1991 21.8433 20.2225C21.5749 20.3508 21.4232 21.8094 22.065 23.1396C22.5668 24.1898 23.4302 24.7966 24.072 25.1233C24.282 25.2283 24.3754 25.4967 24.2587 25.7067C24.1654 25.8467 24.0137 25.9401 23.8503 25.9401Z" fill="#050C17" />
                                <path d="M22.0307 9.74377C21.844 9.74377 21.6806 9.62709 21.6106 9.4404C20.6655 6.62827 22.8475 4.44625 23.5593 4.08452C23.7693 3.96784 24.0377 4.06119 24.1544 4.27122C24.2711 4.48126 24.1777 4.74963 23.9677 4.86631C23.6526 5.02967 21.6456 6.76829 22.4508 9.16035C22.5325 9.39372 22.4041 9.63876 22.1707 9.72044C22.1241 9.73211 22.0774 9.74377 22.0307 9.74377Z" fill="#050C17" />
                                <path d="M32.9876 11.4474L25.0997 11.4824C24.8546 11.4824 24.6562 11.284 24.6562 11.0507C24.6562 10.8056 24.8546 10.6073 25.088 10.6073L32.9759 10.5723C33.221 10.5723 33.4193 10.7706 33.4193 11.004C33.431 11.249 33.2326 11.4474 32.9876 11.4474Z" fill="#050C17" />
                                <path d="M33.0222 19.3351L25.1342 19.3701C24.8892 19.3701 24.6908 19.1717 24.6908 18.9384C24.6908 18.6933 24.8892 18.495 25.1225 18.495L33.0105 18.46C33.2555 18.46 33.4539 18.6583 33.4539 18.8917C33.4656 19.1367 33.2672 19.3351 33.0222 19.3351Z" fill="#050C17" />
                            </svg>
                        </span>
                        <span>
                            <svg width="34" height="33" viewBox="0 0 34 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.5">
                                    <path d="M17.2261 6.75178C21.9295 12.6643 21.9295 20.3505 17.2261 26.263M22.1562 2.75049C28.7862 11.083 28.7862 21.918 22.1562 30.2505M12.0553 9.33679C15.512 13.668 15.512 19.3192 12.0553 23.6505M6.8703 12.9255C8.59863 15.098 8.59863 17.9167 6.8703 20.0892" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                            </svg>
                        </span>
                    </div>
                    <div class="mt-[30px]">
                        <p class="font-extrabold text-lg text-white tracking-widest [word-spacing:20px]">5495 7381 3759 2321</p>
                    </div>
                </div>
                <div class="px-3.5 relative -mt-16">
                    <div class="bg-gradient-to-t from-dark/30 to-white/10 border-2 border-transparent dark:border-lightgray/20 backdrop-blur-md rounded-[10px] px-[30px] py-5">
                        <div class="flex items-stretch gap-2.5 text-lg/none">
                            <p class="font-bold text-white">Maglo.</p>
                            <span class="bg-success shrink-0 w-[2px]"></span>
                            <p class="text-gray">Universal Bank</p>
                        </div>
                        <div class="flex items-end justify-between mt-10">
                            <span>
                                <svg width="38" height="30" viewBox="0 0 38 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M34.2585 29.8721L3.79186 30.0004C1.77319 30.0121 0.104588 28.3552 0.0929192 26.3365L-0.000427026 3.82784C-0.0120956 1.80918 1.64484 0.140573 3.6635 0.128904L34.1301 0.000549536C36.1488 -0.011119 37.8174 1.64582 37.8291 3.66448L37.9224 26.1731C37.9341 28.2035 36.2771 29.8721 34.2585 29.8721Z" fill="#7780A1" />
                                    <path d="M14.6559 25.9745C14.4925 25.9745 14.3408 25.8928 14.2591 25.7411C14.1424 25.5311 14.2358 25.2627 14.4458 25.146C15.0759 24.8193 15.9394 24.2008 16.4295 23.1507C17.0596 21.8088 16.8845 20.3502 16.6162 20.2335C16.5462 20.1985 16.2895 20.3385 16.1261 20.4202C15.7177 20.6303 15.1459 20.922 14.4808 20.7003C13.8274 20.4786 13.5123 19.9068 13.3606 19.6268C12.3571 17.8181 12.0304 13.0924 13.0689 10.7353C13.419 9.95353 13.8857 9.48678 14.4692 9.34676C15.0643 9.20674 15.5543 9.45178 15.9511 9.65014C16.2778 9.8135 16.4411 9.88351 16.5345 9.82517C16.9429 9.58013 16.9312 8.07488 16.3478 6.88469C15.8461 5.83452 14.9826 5.22776 14.3408 4.90104C14.1308 4.79602 14.0374 4.52764 14.1541 4.31761C14.2591 4.10758 14.5275 4.01422 14.7375 4.13091C15.496 4.51597 16.5228 5.23942 17.1296 6.5113C17.7364 7.7715 18.0281 9.94185 16.9779 10.5836C16.4528 10.9103 15.9394 10.6536 15.5427 10.4436C15.2393 10.2919 14.9476 10.1402 14.6675 10.2102C14.2825 10.3036 14.0141 10.747 13.8624 11.097C12.9522 13.1507 13.2323 17.6198 14.1191 19.2067C14.2708 19.4751 14.4458 19.7668 14.7609 19.8718C15.0526 19.9768 15.3326 19.8485 15.7294 19.6384C16.1144 19.4401 16.5462 19.2184 17.0012 19.4401C17.9814 19.9068 17.9231 22.0188 17.2229 23.5241C16.6278 24.8076 15.601 25.5311 14.8426 25.9278C14.7959 25.9628 14.7259 25.9745 14.6559 25.9745Z" fill="#050C17" />
                                    <path d="M13.2795 11.529L5.39153 11.564C5.14649 11.564 4.94812 11.3656 4.94812 11.1322C4.94812 10.8872 5.14649 10.6888 5.37986 10.6888L13.2678 10.6538C13.5129 10.6538 13.7112 10.8522 13.7112 11.0855C13.7229 11.3306 13.5245 11.529 13.2795 11.529Z" fill="#050C17" />
                                    <path d="M13.3139 19.4171L5.42596 19.4521C5.18092 19.4521 4.98254 19.2538 4.98254 19.0204C4.98254 18.7754 5.18091 18.577 5.41428 18.577L13.3022 18.542C13.5473 18.542 13.7456 18.7404 13.7456 18.9737C13.7456 19.2071 13.5589 19.4171 13.3139 19.4171Z" fill="#050C17" />
                                    <path d="M23.8503 25.9401C23.7803 25.9401 23.7103 25.9284 23.6519 25.8934C22.8935 25.5083 21.8666 24.7849 21.2599 23.513C20.5364 22.0194 20.4664 19.9074 21.4466 19.429C21.9016 19.2073 22.3334 19.429 22.7185 19.6157C23.1152 19.8141 23.3952 19.9424 23.6869 19.8374C24.0137 19.7207 24.2004 19.3707 24.317 19.1606C25.1805 17.562 25.4256 13.093 24.5037 11.051C24.3404 10.7009 24.072 10.2575 23.6869 10.1758C23.4536 10.1175 23.3019 9.88414 23.3602 9.65076C23.4186 9.41739 23.6519 9.2657 23.8853 9.32405C24.4687 9.46407 24.9471 9.91913 25.2972 10.7009C26.359 13.0463 26.0673 17.7721 25.0872 19.5924C24.9355 19.8724 24.6204 20.4559 23.9787 20.6776C23.3136 20.9109 22.7418 20.6192 22.3334 20.4092C22.17 20.3275 21.9017 20.1991 21.8433 20.2225C21.5749 20.3508 21.4232 21.8094 22.065 23.1396C22.5668 24.1898 23.4302 24.7966 24.072 25.1233C24.282 25.2283 24.3754 25.4967 24.2587 25.7067C24.1654 25.8467 24.0137 25.9401 23.8503 25.9401Z" fill="#050C17" />
                                    <path d="M22.0307 9.74377C21.844 9.74377 21.6806 9.62709 21.6106 9.4404C20.6655 6.62827 22.8475 4.44625 23.5593 4.08452C23.7693 3.96784 24.0377 4.06119 24.1544 4.27122C24.2711 4.48126 24.1777 4.74963 23.9677 4.86631C23.6526 5.02967 21.6456 6.76829 22.4508 9.16035C22.5325 9.39372 22.4041 9.63876 22.1707 9.72044C22.1241 9.73211 22.0774 9.74377 22.0307 9.74377Z" fill="#050C17" />
                                    <path d="M32.9876 11.4474L25.0997 11.4824C24.8546 11.4824 24.6562 11.284 24.6562 11.0507C24.6562 10.8056 24.8546 10.6073 25.088 10.6073L32.9759 10.5723C33.221 10.5723 33.4193 10.7706 33.4193 11.004C33.431 11.249 33.2326 11.4474 32.9876 11.4474Z" fill="#050C17" />
                                    <path d="M33.0222 19.3351L25.1342 19.3701C24.8892 19.3701 24.6908 19.1717 24.6908 18.9384C24.6908 18.6933 24.8892 18.495 25.1225 18.495L33.0105 18.46C33.2555 18.46 33.4539 18.6583 33.4539 18.8917C33.4656 19.1367 33.2672 19.3351 33.0222 19.3351Z" fill="#050C17" />
                                </svg>
                            </span>
                            <span>
                                <svg width="34" height="33" viewBox="0 0 34 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.5">
                                        <path d="M17.2261 6.75178C21.9295 12.6643 21.9295 20.3505 17.2261 26.263M22.1562 2.75049C28.7862 11.083 28.7862 21.918 22.1562 30.2505M12.0553 9.33679C15.512 13.668 15.512 19.3192 12.0553 23.6505M6.8703 12.9255C8.59863 15.098 8.59863 17.9167 6.8703 20.0892" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                </svg>
                            </span>
                        </div>
                        <div class="mt-[30px]">
                            <p class="font-extrabold text-lg text-dark dark:text-white tracking-widest">85952548****</p>
                            <p class="text-gray mt-2">09/25</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between gap-2 my-[30px]">
                <h4 class="font-semibold text-dark dark:text-white">Scheduled Transfers</h4>
                <div>
                    <a href="javascript:;" class="flex items-center gap-2.5 text-gray hover:text-primary duration-300">View All
                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.70662 1.79338C4.31609 1.40286 3.68293 1.40286 3.29241 1.79338C2.90188 2.18391 2.90188 2.81707 3.29241 3.20759L6.5853 6.50049L3.2924 9.79338C2.90188 10.1839 2.90188 10.8171 3.2924 11.2076C3.68293 11.5981 4.31609 11.5981 4.70662 11.2076L8.70662 7.2076C9.09714 6.81707 9.09714 6.18391 8.70662 5.79338L4.70662 1.79338Z" fill="currentColor" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="space-y-5">
                <div class="flex items-center gap-2.5 justify-between">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('public/assets/images/avatar-4.png') }}" class="h-10 rounded-full" alt="">
                        <div class="space-y-1.5">
                            <p class="font-semibold text-sm">Alan Alexander</p>
                            <p class="text-gray text-sm">April 28, 2022 at 11:00</p>
                        </div>
                    </div>
                    <p class="text-sm font-semibold shrink-0">- $435,00</p>
                </div>
                <div class="flex items-center gap-2.5 justify-between">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('public/assets/images/avatar-5.png') }}" class="h-10 rounded-full" alt="">
                        <div class="space-y-1.5">
                            <p class="font-semibold text-sm">Jonathan Johnson</p>
                            <p class="text-gray text-sm">April 25, 2022 at 11:00</p>
                        </div>
                    </div>
                    <p class="text-sm font-semibold shrink-0">- $132,00</p>
                </div>
                <div class="flex items-center gap-2.5 justify-between">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('public/assets/images/avatar-6.png') }}" class="h-10 rounded-full" alt="">
                        <div class="space-y-1.5">
                            <p class="font-semibold text-sm">Moinul Hasan Nayem</p>
                            <p class="text-gray text-sm">April 25, 2022 at 11:00</p>
                        </div>
                    </div>
                    <p class="text-sm font-semibold shrink-0">- $826,00</p>
                </div>
                <div class="flex items-center gap-2.5 justify-between">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('public/assets/images/avatar-7.png') }}" class="h-10 rounded-full" alt="">
                        <div class="space-y-1.5">
                            <p class="font-semibold text-sm">Michael Bostwick</p>
                            <p class="text-gray text-sm">April 16, 2022 at 11:00</p>
                        </div>
                    </div>
                    <p class="text-sm font-semibold shrink-0">- $435,00</p>
                </div>
                <div class="flex items-center gap-2.5 justify-between">
                    <div class="flex items-center gap-3.5">
                        <img src="{{ asset('public/assets/images/avatar-8.png') }}" class="h-10 rounded-full" alt="">
                        <div class="space-y-1.5">
                            <p class="font-semibold text-sm">David Brown</p>
                            <p class="text-gray text-sm">April 14, 2022 at 11:00</p>
                        </div>
                    </div>
                    <p class="text-sm font-semibold shrink-0">- $228,00</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

    <!-- ApexCharts js -->
    <script src="{{ asset('public/assets/js/apexcharts.js') }}"></script>

    <script>
        var userchart = {
            chart: {
                height: 280,
                type: "bar",
                fontFamily: "Inter, sans-serif",
                zoom: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            plotOptions: { bar: { horizontal: !1, endingShape: "rounded", columnWidth: "30%", borderRadius: 2 } },
            stroke: {
                show: !0, width: 4, colors: ["transparent"]
            },
            colors: ["#267DFF", "rgba(201, 223, 255)"],
            series: [
                {
                    name: "Income",
                    data: [62, 81, 76, 22, 45, 70, 15],
                },
                {
                    name: "Expenses",
                    data: [55, 70, 56, 42, 36, 60, 14],
                },
            ],
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
            xaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                crosshairs: {
                    show: true,
                },
                labels: {
                    offsetX: 0,
                    offsetY: 3,
                    style: {
                        fontSize: "16px",
                        fontWeight: "600",
                        colors: "#7780A1",
                        cssClass: "apexcharts-xaxis-title",
                    },
                },
            },
            yaxis: {
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                crosshairs: {
                    show: true,
                },
                labels: {
                    offsetX: 0,
                    offsetY: 9,
                    style: {
                        fontSize: "16px",
                        fontWeight: "600",
                        colors: "#7780A1",
                        cssClass: "apexcharts-xaxis-title",
                    },
                },
            },
            fill: { opacity: 1 },
            grid: {
                borderColor: "rgba(119, 128, 161, .1)",
                strokeDashArray: 1,
                xaxis: {
                    lines: {
                        show: false,
                    },
                },
                yaxis: {
                    lines: {
                        show: true,
                    },
                },
                padding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0,
                },
            },
            tooltip: {
                y: {
                    formatter: function (e) {
                        return "" + e;
                    },
                },
            },
        };
        var chart = new ApexCharts(document.querySelector("#topselling"), userchart);
        chart.render();
    </script>

@endsection