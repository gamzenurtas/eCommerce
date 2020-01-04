<?php
										require 'config.php';
										session_start();
								$userID = $_SESSION["UserID"];	
								
								$connect->exec("INSERT INTO ship (shipping_name, shipping_surname, shipping_phone, ship_il, ship_ilce, ShipEmail, ShipAddress, adres_not, kargo_not, durum, userID) VALUES ('" . $_POST["shipping_name"] . "' , '" . $_POST["shipping_surname"] . "', '" . $_POST["shipping_phone"] . "', '" . $_POST["ship_il"] . "','" . $_POST["ship_ilce"] . "', '" . $_POST["ShipEmail"] . "', '" . $_POST["ShipAddress"] . "', '" . $_POST["adres_not"] . "', '" . $_POST["kargo_not"] . "', '" . $_POST["durum"] . "', '" . $userID . "')");

										 
																
								$son_id = $connect->lastInsertId();
								$_SESSION['kargo_id'] = $son_id;
								$kargo_id = $_SESSION['kargo_id'];
								
								
								
								$shipping_phone = $_SESSION['shipping_phone'];
								$ship_il = $_SESSION['ship_il'];
								$ship_ilce = $_SESSION['ship_ilce'];
								$ShipAddress = $_SESSION['ShipAddress'];
										
										
										
								$bireysel = $_SESSION['bireysel_fatura_id'];
								$kurumsal = $_SESSION['kurumsal_fatura_id'];
								$adresid = '';
								if($bireysel==null){
											$adresid = "k".$kurumsal;
										}
								else{
											$adresid = "b".$bireysel;
										}


					$res = $connect->query("SELECT * FROM shoppingcart where userID = '$userID'");
					
					$faturaid = strval( uniqid('dafron_'));
					$saattime = strval( date('H:i'));
					$tarihdate = strval( date("d/m/Y"));
					$myip = strval( $_SERVER['REMOTE_ADDR']);
					if($res->rowCount()){
					foreach ($res as $row) {
						$cart_id = $row['cartID'];
						$cart_id2 = $row['cartProductID'];
						$cart_id3 = $row['cartProductName'];
						$cart_id4 = $row['cartProductPrice'];
						$cart_id5 = $row['cartProductPiece'];
				
						$sorgu = $connect->exec("INSERT INTO completedorder (faturaid, kargoid, adresid, urunid, urunname, urunprice, urunpiece, userid, tarihDate, saatTime, userIP, siparisdurum) 
						VALUES	('" . $faturaid . "' , '" . $kargo_id . "', '" . $adresid . "', '" . $cart_id2 . "', '" . $cart_id3 . "', '" .$cart_id4 . "', '" . $cart_id5 . "', '" . $userID . "', '" . $tarihdate . "' , '" . $saattime . "' , '" . $myip . "' , '1')");
						if ($sorgu = true){$connect->exec("DELETE from shoppingcart where cartID='$cart_id'");}
					
					
					}}
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
										
						?>