<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Models\vitamins;
use Illuminate\Http\Request;
use Exception;

class VitaminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vitamins= vitamins::all();
        return view('AdminPanel.vitamins.index',compact('vitamins'));

    }// end index view funcation 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.vitamins.create');

    } // end create view funcation



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $data = $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);
            vitamins::create($data);
            session()->flash('success', 'the vitamins has been added');
            return redirect()->route('vitamins.index');
            // end creating the object
     
    }// end funcation store

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vitamins  $vitamins
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vitamins= vitamins::find($id);
        return view('AdminPanel.vitamins.show',compact('vitamins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vitamins  $vitamins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
             $vitamins= vitamins::find($id);
             $vitamins->update($data);
             session()->flash('success', 'the vitamins has been edited');
             return redirect()->route('vitamins.index');
         
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vitamins  $vitamins
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        vitamins::destroy($id);

        session()->flash('success','the vitamins has been deleted');
            return redirect()->route('vitamins.index');
    }
}
