<?php
require_once('db_connect.php');


class DbQueries 
{
    public function userSave($userData, $encrypted_password ){
        $dbConnect = new Dbconnect;
        $conn = $dbConnect->connectDB();

        

        $skt= "INSERT INTO users (first_name, last_name, gender, email, encrypted_password, address, city, state, zip_code, image_upload) VALUES ('".$userData['first_name']."', '".$userData['last_name']."', '".$userData['gender']."', '".$userData['email']."', '".$encrypted_password."', '".$userData['address']."', '".$userData['city']."', '".$userData['state']."', '".$userData['zip_code']."', '".$userData['image_upload']."')";
       // echo '<pre>'; print_r($skt);die;
        if ($conn->query($skt) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }
    
    }

    public function login_user($info,$commfun){
       // echo "<pre>"; print_r($info); die;
        $dbConnect = new Dbconnect;
        $conn = $dbConnect->connectDB();
        //echo "<pre>"; print_r($conn); die;
        $encrypted_password = $commfun->encryptPassword($info['password']);
        //echo "<pre>"; print_r($encrypted_password); die;
        $sql = " SELECT * FROM users WHERE email = '".$info['email']."' AND encrypted_password = '". $encrypted_password."'";
        // echo "<pre>"; print_r($conn); die;
        $result1 = mysqli_query($conn, $sql);
       // echo "<pre>"; print_r($result1); die;
        $rows = mysqli_fetch_array($result1);
        return $rows;


    }
}


?>