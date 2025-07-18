@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 gap-4" x-data="chat">
        <div class="flex gap-5 relative overflow-hidden">
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-l-lg xl:rounded-lg py-5 absolute w-72 sm:w-[410px] z-20 flex-none -left-[410px] xl:static overflow-hidden"
                :class="isShowChatMenu && '!left-0'">
                <div class="px-5">
                    <div class="flex items-center gap-5">
                        <form class="w-full">
                            <div class="relative">
                                <input type="text" id="search"
                                    class="form-input ps-10 h-[42px] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 border-2 border-gray/10 bg-gray/[8%] rounded-full text-sm text-dark placeholder:text-lightgray/80 focus:ring-0 focus:border-primary/80 focus:outline-0"
                                    placeholder="Search..." required="">
                                <button type="button" class="absolute inset-y-0 left-3 flex items-center">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_87_857)">
                                            <circle cx="8.625" cy="8.625" r="7.125" stroke="#267DFF" stroke-width="2">
                                            </circle>
                                            <path opacity="0.3" d="M15 15L16.5 16.5" stroke="#267DFF" stroke-width="2"
                                                stroke-linecap="round"></path>
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
                        <div class="flex items-center gap-5">
                            <div x-data="{ dropdown: false}" class="dropdown ml-auto">
                                <a href="javaScript:;" class="text-lightgray hover:text-primary duration-300"
                                    @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.3916 1.83383C10.3706 1.83383 9.44075 2.38448 7.58109 3.48577L6.95211 3.85825C5.09245 4.95954 4.16262 5.51019 3.65211 6.41716C3.1416 7.32414 3.1416 8.42543 3.1416 10.628V11.373C3.1416 13.5756 3.1416 14.6769 3.65211 15.5838C4.16262 16.4908 5.09245 17.0415 6.95211 18.1427L7.58109 18.5152C9.44075 19.6165 10.3706 20.1672 11.3916 20.1672C12.4126 20.1672 13.3425 19.6165 15.2021 18.5152L15.8311 18.1427C17.6907 17.0415 18.6206 16.4908 19.1311 15.5838C19.6416 14.6769 19.6416 13.5756 19.6416 11.373V10.628C19.6416 8.42543 19.6416 7.32414 19.1311 6.41716C18.6206 5.51019 17.6907 4.95954 15.8311 3.85825L15.2021 3.48577C13.3425 2.38448 12.4126 1.83383 11.3916 1.83383Z"
                                            fill="currentColor" />
                                        <path
                                            d="M11.3916 7.56299C9.49312 7.56299 7.9541 9.10201 7.9541 11.0005C7.9541 12.899 9.49312 14.438 11.3916 14.438C13.2901 14.438 14.8291 12.899 14.8291 11.0005C14.8291 9.10201 13.2901 7.56299 11.3916 7.56299Z"
                                            fill="currentColor" />
                                    </svg>
                                </a>
                                <ul x-show="dropdown" @click.away="dropdown = false" x-transition=""
                                    x-transition.duration.300ms="" class="right-0 whitespace-nowrap">
                                    <li><a href="javascript:;">All</a></li>
                                    <li><a href="javascript:;">Read</a></li>
                                    <li><a href="javascript:;">Unread</a></li>
                                </ul>
                            </div>
                            <span class="text-lightgray hover:text-primary duration-300">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M19.1108 7.98747C20.5186 6.57974 20.5186 4.29736 19.1108 2.88963C17.7031 1.4819 15.4207 1.4819 14.013 2.88963L13.1999 3.70275C13.211 3.73637 13.2225 3.77046 13.2345 3.80499C13.5326 4.66404 14.0949 5.79017 15.1527 6.84802C16.2106 7.90586 17.3367 8.46819 18.1958 8.76623C18.2301 8.77816 18.2641 8.78965 18.2975 8.80074L19.1108 7.98747Z"
                                        fill="currentColor" />
                                    <path
                                        d="M13.2349 3.66714L13.1999 3.70216C13.211 3.73578 13.2226 3.76987 13.2345 3.8044C13.5326 4.66344 14.0949 5.78958 15.1527 6.84742C16.2106 7.90527 17.3367 8.4676 18.1958 8.76564C18.2299 8.77746 18.2635 8.78886 18.2967 8.79986L10.4496 16.6469C9.92058 17.176 9.656 17.4405 9.36433 17.668C9.02026 17.9364 8.64798 18.1665 8.25408 18.3542C7.92015 18.5134 7.56523 18.6317 6.85543 18.8683L3.11237 20.1159C2.76306 20.2324 2.37795 20.1415 2.11759 19.8811C1.85724 19.6208 1.76632 19.2356 1.88276 18.8863L3.13044 15.1433C3.36705 14.4335 3.48535 14.0786 3.64449 13.7446C3.83222 13.3507 4.0623 12.9784 4.33067 12.6344C4.55816 12.3427 4.82269 12.0782 5.35169 11.5492L13.2349 3.66714Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between gap-3 mt-[30px]">
                        <h2 class="font-semibold">Online Now</h2>
                        <a href="javascript:;" class="text-primary flex items-center gap-1.5">
                            More
                            <svg class="shrink-0" width="12" height="12" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.70663 1.29335C4.31611 0.902827 3.68294 0.902826 3.29242 1.29335C2.9019 1.68388 2.9019 2.31704 3.29242 2.70756L6.58531 6.00046L3.29242 9.29335C2.9019 9.68387 2.9019 10.317 3.29242 10.7076C3.68294 11.0981 4.31611 11.0981 4.70663 10.7076L8.70663 6.70757C9.09716 6.31704 9.09716 5.68388 8.70663 5.29335L4.70663 1.29335Z"
                                    fill="currentColor" />
                            </svg>
                        </a>
                    </div>
                    <div class="flex items-center overflow-auto pb-2 gap-2 justify-between mt-5">
                        @foreach ($users as $key => $user)
                            <img src="https://ui-avatars.com/api/?name=User+{{$key}}" class="h-[42px] rounded-full" alt="">
                        @endforeach
                    </div>
                </div>
                <div class="my-5 bg-gray/10 h-[2px] block mx-5"></div>
                <livewire:chat.chat-list :selectedConversation="$selectedConversation" :query="$query">
            </div>
            <div class="bg-dark/90 dark:bg-white/5 backdrop-blur-sm lg:hidden z-[5] w-full h-full absolute rounded-md hidden"
                :class="isShowChatMenu && '!block xl:!hidden'" @click="isShowChatMenu = !isShowChatMenu"></div>
            <div
                class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg flex-grow min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)] flex items-center justify-center">
                <p>Choose a conversation to start chat</p>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script src="{{ asset('public/vendor/livewire/livewire.js') }}"></script>
@endsection