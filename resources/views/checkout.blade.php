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
                <h4 class="text-white">Checkout<br> </h4>
                <a href="{{url('')}}" class="" style="padding-top: 10px;padding-right:10px;">Home</a>
                @if(!empty(Session::get('UID')))
                <a href="{{url('logout')}}" class="pull-right" style="padding-top: 10px;">Logout</a>
                @endif

            </div>
        </article>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="{{$new_data['img']}}"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">{{$new_data['title']}}</h4>
                        <p class="desc">some product description comes here</p>
                        <div class="rating-wrap">
                            <div class="label-rating">123 reviews</div>
                            <div class="label-rating">123 orders </div>
                        </div>
                        <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">

                        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now"
                            data-amount="1000" data-id="1">Order Now</a> -->

                        <div class="price-wrap h5">
                            <span class="price-new">₹{{$new_data['new_p']}}</span> <del
                                class="price-old">₹{{$new_data['old_p']}}</del>
                        </div>
                        <!-- price-wrap.// -->
                    </div>
                    <!-- bottom-wrap.// -->
                </figure>
            </div>
            <!-- col // -->
            <div class="col-md-4">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" novalidate="">

                    <div class="mb-3">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" id="email"
                            value="{{Session::get('EMAIL')?Session::get('EMAIL'):''}}" placeholder="you@example.com">
                        <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                    </div>
                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                            value="1234 Main St" required="">
                        <div class="invalid-feedback"> Please enter your shipping address. </div>
                    </div>
                    <div class="mb-3">
                        <label for="address2">Address 2 </label>
                        <input type="text" class="form-control" id="address2" value="1234 Main St"
                            placeholder="Apartment or suite">
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" required="">
                                <option value="">Choose...</option>
                                <option selected>India</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback"> Please select a valid country. </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" id="state" required="">
                                <option value="">Choose...</option>
                                <option selected>Telangana</option>
                                <option>California</option>
                            </select>
                            <div class="invalid-feedback"> Please provide a valid state. </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" value="500086" required="">
                            <div class="invalid-feedback"> Zip code required. </div>
                        </div>
                    </div>
                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>
                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked=""
                                required="">
                            <label class="custom-control-label" for="credit">Razorpay Payment Method</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="debit">Debit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="paypal">PayPal</label>
                        </div>
                    </div>

                    <hr class="mb-4">
                    <!-- <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button> -->
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now"
                        data-amount="{{$new_data['amt']}}" data-id="{{$new_data['id']}}">Continue to checkout</a>
                </form>


            </div>
            <!-- col // -->

        </div>
        <!-- row.// -->
    </div>
    <!--container.//-->
    <br><br><br>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
    $(document).ready(function() {
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

    });
    </script>
</body>

</html>