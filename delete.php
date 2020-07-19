<?php

session_start();
require_once 'init.php';
unset($_SESSION['error']);	
$login = $_POST['login'];

$myDb = new database();
$DAO = new UserDAO($myDb);

$users = $DAO->getAdmins();
        
if(count($users) <= 1 && $users[0]->login == $login) {
            
    //Przygotowanie i wysłanie komunikatu błędu o niepoprawności danych
	$_SESSION['error'] = '<span style="color:red">Polecenie nie wykonane - pozostał ostatni admin</span><br><br>';
    header('Location: admin_panel.php');
        
} else {

    $result = $DAO->delete($login);
        
    if ($result) {
        
        header('Location: admin_panel.php');
        exit();
        
    } else {
        
        echo $myDb->error;
    }
} 
?>

