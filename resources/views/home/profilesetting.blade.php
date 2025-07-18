@extends('Layout.layout')

@section('content')
@php
$name = $user->name;
$email = $user->email;
$type = $user->type;
if($data != null){
    if ($type == 2) {
                   $whatsapp = $data->whatsapp;
                } elseif ($user->type == 4) {
                    $whatsapp = $data->whatsappnumber;
                } 
                elseif ($user->type == 5) {
                    $whatsapp = $data->whatsapp;
                }  
                elseif ($user->type == 6) {
                    $whatsapp = $data->whatsapp;
                }  
}else{
    $whatsapp  = null;
}
                            


@endphp
<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 gap-4 flex-1" x-data="email">
        <div class="flex gap-5 items-stretch relative overflow-hidden" x-data="{activeTab:'profile'}">
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg p-5 absolute w-[240px] z-20 flex-none -left-[410px] xl:static overflow-hidden overflow-y-auto h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]" :class="isShowChatMenu && '!left-0'">
                <div class="flex flex-col space-y-5">
                    <button @click="activeTab = 'profile'" :class="activeTab === 'profile' ? 'bg-primary text-white' : 'bg-gray/[8%] text-gray hover:bg-primary hover:text-white'" class="flex duration-300 p-5 text-sm/none font-semibold items-center gap-3 rounded-lg">
                        Edit Profile
                    </button>
                    <button @click="activeTab = 'pw'" :class="activeTab === 'pw' ? 'bg-primary text-white' : 'bg-gray/[8%] text-gray hover:bg-primary hover:text-white'" class="flex duration-300 p-5 text-sm/none font-semibold items-center gap-3 rounded-lg">
                        Password & Security
                    </button>
                </div>
            </div>
            <div class="bg-transparent lg:hidden z-[5] w-full h-full absolute hidden" :class="isShowChatMenu && '!block xl:!hidden'" @click="isShowChatMenu = !isShowChatMenu"></div>
            <div x-show="activeTab === 'profile'" class="flex flex-row items-start gap-4 relative w-full">
                <div class="w-full flex flex-col flex-1 rounded-lg overflow-y-auto h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                    <div class="flex items-center gap-5">
                        <button type="button" class="xl:hidden hover:text-primary duration-300" @click="isShowChatMenu = !isShowChatMenu">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                                <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                                <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                            </svg>
                        </button>
                        <h3 class="text-lg font-semibold">Edit Profile</h3>
                    </div>
                    <div class="mt-[30px]">
                        <div class="flex flex-wrap items-center gap-5 p-5 border-2 border-gray/[0.14] rounded-lg" style="background: linear-gradient(90.17deg, rgba(48, 154, 252, 0.1) -3.08%, rgba(87, 84, 255, 0.1) 31.4%, rgba(255, 81, 164, 0.1) 65.89%, rgba(255, 124, 81, 0.1) 100.37%);">
                            <img src="{{ asset('public/assets/images/profile-user.png') }}" class="shrink-0 rounded-full" alt="">
                            <div class="flex items-center gap-5 flex-wrap">
                                <button type="button" class="btn bg-dark dark:bg-white dark:text-dark dark:border-white border border-dark rounded-md text-white transition-all duration-300 hover:bg-dark/[0.85] hover:border-dark/[0.85]">Upload new picture</button>
                                <button type="button" class="btn border border-transparent rounded-md transition-all duration-300 bg-gray/10 text-gray hover:bg-primary hover:text-white">Delete</button>
                            </div>
                        </div>
                    <form class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <input type="text" id="full-name" class="form-input rounded-[10px] h-14 placeholder:text-dark dark:placeholder:text-white" placeholder="Full Name" required="" value="{{ $name;}}">
                        <input type="email" id="email1" class="form-input rounded-[10px] h-14 placeholder:text-dark dark:placeholder:text-white" placeholder="Email" required="" value="{{ $email;}}">
                        <div class="flex items-stretch gap-5">
                            <select id="country-code" class="form-select !w-20 h-14 rounded-[10px]">
                                <option value="5">+92</option>
                            </select>
                            <input type="text" id="phone-number" class="form-input rounded-[10px] h-14 placeholder:text-dark dark:placeholder:text-white" placeholder="Phone number" required="" value="{{ $whatsapp}}">
                        </div>
                        <input type="text" id="city" class="form-input rounded-[10px] h-14 placeholder:text-dark dark:placeholder:text-white" placeholder="City" required="">
                        <input type="text" id="state" class="form-input rounded-[10px] h-14 placeholder:text-dark dark:placeholder:text-white" placeholder="Address" required="">
                        <input type="submit" class="btn mt-2.5 max-w-[200px] h-14 bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]" value="save">
                    </form>
                    </div>
                </div>
            </div>
            <div x-show="activeTab === 'notification'" x-data="{selectedMail: false}" class="flex flex-row items-start gap-4 relative w-full h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                <div class="w-full flex flex-col flex-1 rounded-lg overflow-y-auto h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                    <div class="flex items-center gap-5">
                        <button type="button" class="xl:hidden hover:text-primary duration-300" @click="isShowChatMenu = !isShowChatMenu">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                                <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                                <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                            </svg>
                        </button>
                        <h3 class="text-lg font-semibold">Notifications</h3>
                    </div>
                    <div class="mt-[30px] space-y-5">
                        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg p-5 space-y-4">
                            <div class="flex items-center gap-3.5">
                                <div class="togglebutton setting inline-block">
                                    <label for="toggleD1" class="flex items-center cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" id="toggleD1" class="sr-only">
                                            <div class="block band bg-gray/50 w-7 h-4 rounded-full"></div>
                                            <div class="dot absolute left-1 top-1/2 -translate-y-1/2 right-0 bg-white w-2.5 h-2.5 rounded-full transition"></div>
                                        </div>
                                    </label>
                                </div>
                                <p class="text-sm font-semibold">Comments and replies</p>
                            </div>
                            <p class="text-gray text-sm">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg p-5 space-y-4">
                            <div class="flex items-center gap-3.5">
                                <div class="togglebutton setting inline-block">
                                    <label for="toggleD2" class="flex items-center cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" id="toggleD2" class="sr-only" checked>
                                            <div class="block band bg-gray/50 w-7 h-4 rounded-full"></div>
                                            <div class="dot absolute left-1 top-1/2 -translate-y-1/2 right-0 bg-white w-2.5 h-2.5 rounded-full transition"></div>
                                        </div>
                                    </label>
                                </div>
                                <p class="text-sm font-semibold">Messages</p>
                            </div>
                            <p class="text-gray text-sm">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        </div>
                        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg p-5 space-y-4">
                            <div class="flex items-center gap-3.5">
                                <div class="togglebutton setting inline-block">
                                    <label for="toggleD3" class="flex items-center cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" id="toggleD3" class="sr-only">
                                            <div class="block band bg-gray/50 w-7 h-4 rounded-full"></div>
                                            <div class="dot absolute left-1 top-1/2 -translate-y-1/2 right-0 bg-white w-2.5 h-2.5 rounded-full transition"></div>
                                        </div>
                                    </label>
                                </div>
                                <p class="text-sm font-semibold">Mentions</p>
                            </div>
                            <p class="text-gray text-sm">Contrary to popular belief, Lorem Ipsum is not simply random text.</p>
                        </div>
                        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg p-5 space-y-4">
                            <div class="flex items-center gap-3.5">
                                <div class="togglebutton setting inline-block">
                                    <label for="toggleD4" class="flex items-center cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" id="toggleD4" class="sr-only" checked>
                                            <div class="block band bg-gray/50 w-7 h-4 rounded-full"></div>
                                            <div class="dot absolute left-1 top-1/2 -translate-y-1/2 right-0 bg-white w-2.5 h-2.5 rounded-full transition"></div>
                                        </div>
                                    </label>
                                </div>
                                <p class="text-sm font-semibold">Like</p>
                            </div>
                            <p class="text-gray text-sm">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                        </div>
                        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg p-5 space-y-4">
                            <div class="flex items-center gap-3.5">
                                <div class="togglebutton setting inline-block">
                                    <label for="toggleD5" class="flex items-center cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" id="toggleD5" class="sr-only">
                                            <div class="block band bg-gray/50 w-7 h-4 rounded-full"></div>
                                            <div class="dot absolute left-1 top-1/2 -translate-y-1/2 right-0 bg-white w-2.5 h-2.5 rounded-full transition"></div>
                                        </div>
                                    </label>
                                </div>
                                <p class="text-sm font-semibold">Comments</p>
                            </div>
                            <p class="text-gray text-sm">The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                        </div>
                        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg p-5 space-y-4">
                            <div class="flex items-center gap-3.5">
                                <div class="togglebutton setting inline-block">
                                    <label for="toggleD6" class="flex items-center cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" id="toggleD6" class="sr-only">
                                            <div class="block band bg-gray/50 w-7 h-4 rounded-full"></div>
                                            <div class="dot absolute left-1 top-1/2 -translate-y-1/2 right-0 bg-white w-2.5 h-2.5 rounded-full transition"></div>
                                        </div>
                                    </label>
                                </div>
                                <p class="text-sm font-semibold">Reminders</p>
                            </div>
                            <p class="text-gray text-sm">It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="activeTab === 'pw'" x-data="{selectedMail: false}" class="flex flex-row items-start gap-4 relative w-full h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                <div class="w-full flex flex-col flex-1 rounded-lg overflow-y-auto h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                    <div>
                        <button type="button" class="xl:hidden hover:text-primary duration-300" @click="isShowChatMenu = !isShowChatMenu">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                                <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                                <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                            </svg>
                        </button>
                    </div>
                    <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg p-5 space-y-4">
                        <h3 class="text-lg font-semibold">Password</h3>
                        <form class="mt-[30px] grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <input type="password" id="password2" class="form-input rounded-[10px] h-14 placeholder:text-dark dark:placeholder:text-white" placeholder="New Password" required="">
                            <input type="password" id="password3"class="form-input rounded-[10px] h-14 placeholder:text-dark dark:placeholder:text-white" placeholder="Confirm Password" required="">
                            <div class="sm:col-span-2 text-end">
                                <input type="submit" class="btn mt-2.5 w-full max-w-[200px] h-14 bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]" value="save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("email", () => ({
                isShowChatMenu: false,
                selectMail: false,
            }));
        });
    </script>

@endsection