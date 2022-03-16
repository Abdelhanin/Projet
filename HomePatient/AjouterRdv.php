<?php
include './../cnx.php';
include 'req.php';
if (isset($_POST['addrdv'])) {
    $cin = $_SESSION['cinp'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $docteur = $_POST['doc'];
    if (empty($time) || empty($date) || empty($docteur)) {
        echo '<div class="alert alert-danger text-center">Remplire tous les champs svp</div>';
    } else {
        $query2 = "insert into rdv(date_rdv,time_rdv,cin_patient,cin_docteur) values('$date','$time','$cin','$docteur')";
        $result2 = mysqli_query($connection, $query2);
        if ($result2) {
            header("location:./../HomePatient/Home.php");
        } else {
            die("Problem" . mysqli_error($connection));
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
    <title>Ajouter RDV</title>
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
                <h3 class="font-weidth-bold py-3">Bienvenu dans l'espace <span class="text-primary">Rendez-vous</span> </h3>
                <form method="POST">
                    <div class="form-row">
                        <div class="col-lg-6 my-2">
                            <label>Date de Rendez-vous :</label>
                        </div>
                        <div class="col-lg-6 my-2">
                            <input type="date" id="date" name="date" class="form-control">
                            <small class="text-danger" id="errDate"></small>
                        </div>
                        <div class="col-lg-6 my-2">
                            <label>Heure de Rendez-vous :</label>
                        </div>
                        <div class="col-lg-6 my-2">
                            <input type="time" id="time" name="time" class="form-control">
                            <small class="text-danger" id="errTime"></small>
                        </div>
                        <div class="col-lg-6 my-2">
                            <label>Cin Patient :</label>
                        </div>
                        <div class="col-lg-6 my-2">
                            <input type="text" disabled class="form-control" value="<?php echo $_SESSION['cinp'] ?>">
                        </div>
                        <div class="col-lg-6 my-2">
                            <label>Specialit de docteur :</label>
                        </div>
                        <div class="col-lg-6 my-2">
                            <select name="doc" class="form-control custom-select">
                                <?php
                                $query = "select cin_docteur,specialite from docteur";
                                $result = mysqli_query($connection, $query);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['cin_docteur'] . '">' . $row['specialite'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg">
                            <button name="addrdv" id="addrdv" class="btn btn-primary my-2 p-2"><a class="text-light">Ajouter RDV</a></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
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

        if (days < 0) {
            get("errDate").innerText = "Date de rendez-vous doit etre supperieur a la date d'aujourdhui ";
            get("addrdv").disabled = true;
        } else {
            get("errDate").innerText = "";
            get("addrdv").disabled = false;
        }
    });

    get('time').addEventListener('change',function(){
        var t2 = get('time').value;
        if(t2>='08:00' && t2<='18:00'){
            get("errTime").innerText = "";
            get("addrdv").disabled = false;
        }
        else{
            get("errTime").innerText = "L'heure de rendez-vous doit etre entre 08:00 et 18:00";
            get("addrdv").disabled = true;
        }
    });
</script>

</html>