<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
/**
 * Create a new controller instance.
 *
 * @return void
 */
public function __construct()
{
$this->middleware('auth');
}

/**
 * Show the application dashboard.
 *
 * @return \Illuminate\Contracts\Support\Renderable
 */
public function index()
{
// Check if user is admin or not
$role=auth()->user()->checkRole();
if($role=='admin')
{
return redirect('/dashboard')->with('status','Welcome To Admin');
}
else
{
return redirect('/')->with('status','Welcome To User');
}
}
}
