<?php
session_start();
unset($_SESSION['cinp']);
header("location:./../LoginPatient.php");
?>