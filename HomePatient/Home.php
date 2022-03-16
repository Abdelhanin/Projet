<?php
include './../cnx.php';
include 'req.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../bootstrap.css">
    <title>Home Patient</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-expand-sm navbar-dark bg-dark">
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
    <div class="text-right">
        <button class="btn btn-primary my-2 mx-2 "><a href="AjouterRdv.php" class="text-light">Ajouter</a></button>
    </div>
    <table class="table" >
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
            $cin = $_SESSION['cinp'];
            $query = "select * from rdv where cin_patient = '$cin'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result)!=0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr><th>' . $row['num_rdv'] . '</th>
                        <td>' . $row['date_rdv'] . '</td>
                        <td>' . $row['time_rdv'] . '</td>
                        <td>' . $row['cin_patient'] . '</td>
                        <td>' . $row['cin_docteur'] . '</td>
                        <td class="d-lg-flex justify-content-between">
                            <button class="btn btn-secondary"><a href="ModifierRdv.php?num=' . $row['num_rdv'] . '" class="text-light">Modifier</a></button>
                            <button class="btn btn-secondary"><a href="DeleteRdv.php?num=' . $row['num_rdv'] . '" class="text-light">Supprimer</a></button>
                        </td></tr>';
                }
            } else {
                echo '<div class="alert alert-info text-center">Vous n\'avez pas des rendez-vous </div>';
            }
            ?>
        </tbody>
    </table>



</body>
<script src="./../jquery-3.6.0.min.js"></script>
<script src="./../bootstrap.js"></script>
<script src="./../popper.min.js"></script>

</html>