@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Elements</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z" fill="currentColor" />
                    </svg>
                </li>
                <li>Progress Bar</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Default Examples</h2>
            <div class="flex flex-col items-center justify-center gap-5">
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-primary h-4 rounded-full w-3/12"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-primary h-4 rounded-full w-4/12"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-primary h-4 rounded-full w-5/12"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-primary h-4 rounded-full w-6/12"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-primary h-4 rounded-full w-7/12"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-primary h-4 rounded-full w-8/12"></div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Backgrounds Examples</h2>
            <div class="flex flex-col items-center justify-center gap-5">
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-primary h-4 rounded-full w-3/12"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-purple h-4 rounded-full w-4/12"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-success h-4 rounded-full w-5/12"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-warning h-4 rounded-full w-6/12"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-danger h-4 rounded-full w-7/12"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-dark dark:bg-white h-4 rounded-full w-8/12"></div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Labels Example</h2>
            <div class="w-full h-3.5 bg-gray/20 rounded-full">
                <div class="bg-dark dark:bg-white h-3.5 rounded-full w-6/12 text-center flex justify-center items-center">
                    <p class="text-[11px] text-white dark:text-dark align-middle">50%</p>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Multiple bars</h2>
            <div class="w-full flex h-3.5 bg-gray/20 rounded">
                <div class="bg-primary h-3.5 rounded-l w-3/12"></div>
                <div class="bg-success h-3.5 w-3/12"></div>
                <div class="bg-dark dark:bg-white h-3.5 rounded-r w-3/12"></div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Sizes</h2>
            <div class="flex flex-col items-center justify-center gap-5">
                <div class="w-full">
                    <h6 class="text-sm mb-1">Progress sm</h6>
                    <div class="w-full h-1 bg-gray/20 rounded-full">
                        <div class="bg-primary h-1 rounded-full w-3/12"></div>
                    </div>
                </div>
                <div class="w-full">
                    <h6 class="text-sm mb-1">Progress md</h6>
                    <div class="w-full h-2 bg-gray/20 rounded-full">
                        <div class="bg-purple h-2 rounded-full w-4/12"></div>
                    </div>
                </div>
                <div class="w-full">
                    <h6 class="text-sm mb-1">Progress lg</h6>
                    <div class="w-full h-3 bg-gray/20 rounded-full">
                        <div class="bg-success h-3 rounded-full w-5/12"></div>
                    </div>
                </div>
                <div class="w-full">
                    <h6 class="text-sm mb-1">Progress xl</h6>
                    <div class="w-full h-4 bg-gray/20 rounded-full">
                        <div class="bg-danger h-4 rounded-full w-6/12"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Striped</h2>
            <div class="flex flex-col items-center justify-center gap-3">
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-primary h-4 rounded-full w-3/12" style="background-image: linear-gradient(45deg,hsla(0,0%,100%,.15) 25%,transparent 0,transparent 50%,hsla(0,0%,100%,.15) 0,hsla(0,0%,100%,.15) 75%,transparent 0,transparent); background-size: 1rem 1rem;"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-purple h-4 rounded-full w-4/12" style="background-image: linear-gradient(45deg,hsla(0,0%,100%,.15) 25%,transparent 0,transparent 50%,hsla(0,0%,100%,.15) 0,hsla(0,0%,100%,.15) 75%,transparent 0,transparent); background-size: 1rem 1rem;"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-success h-4 rounded-full w-5/12" style="background-image: linear-gradient(45deg,hsla(0,0%,100%,.15) 25%,transparent 0,transparent 50%,hsla(0,0%,100%,.15) 0,hsla(0,0%,100%,.15) 75%,transparent 0,transparent); background-size: 1rem 1rem;"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-danger h-4 rounded-full w-7/12" style="background-image: linear-gradient(45deg,hsla(0,0%,100%,.15) 25%,transparent 0,transparent 50%,hsla(0,0%,100%,.15) 0,hsla(0,0%,100%,.15) 75%,transparent 0,transparent); background-size: 1rem 1rem;"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-warning h-4 rounded-full w-8/12" style="background-image: linear-gradient(45deg,hsla(0,0%,100%,.15) 25%,transparent 0,transparent 50%,hsla(0,0%,100%,.15) 0,hsla(0,0%,100%,.15) 75%,transparent 0,transparent); background-size: 1rem 1rem;"></div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Animated</h2>
            <div class="flex flex-col items-center justify-center gap-3">
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-primary h-4 rounded-full w-3/12 animate-strip" style="background-image: linear-gradient(45deg,hsla(0,0%,100%,.15) 25%,transparent 0,transparent 50%,hsla(0,0%,100%,.15) 0,hsla(0,0%,100%,.15) 75%,transparent 0,transparent); background-size: 1rem 1rem;"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-purple h-4 rounded-full w-4/12 animate-strip" style="background-image: linear-gradient(45deg,hsla(0,0%,100%,.15) 25%,transparent 0,transparent 50%,hsla(0,0%,100%,.15) 0,hsla(0,0%,100%,.15) 75%,transparent 0,transparent); background-size: 1rem 1rem;"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-success h-4 rounded-full w-5/12 animate-strip" style="background-image: linear-gradient(45deg,hsla(0,0%,100%,.15) 25%,transparent 0,transparent 50%,hsla(0,0%,100%,.15) 0,hsla(0,0%,100%,.15) 75%,transparent 0,transparent); background-size: 1rem 1rem;"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-danger h-4 rounded-full w-7/12 animate-strip" style="background-image: linear-gradient(45deg,hsla(0,0%,100%,.15) 25%,transparent 0,transparent 50%,hsla(0,0%,100%,.15) 0,hsla(0,0%,100%,.15) 75%,transparent 0,transparent); background-size: 1rem 1rem;"></div>
                </div>
                <div class="w-full h-4 bg-gray/20 rounded-full">
                    <div class="bg-warning h-4 rounded-full w-8/12 animate-strip" style="background-image: linear-gradient(45deg,hsla(0,0%,100%,.15) 25%,transparent 0,transparent 50%,hsla(0,0%,100%,.15) 0,hsla(0,0%,100%,.15) 75%,transparent 0,transparent); background-size: 1rem 1rem;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
