<?php

include 'connection.php';

if($_POST){

    //POST DATA
    $email_user = filter_input(INPUT_POST, 'email_user', FILTER_SANITIZE_STRING);
    $password_user = htmlspecialchars(filter_input(INPUT_POST, 'password_user', FILTER_SANITIZE_STRING));
    $nama_user = filter_input(INPUT_POST, 'nama_user', FILTER_SANITIZE_STRING);

    $response = [];

    //Cek email didalam databse
    $userQuery = $connection->prepare("SELECT * FROM user where email_user = ?");
    $userQuery->execute(array($email_user));

    // Cek email apakah ada tau tidak
    if($userQuery->rowCount() != 0){
        // Beri Response
        $response['status']= false;
        $response['message']='Akun sudah digunakan';
    } else {
        $insertAccount = 'INSERT INTO user (email_user, password_user, nama_user) values (:email_user, :password_user, :nama_user)';
        $statement = $connection->prepare($insertAccount);

        try{
            //Eksekusi statement db
            $statement->execute([
                ':email_user' => $email_user,
                ':password_user' => password_hash($password_user, PASSWORD_BCRYPT), //enkripsi password
                ':nama_user' => $nama_user
            ]);

            //Beri response
            $response['status']= true;
            $response['message']='Akun berhasil didaftar';
            $response['data'] = [
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