<?php

use function PHPSTORM_META\map;

$connection = mysqli_connect('localhost','root','','hopitale');
if(mysqli_errno($connection)){
    die("Errore");
}
?>