<?php
include("controllers/config.php");

//Points
$hTakaheQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=1";
$hTakaheResult = mysqli_query($con, $hTakaheQueryPoints);
$hTakaheRow = mysqli_fetch_row($hTakaheResult);

$hTiekeQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=2";
$hTiekeResult = mysqli_query($con, $hTiekeQueryPoints);
$hTiekeRow = mysqli_fetch_row($hTiekeResult);

$hTaraItiQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=3";
$hTaraItiResult = mysqli_query($con, $hTaraItiQueryPoints);
$hTaraItiRow = mysqli_fetch_row($hTaraItiResult);

$hKeaQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=4";
$hKeaResult = mysqli_query($con, $hKeaQueryPoints);
$hKeaRow = mysqli_fetch_row($hKeaResult);

$hKokakoQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=1";
$hKokakoResult = mysqli_query($con, $hKokakoQueryPoints);
$hKokakoRow = mysqli_fetch_row($hKokakoResult);


$hTakaheDesc = $hTakaheRow[0];
$hTiekeDesc = $hTiekeRow[0];
$hTaraItiDesc = $hTaraItiRow[0];
$hKeaDesc = $hKeaRow[0];
$hKokakoDesc = $hKokakoRow[0];

?>
