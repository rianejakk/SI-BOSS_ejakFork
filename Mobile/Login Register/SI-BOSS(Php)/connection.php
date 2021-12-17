<?php

$connection = null;

try{
    //Config
    $host = "localhost";
    $email_user = "root";
    $password_user ="";
    $dbname = "si_boss_express";

    //Connect
    $database = "mysql:dbname=$dbname;host=$host";
    $connection = new PDO($database, $email_user, $password_user);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // if($connection){
    //     echo "Koneksi berhasil";
    // } else {
    //     echo "Koneksi gagal";
    // }




} catch (PDOException $e){
    echo "Error ! " . $e->getMessage();
    die;
}

?>