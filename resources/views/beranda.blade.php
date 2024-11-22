<!DOCTYPE html>
<html lang="en">

<!-- HEADER -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css boost -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/global.css" />
    <link rel="stylesheet" href="/css/beranda.css" />
    <script src="https://kit.fontawesome.com/72cab53f1b.js" crossorigin="anonymous"></script>
</head>


<body>

    {{-- <header>
        <div class="col-6 col-md-4 text-center">
            <span class="title">Beranda</span>
        </div>
        <div class="logo">
            <img src="/img/user-avatar.png" alt="logoProfil">
        </div>
    </header> --}}

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

    <main class="container position-relative">
        <p class="not-found"></p>
        <div class="search-container mt-4 pt-4">
            <form action="beranda.blade.php" method="get">
                <div class="mb-3 position-relative w-50 mx-auto">
                    <input type="text" name="keyword" class="form-control rounded-pill pe-5" placeholder="Telusuri"
                        value="">
                    <button type="submit">
                        <img src="/img/search.png" alt="" class="position-absolute top-0 end-0 img-fluid"
                            width="57">
                    </button>
                </div>
            </form>
        </div>

        @auth
            <div>
                <p class="fw-bold ">Hai, {{ Auth::user()->username }}</p>
            </div>


        @endauth

        <div class="mb-4">
            <a href="/" class="button">
                <button class="semua fw-bold px-2 py-1 rounded">Semua video</button>
            </a>
        </div>

        <div class="row g-5">
            @foreach ($videos as $video)
                <a href="/video/{{ $video->id }}" class="col-4 image-card py-4">
                    <img src="{{ asset($video->thumbnail) }}" alt="{{ $video->thumbnail }}" class="img-fluid">
                    <img src="../storage/" alt="">
                    <div class="d-flex align-items-center gap-3 mt-2">
                        <img src="/img/profilcabila.png" alt="" class="img-fluid" width="45">
                        <div>
                            <p class="fw-bold m-0 mt-2">{{ $video->judul }}</p>
                            <small class="text-secondary fw-bold d-block">{{ $video->user->username }}</small>
                            {{-- <small class="single-line-text d-block w-100">{{ $video->deskripsi }}</small> --}}
                            <small class="text-muted">{{ $video->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </a>
                @endforeach
        </div>
            {{-- <a href="putar_video.php" class="col-4 image-card py-4">
                <img src="/img/bambu.png" alt="" class="img-fluid">
                <div class="d-flex align-items-start gap-3 mt-2">
                    <img src="/img/vaniprofil.png" alt="" class="img-fluid" width="45">
                    <div>
                        <p class="fw-bold m-0 mt-2">BIKIN TEMPAT SENDOK DARI KALENG!</p>
                        <small class="text-secondary fw-bold d-block">Vani DIY</small>
                        <small class="text-secondary fw-bold">1 jt ditonton - 3 minggu yang lalu</small>
                    </div>
                </div>
            </a>
            <a href="putar_video.php" class="col-4 image-card py-4">
                <img src="/img/tastutupbotol.png" alt="" class="img-fluid">
                <div class="d-flex align-items-start gap-3 mt-2">
                    <img src="/img/finaliza.svg" alt="" class="img-fluid" width="45">
                    <div>
                        <p class="fw-bold m-0 mt-2">DIY TAS CANTIK!</p>
                        <small class="text-secondary fw-bold d-block">finaliza</small>
                        <small class="text-secondary fw-bold">550rb ditonton - 2 bulan yang lalu</small>
                    </div>
                </div>
            </a>
            <a href="putar_video.php" class="col-4 image-card py-4">
                <img src="/img/dvd.png" alt="" class="img-fluid">
                <div class="d-flex align-items-start gap-3 mt-2">
                    <img src="/img/profildvd.png" alt="" class="img-fluid" width="45">
                    <div>
                        <p class="fw-bold m-0 mt-2">DIY- DEKOR ROOM</p>
                        <small class="text-secondary fw-bold d-block">Simple but kreative</small>
                        <small class="text-secondary fw-bold">220rb ditonton - 1 hari yang lalu</small>
                    </div>
                </div>
            </a>
            <a href="putar_video.php" class="col-4 image-card py-4">
                <img src="/img/kalenglilin.png" alt="" class="img-fluid">
                <div class="d-flex align-items-start gap-3 mt-2">
                    <img src="/img/profilkaleng.png" alt="" class="img-fluid" width="45">
                    <div>
                        <p class="fw-bold m-0 mt-2">TUTORIAL OLAHAN KALENG</p>
                        <small class="text-secondary fw-bold d-block">Kalengku</small>
                        <small class="text-secondary fw-bold">872rb ditonton - 3 bulan yang lalu</small>
                    </div>
                </div>
            </a>
            <a href="putar_video.php" class="col-4 image-card py-4">
                <img src="/img/tasaquagelas.png" alt="" class="img-fluid">
                <div class="d-flex align-items-start gap-3 mt-2">
                    <img src="/img/profilbimo.png" alt="" class="img-fluid" width="45">
                    <div>
                        <p class="fw-bold m-0 mt-2">TAS DARI AQUA GELAS..</p>
                        <small class="text-secondary fw-bold d-block">Bimo DIY</small>
                        <small class="text-secondary fw-bold">550rb ditonton - 2 bulan yang lalu</small>
                    </div>
                </div>
            </a>
            <a href="putar_video.php" class="col-4 image-card py-4">
                <img src="/img/kotak.png" alt="" class="img-fluid">
                <div class="d-flex align-items-start gap-3 mt-2">
                    <img src="/img/profildvd.png" alt="" class="img-fluid" width="45">
                    <div>
                        <p class="fw-bold m-0 mt-2">YUK BIKIN STORAGE LUCU</p>
                        <small class="text-secondary fw-bold d-block">simple but kreative</small>
                        <small class="text-secondary fw-bold">5rb ditonton - 5 hari yang lalu</small>
                    </div>
                </div>
            </a>
            <a href="putar_video.php" class="col-4 image-card py-4">
                <img src="/img/hiasan.png" alt="" class="img-fluid">
                <div class="d-flex align-items-start gap-3 mt-2">
                    <img src="/img/profilcabila.png" alt="" class="img-fluid" width="45">
                    <div>
                        <p class="fw-bold m-0 mt-2">DIY- DEKOR HIASAN</p>
                        <small class="text-secondary fw-bold d-block">cabila foryou</small>
                        <small class="text-secondary fw-bold">3rb ditonton - 4 hari yang lalu</small>
                    </div>
                </div>
            </a>
            <a href="putar_video.php" class="col-4 image-card py-4">
                <img src="/img/dompetkecap.png" alt="" class="img-fluid">
                <div class="d-flex align-items-start gap-3 mt-2">
                    <img src="/img/vaniprofil.png" alt="" class="img-fluid" width="45">
                    <div>
                        <p class="fw-bold m-0 mt-2">TUTORIAL DOMPET BANGO</p>
                        <small class="text-secondary fw-bold d-block">Vani DIY</small>
                        <small class="text-secondary fw-bold">1rb ditonton - 3 jam yang lalu</small>
                    </div>
                </div>
            </a>
        </div> --}}
            <!-- <a href="putar_video.php" class="col-4 image-card py-4">
  <img src="assets/img/kalenglilin.png" alt="" class="img-fluid">
  <div class="d-flex align-items-start gap-3 mt-2">
    <img src="assets/img/profilkaleng.png" alt="" class="img-fluid" width="45">
    <div>
      <p class="fw-bold m-0 mt-2">TUTORIAL OLAHAN KALENG</p>
      <small class="text-secondary fw-bold d-block">Kalengku</small>
      <small class="text-secondary fw-bold">872rb ditonton - 3 bulan yang lalu</small>
    </div>
  </div>
</a> -->
            <!-- <a href="putar_video.php" class="col-4 image-card py-4">
  <img src="assets/img/tasaquagelas.png" alt="" class="img-fluid">
  <div class="d-flex align-items-start gap-3 mt-2">
    <img src="assets/img/profilbimo.png" alt="" class="img-fluid" width="45">
    <div>
      <p class="fw-bold m-0 mt-2">TAS DARI AQUA GELAS..</p>
      <small class="text-secondary fw-bold d-block">Bimo DIY</small>
      <small class="text-secondary fw-bold">550rb ditonton - 2 bulan yang lalu</small>
    </div>
  </div>
</a> -->
            <!-- <a href="putar_video.php" class="col-4 image-card py-4">
  <img src="assets/img/kotak.png" alt="" class="img-fluid">
  <div class="d-flex align-items-start gap-3 mt-2">
    <img src="assets/img/profildvd.png" alt="" class="img-fluid" width="45">
    <div>
      <p class="fw-bold m-0 mt-2">YUK BIKIN STORAGE LUCU</p>
      <small class="text-secondary fw-bold d-block">simple but kreative</small>
      <small class="text-secondary fw-bold">5rb ditonton - 5 hari yang lalu</small>
    </div>
  </div>
</a> -->
            <!-- <a href="putar_video.php" class="col-4 image-card py-4">
  <img src="assets/img/hiasan.png" alt="" class="img-fluid">
  <div class="d-flex align-items-start gap-3 mt-2">
    <img src="assets/img/profilcabila.png" alt="" class="img-fluid" width="45">
    <div>
      <p class="fw-bold m-0 mt-2">DIY- DEKOR HIASAN</p>
      <small class="text-secondary fw-bold d-block">cabila foryou</small>
      <small class="text-secondary fw-bold">3rb ditonton - 4 hari yang lalu</small>
    </div>
  </div>
</a> -->
            <!-- <a href="putar_video.php" class="col-4 image-card py-4">
  <img src="assets/img/dompetkecap.png" alt="" class="img-fluid">
  <div class="d-flex align-items-start gap-3 mt-2">
    <img src="assets/img/vaniprofil.png" alt="" class="img-fluid" width="45">
    <div>
      <p class="fw-bold m-0 mt-2">TUTORIAL DOMPET BANGO</p>
      <small class="text-secondary fw-bold d-block">Vani DIY</small>
      <small class="text-secondary fw-bold">1rb ditonton - 3 jam yang lalu</small>
    </div>
  </div>
</a> -->
    </main>
    <!-- END MAIN -->

    <!-- FOOTER -->
    <footer class="py-5 mt-5">
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
                    <p class="m-0 text-white">Pada situs web ini kami akan berbagi tutorial pengelolahan sampah yang
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
    <!-- END FOOTER -->
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

<script>
    function toggleMenu() {
        var menu = document.getElementById("floatingMenu");
        var layer = document.getElementById("backLayer");

        // Toggle visibility of floating menu and back layer
        if (menu.classList.contains("d-none")) {
            menu.classList.remove("d-none");
            layer.classList.remove("d-none");
        } else {
            menu.classList.add("d-none");
            layer.classList.add("d-none");
        }
    }
</script>

    <script>
        // const profileBtn = document.querySelector('#profileBtn')
        // const floatingMenu = document.querySelector('.floating-menu')
        // const backLayer = document.querySelector('.back-layer')

        // profileBtn.addEventListener('click', function() {
        //     backLayer.classList.add("show")
        //     floatingMenu.classList.add("show")
        // })

        // backLayer.addEventListener('click', function() {
        //     backLayer.classList.remove("show")
        //     floatingMenu.classList.remove("show")
        // })
    </script>
</body>

</html>
