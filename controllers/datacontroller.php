<?php
include("controllers/config.php");

//Points
$hTakaheQueryPoints = "SELECT * FROM house WHERE HouseID=1";
$hTakaheResult = mysqli_query($con, $hTakaheQueryPoints);
$hTakaheRow = mysqli_fetch_row($hTakaheResult);


$hTiekeQueryPoints = "SELECT * FROM house WHERE HouseID=2";
$hTiekeResult = mysqli_query($con, $hTiekeQueryPoints);
$hTiekeRow = mysqli_fetch_row($hTiekeResult);


$hTaraItiQueryPoints = "SELECT * FROM house WHERE HouseID=3";
$hTaraItiResult = mysqli_query($con, $hTaraItiQueryPoints);
$hTaraItiRow = mysqli_fetch_row($hTaraItiResult);


$hKeaQueryPoints = "SELECT * FROM house WHERE HouseID=4";
$hKeaResult = mysqli_query($con, $hKeaQueryPoints);
$hKeaRow = mysqli_fetch_row($hKeaResult);


$hKokakoQueryPoints = "SELECT * FROM house WHERE HouseID=5";
$hKokakoResult = mysqli_query($con, $hKokakoQueryPoints);
$hKokakoRow = mysqli_fetch_row($hKokakoResult);



$hTakaheID = $hTakaheRow[0];
$hTakakeName = $hTakaheRow[1];
$hTahakeColour = $hTakaheRow[2];
$hTakahePoint = $hTakaheRow[3];

$hTiekeID = $hTiekeRow[0];
$hTiekeName = $hTiekeRow[1];
$hTiekeColour = $hTiekeRow[2];
$hTiekePoint = $hTiekeRow[3];

$hTaraIteID =  $hTaraItiRow[0];
$hTaraIteName = $hTaraItiRow[1];
$hTaraIteColour = $hTaraItiRow[2];
$hTaraItiPoint = $hTaraItiRow[3];

$hKeaID = $hKeaRow[0];
$hKeaName = $hKeaRow[1];
$hKeaColour = $hKeaRow[2];
$hKeaPoint = $hKeaRow[3];

$hKokakoID = $hKokakoRow[0];
$hKokakoName = $hKokakoRow[1];
$hKokakoColour = $hKokakoRow[2];
$hKokakoPoint = $hKokakoRow[3];


?>
