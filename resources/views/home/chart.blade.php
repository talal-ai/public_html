@extends('Layout.layout')

@section('content')
<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
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
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="mb-[30px] font-semibold">Top Selling Categories</h2>
            <div id="topsell"></div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="mb-[30px] font-semibold">Clients Charter</h2>
            <div id="topselling"></div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="mb-[30px] font-semibold">Product Analysis</h2>
            <div id="linechart"></div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="mb-[30px] font-semibold">Visitors Overview</h2>
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
            <h2 class="mb-[30px] font-semibold">Account Summary</h2>
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
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="mb-[30px] font-semibold">Clicks Total</h2>
            <div class="grid grid-cols-2 items-center gap-5">
                <div id="photoclick"></div>
                <div id="linkclick"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

    <!-- ApexCharts js -->
    <script src="{{ asset('public/assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('public/assets/js/chart-custom.js') }}"></script>

@endsection