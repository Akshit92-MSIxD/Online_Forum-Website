<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

session_start();
session_unset();
// session_destroy(); ===> destroy it once the logoutSuccess alert is shown!!!
$_SESSION['logoutSuccess'] = true;

$destination = $_POST['source'];
header("location:".$destination);


}

?>