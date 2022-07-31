<?php
session_start();


$_SESSION=array();
unset($_SESSION['username']);

session_destroy();

header('Location:../index.php');

?>