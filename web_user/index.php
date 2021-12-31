<?php
require('koneksi.php');
require('query.php');
$obj = new crud;


session_start();

if (isset($_SESSION['email'])) {
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
          <ul class="navbar-nav ms-auto menu">
            <li class="nav-item ms-3 me-2">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item ms-3 me-2">
              <a class="nav-link" href="#booking">Booking</a>
            </li>
            <li class="nav-item ms-3 me-2">
              <a class="nav-link" href="#help">Help</a>
            </li>
            <li class="nav-item ms-3 me-2">
              <a class="nav-link" href="#about">About</a>
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
                  <span class="text-white" id="namaProfil"><?php echo $sesName; ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end myRounded" aria-labelledby="navbarDarkDropdownMenuLink">
                  <li><a class="dropdown-item s14" href="#" data-bs-toggle="modal" data-bs-target="#editDataAdministrator<?php echo $sesID ?>">
                    <i class="fas fa-user-edit me-2"></i>
                    <span>Edit Profil</span>
                  </a></li>
                  <li><a class="dropdown-item s14" href="pembayaran.php" data-bs-toggle="modal" data-bs-target="#pesananSaya<?php echo $sesID ?>">
                    <i class="fas fa-receipt me-3"></i>
                    <span>Pesanan saya</span>
                  </a></li>
                  <li><hr class="dropdown-divider"></li>
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
        <form role="form" action="editAdministrator.php" method="POST" enctype="multipart/form-data">
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
        </form>
      <?php
          }
      ?>
      </div>
    </div>
  </div>

  <!-- Profile Modal -->
  <div id="pesananSaya<?php echo $sesID ?>" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content modal-edit">
          
            <div class="modal-header">
              <h4 class="modal-title">Profile</h4>
              <button type="button" class="btn btn-danger btn-circle btn-user2 shadow" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                <i class="fa fa-times fa-sm"></i>
              </button>
            </div>
            <div class="modal-body">
            <div class="table-responsive">
                        <table class="table table-hover dataTable" width="100%">
                          <thead>
                            <tr>
                              <th class="cb">
                                <span class="custom-checkbox">
                                  <input type="checkbox" class="selectAll" />
                                  <label for="selectAll"></label>
                                </span>
                              </th>
                              <th class="actions">Action</th>
                              <th class="nik">ID Pemesanan</th>
                              <!-- <th class="nama">Nama Bus</th> -->
                              <th class="jk">Waktu Pesan</th>
                              <th class="no_hp">Kursi Pesan</th>
                              <th class="no_hp">Total Bayar</th>
                              <th class="no_hp">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
          $query = $obj->pesananSaya($sesID);
          $no = 0;
                            if ($query->rowCount() > 0) {
                              if ($sesLvl == 0) {
                                $dis = "";
                              } else {
                                $dis = "disabled";
                              }
          while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id_pemesanan'];
            $nik_user = $row['nik_user'];
            $id_bus = $row['id_bus'];
            // $nama_bus = $row['nama_bus'];
            $waktu = $row['waktu_pemesanan'];
            $kursi = $row['jumlah_kursi_pesan'];
            $total = $row['total_bayar'];
            $status = $row['status'];
          ?>
                            
                                <tr>
                                <form role="form" action="transaksi.php" method="POST" enctype="multipart/form-data">
        
                                  <td>
                                    <span class="custom-checkbox">
                                      <input type="checkbox" id="checkbox1" name="option[]" value="<?php echo $no; ?>" />
                                      <label for="checkbox1"></label>
                                    </span>
                                  </td>
                                  <td>
                                    <a href="transaksi.php<?php echo $id ?>" class="actionBtn" aria-label="Edit">
                                      <button class="btn btn-success btn-user btn-circle" aria-label="EditModal" data-bs-toggle="modal" data-bs-target="<?php echo $id ?>" value="edit">
                                        &nbsp;<i class="fa fa-edit fa-sm" data-bs-toggle="tooltip" title="Edit"></i>
                                      </button>
                                    </a>
                                    <div class="col-lg-6 mb-3" hidden>
                                                    <label for="inputNik" class="form-label">NIK Penumpang</label>
                                                    <input type="number" class="form-control form-control-user2" id="inputNik" name="txt_id_pemesanan" required data-parsley-required-message="Data harus di isi !!!" data-parsley-length="[15,16]" maxlength="16" data-parsley-number="1" placeholder="Ex: 3509030907020006" value="<?php echo $id ?>" placeholder="" readonly />
                                                  </div>
                                                  <div class="col-lg-6 mb-3" hidden>
                                                    <label for="inputNik" class="form-label">NIK Penumpang</label>
                                                    <input type="number" class="form-control form-control-user2" id="inputNik" name="txt_jumlah_kursi_pesan" required data-parsley-required-message="Data harus di isi !!!" data-parsley-length="[15,16]" maxlength="16" data-parsley-number="1" placeholder="Ex: 3509030907020006" value="<?php echo $kursi ?>" placeholder="" readonly />
                                                  </div>
                                                  <div class="col-lg-6 mb-3" hidden>
                                                    <label for="inputNik" class="form-label">NIK Penumpang</label>
                                                    <input type="number" class="form-control form-control-user2" id="inputNik" name="txt_total_bayar" required data-parsley-required-message="Data harus di isi !!!" data-parsley-length="[15,16]" maxlength="16" data-parsley-number="1" placeholder="Ex: 3509030907020006" value="<?php echo $total ?>" placeholder="" readonly />
                                                  </div>
                                                  <div class="col-lg-6 mb-3" hidden>
                                                    <label for="inputNik" class="form-label">NIK Penumpang</label>
                                                    <input type="number" class="form-control form-control-user2" id="inputNik" name="txt_status" required data-parsley-required-message="Data harus di isi !!!" data-parsley-length="[15,16]" maxlength="16" data-parsley-number="1" placeholder="Ex: 3509030907020006" value="<?php echo $status ?>" placeholder="" readonly />
                                                  </div>
                                                  <div class="col-lg-6 mb-3" hidden>
                                                    <label for="inputNik" class="form-label">NIK Penumpang</label>
                                                    <input type="number" class="form-control form-control-user2" id="inputNik" name="txt_id_bus" required data-parsley-required-message="Data harus di isi !!!" data-parsley-length="[15,16]" maxlength="16" data-parsley-number="1" placeholder="Ex: 3509030907020006" value="<?php echo $id_bus ?>" placeholder="" readonly />
                                                  </div>
                                    <a href="#" class="actionBtn" aria-label="Delete">
                                      <button class="btn btn-danger btn-user btn-circle" aria-label="DeleteModal" data-bs-toggle="modal" data-bs-target="#deleteDataPenumpang<?php echo $nik_penumpang ?>" value="hapus">
                                        <i class="fa fa-trash fa-sm" data-bs-toggle="tooltip" title="Delete"></i>
                                      </button>
                                    </a>

                                    <!-- Edit Modal -->
                                    <div id="editDataPenumpang<?php echo $nik_penumpang ?>" class="modal fade">
                                      <div class="modal-dialog">
                                        <div class="modal-content modal-edit">
                                          <form role="form" action="editPenumpang.php" method="POST">
                                            <?php
                                            $query = $obj->pilihPenumpang($nik_penumpang);
                                            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                              $nik_penumpang2 = $row['nik_penumpang'];
                                              $nama_penumpang2 = $row['nama_penumpang'];
                                              $jenis_kelamin_penumpang2 = $row['jenis_kelamin_penumpang'];
                                              $no_hp_penumpang2 = $row['no_hp_penumpang'];
                                            ?>
                                              <div class="modal-header">
                                                <h4 class="modal-title">Edit Data Penumpang</h4>
                                                <button type="button" class="btn btn-danger btn-circle btn-user2 shadow" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                                                  <i class="fa fa-times fa-sm"></i>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <div class="row">
                                                  <div class="col-lg-6 mb-3">
                                                    <label for="inputNik" class="form-label">NIK Penumpang</label>
                                                    <input type="number" class="form-control form-control-user2" id="inputNik" name="txt_nik_penumpang" required data-parsley-required-message="Data harus di isi !!!" data-parsley-length="[15,16]" maxlength="16" data-parsley-number="1" placeholder="Ex: 3509030907020006" value="<?php echo $nik_penumpang2 ?>" placeholder="" readonly />
                                                  </div>
                                                  <div class="col-lg-6 mb-3">
                                                    <label for="inputNamaPenumpang" class="form-label">Nama Penumpang</label>
                                                    <input type="text" class="form-control form-control-user2" id="inputNamaPenumpang" name="txt_nama_penumpang" required data-parsley-required-message="Data harus di isi !!!" placeholder="Ex: Budi Santoso" value="<?php echo $nama_penumpang2 ?>" />
                                                  </div>

                                                </div>

                                                <div class="row">
                                                  <div class="col-lg-6 mb-3">
                                                    <label for="InputJenisKelamin" class="form-label">Jenis Kelamin</label>
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="txt_jenis_kelamin_penumpang" id="Radios1" value="Laki-laki" checked />
                                                      <label class="form-label2" for="Radios1"><span>Laki-laki</span></label>
                                                    </div>
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="txt_jenis_kelamin_penumpang" id="Radios2" value="Perempuan" />
                                                      <label class="form-label2" for="Radios2"><span>Perempuan</span></label>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-6 mb-3">
                                                    <label for="inputNoHp" class="form-label">No Handphone</label>
                                                    <input type="number" class="form-control form-control-user2" id="inputNoHp" name="txt_no_hp_penumpang" placeholder="Ex: 085808241204" required data-parsley-required-message="Data harus di isi !!!" value="<?php echo $no_hp_penumpang2 ?>" />
                                                  </div>
                                                </div>

                                                <div class="modal-footer">
                                                  <button class="btn btn-secondary roundedBtn" type="button" data-bs-dismiss="modal">Batal</button>
                                                  <button type="submit" class="btn text-white colorPrimary roundedBtn" name="simpan">Update</button>
                                                </div>
                                              </div>
                                          </form>
                                        <?php
                                            }
                                        ?>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div id="deleteDataPenumpang<?php echo $nik_penumpang; ?>" class="modal fade">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <form action="">
                                            <div class="modal-header">
                                              <h4 class="modal-title">Hapus Penumpang</h4>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body">
                                              <p>Apakah Anda yakin ingin menghapus data penumpang ini ?</p>
                                              <p class="text-warning"><small>Perlu hati-hati karena data akan hilang selamanya !</small></p>
                                            </div>
                                            <div class="modal-footer">
                                              <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                                              <a class="btn btn-danger" href="hapusPenumpang.php?nik_penumpang=<?php echo $nik_penumpang; ?>">Hapus</a>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                  <td>P000<?php echo $id; ?></td>
                                  <!-- <td><?php echo $nama_bus; ?></td> -->
                                  <td><?php echo $waktu; ?></td>
                                  <td><?php echo $kursi; ?> kursi</td>
                                  <td>Rp. <?php echo number_format($total); ?></td>
                                  <td><?php echo $status; ?></td>
                                  </form>
                                </tr>
                            
                          </tbody>
                        </table>
                      </div>
            </div>
        
      <?php
      $no++;
          }
        }
      ?>
      </div>
    </div>
  </div>

  <main>
    <section id="home">
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

      <section class="search">
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
    </section>

    <section class="py-5 bg-light" id="booking">
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

    <section class="py-5 bg-light" id="help">
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

    <section class="py-5 bg-white" id="about">
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

  <section class="bg-primary-gradient text-white sectionFooter">
    <div class="bg-holder">
    </div>
    <div class="container">
      <footer class="py-5">
        <div class="row">
          <div class="col-12">
            <div class="row d-flex">
              <div class="col-4 col-md-2 order-2 order-md-1">
                <h5 class="font-RobotoBold">Landing Page</h5>
                <ul class="nav flex-column">
                  <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
                  <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Booking</a></li>
                  <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Help</a></li>
                  <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
                </ul>
              </div>

              <div class="col-4 col-md-2 order-3 order-md-2">
                <h5 class="font-RobotoBold">Pencarian</h5>
                <ul class="nav flex-column">
                  <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Data Tiket Bus</a></li>
                  <li class="nav-item mb-2">Filter</li>
                </ul>
              </div>

              <div class="col-4 col-md-2 order-4 order-md-3">
                <h5 class="font-RobotoBold">Profil</h5>
                <ul class="nav flex-column">
                  <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Edit Profil</a></li>
                  <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pesanan Saya</a></li>
                </ul>
              </div>

              <div class="col-12 col-md-4 offset-md-1 order-1 order-md-4 mb-5 text-center text-md-start">
                <form>
                  <h5 class="font-RobotoBold" id="h-Footer">Bantuan !</h5>
                  <p>Jika ada masalah,hubungi kami dengan mengirimkan pesan ke email dibawah ini ! </p>
                  <div class="d-flex w-100 gap-2">
                    <label for="newsletter1" class="visually-hidden">Email address</label>
                    <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                    <button class="btn btn-primary" type="button">Hubungi</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-between py-4 my-4 border-top position-relative">
          <p>&copy; 2021 SI-BOSS, Inc. All rights reserved.</p>
          <ul class="list-unstyled d-flex">
            <li class="ms-3"><a class="link-dark" href="#">
                <a class="text-white outline" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="Whatsapp"><i class="icofont-whatsapp s26 rounded-circle"></i></a>
            <li class="ms-3"><a class="link-dark" href="#">
                <a class="text-white outline" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram"><i class="icofont-instagram s22 rounded-circle"></i></a>
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
        $('#namaProfil').removeClass('text-white');
        $('#custBtnDaftar').removeClass('b-cust');
        $('#custBtnLogin').removeClass('b-cust');
        $('nav').addClass('navbar-light');
        $('nav').addClass('shadow mod');
        $('#namaProfil').addClass('text-dark');
        $('#custBtnDaftar').addClass('btn-outlineCust');
        $('#custBtnLogin').addClass('colorPrimary');
        $("#logoNav").attr("src", "assets/img/logo.png");
      } else {
        $('nav').removeClass('bgNav');
        $('nav').removeClass('navbar-light');
        $('#namaProfil').removeClass('text-dark');
        $('#custBtnDaftar').removeClass('btn-outlineCust');
        $('#custBtnLogin').removeClass('colorPrimary');
        $('nav').addClass('navbar-dark');
        $('nav').addClass('landingNav');
        $('#custBtnDaftar').addClass('b-cust');
        $('#custBtnLogin').addClass('b-cust');
        $('#namaProfil').addClass('text-white');
        $('nav').removeClass('shadow mod');
        $("#logoNav").attr("src", "assets/img/logoW.png");
      }
    });

    const sections = document.querySelectorAll('section[id]')

    function scrollActive() {
      const scrollY = window.pageYOffset

      sections.forEach(current => {
        const sectionHeight = current.offsetHeight,
          sectionTop = current.offsetTop - 58,
          sectionId = current.getAttribute('id')

        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
          document.querySelector('.navbar-nav a[href*=' + sectionId + ']').classList.add('active')
        } else {
          document.querySelector('.navbar-nav a[href*=' + sectionId + ']').classList.remove('active')
        }
      })
    }
    window.addEventListener('scroll', scrollActive)
  </script>
</body>

</html>