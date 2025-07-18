<?php

namespace App\Http\Controllers;

use App\Events\YearNotificationSent;
use App\Models\Notificationyear;
use App\Models\NotificationTeacher;
use App\Models\Studentcreate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use DB;

class NotificationController extends Controller
{
    public function sendNotification($yearId)
    {
        // Log the incoming request data
        Log::info('Notification request received for year:', ['yearId' => $yearId]);

        if (!$yearId) {
            Log::error('No yearId provided');
            return response()->json([
                'success' => false, 
                'message' => 'Year ID is required',
                'type' => 'error'
            ]);
        }

        // Retrieve students associated with the specified year ID
        $students = Studentcreate::where('year', $yearId)->get();
        
        Log::info('Found students:', ['count' => $students->count()]);

        if ($students->isEmpty()) {
            Log::info('No students found for year:', ['yearId' => $yearId]);
            return response()->json([
                'success' => false, 
                'message' => 'No students found for this year.',
                'type' => 'error'
            ]);
        }

        foreach ($students as $student) {
            try {
                // Store the notification in the database
                $student->Notificationyear()->create([
                    'user_id' => $student->userid,
                    'message' => 'You have a new notification for Mentorship Program',
                    'year_id' => $yearId,
                    'read' => false,
                ]);
                
                Log::info("Created notification for student:", ['studentId' => $student->userid]);

                // Broadcast the notification
                broadcast(new YearNotificationSent($student->userid, $yearId));
                Log::info("Broadcasted notification for student:", ['studentId' => $student->userid]);
            } catch (\Exception $e) {
                Log::error("Error processing student notification:", [
                    'studentId' => $student->userid,
                    'error' => $e->getMessage()
                ]);
            }
        }

        return response()->json([
            'success' => true, 
            'message' => 'Notifications sent successfully',
            'type' => 'success'
        ]);
    }

    public function fetchUserNotifications()
    {
        try {
            $user = auth()->user();
            
            if (!$user) {
                Log::error('No authenticated user found');
                return response()->json([]);
            }

            Log::info('Fetching notifications for user:', ['userId' => $user->id]);
            
            $notifications = Notificationyear::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();

            Log::info('Found notifications:', ['count' => $notifications->count()]);
            
            return response()->json($notifications);
        } catch (\Exception $e) {
            Log::error('Error fetching notifications:', ['error' => $e->getMessage()]);
            return response()->json([]);
        }
    }

    public function markAsRead($id)
    {
        $notification = Notificationyear::find($id);
        if ($notification) {
            $notification->update(['read' => true]);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    public function viewNotification($id)
    {
        $user = Auth::user();
        $allowedPermissions = $user->permissions()->pluck('name')->toArray();

        $permissions = Permission::with('program')
            ->get()
            ->groupBy('program_id');

        $roles = Role::all()->map(function ($session) {
            return [
                'id' => $session->id,
                'name' => $session->name,
                'description' => $session->description,
                'created_at' => $session->created_at,
                'updated_at' => $session->updated_at,
            ];
        });

        // First try to find in NotificationYear
        $notification = Notificationyear::find($id);
        $notificationType = 'year';

        // If not found in NotificationYear, try NotificationTeacher
        if (!$notification) {
            $notification = NotificationTeacher::find($id);
            $notificationType = 'teacher';
            
            if (!$notification) {
                abort(404, 'Notification not found');
            }
        }
        
        // Mark as read based on notification type
        if ($notificationType === 'year' && !$notification->read) {
            $notification->update(['read' => true]);
        } elseif ($notificationType === 'teacher' && !$notification->read) {
            $notification->update(['read' => true]);
        }
        
        return view('notification.notificationdetail', [
            'user' => $user,
            'userStatus' => $user->status,
            'allowedPermissions' => $allowedPermissions,
            'permissions' => $permissions,
            'rolesData' => $roles,
            'notification' => $notification,
            'notificationType' => $notificationType
        ]);
    }
}
