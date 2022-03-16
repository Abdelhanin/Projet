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
    <title>Liste RDV</title>
</head>
<body>
        <table class="table">
            <thead class="col-lg-12 bg-primary text-light">
                <th class="col-lg-2 col-sm-1">Numero</th>
                <th class="col-lg-2 col-sm-1">Date</th>
                <th class="col-lg-2 col-sm-1">Heur</th>
                <th class="col-lg-2 col-sm-1">Cin Patient</th>
                <th class="col-lg-2 col-sm-1">Cin Docteur</th>
                <th class="col-lg-2 col-sm-1">Operation</th>
            </thead>
            <tbody>
            <?php
                $query = "select * from rdv";
                $result = mysqli_query($connection,$query);
                if($result){
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr><th>'.$row['num_rdv'].'</th>
                        <td>'.$row['date_rdv'].'</td>
                        <td>'.$row['time_rdv'].'</td>
                        <td>'.$row['cin_patient'].'</td>
                        <td>'.$row['cin_docteur'].'</td>
                        <td class="d-flex justify-content-between">
                            <button class="btn btn-secondary"><a href="DeleteRDV.php?num='.$row['num_rdv'].'" class="text-light">Supprimer</a></button>
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
