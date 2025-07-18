@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Tables</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z" fill="currentColor" />
                    </svg>
                </li>
                <li>Basic Table</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Table Full Width</h2>
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
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Table With Checkbox</h2>
            <div class="overflow-auto">
                <table class="min-w-[640px] w-full product-table">
                    <thead>
                        <tr class="text-left">
                            <th>
                                <input type="checkbox" id="chk1" class="form-checkbox">
                            </th>
                            <th>
                                Website
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor"></path>
                                </svg>
                            </th>
                            <th>
                                Asset Name
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor"></path>
                                </svg>
                            </th>
                            <th>
                                Status
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor"></path>
                                </svg>
                            </th>
                            <th>
                                Categories
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor"></path>
                                </svg>
                            </th>
                            <th>
                                Tags
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor"></path>
                                </svg>
                            </th>
                            <th>
                                Date
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor"></path>
                                </svg>
                            </th>
                            <th>
                                Country
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor"></path>
                                </svg>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-left">
                            <td>
                                <input type="checkbox" id="chk2" class="form-checkbox">
                            </td>
                            <td>Google</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('assets/images/assets/1.png') }}" class="w-[50px] rounded-full" alt="">
                                    <p class="line-clamp-1 max-w-[200px] truncate">Abstract Element</p>
                                </div>
                            </td>
                            <td><span class="bg-primary text-white font-bold text-sm py-1.5 px-3 rounded-full">Private</span></td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.5 11.202L11 13.535V17.131L17.197 13L14.5 11.202ZM12.697 10L10 8.202L7.303 10L10 11.798L12.697 10ZM18 8.869L16.303 10L18 11.131V8.87V8.869ZM17.197 7L11 2.869V6.465L14.5 8.798L17.197 7ZM5.5 8.798L9 6.465V2.869L2.803 7L5.5 8.798ZM2.803 13L9 17.131V13.535L5.5 11.202L2.803 13ZM2 11.131L3.697 10L2 8.869V11.131ZM1.11994e-08 7C-2.46193e-05 6.8354 0.0405779 6.67335 0.118205 6.52821C0.195832 6.38308 0.308084 6.25935 0.445 6.168L9.445 0.167997C9.60933 0.058358 9.80245 -0.000152588 10 -0.000152588C10.1975 -0.000152588 10.3907 0.058358 10.555 0.167997L19.555 6.168C19.6919 6.25935 19.8042 6.38308 19.8818 6.52821C19.9594 6.67335 20 6.8354 20 7V13C20 13.1646 19.9594 13.3266 19.8818 13.4718C19.8042 13.6169 19.6919 13.7406 19.555 13.832L10.555 19.832C10.3907 19.9416 10.1975 20.0001 10 20.0001C9.80245 20.0001 9.60933 19.9416 9.445 19.832L0.445 13.832C0.308084 13.7406 0.195832 13.6169 0.118205 13.4718C0.0405779 13.3266 -2.46193e-05 13.1646 1.11994e-08 13V7Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">3D Elements</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.5 9C1.5 10.2295 1.81872 10.6436 2.45617 11.4718C3.72897 13.1253 5.86359 15 9 15C12.1364 15 14.271 13.1253 15.5438 11.4718C16.1813 10.6436 16.5 10.2295 16.5 9C16.5 7.77047 16.1813 7.35639 15.5438 6.52825C14.271 4.87467 12.1364 3 9 3C5.86359 3 3.72897 4.87467 2.45617 6.52825C1.81872 7.3564 1.5 7.77047 1.5 9Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.1875 9C6.1875 7.4467 7.4467 6.1875 9 6.1875C10.5533 6.1875 11.8125 7.4467 11.8125 9C11.8125 10.5533 10.5533 11.8125 9 11.8125C7.4467 11.8125 6.1875 10.5533 6.1875 9ZM7.3125 9C7.3125 8.06802 8.06802 7.3125 9 7.3125C9.93198 7.3125 10.6875 8.06802 10.6875 9C10.6875 9.93198 9.93198 10.6875 9 10.6875C8.06802 10.6875 7.3125 9.93198 7.3125 9Z" fill="currentColor"></path>
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
                                <input type="checkbox"  id="chk3" class="form-checkbox">
                            </td>
                            <td>Amazon</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('assets/images/assets/2.png') }}" class="w-[50px] rounded-full" alt="">
                                    <p class="line-clamp-1 max-w-[200px] truncate">Abstract Minimalist Character</p>
                                </div>
                            </td>
                            <td><span class="bg-success text-white font-bold text-sm py-1.5 px-3 rounded-full">Public</span></td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.828 18L2.808 18.02L2.787 18H0.992C0.728813 17.9997 0.476497 17.895 0.290489 17.7088C0.104482 17.5226 -1.33455e-07 17.2702 0 17.007V0.993C0.00183004 0.730378 0.1069 0.479017 0.292513 0.293218C0.478126 0.107418 0.72938 0.00209465 0.992 0H19.008C19.556 0 20 0.445 20 0.993V17.007C19.9982 17.2696 19.8931 17.521 19.7075 17.7068C19.5219 17.8926 19.2706 17.9979 19.008 18H2.828ZM18 12V2H2V16L12 6L18 12ZM18 14.828L12 8.828L4.828 16H18V14.828ZM6 8C5.46957 8 4.96086 7.78929 4.58579 7.41421C4.21071 7.03914 4 6.53043 4 6C4 5.46957 4.21071 4.96086 4.58579 4.58579C4.96086 4.21071 5.46957 4 6 4C6.53043 4 7.03914 4.21071 7.41421 4.58579C7.78929 4.96086 8 5.46957 8 6C8 6.53043 7.78929 7.03914 7.41421 7.41421C7.03914 7.78929 6.53043 8 6 8Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">Images</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.5 9C1.5 10.2295 1.81872 10.6436 2.45617 11.4718C3.72897 13.1253 5.86359 15 9 15C12.1364 15 14.271 13.1253 15.5438 11.4718C16.1813 10.6436 16.5 10.2295 16.5 9C16.5 7.77047 16.1813 7.35639 15.5438 6.52825C14.271 4.87467 12.1364 3 9 3C5.86359 3 3.72897 4.87467 2.45617 6.52825C1.81872 7.3564 1.5 7.77047 1.5 9Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.1875 9C6.1875 7.4467 7.4467 6.1875 9 6.1875C10.5533 6.1875 11.8125 7.4467 11.8125 9C11.8125 10.5533 10.5533 11.8125 9 11.8125C7.4467 11.8125 6.1875 10.5533 6.1875 9ZM7.3125 9C7.3125 8.06802 8.06802 7.3125 9 7.3125C9.93198 7.3125 10.6875 8.06802 10.6875 9C10.6875 9.93198 9.93198 10.6875 9 10.6875C8.06802 10.6875 7.3125 9.93198 7.3125 9Z" fill="currentColor"></path>
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
                                <input type="checkbox" id="chk4" class="form-checkbox">
                            </td>
                            <td>Facebook</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('assets/images/assets/3.png') }}" class="w-[50px] rounded-full" alt="">
                                    <p class="line-clamp-1 max-w-[200px] truncate">Assets Name</p>
                                </div>
                            </td>
                            <td><span class="bg-primary text-white font-bold text-sm py-1.5 px-3 rounded-full">Private</span></td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray">
                                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.00001 10.535V0H14V3H8.00001V14C7.99981 14.8805 7.70909 15.7363 7.17294 16.4348C6.63679 17.1332 5.88517 17.6352 5.03463 17.863C4.1841 18.0907 3.28218 18.0315 2.46875 17.6944C1.65533 17.3573 0.975843 16.7613 0.53568 15.9987C0.0955161 15.2361 -0.0807315 14.3496 0.0342702 13.4767C0.149272 12.6037 0.549096 11.7931 1.17174 11.1705C1.79438 10.5479 2.60504 10.1482 3.47801 10.0333C4.35098 9.9184 5.23747 10.0948 6.00001 10.535Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">Music</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.5 9C1.5 10.2295 1.81872 10.6436 2.45617 11.4718C3.72897 13.1253 5.86359 15 9 15C12.1364 15 14.271 13.1253 15.5438 11.4718C16.1813 10.6436 16.5 10.2295 16.5 9C16.5 7.77047 16.1813 7.35639 15.5438 6.52825C14.271 4.87467 12.1364 3 9 3C5.86359 3 3.72897 4.87467 2.45617 6.52825C1.81872 7.3564 1.5 7.77047 1.5 9Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.1875 9C6.1875 7.4467 7.4467 6.1875 9 6.1875C10.5533 6.1875 11.8125 7.4467 11.8125 9C11.8125 10.5533 10.5533 11.8125 9 11.8125C7.4467 11.8125 6.1875 10.5533 6.1875 9ZM7.3125 9C7.3125 8.06802 8.06802 7.3125 9 7.3125C9.93198 7.3125 10.6875 8.06802 10.6875 9C10.6875 9.93198 9.93198 10.6875 9 10.6875C8.06802 10.6875 7.3125 9.93198 7.3125 9Z" fill="currentColor"></path>
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
                                <input type="checkbox" id="chk5" class="form-checkbox">
                            </td>
                            <td>Instagram</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('assets/images/assets/4.png') }}" class="w-[50px] rounded-full" alt="">
                                    <p class="line-clamp-1 max-w-[200px] truncate">Tuhinulla</p>
                                </div>
                            </td>
                            <td><span class="bg-success text-white font-bold text-sm py-1.5 px-3 rounded-full">Public</span></td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray">
                                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 5.2L21.213 1.55C21.288 1.49746 21.3759 1.4665 21.4672 1.4605C21.5586 1.4545 21.6498 1.4737 21.731 1.51599C21.8122 1.55829 21.8802 1.62206 21.9276 1.70035C21.9751 1.77865 22.0001 1.86846 22 1.96V14.04C22.0001 14.1315 21.9751 14.2214 21.9276 14.2996C21.8802 14.3779 21.8122 14.4417 21.731 14.484C21.6498 14.5263 21.5586 14.5455 21.4672 14.5395C21.3759 14.5335 21.288 14.5025 21.213 14.45L16 10.8V15C16 15.2652 15.8946 15.5196 15.7071 15.7071C15.5196 15.8946 15.2652 16 15 16H1C0.734784 16 0.48043 15.8946 0.292893 15.7071C0.105357 15.5196 0 15.2652 0 15V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H15C15.2652 0 15.5196 0.105357 15.7071 0.292893C15.8946 0.48043 16 0.734784 16 1V5.2ZM16 8.359L20 11.159V4.84L16 7.64V8.358V8.359ZM2 2V14H14V2H2ZM4 4H6V6H4V4Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">Video</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.5 9C1.5 10.2295 1.81872 10.6436 2.45617 11.4718C3.72897 13.1253 5.86359 15 9 15C12.1364 15 14.271 13.1253 15.5438 11.4718C16.1813 10.6436 16.5 10.2295 16.5 9C16.5 7.77047 16.1813 7.35639 15.5438 6.52825C14.271 4.87467 12.1364 3 9 3C5.86359 3 3.72897 4.87467 2.45617 6.52825C1.81872 7.3564 1.5 7.77047 1.5 9Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.1875 9C6.1875 7.4467 7.4467 6.1875 9 6.1875C10.5533 6.1875 11.8125 7.4467 11.8125 9C11.8125 10.5533 10.5533 11.8125 9 11.8125C7.4467 11.8125 6.1875 10.5533 6.1875 9ZM7.3125 9C7.3125 8.06802 8.06802 7.3125 9 7.3125C9.93198 7.3125 10.6875 8.06802 10.6875 9C10.6875 9.93198 9.93198 10.6875 9 10.6875C8.06802 10.6875 7.3125 9.93198 7.3125 9Z" fill="currentColor"></path>
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
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Table Action</h2>
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
                                        <path opacity="0.3" d="M1.99951 16.0005H17.9995V9.00049H19.9995V17.0005C19.9995 17.5528 19.5518 18.0005 18.9995 18.0005H0.999512C0.447232 18.0005 -0.000488281 17.5528 -0.000488281 17.0005V9.00049H1.99951V16.0005Z" fill="#267DFF"></path>
                                        <path d="M10.9995 7.00049H15.9995L9.99951 13.0005L3.99951 7.00049H8.99951V0.000488281H10.9995V7.00049Z" fill="#267DFF"></path>
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
                                        <path opacity="0.3" d="M1.99951 16.0005H17.9995V9.00049H19.9995V17.0005C19.9995 17.5528 19.5518 18.0005 18.9995 18.0005H0.999512C0.447232 18.0005 -0.000488281 17.5528 -0.000488281 17.0005V9.00049H1.99951V16.0005Z" fill="#267DFF"></path>
                                        <path d="M10.9995 7.00049H15.9995L9.99951 13.0005L3.99951 7.00049H8.99951V0.000488281H10.9995V7.00049Z" fill="#267DFF"></path>
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
                                        <path opacity="0.3" d="M1.99951 16.0005H17.9995V9.00049H19.9995V17.0005C19.9995 17.5528 19.5518 18.0005 18.9995 18.0005H0.999512C0.447232 18.0005 -0.000488281 17.5528 -0.000488281 17.0005V9.00049H1.99951V16.0005Z" fill="#267DFF"></path>
                                        <path d="M10.9995 7.00049H15.9995L9.99951 13.0005L3.99951 7.00049H8.99951V0.000488281H10.9995V7.00049Z" fill="#267DFF"></path>
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
                                        <path opacity="0.3" d="M1.99951 16.0005H17.9995V9.00049H19.9995V17.0005C19.9995 17.5528 19.5518 18.0005 18.9995 18.0005H0.999512C0.447232 18.0005 -0.000488281 17.5528 -0.000488281 17.0005V9.00049H1.99951V16.0005Z" fill="#267DFF"></path>
                                        <path d="M10.9995 7.00049H15.9995L9.99951 13.0005L3.99951 7.00049H8.99951V0.000488281H10.9995V7.00049Z" fill="#267DFF"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Table Action</h2>
            <div class="overflow-auto">
                <table class="min-w-[640px] w-full product-table table-hover">
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
                                    <img src="{{ asset('assets/images/product/2.png') }}" class="w-[50px] rounded-full" alt="">
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
                                    <img src="{{ asset('assets/images/product/3.png') }}" class="w-[50px] rounded-full" alt="">
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
                                    <img src="{{ asset('assets/images/product/4.png') }}" class="w-[50px] rounded-full" alt="">
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
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Table Striped</h2>
            <div class="overflow-auto">
                <table class="min-w-[640px] w-full product-table table-striped">
                    <thead>
                        <tr class="text-left">
                            <th>
                                <input type="checkbox" id="chk7" class="form-checkbox">
                            </th>
                            <th>
                                Website
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor"></path>
                                </svg>
                            </th>
                            <th>
                                Asset Name
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor"></path>
                                </svg>
                            </th>
                            <th>
                                Status
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor"></path>
                                </svg>
                            </th>
                            <th>
                                Categories
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor"></path>
                                </svg>
                            </th>
                            <th>
                                Tags
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor"></path>
                                </svg>
                            </th>
                            <th>
                                Date
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor"></path>
                                </svg>
                            </th>
                            <th>
                                Country
                                <svg width="10" height="6" class="inline-block" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.70711 1.70711C10.0976 1.31658 10.0976 0.683418 9.70711 0.292894C9.31658 -0.0976307 8.68342 -0.0976308 8.29289 0.292894L5 3.58579L1.70711 0.292893C1.31658 -0.097631 0.683417 -0.0976311 0.292893 0.292893C-0.0976309 0.683417 -0.097631 1.31658 0.292893 1.70711L4.29289 5.70711C4.68342 6.09763 5.31658 6.09763 5.70711 5.70711L9.70711 1.70711Z" fill="currentColor"></path>
                                </svg>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-left">
                            <td>
                                <input type="checkbox" id="chk8" class="form-checkbox">
                            </td>
                            <td>Google</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('assets/images/assets/1.png') }}" class="w-[50px] rounded-full" alt="">
                                    <p class="line-clamp-1 max-w-[200px] truncate">Abstract Element</p>
                                </div>
                            </td>
                            <td><span class="bg-primary text-white font-bold text-sm py-1.5 px-3 rounded-full">Private</span></td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.5 11.202L11 13.535V17.131L17.197 13L14.5 11.202ZM12.697 10L10 8.202L7.303 10L10 11.798L12.697 10ZM18 8.869L16.303 10L18 11.131V8.87V8.869ZM17.197 7L11 2.869V6.465L14.5 8.798L17.197 7ZM5.5 8.798L9 6.465V2.869L2.803 7L5.5 8.798ZM2.803 13L9 17.131V13.535L5.5 11.202L2.803 13ZM2 11.131L3.697 10L2 8.869V11.131ZM1.11994e-08 7C-2.46193e-05 6.8354 0.0405779 6.67335 0.118205 6.52821C0.195832 6.38308 0.308084 6.25935 0.445 6.168L9.445 0.167997C9.60933 0.058358 9.80245 -0.000152588 10 -0.000152588C10.1975 -0.000152588 10.3907 0.058358 10.555 0.167997L19.555 6.168C19.6919 6.25935 19.8042 6.38308 19.8818 6.52821C19.9594 6.67335 20 6.8354 20 7V13C20 13.1646 19.9594 13.3266 19.8818 13.4718C19.8042 13.6169 19.6919 13.7406 19.555 13.832L10.555 19.832C10.3907 19.9416 10.1975 20.0001 10 20.0001C9.80245 20.0001 9.60933 19.9416 9.445 19.832L0.445 13.832C0.308084 13.7406 0.195832 13.6169 0.118205 13.4718C0.0405779 13.3266 -2.46193e-05 13.1646 1.11994e-08 13V7Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">3D Elements</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.5 9C1.5 10.2295 1.81872 10.6436 2.45617 11.4718C3.72897 13.1253 5.86359 15 9 15C12.1364 15 14.271 13.1253 15.5438 11.4718C16.1813 10.6436 16.5 10.2295 16.5 9C16.5 7.77047 16.1813 7.35639 15.5438 6.52825C14.271 4.87467 12.1364 3 9 3C5.86359 3 3.72897 4.87467 2.45617 6.52825C1.81872 7.3564 1.5 7.77047 1.5 9Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.1875 9C6.1875 7.4467 7.4467 6.1875 9 6.1875C10.5533 6.1875 11.8125 7.4467 11.8125 9C11.8125 10.5533 10.5533 11.8125 9 11.8125C7.4467 11.8125 6.1875 10.5533 6.1875 9ZM7.3125 9C7.3125 8.06802 8.06802 7.3125 9 7.3125C9.93198 7.3125 10.6875 8.06802 10.6875 9C10.6875 9.93198 9.93198 10.6875 9 10.6875C8.06802 10.6875 7.3125 9.93198 7.3125 9Z" fill="currentColor"></path>
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
                                <input type="checkbox" id="chk10" class="form-checkbox">
                            </td>
                            <td>Amazon</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('assets/images/assets/2.png') }}" class="w-[50px] rounded-full" alt="">
                                    <p class="line-clamp-1 max-w-[200px] truncate">Abstract Minimalist Character</p>
                                </div>
                            </td>
                            <td><span class="bg-success text-white font-bold text-sm py-1.5 px-3 rounded-full">Public</span></td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.828 18L2.808 18.02L2.787 18H0.992C0.728813 17.9997 0.476497 17.895 0.290489 17.7088C0.104482 17.5226 -1.33455e-07 17.2702 0 17.007V0.993C0.00183004 0.730378 0.1069 0.479017 0.292513 0.293218C0.478126 0.107418 0.72938 0.00209465 0.992 0H19.008C19.556 0 20 0.445 20 0.993V17.007C19.9982 17.2696 19.8931 17.521 19.7075 17.7068C19.5219 17.8926 19.2706 17.9979 19.008 18H2.828ZM18 12V2H2V16L12 6L18 12ZM18 14.828L12 8.828L4.828 16H18V14.828ZM6 8C5.46957 8 4.96086 7.78929 4.58579 7.41421C4.21071 7.03914 4 6.53043 4 6C4 5.46957 4.21071 4.96086 4.58579 4.58579C4.96086 4.21071 5.46957 4 6 4C6.53043 4 7.03914 4.21071 7.41421 4.58579C7.78929 4.96086 8 5.46957 8 6C8 6.53043 7.78929 7.03914 7.41421 7.41421C7.03914 7.78929 6.53043 8 6 8Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">Images</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.5 9C1.5 10.2295 1.81872 10.6436 2.45617 11.4718C3.72897 13.1253 5.86359 15 9 15C12.1364 15 14.271 13.1253 15.5438 11.4718C16.1813 10.6436 16.5 10.2295 16.5 9C16.5 7.77047 16.1813 7.35639 15.5438 6.52825C14.271 4.87467 12.1364 3 9 3C5.86359 3 3.72897 4.87467 2.45617 6.52825C1.81872 7.3564 1.5 7.77047 1.5 9Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.1875 9C6.1875 7.4467 7.4467 6.1875 9 6.1875C10.5533 6.1875 11.8125 7.4467 11.8125 9C11.8125 10.5533 10.5533 11.8125 9 11.8125C7.4467 11.8125 6.1875 10.5533 6.1875 9ZM7.3125 9C7.3125 8.06802 8.06802 7.3125 9 7.3125C9.93198 7.3125 10.6875 8.06802 10.6875 9C10.6875 9.93198 9.93198 10.6875 9 10.6875C8.06802 10.6875 7.3125 9.93198 7.3125 9Z" fill="currentColor"></path>
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
                                <input type="checkbox" id="chk11" class="form-checkbox">
                            </td>
                            <td>Facebook</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('assets/images/assets/3.png') }}" class="w-[50px] rounded-full" alt="">
                                    <p class="line-clamp-1 max-w-[200px] truncate">Assets Name</p>
                                </div>
                            </td>
                            <td><span class="bg-primary text-white font-bold text-sm py-1.5 px-3 rounded-full">Private</span></td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray">
                                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.00001 10.535V0H14V3H8.00001V14C7.99981 14.8805 7.70909 15.7363 7.17294 16.4348C6.63679 17.1332 5.88517 17.6352 5.03463 17.863C4.1841 18.0907 3.28218 18.0315 2.46875 17.6944C1.65533 17.3573 0.975843 16.7613 0.53568 15.9987C0.0955161 15.2361 -0.0807315 14.3496 0.0342702 13.4767C0.149272 12.6037 0.549096 11.7931 1.17174 11.1705C1.79438 10.5479 2.60504 10.1482 3.47801 10.0333C4.35098 9.9184 5.23747 10.0948 6.00001 10.535Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">Music</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.5 9C1.5 10.2295 1.81872 10.6436 2.45617 11.4718C3.72897 13.1253 5.86359 15 9 15C12.1364 15 14.271 13.1253 15.5438 11.4718C16.1813 10.6436 16.5 10.2295 16.5 9C16.5 7.77047 16.1813 7.35639 15.5438 6.52825C14.271 4.87467 12.1364 3 9 3C5.86359 3 3.72897 4.87467 2.45617 6.52825C1.81872 7.3564 1.5 7.77047 1.5 9Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.1875 9C6.1875 7.4467 7.4467 6.1875 9 6.1875C10.5533 6.1875 11.8125 7.4467 11.8125 9C11.8125 10.5533 10.5533 11.8125 9 11.8125C7.4467 11.8125 6.1875 10.5533 6.1875 9ZM7.3125 9C7.3125 8.06802 8.06802 7.3125 9 7.3125C9.93198 7.3125 10.6875 8.06802 10.6875 9C10.6875 9.93198 9.93198 10.6875 9 10.6875C8.06802 10.6875 7.3125 9.93198 7.3125 9Z" fill="currentColor"></path>
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
                                <input type="checkbox" id="chk12" class="form-checkbox">
                            </td>
                            <td>Instagram</td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ asset('assets/images/assets/4.png') }}" class="w-[50px] rounded-full" alt="">
                                    <p class="line-clamp-1 max-w-[200px] truncate">Tuhinulla</p>
                                </div>
                            </td>
                            <td><span class="bg-success text-white font-bold text-sm py-1.5 px-3 rounded-full">Public</span></td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span class="text-gray">
                                        <svg width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 5.2L21.213 1.55C21.288 1.49746 21.3759 1.4665 21.4672 1.4605C21.5586 1.4545 21.6498 1.4737 21.731 1.51599C21.8122 1.55829 21.8802 1.62206 21.9276 1.70035C21.9751 1.77865 22.0001 1.86846 22 1.96V14.04C22.0001 14.1315 21.9751 14.2214 21.9276 14.2996C21.8802 14.3779 21.8122 14.4417 21.731 14.484C21.6498 14.5263 21.5586 14.5455 21.4672 14.5395C21.3759 14.5335 21.288 14.5025 21.213 14.45L16 10.8V15C16 15.2652 15.8946 15.5196 15.7071 15.7071C15.5196 15.8946 15.2652 16 15 16H1C0.734784 16 0.48043 15.8946 0.292893 15.7071C0.105357 15.5196 0 15.2652 0 15V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H15C15.2652 0 15.5196 0.105357 15.7071 0.292893C15.8946 0.48043 16 0.734784 16 1V5.2ZM16 8.359L20 11.159V4.84L16 7.64V8.358V8.359ZM2 2V14H14V2H2ZM4 4H6V6H4V4Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <p class="line-clamp-1 max-w-[200px] truncate">Video</p>
                                </div>
                            </td>
                            <td>
                                <div class="flex items-center gap-2">
                                    <span>
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M1.5 9C1.5 10.2295 1.81872 10.6436 2.45617 11.4718C3.72897 13.1253 5.86359 15 9 15C12.1364 15 14.271 13.1253 15.5438 11.4718C16.1813 10.6436 16.5 10.2295 16.5 9C16.5 7.77047 16.1813 7.35639 15.5438 6.52825C14.271 4.87467 12.1364 3 9 3C5.86359 3 3.72897 4.87467 2.45617 6.52825C1.81872 7.3564 1.5 7.77047 1.5 9Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.1875 9C6.1875 7.4467 7.4467 6.1875 9 6.1875C10.5533 6.1875 11.8125 7.4467 11.8125 9C11.8125 10.5533 10.5533 11.8125 9 11.8125C7.4467 11.8125 6.1875 10.5533 6.1875 9ZM7.3125 9C7.3125 8.06802 8.06802 7.3125 9 7.3125C9.93198 7.3125 10.6875 8.06802 10.6875 9C10.6875 9.93198 9.93198 10.6875 9 10.6875C8.06802 10.6875 7.3125 9.93198 7.3125 9Z" fill="currentColor"></path>
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

@endsection