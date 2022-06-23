<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class FrontEndController extends Controller
{
public function index()
{
$products=Product::all();
return view('layouts.frontend.app')->with(['products'=>$products]);
}
}
