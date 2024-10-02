<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <title>JalanYuk</title>
</head>
<body style="background-color: #001928" class="ubuntu">
    <style>
        .ubuntu {
            font-family: "Ubuntu", sans-serif;
            font-style: normal;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.8); 
            backdrop-filter: blur(3px); 
            -webkit-backdrop-filter: blur(3px);
        }

        .card-container {
            display: flex;
            flex-direction: column;
            justify-content: space-between; 
            height: 100%;
        }

        .card-content {
            min-height: 60px;
        }
    </style>

    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: transparent; color: white">
        <div class="container">
            <a href="/home" class="navbar-brand fw-bold text-white" style="margin-right: 140px">JalanYukk!</a>
        </div>
    </nav>

    <div class="container ubuntu text-white mb-5" style="margin-top: 100px">
        <div class="border-bottom">
            <h4 class="fw-bold">{{ $destinasi->nama_destinasi }}</h4>
            <p style="color: #5d737f">{{ $destinasi->deskripsi }}</p>
        </div>
        <div class="row">
            @foreach ($wisata as $item)
            <div class="col-3 mt-5">
                <div class="card-container shadow rounded-5" style="height: 100%;">
                    <img src="{{ asset('storage/foto/'.$item->foto) }}" alt="" class="rounded-5" style="width: 200px; height: 300px; object-fit: cover">
                    
                    <div class="card-content mt-3">
                        <li class="fw-bold">{{ $item->nama_wisata }}</li>
                        <li style="font-size: 12px">Terletak di {{ $item->lokasi }}</li>
                    </div>
            
                    <li class="mt-2 w-100" style="list-style-type: none">
                        <a href="{{ route('wisataa.show', ['destinasi_id' => $destinasi->id, 'id' => $item->id]) }}" class="text-decoration-none">
                            <button class="rounded-5 py-1 border-0 w-100 d-flex justify-content-between align-items-center px-3" style="background-color: #f0f0f0;">
                                <span class="ubuntu" style="font-size: 13px">Lihat Detail</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="black" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                                </svg>
                            </button>
                        </a>
                    </li>
                </div>
            </div>
            @endforeach

            </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="position-relative w-100">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="position: relative; z-index: 1;">
                <path fill="#ffff" fill-opacity="1" d="M0,224L40,229.3C80,235,160,245,240,229.3C320,213,400,171,480,181.3C560,192,640,256,720,272C800,288,880,256,960,250.7C1040,245,1120,267,1200,240C1280,213,1360,139,1400,101.3L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
            </svg>     
        </div>
        <div class="content bg-white" style="position: relative; z-index: 0; padding-top: 0; margin-top: -5px;">
            <div class="container py-5">
                <div class="row d-flex justify-content-between">
                    <div class="col">
                        <h5 class="text-dark">JalanYukk - Rekomendasi Tempat Wisata</h5>
                        <p class="text-muted">Menemukan tempat wisata terbaik untuk pengalaman tak terlupakan.</p>
                    </div>
                    <div class="col">
                        <h6 class="text-dark">Tentang</h6>
                        <p class="text-muted">JalanYuk berkomitmen untuk memberikan informasi terbaik tentang tempat wisata di seluruh Indonesia.</p>
                    </div>
                    <div class="col">
                        <h6 class="text-dark">Kontak</h6>
                        <p class="text-muted">Email: jalanyukk@gmail.com</p>
                        <p class="text-muted">Telepon: +62 123 456 7890</p>
                    </div>
                    <div class="col">
                        <h6 class="text-dark">Ikuti JalanYuk</h6>
                        <div class="ustify-content-between d-flex">
                            <a href="#" class="text-muted me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                                  </svg>    
                            </a><br>
                            <a href="#" class="text-muted me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                                  </svg>    
                            </a><br>
                            
                            <a href="#" class="text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                    <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
                                  </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <p class="text-muted">&copy; 2024 JalanYukk.</p>
                <a href="/login" class="text-decoration-none text-info">Login Admin</a>
            </div>
        </div>
    </footer>
    
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>