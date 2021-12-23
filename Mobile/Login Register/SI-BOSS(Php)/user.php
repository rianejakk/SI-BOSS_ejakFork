<?php

include 'connection.php';

if ($_POST) {
    
    $email_user =  htmlspecialchars($_POST['email_user']);
    $query = $connection->prepare("SELECT * FROM user WHERE email_user=:email_user");
    $query->execute(['email_user' => $email_user]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);
}