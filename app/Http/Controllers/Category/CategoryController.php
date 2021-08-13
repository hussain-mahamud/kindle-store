<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $results=Category::all()->sortByDesc("created_at");
        return view('dashboard.admin.categories.index',['results'=>$results]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        'cat_name'      =>'required|min:2|max:100|unique:categories',
        'cat_status'    =>'required'
       ]);
       $cat=new Category();
       $cat->cat_name   =$request->cat_name;
       $cat->cat_status =$request->cat_status;
       $cat->save();
       return redirect()->route('categories.index')->with('success','Category Added Successfully');
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
        $cat_data=Category::find($id);
        return view('dashboard.admin.categories.edit-category',['cat'=>$cat_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
        'cat_name'      =>'required|min:2|max:100',
        'cat_status'    =>'required'
       ]);
       $cat=Category::find($id);
       $cat->cat_name   =$request->cat_name;
       $cat->cat_status =$request->cat_status;
       $cat->save();
       return redirect()->route('categories.index')->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exist=DB::table('books')
                ->where('cat_id','=',$id)
                ->get();
        dd($exist);
    }
}
