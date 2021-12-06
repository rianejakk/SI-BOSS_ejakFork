<?php
session_start();

if(!isset($_SESSION['email'])){
  header("Location: index.php");
  exit();
}
print_r($_SESSION);
print_r($_COOKIE);
?>