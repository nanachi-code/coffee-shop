@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/post/all') }}">All Products</a>
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
                                <h3>post</h3>
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

                                    {{-- post desc --}}
                                    <div class="form-group">
                                        <label for="form-post-desc">Content</label>
                                        <textarea class="form-control" rows="3" id="form-post-desc" name="description"
                                            placeholder="Enter post description">{{$post->content}}</textarea>
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
