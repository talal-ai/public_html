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
                    <a href="{{ route('accounts') }}" class="text-dark dark:text-white duration-300">Accounts</a>
                </li>
                <li>
                    <a href="{{ route('payments') }}" class="hover:text-dark duration-300 dark:hover:text-white">Payments</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg lg:col-span-3">
            <div class="flex sm:items-center gap-2.5">
                <img src="{{ asset('public/assets/images/account-profile.png') }}" class="h-[58px] rounded-full" alt="">
                <div class="space-y-2">
                    <p class="font-bold">Ken Genser</p>
                    <div class="flex items-center gap-3.5 flex-wrap text-gray text-sm">
                        <div class="flex items-center gap-1.5">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10" cy="4.99984" r="3.33333" fill="currentColor" />
                                <ellipse opacity="0.3" cx="10" cy="14.1668" rx="5.83333" ry="3.33333" fill="currentColor" />
                            </svg>
                            <span>Developer</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M9.99998 1.6665C6.31808 1.6665 3.33331 5.00199 3.33331 8.74984C3.33331 12.4683 5.46108 16.5102 8.78087 18.0619C9.55477 18.4236 10.4452 18.4236 11.2191 18.0619C14.5389 16.5102 16.6666 12.4683 16.6666 8.74984C16.6666 5.00199 13.6819 1.6665 9.99998 1.6665Z" fill="currentColor" />
                                <path d="M10 10.4167C11.1506 10.4167 12.0834 9.48393 12.0834 8.33333C12.0834 7.18274 11.1506 6.25 10 6.25C8.84943 6.25 7.91669 7.18274 7.91669 8.33333C7.91669 9.48393 8.84943 10.4167 10 10.4167Z" fill="currentColor" />
                            </svg>
                            <span>SF, Bay Area</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M11.8333 2.5H8.16665C4.70968 2.5 2.9812 2.5 1.90725 3.59835C0.833313 4.6967 0.833313 6.46447 0.833313 10C0.833313 13.5355 0.833313 15.3033 1.90725 16.4017C2.9812 17.5 4.70968 17.5 8.16665 17.5H11.8333C15.2903 17.5 17.0188 17.5 18.0927 16.4017C19.1666 15.3033 19.1666 13.5355 19.1666 10C19.1666 6.46447 19.1666 4.6967 18.0927 3.59835C17.0188 2.5 15.2903 2.5 11.8333 2.5Z" fill="currentColor" />
                                <path d="M15.9403 6.69516C16.232 6.45209 16.2714 6.01857 16.0284 5.72688C15.7853 5.43519 15.3518 5.39578 15.0601 5.63886L13.0811 7.28801C12.2259 8.00069 11.6321 8.49389 11.1308 8.81629C10.6456 9.12838 10.3165 9.23314 10.0002 9.23314C9.68389 9.23314 9.35482 9.12838 8.86957 8.81629C8.36829 8.49389 7.77453 8.00069 6.91932 7.28801L4.94033 5.63886C4.64864 5.39578 4.21512 5.43519 3.97205 5.72688C3.72897 6.01857 3.76838 6.45209 4.06007 6.69516L6.07353 8.37304C6.88602 9.05014 7.54456 9.59894 8.12578 9.97275C8.73124 10.3622 9.32088 10.6081 10.0002 10.6081C10.6795 10.6081 11.2692 10.3622 11.8746 9.97275C12.4558 9.59894 13.1144 9.05013 13.9269 8.37303L15.9403 6.69516Z" fill="currentColor" />
                            </svg>
                            <span>kengenser@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-[30px] space-y-[30px]">
                <div class="flex items-stretch gap-[30px] sm:justify-between sm:flex-row flex-col">
                    <div class="w-full md:w-auto shrink-0 flex-1">
                        <h2 class="text-sm">Profile Compleation</h2>
                        <div class="mt-3.5">
                            <div class="w-full h-5 bg-primary/10 rounded-lg">
                                <div class="bg-primary h-5 rounded-lg w-6/12 text-center flex justify-center items-center">
                                    <p class="text-[11px] text-white align-middle">50%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-[2px] bg-gray/10 hidden sm:block"></div>
                    <div class="flex items-stretch gap-8 sm:gap-[30px] flex-wrap">
                        <div>
                            <p class="text-gray text-sm">Earnings</p>
                            <p class="font-semibold text-lg mt-2">$4,500</p>
                        </div>
                        <div class="w-[2px] bg-gray/10 hidden sm:block"></div>
                        <div>
                            <p class="text-gray text-sm">Projects</p>
                            <p class="font-semibold text-lg mt-2">75</p>
                        </div>
                        <div class="w-[2px] bg-gray/10 hidden sm:block"></div>
                        <div>
                            <p class="text-gray text-sm">Success Rate</p>
                            <p class="font-semibold text-lg mt-2">60%</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 px-5 py-3.5 rounded-lg">
                    <div class="flex items-center gap-1.5">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M18.3334 9.99984C18.3334 14.6022 14.6024 18.3332 10 18.3332C5.39765 18.3332 1.66669 14.6022 1.66669 9.99984C1.66669 5.39746 5.39765 1.6665 10 1.6665C14.6024 1.6665 18.3334 5.39746 18.3334 9.99984Z" fill="#7780A1" />
                            <path d="M10 14.7918C10.3452 14.7918 10.625 14.512 10.625 14.1668V9.16683C10.625 8.82165 10.3452 8.54183 10 8.54183C9.65484 8.54183 9.37502 8.82165 9.37502 9.16683V14.1668C9.37502 14.512 9.65484 14.7918 10 14.7918Z" fill="#7780A1" />
                            <path d="M10 5.8335C10.4603 5.8335 10.8334 6.20659 10.8334 6.66683C10.8334 7.12707 10.4603 7.50016 10 7.50016C9.53978 7.50016 9.16669 7.12707 9.16669 6.66683C9.16669 6.20659 9.53978 5.8335 10 5.8335Z" fill="#7780A1" />
                        </svg>
                        <span>We Need Your Attention!</span>
                    </div>
                    <p class="text-gray mt-2.5">Your payment was declined. To start using tools, please <a href="javasript:;" class="text-primary">Add Payment Method.</a></p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg lg:col-span-2">
            <div class="flex items-center justify-between gap-5 mb-[30px]">
                <h2 class="font-semibold">Profile Details</h2>
                <span class="bg-primary py-1 inline-block px-3 text-white rounded-full">Done</span>
            </div>
            <div class="space-y-3">
                <div class="flex items-center justify-between gap-1 flex-wrap">
                    <span class="w-1/2 flex-1 text-gray">Company</span>
                    <span class="w-1/2 flex-1">Cold Design</span>
                </div>
                <div class="flex items-center justify-between gap-1 flex-wrap">
                    <span class="w-1/2 flex-1 text-gray">Contact Phone
                        <svg width="20" height="20" class="inline-block" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M18.3333 9.99984C18.3333 14.6022 14.6023 18.3332 9.99996 18.3332C5.39759 18.3332 1.66663 14.6022 1.66663 9.99984C1.66663 5.39746 5.39759 1.6665 9.99996 1.6665C14.6023 1.6665 18.3333 5.39746 18.3333 9.99984Z" fill="#7780A1" />
                            <path d="M9.99996 14.7918C10.3451 14.7918 10.625 14.512 10.625 14.1668V9.16683C10.625 8.82165 10.3451 8.54183 9.99996 8.54183C9.65478 8.54183 9.37496 8.82165 9.37496 9.16683V14.1668C9.37496 14.512 9.65478 14.7918 9.99996 14.7918Z" fill="#7780A1" />
                            <path d="M9.99996 5.8335C10.4602 5.8335 10.8333 6.20659 10.8333 6.66683C10.8333 7.12707 10.4602 7.50016 9.99996 7.50016C9.53972 7.50016 9.16663 7.12707 9.16663 6.66683C9.16663 6.20659 9.53972 5.8335 9.99996 5.8335Z" fill="#7780A1" />
                        </svg>
                    </span>
                    <span class="w-1/2 flex-1">021 3276 454 935 <span class="bg-success py-0.5 inline-block px-3 text-white rounded-lg ms-1">Complate</span></span>
                </div>
                <div class="flex items-center justify-between gap-1 flex-wrap">
                    <span class="w-1/2 flex-1 text-gray">Company Site</span>
                    <span class="w-1/2 flex-1">dashhub.com
                    </span>
                </div>
                <div class="flex items-center justify-between gap-1 flex-wrap">
                    <span class="w-1/2 flex-1 text-gray">Country
                        <svg width="20" height="20" class="inline-block" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M18.3333 9.99984C18.3333 14.6022 14.6023 18.3332 9.99996 18.3332C5.39759 18.3332 1.66663 14.6022 1.66663 9.99984C1.66663 5.39746 5.39759 1.6665 9.99996 1.6665C14.6023 1.6665 18.3333 5.39746 18.3333 9.99984Z" fill="#7780A1" />
                            <path d="M9.99996 14.7918C10.3451 14.7918 10.625 14.512 10.625 14.1668V9.16683C10.625 8.82165 10.3451 8.54183 9.99996 8.54183C9.65478 8.54183 9.37496 8.82165 9.37496 9.16683V14.1668C9.37496 14.512 9.65478 14.7918 9.99996 14.7918Z" fill="#7780A1" />
                            <path d="M9.99996 5.8335C10.4602 5.8335 10.8333 6.20659 10.8333 6.66683C10.8333 7.12707 10.4602 7.50016 9.99996 7.50016C9.53972 7.50016 9.16663 7.12707 9.16663 6.66683C9.16663 6.20659 9.53972 5.8335 9.99996 5.8335Z" fill="#7780A1" />
                        </svg>
                    </span>
                    <span class="w-1/2 flex-1">United States</span>
                </div>
                <div class="flex items-center justify-between gap-1 flex-wrap">
                    <span class="w-1/2 flex-1 text-gray">Communication</span>
                    <span class="w-1/2 flex-1">Email, Phone</span>
                </div>
                <div class="flex items-center justify-between gap-1 flex-wrap">
                    <span class="w-1/2 flex-1 text-gray">Allow Changes</span>
                    <span class="w-1/2 flex-1">Yes</span>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-5">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:col-span-3 gap-5">
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                    <div class="flex items-center gap-2.5 flex-wrap">
                        <div class="shrink-0 h-[50px] w-[50px] flex items-center justify-center bg-primary/10 rounded-full text-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.8916 9.61431C4.8916 9.21193 5.21525 8.88574 5.61449 8.88574H9.46991C9.86916 8.88574 10.1928 9.21193 10.1928 9.61431C10.1928 10.0167 9.86916 10.3429 9.46991 10.3429H5.61449C5.21525 10.3429 4.8916 10.0167 4.8916 9.61431Z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1884 10.0038C21.1262 9.99995 21.0584 9.99998 20.9881 10L20.9706 10H18.2149C15.9435 10 14 11.7361 14 14C14 16.2639 15.9435 18 18.2149 18H20.9706L20.9881 18C21.0584 18 21.1262 18 21.1884 17.9962C22.111 17.9397 22.927 17.2386 22.9956 16.2594C23.0001 16.1952 23 16.126 23 16.0619L23 16.0444V11.9556L23 11.9381C23 11.874 23.0001 11.8048 22.9956 11.7406C22.927 10.7614 22.111 10.0603 21.1884 10.0038ZM17.9706 15.0667C18.5554 15.0667 19.0294 14.5891 19.0294 14C19.0294 13.4109 18.5554 12.9333 17.9706 12.9333C17.3858 12.9333 16.9118 13.4109 16.9118 14C16.9118 14.5891 17.3858 15.0667 17.9706 15.0667Z" fill="currentColor" />
                                <path opacity="0.3" d="M21.1394 10.0015C21.1394 8.82091 21.0965 7.55447 20.3418 6.64658C20.2689 6.55894 20.1914 6.47384 20.1088 6.39124C19.3604 5.64288 18.4114 5.31076 17.239 5.15314C16.0998 4.99997 14.6442 4.99999 12.8064 5H10.6936C8.85583 4.99999 7.40019 4.99997 6.26098 5.15314C5.08856 5.31076 4.13961 5.64288 3.39124 6.39124C2.64288 7.13961 2.31076 8.08856 2.15314 9.26098C1.99997 10.4002 1.99999 11.8558 2 13.6936V13.8064C1.99999 15.6442 1.99997 17.0998 2.15314 18.239C2.31076 19.4114 2.64288 20.3604 3.39124 21.1088C4.13961 21.8571 5.08856 22.1892 6.26098 22.3469C7.40018 22.5 8.8558 22.5 10.6935 22.5H12.8064C14.6442 22.5 16.0998 22.5 17.239 22.3469C18.4114 22.1892 19.3604 21.8571 20.1088 21.1088C20.3133 20.9042 20.487 20.6844 20.6346 20.4486C21.0851 19.7291 21.1394 18.8473 21.1394 17.9985C21.0912 18 21.0404 18 20.9882 18L18.2149 18C15.9435 18 14 16.2639 14 14C14 11.7361 15.9435 10 18.2149 10L20.9881 10C21.0403 9.99999 21.0912 9.99997 21.1394 10.0015Z" fill="currentColor" />
                                <path d="M10.1015 2.57211L8 3.99253L6.26672 5.15237C7.40508 4.99997 8.85892 4.99999 10.6936 5H12.8064C14.6442 4.99998 16.0998 4.99997 17.239 5.15314C17.4682 5.18394 17.6888 5.22142 17.9011 5.26737L16 4L13.8875 2.57211C12.7589 1.8093 11.23 1.8093 10.1015 2.57211Z" fill="currentColor" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lightgray text-sm">Total Balance</h4>
                            <p class="font-bold text-lg mt-1.5">$5,240.21</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                    <div class="flex items-center gap-2.5 flex-wrap">
                        <div class="shrink-0 h-[50px] w-[50px] flex items-center justify-center bg-purple/10 rounded-full text-purple">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.75 7C5.33579 7 5 7.33579 5 7.75C5 8.16421 5.33579 8.5 5.75 8.5H9.75C10.1642 8.5 10.5 8.16421 10.5 7.75C10.5 7.33579 10.1642 7 9.75 7H5.75Z" fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1884 8.00377C21.1262 7.99995 21.0584 7.99998 20.9881 8L20.9706 8.00001H18.2149C15.9435 8.00001 14 9.73607 14 12C14 14.2639 15.9435 16 18.2149 16H20.9706L20.9881 16C21.0584 16 21.1262 16 21.1884 15.9962C22.111 15.9397 22.927 15.2386 22.9956 14.2594C23.0001 14.1952 23 14.126 23 14.0619L23 14.0444V9.95556L23 9.93815C23 9.874 23.0001 9.80479 22.9956 9.74058C22.927 8.76139 22.111 8.06034 21.1884 8.00377ZM17.9706 13.0667C18.5554 13.0667 19.0294 12.5891 19.0294 12C19.0294 11.4109 18.5554 10.9333 17.9706 10.9333C17.3858 10.9333 16.9118 11.4109 16.9118 12C16.9118 12.5891 17.3858 13.0667 17.9706 13.0667Z" fill="currentColor" />
                                <path opacity="0.5" d="M21.1394 8.00152C21.1394 6.82091 21.0965 5.55447 20.3418 4.64658C20.2689 4.55894 20.1914 4.47384 20.1088 4.39124C19.3604 3.64288 18.4114 3.31076 17.239 3.15314C16.0998 2.99997 14.6442 2.99999 12.8064 3H10.6936C8.85583 2.99999 7.40019 2.99997 6.26098 3.15314C5.08856 3.31076 4.13961 3.64288 3.39124 4.39124C2.64288 5.13961 2.31076 6.08856 2.15314 7.26098C1.99997 8.40019 1.99999 9.85581 2 11.6936V11.8064C1.99999 13.6442 1.99997 15.0998 2.15314 16.239C2.31076 17.4114 2.64288 18.3604 3.39124 19.1088C4.13961 19.8571 5.08856 20.1892 6.26098 20.3469C7.40018 20.5 8.8558 20.5 10.6935 20.5H12.8064C14.6442 20.5 16.0998 20.5 17.239 20.3469C18.4114 20.1892 19.3604 19.8571 20.1088 19.1088C20.3133 18.9042 20.487 18.6844 20.6346 18.4486C21.0851 17.7291 21.1394 16.8473 21.1394 15.9985C21.0912 16 21.0404 16 20.9882 16L18.2149 16C15.9435 16 14 14.2639 14 12C14 9.73607 15.9435 8.00001 18.2149 8.00001L20.9881 8.00001C21.0403 7.99999 21.0912 7.99997 21.1394 8.00152Z" fill="currentColor" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lightgray text-sm">Total Spending</h4>
                            <p class="font-bold text-lg mt-1.5">$250.80</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                    <div class="flex items-center gap-2.5 flex-wrap">
                        <div class="shrink-0 h-[50px] w-[50px] flex items-center justify-center bg-primary/10 rounded-full text-primary">
                            <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M2.50817 5.51787C2.50817 5.64573 2.55896 5.76835 2.64937 5.85876C2.73978 5.94916 2.86239 5.99996 2.99025 5.99996C3.11544 6.00013 3.23593 5.95225 3.32684 5.86618C3.41776 5.78011 3.47217 5.66243 3.47885 5.53742C3.53923 5.01793 3.77246 4.53382 4.14108 4.16284C4.5097 3.79185 4.99232 3.55553 5.5114 3.49183C5.64099 3.49183 5.76526 3.44035 5.85689 3.34872C5.94852 3.2571 6 3.13282 6 3.00324C6 2.87365 5.94852 2.74938 5.85689 2.65775C5.76526 2.56612 5.64099 2.51464 5.5114 2.51464C4.99284 2.46858 4.50663 2.2429 4.13673 1.87657C3.76682 1.51023 3.53644 1.02623 3.48536 0.50814C3.48799 0.442351 3.4773 0.376708 3.45393 0.315155C3.43056 0.253601 3.39499 0.197407 3.34935 0.149946C3.30372 0.102485 3.24896 0.0647374 3.18837 0.0389701C3.12778 0.0132028 3.06261 -5.25387e-05 2.99677 1.56497e-07C2.86718 1.56497e-07 2.74291 0.0514771 2.65128 0.143107C2.55965 0.234736 2.50817 0.359012 2.50817 0.488596C2.46243 1.01167 2.23342 1.50178 1.86154 1.87246C1.48967 2.24314 0.998827 2.47058 0.475611 2.51464C0.412302 2.51549 0.34978 2.5288 0.291616 2.55382C0.233452 2.57883 0.180785 2.61506 0.136623 2.66043C0.0924617 2.7058 0.0576703 2.75943 0.034236 2.81825C0.0108016 2.87707 -0.000816702 2.93993 4.46117e-05 3.00324C0.00173187 3.13229 0.0537505 3.25559 0.145017 3.34686C0.236283 3.43813 0.359581 3.49014 0.48864 3.49183C1.01375 3.52711 1.50812 3.75207 1.87967 4.12482C2.25121 4.49756 2.47458 4.99266 2.50817 5.51787Z" fill="currentColor"></path>
                                <path d="M9.50871 0.780269L8.02311 6.78004C7.99157 6.92762 7.99232 7.08078 8.02532 7.22801C8.05831 7.37523 8.12267 7.51268 8.21357 7.63001C8.3032 7.74602 8.41645 7.83948 8.54499 7.90351C8.67353 7.96753 8.8141 8.0005 8.95637 7.99999H17.051C17.1933 8.0005 17.3339 7.96753 17.4624 7.90351C17.591 7.83948 17.7042 7.74602 17.7938 7.63001C17.8831 7.51183 17.9457 7.37399 17.9771 7.2268C18.0084 7.0796 18.0076 6.92687 17.9748 6.78004L16.4987 0.780269C16.4503 0.554696 16.329 0.353699 16.1553 0.21149C15.9817 0.0692809 15.7665 -0.0053507 15.5464 0.00029872H10.442C10.2251 -0.000725666 10.0144 0.0760254 9.84465 0.217856C9.67494 0.359687 9.55643 0.558098 9.50871 0.780269Z" fill="currentColor"></path>
                                <path opacity="0.3" d="M25.5045 2.39504H25.19C24.7888 2.34051 24.4166 2.15598 24.1303 1.86971C23.844 1.58343 23.6595 1.21121 23.605 0.810043V0.495464C23.5769 0.355711 23.5013 0.229994 23.391 0.139674C23.2807 0.049353 23.1425 0 23 0C22.8575 0 22.7193 0.049353 22.609 0.139674C22.4987 0.229994 22.4231 0.355711 22.395 0.495464V0.810043C22.3405 1.21121 22.156 1.58343 21.8697 1.86971C21.5834 2.15598 21.2112 2.34051 20.81 2.39504H20.4955C20.3557 2.42313 20.23 2.49874 20.1397 2.60902C20.0494 2.7193 20 2.85745 20 3C20 3.14255 20.0494 3.2807 20.1397 3.39098C20.23 3.50126 20.3557 3.57687 20.4955 3.60496H20.81C21.2112 3.65948 21.5834 3.84402 21.8697 4.13029C22.156 4.41656 22.3405 4.78879 22.395 5.18996V5.50453C22.4231 5.64429 22.4987 5.77 22.609 5.86032C22.7193 5.95064 22.8575 6 23 6C23.1425 6 23.2807 5.95064 23.391 5.86032C23.5013 5.77 23.5769 5.64429 23.605 5.50453V5.18996C23.6595 4.78879 23.844 4.41656 24.1303 4.13029C24.4166 3.84402 24.7888 3.65948 25.19 3.60496H25.5045C25.6443 3.57687 25.77 3.50126 25.8603 3.39098C25.9506 3.2807 26 3.14255 26 3C26 2.85745 25.9506 2.7193 25.8603 2.60902C25.77 2.49874 25.6443 2.42313 25.5045 2.39504Z" fill="currentColor"></path>
                                <path d="M10.5111 10.7802C10.4628 10.5547 10.3417 10.3537 10.1684 10.2115C9.99506 10.0693 9.78027 9.99465 9.56055 10.0003H4.45635C4.23663 9.99465 4.02184 10.0693 3.84854 10.2115C3.67523 10.3537 3.55413 10.5547 3.50585 10.7802L2.02306 16.7798C1.99159 16.9274 1.99234 17.0805 2.02527 17.2278C2.05819 17.375 2.12244 17.5124 2.21316 17.6298C2.30462 17.7484 2.42071 17.8435 2.55253 17.9076C2.68434 17.9718 2.82837 18.0033 2.97356 17.9997H11.0528C11.1948 18.0002 11.3351 17.9673 11.4634 17.9032C11.5917 17.8392 11.7048 17.7458 11.7942 17.6298C11.8833 17.5116 11.9458 17.3737 11.9771 17.2266C12.0084 17.0794 12.0076 16.9266 11.9748 16.7798L10.5111 10.7802Z" fill="currentColor"></path>
                                <path d="M22.5111 10.7803C22.4628 10.5547 22.3417 10.3537 22.1684 10.2115C21.9951 10.0693 21.7803 9.99465 21.5605 10.0003H16.4563C16.2366 9.99465 16.0218 10.0693 15.8485 10.2115C15.6752 10.3537 15.5541 10.5547 15.5058 10.7803L14.0231 16.78C13.9916 16.9276 13.9923 17.0808 14.0253 17.228C14.0582 17.3752 14.1224 17.5127 14.2132 17.63C14.3026 17.746 14.4157 17.8395 14.544 17.9035C14.6723 17.9675 14.8126 18.0005 14.9546 18H23.0528C23.1948 18.0005 23.3351 17.9675 23.4634 17.9035C23.5917 17.8395 23.7048 17.746 23.7942 17.63C23.8833 17.5118 23.9458 17.374 23.9771 17.2268C24.0084 17.0796 24.0076 16.9269 23.9748 16.78L22.5111 10.7803Z" fill="currentColor"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-lightgray text-sm">Total Earnings</h4>
                            <p class="font-bold text-lg mt-1.5">$98,457.20</p>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-3 bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                    <h2 class="font-semibold mb-[30px]">Top Selling Categories</h2>
                    <div id="topsell"></div>
                </div>
            </div>
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg lg:col-span-2">
                <h2 class="font-semibold mb-[30px]">Stack Report</h2>
                <div class="overflow-auto">
                    <table class="min-w-[640px] w-full">
                        <thead>
                            <tr class="text-left">
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ASOS Ridley High Waist</td>
                                <td>$79.49</td>
                                <td>82</td>
                                <td>
                                    <span class="bg-warning text-white text-sm px-2.5 py-1 rounded-lg">In Progress</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Marco Lightweight Shirt</td>
                                <td>$128.50</td>
                                <td>37</td>
                                <td>
                                    <span class="bg-success text-white text-sm px-2.5 py-1 rounded-lg">Complete</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Half Sleeve Shirt</td>
                                <td>$39.99</td>
                                <td>64</td>
                                <td>
                                    <span class="bg-orange text-white text-sm px-2.5 py-1 rounded-lg">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Lightweight Jacket</td>
                                <td>$20.00</td>
                                <td>184</td>
                                <td>
                                    <span class="bg-success text-white text-sm px-2.5 py-1 rounded-lg">Complete</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Marco Shoes</td>
                                <td>$28.49</td>
                                <td>64</td>
                                <td>
                                    <span class="bg-orange text-white text-sm px-2.5 py-1 rounded-lg">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td>ASOS Ridley High Waist</td>
                                <td>$79.49</td>
                                <td>82</td>
                                <td>
                                    <span class="bg-warning text-white text-sm px-2.5 py-1 rounded-lg">In Progress</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

