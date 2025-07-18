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
                    <a href="{{ route('orderList') }}" class="text-dark dark:text-white duration-300">Order List</a>
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
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
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
                                    <img src="{{ asset('public/assets/images/product/1.png') }}" class="w-[50px] rounded-full" alt="">
                                    <div>
                                        <p>Speed Force : Knit</p>
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
                                    <img src="{{ asset('public/assets/images/product/2.png') }}" class="w-[50px] rounded-full" alt="">
                                    <div>
                                        <p>Assorted Cross Bag</p>
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
                                    <img src="{{ asset('public/assets/images/product/3.png') }}" class="w-[50px] rounded-full" alt="">
                                    <div>
                                        <p>Galaxy Hi-Tech Exclusive</p>
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
                                    <img src="{{ asset('public/assets/images/product/4.png') }}" class="w-[50px] rounded-full" alt="">
                                    <div>
                                        <p>Happy Days Wax Candle</p>
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
                        <tr>
                            <td>5.</td>
                            <td>#6545</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('public/assets/images/product/1.png') }}" class="w-[50px] rounded-full" alt="">
                                    <div>
                                        <p>Speed Force : Knit</p>
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
                            <td>6.</td>
                            <td>#5412</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('public/assets/images/product/2.png') }}" class="w-[50px] rounded-full" alt="">
                                    <div>
                                        <p>Assorted Cross Bag</p>
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
                            <td>7.</td>
                            <td>#6622</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('public/assets/images/product/3.png') }}" class="w-[50px] rounded-full" alt="">
                                    <div>
                                        <p>Galaxy Hi-Tech Exclusive</p>
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
                            <td>8.</td>
                            <td>#6425</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('public/assets/images/product/4.png') }}" class="w-[50px] rounded-full" alt="">
                                    <div>
                                        <p>Happy Days Wax Candle</p>
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
                        <tr>
                            <td>9.</td>
                            <td>#6545</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('public/assets/images/product/1.png') }}" class="w-[50px] rounded-full" alt="">
                                    <div>
                                        <p>Speed Force : Knit</p>
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
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <ul class="flex items-center gap-1 justify-end">
                <li>
                    <a href="javascript:;" class="text-primary flex items-center justify-center hover:bg-dark/10 dark:hover:bg-white/10 w-7 h-7 rounded-md">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.29289 10.7071C7.68342 11.0976 8.31658 11.0976 8.70711 10.7071C9.09763 10.3166 9.09763 9.68342 8.70711 9.29289L5.41421 6L8.70711 2.70711C9.09763 2.31658 9.09763 1.68342 8.70711 1.29289C8.31658 0.902369 7.68342 0.902369 7.29289 1.29289L3.29289 5.29289C2.90237 5.68342 2.90237 6.31658 3.29289 6.70711L7.29289 10.7071Z" fill="currentColor" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="flex items-center justify-center bg-dark/10 dark:bg-white/10 w-7 h-7 rounded-md duration-300">1</a>
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
                            <path d="M4.70711 1.29289C4.31658 0.902369 3.68342 0.902369 3.29289 1.29289C2.90237 1.68342 2.90237 2.31658 3.29289 2.70711L6.58579 6L3.29289 9.29289C2.90237 9.68342 2.90237 10.3166 3.29289 10.7071C3.68342 11.0976 4.31658 11.0976 4.70711 10.7071L8.70711 6.70711C9.09763 6.31658 9.09763 5.68342 8.70711 5.29289L4.70711 1.29289Z" fill="currentColor" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection