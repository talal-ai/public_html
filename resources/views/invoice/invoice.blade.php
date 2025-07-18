@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        <div class="lg:col-span-2">
            <p class="font-semibold">Invoice</p>
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg mt-[30px]">
                <div class="flex items-center gap-2.5">
                    <div class="h-10 w-10 bg-purple/[0.14] flex items-center justify-center rounded-full text-purple">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.2" d="M21 18C21 18.5967 20.7629 19.169 20.341 19.591C19.919 20.0129 19.3467 20.25 18.75 20.25H8.25C8.84674 20.25 9.41903 20.0129 9.84099 19.591C10.2629 19.169 10.5 18.5967 10.5 18C10.5 17.0625 9.75 16.5 9.75 16.5H20.25C20.25 16.5 21 17.0625 21 18Z" fill="currentColor" />
                            <path d="M9 9.75C9 9.55109 9.07902 9.36032 9.21967 9.21967C9.36032 9.07902 9.55109 9 9.75 9H15.75C15.9489 9 16.1397 9.07902 16.2803 9.21967C16.421 9.36032 16.5 9.55109 16.5 9.75C16.5 9.94891 16.421 10.1397 16.2803 10.2803C16.1397 10.421 15.9489 10.5 15.75 10.5H9.75C9.55109 10.5 9.36032 10.421 9.21967 10.2803C9.07902 10.1397 9 9.94891 9 9.75ZM9.75 13.5H15.75C15.9489 13.5 16.1397 13.421 16.2803 13.2803C16.421 13.1397 16.5 12.9489 16.5 12.75C16.5 12.5511 16.421 12.3603 16.2803 12.2197C16.1397 12.079 15.9489 12 15.75 12H9.75C9.55109 12 9.36032 12.079 9.21967 12.2197C9.07902 12.3603 9 12.5511 9 12.75C9 12.9489 9.07902 13.1397 9.21967 13.2803C9.36032 13.421 9.55109 13.5 9.75 13.5ZM21.75 18C21.75 18.7956 21.4339 19.5587 20.8713 20.1213C20.3087 20.6839 19.5456 21 18.75 21H8.25C7.45435 21 6.69129 20.6839 6.12868 20.1213C5.56607 19.5587 5.25 18.7956 5.25 18V6C5.25 5.60218 5.09196 5.22064 4.81066 4.93934C4.52936 4.65804 4.14782 4.5 3.75 4.5C3.35218 4.5 2.97064 4.65804 2.68934 4.93934C2.40804 5.22064 2.25 5.60218 2.25 6C2.25 6.53813 2.70281 6.90188 2.7075 6.90563C2.83163 7.00115 2.92273 7.13313 2.96804 7.28306C3.01334 7.43299 3.01057 7.59335 2.96011 7.74162C2.90965 7.8899 2.81404 8.01866 2.68668 8.10983C2.55933 8.201 2.40663 8.25002 2.25 8.25C2.08781 8.25028 1.93003 8.19725 1.80094 8.09906C1.69219 8.01937 0.75 7.27594 0.75 6C0.75 5.20435 1.06607 4.44129 1.62868 3.87868C2.19129 3.31607 2.95435 3 3.75 3H16.5C17.2956 3 18.0587 3.31607 18.6213 3.87868C19.1839 4.44129 19.5 5.20435 19.5 6V15.75H20.25C20.4123 15.75 20.5702 15.8026 20.7 15.9C20.8125 15.9806 21.75 16.7241 21.75 18ZM9.02437 16.2638C9.07562 16.1125 9.17342 15.9813 9.30376 15.889C9.4341 15.7968 9.59031 15.7481 9.75 15.75H18V6C18 5.60218 17.842 5.22064 17.5607 4.93934C17.2794 4.65804 16.8978 4.5 16.5 4.5H6.34594C6.61119 4.95535 6.75064 5.47302 6.75 6V18C6.75 18.3978 6.90804 18.7794 7.18934 19.0607C7.47064 19.342 7.85218 19.5 8.25 19.5C8.64782 19.5 9.02936 19.342 9.31066 19.0607C9.59196 18.7794 9.75 18.3978 9.75 18C9.75 17.4619 9.29719 17.0981 9.2925 17.0944C9.16469 17.0029 9.06963 16.8729 9.02136 16.7233C8.97308 16.5738 8.97414 16.4127 9.02437 16.2638ZM20.25 18C20.2406 17.7221 20.1334 17.4565 19.9472 17.25H11.1347C11.2101 17.4929 11.2483 17.7457 11.2481 18C11.2488 18.5267 11.1101 19.0443 10.8459 19.5H18.75C19.1478 19.5 19.5294 19.342 19.8107 19.0607C20.092 18.7794 20.25 18.3978 20.25 18Z" fill="currentColor" />
                        </svg>
                    </div>
                    <div class="space-y-1">
                        <p class="font-bold">Invoice #1357902468</p>
                        <div class="flex items-center gap-1.5">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.78356 1.6665C6.13011 1.6665 6.41104 1.93668 6.41104 2.26995V3.48723C6.96763 3.47685 7.59151 3.47685 8.29349 3.47685H11.6401C12.342 3.47685 12.9659 3.47685 13.5225 3.48723V2.26995C13.5225 1.93668 13.8034 1.6665 14.15 1.6665C14.4965 1.6665 14.7775 1.93668 14.7775 2.26995V3.54062C15.9817 3.63335 16.7722 3.86094 17.353 4.41949C17.9338 4.97804 18.1705 5.73831 18.2669 6.89639L18.3333 7.49984H2.43712H1.66666V6.89639C1.76308 5.73831 1.99974 4.97804 2.58053 4.41949C3.16133 3.86094 3.95187 3.63335 5.15608 3.54062V2.26995C5.15608 1.93668 5.43701 1.6665 5.78356 1.6665Z" fill="#7780A1" />
                                <path opacity="0.3" d="M18.3333 11.6667V10.0001C18.3333 9.30087 18.3306 8.05439 18.3199 7.5H1.67471C1.66396 8.05439 1.66668 9.30087 1.66668 10.0001V11.6667C1.66668 14.8094 1.66668 16.3808 2.64299 17.3571C3.6193 18.3334 5.19065 18.3334 8.33334 18.3334H11.6667C14.8094 18.3334 16.3807 18.3334 17.357 17.3571C18.3333 16.3808 18.3333 14.8094 18.3333 11.6667Z" fill="#7780A1" />
                                <path d="M15 14.1667C15 14.6269 14.6269 15 14.1667 15C13.7064 15 13.3333 14.6269 13.3333 14.1667C13.3333 13.7064 13.7064 13.3333 14.1667 13.3333C14.6269 13.3333 15 13.7064 15 14.1667Z" fill="#7780A1" />
                                <path d="M15 10.8333C15 11.2936 14.6269 11.6667 14.1667 11.6667C13.7064 11.6667 13.3333 11.2936 13.3333 10.8333C13.3333 10.3731 13.7064 10 14.1667 10C14.6269 10 15 10.3731 15 10.8333Z" fill="#7780A1" />
                                <path d="M10.8333 14.1667C10.8333 14.6269 10.4602 15 9.99999 15C9.53975 15 9.16666 14.6269 9.16666 14.1667C9.16666 13.7064 9.53975 13.3333 9.99999 13.3333C10.4602 13.3333 10.8333 13.7064 10.8333 14.1667Z" fill="#7780A1" />
                                <path d="M10.8333 10.8333C10.8333 11.2936 10.4602 11.6667 9.99999 11.6667C9.53975 11.6667 9.16666 11.2936 9.16666 10.8333C9.16666 10.3731 9.53975 10 9.99999 10C10.4602 10 10.8333 10.3731 10.8333 10.8333Z" fill="#7780A1" />
                                <path d="M6.66667 14.1667C6.66667 14.6269 6.29357 15 5.83333 15C5.3731 15 5 14.6269 5 14.1667C5 13.7064 5.3731 13.3333 5.83333 13.3333C6.29357 13.3333 6.66667 13.7064 6.66667 14.1667Z" fill="#7780A1" />
                                <path d="M6.66667 10.8333C6.66667 11.2936 6.29357 11.6667 5.83333 11.6667C5.3731 11.6667 5 11.2936 5 10.8333C5 10.3731 5.3731 10 5.83333 10C6.29357 10 6.66667 10.3731 6.66667 10.8333Z" fill="#7780A1" />
                            </svg>
                            <p class="text-gray font-semibold text-xs">Issue Date: 12 March, 2023</p>
                        </div>
                    </div>
                </div>
                <div class="mt-10 flex items-start justify-between gap-5 flex-wrap">
                    <div>
                        <p class="text-primary">Bill From:</p>
                        <div class="space-y-2 mt-4">
                            <p>Mike Gipson</p>
                            <p class="text-gray">3252 Pooh Bear Lane Greenville, SC 29601</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-primary">Bill To:</p>
                        <div class="space-y-2 mt-4">
                            <p>Sherry Kenny</p>
                            <p class="text-gray">413 Langton Road Toledo, OH 43609</p>
                        </div>
                    </div>
                </div>
                <div class="mt-[50px]">
                    <p class="text-primary text-sm font-semibold">Invoice Details</p>
                    <div class="overflow-auto mt-5">
                        <table class="min-w-[640px] w-full border-b-2 border-gray/10 dark:border-gray/20">
                            <thead class="border-t-2 border-gray/10 dark:border-gray/20">
                                <tr class="text-left">
                                    <th>Number</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th class="text-end">Total Amount</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray invoice-table">
                                <tr>
                                    <td>01</td>
                                    <td>ASOS Ridley High Waist</td>
                                    <td>$54</td>
                                    <td>2</td>
                                    <td>$200</td>
                                </tr>
                                <tr>
                                    <td>02</td>
                                    <td>Marco Lightweight Shirt</td>
                                    <td>$92</td>
                                    <td>5</td>
                                    <td>$270</td>
                                </tr>
                                <tr>
                                    <td>03</td>
                                    <td>Half Sleeve Shirt</td>
                                    <td>$100</td>
                                    <td>14</td>
                                    <td>$1,288</td>
                                </tr>
                                <tr>
                                    <td>04</td>
                                    <td>Lightweight Jacket</td>
                                    <td>$10</td>
                                    <td>24</td>
                                    <td>$240</td>
                                </tr>
                                <tr>
                                    <td>05</td>
                                    <td>Marco Shoes</td>
                                    <td>$150</td>
                                    <td>6</td>
                                    <td>$900</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="space-y-4 mt-5">
                        <div class="flex items-center justify-between font-semibold">
                            <p>Sub Total</p>
                            <p>$4,315</p>
                        </div>
                        <div class="flex items-center justify-between font-semibold">
                            <p>Tax Vat</p>
                            <p>00%</p>
                        </div>
                        <div class="flex items-center justify-between font-semibold">
                            <p>Grand Total</p>
                            <p>$4,315</p>
                        </div>
                    </div>
                    <div class="w-full h-[2px] my-5 bg-gray/10 dark:bg-gray/20"></div>
                    <div class="flex sm:flex-row flex-col items-start gap-5 flex-wrap print:hidden">
                        <div class="flex-1">
                            <button type="button" class="btn bg-gray/10 border border-gray/10 rounded-md transition-all duration-300 hover:bg-gray/[0.15] hover:border-gray/[0.15]">Cancel</button>
                        </div>
                        <div class="flex-1 max-w-[358px] flex justify-end items-center gap-2.5 flex-wrap">
                            <button type="button" class="btn bg-gray/10 border border-gray/10 rounded-md transition-all duration-300 hover:bg-gray/[0.15] hover:border-gray/[0.15]">Save as Draft</button>
                            <button type="button" class="btn bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="print:hidden">
            <p class="font-semibold">Payment Method</p>
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg mt-[30px]">
                <div class="space-y-3.5">
                    <div class="relative budget-input">
                        <label class="flex cursor-pointer rounded-lg justify-between bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 items-start gap-4 p-5">
                            <div class="relative z-10 text-sm font-semibold w-full">
                                <div class="flex items-center gap-3 flex-1">
                                    <span>
                                        <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.61986 18.0336L4.93183 16.052L4.2369 16.0359H0.918549L3.22463 1.41377C3.2315 1.36909 3.25419 1.32837 3.28857 1.29903C3.32295 1.26968 3.36673 1.25367 3.41194 1.25391H9.00714C10.8647 1.25391 12.1465 1.64044 12.8158 2.40337C13.1296 2.76127 13.3294 3.13528 13.426 3.54687C13.5275 3.97874 13.5292 4.49472 13.4302 5.12403L13.4231 5.16996V5.5732L13.7368 5.75095C13.9764 5.87231 14.1917 6.03646 14.3721 6.23532C14.6405 6.54132 14.8141 6.93024 14.8875 7.39134C14.9632 7.86556 14.9382 8.42985 14.8141 9.06871C14.671 9.8036 14.4395 10.4437 14.1269 10.9674C13.8512 11.4366 13.4804 11.8429 13.0383 12.1604C12.6232 12.4551 12.1298 12.6788 11.5721 12.8219C11.0317 12.9627 10.4155 13.0337 9.73965 13.0337H9.3042C8.99283 13.0337 8.6904 13.1458 8.45299 13.3468C8.21592 13.55 8.05865 13.8307 8.00919 14.139L7.97638 14.3173L7.42522 17.8099L7.40016 17.9381C7.3936 17.9787 7.38227 17.999 7.36557 18.0127C7.34939 18.0259 7.3292 18.0333 7.3083 18.0336H4.61986Z" fill="#253B80" />
                                            <path d="M14.0341 5.21582C14.0174 5.32259 13.9983 5.43175 13.9769 5.5439C13.239 9.33229 10.7146 10.641 7.49046 10.641H5.84888C5.45459 10.641 5.12234 10.9273 5.0609 11.3163L4.22043 16.6466L3.98242 18.1576C3.97294 18.2175 3.97656 18.2788 3.99303 18.3372C4.0095 18.3956 4.03844 18.4497 4.07784 18.4959C4.11724 18.542 4.16617 18.5791 4.22127 18.6045C4.27636 18.6299 4.33631 18.6431 4.39699 18.6431H7.30853C7.65331 18.6431 7.94619 18.3926 8.00047 18.0526L8.02911 17.9047L8.57729 14.4258L8.61249 14.235C8.66617 13.8938 8.95965 13.6432 9.30443 13.6432H9.73988C12.5607 13.6432 14.769 12.4979 15.4144 9.18377C15.684 7.79928 15.5445 6.64325 14.831 5.83022C14.6049 5.57871 14.3349 5.37051 14.0341 5.21582Z" fill="#179BD7" />
                                            <path d="M13.2622 4.90862C13.0266 4.84046 12.7869 4.78726 12.5446 4.74935C12.0658 4.67576 11.5819 4.64046 11.0974 4.64377H6.71194C6.54505 4.64364 6.38361 4.70322 6.25681 4.81175C6.13002 4.92027 6.04623 5.07058 6.0206 5.2355L5.08766 11.1445L5.06082 11.3169C5.08989 11.1288 5.18531 10.9573 5.32985 10.8334C5.47438 10.7096 5.65846 10.6415 5.8488 10.6416H7.49038C10.7145 10.6416 13.2389 9.33229 13.9768 5.54449C13.9988 5.43235 14.0173 5.32319 14.034 5.21641C13.8393 5.11431 13.6364 5.02871 13.4274 4.96051C13.3726 4.94233 13.3175 4.92503 13.2622 4.90862Z" fill="#222D65" />
                                            <path d="M6.02044 5.23555C6.04586 5.07059 6.1296 4.92021 6.25646 4.81174C6.38332 4.70327 6.54488 4.6439 6.71179 4.64442H11.0973C11.6168 4.64442 12.1018 4.67842 12.5444 4.75C12.8439 4.79707 13.1393 4.86747 13.4278 4.96056C13.6456 5.03274 13.8478 5.11804 14.0345 5.21646C14.254 3.81647 14.0327 2.86326 13.2757 2.00011C12.4412 1.04988 10.935 0.643066 9.00774 0.643066H3.41253C3.01883 0.643066 2.683 0.929388 2.62216 1.31891L0.291617 16.0913C0.280761 16.1599 0.284892 16.23 0.303723 16.2969C0.322554 16.3637 0.35564 16.4257 0.400704 16.4785C0.445768 16.5313 0.501741 16.5738 0.564773 16.6029C0.627804 16.632 0.696399 16.6472 0.765838 16.6473H4.22019L5.08751 11.1445L6.02044 5.23555Z" fill="#253B80" />
                                        </svg>
                                    </span>
                                    Paypal
                                </div>
                            </div>
                            <input name="account-type" type="radio" class="form-checkbox relative hidden z-10 peer" />
                            <div class="peer-checked:text-primary">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 11.7L8.85714 14.5L16 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <span class="rounded-lg border-2 border-transparent peer-checked:border-primary/20 peer-checked:bg-primary/[8%] absolute top-0 left-0 z-0 w-full h-full"></span>
                        </label>
                    </div>
                    <div class="relative budget-input">
                        <label class="flex cursor-pointer rounded-lg justify-between bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 items-start gap-4 p-5">
                            <div class="relative z-10 text-sm font-semibold w-full">
                                <div class="flex items-center gap-3 flex-1">
                                    <svg width="23" height="18" viewBox="0 0 23 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.5923 3.11937C18.1532 2.82817 15.8328 2.43435 15.1845 3.78906C13.2032 7.22075 12.0657 10.8124 11.2096 12.3534C11.2995 12.4053 15.2458 14.6949 15.5249 14.8303C16.4121 15.2609 17.8933 15.0671 18.5242 13.9291C20.2747 10.7721 19.8297 11.594 21.6896 8.37275C22.8914 6.29105 21.3888 3.48282 19.5923 3.11937Z" fill="#EA4335" />
                                        <path d="M7.14037 17.051C6.17404 15.9455 5.46519 13.7338 6.31429 12.4952C8.79479 8.19868 10.7805 5.59778 12.3422 2.99072C13.1702 3.46885 16.4882 5.35092 16.7092 5.54484C17.4505 6.19513 18.0646 7.4377 17.3946 8.55316C15.5357 11.6476 14.773 13.048 12.8837 16.3205C11.6815 18.4027 8.34758 18.4321 7.14037 17.051Z" fill="#FDBD00" />
                                        <path d="M16.0385 0.929053C14.1054 -0.20055 13.1118 -0.0525052 12.0722 0.114216C11.1271 0.350471 9.84914 1.0373 9.31045 1.91968C7.95148 4.14552 6.66431 6.34806 4.99683 9.33281C4.48326 10.2521 4.86447 11.3815 5.33844 11.8297C5.65964 12.1336 8.02301 13.4375 8.45908 13.625C9.07592 13.8902 9.99991 13.7057 10.5573 13.132C10.7112 12.9736 14.2369 6.91767 15.2298 5.13152C15.6489 4.37779 16.0264 3.96067 16.6531 3.5586C17.8639 2.92326 18.8092 2.84131 20.2571 3.37075C20.2571 3.37075 17.1058 1.54417 16.0385 0.929053Z" fill="#2DA94F" />
                                        <path d="M3.60024 15.1417C1.65535 14.0324 1.28673 13.0979 0.911319 12.1142C0.643423 11.1777 0.599273 9.72749 1.09409 8.81964C2.34236 6.52997 2.33339 6.51837 4.08454 3.58185C4.62387 2.67745 5.79263 2.44291 6.41781 2.62922C6.84155 2.75541 9.15243 4.15019 9.53284 4.43413C10.071 4.83575 10.3731 5.72819 10.155 6.49779C10.0947 6.71029 7.88566 10.5872 6.83539 12.3403C6.39207 13.08 6.21964 13.6155 6.18482 14.3592C6.23994 15.7254 6.64156 16.5851 7.82411 17.5743C7.82411 17.5743 4.66657 15.7584 3.60024 15.1417Z" fill="#297AEC" />
                                    </svg>
                                    Google Pay
                                </div>
                            </div>
                            <input name="account-type" type="radio" class="form-checkbox relative hidden z-10 peer" />
                            <div class="peer-checked:text-primary">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 11.7L8.85714 14.5L16 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <span class="rounded-lg border-2 border-transparent peer-checked:border-primary/20 peer-checked:bg-primary/[8%] absolute top-0 left-0 z-0 w-full h-full"></span>
                        </label>
                    </div>
                    <div class="relative budget-input">
                        <label class="flex cursor-pointer rounded-lg justify-between bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 items-center gap-4 p-5">
                            <div class="relative z-10 text-sm font-semibold w-full">
                                <div class="flex items-center gap-4 flex-1">
                                    <span>
                                        <svg width="30" height="11" viewBox="0 0 30 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.0053 9.96168H10.5573L12.0873 1.04411H14.5355L13.0053 9.96168ZM8.49799 1.04411L6.16424 7.17768L5.88808 5.85689L5.88833 5.85736L5.06464 1.84703C5.06464 1.84703 4.96504 1.04411 3.90342 1.04411H0.0452717L0 1.19511C0 1.19511 1.17983 1.42792 2.56061 2.21439L4.68737 9.96192H7.23793L11.1325 1.04411H8.49799ZM27.7523 9.96168H30L28.0402 1.04387H26.0724C25.1637 1.04387 24.9424 1.70844 24.9424 1.70844L21.2915 9.96168H23.8433L24.3536 8.63707H27.4655L27.7523 9.96168ZM25.0586 6.80723L26.3448 3.47006L27.0684 6.80723H25.0586ZM21.4829 3.18858L21.8322 1.27358C21.8322 1.27358 20.7543 0.884766 19.6305 0.884766C18.4157 0.884766 15.5309 1.38832 15.5309 3.83693C15.5309 6.14075 18.9168 6.16937 18.9168 7.37949C18.9168 8.5896 15.8798 8.37276 14.8775 7.60968L14.5136 9.61198C14.5136 9.61198 15.6066 10.1155 17.2767 10.1155C18.9472 10.1155 21.4673 9.2952 21.4673 7.06247C21.4673 4.74386 18.0511 4.52798 18.0511 3.51991C18.0513 2.51161 20.4354 2.64113 21.4829 3.18858Z" fill="#267DFF" />
                                            <path d="M5.88833 5.8572L5.06464 1.84687C5.06464 1.84687 4.96504 1.04395 3.90342 1.04395H0.0452717L0 1.19494C0 1.19494 1.85438 1.55943 3.63305 2.92507C5.33375 4.23036 5.88833 5.8572 5.88833 5.8572Z" fill="#267DFF" />
                                        </svg>
                                    </span>
                                    <div class="w-[2px] bg-gray/20 dark:bg-lightgray/10 shrink-0 h-7"></div>
                                    <div>
                                        <p class="text-sm">ICICI Bank Ltd.</p>
                                        <p class="text-xs font-semibold text-gray mt-2">Debit Card **** **** **** 6541</p>
                                    </div>
                                </div>
                            </div>
                            <input name="account-type" type="radio" class="form-checkbox relative hidden z-10 peer" />
                            <div class="peer-checked:text-primary">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 11.7L8.85714 14.5L16 7.5" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <span class="rounded-lg border-2 border-transparent peer-checked:border-primary/20 peer-checked:bg-primary/[8%] absolute top-0 left-0 z-0 w-full h-full"></span>
                        </label>
                    </div>
                </div>
                <div class="mt-[30px]">
                    <p class="text-sm font-semibold">Summary</p>
                    <div class="space-y-4 mt-5">
                        <div class="flex items-center justify-between">
                            <p class="text-gray">Sub Total</p>
                            <p class="font-semibold">$4,315</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-gray">Payment Method Fee:</p>
                            <p class="font-semibold">0</p>
                        </div>
                    </div>
                    <div class="w-full h-[2px] my-5 bg-gray/10 dark:bg-gray/20"></div>
                    <div class="space-y-4 mt-5">
                        <div class="flex items-center justify-between">
                            <p class="text-gray">Total Payment</p>
                            <p class="font-bold text-primary text-lg">$4,315</p>
                        </div>
                    </div>
                    <div class="mt-[30px] px-5 py-2.5 bg-success/5 border-2 border-success rounded-lg">
                        <div class="flex items-center gap-2.5">
                            <div class="text-success">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.2" d="M25.3125 6.5625V13.4496C25.3125 23.3145 16.9559 26.5828 15.2883 27.1371C15.1015 27.2016 14.8985 27.2016 14.7117 27.1371C13.0441 26.5852 4.6875 23.3203 4.6875 13.452V6.5625C4.6875 6.31386 4.78627 6.0754 4.96209 5.89959C5.1379 5.72377 5.37636 5.625 5.625 5.625H24.375C24.6236 5.625 24.8621 5.72377 25.0379 5.89959C25.2137 6.0754 25.3125 6.31386 25.3125 6.5625Z" fill="currentColor" />
                                    <path d="M24.375 4.6875H5.625C5.12772 4.6875 4.65081 4.88504 4.29917 5.23667C3.94754 5.58831 3.75 6.06522 3.75 6.5625V13.4508C3.75 23.952 12.6352 27.4359 14.4141 28.0277C14.794 28.1569 15.206 28.1569 15.5859 28.0277C17.3672 27.4359 26.25 23.952 26.25 13.4508V6.5625C26.25 6.06522 26.0525 5.58831 25.7008 5.23667C25.3492 4.88504 24.8723 4.6875 24.375 4.6875ZM24.375 13.452C24.375 22.6418 16.5996 25.7121 15 26.2465C13.4145 25.718 5.625 22.65 5.625 13.452V6.5625H24.375V13.452ZM9.64922 16.6008C9.47331 16.4249 9.37448 16.1863 9.37448 15.9375C9.37448 15.6887 9.47331 15.4501 9.64922 15.2742C9.82513 15.0983 10.0637 14.9995 10.3125 14.9995C10.5613 14.9995 10.7999 15.0983 10.9758 15.2742L13.125 17.4234L19.0242 11.5242C19.1113 11.4371 19.2147 11.368 19.3285 11.3209C19.4423 11.2737 19.5643 11.2495 19.6875 11.2495C19.8107 11.2495 19.9327 11.2737 20.0465 11.3209C20.1603 11.368 20.2637 11.4371 20.3508 11.5242C20.4379 11.6113 20.507 11.7147 20.5541 11.8285C20.6013 11.9423 20.6255 12.0643 20.6255 12.1875C20.6255 12.3107 20.6013 12.4327 20.5541 12.5465C20.507 12.6603 20.4379 12.7637 20.3508 12.8508L13.7883 19.4133C13.7012 19.5004 13.5978 19.5696 13.484 19.6168C13.3702 19.664 13.2482 19.6882 13.125 19.6882C13.0018 19.6882 12.8798 19.664 12.766 19.6168C12.6522 19.5696 12.5488 19.5004 12.4617 19.4133L9.64922 16.6008Z" fill="currentColor" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold">100% Cashback Guarantee</p>
                                <p class="text-gray text-xs font-semibold">We protect your money</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-[30px]">
                        <button type="button" class="btn h-[52px] uppercase w-full bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">Pay now $4,315</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
