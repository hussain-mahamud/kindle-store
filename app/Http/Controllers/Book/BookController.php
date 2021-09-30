<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\Category;
use App\Models\Book\Book;
use Illuminate\Support\Facades\DB;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=DB::table('books')
                ->join('categories','books.cat_id','=','categories.id')
                ->select('categories.cat_name','books.id','books.title','books.sub_title','books.asin','books.author')
                ->orderBy('books.id','desc')
                ->get();
        return view('dashboard.admin.books.index',['books'=>$books]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=DB::table('categories')->select('id','cat_name')
                        ->where('cat_status',1)
                        ->orderBy('created_at','desc')
                        ->get();
                        
        return view('dashboard.admin.books.add-book',['categories'=>$categories]);
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
            'title'         =>'required|min:2|max:255',
            'sub_title'     =>'required|min:2|max:650',
            'author'        =>'required',
            'description'   =>'required|min:100',
            'cat_id'        =>'required',
            'feature'       =>'required',
            'price'       =>'required|numeric',
            'cover'         => '        required|file|mimes:jpeg,jpg,png,bmp,gif,svg|max:8192',   
            'file'        => 'required|file|mimes:pdf,docs'   
            ]);
        if($request->hasfile('cover')&& $request->hasfile('file')){
            //Cover Image
            $cover      =$request->file('cover');
            $c_name     =$cover->getClientOriginalName();
            $c_filename   = pathinfo($c_name, PATHINFO_FILENAME);
            $c_extension  = pathinfo($c_name, PATHINFO_EXTENSION);
            $cv_name    =$c_filename.'-'.time().rand(1,100).'.'.$c_extension;
            $cover->move(public_path('covers'),$cv_name);
            //Pdf file(Book)
            $book      =$request->file('file');
            $b_name     =$book->getClientOriginalName();
            $b_filename   = pathinfo($b_name, PATHINFO_FILENAME);
            $b_extension  = pathinfo($b_name, PATHINFO_EXTENSION);
            $book_name    =$b_filename.'-'.time().rand(1,100).'.'.$b_extension;
            $book->move(public_path('books'),$book_name);
            $asin=$this->generatingAsinNumber();
            Book::create([
                'title'         =>$request->title,
                'sub_title'     =>$request->sub_title,
                'keywords'      =>$request->keywords,
                'author'        =>$request->author,
                'co_author'     =>$request->co_author,
                'description'   =>$request->description,
                'cat_id'        =>$request->cat_id,
                'feature'       =>$request->feature,
                'cover'         =>$cv_name,
                'file'          =>$book_name,
                'asin'          =>$asin,
                'price'          =>$request->price
                            ]);
        }
        return redirect()->route('books.index')->with('success','Book Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=Book::find($id);
        $cat=Category::find($book->cat_id);
        return view('dashboard.admin.books.single-book-show',['book'=>$book,'cat'=>$cat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=Book::find($id);
        $selected_cat=DB::table('categories')
                        ->select('id','cat_name')
                        ->where('id','=',$book->cat_id)
                        ->first();
        $categories=Category::whereNotIn('id', array($book->cat_id))
                    ->select('id','cat_name')
                    ->get();

        return view('dashboard.admin.books.edit-book',['book'=>$book,'categories'=>$categories,'selected_cat'=>$selected_cat]);
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
        $request->validate([
            'title'         =>'required|min:2|max:255',
            'sub_title'     =>'required|min:2|max:650',
            'author'        =>'required',
            'description'   =>'required|min:100',
            'cat_id'        =>'required',
            'feature'       =>'required',
            'price'       =>'required|numeric'
            ]);
        $book=Book::find($id);
        if($request->hasfile('cover') && $request->hasfile('file')){
            $request->validate([
                'cover'
                            => 'required|file|mimes:jpeg,jpg,png,bmp,gif,svg|min:2|max:8192',   
                'file'      => 'required|file|mimes:pdf,docs|max:30720'
            ]);
            if($book){
                unlink(public_path('covers/').$book->cover);
                unlink(public_path('books/').$book->file);
            }
            $cover          =$request->file('cover');
            $c_name         =$cover->getClientOriginalName();
            $c_filename     = pathinfo($c_name, PATHINFO_FILENAME);
            $c_extension    = pathinfo($c_name, PATHINFO_EXTENSION);
            $cv_name        =$c_filename.'-'.time().rand(1,100).'.'.$c_extension;
            $cover->move(public_path('covers'),$cv_name);
            //Pdf file(Book)
            $book_file      =$request->file('file');
            $b_name         =$book_file->getClientOriginalName();
            $b_filename     = pathinfo($b_name, PATHINFO_FILENAME);
            $b_extension    = pathinfo($b_name, PATHINFO_EXTENSION);
            $book_name      =$b_filename.'-'.time().rand(1,100).'.'.$b_extension;
            $book_file->move(public_path('books'),$book_name);
            //assign value
            $book->title=$request->title;
            $book->sub_title=$request->sub_title;
            $book->author=$request->author;
            $book->keywords=$request->keywords;
            $book->co_author=$request->co_author;
            $book->description=$request->description;
            $book->cat_id=$request->cat_id;
            $book->feature=$request->feature;
            $book->cover=$cv_name;
            $book->file=$book_name;
            $book->price=$request->price;
            $book->save();
            return redirect()->route('books.index')->with('success','Book Updated Successfully');
        }
        if($request->hasfile('cover') || $request->hasfile('file')){
            //only cover update
            if($request->hasfile('cover')){
                $request->validate([
                    'cover'
                                => 'required|file|mimes:jpeg,jpg,png,bmp,gif,svg|max:8192'    
                ]);
                if($book){
                    unlink(public_path('covers/').$book->cover);
                }
                $cover          =$request->file('cover');
                $c_name         =$cover->getClientOriginalName();
                $c_filename     = pathinfo($c_name, PATHINFO_FILENAME);
                $c_extension    = pathinfo($c_name, PATHINFO_EXTENSION);
                $cv_name        =$c_filename.'-'.time().rand(1,100).'.'.$c_extension;
                $cover->move(public_path('covers'),$cv_name);
                //assign value
                $book->title=$request->title;
                $book->sub_title=$request->sub_title;
                $book->author=$request->author;
                $book->keywords=$request->keywords;
                $book->co_author=$request->co_author;
                $book->description=$request->description;
                $book->cat_id=$request->cat_id;
                $book->feature=$request->feature;
                $book->cover=$cv_name;
                $book->price=$request->price;
                $book->save();
            }
            else if($request->hasfile('file')){
                $request->validate([
                    'file'      => 'required|file|mimes:pdf,docs|max:30720'    
                ]);
                if($book){
                    unlink(public_path('books/').$book->file);
                }
                $book_file      =$request->file('file');
                $b_name         =$book_file->getClientOriginalName();
                $b_filename     = pathinfo($b_name, PATHINFO_FILENAME);
                $b_extension    = pathinfo($b_name, PATHINFO_EXTENSION);
                $book_name      =$b_filename.'-'.time().rand(1,100).'.'.$b_extension;
                $book_file->move(public_path('books'),$book_name);
                //assign value
                $book->title=$request->title;
                $book->sub_title=$request->sub_title;
                $book->author=$request->author;
                $book->keywords=$request->keywords;
                $book->co_author=$request->co_author;
                $book->description=$request->description;
                $book->cat_id=$request->cat_id;
                $book->feature=$request->feature;
                $book->price=$request->price;
                $book->file=$book_name;
                $book->save();

            }

        }
        else{
            $book->title=$request->title;
            $book->sub_title=$request->sub_title;
            $book->author=$request->author;
            $book->keywords=$request->keywords;
            $book->co_author=$request->co_author;
            $book->description=$request->description;
            $book->cat_id=$request->cat_id;
            $book->feature=$request->feature;
            $book->price=$request->price;
            $book->save();

        }
        return redirect()->route('books.index')->with('success','Book Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //Generating Asiin number
   public function generatingAsinNumber(){
        do {
           $asin = mt_rand( 1000000000, 9999999999 );
        } while ( DB::table( 'books' )->where( 'asin', $asin )->exists() );
        return $asin;
    }

}
