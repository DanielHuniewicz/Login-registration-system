<?php

require_once 'init.php';

class UserAdmin extends User {

    public function getName(){

        return $this->login . ' (admin)';
    }

    public function isAdmin(){

        return true;
    }
}
?>