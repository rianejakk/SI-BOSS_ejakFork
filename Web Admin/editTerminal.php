<?php
    require ('koneksi.php');
    require ('query.php');
    $obj = new crud;

    $idTerminal = $_GET['txt_id_terminal'];
    $namaTerminal = $_GET['txt_nama_terminal'];
    $alamatTerminal = $_GET['txt_detail_alamat_terminal'];
    $provinsiTerminal= $_GET['d_provinsi_terminal'];
    $kabupatenTerminal= $_GET['d_kabupaten_terminal'];
    $kecamatanTerminal= $_GET['d_kecamatan_terminal'];
    if(!$obj->detailTerminal($idTerminal)) die ("Error: Id tidak ada");
        if($obj->updateTerminal($namaTerminal, $alamatTerminal, $provinsiTerminal, $kabupatenTerminal, $kecamatanTerminal, $idTerminal)){
            echo '<div class="alert alert-success">Data Berhasil disimpan</div>';
            header("Location: sumberData.php");
        } else {
            echo '<div class="alert alert-success">Data gagal disimpan</div>';
            header("Location: sumberData.php");
        }
?>


