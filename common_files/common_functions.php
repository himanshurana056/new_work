<?php
class CommonFunctions
{
    public function encryptPassword($password) {
        return hash('sha256', $password);
    }


    public function checksession(){
        if(empty($_SESSION)){
            return false;
         } else{
        return true;
            
        }
    }


    public function userLogout(){
        if (isset($_SESSION) && $_SESSION['login']== true){
            session_destroy();
            header('Location: http://localhost/new_work/login.php');
        }else{
            die('I am already out');
        }
    }

    public function redrectToLogin(){
        if (empty($_SESSION)){
            header('Location: http://localhost/new_work/login.php');
        }
    }
}
