<?php
require('koneksi.php');
require('query.php');
$obj = new crud;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Landing Page-SI-BOSS</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/custom2.css" />
  <link rel="stylesheet" href="font/stylesheet.css" />
  <link rel="stylesheet" href="plugin/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="plugin/animation/animate.min.css" />
  <link rel="stylesheet" href="css/icofont.min.css" />
  <link rel="stylesheet" href="css/app.min.css" />
</head>

<body class="pt-0">
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top landingNav">
      <div class="container">
        <a class="navbar-brand m-0 d-flex align-self-stretch align-items-center" href="#">
          <img src="assets/img/logoW.png" alt="Logo" id="logoNav" />
        </a>
        <button class=" navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="icon fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item ms-3 me-2">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item ms-3 me-2">
              <a class="nav-link" href="#">Booking</a>
            </li>
            <li class="nav-item ms-3 me-2">
              <a class="nav-link" href="#">Help</a>
            </li>
            <li class="nav-item ms-3 me-2">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
          <div class="ms-auto myClass">
            <a href="login.php" class="text-decoration-none">
              <button class="btn b-cust me-2 roundedBtn text-white" id="custBtnLogin">Masuk</button>
            </a>
            <a href="daftar.php" class="text-decoration-none">
              <button class="btn roundedBtn b-cust" id="custBtnDaftar">Daftar</button>
            </a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="banner" style="background-image: url(assets/img/papuma.png)"></div>
          <div class="carousel-caption">
            <h2 class="animate__animated animate__zoomIn" style="animation-delay: 0.5s">Jember</h2>
            <p class="animate__animated animate__fadeInUp px-5" style="animation-delay: 0.5s">
              Salah satu harta karun keindahan alam di Jawa Timur adalah Pantai Papuma Jember. Sebagai tempat wisata,
              Pantai Papuma sangat cocok untuk dikunjungi karena menyimpan banyak pesona dan keindahan alam. Terdapat
              juga beberapa objek dan fasilitas yang unik di pantai satu ini.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <div class="banner" style="background-image: url(assets/img/SBY.png)"></div>
          <div class="carousel-caption">
            <h2 class="animate__animated animate__zoomIn" style="animation-delay: 0.5s">Surabaya</h2>
            <p class="animate__animated animate__fadeInUp" style="animation-delay: 0.5s">
              Kota Surabaya terkenal dengan sebutan Kota Pahlawan. Kota terbesar kedua di Indonesia setelah Kota Jakarta
              ini dikenal pula sebagai pusat bisnis, industri, perdagangan, dan pendidikan di kawasan timur Pulau Jawa
              dan sekitarnya.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <div class="banner" style="background-image: url(assets/img/bali.png)"></div>
          <div class="carousel-caption">
            <h2 class="animate__animated animate__zoomIn" style="animation-delay: 0.5s">Bali</h2>
            <p class="animate__animated animate__fadeInUp" style="animation-delay: 0.5s">
              Bali merupakan pulau pariwisata terkemuka di Indonesia. Tempat wisata pegunungan, pantai, hingga pusat
              kota yang berbeda dari tempat lain di dunia. Perpaduan alam dan budaya yang khas menjadi magnet tersendiri
              bagi jutaan wisatawan domestik maupun mancanegara untuk berkunjung ke pulau ini.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <div class="banner" style="background-image: url(assets/img/candi\(Magelang\).png)"></div>
          <div class="carousel-caption">
            <h2 class="animate__animated animate__zoomIn" style="animation-delay: 0.5s">Magelang</h2>
            <p class="animate__animated animate__fadeInUp px-5" style="animation-delay: 0.5s">
              Candi Borobudur simbol inspiratif. Sebuah tempat yang pas untuk mencari ketenangan jiwa. Kami ingin
              memfasilitasi itu. Sehingga Borobudur menjadi pemersatu beragam latar belakang agama, politik, sosial, dan
              budaya. Semua melebur berharmonisasi di sini.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <div class="banner" style="background-image: url(assets/img/jakarta.png)"></div>
          <div class="carousel-caption">
            <h2 class="animate__animated animate__zoomIn" style="animation-delay: 0.5s">Jakarta</h2>
            <p class="animate__animated animate__fadeInUp" style="animation-delay: 0.5s">
              Kota Jakarta merupakan ibu kota Indonesia menjadi pusat pemerintahan. Kota Jakarta dijuluki Kota Seribu
              Pulau yang menarik untuk berwisata bersama keluarga walaupun berada dipusat kota.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <div class="banner" style="background-image: url(assets/img/image_2.png)"></div>
          <div class="carousel-caption">
            <h2 class="animate__animated animate__zoomIn" style="animation-delay: 0.5s">Malang</h2>
            <p class="animate__animated animate__fadeInUp" style="animation-delay: 0.5s">
              Malang dengan julukan Kota Paris Van Java mampu menarik wisatawan lokal maupun wisatawan mancanegara akan
              keindahan kotanya yang banyak sekali tempat wisata mulai dari museum hingga wisata paralayang.
            </p>
          </div>
        </div>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <section class="search d-flex align-items-center justify-content-center">
      <form action="pencarian.php" method="POST">
        <div class="input-group mb-1">
          <span class="input-group-text"><i class="fas fa-location-arrow text-white"></i></span>
          <label for="InputIdTerminal" class="form-label"></label>
          <select class="form-select form-select-user select-md" aria-label=".form-select-sm example" required data-parsley-required-message="Data harus di isi !!!" name="txt_pemberangkatan" required>
            <option disabled selected>Pilih Terminal</option>
            <?php
            $datasd = $obj->lihatTerminal();
            $no = 1;
            if ($datasd->rowCount() > 0) {
              if ($sesLvl == 1) {
                $dis = "";
              } else {
                $dis = "disabled";
              }
              while ($row = $datasd->fetch(PDO::FETCH_ASSOC)) {
                $id_terminalst = $row['id_terminal'];
                $nama_terminalst = $row['nama_terminal'];
                $kabupatenst = $row['kabupaten_terminal'];
            ?>
                <option value="<?php echo $id_terminalst; ?>"><?php echo $nama_terminalst, ', ', $kabupatenst; ?></option>
            <?php
              }
            }
            ?>
          </select>
          <span class="input-group-text"><i class="fas fa-exchange-alt text-white"></i></span>
          <label for="InputIdTerminal" class="form-label"></label>
          <select class="form-select form-select-user select-md" aria-label=".form-select-sm example" required data-parsley-required-message="Data harus di isi !!!" name="txt_tujuan" required>
            <option disabled selected>Pilih Terminal</option>
            <?php
            $datasd = $obj->lihatTerminal();
            $no = 1;
            if ($datasd->rowCount() > 0) {
              if ($sesLvl == 1) {
                $dis = "";
              } else {
                $dis = "disabled";
              }
              while ($row = $datasd->fetch(PDO::FETCH_ASSOC)) {
                $id_terminalst = $row['id_terminal'];
                $nama_terminalst = $row['nama_terminal'];
                $kabupatenst = $row['kabupaten_terminal'];
            ?>
                <option value="<?php echo $id_terminalst; ?>"><?php echo $nama_terminalst, ', ', $kabupatenst; ?></option>
            <?php
              }
            }
            ?>
          </select><span class="input-group-text"><i class="fas fa-map-marker-alt text-white"></i>
          </span>
        </div>

        <div class="input-group ms-auto me-auto" style="width: 400px;">
          <span class="input-group-text"></span>
          <input type="date" class="form-control" id="datepicker" name="txt_Tgl" required />
          <span class="input-group-text"></span>
        </div>

        <div class="text-center mt-3">
          <button type="submit" name="simpan" class="btn colorPrimary text-white roundedBtn">Cari</button>
        </div>
      </form>
    </section>

    <section class="py-5 bg-light">
      <div class="container py-1">
        <div class="row myrow1 py-sm-3 animate__animated animate__fadeInLeft">
          <div class="col-sm-6 pe-sm-5 text-center text-sm-start">
            <h3>SI-BOSS siap membantu Anda dalam bepergian !</h3>
            <p class="my-4 pe-xl-8">Anda kesulitan mencari tiket bis ? Kami bisa membantu Anda dalam mencari tiket bis
              sesuai tujuan yang Anda inginkan. Yuk cek disini !</p>
            <a href="#"><button class="btn colorPrimary text-white d-none d-sm-inline-block">Cek <span>Tiket Anda
                  Sekarang !</span></button>
            </a>
          </div>
          <div class="col-sm-6">
            <img class="img-fluid imgMove" src="assets/img/bus3.png" alt="gbrBus" />
          </div>
        </div>
        <div class="row myrow2 animate__animated animate__zoomIn">
          <div class="col-12 text-center text-sm-start" style="animation-delay: 0.4s">
            <button class="btn colorPrimary roundedBtn text-white">Cek Tiket Sekarang !</button>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5 bg-white">
      <div class="container py-1">
        <div class="row myrow1 py-sm-3 animate__animated animate__fadeInRight">
          <div class="col-sm-6 ps-sm-5 text-center text-sm-start order-sm-2">
            <h3>Banyaknya rute perjalanan</h3>
            <p class="my-4 pe-xl-8">Si-Boss memiliki rute perjalanan yang mengantarkan Anda ke kota tujuan dengan opsi
              pemberhentian pada terminal yang diinginkan.</p>
          </div>
          <div class="col-sm-6 order-sm-1">
            <img class="img-fluid imgMove" src="assets/img/bus2.png" alt="gbrBus" />
          </div>
        </div>
      </div>
    </section>

    <section class="py-5 bg-light">
      <div class="container py-1">
        <div class="row myrow1 mb-4">
          <div class="col-12 text-center">
            <h3>Cara Pesan Tiket di <br /><span class="span1">SI-BOSS</span><span class="span2">Express</span></h3>
          </div>
        </div>
        <div class="row myrow2 py-4">
          <div class="col-sm-6 col-lg-4 d-flex justify-content-center mb-4">
            <div class="card card-user py-4 shadow-sm hover-top" style="width: 280px; height: 350px">
              <div class="text-center step">
                <img src="assets/img/1.png" alt="step1" height="150" alt="" />
                <div class="card-body px-2">
                  <h3 class="mt-3">Cari tiket</h3>
                  <p class="mt-2 mb-0">Cari tiket berdasarkan tujuan terminal yang ingin di tuju.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 d-flex justify-content-center mb-3">
            <div class="card card-user py-4 shadow-sm hover-top" style="width: 280px; height: 350px">
              <div class="text-center step">
                <img src="assets/img/2.png" alt="step1" height="150" alt="" />
                <div class="card-body px-2">
                  <h3 class="mt-3"><span style="font-size: 20px">Pilih Ketersediaan tiket</span></h3>
                  <p class="mt-2 mb-0 px-3">Pilih tiket yang masih tersedia sesuai dengan destinasi tujuan Anda</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 d-flex justify-content-center mb-3">
            <div class="card card-user py-4 shadow-sm hover-top" style="width: 280px; height: 350px">
              <div class="text-center step">
                <img src="assets/img/3.png" alt="step1" height="150" alt="" />
                <div class="card-body px-2">
                  <h3 class="mt-3">Login</h3>
                  <p class="mt-2 mb-0">Login terlebih dahulu, untuk memesan sebuah tiket.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 d-flex justify-content-center mb-3">
            <div class="card card-user py-4 shadow-sm hover-top" style="width: 280px; height: 350px">
              <div class="text-center step">
                <img src="assets/img/4.png" alt="step1" height="150" alt="" />
                <div class="card-body px-2">
                  <h3 class="mt-3">Pemesanan</h3>
                  <p class="mt-2 mb-0">Lakukan pemesanan secara online dengan mengisi data pemesanan.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 d-flex justify-content-center mb-3">
            <div class="card card-user py-4 shadow-sm hover-top" style="width: 280px; height: 350px">
              <div class="text-center step">
                <img src="assets/img/5.png" alt="step1" height="150" alt="" />
                <div class="card-body px-2">
                  <h3 class="mt-3">Pembayaran</h3>
                  <p class="mt-2 mb-0">Cari tiket berdasarkan tujuan terminal yang ingin di tuju.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 d-flex justify-content-center mb-3">
            <div class="card card-user py-4 shadow-sm hover-top" style="width: 280px; height: 350px">
              <div class="text-center step">
                <img src="assets/img/6.png" alt="step1" height="150" alt="" />
                <div class="card-body px-2">
                  <h3 class="mt-3">Cetak Tiket</h3>
                  <p class="mt-2 mb-0">Cari tiket berdasarkan tujuan terminal yang ingin di tuju.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5 bg-white">
      <div class="container py-1">
        <div class="row myrow1 mb-4">
          <div class="col-12 text-center">
            <h3 class="mb-5">Tentang Kami</h3>
            <i class=""></i>
            <p class="px-3 myPagrph"><b>SI-BOSS</b> dikembangkan oleh mahasiswa prodi Teknik Informatika kampus
              Politeknik Negeri Jember. Sistem Informasi ini digunakan untuk pemesanan tiket bus antar kota baik dengan
              mudah baik luar provinsi maupun di dalam provinsi. Memesan tiket bus di SI-Boss dapat dilakukan dimanapun
              dan kapanpun kita berada.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <section class="bg-primary-gradient text-white">
    <div class="bg-holder" style="background-image:url(../assets/img/footer-bg.png);background-position:center;background-size:cover;">
    </div>
    <div class="container">
      <footer class="py-5">
        <div class="row">
          <div class="col-2">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
            </ul>
          </div>

          <div class="col-2">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
            </ul>
          </div>

          <div class="col-2">
            <h5>Section</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
            </ul>
          </div>

          <div class="col-4 offset-1">
            <form>
              <h5>Subscribe to our newsletter</h5>
              <p>Monthly digest of whats new and exciting from us.</p>
              <div class="d-flex w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Email address</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                <button class="btn btn-primary" type="button">Subscribe</button>
              </div>
            </form>
          </div>
        </div>

        <div class="d-flex justify-content-between py-4 my-4 border-top">
          <p>&copy; 2021 Company, Inc. All rights reserved.</p>
          <ul class="list-unstyled d-flex">
            <li class="ms-3"><a class="link-dark" href="#">
                <a class="text-white outline" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Whatsapp"><i class="icofont-whatsapp s26"></i></a>
            <li class="ms-3"><a class="link-dark" href="#">
                <a class="text-white outline" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram"><i class="icofont-instagram s22"></i></a>
            <li class="ms-3"><a class="link-dark" href="#">
                <a class="text-white outline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Gmail"><i class="fa fa-google s22"></i></a>
          </ul>
        </div>
      </footer>
    </div>
  </section>


  <!-- JavaScript & JQuery -->
  <script src="plugin/jquery/jquery-3.6.0.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    $(window).scroll(function() {
      if ($(document).scrollTop() > 580) {
        $('nav').addClass('bgNav');
        $('nav').removeClass('navbar-dark');
        $('nav').removeClass('landingNav');
        $('#custBtnDaftar').removeClass('b-cust');
        $('#custBtnLogin').removeClass('b-cust');
        $('nav').addClass('navbar-light');
        $('nav').addClass('shadow mod');
        $('#custBtnDaftar').addClass('btn-outlineCust');
        $('#custBtnLogin').addClass('colorPrimary');
        $("#logoNav").attr("src", "assets/img/logo.png");
      } else {
        $('nav').removeClass('bgNav');
        $('nav').removeClass('navbar-light');
        $('#custBtnDaftar').removeClass('btn-outlineCust');
        $('#custBtnLogin').removeClass('colorPrimary');
        $('nav').addClass('navbar-dark');
        $('nav').addClass('landingNav');
        $('#custBtnDaftar').addClass('b-cust');
        $('#custBtnLogin').addClass('b-cust');
        $('nav').removeClass('shadow mod');
        $("#logoNav").attr("src", "assets/img/logoW.png");
      }
    });
  </script>
</body>

</html>