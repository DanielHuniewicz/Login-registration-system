<?php

session_start();
require_once 'init.php';

// Odesłanie użytkownika do index.php w przypadku gdy nie został zalogowany w sesji
if (!isset($_SESSION['login'])){

  header('Location: index.php');
  exit();
}

if (($_SESSION['login']==true) && ($_SESSION['admin']==false)){

  header('Location: user_panel.php');
  exit();
}

if (!isset($_POST['login'])){

  header('Location: admin_panel.php');
  exit();
}

$login = $_POST['login'];
$welcome = "<h2>Edycja uzytkownika ".$login.'</h2><br>';

$myDb = new database();
$DAO = new UserDAO($myDb);

$user = $DAO->getUser($login);
?>

<!doctype html>
<html lang="pl">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Uzytkownik</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <style>
    p,h1,h3,h2 {color: #F5F5F5;}
    .container {
			display: flex;
			justify-content: center;
			align-items: center;
			margin-top: 200px;
			width:1000px;
		}
  </style>

</head>

  <body class="text-center" style="background-color:#101010;">

    <!-- Panel użytkownika z bootstrapowym wyglądem-->
    <div class="container" style="width:700px; margin-top: 100px;" >

      <form class="form-signin" action="edit.php" method="post">

        <img src="https://cdn.pixabay.com/photo/2017/06/06/00/33/edit-icon-2375785_1280.png" alt="" width="80" height="80"><br><br>
        <?php echo $welcome;?>
        <input type='hidden' name='login' value=<?php echo htmlspecialchars($login);?>>
        <label for="inputAge" class="sr-only">Wiek</label>
        <input id="inputAge" class="form-control" name="age" value=<?php echo htmlspecialchars($user->age);?> placeholder="Wiek" required autofocus><br>
        <label for="inputPhone" class="sr-only">Telefon</label>
        <input id="inputPhone" class="form-control" name="phone" value=<?php echo htmlspecialchars($user->phone);?> placeholder="Telefon" required><br>
        <label for="inputPlace" class="sr-only">Miejscowosc</label>
        <input id="inputPlace" class="form-control" name="place" value=<?php echo htmlspecialchars($user->place);?> placeholder="Miejscowosc" required><br>
        <button class="btn btn-lg btn-dark btn-block" type="submit">Zatwierdz</button>
      </form>
    </div>
  </body>
</html>
