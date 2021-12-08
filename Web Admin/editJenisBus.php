<?php
    require ('koneksi.php');
    require ('query.php');
    $obj = new crud;

    if(!$obj->detailJenisBus($_GET['txt_id_jenis'])) die ("Error: Id tidak ada");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $jenis = $_POST['txt_jenis'];
    $fasilitas = $_POST['txt_fasilitas'];
    if($obj->updateJenisBus($jenis, $fasilitas, $obj->id_jenis)){
        echo '<div class="alert alert-success">Data Berhasil disimpan</div>';
        header("Location: sumberData.php");
    } else {
        echo '<div class="alert alert-success">Data gagal disimpan</div>';
        header("Location: sumberData.php");
    }
}
?>