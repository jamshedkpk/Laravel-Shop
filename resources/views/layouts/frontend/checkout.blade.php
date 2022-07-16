@extends('layouts.frontend.app')
@section('content')
<style>
.table tr th, .table tr td
{
text-align:center;
}
</style>
<div class="container " style="margin-top:10px;">
<form action="{{route('place-order')}}">
<div class="row">
<div class="col-md-6">
<div class="card">
<h3 class="text-primary text-center">Basic Detail</h3>
<div class="card-body">
@if(!$user->isEmpty())
@foreach($user as $user)
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="name">Name :</label>
<input type="text" value="{{ $user->username }}" name="name" id="name" class="form-control"/>
@error('name')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="email">Email :</label>
<input type="text" name="email" value="{{ $user->useremail }}" id="email" class="form-control"/>
@error('email')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
</div>
@endforeach

@endif
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="country">Country :</label>
<select name="country" id="country" class="form-control">
<option value="0">Select A Country</option>
@foreach($countries as $country)
<option value="{{ $country->name }}">
 {{ $country->name }}   
</option>
@endforeach
</select>
@error('country')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="state">State :</label>
<input type="text" id="state" name="state" value="{{ $user->userstate }}" class="form-control"/>
@error('state')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="city">City :</label>
<input type="text" name="city" id="city" value="{{ $user->usercity }}" class="form-control" />
@error('city')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="mobile">Mobile :</label>
<input type="text" name="mobile" id="mobile" value="{{ $user->usermobile }}" class="form-control"/>
@error('mobile')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label for="address">Address :</label>
<textarea class="form-control" name="address" id="address"  cols="30" rows="10">
{{ $user->useraddress }}
</textarea>
@error('address')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6">
<div class="card">
<div class="card-body">
<table class="table table-bordered">
<thead>
<tr>
<th>
S.No
</th>
<th>
Name
</th>
<th>
Image
</th>
<th>
Quantity
</th>
<th>
Price
</th>
</tr>
</thead>
<tbody>
@if(!$cartItems->isEmpty())
@foreach($cartItems as $index=>$item)
<tr>
<td>
{{ $index+1 }}    
</td>
<td>
{{ $item->productname }}
</td>
<td>
<img src="{{asset('storage/productPhoto/'.$item->productphoto)}}" alt="Not Available" height="60px" width="60px;">
</td>
<td>
{{ $item->quantity }}
</td>
<td>
{{ $item->total }}
</td>
</tr>
@endforeach
@else
<h4 class="text-center">No Data Were Found</h4>
<div class="img-thumbnail text-center">
<img class="img-responsive" src="{{asset('template_admin/assets/images/empty.png')}}" alt="" height="300px" width="400px;">
</div>
@endif
</tbody>
</table>
<h4 class="text-success text-end">Total Price : {{ $totalPrice }}</h4>
<button class="btn btn-success w-100">Place Order</button>
</div>
</div>
</div>
</div>
</form>
</div>
@endsection