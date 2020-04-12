@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/order/all') }}">All order</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url("admin/order/{$order->id}") }}">Order detail</a>
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
                                <h3>Order</h3>
                            </div>
                        </div>
                    </div>
                    <div class="element-box">
                        <h5>Edit order</h5>
                        <hr>
                        <form id="form-order" action="{{ url("admin/order/{$order->id}/update")}}" method="POST"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{-- order customer name --}}
                                    <div class="form-group">
                                        <label for="form-order-customer-name">Customer Name</label>
                                        <input class="form-control" data-error="Customer name is required"
                                            placeholder="Enter customer name" required="required" type="text"
                                            value="{{ $order->customer_name }}" name="customer_name"
                                            id="form-order-customer-name" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- order customer email --}}
                                    <div class="form-group">
                                        <label for="form-order-customer-email">Customer Email</label>
                                        <input class="form-control" data-error="Customer email is required"
                                            placeholder="Enter customer email" required="required" type="email"
                                            value="{{ $order->customer_email }}" name="customer_email"
                                            id="form-order-customer-email" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- order customer phone --}}
                                    <div class="form-group">
                                        <label for="form-order-customer-phone">Customer Phone</label>
                                        <input class="form-control" data-error="Customer phone is required"
                                            placeholder="Enter customer phone" required="required" type="text"
                                            value="{{ $order->customer_phone }}" name="customer_phone"
                                            id="form-order-customer-phone" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    <div class="form-row">
                                        {{-- order customer city --}}
                                        <div class="form-group col-md-6">
                                            <label for="">Customer City</label>
                                            <input class="form-control" data-error="Customer city is required"
                                                placeholder="Enter customer city" required="required" type="text"
                                                value="{{ $order->customer_city }}" name="customer_city"
                                                id="form-order-customer-city" />
                                            <div class="help-block form-text with-errors form-control-feedback"></div>
                                        </div>

                                        {{-- order customer method --}}
                                        <div class="form-group col-md-6">
                                            <label for="form-order-customer-method">Payment Method</label>
                                            <select name="customer_method" id="form-order-method" class="form-control">
                                                <option value="Cash on delivery" @if ($order->method == "Cash on
                                                    delivery") selected @endif>Cash
                                                    on delivery</option>
                                                <option value="Paypal" @if ($order->method == "Paypal") selected
                                                    @endif>Paypal</option>
                                                <option value="Credit card" @if ($order->method == "Credit card")
                                                    selected @endif>Credit card</option>
                                            </select>
                                            <div class="help-block form-text with-errors form-control-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        {{-- order customer postcode --}}
                                        <div class="form-group col-md-6">
                                            <label for="form-order-customer-postcode">Customer Postcode</label>
                                            <input class="form-control" data-error="Customer postcode is required"
                                                placeholder="Enter customer postcode" required="required" type="text"
                                                value="{{ $order->customer_postcode }}" name="customer_postcode"
                                                id="form-order-customer-postcode" />
                                            <div class="help-block form-text with-errors form-control-feedback"></div>
                                        </div>

                                        {{-- order customer country --}}
                                        <div class="form-group col-md-6">
                                            <label for="">Customer Country</label>
                                            <select name="customer_country" id="form-order-customer-country"
                                                class="form-control">
                                                <option value="Vietnam" @if ($order->customer_country == "Vietnam")
                                                    selected @endif>Vietnam</option>
                                            </select>
                                            <div class="help-block form-text with-errors form-control-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        @if ($order->status == "publish")
                                        <a href="{{ url("admin/order/{$order->id}/delete")}}"
                                            class="btn btn-danger single-delete">
                                            Delete
                                        </a>
                                        @else
                                        <a href="{{ url("admin/order/{$order->id}/restore")}}" class="btn btn-primary">
                                            Restore
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    {{-- order status --}}
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="form-order-status" class="form-control">
                                            <option value="Pending">Pending</option>
                                            <option value="Processing">Processing</option>
                                            <option value="Shipping">Shipping</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                        <div>
                                            @switch($order->status)
                                            @case(0)
                                            <span style="font-weight: 800">Pending.</span> Last updated: <span
                                                style="font-weight: 800">{{ $order->updated_at }}</span>
                                            @break
                                            @case(1)
                                            <span style="font-weight: 800">Processing.</span> Last updated: <span
                                                style="font-weight: 800">{{ $order->updated_at }}</span>
                                            @break
                                            @case(2)
                                            <span style="font-weight: 800">Shipping.</span> Last updated: <span
                                                style="font-weight: 800">{{ $order->updated_at }}</span>
                                            @break
                                            @case(3)
                                            <span style="font-weight: 800">Completed.</span> Last updated: <span
                                                style="font-weight: 800">{{ $order->updated_at }}</span>
                                            @break
                                            @case(4)
                                            <span style="font-weight: 800">Cancelled.</span> Last updated: <span
                                                style="font-weight: 800">{{ $order->updated_at }}</span>
                                            @break
                                            @endswitch
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="element-box">
                        <h5>Product</h5>
                        <hr>
                        <div class="product-box">
                            <button type="button" class="btn btn-primary mb-4" id="btn-add-product" data-toggle="modal"
                                data-target="#add-product">Add product</button>

                            <div class="table-responsive">
                                <table id="table-admin-product-order" class="table table-striped table-lightfont">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Stock</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Stock</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        {{-- START - Add product Modal --}}
                        <div class="modal fade" id="add-product" tabindex="-1" role="dialog"
                            aria-labelledby="add-product-title" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="add-product-title">Add product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table id="table-admin-add-product-order"
                                                class="table table-striped table-lightfont">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Category</th>
                                                        <th>Description</th>
                                                        <th>Stock</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allProducts as $product)
                                                    <tr>
                                                        <td class="product-id">
                                                            {{ $product->id }}
                                                        </td>
                                                        <td class="product-name">
                                                            {{ $product->name }}
                                                        </td>
                                                        <td class="product-category">
                                                            @if (!$product->category)
                                                            Uncategorized
                                                            @else
                                                            {{ $product->category->name }}
                                                            @endif
                                                        </td>
                                                        <td class="product-description">
                                                            {{ $product->description }}
                                                        </td>
                                                        <td class="product-stock">
                                                            {{ $product->stock }}
                                                        </td>
                                                        <td class="row-actions">
                                                            <a href="#" class="danger add-product">
                                                                <i class="icon-plus"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Category</th>
                                                        <th>Description</th>
                                                        <th>Stock</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- END - Add product Modal --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
