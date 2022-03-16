<?php

namespace App\Http\Controllers\AdminPanel;

use Exception;
use App\Http\Models\motivations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MotivationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motivations= motivations::all();
        return view('AdminPanel.motivations.index',compact('motivations'));

    }// end index view funcation 


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.motivations.create');

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
            'name'=>'required',
            'job'=>'required',
            'content'=>'required',
            'image_path'=>'required',
        ]);
        $data= $request->except('image_path');

        if ($request->hasFile('image_path')) {
            $images = $request->file('image_path');
            $file_extension = $request->image_path->getClientOriginalExtension();
            $img_name = time() . '.' . $file_extension;
            $path = public_path('images\motivations');
            $request->image_path->move($path, $img_name);
            $data['image_path']=$img_name;
            // end save image file
            motivations::create($data);
            session()->flash('success', 'the motivations has been added');
            return redirect()->route('motivations.index');
        }// end of the IF statment 
     
    }// end of the store funcation 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\motivations  $motivations
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motivations= motivations::find($id);
        return view('AdminPanel.motivations.show',compact('motivations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\motivations  $motivations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = $request->validate([
            'name'=>'required',
            'job'=>'required',
            'content'=>'required',
        ]);
         $data= $request->except('image_path');
         if ($request->hasFile('image_path')) {

             $images = $request->file('image_path');
             $file_extension = $request->image_path->getClientOriginalExtension();
             $img_name = time() . '.' . $file_extension;
             $path = public_path('images\motivations');
             $request->image_path->move($path, $img_name);
             $data['image_path']=$img_name;
             // end the save image 

             $motivations= motivations::find($id);
             $image = $motivations->image_path;
             File::delete(public_path('images/motivations/'.$image));
             // delete image from the public path
             
             $motivations->update($data);
             session()->flash('success', 'the motivations has been edited');
             return redirect()->route('motivations.index');
         }else{
            $motivations= motivations::find($id)->update($data);
             session()->flash('success', 'the motivations has been edited');
             return redirect()->route('motivations.index');
         }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\motivations  $motivations
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motivation = motivations::find($id);
        $image = $motivation->image_path;
        File::delete(public_path('images/'.$image));
        motivations::destroy($id);

        session()->flash('success','the motivations has been deleted');
            return redirect()->route('motivations.index');
    }
    
}
