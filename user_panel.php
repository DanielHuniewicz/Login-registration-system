<?php

session_start();
  
// Odesłanie użytkownika do index.php w przypadku gdy nie został zalogowany w sesji
if (!isset($_SESSION['login']))
{
  header('Location: index.php');
  exit();
}

if (($_SESSION['login']==true) && ($_SESSION['admin']==true))
{
  header('Location: admin_panel.php');
  exit();
}

// Stworzenie powitania oraz przycisku wylogowania użytkownika
$welcome = "<h1>Witaj ".$_SESSION['name'].'</h1>';
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
    p,h1,h3 {color: #F5F5F5;}
  </style>

</head>

  <body class="text-center" style="background-color:#101010;">

    <!-- Panel użytkownika z bootstrapowym wyglądem-->
    <div class="container" style="width:800px; margin-top: 100px;" >

        <?php echo $welcome?><br>
        <p class="lead" style="text-align: justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pelle
        risus et, vestibulum est. Etiam eget arcu lobortis, vestibulum odio id, efficitur quam. Donec viverra
        magna vitae metus maximus, in aliquet libero malesuada. Sed mi nibh, convallis eu tortor eu, egestas
        Vestibulum sed ligula eget lorem bibendum lobortis vel congue metus.</p>
        <p class="lead">
          <br>
          <?php echo $logout?><br>
        </p>
    </div>

  </body>
</html>
