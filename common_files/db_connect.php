<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
class Dbconnect
{
    public function connectDB() {
        $conn = new mysqli("localhost", "root", "hms@2019", "mydb");
            
        if ($conn->connect_error) {
            die ($sql); ("Connection failed: ". $conn->connect_error);
        }
        return $conn;
        echo "connect successfully";
    }

}


?>