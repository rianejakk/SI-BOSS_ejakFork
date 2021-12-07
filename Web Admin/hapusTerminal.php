<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;

if(!$obj->detailData($_GET['id'])) die ("Error: Id tidak ada");
    if($obj->delete($obj->id)){
        echo '<div class="alert alert-success">Data Berhasil disimpan</div>';
        header("Location: tables.php");
    } else {
        echo '<div class="alert alert-success">Data gagal disimpan</div>';
        header("Location: tables.php");
    }

?>