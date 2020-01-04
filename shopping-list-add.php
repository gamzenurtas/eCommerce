<?php
include "config.php";
$id = $_GET["a"];
    $res = $connect->prepare("SELECT * FROM products WHERE ProductID='$id'");
    $res->execute([$_GET["cat"]]);
$userid = $_SESSION["UserID"];

    while ($row = $res->fetch()) {
        
        $id2 = $row['ProductImage'];
		$id3 = $row['ProductName'];
        $id4= $row['ProductPrice'];
        $id5= $row['ProductDesc'];
		$id6 = $userid;	
		
	}
	
		if ($productCount > 0) {
		}
		else
		{
				$connect->exec("INSERT INTO shopping_list (listProductID, listProductImage, listProductName , listProductPrice, listProductDesc, userID) VALUES ('" . $id . "','" . $id2 . "', '" . $id3 . "', '" . $id4 . "', '" . $id5 . "', '" . $id6 . "')");
		
		}	
				require 'wishlist.php';				
?>

