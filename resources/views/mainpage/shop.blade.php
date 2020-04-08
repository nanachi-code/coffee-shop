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
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Shop</span></p>
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
                    <div class="col-md-12 nav-link-wrap mb-5">
                        <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">

                            @foreach ($category as $c)

                            <a class="nav-link @if($loop->first) active @endif" id="v-pills-{{$c->id}}-tab"
                                data-toggle="pill" href="#v-pills-{{$c->id}}" role="tab"
                                aria-controls="v-pills-{{$c->id}}"
                                aria-selected="@if($loop->first) true @else false @endif">{{$c->name}}</a>

                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12 d-flex align-items-center">

                        <div class="tab-content ftco-animate" id="v-pills-tabContent">

                            @foreach ($product as $p)
                            <div class="tab-pane fade @if($loop->first) show active @endif"
                                id="v-pills-{{$p->first()->category_product_id}}" role="tabpanel"
                                aria-labelledby="v-pills-{{$p->first()->category_product_id}}-tab">
                                <div class="row">
                                    @foreach ($p as $i)
                                    <div class="col-md-3">
                                        <div class="menu-entry">
                                            <a href="{{url('/shop/product/'.$i->id)}}" class="img"
                                                style="background-image: url({{$i->thumbnail}});"></a>
                                            <div class="text text-center pt-4">
                                                <h3><a href="{{url('/shop/product/'.$i->id)}}">{{$i->name}}</a></h3>
                                                <p>A small river named Duden flows by their place and supplies</p>
                                                <p class="price"><span>$5.90</span></p>
                                                <p><a href="cart.html" class="btn btn-primary btn-outline-primary">Add
                                                        to Cart</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
