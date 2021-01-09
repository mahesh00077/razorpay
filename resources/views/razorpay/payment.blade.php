<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta name="csrf-token" content="{{csrf_field()}}"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Razorpay Payment </title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <style>
    .card-product .img-wrap {
        border-radius: 3px 3px 0 0;
        overflow: hidden;
        position: relative;
        height: 220px;
        text-align: center;
    }

    .card-product .img-wrap img {
        max-height: 100%;
        max-width: 100%;
        object-fit: cover;
    }

    .card-product .info-wrap {
        overflow: hidden;
        padding: 15px;
        border-top: 1px solid #eee;
    }

    .card-product .bottom-wrap {
        padding: 15px;
        border-top: 1px solid #eee;
    }

    .label-rating {
        margin-right: 10px;
        color: #333;
        display: inline-block;
        vertical-align: middle;
    }

    .card-product .price-old {
        color: #999;
    }
    </style>
</head>

<body>
    <div class="container">
        <article class="bg-secondary mb-3">
            <div class="card-body text-center">
                <h4 class="text-white">Welcome<br> </h4>
                @if(!empty(Session::get('UID')))
                <a href="{{url('logout')}}" class="pull-right" style="padding-top: 10px;">Logout</a>
                @endif

            </div>
        </article>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"><img
                            src="https://www.w3adda.com/wp-content/uploads/2019/07/51TdkJSqeQL._AC_UL436_.jpg"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">MacBook Air</h4>
                        <p class="desc">some product description comes here</p>
                        <div class="rating-wrap">
                            <div class="label-rating">123 reviews</div>
                            <div class="label-rating">123 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">

                        <?php
                        // $data = [];
                        // data='amt/id/old_p/new_p/img/title;
                        $data = '10000,1,100,10,https://www.w3adda.com/wp-content/uploads/2019/07/51TdkJSqeQL._AC_UL436_.jpg,MacBook Air';
                        $data = urlencode($data);

                        ?>
                        @if(empty(Session::get('UID')))
                        <a href="<?php echo url('login?data=' . $data) ?>" class="btn btn-sm btn-primary float-right"
                            data-amount="1000" data-id="1">Order Now</a>
                        @else
                        <a href="<?php echo url('checkout?data=' . $data) ?>" class="btn btn-sm btn-primary float-right"
                            data-amount="1000" data-id="1">Order Now</a>
                        @endif
                        <div class="price-wrap h5">
                            <span class="price-new">₹10</span> <del class="price-old">₹100</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"><img
                            src="https://www.w3adda.com/wp-content/uploads/2019/07/61TMYERLL._AC_UL436_.jpg"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Canon 1300d</h4>
                        <p class="desc">some product description comes here</p>
                        <div class="rating-wrap">
                            <div class="label-rating">123 reviews</div>
                            <div class="label-rating">123 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">

                        <?php
                        // $data = [];
                        // data='amt/id/old_p/new_p/img/title;
                        $data = '22000,2,24500,22000,https://www.w3adda.com/wp-content/uploads/2019/07/61TMYERLL._AC_UL436_.jpg,Canon 1300d';
                        $data = urlencode($data);

                        ?>
                        @if(empty(Session::get('UID')))
                        <a href="<?php echo url('login?data=' . $data) ?>" class="btn btn-sm btn-primary float-right"
                            data-amount="1000" data-id="1">Order Now</a>
                        @else
                        <a href="<?php echo url('checkout?data=' . $data) ?>" class="btn btn-sm btn-primary float-right"
                            data-amount="1000" data-id="1">Order Now</a>
                        @endif
                        <div class="price-wrap h5">
                            <span class="price-new">₹22000</span> <del class="price-old">₹24500</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"><img
                            src="https://www.w3adda.com/wp-content/uploads/2019/07/31vga2yygfL._AC_US160_.jpg"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">HeadPhone</h4>
                        <p class="desc">some product description comes here</p>
                        <div class="rating-wrap">
                            <div class="label-rating">123 reviews</div>
                            <div class="label-rating">123 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">

                        <?php
                        // $data = [];
                        // data='amt/id/old_p/new_p/img/title;
                        $data = '1500,3,1900,1500,https://www.w3adda.com/wp-content/uploads/2019/07/31vga2yygfL._AC_US160_.jpg,HeadPhone';
                        $data = urlencode($data);

                        ?>
                        @if(empty(Session::get('UID')))
                        <a href="<?php echo url('login?data=' . $data) ?>" class="btn btn-sm btn-primary float-right"
                            data-amount="1500" data-id="3">Order Now</a>
                        @else
                        <a href="<?php echo url('checkout?data=' . $data) ?>" class="btn btn-sm btn-primary float-right"
                            data-amount="1500" data-id="3">Order Now</a>
                        @endif
                        <div class="price-wrap h5">
                            <span class="price-new">₹1500</span> <del class="price-old">₹1900</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>

            <!-- col // -->
            <!-- <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"><img
                            src="https://www.w3adda.com/wp-content/uploads/2019/07/61TMYERLL._AC_UL436_.jpg"> </div>
                    <figcaption class="info-wrap">
                        <h4 class="title">Canon 1300d</h4>
                        <p class="desc">some product description comes here</p>
                        <div class="rating-wrap">
                            <div class="label-rating">123 reviews</div>
                            <div class="label-rating">123 orders </div>
                        </div>

                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now"
                            data-amount="22000" data-id="2">Order Now</a>
                        <div class="price-wrap h5">
                            <span class="price-new">₹22000</span> <del class="price-old">₹24500</del>
                        </div>

                    </div>

                </figure>
            </div> -->
            <!-- col // -->
            <!-- <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"><img
                            src="https://www.w3adda.com/wp-content/uploads/2019/07/31vga2yygfL._AC_US160_.jpg"> </div>
                    <figcaption class="info-wrap">
                        <h4 class="title">HeadPhone</h4>
                        <p class="desc">some product description comes here</p>
                        <div class="rating-wrap">
                            <div class="label-rating">123 reviews</div>
                            <div class="label-rating">123 orders </div>
                        </div>

                    </figcaption>
                    <div class="bottom-wrap">
                        <button class="btn btn-sm btn-primary float-right buy_now" data-amount="1500" data-id="3">Order
                            Now</button>
                        <div class="price-wrap h5">
                            <span class="price-new">₹1500</span> <del class="price-old">₹1900</del>
                        </div>

                    </div>

                </figure>
            </div> -->

            <!-- col // -->
        </div>
        <!-- row.// -->
    </div>
    <!--container.//-->
    <br><br><br>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
    /* $(document).ready(function() {
        var SITEURL = "{{ json_encode(url('')) }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '.buy_now', function(e) {
            var uid = "{{Session::get('UID')}}";
            // alert(uid);
            if (uid == '') {
                window.location.href = SITEURL + '/login';

            } else {
                var totalAmount = $(this).attr("data-amount");
                var product_id = $(this).attr("data-id");
                var options = {
                    // "key": "your_razorpay_test_key",
                    "key": "rzp_test_vybRd5T5CdGLnt",
                    // "amount": (totalAmount * 100), // 2000 paise = INR 20
                    "amount": (totalAmount), // 2000 paise = INR 20
                    "name": "testing",
                    "description": "Payment",
                    "image": "https://www.w3adda.com/wp-content/uploads/2019/07/w3a-fb-dp.png",
                    "handler": function(response) {
                        $.ajax({
                            url: SITEURL + 'pay-success',
                            type: 'post',
                            dataType: 'json',
                            data: {
                                razorpay_payment_id: response.razorpay_payment_id,
                                totalAmount: totalAmount,
                                product_id: product_id,
                            },
                            success: function(msg) {
                                console.log(msg);
                                window.location.href = SITEURL + 'thank-you';
                            }
                        });

                    },
                    "prefill": {
                        "contact": '1234567890',
                        "email": 'xxxxxxxxx@gmail.com',
                    },
                    "theme": {
                        "color": "#528FF0"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
                e.preventDefault();

            }
        });

    }); */
    </script>
</body>

</html>