<?php
include_once("class/Session.php"); 
   
session_start();

if(isset($_SESSION['login'])) {
?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Página Protegida</title>
    </head>
    <body>
        <div>
            Olá <?= $_SESSION["playerName"] ?>
            <?php
                echo "<a href='crud/crudLogoff.php'> Sair </a>";
            ?>
        </div>
    </body>
    </html>

<?php

}else{
    header("location: forms/formLogin.php");
}

?>

