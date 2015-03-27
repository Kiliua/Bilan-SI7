<?php
include_once('CLASS/autoload.php');   // pour inclure nos classes

$site = new Page_Reservation('Reservation');
$site->corps = $site->Creation_Reservation_1();	
$site->affiche();
//
?>

