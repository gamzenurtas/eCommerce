<?php
					
session_start();
$userID = $_SESSION["UserID"];
include "config.php";
$dynamic_list = "";

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

        if (strlen(trim($check)) == 0){
            $product_details = "<u>No Details</u>";
        }
		
		
		$itemtotalprice = $cart_product_piece * $cart_product_price;
		$totalcart= ($totalcart) + ($itemtotalprice);
        $more = "";
        if (strlen($product_details)>60) {
            $product_details = substr($product_details,60);
            $more = '...<a href="product_detail.php?id='.$product_id.'">read more</a>';
        }
        $dynamic_list .= '	
			<tbody>
													<tr class="cart_item">
														<td class="product-name">
															'.$cart_product_name.'
														</td>
														<td class="product-total">
															<span class="amount">
																<span class="df-Price-currencySymbol"></span>'.$cart_product_price.'
															</span>
														</td>
													</tr>

												</tbody>
												<tfoot>
													<tr class="cart-subtotal">
														<th>Sipariş Toplam</th>
														<td>
															<span class="amount">
																<span class="df-Price-currencySymbol"></span>268.00 ₺
															</span>
														</td>
													</tr>
													<tr class="shipping">
														<th>Kargo Ücreti</th>
														<td>
															<span class="amount">
																<span class="df-Price-currencySymbol"></span>10.00 ₺
															</span>
														</td>
													</tr>
													<tr class="coupon">
														<th>İndirim Kuponunuz</th>
														<td>
															<span class="amount">
																-<span class="df-Price-currencySymbol"></span>30.00 ₺
															</span>
														</td>
													</tr>
													<tr class="order-total">
														<th>Sipariş Toplamı</th>
														<td>
															<span class="amount">
																<span class="df-Price-currencySymbol"></span>248.00 ₺
															</span>
														</td>
													</tr>
												</tfoot>


		';
    }
}
else {
    $dynamic_list = "We have no products listed here.";
}
$connect = null;
?>
<!DOCTYPE html>
<html lang="TR">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<title>DAFRON ONLINE | DAİMA GÜCÜN ÜZERİNDE!</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sports Club, League and News HTML Template">
	<meta name="author" content="Dan Fisher">
	<meta name="keywords" content="sports club news HTML template">
	
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="assets/images/soccer/favicons/favicon.png">
	<link rel="apple-touch-icon" sizes="120x120" href="assets/images/soccer/favicons/favicon.png">
	<link rel="apple-touch-icon" sizes="152x152" href="assets/images/soccer/favicons/favicon.png">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<!-- Google Web Fonts
	================================================== -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CSource+Sans+Pro:400,700" rel="stylesheet">

	<!-- CSS
	================================================== -->
	<!-- Vendor CSS -->
	<link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	<link href="assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
	<link href="assets/vendor/slick/slick.css" rel="stylesheet">

	<!-- Template CSS-->
	<link href="assets/css/style-soccer.css" rel="stylesheet">
	<link href="assets/css/red2.css" rel="stylesheet">
	<!-- Template CSS-->
	<link href="assets/css/style-soccer.css" rel="stylesheet">
<link href="assets/css/theme.css" rel="stylesheet">
<link href="assets/css/fontawesome.min.css" rel="stylesheet">
		<link href="assets/css/all.min.css" rel="stylesheet">
	<!-- Custom CSS-->
	<link href="assets/css/custom.css" rel="stylesheet">
<script src="assets/js/fontawesome.min.js" rel="stylesheet"></script>
			<script src="assets/js/all.min.js" rel="stylesheet"></script>
</head>
<body class="nuewin">

	<div class="site-wrapper clearfix">

		<?php include"header.php"?>

		
		
		
		
		<!-- Content
		================================================== -->
		<div class="site-content">
			<div class="container">
		
		
				<!-- Checkout Form -->
				<form action="#" class="df-checkout">
		
					<div class="row">
		
						<div class="col-md-8">
							<!-- Shipping Details -->
							<div class="card card--lg">
								<div class="card__header card__header--has-checkbox">
									<h4>Kargo Detayları</h4>
									<label class="checkbox checkbox-inline">
										<input type="checkbox" name="ship_to_different_address" id="ship_to_different_address" value="1"> Fatura adresini kullan
										<span class="checkbox-indicator"></span>
									</label>
								</div>
								<div class="card__content">
										<div class="form-group form-group--sm">
											<label for="billing_address_1">Ad<abbr class="required" title="required">*</abbr></label>
											<input type="text" name="billing_address_1" id="billing_address_1" class="form-control" placeholder="Lütfen adınızı girin...">
										</div>
										<div class="form-group form-group--sm">
											<label for="billing_address_1">Soyad<abbr class="required" title="required">*</abbr></label>
											<input type="text" name="billing_address_1" id="billing_address_1" class="form-control" placeholder="Lütfen soyadınızı girin...">
										</div>
										<div class="form-group form-group--sm">
											<label for="billing_address_1">Telefon<abbr class="required" title="required">*</abbr></label>
											<input type="text" name="billing_address_1" id="billing_address_1" class="form-control" placeholder="Lütfen telefon numaranızı girin...">
										</div>
										<div class="form-group form-group--sm">
											<label for="billing_address_1">E-mail<abbr class="required" title="required">*</abbr></label>
											<input type="text" name="billing_address_1" id="billing_address_1" class="form-control" placeholder="Lütfen e-mail adresinizi girin...">
										</div>
										<div class="form-group">
											<label for="billing_country">İl</label>
											<select name="billing_country" id="billing_country" class="form-control">
												<option value="0">Şehrinizi Seçin...</option>
												<option value="İstanbul">İstanbul</option>
												<option value="Ankara">Ankara</option>
												<option value="İzmir">İzmir</option>
												<option value="Antalya">Antalya</option>
											</select>
										</div>
										<div class="form-group">
											<label for="billing_country">İlçe</label>
											<select name="billing_country" id="billing_country" class="form-control">
												<option value="0">Şehrinizi Seçin...</option>
												<option value="İstanbul">İstanbul</option>
												<option value="Ankara">Ankara</option>
												<option value="İzmir">İzmir</option>
												<option value="Antalya">Antalya</option>
											</select>
										</div>																				
										<div class="form-group form-group--sm">
											<label for="billing_address_1">Tam Adres<abbr class="required" title="required">*</abbr></label>
											<input type="text" name="billing_address_1" id="billing_address_1" class="form-control" placeholder="Lütfen tam adresinizi girin...">
										</div>	
										<div class="form-group mb-0">
											<label for="order_comments_1">Adres İle ilgili not</label>
											<textarea style="height:150px;" name="order_comments_1" id="order_comments_1" rows="7" class="form-control" placeholder="Eczanenin yanı, marketin üstü gibi ayrıntılar.."></textarea>
										</div>
										<div class="form-group mb-0">
											<label for="order_comments_2">Kargo ile ilgili not</label>
											<textarea style="height:150px;" name="order_comments_2" id="order_comments_2" rows="7" class="form-control" placeholder="Eczanenin yanı, marketin üstü gibi ayrıntılar.."></textarea>
										</div>
		
								</div>
							</div>
							<!-- Shipping Details / End -->
						</div>
		
						<div class="col-md-4">
		
							<!-- Order -->
							<div class="card card--has-table">
								<div class="card__header">
									<h4>Sipariş Ayrıntısı</h4>
								</div>
								<div class="card__content">
		
									<!-- Checkout Review Order -->
									<div class="df-checkout-review-order">
										<div class="table-responsive">
											<table class="df-checkout-review-order-table table">
												<thead>
													<tr>
														<th class="product-name">Ürün</th>
														<th class="product-total">Toplam</th>
													</tr>
												</thead>
												<p><?php echo $dynamic_list; ?> </p>
											
											</table>
										</div>
									</div>
									<!-- Checkout Review Order / End -->
		
									<!-- Checkout Payment -->
									<div class="df-checkout-payment">
										<ul class="df_payment_methods" id="df_payment_methods" role="tablist" aria-multiselectable="true">
		
											<li class="df_payment_method panel">
												<label class="radio radio-inline" for="payment_method_basc" data-toggle="collapse" data-target="#payment_method_basc_panel" id="headingOne">
													<input type="radio" id="payment_method_basc" name="payment_method" value="cheque" checked> Para Transferi
													<span class="radio-indicator"></span>
												</label>
												<div id="payment_method_basc_panel" class="payment_box collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#df_payment_methods">
													<p>Hesap bilgileri sayfasına yönlendirilirsiniz ve banka hesap numaralarımıza havel & eft yapabilirsiniz. Sonrasın ödeme bildirim sayfası ile bizim ile iletişim kurabilirsiniz.</p>
												</div>
											</li>
		
											<li class="df_payment_method panel">
												<label class="radio radio-inline" for="payment_method_cheque" data-toggle="collapse" data-target="#payment_method_cheque_panel" id="headingTwo">
													<input type="radio" id="payment_method_cheque" name="payment_method" value="cheque"> Kredi Kartı
													<span class="radio-indicator"></span>
												</label>
												<div id="payment_method_cheque_panel" class="payment_box collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#df_payment_methods">
													<p>Kredi kartı ile ödeme sayfasına yönlendirilirsiniz, ödemeniz gerçekleştikten sonra siparişiniz hazırlanıp kargoya verilir.</p>
												</div>
											</li>
		
										
		
										</ul>
										<div class="place-order">
											<input type="submit" class="btn btn-primary btn-lg btn-block" name="df_checkout_place_order" id="place_order" value="Siparişinizi Tamamlayın..!">
										</div>
									</div>
									<!-- Checkout Payment / End -->
		
								</div>
							</div>
							<!-- Order / End -->
		
						</div>
					</div>
				</form>
				<!-- Checkout Form / End -->
		
			</div>
		</div>
		
		<!-- Content / End -->
		
		
		
		
		
		
		
		
		
		
		
		<!-- Footer
		================================================== -->
		<?php include"footer.php"?>
		<!-- Footer / End -->
		
		
		<!-- Login/Register Tabs Modal -->
		<div class="modal fade" id="modal-login-register-tabs" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-lg modal--login" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>
							<div class="modal-body">
				
								<div class="modal-account-holder">
									<div class="modal-account__item">
				
										<!-- Register Form -->
										<form  class="modal-form">
											<h5>Şimdi Kayıt Zamanı</h5>
											<div class="form-group">
												<input type="email" class="form-control" placeholder="Mail Adresinizi Giriniz...">
											</div>
											<div class="form-group">
												<input type="password" class="form-control" placeholder="Şifrenizi Giriniz...">
											</div>
											<div class="form-group">
												<input type="password" class="form-control" placeholder="Şifrenizi Tekrar Giriniz...">
											</div>
											<div class="form-group form-group--submit">
												<a href="#" class="btn btn-primary btn-block">Üyelik Oluştur</a>
											</div>
											<div class="modal-form--note">
													Hesabınızı etkinleştirmek için bir bağlantı içeren gelen kutunuzda bir onay e-postası alacaksınız. </div>
										</form>
										<!-- Register Form / End -->
				
									</div>
									<div class="modal-account__item">
				
										<!-- Login Form -->
										<form  class="modal-form">
											<h5>Giriş Yap</h5>
											<div class="form-group">
												<input type="email" class="form-control" placeholder="Mail Adresinizi Giriniz...">
											</div>
											<div class="form-group">
												<input type="password" class="form-control" placeholder="Şifrenizi Giriniz...">
											</div>
											<div class="form-group form-group--pass-reminder">
												<label class="checkbox checkbox-inline">
													<input type="checkbox" id="inlineCheckbox1" value="option1" checked=""> Beni Hatırla
													<span class="checkbox-indicator"></span>
												</label>
												<a href="#">Şifremi Unuttum?</a>
											</div>
											<div class="form-group form-group--submit">
												<a href="#" class="btn btn-primary-inverse btn-block">Şimdi Giriş Yap</a>
											</div>
											<div class="modal-form--social">
												<h6>veya Sosyal Medya Hesabı ile Giriş Yapın</h6>
												<ul class="social-links social-links--btn text-center">
													<li class="social-links__item">
														<a href="#" class="social-links__link social-links__link--lg social-links__link--fb"><i class="fab fa-facebook-f"></i></a>
													</li>
													<li class="social-links__item">
														<a href="#" class="social-links__link social-links__link--lg social-links__link--twitter"><i class="fab fa-twitter"></i></a>
													</li>
													<li class="social-links__item">
														<a href="#" class="social-links__link social-links__link--lg social-links__link--gplus"><i class="fab fa-google-plus-g"></i></a>
													</li>
												</ul>
											</div>
										</form>
										<!-- Login Form / End -->
				
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>
		<!-- Login/Register Tabs Modal / End -->

	</div>

	<!-- Javascript Files
	================================================== -->
	<!-- Core JS -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/jquery/jquery-migrate.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
	<script src="assets/js/core.js"></script>
	
	<!-- Vendor JS -->
	<script src="assets/vendor/twitter/jquery.twitter.js"></script>
	
	<!-- Template JS -->
	<script src="assets/js/init.js"></script>
	<script src="assets/js/custom.js"></script>

</body>
</html>
