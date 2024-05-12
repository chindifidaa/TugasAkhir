<!doctype html>
<html lang="en">
<head>
    <title>{{ $title ?? '' }} - Pesona Java Ijen Homestay</title>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('assets/img/icon.png')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css')}}">
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
                                <img src="{{ asset('assets/img/logo-2.png')}}" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Login dengan akun anda</p>
                            <form action="{{ route('login')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukan email anda..." autocomplete="off">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********" autocomplete="off">
                                </div>
                                <button type="submit" class="btn btn-block login-btn mb-4">Login</button>
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

    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script>
        var imageUrls = [
            "{{ asset('assets/img/background/ijen.jpg')}}",
            "{{ asset('assets/img/background/seruni.jpg')}}",
            "{{ asset('assets/img/background/ijen.jpg')}}",
        ];
        var randomIndex = Math.floor(Math.random() * imageUrls.length);
        document.getElementById("random-image").src = imageUrls[randomIndex];
    </script>
</body>
</html>
