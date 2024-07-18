<?php
include_once("../connect/connect.php");
include_once("../class/Player.php");
include_once("../class/Session.php");

extract($_POST);

$Players = new Players($conn);
$Session = new Session($conn);

if($email != "" && $email != null && $password != "" && $password != null){
    $result = $Players->readPlayersLogin($email);

    if(password_verify($password, $result->password)){
        $Session->playerAllowed($result->id,$result->name);
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