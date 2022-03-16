<?php
include './../cnx.php';
include 'req.php';
$cin = $_GET['cin'];

$query = "delete from docteur where cin_docteur ='$cin'";
$result = mysqli_query($connection, $query);
if ($result) {
    header("location:ListDoctors.php");
} else echo '<div class="alert alert-danger">Problem</div>';
?>