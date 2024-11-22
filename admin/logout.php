<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["Email"]);
header("Location:index.php");
?>