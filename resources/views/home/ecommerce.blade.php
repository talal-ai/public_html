@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="font-semibold text-lightgray flex items-center gap-4 sm:gap-[30px] gap-y-4 whitespace-nowrap overflow-auto">
                <li>
                    <a href="{{ route('ecommerce') }}" class="text-dark dark:text-white duration-300">Overview</a>
                </li>
                <li>
                    <a href="{{ route('orderList') }}" class="hover:text-dark duration-300 dark:hover:text-white">Order List</a>
                </li>
                <li>
                    <a href="{{ route('accounts') }}" class="hover:text-dark duration-300 dark:hover:text-white">Accounts</a>
                </li>
                <li>
                    <a href="{{ route('payments') }}" class="hover:text-dark duration-300 dark:hover:text-white">Payments</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <div class="flex items-center gap-2.5 flex-wrap">
                <div class="shrink-0 h-[50px] w-[50px] flex items-center justify-center bg-primary/10 rounded-full text-primary">
                    <svg width="26" height="18" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M2.50817 5.51787C2.50817 5.64573 2.55896 5.76835 2.64937 5.85876C2.73978 5.94916 2.86239 5.99996 2.99025 5.99996C3.11544 6.00013 3.23593 5.95225 3.32684 5.86618C3.41776 5.78011 3.47217 5.66243 3.47885 5.53742C3.53923 5.01793 3.77246 4.53382 4.14108 4.16284C4.5097 3.79185 4.99232 3.55553 5.5114 3.49183C5.64099 3.49183 5.76526 3.44035 5.85689 3.34872C5.94852 3.2571 6 3.13282 6 3.00324C6 2.87365 5.94852 2.74938 5.85689 2.65775C5.76526 2.56612 5.64099 2.51464 5.5114 2.51464C4.99284 2.46858 4.50663 2.2429 4.13673 1.87657C3.76682 1.51023 3.53644 1.02623 3.48536 0.50814C3.48799 0.442351 3.4773 0.376708 3.45393 0.315155C3.43056 0.253601 3.39499 0.197407 3.34935 0.149946C3.30372 0.102485 3.24896 0.0647374 3.18837 0.0389701C3.12778 0.0132028 3.06261 -5.25387e-05 2.99677 1.56497e-07C2.86718 1.56497e-07 2.74291 0.0514771 2.65128 0.143107C2.55965 0.234736 2.50817 0.359012 2.50817 0.488596C2.46243 1.01167 2.23342 1.50178 1.86154 1.87246C1.48967 2.24314 0.998827 2.47058 0.475611 2.51464C0.412302 2.51549 0.34978 2.5288 0.291616 2.55382C0.233452 2.57883 0.180785 2.61506 0.136623 2.66043C0.0924617 2.7058 0.0576703 2.75943 0.034236 2.81825C0.0108016 2.87707 -0.000816702 2.93993 4.46117e-05 3.00324C0.00173187 3.13229 0.0537505 3.25559 0.145017 3.34686C0.236283 3.43813 0.359581 3.49014 0.48864 3.49183C1.01375 3.52711 1.50812 3.75207 1.87967 4.12482C2.25121 4.49756 2.47458 4.99266 2.50817 5.51787Z" fill="currentColor" />
                        <path d="M9.50871 0.780269L8.02311 6.78004C7.99157 6.92762 7.99232 7.08078 8.02532 7.22801C8.05831 7.37523 8.12267 7.51268 8.21357 7.63001C8.3032 7.74602 8.41645 7.83948 8.54499 7.90351C8.67353 7.96753 8.8141 8.0005 8.95637 7.99999H17.051C17.1933 8.0005 17.3339 7.96753 17.4624 7.90351C17.591 7.83948 17.7042 7.74602 17.7938 7.63001C17.8831 7.51183 17.9457 7.37399 17.9771 7.2268C18.0084 7.0796 18.0076 6.92687 17.9748 6.78004L16.4987 0.780269C16.4503 0.554696 16.329 0.353699 16.1553 0.21149C15.9817 0.0692809 15.7665 -0.0053507 15.5464 0.00029872H10.442C10.2251 -0.000725666 10.0144 0.0760254 9.84465 0.217856C9.67494 0.359687 9.55643 0.558098 9.50871 0.780269Z" fill="currentColor" />
                        <path opacity="0.3" d="M25.5045 2.39504H25.19C24.7888 2.34051 24.4166 2.15598 24.1303 1.86971C23.844 1.58343 23.6595 1.21121 23.605 0.810043V0.495464C23.5769 0.355711 23.5013 0.229994 23.391 0.139674C23.2807 0.049353 23.1425 0 23 0C22.8575 0 22.7193 0.049353 22.609 0.139674C22.4987 0.229994 22.4231 0.355711 22.395 0.495464V0.810043C22.3405 1.21121 22.156 1.58343 21.8697 1.86971C21.5834 2.15598 21.2112 2.34051 20.81 2.39504H20.4955C20.3557 2.42313 20.23 2.49874 20.1397 2.60902C20.0494 2.7193 20 2.85745 20 3C20 3.14255 20.0494 3.2807 20.1397 3.39098C20.23 3.50126 20.3557 3.57687 20.4955 3.60496H20.81C21.2112 3.65948 21.5834 3.84402 21.8697 4.13029C22.156 4.41656 22.3405 4.78879 22.395 5.18996V5.50453C22.4231 5.64429 22.4987 5.77 22.609 5.86032C22.7193 5.95064 22.8575 6 23 6C23.1425 6 23.2807 5.95064 23.391 5.86032C23.5013 5.77 23.5769 5.64429 23.605 5.50453V5.18996C23.6595 4.78879 23.844 4.41656 24.1303 4.13029C24.4166 3.84402 24.7888 3.65948 25.19 3.60496H25.5045C25.6443 3.57687 25.77 3.50126 25.8603 3.39098C25.9506 3.2807 26 3.14255 26 3C26 2.85745 25.9506 2.7193 25.8603 2.60902C25.77 2.49874 25.6443 2.42313 25.5045 2.39504Z" fill="currentColor" />
                        <path d="M10.5111 10.7802C10.4628 10.5547 10.3417 10.3537 10.1684 10.2115C9.99506 10.0693 9.78027 9.99465 9.56055 10.0003H4.45635C4.23663 9.99465 4.02184 10.0693 3.84854 10.2115C3.67523 10.3537 3.55413 10.5547 3.50585 10.7802L2.02306 16.7798C1.99159 16.9274 1.99234 17.0805 2.02527 17.2278C2.05819 17.375 2.12244 17.5124 2.21316 17.6298C2.30462 17.7484 2.42071 17.8435 2.55253 17.9076C2.68434 17.9718 2.82837 18.0033 2.97356 17.9997H11.0528C11.1948 18.0002 11.3351 17.9673 11.4634 17.9032C11.5917 17.8392 11.7048 17.7458 11.7942 17.6298C11.8833 17.5116 11.9458 17.3737 11.9771 17.2266C12.0084 17.0794 12.0076 16.9266 11.9748 16.7798L10.5111 10.7802Z" fill="currentColor" />
                        <path d="M22.5111 10.7803C22.4628 10.5547 22.3417 10.3537 22.1684 10.2115C21.9951 10.0693 21.7803 9.99465 21.5605 10.0003H16.4563C16.2366 9.99465 16.0218 10.0693 15.8485 10.2115C15.6752 10.3537 15.5541 10.5547 15.5058 10.7803L14.0231 16.78C13.9916 16.9276 13.9923 17.0808 14.0253 17.228C14.0582 17.3752 14.1224 17.5127 14.2132 17.63C14.3026 17.746 14.4157 17.8395 14.544 17.9035C14.6723 17.9675 14.8126 18.0005 14.9546 18H23.0528C23.1948 18.0005 23.3351 17.9675 23.4634 17.9035C23.5917 17.8395 23.7048 17.746 23.7942 17.63C23.8833 17.5118 23.9458 17.374 23.9771 17.2268C24.0084 17.0796 24.0076 16.9269 23.9748 16.78L22.5111 10.7803Z" fill="currentColor" />
                    </svg>
                </div>
                <div class="flex items-end gap-3">
                    <div class="flex-1">
                        <h4 class="text-lightgray text-sm">Total Earnings</h4>
                        <p class="font-bold text-lg mt-1.5">$98,457.20</p>
                    </div>
                    <div>
                        <span class="flex items-center text-gray bg-gray/10 rounded-full py-1 px-2 gap-1 text-xs font-semibold">3.47%
                            <svg width="10" height="10" class="inline-block" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.73684 9.21053C5.73684 9.64654 5.38338 10 4.94737 10C4.51135 10 4.15789 9.64654 4.15789 9.21053L4.15789 2.69543L2.34772 4.50561C2.03941 4.81392 1.53954 4.81392 1.23123 4.50561C0.922923 4.1973 0.922923 3.69743 1.23123 3.38913L4.38913 0.231232C4.53718 0.0831764 4.73799 -1.83028e-08 4.94737 0C5.15675 1.83066e-08 5.35756 0.0831765 5.50561 0.231232L8.66351 3.38913C8.97181 3.69743 8.97181 4.1973 8.66351 4.50561C8.3552 4.81392 7.85533 4.81392 7.54702 4.50561L5.73684 2.69543V9.21053Z" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <div class="flex items-center gap-2.5 flex-wrap">
                <div class="shrink-0 h-[50px] w-[50px] flex items-center justify-center bg-pink/10 rounded-full text-pink">
                    <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M8.875 15C11.5674 15 13.75 12.8174 13.75 10.125C13.75 7.43261 11.5674 5.25 8.875 5.25C6.18261 5.25 4 7.43261 4 10.125C4 12.8174 6.18261 15 8.875 15Z" fill="currentColor" />
                        <path d="M1.95905 18.75C2.70819 17.5982 3.73317 16.6517 4.94092 15.9965C6.14867 15.3412 7.50095 14.998 8.87498 14.998C10.249 14.998 11.6013 15.3412 12.809 15.9965C14.0168 16.6517 15.0418 17.5982 15.7909 18.75" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path opacity="0.3" d="M17.125 15C18.499 14.9992 19.8513 15.3418 21.0592 15.9967C22.267 16.6517 23.292 17.5981 24.0409 18.75" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M8.875 15C11.5674 15 13.75 12.8174 13.75 10.125C13.75 7.43261 11.5674 5.25 8.875 5.25C6.18261 5.25 4 7.43261 4 10.125C4 12.8174 6.18261 15 8.875 15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path opacity="0.3" d="M15.3147 5.59687C15.9816 5.3309 16.6989 5.2155 17.4156 5.25893C18.1322 5.30235 18.8304 5.50352 19.4602 5.84806C20.0901 6.19261 20.6361 6.67202 21.0592 7.25204C21.4823 7.83206 21.7721 8.49838 21.9078 9.20338C22.0435 9.90837 22.0219 10.6346 21.8444 11.3303C21.6669 12.026 21.3379 12.6738 20.881 13.2276C20.4241 13.7814 19.8505 14.2274 19.2012 14.5338C18.5519 14.8402 17.843 14.9994 17.125 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="flex items-end gap-3">
                    <div class="flex-1">
                        <h4 class="text-lightgray text-sm">Customers</h4>
                        <p class="font-bold text-lg mt-1.5">$2,982.54</p>
                    </div>
                    <div>
                        <span class="flex items-center text-gray bg-gray/10 rounded-full py-1 px-2 gap-1 text-xs font-semibold">9.69%
                            <svg width="10" height="10" class="inline-block" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.73684 9.21053C5.73684 9.64654 5.38338 10 4.94737 10C4.51135 10 4.15789 9.64654 4.15789 9.21053L4.15789 2.69543L2.34772 4.50561C2.03941 4.81392 1.53954 4.81392 1.23123 4.50561C0.922923 4.1973 0.922923 3.69743 1.23123 3.38913L4.38913 0.231232C4.53718 0.0831764 4.73799 -1.83028e-08 4.94737 0C5.15675 1.83066e-08 5.35756 0.0831765 5.50561 0.231232L8.66351 3.38913C8.97181 3.69743 8.97181 4.1973 8.66351 4.50561C8.3552 4.81392 7.85533 4.81392 7.54702 4.50561L5.73684 2.69543V9.21053Z" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <div class="flex items-center gap-2.5 flex-wrap">
                <div class="shrink-0 h-[50px] w-[50px] flex items-center justify-center bg-orange/10 rounded-full text-orange">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.42229 20.6181C10.1779 21.5395 11.0557 22.0001 12 22.0001V12.0001L2.63802 7.07275C2.62423 7.09491 2.6107 7.11727 2.5974 7.13986C2 8.15436 2 9.41678 2 11.9416V12.0586C2 14.5834 2 15.8459 2.5974 16.8604C3.19479 17.8749 4.27063 18.4395 6.42229 19.5686L8.42229 20.6181Z" fill="currentColor" />
                        <path opacity="0.5" d="M17.5774 4.43152L15.5774 3.38197C13.8218 2.46066 12.944 2 11.9997 2C11.0554 2 10.1776 2.46066 8.42197 3.38197L6.42197 4.43152C4.31821 5.53552 3.24291 6.09982 2.6377 7.07264L11.9997 12L21.3617 7.07264C20.7564 6.09982 19.6811 5.53552 17.5774 4.43152Z" fill="currentColor" />
                        <path opacity="0.3" d="M21.4026 7.13986C21.3893 7.11727 21.3758 7.09491 21.362 7.07275L12 12.0001V22.0001C12.9443 22.0001 13.8221 21.5395 15.5777 20.6181L17.5777 19.5686C19.7294 18.4395 20.8052 17.8749 21.4026 16.8604C22 15.8459 22 14.5834 22 12.0586V11.9416C22 9.41678 22 8.15436 21.4026 7.13986Z" fill="currentColor" />
                        <path d="M6.32334 4.48382C6.35617 4.46658 6.38926 4.44922 6.42261 4.43172L7.91614 3.64795L17.0169 8.65338L21.0406 6.64152C21.1783 6.79745 21.298 6.96175 21.4029 7.13994C21.5525 7.39396 21.6646 7.66352 21.7487 7.96455L17.7503 9.96373V13.0002C17.7503 13.4144 17.4145 13.7502 17.0003 13.7502C16.5861 13.7502 16.2503 13.4144 16.2503 13.0002V10.7137L12.7503 12.4637V21.9042C12.4934 21.9682 12.2492 22.0002 12.0003 22.0002C11.7515 22.0002 11.5072 21.9682 11.2503 21.9042V12.4637L2.25195 7.96455C2.33601 7.66352 2.44813 7.39396 2.59771 7.13994C2.70264 6.96175 2.82232 6.79745 2.96001 6.64152L12.0003 11.1617L15.3865 9.46857L6.32334 4.48382Z" fill="currentColor" />
                    </svg>
                </div>
                <div class="flex items-end gap-3">
                    <div class="flex-1">
                        <h4 class="text-lightgray text-sm">Orders</h4>
                        <p class="font-bold text-lg mt-1.5">48982.54</p>
                    </div>
                    <div>
                        <span class="flex items-center text-gray bg-gray/10 rounded-full py-1 px-2 gap-1 text-xs font-semibold">2.58%
                            <svg width="10" height="10" class="inline-block rotate-180" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.73684 9.21053C5.73684 9.64654 5.38338 10 4.94737 10C4.51135 10 4.15789 9.64654 4.15789 9.21053L4.15789 2.69543L2.34772 4.50561C2.03941 4.81392 1.53954 4.81392 1.23123 4.50561C0.922923 4.1973 0.922923 3.69743 1.23123 3.38913L4.38913 0.231232C4.53718 0.0831764 4.73799 -1.83028e-08 4.94737 0C5.15675 1.83066e-08 5.35756 0.0831765 5.50561 0.231232L8.66351 3.38913C8.97181 3.69743 8.97181 4.1973 8.66351 4.50561C8.3552 4.81392 7.85533 4.81392 7.54702 4.50561L5.73684 2.69543V9.21053Z" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <div class="flex items-center gap-2.5 flex-wrap">
                <div class="shrink-0 h-[50px] w-[50px] flex items-center justify-center bg-purple/10 rounded-full text-purple">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.8916 9.61431C4.8916 9.21193 5.21525 8.88574 5.61449 8.88574H9.46991C9.86916 8.88574 10.1928 9.21193 10.1928 9.61431C10.1928 10.0167 9.86916 10.3429 9.46991 10.3429H5.61449C5.21525 10.3429 4.8916 10.0167 4.8916 9.61431Z" fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.1884 10.0038C21.1262 9.99995 21.0584 9.99998 20.9881 10L20.9706 10H18.2149C15.9435 10 14 11.7361 14 14C14 16.2639 15.9435 18 18.2149 18H20.9706L20.9881 18C21.0584 18 21.1262 18 21.1884 17.9962C22.111 17.9397 22.927 17.2386 22.9956 16.2594C23.0001 16.1952 23 16.126 23 16.0619L23 16.0444V11.9556L23 11.9381C23 11.874 23.0001 11.8048 22.9956 11.7406C22.927 10.7614 22.111 10.0603 21.1884 10.0038ZM17.9706 15.0667C18.5554 15.0667 19.0294 14.5891 19.0294 14C19.0294 13.4109 18.5554 12.9333 17.9706 12.9333C17.3858 12.9333 16.9118 13.4109 16.9118 14C16.9118 14.5891 17.3858 15.0667 17.9706 15.0667Z" fill="currentColor" />
                        <path opacity="0.3" d="M21.1394 10.0015C21.1394 8.82091 21.0965 7.55447 20.3418 6.64658C20.2689 6.55894 20.1914 6.47384 20.1088 6.39124C19.3604 5.64288 18.4114 5.31076 17.239 5.15314C16.0998 4.99997 14.6442 4.99999 12.8064 5H10.6936C8.85583 4.99999 7.40019 4.99997 6.26098 5.15314C5.08856 5.31076 4.13961 5.64288 3.39124 6.39124C2.64288 7.13961 2.31076 8.08856 2.15314 9.26098C1.99997 10.4002 1.99999 11.8558 2 13.6936V13.8064C1.99999 15.6442 1.99997 17.0998 2.15314 18.239C2.31076 19.4114 2.64288 20.3604 3.39124 21.1088C4.13961 21.8571 5.08856 22.1892 6.26098 22.3469C7.40018 22.5 8.8558 22.5 10.6935 22.5H12.8064C14.6442 22.5 16.0998 22.5 17.239 22.3469C18.4114 22.1892 19.3604 21.8571 20.1088 21.1088C20.3133 20.9042 20.487 20.6844 20.6346 20.4486C21.0851 19.7291 21.1394 18.8473 21.1394 17.9985C21.0912 18 21.0404 18 20.9882 18L18.2149 18C15.9435 18 14 16.2639 14 14C14 11.7361 15.9435 10 18.2149 10L20.9881 10C21.0403 9.99999 21.0912 9.99997 21.1394 10.0015Z" fill="currentColor" />
                        <path d="M10.1015 2.57211L8 3.99253L6.26672 5.15237C7.40508 4.99997 8.85892 4.99999 10.6936 5H12.8064C14.6442 4.99998 16.0998 4.99997 17.239 5.15314C17.4682 5.18394 17.6888 5.22142 17.9011 5.26737L16 4L13.8875 2.57211C12.7589 1.8093 11.23 1.8093 10.1015 2.57211Z" fill="currentColor" />
                    </svg>
                </div>
                <div class="flex items-end gap-3">
                    <div class="flex-1">
                        <h4 class="text-lightgray text-sm">Available Balance</h4>
                        <p class="font-bold text-lg mt-1.5">$98,457.20</p>
                    </div>
                    <div>
                        <span class="flex items-center text-gray bg-gray/10 rounded-full py-1 px-2 gap-1 text-xs font-semibold">4.23%
                            <svg width="10" height="10" class="inline-block" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.73684 9.21053C5.73684 9.64654 5.38338 10 4.94737 10C4.51135 10 4.15789 9.64654 4.15789 9.21053L4.15789 2.69543L2.34772 4.50561C2.03941 4.81392 1.53954 4.81392 1.23123 4.50561C0.922923 4.1973 0.922923 3.69743 1.23123 3.38913L4.38913 0.231232C4.53718 0.0831764 4.73799 -1.83028e-08 4.94737 0C5.15675 1.83066e-08 5.35756 0.0831765 5.50561 0.231232L8.66351 3.38913C8.97181 3.69743 8.97181 4.1973 8.66351 4.50561C8.3552 4.81392 7.85533 4.81392 7.54702 4.50561L5.73684 2.69543V9.21053Z" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <div class="mb-[30px] flex items-center flex-wrap">
                <h2 class="flex-1 font-semibold">Working Capital</h2>
                <div>
                    <select id="selectDays" class="form-select h-8 rounded-full border-none font-semibold text-xs">
                        <option>Last 7 days</option>
                        <option>Last 30 days</option>
                        <option>Last 90 days</option>
                    </select>
                </div>
            </div>
            <div id="capital"></div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="mb-[30px] font-semibold">Project vs Action</h2>
            <div id="projectvsaction"></div>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="mb-[30px] font-semibold">Order List</h2>
            <div class="overflow-auto">
                <table class="min-w-[640px] w-full product-table">
                    <thead>
                        <tr class="text-left">
                            <th>No</th>
                            <th>IDCustomer</th>
                            <th>Product</th>
                            <th>Customers</th>
                            <th>Location</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>#6545</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('assets/images/product/1.png') }}" class="w-[50px] rounded-full" alt="">
                                    <div class="flex-1 max-w-[200px] truncate">
                                        <p class="line-clamp-1 truncate">Speed Force : Knit</p>
                                        <p class="text-gray">Women</p>
                                    </div>
                                </div>
                            </td>
                            <td>Ronald Richards</td>
                            <td>Celina, Delaware 10299</td>
                            <td>2</td>
                            <td><span class="bg-success text-white font-bold text-xs py-2 px-3 rounded-full">Paid</span></td>
                            <td>$215</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>#5412</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('assets/images/product/2.png') }}" class="w-[50px] rounded-full" alt="">
                                    <div class="flex-1 max-w-[200px] truncate">
                                        <p class="line-clamp-1 truncate">Assorted Cross Bag</p>
                                        <p class="text-gray">Men</p>
                                    </div>
                                </div>
                            </td>
                            <td>Marvin McKinney</td>
                            <td>Cir. Syracuse, Connecticut 35624</td>
                            <td>3</td>
                            <td><span class="bg-orange text-white font-bold text-xs py-2 px-3 rounded-full">Unpaid</span></td>
                            <td>$542</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>#6622</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('assets/images/product/3.png') }}" class="w-[50px] rounded-full" alt="">
                                    <div class="flex-1 max-w-[200px] truncate">
                                        <p class="line-clamp-1 truncate">Galaxy Hi-Tech Exclusive</p>
                                        <p class="text-gray">Children</p>
                                    </div>
                                </div>
                            </td>
                            <td>Jane Cooper</td>
                            <td>New Jersey 45463</td>
                            <td>5</td>
                            <td><span class="bg-primary text-white font-bold text-xs py-2 px-3 rounded-full">Done</span></td>
                            <td>$980</td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>#6425</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('assets/images/product/4.png') }}" class="w-[50px] rounded-full" alt="">
                                    <div class="flex-1 max-w-[200px] truncate">
                                        <p class="line-clamp-1 truncate">Happy Days Wax Candle</p>
                                        <p class="text-gray">Women</p>
                                    </div>
                                </div>
                            </td>
                            <td>Cameron Williamson</td>
                            <td>Pennsylvania 57867</td>
                            <td>1</td>
                            <td><span class="bg-success text-white font-bold text-xs py-2 px-3 rounded-full">Paid</span></td>
                            <td>$1450</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

    <!-- ApexCharts js -->
    <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/apex-ecom.js') }}"></script>

@endsection