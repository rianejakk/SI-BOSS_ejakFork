<?php
    require ('koneksi.php');
    require ('query.php');
    $obj = new crud;

    if(!$obj->detailBus($_GET['txt_id_bus'])) die ("Error: Id tidak ada");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nama_bus = $_POST['txt_nama_bus'];
        $detail_bus = $_POST['txt_detail_bus'];
        $status_bus = $_POST['txt_status_bus'];
        $jumlah_kursi = $_POST['txt_jumlah_kursi'];
        $foto_bus = $_POST['txt_foto_bus'];
        $id_jenis = $_POST['txt_id_jenis'];
        $id_rute = $_POST['txt_id_rute'];
    if($obj->updateBus($nama_bus, $detail_bus, $status_bus, $jumlah_kursi, $foto_bus, $id_jenis, $id_rute, $obj->id_bus)){
        echo '<div class="alert alert-success">Data Berhasil disimpan</div>';
        header("Location: dataBus.php");
    } else {
        echo '<div class="alert alert-success">Data gagal disimpan</div>';
        header("Location: dataBus.php");
    }
}
?>