<div 
x-data="{type:'all',query:@entangle('query')}"
   x-init="


    Echo.private('users.{{Auth()->User()->id}}')
    .notification((notification)=>{
        if(notification['type']== 'App\\Notifications\\MessageRead'||notification['type']== 'App\\Notifications\\MessageSent')
        {

            window.Livewire.emit('refresh');
        }
    });
   
   "


class="h-[calc(100vh-440px)] sm:h-[calc(100vh-456px)] overflow-auto space-y-5 px-5">
@if ($conversations)
<div class="scroll-container" id="conversation-list">         
                @foreach ($conversations as $key=> $conversation)
                <a href="{{route('userchat',$conversation->id)}}">
                
                <div 
                id="conversation-{{$conversation->id}}" wire:key="{{$conversation->id}}"
                class="flex items-center gap-2 justify-between" style="{{ $conversation->id == $selectedConversation?->id ? 'background-color: #d1e7f3;
    padding-top: 15px;
    padding-left: 10px;
    padding-right: 17px;
    padding-bottom: 15px;
    border-radius: 15px;' : 'padding-top: 15px;
    padding-left: 10px;
    padding-right: 17px;
    padding-bottom: 15px;
    border-radius: 15px;' }}"> 
                        <div class="flex items-center gap-3.5">
                            <img src="https://ui-avatars.com/api/?name=User+{{$key}}" class="h-[42px] rounded-full" alt="">
                            <div>
                                <p class="text-sm font-semibold line-clamp-1">{{$conversation->getReceiver()->name}}</p>
                                <p class="mt-1 text-xs text-gray line-clamp-1">
                                @if ($conversation->messages?->last()?->sender_id==auth()->id())



                                @if ($conversation->isLastMessageReadByUser())
                                        {{-- double tick  --}}
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                                    </svg>
                                </span>
                                @else

                                        {{-- single tick  --}}
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                            </svg>
                                        </span>
                                        
                                @endif
                                @endif




                                <p class="grow truncate text-sm font-[100]">
                                {{$conversation->messages?->last()?->body??' '}}
                                </p>

                                </p>
                            </div>
                        </div>
                        <div>
                            <p class="text-xs text-gray line-clamp-1">{{$conversation->messages?->last()?->created_at?->shortAbsoluteDiffForHumans()}}</p>
                            @if ($conversation->unreadMessagesCount()>0)
                            <span class="h-[18px] w-[18px] mt-2.5 ms-auto text-xs flex items-center justify-center bg-purple text-white rounded-full">
                            {{$conversation->unreadMessagesCount()}}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="my-5 bg-gray/10 h-[2px] block"></div>
                </a>
                    
                    
                    @endforeach
                    </div>
                    @else
                        
                    @endif   
                    
                    
                </div>