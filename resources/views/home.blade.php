<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <title>JalanYukk</title>
</head>
<body style="background-color: #001928">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

        .ubuntu-medium {
            font-family: "Ubuntu", sans-serif;
            font-weight: 500;
            font-style: normal;
        }

        .recom {
            font-family: "Inria Serif", serif;
            font-weight: 700;
            font-style: normal;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.8); 
            backdrop-filter: blur(3px); 
            -webkit-backdrop-filter: blur(3px);
        }

        .splash {
            /* background-image: url("img/splash.png"); */
            mask-image: url('img/splash.png');
            mask-size: cover;
            mask-repeat: no-repeat;
            mask-position: center;
            mix-blend-mode: screen;
            -webkit-mask-image: url('img/splash.png'); 
            -webkit-mask-size: cover;
            -webkit-mask-repeat: no-repeat;
            -webkit-mask-position: center;
        }

        .container-p {
            /* margin: 100px 200px 100px 200px; */
            margin-top: 100px;
            margin-bottom: 100px;
            width: 70%;
            height: 450px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .container-p .imga {
            width: 16%;
            height: 90%;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid white;
            transition: all ease-in-out 0.5s;
        }

        .container-p img:hover {
            width: 25%;
        }

        .btns:has(.btnd:hover) .btnd:not(:hover) {
            scale: 0.8;
            opacity: 0.8;
            /* filter: blur(4px); */
        }
        
        .btnd {
            cursor: pointer;
            transition: scale 0.25s ease-in,
            opacity 0.25s ease-in,
            filter 0.50s ease-in, 
    
        }
        
        .btnd:hover{
            border: #0f4567 solid 2px;
        }

        #scrollContainer {
            overflow-x: auto;
            scroll-behavior: smooth;
            white-space: nowrap;
            position: relative;
        }

        .scroll-left, .scroll-right {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.2);
            color: rgb(46, 50, 114);
            border: none;
            padding: 15px;
            cursor: pointer;
            z-index: 1;
            backdrop-filter: blur(10px);
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }

        .scroll-left {
            left: 10px;
        }

        .scroll-right {
            right: 10px;
        }

        .scroll-left:hover, .scroll-right:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }

        #scrollContainer::-webkit-scrollbar {
            display: none;
        }

        .btns {
            display: flex;
            align-items: center;
        }

        .kat:hover {

            .nk {
                padding-bottom: 10px;
                border-bottom: #ffffff solid 2px;
                
            }
        }
    </style>

    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: transparent; color: white">
        <div class="container">
            <div class="col">
                <ul class="navbar-nav">
                    <li class="nav-item me-5">
                        <a href="/" class="nav-link text-white" style="font-size: 20px">Home</a>
                    </li>
                    <li class="nav-item dropdown me-5">
                        <a href="" class="nav-link dropdown-toggle text-white" style="font-size: 20px" role="button" data-bs-toggle="dropdown" aria-expanded="false">Destinasi</a>
                        <ul class="dropdown-menu dropdown">
                            @foreach ($destinasi as $item)
                            <li>
                               <a href="detail/destinasi/{{ $item->id }}" class="dropdown-item">{{ $item->nama_destinasi }}</a> 
                            </li>    
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle text-white" style="font-size: 20px" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                        <ul class="dropdown-menu dropdown">
                            @foreach ($kategori as $item)
                            <li>
                               <a href="detail/kategori/{{ $item->id }}" class="dropdown-item" >{{ $item->nama_kategori }}</a> 
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <a href="" class="navbar-brand fw-bold text-white" style="margin-right: 140px">JalanYukk!</a>
            <div class="col-4">
                <form action="/wisata/search" class="d-flex">
                    @csrf
                    <input type="search" name="search" id="" placeholder="Ketik disini.." class="form-control me-2 text-white" style="background-color: transparent; color: white">
                    <button type="submit" class="btn btn-outline-light">Cari</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="">
        <div class="position-relative">
            <img src="img/canyonn.jpg" alt="" class="" style="width: 100%; height: 50%;">
            <div class="position-absolute top-50 text-white ubuntu-medium" style="margin-left: 80px; font-size: 60px">
                Let's Explore <br> Indonesia
            </div>
        </div>
    </div>

    <div style="margin-top: -250px" class="position-absolute start-0 w-100">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#001928" fill-opacity="1" d="M0,256L60,250.7C120,245,240,235,360,202.7C480,171,600,117,720,133.3C840,149,960,235,1080,234.7C1200,235,1320,149,1380,106.7L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    </div>  
    

    <div class="py-5">
        <div class="container">
            <div class="row gap-4">
                    @foreach ($wisata as $index => $item)
                    @if ($index < 15)
                    <div class="col-2">
                        <div class="shadow mt-5 rounded-5 me-4">
                            <a href="detail/wisata/{{ $item->id }}" class="text-decoration-none">
                                <img src="{{ asset('storage/foto/'.$item->foto) }}" alt="" style="width: 200px; height: 150px;" class="rounded-5">
                            </a>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="container my-5 text-white">
        <div>
            <span class="fw-bold recom" style="font-size: 70px; margin-left: 480px">Recomended</span>
            <span class="fw-bold recom" style="font-size: 90px; margin-left: 280px">INDONESIAN</span>
            <span class="fw-bold recom" style="font-size: 70px; margin-left: 380px">tourist attractions</span>
            <span class="fw-bold recom" style="font-size: 100px; margin-left: 360px">FOR YOU</span>
        </div>
    </div>

    <div class="container-p container">
        @foreach ($wisata->slice(0,7) as $item)
            <img src="{{ asset('storage/foto/'.$item->foto) }}" alt="" class="imga">
        @endforeach
    </div>

    <div class="bg-white rounded-5 container my-5 p-3 ubuntu-medium position-relative">
        <button class="scroll-left" onclick="scrolleft()">❮</button>
        <div class="overflow-x-auto" id="scrollContainer" style="scrollbar-width: none">
            <div class="row flex-nowrap btns">
                @foreach ($destinasi as $item)
                <div class="text-center ms-3 pt-2 pb-2 rounded-5 btnd" style="background-color: #529bc0; width: 15%">
                    <a href="detail/destinasi/{{ $item->id }}" class="text-decoration-none text-white">{{ $item->nama_destinasi }}</a>
                </div>
                @endforeach
            </div>
        </div>
        <button class="scroll-right" onclick="scrollRight()">❯</button>
    </div>

    <div class="my-5 container pb-5">
        <div class="row">
            <div class="col d-flex flex-column align-items-start">
                <img src="img/indo.jpg" alt="" class="mt-4 splash" style="width: 100%; height: 380px;">
            </div>
            <div class="col ms-3 mt-5 text-white ubuntu-medium">
                <span class="fw-bold" style="font-size: 30px">Indonesia</span>
                <p class="mt-2">Indonesia adalah salah satu tujuan wisata yang populer di dunia. Negara ini terkenal dengan keindahan alamnya yang menakjubkan, 
                    keragaman budaya dan sejarahnya yang menarik, serta kuliner khasnya yang menggugah selera.
                </p>
                <p class="mt-3">
                    Indonesia memiliki keindahan alam yang luar biasa. Dari pantai yang indah hingga gunung yang megah, Indonesia menawarkan berbagai macam pemandangan yang menakjubkan.
                </p>
            </div>
        </div>
    </div>

    <div class="container my-5 ubuntu-medium">
        <h2 class="text-white mb-5">Pilihan Kategori</h2>
        <div class="row">
            @foreach ($kategori as $item)
                
            <div class="d-flex col-4 mt-2 kat">
                <a href="detail/kategori/{{ $item->id }}" class="text-decoration-none">
                    <p class="text-white fw-light nk" style="font-size: 20px;">{{ $item->nama_kategori }}</p>
                    <p style="color: #5d737f">{{ $item->deskripsi }}</p>
                </a>
            </div>
            @endforeach
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

    <script>
        function scrolleft() {
            console.log("Scrolling left");
            document.getElementById('scrollContainer').scrollBy({
            left: -300,
            behavior: 'smooth'
            });
        }

        function scrollRight() {
            console.log("Scrolling right");
            document.getElementById('scrollContainer').scrollBy({
            left: 300,
            behavior: 'smooth'
            });
        }
    </script>
    
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>