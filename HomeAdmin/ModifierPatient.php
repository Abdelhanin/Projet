<?php
include './../cnx.php';
include 'req.php';
$cin = $_GET['cin'];
   
$query = "select * from patient where cin_patient ='$cin'";
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
        $pass = $row['password_patient'];
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
    $sexe = $_POST['sexe'];
    if (empty($nom) || empty($prenom) || empty($adress) || empty($tele) || empty($date) || empty($sexe) || empty($email) || empty($pass)) {
        echo '<div class="alert alert-danger text-center">Remplire tous les champs svp</div>';
    } else{
        $query2 = "update patient set nom_patient ='$nom',prenom_patient ='$prenom',adress_patient='$adress',num_patient = '$tele',date_naissance='$date',sexe ='$sexe',email_patient='$email',password_patient ='$pass' where cin_patient ='$cin'";
        $result2 = mysqli_query($connection, $query2);
        if ($result2) {
            header("location:ListPatients.php");
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
    <title>Modifier Patient</title>
    <style>
        .shadow {
            box-shadow: 5px 5px 10px 0.2rem rgba(48, 48, 48, 0.25);
        }
    </style>
</head>

<body>
    <div class="container  my-5" style="width: 600px;">
        <h2 class=" font-weight-bold"><span class="text-primary ">H</span>opitale</h2>
        <div class="row no-gutters shadow">

            <div class="col-lg-12  py-4 px-5  ">
                <h3 class="font-weidth-bold py-3">Modifier <span class="text-primary">patient</span> </h3>
                <form method="POST">
                    <div class="form-row">
                        <div class="col-lg-4 col-sm-4">
                            <input type="text"  placeholder="Cin" name="cin" disabled  value="<?php echo $cin ?>" class="form-control my-2 p-2">
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <input type="text"  placeholder="Nom" name="nom"  class="form-control my-2 p-2" value="<?php echo $nom ?>">
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <input type="text"  placeholder="Prenom" name="prenom"  class="form-control my-2 p-2" value="<?php echo $prenom ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6">
                            <input type="email" id="email"  name="email" placeholder="Email"  class="form-control my-2 p-2" value="<?php echo $email ?>">
                            <small class="text-danger" id="errEmail"></small>
                        </div>
                        <div class="col-lg-6">
                            <input type="number" id="tele"  name="tele" placeholder="Telephone"  class="form-control my-2 p-2" value="<?php echo $tele ?>">
                            <small class="text-danger" id="errTele"></small>
                        </div>
                    </div>

                    <hr>
                    <div class="form-row">
                        <div class="col-lg">
                            <label>Date de naissance :</label>
                            <input type="date" id="date"  name="date" placeholder="Date Naissance"  class="form-control my-2 p-2" value="<?php echo $date ?>">
                            <small class="text-danger" id="errDate"></small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6">
                            <input type="text"  name="adress" placeholder="Adress"  class="form-control my-2 p-2" value="<?php echo $adress ?>">
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control my-2 p-2" name="sexe">
                                <option selected><?php echo $sexe ?></option>
                                <option>Homme</option>
                                <option>Femme</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-6 col-sm-6">
                            <input type="password" id="pass"  placeholder="Password" name="pass"  class="form-control my-2 p-2" value="<?php echo $pass ?>">
                        </div>

                    </div>

                    <div class="form-row form-check">
                        <div class="col-lg my-2 p-2">
                            <input type="checkbox" class="form-check-input " id="check" onchange="f()"><label class="form-check-label">Afficher le mots de passse </label>
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


    get("email").addEventListener("input", function() {
    if (!/^[a-zA-Z0-9]+@[a-z]{2,8}\.[a-z]{2,4}$/.test(this.value)&&(this.value)!="") {
        get("errEmail").innerText = "L’email doit avoir le format suivant : xxxxxx@xxxx.xxx";
        get("btnupdate").disabled = true;
    } else {
        get("errEmail").innerText = "";
        get("btnupdate").disabled = false;
    }
});

get("tele").addEventListener("input", function() {
    if (!(/^06\d{8}$/).test(this.value)&&(this.value)!="") {
        get("errTele").innerText = "Lnumero doit avoir la form 06********";
        get("btnupdate").disabled = true;
    } else {
        get("errTele").innerText = "";
        get("btnupdate").disabled = false;
    }
});

get('date').addEventListener('change',function(){
    var d1 = new Date();
    var d2 = get('date').value;
    const date1 = new Date(d1);
    const date2 = new Date(d2);
    const time = (date2-date1)
    const days =  (time / (1000 * 60 * 60 * 24)); 

    if(days>=0){
        get("errDate").innerText = "Datede naissance invalide";
        get("btnupdate").disabled = true;
    }
    else {
        get("errDate").innerText = "";
        get("btnupdate").disabled = false;
    }
});
</script>

</html>