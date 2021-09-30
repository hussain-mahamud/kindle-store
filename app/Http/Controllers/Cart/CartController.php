<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book\Book;
use App\Models\Category\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function index(){
        $categories=Category::orderBy('created_at', 'DESC')->get();
        return view('frontend.cart',['categories'=>$categories]);
    }
    public function addToCart(Request $request){
        //Cart::destroy();
        //dd('hi');
    	$book=Book::find($request->pid);
        $data['id']=$book->id;
        $data['name']=$book->title;
        $data['qty']=1;
        $data['price']=$book->price;
        $data['weight']=0;
        $data['options']['img']=$book->cover;
        Cart::add($data);
       // return view('frontend.cart.cart-content');
        return response()->json([
            'items'=>Cart::content(),
            'cart_count'=>Cart::count(),
            'sub_total'=>Cart::subtotal()
        ]);
    }
    public function removeItem(Request $request){
    	Cart::remove($request->id);
       return response()->json(
        [
            'status'=>' Remove from Cart'

        ]);
    }
}
