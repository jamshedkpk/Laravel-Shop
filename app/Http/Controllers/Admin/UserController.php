<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use App\Models\User;
use App\Models\State;
use App\Models\City;


class UserController extends Controller
{
// Get all users detail for admin
public function index()
{
$users= User::all();
return view('admin.user.user_index')->with(['users'=>$users]);
}
// Get one user detail for admin or user
public function viewProfile($id)
{
if(!Auth::check())
{
return redirect()->route('login');
}
else
{
$userid=$id;
$user=User::where(['id'=>$userid])->first();
$countries=Country::all();
$states=State::all();
$cities=City::all();
return view('admin.user.view_profile')->with(['user'=>$user,'countries'=>$countries,'states'=>$states,'cities'=>$cities]);    
}
}
// Return view for edit profile
public function editProfile($id)
{
$user=User::where(['id'=>$id])->first();
$countries=Country::all();
$states=State::all();
$cities=City::all();
return view('admin.user.edit_profile')->with(['user'=>$user,'countries'=>$countries,'states'=>$states,'cities'=>$cities]);    
}
// Return view for edit password
public function editPassword($id)
{
$user=User::where(['id'=>$id])->first();
return view('admin.user.edit_password')->with(['user'=>$user]);
}
// Return view for edit photo
public function editPhoto($id)
{
$user=User::where(['id'=>$id])->first();
return view('admin.user.edit_photo')->with(['user'=>$user]);
}

// Update user profile by admin or user
public function updateProfile(Request $request, $id)
{
$this->validate($request,
[
'name'=>'required',
'email'=>'required',
'country'=>'required',
'state'=>'required',
'city'=>'required',
'address'=>'required',
'mobile'=>'required'
]);
$user=User::where(['id'=>$id]);
$user->update(['name'=>$request->name]);
return redirect()->back();
}
// Update user photo
public function updatePhoto($id)
{

}
// Update user password
public function updatePassword($id)
{

}
}
