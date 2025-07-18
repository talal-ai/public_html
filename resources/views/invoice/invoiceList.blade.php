@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 gap-5">
        <h2 class="text-base font-semibold mb-4">Billing & invoices</h2>
        <div class="flex items-center gap-5 justify-between flex-wrap">
            <ul class="flex items-center gap-2.5 flex-wrap">
                <li>
                    <a href="javascript:;" class="rounded-full text-sm/none font-semibold border-2 border-primary px-5 py-3.5 inline-block">All invoices</a>
                </li>
                <li>
                    <a href="javascript:;" class="rounded-full text-sm/none font-semibold border-2 border-gray/10 dark:hover:border-primary dark:hover:text-white hover:border-primary hover:text-black duration-300 dark:border-gray/20 text-gray px-5 py-3.5 inline-block">Open invoices</a>
                </li>
                <li>
                    <a href="javascript:;" class="rounded-full text-sm/none font-semibold border-2 border-gray/10 dark:hover:border-primary dark:hover:text-white hover:border-primary hover:text-black duration-300 dark:border-gray/20 text-gray px-5 py-3.5 inline-block">Post invoices</a>
                </li>
            </ul>
            <div class="flex items-center gap-5">
                <form class="w-full">
                    <div class="relative">
                        <input type="text" id="search" class="form-input ps-10 h-[42px] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 border-2 border-gray/10 bg-gray/[8%] rounded-full text-sm text-dark placeholder:text-lightgray/80 focus:ring-0 focus:border-primary/80 focus:outline-0" placeholder="Search..." required="">
                        <button type="button" class="absolute inset-y-0 left-3 flex items-center">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_87_857)">
                                    <circle cx="8.625" cy="8.625" r="7.125" stroke="#267DFF" stroke-width="2"></circle>
                                    <path opacity="0.3" d="M15 15L16.5 16.5" stroke="#267DFF" stroke-width="2" stroke-linecap="round"></path>
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
                <div class="shrink-0">
                    <select id="filter" class="form-select h-[42px] rounded-full border-none font-semibold text-xs">
                        <option>Last 7 days</option>
                        <option>Last 30 days</option>
                        <option>Last 90 days</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <div class="overflow-auto">
                <table class="min-w-[640px] w-full">
                    <thead>
                        <tr class="text-left">
                            <th>IDCustomer</th>
                            <th>Product</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Invoice Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#6532</td>
                            <td>Speed Force : Knit</td>
                            <td>12/04/2023</td>
                            <td>2</td>
                            <td>$215</td>
                            <td><span class="bg-success text-white font-bold text-xs py-2 px-3 rounded-full">Paid</span></td>
                        </tr>
                        <tr>
                            <td>#6523</td>
                            <td>Assorted Cross Bag</td>
                            <td>12/04/2023</td>
                            <td>3</td>
                            <td>$542</td>
                            <td><span class="bg-orange text-white font-bold text-xs py-2 px-3 rounded-full">Unpaid</span></td>
                        </tr>
                        <tr>
                            <td>#6523</td>
                            <td>Galaxy Hi-Tech Exclusive</td>
                            <td>12/04/2023</td>
                            <td>5</td>
                            <td>$980</td>
                            <td><span class="bg-primary text-white font-bold text-xs py-2 px-3 rounded-full">Done</span></td>
                        </tr>
                        <tr>
                            <td>#2345</td>
                            <td>Happy Days Wax Candle</td>
                            <td>12/04/2023</td>
                            <td>1</td>
                            <td>$1450</td>
                            <td><span class="bg-success text-white font-bold text-xs py-2 px-3 rounded-full">Paid</span></td>
                        </tr>
                        <tr>
                            <td>#3245</td>
                            <td>Assorted Cross Bag</td>
                            <td>12/04/2023</td>
                            <td>3</td>
                            <td>$542</td>
                            <td><span class="bg-orange text-white font-bold text-xs py-2 px-3 rounded-full">Unpaid</span></td>
                        </tr>
                        <tr>
                            <td>#6532</td>
                            <td>Speed Force : Knit</td>
                            <td>12/04/2023</td>
                            <td>2</td>
                            <td>$215</td>
                            <td><span class="bg-success text-white font-bold text-xs py-2 px-3 rounded-full">Paid</span></td>
                        </tr>
                        <tr>
                            <td>#6523</td>
                            <td>Assorted Cross Bag</td>
                            <td>12/04/2023</td>
                            <td>3</td>
                            <td>$542</td>
                            <td><span class="bg-orange text-white font-bold text-xs py-2 px-3 rounded-full">Unpaid</span></td>
                        </tr>
                        <tr>
                            <td>#6523</td>
                            <td>Galaxy Hi-Tech Exclusive</td>
                            <td>12/04/2023</td>
                            <td>5</td>
                            <td>$980</td>
                            <td><span class="bg-primary text-white font-bold text-xs py-2 px-3 rounded-full">Done</span></td>
                        </tr>
                        <tr>
                            <td>#2345</td>
                            <td>Happy Days Wax Candle</td>
                            <td>12/04/2023</td>
                            <td>1</td>
                            <td>$1450</td>
                            <td><span class="bg-success text-white font-bold text-xs py-2 px-3 rounded-full">Paid</span></td>
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
                            <path d="M7.29289 10.7071C7.68342 11.0976 8.31658 11.0976 8.70711 10.7071C9.09763 10.3166 9.09763 9.68342 8.70711 9.29289L5.41421 6L8.70711 2.70711C9.09763 2.31658 9.09763 1.68342 8.70711 1.29289C8.31658 0.902369 7.68342 0.902369 7.29289 1.29289L3.29289 5.29289C2.90237 5.68342 2.90237 6.31658 3.29289 6.70711L7.29289 10.7071Z" fill="currentColor"></path>
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
                            <path d="M4.70711 1.29289C4.31658 0.902369 3.68342 0.902369 3.29289 1.29289C2.90237 1.68342 2.90237 2.31658 3.29289 2.70711L6.58579 6L3.29289 9.29289C2.90237 9.68342 2.90237 10.3166 3.29289 10.7071C3.68342 11.0976 4.31658 11.0976 4.70711 10.7071L8.70711 6.70711C9.09763 6.31658 9.09763 5.68342 8.70711 5.29289L4.70711 1.29289Z" fill="currentColor"></path>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection
