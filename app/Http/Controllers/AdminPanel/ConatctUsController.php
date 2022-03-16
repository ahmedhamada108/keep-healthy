<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Models\contact_us;
use Illuminate\Http\Request;

class ConatctUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_us= contact_us::all();
        return view('AdminPanel.Contactus.index',compact('contact_us'));

    }// end index view function 


    public function edit($id)
    {
        $contact_us= contact_us::find($id);
        return view('AdminPanel.Contactus.show',compact('contact_us'));
    }// end edit function  

    public function destroy($id)
    {
        contact_us::destroy($id);
        session()->flash('success','The ContactUs mail has been deleted');
        return redirect()->route('contact_us.index');
    }

    
}
