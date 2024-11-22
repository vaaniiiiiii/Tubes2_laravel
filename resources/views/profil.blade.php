<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css boost -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Profil | Rhipus</title>

    <link rel="stylesheet" href="css/global.css" />
    <link rel="stylesheet" href="css/lihat-profil.css" />
    <script src="https://kit.fontawesome.com/72cab53f1b.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- HEADER -->

    <!-- END HEADER -->

    <!-- MAIN -->
    <main class="container">
        <div class="search-container mt-4 mb-3 pt-4 sticky-top bg-white">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center justify-content-center gap-3">
                <i class="fa-solid fa-chevron-left text-muted"></i>
                <a href="/">Beranda</a>
              </div>
              <form class="align-self-center">
                  <div class="position-relative w-100 align-self-center">
                      <input type="text" class="form-control rounded-pill pe-5" placeholder="Telusuri">
                      {{-- <button>
                          <img src="assets/img/search.png" alt="" class="position-absolute top-0 end-0 img-fluid"
                              width="57">
                      </button> --}}
                  </div>
              </form>
            </div>
        </div>

        <div class="container mt-5">
            <section id="profile">
                <div class="d-flex align-items-center gap-4">
                    <div>
                        <img src="/img/user-avatar.png" alt="Profile" class="img-fluid" width="50">
                    </div>
                    <div>
                        <h4 class="fw-bold m-0"></h4>
                        <p class="mb-2">

                        </p>
                        <div class="d-flex align-items-center gap-4">
                            <a href="/unggah">
                                <button
                                    class="d-flex align-items-center gap-1 px-2 py-1 bg-transparent rounded border border-black button-unggah">
                                    <i class="fa-solid fa-plus"></i>
                                    Unggah
                                </button>
                            </a>
                            <a href="/editProfil"
                                class="d-flex align-items-center gap-1 px-2 py-1 bg-transparent rounded border border-black button-unggah">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Edit Profil
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="my-videos" class="mt-5">
                <h5 class="fw-bold active-line d-inline-block">My Videos</h5>
                <div class="row g-5">
                    @foreach ($videos as $video)
                        <div class="col-3">
                            <a href="/video/{{ $video->id }}" class="card">
                              <div>
                                <img src="{{ asset($video->thumbnail) }}" alt="" class="img-fluid w-100 rounded-top">
                              </div>
                              <div class="card-body">
                                <h5>{{ $video->judul }}</h5>
                                <small class="text-muted">{{ $video->created_at->diffForHumans() }}</small>
                              </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </section>


        </div>
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
    <!-- END FOOTER -->
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script>
        const profileBtn = document.querySelector('#profileBtn')
        const floatingMenu = document.querySelector('.floating-menu')
        const backLayer = document.querySelector('.back-layer')

        profileBtn.addEventListener('click', function() {
            backLayer.classList.add("show")
            floatingMenu.classList.add("show")
        })

        backLayer.addEventListener('click', function() {
            backLayer.classList.remove("show")
            floatingMenu.classList.remove("show")
        })
    </script>
</body>

</html>
