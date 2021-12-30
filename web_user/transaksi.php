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
</head>

<body class="bg-light">
  <div id="particles-js"></div>
  <header>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow mod fixed-top">
      <div class="container">
        <a class="navbar-brand m-0 d-flex align-self-stretch align-items-center" href="#">
          <img src="assets/img/logo.png" alt="Logo" />
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <button class="btn colorPrimary me-2 roundedBtn text-white" type="submit">Masuk</button>
            <button class="btn btn-outlineCust roundedBtn" type="submit">Daftar</button>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <section class="mycontent2 py-4">
      <div class="container position-relative">
        <div class="row">
          <div class="col-12 custom-panel">
            <div class="row">
              <div class="col-12">
                <div class="panel-data bg-white py-2 myRounded shadow mod mb-2 d-flex">
                  <div class="container">
                    <div class="row myrowData h-100">
                      <div class="col-6 pt-2">
                        <h3 class="m-0"><b>Kencana</b></h3>
                        <p class="m-0">Eksekutif</p>
                      </div>
                      <div class="col-6 pt-2">
                        <h3 class="m-0 d-flex justify-content-end font-RobotoBold s22 colorPrimaryText">
                          RP 200.000
                          <span class="font-Roboto s14 align-self-center colorBlueDarkText">/Kursi</span>
                        </h3>
                        <p class="m-0 d-flex justify-content-end font-RobotoBold s14">0/60</p>
                      </div>
                      <div class="col-2 py-2">
                        <img class="img-fluid img-bus rounded" src="assets/img/image 3.jpg" alt="icoBus" />
                      </div>
                      <div class="col-10 py-2">
                        <div class="row">
                          <div class="col-3">
                            <p class="m-0"><span class="Waktu">06:00</span></p>
                            <p class="m-0">Jember</p>
                            <span class="badge bg-warning text-dark">29-02-2021</span>
                          </div>
                          <div class="col-1 d-flex justify-content-center align-items-center">
                            <i class="fas fa-arrow-right"></i>
                          </div>
                          <div class="col-3">
                            <p class="m-0"><span class="Waktu">18:00</span></p>
                            <p class="m-0">Surabaya</p>
                          </div>
                          <div class="col-2 border border-start border-bottom-0 border-top-0 border-end-0">
                            <p class="font-Roboto s12 m-0">Estimasi</p>
                            <p class="font-RobotoBold s18">6 jam</p>
                          </div>
                        </div>
                        <div class="row mt-2 info">
                          <div class="col-4 text-end">
                            <button class="colorPrimaryText btn s14" id="shadow1" data-bs-toggle="collapse" data-bs-target="#detailBus" aria-expanded="false" aria-controls="detailBus">Detail Bus</button>
                          </div>
                          <div class="col-4 text-center">
                            <button class="colorPrimaryText btn s14" id="shadow2" data-bs-toggle="collapse" data-bs-target="#detailRute" aria-expanded="false" aria-controls="detailRute">Detail Rute</button>
                          </div>
                          <div class="col-4 text-start">
                            <button class="colorPrimaryText btn s14" id="shadow3" data-bs-toggle="collapse" data-bs-target="#ulasan" aria-expanded="false" aria-controls="ulasan">Ulasan</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div id="detailBus" class="collapse">
                  <div class="panel-data2 bg-white py-2 myRounded transitionShadow mb-1">
                    <div class="container">
                      <p class="pt-3 font-RobotoBold mb-2">Jenis Bus : <span class="font-Roboto">Eknonomi</span></p>
                      <p class="font-RobotoBold mb-2">Kapasitas Kursi : <span class="font-Roboto">60 Kursi</span></p>
                      <p class="font-RobotoBold mb-2">
                        Fasilitas bus :
                        <span class="font-Roboto"> - </span>
                      </p>
                    </div>
                  </div>
                </div>

                <div id="detailRute" class="collapse">
                  <div class="panel-data2 bg-white py-2 myRounded transitionShadow mb-1 shadow-none">
                    <div class="container">
                      <p class="alert alert-danger m-0">Detail Rute Belum Tersedia !</p>
                    </div>
                  </div>
                </div>

                <div id="ulasan" class="collapse">
                  <div class="panel-data2 bg-white py-2 myRounded transitionShadow mb-1 shadow-none">
                    <div class="container">
                      <p class="alert alert-danger m-0">Ulasan Belum Tersedia !</p>
                    </div>
                  </div>
                </div>

                <div class="card cardUser myRounded shadow mod mb-3">
                  <div class="card-header">
                    <p class="m-0 s16 p-2"><b>Transaksi</b></p>
                  </div>
                  <div class="card-body">
                    <form action="#" method="POST">
                      <div class="row ps-2">
                        <div class="col-md-6 mb-3">
                          <label for="IDPemesanan" class="form-label">ID Pemesanan</label>
                          <input type="text" class="form-control form-control-user2" id="IDPemesanan" name="txt_id" placeholder="" readonly />
                        </div>
                      </div>
                      <div class="row ps-2">
                        <div class="col-md-6 mb-1">
                          <label for="exampleInputEmail" class="form-label">Nama Pemesan</label>
                          <input type="text" class="form-control form-control-user2" id="exampleInputEmail" name="txt_nama" placeholder="Ex: Budi Santoso" />
                          <hr>
                        </div>
                      </div>

                      <div class="row ps-2">
                        <div class="col-md-6 mb-4">
                          <p class="m-0 s14"><b>Detail Pemesanan</b></p>
                        </div>
                      </div>
                      <div class="row ps-2">
                        <div class="col-md-6">
                          <div class="myRounded border shadow mod p-3 mb-2" style="min-height: 30px;">
                            <div class="row">
                              <div class="col-sm-3">
                                <p>NIK</p>
                              </div>
                              <div class="col-sm-7">
                                <p>: 350903***********</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-3">
                                <p>Nama</p>
                              </div>
                              <div class="col-sm-7">
                                <p>: Muhammad Khoirul Rosikin</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-3">
                                <p>Jenis Kelamin</p>
                              </div>
                              <div class="col-sm-7">
                                <p>: Laki-laki</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-3">
                                <p class="m-0">Nomer Kursi</p>
                              </div>
                              <div class="col-sm-7">
                                <p class="m-0">: 20C</p>
                              </div>
                            </div>
                          </div>
                          <hr>
                        </div>
                      </div>

                      <div class="row ps-2">
                        <div class="col-md-6 mb-4">
                          <p class="m-0 s14"><b>Pembayaran</b></p>
                        </div>
                      </div>
                      <div class="row ps-2">
                        <div class="col-md-6 mb-3">
                          <label for="MethodPay" class="form-label">Metode Pembayaran</label>
                          <select class="form-select form-select-user select-md pay" aria-label=".form-select-sm example" required data-parsley-required-message="Harap pilih data terminal !!!" name="MethodPay" id="pay">
                            <option>Pilih</option>
                            <option value="briva">Bank BRI (BRIVA)</option>
                          </select>
                        </div>
                      </div>
                      <div class="row ps-2 hidden" id="noBriva">
                        <div class="col-md-6 mb-3">
                          <label for="NoBriva" class="form-label">No. Briva</label>
                          <input type="text" class="form-control form-control-user2" id="NoBriva" name="txt_noBriva" placeholder="" readonly value="86531616235361"/>
                        </div>
                      </div>
                      <div class="row ps-2">
                        <div class="col-md-6">
                          <label for="UploadBukti" class="form-label ">Upload Bukti Pembayaran</label>
                          <div class="input-group mb-3">
                            <input type="file" class="form-control form-select-user select-md" id="UploadBukti">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 d-flex justify-content-center mb-5">
              <button type="submit" name="submit" class="btn colorPrimary text-white py-2 s14 rounded-pill resize">Pesan</button>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  </main>

  <!-- JavaScript & JQuery -->
  <script src="plugin/jquery/jquery-3.6.0.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/particles.js"></script>
  <script src="js/jquery.repeater.min.js"></script>
  <script src="js/form-repeater.int.js"></script>
  <script>
    $(".show-hide").click(function() {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  </script>
  <script>
    $("#shadow1, #shadow2, #shadow3").click(function() {
      $(".transitionShadow").toggleClass("shadow mod");
    });
    $(".btn").click(function() {
      $(".collapse.show").collapse("hide");
    });
  </script>
  <script>
      $(".pay").change(function () {
        var responseID = $(this).val();
        if (responseID == "briva") {
          $("#noBriva").removeClass("hidden");
          $("#noBriva").addClass("show");
        } else {
          $("#noBriva").removeClass("show");
          $("#noBriva").addClass("hidden");
        }
        console.log(responseID);
      });
    </script>
</body>

</html>