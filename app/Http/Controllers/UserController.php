<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\PseudoTypes\True_;

class UserController extends Controller
{

    public function home ()
    {
        $pending = Auth::guard("web")->user()->tasks->where("status", "=", "pending");
        $done = Auth::guard("web")->user()->tasks->where("status", "=", "done");
        $overdue = Auth::guard("web")->user()->tasks->where("status", "=", "overdue");

        // $tasks = Auth::guard("web")->user()->tasks->latest()->take(5)->get();
        // $tasks = Auth::guard("web")->user()->tasks->take(5);
        $tasks = DB::table('tasks')
                    ->where('user_id', '=', Auth::guard("web")->user()->id )
                    ->latest()
                    ->take(5)
                    ->get();

        // dd($tasks);
        return view("user.home", compact("pending", "done", "overdue", "tasks"));
    }

    public function create(Request $request){
        $validated = $request->validate([
            "name"=> "required|min:3",
            "phone"=> "required|min:11|max:11",
            "email" => "required|email|unique:users,email",
            "password" => "confirmed|min:5|max:30|confirmed"
        ]);

        User::create([
            "name" =>  $validated["name"],
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"])
        ]);

        session()->flash("success", "You have registered successfully, wait for admin to activate your account");
        return redirect()->back();
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
                    'email' => 'Your account activation is pending at the moment',
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

    public function message_store(Request $request)
    {
        $request->validate([
            "message" => "required|min:10",
        ]);

        $id = auth()->user()->id;

        Message::create([
            "user_id" => $id,
            "message" => $request->message,
        ]);

        session()->flash("success", "Message Sent Successfully");
        return redirect()->route("user.message.index");
    }

    public function message_index()
    {
        $messages = User::find(auth()->user()->id)->messages;
        return view("user.message.index", compact("messages"));
    }
}
