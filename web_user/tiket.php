<?php
require('koneksi.php');
require('query.php');
$obj = new crud;

session_start();

if (!isset($_SESSION['email'])) {
  header('Location: login.php');
}

$sesID = $_SESSION['id'];
$sesName = $_SESSION['name'];
$sesTempat = $_SESSION['tempat'];
$sesTanggal = $_SESSION['tanggal'];
$sesJK = $_SESSION['jk'];
$sesAlamat = $_SESSION['alamat'];
$sesNoHP = $_SESSION['noHP'];
$sesEmail = $_SESSION['email'];
$sesPass = $_SESSION['pass'];
$sesFoto = $_SESSION['foto'];

function rupiah($angka)
{
  $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
  return $hasil_rupiah;
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
</head>

<body class="bg-light">
  <div id="particles-js"></div>
  <!-- <header>
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
          <?php if (!isset($_SESSION['level'])) : ?>
            <div class="ms-auto myClass">
              <a href="login.php" class="text-decoration-none">
                <button class="btn b-cust me-2 roundedBtn text-white" id="custBtnLogin">Masuk</button>
              </a>
              <a href="daftar.php" class="text-decoration-none">
                <button class="btn roundedBtn b-cust" id="custBtnDaftar">Daftar</button>
              </a>
            </div>
          <?php elseif ($_SESSION['level'] == "0") : ?>
            <div class="ms-auto myClass">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="ropdownProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="avatar rounded-circle me-2" src="../Web Admin/fotoUser/<?php echo $sesFoto; ?>" alt="foto">
                    <span><?php echo $sesName; ?></span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end myRounded" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item s14" href="#" data-bs-toggle="modal" data-bs-target="#editDataAdministrator<?php echo $sesID ?>">
                        <i class="fas fa-user-edit me-2"></i>
                        <span>Edit Profil</span>
                      </a></li>
                    <li><a class="dropdown-item s14" href="#">
                        <i class="fas fa-receipt me-3"></i>
                        <span>Pesanan saya</span>
                      </a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item s14" href="logout.php">
                        <i class="fas fa-sign-out-alt me-3"></i>
                        <span>Logout</span>
                      </a></li>
                  </ul>
                </li>
              </ul>
            </div>
          <?php endif ?>
        </div>
      </div>
    </nav>
  </header> -->

  <!-- Profile Modal -->
  <div id="editDataAdministrator<?php echo $sesID ?>" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content modal-edit">
        <!-- <form role="form" action="editAdministrator.php" method="POST" enctype="multipart/form-data"> -->
        <?php
        $query = $obj->pilihUser($sesID);
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        ?>
          <div class="modal-header">
            <h4 class="modal-title">Profile</h4>
            <button type="button" class="btn btn-danger btn-circle btn-user2 shadow" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
              <i class="fa fa-times fa-sm"></i>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6 mb-3">
                <label for="inputId" class="form-label">NIK</label>
                <input type="text" class="form-control form-control-user2" id="inputId" name="txt_id_user_admin" value="<?php echo $sesID ?>" placeholder="" readonly />
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <!-- <form action="editAdministrator.php" method="POST" enctype="multipart/form-data"> -->
                <div class="form-group">
                  <label for="InputFotoBus" class="form-label">Foto</label>
                  <div class="img-div">
                    <div class="img-placeholder" onClick="triggerClick()">
                      <img src="img/ico/icons8_driver_50px.png" alt="" />
                    </div>
                    <img class="img-profile rounded-circle" src="../Web Admin/fotoAdmin/<?php echo $sesFoto; ?>" onClick="triggerClick()" id="profileDisplay" />
                    <!-- <img src="img/ico/icons8_driver_50px.png" onClick="triggerClick()" id="profileDisplay" /> -->
                  </div>
                  <input type="file" name="txt_fotoEa" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" />
                  <a href="#" class="float-end view text-secondary"> Lihat Foto </a>
                </div>
              </div>
              <!-- </form> -->
              <div class="col-lg-6 mb-3">
                <label for="inputNama" class="form-label">Nama</label>
                <input type="text" class="form-control form-control-user2" id="inputNama" name="txt_nama" placeholder="Ex: Budi Santoso" required data-parsley-required-message="Data harus di isi !!!" value="<?php echo $sesName ?>" />
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
                <label for="inputAlamat" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control form-control-user2" id="inputAlamat" name="txt_alamat" placeholder="Ex: Jl. Dharmawangsa" required data-parsley-required-message="Data harus di isi !!!" value="<?php echo $sesTempat ?>" />
              </div>
              <div class="col-lg-6 mb-3">
                <label for="inputNoHp" class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control form-control-user2" id="inputNoHp" name="txt_no_hp" placeholder="Ex: 085808241205" required data-parsley-required-message="Data harus di isi !!!" value="<?php echo $sesTanggal ?>" />
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 mb-3">
                <label for="inputAlamat" class="form-label">Alamat</label>
                <input type="text" class="form-control form-control-user2" id="inputAlamat" name="txt_alamat" placeholder="Ex: Jl. Dharmawangsa" required data-parsley-required-message="Data harus di isi !!!" value="<?php echo $sesAlamat ?>" />
              </div>
              <div class="col-lg-6 mb-3">
                <label for="inputNoHp" class="form-label">No Handphone</label>
                <input type="number" class="form-control form-control-user2" id="inputNoHp" name="txt_no_hp" placeholder="Ex: 085808241205" required data-parsley-required-message="Data harus di isi !!!" value="<?php echo $sesNoHP ?>" />
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control form-control-user2" id="inputEmail" name="txt_email" placeholder="Ex: admin@gmail.com" required data-parsley-required-message="Data harus di isi !!!" value="<?php echo $sesEmail ?>" />
              </div>
              <div class="col-lg-6 mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control form-control-user2" id="inputPassword" name="txt_password" placeholder="Ex: ********" required data-parsley-required-message="Data harus di isi !!!" value="<?php echo $sesPass ?>" />
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 mb-3" hidden>
                <label for="inputId" class="form-label">Status</label>
                <input type="text" class="form-control form-control-user2" id="inputId" name="txt_id_level" value="<?php echo $sesLvl ?>" placeholder="" readonly />
              </div>
              <div class="col-lg-6 mb-3" hidden>
                <label for="inputId" class="form-label">Status</label>
                <input type="text" class="form-control form-control-user2" id="inputId" name="txt" value="User" placeholder="" readonly />
              </div>
            </div>

            <div class="modal-footer">
              <button class="btn btn-secondary roundedBtn" type="button" data-bs-dismiss="modal">Batal</button>
              <!-- <button type="submit" class="btn text-white colorPrimary roundedBtn" name="simpan">Update</button> -->
            </div>
          </div>
          <!-- </form> -->
        <?php
        }
        ?>
      </div>
    </div>
  </div>

  <main>
    <section class="mycontent2 py-4">
      <div class="container position-relative">
        <div class="row">
          <div class="col-12 custom-panel">
            <div class="row">
              <div class="col-12">
                <div class="card cardUser myRounded shadow mod mb-3">
                  <div class="card-header">
                    <img src="assets/img/logo.png" alt="Logo" />
                  </div>
                  <div class="card-body">
                    <?php
                    $id = $_POST['txt_id_pemesanan'];
                    $data = $obj->cetakTiket($id);
                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                      $tiket = $row['id_tiket'];
                      $nama_penumpang = $row['nama_penumpang'];
                      $no_hp_penumpang = $row['no_hp_penumpang'];
                      $jk_penumpang = $row['jenis_kelamin_penumpang'];
                      $tanggal = $row['tanggal_pemberangkatan'];
                      $nama_bus = $row['nama_bus'];
                      $total = $row['total_bayar'];
                      $pemberangkatan = $row['pemberangkatan'];
                      $tujuan = $row['tujuan'];
                      $waktu_berangkat = $row['waktu_berangkat'];
                      $waktu_tiba = $row['waktu_tiba'];
                    ?>
                      <div class="row ps-2">
                        <div class="col-md-6 mb-4">
                          <p class="m-0 s14"><b>Data Pemesan</b></p>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="myRounded border shadow mod p-3 mb-2" style="min-height: 30px;">
                          <div class="row">
                            <div class="col-sm-3">
                              <p>Nomor Tiket</p>
                            </div>
                            <div class="col-sm-7">
                              <p>: APBTRMLRT000<?php echo $tiket ?></p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-3">
                              <p>Nama Penumpang</p>
                            </div>
                            <div class="col-sm-7">
                              <p>: <?php echo $nama_penumpang ?></p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-3">
                              <p>Jenis Kelamin</p>
                            </div>
                            <div class="col-sm-7">
                              <p>: <?php echo $jk_penumpang ?></p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-3">
                              <p>Nomor HP</p>
                            </div>
                            <div class="col-sm-7">
                              <p>: <?php echo $no_hp_penumpang ?></p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-3">
                              <p>Nama Bus</p>
                            </div>
                            <div class="col-sm-7">
                              <p>: <?php echo $nama_bus ?></p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-3">
                              <p>Tanggal Pemberangkatan</p>
                            </div>
                            <div class="col-sm-7">
                              <p>: <?php echo $tanggal ?></p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-3">
                              <p>Total Bayar</p>
                            </div>
                            <div class="col-sm-7">
                              <p>: <?php echo $total ?></p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-3">
                              <p>Pemberangkatan</p>
                            </div>
                            <div class="col-sm-7">
                              <p>: <?php echo $pemberangkatan ?></p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-3">
                              <p>Tujuan</p>
                            </div>
                            <div class="col-sm-7">
                              <p>: <?php echo $tujuan ?></p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-3">
                              <p>Waktu Berangkat</p>
                            </div>
                            <div class="col-sm-7">
                              <p>: <?php echo $waktu_berangkat ?></p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-3">
                              <p>WAktu Tiba</p>
                            </div>
                            <div class="col-sm-7">
                              <p>: <?php echo $waktu_tiba ?></p>
                            </div>
                          </div>
                        </div>
                        <hr>
                      </div>
                      <div class="col-12 d-flex justify-content-center mb-3">
                        <a href="index.php" class="actionBtn" aria-label="Delete">
                          <button class="btn btn-danger btn-user btn-circle py-2 s14 rounded-pill resize">Batal</button>
                        </a>
                      </div>
                  </div>
                <?php
                    }; ?>
                </div>
              </div>
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
    $(document).ready(function() {
      $('#mauexport').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
    });
  </script>
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
    $(".pay").change(function() {
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