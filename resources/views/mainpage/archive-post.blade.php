@extends('layout')
@section('title',"Blog")

@section('location')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url({{asset('images/bg_3.jpg')}});"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Blog</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>Blog</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            @if(isset($list))
            @foreach ($list as $post)
            <div class="col-md-4 d-flex ftco-animate fadeInUp ftco-animated">
                <div class="blog-entry align-self-stretch">
                    <a href="{{url("/post/{$post->id}")}}" class="block-20"
                        style="background-image: url({{asset($post->thumbnail)}});">
                    </a>
                    <div class="text py-4 d-block">
                        <div class="meta">
                            <div><span>{{$post->created_at->toDateString()}}</span></div>
                            <div>{{$post->User->name}}</div>
                            <div>
                                <span class="meta-chat"><span class="icon-chat"></span>{{$post->comment_count}}</span>
                            </div>
                        </div>
                        <h3 class="heading mt-2"><a href="{{url('/post/'.$post->id)}}">{{$post->title}}</a></h3>
                        <p>
                            {!! Str::limit($post->content,100," ...") !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            @else <div>Not found</div>
            @endif
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    {!! $list->links('html.pagination') !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
