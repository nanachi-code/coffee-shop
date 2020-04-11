@extends('layout')

@section('title',"Single-Product")

@section('location')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Product Detail</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>Product
                            Detail</span></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="{{$product->thumbnail}}" class="image-popup"><img src="{{$product->thumbnail}}"
                        class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3>{{$product->name}}</h3>
                <p class="price"><span>${{$product->price}}</span></p>
                <p>{{$product->description}}</p>
                <p></p>
                <div class="row mt-4">
                    <div class="w-100"></div>
                    <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                <i class="icon-minus"></i>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1"
                            min="1" max="100">
                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                <i class="icon-plus"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <p><a href="{{url("shopping/{$product->id}")}}" class="btn btn-primary py-3 px-5">Add to Cart</a></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading py-3">Discover</span>
                <h2 class="mb-4">Related products</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
            </div>
        </div>
        <div class="row">
            @foreach ($related_product as $p)
            <div class="col-md-3">
                <div class="menu-entry">
                    <a href="#" class="img" style="background-image: url({{$p->thumbnail}});"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">{{$p->name}}</a></h3>
                        <p>
                            {!! Str::limit($p->description,100," . . .") !!}
                            <a href="{{url('/category/product/'.$p->id)}}">[More]</a>
                        </p>
                        <p class="price"><span>${{$p->price}}</span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
