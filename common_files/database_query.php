<?php
require_once('db_connect.php');


class DbQueries 
{
    public function userSave($userData, $encrypted_password ){
        $dbConnect = new Dbconnect;
        $conn = $dbConnect->connectDB();

        

        $skt= "INSERT INTO users (first_name, last_name, gender, email, encrypted_password, address, city, state, zip_code, image_upload) VALUES ('".$userData['first_name']."', '".$userData['last_name']."', '".$userData['gender']."', '".$userData['email']."', '".$encrypted_password."', '".$userData['address']."', '".$userData['city']."', '".$userData['state']."', '".$userData['zip_code']."', '".$userData['image_upload']."')";
        //echo '<pre>'; print_r($skt);die;
        if ($conn->query($skt) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }
    
    }


}


?>