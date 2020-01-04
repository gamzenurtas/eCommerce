<?php
					
session_start();
$userID = $_SESSION["UserID"];
include "config.php";
$dynamic_list = "";
$dynamic_list1 = "";
$kargo_price=0;
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
		
		
	
        $more = "";
        if (strlen($product_details)>60) {
            $product_details = substr($product_details,60);
            $more = '...<a href="product_detail.php?id='.$product_id.'">read more</a>';
        }
		if($totalcart<150){
			
			$kargo_price=7;
		}
		
		else{
			
			$kargo_price=0;			
			
		}
	    $itemtotalprice = $cart_product_piece * $cart_product_price;
		$totalcart= ($totalcart) + ($itemtotalprice) + ($kargo_price);
        $dynamic_list .= '			 
		
		
									<tr class="cart_item">
														<td class="product-name">
															'.$cart_product_name.'
														</td>
														<td class="product-total">
															<span class="amount">
																<span class="df-Price-currencySymbol"></span>'.$cart_product_price.'₺
															</span>
														</td>
													</tr>
';
	$dynamic_list1 .= '		
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
												
		
		
									
';
    }
}
else {
    $dynamic_list = "We have no products listed here.";
}
$connect = null;
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>jQeury.steps Demos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css1/normalize.css">
        <link rel="stylesheet" href="css1/main.css">
        <link rel="stylesheet" href="css1/jquery.steps.css">
		 <script src="lib/modernizr-2.6.2.min.js"></script>
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
	<!-- Template CSS-->
	<link href="assets/css/style-soccer.css" rel="stylesheet">
 <link rel="stylesheet" href="assets/css/bootstrapp.min.css">
    <!-- Optional theme -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/js/bootstrapp.min.js"></script>
	<!-- Custom CSS-->
	<link href="assets/css/custom.css" rel="stylesheet">
	<script src="assets/js/fontawesome.min.js" rel="stylesheet"></script>
	<script src="assets/js/all.min.js" rel="stylesheet"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>    
	<!-- CSS
	================================================== -->
    </head>
	<style>
@import url(https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700);
/* written by riliwan balogun https://www.facebook.com/riliwan.rabo*/

.board .nav-tabs {
    position: relative;
    /* border-bottom: 0; */
    /* width: 80%; */
    margin: 40px auto;
    margin-bottom: 0;
    box-sizing: border-box;

}


p.narrow{
    width: 60%;
    margin: 10px auto;
}

.liner{
    height: 2px;
    background: #ddd;
    position: absolute;
    width: 60%;
    margin: 0 auto;
    left: 0;
    right: 69px;
    top: 50%;
    z-index: 1;
}

.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    /* background-color: #ffffff; */
    border: 0;
    border-bottom-color: transparent;
}

span.round-tabs{
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: white;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}

span.round-tabs.one{
    color: rgb(34, 194, 34);border: 2px solid rgb(34, 194, 34);
}

li.active span.round-tabs.one{
    background: #fff !important;
    border: 2px solid #ddd;
    color: rgb(34, 194, 34);
}

span.round-tabs.two{
    color: #074a6a;border: 2px solid #074a6a;
}

li.active span.round-tabs.two{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #074a6a;
}

span.round-tabs.three{
    color: #074a6a;border: 2px solid #074a6a;
}

li.active span.round-tabs.three{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #074a6a;
}

span.round-tabs.four{
    color: #074a6a;border: 2px solid #074a6a;
}

li.active span.round-tabs.four{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #074a6a;
}

span.round-tabs.five{
    color: #074a6a;border: 2px solid #074a6a;
}

li.active span.round-tabs.five{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #074a6a;
}

.nav-tabs > li.active > a span.round-tabs{
    background: #fafafa;
}
.nav-tabs > li {
    width: 20%;
}
/*li.active:before {
    content: " ";
    position: absolute;
    left: 45%;
    opacity:0;
    margin: 0 auto;
    bottom: -2px;
    border: 10px solid transparent;
    border-bottom-color: #fff;
    z-index: 1;
    transition:0.2s ease-in-out;
}*/
.nav-tabs > li:after {
    content: " ";
    position: absolute;
    left: 45%;
   opacity:0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #ddd;
    transition:0.1s ease-in-out;
    
}
.nav-tabs > li.active:after {
    content: " ";
    position: absolute;
    left: 45%;
   opacity:1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #ddd;
    
}
.nav-tabs > li a{
   width: 70px;
   height: 70px;
   margin: 20px auto;
   border-radius: 100%;
   padding: 0;
}

.nav-tabs > li a:hover{
    background: transparent;
}

.tab-content{
}
.tab-pane{
   position: relative;
padding-top: 50px;
}
.tab-content .head{
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 25px;
    text-transform: uppercase;
    padding-bottom: 10px;
}
.btn-outline-rounded{
    padding: 10px 40px;
    margin: 20px 0;
    border: 2px solid transparent;
    border-radius: 25px;
}

.btn.green{
    background-color:#5cb85c;
    /*border: 2px solid #5cb85c;*/
    color: #ffffff;
}



@media( max-width : 585px ){
    
    .board {
width: 90%;
height:auto !important;
}
    span.round-tabs {
        font-size:16px;
width: 50px;
height: 50px;
line-height: 50px;
    }
    .tab-content .head{
        font-size:20px;
        }
    .nav-tabs > li a {
width: 50px;
height: 50px;
line-height:50px;
}

.nav-tabs > li.active:after {
content: " ";
position: absolute;
left: 35%;
}

.btn-outline-rounded {
    padding:12px 20px;
    }
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #292c31 !important;
    border-bottom: 2px solid #0094e0 !important;
    border-radius: 0px !important;
	color: #333 !important;
    background-color: #fff !important;
}
.nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus {
    color: #333 !important;
    background-color: #fff !important;
}
.nav>li>a:hover, .nav>li>a:focus {
    text-decoration: none;
    background-color: rgba(255, 255, 255, 0.15) !important;
}

</style>
    <body class="nuewin">
		<div class="site-wrapper clearfix">
				<?php include"header.php"?>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
				<div class="content">
					

					<script>
						$(function ()
						{
							$("#wizard").steps({
								headerTag: "h2",
								bodyTag: "section",
								transitionEffect: "slideLeft"
							});
						});
					</script>

					<div id="wizard">
						<h2>Fatura Bilgileri</h2>
						<section>
							<div class="row">
									<div class="col-md-8">
										<div class="card__header">
												<h4>Fatura Detayları</h4>
										</div>		
									<ul style="margin-top:25px;" class="nav nav-pills mb-3" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Bireysel</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Kurumsal</a>
								</li>							  
							</ul>
							<div style="margin-top:-40px;" class="tab-content" id="pills-tabContent">
							  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
							  <!-- Billing Details -->
												<form id="fatura_form" action="bireysel_fatura_kontrol.php" method="post"  class="modal-form">
														<div class="card card--lg">
															
															<div class="card__content">
																<div class="df-billing-fields">
														
																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="bireysel_faturaName">Adınız <abbr class="required" title="required">*</abbr></p>
																				<input type="text" name="bireysel_faturaName" id="bireysel_faturaName" value="<?php if(isset($_POST['bireysel_faturaName'])) echo $_POST['bireysel_faturaName'] ?>" class="form-control" placeholder="Lütfen adınızı girin...">
																			</div>
																		</div>

																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="billing_last_name">Soyadınız <abbr class="required" title="required">*</abbr></p>
																				<input type="text" name="bireysel_faturaSurname" id="bireysel_faturaSurname" value="<?php if(isset($_POST['bireysel_faturaSurname'])) echo $_POST['bireysel_faturaSurname'] ?>" class="form-control" placeholder="Lütfen soyadınızı girin...">
																			</div>
																		</div>

																	</div>

																	<div class="row">

																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="bireysel_faturaTC">TC Kimlik Numarası<abbr class="required" title="required">*</abbr></p>
																				<input type="text" name="bireysel_faturaTC" maxlength="11" id="bireysel_faturaTC" value="<?php if(isset($_POST['bireysel_faturaTC'])) echo $_POST['bireysel_faturaTC'] ?>" class="form-control" placeholder="Lütfen TC kimlik numaranızı yazın...">
																			</div>
																		</div>

																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="bireysel_faturaPhone">Telefon Numarası<abbr class="required" title="required">*</abbr></p>
																				<input type="text" name="bireysel_faturaPhone" id="bireysel_faturaPhone" value="<?php if(isset($_POST['bireysel_faturaPhone'])) echo $_POST['bireysel_faturaPhone'] ?>" class="form-control" placeholder="Lütfen telefon numaranızı yazın...">
																			</div>
																		</div>

																	</div>
																	<div class="form-group">
																				<p for="bireysel_faturaEmail">E-mail <abbr class="required" title="required">*</abbr></p>
																				<input type="email" name="bireysel_faturaEmail" id="bireysel_faturaEmail" value="<?php if(isset($_POST['bireysel_faturaEmail'])) echo $_POST['bireysel_faturaEmail'] ?>" class="form-control" placeholder="Lütfen e-mail adresinizi girin...">
																	</div>
																	<div class="row">

																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="bireysel_fatura_il">İl</p>
																				<select name="bireysel_fatura_il" id="bireysel_fatura_il" value="<?php if(isset($_POST['bireysel_fatura_il'])) echo $_POST['bireysel_fatura_il'] ?>" class="form-control">
																					<option value="0">Şehrinizi Seçin...</option>
																					<option value="İstanbul">İstanbul</option>
																					<option value="Ankara">Ankara</option>
																					<option value="İzmir">İzmir</option>
																					<option value="Antalya">Antalya</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="bireysel_fatura_ilce">İlçe</p>
																				<select name="bireysel_fatura_ilce" id="bireysel_fatura_ilce" value="<?php if(isset($_POST['bireysel_fatura_ilce'])) echo $_POST['bireysel_fatura_ilce'] ?>" class="form-control">
																					<option value="0">Şehrinizi Seçin...</option>
																					<option value="İstanbul">İstanbul</option>
																					<option value="Ankara">Ankara</option>
																					<option value="İzmir">İzmir</option>
																					<option value="Antalya">Antalya</option>
																				</select>
																			</div>
																		</div>

																		
																	</div>
																	
																	<div class="form-group form-group--sm">
																		<p for="bireysel_faturaAdres">Tam Adres<abbr class="required" title="required">*</abbr></p>
																		<textarea type="text" name="bireysel_faturaAdres" id="bireysel_faturaAdres" class="form-control" value="<?php if(isset($_POST['bireysel_faturaAdres'])) echo $_POST['bireysel_faturaAdres'] ?>" placeholder="Lütfen tam adresinizi girin..."></textarea>
																	</div>
																	<div class="place-order">
																			<input onclick="enableBtn()" type="submit" class="btn btn-primary btn-lg btn-block" name="df_checkout_place_order" value="Faturayı Kaydet ve Devam Et">
																	</div>														
																</div>
															</div>
														</div>
													</form>
														
														<!-- Billing Details / End -->
							  
							  
							  </div>
							  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
									<!-- Billing Details -->
									<form action="kurumsal_fatura_kontrol.php" method="post"  class="modal-form">
														<div class="card card--lg">
															
															<div class="card__content">
																<div class="df-billing-fields">

																	<div class="row">

																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="kurumsal_faturaUnvan">Unvan <abbr class="required" title="required">*</abbr></p>
																				<input type="text" name="kurumsal_faturaUnvan" id="kurumsal_faturaUnvan" value="<?php if(isset($_POST['kurumsal_faturaUnvan'])) echo $_POST['kurumsal_faturaUnvan'] ?>" class="form-control" placeholder="Lütfen unvanınızı giriniz...">
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="kurumsal_fatura_phone">Telefon Numarası</p>
																				<input type="text" name="kurumsal_fatura_phone" id="kurumsal_fatura_phone" value="<?php if(isset($_POST['kurumsal_fatura_phone'])) echo $_POST['kurumsal_fatura_phone'] ?>" class="form-control" placeholder="Lütfen telefon numaranızı yazın...">
																			</div>
																		</div>
																		

																	</div>
																	<div class="row">

																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="kurumsal_faturaUnvan">Ad <abbr class="required" title="required">*</abbr></p>
																				<input type="text" name="kurumsal_fatura_ad" id="kurumsal_fatura_ad" value="<?php if(isset($_POST['kurumsal_fatura_ad'])) echo $_POST['kurumsal_fatura_ad'] ?>" class="form-control" placeholder="Lütfen adınızı giriniz...">
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="kurumsal_fatura_soyad">Soyad</p>
																				<input type="text" name="kurumsal_fatura_soyad" id="kurumsal_fatura_soyad" value="<?php if(isset($_POST['kurumsal_fatura_soyad'])) echo $_POST['kurumsal_fatura_soyad'] ?>" class="form-control" placeholder="Lütfen soyadınızı numaranızı yazın...">
																			</div>
																		</div>
																		

																	</div>

																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="kurumsal_faturaVergiDairesi">Vergi Dairesi</p>
																				<input type="text" name="kurumsal_faturaVergiDairesi" id="kurumsal_faturaVergiDairesi" value="<?php if(isset($_POST['kurumsal_faturaVergiDairesi'])) echo $_POST['kurumsal_faturaVergiDairesi'] ?>" class="form-control" placeholder="Lütfen vergi dairesi giriniz...">
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="kurumsal_faturaVergiNo">Vergi Numarası</p>
																				<input type="text" name="kurumsal_faturaVergiNo" id="kurumsal_faturaVergiNo" value="<?php if(isset($_POST['kurumsal_faturaVergiNo'])) echo $_POST['kurumsal_faturaVergiNo'] ?>"  class="form-control" placeholder="Lütfen vergi numaranızı yazın...">
																			</div>
																		</div>

																	</div>
																	<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="kurumsal_fatura_il">İl</p>
																				<select name="kurumsal_fatura_il" id="kurumsal_fatura_il" value="<?php if(isset($_POST['kurumsal_fatura_il'])) echo $_POST['kurumsal_fatura_il'] ?>" class="form-control">
																					<option value="0">Şehrinizi Seçin...</option>
																					<option value="İstanbul">İstanbul</option>
																					<option value="Ankara">Ankara</option>
																					<option value="İzmir">İzmir</option>
																					<option value="Antalya">Antalya</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="kurumsal_fatura_ilce">İlçe</p>
																				<select name="kurumsal_fatura_ilce" id="kurumsal_fatura_ilce" value="<?php if(isset($_POST['kurumsal_fatura_ilce'])) echo $_POST['kurumsal_fatura_ilce'] ?>" class="form-control">
																					<option value="0">Şehrinizi Seçin...</option>
																					<option value="İstanbul">İstanbul</option>
																					<option value="Ankara">Ankara</option>
																					<option value="İzmir">İzmir</option>
																					<option value="Antalya">Antalya</option>
																				</select>
																			</div>
																		</div>

																	</div>
																	
																	<div class="form-group">
																		
																	</div>
																	

																	<div class="form-group mb-0">
																		<p for="kurumsal_fatura_adres">Adres</p>
																		<textarea style="height:150px;" name="kurumsal_fatura_adres" id="kurumsal_fatura_adres" value="<?php if(isset($_POST['kurumsal_fatura_adres'])) echo $_POST['kurumsal_fatura_adres'] ?>" rows="7" class="form-control" placeholder="Lütfen adres giriniz.."></textarea>
																	</div>
																	<div class="place-order">
																			<input type="submit" onclick="abled()" class="btn btn-primary btn-lg btn-block" name="df_checkout_place_order" value="Faturayı Kaydet ve Devam Et">
																	</div>	

																</div>
															</div>
														</div>
									</form>
														
							  
							  </div>
								
							</div>	
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
																		<tbody>
																			
																				<p><?php echo $dynamic_list1; ?></p>
																			
																		</tbody>
																		<tfoot>													
																			<tr class="shipping">
																				<th style="text-align: left;">Kargo Ücreti</th>
																				<td>
																					<span class="amount">
																						<span class="df-Price-currencySymbol"></span><?php echo $kargo_price;?>
																					</span>
																				</td>
																			</tr>
														
																			<tr class="order-total">
																				<th style="text-align: left;">Sipariş Toplamı</th>
																				<td>
																					<span class="amount">
																						<span class="df-Price-currencySymbol"></span><?php echo $totalcart; ?> ₺
																					</span>
																				</td>
																			</tr>
																		</tfoot>
																	
																	</table>
																</div>
															</div>
											
								
														</div>
													</div>
													<!-- Order / End -->
								
												</div>			
								</div>
						</section>

						<h2>Kargo Bilgileri</h2>
						<section>
							<div class="container">
								
								
										<!-- Checkout Form -->
										<form action="kargo_bilgi_kontrol.php" method="POST" class="df-checkout">
								
											<div class="row">
								
												<div class="col-md-8">
													<!-- Shipping Details -->
													<div class="card card--lg">
														<div class="card__header card__header--has-checkbox">
															<h4>Kargo Detayları</h4>
															
														</div>
														<div class="card__content">
																<div class="row">
									
																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="shipping_name">Ad <abbr class="required" title="required">*</abbr></p>
																				<input type="text" name="shipping_name" id="shipping_name" value="<?php if(isset($_POST['shipping_name'])) echo $_POST['shipping_name'] ?>" class="form-control" placeholder="Lütfen adınızı giriniz...">
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="shipping_surname">Soyad</p>
																				<input type="text" name="shipping_surname" id="shipping_surname" value="<?php if(isset($_POST['shipping_surname'])) echo $_POST['shipping_surname'] ?>" class="form-control" placeholder="Lütfen soyadınızı numaranızı yazın...">
																			</div>
																		</div>
																		

																</div>
																<div class="row">

																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="kurumsal_faturaUnvan">Telefon <abbr class="required" title="required">*</abbr></p>
																				<input type="text" name="kurumsal_fatura_ad" id="kurumsal_fatura_ad" value="<?php if(isset($_POST['kurumsal_fatura_ad'])) echo $_POST['kurumsal_fatura_ad'] ?>" class="form-control" placeholder="Lütfen adınızı giriniz...">
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="ShipEmail">E-mail</p>
																				<input type="text" name="ShipEmail" id="ShipEmail" value="<?php if(isset($_POST['ShipEmail'])) echo $_POST['ShipEmail'] ?>" class="form-control" placeholder="Lütfen soyadınızı numaranızı yazın...">
																			</div>
																		</div>
																		

																</div>
																<div class="row">
																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="ship_il">İl</p>
																				<select name="ship_il" id="ship_il" value="<?php if(isset($_POST['ship_il'])) echo $_POST['ship_il'] ?>" class="form-control">
																					<option value="0">Şehrinizi Seçin...</option>
																					<option value="İstanbul">İstanbul</option>
																					<option value="Ankara">Ankara</option>
																					<option value="İzmir">İzmir</option>
																					<option value="Antalya">Antalya</option>
																				</select>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<p for="ship_ilce">İlçe</p>
																				<select name="ship_ilce" id="ship_ilce" value="<?php if(isset($_POST['ship_ilce'])) echo $_POST['ship_ilce'] ?>" class="form-control">
																					<option value="0">Şehrinizi Seçin...</option>
																					<option value="İstanbul">İstanbul</option>
																					<option value="Ankara">Ankara</option>
																					<option value="İzmir">İzmir</option>
																					<option value="Antalya">Antalya</option>
																				</select>
																			</div>
																		</div>

																	</div>																				
																<div class="form-group form-group--sm">
																	<label for="ShipAddress">Tam Adres<abbr class="required" title="required">*</abbr></label>
																	<input type="text" name="ShipAddress" id="ShipAddress" value="<?php if(isset($_POST['ShipAddress'])) echo $_POST['ShipAddress'] ?>" class="form-control" placeholder="Lütfen tam adresinizi girin...">
																</div>	
																<div class="form-group mb-0">
																	<label for="adres_not">Adres İle ilgili not</label>
																	<textarea style="height:150px;" name="adres_not" id="adres_not" value="<?php if(isset($_POST['adres_not'])) echo $_POST['adres_not'] ?>" rows="7" class="form-control" placeholder="Eczanenin yanı, marketin üstü gibi ayrıntılar.."></textarea>
																</div>
																<div class="form-group mb-0">
																	<label for="kargo_not">Kargo ile ilgili not</label>
																	<textarea style="height:150px;" name="kargo_not" id="kargo_not" value="<?php if(isset($_POST['kargo_not'])) echo $_POST['kargo_not'] ?>" rows="7" class="form-control" placeholder="Eczanenin yanı, marketin üstü gibi ayrıntılar.."></textarea>
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
																		<p><?php echo $dynamic_list1; ?> </p>
																		<tfoot>													
																			<tr class="shipping">
																				<th style="text-align: left;">Kargo Ücreti</th>
																				<td>
																					<span class="amount">
																						<span class="df-Price-currencySymbol"></span><?php echo $kargo_price;?>
																					</span>
																				</td>
																			</tr>
														
																			<tr class="order-total">
																				<th style="text-align: left;">Sipariş Toplamı</th>
																				<td>
																					<span class="amount">
																						<span class="df-Price-currencySymbol"></span><?php echo $totalcart; ?> ₺
																					</span>
																				</td>
																			</tr>
																		</tfoot>
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
						</section>

						<h2>Ödeme</h2>
						<section>
							<p>Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo condimentum dapibus. Fusce eros justo, 
								pellentesque non euismod ac, rutrum sed quam. Ut non mi tortor. Vestibulum eleifend varius ullamcorper. Aliquam erat volutpat. 
								Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui commodo lectus sollicitudin in auctor mauris 
								venenatis.</p>
						</section>

						<h2>İşlem Tamamlandı!</h2>
						<section>
							<p>Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula vulputate. Aliquam sed sem tortor. 
								Quisque sed felis ut mauris feugiat iaculis nec ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae. 
								Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo tortor.</p>
						</section>
					</div>
				</div>
		</div>
    </body>
</html>
		
       