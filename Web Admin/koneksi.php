<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "si-boss express";
    $koneksi = mysqli_connect($server, $username, $password, $db);
    //urutan pemanggilan

    //cek kokeksi gagal ke database
    if(mysqli_connect_errno()){
        echo "Koneksi gagal : ".mysqli_connect_error();
    }
?>