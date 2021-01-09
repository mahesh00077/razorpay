<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    .container {
        max-width: 960px;
    }

    .lh-condensed {
        line-height: 1.25;
    }
    </style>
    <style>
    .login-form {
        width: 340px;
        margin: 50px auto;
        font-size: 15px;
    }

    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }

    .login-form h2 {
        margin: 0 0 15px;
    }

    .form-control,
    .btn {
        min-height: 38px;
        border-radius: 2px;
    }

    .btn {
        font-size: 15px;
        font-weight: bold;
    }
    </style>

</head>

<body>

    <div class="container">
        <div class="py-5 text-center">
            @if(!empty(Session::get('UID')))
            <a href="{{url('logout')}}" class="pull-right" style="padding-top: 10px;">Logout</a>
            @endif
            <h2>&nbsp;</h2>
        </div>
        <div class="row">
            <div class="col-md-4 order-md-1">

            </div>
            @if(empty(Session::get('UID')))
            <div class="col-md-4 order-md-2 mb-4 checklogin">
                <ul class="list-group mb-3 sticky-top">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div class="">
                            <form class="loginFrm" action="{{ url('login/action') }}" method="post" data-type="json"
                                autocomplete="off">
                                <h2 class="text-center">Log in</h2>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="email" id="email" name="email"
                                        required="required">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" required="required">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Log in</button>
                                </div>
                                <div class="clearfix">
                                    <!-- <label class="float-left form-check-label"><input type="checkbox"> Remember
                                        me</label> -->
                                    <!-- <a href="#" class="float-right">Forgot Password?</a> -->
                                </div>
                            </form>
                            <!-- <p class="text-center"><a href="#">Create an Account</a></p> -->
                        </div>
                    </li>
                </ul>
            </div>
            @endif

            <div class="col-md-4 order-md-2 mb-4">

            </div>
        </div>

    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https:////cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <script>
    $(function() {
        var SITEURL = "{{ json_encode(url('')) }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.loginFrm').on('submit', function(e) {
            e.preventDefault();
            // alert('clicked');
            var $this = $(this);

            $.ajax({
                type: $this.attr('method'),
                url: $this.attr('action'),
                data: $this.serializeArray(),
                dataType: $this.data('type'),
                success: function(response) {
                    // console.log(response);
                    // console.log(response['success']);
                    if (response['success'] == true) {
                        // $('.checklogin').css('display', 'none');
                        toastr.success(response['message'],
                            'Success', {
                                timeOut: 5000
                            });
                        window.location.href =
                            "/checkout?data=<?php echo $new_data['amt'] . ',' . $new_data['id'] . ',' . $new_data['old_p'] . ',' . $new_data['new_p'] . ',' . $new_data['img'] . ',' . $new_data['title']; ?>";

                    } else if (response['success'] == false) {
                        toastr.error(response['message'],
                            'Failed', {
                                timeOut: 5000
                            })
                    }
                },
                error: function(jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);
                    console.log(response);
                    /* if (response.message) {
                        alert(response.message);
                    } */
                }
            });
        });

    });
    </script>
</body>

</html>