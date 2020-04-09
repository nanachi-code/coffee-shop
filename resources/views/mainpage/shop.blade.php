@extends('layout')

@section('title',"Shop")

@section('location')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Order Online</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>Shop</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="ftco-menu mb-5 pb-5">
    <div class="container">
        <div class="row d-md-flex">
            <div class="col-lg-12 ftco-animate p-md-5">
                <div class="row">
                    <div class="col-md-12 d-flex align-items-center">
                        <div class="row">
                            @foreach ($product as $i)
                            <div class="col-md-4">
                                <div class="menu-entry">
                                    <a href="{{url('/category/product/'.$i->id)}}" class="img"
                                        style="background-image: url({{$i->thumbnail}});"></a>
                                    <div class="text text-center pt-4">
                                        <h3><a href="{{url('/category/product/'.$i->id)}}">{{$i->name}}</a></h3>

                                        <p>
                                            {!! Str::limit($i->description,100," . . .") !!}
                                            <a href="{{url('/category/product/'.$i->id)}}">[More]</a>
                                        </p>

                                        <p class="price"><span>${{$i->price}}</span></p>
                                        <p><a href="cart.html" class="btn btn-primary btn-outline-primary">Add
                                                to Cart</a></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>

                </div>
                <div class="row mt-5">
                    <div class="col text-center">
                        <div class="block-27">
                            {!! $product->links('html.pagination') !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
</section>
@endsection
