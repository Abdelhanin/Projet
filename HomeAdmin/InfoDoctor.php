<?php
include './../cnx.php';
include 'req.php';
$cin = $_GET['cin'];
$query = "select * from docteur where cin_docteur ='$cin'";
$result = mysqli_query($connection, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $nom = $row['nom_docteur'];
        $prenom = $row['prenom_docteur'];
        $adress = $row['adress_docteur'];
        $tele = $row['tele_docteur'];
        $date = $row['date_embauch'];
        $email = $row['email_docteur'];
        $pass = $row['password_docteur'];
        $specialite = $row['specialite'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../bootstrap.css">
    <title>Info Docteur</title>
    <style>
        .shadow {
            box-shadow: 5px 5px 10px 0.2rem rgba(48, 48, 48, 0.25);
        }
    </style>
</head>

<body>
    <div class="container my-5 card shadow" style="width: 600px;">
        <div class="row no-gutters shadow1">

            <div class="col py-4 px-5  ">
                <h1 class="font-weidth-bold py-3 ">Info <span class="text-primary font-weidth-bold">Docteur</span></h1>
                <form method="POST">
                    <div class="form-row ">
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" disabled value="<?php echo $cin ?>">
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" disabled value="<?php echo $nom ?>">
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" class="form-control" disabled value="<?php echo $prenom ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-12 mb-2">
                            <input type="text" class="form-control" disabled value="<?php echo $adress ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-12 mb-2">
                            <input type="number" class="form-control" disabled value="<?php echo $tele ?>">
                        </div>

                    </div>
                    <hr>

                    <div class="form-row">
                        <div class="col-lg-6 mb-2">
                            <label>Date embauche </label>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label>Specialite </label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 mb-2">
                            <input type="date" class="form-control" title="Date embauch" disabled value="<?php echo $date ?>">
                        </div>
                        <div class="col-lg-6 mb-2">
                            <select class="form-control" disabled>
                                <option><?php echo $specialite ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-12 mb-2">
                            <input type="email" class="form-control" disabled value="<?php echo $email ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-10 mb-2">
                            <input type="password" id="pass" class="form-control" disabled value="<?php echo $pass ?>">
                        </div>
                        <div class="col-lg-2 mb-2">
                            <input type="button" value="Afficher" class="btn text-center" style="width: 70px;" onclick="f()"></input>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg">
                            <button class="btn btn-primary my-2 p-2" name="add"><a class="text-light" href="ListDoctors.php">Retour</a></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    var a = 0;

    function f() {
        var pass = document.getElementById("pass");
        a++;
        if (a % 2 != 0) {
            pass.removeAttribute("type");
        } else pass.setAttribute("type", "password");
    }
</script>

</html>