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
                            class="mr-2"><a href="{{url('/blog')}}">Blog</a></span></p>
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
                <h2 class="mb-3">{{ $post->title }}</h2>
                <div class="py-4">
                    <img src="{{ asset("uploads/{$post->thumbnail}") }}" alt="" class="img-fluid">
                    {!! $post->content !!}
                </div>

                <div class="about-author d-flex">
                    <div class="row bio align-self-md-center mr-5 col-3">
                        <img src="{{ asset("uploads/{$post->user->avatar}") }}" alt="Image placeholder"
                            class="img-fluid mb-4">
                    </div>
                    <div class="desc align-self-md-center">
                        <h3>{{ $post->user->name }}</h3>
                        <p>{{ $post->user->address }}</p>
                        <p></p>
                    </div>
                </div>


                <div class="pt-5 mt-5">
                    <h3 class="mb-5" id="comment-count">{{ count($post->comments) }} Comments</h3>
                    <ul class="comment-list">
                        @foreach ($post->comments as $comment)
                        @if (!$comment->hasParent())
                        <li class="comment" id="{{$comment->id}}">
                            <div class="vcard bio">
                                <img src="{{ asset("uploads/{$comment->user->avatar}") }}" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3>{{ $comment->user->name }}</h3>
                                <div class="meta">{{ $comment->updated_at }}</div>
                                <p>{{ $comment->content }}</p>
                                <p><a content="{{ $comment->id }}" class="reply">Reply</a></p>
                            </div>

                            @if ($comment->hasChildren())
                            @foreach ($comment->children as $child)
                            {{ renderChildComment($child) }}
                            @endforeach
                            @endif
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    <!-- END comment-list -->

                    <div class="comment-form-wrap pt-5">
                        <h3 class="mb-5">Leave a comment</h3>
                        @if (\Auth::check())
                        <form action="{{url('/blog/post-comment-'.$post->id)}}" method="POST" id="comment_form">
                            @csrf
                            Logged in as <span class="text-white">{{ \Auth::user()->name }}</span>. <a
                                href="{{ url("logout") }}">Logout?</a>
                            <hr>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="comment" id="comment" cols="30" rows="10"
                                    class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="parent_id" id="parent_id" value="0" />
                                <input type="submit" name="submit" id="submit" value="Submit"
                                    class="btn py-3 px-4 btn-primary" />
                            </div>
                        </form>
                        @else
                        <a class="btn py-3 px-4 btn-primary" href="{{ url('/login') }}">
                            Login now to post a comment
                        </a>
                        @endif

                    </div>
                </div>

            </div> <!-- .col-md-8 -->
            <div class="col-md-4 sidebar ftco-animate fadeInUp ftco-animated">
                <div class="sidebar-box">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <div class="icon">
                                <span class="icon-search"></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                    </form>
                </div>
                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <div class="categories">
                        <h3>Categories</h3>
                        @empty($category_post)
                        No categories.
                        @else
                        @foreach ($category_post as $c)
                        <li>
                            <a
                                href="{{ url("/blog/{$c->id}") }}">{{ $c->name }}<span>({{$c->posts->count()}})</span></a>
                        </li>
                        @endforeach
                        @endempty
                    </div>
                </div>

                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <h3>Recent Blog</h3>
                    @if (count(\App\Post::where('id', '!=', $post->id)->get()) > 0)
                    @foreach (\App\Post::where('id', '!=', $post->id)->orderBy('updated_at','desc')->take(3)->get() as
                    $p)
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4"
                            style="background-image: url({{ asset("uploads/{$p->thumbnail}") }});"></a>
                        <div class="text">
                            <h3 class="heading"><a href="{{url('blog/post/'.$p->id)}}">{{$p->title}}</a></h3>
                            <div class="meta">
                                <div><a href="#"><span
                                            class="icon-calendar"></span>{{$p->created_at->toDateString()}}</a>
                                </div>
                                <div><a href="#"><span class="icon-person"></span>{{$p->User->name}}</a></div>
                                <div><a href="#"><span class="icon-chat"></span>{{$p->comment_count}}</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    No posts found.
                    @endif
                </div>

                <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                    <h3>Warning!</h3>
                    <p>
                        Please respect other user. All comments with outrage words or spam will be remove.
                        Be a polite user and have fun!
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $('#comment_form').submit((e) => {
            e.preventDefault();
            $.ajax({
                type:"POST",
                url: $("#comment_form").attr("action"),
                data: $("#comment_form").serialize(),
                dataType: "json",
                success: (res) => {
                    $("#comment_form")[0].reset();
                    $('#parent_id').val(0);
                    $("#comment-count").html(`
                    <h3 class="mb-5" id="comment-count">${res.add_comment.comment_count} Comments</h3>`);
                    console.log(res.add_comment);
                    if (res.add_comment.parent_id == 0) {

                        $(`<li class="comment" id=${res.add_comment.id}>
                            <div class="vcard bio">
                            <img src="" alt="Image placeholder">
                        </div>
                        <div class="comment-body">
                            <h3>${res.add_comment.user_name}</h3>
                            <div class="meta">${res.add_comment.created_at}</div>
                            <p>${res.add_comment.content}</p>
                            <p><a content="${res.add_comment.id}" class="reply">Reply</a></p>
                        </div>
                        </li>`
                    ).appendTo(".comment-list");
                    }
                    else{
                        $(`
                            <ul class="children">
                                <li class="comment">
                                    <div class="vcard bio">
                                    <img src="" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>${res.add_comment.user_name}</h3>
                                    <div class="meta">${res.add_comment.created_at}</div>
                                    <p>${res.add_comment.content}</p>
                                    <p><a content="${res.add_comment.parent_id}" class="reply">Reply</a></p>
                                </div>
                                </li>
                            </ul>
                        `).appendTo("#"+res.add_comment.parent_id);
                    }
                }
            });
        });

        $(document).on('click', '.reply', function(){
            var comment_parent = $(this).attr("content");
            $('#parent_id').val(comment_parent);
            $('#comment').focus();
        });

    });
</script>
@endsection
