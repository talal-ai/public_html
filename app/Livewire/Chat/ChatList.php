<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use App\Models\User;
use App\Models\Conversation;
class ChatList extends Component
{
    public $selectedConversation;
    public $query;

    public function mount($id = null)
    {
        $this->query = $id; // Set the conversation ID from the route
    }


    protected $listeners = ['refresh' => '$refresh'];


    public function deleteByUser($id)
    {

        $userId = auth()->id();
        $conversation = Conversation::find(decrypt($id));




        $conversation->messages()->each(function ($message) use ($userId) {

            if ($message->sender_id === $userId) {

                $message->update(['sender_deleted_at' => now()]);
            } elseif ($message->receiver_id === $userId) {

                $message->update(['receiver_deleted_at' => now()]);
            }


        });


        $receiverAlsoDeleted = $conversation->messages()
            ->where(function ($query) use ($userId) {

                $query->where('sender_id', $userId)
                    ->orWhere('receiver_id', $userId);

            })->where(function ($query) use ($userId) {

                $query->whereNull('sender_deleted_at')
                    ->orWhereNull('receiver_deleted_at');

            })->doesntExist();



        if ($receiverAlsoDeleted) {

            $conversation->forceDelete();
            # code...
        }



        return redirect(route('chat.index'));



    }
    public function render()
    {
        $user = auth()->user();
        return view('livewire.chat.chat-list', [
            'conversations' => $user->conversations()->latest('updated_at')->get()
        ]);
    }
}
