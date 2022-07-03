<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
// Display orders
public function index()
{
$userid=Auth::id();
$orders=Cart::join('products','carts.product_id','=','products.id')
                ->join('users','carts.user_id','=','users.id')
                ->select(
                'products.name as productname',
                'products.selling_price',
                'products.photo as productphoto',
                'carts.quantity',
                'carts.total',
                )
                ->get();
$user=User::where(['id'=>$userid])->get();
$total=Cart::where(['user_id'=>$userid])->sum('total');
return view('layouts.frontend.order')->with(['orders'=>$orders,'user'=>$user,'total'=>$total]);
}
}
