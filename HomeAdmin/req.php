<?php
session_start();
if(is_null($_SESSION['admin'])){
    header("location:./../LoginAdmin.php");
}
?>