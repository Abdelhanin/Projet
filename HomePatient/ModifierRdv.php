<?php
include './../cnx.php';
include 'req.php';
$num = $_GET['num'];
$cin = $_SESSION['cinp'];
$query = "select * from rdv where num_rdv =$num";
$result = mysqli_query($connection,$query);
if($result){
    while($row = mysqli_fetch_assoc($result)){
        $date1 = $row['date_rdv'];
        $time1 = $row['time_rdv'];
        $cinDoc1 = $row['cin_docteur'];
    }
}

if (isset($_POST['modifier'])) {
    if (empty($time1) || empty($date1) || empty($cinDoc1)) {
        echo '<div class="alert alert-danger text-center">Remplire tous les champs svp</div>';
    } else{
        $date2 = $_POST['date'];
        $time2 = $_POST['time'];
        $cinDoc2 = $_POST['doc'];
        $query2 = "update rdv set date_rdv='$date2',time_rdv ='$time2',cin_patient='$cin',cin_docteur='$cinDoc2' where num_rdv=$num";
        $result2 = mysqli_query($connection, $query2);
        if($result2){
                     header("location:./../HomePatient/Home.php");
                 }
                 else{
                     die("Problem".mysqli_error($connection));
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
    <title>Modifier RDV </title>
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
                <h3 class="font-weidth-bold py-3">Modifier le <span class="text-primary">Rendez-vous</span> </h3>
                <form method="POST">
                    <div class="form-row">
                        <div class="col-lg-6 my-2">
                            <label>Date de Rendez-vous :</label>
                        </div>
                        <div class="col-lg-6 my-2">
                            <input type="date" id="date" name="date" value="<?php echo $date1?>" class="form-control">
                            <small class="text-danger" id="errDate"></small>
                        </div>
                        <div class="col-lg-6 my-2">
                            <label>Heure de Rendez-vous :</label>
                        </div>
                        <div class="col-lg-6 my-2">
                            <input type="time" id="time" name="time" value="<?php echo $time1?>" class="form-control">
                            <small class="text-danger" id="errTime"></small>
                        </div>
                        <div class="col-lg-6 my-2">
                            <label>Cin Patient :</label>
                        </div>
                        <div class="col-lg-6 my-2">
                            <input type="text" disabled class="form-control" value="<?php echo $cin?>">
                        </div>
                        <div class="col-lg-6 my-2">
                            <label>Specialit de docteur :</label>
                        </div>
                        <div class="col-lg-6 my-2">
                            <select name="doc" class="form-control">
                                
                                <?php /*echo $cinDoc1*/
                                $query0 = "select cin_docteur,specialite from docteur where cin_docteur='$cinDoc1'";
                                $result0 = mysqli_query($connection,$query0);
                                if($result0){
                                    while($row = mysqli_fetch_assoc($result0)){
                                        // echo'<option>'.$row['specialite'].'</option>';
                                        // echo $row['specialite'];
                                        echo'<option value="'.$row['cin_docteur'].'">'.$row['specialite'].'</option>';
                                    }
                                }
                                ?>
                                
                                
                                <?php
                                $query = "select cin_docteur,specialite from docteur";
                                $result = mysqli_query($connection,$query);
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo'<option value="'.$row['cin_docteur'].'">'.$row['specialite'].'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                

                    <div class="form-row">
                        <div class="col-lg">
                            <button name="modifier" id="btnmodifier" class="btn btn-primary my-2 p-2"><a class="text-light">Modifier RDV</a></button>
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
            get("btnmodifier").disabled = true;
        } else {
            get("errDate").innerText = "";
            get("btnmodifier").disabled = false;
        }
    });

    get('time').addEventListener('change',function(){
        var t2 = get('time').value;
        if(t2>='08:00' && t2<='18:00'){
            get("errTime").innerText = "";
            get("btnmodifier").disabled = false;
        }
        else{
            get("errTime").innerText = "L'heure de rendez-vous doit etre entre 08:00 et 18:00";
            get("btnmodifier").disabled = true;
        }
    });
</script>
</html>