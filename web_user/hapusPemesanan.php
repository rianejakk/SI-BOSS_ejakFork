<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;

if(!$obj->detailPemesanan($_GET['id_pemesanan'])) die ("Error: Id tidak ada");
    if($obj->deletePemesanan($obj->id_pemesanan)){
        echo '<div class="alert alert-success">Data Berhasil dihapus</div>';
        header("Location: index.php");
    } else {
        echo '<div class="alert alert-success">Data gagal dihapus</div>';
        header("Location: index.php");
    }

?>