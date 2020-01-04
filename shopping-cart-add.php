<?php
include "config.php";
$id = $_GET["b"];
$userid = $_GET["a"];
$oid = $_GET["c"];
$ooid = $_GET["d"];


    $res1 = $connect->prepare("SELECT * FROM shoppingcart WHERE cartProductID=$id");
    $res1->execute([$_GET["cat"]]);

$userid = $_SESSION["UserID"];

    while ($row1 = $res1->fetch()) {
			
        $productpiece = $row1['cartProductPiece'];

		
	}

    $res = $connect->prepare("SELECT * FROM products WHERE ProductID=$id");
    $res->execute([$_GET["cat"]]);

	
$sorgu = $connect->prepare("SELECT COUNT(*) FROM shoppingcart where cartProductID=$id && userID = $userid");
$sorgu->execute();
$productCount = $sorgu->fetchColumn();

$userid = $_SESSION["UserID"];

    while ($row = $res->fetch()) {
		$id1 = $id;	
        $id2 = $row['ProductName'];
        $id3 = $row['ProductPrice'];			
		$id6 = $userid;
		$id7 ='1';
		
	}


$res2 = $connect->prepare("SELECT DISTINCT ov.optionsID,o.optionsID,optionValuesShortening,p.optionID,p.optionsID
FROM products as p INNER JOIN stock as s ON p.ProductID=s.urunID
INNER JOIN stockoptions as so ON s.stockID=so.stockID 
INNER JOIN productsoptions as po ON po.id=so.productOptionsID 
INNER JOIN optionvalues as ov ON ov.optionValuesID=po.optionsValuesID 
INNER JOIN options as o ON o.optionsID=ov.optionsID 
where urunID=$id && ov.optionsID=$oid ");
$res2->execute([$_GET["cat"]]);


	while ($row = $res2->fetch()) {
		
		$id4 =$row['optionValuesShortening'];
		
	}
 $res3 = $connect->prepare("SELECT ProductName,renk_img,ProductID,secenek2,renk_id FROM color as c INNER JOIN products as p ON p.ProductID=c.product_id INNER JOIN stock as s ON p.ProductID=s.urunID where ProductID=$id && renk_id=secenek2  ");
 $res3->execute([$_GET["cat"]]);

    while ($row = $res3->fetch()) {
        $id5 = $row['id'];
          			
	}
		if ($productCount > 0) {
		$newproductpiece = $productpiece + $id5;
			$query = $connect->exec("UPDATE shoppingcart SET cartProductPiece = $newproductpiece WHERE cartProductID = $id && userID = $userid");
		}else
		{
				$connect->exec("INSERT INTO shoppingcart (cartProductID, cartProductName, cartProductPrice, productDimension, productColor, userID, cartProductPiece) VALUES ('" . $id1 . "','" . $id2 . "', '" . $id3 . "', '". $id4 ."', '". $id5 ."', '". $id6 ."', '". $id7 ."')");
				require "shopping-cart.php";
		}	
								


				
?>




