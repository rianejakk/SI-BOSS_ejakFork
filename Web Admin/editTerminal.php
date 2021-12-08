<?php
    require ('koneksi.php');
    require ('query.php');
    $obj = new crud;

    // $idTerminal = $_GET['txt_id_terminal'];
    // $namaTerminal = $_GET['txt_nama_terminal'];
    // $alamatTerminal = $_GET['txt_detail_alamat_terminal'];
    // $provinsiTerminal= $_GET['d_provinsi_terminal'];
    // $kabupatenTerminal= $_GET['d_kabupaten_terminal'];
    // $kecamatanTerminal= $_GET['d_kecamatan_terminal'];
    // if(!$obj->detailTerminal($idTerminal)) die ("Error: Id tidak ada");
    //     if($obj->updateTerminal($namaTerminal, $alamatTerminal, $provinsiTerminal, $kabupatenTerminal, $kecamatanTerminal, $idTerminal)){
    //         echo '<div class="alert alert-success">Data Berhasil disimpan</div>';
    //         header("Location: sumberData.php");
    //     } else {
    //         echo '<div class="alert alert-success">Data gagal disimpan</div>';
    //         header("Location: sumberData.php");
    //     }

    if(!$obj->detailTerminal($_GET['txt_id_terminal'])) die ("Error: Id tidak ada");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $namaTerminal = $_POST['txt_nama_terminal'];
    $alamatTerminal = $_POST['txt_detail_alamat_terminal'];
    $provinsi = $_POST['d_provinsi_terminal'];
    $kabupaten = $_POST['d_kabupaten_terminal'];
    $kecamatan = $_POST['d_kecamatan_terminal'];
    if($obj->updateData($namaTerminal, $alamatTerminal, $provinsi, $kabupaten, $kecamatan->id)){
        echo '<div class="alert alert-success">Data Berhasil disimpan</div>';
        header("Location: sumberData.php");
    } else {
        echo '<div class="alert alert-success">Data gagal disimpan</div>';
        header("Location: sumberData.php");
    }
}
?>


