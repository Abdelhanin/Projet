<?php
include 'cnx.php';
function filtervar($var)
{
    $var = htmlspecialchars($var);
    $var = trim($var);
    $var = strip_tags($var);
    return $var;
}
if (isset($_POST['login'])) {
    if (empty($_POST['cin']) || empty($_POST['pass'])) {
        echo '<div class="alert alert-danger text-center">Remplire tous les champs svp</div>';
    } else {
        $cin = filtervar($_POST['cin']);
        $pass = $_POST['pass'];
        if ($cin == 'patient' && $pass == 'patient123') {
            session_start();
            $_SESSION['cinp'] = $cin;
            header("location:./HomePatient/Home.php");
        } else {
            $query = "select * from patient where cin_patient = '$cin' && password_patient='$pass'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) != 0) {
                session_start();
                $_SESSION['cinp'] = $cin;
                header("location:./HomePatient/Home.php");
            } else echo '<div class="alert alert-danger text-center">Cin ou mots de passe incorrect</div>';
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
    <title>Login Patient</title>
    <style>
        .shadow {
            box-shadow: 5px 5px 10px 0.2rem rgba(48, 48, 48, 0.25);
        }
    </style>
    </style>
</head>

<body>
    <div class="container my-5">
        <h2 class=" font-weight-bold"><span class="text-primary ">H</span>opitale</h2>
        <div class="row no-gutters shadow">
            <div class="col-lg-5 col-md-5  text-center">
                <!-- style="height: 400px; width:400px" -->
                <img src="Patient.png" alt="" class="img-fluid ">
            </div>

            <div class="col-lg-7 col-md-7  py-4 px-5  ">
                <h1 class="font-weidth-bold py-3 ">Bonjour</h1>
                <h5>Connectez-vous à votre compte </h5><input type="button" id="demo" class="btn btn-outline-primary col-lg-3 col-md-3" value="Demo">
                <form method="POST">
                    <div class="form-row">
                        <div class="col-lg">
                            <input type="text" id="cin" placeholder="Cin" class="form-control mt-2 p-2" name="cin">

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg">
                            <input type="password" id="pass" placeholder="Mots de passe" class="form-control my-2 p-2" name="pass">
                        </div>
                    </div>
                    <div class="form-row form-check">
                        <div class="col-lg">
                            <input type="checkbox" class="form-check-input" id="check" onchange="f()"><label class="form-check-label">Afficher le mots de passe </label>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-lg">
                            <button class="btn btn-primary my-2 p-2" id="btnlog" name="login">Se connecter</button>
                        </div>
                    </div>
                    Vous n'avez pas un compte ? <a href="InscrirePatient.php" class="text-primary">Inscrire ici</a>
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


    get('demo').addEventListener('click', function() {
        get('cin').value = 'patient';
        get('pass').value = 'patient123';
    })
</script>


</html>