<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="login_v1/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_v1/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_v1/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_v1/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="login_v1/css/util.css">
    <link rel="stylesheet" type="text/css" href="login_v1/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="login_v1/images/img-01.png" alt="IMG">
            </div>

            <form method="post" action="{{route('authenticate')}}" class="login100-form validate-form">
                @csrf
                <span class="login100-form-title">
						Login
					</span>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>
                @include('admin.layout.massages')


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" name="role" value="teacher">
                        Login as Teacher
                    </button>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" name="role" value="student">
                        Login as Student
                    </button>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" name="role" value="admin">
                        Login as Admin
                    </button>
                </div>
                <a href="{{route('show_register')}}" class="d-block mt-3 text-muted">Not a user? Sign up</a>

            </form>
        </div>
    </div>
</div>


<!--===============================================================================================-->
<script src="login_v1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="login_v1/vendor/bootstrap/js/popper.js"></script>
<script src="login_v1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="login_v1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="login_v1/vendor/tilt/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="login_v1/js/main.js"></script>

</body>
</html>
