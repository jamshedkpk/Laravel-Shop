<script src="{{asset('frontend/jquery.js')}}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link href="{{asset('frontend/bootstrap3.css')}}" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/brands.min.css">
<script src="{{asset('frontend/bootstrap3.js')}}"></script>
<script src="{{asset('frontend/all.min.js')}}"></script>
<script src="{{asset('frontend/popper.min.js')}}"></script>

<!------ Include the above in your HEAD tag ---------->
<style>
/* USER PROFILE PAGE */
.card {
margin-top: 20px;
padding: 30px;
background-color: rgba(214, 224, 226, 0.2);
-webkit-border-top-left-radius:5px;
-moz-border-top-left-radius:5px;
border-top-left-radius:5px;
-webkit-border-top-right-radius:5px;
-moz-border-top-right-radius:5px;
border-top-right-radius:5px;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
box-sizing: border-box;
}
.card.hovercard {
position: relative;
padding-top: 0;
overflow: hidden;
text-align: center;
background-color: #fff;
background-color: rgba(255, 255, 255, 1);
}
.card.hovercard .card-background {
height: 130px;
}
.card-background img {
-webkit-filter: blur(25px);
-moz-filter: blur(25px);
-o-filter: blur(25px);
-ms-filter: blur(25px);
filter: blur(25px);
margin-left: -100px;
margin-top: -200px;
min-width: 130%;
}
.card.hovercard .useravatar {
position: absolute;
top: 15px;
left: 0;
right: 0;
}
.card.hovercard .useravatar img {
width: 100px;
height: 100px;
max-width: 100px;
max-height: 100px;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
border: 5px solid rgba(255, 255, 255, 0.5);
}
.card.hovercard .card-info {
position: absolute;
bottom: 14px;
left: 0;
right: 0;
}
.card.hovercard .card-info .card-title {
padding:0 5px;
font-size: 20px;
line-height: 1;
color: #262626;
background-color: rgba(255, 255, 255, 0.1);
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
}
.card.hovercard .card-info {
overflow: hidden;
font-size: 12px;
line-height: 20px;
color: #737373;
text-overflow: ellipsis;
}
.card.hovercard .bottom {
padding: 0 20px;
margin-bottom: 17px;
}
.btn-pref .btn {
-webkit-border-radius:0 !important;
}
</style>

<script>
// $(document).ready(function() {
// $(".btn-pref .btn").click(function () {
// $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
// // $(".tab").addClass("active"); // instead of this do the below 
// $(this).removeClass("btn-default").addClass("btn-primary");   
// });
// });
</script>

<div class="container-fluid">
<div class="col-md-12">
<div class="card hovercard">
<div class="card-background">
<img class="card-bkimg" alt="" src="{{asset('storage/userPhoto/background.jpg')}}">
</div>
<div class="useravatar">
<img alt="" src="{{asset('storage/userPhoto/user2.jpg')}}">
</div>
<div class="card-info"> <span class="card-title">
<strong>
Welcome To Mr : {{ Auth()->user()->name }}    
</strong>
</span>
</div>
</div>
<div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
<div class="btn-group" role="group">
<button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab">
<strong>
<span class="fa fa-user"></span>
<div class="hidden-xs">
View Profile
</div>
</strong>

</button>
</div>
<div class="btn-group" role="group">
<button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab">
<strong>
<span class="fa fa-lock"></span>
<div class="hidden-xs">Update Profile</div>
</strong>
</button>
</div>
<div class="btn-group" role="group">
<button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab">
<strong>
<span class="fa fa-star"></span>    
<div class="hidden-xs">Update Password</div>
</strong>
</button>
</div>
<div class="btn-group" role="group">
<button type="button" id="favorites" class="btn btn-default" href="#tab4" data-toggle="tab">
<strong>
<span class="fa fa-user-plus"></span>
<div class="hidden-xs">Update Photo</div>
</strong></button>
</div>

</div>

<div class="well">
<div class="tab-content">

<!-- Start of View Profile-->
<div class="tab-pane fade in active" id="tab1">
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>Name:</label>
<input name="name" value="{{$user->name}}" type="text" class="form-control text-center" readonly>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>Email:</label>
<input name="email" value="{{$user->email}}" type="text" class="form-control text-center" readonly>
</div>
</div><div class="col-md-4">
<div class="form-group">
<label>Role:</label>
<input name="role" value="{{$user->role->name}}" type="text" class="form-control text-center" readonly>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>Country:</label>
<input type="text" value="{{$user->country->name}}" class="form-control" readonly>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>State:</label>
<input name="state" value="{{$user->state->name}}" type="text" class="form-control text-center" readonly>
</div>
</div><div class="col-md-4">
<div class="form-group">
<label>City:</label>
<input name="city" value="{{$user->city->name}}" type="text" class="form-control text-center" readonly>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>Mobile:</label>
<input name="mobile" value="{{$user->mobile}}" type="text" class="form-control text-center" readonly>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>status:</label>
<input name="status" value="{{$user->status==1 ? 'Active' : 'In Active' }}" type="text" class="form-control text-center" readonly>
</div>
</div><div class="col-md-4">
<div class="form-group">
<label>Address:</label>
<input name="address" value="{{$user->address}}" type="text" class="form-control text-center" readonly>
</div>
</div>
</div>
</div>
<!-- End of View Profile-->

<!-- Start of View Update Password-->
<div class="tab-pane fade in" id="tab2">
<form action="{{route('update-user-profile',$user->id)}}" method="post">
@csrf
@method('PUT')
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>Name:</label>
<input name="name" value="{{$user->name}}" type="text" class="form-control">
@error('name')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>Email:</label>
<input name="email" value="{{$user->email}}" type="text" class="form-control">
@error('email')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div><div class="col-md-4">
<div class="form-group">
<label>Country:</label>
<select name="country" id="country" class="form-control">
<option value="null">Please Select A Country</option>
@foreach($countries as $country)    
<option value="{{$country->id}}" {{ $country->id==$user->country_id ? 'selected':''}}>
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
</div>
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>State:</label>
<select name="state" id="state" class="form-control">
<option value="null">Please Select A State</option>
@foreach($states as $state)    
<option value="{{$state->id}}" {{ $state->id==$user->state_id ? 'selected':''}}>
{{ $state->name }}
</option>
@endforeach
</select>
@error('state')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div><div class="col-md-4">
<div class="form-group">
<label>City:</label>
<select name="city" class="form-control" id="city">
<option value="null">Please Select A City</option>
@foreach($cities as $city)    
<option value="{{$city->id}}" {{ $city->id==$user->city_id ? 'selected':''}}>
{{ $city->name }}
</option>
@endforeach
</select>
@error('city')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>Address:</label>
<input name="address" value="{{$user->address}}" type="text" class="form-control">
@error('address')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>Mobile:</label>
<input name="mobile" value="{{$user->mobile}}" type="text" class="form-control">
@error('mobile')
<strong class="text-danger">
{{ $message }}
</strong>
@enderror
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>Role:</label>
<input name="role" value="{{$user->role->name}}" type="text" class="form-control" readonly>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>status:</label>
<input name="status" value="{{$user->status==1 ? 'Active' : 'In Active' }}" type="text" class="form-control" readonly>
</div>
</div>
</div>

<div class="row">
<div class="col-md-4 text-center">
<button class="btn btn-danger btn-block">
<span class="fa fa-home"></span>
&nbsp;    
Back Home</button>
</div>
<div class="col-md-4 text-center">
<button class="btn btn-success btn-block" name="btnUpdateProfile">
<span class="fa fa-edit"></span>
&nbsp;    
Update Profile</button>
</div>
<div class="col-md-4 text-center">
</div>
</div>
</form>
</div>
<!-- End of View Update Password-->

<!-- Start of View Update Profile-->
<div class="tab-pane fade in" id="tab3">
<h3>This is tab 3</h3>
</div>
<!-- End of View Update Profile-->

<!-- Start of View Update Photo-->
<div class="tab-pane fade in" id="tab4">
<h3>This is tab 4</h3>
</div>
<!-- End of View Update Photo-->

</div>
</div>

</div>

</div>
