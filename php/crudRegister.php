<?php
include_once("../connect/connect.php");
include_once("../classes/Players.php");

extract($_POST);

$objPlayer = new Players($conn);

if(!empty($email) && !empty($password) && !empty($confirmPassword)){
    
    $result = $objPlayer->verifyEmail($email);

    if(!$result){
        if($password == $confirmPassword){
            $password = password_hash("$password", PASSWORD_DEFAULT);

            $objPlayer->setData($email,$password,$name);

            $objPlayer->register();

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