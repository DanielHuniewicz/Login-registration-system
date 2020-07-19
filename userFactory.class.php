<?php

require_once 'init.php';

class UserFactory {


    public static function create($row): User{


        if( $row['admin']){

            $userObject = new UserAdmin();
        } else {

            $userObject = new UserBasic();
        }
        

        $userObject->login = $row['login'];
        $userObject->pass = $row['pass'];
        $userObject->email = $row['email'];
        $userObject->age = $row['wiek'];
        $userObject->phone = $row['telefon'];
        $userObject->place = $row['Miejscowosc'];
        $userObject->admin = $row['admin'];

        return $userObject;
    }

}
?>