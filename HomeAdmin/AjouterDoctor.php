<?php
include './../cnx.php';
include 'req.php';
if (isset($_POST['add'])) {
    $cin = $_POST['cin'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adress = $_POST['adress'];
    $tele = $_POST['tele'];
    $date = $_POST['dateemb'];
    $specialite = $_POST['specialite'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if (empty($cin) || empty($nom) || empty($prenom) || empty($adress) || empty($tele) || empty($date) || empty($specialite) || empty($email) || empty($pass)) {
        echo '<div class="alert alert-danger text-center">Remplire tous les champs svp</div>';
    } else {
        $query = "insert into docteur values('$cin','$nom','$prenom','$adress','$tele','$date','$email','$pass','$specialite')";
        $result = mysqli_query($connection, $query);
        if ($result) {
            header("location:ListDoctors.php");
        } else echo '<div class="alert alert-danger">Problem</div>';
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
    <title>Ajouter Docteur</title>
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
                <h1 class="font-weidth-bold py-3 ">Ajouter <span class="text-primary font-weidth-bold">Docteur</span></h1>
                <form method="POST">
                    <div class="form-row ">
                        <div class="col-lg-4 mb-2">
                            <input type="text" placeholder="Cin" class="form-control" name="cin">
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" placeholder="Nom" class="form-control" name="nom">
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" placeholder="Prenom" class="form-control" name="prenom">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-12 mb-2">
                            <input type="text" placeholder="Adress" class="form-control" name="adress">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-12 mb-2">
                            <input type="number" id="tele" placeholder="Telephone" class="form-control" name="tele">
                            <small class="text-danger" id="errTele"></small>
                        </div>

                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-lg-6 mb-2">
                            <label>Date embauche </label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 mb-2">
                            <input type="date" class="form-control" id="date" name="dateemb">
                            <small class="text-danger" id="errDate"></small>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <select class="form-control" name="specialite">
                                <option selected disabled>Specialite</option>
                                <option>cardiologie</option>
                                <option>dermatologie</option>
                                <option>rhumatologie</option>
                                <option>radiothérapie</option>
                                <option>radiologie</option>
                                <option>psychiatrie</option>
                                <option>pneumologie</option>
                                <option>pédiatrie</option>
                                <option>ophtalmologie</option>
                                <option>obstétrique</option>
                                <option>odontologie</option>
                                <option>neurologie</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 mb-2">
                            <input type="email" id="email" placeholder="Email" class="form-control" name="email">
                            <small class="text-danger" id="errEmail"></small>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <!-- <input type="Mots de passe" placeholder="Mots de passe" class="form-control"> -->
                            <div class="input-group">
                                <input type="password" id="pass" name="pass" placeholder="Mots de passe" class="form-control">
                                <div class="input-group-prepent">
                                    <input type="button" value="Afficher" class="btn" onclick="f()"></input>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-lg">
                            <button class="btn btn-primary my-2 p-2" id="btnadd" name="add">Ajouter</button>
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

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<script>
    function get(id) {
        return document.getElementById(id);
    }
    get('date').addEventListener('change', function() {
        var d1 = new Date();
        var d2 = get('date').value;
        const date1 = new Date(d1);
        const date2 = new Date(d2);
        const time = (date2 - date1)
        const days = (time / (1000 * 60 * 60 * 24));

        if (days > 0) {
            get("errDate").innerText = "Date d'Embauch doit etre inferieur a la date d'aujourdhui";
            get("btnadd").disabled = true;
        } else {
            get("errDate").innerText = "";
            get("btnadd").disabled = false;
        }
    })

    get("email").addEventListener("input", function() {
        if (!/^[a-zA-Z0-9]+@[a-z]{2,8}\.[a-z]{2,4}$/.test(this.value) && (this.value) != "") {
            get("errEmail").innerText = "L’email doit avoir le format suivant : xxxxxx@xxxx.xxx";
            get("btnadd").disabled = true;
        } else {
            get("errEmail").innerText = "";
            get("btnadd").disabled = false;
        }
    });

    get("tele").addEventListener("input", function() {
        if (!/^[06|07]\d{9}$/.test(this.value) && (this.value) != "") {
            get("errTele").innerText = "Lnumero doit avoir la form 06/07********";
            get("btnadd").disabled = true;
        } else {
            get("errTele").innerText = "";
            get("btnadd").disabled = false;
        }
    });
</script>

</html>