<?php
include_once("../connect/connect.php");
include_once("../classes/Players.php");
include_once("../classes/Sessions.php");

extract($_POST);

$objPlayer = new Players($conn);
$objSession = new Sessions($conn);

if(!empty($email) && !empty($password)){
    $result = $objPlayer->readPlayersLogin($email);

    if(password_verify($password, $result->password)){
        $objSession->playerAllowed($result->id,$result->name);
    }else{
        echo    "<script language='javascript' type='text/javascript'>
                    alert('Login Incorreto :(');
                    window.location.href='../forms/formLogin.php';
                </script>";
    }
}else{
    echo    "<script language='javascript' type='text/javascript'>
                    alert('Todos os campos precisam ser preenchidos');
                    window.location.href='../forms/formLogin.php';
                </script>";
}
?>