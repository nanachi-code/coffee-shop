@extends('layout')

@section('title',"Single-Product")

@section('location')
<section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Checkout</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span>
                        <span>Checout</span></p>
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
            <div class="col-xl-8 ftco-animate">
                <form action="{{url("checkout")}}" method="POST">
                    <div class="billing-form ftco-bg-dark p-3 p-md-5">
                        @csrf
                        <h3 class="mb-4 billing-heading">Billing Details</h3>
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="lastname">Name</label>
                                    <input type="text" name="customer_name" class="form-control" placeholder="Your name"
                                        required>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country">State / Country</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="customer_country" id="" class="form-control" required>
                                            <option value="France">France</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="">Viet Nam</option>
                                            <option value="Hongkong">Hongkong</option>
                                            <option value="Japan">Japan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Street Address</label>
                                    <input type="text" class="form-control" placeholder="House number and street name"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="customer_address"
                                        placeholder="Appartment, suite, unit etc: " required>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="towncity">Town / City</label>
                                    <input type="text" name="customer_city" class="form-control" placeholder="City"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postcodezip">Postcode / ZIP *</label>
                                    <input type="text" name="customer_postcode" class="form-control"
                                        placeholder="Postcode" required>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="customer_phone" class="form-control"
                                        placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Email Address</label>
                                    <input type="text" name="customer_email" class="form-control" placeholder="Email"
                                        required>
                                </div>
                            </div>
                            <div class="w-100"></div>
                        </div>
                    </div><!-- END -->


                    <div class="row mt-5 pt-3 d-flex">
                        <div class="col-md-6 d-flex">
                            <div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Cart Total</h3>
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                    <span>{{$cart_total}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="cart-detail ftco-bg-dark p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Payment Method</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="method" value="Direct Bank Tranfer"
                                                    class="mr-2"> Direct Bank
                                                Tranfer</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="method" value="Check Payment" class="mr-2">
                                                Check Payment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="method" value="Paypal" class="mr-2">
                                                Paypal</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" class="mr-2"> I have read and
                                                accept the
                                                terms and conditions</label>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <button type="submit" class="btn btn-primary py-3 px-4">Place an order</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div> <!-- .col-md-8 -->
        </div>
    </div>
</section>

@endsection
