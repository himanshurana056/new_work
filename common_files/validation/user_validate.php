<?php

include_once('common_files/db_connect.php');

class Validations {

    private function validateEmail($mail) {
        $dbConnect = new Dbconnect;
        $conn = $dbConnect->connectDB();
        $sql = "SELECT * FROM users where email = '$mail'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            
            return true;
        } else {
            return false;
        }
    }


public function userValidate($data){
           
                $errors = [];
                if(empty($data['first_name'])) {
                    $errors['first_name'] = "You must enter your first_name";
                }
                    
                
                if(empty($data['last_name'])) {
                    $errors['last_name'] = "You must enter your last_name";
                }
            
                
                if(empty($data['address'])) {
                    $errors['address'] = "You must enter your address";
                }
                    
                if(empty($data['email'])) {
                    $errors['email'] = "You must enter your email id";
                } else {
                    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                        $errors['email'] = "Invalid email format"; 
                    }

                    if ($this->validateEmail($data['email'])) {
                        $errors['email'] = "Email already exists"; 
                    }
                }

                
                if(empty($data['password'])) {
                    $errors['password'] = "You must enter your password";
                }

                if(empty($data['confirm_password'])) {
                    $errors['confirm_password'] = "You must enter the confirm_password";
                }

                if (!empty($data['password']) && !empty($data['confirm_password']) && ($data['password'] != $data['confirm_password'])) {
                    $errors['confirm_password'] = "Password and confirm password doesn't match!";
                }
                
                if(empty($data['zip_code'])) {
                    $errors['zip_code'] = "You must enter your zip_code";
                }
                    
                if(empty($data['gender'])) {
                    $errors['gender'] = "You must choose your catogery";
                }
            
                if(empty($data['state'])) {
                    $errors['state'] = "You must choose your state";
                }
                if(empty($data['city'])) {
                    $errors['city'] = "You must enter your city";
                }               
        
            return $errors;
        }
    
}
