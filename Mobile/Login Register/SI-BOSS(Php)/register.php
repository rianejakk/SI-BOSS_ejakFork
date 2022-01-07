<?php

include 'connection.php';

if($_POST){

    //POST DATA
    $nik_user = filter_input(INPUT_POST, 'nik_user', FILTER_SANITIZE_STRING);
    $email_user = filter_input(INPUT_POST, 'email_user', FILTER_SANITIZE_STRING);
    $password_user = htmlspecialchars(filter_input(INPUT_POST, 'password_user', FILTER_SANITIZE_STRING));
    $nama_user = filter_input(INPUT_POST, 'nama_user', FILTER_SANITIZE_STRING);

    $response = [];

    //Cek nik didalam databse
    $userQuery = $connection->prepare("SELECT * FROM user where nik_user = ?");
    $userQuery->execute(array($nik_user));

    // Cek nik apakah ada tau tidak
    if($userQuery->rowCount() != 0){
        // Beri Response
        $response['status']= false;
        $response['message']='NIK sudah digunakan';
    } else {
        $insertAccount = 'INSERT INTO user (nik_user, email_user, password_user, nama_user) values (:nik_user, :email_user, :password_user, :nama_user)';
        $statement = $connection->prepare($insertAccount);

        try{
            //Eksekusi statement db
            $statement->execute([
                ':nik_user' => $nik_user,
                ':email_user' => $email_user,
                ':password_user' => password_hash($password_user, PASSWORD_BCRYPT), //enkripsi password
                ':nama_user' => $nama_user
            ]);

            //Beri response
            $response['status']= true;
            $response['message']='Akun berhasil didaftar';
            $response['data'] = [
                'nik_user' => $nik_user,
                'email_user' => $email_user,
                'nama_user' => $nama_user
            ];
        } catch (Exception $e){
            die($e->getMessage());
        }

    }
    
    //Jadikan data JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);

    //Print JSON
    echo $json;
}