@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Components</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z" fill="currentColor" />
                    </svg>
                </li>
                <li>Tabs</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Default Tabs</h2>
            <div x-data="{activeDefTab:'profile'}">
                <ul class="flex flex-wrap text-sm text-center dark:border-gray/20 border-b border-lightgray/10">
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'profile'" :class="activeDefTab === 'profile' ? 'bg-primary/10 text-primary' : 'bg-transparent text-gray hover:bg-primary/10 hover:text-primary'" class="inline-block px-5 py-3 rounded-t-lg">
                            Profile
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'dashboard'" :class="activeDefTab === 'dashboard' ? 'bg-primary/10 text-primary' : 'bg-transparent text-gray hover:bg-primary/10 hover:text-primary'" class="inline-block px-5 py-3 rounded-t-lg">
                            Dashboard
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'settings'" :class="activeDefTab === 'settings' ? 'bg-primary/10 text-primary' : 'bg-transparent text-gray hover:bg-primary/10 hover:text-primary'" class="inline-block px-5 py-3 rounded-t-lg">
                            Settings
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'contacts'" :class="activeDefTab === 'contacts' ? 'bg-primary/10 text-primary' : 'bg-transparent text-gray hover:bg-primary/10 hover:text-primary'" class="inline-block px-5 py-3 rounded-t-lg">
                            Contacts
                        </a>
                    </li>
                    <li>
                        <a class="inline-block py-3 px-5 text-gray/60 rounded-t-lg cursor-not-allowed">Disabled</a>
                    </li>
                </ul>
                <div class="mt-3 text-lightgray font-normal">
                    <div x-show="activeDefTab === 'profile'" class="text-sm/relaxed">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'dashboard'" class="text-sm/relaxed">
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                            distribution of letters, as opposed to using 'Content here,
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'settings'" class="text-sm/relaxed">
                        <p>
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin
                            professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'contacts'" class="text-sm/relaxed">
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Tabs With Underline</h2>
            <div x-data="{activeDefTab:'profile'}">
                <ul class="flex flex-wrap text-sm text-center dark:border-gray/20 border-b border-lightgray/10">
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'profile'" :class="activeDefTab === 'profile' ? 'border-primary border-b-2 text-primary' : 'bg-transparent border-b-2 border-transparent hover:border-primary text-gray hover:text-primary'" class="inline-block px-5 py-3">
                            Profile
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'dashboard'" :class="activeDefTab === 'dashboard' ? 'border-primary border-b-2 text-primary' : 'bg-transparent border-b-2 border-transparent hover:border-primary text-gray hover:text-primary'" class="inline-block px-5 py-3">
                            Dashboard
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'settings'" :class="activeDefTab === 'settings' ? 'border-primary border-b-2 text-primary' : 'bg-transparent border-b-2 border-transparent hover:border-primary text-gray hover:text-primary'" class="inline-block px-5 py-3">
                            Settings
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'contacts'" :class="activeDefTab === 'contacts' ? 'border-primary border-b-2 text-primary' : 'bg-transparent border-b-2 border-transparent hover:border-primary text-gray hover:text-primary'" class="inline-block px-5 py-3">
                            Contacts
                        </a>
                    </li>
                    <li>
                        <a class="inline-block py-3 px-5 text-gray/60 rounded-t-lg cursor-not-allowed">Disabled</a>
                    </li>
                </ul>
                <div class="mt-3 text-lightgray font-normal">
                    <div x-show="activeDefTab === 'profile'" class="text-sm/relaxed">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'dashboard'" class="text-sm/relaxed">
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                            distribution of letters, as opposed to using 'Content here,
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'settings'" class="text-sm/relaxed">
                        <p>
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin
                            professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'contacts'" class="text-sm/relaxed">
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Tabs With Icons</h2>
            <div x-data="{activeDefTab:'profile'}">
                <ul class="flex flex-wrap text-sm text-center dark:border-gray/20 border-b border-lightgray/10">
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'profile'" :class="activeDefTab === 'profile' ? 'border-primary border-b-2 text-primary' : 'bg-transparent border-b-2 border-transparent hover:border-primary text-gray hover:text-primary'" class="flex items-center gap-2 px-5 py-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M15 7.5C15 8.48891 14.7068 9.4556 14.1574 10.2779C13.6079 11.1001 12.8271 11.741 11.9134 12.1194C10.9998 12.4978 9.99446 12.5969 9.02455 12.4039C8.05465 12.211 7.16373 11.7348 6.46447 11.0355C5.76521 10.3363 5.289 9.44536 5.09608 8.47545C4.90315 7.50555 5.00217 6.50021 5.3806 5.58658C5.75904 4.67295 6.39991 3.89206 7.22215 3.34265C8.0444 2.79324 9.0111 2.5 10 2.5C11.3261 2.5 12.5979 3.02678 13.5355 3.96447C14.4732 4.90215 15 6.17392 15 7.5Z" fill="currentColor" />
                                <path d="M18.0407 16.5625C16.8508 14.5055 15.0172 13.0305 12.8774 12.3313C13.9358 11.7011 14.7582 10.741 15.2182 9.59828C15.6781 8.45556 15.7503 7.19344 15.4235 6.00575C15.0968 4.81806 14.3892 3.77047 13.4094 3.02385C12.4296 2.27724 11.2318 1.87288 10 1.87288C8.76821 1.87288 7.57044 2.27724 6.59067 3.02385C5.6109 3.77047 4.90331 4.81806 4.57654 6.00575C4.24978 7.19344 4.32193 8.45556 4.78189 9.59828C5.24186 10.741 6.06422 11.7011 7.12268 12.3313C4.98284 13.0297 3.14925 14.5047 1.9594 16.5625C1.91577 16.6337 1.88683 16.7128 1.87429 16.7953C1.86174 16.8778 1.86585 16.962 1.88638 17.0429C1.9069 17.1238 1.94341 17.1998 1.99377 17.2664C2.04413 17.3329 2.10731 17.3887 2.17958 17.4305C2.25185 17.4722 2.33175 17.4991 2.41457 17.5094C2.49738 17.5198 2.58143 17.5135 2.66176 17.4908C2.74209 17.4682 2.81708 17.4297 2.88228 17.3776C2.94749 17.3255 3.00161 17.2608 3.04143 17.1875C4.51331 14.6438 7.11487 13.125 10 13.125C12.8852 13.125 15.4867 14.6438 16.9586 17.1875C16.9984 17.2608 17.0526 17.3255 17.1178 17.3776C17.183 17.4297 17.258 17.4682 17.3383 17.4908C17.4186 17.5135 17.5027 17.5198 17.5855 17.5094C17.6683 17.4991 17.7482 17.4722 17.8205 17.4305C17.8927 17.3887 17.9559 17.3329 18.0063 17.2664C18.0566 17.1998 18.0932 17.1238 18.1137 17.0429C18.1342 16.962 18.1383 16.8778 18.1258 16.7953C18.1132 16.7128 18.0843 16.6337 18.0407 16.5625ZM5.62503 7.5C5.62503 6.63471 5.88162 5.78885 6.36235 5.06938C6.84308 4.34992 7.52636 3.78916 8.32579 3.45803C9.12521 3.1269 10.0049 3.04026 10.8535 3.20907C11.7022 3.37788 12.4818 3.79456 13.0936 4.40641C13.7055 5.01827 14.1222 5.79782 14.291 6.64648C14.4598 7.49515 14.3731 8.37482 14.042 9.17424C13.7109 9.97367 13.1501 10.657 12.4306 11.1377C11.7112 11.6184 10.8653 11.875 10 11.875C8.84009 11.8738 7.72801 11.4124 6.90781 10.5922C6.0876 9.77202 5.62627 8.65995 5.62503 7.5Z" fill="currentColor" />
                            </svg>
                            Profile
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'dashboard'" :class="activeDefTab === 'dashboard' ? 'border-primary border-b-2 text-primary' : 'bg-transparent border-b-2 border-transparent hover:border-primary text-gray hover:text-primary'" class="flex items-center gap-2 px-5 py-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M8.75 4.375V8.125C8.75 8.29076 8.68415 8.44973 8.56694 8.56694C8.44973 8.68415 8.29076 8.75 8.125 8.75H4.375C4.20924 8.75 4.05027 8.68415 3.93306 8.56694C3.81585 8.44973 3.75 8.29076 3.75 8.125V4.375C3.75 4.20924 3.81585 4.05027 3.93306 3.93306C4.05027 3.81585 4.20924 3.75 4.375 3.75H8.125C8.29076 3.75 8.44973 3.81585 8.56694 3.93306C8.68415 4.05027 8.75 4.20924 8.75 4.375ZM15.625 3.75H11.875C11.7092 3.75 11.5503 3.81585 11.4331 3.93306C11.3158 4.05027 11.25 4.20924 11.25 4.375V8.125C11.25 8.29076 11.3158 8.44973 11.4331 8.56694C11.5503 8.68415 11.7092 8.75 11.875 8.75H15.625C15.7908 8.75 15.9497 8.68415 16.0669 8.56694C16.1842 8.44973 16.25 8.29076 16.25 8.125V4.375C16.25 4.20924 16.1842 4.05027 16.0669 3.93306C15.9497 3.81585 15.7908 3.75 15.625 3.75ZM8.125 11.25H4.375C4.20924 11.25 4.05027 11.3158 3.93306 11.4331C3.81585 11.5503 3.75 11.7092 3.75 11.875V15.625C3.75 15.7908 3.81585 15.9497 3.93306 16.0669C4.05027 16.1842 4.20924 16.25 4.375 16.25H8.125C8.29076 16.25 8.44973 16.1842 8.56694 16.0669C8.68415 15.9497 8.75 15.7908 8.75 15.625V11.875C8.75 11.7092 8.68415 11.5503 8.56694 11.4331C8.44973 11.3158 8.29076 11.25 8.125 11.25ZM15.625 11.25H11.875C11.7092 11.25 11.5503 11.3158 11.4331 11.4331C11.3158 11.5503 11.25 11.7092 11.25 11.875V15.625C11.25 15.7908 11.3158 15.9497 11.4331 16.0669C11.5503 16.1842 11.7092 16.25 11.875 16.25H15.625C15.7908 16.25 15.9497 16.1842 16.0669 16.0669C16.1842 15.9497 16.25 15.7908 16.25 15.625V11.875C16.25 11.7092 16.1842 11.5503 16.0669 11.4331C15.9497 11.3158 15.7908 11.25 15.625 11.25Z" fill="currentColor" />
                                <path d="M15.625 10.625H11.875C11.5435 10.625 11.2255 10.7567 10.9911 10.9911C10.7567 11.2255 10.625 11.5435 10.625 11.875V15.625C10.625 15.9565 10.7567 16.2745 10.9911 16.5089C11.2255 16.7433 11.5435 16.875 11.875 16.875H15.625C15.9565 16.875 16.2745 16.7433 16.5089 16.5089C16.7433 16.2745 16.875 15.9565 16.875 15.625V11.875C16.875 11.5435 16.7433 11.2255 16.5089 10.9911C16.2745 10.7567 15.9565 10.625 15.625 10.625ZM15.625 15.625H11.875V11.875H15.625V15.625ZM8.125 3.125H4.375C4.04348 3.125 3.72554 3.2567 3.49112 3.49112C3.2567 3.72554 3.125 4.04348 3.125 4.375V8.125C3.125 8.45652 3.2567 8.77446 3.49112 9.00888C3.72554 9.2433 4.04348 9.375 4.375 9.375H8.125C8.45652 9.375 8.77446 9.2433 9.00888 9.00888C9.2433 8.77446 9.375 8.45652 9.375 8.125V4.375C9.375 4.04348 9.2433 3.72554 9.00888 3.49112C8.77446 3.2567 8.45652 3.125 8.125 3.125ZM8.125 8.125H4.375V4.375H8.125V8.125ZM15.625 3.125H11.875C11.5435 3.125 11.2255 3.2567 10.9911 3.49112C10.7567 3.72554 10.625 4.04348 10.625 4.375V8.125C10.625 8.45652 10.7567 8.77446 10.9911 9.00888C11.2255 9.2433 11.5435 9.375 11.875 9.375H15.625C15.9565 9.375 16.2745 9.2433 16.5089 9.00888C16.7433 8.77446 16.875 8.45652 16.875 8.125V4.375C16.875 4.04348 16.7433 3.72554 16.5089 3.49112C16.2745 3.2567 15.9565 3.125 15.625 3.125ZM15.625 8.125H11.875V4.375H15.625V8.125ZM8.125 10.625H4.375C4.04348 10.625 3.72554 10.7567 3.49112 10.9911C3.2567 11.2255 3.125 11.5435 3.125 11.875V15.625C3.125 15.9565 3.2567 16.2745 3.49112 16.5089C3.72554 16.7433 4.04348 16.875 4.375 16.875H8.125C8.45652 16.875 8.77446 16.7433 9.00888 16.5089C9.2433 16.2745 9.375 15.9565 9.375 15.625V11.875C9.375 11.5435 9.2433 11.2255 9.00888 10.9911C8.77446 10.7567 8.45652 10.625 8.125 10.625ZM8.125 15.625H4.375V11.875H8.125V15.625Z" fill="currentColor" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'settings'" :class="activeDefTab === 'settings' ? 'border-primary border-b-2 text-primary' : 'bg-transparent border-b-2 border-transparent hover:border-primary text-gray hover:text-primary'" class="flex items-center gap-2 px-5 py-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M17.9765 8.49688L15.4882 7.07969C15.4382 6.98906 15.3859 6.90078 15.3319 6.81328L15.3226 4.00078C14.5362 3.33712 13.6315 2.82794 12.6562 2.5L10.1562 3.89766C10.0515 3.89766 9.94601 3.89766 9.84367 3.89766L7.34367 2.5C6.3686 2.82901 5.46447 3.33925 4.67882 4.00391L4.66632 6.81641C4.61164 6.90391 4.55929 6.99297 4.51007 7.08281L2.02257 8.49688C1.82646 9.48884 1.82646 10.5096 2.02257 11.5016L4.51085 12.9188C4.56085 13.0094 4.6132 13.0977 4.6671 13.1852L4.67648 15.9977C5.46298 16.662 6.36792 17.1717 7.34367 17.5L9.84367 16.1039C9.94835 16.1039 10.0538 16.1039 10.1562 16.1039L12.6562 17.5C13.6304 17.1707 14.5337 16.6605 15.3187 15.9961L15.3312 13.1836C15.3859 13.0961 15.4382 13.007 15.4874 12.9172L17.9749 11.5031C18.1718 10.5108 18.1723 9.48945 17.9765 8.49688ZM9.99992 13.125C9.38185 13.125 8.77766 12.9417 8.26376 12.5983C7.74986 12.255 7.34932 11.7669 7.11279 11.1959C6.87627 10.6249 6.81438 9.99653 6.93496 9.39034C7.05554 8.78415 7.35317 8.22733 7.79021 7.79029C8.22725 7.35325 8.78407 7.05562 9.39026 6.93505C9.99645 6.81447 10.6248 6.87635 11.1958 7.11288C11.7668 7.3494 12.2549 7.74994 12.5983 8.26384C12.9416 8.77775 13.1249 9.38193 13.1249 10C13.1249 10.8288 12.7957 11.6237 12.2096 12.2097C11.6236 12.7958 10.8287 13.125 9.99992 13.125Z" fill="currentColor" />
                                <path d="M9.9999 6.25C9.25822 6.25 8.5332 6.46993 7.91652 6.88198C7.29983 7.29404 6.81918 7.87971 6.53536 8.56493C6.25153 9.25016 6.17727 10.0042 6.32196 10.7316C6.46665 11.459 6.82381 12.1272 7.34825 12.6516C7.8727 13.1761 8.54089 13.5332 9.26832 13.6779C9.99574 13.8226 10.7497 13.7484 11.435 13.4645C12.1202 13.1807 12.7059 12.7001 13.1179 12.0834C13.53 11.4667 13.7499 10.7417 13.7499 10C13.7489 9.00575 13.3535 8.05252 12.6504 7.34949C11.9474 6.64645 10.9941 6.25103 9.9999 6.25ZM9.9999 12.5C9.50545 12.5 9.0221 12.3534 8.61098 12.0787C8.19986 11.804 7.87942 11.4135 7.69021 10.9567C7.50099 10.4999 7.45148 9.99722 7.54794 9.51227C7.6444 9.02732 7.88251 8.58186 8.23214 8.23223C8.58177 7.8826 9.02723 7.6445 9.51218 7.54803C9.99713 7.45157 10.4998 7.50108 10.9566 7.6903C11.4134 7.87952 11.8039 8.19995 12.0786 8.61107C12.3533 9.02219 12.4999 9.50554 12.4999 10C12.4999 10.663 12.2365 11.2989 11.7677 11.7678C11.2988 12.2366 10.6629 12.5 9.9999 12.5ZM18.589 8.37578C18.5716 8.28776 18.5354 8.20453 18.483 8.13174C18.4305 8.05894 18.363 7.99829 18.2851 7.9539L15.9546 6.62578L15.9452 3.99921C15.9449 3.90876 15.925 3.81944 15.8868 3.73743C15.8487 3.65542 15.7932 3.58267 15.7241 3.52421C14.8788 2.80913 13.9053 2.26114 12.8554 1.90937C12.7727 1.88139 12.6851 1.87103 12.5981 1.87897C12.5112 1.88691 12.4269 1.91297 12.3507 1.95546L9.9999 3.26953L7.64678 1.95312C7.57049 1.91038 7.48609 1.88413 7.39902 1.87605C7.31195 1.86798 7.22416 1.87826 7.14131 1.90625C6.09207 2.26027 5.11962 2.81039 4.27569 3.52734C4.20675 3.58571 4.15129 3.65833 4.11313 3.7402C4.07496 3.82206 4.05499 3.91123 4.05459 4.00156L4.04287 6.63046L1.7124 7.95859C1.63444 8.00298 1.56694 8.06363 1.5145 8.13642C1.46206 8.20922 1.42591 8.29245 1.4085 8.38046C1.19521 9.45225 1.19521 10.5556 1.4085 11.6273C1.42591 11.7154 1.46206 11.7986 1.5145 11.8714C1.56694 11.9442 1.63444 12.0048 1.7124 12.0492L4.04287 13.3773L4.05225 16.0047C4.05253 16.0951 4.07245 16.1845 4.11062 16.2665C4.14879 16.3485 4.20431 16.4212 4.27334 16.4797C5.11871 17.1948 6.09221 17.7428 7.14209 18.0945C7.22477 18.1225 7.31239 18.1329 7.39932 18.1249C7.48624 18.117 7.57054 18.0909 7.64678 18.0484L9.9999 16.7305L12.353 18.0469C12.4462 18.0988 12.5511 18.1257 12.6577 18.125C12.726 18.125 12.7938 18.1139 12.8585 18.0922C13.9075 17.7383 14.8799 17.1888 15.7241 16.4727C15.7931 16.4143 15.8485 16.3417 15.8867 16.2598C15.9249 16.1779 15.9448 16.0888 15.9452 15.9984L15.9569 13.3695L18.2874 12.0414C18.3654 11.997 18.4329 11.9364 18.4853 11.8636C18.5378 11.7908 18.5739 11.7075 18.5913 11.6195C18.8034 10.5486 18.8026 9.4464 18.589 8.37578ZM17.4171 11.1031L15.1851 12.3727C15.0873 12.4283 15.0063 12.5092 14.9507 12.607C14.9054 12.6852 14.8577 12.768 14.8093 12.8461C14.7473 12.9446 14.7142 13.0586 14.714 13.175L14.7022 15.6945C14.1023 16.1657 13.4339 16.5424 12.7202 16.8117L10.4687 15.557C10.3752 15.5053 10.27 15.4784 10.1632 15.4789H10.1483C10.0538 15.4789 9.9585 15.4789 9.86397 15.4789C9.75217 15.4762 9.64165 15.5031 9.54365 15.557L7.29053 16.8148C6.5753 16.5476 5.90508 16.1727 5.30303 15.7031L5.29444 13.1875C5.29405 13.0709 5.26104 12.9567 5.19912 12.8578C5.15069 12.7797 5.10303 12.7016 5.0585 12.6187C5.00328 12.5194 4.92232 12.4369 4.82412 12.3797L2.58975 11.107C2.47412 10.3756 2.47412 9.63061 2.58975 8.89921L4.81787 7.62734C4.91567 7.57173 4.99664 7.49076 5.05225 7.39296C5.09756 7.31484 5.14522 7.23203 5.19365 7.1539C5.25566 7.05538 5.28869 6.9414 5.28897 6.825L5.30069 4.30546C5.90063 3.83433 6.56901 3.45759 7.28272 3.18828L9.53115 4.44296C9.62901 4.49721 9.73963 4.52419 9.85147 4.52109C9.946 4.52109 10.0413 4.52109 10.1358 4.52109C10.2477 4.52419 10.3583 4.49721 10.4562 4.44296L12.7093 3.18515C13.4245 3.4524 14.0947 3.82729 14.6968 4.29687L14.7054 6.81249C14.7058 6.92913 14.7388 7.04333 14.8007 7.14218C14.8491 7.22031 14.8968 7.29843 14.9413 7.38125C14.9965 7.48055 15.0775 7.56314 15.1757 7.62031L17.4101 8.89296C17.5272 9.62492 17.5285 10.3708 17.414 11.1031H17.4171Z" fill="currentColor" />
                            </svg>
                            Settings
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'contacts'" :class="activeDefTab === 'contacts' ? 'border-primary border-b-2 text-primary' : 'bg-transparent border-b-2 border-transparent hover:border-primary text-gray hover:text-primary'" class="flex items-center gap-2 px-5 py-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M6.25 11.25V14.375C6.25 14.7065 6.1183 15.0245 5.88388 15.2589C5.64946 15.4933 5.33152 15.625 5 15.625H3.75C3.41848 15.625 3.10054 15.4933 2.86612 15.2589C2.6317 15.0245 2.5 14.7065 2.5 14.375V10H5C5.33152 10 5.64946 10.1317 5.88388 10.3661C6.1183 10.6005 6.25 10.9185 6.25 11.25ZM15 10C14.6685 10 14.3505 10.1317 14.1161 10.3661C13.8817 10.6005 13.75 10.9185 13.75 11.25V14.375C13.75 14.7065 13.8817 15.0245 14.1161 15.2589C14.3505 15.4933 14.6685 15.625 15 15.625H17.5V10H15Z" fill="currentColor" />
                                <path d="M15.7727 4.27032C14.6376 3.12859 13.1891 2.34952 11.6108 2.03182C10.0325 1.71413 8.39541 1.87211 6.90698 2.48576C5.41856 3.0994 4.1458 4.14108 3.24998 5.4788C2.35417 6.81651 1.87563 8.39005 1.875 10V14.375C1.875 14.8723 2.07254 15.3492 2.42417 15.7008C2.77581 16.0525 3.25272 16.25 3.75 16.25H5C5.49728 16.25 5.97419 16.0525 6.32583 15.7008C6.67746 15.3492 6.875 14.8723 6.875 14.375V11.25C6.875 10.7527 6.67746 10.2758 6.32583 9.92418C5.97419 9.57255 5.49728 9.37501 5 9.37501H3.15313C3.27366 8.07183 3.76315 6.83001 4.56424 5.79509C5.36532 4.76017 6.44481 3.97503 7.67617 3.5317C8.90753 3.08836 10.2398 3.0052 11.5167 3.29196C12.7936 3.57872 13.9624 4.22352 14.8859 5.15079C16.0148 6.2854 16.7091 7.78052 16.8477 9.37501H15C14.5027 9.37501 14.0258 9.57255 13.6742 9.92418C13.3225 10.2758 13.125 10.7527 13.125 11.25V14.375C13.125 14.8723 13.3225 15.3492 13.6742 15.7008C14.0258 16.0525 14.5027 16.25 15 16.25H16.875C16.875 16.7473 16.6775 17.2242 16.3258 17.5758C15.9742 17.9275 15.4973 18.125 15 18.125H10.625C10.4592 18.125 10.3003 18.1909 10.1831 18.3081C10.0658 18.4253 10 18.5842 10 18.75C10 18.9158 10.0658 19.0747 10.1831 19.1919C10.3003 19.3092 10.4592 19.375 10.625 19.375H15C15.8288 19.375 16.6237 19.0458 17.2097 18.4597C17.7958 17.8737 18.125 17.0788 18.125 16.25V10C18.1291 8.93717 17.9234 7.88398 17.5197 6.90078C17.1161 5.91757 16.5224 5.02368 15.7727 4.27032ZM5 10.625C5.16576 10.625 5.32473 10.6909 5.44194 10.8081C5.55915 10.9253 5.625 11.0842 5.625 11.25V14.375C5.625 14.5408 5.55915 14.6997 5.44194 14.8169C5.32473 14.9342 5.16576 15 5 15H3.75C3.58424 15 3.42527 14.9342 3.30806 14.8169C3.19085 14.6997 3.125 14.5408 3.125 14.375V10.625H5ZM15 15C14.8342 15 14.6753 14.9342 14.5581 14.8169C14.4408 14.6997 14.375 14.5408 14.375 14.375V11.25C14.375 11.0842 14.4408 10.9253 14.5581 10.8081C14.6753 10.6909 14.8342 10.625 15 10.625H16.875V15H15Z" fill="currentColor" />
                            </svg>
                            Contacts
                        </a>
                    </li>
                </ul>
                <div class="mt-3 text-lightgray font-normal">
                    <div x-show="activeDefTab === 'profile'" class="text-sm/relaxed">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'dashboard'" class="text-sm/relaxed">
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                            distribution of letters, as opposed to using 'Content here,
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'settings'" class="text-sm/relaxed">
                        <p>
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin
                            professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'contacts'" class="text-sm/relaxed">
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Tabs Pills</h2>
            <div x-data="{activeDefTab:'profile'}">
                <ul class="flex flex-wrap text-sm text-center">
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'profile'" :class="activeDefTab === 'profile' ? 'bg-primary text-white' : 'bg-transparent text-gray hover:bg-primary hover:text-white'" class="inline-block px-5 py-3 rounded-lg">
                            Profile
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'dashboard'" :class="activeDefTab === 'dashboard' ? 'bg-primary text-white' : 'bg-transparent text-gray hover:bg-primary hover:text-white'" class="inline-block px-5 py-3 rounded-lg">
                            Dashboard
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'settings'" :class="activeDefTab === 'settings' ? 'bg-primary text-white' : 'bg-transparent text-gray hover:bg-primary hover:text-white'" class="inline-block px-5 py-3 rounded-lg">
                            Settings
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="javaScript:;" @click="activeDefTab = 'contacts'" :class="activeDefTab === 'contacts' ? 'bg-primary text-white' : 'bg-transparent text-gray hover:bg-primary hover:text-white'" class="inline-block px-5 py-3 rounded-lg">
                            Contacts
                        </a>
                    </li>
                </ul>
                <div class="mt-3 text-lightgray font-normal">
                    <div x-show="activeDefTab === 'profile'" class="text-sm/relaxed">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'dashboard'" class="text-sm/relaxed">
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                            distribution of letters, as opposed to using 'Content here,
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'settings'" class="text-sm/relaxed">
                        <p>
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin
                            professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'contacts'" class="text-sm/relaxed">
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Justified Tabs</h2>
            <div x-data="{activeDefTab:'profile'}">
                <ul class="sm:flex w-full md:overflow-scroll lg:overflow-hidden text-sm text-center dark:border-gray/20 border-b border-lightgray/10">
                    <li class="w-full">
                        <a href="javaScript:;" @click="activeDefTab = 'profile'" :class="activeDefTab === 'profile' ? 'border-primary border-b-2 text-primary' : 'bg-transparent border-b-2 border-transparent hover:border-primary text-gray hover:text-primary'" class="flex w-full justify-center items-center gap-2 px-5 py-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M15 7.5C15 8.48891 14.7068 9.4556 14.1574 10.2779C13.6079 11.1001 12.8271 11.741 11.9134 12.1194C10.9998 12.4978 9.99446 12.5969 9.02455 12.4039C8.05465 12.211 7.16373 11.7348 6.46447 11.0355C5.76521 10.3363 5.289 9.44536 5.09608 8.47545C4.90315 7.50555 5.00217 6.50021 5.3806 5.58658C5.75904 4.67295 6.39991 3.89206 7.22215 3.34265C8.0444 2.79324 9.0111 2.5 10 2.5C11.3261 2.5 12.5979 3.02678 13.5355 3.96447C14.4732 4.90215 15 6.17392 15 7.5Z" fill="currentColor" />
                                <path d="M18.0407 16.5625C16.8508 14.5055 15.0172 13.0305 12.8774 12.3313C13.9358 11.7011 14.7582 10.741 15.2182 9.59828C15.6781 8.45556 15.7503 7.19344 15.4235 6.00575C15.0968 4.81806 14.3892 3.77047 13.4094 3.02385C12.4296 2.27724 11.2318 1.87288 10 1.87288C8.76821 1.87288 7.57044 2.27724 6.59067 3.02385C5.6109 3.77047 4.90331 4.81806 4.57654 6.00575C4.24978 7.19344 4.32193 8.45556 4.78189 9.59828C5.24186 10.741 6.06422 11.7011 7.12268 12.3313C4.98284 13.0297 3.14925 14.5047 1.9594 16.5625C1.91577 16.6337 1.88683 16.7128 1.87429 16.7953C1.86174 16.8778 1.86585 16.962 1.88638 17.0429C1.9069 17.1238 1.94341 17.1998 1.99377 17.2664C2.04413 17.3329 2.10731 17.3887 2.17958 17.4305C2.25185 17.4722 2.33175 17.4991 2.41457 17.5094C2.49738 17.5198 2.58143 17.5135 2.66176 17.4908C2.74209 17.4682 2.81708 17.4297 2.88228 17.3776C2.94749 17.3255 3.00161 17.2608 3.04143 17.1875C4.51331 14.6438 7.11487 13.125 10 13.125C12.8852 13.125 15.4867 14.6438 16.9586 17.1875C16.9984 17.2608 17.0526 17.3255 17.1178 17.3776C17.183 17.4297 17.258 17.4682 17.3383 17.4908C17.4186 17.5135 17.5027 17.5198 17.5855 17.5094C17.6683 17.4991 17.7482 17.4722 17.8205 17.4305C17.8927 17.3887 17.9559 17.3329 18.0063 17.2664C18.0566 17.1998 18.0932 17.1238 18.1137 17.0429C18.1342 16.962 18.1383 16.8778 18.1258 16.7953C18.1132 16.7128 18.0843 16.6337 18.0407 16.5625ZM5.62503 7.5C5.62503 6.63471 5.88162 5.78885 6.36235 5.06938C6.84308 4.34992 7.52636 3.78916 8.32579 3.45803C9.12521 3.1269 10.0049 3.04026 10.8535 3.20907C11.7022 3.37788 12.4818 3.79456 13.0936 4.40641C13.7055 5.01827 14.1222 5.79782 14.291 6.64648C14.4598 7.49515 14.3731 8.37482 14.042 9.17424C13.7109 9.97367 13.1501 10.657 12.4306 11.1377C11.7112 11.6184 10.8653 11.875 10 11.875C8.84009 11.8738 7.72801 11.4124 6.90781 10.5922C6.0876 9.77202 5.62627 8.65995 5.62503 7.5Z" fill="currentColor" />
                            </svg>
                            Profile
                        </a>
                    </li>
                    <li class="w-full">
                        <a href="javaScript:;" @click="activeDefTab = 'dashboard'" :class="activeDefTab === 'dashboard' ? 'border-primary border-b-2 text-primary' : 'bg-transparent border-b-2 border-transparent hover:border-primary text-gray hover:text-primary'" class="flex w-full justify-center items-center gap-2 px-5 py-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M8.75 4.375V8.125C8.75 8.29076 8.68415 8.44973 8.56694 8.56694C8.44973 8.68415 8.29076 8.75 8.125 8.75H4.375C4.20924 8.75 4.05027 8.68415 3.93306 8.56694C3.81585 8.44973 3.75 8.29076 3.75 8.125V4.375C3.75 4.20924 3.81585 4.05027 3.93306 3.93306C4.05027 3.81585 4.20924 3.75 4.375 3.75H8.125C8.29076 3.75 8.44973 3.81585 8.56694 3.93306C8.68415 4.05027 8.75 4.20924 8.75 4.375ZM15.625 3.75H11.875C11.7092 3.75 11.5503 3.81585 11.4331 3.93306C11.3158 4.05027 11.25 4.20924 11.25 4.375V8.125C11.25 8.29076 11.3158 8.44973 11.4331 8.56694C11.5503 8.68415 11.7092 8.75 11.875 8.75H15.625C15.7908 8.75 15.9497 8.68415 16.0669 8.56694C16.1842 8.44973 16.25 8.29076 16.25 8.125V4.375C16.25 4.20924 16.1842 4.05027 16.0669 3.93306C15.9497 3.81585 15.7908 3.75 15.625 3.75ZM8.125 11.25H4.375C4.20924 11.25 4.05027 11.3158 3.93306 11.4331C3.81585 11.5503 3.75 11.7092 3.75 11.875V15.625C3.75 15.7908 3.81585 15.9497 3.93306 16.0669C4.05027 16.1842 4.20924 16.25 4.375 16.25H8.125C8.29076 16.25 8.44973 16.1842 8.56694 16.0669C8.68415 15.9497 8.75 15.7908 8.75 15.625V11.875C8.75 11.7092 8.68415 11.5503 8.56694 11.4331C8.44973 11.3158 8.29076 11.25 8.125 11.25ZM15.625 11.25H11.875C11.7092 11.25 11.5503 11.3158 11.4331 11.4331C11.3158 11.5503 11.25 11.7092 11.25 11.875V15.625C11.25 15.7908 11.3158 15.9497 11.4331 16.0669C11.5503 16.1842 11.7092 16.25 11.875 16.25H15.625C15.7908 16.25 15.9497 16.1842 16.0669 16.0669C16.1842 15.9497 16.25 15.7908 16.25 15.625V11.875C16.25 11.7092 16.1842 11.5503 16.0669 11.4331C15.9497 11.3158 15.7908 11.25 15.625 11.25Z" fill="currentColor" />
                                <path d="M15.625 10.625H11.875C11.5435 10.625 11.2255 10.7567 10.9911 10.9911C10.7567 11.2255 10.625 11.5435 10.625 11.875V15.625C10.625 15.9565 10.7567 16.2745 10.9911 16.5089C11.2255 16.7433 11.5435 16.875 11.875 16.875H15.625C15.9565 16.875 16.2745 16.7433 16.5089 16.5089C16.7433 16.2745 16.875 15.9565 16.875 15.625V11.875C16.875 11.5435 16.7433 11.2255 16.5089 10.9911C16.2745 10.7567 15.9565 10.625 15.625 10.625ZM15.625 15.625H11.875V11.875H15.625V15.625ZM8.125 3.125H4.375C4.04348 3.125 3.72554 3.2567 3.49112 3.49112C3.2567 3.72554 3.125 4.04348 3.125 4.375V8.125C3.125 8.45652 3.2567 8.77446 3.49112 9.00888C3.72554 9.2433 4.04348 9.375 4.375 9.375H8.125C8.45652 9.375 8.77446 9.2433 9.00888 9.00888C9.2433 8.77446 9.375 8.45652 9.375 8.125V4.375C9.375 4.04348 9.2433 3.72554 9.00888 3.49112C8.77446 3.2567 8.45652 3.125 8.125 3.125ZM8.125 8.125H4.375V4.375H8.125V8.125ZM15.625 3.125H11.875C11.5435 3.125 11.2255 3.2567 10.9911 3.49112C10.7567 3.72554 10.625 4.04348 10.625 4.375V8.125C10.625 8.45652 10.7567 8.77446 10.9911 9.00888C11.2255 9.2433 11.5435 9.375 11.875 9.375H15.625C15.9565 9.375 16.2745 9.2433 16.5089 9.00888C16.7433 8.77446 16.875 8.45652 16.875 8.125V4.375C16.875 4.04348 16.7433 3.72554 16.5089 3.49112C16.2745 3.2567 15.9565 3.125 15.625 3.125ZM15.625 8.125H11.875V4.375H15.625V8.125ZM8.125 10.625H4.375C4.04348 10.625 3.72554 10.7567 3.49112 10.9911C3.2567 11.2255 3.125 11.5435 3.125 11.875V15.625C3.125 15.9565 3.2567 16.2745 3.49112 16.5089C3.72554 16.7433 4.04348 16.875 4.375 16.875H8.125C8.45652 16.875 8.77446 16.7433 9.00888 16.5089C9.2433 16.2745 9.375 15.9565 9.375 15.625V11.875C9.375 11.5435 9.2433 11.2255 9.00888 10.9911C8.77446 10.7567 8.45652 10.625 8.125 10.625ZM8.125 15.625H4.375V11.875H8.125V15.625Z" fill="currentColor" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="w-full">
                        <a href="javaScript:;" @click="activeDefTab = 'settings'" :class="activeDefTab === 'settings' ? 'border-primary border-b-2 text-primary' : 'bg-transparent border-b-2 border-transparent hover:border-primary text-gray hover:text-primary'" class="flex w-full justify-center items-center gap-2 px-5 py-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M17.9765 8.49688L15.4882 7.07969C15.4382 6.98906 15.3859 6.90078 15.3319 6.81328L15.3226 4.00078C14.5362 3.33712 13.6315 2.82794 12.6562 2.5L10.1562 3.89766C10.0515 3.89766 9.94601 3.89766 9.84367 3.89766L7.34367 2.5C6.3686 2.82901 5.46447 3.33925 4.67882 4.00391L4.66632 6.81641C4.61164 6.90391 4.55929 6.99297 4.51007 7.08281L2.02257 8.49688C1.82646 9.48884 1.82646 10.5096 2.02257 11.5016L4.51085 12.9188C4.56085 13.0094 4.6132 13.0977 4.6671 13.1852L4.67648 15.9977C5.46298 16.662 6.36792 17.1717 7.34367 17.5L9.84367 16.1039C9.94835 16.1039 10.0538 16.1039 10.1562 16.1039L12.6562 17.5C13.6304 17.1707 14.5337 16.6605 15.3187 15.9961L15.3312 13.1836C15.3859 13.0961 15.4382 13.007 15.4874 12.9172L17.9749 11.5031C18.1718 10.5108 18.1723 9.48945 17.9765 8.49688ZM9.99992 13.125C9.38185 13.125 8.77766 12.9417 8.26376 12.5983C7.74986 12.255 7.34932 11.7669 7.11279 11.1959C6.87627 10.6249 6.81438 9.99653 6.93496 9.39034C7.05554 8.78415 7.35317 8.22733 7.79021 7.79029C8.22725 7.35325 8.78407 7.05562 9.39026 6.93505C9.99645 6.81447 10.6248 6.87635 11.1958 7.11288C11.7668 7.3494 12.2549 7.74994 12.5983 8.26384C12.9416 8.77775 13.1249 9.38193 13.1249 10C13.1249 10.8288 12.7957 11.6237 12.2096 12.2097C11.6236 12.7958 10.8287 13.125 9.99992 13.125Z" fill="currentColor" />
                                <path d="M9.9999 6.25C9.25822 6.25 8.5332 6.46993 7.91652 6.88198C7.29983 7.29404 6.81918 7.87971 6.53536 8.56493C6.25153 9.25016 6.17727 10.0042 6.32196 10.7316C6.46665 11.459 6.82381 12.1272 7.34825 12.6516C7.8727 13.1761 8.54089 13.5332 9.26832 13.6779C9.99574 13.8226 10.7497 13.7484 11.435 13.4645C12.1202 13.1807 12.7059 12.7001 13.1179 12.0834C13.53 11.4667 13.7499 10.7417 13.7499 10C13.7489 9.00575 13.3535 8.05252 12.6504 7.34949C11.9474 6.64645 10.9941 6.25103 9.9999 6.25ZM9.9999 12.5C9.50545 12.5 9.0221 12.3534 8.61098 12.0787C8.19986 11.804 7.87942 11.4135 7.69021 10.9567C7.50099 10.4999 7.45148 9.99722 7.54794 9.51227C7.6444 9.02732 7.88251 8.58186 8.23214 8.23223C8.58177 7.8826 9.02723 7.6445 9.51218 7.54803C9.99713 7.45157 10.4998 7.50108 10.9566 7.6903C11.4134 7.87952 11.8039 8.19995 12.0786 8.61107C12.3533 9.02219 12.4999 9.50554 12.4999 10C12.4999 10.663 12.2365 11.2989 11.7677 11.7678C11.2988 12.2366 10.6629 12.5 9.9999 12.5ZM18.589 8.37578C18.5716 8.28776 18.5354 8.20453 18.483 8.13174C18.4305 8.05894 18.363 7.99829 18.2851 7.9539L15.9546 6.62578L15.9452 3.99921C15.9449 3.90876 15.925 3.81944 15.8868 3.73743C15.8487 3.65542 15.7932 3.58267 15.7241 3.52421C14.8788 2.80913 13.9053 2.26114 12.8554 1.90937C12.7727 1.88139 12.6851 1.87103 12.5981 1.87897C12.5112 1.88691 12.4269 1.91297 12.3507 1.95546L9.9999 3.26953L7.64678 1.95312C7.57049 1.91038 7.48609 1.88413 7.39902 1.87605C7.31195 1.86798 7.22416 1.87826 7.14131 1.90625C6.09207 2.26027 5.11962 2.81039 4.27569 3.52734C4.20675 3.58571 4.15129 3.65833 4.11313 3.7402C4.07496 3.82206 4.05499 3.91123 4.05459 4.00156L4.04287 6.63046L1.7124 7.95859C1.63444 8.00298 1.56694 8.06363 1.5145 8.13642C1.46206 8.20922 1.42591 8.29245 1.4085 8.38046C1.19521 9.45225 1.19521 10.5556 1.4085 11.6273C1.42591 11.7154 1.46206 11.7986 1.5145 11.8714C1.56694 11.9442 1.63444 12.0048 1.7124 12.0492L4.04287 13.3773L4.05225 16.0047C4.05253 16.0951 4.07245 16.1845 4.11062 16.2665C4.14879 16.3485 4.20431 16.4212 4.27334 16.4797C5.11871 17.1948 6.09221 17.7428 7.14209 18.0945C7.22477 18.1225 7.31239 18.1329 7.39932 18.1249C7.48624 18.117 7.57054 18.0909 7.64678 18.0484L9.9999 16.7305L12.353 18.0469C12.4462 18.0988 12.5511 18.1257 12.6577 18.125C12.726 18.125 12.7938 18.1139 12.8585 18.0922C13.9075 17.7383 14.8799 17.1888 15.7241 16.4727C15.7931 16.4143 15.8485 16.3417 15.8867 16.2598C15.9249 16.1779 15.9448 16.0888 15.9452 15.9984L15.9569 13.3695L18.2874 12.0414C18.3654 11.997 18.4329 11.9364 18.4853 11.8636C18.5378 11.7908 18.5739 11.7075 18.5913 11.6195C18.8034 10.5486 18.8026 9.4464 18.589 8.37578ZM17.4171 11.1031L15.1851 12.3727C15.0873 12.4283 15.0063 12.5092 14.9507 12.607C14.9054 12.6852 14.8577 12.768 14.8093 12.8461C14.7473 12.9446 14.7142 13.0586 14.714 13.175L14.7022 15.6945C14.1023 16.1657 13.4339 16.5424 12.7202 16.8117L10.4687 15.557C10.3752 15.5053 10.27 15.4784 10.1632 15.4789H10.1483C10.0538 15.4789 9.9585 15.4789 9.86397 15.4789C9.75217 15.4762 9.64165 15.5031 9.54365 15.557L7.29053 16.8148C6.5753 16.5476 5.90508 16.1727 5.30303 15.7031L5.29444 13.1875C5.29405 13.0709 5.26104 12.9567 5.19912 12.8578C5.15069 12.7797 5.10303 12.7016 5.0585 12.6187C5.00328 12.5194 4.92232 12.4369 4.82412 12.3797L2.58975 11.107C2.47412 10.3756 2.47412 9.63061 2.58975 8.89921L4.81787 7.62734C4.91567 7.57173 4.99664 7.49076 5.05225 7.39296C5.09756 7.31484 5.14522 7.23203 5.19365 7.1539C5.25566 7.05538 5.28869 6.9414 5.28897 6.825L5.30069 4.30546C5.90063 3.83433 6.56901 3.45759 7.28272 3.18828L9.53115 4.44296C9.62901 4.49721 9.73963 4.52419 9.85147 4.52109C9.946 4.52109 10.0413 4.52109 10.1358 4.52109C10.2477 4.52419 10.3583 4.49721 10.4562 4.44296L12.7093 3.18515C13.4245 3.4524 14.0947 3.82729 14.6968 4.29687L14.7054 6.81249C14.7058 6.92913 14.7388 7.04333 14.8007 7.14218C14.8491 7.22031 14.8968 7.29843 14.9413 7.38125C14.9965 7.48055 15.0775 7.56314 15.1757 7.62031L17.4101 8.89296C17.5272 9.62492 17.5285 10.3708 17.414 11.1031H17.4171Z" fill="currentColor" />
                            </svg>
                            Settings
                        </a>
                    </li>
                    <li class="w-full">
                        <a href="javaScript:;" @click="activeDefTab = 'contacts'" :class="activeDefTab === 'contacts' ? 'border-primary border-b-2 text-primary' : 'bg-transparent border-b-2 border-transparent hover:border-primary text-gray hover:text-primary'" class="flex w-full justify-center items-center gap-2 px-5 py-3">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M6.25 11.25V14.375C6.25 14.7065 6.1183 15.0245 5.88388 15.2589C5.64946 15.4933 5.33152 15.625 5 15.625H3.75C3.41848 15.625 3.10054 15.4933 2.86612 15.2589C2.6317 15.0245 2.5 14.7065 2.5 14.375V10H5C5.33152 10 5.64946 10.1317 5.88388 10.3661C6.1183 10.6005 6.25 10.9185 6.25 11.25ZM15 10C14.6685 10 14.3505 10.1317 14.1161 10.3661C13.8817 10.6005 13.75 10.9185 13.75 11.25V14.375C13.75 14.7065 13.8817 15.0245 14.1161 15.2589C14.3505 15.4933 14.6685 15.625 15 15.625H17.5V10H15Z" fill="currentColor" />
                                <path d="M15.7727 4.27032C14.6376 3.12859 13.1891 2.34952 11.6108 2.03182C10.0325 1.71413 8.39541 1.87211 6.90698 2.48576C5.41856 3.0994 4.1458 4.14108 3.24998 5.4788C2.35417 6.81651 1.87563 8.39005 1.875 10V14.375C1.875 14.8723 2.07254 15.3492 2.42417 15.7008C2.77581 16.0525 3.25272 16.25 3.75 16.25H5C5.49728 16.25 5.97419 16.0525 6.32583 15.7008C6.67746 15.3492 6.875 14.8723 6.875 14.375V11.25C6.875 10.7527 6.67746 10.2758 6.32583 9.92418C5.97419 9.57255 5.49728 9.37501 5 9.37501H3.15313C3.27366 8.07183 3.76315 6.83001 4.56424 5.79509C5.36532 4.76017 6.44481 3.97503 7.67617 3.5317C8.90753 3.08836 10.2398 3.0052 11.5167 3.29196C12.7936 3.57872 13.9624 4.22352 14.8859 5.15079C16.0148 6.2854 16.7091 7.78052 16.8477 9.37501H15C14.5027 9.37501 14.0258 9.57255 13.6742 9.92418C13.3225 10.2758 13.125 10.7527 13.125 11.25V14.375C13.125 14.8723 13.3225 15.3492 13.6742 15.7008C14.0258 16.0525 14.5027 16.25 15 16.25H16.875C16.875 16.7473 16.6775 17.2242 16.3258 17.5758C15.9742 17.9275 15.4973 18.125 15 18.125H10.625C10.4592 18.125 10.3003 18.1909 10.1831 18.3081C10.0658 18.4253 10 18.5842 10 18.75C10 18.9158 10.0658 19.0747 10.1831 19.1919C10.3003 19.3092 10.4592 19.375 10.625 19.375H15C15.8288 19.375 16.6237 19.0458 17.2097 18.4597C17.7958 17.8737 18.125 17.0788 18.125 16.25V10C18.1291 8.93717 17.9234 7.88398 17.5197 6.90078C17.1161 5.91757 16.5224 5.02368 15.7727 4.27032ZM5 10.625C5.16576 10.625 5.32473 10.6909 5.44194 10.8081C5.55915 10.9253 5.625 11.0842 5.625 11.25V14.375C5.625 14.5408 5.55915 14.6997 5.44194 14.8169C5.32473 14.9342 5.16576 15 5 15H3.75C3.58424 15 3.42527 14.9342 3.30806 14.8169C3.19085 14.6997 3.125 14.5408 3.125 14.375V10.625H5ZM15 15C14.8342 15 14.6753 14.9342 14.5581 14.8169C14.4408 14.6997 14.375 14.5408 14.375 14.375V11.25C14.375 11.0842 14.4408 10.9253 14.5581 10.8081C14.6753 10.6909 14.8342 10.625 15 10.625H16.875V15H15Z" fill="currentColor" />
                            </svg>
                            Contacts
                        </a>
                    </li>
                </ul>
                <div class="mt-3 text-lightgray font-normal">
                    <div x-show="activeDefTab === 'profile'" class="text-sm/relaxed">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'dashboard'" class="text-sm/relaxed">
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                            distribution of letters, as opposed to using 'Content here,
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'settings'" class="text-sm/relaxed">
                        <p>
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin
                            professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'contacts'" class="text-sm/relaxed">
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Tabs Pills Justified</h2>
            <div x-data="{activeDefTab:'profile'}">
                <ul class="sm:flex w-full gap-2 md:overflow-scroll lg:overflow-hidden text-sm text-center">
                    <li class="w-full">
                        <a href="javaScript:;" @click="activeDefTab = 'profile'" :class="activeDefTab === 'profile' ? 'bg-primary text-white' : 'bg-transparent text-gray hover:bg-primary hover:text-white'" class="w-full block px-5 py-3 rounded-lg">
                            Profile
                        </a>
                    </li>
                    <li class="w-full">
                        <a href="javaScript:;" @click="activeDefTab = 'dashboard'" :class="activeDefTab === 'dashboard' ? 'bg-primary text-white' : 'bg-transparent text-gray hover:bg-primary hover:text-white'" class="w-full block px-5 py-3 rounded-lg">
                            Dashboard
                        </a>
                    </li>
                    <li class="w-full">
                        <a href="javaScript:;" @click="activeDefTab = 'settings'" :class="activeDefTab === 'settings' ? 'bg-primary text-white' : 'bg-transparent text-gray hover:bg-primary hover:text-white'" class="w-full block px-5 py-3 rounded-lg">
                            Settings
                        </a>
                    </li>
                    <li class="w-full">
                        <a href="javaScript:;" @click="activeDefTab = 'contacts'" :class="activeDefTab === 'contacts' ? 'bg-primary text-white' : 'bg-transparent text-gray hover:bg-primary hover:text-white'" class="w-full block px-5 py-3 rounded-lg">
                            Contacts
                        </a>
                    </li>
                </ul>
                <div class="mt-3 text-lightgray font-normal">
                    <div x-show="activeDefTab === 'profile'" class="text-sm/relaxed">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book.
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'dashboard'" class="text-sm/relaxed">
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                            distribution of letters, as opposed to using 'Content here,
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'settings'" class="text-sm/relaxed">
                        <p>
                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin
                            professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,
                        </p>
                    </div>
                    <div x-show="activeDefTab === 'contacts'" class="text-sm/relaxed">
                        <p>
                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
