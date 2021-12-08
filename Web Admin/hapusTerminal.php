<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;

if(!$obj->detailTerminal($_GET['id'])) die ("Error: Id tidak ada");
    if($obj->deleteTerminal($obj->id)){
        echo '<div class="alert alert-success">Data Berhasil dihapus</div>';
        header("Location: sumberData.php");
    } else {
        echo '<div class="alert alert-success">Data gagal dihapus</div>';
        header("Location: sumberData.php");
    }

?>