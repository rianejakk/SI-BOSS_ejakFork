<?php
  require ('koneksi.php');

  session_start();

  if(isset($_COOKIE['cookie_email'])){
    $cookieEmail = $_COOKIE['cookie_email'];
    $cookiePass = $_COOKIE['cookie_password'];
    $cookieName = $_COOKIE['cookie_name'];

    $query = "SELECT * FROM administrator WHERE email = '$cookieEmail'";
      $result = mysqli_query($koneksi, $query);
      $num = mysqli_num_rows($result);

    while ($row = mysqli_fetch_array($result)) {
      $id_user_admin = $row['id_user_admin'];
      $nama = $row['nama'];
      $emailVal = $row['email'];
      $passwordVal = $row['password'];
      $level = $row['id_level'];
    }

    if ($emailVal == $cookieEmail && $passwordVal == $cookiePass) {
      $_SESSION['name'] = $cookieName;
      $_SESSION['email'] = $cookieEmail;
      $_SESSION['pass'] = $cookiePass;
    }

    if(isset($_SESSION['email'])){
      header('Location: dashboard.php');

    }
  }  

  if(isset ($_POST['submit'])){
    $nama = $_POST['txt_nama'];
    $jenis_kelamin = $_POST['Rbtn_jenis_kelamin'];
    $alamat = $_POST['txt_alamat'];
    $no_hp = $_POST['txt_no_hp'];
    // $foto = $_POST['txt_foto'];
    // $status = $_POST['txt_status'];
    // $id_terminal = $_POST['txt_id_terminal'];
    $email = $_POST['txt_email'];
    $password = $_POST['txt_password'];

    $query = "INSERT INTO administrator VALUES ('', '$nama', '$jenis_kelamin', '$alamat', '$no_hp', '', 2, '1', '$email', '$password')";
    $result = mysqli_query($koneksi, $query);
    header('Location: registrasi.php');
  }

  if(isset ($_POST['simpan'])){
    $nama_terminal = $_POST['txt_nama_terminal'];
    $alamat_terminal = $_POST['txt_detail_alamat_terminal'];
    $provinsi = $_POST['d_provinsi_terminal'];
    $kabupaten = $_POST['d_kabupaten_terminal'];
    $kecamatan = $_POST['d_kecamatan_terminal'];

    $query2 = "INSERT INTO terminal VALUES ('', '$nama_terminal', '$alamat_terminal', '$provinsi', '$kabupaten','$kecamatan')";
    $result = mysqli_query($koneksi, $query2);
    header('Location: registrasi.php');
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Daftar - SI BOSS</title>
    <link rel="stylesheet" href="plugin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="plugin/font/stylesheet.css" />
    <link rel="stylesheet" href="plugin/css/app.min.css" />
    <link rel="stylesheet" href="plugin/fontawesome-free/css/all.min.css" />
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
                  <div class="logoT">
                    <a href="#">
                      <img src="img/logo.png" alt="LogoSiboss" />
                    </a>
                  </div>
                  <div class="panelFormDaftar o-hidden border-0 shadow">
                    <div class="p-5">
                      <div class="judul">
                        <h4 class="text-gray-900 mb-5">Daftar <br /><span>System Information Booking Online Bus</span></h4>
                      </div>
                      <form class="custom-validation" action="registrasi.php" method="POST">
                        <div class="col-lg-12 mb-3" hidden>
                          <label for="InputId" class="form-label">Id</label>
                          <input type="text" class="form-control form-control-user2" id="InputId" name="txt_id" placeholder="" />
                        </div>
                        <div class="row">
                          <div class="col-lg-6 mb-3">
                            <label for="InputNama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-user2" id="InputNama" name="txt_nama" required data-parsley-required-message="Nama lengkap harus di isi !!!" placeholder="Ex: Budi Santoso" />
                          </div>
                          <div class="col-lg-6 mb-3">
                            <label for="InputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-user2" id="InputEmail" name="txt_email" required data-parsley-required-message="Email harus di isi !!!" placeholder="Ex: budiman@siboss.com" />
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6 mb-3">
                            <label for="InputPassword" class="form-label">Kata Sandi</label>
                            <input type="password" class="form-control form-control-user2" id="InputPassword" name="txt_password" required data-parsley-required-message="Kata sandi harus di isi !!!" placeholder="********" data-parsley-length="[8,16]" maxlength="16" data-parsley-uppercase="1" data-parsley-lowercase="1" data-parsley-number="1" />
                          </div>
                          <div class="col-lg-6 mb-3">
                            <label for="InputPassword2" class="form-label">Konfirmasi Kata sandi</label>
                            <input type="password" class="form-control form-control-user2" id="InputPassword2" name="txt_pass" required data-parsley-required-message="Masukan ulang kata sandi !!!" data-parsley-equalto="#InputPassword" placeholder="********" />
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6 mb-3">
                            <label for="InputNoHp" class="form-label">No Handphone</label>
                            <input type="text" class="form-control form-control-user2" id="InputNoHp" name="txt_no_hp" required data-parsley-required-message="No. HP harus di isi !!!" placeholder="Ex: 085808241204" />
                          </div>
                          <div class="col-lg-6 mb-3">
                            <label for="InputJenisKelamin" class="form-label">Jenis Kelamin</label>
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
                        <div class="row">
                          <div class="col-lg-6 mb-3">
                            <label for="InputAlamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control form-control-user2" id="InputAlamat" name="txt_alamat" required data-parsley-required-message="Alamat harus di isi !!!" placeholder="Ex: JL. Sudirman" />
                          </div>
                          <div class="col-lg-6 mb-3">
                            <label for="InputIdTerminal" class="form-label">Terminal Tersedia</label>
                            <select class="form-select form-select-user select-md" aria-label=".form-select-sm example" required data-parsley-required-message="Harap pilih data terminal !!!">
                              <option disabled selected>Pilih Terminal</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                            </select>
                            <a href="#" class="actionBtn" aria-label="Tambah">
                              <button class="btn colorPrimary text-white btn-user btn-circle btn-xs" aria-label="TambahModal" data-bs-toggle="modal" data-bs-target="#TambahDataTerminal" value="tambah"><i class="fa fa-plus" data-bs-toggle="tooltip" title="Tambah"></i></button>
                            </a>
                          </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="mb-5"></div>
                        <div class="col-12 d-flex justify-content-center mb-3">
                          <button type="submit" name="submit" class="btn colorPrimary btn-login text-white btn-block2">Daftar</button>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                          <a href="index.php" class="btn btn-daftar btn-block2 py-2">
                            <span>Login</span>
                          </a>
                        </div>
                        <div class="mb-3"></div>
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

    <!-- Modal -->
    <div id="TambahDataTerminal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content modal-edit">
          <form action="registrasi.php" method="POST">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data Terminal</h4>
              <button type="button" class="btn btn-danger btn-circle btn-user2 shadow" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                <i class="fa fa-times fa-sm"></i>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-lg-12 mb-3" hidden>
                <label for="InputId" class="form-label">Id</label>
                <input type="text" class="form-control form-control-user2" id="InputId" name="txt_id" placeholder="" />
              </div>
              <div class="row">
                <div class="col-12 mb-3">
                  <label for="InputNamaTerminal" class="form-label">Nama Terminal</label>
                  <input type="text" class="form-control form-control-user2" id="InputNamaTerminal" name="txt_nama_terminal" placeholder="Ex: Terminal A" />
                </div>
                <div class="col-12 mb-3">
                  <label for="InputAlamat" class="form-label">Alamat Terminal</label>
                  <textarea class="form-control form-control-user2" id="InputAlamat" name="txt_detail_alamat_terminal" placeholder="JL. KH."></textarea>
                </div>
                <div class="col-lg-12 mb-3">
                  <label for="InputPropinsi" class="form-label">Provinsi</label>
                  <select class="form-select" aria-label=".form-select-sm example" name="d_provinsi_terminal" id="propinsi">
                    <option disabled selected>Pilih Provinsi</option>
                  </select>
                </div>
                <div class="col-lg-6 mb-3">
                  <label for="InputKabupaten" class="form-label">Kota</label>
                  <select class="form-select" aria-label=".form-select-sm example" name="d_kabupaten_terminal" id="kabupaten">
                    <option disabled selected>Pilih kota</option>
                  </select>
                </div>
                <div class="col-lg-6 mb-3">
                  <label for="InputKecamatan" class="form-label">Kecamatan</label>
                  <select class="form-select" aria-label=".form-select-sm example" name="d_kecamatan_terminal" id="kecamatan">
                    <option disabled selected>Pilih Kecamatan</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-secondary roundedBtn" data-bs-dismiss="modal" value="Cancel" />
                <input type="submit" name="simpan" class="btn colorPrimary text-white roundedBtn" value="Simpan" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- JavaScript -->
    <script src="plugin/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="plugin/jquery-easing/jquery.easing.min.js"></script> -->
    <script src="jquery/jquery-3.6.0.min.js"></script>
    <script src="plugin/js/form-validation.init.js"></script>
    <script src="plugin/js/parsley.min.js"></script>
    <script src="plugin/js/javascript.js"></script>
        <script type = "text/javascript" >
          var return_first = function() {
              var tmp = null;
              $.ajax({
                  'async': false,
                  'type': "get",
                  'global': false,
                  'dataType': 'json',
                  'url': 'https://x.rajaapi.com/poe',
                  'success': function(data) {
                      tmp = data.token;
                  }
              });
              return tmp;
          }();
      $(document).ready(function() {
          $.ajax({
              url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/provinsi',
              type: 'GET',
              dataType: 'json',
              success: function(json) {
                  if (json.code == 200) {
                      for (i = 0; i < Object.keys(json.data).length; i++) {
                          $('#propinsi').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                      }
                  } else {
                      $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                  }
              }
          });
          $("#propinsi").change(function() {
              var propinsi = $("#propinsi").val();
              $.ajax({
                  url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kabupaten',
                  data: "idpropinsi=" + propinsi,
                  type: 'GET',
                  cache: false,
                  dataType: 'json',
                  success: function(json) {
                      $("#kabupaten").html('');
                      if (json.code == 200) {
                          for (i = 0; i < Object.keys(json.data).length; i++) {
                              $('#kabupaten').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                          }
                          $('#kecamatan').html($('<option>').text('-- Pilih Kecamatan --').attr('value', '-- Pilih Kecamatan --'));
                          $('#kelurahan').html($('<option>').text('-- Pilih Kelurahan --').attr('value', '-- Pilih Kelurahan --'));

                      } else {
                          $('#kabupaten').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                      }
                  }
              });
          });
          $("#kabupaten").change(function() {
              var kabupaten = $("#kabupaten").val();
              $.ajax({
                  url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kecamatan',
                  data: "idkabupaten=" + kabupaten + "&idpropinsi=" + propinsi,
                  type: 'GET',
                  cache: false,
                  dataType: 'json',
                  success: function(json) {
                      $("#kecamatan").html('');
                      if (json.code == 200) {
                          for (i = 0; i < Object.keys(json.data).length; i++) {
                              $('#kecamatan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                          }
                          $('#kelurahan').html($('<option>').text('-- Pilih Kelurahan --').attr('value', '-- Pilih Kelurahan --'));
                          
                      } else {
                          $('#kecamatan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                      }
                  }
              });
          });
          $("#kecamatan").change(function() {
              var kecamatan = $("#kecamatan").val();
              $.ajax({
                  url: 'https://x.rajaapi.com/MeP7c5ne' + window.return_first + '/m/wilayah/kelurahan',
                  data: "idkabupaten=" + kabupaten + "&idpropinsi=" + propinsi + "&idkecamatan=" + kecamatan,
                  type: 'GET',
                  dataType: 'json',
                  cache: false,
                  success: function(json) {
                      $("#kelurahan").html('');
                      if (json.code == 200) {
                          for (i = 0; i < Object.keys(json.data).length; i++) {
                              $('#kelurahan').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id));
                          }
                      } else {
                          $('#kelurahan').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'));
                      }
                  }
              });
          });
      });
    </script>
    <script>
      window.Parsley.addValidator("uppercase", {
        requirementType: "number",
        validateString: function (value, requirement) {
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
        validateString: function (value, requirement) {
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
        validateString: function (value, requirement) {
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
        validateString: function (value, requirement) {
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
