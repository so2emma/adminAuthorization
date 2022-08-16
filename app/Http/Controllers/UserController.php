<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\PseudoTypes\True_;

class UserController extends Controller
{

    public function home ()
    {
        return view("user.home");
    }

    public function create(Request $request){
        $validated = $request->validate([
            "name"=> "required",
            "email" => "required|email|unique:users,email",
            "password" => "confirmed|min:5|max:30|confirmed"
        ]);

        User::create([
            "name" =>  $validated["name"],
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"])
        ]);

        if (Auth::guard("web")->attempt(["email"=>$validated["email"], "password"=>$validated["password"]])) {
            $request->session()->regenerate();

            return redirect()->route("user.home");
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

        // session()->flash("success", "You have registered successfully");

        // return redirect()->back();
    }

    public function check(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard("web")->attempt($credentials)) {
            if(!Auth::guard("web")->user()->activated)
            {
                Auth::guard("web")->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'email' => 'Wait for admin to activate your account',
                ])->onlyInput('email');
            }else{
                $request->session()->regenerate();
                return redirect()->route("user.home");
            }

        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::guard("web")->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
