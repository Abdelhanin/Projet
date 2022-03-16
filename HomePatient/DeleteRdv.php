<?php
include './../cnx.php';
include 'req.php';
$num = $_GET['num'];
    $query = "delete from rdv  where num_rdv=$num";
    $result = mysqli_query($connection, $query);
    if($result){
                 header("location:./../HomePatient/Home.php");
             }
             else{
                 die("Problem".mysqli_error($connection));
             }
?>