<?php

require_once 'init.php';

$login = $_POST['login'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$place = $_POST['place'];

if(!empty($login) && !empty($age) && !empty($phone) && !empty($place)){

    $myDb = new database();
    $DAO = new UserDAO($myDb);
    $user = $DAO->getUser($login);

    $user->age=$age;
    $user->phone=$phone;
    $user->place=$place;

    $result = $DAO->edit($user);

    if($result){

        header('Location: admin_panel.php');
        exit();

    } else {
    
        echo 'wystapil blad';
        var_dump($db -> error_list);
    }

} else {

    echo 'nie podano danych';
}
?>
