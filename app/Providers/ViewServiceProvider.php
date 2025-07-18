<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Notificationyear;
use App\Models\NotificationTeacher;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share notifications with all views
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                
                // Check user type (4 for teacher, 2 for student)
                if ($user->type == 4) {
                    // Get teacher notifications
                    $notifications = NotificationTeacher::where('teacher_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->get();
                } else {
                    // Get student notifications
                    $notifications = Notificationyear::where('user_id', $user->id)
                        ->orderBy('created_at', 'desc')
                        ->get();
                }
                
                $view->with('notifications', $notifications);
            } else {
                $view->with('notifications', []);
            }
        });
    }
}