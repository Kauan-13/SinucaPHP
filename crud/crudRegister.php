<?php
include_once("../connect/connect.php");
include_once("../class/Player.php");

extract($_POST);

$Players = new Players($conn);

if($email != "" && $email != null && $password != "" && $password != null && $confirmPassword != "" && $confirmPassword != null){
    
    $result = $Players->verifyEmail($email);

    if(!$result){
        if($password == $confirmPassword){
            $password = password_hash("$password", PASSWORD_DEFAULT);

            $Players->setData($email,$password,$name);

            $Players->register();

        }else{
            echo "<script language='javascript' type='text/javascript'>
                        alert('A senha e a confirmação da senha devem ser iguais');
                        window.location.href='../forms/formRegister.php';
                </script>";
        }
    }else{
        echo "<script language='javascript' type='text/javascript'>
                        alert('Esse Email já foi cadastrado');
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