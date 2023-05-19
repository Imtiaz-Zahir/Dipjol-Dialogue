<?php



$server = "sql213.epizy.com";
$user = "epiz_34071436";
$password = "vtovDrkJzPvNujO";
$db = "epiz_34071436_dipjol";


$conn = new mysqli($server, $user, $password, $db);

if($conn->connect_error){
    die("connection failed!" . $conn->connect_error);

}