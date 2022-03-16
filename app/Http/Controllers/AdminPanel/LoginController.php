<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Models\admins;
use App\Http\Models\contact_us;
use App\Http\Models\exercises;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LoginController extends BaseController
{
    public function login_view(){
        return view('AdminPanel.login');
    }//end login view

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (auth('admin')->attempt($credentials)) {
            session()->flash('success','done');
            return redirect()->route('dashboard.view');
        }else{
            session()->flash('error','Oppes! You have entered invalid credentials');
            return redirect()->route('login.view');
        }
    }// end post login func

    public function dashboard_view(){
        $messages= contact_us::all();
        $exercises = exercises::all();
        $admins = admins::all();
        return view('AdminPanel.dashboard',compact(['messages','exercises','admins']));
    }// end dashboard view func

    public function logout()
    {
        auth('admin')->logout();
        return redirect()->route('login.view');
    }// end logout func
}
