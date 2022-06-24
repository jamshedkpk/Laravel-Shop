<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
public function index()
{
$users=User::find(2)->with('products')->get();
{
dd($users->products());
}
}
//return view('layouts.frontend.cart');

}
