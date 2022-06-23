<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif
}

body {
    background-color: #f0efed;
}

.container {
    margin: 30px auto
}
.container .product-item
{
    min-height: 450px;
    border: none;
    overflow: hidden;
    position: relative;
    border-radius: 0
}

.container .product-item .product {
    width: 100%;
    height: 350px;
    position: relative;
    overflow: hidden;
    cursor: pointer
}

.container .product-item .product img {
    width: 100%;
    height: 80%;
    object-fit: cover;
}

.container .product-item .product .icons .icon {
    width: 40px;
    height: 40px;
    background-color: #fff;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: transform 0.6s ease;
    transform: rotate(180deg);
    cursor: pointer
}

.container .product-item .product .icons .icon:hover {
    background-color: #10c775;
    color: #fff
}

.container .product-item .product .icons .icon:nth-last-of-type(3) {
    transition-delay: 0.2s
}

.container .product-item .product .icons .icon:nth-last-of-type(2) {
    transition-delay: 0.15s
}

.container .product-item .product .icons .icon:nth-last-of-type(1) {
    transition-delay: 0.1s
}

.container .product-item:hover .product .icons .icon {
    transform: translateY(-60px)
}

.container .product-item .tag {
    text-transform: uppercase;
    font-size: 0.75rem;
    font-weight: 500;
    position: absolute;
    top: 10px;
    left: 20px;
    padding: 0 0.4rem;
}

.container .product-item .title {
    font-size: 0.95rem;
    letter-spacing: 0.5px
}

.container .product-item .fa-star {
    font-size: 0.65rem;
    color: #ff0000;
}

.container .product-item .price {
    margin-top: 10px;
    margin-bottom: 10px;
    font-weight: 600;
}

.fw-800 {
    font-weight: 800;
}

.bg-green {
    background-color: #208f20 !important;
    color: #fff;
}

.bg-black {
    background-color: #1f1d1d;
    color: #fff
}

.bg-red {
    background-color: #bb3535;
    color: #fff
}
</style>
<link rel="stylesheet" href="">
<script src=""></script>
<div class="container bg-white">
    <h2 class="text-center">Latest Products</h2>
    <hr>
    <div class="row">
        @foreach($products as $product)
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
        <div class="card">
        <div class="card-body">

        <div class="product"> <img src="{{asset('storage/productPhoto/'.$product->photo)}}" height="200px;" class="img-responsive" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
         <div class="title pt-4 pb-1">{{ $product->name }}</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">Selling Price : {{$product->selling_price}}</div>
            <button class="btn btn-primary w-100">Add To Cart</button>
            </div>
        </div>
            </div>
            @endforeach
    </div>
</div>
