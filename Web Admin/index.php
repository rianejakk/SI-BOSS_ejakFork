<?php
    require('koneksi.php');
    session_start();
    if (isset($_POST['submit'])) {
        $email = $_POST['txt_email'];
        $password = $_POST['txt_password'];

        if (!empty(trim($email)) && !empty(trim($password))) {
            $query = "SELECT * FROM administrator WHERE email = '$email'";
            $result = mysqli_query($koneksi, $query);
            $num = mysqli_num_rows($result);

            while ($row = mysqli_fetch_array($result)) {
                $id_user_admin = $row['id_user_admin'];
                $nama = $row['nama'];
                $jenis_kelamin = $row['Rbtn_jenis_kelamin'];
                $alamat = $row['alamat'];
                $no_hp = $row['no_hp'];
                $foto = $row['foto'];
                $level = $row['id_level'];
                $id_terminal = $row['id_terminal'];
                $emailVal = $row['email'];
                $passwordVal = $row['password'];
            }
            if ($num != 0) {
                if ($emailVal == $email && $passwordVal == $password) {
                    header('Location: dashboard.php?nama='.urlencode($nama));
                } else {
                    $error = 'user atau password salah!!';
                    header('Location: index.php');
                    echo $error;
                }
            } else {
                $error = 'user tidak ditemukan!!';
                header('Location: index.php');
                echo $error;
            }
        } else {
            $error = 'Data tidak boleh kosong!!';
            echo $error;
        }
    }
    ?>

<!DOCTYPE html>
<html>

<head>
    <title>Login - SI BOSS</title>
    <link rel="stylesheet" href="plugin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="plugin/font/stylesheet.css" />
    <link rel="stylesheet" href="plugin/js/bootstrap.min.js" />
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
                                        System Information Booking <br /> Online Bus <br /><span>Aman, Mudah, dan Cepat</span>
                                    </h3>
                                    <img src="img/bus1_B.png" alt="logo_bus" class="img-fluid" width="376px" />
                                </div>
                            </div>
                            <div class="col-lg-8 p-4 py-3 colorSecondary bg-img">
                                <div class="logo">
                                    <a href="#">
                                        <img src="img/logo.png" alt="" />
                                    </a>
                                </div>
                                <div class="panel o-hidden border-0 shadow">
                                    <div class="p-5">
                                        <div class="judul">
                                            <h4 class="text-gray-900 mb-5">Login <br /><span>System Information Booking Online Bus</span></h4>
                                        </div>
                                        <form action="index.php" method="POST">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail" class="form-label">Email</label>
                                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="txt_email" placeholder="Ex: budiman@siboss.com" />
                                            </div>
                                            <div class="mb-2">
                                                <label for="exampleInputPassword" class="form-label">Kata sandi</label>
                                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="txt_password" placeholder="********" />
                                            </div>
                                            <div class="mb-3 float-start">
                                                <div class="form-check small">
                                                    <input type="checkbox" class="form-check-input" id="customCheck" />
                                                    <label class="form-check-label" for="customCheck">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="mb-3 float-end">
                                                <div class="small">
                                                    <a class="small" href="#">Lupa kata sandi ?</a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="row mb-5">
                                                <div class="col-6 d-flex justify-content-end">
                                                    <button type="submit" name="submit" class="btn colorPrimary btn-login text-white btn-block py-2">Login</button>
                                                </div>
                                                <div class="col-6 d-flex justify-content-start">
                                                    <a href="registrasi.php" class="btn btn-daftar btn-block py-2">
                                                        <span>Daftar</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="d-block position-absolute markQuestion">
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
</body>

</html>