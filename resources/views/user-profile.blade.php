@extends('layout')

@section('title',"User Profile")

@section('location')
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{asset('images/bg_3.jpg')}});"
             data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">User Profile</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home</a></span> <span>User Profile</span>
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
            <div class="row">
                <div class="ftco-animate">
                    <form action="#" class="billing-form ftco-bg-dark p-3 p-md-5">
                        <h3 class="mb-4 billing-heading">User Profile</h3>
                        <div class="row">
                            <div class="col-4 images-user">
                                <img class="img-thumbnail" src="{{asset("/images/person_2.jpg")}}">
                                <div class="pt-3">
                                    <input type="file" data-content="{{"Tải ảnh lên"}}" class="form-control-file"
                                           name="avatar-file" id="user-avatar">
                                    <input type="text" class="d-none" name="avatar" value="">
                                </div>
                            </div>
                            <div class="col-md-8 row align-items-end">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="user-name">User Name</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="dateOfBirth">Date of birth</label>
                                        <input type="date" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="phone">Telephone</label>
                                        <input type="tel" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                            </div>
                        </div>
                    </form><!-- END -->
                </div>
            </div>
        </div>
    </section>

@endsection
{{-- end-content --}}
