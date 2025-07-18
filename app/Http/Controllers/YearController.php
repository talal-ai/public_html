<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use App\Models\Yearcreate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class YearController extends Controller
{
    public function yearcreate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'code' => 'required',
            'program' => 'required',
            'acadamicyear' => 'required', 
            'description' => 'required',
            'status' => 'required',
        ]);
        $yearcreate = yearcreate::create([
            'name' => $request->input('name'),
            'class' => $request->input('class'),
            'code' => $request->input('code'),
            'program' => $request->input('program'),
            'acadamicyear' => $request->input('acadamicyear'), 
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('createyear')->with('success', 'Year Succesfully Create');
    }

}
