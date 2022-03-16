<?php
include 'cnx.php';
function filtervar($var)
{
    $var = htmlspecialchars($var);
    $var = trim($var);
    $var = strip_tags($var);
    return $var;
}

if (isset($_POST['inscrire'])) {
    if(empty($_POST['cin'])||empty($_POST['nom'])||empty($_POST['prenom'])||empty($_POST['email'])||empty($_POST['tele'])||empty($_POST['date'])||empty($_POST['adress'])||empty($_POST['pass'])||empty($_POST['sexe'])){
        echo '<div class="alert alert-danger text-center">Remplire tous les champs svp</div>';
    }
    else{
        $cin = filtervar($_POST['cin']);
        $nom = filter_var(filtervar($_POST['nom']),FILTER_SANITIZE_STRING);
        $prenom = filter_var(filtervar($_POST['prenom']),FILTER_SANITIZE_STRING);
        $email = filter_var(filtervar($_POST['email']),FILTER_SANITIZE_EMAIL);
        $tele = $_POST['tele'];
        $date = $_POST['date'];
        $adress = $_POST['adress'];
        $sexe = $_POST['sexe'];
        $pass = $_POST['pass'];
    
        $query = "select * from patient where cin_patient ='$cin'";
        $result = mysqli_query($connection, $query);
        if (mysqli_fetch_assoc($result) != 0) {
            echo '<div class="alert alert-danger text-center">Vous avez deja inscrit</div>';
        } else {
            $query = "insert into patient values('$cin','$nom','$prenom','$adress','$tele','$date','$sexe','$email','$pass')";
            $result = mysqli_query($connection, $query);
            if($result){
                header("location:LoginPatient.php");
            }
            else{
                die("Problem".mysqli_error($connection));
            }
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
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="mycss.css">
    <title>Inscrire Patient</title>
    <style>
        .shadow {
            box-shadow: 5px 5px 10px 0.2rem rgba(48, 48, 48, 0.25);

        }
    </style>
</head>

<body>
    
    <div class="container  my-5" >
        <h2 class=" font-weight-bold"><span class="text-primary ">H</span>opitale</h2>
        <div class="row no-gutters shadow" >
            <div class="col-lg-5  text-center" >
                <!-- style="height: 400px; width:400px" -->
                <img src="Patient.png" alt="" class="img-fluid ">
            </div>

            <div class="col-lg-7  py-4 px-5  ">
                <h3 class="font-weidth-bold py-3">Bienvenu dans l'espace <span class="text-primary">patient</span> </h3>
                <!-- <h5 class="badge badge-primary">Inscrire </h5> -->
                <form method="POST">
                    <div class="form-row">
                        <div class="col-lg-4 col-sm-4">
                            <input type="text" placeholder="Cin" name="cin" class="form-control my-2 p-2">
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <input type="text" placeholder="Nom" id="nom" name="nom" class="form-control my-2 p-2">
                            <small class="text-danger" id="errnom"></small>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <input type="text" placeholder="Prenom" id="prenom" name="prenom" class="form-control my-2 p-2">
                            <small class="text-danger" id="errprenom"></small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6">
                            <input type="email" placeholder="Email" id="email" name="email" class="form-control my-2 p-2">
                            <small class="text-danger" id="errEmail"></small>
                        </div>
                        <div class="col-lg-6">
                            <input type="number" placeholder="Numero de telephone"  id="tele" name="tele" class="form-control my-2 p-2">
                            <small class="text-danger" id="errTele"></small>
                        </div>
                    </div>

                    <hr>
                    <div class="form-row">
                        <div class="col-lg">
                            <label>Date de naissance :</label>
                            <input type="date" id="date" class="form-control my-2 p-2" name="date">
                            <small class="text-danger" id="errDate"></small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-6">
                            <input type="text" placeholder="Adress" name="adress" class="form-control my-2 p-2">
                        </div>
                        <div class="col-lg-6">
                            <select class="form-control my-2 p-2" id="sexe" name="sexe">
                                <option selected disabled>Sexe</option>
                                <option>Homme</option>
                                <option>Femme</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-12 col-sm-12">
                            <input type="password" id="pass" name="pass" placeholder="Mots de passe" class="form-control my-2 p-2">
                        </div>

                    </div>

                    <div class="form-row form-check">
                        <div class="col-lg my-2 p-2">
                            <input type="checkbox" class="form-check-input " id="check" onchange="f()"><label class="form-check-label">Afficher le mots de passse </label>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg">
                            <button name="inscrire" class="btn btn-primary my-2 p-2" id="btninsc"><a class="text-light">Inscrire</a></button>
                        </div>
                    </div>
                    Vous avez un compte ? <a href="LoginPatient.php" class="text-primary">Ce connecter ici</a>
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
    

    get("nom").addEventListener("input", function() {
    if (!/^[a-z]+$/i.test(this.value)&&(this.value)!=""){
        get("errnom").innerText = "Le nom doit contenir exclusivement des lettres";
        get("btninsc").disabled = true;
    } else {
        get("errnom").innerText = "";
        get("btninsc").disabled = false;
    }
});

get("prenom").addEventListener("input", function() {
    if (!/^[a-z]+$/i.test(this.value)&&(this.value)!="") {
        get("errprenom").innerText = "Le prenom doit contenir exclusivement des lettres";
        get("btninsc").disabled = true;
    } else {
        get("errprenom").innerText = "";
        get("btninsc").disabled = false;
    }
});


get("email").addEventListener("input", function() {
    if (!/^[a-zA-Z0-9]+@[a-z]{2,8}\.[a-z]{2,4}$/.test(this.value)&&(this.value)!="") {
        get("errEmail").innerText = "* L’email doit avoir le format suivant : xxxxxx@xxxx.xxx";
        get("btninsc").disabled = true;
    } else {
        get("errEmail").innerText = "";
        get("btninsc").disabled = false;
    }
});

get("tele").addEventListener("input", function() {
    if (!/^06\d{8}$/.test(this.value)&&(this.value)!="") {
        get("errTele").innerText = "* Le numero doit avoir le format suivant : 06********";
        get("btninsc").disabled = true;
    } else {
        get("errTele").innerText = "";
        get("btninsc").disabled = false;
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
        get("btninsc").disabled = true;
    }
    else {
        get("errDate").innerText = "";
        get("btninsc").disabled = false;
    }
})
// function ss(){
    
//     // var datet = datej.getDate();
//     // var dateN = get('date').value;
//     // var diff = new Date(datej.getTime()-dateN.getTime());
//     // alert(diff);

//     // function diff(d1, d2) {
//     //     return (d2.getFullYear())-(d1.getFullYear());
//     // }

//     // alert(days);
//     // alert(time);

// }

</script>

</html>