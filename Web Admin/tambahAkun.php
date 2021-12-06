<!-- <?php
require('koneksi.php');

session_start();

if(!isset($_SESSION['email'])){
    header('Location: index.php');
}

$sesName = $_SESSION['name'];

$nama = $_GET['nama'];
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

  $nama_terminal = $_POST['txt_nama_terminal'];
  $alamat_terminal = $_POST['txt_detail_alamat_terminal'];
  $provinsi = $_POST['d_provinsi_terminal'];
  $kabupaten = $_POST['d_kabupaten_terminal'];
  $kecamatan = $_POST['d_kecamatan_terminal'];

  $query = "INSERT INTO administrator VALUES ('', '$nama', '$jenis_kelamin', '$alamat', '$no_hp', '', 2, '1', '$email', '$password')";
  $query2 = "INSERT INTO terminal VALUES ('', '$nama_terminal', '$alamat_terminal', '$provinsi', '$kabupaten','$kecamatan')";
  $result = mysqli_query($koneksi, $query);
  $result = mysqli_query($koneksi, $query2);
  header('Location: registrasi.php');

}
?> -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - SI BOSS</title>
    <link rel="stylesheet" href="plugin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="plugin/font/stylesheet.css" />
    <link rel="stylesheet" href="plugin/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="plugin/datatables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css" />
  </head>

  <body>
    <div class="sidebar">
      <!-- Logo -->
      <div class="logo-details">
        <i class="fas fa-bus"></i>
        <span class="logo_name">SI-BOSS<span class="logo_nameMin">Express</span></span>
      </div>

      <!-- List Menu -->
      <ul class="nav-links">
        <!-- Heading -->
        <li class="sidebar-heading mb-2 p-0">Menu :</li>
        <li class="nav-item">
          <a href="dashboard.php" class="focusMenu">
            <div class="frame-ico">
              <img class="ico" src="img/ico/icoDash_Fill.png" alt="logo1" data-bs-toggle="collapse" data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" />
            </div>
            <span class="link_name">Dashboard</span>
            <i class="bx bxs-chevron-right arrow" data-bs-toggle="collapse" data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard"></i>
          </a>
          <div id="dashboard" class="collapse">
            <ul class="sub-menu">
              <li><a class="link_name" href="dashboard.php">Dashboard</a></li>
              <li><a href="#">Grafik</a></li>
              <li><a href="#">Log</a></li>
              <li><a href="#">Pengaturan</a></li>
            </ul>
          </div>
        </li>
        <li><hr /></li>
        <li class="sidebar-heading mt-2 p-0">List Data</li>
        <li class="nav-item">
          <a href="sumberData.php" class="focusMenu">
            <div class="frame-ico">
              <img class="ico2" src="img/ico/icoData_noFill.png" alt="logo2" data-bs-toggle="collapse" data-bs-target="#SumberData" aria-expanded="false" aria-controls="SumberData" />
            </div>
            <span class="link_name">Sumber Data</span>
            <i class="bx bxs-chevron-right arrow" data-bs-toggle="collapse" data-bs-target="#SumberData" aria-expanded="false" aria-controls="SumberData"></i>
          </a>
          <div id="SumberData" class="collapse">
            <ul class="sub-menu">
              <li><a class="link_name" href="sumberData.php">Sumber Data</a></li>
              <li><a href="#">Terminal</a></li>
              <li><a href="#">Jenis Bus</a></li>
              <li><a href="#">Rute User</a></li>
              <li><a href="#">Penumpang</a></li>
              <li><a href="#">Staff</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a href="dataBus.php" class="focusMenu">
            <div class="frame-ico">
              <img class="ico2" src="img/ico/icoBus_noFill.png" alt="logo1" />
            </div>
            <span class="link_name">Data Bus</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="dataBus.php">Data Bus</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="focusMenu">
            <div class="frame-ico">
              <img class="ico2" src="img/ico/icoDriver_noFill.png" alt="logo1" />
            </div>
            <span class="link_name">Data Driver</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Data Driver</a></li>
          </ul>
        </li>

        <li class="nav-item active">
          <a href="#" class="focusMenu">
            <div class="frame-ico">
              <img class="ico2" src="img/ico/iconProfile_Fill.png" alt="logo1" />
            </div>
            <span class="link_name">Data Akun</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Data Akun</a></li>
          </ul>
        </li>
        <li><hr class="seperator" /></li>

        <li class="sidebar-heading mt-2 p-0">Layanan</li>
        <li class="nav-item">
          <a href="#" class="focusMenu">
            <div class="frame-ico">
              <img class="ico2" src="img/ico/icoBooking_no Fill.png" alt="logo1" />
            </div>
            <span class="link_name">Pemesanan</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Pemesanan</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="focusMenu">
            <div class="frame-ico">
              <img class="ico2" src="img/ico/icoReport_noFill.png" alt="logo1" />
            </div>
            <span class="link_name">Laporan</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Laporan</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <div class="profile-details">
            <div class="profile-content">
              <img src="img/bis.png" alt="profileImg" />
            </div>
            <div class="name-job">
              <div class="profile_name">
                <span><?= (str_word_count($sesName) > 2 ? substr($sesName,0,9)."..." : $sesName);?></span>
              </div>
              <div class="job">Staff</div>
            </div>
            <i class="bx bx-log-out"></i>
          </div>
        </li>
      </ul>
    </div>

    <!-- Content -->
    <div class="home-section">
      <div class="home-content d-flex justify-content-end align-items-center mb-4">
        <div class="menu">
          <i class="fas fa-bars"></i>
        </div>
        <nav class="custNav">
          <ul class="nav">
            <li class="nav-item">
              <a href="#" class="nav-link transition">
                <i class="far fa-bell"></i>
                <span class="badge alert-danger p-1">5</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="dropdownProfile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="RobotoReg14"><?php echo $sesName;?></span>
                <img class="img-profile rounded-circle" src="img/bis.png" alt="LogoBis" />
              </a>

              <ul class="dropdown-menu border-0 dropdown-menu-end shadow" aria-labelledby="dropdownProfile">
                <li>
                  <a class="dropdown-item" href="#"> <i class="las la-user mr-2"></i> My Profile </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#"> <i class="las la-list-alt mr-2"></i> Activity Log </a>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                </li>
                <li>
                  <a class="dropdown-item" href="logout.php"> <i class="las la-sign-out-alt mr-2"></i> Sign Out </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>

      <!-- Content Row -->
      <div class="row m-0 px-3 rowCustom">
        <!-- Card Total Data Bus -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-0 gradientBlue shadow h-100 py-2 rounded">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="RobotoReg14 text-white">Data Bus</div>
                  <div class="RobotoBold18 text-white">5 <span>Bus</span></div>
                </div>
                <div class="col-auto">
                  <img src="img/ico/icons8_Shuttle_bus_50px.png" alt="logoBus" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Card Total Data Driver -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-0 gradientPink shadow h-100 py-2 rounded">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="RobotoReg14 text-white">Data Driver</div>
                  <div class="RobotoBold18 text-white">(Belum Tersedia)</div>
                </div>
                <div class="col-auto">
                  <img src="img/ico/icons8_driver_50px.png" alt="logoDriver" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Card Total Data Pemesanan -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-0 gradientYellow shadow h-100 py-2 rounded">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="RobotoReg14 text-white">Data Pemesanan</div>
                  <div class="RobotoBold18 text-white">20 Pesanan</div>
                </div>
                <div class="col-auto">
                  <img src="img/ico/icons8_bus_tickets_50px.png" alt="logoTicket" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Card Total Data Penghasilan -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-0 gradientGreen shadow h-100 py-2 rounded">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="RobotoReg14 text-white">Total Penghasilan</div>
                  <div class="RobotoBold18 text-white"><span>Rp</span>4.125.000</div>
                </div>
                <div class="col-auto">
                  <img src="img/ico/icons8_add_dollar_45px.png" alt="logoPay" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Panel -->
      <div class="row g-2 m-0 px-4">
        <div class="col-lg-12">
          <div class="card shadow mb-4 rounded">
            <div class="card-header shadow rounded">
              <div class="title float-start">
                <a href="dataAkun.php">
                  <button class="btn text-white m-0 p-0 me-2"><i class="fas fa-arrow-alt-circle-left fa-lg" data-bs-toggle="tooltip" title="Kembali"></i></button>
                </a>
                <span class="m-0"><b>Tambah Data Akun</b></span>
              </div>
            </div>
            <div class="card-body">
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
                  <div class="col-lg-6 mb-3">
                    <label for="exampleInputPassword" class="form-label">Kecamatan</label>
                    <select class="form-select" aria-label=".form-select-sm example">
                      <option disabled selected>Pilih Kecamatan</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                  <div class="col-lg-12 mb-2">
                    <label for="exampleInputEmail" class="form-label">Status Level</label>
                    <select class="form-select" aria-label=".form-select-sm example">
                      <option disabled selected>Pilih Level Otoritas</option>
                      <option value="1">Admin</option>
                      <option value="2">staff</option>
                    </select>
                  </div>
                </div>

                <div class="mb-5"></div>
                <div class="col-12 d-flex justify-content-center">
                  <button type="submit" name="register" class="btn btn-success roundedBtn text-white btn-block3">Tambah</button>
                </div>
              </form>
            </div>

            <!-- Add Modal -->
            <div id="addDataAkun" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form>
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Data Akun</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" required />
                      </div>
                      <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" required />
                      </div>
                      <div class="form-group">
                        <label for="name">Alamat</label>
                        <input type="text" class="form-control" required />
                      </div>
                      <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="number" class="form-control" required />
                      </div>
                      <div class="modal-footer">
                        <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancel" />
                        <input type="submit" class="btn btn-success" value="Delete" />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Edit Modal -->
            <div id="editDataAkun" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Data Akun</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" required />
                      </div>
                      <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" required />
                      </div>
                      <div class="form-group">
                        <label for="name">Alamat</label>
                        <input type="text" class="form-control" required />
                      </div>
                      <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="number" class="form-control" required />
                      </div>
                      <div class="modal-footer">
                        <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancel" />
                        <input type="submit" class="btn btn-success" value="Delete" />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Delete Modal -->
            <div id="deleteDataAkun" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="">
                    <div class="modal-header">
                      <h4 class="modal-title">Hapus Akun</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                      <p>Apakah Anda yakin ingin menghapus data akun ini ?</p>
                      <p class="text-warning"><small>Perlu hati-hati karena data akan hilang selamanya !</small></p>
                    </div>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancel" />
                      <input type="submit" class="btn btn-danger" value="Delete" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="jquery/jquery-3.6.0.min.js"></script>
    <script src="plugin/js/bootstrap.bundle.min.js"></script>
    <script src="plugin/jquery-easing/jquery.easing.min.js"></script>
    <script src="plugin/js/script.js"></script>
    <script src="plugin/js/calender.js"></script>
    <script src="plugin/datatables/DataTables-1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="plugin/datatables/DataTables-1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="plugin/js/datatables-demo.js"></script>
    <script src="plugin/js/javascript.js"></script>
  </body>
</html>
