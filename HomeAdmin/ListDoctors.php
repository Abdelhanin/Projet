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
    <title>Liste Doctors</title>
</head>
<body>
            <div class="text-right">
            <button class="btn btn-primary my-2 mx-2 "><a href="AjouterDoctor.php" class="text-light">Ajouter</a></button>
            </div>
        <table class="table">
            <thead class="col-lg-10 bg-primary text-light">
                <th class="col-lg-2 col-sm-1">Cin</th>
                <th class="col-lg-2 col-sm-1">Nom</th>
                <th class="col-lg-2 col-sm-1">Prenom</th>
                <th class="col-lg-2 col-sm-1">Specialite</th>
                <th class="col-lg-2 col-sm-1">Operation</th>
            </thead>
            <tbody>
                <?php
                $query = "select cin_docteur,nom_docteur,prenom_docteur,specialite from docteur";
                $result = mysqli_query($connection,$query);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr><th>'.$row['cin_docteur'].'</th>
                        <td>'.$row['nom_docteur'].'</td>
                        <td>'.$row['prenom_docteur'].'</td>
                        <td>'.$row['specialite'].'</td>
                        <td class="d-flex justify-content-between">
                            <button class="btn btn-secondary"><a href="InfoDoctor.php?cin='.$row['cin_docteur'].'" class="text-light">Info</a></button>
                            <button class="btn btn-secondary"><a href="ModifierDoctor.php?cin='.$row['cin_docteur'].'" class="text-light">Modifier</a></button>
                            <button class="btn btn-secondary"><a href="DeleteDoctor.php?cin='.$row['cin_docteur'].'"class="text-light">Supprimer</a></button>
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