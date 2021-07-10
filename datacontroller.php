<?php
include("config.php");

//Points
$hTakaheQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=1";
$hTakaheResult = mysql_query($con, $hTakaheQueryPoints);
$hTakaheRow = mysql_fetch_array($hTakaheResult);

$hTiekeQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=2";
$hTiekeResult = mysql_query($con, $hTiekeQueryPoints);
$hTiekeRow = mysql_fetch_array($hTiekeResult);

$hTaraItiQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=3";
$hTaraItiResult = mysql_query($con, $hTaraItiQueryPoints);
$hTaraItiRow = mysql_fetch_array($hTaraItiResult);

$hKeaQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=4";
$hKeaResult = mysql_query($con, $hKeaQueryPoints);
$hKeaRow = mysql_fetch_array($hKeaResult);

$hKokakoQueryPoints = "SELECT HousePoints FROM house WHERE HouseID=1";
$hKokakoResult = mysql_query($con, $hKokakoQueryPoints);
$hKokakoRow = mysql_fetch_array($hKokakoResult);


?>
