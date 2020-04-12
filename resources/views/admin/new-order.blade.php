@extends('admin.layouts.app')

@section('content')
{{-- START - Breadcrumbs --}}
<ul class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url('admin/order/all') }}">All orders</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ url("admin/order/new") }}">New order</a>
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
                        <h5>New order</h5>
                        <hr>
                        <form id="form-order" action="{{ url("admin/order/new")}}" method="POST"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{-- order customer name --}}
                                    <div class="form-group">
                                        <label for="form-order-customer-name">Customer Name</label>
                                        <input class="form-control" data-error="Customer name is required"
                                            placeholder="Enter customer name" required="required" type="text"
                                            name="customer_name" id="form-order-customer-name" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- order customer email --}}
                                    <div class="form-group">
                                        <label for="form-order-customer-email">Customer Email</label>
                                        <input class="form-control" data-error="Customer email is required"
                                            placeholder="Enter customer email" required="required" type="email"
                                            name="customer_email" id="form-order-customer-email" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    {{-- order customer phone --}}
                                    <div class="form-group">
                                        <label for="form-order-customer-phone">Customer Phone</label>
                                        <input class="form-control" data-error="Customer phone is required"
                                            placeholder="Enter customer phone" required="required" type="text"
                                            name="customer_phone" id="form-order-customer-phone" />
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>

                                    <div class="form-row">
                                        {{-- order customer city --}}
                                        <div class="form-group col-md-6">
                                            <label for="">Customer City</label>
                                            <input class="form-control" data-error="Customer city is required"
                                                placeholder="Enter customer city" required="required" type="text"
                                                name="customer_city" id="form-order-customer-city" />
                                            <div class="help-block form-text with-errors form-control-feedback"></div>
                                        </div>

                                        {{-- order customer method --}}
                                        <div class="form-group col-md-6">
                                            <label for="form-order-customer-method">Payment Method</label>
                                            <select name="customer_method" id="form-order-method" class="form-control">
                                                <option value="Cash on delivery">Cash on delivery</option>
                                                <option value="Paypal">Paypal</option>
                                                <option value="Credit Card">Credit card</option>
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
                                                name="customer_postcode" id="form-order-customer-postcode" />
                                            <div class="help-block form-text with-errors form-control-feedback"></div>
                                        </div>

                                        {{-- order customer country --}}
                                        <div class="form-group col-md-6">
                                            <label for="">Customer Country</label>
                                            <select name="customer_country" id="form-order-customer-country"
                                                class="form-control">
                                                <option value="Vietnam">Vietnam</option>
                                            </select>
                                            <div class="help-block form-text with-errors form-control-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit">Save</button>
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
