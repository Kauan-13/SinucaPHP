<?php
include_once("../classes/Sessions.php"); 
   
session_start();

if(isset($_SESSION['login'])) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <form action="../php/crudRegisterGroup.php" method="post">
        <div>
            <div>Nome do Grupo: </div>
            <input type="text" name="groupName" id="groupName">
        </div>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
<?php
}else{
    header("location: forms/formLogin.php");
}
?>