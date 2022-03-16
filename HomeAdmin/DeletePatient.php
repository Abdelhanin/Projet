<?php
include './../cnx.php';
include 'req.php';
$cin = $_GET['cin'];

$query = "delete from patient where cin_patient ='$cin'";
$result = mysqli_query($connection, $query);
if ($result) {
    header("location:ListPatients.php");
} else echo '<div class="alert alert-danger">Problem</div>';

?>