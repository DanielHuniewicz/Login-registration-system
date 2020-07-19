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

// weryfikcja admina do sesji wrzucic

// Stworzenie powitania oraz przycisku wylogowania użytkownika
$welcome = "<h1>Witaj ".$_SESSION['name'].'</h1><br><br>';
$logout = "<a href='logout.php' class='btn btn-outline-light'>Wyloguj sie</a>";
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
    p,h1,h3,th,td {color: #F5F5F5;}
    tr {font-size: 20px;}
  </style>

</head>

  <body class="text-center" style="background-color:#101010;">

    <!-- Panel użytkownika z bootstrapowym wyglądem-->
    <div class="container" style="width:800px; margin-top: 100px;" >

        <?php 

          echo $welcome;

          $myDb = new Database();
          $DAO = new UserDAO($myDb);
          $result = $DAO->getAll();

          //var_dump($result);
          //die;

          if(empty($result)){

            echo "<p>Brak uzytkowikow</p>";
            
          } else {

            // stworzenie tabeli z danymi uzytkownikow
            echo '<table align="center" width= 700px ><tr><th>Login</th><th>E-mail</th><th>Wiek</th><th>Miasto</th><th>Telefon</th><th></th><th></th></tr>';

            foreach($result as $i => $row) {

              echo "<tr><td>{$row->getName()}</td><td>{$row->email}</td><td>{$row->age}</td><td>{$row->place}</td><td>{$row->phone}</td>
              <td><form action='edit_panel.php' method='post'><input type='hidden' name='login' value={$row->login}><button type='submit' class='btn btn-outline-primary'>Edytuj</button></form></td>
              <td><form action='delete.php' method='post'><input type='hidden' name='login' value={$row->login}><button type='submit' class='btn btn-outline-danger'>Usun</button></form></td></tr>";
            }

            echo '</table><br><br>';
          }

          //Miejsce pojawienia sie ewentualnego błędu
          if(isset($_SESSION['error'])) echo $_SESSION['error'];
          echo $logout;

        ?>
    </div>
  </body>
</html>
