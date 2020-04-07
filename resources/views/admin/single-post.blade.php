@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/post/all') }}">All posts</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url("admin/post/{$post->id}") }}">{{ $post->name }}</a>
    </li>
</ul>
{{-- END - Breadcrumbs --}}
<div class="content-i">
    <div class="content-box">
        <div class="row pt-4">
            <div class="col-sm-12">
                <div class="element-wrapper">
                    <div class="element-header">
                        <div class="clearfix">
                            <div class="float-left">
                                <h3>Post</h3>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <h5>Edit post</h5>
                        <hr>
                        <form id="form-post" action="{{ url("admin/post/{$post->id}/update")}}" method="POST"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{-- post name --}}
                                    <div class="form-group">
                                        <label for="form-post-tỉtle">Title</label>
                                        <input class="form-control" data-error="Post title is required"
                                            placeholder="Enter Post title" required="required" type="text" name="title"
                                            value="{{ $post->title }}" id="form-post-title" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- post content --}}
                                    <div class="form-group">
                                        <label>Content</label>
                                        <div class="pb-3">
                                            <button class="btn btn-outline-secondary" id="add-content-media">
                                                <i class="icon-picture"></i> (Not Working)
                                            </button>
                                            <button class="btn btn-outline-secondary ml-1" id="add-content-i">
                                                <i>i</i>
                                            </button>
                                            <button class="btn btn-outline-secondary ml-1" id="add-content-b">
                                                <span class="font-weight-bold">b</span>
                                            </button>
                                            <button class="btn btn-outline-secondary ml-1" id="add-content-link">
                                                <u>link</u>
                                            </button>
                                            <button class="btn btn-outline-secondary ml-1" id="add-content-ul">
                                                ul
                                            </button>
                                            <button class="btn btn-outline-secondary ml-1" id="add-content-ol">
                                                ol
                                            </button>
                                            <button class="btn btn-outline-secondary ml-1" id="add-content-li">
                                                li
                                            </button>
                                        </div>
                                        <textarea class="form-control" rows="5" id="content-editor" name="content"
                                            placeholder="Enter post content">{{$post->content}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Preview</label>
                                        <div id="preview-post">
                                            {!! $post->content !!}
                                        </div>
                                    </div>

                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <a href="{{ url("admin/post/{$post->id}/delete")}}"
                                            class="btn btn-danger single-delete">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    {{-- product thumbnail --}}
                                    <div class="form-group">
                                        <label for="form-post-thumbnail">Thumbnail</label>
                                        @if ($post->thumbnail)
                                        <img src="{{ asset("uploads/{$post->thumbnail}") }}"
                                            class="input-preview img-responsive">
                                        @else
                                        <img src="{{ asset('images/default/no-image.jpg') }}"
                                            class="input-preview img-responsive">
                                        @endif

                                        <div class="form-buttons-w">
                                            <input type="file" class="form-control-file" data-title="Upload"
                                                name="thumbnail">
                                        </div>
                                    </div>

                                    {{-- product category --}}
                                    <div class="form-group">
                                        <label for="form-product-category">Category</label>
                                        <select class="form-control" id="form-post-category" name="category_post_id">
                                            <option value="" @if ($post->category_post_id ==
                                                null) checked @endif>
                                                Uncategorized
                                            </option>
                                            @foreach ($allCategories as $category)
                                            <option value="{{ $category->id }}" @if ($post->category_post_id ==
                                                $category->id) checked @endif>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
