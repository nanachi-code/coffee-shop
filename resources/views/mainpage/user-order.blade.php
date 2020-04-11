@extends('layout')

@section('title',"User Order")

@section('location')
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{asset('images/bg_3.jpg')}});"
             data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">User Order</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>User Order</span>
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
            <h3 class="mb-4 billing-heading">List Order</h3>
            <div class="py-3 ftco-animate fadeInUp ftco-animated">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#STATUS_ALL">All Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#STATUS_PENDING">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#STATUS_PROCESS">Process</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#STATUS_SHIPPING">Shipping</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#STATUS_COMPLETE">Complete</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#STATUS_CANCEL">Cancel</a>
                    </li>
                </ul>
                <div id="tab-user-order" class="tab-content">
                    <div id="STATUS_ALL" class="pt-3 tab-pane fade show active">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Method</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Lý Thái Hồ</td>
                                <td>Banking</td>
                                <td>Complete</td>
                                <td>5000000</td>
                                <td class="d-flex justify-content-around">
                                    <a href="">Detail</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="STATUS_PENDING" class="pt-3 tab-pane fade show">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Method</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Lý Thái Hồ</td>
                                <td>Banking</td>
                                <td>Pending</td>
                                <td>5000000</td>
                                <td class="d-flex justify-content-around">
                                    <a href="">Detail</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="STATUS_PROCESS" class="pt-3 tab-pane fade show">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Method</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Lý Thái Hồ</td>
                                <td>Banking</td>
                                <td>Process</td>
                                <td>5000000</td>
                                <td class="d-flex justify-content-around">
                                    <a href="">Detail</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="STATUS_SHIPPING" class="pt-3 tab-pane fade show">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Method</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Lý Thái Hồ</td>
                                <td>Banking</td>
                                <td>Shiping</td>
                                <td>5000000</td>
                                <td class="d-flex justify-content-around">
                                    <a href="">Detail</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="STATUS_COMPLETE" class="pt-3 tab-pane fade show">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Method</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Lý Thái Hồ</td>
                                <td>Banking</td>
                                <td>Complete</td>
                                <td>5000000</td>
                                <td class="d-flex justify-content-around">
                                    <a href="">Detail</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="STATUS_CANCEL" class="pt-3 tab-pane fade show">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Method</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Lý Thái Hồ</td>
                                <td>Banking</td>
                                <td>Cancal</td>
                                <td>5000000</td>
                                <td class="d-flex justify-content-around">
                                    <a href="">Detail</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
{{-- end-content --}}
