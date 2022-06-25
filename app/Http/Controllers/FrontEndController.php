<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catagory;

class FrontEndController extends Controller
{
public function index()
{
// Show all catagories and products which are available
$products=Product::where(['status'=>1])->get();
$catagories=Catagory::where(['status'=>1])->get();
// Sending catagories and products to the main page of user
return view('layouts.frontend.product')->with(['products'=>$products,'catagories'=>$catagories]);
}

public function searchCatagoryProduct($id)
{
$catagories=Catagory::where(['status'=>1])->get();
$products=Product::where(['catagory_id'=>$id,'status'=>1])->get();
return view('layouts.frontend.catagory')->with(['catagories'=>$catagories,'products'=>$products]);    
}

public function productDetail($pslug,$id)
{
// Get product detail 
$product=Product::find($id);
return view('layouts.frontend.product_detail')->with(['product'=>$product]);
}
}
