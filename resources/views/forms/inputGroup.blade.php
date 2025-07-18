@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Forms</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z" fill="currentColor" />
                    </svg>
                </li>
                <li>Input Group</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Input Group</h2>
            <form class="space-y-4">
                <label class="flex">
                    <div class="flex items-center border-r-0 justify-center rounded-l border-2 border-gray/10 bg-gray/[8%] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 px-3.5">
                        <span>@</span>
                    </div>
                    <input id="user1" class="form-input rounded-l-none rounded-r" placeholder="Username" type="text">
                </label>
                <label class="flex">
                    <input id="user2" class="form-input rounded-r-none" placeholder="Username" type="text">
                    <div class="flex items-center justify-center rounded-r border-l-0 border-2 border-gray/10 bg-gray/[8%] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 px-3.5">
                        <span>@site.com</span>
                    </div>
                </label>
                <label class="flex">
                    <div class="flex items-center justify-center rounded-l border-r-0 border-2 border-gray/10 bg-gray/[8%] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 px-3.5">
                        <span>$</span>
                    </div>
                    <input id="user3" class="form-input rounded-none" placeholder="Enter Price" type="text">
                    <div class="flex items-center justify-center border-l-0 rounded-r border-2 border-gray/10 bg-gray/[8%] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 px-3.5">
                        <span>.00</span>
                    </div>
                </label>
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Other Input</h2>
            <form class="space-y-4">
                <div class="flex -space-x-px">
                    <input id="user4" class="form-input rounded-r-none hover:z-10 focus:z-10" placeholder="Username" type="text">
                    <div class="flex items-center justify-center px-3.5 border-2 border-gray/10 bg-gray/[8%] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10">
                        <span class="-mt-1">@</span>
                    </div>
                    <input id="server1" class="form-input rounded-l-none" placeholder="Server" type="text">
                </div>
                <label class="flex">
                    <input id="user9" class="form-input rounded-r-none" placeholder="Username" type="text">
                    <div class="flex items-center justify-center rounded-r border-l-0 border-2 border-gray/10 bg-gray/[8%] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 px-3.5">
                        <span>@site.com</span>
                    </div>
                </label>
                <label class="flex">
                    <div class="flex items-center justify-center rounded-l border-r-0 border-2 border-gray/10 bg-gray/[8%] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 px-3.5">
                        <span>$</span>
                    </div>
                    <input id="price1" class="form-input rounded-none" placeholder="Enter Price" type="text">
                    <div class="flex items-center justify-center border-l-0 rounded-r border-2 border-gray/10 bg-gray/[8%] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 px-3.5">
                        <span>.00</span>
                    </div>
                </label>
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Icon Input</h2>
            <form class="space-y-4">
                <label class="flex">
                    <div class="flex items-center border-r-0 justify-center rounded-l border-2 border-primary bg-primary dark:border-lightgray/20 text-white px-3.5">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M18.7491 9V9.7041C18.7491 10.5491 18.9903 11.3752 19.4422 12.0782L20.5496 13.8012C21.5612 15.3749 20.789 17.5139 19.0296 18.0116C14.4273 19.3134 9.57274 19.3134 4.97036 18.0116C3.21105 17.5139 2.43882 15.3749 3.45036 13.8012L4.5578 12.0782C5.00972 11.3752 5.25087 10.5491 5.25087 9.7041V9C5.25087 5.13401 8.27256 2 12 2C15.7274 2 18.7491 5.13401 18.7491 9Z" fill="currentColor"></path>
                                <path d="M12.75 6C12.75 5.58579 12.4142 5.25 12 5.25C11.5858 5.25 11.25 5.58579 11.25 6V10C11.25 10.4142 11.5858 10.75 12 10.75C12.4142 10.75 12.75 10.4142 12.75 10V6Z" fill="currentColor"></path>
                                <path d="M7.24316 18.5449C7.8941 20.5501 9.77767 21.9997 11.9998 21.9997C14.222 21.9997 16.1055 20.5501 16.7565 18.5449C13.611 19.1352 10.3886 19.1352 7.24316 18.5449Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </div>
                    <input id="user5" class="form-input rounded-l-none rounded-r" placeholder="Username" type="text">
                </label>
                <label class="flex">
                    <input id="price1" class="form-input rounded-r-none" placeholder="Enter Price" type="text">
                    <div class="flex items-center justify-center border-l-0 rounded-r border-2 border-primary bg-primary dark:border-lightgray/20 text-white px-3.5">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M18.7491 9V9.7041C18.7491 10.5491 18.9903 11.3752 19.4422 12.0782L20.5496 13.8012C21.5612 15.3749 20.789 17.5139 19.0296 18.0116C14.4273 19.3134 9.57274 19.3134 4.97036 18.0116C3.21105 17.5139 2.43882 15.3749 3.45036 13.8012L4.5578 12.0782C5.00972 11.3752 5.25087 10.5491 5.25087 9.7041V9C5.25087 5.13401 8.27256 2 12 2C15.7274 2 18.7491 5.13401 18.7491 9Z" fill="currentColor"></path>
                                <path d="M12.75 6C12.75 5.58579 12.4142 5.25 12 5.25C11.5858 5.25 11.25 5.58579 11.25 6V10C11.25 10.4142 11.5858 10.75 12 10.75C12.4142 10.75 12.75 10.4142 12.75 10V6Z" fill="currentColor"></path>
                                <path d="M7.24316 18.5449C7.8941 20.5501 9.77767 21.9997 11.9998 21.9997C14.222 21.9997 16.1055 20.5501 16.7565 18.5449C13.611 19.1352 10.3886 19.1352 7.24316 18.5449Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </div>
                </label>
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Icon Input</h2>
            <form class="space-y-4">
                <label class="flex">
                    <button class="rounded-r-none btn bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">
                        Button
                    </button>
                    <input id="user6" class="form-input rounded-l-none rounded-r" placeholder="Username" type="text">
                </label>
                <label class="flex">
                    <input id="price2" class="form-input rounded-r-none" placeholder="Enter Price" type="text">
                    <button class="rounded-l-none btn bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">
                        Button
                    </button>
                </label>
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Input Group Sizes</h2>
            <form class="space-y-4">
                <label class="flex">
                    <div class="flex items-center border-r-0 justify-center rounded-l border-2 border-gray/10 bg-gray/[8%] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 px-3.5">
                        <span>@</span>
                    </div>
                    <input id="user7" class="form-input rounded-l-none rounded-r h-14" placeholder="Username" type="text">
                </label>
                <label class="flex">
                    <div class="flex items-center border-r-0 justify-center rounded-l border-2 border-gray/10 bg-gray/[8%] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 px-3.5">
                        <span>@</span>
                    </div>
                    <input id="user8" class="form-input rounded-l-none rounded-r" placeholder="Username" type="text">
                </label>
                <label class="flex">
                    <div class="flex items-center border-r-0 justify-center rounded-l border-2 border-gray/10 bg-gray/[8%] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 px-3.5">
                        <span>@</span>
                    </div>
                    <input id="user9" class="form-input rounded-l-none rounded-r h-10" placeholder="Username" type="text">
                </label>
            </form>
        </div>
    </div>
</div>

@endsection
