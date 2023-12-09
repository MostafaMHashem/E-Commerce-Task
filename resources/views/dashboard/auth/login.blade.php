<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Admin Login </title>
    <link rel="stylesheet" href="{{ asset('dashboardAssets/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboardAssets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboardAssets/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboardAssets/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboardAssets/main-scss/main.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboardAssets/css/responsive.css') }}" />
    <!-- data table -->
    <!-- ? Favicon -->
    <link rel="icon" href="{{ asset('dashboardAssets/image/logo.png') }}" type="image" />
    <!-- ? Favicon -->
</head>


<body>

    <div class="container">
        <div class="row login-container">
            <div class="col-lg-6 col-12">
                <!-- Lottie Animation -->
                <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_dn6rwtwl.json" loop
                    background="transparent" speed=".5" class="lottie" autoplay></lottie-player>
            </div>
            <div class="col-lg-6  col-12">
                <!-- Login Form -->
                <div class="login-form">
                    <h3>Login</h3>
                    <form id="loginForm" class="form_topic" action="{{ route("admin.auth.signIn.post") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label class="form-label" for="name">phone</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-control" id="password"
                                placeholder="Enter your password" name="password">
                            <span class="lock-icon" onclick="togglePasswordVisibility()">
                                <i id="lockIcon" class="bi bi-lock-fill"></i>
                            </span>
                        </div>
                        <div class="button">
                            <button type="submit" class="btn first w-100">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- main js -->
    <script src="{{ asset('dashboardAssets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboardAssets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('dashboardAssets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('dashboardAssets/js/main.js') }}"></script>
    <!-- main js -->
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- sweet alert -->
    <script src="{{ asset('dashboardAssets/js/lottie.js') }}"></script>
    <!-- change password -->
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var lockIcon = document.getElementById("lockIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                lockIcon.classList.remove("bi-lock-fill");
                lockIcon.classList.add("bi-unlock-fill");
            } else {
                passwordInput.type = "password";
                lockIcon.classList.remove("bi-unlock-fill");
                lockIcon.classList.add("bi-lock-fill");
            }
        }
    </script>


    @include('layouts.dashboard.includes.messages')

</html>
