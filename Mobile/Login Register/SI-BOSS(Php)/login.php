<?php

include 'connection.php';

if($_POST){

    //Data
    $email_user = $_POST['email_user'] ?? '';
    $password_user = $_POST['password_user'] ?? '';
    // $nik_user = $_POST['nik_user'] ?? '';

    $response = []; //Data Response

    //Cek email didalam databse
    $userQuery = $connection->prepare("SELECT * FROM user where email_user =:email_user");
    $userQuery->execute([':email_user' => $email_user]);
    $query = $userQuery->fetch(PDO::FETCH_ASSOC);
    // echo json_encode($query); die();
    
    // kalau data nya tidak ada di dalam database
    if($userQuery->rowCount() == 0){
        $response['status'] = false;
        $response['message'] = "Email Tidak Terdaftar";
    } else {
        // Ambil password di db
        
        $passwordDB = $query['password_user'];
        // echo json_encode($password); die();


        if(password_verify($password_user, $passwordDB)){
            $response['status'] = true;
            $response['message'] = "Login Berhasil";
            $response['data'] = [
                'email_user' => $query['email_user'],
                'nama_user' => $query ['nama_user']
                // ,
                // 'nik_user' => $query['nik_user']
            ];
        } else {
            $response['status'] = false;
            $response['message'] = "Password anda salah";
        }
    }

    //Jadikan data JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //Print
    echo $json;

}