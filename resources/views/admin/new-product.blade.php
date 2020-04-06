@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/product/all') }}">All Products</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url("admin/product/new") }}">New Product</a>
    </li>
</ul>
{{-- END - Breadcrumbs --}}
<div class="content-i">
    <div class="content-box">
        <div class="row pt-4">
            <div class="col-sm-6">
                <div class="element-wrapper">
                    <h6 class="element-header">
                        Create new product
                    </h6>
                    <div class="element-box">
                        <form id="form-product" action="{{ url("admin/product/new")}}" method="POST">
                            {{-- product name --}}
                            <div class="form-group">
                                <label for="form-product-name">Name</label>
                                <input class="form-control" data-error="Product name is required"
                                    placeholder="Enter product name" required="required" type="text" name="name"
                                    id="form-product-name" />
                                <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>

                            {{-- product price --}}
                            <div class="form-group">
                                <label for="form-product-price">Price</label>
                                <input class="form-control" data-error="Price value is invalid"
                                    placeholder="Enter product name" required="required" type="number" name="price"
                                    max="999" min="0" id="form-product-price" />
                                <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>

                            {{-- product category --}}
                            <div class="form-group">
                                <label for="form-product-category">Category</label>
                                <select class="form-control" id="form-product-category" name="category_id">
                                    @foreach ($allCategories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- product desc --}}
                            <div class="form-group">
                                <label for="form-product-desc">Description</label>
                                <textarea class="form-control" rows="3" id="form-product-desc" name="desc"
                                    placeholder="Enter product description"></textarea>
                            </div>

                            {{-- product stock --}}
                            <div class="form-group">
                                <label for="form-product-stock">Stock</label>
                                <input class="form-control" data-error="Stock value is invalid"
                                    placeholder="Enter amount of products in stock" required="required" type="number"
                                    name="stock" max="999" min="0" id="form-product-stock" />
                                <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>

                            <div class="form-buttons-w">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
