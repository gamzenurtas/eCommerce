
<?php
					
session_start();
$userID = $_SESSION["UserID"];
include "config.php";
$userID = $_SESSION["UserID"];	
if(isset($userID)) {

}

else 
{
require "login.php";
}
$dynamic_list = "";

    $res = $connect->prepare("SELECT * FROM shopping_list where userID = $userID  LIMIT 20");
    $res->execute([$_GET["id"]]);



$productCount = $res->rowCount();
if ($productCount > 0) {
			$totalcart = '0';
    while ($row = $res->fetch()) {
        $list_id = $row['listID'];
        $list_product_id = $row['listProductID'];
		$list_product_image = $row['listProductImage'];
        $list_product_name = $row['listProductName'];
		$list_product_price = $row['listProductPrice'];
        $product_details = $row['listProductDesc'];
        $check = $product_details;

        if (strlen(trim($check)) == 0){
            $product_details = "<u>Detay bulunmamaktadır</u>";
        }
		
		
		$itemtotalprice = $cart_product_piece * $cart_product_price;
		$totalcart= ($totalcart) + ($itemtotalprice);
        $more = "";
        if (strlen($product_details)>60) {
            $product_details = substr($product_details,60);
            $more = '...<a href="product_detail.php?id='.$product_id.'">read more</a>';
        }
        $dynamic_list .= '			
		
		
							<tr>
										<td class="product__photo">
											<figure class="product__thumb">
												<a href="#"><img src="'.$list_product_image.'" alt=""></a>
											</figure>
										</td>
										<td class="product__info">
											<span class="product__cat">Sneakers</span>
											<h5 class="product__name"><a href="#">'.$list_product_name.'</a></h5>
											<div class="product__ratings">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star empty"></i>
											</div>
										</td>
										<td class="product__desc">
											'.$product_details.'										
										</td>
										
										<td class="product__price">
											'.$list_product_price.'₺
										</td>
										<td class="product__availability">
											Stokta
										</td>
										<td class="product__remove">
											<a  class="try-button example--2  product__remove-icon " name="dolu'.$list_id.'" onclick="deleteitemm('.$list_id.');shoppingdelete('.$list_id.');" ><i class="fas fa-times"></i></a>
										</td>
							</tr>	
		
								<!-- Products / End -->';
    }
}
else {
    $dynamic_list = "Alışveriş listenizde ürün bulunmamaktadır.";
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
<link href="assets/css/theme.css" rel="stylesheet">
	<link href="assets/css/red2.css" rel="stylesheet">
		<link href="assets/css/fontawesome.min.css" rel="stylesheet">
		<link href="assets/css/all.min.css" rel="stylesheet">

	<link href="assets/css/style-soccer.css" rel="stylesheet">

	<!-- Custom CSS-->
	<link href="assets/css/custom.css" rel="stylesheet">
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/fontawesome.min.js" rel="stylesheet"></script>
			<script src="assets/js/all.min.js" rel="stylesheet"></script>


<script type="text/javascript">
        var nuewinn = {"cart":{"products":[],"totals":{"total":{"type":"total","label":"Total","amount":0,"value":"$0.00"}},"subtotals":{"products":{"type":"products","label":"Subtotal","amount":0,"value":"$0.00"},"discounts":null,"shipping":{"type":"shipping","label":"Shipping","amount":0,"value":"Free"},"tax":null},"products_count":0,"summary_string":"0 items","labels":{"tax_short":"(tax incl.)","tax_long":"(tax included)"},"id_address_delivery":0,"id_address_invoice":0,"is_virtual":false,"vouchers":{"allowed":1,"added":[]},"discounts":[],"minimalPurchase":0,"minimalPurchaseRequired":""},"currency":{"name":"US Dollar","iso_code":"USD","iso_code_num":"840","sign":"$"},"customer":{"lastname":null,"firstname":null,"email":null,"last_passwd_gen":null,"birthday":null,"newsletter":null,"newsletter_date_add":null,"ip_registration_newsletter":null,"optin":null,"website":null,"company":null,"siret":null,"ape":null,"outstanding_allow_amount":0,"max_payment_days":0,"note":null,"is_guest":0,"id_shop":null,"id_shop_group":null,"id_default_group":1,"date_add":null,"date_upd":null,"reset_password_token":null,"reset_password_validity":null,"id":null,"is_logged":false,"gender":{"type":null,"name":null,"id":null},"risk":{"name":null,"color":null,"percent":null,"id":null},"addresses":[]},"language":{"name":"English (English)","iso_code":"en","locale":"en-US","language_code":"en-us","is_rtl":"0","date_format_lite":"m\/d\/Y","date_format_full":"m\/d\/Y H:i:s","id":1},"page":{"title":"","canonical":null,"meta":{"title":"Search","description":"","keywords":"","robots":"index"},"page_name":"search","body_classes":{"lang-en":true,"lang-rtl":false,"country-US":true,"currency-USD":true,"layout-full-width":true,"page-search":true,"tax-display-disabled":true},"admin_notifications":[]},"shop":{"name":"Claue","email":"claue@domain.com","registration_number":"","long":false,"lat":false,"logo":"\/claue\/img\/claue-logo-1495467822.jpg","stores_icon":"\/claue\/img\/logo_stores.png","favicon":"\/claue\/img\/favicon.ico","favicon_update_time":"1495467822","address":{"formatted":"Claue<br>184 Main Rd E, St Albans VIC 3021, Australia<br>Vietnam","address1":"184 Main Rd E, St Albans VIC 3021, Australia","address2":"","postcode":"","city":"","state":null,"country":"Vietnam"},"phone":"+01 23456789","fax":""},"urls":{"base_url":"http:\/\/demos.prestagold.com\/claue\/","current_url":"http:\/\/demos.prestagold.com\/claue\/en\/search?controller=search&s=asdas","shop_domain_url":"http:\/\/demos.prestagold.com","img_ps_url":"http:\/\/demos.prestagold.com\/claue\/img\/","img_cat_url":"http:\/\/demos.prestagold.com\/claue\/img\/c\/","img_lang_url":"http:\/\/demos.prestagold.com\/claue\/img\/l\/","img_prod_url":"http:\/\/demos.prestagold.com\/claue\/img\/p\/","img_manu_url":"http:\/\/demos.prestagold.com\/claue\/img\/m\/","img_sup_url":"http:\/\/demos.prestagold.com\/claue\/img\/su\/","img_ship_url":"http:\/\/demos.prestagold.com\/claue\/img\/s\/","img_store_url":"http:\/\/demos.prestagold.com\/claue\/img\/st\/","img_col_url":"http:\/\/demos.prestagold.com\/claue\/img\/co\/","img_url":"http:\/\/demos.prestagold.com\/claue\/themes\/tea_claue\/assets\/img\/","css_url":"http:\/\/demos.prestagold.com\/claue\/themes\/tea_claue\/assets\/css\/","js_url":"http:\/\/demos.prestagold.com\/claue\/themes\/tea_claue\/assets\/js\/","pic_url":"http:\/\/demos.prestagold.com\/claue\/upload\/","pages":{"address":"http:\/\/demos.prestagold.com\/claue\/en\/address","addresses":"http:\/\/demos.prestagold.com\/claue\/en\/addresses","authentication":"http:\/\/demos.prestagold.com\/claue\/en\/login","cart":"http:\/\/demos.prestagold.com\/claue\/en\/cart","category":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=category","cms":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=cms","contact":"http:\/\/demos.prestagold.com\/claue\/en\/contact-us","discount":"http:\/\/demos.prestagold.com\/claue\/en\/discount","guest_tracking":"http:\/\/demos.prestagold.com\/claue\/en\/guest-tracking","history":"http:\/\/demos.prestagold.com\/claue\/en\/order-history","identity":"http:\/\/demos.prestagold.com\/claue\/en\/identity","index":"http:\/\/demos.prestagold.com\/claue\/en\/","my_account":"http:\/\/demos.prestagold.com\/claue\/en\/my-account","order_confirmation":"http:\/\/demos.prestagold.com\/claue\/en\/order-confirmation","order_detail":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=order-detail","order_follow":"http:\/\/demos.prestagold.com\/claue\/en\/order-follow","order":"http:\/\/demos.prestagold.com\/claue\/en\/order","order_return":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=order-return","order_slip":"http:\/\/demos.prestagold.com\/claue\/en\/credit-slip","pagenotfound":"http:\/\/demos.prestagold.com\/claue\/en\/page-not-found","password":"http:\/\/demos.prestagold.com\/claue\/en\/password-recovery","pdf_invoice":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=pdf-invoice","pdf_order_return":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=pdf-order-return","pdf_order_slip":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=pdf-order-slip","prices_drop":"http:\/\/demos.prestagold.com\/claue\/en\/prices-drop","product":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=product","search":"http:\/\/demos.prestagold.com\/claue\/en\/search","sitemap":"http:\/\/demos.prestagold.com\/claue\/en\/sitemap","stores":"http:\/\/demos.prestagold.com\/claue\/en\/stores","supplier":"http:\/\/demos.prestagold.com\/claue\/en\/supplier","register":"http:\/\/demos.prestagold.com\/claue\/en\/login?create_account=1","order_login":"http:\/\/demos.prestagold.com\/claue\/en\/order?login=1"},"theme_assets":"\/claue\/themes\/tea_claue\/assets\/","actions":{"logout":"http:\/\/demos.prestagold.com\/claue\/en\/?mylogout="}},"configuration":{"display_taxes_label":false,"low_quantity_threshold":3,"is_b2b":false,"is_catalog":false,"show_prices":true,"opt_in":{"partner":true},"quantity_discount":{"type":"discount","label":"Discount"},"voucher_enabled":1,"return_enabled":0,"number_of_days_for_return":14},"field_required":[],"breadcrumb":{"links":[{"title":"Home","url":"http:\/\/demos.prestagold.com\/claue\/en\/"}],"count":1},"link":{"protocol_link":"http:\/\/","protocol_content":"http:\/\/"},"time":1552217050,"static_token":"4bbb84a853943eaf0b862c463fc3322d","token":"83105d439b0510a164a283a5aa34c4de"};
      </script>
	<!-- Template CSS-->
	<link href="assets/css/style-soccer.css" rel="stylesheet">

	<!-- Custom CSS-->
	<link href="assets/css/custom.css" rel="stylesheet">

</head>
<body class="nuewin">

	<div class="site-wrapper clearfix">

		<?php include"header.php"?>




		<!-- Content
		================================================== -->
		<div class="site-content">
			<div class="container">

				<!-- Shopping Cart -->
				<div class="card card--has-table">
					<div class="card__header">
						<h4>Alışveriş Sepeti</h4>
					</div>
					<div class="card__content">

						<div class="table-responsive">
							<table class="table shop-table">
								<thead>
									<tr>
										<th class="product__photo">Fotoğraf</th>
										<th class="product__info">Ürün Adı</th>
										<th class="product__desc">Ürün Açıklaması</th>									
										<th class="product__price">Fiyat</th>
										<th class="product__availability">Stok Durumu</th>
										<th class="product__remove"></th>
									</tr>
								</thead>
								<tbody>
									<p><?php echo $dynamic_list; ?> </p>																																			
								</tbody>
							</table>
						</div>

					</div>
				</div>
				<!-- Shopping Cart / End -->

			
				<!-- Shipping Details / End -->

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
	<script>
	function increaseValue() {
		  var value = parseInt(document.getElementById('number').value, 10);
		  value = isNaN(value) ? 0 : value;
		  value++;
		  document.getElementById('number').value = value;
		}

		function decreaseValue() {
		  var value = parseInt(document.getElementById('number').value, 10);
		  value = isNaN(value) ? 0 : value;
		  value < 1 ? value = 1 : '';
		  value--;
		  document.getElementById('number').value = value;
		}
	</script>
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
<script>

    function deleteitemm(list_id)
 
    { 
        
            $.ajax({ 
                type:"POST", 
							url:"shopping-list-delete.php?a="+list_id, // Verilerin postlanağı adresi belirliyoruz.
                success:function(result) 
                { 
                              $('#dolu'+list_id).html(result);
 
                } 
            }); 
        
    } 

</script>