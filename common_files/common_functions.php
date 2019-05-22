<?php
class CommonFunctions
{
    public function encryptPassword($password) {
        return hash('sha256', $password);
    }
}