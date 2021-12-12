<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;

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
  if($obj->insertAdministrator($nama, $jenis_kelamin, $alamat, $no_hp, $foto, $id_level, $id_terminal, $email, $password)){
    echo '<div class="alert alert-success">Data Berhasil Ditambahkan</div>';
    header("Location: dataAkun.php");
  } else{
    echo '<div class="alert alert-danger">Data Gagal Ditambahkan</div>';
    header("Location: dataAkun.php");
  }
}


