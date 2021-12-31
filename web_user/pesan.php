<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_bus = $_POST['txt_id_bus'];
  $stok_kursi = $_POST['txt_stok_kursi'];
  $nik_penumpang = $_POST['txt_nik_penumpang'];
  $nama_penumpang = $_POST['txt_nama_penumpang'];
  $jenis_kelamin_penumpang = $_POST['txt_jenis_kelamin_penumpang'];
  $no_hp_penumpang = $_POST['txt_no_hp_penumpang'];
  $id_pemesanan = $_POST['txt_id_pemesanan'];
  $jumlah_kursi_pesan = $_POST['txt_jumlah_kursi_pesan'];
  $total_bayar = $_POST['txt_total_bayar'];
  $status = $_POST['txt_status'];
  // $id_bus = $_POST['txt_id_bus'];
  if ($obj->insertPenumpang($nik_penumpang, $nama_penumpang, $jenis_kelamin_penumpang, $no_hp_penumpang)) {
    if (!$obj->detailPemesanan($id_pemesanan)) die("Error: Id tidak ada");
    if ($obj->updatePemesanan($jumlah_kursi_pesan, $total_bayar, $status, $id_pemesanan)) {
      $id = $id_pemesanan;
      $nik = $nik_penumpang;
      if ($obj->insertTiket($id_pemesanan, $nik_penumpang)) {
        if (!$obj->detailBus($id_bus)) die("Error: Id tidak ada");
    if ($obj->updateStokBus($stok_kursi, $id_bus)) {
        // echo '<div class="alert alert-success">Terminal Berhasil Ditambahkan</div>';
        header("Location: index.php");
        // echo '<div class="alert alert-success">Berhasil</div>';
      }}
    }
  } else {
    // echo '<div class="alert alert-danger">Terminal Gagal Ditambahkan</div>';
    header("Location: indext.php");
    // echo $nik_penumpang;
  }
}