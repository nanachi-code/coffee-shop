@extends('layout')

@section('title',"About")

@section('location')
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url({{asset('images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">
                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Form</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="col-xl-12 ftco-animate">
        <form class="billing-form ftco-bg-dark p-3 p-md-5"  action="#" method="POST">
            @csrf
            <h3 class="mb-4 billing-heading">Billing Details</h3>
            <div class="row align-items-end">
                <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Nhập email" required>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">User Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Nhập tên" required>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="phone">Telephone</label>
                        <input type="text" name="telephone" class="form-control" placeholder="Nhập số điện thoại" required>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="Feedback">Feedback</label>
                        <input type="text" name="feedback" class="form-control" placeholder="Nhập feedback" required>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button id="submit-table-user" type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form><!-- END -->

    </div>
@endsection
{{-- end-content --}}
@section('script')
    <script type="text/javascript">
        $("#submit-table-user").bind("click", function () {
            $.ajax({
                url: "{{url("submitTable")}}",
                method: "POST",
                data: {
                    _token: $("input[name=_token]").val(),
                    email: $("input[name=email]").val(),
                    name: $("input[name=name]").val(),
                    telephone: $("input[name=telephone]").val(),
                    feedback: $("input[name=feedback]").val(),
                },
                success: function (res) {
                    if (res.status) {
                        alert("Feedback Successfully");
                    } else {
                        alert("Feedback False");
                    }
                }
            });
        });
    </script>
@endsection
