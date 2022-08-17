<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

    public function index(Request $request)
    {
        if(isset($request->status)){
            $users = DB::table('users')->where('activated', $request->status)->get();

        }else{
            $users = User::all();
        }
        return view("admin.index", compact("users"));
    }

    public function status(User $user)
    {
        if ($user->activated)
        {
            $status = false;
        }
        else{
            $status = true;
        }
        $user->Update([
            "activated" => $status,
        ]);

        session()->flash("success", "Status changed Successfully");

        return back();
    }

    public function check(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if(Auth::guard("admin")->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route("admin.index");
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request){
        Auth::guard("admin")->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function message_index()
    {
        $messages = Message::paginate(10);
        return view("admin.message_index", compact("messages"));
    }
}
