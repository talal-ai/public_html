<div>
    <div class="flex items-center gap-2 justify-between border-b-[2px] border-lightgray/10 dark:border-gray/20 p-5">
        <div class="flex items-center gap-2 md:gap-3.5">
            <button type="button" class="xl:hidden hover:text-primary duration-300"
                @click="isShowChatMenu = !isShowChatMenu">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8" fill="currentColor" />
                    <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                    <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                </svg>
            </button>
            <img src="{{ asset('public/assets/images/avatar-9.png') }}" class="h-[42px] rounded-full" alt="">
            <div>
                <p class="text-sm font-semibold line-clamp-1">
                    {{$selectedConversation->getReceiver()->name}}
                </p>
                <!-- <p class="mt-1 text-xs font-semibold text-success">Typing...</p> -->
            </div>
        </div>
        <div>
            <ul class="flex items-center gap-2.5 md:gap-5">
                <li>
                    <a href="javascript:;" class="text-gray hover:text-primary duration-300">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M10.0371 5.31666L10.6861 6.47959C11.2718 7.52907 11.0367 8.90581 10.1142 9.82829C10.1142 9.82829 10.1142 9.82829 10.1142 9.82829C10.1141 9.82841 8.99539 10.9473 11.024 12.976C13.052 15.0039 14.1709 13.8866 14.1717 13.8858C14.1717 13.8858 14.1717 13.8858 14.1717 13.8857C15.0942 12.9633 16.4709 12.7282 17.5204 13.3139L18.6833 13.9629C20.2681 14.8473 20.4552 17.0697 19.0623 18.4627C18.2253 19.2997 17.1999 19.951 16.0664 19.9939C14.1583 20.0663 10.9178 19.5834 7.66721 16.3328C4.41664 13.0822 3.93373 9.84171 4.00606 7.93358C4.04903 6.80009 4.70031 5.77472 5.53732 4.93772C6.93027 3.54477 9.15269 3.73193 10.0371 5.31666Z"
                                fill="currentColor" />
                            <path
                                d="M13.259 1.88056C13.3252 1.47167 13.7117 1.1943 14.1206 1.2605C14.1459 1.26534 14.2274 1.28056 14.27 1.29006C14.3554 1.30907 14.4744 1.33833 14.6228 1.38155C14.9196 1.46799 15.3342 1.6104 15.8318 1.83854C16.8281 2.29529 18.1539 3.09429 19.5297 4.47009C20.9055 5.84589 21.7045 7.17171 22.1613 8.16799C22.3894 8.6656 22.5318 9.08021 22.6182 9.37698C22.6615 9.52539 22.6907 9.64442 22.7097 9.72975C22.7192 9.77242 22.7262 9.80667 22.731 9.83198L22.7368 9.86318C22.803 10.2721 22.5281 10.6746 22.1192 10.7408C21.7115 10.8068 21.3274 10.5308 21.2596 10.1238C21.2575 10.1129 21.2518 10.0835 21.2456 10.0558C21.2333 10.0004 21.2119 9.91261 21.1781 9.79646C21.1104 9.56412 20.9929 9.21879 20.7977 8.79311C20.4079 7.94281 19.7069 6.76862 18.469 5.53076C17.2312 4.29289 16.057 3.5919 15.2067 3.20207C14.781 3.00691 14.4357 2.88938 14.2033 2.82171C14.0872 2.78787 13.9412 2.75436 13.8858 2.74203C13.4788 2.67421 13.193 2.28829 13.259 1.88056Z"
                                fill="currentColor" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.4852 5.33003C13.599 4.93175 14.0142 4.70113 14.4124 4.81493L14.2064 5.53607C14.4124 4.81493 14.4124 4.81493 14.4124 4.81493L14.4139 4.81534L14.4154 4.81578L14.4187 4.81676L14.4265 4.81907L14.4463 4.82523C14.4614 4.83006 14.4802 4.83634 14.5026 4.8443C14.5475 4.86024 14.6069 4.8829 14.6797 4.91411C14.8254 4.97654 15.0245 5.07296 15.269 5.21767C15.7584 5.50736 16.4266 5.98853 17.2116 6.77351C17.9966 7.55848 18.4777 8.22667 18.7674 8.71613C18.9121 8.96064 19.0086 9.15971 19.071 9.30539C19.1022 9.3782 19.1249 9.43755 19.1408 9.48247C19.1488 9.50492 19.155 9.52375 19.1599 9.53883L19.166 9.55861L19.1683 9.56636L19.1693 9.5697L19.1698 9.57123C19.1698 9.57123 19.1702 9.57267 18.449 9.77871L19.1702 9.57267C19.284 9.97095 19.0533 10.3861 18.6551 10.4999C18.2602 10.6127 17.8487 10.3869 17.7309 9.99486L17.7272 9.98408C17.7218 9.96905 17.7108 9.93947 17.6923 9.89627C17.6553 9.80993 17.5882 9.6687 17.4766 9.48011C17.2536 9.10337 16.8509 8.53412 16.1509 7.83417C15.451 7.13421 14.8817 6.73151 14.505 6.50854C14.3164 6.39692 14.1752 6.32983 14.0888 6.29282C14.0456 6.27431 14.016 6.26328 14.001 6.25794L13.9902 6.25425C13.5982 6.13637 13.3724 5.72492 13.4852 5.33003Z"
                                fill="currentColor" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="text-gray hover:text-primary duration-300">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M1.99951 11.5005C1.99951 8.21301 1.99951 6.56927 2.90747 5.46292C3.07369 5.26038 3.2594 5.07466 3.46194 4.90845C4.56829 4.00049 6.21203 4.00049 9.49951 4.00049C12.787 4.00049 14.4307 4.00049 15.5371 4.90845C15.7396 5.07466 15.9253 5.26038 16.0916 5.46292C16.9995 6.56927 16.9995 8.21301 16.9995 11.5005V12.5005C16.9995 15.788 16.9995 17.4317 16.0916 18.5381C15.9253 18.7406 15.7396 18.9263 15.5371 19.0925C14.4307 20.0005 12.787 20.0005 9.49951 20.0005C6.21203 20.0005 4.56829 20.0005 3.46194 19.0925C3.2594 18.9263 3.07369 18.7406 2.90747 18.5381C1.99951 17.4317 1.99951 15.788 1.99951 12.5005V11.5005Z"
                                fill="currentColor" />
                            <path
                                d="M16.9995 9.50068L17.6579 9.1715C19.6038 8.19856 20.5767 7.71208 21.2881 8.15176C21.9995 8.59143 21.9995 9.67921 21.9995 11.8548V12.1466C21.9995 14.3222 21.9995 15.4099 21.2881 15.8496C20.5767 16.2893 19.6038 15.8028 17.6579 14.8299L16.9995 14.5007V9.50068Z"
                                fill="currentColor" />
                        </svg>
                    </a>
                </li>
                <li>
                    <div x-data="{ dropdown: false}" class="dropdown ml-auto">
                        <a href="javaScript:;" class="text-gray hover:text-primary duration-300 flex items-center h-4"
                            @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                            <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="1.99951" cy="2.00049" r="2" fill="currentColor" />
                                <circle cx="8.99951" cy="2.00049" r="2" fill="currentColor" />
                                <circle cx="15.9995" cy="2.00049" r="2" fill="currentColor" />
                            </svg>
                        </a>
                        <ul x-show="dropdown" @click.away="dropdown = false" x-transition=""
                            x-transition.duration.300ms="" class="right-0 whitespace-nowrap" style="display: none;">
                            <li><a href="javascript:;">All</a></li>
                            <li><a href="javascript:;">Read</a></li>
                            <li><a href="javascript:;">Unread</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div  
    x-data="{
    height:0,
    conversationElement:null,
    markAsRead:null
}"
 x-init="
        conversationElement = document.getElementById('conversation');
        height= conversationElement.scrollHeight;
        $nextTick(()=>conversationElement.scrollTop= height);


        Echo.private('users.{{Auth()->User()->id}}')
        .notification((notification)=>{
            if(notification['type']== 'App\\Notifications\\MessageRead' && notification['conversation_id']== {{$this->selectedConversation->id}})
            {

                markAsRead=true;
            }
        });
 "
    
    
    @scroll="
      scropTop = $el.scrollTop;

      if(scropTop <= 0){

        window.livewire.emit('loadMore');

      }
     
     "

     @update-chat-height.window="

         newHeight= $el.scrollHeight;

         oldHeight= height;
         $el.scrollTop= newHeight- oldHeight;

         height=newHeight;
     
     "
     @scroll-bottom.window="
 $nextTick(()=>
 conversationElement.scrollTop= conversationElement.scrollHeight
 );
 "
     id="conversation"
        class="py-[30px] px-4 flex flex-col gap-[30px] h-[calc(100vh-380px)] sm:h-[calc(100vh-396px)] lg:h-[calc(100vh-412px)] overflow-auto">
        <!-- <div class="flex items-center justify-center gap-5">
            <div class="h-[2px] flex-1 opacity-10"
                style="background: linear-gradient(270deg, #7780A1 33.5%, rgba(5, 12, 23, 0) 100.16%);"></div>
            <span class="shrink-0 text-sm font-semibold">Today</span>
            <div class="h-[2px] flex-1 opacity-10"
                style="background: linear-gradient(270deg, rgba(5, 12, 23, 0), #7780A1 33.5% 100.16%);"></div>
        </div> -->
        @if ($loadedMessages)
            @foreach ($loadedMessages as $key => $message)
                @if ($message->sender_id === auth()->id())
                    {{-- Message from the current user (sent) --}}
                    <div class="place-self-end">
                        <p
                            class="bg-primary text-white text-sm py-[18px] px-5 rounded-s-2xl rounded-tr-3xl rounded-br-[4px] max-w-md flex items-center justify-between">
                            <span>
                                {{ $message->body }}
                            </span>
                            @if ($message->sender_id === auth()->id())
                                @if ($message->isRead())
                                    {{-- double ticks --}}
                                    <span class="ml-2 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-check2-all" viewBox="0 0 16 16">
                                            <path
                                                d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z" />
                                            <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z" />
                                        </svg>
                                    </span>
                                @else
                                    {{-- single tick --}}
                                    <span class="ml-2 flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-check2" viewBox="0 0 16 16">
                                            <path
                                                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                        </svg>
                                    </span>
                                @endif
                            @endif
                        </p>

                        <p style="text-align: right;font-size: 13px;padding-right: 1px;">
                            {{$message->created_at->format('g:i a')}}
                        </p>

                    </div>
                @else
                    {{-- Message from others (received) --}}
                    <div class="place-self-start">
                        <p
                            class="bg-lightgray/5 text-lightgray text-sm py-[18px] px-5 rounded-e-2xl rounded-tl-3xl rounded-bl-[4px] max-w-md">
                            {{ $message->body }}
                        </p>
                    </div>
                @endif
            @endforeach
        @endif


    </div>
    <div class="p-5 pt-0">
        <div
            class="dark:border-gray/20 border-2 border-lightgray/10 rounded-lg p-3 lg:p-5 flex items-center gap-3 md:gap-5">
            <!-- <button type="button" class="text-gray hover:text-primary duration-300">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.88509 3.3631C11.8278 0.546283 16.5859 0.546283 19.5286 3.3631C19.8278 3.64953 19.8382 4.12429 19.5518 4.42351C19.2654 4.72273 18.7906 4.73311 18.4914 4.44669C16.1287 2.18509 12.285 2.18509 9.92231 4.44669L3.51813 10.5769C3.2189 10.8633 2.74414 10.8529 2.45772 10.5537C2.1713 10.2545 2.18167 9.77973 2.4809 9.4933L8.88509 3.3631ZM15.2661 6.45138C15.5525 6.15216 16.0273 6.14178 16.3265 6.4282C17.5824 7.63038 17.5824 9.59365 16.3265 10.7958L8.43563 18.3491C8.1364 18.6355 7.66164 18.6252 7.37522 18.3259C7.0888 18.0267 7.09918 17.5519 7.3984 17.2655L15.2893 9.71224C15.9282 9.10069 15.9282 8.12333 15.2893 7.51179C14.9901 7.22537 14.9797 6.75061 15.2661 6.45138Z"
                        fill="currentColor" />
                    <path opacity="0.5"
                        d="M18.4909 4.44659C20.8351 6.69048 20.8351 10.3144 18.4909 12.5583L10.5428 20.1663C9.03281 21.6117 6.57155 21.6117 5.06152 20.1663C3.56999 18.7386 3.56999 16.438 5.06152 15.0102L12.8952 7.51169C13.5526 6.88244 14.6314 6.88244 15.2888 7.51169C14.9899 7.22524 14.9798 6.75052 15.2661 6.45139C15.5474 6.15753 16.0103 6.14225 16.3103 6.41311C15.0717 5.24365 13.0902 5.24865 11.858 6.4281L4.02429 13.9266C1.91573 15.945 1.91573 19.2316 4.02429 21.2499C6.11436 23.2505 9.49001 23.2505 11.5801 21.2499L19.5281 13.6419C22.4843 10.8122 22.4893 6.21329 19.5433 3.37756C19.8281 3.66528 19.8334 4.12927 19.5518 4.42352C19.2654 4.72274 18.7901 4.73301 18.4909 4.44659Z"
                        fill="currentColor" />
                </svg>
            </button> -->
            <form class="w-full"   x-data="{body:@entangle('body').defer}"
             @submit.prevent="$wire.sendMessage"
            autocapitalize="off">
                @csrf
                <input type="hidden" autocomplete="false" style="display:none">
                <div class="relative">
                    <input wire:model="body"  maxlength="1700" ype="text" 
                        class="form-input border-0 pe-10 h-14 dark:text-white dark:bg-lightgray/10 bg-dark/[4%] rounded-lg text-sm text-dark placeholder:text-lightgray/80 focus:ring-0 focus:border-primary/80 focus:outline-0"
                        placeholder="Type message here..." required>
                    <button id="sendMessageButton" x-bind:disabled="!$wire.body.trim()"  type="submit"
                        class="absolute inset-y-0 right-3 flex items-center text-primary disabled:opacity-50 disabled:cursor-not-allowed"
                        disabled>
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.1422 15.9626C14.2696 16.2173 14.1588 16.5269 13.8987 16.6429L4.49698 20.8355C3.00114 21.5026 1.44958 20.0213 2.19051 18.6336L5.34254 12.7299C5.58769 12.2707 5.58769 11.7303 5.34254 11.2711L2.19051 5.36738C1.44958 3.97963 3.00114 2.49838 4.49698 3.16545L8.02129 4.73711C8.44416 4.92569 8.7885 5.25515 8.99557 5.66929L14.1422 15.9626Z"
                                fill="currentColor"></path>
                            <path opacity="0.3"
                                d="M15.5331 15.391C15.6528 15.6303 15.9396 15.733 16.184 15.6241L21.0066 13.4735C22.3303 12.8831 22.3303 11.1187 21.0066 10.5284L12.1088 6.56044C11.6801 6.36925 11.2481 6.82084 11.458 7.24069L15.5331 15.391Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>
                </div>
            </form>

            <script>
                function toggleButton() {
                    const input = document.getElementById('messageInput');
                    const button = document.getElementById('sendButton');
                    button.disabled = input.value.trim() === ''; // Enable button if input is not empty
                }
            </script>

           
        </div>
    </div>
</div>
