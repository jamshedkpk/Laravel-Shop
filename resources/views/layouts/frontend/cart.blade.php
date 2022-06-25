@extends('layouts.frontend.app')
@section('content')
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">
        @if(!$products->isEmpty())
        @foreach($products as $product)
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2">
                <img
                  src="{{asset('storage/productPhoto/'.$product->photo)}}"
                  class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-2 ">
                <p class="lead fw-normal mb-2">{{substr($product->name,0,14) }}</p>
              </div>
              <div class="col-md-2  d-flex">
                <button class="btn btn-link px-2"
                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                  <i class="fas fa-minus"></i>
                </button>

                <input id="form1" min="0" name="quantity" value="2" type="number"
                  class="form-control form-control-sm" />

                <button class="btn btn-link px-2"
                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              <div class="col-md-2">
                <h5 class="mb-0">{{$product->selling_price}}</h5>
              </div>
              <div class="col-md-2">
                <h5 class="mb-0">{{$product->selling_price}}</h5>
              </div>
              
              <div class="col-md-2">
                <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <h4 class="text-center">No Data Were Found</h4>
<div class="img-thumbnail">
<img class="img-responsive" src="{{asset('template_admin/assets/images/empty.png')}}" alt="" height="300px" width="800px;">
</div>
      @endif
        <div class="card">
          <div class="card-body text-center">
          <div class="row">
          <div class="col-md-6">
          <a href="{{ route('homepage') }}" class="btn btn-danger btn-block btn-lg w-100">
          <i class="fa fa-home"></i>
          &nbsp;  
          Homepage</a>
          </div>
          <div class="col-md-6">
          <button type="button" class="btn btn-warning btn-block btn-lg w-100">
          <i class="fa fa-shopping-cart"></i>
          &nbsp;    
          Proceed to Pay</button>
          </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('extra-js')
@if($message=Session::get('product-added-to-cart'))
<script>
swal({
title: "Good job!",
text: "{{ $message }}",
icon: "success",
timer:2000,  
button: "OK",
});
</script>
@endif
@endsection