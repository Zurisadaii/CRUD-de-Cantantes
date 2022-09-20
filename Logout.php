<?php
//Se borran las variables de sesion
session_start();
unset($_SESSION["user"]);
header("Location:Login.php");
?>