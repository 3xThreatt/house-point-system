<?php
include("controllers/config.php");

//Points
$hTakaheQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=1";
$hTakaheResult = mysqli_query($con, $hTakaheQueryPoints);
$hTakaheRow = mysqli_fetch_array($hTakaheResult);

$hTiekeQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=2";
$hTiekeResult = mysqli_query($con, $hTiekeQueryPoints);
$hTiekeRow = mysqli_fetch_array($hTiekeResult);

$hTaraItiQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=3";
$hTaraItiResult = mysqli_query($con, $hTaraItiQueryPoints);
$hTaraItiRow = mysqli_fetch_array($hTaraItiResult);

$hKeaQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=4";
$hKeaResult = mysqli_query($con, $hKeaQueryPoints);
$hKeaRow = mysqli_fetch_array($hKeaResult);

$hKokakoQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=1";
$hKokakoResult = mysqli_query($con, $hKokakoQueryPoints);
$hKokakoRow = mysqli_fetch_array($hKokakoResult);


$hTakaheDesc = $hTakaheRow
$hTiekeDesc = $hTiekeRow;
$hTaraItiDesc = $hTaraItiRow;
$hKeaDesc = $hKeaRow;
$hKokakoDesc = $hKokakoRow;

echo $hTakaheDesc;
echo $hTiekeDesc;
echo $hTaraItiDesc;
echo $hKeaDesc;
echo $hKokakoDesc;

?>
