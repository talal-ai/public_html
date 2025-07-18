<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use App\Models\Userroles;
use App\Models\Faultyuserscreate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FaultyusersController extends Controller
{
    public function createfaultyusers(Request $request)
    {
        $request->validate([
            'rolename' => 'required',
            'name' => 'required',
            'email' => 'required',
            'whatsapp' => 'required|string|max:20',
        ]);
        $emailinput = $request->input('email');
        $email = $emailinput."@rmdc.edu.pk";
        $type = 6;
        // $password = Str::upper(Str::random(2)) . Str::lower(Str::random(4)) . Str::random(2);
        $user = User::create([
            'name' => $request->input('name'),
            'email' =>  $email,
            'password' => Hash::make($request->input('password')),
            'type' => $type,
        ]);
        $insertedId = $user->id;
        $Faultyuserscreate = Faultyuserscreate::create([
            'userid' => $insertedId,
            'designation' => $request->input('designation'),
            'department' => $request->input('department'),
            'whatsapp' => $request->input('whatsapp'),
            'picture' => $request->input('picture'), 
            'bankaccount' => $request->input('bankaccount'), 
            'eobiaccount' => $request->input('eobiaccount'), 
            'paypackage' => $request->input('paypackage'), 
            'registrationnumber' => $request->input('registrationnumber'), 
            'licenseissuedate' => $request->input('licenseissuedate'),
            'licenseexpirydate' => $request->input('licenseexpirydate'),
            'dateofbirth' => $request->input('dateofbirth'),
            'cnic' => $request->input('cnic'),
            'dateofjoining' => $request->input('dateofjoining'),
            'tentativedate' => $request->input('tentativedate'),
            'degreename' => $request->input('degreename'),
            'degreeuniversity' => $request->input('degreeuniversity'),
            'degreepassing' => $request->input('degreepassing'),
            'degreename1' => $request->input('degreename1'),
            'degreeuniversity1' => $request->input('degreeuniversity1'),
            'degreepassing1' => $request->input('degreepassing1'),
            'degreename2' => $request->input('degreename2'),
            'degreeuniversity2' => $request->input('degreeuniversity2'),
            'degreepassing2' => $request->input('degreepassing2'),
            'diplomaname' => $request->input('diplomaname'),
            'diplomauniversity' => $request->input('diplomauniversity'),
            'diplomapassing' => $request->input('diplomapassing'),
            'diplomaname1' => $request->input('diplomaname1'),
            'diplomauniversity1' => $request->input('diplomauniversity1'),
            'diplomapassing1' => $request->input('diplomapassing1'),
            'diplomaname2' => $request->input('diplomaname2'),
            'diplomauniversity2' => $request->input('diplomauniversity2'),
            'diplomapassing2' => $request->input('diplomapassing2'),
        ]);
        $userroles = Userroles::create([
            'user_id' =>  $insertedId,
           'role_id' => $request->input('rolename'),
        ]);


        return redirect()->route('usermanagement')->with('success', 'Faulty User Succesfully Create');
    }

}
