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
    $email = filter_var(filtervar(strtolower($_POST['email'])),FILTER_SANITIZE_EMAIL);
    $pass = strtolower($_POST['pass']);
    if (empty($email) || empty($pass)) {
        echo '<div class="alert alert-danger text-center">Veuillez remplire tous les champs svp </div>';
    } else {
        // $query = " select * from admin where email_admin ='$email' and password_admin ='$pass'";
        // $result = mysqli_query($connection, $query);
        // if (mysqli_num_rows($result) == 0) {
        //     echo '<div class="alert alert-danger text-center">Les donnes saisie incorrect</div>';
        // } else {
        //     session_start();
        //     $_SESSION['admin'] = 'true';
        //     header("location:./HomeAdmin/Face.php");
        // }
        if($email=='admin@gmail.com' && $pass=='admin'){
            session_start();
            $_SESSION['admin'] = 'true';
            header("location:./HomeAdmin/Face.php");
        }
        else{
            echo '<div class="alert alert-danger text-center">Les donnes saisie incorrect</div>';
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
    <title>Login Admin</title>
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
                <img src="Admin.png" alt="" class="img-fluid ">
            </div>

            <div class="col-lg-7 col-md-7  py-4 px-5  ">
                <h1 class="font-weidth-bold py-3">Bonjour <span class="text-primary font-weight-bold">Admin</span></h1>
                <h5>Connectez-vous à votre compte</h5> <input type="button" id="demo" class="btn btn-outline-primary col-lg-3 col-md-3" value="Demo">
                <form method="POST">
                    <div class="form-row">
                        <div class="col-lg">
                            <input type="email" id="email" placeholder="Adress Email" class="form-control my-2 p-2" name="email">
                            <small class="text-danger" id="errEmail"></small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg">
                            <input type="password" id="pass" placeholder="Mots de passe" class="form-control my-2 p-2" name="pass">
                        </div>
                    </div>
                    <div class="form-row form-check">
                        <div class="col-lg">
                            <input type="checkbox" class="form-check-input" id="check" onchange="f()"><label class="form-check-label">Afficher le mots de passse </label>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-lg">
                            <button class="btn btn-primary my-2 p-2" id="btnlog" name="login">Se connecter</button>
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
        get("errEmail").innerText = "* L’email doit avoir le format suivant : xxxxxx@xxxx.xxx";
        get("btnlog").disabled = true;
    } else {
        get("errEmail").innerText = "";
        get("btnlog").disabled = false;
    }
});

get('demo').addEventListener('click',function(){
    get('email').value='admin@gmail.com';
    get('pass').value='admin';
})
</script>

</html>