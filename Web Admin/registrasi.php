<?php
require ('koneksi.php');
if(isset ($_POST['register'])){
    $namaVal = $_POST['txt_nama'];
    $emailVal = $_POST['txt_email'];
    $passVal = $_POST['txt_pass'];
    $alamatVal = $_POST['txt_alamat'];
    $jkVal = $_POST['txt_jk'];
    $levelVal = $_POST['txt_level'];
    $terminalVal = $_POST['txt_terminal'];
    $alamattermVal = $_POST['txt_alamatterm'];
    $provVal = $_POST['txt_prov'];
    $kabVal = $_POST['txt_kab'];
    $kecVal = $_POST['txt_kec'];

    $query = "INSERT INTO administrator VALUES ('', '$namaVal', '$emailVal', '$passVal', '', '', 1, '', '', '', '', '')";
    $result = mysqli_query($koneksi, $query);
    header('Location: registrasi.php');
    echo mysqli_error($result);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Daftar - SI BOSS</title>
    <link rel="stylesheet" href="plugin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="plugin/font/stylesheet.css" />
    <link rel="stylesheet" href="plugin/js/bootstrap.min.js" />
  </head>
  <body class="bg-white">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
              <div class="row autoHeight">
                <div class="col-lg-4 d-none d-lg-flex justify-content-center colorPrimary">
                  <div class="banner py-5 position-fixed">
                    <h3 style="font-family: Poppins-Bold" class="mb-5">
                      System Information Booking <br />
                      Online Bus <br /><span>Aman, Mudah, dan Cepat</span>
                    </h3>
                    <img src="img/bus1_B.png" alt="logo_bus" class="img-fluid" width="376px" />
                  </div>
                </div>
                <div class="col-lg-8 p-4 py-3 colorSecondary bg-img">
                  <div class="logo">
                    <a href="#">
                      <img src="img/logo.png" alt="" />
                    </a>
                  </div>
                  <div class="panelFormDaftar o-hidden border-0 shadow">
                    <div class="p-5">
                      <div class="judul">
                        <h4 class="text-gray-900 mb-5">Daftar <br /><span>System Information Booking Online Bus</span></h4>
                      </div>
                      <form action="login.php" method="POST">
                        <div class="col-lg-12 mb-3" hidden>
                          <label for="exampleInputEmail" class="form-label">Id</label>
                          <input type="text" class="form-control form-control-user2" id="exampleInputEmail" name="txt_id" placeholder="" />
                        </div>
                        <div class="row">
                          <div class="col-lg-6 mb-3">
                            <label for="exampleInputEmail" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-user2" id="exampleInputEmail" name="txt_nama" placeholder="Ex: Budi Santoso" />
                          </div>
                          <div class="col-lg-6 mb-3">
                            <label for="exampleInputPassword" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-user2" id="exampleInputPassword" name="txt_email" placeholder="Ex: budiman@siboss.com" />
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6 mb-3">
                            <label for="exampleInputEmail" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control form-control-user2" id="exampleInputEmail" name="txt_pass" placeholder="********" />
                          </div>
                          <div class="col-lg-6 mb-3">
                            <label for="exampleInputPassword" class="form-label">Konfirmasi Kata sandi</label>
                            <input type="password" class="form-control form-control-user2" id="exampleInputPassword" name="txt_pass" placeholder="********" />
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6 mb-3">
                            <label for="exampleInputEmail" class="form-label">Alamat</label>
                            <input type="text" class="form-control form-control-user2" id="exampleInputEmail" name="txt_alamat" placeholder="Ex: JL. Sudirman" />
                          </div>
                          <div class="col-lg-6 mb-3">
                            <label for="exampleInputPassword" class="form-label">Jenis Kelamin</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="Rbtnjk" id="exampleRadios1" value="option1" checked />
                              <label class="form-check-label2" for="exampleRadios1"> Laki-laki</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="Rbtnjk" id="exampleRadios2" value="option2" />
                              <label class="form-check-label2" for="exampleRadios2"> Perempuan </label>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6 mb-3">
                            <label for="exampleInputEmail" class="form-label">Nama Terminal</label>
                            <input type="text" class="form-control form-control-user2" id="exampleInputEmail" name="txt_terminal" placeholder="Ex: Terminal A" />
                          </div>
                          <div class="col-lg-6 mb-3">
                            <label for="exampleInputPassword" class="form-label">Alamat Terminal</label>
                            <input type="text" class="form-control form-control-user2" id="exampleInputPassword" name="txt_alamatterm" placeholder="JL. KH." />
                          </div>
                        </div>

                        <div class="col-lg-12 mb-3">
                          <label for="exampleInputEmail" class="form-label">Provinsi</label>
                          <select class="form-select" aria-label=".form-select-sm example">
                            <option disabled selected>Pilih Provinsi</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>

                        <div class="row">
                          <div class="col-lg-6 mb-3">
                            <label for="exampleInputEmail" class="form-label">Kota</label>
                            <select class="form-select" aria-label=".form-select-sm example">
                              <option disabled selected>Pilih kota</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>
                          </div>
                          <div class="col-lg-6 mb-2">
                            <label for="exampleInputPassword" class="form-label">Kecamatan</label>
                            <select class="form-select" aria-label=".form-select-sm example">
                              <option disabled selected>Pilih Kecamatan</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>
                          </div>
                        </div>

                        <div class="mb-5"></div>
                        <div class="col-12 d-flex justify-content-center">
                          <button type="submit" name="register" class="btn colorPrimary btn-login text-white btn-block2">Daftar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="d-block position-fixed markQuestion2">
                    <a href="#">
                      <button class="btn colorPrimary text-white custBtn rounded-circle">
                        <span class="txt_mark">?</span>
                      </button>
                    </a>
                  </div>
                  <footer class="d-flex justify-content-center text-center">
                    <p class="col-md-4 mb-0 text-muted">&copy; 2021 SI-BOSS, All Rights Reserved</p>
                  </footer>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
