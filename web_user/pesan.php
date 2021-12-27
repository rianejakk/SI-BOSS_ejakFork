<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $nik_user = $_POST['txt_nik_user'];
  $id_bus = $_POST['txt_id_bus'];
  $waktu_pemesanan = $_POST['txt_waktu_pemesanan'];
  $jumlah_kursi_pesan = $_POST['txt_jumlah_kursi_pesan'];
  $total_bayar = $_POST['txt_total_bayar'];
  if($obj->insertPemesanan($nik_user, $id_bus, $waktu_pemesanan, $jumlah_kursi_pesan, $total_bayar)){
    // echo '<div class="alert alert-success">Terminal Berhasil Ditambahkan</div>';
    header("Location: detailPemesanan.php");
  } else{
    // echo '<div class="alert alert-danger">Terminal Gagal Ditambahkan</div>';
    header("Location: detailPemesanan.php");
  }
}

