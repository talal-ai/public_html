<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use App\Models\Userroles;
use App\Models\Adminuserscreate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminusersController extends Controller
{
    public function createadminusers(Request $request)
    {
        $request->validate([
            'rolename' => 'required',
            'name' => 'required',
            'email' => 'required',
            'whatsapp' => 'required|string|max:20',
            'paypackage' => 'required',
            'leaveallocated' => 'required', 
            'leaveavailed' => 'required',
            'shortleaveavailed' => 'required',
        ]);
        $emailinput = $request->input('email');
        $email = $emailinput."@rmdc.edu.pk";
        $type = 5;
        // $password = Str::upper(Str::random(2)) . Str::lower(Str::random(4)) . Str::random(2);
        $user = User::create([
            'name' => $request->input('name'),
            'email' =>  $email,
            'password' => Hash::make($request->input('password')),
            'type' => $type,
        ]);
        $insertedId = $user->id;
        $Adminuserscreate = Adminuserscreate::create([
            'userid' => $insertedId,
            'designation' => $request->input('designation'),
            'department' => $request->input('department'),
            'whatsapp' => $request->input('whatsapp'),
            'address' => $request->input('address'),
            'paypackage' => $request->input('paypackage'), 
            'leaveallocated' => $request->input('leaveallocated'),
            'leaveavailed' => $request->input('leaveavailed'),
            'shortleaveavailed' => $request->input('shortleaveavailed'),
            'latestdegree' => $request->input('latestdegree'),
            'latestdegreeuniversity' => $request->input('latestdegreeuniversity'),
            'latestdegreepassing' => $request->input('latestdegreepassing'),
            'degreename' => $request->input('degreename'),
            'degreeuniversity' => $request->input('degreeuniversity'),
            'degreepassing' => $request->input('degreepassing'),
            'diplomaname' => $request->input('diplomaname'),
            'diplomauniversity' => $request->input('diplomauniversity'),
            'diplomapassing' => $request->input('diplomapassing'),
        ]);
        $userroles = Userroles::create([
            'user_id' =>  $insertedId,
           'role_id' => $request->input('rolename'),
        ]);


        return redirect()->route('usermanagement')->with('success', 'Admin User Succesfully Create');
    }

}
