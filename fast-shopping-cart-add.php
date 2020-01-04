<?php
include "config.php";
$id = $_GET["b"];
$userid = $_GET["a"];


    $res1 = $connect->prepare("SELECT * FROM shoppingcart WHERE cartProductID='$id'");
    $res1->execute([$_GET["cat"]]);

$userid = $_SESSION["UserID"];

    while ($row1 = $res1->fetch()) {
			
        $productpiece = $row1['cartProductPiece'];

		
	}

    $res = $connect->prepare("SELECT * FROM products WHERE ProductID=$id");
    $res->execute([$_GET["cat"]]);
	
$sorgu = $connect->prepare("SELECT COUNT(*) FROM shoppingcart where 'cartProductID=$id' && userID = '$userid'");
$sorgu->execute();
$productCount = $sorgu->fetchColumn();

$userid = $_SESSION["UserID"];

    while ($row = $res->fetch()) {
		$id1 = $id;	
        $id2 = $row['ProductName'];
        $id3 = $row['ProductPrice'];
		$id4 = $userid;	
		$id5 = '1';
		
	}
		if ($productCount > 0) {
		$newproductpiece = $productpiece + $id5;
			$query = $connect->exec("UPDATE shoppingcart SET cartProductPiece = '$newproductpiece' WHERE cartProductID = '$id' && userID = '$userid'");
		}else
		{
				$connect->exec("INSERT INTO shoppingcart (cartProductID, cartProductName, cartProductPrice, , userID, cartProductPiece) VALUES ('" . $id1 . "','" . $id2 . "', '" . $id3 . "', '0',". $id4 ."', '". $id5 ."')");
		}	
				require 'cartin.php';					


				
?>


