<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css boost -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Video | Rhipus</title>

    <link rel="stylesheet" href="/css/global.css" />
    <link rel="stylesheet" href="/css/beranda.css" />
    <script src="https://kit.fontawesome.com/72cab53f1b.js" crossorigin="anonymous"></script>
</head>

<body>
    <main>
        <nav class="bg-background py-3">
            <div class="container">
                <div class="row">
                    <div class="logo col-4 d-flex justify-content-start align-items-center">
                        <img src="/img/logoo.png" alt="logoProfil" width="70">
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center"><a href="/beranda">Beranda</a></div>
                    @auth
                        <div class="col-4 d-flex justify-content-end align-items-center">
                            <a class="btn dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ auth()->user()->avatar ? asset(auth()->user()->avatar) : '/img/user-avatar.png' }}" alt="Profile" class="rounded-circle" width="30" height="30">
                            </a>
    
                            @if (Auth::check())
                            <p class="mb-0 fw-bold">{{ Auth::user()->username }}</p>
                            @endif
    
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="/profil">Profile</a></li>
                                <li><a class="dropdown-item" href="/pengaturan">pengaturan</a></li>
                                <li><form method="POST" action="{{ route('logout') }}" class="class="ms-2">
                                    @csrf
                                    <button type="submit" class="btn btn-danger px-3 py-1 dropdown-item">Logout</button>
                                </form></li>
    
                            </ul>
    
                        </div>
                    @else
                        <div class="col-4 d-flex justify-content-end align-items-center">
                            <button>
                                <a href="/login" class="bg-primary px-4 py-2 rounded text-white">Login</a>
                            </button>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        <div class="video-container d-flex flex-column justify-content-center mx-auto"
            style="min-height: 100vh; width: 600px;">
            <div class="mb-4">
                <button onclick="history.back()" class="px-3 py-1 rounded d-flex align-items-center justify-content-center gap-2">
                  <i class="fa-solid fa-chevron-left text-muted"></i>
                  Kembali
                </button>
                <!-- Konten lainnya -->
            </div>
            <video width="600" controls>
                <source src="{{ asset($video->path) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <h1 class="mt-2">{{ $video->judul }}</h1>
            <small class="text-secondary fw-bold d-block">{{ $video->user->username }}</small>
            <p>{{ $video->deskripsi }}</p>
            <p class="fw-bold">Link Toko: <a href="{{ $video->link_toko }}">{{ $video->link_toko }}</a></p>
            <small class="text-muted">{{ $video->created_at->diffForHumans() }}</small>
        </div>
    </main>
    <footer class="py-5 mt-5" style="background-color: #578292;">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="d-flex align-items-center gap-3">
                        <i class="fa-solid fa-location-dot fs-4 text-white"></i>
                        <div>
                            <small class="text-white-50">Indonesia</small>
                            <p class="m-0 text-white">Jawa Barat, Bandung</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 mt-4">
                        <i class="fa-solid fa-phone fs-4 text-white"></i>
                        <p class="m-0 text-white">0813 6510 3590</p>
                    </div>
                </div>
                <div class="col-3 d-flex align-items-center justify-content-center">
                    <div class="d-flex gap-4">
                        <div class="social-icon d-flex align-items-center justify-content-center p-2 rounded-circle">
                            <i class="fa-brands fa-instagram fs-4 text-white"></i>
                        </div>
                        <div class="social-icon d-flex align-items-center justify-content-center p-2 rounded-circle">
                            <i class="fa-brands fa-twitter fs-4 text-white"></i>
                        </div>
                        <div class="social-icon d-flex align-items-center justify-content-center p-2 rounded-circle">
                            <i class="fa-brands fa-youtube fs-4 text-white"></i>
                        </div>
                    </div>
                </div>
                <div class="col-6 text-white">
                    <h4 class="fw-bold">About Us</h4>
                    <p class="m-0 text-white">Pada situs web ini kami akan berbagi totorial pengelolahan sampah yang
                        bisa di daur
                        ulang
                        kembali, untuk
                        menjadi hiasan ataupun kerajinan bertujuan mengurangi pencemaran sampah di indonesia dan
                        menyelamatkan bumi.
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
