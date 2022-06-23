  <!-- Caraousel Links-->
  <link rel="stylesheet" href="{{asset('frontend/carousel/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/carousel/assets/owl.theme.default.min.css')}}">
<!-- Start of Featured Products-->
  <div class="sy-5">
<div class="container">
<div class="row">
<h2 class="text-center text-primary">Featured Products</h2>
<hr>
<div class="owl-carousel owl-theme">
@foreach($products as $product)
<div class="item">
<div class="card">
<img src="{{asset('storage/productPhoto/'.$product->photo)}}" class="img-thumbnail" alt="">
</div>
<div class="card-body">
<h5 class="text-center text-danger">{{$product->name}}</h5>
<span class="float-start">RS : {{$product->selling_price}}</span>
<span class="float-end"><s>RS : {{$product->original_price}}</s></span>
</div>
</div>
@endforeach
</div>
</div>
</div>
</div>
<!-- Start of Featured Products-->
<!-- Start of Trending Catagories-->
<div class="sy-5">
<div class="container">
<div class="row">
<h2 class="text-center text-primary">Trending Catagories</h2>
<hr>
<div class="owl-carousel owl-theme">
@foreach($catagories as $catagory)
<div class="item">
<div class="card">
<img src="{{asset('storage/catagoryPhoto/'.$catagory->photo)}}" class="img-thumbnail" alt="">
</div>
<div class="card-body">
<h5 class="text-center text-danger">{{$catagory->name}}</h5>
</div>
</div>
@endforeach
</div>
</div>
</div>
</div>
<!-- Start of Trending Catagories-->

<script src="{{asset('frontend/carousel/owl.carousel.min.js')}}"></script>
<script>
$('.owl-carousel').owlCarousel({
loop:true,
margin:10,
nav:true,
dots:false,
responsive:{
0:{
items:1
},
600:{
items:3
},
1000:{
items:4
}
}
})
</script>
