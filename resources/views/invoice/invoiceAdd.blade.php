@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 gap-5">
        <div>
            <p class="font-semibold">Create New Invoice</p>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <form class="space-y-[30px]">
                <div class="flex items-center justify-between flex-wrap gap-5">
                    <div class="p-5 bg-gray/10 rounded-lg">
                        <p class="font-semibold leading-none">Invoice #1357902468</p>
                    </div>
                    <div class="flex sm:flex-row flex-col sm:items-center gap-5 flex-wrap sm:w-1/2 w-full">
                        <div class="space-y-4 flex-1">
                            <label for="date1" class="text-sm">Issued On</label>
                            <input id="date1" type="date" class="form-input rounded-lg" placeholder="Date" required="">
                        </div>
                        <div class="space-y-4 flex-1">
                            <label for="due1" class="text-sm">Due On</label>
                            <input id="due1" type="date" class="form-input rounded-lg" placeholder="Date" required="">
                        </div>
                    </div>
                </div>
                <div class="flex sm:flex-row flex-col sm:items-center gap-5 flex-wrap">
                    <div class="space-y-4 flex-1">
                        <label for="billfrom" class="text-sm">Bill From</label>
                        <input id="billfrom" type="text" class="form-input rounded-lg" placeholder="Mike Gipson" required="">
                    </div>
                    <div class="space-y-4 flex-1">
                        <label for="billto" class="text-sm">Bill To</label>
                        <input id="billto" type="text" class="form-input rounded-lg" placeholder="Harold Graves" required="">
                    </div>
                    <div class="space-y-4 flex-1">
                        <label for="receptionemail" class="text-sm">Reception Email</label>
                        <input id="receptionemail" type="email" class="form-input rounded-lg" placeholder="example@gmail.com" required="">
                    </div>
                </div>
                <div class="space-y-4">
                    <label for="billtitle" class="text-sm">Bill Title/Project Desriptions</label>
                    <textarea id="billtitle" rows="5" class="form-input h-auto rounded-lg resize-none" placeholder="Your message..." required=""></textarea>
                </div>
                <div class="space-y-4">
                    <label for="selectOption" class="text-sm">Item</label>
                    <select id="selectOption" class="form-select">
                        <option>Select Option</option>
                        <option>One</option>
                        <option>Two</option>
                        <option>Three</option>
                    </select>
                </div>
                <div class="flex sm:flex-row flex-col sm:items-center gap-5 flex-wrap">
                    <div class="space-y-4 flex-1">
                        <label for="price1" class="text-sm">Price</label>
                        <input id="price1" type="number" class="form-input rounded-lg" placeholder="$1,240" required="">
                    </div>
                    <div class="space-y-4 flex-1">
                        <label for="qty1" class="text-sm">Qty</label>
                        <input id="qty1" type="number" class="form-input rounded-lg" placeholder="05" required="">
                    </div>
                    <div class="space-y-4 flex-1">
                        <label for="totalAmount" class="text-sm">Total Amount</label>
                        <input id="totalAmount" type="number" class="form-input rounded-lg" placeholder="$2,480" required="">
                    </div>
                </div>
                <div class="flex sm:flex-row flex-col items-start gap-5 flex-wrap">
                    <div class="flex-1 text-primary">
                        <button class="flex items-center gap-2.5">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="18" height="18" rx="6" fill="currentColor" />
                                <path d="M9 5C9.44183 5 9.8 5.35817 9.8 5.8V8.20003H12.2C12.6418 8.20003 13 8.5582 13 9.00003C13 9.44185 12.6418 9.80003 12.2 9.80003H9.8L9.8 12.2C9.8 12.6418 9.44183 13 9 13C8.55817 13 8.2 12.6418 8.2 12.2V9.80003H5.8C5.35817 9.80003 5 9.44185 5 9.00003C5 8.5582 5.35817 8.20003 5.8 8.20003H8.2L8.2 5.8C8.2 5.35817 8.55817 5 9 5Z" fill="white" />
                            </svg>
                            Add item
                        </button>
                    </div>
                    <div class="space-y-4 flex-1 max-w-[358px]">
                        <div class="flex items-center justify-between font-semibold">
                            <p>Sub Total</p>
                            <p>$4,315</p>
                        </div>
                        <div class="flex items-center justify-between font-semibold">
                            <p>Tax Vat</p>
                        </div>
                        <div class="flex items-center justify-between font-semibold">
                            <p>Grand Total</p>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <label for="note1" class="text-sm">Note</label>
                    <input id="note1" type="text" class="form-input rounded-lg" placeholder="Item Name" required="">
                </div>
                <div class="flex sm:flex-row flex-col items-start gap-5 flex-wrap">
                    <div class="flex-1">
                        <button type="button" class="btn bg-gray/10 border border-gray/10 rounded-md transition-all duration-300 hover:bg-gray/[0.15] hover:border-gray/[0.15]">Cancel</button>
                    </div>
                    <div class="flex-1 max-w-[358px] flex justify-end items-center gap-2.5 flex-wrap">
                        <button type="button" class="btn bg-gray/10 border border-gray/10 rounded-md transition-all duration-300 hover:bg-gray/[0.15] hover:border-gray/[0.15]">Save as Draft</button>
                        <button type="button" class="btn bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
