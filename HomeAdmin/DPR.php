<?php
include 'Home.php';
include './../cnx.php';
// include 'req.php';
if (isset($_POST['btnrecherhcer'])) {
    // echo $_POST['doc'];
    $cin = $_POST['doc'];
}
$doc = 'Selectionner un docteur';
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
    <div class="container">
        <form method="POST" class="row d-flex justify-content-center my-4">
            <select name="doc" id="" class="form-control col-lg-5 mr-2">
                <option selected class="d-none"><?php echo $doc?></option>
                <?php
                $query = "select cin_docteur,concat(nom_docteur,' ',prenom_docteur) as name from docteur";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['cin_docteur'] . '">' . $row['name'] . '</option>';
                    }
                }
                ?>
            </select>
            <button name="btnrecherhcer" class="btn btn-primary">Rechercher</button>
            <!-- <input type="button" name="btnrech" onclick="rech()" id="btn" class="btn btn-primary " value="Rechercher"> -->
        </form>


        <table class="table">
            <thead class="col-lg-10 bg-primary text-light">
                <th class="col-lg-2 col-sm-1">Nom Docteur</th>
                <th class="col-lg-2 col-sm-1">Specialite</th>
                <th class="col-lg-2 col-sm-1">Nom Patient</th>
                <th class="col-lg-2 col-sm-1">Date rdv</th>
                <th class="col-lg-2 col-sm-1">Heur rdv</th>
            </thead>
            <tbody>
                <?php
                if (!empty($cin)) {
                    // echo $cin;
                    $query = "select concat(d.nom_docteur,' ',d.prenom_docteur) as Nom_Docteur,specialite ,concat(p.nom_patient,' ',p.prenom_patient) as Nom_Patient,r.date_rdv as Date_Rendez_vous,r.time_rdv as Heur_Rendez_vous from docteur d join patient p join rdv r where  d.cin_docteur = r.cin_docteur and p.cin_patient = r.cin_patient and d.cin_docteur ='$cin'";
                    // $query = "select d.nom_docteur,p.nom_patient,r.date_rdv,r.time_rdv from docteur d join patient p join rdv r where  d.cin_docteur = r.cin_docteur and p.cin_patient = r.cin_patient and d.cin_docteur ='$cin'";
                    $result = mysqli_query($connection, $query);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr><th>' . $row['Nom_Docteur'] . '</th>
                        <th>' . $row['specialite'] . '</th>
                        <th>' . $row['Nom_Patient'] . '</th>
                        <th>' . $row['Date_Rendez_vous'] . '</th>
                        <th>' . $row['Heur_Rendez_vous'] . '</th>
                        </tr>';
                        }
                    } else {
                        die("Error in Query" . mysqli_error($connect));
                    }
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>