<?php
		require 'config.php';
session_start();
$userID = $_SESSION["UserID"];	

$res1 = $connect->prepare("SELECT * FROM customers where UserID = '$userID'");					
$res1->execute([$_GET["id"]]);
$row1 = $res1->fetch();

$mailadres = $row1['UserEmail'];
$myip =strval(uniqid('teklif_'));
					$res = $connect->prepare("SELECT * FROM shoppingcart where userID = '$userID'");					
					$res->execute([$_GET["id"]]);
					while ($row = $res->fetch()) {
						$cart_id = $row['cartID'];
						$cart_id2 = $row['cartProductID'];
						$cart_id3 = $row['cartProductName'];
						$cart_id4 = $row['cartProductPrice'];
						$cart_id5 = $row['cartProductPiece'];
						$cart_id6 = $cart_id4*$cart_id5 ;
						
						$connect->exec("INSERT INTO tekliftablo (userid, teklifid, cartid, cartproductid, cartproductname, cartproductprice, cartproductpiece, total, mailadres) VALUES 
						('". $userID ."', '". $myip ."', '".$cart_id."', '".$cart_id2."', '".$cart_id3."', '".$cart_id4."', '".$cart_id5."', '".$cart_id6."', '".$mailadres."')");
																					
					
					}

		require 'account.php';
?>

