<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PaymentTransaction;
use Illuminate\Support\Facades\Hash;
use App\Models\Sessioncreate;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('authentication.login');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'inputemail' => 'required|string|email',
            'inputpassword' => 'required|string',
        ]);

        // $email = $request->input('inputemail');
        // $password = $request->input('inputpassword');
        $credentials = $request->only('inputemail', 'inputpassword');

        if (Auth::attempt(['email' => $credentials['inputemail'], 'password' => $credentials['inputpassword']])) {
            // Authentication passed, now check the user's status
            $user = Auth::user();

            if ($user) {
                $usertype = $user->type;
                if ($usertype == 1) {
                    return redirect()->intended('admin_dashboard')->with('success', 'Login successful!');
                }
                if ($usertype == 2) {
                    return redirect()->intended('student_dashboard')->with('success', 'Login successful!');
                }
                if ($usertype == 3) {
                    return back()->withErrors(['inputemail' => 'You are not register with our institute.']);
                }
                if ($usertype == 4) {
                    return redirect()->intended('teacher_dashboard')->with('success', 'Login successful!');
                }
                if ($usertype == 5) {
                    return redirect()->intended('adminuser_dashboard')->with('success', 'Login successful!');
                }
                if ($usertype == 6) {
                    return redirect()->intended('faultyuser_dashboard')->with('success', 'Login successful!');
                }
            } else {
                Auth::logout(); // Log out the user if status is not 1 or 2
                return back()->withErrors(['inputemail' => 'Your account is not authorized.']);
            }
        }

        return back()->withErrors(['inputemail' => 'The provided credentials do not match our records.']);
    }

    public function processLoginadmission(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // $email = $request->input('inputemail');
        // $password = $request->input('inputpassword');
        $credentials = $request->only('email', 'password');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            // Authentication passed, now check the user's status
            $user = Auth::user();
            if ($user) {
                return redirect()->route('admissiondashboard')->with('success', 'Registration successful!');
            }
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function processLoginadmissionwithtransactionid(Request $request)
    {
        // Validate the input for transaction ID
        $request->validate([
            'transactionid' => 'required|string',  // Make sure transactionid exists in the paymenttransactions table
        ]);

        // Get the submitted transaction ID
        $transactionid = $request->input('transactionid');

        // Find the transaction in the paymenttransaction table
        $transaction = PaymentTransaction::where('transactionid', $transactionid)->first();

        if ($transaction) {
                return redirect()->route('admissionform1')->with('success', 'Registration successful!');
        }

        // If no transaction was found or the user is not associated, show error
        return back()->withErrors(['transactionid' => 'Transaction ID not found or no user associated.']);
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'fullnameinput' => 'required|string',
            'emailinput' => 'required|string|email',
            'passwordinput' => 'required|string',
        ]);
        $status = 2;
        // $fullnameinput = $request->input('fullnameinput');
        // $emailinput = $request->input('emailinput');
        // $passwordinput = Hash::make($request->input('passwordinput'));   
        $user = User::create([
            'name' => $request->input('fullnameinput'),
            'email' => $request->input('emailinput'),
            'password' => Hash::make($request->input('passwordinput')),
            'status' => $status,
        ]);

        return redirect()->route('login')->with('success', 'Registration successful!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token to prevent CSRF attacks
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout successful!');
    }


    public function loginCover()
    {
        return view('authentication.loginCover');
    }

    public function signin()
    {
        return view('authentication.signin');
    }

    public function admissionform()
    {
        $user = Auth::user();

        // Step 1: Get the current year
        $currentYear = date('Y'); // e.g., 2024

        // Step 2: Fetch session where name matches "2024-2025"
        $session = Sessioncreate::where('name', 'LIKE', "%$currentYear%")->first();

        // Step 3: Extract session ID
        $sessionId = $session ? $session->id : null;

        // Step 4: Pass session ID to the view
        if ($user) {
            return view('authentication.admissiondashboard', compact('sessionId'));
        } else {
            return view('authentication.adminssionform', compact('sessionId'));
        }
    }

    public function admissionform1()
    {
        $user = Auth::user();

        // Step 1: Get the current year
        $currentYear = date('Y'); // e.g., 2024

        // Step 2: Fetch session where name matches "2024-2025"
        $session = Sessioncreate::where('name', 'LIKE', "%$currentYear%")->first();

        // Step 3: Extract session ID
        $sessionId = $session ? $session->id : null;

        // Step 4: Pass session ID to the view
        if ($user) {
            return view('authentication.admissiondashboard', compact('sessionId'));
        } else {
            return view('authentication.admissionform1', compact('sessionId'));
        }
    }

    public function loginadmissionform()
    {
        return view('authentication.loginadmissionform');
    }

    public function loginadmissionformtransactionid()
    {
        return view('authentication.loginadmissionformtransactionid');
    }

    public function admissiondashboard()
    {
        $user = Auth::user();
        if ($user) {
            return view('authentication.admissiondashboard');
        } else {
            return view('authentication.loginadmissionform');
        }

    }

    public function signinCover()
    {
        return view('authentication.signinCover');
    }

    public function resetPassword()
    {
        return view('authentication.resetPassword');
    }

    public function resetPasswordCover()
    {
        return view('authentication.resetPasswordCover');
    }

    public function verification()
    {
        return view('authentication.verification');
    }

    public function verificationCover()
    {
        return view('authentication.verificationCover');
    }
}
