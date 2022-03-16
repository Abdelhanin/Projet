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
    $cin = filtervar($_POST['cin']);
    $pass = $_POST['pass'];
    if (empty($cin) || empty($pass)) {
        echo '<div class="alert alert-danger text-center">Remplire tous les champs svp</div>';
    }
    if ($cin == 'docteur' && $pass = 'docteur123') {
        session_start();
        $_SESSION['cind'] = $cin;
        header("location:./HomeDoctor/Home.php");
    } else {
        $query = "select * from docteur where cin_docteur = '$cin' && password_docteur='$pass'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) != 0) {
            session_start();
            $_SESSION['cind'] = $cin;
            header("location:./HomeDoctor/Home.php");
        } else echo '<div class="alert alert-danger text-center">Cin ou mots de passe incorrect</div>';
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
    <title>Login Docteur</title>
    <style>
        .shadow {
            box-shadow: 5px 5px 10px 0.2rem rgba(48, 48, 48, 0.25);
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h2 class=" font-weight-bold"><span class="text-primary ">H</span>opitale</h2>
        <div class="row no-gutters shadow">
            <div class="col-lg-5 col-md-5  text-center">
                <!-- style="height: 400px; width:400px" -->
                <img src="Docteur1.png" alt="" class="img-fluid ">
            </div>

            <div class="col-lg-7 col-md-7  py-4 px-5  ">
                <h1 class="font-weidth-bold py-3">Bonjour <span class="text-primary font-weight-bold">Docteur</span></h1>
                <h5>Connectez-vous à votre compte </h5><input type="button" id="demo" class="btn btn-outline-primary col-lg-3 col-md-3" value="Demo">
                <form method="POST">
                    <div class="form-row">
                        <div class="col-lg">
                            <input type="text" id="cin" name="cin" placeholder="Cin" class="form-control my-2 p-2">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg">
                            <input type="password" id="pass" name="pass" placeholder="Mots de passe" class="form-control my-2 p-2">
                        </div>
                    </div>
                    <div class="form-row form-check">
                        <div class="col-lg">
                            <input type="checkbox" class="form-check-input" id="check" onchange="f()"><label class="form-check-label">Afficher le mots de passe </label>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-lg">
                            <button name="login" class="btn btn-primary my-2 p-2">Se connecter</button>
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
    function get(id) {
        return document.getElementById(id);
    }


    get('demo').addEventListener('click', function() {
        get('cin').value = 'docteur';
        get('pass').value = 'docteur123';
    })
</script>

</html>