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
return view('layouts.frontend.app')->with(['products'=>$products,'catagories'=>$catagories]);
}
}
