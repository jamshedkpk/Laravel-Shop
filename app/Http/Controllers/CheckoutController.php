<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Country;

class CheckoutController extends Controller
{
// This function will fetch cart data to checkout page
public function index()
{
// Get user id from Auth class
$userid=Auth::id();
// Get all products of user in the cart
$cartItems=Cart::join('products','products.id','=','carts.product_id')
->join('users','users.id','=','carts.user_id')
->select(
'products.name as productname',
'products.selling_price as productprice',
'products.photo as productphoto',
'carts.quantity as quantity',
'carts.total as total')
->get();
// Get user detail
$user=User::where(['id'=>$userid])->
select(
'users.name as username',
'users.email as useremail',
'users.country as usercountry',
'users.city as usercity',
'users.state as userstate',
'users.mobile as usermobile',
'users.address as useraddress',
)->get();
$totalPrice=Cart::where(['user_id'=>$userid])->sum('total');
$countries=Country::all();
return view('layouts.frontend.checkout',compact('cartItems','user','totalPrice','countries')); 
}

// This function will place order means it will store user order in order table
public function placeOrder(Request $request)
{
// Place order information in order table
$userid=Auth::id();
$cart=Cart::where(['user_id'=>$userid])->count();
if($cart<1)
{
dd('cart is empty');
}
else
{
    $order=New Order();
    $order->user_id=$userid;
    $order->token="Order"."_".time()."_".random_int(000,999);
    $order->date=date('d-M-Y');
    $order->status=0;
    $order->type="Offline";
    $order->save();
    
    // Place order items information in orderitem table
    // Get product information
    $cartItems=Cart::join('products','products.id','=','carts.product_id')
    ->join('users','users.id','=','carts.user_id')
    ->select(
    'products.id as productid',
    'products.name as productname',
    'products.selling_price as productprice',
    'products.photo as productphoto',
    'carts.quantity as quantity',
    'carts.total as total')
    ->get();
    // Get order id from order table
    $orderid=Order::where(['user_id'=>$userid])->pluck('id')->first();
    // As their are multiple items in user order so we use foreach loop to store in order items table
    foreach($cartItems as $item)
    {
    OrderItem::create([
    'order_id'=>$orderid,
    'product_id'=>$item->productid,
    'quantity'=>$item->quantity,
    'price'=>$item->productprice,
    'total'=>$item->total
    ]);
    }
    // Update users information in user table for this order
    $country=$request->country;
    $user=User::where(['id'=>$userid])->first();
    $this->validate($request,[
    'name'=>'required',
    'email'=>'required',
    'country'=>'required|notIn:0',
    'city'=>'required',
    'state'=>'required',
    'mobile'=>'required',
    'address'=>'required'
    ]);
    $user->update([
    'name'=>$request->name,
    'email'=>$request->email,
    'country'=>$request->country,
    'city'=>$request->city,
    'state'=>$request->state,
    'mobile'=>$request->mobile,
    'address'=>$request->address
    ]);
    
}
}
}
