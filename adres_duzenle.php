<?php
																				include	 'config.php';
																				
																				$shipp = $_POST["shipping_id"];
																				$shipping_name = $_POST["shipping_name"];
																				$shipping_surname = $_POST["shipping_surname"];
																				$shipping_phone = $_POST["shipping_phone"];
																				$ShipEmail = $_POST["ShipEmail"];
																				$ship_il = $_POST["ship_il"];
																				$ship_ilce = $_POST["ship_ilce"];
																				$ShipAddress = $_POST["ShipAddress"];
																				$adres_not = $_POST["adres_not"];
																																								
/*	echo $shipp;
	echo $shipping_name;
	echo $shipping_surname;
	echo $shipping_phone;
	echo $ShipEmail;
	echo $ship_il;
	echo $ship_ilce;
	echo $ShipAddress;
	echo $adres_not;*/
	$denemeyazi = 'denemedeneme';
$connect->exec("UPDATE ship SET shipping_name= '$shipping_name',
shipping_surname = '$shipping_surname',
shipping_phone='$shipping_phone',
ship_il='$ship_il',
ship_ilce='$ship_ilce',
ShipEmail='$ShipEmail',
ShipAddress='$ShipAddress',
adres_not='$adres_not'
WHERE ShipID='$shipp' ");
										 
										
						?>