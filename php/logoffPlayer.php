<?php
include("../classes/Sessions.php");

$objSession = new Sessions($conn);

$objSession->logoff();
?>