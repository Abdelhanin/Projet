<?php
include 'Home.php';
include './../cnx.php';
// include 'req.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../bootstrap.css">
  <title>Home</title>


</head>

<body class="bg-dark">
  <div id="slide" class="carousel slide container w-75 text-center">
    <ol class="carousel-indicators">
      <li data-target="#slide" data-slide-to="0" class="active"></li>
      <li data-target="#slide" data-slide-to="1"></li>
      <li data-target="#slide" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active ">
        <img src="pat.png"  onclick="LP()" id="img1" onmouseover="MOP()" alt="" />
      </div>
      <div class="carousel-item ">
        <img src="doc.png" onclick="LD()" id="img2" onmouseover="MOD()" alt="" />
      </div>
      <div class="carousel-item ">
        <img src="rdv.png" alt="" onclick="LR()" id="img3" onmouseover="MOR()" />
      </div>
    </div>
    <!-- Button navigation next - prev -->
    <a href="#slide" class="carousel-control-next " data-slide="next">
      <span class="carousel-control-next-icon "></span>
    </a>
    <a href="#slide" class="carousel-control-prev" data-slide="prev">
      <span class="carousel-control-prev-icon "></span>
    </a>
  </div>
</body>
<script>
  function LD() {
    window.location.href = "./ListDoctors.php";
  }

  function LP() {
    window.location.href = "./ListPatients.php";
  }

  function LR() {
    window.location.href = "./ListRdv.php";
  }

  function MOP() {
    document.getElementById('img1').style.cursor = 'pointer';
  }

  function MOD() {
    document.getElementById('img2').style.cursor = 'pointer';
  }

  function MOR() {
    document.getElementById('img3').style.cursor = 'pointer';
  }
</script>

</html>