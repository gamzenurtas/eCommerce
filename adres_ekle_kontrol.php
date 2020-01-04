<?php
										require 'config.php';
										session_start();
										$userID = $_SESSION["UserID"];	
										$connect->exec("INSERT INTO ship (shipping_name, shipping_surname, shipping_phone, ship_il, ship_ilce, ShipEmail, ShipAddress, adres_not, kargo_not, durum, userID) VALUES ('" . $_POST["shipping_name"] . "' , '" . $_POST["shipping_surname"] . "', '" . $_POST["shipping_phone"] . "', '" . $_POST["ship_il"] . "','" . $_POST["ship_ilce"] . "', '" . $_POST["ShipEmail"] . "', '" . $_POST["ShipAddress"] . "', '" . $_POST["adres_not"] . "', '" . $_POST["kargo_not"] . "', '1', '" . $userID . "')");
										
										 header("Location: account.php"); 
										 
										
						?>