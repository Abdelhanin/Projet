<?php
session_start();
if(is_null($_SESSION['cinp'])){
    header("location:./../LoginPatient.php");
}
?>