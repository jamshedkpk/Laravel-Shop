<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
public function index()
{
// To check user is login or not
if(Auth::check())
{
// Get user id 
$userid=Auth::id();
// Select the product from cart table which is added by user
$products=Cart::join('products','carts.product_id','=','products.id')
->join('users','carts.user_id','=','users.id')
->where('carts.user_id','=', $userid)
->get(['products.id','products.name','products.photo','products.selling_price','carts.quantity']);
return view('layouts.frontend.cart')->with(['products'=>$products]);    
}
else
{
return redirect()->route('login');
}
}

// Add product to cart
public function addProductToCart(Request $request)
{
$productid=$request->id;
// If user is not login then redirect to login
if(!Auth::check())
{
return response()->json(['status'=>201]);
}
else
{
// To check the product if it is already in cart
$userid=Auth::id();
$count=Cart::where(['user_id'=>$userid,'product_id'=>$productid])->count();
if($count>0)
{
return response()->json(['status'=>202,'product-exist'=>'Product is already Exist!']);
}
else
{
// To add product to cart
$price=Product::where(['id'=>$productid])->pluck('selling_price')->first();
$obj=new Cart();
$obj->user_id=$userid;
$obj->product_id=$productid;
$obj->quantity=1;
$obj->price=$price;
$obj->total=($price);
$save=$obj->save();
if($save)
{
return response()->json(['status'=>200,'product-added-to-cart'=>'Product is successfully Added!']);
}    
}
}    
}
static function countCartProduct()
{
//To count product of cart items for this user
$userid=Auth::id();
$count=Cart::where(['user_id'=>$userid])->count();    
return response()->json(['data'=>$count]);
}

public function destroy($id)
{
$userid=Auth::id();
$cart=Cart::where(['user_id'=>$userid,'product_id'=>$id]);
$delete=$cart->delete();
if($delete)
{
return response()->json(['cart-product-deleted'=>'Cart Product is successfully Deleted']);
}    
}
public function searchCartRecord()
{
// To check user is login or not
if(Auth::check())
{
// Get user id 
$userid=Auth::id();
// Select the product from cart table which is added by user
$products=Cart::join('products','carts.product_id','=','products.id')
->join('users','carts.user_id','=','users.id')
->where('carts.user_id','=', $userid)
->get(['products.id','products.name','products.photo','products.selling_price','carts.quantity']);
return response()->json(['products'=>$products]);
}
else
{
return redirect()->route('login');
}
}

public function update(Request $request, $id)
{
$productid=$id;
$userid=Auth::id();
$quantity=$request->input('quantity');
$price=Product::find($productid)->pluck('selling_price')->first();
$total=($quantity*$price);
$cart=Cart::where(['user_id'=>$userid,'product_id'=>$productid]);
$cart->update(['quantity'=>$quantity,'price'=>$price,'total'=>$total]);
return response()->json(['cart-product-updated'=>'Cart quantity is successfully Updated!']);
}

// Calculate cart total price
public function cartTotalPrice()
{
$userid=Auth::id();
$total=Cart::where(['user_id'=>$userid])->sum('total');
return response()->json(['cart-total-price'=>$total]);
}
}
