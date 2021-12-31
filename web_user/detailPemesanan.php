<?php
require('koneksi.php');
require('query.php');
$obj = new crud;

session_start();


if (!isset($_SESSION['email'])) {
  header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nik_user = $_POST["txt_nik_user"];
  $id_bus = $_POST["txt_id_bus"];
  $waktu_pemesanan = $_POST['txt_waktu_pemesanan'];

  if ($obj->insertPemesana($nik_user, $id_bus, $waktu_pemesanan)) {
    // echo '<div class="alert alert-success">Terminal Berhasil Ditambahkan</div>';
    // header("Location: detailPemesanan.php");
  } else {
    echo '<div class="alert alert-danger">Terminal Gagal Ditambahkan</div>';
    // header("Location: detailPemesanan.php");
  }
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
$sesLvl = $_SESSION['level'];
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
  </header>

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
              <form role="form" action="pesan.php" method="POST" enctype="multipart/form-data">

                <div class="col-12">
                  <!-- Content Data -->
                  <?php
                  $id = $_POST["txt_id_bus"];
                  $data = $obj->detailPemesananBus($id);
                  $no = 1;
                  if ($data->rowCount() > 0) {
                    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                      $idBus = $row['id_bus'];
                      $namaBus = $row['nama_bus'];
                      $harga = $row['harga'];
                      $status = $row['status_bus'];
                      $JKursi = $row['jumlah_kursi'];
                      $fotoBus = $row['foto_bus'];
                      $jenis_bus = $row['jenis'];
                      $fasilitas = $row['fasilitas'];
                      $tgl_brngkt = $row['tanggal_pemberangkatan'];
                      $pemberangkatan = $row['pemberangkatan'];
                      $waktu_berangkat = $row['waktu_berangkat'];
                      $tujuan = $row['tujuan'];
                      $waktu_tiba = $row['waktu_tiba'];
                  ?>
                      <div class="panel-data bg-white py-2 myRounded shadow mod mb-2 d-flex">
                        <div class="container">
                          <div class="row myrowData h-100">
                            <div class="col-6 pt-2">
                              <div class="form-group" hidden>
                                <label for="InputId" class="form-label">Id</label>
                                <input type="text" class="form-control form-control-user2" id="inputId" name="txt_id_bus" value="<?php echo $idBus ?>" placeholder="" readonly />
                              </div>
                              <h3 class="m-0" name="txt_nama_bus"><b><?php echo ucwords($namaBus) ?></b></h3>
                              <p class="m-0" name="txt_jenis_bus"><?php echo ucwords($jenis_bus) ?></p>
                            </div>
                            <div class="col-6 pt-2">
                              <h3 class="m-0 d-flex justify-content-end font-RobotoBold s22 colorPrimaryText" name="txt_harga_bus">
                                <?php echo rupiah($harga) ?>
                                <span class="font-Roboto s14 align-self-center colorBlueDarkText">/Kursi</span>
                              </h3>
                              <p class="m-0 d-flex justify-content-end font-RobotoBold s14" name="txt_jumlah_kursi_bus">
                                <?php echo $JKursi ?> Kursi</p>
                            </div>
                            <div class="col-2 py-2">
                              <img src="../Web Admin/fotoBus/<?php echo $fotoBus; ?>" class='img-fluid'>
                            </div>
                            <div class="col-10 py-2">
                              <div class="row">
                                <div class="col-3">
                                  <p class="m-0"><span class="Waktu" name="txt_waktu_berangkat_bus"><?php echo date("H:i", strtotime($waktu_berangkat)) ?></span>
                                  </p>
                                  <p class="m-0" name="txt_pemberangkatan_bus"><?php echo ucwords($pemberangkatan) ?></p>
                                  <span class="badge bg-warning text-dark" name="txt_tanggal_berangkat_bus"><?php echo date("d-m-Y", strtotime($tgl_brngkt)) ?></span>
                                </div>
                                <div class="col-1 d-flex justify-content-center align-items-center">
                                  <i class="fas fa-arrow-right"></i>
                                </div>
                                <div class="col-3">
                                  <p class="m-0"><span class="Waktu" name="txt_waktu_tiba_bus"><?php echo date("H:i", strtotime($waktu_tiba)) ?></span></p>
                                  <p class="m-0" name="txt_tujuan_bus"><?php echo ucwords($tujuan) ?></p>
                                </div>
                                <div class="col-2 border border-start border-bottom-0 border-top-0 border-end-0">
                                  <p class="font-Roboto s12 m-0">Estimasi</p>
                                  <p class="font-RobotoBold s18">7 jam</p>
                                </div>
                                <div class="col-3 border border-start border-bottom-0 border-top-0 border-end-0 d-flex justify-content-start align-items-center">
                                  <!-- <a href="detailPemesanan.php">
                              <button type="submit" name="submit"
                                class="btn colorYellow roundedBtn text-white font-RobotoBold btnPesan"
                                value="<?php echo $idBus ?>">Pesan</button>
                            </a> -->
                                </div>
                              </div>
                              <div class="row mt-2 info">
                                <div class="col-4 text-end">
                                  <button class="colorPrimaryText btn s14" id="shadow1" data-bs-toggle="collapse" data-bs-target="#detailBus<?php echo $idBus ?>" aria-expanded="false" aria-controls="detailBus">Detail Bus</button>
                                </div>
                                <div class="col-4 text-center">
                                  <button class="colorPrimaryText btn s14" id="shadow2" data-bs-toggle="collapse" data-bs-target="#detailRute<?php echo $idBus ?>" aria-expanded="false" aria-controls="detailRute">Detail Rute</button>
                                </div>
                                <div class="col-4 text-start">
                                  <button class="colorPrimaryText btn s14" id="shadow3" data-bs-toggle="collapse" data-bs-target="#ulasan<?php echo $idBus ?>" aria-expanded="false" aria-controls="ulasan">Ulasan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div id="detailBus<?php echo $idBus ?>" class="collapse">
                        <div class="panel-data2 bg-white py-2 myRounded transitionShadow mb-1">
                          <div class="container">
                            <p class="pt-3 font-RobotoBold mb-2">Jenis Bus : <span class="font-Roboto"><?php echo $jenis_bus ?></span></p>
                            <p class="font-RobotoBold mb-2">Kapasitas Kursi : <span class="font-Roboto"><?php echo $JKursi ?>
                                Kursi</span></p>
                            <p class="font-RobotoBold mb-2">
                              Fasilitas bus : <span class="font-Roboto"><?php echo $fasilitas ?></span>
                            </p>
                          </div>
                        </div>
                      </div>

                      <div id="detailRute<?php echo $idBus ?>" class="collapse">
                        <div class="panel-data2 bg-white py-2 myRounded transitionShadow mb-1 shadow-none">
                          <div class="container">
                            <p class="alert alert-danger m-0"><?php echo $pemberangkatan, " - ", $tujuan; ?></p>
                          </div>
                        </div>
                      </div>

                      <div id="ulasan<?php echo $idBus ?>" class="collapse">
                        <div class="panel-data2 bg-white py-2 myRounded transitionShadow mb-1 shadow-none">
                          <div class="container">
                            <p class="alert alert-danger m-0">Ulasan Belum Tersedia !</p>
                          </div>
                        </div>
                      </div>
                  <?php
                      $no;
                    }
                  }
                  ?>

                  <div class="row">
                    <div class="col-lg-2 mb-3">
                      <label for="IDPemesanan" class="form-label">Kursi Pesan</label>
                      <input type="text" class="form-control form-control-user2" id="IDPemesanan" name="txt_jumlah_kursi_pesan" placeholder="" value="1" readonly />
                    </div>

                    <div class="col-lg-2 mb-3">
                      <label for="IDPemesanan" class="form-label">Total Bayar</label>
                      <input type="text" class="form-control form-control-user2" id="IDPemesanan" name="txt_total_bayar" placeholder="" value="<?php echo $harga ?>" readonly />
                    </div>

                    <div class="col-lg-2 mb-3" hidden>
                      <label for="IDPemesanan" class="form-label">Status</label>
                      <input type="text" class="form-control form-control-user2" id="IDPemesanan" name="txt_status" value="<?php $statu = "Belum Bayar";
                                                                                                                            echo $statu ?>" placeholder="" readonly />
                    </div>
                  </div>

                  <div class="card cardUser myRounded shadow mod mb-3">
                    <div class="card-header">
                      <p class="m-0 s16"><b>Data Pemesan</b></p>
                    </div>
                    <div class="card-body">
                      <?php $data = $obj->lihatPemesana();
                      while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                        $id = $row['id_pemesanan']; ?>
                        <div class="col-md-12">
                                  <div class="myRounded border shadow mod p-3 mb-2" style="min-height: 30px;">
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <p>NIK</p>
                                      </div>
                                      <div class="col-sm-7">
                                        <p>: <?php echo $sesID ?></p>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <p>Nama</p>
                                      </div>
                                      <div class="col-sm-7">
                                        <p>: <?php echo $sesName ?></p>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <p>Jenis Kelamin</p>
                                      </div>
                                      <div class="col-sm-7">
                                        <p>: <?php echo $sesJK ?></p>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <p class="m-0">Nomor HP</p>
                                      </div>
                                      <div class="col-sm-7">
                                        <p class="m-0">: <?php echo $sesNoHP ?></p>
                                      </div>
                                    </div>
                                  </div>
                                  <hr>
                                </div>
                        <div class="row">
                          <div class="col-lg-12 mb-3" hidden>
                            <label for="IDPemesanan" class="form-label">Id Pemesanan</label>
                            <input type="text" class="form-control form-control-user2" id="IDPemesanan" name="txt_id_pemesanan" placeholder="" value="<?php echo $id; ?>" readonly />
                          </div>
                          <!-- <div class="col-lg-6 mb-3">
                            <label for="exampleInputEmail" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-user2" id="exampleInputEmail" name="txt_nama" placeholder="Ex: Budi Santoso" value="<?php echo $sesName; ?>" readonly />
                          </div>
                          <div class="col-lg-6 mb-3">
                            <label for="Input NIK" class="form-label">NIK</label>
                            <input type="text" class="form-control form-control-user2" id="InputNIK" name="txt_nik" placeholder="35678891638191" value="<?php echo $sesID; ?>" readonly />
                          </div>
                          <div class="col-lg-6 mb-3">
                            <label for="InputNoHP" class="form-label">No. HP</label>
                            <input type="text" class="form-control form-control-user2" id="InputNoHP" name="txt_nohp" placeholder="08872861622" value="<?php echo $sesNoHP; ?>" readonly />
                          </div>
                          <div class="col-lg-6 mb-3">
                            <label for="InputNoHP" class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control form-control-user2" id="InputNoHP" name="txt_nohp" placeholder="08872861622" value="<?php echo $sesJK; ?>" readonly />
                          </div> -->
                        </div>
                    </div>
                  <?php
                      }; ?>
                  </div>

                  <!-- bawah e -->
                  <!-- <div class="repeater p-0" enctype="multipart/form-data">
                    <div data-repeater-list="group-a">
                      <div data-repeater-item class="row p-0 d-flex justify-content-center"> -->
                  <div class="card cardUser p-0 myRounded shadow mod mb-3" style="width: 98%;">
                    <div class="card-header">
                      <p class="m-0 s16"><b>Data Penumpang</b></p>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-12 mb-3" hidden>
                          <label for="IDPemesanan" class="form-label">Id Pemesanan</label>
                          <input type="text" class="form-control form-control-user2" id="IDPemesanan" name="txt_id" placeholder="" readonly />
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label for="exampleInputEmail" class="form-label">Nama Lengkap</label>
                          <input type="text" class="form-control form-control-user2" id="exampleInputEmail" name="txt_nama_penumpang" placeholder="Ex: Budi Santoso" />
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label for="Input NIK" class="form-label">NIK</label>
                          <input type="number" class="form-control form-control-user2" id="InputNIK" name="txt_nik_penumpang" placeholder="35678891638191" />
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label for="InputNoHP" class="form-label">No. HP</label>
                          <input type="number" class="form-control form-control-user2" id="InputNoHP" name="txt_no_hp_penumpang" placeholder="08872861622" />
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label for="exampleInputPassword" class="form-label">Jenis Kelamin</label>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="txt_jenis_kelamin_penumpang" id="exampleRadios1" value="Laki - Laki" checked />
                            <label class="form-check-label2" for="exampleRadios1"> Laki-laki</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="txt_jenis_kelamin_penumpang" id="exampleRadios2" value="Perempuan" />
                            <label class="form-check-label2" for="exampleRadios2"> Perempuan </label>
                          </div>
                        </div>
                      </div>
                      <input data-repeater-create type="button" class="btn btn-success mt-3 mt-lg-0" value="Add" />
                      <input data-repeater-delete type="button" class="btn btn-primary" value="Delete" />
                    </div>
                  </div>
                  <!-- </div>
                    </div>
                  </div> -->
                </div>
                <div class="col-12 d-flex justify-content-center mb-5">
                  <button type="submit" name="simpan" class="btn colorPrimary text-white py-2 s14 rounded-pill resize">Pesan</button>
                </div>
              </form>
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
</body>

</html>