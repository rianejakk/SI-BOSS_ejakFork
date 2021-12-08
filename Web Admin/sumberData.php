<?php
  require('koneksi.php');
  require('query.php');
  $obj = new crud;

  session_start();

  if(!isset($_SESSION['email'])){
      header('Location: index.php');
  }
  $sesID = $_SESSION['id'];
  $sesName = $_SESSION['name'];
  $sesLvl = $_SESSION['level'];

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama_terminal = $_POST['txt_nama_terminal'];
    $alamat_terminal = $_POST['txt_detail_alamat_terminal'];
    $provinsi = $_POST['d_provinsi_terminal'];
    $kabupaten = $_POST['d_kabupaten_terminal'];
    $kecamatan = $_POST['d_kecamatan_terminal'];
    if($obj->insertTerminal($nama_terminal, $alamat_terminal, $provinsi, $kabupaten, $kecamatan)){
      echo '<div class="alert alert-success">Terminal Berhasil Ditambahkan</div>';
    } else{
      echo '<div class="alert alert-danger">Terminal Gagal Ditambahkan</div>';
    }
  }

  if(!$obj->detailTerminal($_GET['id_terminal'])) die ("Error: Id tidak ada");
  if($_SERVER['REQUEST_METHOD']=='POST'):
    // $idTerminal = $_POST['txt_id_terminal'];
    $namaTerminal = $_POST['txt_nama_terminal'];
    $alamatTerminal = $_POST['txt_alamat_terminal'];
    $provinsiTerminal= $_POST['txt_provinsi_terminal'];
    $kabupatenTerminal= $_POST['txt_kabupaten_terminal'];
    $kecamatanTerminal= $_POST['txt_kecamatan_terminal'];
    if($obj->updateTerminal($namaTerminal, $alamatTerminal, $provinsiTerminal, $kabupatenTerminal, $kecamatanTerminal, $obj->id_terminal)):
      echo '<div class="alert alert-success">Data Berhasil disimpan</div>';
      header("Location: sumberData.php");
    else:
      echo '<div class="alert alert-success">Data gagal disimpan</div>';
      header("Location: sumberData.php");
    endif;
  endif;
?> 
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
          <a href="#" class="focusMenu">
            <div class="frame-ico">
              <img class="ico" src="img/ico/icoDash_Fill.png" alt="logo1" data-bs-toggle="collapse" data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" />
            </div>
            <span class="link_name">Dashboard</span>
            <i class="bx bxs-chevron-right arrow" data-bs-toggle="collapse" data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard"></i>
          </a>
          <div id="dashboard" class="collapse">
            <ul class="sub-menu">
              <li><a class="link_name" href="#">Dashboard</a></li>
              <li><a href="#">Grafik</a></li>
              <li><a href="#">Log</a></li>
              <li><a href="#">Pengaturan</a></li>
            </ul>
          </div>
        </li>
        <li><hr></li>
        <li class="sidebar-heading mt-2 p-0">List Data</li>
        <li class="nav-item active">
          <a href="sumberData.php" class="focusMenu">
            <div class="frame-ico">
              <img class="ico2" src="img/ico/icoData_Fill.png" alt="logo2" data-bs-toggle="collapse" data-bs-target="#SumberData" aria-expanded="false" aria-controls="SumberData" />
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

        <li class="nav-item">
          <a href="dataAkun.php" class="focusMenu">
            <div class="frame-ico">
              <img class="ico2" src="img/ico/iconProfile_noFill.png" alt="logo1" />
            </div>
            <span class="link_name">Data Akun</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="dataAkun.php">Data Akun</a></li>
          </ul>
        </li>
        <li><hr class="seperator"></li>

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
        <div class="col-12">
          <div class="colorSecondary2 shadow roundedPanel">
            <!-- Tabs navs -->
            <ul class="nav nav-tabs bg-white pt-2 px-4 roundedTab custShadow" id="ex1" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-1" data-bs-toggle="tab" data-bs-target="#tabs-1" type="button" role="tab" aria-controls="tabs-1" aria-selected="true">Terminal</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-2" data-bs-toggle="tab" data-bs-target="#tabs-2" type="button" role="tab" aria-controls="tabs-2" aria-selected="false">Jenis Bus</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-3" data-bs-toggle="tab" data-bs-target="#tabs-3" type="button" role="tab" aria-controls="tabs-3" aria-selected="false">Rute</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-4" data-bs-toggle="tab" data-bs-target="#tabs-4" type="button" role="tab" aria-controls="tabs-4" aria-selected="false">Penumpang</button>
              </li>
            </ul>
            <div class="tab-content mb-5 px-4" id="ex1-content">
              <div class="tab-pane fade show active" id="tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
              <div class="row g-2 m-0 ">
                  <div class="col-lg-12">
                    <div class="card mb-4 rounded">
                      <div class="card-header shadow">
                        <div class="title float-start">
                          <span class="m-0"><b>Tabel Data Terminal</b></span>
                        </div>
                        <div class="btnAction float-end">
                        <a href="#" class="actionBtn" aria-label="edit">
                          <button class="btn btn-light text-dark btn-circle custShadow2 me-2" aria-label="EditModal" data-bs-toggle="modal" data-bs-target="#tambahDataTerminal" value="edit">
                            &nbsp;<i class="fa fa-edit fa-sm" data-bs-toggle="tooltip" title="Edit"></i>
                          </button>
                        </a>
                          
                          <button class="btn btn-light text-danger btn-circle custShadow2" data-bs-toggle="modal" data-tooltip="tooltip" data-bs-target="#deleteDataTerminal" title="Hapus Yang dipilih"><i class="fas fa-trash"></i></button>
                        </div>
                      </div>
                      <div class="card-body">
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
                                <th class="id">ID Terminal</th>
                                <th class="terminal">Terminal</th>
                                <th class="alamat">Alamat</th>
                                <th class="provinsi">Provinsi</th>
                                <th class="kabupaten">Kabupaten</th>
                                <th class="kecamatan">Kecamatan</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                              $data = $obj->lihatTerminal();
                              $no = 1;
                              if($data->rowCount()>0){
                                if($sesLvl == 1){
                                    $dis = "";
                                } else{
                                    $dis = "disabled";
                                }
                                while($row=$data->fetch(PDO::FETCH_ASSOC)){
                                  $terminal = $row['nama_terminal'];
                                  $alamat = $row['detail_alamat_terminal'];
                                  $provinsi = $row['provinsi_terminal'];
                                  $kabupaten = $row['kabupaten_terminal'];
                                  $kecamatan = $row['kecamatan_terminal'];
                            ?>
                            <tr>
                                <td>
                                  <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="option[]" value="1" />
                                    <label for="checkbox1"></label>
                                  </span>
                                </td>
                                <td>
                                  <a href="#" class="actionBtn" aria-label="Edit">
                                    <button class="btn btn-success btn-user btn-circle" aria-label="EditModal" data-bs-toggle="modal" data-bs-target="#editDataTerminal" <?php echo $row['id_terminal']; ?> value="edit" 
                                    
                                      > &nbsp;<i class="fa fa-edit fa-sm" data-bs-toggle="tooltip" title="Edit"></i>
                                    </button>
                                  </a>
                                  <a href="#" class="actionBtn" aria-label="Delete">
                                    <button class="btn btn-danger btn-user btn-circle" aria-label="DeleteModal" data-bs-toggle="modal" data-bs-target="#deleteDataTerminal" value="hapus">
                                      <i class="fa fa-trash fa-sm" data-bs-toggle="tooltip" title="Delete"></i>
                                    </button>
                                  </a>
                                </td>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $terminal; ?></td>
                              <td><?php echo $alamat; ?></td>
                              <td><?php echo $provinsi; ?></td>
                              <td><?php echo $kabupaten; ?></td>
                              <td><?php echo $kecamatan; ?></td>
                            </tr>
                              <?php
                              $no++;
                              }} 
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <!-- Tambah Modal -->
                      <div id="tambahDataTerminal" class="modal fade">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content modal-edit">
                            <form role="form" action="sumberData.php" method="POST">
                              
                              <div class="modal-header">
                                <h4 class="modal-title">Tambah Data Terminal</h4>
                                <button type="button" class="btn btn-danger btn-circle btn-user2 shadow" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                                  <i class="fa fa-times fa-sm"></i>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="col-lg-12 mb-3" hidden>
                                  <label for="inputId" class="form-label">Id</label>
                                  <input type="text" class="form-control form-control-user2" id="inputId" name="txt_id_terminal" value="<?php echo $idTerminal?>" placeholder="" />
                                </div>
                                
                                <div class="row">
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputTerminal" class="form-label">Nama Terminal</label>
                                    <input type="text" class="form-control form-control-user2" id="inputTerminal" name="txt_nama_terminal" placeholder="Ex: Tawang Alun" />
                                  </div>
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputAlamat" class="form-label">Alamat Terminal</label>
                                    <input type="text" class="form-control form-control-user2" id="inputAlamat" name="txt_detail_alamat_terminal" placeholder="Ex: Jl. Dharmawangsa" />
                                  </div>
                                </div>

                                <div class="col-lg-12 mb-3">
                                  <label for="inputProvinsi" class="form-label">Provinsi</label>
                                  <select class="form-select" aria-label=".form-select-sm example" name="d_provinsi_terminal" id="propinsi" >
                                    <option disabled selected>Pilih Provinsi</option>
                                  </select>
                                </div>

                                <div class="row">
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputKabupaten" class="form-label">Kota</label>
                                    <select class="form-select" aria-label=".form-select-sm example" name="d_kabupaten_terminal" id="kabupaten">
                                      <option disabled selected>Pilih kota</option>
                                    </select>
                                  </div>
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputKecamatan" class="form-label">Kecamatan</label>
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

                      <!-- Edit Modal -->
                      <div id="editDataTerminal" class="modal fade">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content modal-edit">
                            <form role="form" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="POST">
                              
                              <div class="modal-header">
                                <h4 class="modal-title">Edit Data Terminal</h4>
                                <button type="button" class="btn btn-danger btn-circle btn-user2 shadow" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                                  <i class="fa fa-times fa-sm"></i>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="col-lg-12 mb-3" hidden>
                                  <label for="inputId" class="form-label">Id</label>
                                  <input type="text" class="form-control form-control-user2" id="inputId" name="txt_id_terminal" value="<?php echo $idTerminal; ?>" placeholder="" />
                                </div>
                                
                                <div class="row">
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputTerminal" class="form-label">Nama Terminal</label>
                                    <input type="text" class="form-control form-control-user2" id="inputTerminal" name="txt_nama_terminal" value="<?php echo $obj->nama_terminal; ?>" placeholder="Ex: Tawang Alun" />
                                  </div>
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputAlamat" class="form-label">Alamat Terminal</label>
                                    <input type="text" class="form-control form-control-user2" id="inputAlamat" name="txt_detail_alamat_terminal" value="<?php echo $obj->alamat_terminal; ?>" placeholder="Ex: Jl. Dharmawangsa" />
                                  </div>
                                </div>

                                <div class="col-lg-12 mb-3">
                                  <label for="inputProvinsi" class="form-label">Provinsi</label>
                                  <select class="form-select" aria-label=".form-select-sm example" name="d_provinsi_terminal" id="propinsi" >
                                    <option disabled selected>Pilih Provinsi</option>
                                  </select>
                                </div>

                                <div class="row">
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputKabupaten" class="form-label">Kota</label>
                                    <select class="form-select" aria-label=".form-select-sm example" name="d_kabupaten_terminal" id="kabupaten">
                                      <option disabled selected>Pilih kota</option>
                                    </select>
                                  </div>
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputKecamatan" class="form-label">Kecamatan</label>
                                    <select class="form-select" aria-label=".form-select-sm example" name="d_kecamatan_terminal" id="kecamatan">
                                      <option disabled selected>Pilih Kecamatan</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="button" class="btn btn-secondary roundedBtn" data-bs-dismiss="modal" value="Cancel" />
                                  <input type="submit" name="update" class="btn colorPrimary text-white roundedBtn" value="Simpan" />
                                </div>
                              </div>
                            </form>
              
                          </div>
                        </div>
                      </div>

                      <!-- Delete Modal -->
                      <div id="deleteDataTerminal" class="modal fade">
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
              <div class="tab-pane fade" id="tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">Tab 2 content</div>
              <div class="tab-pane fade" id="tabs-3" role="tabpanel" aria-labelledby="tab-3">Tab 3 content</div>
              <div class="tab-pane fade" id="tabs-4" role="tabpanel" aria-labelledby="tab-4">Tab 4 content</div>
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
  </body>
</html>
