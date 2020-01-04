<?php
					
session_start();
include "config.php";
$dynamic_list5 = "";
$userID = $_SESSION["UserID"];	

if(isset($userID)) {

echo ' ';
}

else 
{
	
	include "login.php";
}

$res = $connect->prepare("SELECT * FROM shoppingcart where userID = $userID  LIMIT 20");
$res->execute([$_GET["id"]]);

$productCount = $res->rowCount();
if ($productCount > 0) {
			$totalcart = '0';
    while ($row = $res->fetch()) {
        $cart_id = $row['cartID'];
        $cart_product_id = $row['cartProductID'];
        $cart_product_name = $row['cartProductName'];
		$cart_product_price = $row['cartProductPrice'];
		$cart_product_piece = $row['cartProductPiece'];
        $product_cat = $row['ProductAltCategoryID'];
        $product_details = $row['ProductDesc'];
        $check = $product_details;
$res1 = $connect->prepare("SELECT * FROM products where ProductID = $cart_product_id");
$res1->execute([$_GET["id"]]);
while($row1 = $res1->fetch()){
	        $productimage = $row1['ProductImage'];

}
        if (strlen(trim($check)) == 0){
            $product_details = "<u>No Details</u>";
        }


		$itemtotalprice = $cart_product_piece * $cart_product_price;
		$totalcart= $totalcart + $itemtotalprice;
		$kargo = '7';
									$kargotoplam=$totalcart+$kargo;
        $more = "";
        if (strlen($product_details)>60) {
            $product_details = substr($product_details,60);
            $more = '...<a href="product_detail.php?id='.$product_id.'">read more</a>';
        }
      
    }
	if($totalcart<=150){
	  $dynamic_list5 .= '		
	  	<div class="df-checkout-review-order">
									<div class="table-responsive">
									<table class="df-checkout-review-order-table table">
											<tfoot>
	<tr class="shipping">
													<th style="float:left;">Kargo</th>
													<td>
														<span class="amount">
															<span class="df-Price-currencySymbol">7.00 </span>₺
														</span>
													</td>
												</tr>
												<tr class="coupon">
													<th>150 TL ve Üzeri Alışverişlerinizde Kargo Ücretsiz!</th>												
												</tr>

												<tr id="toplamtutar" class="order-total">
													<th>Toplam</th>
													<td>
														<span class="amount">
															<span class="df-Price-currencySymbol"> '.$kargotoplam.'</span>₺
														</span>
													</td>
												</tr>
												</tfoot>
										</table>
</div>
					</div>




	<!-- Products / End -->';}
	else{
		 $dynamic_list5 .= '		
	  	<div class="df-checkout-review-order">
									<div class="table-responsive">
									<table class="df-checkout-review-order-table table">
											<tfoot>
	<tr class="shipping">
													<th style="float:left;">Kargo</th>
													<td>
														<span class="amount">
															<span class="df-Price-currencySymbol">0.00 </span>₺
														</span>
													</td>
												</tr>
												<tr class="coupon">
													<th>150 TL ve Üzeri Alışverişlerinizde Kargo Ücretsiz!</th>												
												</tr>

												<tr id="toplamtutar" class="order-total">
													<th>Toplam</th>
													<td>
														<span class="amount">
															<span class="df-Price-currencySymbol"> '.$totalcart.'</span>₺
														</span>
													</td>
												</tr>
												</tfoot>
										</table>
</div>
					</div>




	<!-- Products / End -->';
		
	}
	
}

echo $dynamic_list5;

?>