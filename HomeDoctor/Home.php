<?php
include './../cnx.php';
session_start();
if(is_null($_SESSION['cind'])){
    header("location:./../LoginDoctor.php");
}
else{
    $cind = $_SESSION['cind'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../bootstrap.css">
    <title>Home Docteur</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="navbar-brand"><img src="./../logo.png" width="40" height="40"></div>
        <div class="media-body">
            <h4 class="m-0 text-light"><span class="text-primary">H</span>opitale</h4>
        </div>

        <!-- <div id="x" class="collapse navbar-collapse ">
        <ul class="navbar-nav">
          <li class="nav-item"><a href="./../LoginPatient.php" class="nav-link">Liste des patientes</a></li>
        </ul>
      </div> -->
        <a href="DeconnecterPatient.php" class="text-light">Deconnecter</a>
    </nav>

    <table class="table">
            <thead class="col-lg-12 bg-primary text-light">
                <th class="col-lg-2 col-sm-1">Numero</th>
                <th class="col-lg-2 col-sm-1">Date</th>
                <th class="col-lg-2 col-sm-1">Heure</th>
                <th class="col-lg-2 col-sm-1">Cin Patient</th>
                <th class="col-lg-2 col-sm-1">Cin Docteur</th>
                <th class="col-lg-2 col-sm-1">Operation</th>
            </thead>
            <tbody>
            <?php
                $query = "select * from rdv where cin_docteur ='$cind'";
                $result = mysqli_query($connection,$query);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr><th>'.$row['num_rdv'].'</th>
                        <td>'.$row['date_rdv'].'</td>
                        <td>'.$row['time_rdv'].'</td>
                        <td>'.$row['cin_patient'].'</td>
                        <td>'.$row['cin_docteur'].'</td>
                        <td class="d-flex justify-content-between">
                            <button class="btn btn-secondary"><a href="InfoP.php?cinp='.$row['cin_patient'].'" class="text-light">Info patient</a></button>
                        </td></tr>';
                    }
                }
                else {
                    die("Error in Query" . mysqli_error($connect));
                }
                ?>
            </tbody>
        </table>



</body>
<script src="./../jquery-3.6.0.min.js"></script>
<script src="./../bootstrap.js"></script>
<script src="./../popper.min.js"></script>

</html>