<?php

namespace App\Http\Controllers\FrontendControllers;

use App\Http\Controllers\Controller;
use App\Mail\UserVarification;
use App\Models\User;
use App\Notifications\UserActivateNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function signup()
    {
        return view('Frontend.Pages.User_Pages.SignUp');
    }

    public function do_signup(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'full_name' => 'required',
            'phone' => 'required|numeric|min:11|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        };

        $user_info = User::create([
            'name'              => $request->full_name,
            'phone'             => $request->phone,
            'email'             => $request->email,
            'photo'             => 'Customer_Photo.jpg',
            'password'          => $request->password,
            'remember_token'    => Str::random(32),
        ]);

        Mail::to($user_info->email)->send(new UserVarification($user_info));

        notify()->success('Your registration is successfully.');
        return redirect()->route('SignIn');
    }


    // -------------Login Section---------------


    public function login()
    {
        return view('Frontend.Pages.User_Pages.LogIn');
    }

    public function do_login(Request $request)
    {
        $validate = validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $filter = $request->except('_token');
        $login = auth()->attempt($filter);

        if ($login) {
            $user_info = User::where('id', auth()->user()->id)->first();

            if ($user_info->email_verified_status != 1) {
                auth()->logout();
                return redirect()->back()->withInput()->with('error', 'sorry! Your account is not Acctivat. Please, Check your E-mail');
            }

            notify()->success('Login Successfully');
            return redirect()->route('User_Home')->with('success', 'Login Successfully');
        }

        notify()->warning('Incorrect Your Email or Password. Please, try again!');
        return redirect()->back()->withInput()->with('error', 'Incorrect Your Email or Password. Please, try again!');
    }


    public function logout()
    {
        auth()->logout();
        notify()->success('Logout Succesfully.');
        return redirect()->route('User_Home');
    }


    // Password Section
    public function forget_password()
    {
        return view('Frontend.Pages.User_Pages.forget_password');
    }


    // ---------- User Activate -----------

    public function user_activate($token = null)
    {
        if ($token == null) {
            return redirect()->route('SignUp')->with('error', 'Sorry! Token is missing!');
        }

        $user_info = User::where('remember_token', $token)->first();

        if ($user_info == null) {
            return redirect()->route('SignUp')->with('error', 'Sorry! Token is missing!');
        }

        $user_info->update([
            'remember_token'            => '',
            'email_verified_status'     => 1,
            'email_verified_at'         => Carbon::now(),
        ]);

        $user_info->notify(new UserActivateNotification($user_info));

        return redirect()->route('SignIn')->with('success', 'Your Account is activated successfully.');
    }
}
