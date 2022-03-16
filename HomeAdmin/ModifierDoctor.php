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
if (isset($_POST['modifier'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adress = $_POST['adress'];
        $tele = $_POST['tele'];
        $date = $_POST['date'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $specialite = $_POST['specialite'];
        if (empty($nom) || empty($prenom) || empty($adress) || empty($tele) || empty($date) || empty($specialite) || empty($email) || empty($pass)) {
            echo '<div class="alert alert-danger text-center">Remplire tous les champs svp</div>';
        } else{
            $query2 = "update docteur set nom_docteur ='$nom',prenom_docteur ='$prenom',adress_docteur='$adress',tele_docteur = '$tele',date_embauch='$date',email_docteur='$email',password_docteur ='$pass',specialite ='$specialite' where cin_docteur ='$cin'";
            $result2 = mysqli_query($connection, $query2);
            if ($result2) {
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
    <title>Modifier Docteur</title>
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
                <h1 class="font-weidth-bold py-3 ">Modifier <span class="text-primary font-weidth-bold">Docteur</span></h1>
                <form method="POST">
                    <div class="form-row ">
                        <div class="col-lg-4 mb-2">
                            <input type="text" placeholder="Cin" class="form-control" name="cin" disabled value="<?php echo $cin ?>">
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" placeholder="Nom" class="form-control" name="nom" value="<?php echo $nom ?>">
                        </div>
                        <div class="col-lg-4 mb-2">
                            <input type="text" placeholder="Prenom" class="form-control" name="prenom" value="<?php echo $prenom ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-12 mb-2">
                            <input type="text" placeholder="Adress" class="form-control" name="adress" value="<?php echo $adress ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-12 mb-2">
                            <input type="number" id="tele" placeholder="Telephone" class="form-control" name="tele" value="<?php echo $tele ?>">
                            <small class="text-danger" id="errTele"></small>
                        </div>

                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-lg-6 mb-2 ">
                            <label>Date embauche </label>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label>Specialite </label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6 mb-2">
                            <input type="date" id="date" class="form-control" name="date" value="<?php echo $date ?>">
                            <small class="text-danger" id="errDate"></small>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <select class="form-control" name="specialite">
                                <option selected><?php echo $specialite ?></option>
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
                            <input type="email" placeholder="Email" id="email" class="form-control" name="email" value="<?php echo $email ?>">
                            <small class="text-danger" id="errEmail"></small>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <!-- <input type="Mots de passe" placeholder="Mots de passe" class="form-control"> -->
                            <div class="input-group">
                                <input type="password" id="pass" name="pass" placeholder="Mots de passe" class="form-control" value="<?php echo $pass ?>">
                                <div class="input-group-prepent">
                                    <input type="button" value="Afficher" class="btn" onclick="f()"></input>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-lg">
                            <button class="btn btn-primary my-2 p-2" id="btnupdate" name="modifier">Modifier</button>
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
        // alert(days);
        if (days > 0) {
            get("errDate").innerText = "Date d'Embauch doit etre Inferieur a la date d'aujourdhui";
            get("btnupdate").disabled = true;
        } else {
            get("errDate").innerText = "";
            get("btnupdate").disabled = false;
        }
    })

    get("email").addEventListener("input", function() {
        if (!/^[a-zA-Z0-9]+@[a-z]{2,8}\.[a-z]{2,4}$/.test(this.value) && (this.value) != "") {
            get("errEmail").innerText = "* L’email doit avoir le format suivant : xxxxxx@xxxx.xxx";
            get("btnupdate").disabled = true;
        } else {
            get("errEmail").innerText = "";
            get("btnupdate").disabled = false;
        }
    });

    get("tele").addEventListener("input", function() {
        if (!/^06\d{8}$/.test(this.value) && (this.value) != "") {
            get("errTele").innerText = "Lnumero doit avoir la form 06********";
            get("btnadd").disabled = true;
        } else {
            get("errTele").innerText = "";
            get("btnadd").disabled = false;
        }
    });
</script>

</html>