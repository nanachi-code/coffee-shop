@extends('layout')

@section('title',"Home")

@section('location')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{asset('images/bg_1.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <span class="subheading">Welcome</span>
                    <h1 class="mb-4">The Best Coffee Testing Experience</h1>
                    <p class="mb-4 mb-md-5">Your good experience is our only purpose. That make a tree front of
                        headlight.</p>
                    <p><a href="{{url('/category/all')}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a
                            href="{{url('/category/all')}}"
                            class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View
                            Menu</a></p>
                </div>

            </div>
        </div>
    </div>

    <div class="slider-item" style="background-image: url({{asset('images/bg_2.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <span class="subheading">Welcome</span>
                    <h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
                    <p class="mb-4 mb-md-5">Our coffee masters have distilled their years of tasting knowledge down to
                        three simple questions to help you find a cup of coffee you’re sure to love.</p>
                    <p><a href="{{url('/category/all')}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a
                            href="{{url('/category/all')}}"
                            class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View
                            Menu</a></p>
                </div>

            </div>
        </div>
    </div>

    <div class="slider-item" style="background-image: url({{asset('images/bg_3.jpg')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                <div class="col-md-8 col-sm-12 text-center ftco-animate">
                    <span class="subheading">Welcome</span>
                    <h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
                    <p class="mb-4 mb-md-5">Our fresh ingredients are always ready to serve you a fantastic meal.</p>
                    <p><a href="{{url('/category/all')}}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a
                            href="{{url('/category/all')}}"
                            class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View
                            Menu</a></p>
                </div>

            </div>
        </div>
    </div>

</section>

<section class="ftco-intro">
    <div class="container-wrap">
        <div class="wrap d-md-flex align-items-xl-end">
            <div class="info">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-phone"></span></div>
                        <div class="text">
                            <h3>000 (123) 456 7890</h3>
                            <p>Our line only works in office hour</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-my_location"></span></div>
                        <div class="text">
                            <h3>198 West 21th Street</h3>
                            <p> 203 Fake St. Mountain View, San Francisco, California, USA</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-clock-o"></span></div>
                        <div class="text">
                            <h3>Open Monday-Friday</h3>
                            <p>8:00am - 9:00pm</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

{{-- end-location --}}

@section('content')
<section class="ftco-about d-md-flex">
    <div class="one-half img" style="background-image: url({{asset('images/about.jpg')}});"></div>
    <div class="one-half ftco-animate">
        <div class="overlap">
            <div class="heading-section ftco-animate ">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Our Story</h2>
            </div>
            <div>
                <p> Our first restaurent was opened in 1999 in small town of Texas, we started here for 3 years then
                    thought
                    that we can serve much more than this to everyone. In next 5 years from then, our origin brand
                    "Raccoon Food"
                    had located in many states of US, but it's doesn't last long. In 2008 our customer left
                    us cause there were many big food brand such as "Mc Donald", "Torna Coffee", "CNN Resaurent",...
                    Our sales down then 50 percents in just a year, and it's enough to realize that we need to change
                    and find a new place to start. Today, we have more than twenty shops in Canada and serve people
                    good food everyday. We'd love to serve you the best meal.</p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row">
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-choices"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Easy to Order</h3>
                        <p>Our partners and developers have bring you so much convinience choses. You can make an order
                            anytime, anywhere
                            as long as you'd love to.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-delivery-truck"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Fastest Delivery</h3>
                        <p>On the way to the future, we promise to give you the best shipping services. Any moment you'd
                            take will be only
                            full of happy and relaxtion.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="media d-block text-center block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-5">
                        <span class="flaticon-coffee-bean"></span></div>
                    <div class="media-body">
                        <h3 class="heading">Quality Coffee</h3>
                        <p>Our coffee masters have distilled their years of tasting knowledge down to three simple
                            questions to help you find a cup of coffee you’re sure to love.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="100">0</strong>
                                <span>Coffee Branches</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="85">0</strong>
                                <span>Number of Awards</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="10567">0</strong>
                                <span>Happy Customer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                <strong class="number" data-number="900">0</strong>
                                <span>Staff</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Our newest products</h2>
                <p>Nothing can help you chill better than a cup of coffee and a soft meal. Let's try it now!</p>
            </div>
        </div>
        <div class="row">
            @foreach (\App\Product::orderBy('updated_at','desc')->take(4)->get() as $i)
            <div class="col-md-3">
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
                        <p><a href="{{url("shopping/{$i->id}")}}" class="btn btn-primary btn-outline-primary">Add
                                to Cart</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-gallery">
    <div class="container-wrap">
        <div class="row no-gutters">
            <div class="col-md-3 ftco-animate">
                <a href="gallery.html" class="gallery img d-flex align-items-center"
                    style="background-image: url(images/gallery-1.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="gallery.html" class="gallery img d-flex align-items-center"
                    style="background-image: url(images/gallery-2.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="gallery.html" class="gallery img d-flex align-items-center"
                    style="background-image: url(images/gallery-3.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ftco-animate">
                <a href="gallery.html" class="gallery img d-flex align-items-center"
                    style="background-image: url(images/gallery-4.jpg);">
                    <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="ftco-menu">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Discover</span>
                <h2 class="mb-4">Our Products</h2>
                <p>It's finger lickin good! </p>
            </div>
        </div>
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
                                aria-selected="@if($loop->first) true @endif">{{$c->name}}</a>

                            @endforeach

                        </div>
                    </div>
                    <div class="col-md-12 d-flex align-items-center">

                        <div class="tab-content ftco-animate" id="v-pills-tabContent">
                            @foreach ($products as $items)
                            <div class="tab-pane fade @if($loop->first) show active @endif"
                                id="v-pills-{{$items->first()->category_product_id}}" role="tabpanel"
                                aria-labelledby="v-pills-{{$items->first()->category_product_id}}-tab">

                                <div class="row">
                                    @foreach($items as $i)
                                    <div class="col-md-4 text-center">
                                        <div class="menu-wrap">
                                            <a href="{{url('/category/product/'.$i->id)}}" class="menu-img img mb-4"
                                                style="background-image: url({{$i->thumbnail}});"></a>
                                            <div class="text">
                                                <h3><a href="{{url('/category/product/'.$i->id)}}">{{$i->name}}</a></h3>
                                                <p>{!! Str::limit($i->description,100," . . .") !!}</p>
                                                <p class="price"><span>${{$i->price}}</span></p>
                                                <p><a href="{{url("shopping/{$i->id}")}}"
                                                        class="btn btn-primary btn-outline-primary">Add to
                                                        cart</a></p>
                                                <p>                                          
                                                                                                 </p>
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

<section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/bg_1.jpg);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Testimony</span>
                <h2 class="mb-4">Customers Says</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
            </div>
        </div>
    </div>
    <div class="container-wrap">
        <div class="row d-flex no-gutters">
            <div class="col-lg align-self-sm-end ftco-animate">
                <div class="testimony">
                    <blockquote>
                        <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life One day however a small.&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_1.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                Designer</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg align-self-sm-end">
                <div class="testimony overlay">
                    <blockquote>
                        <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life One day however a small line of blind text by the name of Lorem Ipsum
                            decided to leave for the far World of Grammar.&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_2.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                Designer</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg align-self-sm-end ftco-animate">
                <div class="testimony">
                    <blockquote>
                        <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life One day however a small line of blind text by the name. &rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_3.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                Designer</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg align-self-sm-end">
                <div class="testimony overlay">
                    <blockquote>
                        <p>&ldquo;We love every-single drink here, also the servives is good. I have invited many
                            friends
                            here.&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_2.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                Designer</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg align-self-sm-end ftco-animate">
                <div class="testimony">
                    <blockquote>
                        <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost
                            unorthographic life One day however a small line of blind text by the name. &rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        <div class="image mr-3 align-self-center">
                            <img src="images/person_3.jpg" alt="">
                        </div>
                        <div class="name align-self-center">Louise Kelly <span class="position">Illustrator
                                Designer</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Recent from blog</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts.</p>
            </div>
        </div>
        <div class="row d-flex">
            @if (!empty($data['recentBlog']))
            @foreach($data['recentBlog'] as $p)
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="{{url('/blog/post/'.$p->id)}}" class="block-20"
                        style="background-image: url({{ asset("uploads/{$p->thumbnail}") }});">
                    </a>
                    <div class="text py-4 d-block">
                        <div class="meta">
                            <div><a href="#">{{$p->created_at->toDateString()}}</a></div>
                            <div><a href="#">{{$p->User->name}}</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> {{$p->comment_count}}</a>
                            </div>
                        </div>
                        <h3 class="heading mt-2"><a href="{{url('/blog/post/'.$p->id)}}">{{$p->title}}</a></h3>
                        <p>{!! Str::limit($p->content,100," ...") !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>
@endsection
{{-- end-content --}}
