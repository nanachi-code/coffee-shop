<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">Coffee<small>Blend</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{url('/cart')}}" id=" dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Product</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{url('/shop')}}">Shop</a>
                        @foreach ($data['category'] as $c)
                        <a class="dropdown-item" href="{{url('/category/'.$c->id)}}">{{$c->category_name}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item"><a href="{{url('/blog')}}" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="{{url('/about-us')}}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{url('/contact')}}" class="nav-link">Contact</a></li>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a href="#" id="user-menu" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <span style='font-size: 22px; color: white' class="icon icon-user"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{url('/user/profile')}}" class="dropdown-item">{{"User Profile"}}</a>
                                <a href="{{url('/user/order')}}" class="dropdown-item">{{"User Order"}}</a>
                                <a class="dropdown-item" href="{{url('/cart')}}">{{"Cart"}}</a>
                                <a class="dropdown-item" href="{{url('/checkout')}}">{{"Checkout"}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <li class="nav-item cart"><a href="{{url('/cart')}}" class="nav-link">
                        <span class="icon icon-shopping_cart"></span>
                        <span class="bag d-flex justify-content-center align-items-center"><small>1</small></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
