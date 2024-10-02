<!DOCTYPE html>
<html lang="en" style="background-color: #001928">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <title>Login-JalanYukk</title>
</head>
<style>
    .card {
            width: 100%;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.1); 
            backdrop-filter: blur(10px); 
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
</style>
<body style="background-image: url('{{ asset('img/bg-login.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    @if (session('statusLogin'))
        <div class="alert alert-danger">
            {{ session('statusLogin') }}
        </div>
    @endif
    <div class="container justify-content-center align-items-center d-flex" style="height: 100vh;"> 
        <div class="card shadow">
            <div class="card-body py-5">
                <ul class=" nav nav-pills mb-4 justify-content-center" style="font-size: 25px">
                    <li class="nav-item">
                        <a href="/login" class=" nav-link text-white fw-bold">Login</a>
                    </li>
                </ul>
                <form action="/auth" method="post">
                    @csrf
                <div class=" row">
                    <div class=" mb-4">
                        <label for="email" class=" form-check-label text-white pb-2">Email</label>
                        <input name="email" class=" form-control bg-transparent text-white @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class=" mb-4">
                        <label for="password" class=" form-check-label text-white pb-2">Password</label>
                        <input type="password" name="password" class=" form-control bg-transparent text-white @error('password') is-invalid @enderror">
                        @error('password')
                            <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class=" mb-4 text-center">
                        <button class="btn btn-block rounded-5 px-5" type="submit" style="background-color: white; color: #001928">Login</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>