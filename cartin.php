<?php	require 'config.php';
	session_start;
	$dynamic_list1 = " ";
 	
if ($_SESSION["UserID"]>0) {
	$userid = $_SESSION["UserID"];
	 $sorgu = $connect->prepare("SELECT COUNT(*)
 FROM shopping_list where userID='$userid'");
		$sorgu->execute();
		$alisverislistesayi = $sorgu->fetchColumn(); 
	$res = $connect->prepare("SELECT * FROM shoppingcart as s INNER JOIN products p ON s.cartProductID=p.ProductID where userID = $userid  LIMIT 20");
    $res->execute([$_GET["id"]]);
	$totalcart = '0';
   while ($row = $res->fetch()) {
        $cart_id = $row['cartID'];
        $cart_product_id = $row['cartProductID'];
        $cart_product_name = $row['cartProductName'];
		$cart_product_price = $row['cartProductPrice'];
		$cart_product_piece = $row['cartProductPiece'];
		
				$cart_image = $row['ProductImage'];

		$itemtotalprice = $cart_product_piece * $cart_product_price;
		$totalcart= $totalcart + $itemtotalprice;
        $dynamic_list1 .= '			<div id="dolusepet'.$cart_id.'">
								<li  class="header-cart__item"> 
								
									<figure class="header-cart__product-thumb">
										<a href="#">
											<img src="'.$cart_image.'" height="107" width="84" alt="">
										</a>
									</figure>
									<div class="header-cart__inner">
										<span class="header-cart__product-cat">DAFRON</span>
										<h5 class="header-cart__product-name"><a href="#">'.$cart_product_name.'</a></h5>
										<div class="header-cart__product-ratings">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star empty"></i>
										</div>
										<div class="header-cart__product-sum">
											<span class="header-cart__product-price">'.$cart_product_price.' ₺</span> x <span
												class="header-cart__product-count">'.$cart_product_piece.'</span>
										</div>
										<div name="dolusepet'.$cart_id.'" onclick="deleteitem('.$cart_id.');deleteprice('.$cart_id.','.$cart_product_price.');"  class="fa fa-times header-cart__close"></div>
									</div>
								</li>
									</div>



								<!-- Products / End -->';
    }
					$dynamic_list2 .= '				
														<div id="dolupara">

					<li class="header-cart__item header-cart__item--subtotal">
									<span class="header-cart__subtotal">SEPET TOPLAMI</span>
									<span class="header-cart__subtotal-sum"> '.$totalcart.' ₺</span>
								</li>
								<li class="header-cart__item header-cart__item--action">
									<a href="shopping-cart.php" class="btn btn-default btn-block">SEPETE GİT</a>
									<a href="checkout.php" class="btn btn-primary-inverse btn-block">KASAYA GİT</a>
								</li>
																	</div>';

}

else {
    $dynamic_list1 = "</br><h6 style='margin-left:10px;'>Sepetinizde listelenecek bir ürün bulunmuyor.</h6>";
}
echo $dynamic_list1;
echo $dynamic_list2;

?>
<script>
function deleteitem(cart_id){
$.ajax({
							type:'POST', // Veri gönderme metodunu Post olarak seçiyoruz.
							url:"shopping-cart-delete.php?a="+cart_id, // Verilerin postlanağı adresi belirliyoruz.
 success: function(result) {
            $('#dolusepet'+cart_id).html(result);
        }
});
}


</script>
<script>
function deleteprice(cart_id){
$.ajax({
							type:'POST', // Veri gönderme metodunu Post olarak seçiyoruz.
							url:"shopping_price.php?a="+cart_id,
data:{}							// Verilerin postlanağı adresi belirliyoruz.
 success: function(result) {
            $('#dolupara').html(result);
        }
});
}

</script>

