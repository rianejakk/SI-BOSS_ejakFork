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
    $nama = $_POST['txt_nama'];
    $jenis_kelamin = $_POST['Rbtn_jenis_kelamin'];
    $alamat = $_POST['txt_alamat'];
    $no_hp = $_POST['txt_no_hp'];
    $foto = $_POST['txt_foto'];
    $id_level = $_POST['txt_id_level'];
    $id_terminal = $_POST['txt_id_terminal'];
    $email = $_POST['txt_email'];
    $password = $_POST['txt_password'];

    if($obj->insertAdministrator($nama, $jenis_kelamin, $alamat, $no_hp, $foto, $id_level, $id_jenis, $email, $password)){
      // echo '<div class="alert alert-success">Terminal Berhasil Ditambahkan</div>';
    } else{
      // echo '<div class="alert alert-danger">Terminal Gagal Ditambahkan</div>';
    }
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama_user = $_POST['txt_nama_user'];
    $tempat_lahir_user = $_POST['txt_tempat_lahir_user'];
    $tanggal_lahir_user = $_POST['txt_tanggal_lahir_user'];
    $jenis_kelamin_user = $_POST['Rbtn_jenis_kelamin_user'];
    $alamat_user = $_POST['txt_alamat_user'];
    $no_hp_user = $_POST['txt_no_hp_user'];
    $foto_user = $_POST['txt_foto_user'];
    $email_user = $_POST['txt_email_user'];
    $password_user = $_POST['txt_password_user'];

    if($obj->insertUser($nama_user, $tempat_lahir_user, $tanggal_lahir_user, $jenis_kelamin_user, $alamat_user, $no_hp_user, $foto_user, $email_user, $password_user)){
      // echo '<div class="alert alert-success">Terminal Berhasil Ditambahkan</div>';
    } else{
      // echo '<div class="alert alert-danger">Terminal Gagal Ditambahkan</div>';
    }
  }
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
          <a href="dataPemesanan.php" class="focusMenu">
            <div class="frame-ico">
              <img class="ico2" src="img/ico/icoBooking_no Fill.png" alt="logo1" />
            </div>
            <span class="link_name">Pemesanan</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="dataPemesanan.php">Pemesanan</a></li>
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
                <button class="nav-link active" id="tab-1" data-bs-toggle="tab" data-bs-target="#tabs-1" type="button" role="tab" aria-controls="tabs-1" aria-selected="true">Administrator</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-2" data-bs-toggle="tab" data-bs-target="#tabs-2" type="button" role="tab" aria-controls="tabs-2" aria-selected="false">User</button>
              </li>
            </ul>
            <div class="tab-content mb-5" id="ex1-content">
              <div class="tab-pane fade show active" id="tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                <div class="row g-2 m-0">
                  <div class="col-lg-12 p-0 m-0">
                    <div class="card mb-4 roundedTabContent">
                      <div class="card-header shadow roundedTabContent">
                        <div class="title float-start">
                          <span class="m-0"><b>Tabel Data Administrator</b></span>
                        </div>
                        <div class="btnAction float-end">
                          <button class="btn btn-light text-dark btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#tambahDataAdministrator"><i class="fas fa-plus" data-bs-toggle="tooltip" title="Tambah Data"></i></button>
                          <button class="btn btn-light text-danger btn-circle custShadow2" data-bs-toggle="modal" data-bs-target="#deleteDataAdministrator"><i class="fas fa-trash" data-bs-toggle="tooltip" title="Hapus Data"></i></button>
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
                                <th class="id">Id</th>
                                <th class="nama">Nama</th>
                                <th class="jk">Jenis Kelamin</th>
                                <th class="alamat">Alamat</th>
                                <th class="nohp">No Handphone</th>
                                <th class="foto">Foto</th>
                                <th class="level">ID Level</th>
                                <th class="terminal">ID Terminal</th>
                                <th class="email">Email</th>
                                <th class="password">Password</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $data = $obj->lihatAdministrator();
                                $no = 1;
                                if($data->rowCount()>0){
                                  if($sesLvl == 1){
                                      $dis = "";
                                  } else{
                                      $dis = "disabled";
                                  }
                                  while($row=$data->fetch(PDO::FETCH_ASSOC)){
                                    $id_user_admin = $row['id_user_admin'];
                                    $nama = $row['nama'];
                                    $jenis_kelamin = $row['jenis_kelamin'];
                                    $alamat = $row['alamat'];
                                    $no_hp = $row['no_hp'];
                                    $foto = $row['foto'];
                                    $id_level = $row['id_level'];
                                    $id_terminal = $row['id_terminal'];
                                    $email = $row['email'];
                                    $password = $row['password'];
                                ?>
                              <tr>
                                <td>
                                  <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="option[]" value="<?php echo $no; ?>" />
                                    <label for="checkbox1"></label>
                                  </span>
                                </td>
                                <td>
                                  <a href="#" class="actionBtn" aria-label="Edit">
                                    <button class="btn btn-success btn-user btn-circle" aria-label="EditModal" data-bs-toggle="modal" data-bs-target="#editDataAdministrator<?php echo $id_user_admin ?>" value="edit">
                                      &nbsp;<i class="fa fa-edit fa-sm" data-bs-toggle="tooltip" title="Edit"></i>
                                    </button>
                                  </a>
                                  <a href="#" class="actionBtn" aria-label="Delete">
                                    <button class="btn btn-danger btn-user btn-circle" aria-label="DeleteModal" data-bs-toggle="modal" data-bs-target="#deleteDataAdministrator<?php echo $id_user_admin ?>" value="hapus">
                                      <i class="fa fa-trash fa-sm" data-bs-toggle="tooltip" title="Delete"></i>
                                    </button>
                                  </a>

                                   <!-- Edit Modal -->
                                  <div id="editDataAdministrator<?php echo $id_user_admin ?>" class="modal fade">
                                    <div class="modal-dialog">
                                      <div class="modal-content modal-edit">
                                        <form role="form" action="editAdministrator.php" method="POST">
                                          <?php
                                            $query = $obj->pilihAdministrator($id_user_admin);
                                            while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                                          ?>
                                          <div class="modal-header">
                                            <h4 class="modal-title">Edit Data Administrator</h4>
                                            <button type="button" class="btn btn-danger btn-circle btn-user2 shadow" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                                              <i class="fa fa-times fa-sm"></i>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="row">
                                              <div class="col-lg-12 mb-3" hidden>
                                                <label for="inputId" class="form-label">Id</label>
                                                <input type="text" class="form-control form-control-user2" id="inputId" name="txt_id_user_admin" value="<?php echo $id_user_admin?>" placeholder="" readonly/>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputNama" class="form-label">Nama</label>
                                                <input type="text" class="form-control form-control-user2" id="inputNama" name="txt_nama" placeholder="Ex: Budi Santoso" value="<?php echo $nama?>"/>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputAlamat" class="form-label">Alamat</label>
                                                <input type="text" class="form-control form-control-user2" id="inputAlamat" name="txt_alamat" placeholder="Ex: Jl. Dharmawangsa" value="<?php echo $alamat?>"/>
                                              </div>
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputNoHp" class="form-label">No Handphone</label>
                                                <input type="text" class="form-control form-control-user2" id="inputNoHp" name="txt_no_hp" placeholder="Ex: 085808241205" value="<?php echo $no_hp?>"/>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputFoto" class="form-label">Foto</label>
                                                <input type="text" class="form-control form-control-user2" id="inputFoto" name="txt_foto" placeholder="Ex:" value="<?php echo $foto?>"/>
                                              </div>
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputIdLevel" class="form-label">ID Level</label>
                                                <input type="text" class="form-control form-control-user2" id="inputIdLevel" name="txt_id_level" placeholder="Ex: 2" value="<?php echo $id_level?>"/>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputIdTerminal" class="form-label">ID Terminal</label>
                                                <input type="text" class="form-control form-control-user2" id="inputIdTerminal" name="txt_id_terminal" placeholder="Ex: 1" value="<?php echo $id_terminal?>"/>
                                              </div>
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputEmail" class="form-label">Email</label>
                                                <input type="text" class="form-control form-control-user2" id="inputEmail" name="txt_email" placeholder="Ex: admin@gmail.com" value="<?php echo $email?>"/>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputPassword" class="form-label">Password</label>
                                                <input type="text" class="form-control form-control-user2" id="inputPassword" name="txt_password" placeholder="Ex: ********" value="<?php echo $password?>"/>
                                              </div>
                                            </div>
                                            
                                            <div class="modal-footer">
                                              <button class="btn btn-secondary roundedBtn" type="button" data-dismiss="modal">Batal</button>
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
                                  <div id="deleteDataAdministrator<?php echo $id_user_admin; ?>" class="modal fade">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <form action="">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Hapus Administrator</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
                                          </div>
                                          <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus data administrator ini ?</p>
                                            <p class="text-warning"><small>Perlu hati-hati karena data akan hilang selamanya !</small></p>
                                          </div>
                                          <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <a class="btn btn-danger" href="hapusAdministrator.php?id_user_admin=<?php echo $id_user_admin; ?>">Hapus</a>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $nama; ?></td>
                                <td><?php echo $jenis_kelamin; ?></td>
                                <td><?php echo $alamat; ?></td>
                                <td><?php echo $no_hp; ?></td>
                                <td><?php echo $foto; ?></td>
                                <td><?php echo $id_level?></td>
                                <td><?php echo $id_terminal?></td>
                                <td><?php echo $email?></td>
                                <td><?php echo $password?></td>
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
                      <div id="tambahDataAdministrator" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content modal-edit">
                            <form role="form" action="dataAkun.php" method="POST">
                              <div class="modal-header">
                                <h4 class="modal-title">Tambah Data Terminal</h4>
                                <button type="button" class="btn btn-danger btn-circle btn-user2 shadow" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                                  <i class="fa fa-times fa-sm"></i>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputTerminal" class="form-label">Nama Terminal</label>
                                    <input type="text" class="form-control form-control-user2" id="inputTerminal" name="txt_nama_terminal" placeholder="Ex: Tawang Alun" />
                                  </div>
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputAlamat" class="form-label">Alamat Terminal</label>
                                    <textarea class="form-control form-textarea-user" id="inputAlamat" name="txt_detail_alamat_terminal" placeholder="Ex: Jl. Dharmawangsa"></textarea>
                                  </div>
                                  <div class="col-lg-12 mb-3">
                                    <label for="inputProvinsi" class="form-label">Provinsi</label>
                                    <select class="form-select form-select-user" aria-label=".form-select-sm example" name="d_provinsi_terminal" id="propinsi" >
                                      <option disabled selected>Pilih Provinsi</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputKabupaten" class="form-label">Kota</label>
                                    <select class="form-select form-select-user" aria-label=".form-select-sm example" name="d_kabupaten_terminal" id="kabupaten">
                                      <option disabled selected>Pilih kota</option>
                                    </select>
                                  </div>
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputKecamatan" class="form-label">Kecamatan</label>
                                    <select class="form-select form-select-user" aria-label=".form-select-sm example" name="d_kecamatan_terminal" id="kecamatan">
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
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tabs User -->
              <div class="tab-pane fade" id="tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                <div class="row g-2 m-0">
                  <div class="col-lg-12 p-0 m-0">
                    <div class="card mb-4 roundedTabContent">
                      <div class="card-header shadow roundedTabContent">
                        <div class="title float-start">
                          <span class="m-0"><b>Tabel Data User</b></span>
                        </div>
                        <div class="btnAction float-end">
                          <button class="btn btn-light text-dark btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#tambahDataUser"><i class="fas fa-plus" data-bs-toggle="tooltip" title="Tambah Data"></i></button>
                          <button class="btn btn-light text-danger btn-circle custShadow2" data-bs-toggle="modal" data-bs-target="#deleteDataUser"><i class="fas fa-trash" data-bs-toggle="tooltip" title="Hapus Data"></i></button>
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
                                <th class="id">NIK</th>
                                <th class="nama">Nama</th>
                                <th class="tempat">Tempat Lahir</th>
                                <th class="tanggal">Tanggal Lahir</th>
                                <th class="jk">Jenis Kelamin</th>
                                <th class="alamat">Alamat</th>
                                <th class="nohp">No Handphone</th>
                                <th class="foto">Foto</th>
                                <th class="email">Email</th>
                                <th class="password">Password</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                $data = $obj->lihatUser();
                                $no = 1;
                                if($data->rowCount()>0){
                                  if($sesLvl == 1){
                                      $dis = "";
                                  } else{
                                      $dis = "disabled";
                                  }
                                  while($row=$data->fetch(PDO::FETCH_ASSOC)){
                                    $nik_user = $row['nik_user'];
                                    $nama_user = $row['nama_user'];
                                    $tempat_lahir_user = $row['tempat_lahir_user'];
                                    $tanggal_lahir_user = $row['tanggal_lahir_user'];
                                    $jenis_kelamin_user = $row['jenis_kelamin_user'];
                                    $alamat_user = $row['alamat_user'];
                                    $no_hp_user = $row['no_hp_user'];
                                    $foto_user = $row['foto_user'];
                                    $email_user = $row['email_user'];
                                    $password_user = $row['password_user'];
                                ?>
                              <tr>
                                <td>
                                  <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="option[]" value="<?php echo $no; ?>" />
                                    <label for="checkbox1"></label>
                                  </span>
                                </td>
                                <td>
                                  <a href="#" class="actionBtn" aria-label="Edit">
                                    <button class="btn btn-success btn-user btn-circle" aria-label="EditModal" data-bs-toggle="modal" data-bs-target="#editDataUser<?php echo $nik_user ?>" value="edit">
                                      &nbsp;<i class="fa fa-edit fa-sm" data-bs-toggle="tooltip" title="Edit"></i>
                                    </button>
                                  </a>
                                  <a href="#" class="actionBtn" aria-label="Delete">
                                    <button class="btn btn-danger btn-user btn-circle" aria-label="DeleteModal" data-bs-toggle="modal" data-bs-target="#deleteDataUser<?php echo $nik_user ?>" value="hapus">
                                      <i class="fa fa-trash fa-sm" data-bs-toggle="tooltip" title="Delete"></i>
                                    </button>
                                  </a>

                                   <!-- Edit Modal -->
                                  <div id="editDataUser<?php echo $nik_user ?>" class="modal fade">
                                    <div class="modal-dialog">
                                      <div class="modal-content modal-edit">
                                        <form role="form" action="editUser.php" method="POST">
                                          <?php
                                            $query = $obj->pilihUser($nik_user);
                                            while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                                          ?>
                                          <div class="modal-header">
                                            <h4 class="modal-title">Edit Data User</h4>
                                            <button type="button" class="btn btn-danger btn-circle btn-user2 shadow" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                                              <i class="fa fa-times fa-sm"></i>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="row">
                                              <div class="col-lg-12 mb-3" hidden>
                                                <label for="inputId" class="form-label">Id</label>
                                                <input type="text" class="form-control form-control-user2" id="inputId" name="txt_id_user_admin" value="<?php echo $id_user_admin?>" placeholder="" readonly/>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputNama" class="form-label">Nama</label>
                                                <input type="text" class="form-control form-control-user2" id="inputNama" name="txt_nama" placeholder="Ex: Budi Santoso" value="<?php echo $nama?>"/>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputAlamat" class="form-label">Alamat</label>
                                                <input type="text" class="form-control form-control-user2" id="inputAlamat" name="txt_alamat" placeholder="Ex: Jl. Dharmawangsa" value="<?php echo $alamat?>"/>
                                              </div>
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputNoHp" class="form-label">No Handphone</label>
                                                <input type="text" class="form-control form-control-user2" id="inputNoHp" name="txt_no_hp" placeholder="Ex: 085808241205" value="<?php echo $no_hp?>"/>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputFoto" class="form-label">Foto</label>
                                                <input type="text" class="form-control form-control-user2" id="inputFoto" name="txt_foto" placeholder="Ex:" value="<?php echo $foto?>"/>
                                              </div>
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputIdLevel" class="form-label">ID Level</label>
                                                <input type="text" class="form-control form-control-user2" id="inputIdLevel" name="txt_id_level" placeholder="Ex: 2" value="<?php echo $id_level?>"/>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputIdTerminal" class="form-label">ID Terminal</label>
                                                <input type="text" class="form-control form-control-user2" id="inputIdTerminal" name="txt_id_terminal" placeholder="Ex: 1" value="<?php echo $id_terminal?>"/>
                                              </div>
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputEmail" class="form-label">Email</label>
                                                <input type="text" class="form-control form-control-user2" id="inputEmail" name="txt_email" placeholder="Ex: admin@gmail.com" value="<?php echo $email?>"/>
                                              </div>
                                            </div>

                                            <div class="row">
                                              <div class="col-lg-6 mb-3">
                                                <label for="inputPassword" class="form-label">Password</label>
                                                <input type="text" class="form-control form-control-user2" id="inputPassword" name="txt_password" placeholder="Ex: ********" value="<?php echo $password?>"/>
                                              </div>
                                            </div>
                                            
                                            <div class="modal-footer">
                                              <button class="btn btn-secondary roundedBtn" type="button" data-dismiss="modal">Batal</button>
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
                                  <div id="deleteDataUser<?php echo $nik_user; ?>" class="modal fade">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <form action="">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Hapus User</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
                                          </div>
                                          <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus data administrator ini ?</p>
                                            <p class="text-warning"><small>Perlu hati-hati karena data akan hilang selamanya !</small></p>
                                          </div>
                                          <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <a class="btn btn-danger" href="hapusUser.php?nik_user=<?php echo $nik_user; ?>">Hapus</a>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td><?php echo $nik_user; ?></td>
                                <td><?php echo $nama_user; ?></td>
                                <td><?php echo $tempat_lahir_user; ?></td>
                                <td><?php echo $tanggal_lahir_user; ?></td>
                                <td><?php echo $jenis_kelamin_user; ?></td>
                                <td><?php echo $alamat_user; ?></td>
                                <td><?php echo $no_hp_user; ?></td>
                                <td><?php echo $foto_user; ?></td>
                                <td><?php echo $email_user?></td>
                                <td><?php echo $password_user?></td>
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
                        <div class="modal-dialog">
                          <div class="modal-content modal-edit">
                            <form role="form" action="sumberData.php" method="POST">
                              <div class="modal-header">
                                <h4 class="modal-title">Tambah Data Terminal</h4>
                                <button type="button" class="btn btn-danger btn-circle btn-user2 shadow" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                                  <i class="fa fa-times fa-sm"></i>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputTerminal" class="form-label">Nama Terminal</label>
                                    <input type="text" class="form-control form-control-user2" id="inputTerminal" name="txt_nama_terminal" placeholder="Ex: Tawang Alun" />
                                  </div>
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputAlamat" class="form-label">Alamat Terminal</label>
                                    <textarea class="form-control form-textarea-user" id="inputAlamat" name="txt_detail_alamat_terminal" placeholder="Ex: Jl. Dharmawangsa"></textarea>
                                  </div>
                                  <div class="col-lg-12 mb-3">
                                    <label for="inputProvinsi" class="form-label">Provinsi</label>
                                    <select class="form-select form-select-user" aria-label=".form-select-sm example" name="d_provinsi_terminal" id="propinsi" >
                                      <option disabled selected>Pilih Provinsi</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputKabupaten" class="form-label">Kota</label>
                                    <select class="form-select form-select-user" aria-label=".form-select-sm example" name="d_kabupaten_terminal" id="kabupaten">
                                      <option disabled selected>Pilih kota</option>
                                    </select>
                                  </div>
                                  <div class="col-lg-6 mb-3">
                                    <label for="inputKecamatan" class="form-label">Kecamatan</label>
                                    <select class="form-select form-select-user" aria-label=".form-select-sm example" name="d_kecamatan_terminal" id="kecamatan">
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
                    </div>
                  </div>
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
