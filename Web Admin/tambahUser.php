<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nik_user = $_POST['txt_nik_user'];
    $nama_user = $_POST['txt_nama_user'];
    $tempat_lahir_user = $_POST['txt_tempat_lahir_user'];
    $tanggal_lahir_user = $_POST['txt_tanggal_lahir_user'];
    $jenis_kelamin_user = $_POST['Rbtn_jenis_kelamin_user'];
    $alamat_user = $_POST['txt_alamat_user'];
    $no_hp_user = $_POST['txt_no_hp_user'];
    $foto_user = $_POST['txt_foto_user'];
    $email_user = $_POST['txt_email_user'];
    $password_user = $_POST['txt_password_user'];
    if($obj->insertUser($nik_user, $nama_user, $tempat_lahir_user, $tanggal_lahir_user, $jenis_kelamin_user, $alamat_user, $no_hp_user, $foto_user, $email_user, $password_user)){
        echo '<div class="alert alert-success">Data Berhasil Ditambahkan</div>';
        header("Location: dataAkun.php");
    } else{
        echo '<div class="alert alert-danger">Data Gagal Ditambahkan</div>';
        header("Location: dataAkun.php");
    }
}


