<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SI-BOSS Express</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/custom2.css" />
  <link rel="stylesheet" href="font/stylesheet.css" />
  <link rel="stylesheet" href="plugin/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="plugin/animation/animate.min.css" />
  <link rel="stylesheet" href="css/icofont.min.css" />
  <link rel="stylesheet" href="css/app.min.css" />
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
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item ms-3 me-2">
              <a class="nav-link" href="index.php#booking">Booking</a>
            </li>
            <li class="nav-item ms-3 me-2">
              <a class="nav-link" href="index.php#help">Help</a>
            </li>
            <li class="nav-item ms-3 me-2">
              <a class="nav-link" href="index.php#about">About</a>
            </li>
          </ul>
          <div class="ms-auto myClass">
            <a href="login.php" class="text-decoration-none">
              <button class="btn btn-outlineCust roundedBtn">Masuk</button>
            </a>
            <a href="daftar.php" class="text-decoration-none">
              <button class="btn colorPrimary me-2 roundedBtn text-white">Daftar</button>
            </a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <section class="mycontent2">
      <div class="container position-relative">
        <div class="row">
          <div class="col-12 panelDaftar">
            <div class="panel-bgDaftar myRounded shadow mod"></div>
            <div class="row">
              <div class="col-lg-6"></div>
              <div class="col-lg-6">
                <div class="panel-banner p-5 whiteblur myRounded">
                  <h3 class="font-RobotoBold s22 m-0">Daftar</h3>
                  <p class="mb-4 s12">Nikmati perjalanan seru bersama <span class="font-Pacifico s12">SI-BOSS</span></p>
                  <form class="custom-validation px-2" action="login.php" method="POST">
                    <div class="mb-3">
                      <label for="exampleInputEmail" class="form-label font-RobotoSemiBold colorBold s12">Email</label>
                      <input type="email" class="form-control form-control-user2" id="exampleInputEmail" name="txt_email" required data-parsley-required-message="Email tidak boleh kosong !!!" data-parsley-type-message="Harus sesuai format email menggunakan @" placeholder="Ex: budiman@gmail.com" />
                    </div>
                    <div class="row g-1">
                      <div class="col-md-6 ">
                        <div class="mb-2">
                          <label for="password-input" class="form-label font-RobotoSemiBold colorBold s12">Kata Sandi</label>
                          <input type="password" class="form-control form-control-user2" id="password-input" name="txt_password" required data-parsley-required-message="Kata sandi harus di isi !!!" placeholder="********" data-parsley-length="[8,16]" maxlength="16" data-parsley-length-message="Harus disiisi 8 sampai 16 karakter !!!" data-parsley-uppercase="1" data-parsley-lowercase="1" data-parsley-number="1" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-2">
                          <label for="Kpassword-input" class="form-label font-RobotoSemiBold colorBold s12">Konfirmasi Kata sandi</label>
                          <input type="password" class="form-control form-control-user2" id="Kpassword-input" name="txt_pass" required data-parsley-required-message="Masukan ulang kata sandi !!!" data-parsley-equalto="#password-input" data-parsley-equalto-message="Kata sandi tidak cocok" placeholder="********" data-parsley-length="[8,16]" maxlength="16" data-parsley-length-message="Harus disiisi 8 sampai 16 karakter !!!" />
                        </div>
                      </div>
                    </div>
                    <span class="s10 p-0 mb-2 d-flex justify-content-end text-muted show-hideWithText" toggle="#password-input" toggle2="#Kpassword-input" id="spanShow">
                      Tampilkan Kata Sandi
                    </span>
                    <div class="clearfix"></div>
                    <div class="mb-3">
                      <label for="InputNama" class="form-label font-RobotoSemiBold colorBold s12">NIK</label>
                      <input type="text" class="form-control form-control-user2" id="InputNama" name="txt_nama" required data-parsley-required-message="NIK tidak boleh kosong !!!" placeholder="Ex: Budi Santoso" />
                    </div>
                    <div class="mb-3">
                      <label for="InputNama" class="form-label font-RobotoSemiBold colorBold s12">Nama Lengkap</label>
                      <input type="text" class="form-control form-control-user2" id="InputNama" name="txt_nama" required data-parsley-required-message="Nama tidak boleh kosong !!!" placeholder="Ex: Budi Santoso" />
                    </div>
                    <div class="row g-1">
                      <div class="col-md-6 ">
                        <div class="mb-3">
                          <label for="tptLahir-input" class="form-label font-RobotoSemiBold colorBold s12">Tempat Lahir</label>
                          <input type="text" class="form-control form-control-user2" id="tptLahir-input" name="txt_tptLahir" required data-parsley-required-message="Tempat Lahir tidak boleh kosong !!!" placeholder="Ex: Jember" aria-label="tptLahir" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="tptTglLahir-input" class="form-label font-RobotoSemiBold colorBold s12">Tempat Lahir</label>
                          <input type="date" class="form-control form-control-user2" id="tptTglLahir-input" name="txt_tptTglLahir-input" required data-parsley-required-message="Tanggal Lahir tidak boleh kosong !!!" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="InputNoHp" class="form-label font-RobotoSemiBold colorBold s12">No Handphone</label>
                          <input type="text" class="form-control form-control-user2" id="InputNoHp" name="txt_no_hp" required data-parsley-required-message="No. HP harus di isi !!!" placeholder="Ex: 085808241204" />
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label for="InputJenisKelamin" class="form-label font-RobotoSemiBold colorBold s12">Jenis Kelamin</label>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="Rbtn_jenis_kelamin" id="Radios1" value="Laki-laki" checked />
                            <label class="form-label2" for="Radios1"><span>Laki-laki</span></label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="Rbtn_jenis_kelamin" id="Radios2" value="Perempuan" />
                            <label class="form-label2" for="Radios2"><span>Perempuan</span></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mb-4">
                      <label for="InputAlamat" class="form-label font-RobotoSemiBold colorBold s12">Alamat</label>
                      <input type="text" class="form-control form-control-user2" id="InputAlamat" name="txt_alamat" required data-parsley-required-message="Alamat harus di isi !!!" placeholder="Ex: JL. Dharmawangsa" />
                    </div>
                    <div class="row mb-5">
                      <div class="col-12 d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn colorPrimary text-white py-2 s14 rounded-pill resize">Daftar</button>
                      </div>
                      <div class="col-12 d-flex justify-content-center">
                        <p class="m-0 p-0 s12 pt-2">
                          Sudah punya Akun ?
                          <a href="login.php" class="small s12 ps-0">Login disini !</a>
                        </p>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="footer-bar bg-white fixed-bottom sh-footer">
      <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-1">
          <p class="col-md-4 mb-0 text-muted">© 2021 SI-BOSS Express, Inc</p>

          <a href="#" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none" title="Logo">
            <img src="assets/img/logo.png" alt="" width="105px" />
          </a>
          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3">
              <a class="text-muted outline" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Whatsapp"><i class="icofont-whatsapp s22"></i></a>
            </li>
            <li class="ms-3">
              <a class="text-muted outline" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram"><i class="icofont-instagram s22"></i></a>
            </li>
            <li class="ms-3">
              <a class="text-muted outline" href="#" data-bs-toggle="tooltip" data-bs-placement="right" title="Gmail"><i class="fa fa-google s22"></i></a>
            </li>
          </ul>
        </footer>
      </div>
    </div>
  </main>

  <!-- JavaScript & JQuery -->
  <script src="plugin/jquery/jquery-3.6.0.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/particles.js"></script>
  <script src="js/form-validation.init.js"></script>
  <script src="js/parsley.min.js"></script>
  <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
  </script>
  <script>
    $(".show-hideWithText").click(function() {
      $(this).text(($("#spanShow").text() == 'Sembunyikan Kata Sandi') ? 'Tampilkan Kata Sandi' : 'Sembunyikan Kata Sandi');
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
      var input = $($(this).attr("toggle2"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  </script>
  <script>
    window.Parsley.addValidator("uppercase", {
      requirementType: "number",
      validateString: function(value, requirement) {
        var uppercases = value.match(/[A-Z]/g) || [];
        return uppercases.length >= requirement;
      },
      messages: {
        en: "Password harus terdiri dari minimal (%s) huruf kapital !!!",
      },
    });

    //has lowercase
    window.Parsley.addValidator("lowercase", {
      requirementType: "number",
      validateString: function(value, requirement) {
        var lowecases = value.match(/[a-z]/g) || [];
        return lowecases.length >= requirement;
      },
      messages: {
        en: "Password harus terdiri dari huruf abjad !!!",
      },
    });

    //has number
    window.Parsley.addValidator("number", {
      requirementType: "number",
      validateString: function(value, requirement) {
        var numbers = value.match(/[0-9]/g) || [];
        return numbers.length >= requirement;
      },
      messages: {
        en: "Password harus terdiri dari minimal (%s) angka !!!",
      },
    });

    //has special char
    window.Parsley.addValidator("special", {
      requirementType: "number",
      validateString: function(value, requirement) {
        var specials = value.match(/[^a-zA-Z0-9]/g) || [];
        return specials.length >= requirement;
      },
      messages: {
        en: "Your password must contain at least (%s) special characters.",
      },
    });
  </script>
</body>

</html>