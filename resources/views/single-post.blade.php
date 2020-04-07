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
                    <h1 class="mb-3 mt-5 bread">Blog Details</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span
                            class="mr-2"><a href="blog.html">Blog</a></span> <span>Blog Single</span></p>
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
            <div class="col-md-8 ftco-animate fadeInUp ftco-animated">
                <div class="py-4">
                    <img src="{{asset($post->thumbnail)}}" alt="" class="img-fluid">
                    {!!$post->content!!}
                </div>

                <div class="about-author d-flex">
                    <div class="row bio align-self-md-center mr-5 col-3">
                        <img src="{{asset('images/person_4.jpg')}}" alt="Image placeholder" class="img-fluid mb-4">
                    </div>
                    <div class="desc align-self-md-center">
                        <h3>{{$author->name}}</h3>
                        <p>{{$author->address}}</p>
                        <p></p>
                    </div>
                </div>


                <div class="pt-5 mt-5">
                    <h3 class="mb-5">{{$post->comment_count}} Comments</h3>
                    <ul class="comment-list">
                        @foreach ($comment as $c)
                        @if ($c->parent == 0)
                        <li class="comment">
                            <div class="vcard bio">
                                <img src="{{asset('images/person_4.jpg')}}" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>{{$c->User->name}}</h3>
                                <div class="meta">{{$c->created_at}}</div>
                                <p>{{$c->content}}</p>
                                <p><a href="#" class="reply">Reply</a></p>
                            </div>
                            @foreach ($comment as $child)
                            @if ($child->parent == $c->id)
                            <ul class="children">
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="{{asset('images/person_4.jpg')}}" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>{{$child->User->name}}</h3>
                                        <div class="meta">{{$child->created_at}}</div>
                                        <p>{{$child->content}}</p>
                                        <p><a href="#" class="reply">Reply</a></p>
                                    </div>
                                </li>
                            </ul>
                            @endif
                            @endforeach
                        </li>
                        @endif
                        @endforeach

                    </ul>
                    <!-- END comment-list -->

                    <div class="haha"></div>

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        @if (\Auth::check())
                        <form action="{{url('/post-comment-'.$post->id)}}" method="POST" id="comment_form">
                            @csrf
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="comment" id="message" cols="30" rows="10"
                                    class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit" value="Post Comment"
                                    class="btn py-3 px-4 btn-primary">
                            </div>
                        </form>
                        @else <button class="btn py-3 px-4 btn-primary"
                            onclick="location.href='{{url('/login')}}';">Login now to post a comment</button>
                        @endif

                    </div>
                </div>

            </div> <!-- .col-md-8 -->
            <div class="col-md-4 sidebar ftco-animate fadeInUp ftco-animated">

                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <div class="categories">
                        <h3>Categories</h3>
                        @foreach($post_cate as $cate)
                        <li><a href="#">{{$cate->name}} <span>({{$cate->Posts->count()}})</span></a></li>
                        @endforeach
                    </div>
                </div>

                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <h3>Recent Blog</h3>
                    @foreach ($data['recent_blog'] as $p)
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url({{asset('images/image_1.jpg')}});"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">{{$p->title}}</a></h3>
                            <div class="meta">
                                <div><a href="#"><span
                                            class="icon-calendar"></span>{{$p->created_at->toDateString()}}</a></div>
                                <div><a href="#"><span class="icon-person"></span>{{$p->User->name}}</a></div>
                                <div><a href="#"><span class="icon-chat"></span>{{$p->comment_count}}</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <h3>Paragraph</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus
                        voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur
                        similique, inventore eos fugit cupiditate numquam!</p>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#comment_form').on('submit',function(event) {
            event.defaultPrevented();
            var form_data = $(this).serialize();
            $.ajax({
                url:"{{url('/post-comment-'.$post->id)}}",
                method: "POST",
                data: {
                    _token: $("input[name=_token]").val(),
                    comment_data: form_data,
                },
                dataType: "JSON",
                success: function (data) {
                   if(res.status){
                        $('#haha').html(data);
                   }
               }
            });
        });

    });
</script>
@endsection
