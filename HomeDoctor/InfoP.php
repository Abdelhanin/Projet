<?php
include './../cnx.php';
session_start();
if (is_null($_SESSION['cind'])) {
    header("location:./../LoginDoctor.php");
} else {
    $cind = $_SESSION['cind'];
    $cinp = $_GET['cinp'];
    $query = "select * from patient where cin_patient ='$cinp'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nom = $row['nom_patient'];
            $prenom = $row['prenom_patient'];
            $adress = $row['adress_patient'];
            $tele = $row['num_patient'];
            $date = $row['date_naissance'];
            $sexe = $row['sexe'];
            $email = $row['email_patient'];
        }
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
    <title>Inscrire Patient</title>
    <style>
        .shadow {
            box-shadow: 5px 5px 10px 0.2rem rgba(48, 48, 48, 0.25);
        }
    </style>
</head>

<body>
    <div class="container  my-5" style="width: 700px;">
        <h2 class=" font-weight-bold"><span class="text-primary ">H</span>opitale</h2>
        <div class="row no-gutters shadow">

            <div class="col-lg-12  py-4 px-5  ">
                <h3 class="font-weidth-bold py-3">Info <span class="text-primary">patient</span> </h3>
                <form>
                    <div class="form-row">
                        <div class="col-lg-4 col-sm-4">
                            <input type="text" value="<?php echo $cinp ?>" disabled class="form-control my-2 p-2">
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <input type="text" value="<?php echo $nom ?>" disabled class="form-control my-2 p-2">
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <input type="text" value="<?php echo $prenom ?>" disabled class="form-control my-2 p-2">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6">
                            <input type="email" value="<?php echo $email ?>" disabled class="form-control my-2 p-2">
                        </div>
                        <div class="col-lg-6">
                            <input type="number" value="<?php echo $tele ?>" disabled class="form-control my-2 p-2">
                        </div>
                    </div>

                    <hr>
                    <div class="form-row">
                        <div class="col-lg">
                            <label>Date de naissance :</label>
                            <input type="date" value="<?php echo $date ?>" disabled class="form-control my-2 p-2">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6">
                            <input type="text" value="<?php echo $adress ?>" disabled class="form-control my-2 p-2">
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control my-2 p-2" disabled>
                                <option selected><?php echo $sexe ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg">
                            <button class="btn btn-primary my-2 p-2"><a href="./Home.php" class="text-light">Retour</a></button>
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