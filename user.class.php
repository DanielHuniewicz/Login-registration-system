<?php

require_once 'init.php';

abstract class User {

    public $login;
    public $pass;
    public $email;
    public $age;
    public $phone;
    public $place;
    public $admin;

    abstract public function isAdmin();
    abstract public function getName();
}
?>