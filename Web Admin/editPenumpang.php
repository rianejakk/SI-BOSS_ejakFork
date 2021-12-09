<?php
    require ('koneksi.php');
    require ('query.php');
    $obj = new crud;

    if(!$obj->detailPenumpang($_GET['txt_nik_penumpang'])) die ("Error: Id tidak ada");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama_penumpang = $_POST['txt_nama_penumpang'];
    $jenis_kelamin_penumpang = $_POST['txt_jenis_kelamin_penumpang'];
    $no_hp_penumpang = $_POST['txt_no_hp_penumpang'];
    if($obj->updatePenumpang($nama_penumpang, $jenis_kelamin_penumpang, $no_hp_penumpang, $obj->nik_penumpang)){
        echo '<div class="alert alert-success">Data Berhasil disimpan</div>';
        header("Location: sumberData.php");
    } else {
        echo '<div class="alert alert-success">Data gagal disimpan</div>';
        header("Location: sumberData.php");
    }
}
?>