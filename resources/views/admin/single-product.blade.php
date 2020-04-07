@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/post/all') }}">All Posts</a>
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
                                <div class="col-sm-6">
                                    {{-- post name --}}
                                    <div class="form-group">
                                        <label for="form-post-name">Name</label>
                                        <input class="form-control" data-error="post name is required"
                                            placeholder="Enter post name" required="required" type="text" name="name"
                                            value="{{ $post->name }}" id="form-post-name" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- post price --}}
                                    <div class="form-group">
                                        <label for="form-post-price">Price</label>
                                        <input class="form-control" data-error="Price value is invalid"
                                            placeholder="Enter post price" required="required" type="number"
                                            name="price" min="0" value="{{ $post->price }}" id="form-post-price" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- post category --}}
                                    <div class="form-group">
                                        <label for="form-post-category">Category</label>
                                        <select class="form-control" id="form-post-category" name="category_id">
                                            <option value="">
                                                Uncategorized
                                            </option>
                                            @foreach ($allCategories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- post desc --}}
                                    <div class="form-group">
                                        <label for="form-post-desc">Description</label>
                                        <textarea class="form-control" rows="3" id="form-post-desc" name="description"
                                            placeholder="Enter post description">{{$post->description}}</textarea>
                                    </div>

                                    {{-- post stock --}}
                                    <div class="form-group">
                                        <label for="form-post-stock">Stock</label>
                                        <input class="form-control" data-error="Stock value is invalid"
                                            placeholder="Enter amount of products in stock" required="required"
                                            type="number" name="stock" min="0" value="{{ $post->stock }}"
                                            id="form-post-stock" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
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
