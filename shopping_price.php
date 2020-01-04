<?php 
require 'config.php';

$id1 = $_GET['a'];
$id2 = $_GET['b'];

	$dynamic_list2 = " ";
 	
if ($_SESSION["UserID"]>0) {
	$userid = $_SESSION["UserID"];
	 
	$res = $connect->prepare("SELECT * FROM shoppingcart where userID = $userid  ");
    $res->execute([$_GET["id"]]);
	$totalcart = '0';
   while ($row = $res->fetch()) {
        $cart_id = $row['cartID'];
        $cart_product_id = $row['cartProductID'];
        $cart_product_name = $row['cartProductName'];
		$cart_product_price = $row['cartProductPrice'];
		$cart_product_piece = $row['cartProductPiece'];
		

		$itemtotalprice = $cart_product_piece * $cart_product_price;
		$totalcart= $totalcart + $itemtotalprice;
     
    }
	
					$dynamic_list2 .= '				
					
														<div id="dolupara">

					<li class="header-cart__item header-cart__item--subtotal">
									<span class="header-cart__subtotal">SEPET TOPLAMI</span>
									<span class="header-cart__subtotal-sum"> '.$totalcart.' ₺</span>
								</li>
								<li class="header-cart__item header-cart__item--action">
									<a href="#" class="btn btn-default btn-block">SEPETE GİT</a>
									<a href="#" class="btn btn-primary-inverse btn-block">KASAYA GİT</a>
								</li>
																	</div>
';

}


echo $dynamic_list2;

?>