<?php

namespace App\Http\Controllers\AdminPanel;

use Exception;
use App\Http\Models\sites;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites= sites::all();
        return view('AdminPanel.sites.index',compact('sites'));

    }// end index view funcation 


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.sites.create');

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
                'content'=>'required',
                'site_url'=>'required',
                'image_path'=>'required',
            ]);

                $data= $request->except('image_path');

                if ($request->hasFile('image_path')) {
                    $images = $request->file('image_path');

                    $file_extension = $request->image_path->getClientOriginalExtension();
                    $img_name = time() . '.' . $file_extension;
                    $path = public_path('images\sites');
                    $request->image_path->move($path, $img_name);
                    $data['image_path']=$img_name;
                    // end save image file
                    sites::create($data);

                    session()->flash('success', 'the sites has been added');
                    return redirect()->route('sites.index');
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sites  $sites
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sites= sites::find($id);
        return view('AdminPanel.sites.show',compact('sites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sites  $sites
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data = $request->validate([
            'title'=>'required',
            'content'=>'required',
            'site_url'=>'required',
        ]);
         $data= $request->except('image_path');
         if ($request->hasFile('image_path')) {

             $images = $request->file('image_path');
             $file_extension = $request->image_path->getClientOriginalExtension();
             $img_name = time() . '.' . $file_extension;
             $path = public_path('images\sites');
             $request->image_path->move($path, $img_name);
             $data['image_path']=$img_name;
             // end the save image 

             $sites= sites::find($id);
             $image = $sites->image_path;
             File::delete(public_path('images/sites/'.$image));
             // delete image from the public path
             
             $sites->update($data);
             session()->flash('success', 'the sites has been edited');
             return redirect()->route('sites.index');
         }else{
            $sites= sites::find($id)->update($data);
             session()->flash('success', 'the sites has been edited');
             return redirect()->route('sites.index');
         }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sites  $sites
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site = sites::find($id);
        $image = $site->image_path;
        File::delete(public_path('images/'.$image));
        sites::destroy($id);

        session()->flash('success','the sites has been deleted');
            return redirect()->route('sites.index');
    }
    
}
