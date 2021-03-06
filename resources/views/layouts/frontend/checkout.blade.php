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
<label for="country_id">Country :</label>
<select name="country_id" id="country_id" class="form-control">
<option value="0">Select A Country</option>
@foreach($countries as $country)
<option value="{{ $country->id }}">
{{ $country->name }}   
</option>
@endforeach
</select>
@error('country_id')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="state_id">State :</label>
<select name="state_id" id="state_id" class="form-control">
<option value="0">Select A State</option>
@foreach($states as $state)
<option value="{{ $state->id }}">
{{ $state->name }}   
</option>
@endforeach
</select>
@error('state_id')
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
<label for="city_id">City :</label>
<select name="city_id" id="city_id" class="form-control">
<option value="0">Select A City</option>
@foreach($cities as $city)
<option value="{{ $city->id }}">
{{ $city->name }}   
</option>
@endforeach
</select>

@error('city_id')
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
<img src="{{asset($item->productphoto)}}" alt="Not Available" height="60px" width="60px;">
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
<h4 class="mt-5 text-success text-end">Total Price : {{ $totalPrice }}</h4>
<button class="btn btn-success w-100">Place Order</button>
</div>
</div>
</div>
</div>
</form>
</div>
@endsection