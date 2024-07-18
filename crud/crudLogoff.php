<?php
include("../class/Session.php");

$Session = new Session($conn);

$Session->logoff();
?>