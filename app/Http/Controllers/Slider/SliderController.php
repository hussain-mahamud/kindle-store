<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider\Slider;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results=Slider::orderBy('id', 'DESC')->get();
        return view('dashboard.admin.sliders.index',['results'=>$results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                'sl_name' => 'required|file|mimes:jpg,jpeg,png,bmp,gif,svg|max:8192'   
            ]);
        if($request->hasfile('sl_name')){
            $file=$request->file('sl_name');
            $name=$file->getClientOriginalName();
            $filename = pathinfo($name, PATHINFO_FILENAME);
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $sl_name=$filename.'-'.time().rand(1,100).'.'.$extension;
            $file->move(public_path('sliders'),$sl_name);
            Slider::create([
                            'sl_name' => $sl_name,
                            'sl_status' => $request->sl_status
                            ]);
        }
        return redirect()->route('sliders.index')->with('success','Slider Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider=Slider::find($id);
        return view('dashboard.admin.sliders.edit-slider',['slider'=>$slider]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sl=Slider::find($id);
        if($request->hasfile('sl_name')){
            if($sl){
                unlink(public_path('sliders/').$sl->sl_name);
            }
            $file=$request->file('sl_name');
            $name=$file->getClientOriginalName();
            $filename = pathinfo($name, PATHINFO_FILENAME);
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $sl_name=$filename.'-'.time().rand(1,100).'.'.$extension;
            $file->move(public_path('sliders'),$sl_name);
            $sl->sl_name=$sl_name;
            $sl->sl_status=$request->sl_status;
            $sl->save();
        }
        else{
            $sl->sl_status=$request->sl_status;
            $sl->save();
        }
        return redirect()->route('sliders.index')->with('success','Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sl=Slider::find($id);
        unlink(public_path('sliders/').$sl->sl_name);
        $sl->delete();
       return redirect()->route('sliders.index')->with('success', 'Slider Deleted Successfully'); 
    }
}
