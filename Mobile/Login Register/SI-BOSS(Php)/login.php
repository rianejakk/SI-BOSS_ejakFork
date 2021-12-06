<?php

include 'connection.php';

if($_POST){

    //Data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $response = []; //Data Response

    //Cek username didalam databse
    $userQuery = $connection->prepare("SELECT * FROM user where username =:username");
    $userQuery->execute([':username' => $username]);
    $query = $userQuery->fetch(PDO::FETCH_ASSOC);
    // echo json_encode($query); die();
    
    // kalau data nya tidak ada di dalam database
    if($userQuery->rowCount() == 0){
        $response['status'] = false;
        $response['message'] = "Username Tidak Terdaftar";
    } else {
        // Ambil password di db
        
        $passwordDB = $query['password'];
        // echo json_encode($password); die();


        if(password_verify($password, $passwordDB)){
            $response['status'] = true;
            $response['message'] = "Login Berhasil";
            $response['data'] = [
                'username' => $query['username'],
                'name' => $query ['name'],
                'user_id' => $query['id']
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