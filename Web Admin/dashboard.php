<?php
require('koneksi.php');
$email = $_GET['nama_lengkap_admin'];
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
            <li class="sidebar-heading mb-2 p-0">List Menu</li>
            <li class="nav-item active mb-1">
                <a href="#" class="focusMenu">
                    <div class="frame-ico">
                        <img class="ico" src="img/ico/icoDash_noFill.png" alt="logo1" data-bs-toggle="collapse" data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard" />
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

            <li class="nav-item">
                <a href="#" class="focusMenu">
                    <div class="frame-ico">
                        <img class="ico2" src="img/ico/icoBus_noFill.png" alt="logo1" />
                    </div>
                    <span class="link_name">Data Bus</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Data Bus</a></li>
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
                        <div class="profile_name">Budi Santoso <?php echo $email;?></div>
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
                            <span class="RobotoReg14">Budi Santoso <?php echo $email;?></span>
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
            <div class="col-lg-8">
                <div class="colorSecondary2 shadow roundedPanel" style="height: 500px">
                    <!-- Tabs navs -->
                    <ul class="nav nav-tabs mb-3 bg-white pt-2 px-4 roundedTab custShadow" id="ex1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tab-1" data-bs-toggle="tab" data-bs-target="#tabs-1" type="button" role="tab" aria-controls="tabs-1" aria-selected="true">Dashboard</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-2" data-bs-toggle="tab" data-bs-target="#tabs-2" type="button" role="tab" aria-controls="tabs-2" aria-selected="false">Grafik</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-3" data-bs-toggle="tab" data-bs-target="#tabs-3" type="button" role="tab" aria-controls="tabs-3" aria-selected="false">Log</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-4" data-bs-toggle="tab" data-bs-target="#tabs-4" type="button" role="tab" aria-controls="tabs-4" aria-selected="false">Pengaturan</button>
                        </li>
                    </ul>
                    <div class="tab-content mb-5 px-4" id="ex1-content">
                        <div class="tab-pane fade show active" id="tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                            <div class="responsive-map shadow">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.0431495410394!2d113.62862401436116!3d-8.198407984497482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69176d9e76d41%3A0x4e4c6e9a855a4fdf!2sTerminal%20Tawang%20Alun%20Jember!5e0!3m2!1sid!2sid!4v1637845956332!5m2!1sid!2sid"
                                    width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">Tab 2 content</div>
                        <div class="tab-pane fade" id="tabs-3" role="tabpanel" aria-labelledby="tab-3">Tab 3 content</div>
                        <div class="tab-pane fade" id="tabs-4" role="tabpanel" aria-labelledby="tab-4">Tab 4 content</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                <div class="bg-white shadow text-center roundedPanel pt-3 px-4" style="height: 500px">
                    <span class="kalenderHead">Kalender</Span>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content w-100">
                                <div class="calendar-container">
                                    <div class="calendar">
                                        <div class="year-header">
                                            <span class="left-button fa fa-chevron-left" id="prev"> </span>
                                            <span class="year" id="label"></span>
                                            <span class="right-button fa fa-chevron-right" id="next"> </span>
                                        </div>
                                        <table class="months-table w-100">
                                            <tbody>
                                                <tr class="months-row">
                                                    <td class="month">Jan</td>
                                                    <td class="month">Feb</td>
                                                    <td class="month">Mar</td>
                                                    <td class="month">Apr</td>
                                                    <td class="month">May</td>
                                                    <td class="month">Jun</td>
                                                    <td class="month">Jul</td>
                                                    <td class="month">Aug</td>
                                                    <td class="month">Sep</td>
                                                    <td class="month">Oct</td>
                                                    <td class="month">Nov</td>
                                                    <td class="month">Dec</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="days-table w-100">
                                            <td class="day">Sun</td>
                                            <td class="day">Mon</td>
                                            <td class="day">Tue</td>
                                            <td class="day">Wed</td>
                                            <td class="day">Thu</td>
                                            <td class="day">Fri</td>
                                            <td class="day">Sat</td>
                                        </table>
                                        <div class="frame">
                                            <table class="dates-table w-100">
                                                <tbody class="tbody"></tbody>
                                            </table>
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
</body>

</html>