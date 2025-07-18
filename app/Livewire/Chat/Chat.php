<?php

namespace App\Livewire\Chat;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public $query;
    public $selectedConversation;

    public function mount()
    {

        $this->selectedConversation= Conversation::findOrFail($this->query);
      

       #mark message belogning to receiver as read 
       Message::where('conversation_id',$this->selectedConversation->id)
                ->where('receiver_id',auth()->id())
                ->whereNull('read_at')
                ->update(['read_at'=>now()]);


    }
    public function render()
    {
        // Get the authenticated user
        $user = Auth::user();
        // Get the user's permissions
        $allowedPermissions = $user->permissions()->pluck('name')->toArray();
        // Get a list of users (limiting to 10)
        $users = User::limit(10)->get();

        // Pass variables to the view and layout
        return view('livewire.chat.chat', compact('user', 'allowedPermissions', 'users'))
            ->layout('Layout.layoutchat', ['user' => $user, 'allowedPermissions' => $allowedPermissions]);
    }
}
