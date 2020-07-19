<?php
	
	// Odesłanie użytkownika do user_panel.php w przypadku gdy został już zalogowany w sesji
	session_start();	
	if ((isset($_SESSION['login'])) && ($_SESSION['login']==true) && ($_SESSION['admin']==false)){
		
		header('Location: user_panel.php');
		exit();
	}
	
	// Odesłanie admina do admin_panel.php w przypadku gdy został już zalogowany w sesji
	if((isset($_SESSION['login'])) && ($_SESSION['login']==true) && ($_SESSION['admin']==true)) {
		
		header('Location: admin_panel.php');
		exit();
	}
?>

<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>System logowania</title>

	<style>
		.container {
			display: block;
			justify-content: center;
			align-items: center;
			margin-top: 150px;
			width:350px;
		}
		button{
			display: block;
			margin: 0 auto;
			margin-bottom: 10px;
		}
		input{
			margin-bottom: 5px;
		}
	</style>
</head>

<body class="text-center" style="background-color:WhiteSmoke;">

	<!-- Formularz logowania uzytkownika z bootstrapowym wyglądem-->
	<div class="container">
		<form class="form-signin" action="login.php" method="post">
			<img class="mb-4" src="https://cdn.onlinewebfonts.com/svg/img_311846.png" alt="" width="80" height="80">
			<h1 class="h3 mb-3 font-weight-normal">Prosze się zalogować</h1>
			<label for="inputEmail" class="sr-only">Nazwa użytkownika</label>
			<input id="inputEmail" class="form-control" name="name" placeholder="Nazwa użytkownika" required autofocus>
			<label for="inputPassword" class="sr-only">Hasło</label>
			<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Hasło" required><br>
			<button class="btn btn-lg btn-dark btn-block" style="height:45px;width:250px" type="submit">Zaloguj</button>
		</form>
		<form action="registration.php" method="post">
			<button  style="height:45px;width:250px" class="btn btn-lg btn-dark btn-block" type="submit">Rejestracja</button>
		</form>
	</div>

	<?php

		//Miejsce pojawienia sie ewentualnego błędu przy niepoprawnym podaniu danych
		if(isset($_SESSION['error'])) echo $_SESSION['error'];
	?>
</body>
</html>
