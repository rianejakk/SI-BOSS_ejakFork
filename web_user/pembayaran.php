<?php
require('koneksi.php');
require('query.php');
$obj = new crud;

session_start();


if (!isset($_SESSION['email'])) {
  header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nik_penumpang = $_POST['txt_nik_penumpang'];
  $nama_penumpang = $_POST['txt_nama_penumpang'];
  $jenis_kelamin_penumpang = $_POST['txt_jenis_kelamin_penumpang'];
  $no_hp_penumpang = $_POST['txt_no_hp_penumpang'];
  $id_pemesanan = $_POST['txt_id_pemesanan'];
  $jumlah_kursi_pesan = $_POST['txt_jumlah_kursi_pesan'];
  $total_bayar = $_POST['txt_total_bayar'];
  $status = $_POST['txt_status'];
  // $id_bus = $_POST['txt_id_bus'];
  if ($obj->insertPenumpang($nik_penumpang, $nama_penumpang, $jenis_kelamin_penumpang, $no_hp_penumpang)) {
    if (!$obj->detailPemesanan($id_pemesanan)) die("Error: Id tidak ada");
    if ($obj->updatePemesanan($jumlah_kursi_pesan, $total_bayar, $status, $id_pemesanan)) {
      $id = $id_pemesanan;
      $nik = $nik_penumpang;
      if ($obj->insertTiket($id_pemesanan, $nik_penumpang)) {
        // echo '<div class="alert alert-success">Terminal Berhasil Ditambahkan</div>';
        // header("Location: transaksi.php");
        // echo '<div class="alert alert-success">Berhasil</div>';
      }
    }
  } else {
    // echo '<div class="alert alert-danger">Terminal Gagal Ditambahkan</div>';
    // header("Location: transaksi.php");
    // echo $nik_penumpang;
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
              <div class="col-12">
                <div class="card cardUser myRounded shadow mod mb-3">
                  <div class="card-header">
                    <p class="m-0 s16 p-2"><b>Transaksi</b></p>
                  </div>
                  <div class="card-body">
                    <?php $id = $_POST["txt_id_pemesanan"];
                    $data = $obj->pemesananB($id);
                    $no = 1;
                    if ($data->rowCount() > 0) {
                      while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                        $idPemesanan = $row['id_pemesanan']; ?>
                        <form action="cetakTiket.php" method="POST">
                          <div class="row ps-2">
                            <div class="col-md-6 mb-3" hidden>
                              <label for="IDPemesanan" class="form-label">ID Pemesanan</label>
                              <input type="text" class="form-control form-control-user2" id="IDPemesanan" name="txt_id_pemesanan" value="P000<?php echo $idPemesanan ?>" placeholder="" readonly />
                            </div>
                          </div>
                          <div class="row ps-2">
                            <div class="col-md-6 mb-4">
                              <p class="m-0 s14"><b>Data Pemesan</b></p>
                            </div>
                          </div>
                          <div class="col-md-6">
                                  <div class="myRounded border shadow mod p-3 mb-2" style="min-height: 30px;">
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <p>ID Pemesanan</p>
                                      </div>
                                      <div class="col-sm-7">
                                        <p>: P000<?php echo $idPemesanan ?></p>
                                      </div>
                                    </div><div class="row">
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

                          <!-- <div class="row ps-2">
                            <div class="col-md-6 mb-4">
                              <p class="m-0 s14"><b>Data Penumpang</b></p>
                            </div>
                          </div>
                          <div class="row ps-2">
                            <?php $id = $_POST["txt_nik_penumpang"];
                            $data = $obj->penumpang($id);
                            $no = 1;
                            if ($data->rowCount() > 0) {
                              while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                                $nik_penumpang = $row['nik_penumpang'];
                                $nama_penumpang = $row['nama_penumpang'];
                                $no_hp_penumpang = $row['no_hp_penumpang'];
                                $jk_penumpang = $row['jenis_kelamin_penumpang']; ?>
                                <div class="col-md-6">
                                  <div class="myRounded border shadow mod p-3 mb-2" style="min-height: 30px;">
                                  <div class="col-md-6 mb-3" hidden>
                              <label for="IDPemesanan" class="form-label">ID Pemesanan</label>
                              <input type="text" class="form-control form-control-user2" id="IDPemesanan" name="txt_nik_penumpang" value="<?php echo $nik_penumpang ?>" placeholder="" readonly />
                            </div><div class="row">
                                      <div class="col-sm-3">
                                        <p>NIK</p>
                                      </div>
                                      <div class="col-sm-7">
                                        <p>: <?php echo $nik_penumpang ?></p>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <p>Nama</p>
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
                                        <p class="m-0">Nomor HP</p>
                                      </div>
                                      <div class="col-sm-7">
                                        <p class="m-0">: <?php echo $no_hp_penumpang ?></p>
                                      </div>
                                    </div>
                                  </div>
                                  <hr>
                                </div>
                            <?php
                                $no;
                              }
                            }; ?>
                          </div> -->

                          <div class="row ps-2">
                            <div class="col-md-6 mb-4">
                              <p class="m-0 s14"><b>Pembayaran</b></p>
                            </div>
                          </div>
                          <form action="cetakTiket.php" method="POST">
                            <?php $id = $_POST["txt_id_pemesanan"];
                            $data = $obj->pemesananB($id);
                            $no = 1;
                            if ($data->rowCount() > 0) {
                              while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                                $idPemesanan = $row['id_pemesanan'];
                                $total = $row['total_bayar']; ?>
                                <div class="row ps-2">
                                  <div class="col-lg-6 mb-3" hidden>
                                    <label for="inputAlamat" class="form-label">ID</label>
                                    <input type="text" class="form-control form-control-user2" id="inputAlamat" name="txt_id_pemesanan" placeholder="Ex: Jl. Dharmawangsa" value="<?php echo $id_pemesanan ?>" readonly />
                                  </div>
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputAlamat" class="form-label">Waktu Pembayaran</label>
                                    <input type="datetime" class="form-control form-control-user2" id="inputId" name="txt_waktu_pembayaran" value="<?php $tz = 'Asia/Jakarta';
                                                                                                                                                    $dt = new DateTime("now", new DateTimeZone($tz));
                                                                                                                                                    $timestamp = $dt->format('Y-m-d H:i:s');
                                                                                                                                                    echo $timestamp; ?>" placeholder="" readonly />
                                  </div>
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputAlamat" class="form-label">Total Bayar</label>
                                    <input type="text" class="form-control form-control-user2" id="inputAlamat" name="txt_bayar" placeholder="Ex: Jl. Dharmawangsa" value="<?php echo $total ?>" readonly />
                                  </div>
                                </div>
                                <div class="row ps-2">
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputAlamat" class="form-label">Nama Pengirim</label>
                                    <input type="text" class="form-control form-control-user2" id="inputAlamat" name="txt_nama_pengirim" placeholder="Ex: Jl. Dharmawangsa" required data-parsley-required-message="Data harus di isi !!!" />
                                  </div>
                                  <div class="col-md-6 mb-3">
                                    <label for="MethodPay" class="form-label">Metode Pembayaran</label>
                                    <select class="form-select form-select-user select-md pay" aria-label=".form-select-sm example" required data-parsley-required-message="Harap pilih data terminal !!!" name="txt_nama_bank" id="pay">
                                      <option disabled selected>Pilih BANK</option>
                                      <option value="BRI briva">Bank BRI (BRIVA)</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="row ps-2 hidden" id="noBriva">
                                  <div class="col-md-6 mb-3">
                                    <label for="NoBriva" class="form-label">No. Briva</label>
                                    <input type="text" class="form-control form-control-user2" id="NoBriva" name="txt_no_rekening" placeholder="" readonly value="86531616235361" />
                                  </div>
                                </div>
                                <!-- <div class="row ps-2">
                                  <div class="col-md-6">
                                    <label for="UploadBukti" class="form-label ">Upload Bukti Pembayaran</label>
                                    <div class="input-group mb-3" name="txt_bukti_pembayaran">
                                      <input type="file" class="form-control form-select-user select-md" id="UploadBukti" name="txt_bukti_pembayaran">
                                    </div>
                                  </div>
                                </div> -->
                                <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <div id="msg"></div>
                        <input type="file" name="gambar" class="file" >
                            <div class="input-group my-3">
                                <input type="text" class="form-control" disabled placeholder="Upload Gambar" id="file">
                                <div class="input-group-append">
                                        <button type="button" id="pilih_gambar" class="browse btn btn-dark">Pilih Gambar</button>
                                </div>
                            </div>
                        <img src="gambar/80x80.png" id="preview" class="img-thumbnail">
                    </div>
                </div>
            </div>
                                <div class="col-12 d-flex justify-content-center mb-5">
                                  <button type="submit" name="submit" class="btn colorPrimary text-white py-2 s14 rounded-pill resize">Konfirmasi</button>
                                </div>
                            <?php
                              }
                            }; ?>
                          </form>
                  </div>
              <?php
                        $no;
                      }
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
      if (responseID == "BRI briva") {
        $("#noBriva").removeClass("hidden");
        $("#noBriva").addClass("show");
      } else {
        $("#noBriva").removeClass("show");
        $("#noBriva").addClass("hidden");
      }
      console.log(responseID);
    });
  </script>
  <script>

function konfirmasi(){
    konfirmasi=confirm("Apakah anda yakin ingin menghapus gambar ini?")
    document.writeln(konfirmasi)
}

$(document).on("click", "#pilih_gambar", function() {
var file = $(this).parents().find(".file");
file.trigger("click");
});

$('input[type="file"]').change(function(e) {
var fileName = e.target.files[0].name;
$("#file").val(fileName);

var reader = new FileReader();
reader.onload = function(e) {
    // get loaded data and render thumbnail.
    document.getElementById("preview").src = e.target.result;
};
// read the image file as a data URL.
reader.readAsDataURL(this.files[0]);
});
</script>
</body>

</html>