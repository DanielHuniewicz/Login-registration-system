<?php

require_once 'init.php';

class UserBasic extends User {

    public function getName(){

        return $this->login;
    }

    public function isAdmin(){

        return false;
    }
}
?>