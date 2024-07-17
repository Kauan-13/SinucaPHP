<?php
include_once("../connect/connect.php");
include_once("../class/Login.php");
include_once("../class/Player.php");

extract($_POST);

if($mail != "" && $mail != null && $pass != "" && $pass != null && $confirmPass != "" && $confirmPass != null){
    if($pass == $confirmPass){
        $pass = password_hash("$pass", PASSWORD_DEFAULT);

        $Login = new Login($conn);

        $Login->setData($mail,$pass);

        $Login->register();

        $dataID = $Login->readIDLogin();

        $Player = new Player($conn);

        $Player->setData($dataID->id,$name);

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