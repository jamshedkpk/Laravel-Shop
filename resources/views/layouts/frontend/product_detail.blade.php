@extends('layouts.frontend.app')
@section('content')
<style>

.card{border:none;
}
.product{
    background-color: #eee;
    padding:25px;
}
.brand{font-size: 13px}
.act-price{color:red;font-weight: 700}
.dis-price{text-decoration: line-through}
.about{font-size: 14px}
.color{margin-bottom:10px}
label.radio{cursor: pointer}
label.radio input{position: absolute;top: 0;left: 0;visibility: hidden;pointer-events: none}
label.radio span{padding: 2px 9px;border: 2px solid #ff0000;display: inline-block;color: #ff0000;border-radius: 3px;text-transform: uppercase}
label.radio input:checked+span{border-color: #ff0000;background-color: #ff0000;color: #fff}
.btn-danger{background-color: #ff0000 !important;border-color: #ff0000 !important}
.btn-danger:hover{background-color: #da0606 !important;border-color: #da0606 !important}
.btn-danger:focus{box-shadow: none}
.cart i{margin-right: 10px}
</style>
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    @if($product)
                    <div class="col-md-4">
                    <img id="main-image" src="{{ asset('storage/productPhoto/'.$product->photo) }}" height="100%"/>
                    </div>
                    <div class="col-md-8">
                        <div class="product">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Orianz</span>
                                <h3 class="text-uppercase">
                                <strong>{{$product->name}}</strong>
                                </h3>
                                <h5 class="text-uppercase text-danger">
                                <strong>
                                <s>
                                Orignal Price :    
                                {{$product->original_price}}
                                </s>
                                </strong>
                                </h5>
                                <h5 class="text-uppercase text-success">
                                <strong>Selling Price : {{$product->selling_price}}</strong>
                                </h5>                            
                            </div>
                            <p class="about">
                            {{ $product->description }}    
                            </p>
                            <div class="text-center">
                            <button class="btn btn-success text-uppercase mr-2 px-4"> <i class="fa fa-shopping-cart"></i> 
                            &nbsp;
                            Add To Cart</button>
                            <a href="{{route('homepage')}}" class="btn btn-danger text-uppercase mr-2 px-4"> <i class="fa fa-home"></i>
                            &nbsp;
                            Home Page</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection