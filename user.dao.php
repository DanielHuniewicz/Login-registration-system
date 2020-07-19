<?php

require_once 'init.php';

class UserDAO{

    public $db;

    public function __construct(database $db){

        $this ->db = $db;
    }

    public function getAll() : array{

        $query = 'SELECT * FROM `users`';   
        $rows = $this->db->getRows($query);
        $userObjects = [];
        foreach ($rows as $row){

            $userObjects[] = $this->getUserObject($row);
        }

        return $userObjects;
    }

    public function getAdmins() : array{

        $query = 'SELECT * FROM `users` WHERE admin = "1"';   
        $rows = $this->db->getRows($query);
        $userObjects = [];
        foreach ($rows as $row){

            $userObjects[] = $this->getUserObject($row);
        }

        return $userObjects;
    }

    public function getUser($login){

        $query = sprintf(("SELECT * FROM users WHERE login = '%s'"),
        mysqli_real_escape_string($db,$login));
        $row = $this->db->getRow($query);

        return $this->getUserObject($row);
    }

    public function getUserObject(array $row) : User {

       // $userObject = new User();

        if(!empty($row)){
    
            return  UserFactory::Create($row);
        }

        return new UserBasic();
    }

    public function add(User $user){

        $query = "INSERT INTO `users` (`login`, `pass`) VALUES ('{$user->login}', '{$user->pass}');";
        return $this->db->query($query);
    }

    public function edit(User $user){

        $query = 'UPDATE `users` SET `wiek` = "'.$user->age.'", `telefon` = "'.$user->phone.'", `miejscowosc` = "'.$user->place.'"  WHERE `login` = "'.$user->login.'"';
        return $this->db->query($query);
    }

    public function delete($user){

        $query = "DELETE FROM users  WHERE login = '$user';";
        return $this->db->query($query);
    }
}
?>