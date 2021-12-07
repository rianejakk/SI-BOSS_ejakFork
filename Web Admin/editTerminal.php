<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;

$userId = $_GET['txt_id'];
$userMail = $_GET['txt_email'];
$userPass = $_GET['txt_pass'];
$userName= $_GET['txt_nama'];
if(!$obj->detailData($userId)) die ("Error: Id tidak ada");
    if($obj->updateData($userMail, $userPass, $userName, $userId)){
        echo '<div class="alert alert-success">Data Berhasil disimpan</div>';
        header("Location: tables_akun.php");
    } else {
        echo '<div class="alert alert-success">Data gagal disimpan</div>';
        header("Location: tables_akun.php");
    }


