<!doctype html>
<html lang="en">
<head>
    <title>{{ $title ?? '' }} - Pesona Java Ijen Homestay</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ asset('main-assets/image/logo/icon.png')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('main-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('main-assets/css/login.css')}}">
</head>
<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="" alt="login" class="login-card-img" id="random-image">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="{{ asset('main-assets/image/logo/logo-2.png')}}" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Login dengan akun anda</p>
                            <form action="#!">
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" autocomplete="off">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********" autocomplete="off">
                                </div>
                                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                            </form>
                            <a href="#!" class="forgot-password-link">Lupa pasword?</a>
                            <p class="login-card-footer-text">Belum punya akun? <a href="#!" class="text-reset" style="text-decoration: underline;">  Daftar sekarang</a></p>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use.</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('main-assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('main-assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('main-assets/js/bootstrap.min.js')}}"></script>
    <script>
        var imageUrls = [
            "{{ asset('main-assets/image/background/ijen.jpg')}}",
            "{{ asset('main-assets/image/background/seruni.jpg')}}",
            "{{ asset('main-assets/image/background/ijen.jpg')}}",
        ];
        var randomIndex = Math.floor(Math.random() * imageUrls.length);
        document.getElementById("random-image").src = imageUrls[randomIndex];
    </script>
</body>
</html>
