<?php
$db = \Config\Database::connect();


$userModel = model('UsersModel', true, $db);


?>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
								<?php
								if (session('user')) {
									?>

                                    Đã đăng nhập <a href="#" onclick="logout()">Logout</a>
									<?php
								} else {
									?>

                                    <form class="user" id="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                   id="username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                   id="exampleInputPassword" placeholder="Password" id="password"
                                                   name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-user btn-block"
                                                onclick="dangnhap()">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>


									<?php
								}
								?>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<script>
    function logout() {
        $.ajax({
            url: "/Login/logout",
            dataType: "json",
            data: {},
            type: "POST",
            success: function (data) {
                window.setTimeout(function () {
                    location.reload()
                }, 2000);
            },
            error: function () {
            }
        });
    }

    function dangnhap() {
        var formData = new FormData($('#user')[0]);
        $.ajax({
            type: 'post',
            url: '/Login/checklogin',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == 1) {
                    window.setTimeout(function () {
                        location.reload()
                    }, 2000);
                } else {
                    alert('Sai thông tin');
                }
                //makeSAlert(data,5000);
                //$("#catlist").load(location.href + " #catlist");
                //$("#noti").html(data);
                //window.setTimeout(function(){location.reload()},1000);
            }
        }); //End Ajax
    }

</script>
