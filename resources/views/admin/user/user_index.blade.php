@extends('layouts.admin.app')
@section('content')
<style>
#userPhoto
{
height:80px !important;
width: 100px !important;
border:1px solid white !important;
border-radius:10px !important;
}
</style>

<div class="container mt-5">
<div class="row">
<div class="col-md-10 offset-1">
<h3 class="text-center">Welcome To The user Section</h3>
<a class="btn btn-primary float-right" href="">
<span class="mdi mdi-plus-circle">&nbsp;
</span>
Add user
</a>
</div>
</div>
<hr>
<div class="row">
<div class="col-md-10 offset-1">
@if(!$users->isEmpty())
<table id="table" class="table table-bordered">
<thead>
<tr>
<th>
S.No
</th>
<th>
Name
</th>
<th>
Email
</th>
<th>
Photo
</th>
<th>
Status
</th>
<th>
Role
</th>
<th>
View
</th>
</thead>
<tbody>
@foreach($users as $index=>$user)
<tr>
<td>
{{ $index+1 }}
</td>
<td>
{{ $user->name }}
</td>
<th>
{{ $user->email }}
</th>
<td>
<img id="userPhoto" src="{{asset($user->photo)}}" alt="">
</td>
<td>
{{ $user->status==1 ? 'Active' : 'In Active' }}
</td>
<td>
{{ $user->role->name }}
</td>
</td>
<td>
<div class="dropdown">
<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Setting </button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="">
<h6 class="dropdown-header">View</h6>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Edit</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Delete</a>
<div class="dropdown-divider"></div>  
@if($user->status==0)            
<a class="dropdown-item" href="#">Mark Active</a>
@else
<a class="dropdown-item" href="#">Mark Inactive</a>
@endif
</div>
</div>
</td>
</tr>
@endforeach
@else
<tr>
<td>
<h4 class="text-center">No Data Were Found</h4>
<div class="img-thumbnail">
<img  class="img-responsive" src="{{asset('template_admin/assets/images/empty.png')}}" alt="" height="300px" width="800px;">
</div>
</td>
</tr>
</tbody>
<tbody>
</table>
@endif
</div>
</div>
</div>
@endsection
@section('extra-js')
@if($message=Session::get('user-added'))
<script>
swal({
title: "Good job!",
text: "{{ $message }}",
icon:"success",
iconColor:'red',
timer:2000,  
button: "OK",
});
</script>
@endif

@if($message=Session::get('user-deleted'))
<script>
swal({
title: "Good job!",
text: "{{ $message }}",
icon:"success",
iconColor:'red',
timer:2000,  
button: "OK",
});
</script>
@endif

@if($message=Session::get('user-updated'))
<script>
swal({
title: "Good job!",
text: "{{ $message }}",
icon:"success",
iconColor:'red',
timer:2000,  
button: "OK",
});
</script>
@endif

<script>
$(document).ready(function(){
$('#table').DataTable({
'responsive':true,
});
});
</script>
@endsection