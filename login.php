<?php

session_start();
require_once 'init.php';

//Odesłanie użytkownika do index.php w przypadku nie ustawienia parametrow
if ((!isset($_POST['name'])) || (!isset($_POST['password'])))
{
	header('Location: index.php');
	exit();	
}

// przypisanie POST-ów
$name = $_POST['name'];
$password = $_POST['password'];
$key = $name.md5($password);


//zabezpieczenie encji
$name = htmlentities($name, ENT_QUOTES, "UTF-8");
$password = htmlentities($password, ENT_QUOTES, "UTF-8");

$myDb = new database();
$DAO = new UserDAO($myDb);
$user = $DAO->getUser($name);

$ch = curl_init("http://tank.iai-system.com/api/user/verify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
"login=$name&password=$key");
$output = curl_exec($ch);

if ($user){

	//var_dump($user->admin);
	//die;
	
	// porownianie wpisanego hasla do zahaszowanego hasla z bazy danych oraz sprawdzenie zaków alfanumerycznych w loginie
	if (password_verify($password, $user->pass) && ctype_alnum($user->login)==true){

		// ustawienie zmiennych sesyjnych
		unset($_SESSION['error']);		
		$_SESSION['login'] = true;
		$_SESSION['name'] = $user->login;
		$_SESSION['admin'] = false;	

		if($user->admin == 1){

			// przekierowanie na panel admina
			$_SESSION['admin'] = true;	
			header('Location: admin_panel.php');
			die;

		} else {

			// przekierowanie na panel admina
			header('Location: user_panel.php');
			die;
		}
		
	} else {

		// Przygotowanie i wysłanie komunikatu błędu o niepoprawności danych
		$_SESSION['error'] = '<br><span style="color:red">Nieprawidłowe dane</span>';
		header('Location: index.php');
	}
}
	
?>