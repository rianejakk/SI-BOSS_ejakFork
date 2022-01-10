<?php
require('koneksi.php');
require('query.php');
$obj = new crud;

session_start();

if (isset($_COOKIE['cookie_email'])) {
  $cookieEmail = $_COOKIE['cookie_email'];
  $cookiePass = $_COOKIE['cookie_password'];
  $cookieName = $_COOKIE['cookie_name'];
  $queryCookie = $obj->login($cookieEmail);
  while ($row = $queryCookie->fetch(PDO::FETCH_ASSOC)) {
    $id_user_admin = $row['nik_user'];
    $nama = $row['nama_user'];
    $emailVal = $row['email_user'];
    $passwordVal = $row['password_user'];
    $tempat = $row['tempat_lahir_user'];
    $tanggal = $row['tanggal_lahir_user'];
    $jk = $row['jenis_kelamin_user'];
    $alamat = $row['alamat_user'];
    $noHP = $row['no_hp_user'];
    $foto = $row['foto_user'];
  }

  if ($emailVal == $cookieEmail && $passwordVal == $cookiePass) {
    $_SESSION['name'] = $cookieName;
    $_SESSION['email'] = $cookieEmail;
    $_SESSION['pass'] = $cookiePass;
  }

  if (isset($_SESSION['email'])) {
    header('Location: index.php');
  }
}

if (isset($_POST['submit'])) {
  $email = $_POST['txt_email'];
  $password = $_POST['txt_password'];
  $rememberMe = !empty($_POST['check_remember']) ? $_POST['check_remember'] : '';

  if (!empty(trim($email)) && !empty(trim($password))) {
    $query = $obj->login($email);
    $num = $query->rowCount();

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $id_user_admin = $row['nik_user'];
      $nama = $row['nama_user'];
      $emailVal = $row['email_user'];
      $passwordVal = $row['password_user'];
      $tempat = $row['tempat_lahir_user'];
      $tanggal = $row['tanggal_lahir_user'];
      $jk = $row['jenis_kelamin_user'];
      $alamat = $row['alamat_user'];
      $noHP = $row['no_hp_user'];
      $foto = $row['foto_user'];
    }

    if ($num != 0) {
      if ($emailVal == $email && $passwordVal == $password) {
        $_SESSION['id'] = $id_user_admin;
        $_SESSION['name'] = $nama;
        $_SESSION['email'] = $emailVal;
        $_SESSION['pass'] = $passwordVal;
        $_SESSION['tempat'] = $tempat;
        $_SESSION['tanggal'] = $tanggal;
        $_SESSION['jk'] = $jk;
        $_SESSION['alamat'] = $alamat;
        $_SESSION['noHP'] = $noHP;
        $_SESSION['foto'] = $foto;

        if ($rememberMe == 1) {
          $cookie_name = "cookie_email";
          $cookie_value = $emailVal;
          $cookie_time = time() + (60 * 60 * 0.12); //5 menit
          setcookie($cookie_name, $cookie_value, $cookie_time, "/");

          $cookie_name = "cookie_password";
          $cookie_value = $passwordVal;
          $cookie_time = time() + (60 * 60 * 0.12); //5 menit
          setcookie($cookie_name, $cookie_value, $cookie_time, "/");

          $cookie_name = "cookie_name";
          $cookie_value = $nama;
          $cookie_time = time() + (60 * 60 * 0.12); //5 menit
          setcookie($cookie_name, $cookie_value, $cookie_time, "/");
        }

        header('Location: index.php');
      }
      if ($emailVal != $email && $passwordVal == $password) { ?>
        <div class="w-100 d-flex justify-content-center">
          <div class="alert alert-danger d-block position-fixed custAlert" style="z-index: 11;" role="alert">Email tidak ditemukan !</div>
        </div>
      <?php
      }
      if ($emailVal == $email && $passwordVal != $password) { ?>
        <div class="w-100 d-flex justify-content-center">
          <div class="alert alert-danger d-block position-fixed custAlert" style="z-index: 11;" role="alert">Password salah !</div>
        </div>
      <?php
      }
    } else { ?>
      <div class="w-100 d-flex justify-content-center">
        <div class="alert alert-danger d-block position-fixed custAlert" style="z-index: 11;" role="alert">Email atau password salah !!</div>
      </div>
    <?php
    }
  } else { ?>
    <div class="w-100 d-flex justify-content-center">
      <div class="alert alert-danger d-block position-fixed custAlert" style="z-index: 11;" role="alert">Email atau password kosong !!</div>
    </div>
<?php
  }
}
?>
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
              <button class="btn colorPrimary me-2 roundedBtn text-white">Masuk</button>
            </a>
            <a href="daftar.php" class="text-decoration-none">
              <button class="btn btn-outlineCust roundedBtn">Daftar</button>
            </a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <section class="mycontent py-4">
      <div class="container position-relative">
        <div class="row">
          <div class="col-12 custom-panel">
            <div class="row">
              <div class="col-lg-6">
                <div class="panel-banner1 p-3 gradientBlue2 myRounded myshadow d-none d-lg-block" style="height: 480px"></div>
              </div>
              <div class="col-lg-6">
                <div class="panel-banner2 py-5 bg-white myRounded shadow mod" style="height: 480px">
                  <h3 class="font-RobotoBold s22 m-0">Login</h3>
                  <p class="mb-4 s12">Nikmati perjalanan seru bersama <span class="font-Pacifico s12">SI-BOSS</span></p>
                  <form class="custom-validation" action="login.php" method="POST">
                    <div class="mb-3">
                      <label for="exampleInputEmail" class="form-label font-RobotoSemiBold colorBold s12">Email</label>
                      <input type="email" class="form-control form-control-user2" id="exampleInputEmail" name="txt_email" required data-parsley-required-message="Email tidak boleh kosong !!!" data-parsley-type-message="Harus sesuai format email menggunakan @" placeholder="Ex: budiman@gmail.com" />
                    </div>
                    <div class="mb-2">
                      <label for="password-input" class="form-label font-RobotoSemiBold colorBold s12">Kata sandi</label>
                      <input type="password" class="form-control form-control-user2" id="password-input" name="txt_password" required data-parsley-required-message="Kata sandi tidak boleh kosong !!!" placeholder="********" data-parsley-length="[8,16]" maxlength="16" data-parsley-length-message="Harus disiisi 8 sampai 16 karakter !!!" aria-label="password" />
                    </div>
                    <span class="s10 p-0 mb-2 d-flex justify-content-end text-muted show-hideWithText" toggle="#password-input" id="spanShow">
                      Tampilkan Kata Sandi
                    </span>
                    <div class="clearfix"></div>
                    <div class="row">
                      <div class="col-6 d-flex justify-content-start">
                        <div class="mb-3">
                          <div class="form-check small">
                            <input type="checkbox" class="form-check-input" id="customCheck" name="check_remember" value="1" />
                            <label class="form-check-label" for="customCheck">Remember Me</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-6 d-flex justify-content-end">
                        <div class="mb-3 ">
                          <div class="small">
                            <!-- <a class="small s12" href="#">Lupa kata sandi ?</a> -->
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-5">
                      <div class="col-12 d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn colorPrimary text-white py-2 s14 rounded-pill resize">Login</button>
                      </div>
                      <div class="col-12 d-flex justify-content-center">
                        <p class="m-0 p-0 s12 pt-2">
                          Belum punya Akun ?
                          <a href="daftar.php" class="small s12 ps-0">Daftar disini !</a>
                        </p>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 custom-panel2 d-none d-lg-block">
            <div class="panel-bottom">
              <div class="mybgs">
                <img src="assets/img/bg-login.png" alt="img2" class="img-fluid" />
              </div>
              <div class="custColor shadow-Cust"></div>
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

    $(".show-hideWithText").click(function() {
      $(this).text(($("#spanShow").text() == 'Sembunyikan Kata Sandi') ? 'Tampilkan Kata Sandi' : 'Sembunyikan Kata Sandi');
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  </script>
</body>

</html>