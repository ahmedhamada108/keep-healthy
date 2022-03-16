<?php

namespace App\Http\Controllers\AdminPanel;

use Exception;
use Illuminate\Http\Request;
use App\Http\Models\exercises;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises= exercises::all();
        return view('AdminPanel.Exercises.index',compact('exercises'));

    }// end index view funcation 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.Exercises.create');

    } // end create view funcation

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

                $data = $request->validate([
                'title'=>'required',
                'content'=>'required',
                'video_url'=>'required',
                'image_path'=>'required',
            ]);

                $data= $request->except('image_path');

                if ($request->hasFile('image_path')) {
                    $images = $request->file('image_path');

                    $file_extension = $request->image_path->getClientOriginalExtension();
                    $img_name = time() . '.' . $file_extension;
                    $path = public_path('images\exercises');
                    $request->image_path->move($path, $img_name);
                    $data['image_path']=$img_name;
                    // end save image file
                    exercises::create($data);

                    session()->flash('success', 'the exercises has been added');
                    return redirect()->route('exercises.index');
            }
        }catch (exception  $e) {
            session()->flash('success', $e->getMessage() );
            return redirect()->route('exercises.index');
        }
     
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Models\exercises  $exercises
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\exercises $exercises
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exercises= exercises::find($id);
        return view('AdminPanel.exercises.show',compact('exercises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\exercises  $exercises
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    try {
         $data = $request->validate([
            'title'=>'required',
            'content'=>'required',
            'video_url'=>'required',
        ]); // end of validate 
        
         $data= $request->except('image_path');
         if ($request->hasFile('image_path')) {

            $images = $request->file('image_path');
            $file_extension = $request->image_path->getClientOriginalExtension();
            $img_name = time() . '.' . $file_extension;
            $path = public_path('images\exercises');
            $request->image_path->move($path, $img_name);
            $data['image_path']=$img_name;
            // end the save image 

            $exercises= exercises::find($id);
            $image = $exercises->image_path;
            File::delete(public_path('images/exercises/'.$image));
            // delete image from the public path
            
            $exercises->update($data);
            session()->flash('success', 'the exercises has been edited');
            return redirect()->route('exercises.index');
         }else{
             $exercises= exercises::find($id)->update($data);
             session()->flash('success', 'the exercises has been edited');
             return redirect()->route('exercises.index');
         } // end of if satatments 

    }catch (exception  $e) {
        session()->flash('success', $e->getMessage() );
        return redirect()->route('exercises.index');
    } // end of try funaction 

} // end of the update fucation 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\exercises  $exercises
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exercise = exercises::find($id);
        $image = $exercise->image_path;
        File::delete(public_path('images/'.$image));
        exercises::destroy($id);
        session()->flash('success','the exercises has been deleted');
            return redirect()->route('exercises.index');
    } // end the delete funcation 

}