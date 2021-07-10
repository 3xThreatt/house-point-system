<?php

$servername = "bmlx3df4ma7r1yh4.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "vx1h1np21zcrvaw7";
$password = "wa22ttir485i6ubp";
$dbname = "mxng6zffy3tp08tv";

$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}