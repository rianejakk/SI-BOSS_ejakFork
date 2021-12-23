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
    $nama_bus = $_POST['txt_nama_bus'];
    $harga = $_POST['txt_harga'];
    $status_bus = $_POST['txt_status_bus'];
    $jumlah_kursi = $_POST['txt_jumlah_kursi'];
    $jenis_bus = $_POST['txt_jenis_bus'];
    $fasilitas = $_POST['txt_fasilitas'];
    $foto_bus = $_POST['txt_foto_bus'];
    $id_jenis = $_POST['txt_id_jenis'];
    $id_rute = $_POST['txt_id_rute'];
    
    if($obj->insertBus($nama_bus, $harga, $status_bus, $jumlah_kursi, $foto_bus, $id_jenis, $id_rute)){
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
        <li><hr></li>
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
        <li class="nav-item active">
          <a href="dataBus.php" class="focusMenu">
            <div class="frame-ico">
              <img class="ico2" src="img/ico/icoBus_Fill.png" alt="logo1" />
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
          <a href="dataLaporan.php" class="focusMenu">
            <div class="frame-ico">
              <img class="ico2" src="img/ico/icoReport_noFill.png" alt="logo1" />
            </div>
            <span class="link_name">Laporan</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="dataLaporan.php">Laporan</a></li>
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
                  <div class="RobotoBold18 text-white">
                    <?php
                        $data = $obj->lihatBus();
                        $num = $data->rowCount();
                        echo $num;
                      ?><span> Bus</span></div>
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
                  <div class="RobotoBold18 text-white">
                  <?php
                        $data = $obj->lihatPemesanan();
                        $num = $data->rowCount();
                        echo $num;
                      ?> Pesanan</div>
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
                  <div class="RobotoBold18 text-white"><span>Rp.</span>
                    <?php
                      $data = $obj->lihatPemesanan();
                                $no = 1;
                                if($data->rowCount()>0){
                                  if($sesLvl == 1){
                                      $dis = "";
                                  } else{
                                      $dis = "disabled";
                                  }
                                  while($row=$data->fetch(PDO::FETCH_ASSOC)){
                                    $no++;
                                    $hargatotal[$no] = $row['total_bayar'];
                                  }
                                  echo "".array_sum($hargatotal);
                                  }?></div>
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
                <span class="m-0"><b>Tabel Data Bus</b></span>
              </div>
              <div class="btnAction float-end">
                <button class="btn btn-light text-dark btn-circle custShadow2 me-2" data-bs-toggle="modal" data-bs-target="#tambahDataBus"><i class="fas fa-plus" data-bs-toggle="tooltip" title="Tambah Data"></i></button>
                <button class="btn btn-light text-danger btn-circle custShadow2" data-bs-toggle="modal" data-bs-target="#deleteDataBus"><i class="fas fa-trash" data-bs-toggle="tooltip" title="Hapus Data"></i></button>
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
                      <th class="no">ID</th>
                      <th class="foto">Foto</th>
                      <th class="nama">Nama Bus</th>
                      <th class="detailBus">Harga</th>
                      <th class="status">Status Bus</th>
                      <th class="kursi">Kursi</th>
                      <th class="jenis">Jenis</th>
                      <th class="fasilitas">Fasilitas</th>
                      <th class="tanggal">Tanggal Berangkat</th>
                      <th class="pemberangkatan">Pemberangkatan</th>
                      <th class="tujuan">Tujuan</th>
                      <th class="waktu">Waktu Berangkat</th>
                      <th class="waktuTiba">Waktu Tiba</th>
                      <!-- <th class="detailRute">Detail Rute</th> -->
                    </tr>
                  </thead>
                  <tbody>
                              <?php
                                $data = $obj->lihatBus();
                                $no = 1;
                                if($data->rowCount()>0){
                                  if($sesLvl == 1){
                                      $dis = "";
                                  } else{
                                      $dis = "disabled";
                                  }
                                  while($row=$data->fetch(PDO::FETCH_ASSOC)){
                                    $id_bus = $row['id_bus'];
                                    $nama_bus = $row['nama_bus'];
                                    $harga = $row['harga'];
                                    $status_bus = $row['status_bus'];
                                    $jumlah_kursi = $row['jumlah_kursi'];
                                    $foto_bus = $row['foto_bus'];
                                    // $id_jenis = $row['id_jenis'];
                                    $jenis_bus = $row['jenis'];
                                    $fasilitas = $row['fasilitas'];
                                    $tanggal_pemberangkatan = $row['tanggal_pemberangkatan'];
                                    $pemberangkatan = $row['pemberangkatan'];
                                    $waktu_berangkat = $row['waktu_berangkat'];
                                    $tujuan = $row['tujuan'];
                                    $waktu_tiba = $row['waktu_tiba'];
                                    // $id_terminal = $row['id_terminal'];
                                    // $nama_terminal = $row['nama_terminal'];
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
                                    <button class="btn btn-success btn-user btn-circle" aria-label="EditModal" data-bs-toggle="modal" data-bs-target="#editDataBus<?php echo $id_bus ?>" value="edit">
                                      &nbsp;<i class="fa fa-edit fa-sm" data-bs-toggle="tooltip" title="Edit"></i>
                                    </button>
                                  </a>
                                  <a href="#" class="actionBtn" aria-label="Delete">
                                    <button class="btn btn-danger btn-user btn-circle" aria-label="DeleteModal" data-bs-toggle="modal" data-bs-target="#deleteDataBus<?php echo $id_bus ?>" value="hapus">
                                      <i class="fa fa-trash fa-sm" data-bs-toggle="tooltip" title="Delete"></i>
                                    </button>
                                  </a>

                                   <!-- Edit Modal -->
                                  <div id="editDataBus<?php echo $id_bus ?>" class="modal fade">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content modal-edit">
                                        <form role="form" action="editBus.php" method="POST" enctype="multipart/form-data">
                                          <?php
                                            $query = $obj->pilihBus($id_bus);
                                            while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                                          ?>
                                        <div class="modal-header">
                                          <h4 class="modal-title">Edit Data Bus</h4>
                                          <button type="button" class="btn btn-danger btn-circle btn-user2 shadow" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                                            <i class="fa fa-times fa-sm"></i>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group" hidden>
                                                <label for="InputId" class="form-label">Id</label>
                                                <input type="text" class="form-control form-control-user2" id="inputId" name="txt_id_bus" value="<?php echo $id_bus?>" placeholder="" readonly/>
                                              </div>
                                              <div class="form-group">
                                                <label for="InputFotoBus" class="form-label">Foto Bus</label>
                                                <div class="img-div">
                                                  <div class="img-placeholder" onClick="triggerClick()">
                                                    <img src="img/ico/IcoeditBusW.png" alt="" />
                                                  </div>
                                                  <img src="img/ico/IcoeditBus.png" onClick="triggerClick()" id="profileDisplay" />
                                                </div>
                                                <input type="file" name="txt_foto_bus" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none" />
                                                  <a href="#" class="float-end view text-secondary"> Lihat Foto </a>
                                              </div>
                                                <div class="form-group">
                                                  <label for="InputStatusBus" class="form-label d-block">Status</label>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="txt_status_bus" id="exampleRadios1" value="Operasional" checked />
                                                    <label class="form-check-label" for="exampleRadios1"> Operasional </label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="txt_status_bus" id="exampleRadios2" value="Pemeliharaan" />
                                                    <label class="form-check-label" for="exampleRadios2"> Pemeliharaan/Maintenance </label>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="inputFoto" class="form-label">Jumlah Kursi</label>
                                                  <input type="number" class="form-control form-control-user2" id="inputFoto" name="txt_jumlah_kursi" placeholder="Ex:" value="<?php echo $jumlah_kursi?>"/>
                                                </div>
                                                <div class="form-group">
                                                  <label for="InputTarif" class="form-label">Tarif</label>
                                                  <div class="input-group mb-3">
                                                    <span class="input-group-text tarif">Rp</span>
                                                    <input type="number" class="form-control form-control-user2" aria-label="Amount (to the nearest dollar)" name="txt_harga" value="<?php echo $harga?>">
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="InputNamaBus" class="form-label">Nama Bus</label>
                                                  <input type="text" class="form-control form-control-user2" id="inputNama" name="txt_nama_bus" placeholder="Ex: Pahala Kencana" value="<?php echo $nama_bus?>"/>
                                                </div>
                                                <div class="form-group">
                                                  <label for="InputJenisBus" class="form-label">Jenis Bus</label>
                                                  <select class="form-select form-select-user select-md" aria-label=".form-select-sm example" required data-parsley-required-message="Harap pilih data jenis !!!" name="txt_id_jenis">
                                                    <option disabled selected>Pilih Jenis Bus</option>
                                                    <?php
                                                    $datas = $obj->lihatJenisBus();
                                                    $no = 1;
                                                    if($datas->rowCount()>0){
                                                      if($sesLvl == 1){
                                                          $dis = "";
                                                      } else{
                                                          $dis = "disabled";
                                                      }
                                                      while($row=$datas->fetch(PDO::FETCH_ASSOC)){
                                                        $id_jeniss = $row['id_jenis'];
                                                        $jeniss = $row['jenis'];
                                                        $fasilitass = $row['fasilitas'];
                                                    ?>
                                                    <option value="<?php echo $id_jeniss;?>"><?php echo $jeniss;?></option>
                                                  <?php 
                                                  }}
                                                  ?>
                                                  </select>
                                                </div>
                                                <div class="form-group">
                                                  <label for="InputJenisBus" class="form-label">Rute</label>
                                                  <select class="form-select form-select-user select-md" aria-label=".form-select-sm example" required data-parsley-required-message="Harap pilih data rute !!!" name="txt_id_rute">
                                                    <option disabled selected>Pilih Rute</option>
                                                    <?php
                                                    $datasd = $obj->lihatRute();
                                                    $no = 1;
                                                    if($datasd->rowCount()>0){
                                                      if($sesLvl == 1){
                                                          $dis = "";
                                                      } else{
                                                          $dis = "disabled";
                                                      }
                                                      while($row=$datasd->fetch(PDO::FETCH_ASSOC)){
                                                        $id_rutes = $row['id_rute'];
                                                        $pemberangkatans = $row['pemberangkatan'];
                                                        $tujuans = $row['tujuan'];
                                                    ?>
                                                    <option value="<?php echo $id_rutes;?>"><?php echo $pemberangkatans, " - ", $tujuans;?></option>
                                                  <?php 
                                                  }}
                                                  ?>
                                                  </select>
                                                </div>
                                                <div class="form-group">
                                                  <label for="InputTglPemberangkatan" class="form-label">Tanggal Pemberangkatan</label>
                                                  <input type="date" class="form-control form-control-user2" id="InputTglPemberangkatan" name="txt_tanggal_pemberangkatan" value="<?php echo $tanggal_pemberangkatan?>">
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
                                  </div>

                                  <!-- Delete Modal -->
                                  <div id="deleteDataBus<?php echo $id_bus; ?>" class="modal fade">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <form action="">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Hapus Bus</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
                                          </div>
                                          <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus data bus ini ?</p>
                                            <p class="text-warning"><small>Perlu hati-hati karena data akan hilang selamanya !</small></p>
                                          </div>
                                          <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                                            <a class="btn btn-danger" href="hapusBus.php?id_bus=<?php echo $id_bus; ?>">Hapus</a>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                                <td>B000<?php echo $id_bus; ?></td>
                                <td><img src="fotoBus/<?php echo $foto_bus; ?>" class='img-fluid'></td>
                                <td><?php echo $nama_bus; ?></td>
                                <td>Rp. <?php echo number_format($harga); ?></td>
                                <td><?php echo $status_bus; ?></td>
                                <td><?php echo $jumlah_kursi; ?> kursi</td>
                                <td><?php echo $jenis_bus;?></td>
                                <td><?php echo $fasilitas;?></td>
                                <td><?php echo $tanggal_pemberangkatan?></td>
                                <td><?php echo $pemberangkatan?></td>
                                <td><?php echo $tujuan?></td>
                                <td><?php echo $waktu_berangkat;?> WIB</td>
                                <td><?php echo $waktu_tiba;?> WIB</td>
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
            <div id="tambahDataBus" class="modal fade">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content modal-edit">
                            <form role="form" action="tambahBus.php" method="POST">
                              <div class="modal-header">
                                <h4 class="modal-title">Tambah Data Bus</h4>
                                <button type="button" class="btn btn-danger btn-circle btn-user2 shadow" data-bs-dismiss="modal" aria-label="Close" aria-hidden="true">
                                  <i class="fa fa-times fa-sm"></i>
                                </button>
                              </div>
                              <div class="modal-body">
                              <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group" hidden>
                                                <label for="InputId" class="form-label">Id</label>
                                                <input type="text" class="form-control form-control-user2" id="inputId" name="txt_id_bus"  placeholder="" readonly/>
                                              </div>
                                              <div class="form-group">
                                                <label for="InputFotoBus" class="form-label">Foto Bus</label>
                                                <div class="img-div">
                                                  <div class="img-placeholder" onClick="triggerClick()">
                                                    <img src="img/ico/IcoeditBusW.png" alt="" />
                                                  </div>
                                                  <img src="img/ico/IcoeditBus.png" onClick="triggerClick()" id="profileDisplay" />
                                                </div>
                                                <input type="file" name="txt_foto_bus" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none" />
                                                  <a href="#" class="float-end view text-secondary"> Lihat Foto </a>
                                              </div>
                                                <div class="form-group">
                                                  <label for="InputStatusBus" class="form-label d-block">Status</label>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="txt_status_bus" id="exampleRadios1" value="Operasional" checked />
                                                    <label class="form-check-label" for="exampleRadios1"> Operasional </label>
                                                  </div>
                                                  <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="txt_status_bus" id="exampleRadios2" value="Pemeliharaan" />
                                                    <label class="form-check-label" for="exampleRadios2"> Pemeliharaan/Maintenance </label>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="inputFoto" class="form-label">Jumlah Kursi</label>
                                                  <input type="number" class="form-control form-control-user2" id="inputFoto" name="txt_jumlah_kursi" placeholder="Ex:" />
                                                </div>
                                                <div class="form-group">
                                                  <label for="InputTarif" class="form-label">Tarif</label>
                                                  <div class="input-group mb-3">
                                                    <span class="input-group-text tarif">Rp</span>
                                                    <input type="number" class="form-control form-control-user2" aria-label="Amount (to the nearest dollar)" name="txt_harga" >
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-md-6">
                                              <div class="form-group">
                                                  <label for="InputNamaBus" class="form-label">Nama Bus</label>
                                                  <input type="text" class="form-control form-control-user2" id="inputNama" name="txt_nama_bus" placeholder="Ex: Pahala Kencana" />
                                                </div>
                                                <div class="form-group">
                                                  <label for="InputJenisBus" class="form-label">Jenis Bus</label>
                                                  <select class="form-select form-select-user select-md" aria-label=".form-select-sm example" required data-parsley-required-message="Harap pilih data jenis !!!" name="txt_id_jenis">
                                                    <option disabled selected>Pilih Jenis Bus</option>
                                                    <?php
                                                    $datas = $obj->lihatJenisBus();
                                                    $no = 1;
                                                    if($datas->rowCount()>0){
                                                      if($sesLvl == 1){
                                                          $dis = "";
                                                      } else{
                                                          $dis = "disabled";
                                                      }
                                                      while($row=$datas->fetch(PDO::FETCH_ASSOC)){
                                                        $id_jeniss = $row['id_jenis'];
                                                        $jeniss = $row['jenis'];
                                                    ?>
                                                    <option value="<?php echo $id_jeniss;?>"><?php echo $jeniss;?></option>
                                                  <?php 
                                                  }}
                                                  ?>
                                                  </select>
                                                </div>
                                                <div class="form-group">
                                                  <label for="InputJenisBus" class="form-label">Rute</label>
                                                  <select class="form-select form-select-user select-md" aria-label=".form-select-sm example" required data-parsley-required-message="Harap pilih data rute !!!" name="txt_id_rute">
                                                    <option disabled selected>Pilih Rute</option>
                                                    <?php
                                                    $datasd = $obj->lihatRute();
                                                    $no = 1;
                                                    if($datasd->rowCount()>0){
                                                      if($sesLvl == 1){
                                                          $dis = "";
                                                      } else{
                                                          $dis = "disabled";
                                                      }
                                                      while($row=$datasd->fetch(PDO::FETCH_ASSOC)){
                                                        $id_rutes = $row['id_rute'];
                                                        $pemberangkatans = $row['pemberangkatan'];
                                                        $tujuans = $row['tujuan'];
                                                    ?>
                                                    <option value="<?php echo $id_rutes;?>"><?php echo $pemberangkatans, " - ", $tujuans;?></option>
                                                  <?php 
                                                  }}
                                                  ?>
                                                  </select>
                                                </div>
                                                <div class="form-group">
                                                  <label for="InputTglPemberangkatan" class="form-label">Tanggal Pemberangkatan</label>
                                                  <input type="date" class="form-control form-control-user2" id="InputTglPemberangkatan" name="txt_tanggal_pemberangkatan" >
                                                </div>
                                                
                                              </div>
                                              <div class="modal-footer">
                                                <button class="btn btn-secondary roundedBtn" type="button" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn text-white colorPrimary roundedBtn" name="simpan">Simpan</button>
                                              </div>
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
    <script src="jquery/jquery-3.6.0.min.js"></script>
    <script src="plugin/js/bootstrap.bundle.min.js"></script>
    <script src="plugin/jquery-easing/jquery.easing.min.js"></script>
    <script src="plugin/js/script.js"></script>
    <script src="plugin/js/calender.js"></script>
    <script src="plugin/datatables/DataTables-1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="plugin/datatables/DataTables-1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="plugin/js/datatables-demo.js"></script>
    <script src="plugin/js/javascript.js"></script>
    <script src="plugin/js/UpImg.js"></script>
  </body>
</html>
