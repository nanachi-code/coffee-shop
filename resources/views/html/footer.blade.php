<footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">About Us</h2>
                    <p>This project is developed by ONE.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Recent Blog</h2>
                    @php
                    $i = 0;
                    @endphp
                    @if (!empty($data))
                    @foreach($data['recent_blog'] as $p)
                    @php
                    if ($i == 2) break;
                    @endphp
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url({{asset($p->thumbnail)}});"></a>
                        <div class="text">
                            <h3 class="heading"><a href="{{url('/blog/post/'.$p->id)}}">{{$p->title}}</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span>
                                        {{$p->created_at->toDateString()}}</a></div>
                                <div><a href="#"><span class="icon-person"></span> {{$p->User->name}}</a></div>
                                <div><a href="#"><span class="icon-chat"></span> {{$p->comment_count}}</a></div>
                            </div>
                        </div>
                    </div>
                    @php
                    $i = $i +1;
                    @endphp
                    @endforeach
                    @endif

                </div>
            </div>
            <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Services</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Cooked</a></li>
                        <li><a href="#" class="py-2 d-block">Deliver</a></li>
                        <li><a href="#" class="py-2 d-block">Quality Ingredients</a></li>
                        <li><a href="#" class="py-2 d-block">Mixed</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View,
                                    San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
                                        210</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span
                                        class="text">t1904aONE@fpt.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
