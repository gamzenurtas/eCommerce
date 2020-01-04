<?php
		require 'config.php';
$id1 = $_GET["a"];
$id2 = $_GET["b"];
$id3 = $_GET["c"];
$id4 = $_GET["d"];
$id5 = $_GET["e"];			
	    $res = $connect->prepare("SELECT * FROM shoppingcart where cartProductID = $id1");
		$res->execute([$_GET["id"]]);
		$productCount = $res->rowCount();
		 
		
		if ($productCount > 0) {
			while ($row = $res->fetch()) {
        $productpiece = $row['cartProductPiece'];		
		}
		$newproductpiece = $productpiece + $id5;
			$query = $db->prepare("UPDATE shoppingcart SET cartProductPiece = $newproductpiece WHERE cartProductID = $id1");
		}else
		{
				$connect->exec("INSERT INTO shoppingcart (cartProductID, cartProductName, cartProductPrice, userID, cartProductPiece) VALUES ('" . $id1 . "','" . $id2 . "', '" . $id3 . "', '" . $id4 . "', '". $id5 ."')");
		}	
				require 'shopping-cart.php';				
?>