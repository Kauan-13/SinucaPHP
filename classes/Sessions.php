<?php
class Sessions
{
    public static function playerAllowed($id, $name){
        session_start();
        $_SESSION['login'] = session_id();
        $_SESSION['playerId'] = $id;
        $_SESSION['playerName'] = $name;
        header("location:../protectedPage.php");
    }

    public static function logoff(){  
        session_start();
        session_destroy();
        header("location: ../index.php");
        exit; 
    }
}
?>