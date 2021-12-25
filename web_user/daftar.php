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
      <section class="mycontent py-4">
        <div class="container position-relative">
          <div class="row">
            <div class="col-12">
              <div class="row g-0">
                <div class="col-lg-12">
                  <div class="panel-banner myRounded shadow shadow-lg d-none d-lg-block" style="height: 100%"></div>
                </div>
                <div class="col-lg-4 order-md-1 w-100 d-flex justify-content-end">
                  <div class="panel-form p-5 whiteblur myRounded pop" style="height: 100%">
                    <h3 class="font-RobotoBold s22 m-0">Daftar</h3>
                    <p class="mb-4 s12">
                      Nikmati perjalanan seru bersama
                      <span class="font-Pacifico s12">SI-BOSS</span>
                    </p>
                    <form action="index.php" method="POST">
                      <div class="mb-3">
                        <label for="InputEmail" class="form-label font-RobotoSemiBold colorBold s12">Email</label>
                        <input type="email" class="form-control form-control-user2" id="InputEmail" name="txt_email" placeholder="Ex: budiman@siboss.com" />
                      </div>
                      <div class="mb-3">
                        <label for="InputNama" class="form-label font-RobotoSemiBold colorBold s12">Nama Lengkap</label>
                        <input type="text" class="form-control form-control-user2" id="InputNama" name="txt_nama" placeholder="Bondan Prakoso" />
                      </div>
                      <div class="mb-3">
                        <label for="password-input" class="form-label font-RobotoSemiBold colorBold s12">Kata sandi</label>
                        <div class="input-group">
                          <input type="password" class="form-control form-control-user2" id="password-input" placeholder="******" aria-label="password" />
                          <span class="input-group-text">
                            <i class="fa fa-eye show-hide" toggle="#password-input"></i>
                          </span>
                        </div>
                      </div>
                      <div class="mb-5">
                        <label for="password-input" class="form-label font-RobotoSemiBold colorBold s12">Konfirmasi Kata sandi</label>
                        <div class="input-group">
                          <input type="password" class="form-control form-control-user2" id="password-input" placeholder="******" aria-label="password" />
                          <span class="input-group-text">
                            <i class="fa fa-eye show-hide" toggle="#password-input"></i>
                          </span>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-12 d-flex justify-content-center">
                          <button type="submit" name="submit" class="btn colorPrimary text-white py-2 s14 rounded-pill resize">Login</button>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                          <p class="m-0 p-0 s12 pt-2">
                            Sudah punya Akun ?
                            <a href="#" class="small s12 ps-0">Login disini !</a>
                          </p>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-6"></div>
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
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
      });
    </script>
    <script>
      $(".show-hide").click(function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
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
