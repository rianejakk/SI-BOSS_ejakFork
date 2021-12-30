<?php
    session_start();
    session_destroy();

    $cookie_name = "cookie_email";
    $cookie_value = "";
    $cookie_time = time() - (60 * 60 * 0); //1 menit
    setcookie($cookie_name, $cookie_value, $cookie_time, "/");

    $cookie_name = "cookie_password";
    $cookie_value = "";
    $cookie_time = time() - (60 * 60 * 0); //1 menit
    setcookie($cookie_name, $cookie_value, $cookie_time, "/");

    $cookie_name = "cookie_name";
    $cookie_value = $nama;
    $cookie_time = time() - (60 * 60 * 0); //1 menit
    setcookie($cookie_name, $cookie_value, $cookie_time, "/");
    header("Location: index.php");
?>