<?php
include 'req.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../bootstrap.css">
  <title>Home Admin</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="navbar-brand"><img src="./../logo.png" width="40" height="40"></div>
      <div class="media-body">
          <h4 class="m-0 text-light"><span class="text-primary">H</span>opitale</h4>
        </div>
      <a href="#x" data-toggle="collapse" class="navbar-toggler">
        <span class="navbar-toggler-icon"></span>
      </a>

      <div id="x" class="collapse navbar-collapse">
        <ul class="navbar-nav row">
          <li class="nav-item"><a href="./Face.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="./ListDoctors.php" class="nav-link">Liste des docteures</a></li>
          <li class="nav-item"><a href="./ListPatients.php" class="nav-link">Liste des patientes</a></li>
          <li class="nav-item"><a href="./ListRdv.php" class="nav-link">Liste des rendez-vous</a></li>
          <li class="nav-item"><a href="./DPR.php" class="nav-link">Liste docteur/Patient/Rendez-vous</a></li>
          <li class="nav-item"><a href="./DeconnecterAdmin.php" class="nav-link  ml-5">Deconnecter</a></li>
        </ul>
      </div>
    </nav>



</body>
<script src="./../jquery-3.6.0.min.js"></script>
<script src="./../bootstrap.js"></script>
<script src="./../popper.min.js"></script>

</html>