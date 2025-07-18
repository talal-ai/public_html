<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use App\Models\Userroles;
use App\Models\Subjectcreate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    public function createsubject(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'subjectprogram' => 'required',
            'subjectyear' => 'required',
            'status' => 'required',
            'subjecttype' => 'required',
            'description' => 'required',
        ]);
        $subjectcreate = subjectcreate::create([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'subjectprogram' => $request->input('subjectprogram'),
            'subjectyear' => $request->input('subjectyear'),
            'status' => $request->input('status'),
            'subjecttype' => $request->input('subjecttype'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('subjectmanagement')->with('success', 'Subject Succesfully Create');
    }

}
