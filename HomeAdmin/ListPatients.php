<?php
include 'Home.php';
include './../cnx.php';
// include 'req.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../bootstrap.css">
    <title>Liste Patientes</title>
</head>
<body>

        <table class="table">
            <thead class="col-lg-10 bg-primary text-light">
                <th class="col-lg-2 col-sm-1">Cin</th>
                <th class="col-lg-2 col-sm-1">Nom</th>
                <th class="col-lg-2 col-sm-1">Prenom</th>
                <th class="col-lg-2 col-sm-1">sexe</th>
                <th class="col-lg-2 col-sm-1">Operation</th>
            </thead>
            <tbody>
                <?php
                $query = "select cin_patient,nom_patient,prenom_patient,sexe from patient";
                $result = mysqli_query($connection,$query);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr><th>'.$row['cin_patient'].'</th>
                        <td>'.$row['nom_patient'].'</td>
                        <td>'.$row['prenom_patient'].'</td>
                        <td>'.$row['sexe'].'</td>
                        <td class="d-flex justify-content-between">
                            <button class="btn btn-secondary"><a href="InfoPatient.php?cin='.$row['cin_patient'].'" class="text-light">Info</a></button>
                            <button class="btn btn-secondary"><a href="ModifierPatient.php?cin='.$row['cin_patient'].'" class="text-light">Modifier</a></button>
                            <button class="btn btn-secondary"><a href="DeletePatient.php?cin='.$row['cin_patient'].'" class="text-light" ">Supprimer</a></button>
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
</html>