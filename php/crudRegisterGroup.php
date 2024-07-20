<?php
include_once("../classes/Sessions.php"); 
   
session_start();

if(isset($_SESSION['login'])) {
    include_once("../connect/connect.php");
    include_once("../classes/Groups.php");
    include_once("../classes/Players.php");

    extract($_POST);

    $adminPlayerId = $_SESSION['playerId'];

    $objGroup = new Groups($conn);
    $objPlayer = new Players($conn);

    if(!empty($groupName)){
        
        $objGroup->setData($groupName, $adminPlayerId);

        $objGroup->registerGroup();

        $result = $objGroup->getId($groupName);

        $objPlayer->joinGroup($adminPlayerId,$result->id);
        
    }else{
        echo "<script language='javascript' type='text/javascript'>
                        alert('Todos os campos precisam ser preenchidos');
                        window.location.href='../forms/formRegister.php';
                </script>";
    }
}else{
    header("location: forms/formLogin.php");
}
?>