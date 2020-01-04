<?php
		require 'config.php';
$id1 = $_POST['value'];
$id2 = $_POST['cartid'];

				$connect->exec("UPDATE shoppingcart SET cartProductPiece='$id1' where cartID='$id2' ");


		
?>

