<?php
include_once("../connect/connect.php");
include_once("../class/Login.php");
include_once("../class/Player.php");

extract($_POST);

if($email != "" && $email != null && $password != "" && $password != null && $confirmPassword != "" && $confirmPassword != null){
    if($password == $confirmPassword){
        $password = password_hash("$password", PASSWORD_DEFAULT);

        $Player = new Player($conn);

        $Player->setData($email,$password,$name);

        $Player->register();

    }else{
        echo "<script language='javascript' type='text/javascript'>
                    alert('A senha e a confirmação da senha devem ser iguais');
                    window.location.href='../forms/formRegister.php';
            </script>";
    }
}else{
    echo "<script language='javascript' type='text/javascript'>
                    alert('Todos os campos precisam ser preenchidos');
                    window.location.href='../forms/formRegister.php';
            </script>";
}

?>