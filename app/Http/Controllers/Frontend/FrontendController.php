<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book\Book;
use App\Models\Category\Category;
use Illuminate\Support\Facades\DB;
class FrontendController extends Controller
{
    public function index(){
    	$categories=Category::orderBy('created_at', 'DESC')->get();
    	$all_books=Book::orderBy('created_at', 'DESC')->simplePaginate(2);
    	return view('frontend.index',['categories'=>$categories,'all_books'=>$all_books]);
	}
	public function singleBook($id){

		$book=Book::find($id);
        $category_wise_book=Book::where('cat_id',$book->cat_id)
                            ->whereNotIn('id',[$id])
                            ->get();
    	$categories=Category::orderBy('created_at', 'DESC')->get();
    	return view('frontend.single-book',['categories'=>$categories,'book'=>$book,'category_wise_book'=>$category_wise_book]);
	}
    public function categoryWiseBook($id){
        $categories=Category::all();
        $cat_name=Category::select('cat_name')
                    ->where('id',$id)
                    ->get();
                    //dd($cat_name);
        $cat_wise_books=Book::where('cat_id',$id)
                        ->orderBy('created_at','DESC')
                        ->paginate(20);
        return view('frontend.category-wise-book',['categories'=>$categories,'cat_wise_books'=>$cat_wise_books,'cat_name'=>$cat_name]);

    }
	
}
