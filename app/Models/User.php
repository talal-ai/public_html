<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'status',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function notificationyear()
    {
        return $this->hasMany(Notificationyear::class, 'user_id');
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class, 'user_roles');
    // }

    public function teacher()
    {
        return $this->hasOne(Teachercreate::class, 'userid');
    }


    public function adminuser()
    {
        return $this->hasOne(Adminuserscreate::class, 'userid');
    }

    public function faultyuser()
    {
        return $this->hasOne(Faultyuserscreate::class, 'userid');
    }

    public function student()
    {
        return $this->hasOne(Studentcreate::class, 'userid');
    }


    public function permissionss()
    {
        return $this->roles()->with('permissions.program');
    }

    public function permissions()
    {
        return $this->roles()->with('permissions')->get()->pluck('permissions')->flatten()->unique('id');
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class, 'sender_id')->orWhere('receiver_id', $this->id);
    }

    public function currentProgramId()
    {
        $user = Auth::user(); // Get the authenticated user

        // Determine user type
        if ($user->type === 2) {
            // Fetch program ID from students table
            return $user->student ? $user->student->program : null;
        } elseif ($user->type === 4) {
            // Fetch program ID from teachers table
            return $user->teacher ? $user->teacher->program : null;
        }

        return null; // Default if type doesn't match
    }


    public function accessibleProgramPermissions()
{
    $role = $this->roles->first(); // Get the first role assigned to the user
    if (!$role) {
        return null; // If no role is assigned
    }

    // Get all permissions for the role
    $rolePermissions = $role->permissions;

    // Map permissions to program IDs
    $programPermissions = [];
    foreach ($rolePermissions as $permission) {
        if ($permission->program_id) {
            $programPermissions[$permission->program_id][] = [
                'id' => $permission->id,
                'name' => $permission->name,
                'description' => $permission->description,
            ];
        }
    }

    return $programPermissions; // Return permissions grouped by program IDs
}

    // public function currentProgramId()
    // {
    //     $role = $this->roles->first(); // Get the first role assigned to the user
    //     //dd($role);
    //     if (!$role) {
    //         return null; // No role assigned
    //     }

    //     return  $role; // Default case if role doesn't match
    // }

}
