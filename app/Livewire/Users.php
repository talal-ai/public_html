<?php

namespace App\Livewire;
use App\Models\Conversation;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Users extends Component
{
    // public $userId;

    // protected $listeners = ['messenger'];
     public function render()
    {
        // Get the authenticated user
        $user = Auth::user();
        
        // Get the user's permissions
        $allowedPermissions = $user->permissions()->pluck('name')->toArray();
        
        // Get users based on teacher-student relationships
        $users = collect();
        
        if ($user->type == 2) { // Student
            // Get all teachers associated with this student
            $teacherIds = \DB::table('teacher_student_assignments')
                ->where('student_id', $user->id)
                ->pluck('teacher_id');
                
            $users = User::whereIn('id', $teacherIds)->get();
            
        } elseif ($user->type == 4) { // Teacher
            // Get all students associated with this teacher who:
            // 1. Are linked (link = 1)
            // 2. Have accepted the request (accepted = 1)
            $studentIds = \DB::table('teacher_student_assignments as tsa')
                ->join('send_request_by_teacher as srt', function($join) use ($user) {
                    $join->on('tsa.student_id', '=', 'srt.userid')
                        ->where('srt.teacherid', '=', $user->id);
                })
                ->where('tsa.teacher_id', $user->id)
                ->where('tsa.link', 1)
                ->where('srt.accepted', 1)
                ->pluck('tsa.student_id');
                
            $users = User::whereIn('id', $studentIds)->get();
            
        } else {
            // For other user types, get all users
            $users = User::all();
        }

        // Pass variables to the view and layout
        return view('livewire.users', compact('user', 'allowedPermissions', 'users'))
            ->layout('Layout.layoutchat', ['user' => $user, 'allowedPermissions' => $allowedPermissions]);
    }

    public function messenger($userId)
    {
        

          //  $createdConversation =   Conversation::updateOrCreate(['sender_id' => auth()->id(), 'receiver_id' => $userId]);

          $authenticatedUserId = auth()->id();
          
          # Check if conversation already exists
          $existingConversation = Conversation::where(function ($query) use ($authenticatedUserId, $userId) {
                    $query->where('sender_id', $authenticatedUserId)
                        ->where('receiver_id', $userId);
                    })
                ->orWhere(function ($query) use ($authenticatedUserId, $userId) {
                    $query->where('sender_id', $userId)
                        ->where('receiver_id', $authenticatedUserId);
                })->first();

          if ($existingConversation) {
              # Conversation already exists, redirect to existing conversation
              return redirect()->route('userchat', ['query' => $existingConversation->id]);
          }

          # Create new conversation
          $createdConversation = Conversation::create([
              'sender_id' => $authenticatedUserId,
              'receiver_id' => $userId,
          ]);

            return redirect()->route('userchat', ['query' => $createdConversation->id]);

    }
}
