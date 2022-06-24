<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
<button
class="navbar-toggler"
type="button"
data-mdb-toggle="collapse"
data-mdb-target="#navbarTogglerDemo01"
aria-controls="navbarTogglerDemo01"
aria-expanded="false"
aria-label="Toggle navigation"
>
<i class="fas fa-bars"></i>
</button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
<a class="navbar-brand" href="#">
<img src="{{asset('storage/images/logo.png')}}" class="img-thumbnail" height="30px;" width="30px;" alt="">
</a>
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="{{route('homepage')}}">
<strong>
Home    
</strong>
</a>
</li>
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="{{route('homepage')}}">
<strong>
Catagories    
</strong>
</a>
</li>
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="{{route('homepage')}}">
<strong>
Products    
</strong>
</a>
</li>

@guest
@if (Route::has('login'))
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="{{route('login')}}">
<strong>
SignIn    
</strong>
</a>
</li>
@endif

@if (Route::has('register'))
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="{{route('register')}}">
<strong>
Register    
</strong>
</a>
</li>
@endif
@else
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="{{route('register')}}">
<strong>
Profile    
</strong>
</a>
</li>
<li class="nav-item">
<a href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();" class="nav-link active" aria-current="page">
<strong>
Sign Out    
</strong>
</a>
</li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
@csrf
</form>
@endguest


</ul>
<form class="d-flex input-group w-auto">
<input
type="search"
class="form-control"
placeholder="Type query"
aria-label="Search"
/>
<button
class="btn btn-outline-primary"
type="button"
data-mdb-ripple-color="dark">
Search
</button>
</form>
</div>
</div>
</nav>