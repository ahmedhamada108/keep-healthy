<?php

namespace App\Http\Controllers\Website;

use App\Http\Models\contact_us;
use App\Http\Models\sites;
use Illuminate\Http\Request;
use App\Http\Models\vitamins;
use App\Http\Models\exercises;
use App\Http\Models\motivations;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class WebsiteController extends BaseController
{
    public function Home_view(){

        $exercises = exercises::all();
        $sites = sites::all();
        $vitamins = vitamins::all();
        $messages = motivations::all();
        
        return view('welcome',compact(['exercises','sites','vitamins','messages']));
    }

    public function contact_us_Post(Request $request){
        $data = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'content'=>'required',
        ]);
        contact_us::create($data);
        session()->flash('success', 'The message has been sent to the admin');
        return redirect()->route('home.view');
    }
}
