 <link href="assets/css/overhang.min.css" rel="stylesheet">

	


    

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
			$totalpluscart= '0';
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
		if($totalcart<150){
			
			$kargo_price=7;
		}
		
		else{
			
			$kargo_price=0;			
			
		}
		
        $dynamic_list .= '			 
		
			<tbody>
				<tr class="cart_item">
					<td class="product-name">
						'.$cart_product_name.'
					</td>
					<td class="product-total">
						<span class="amount">
						<span class="df-Price-currencySymbol"></span>'.$cart_product_price.'₺
					</span>
					</td>
					<td class="product-name">
						'.$itemtotalprice.'
					</td>
				</tr>
			</tbody>
';
	$dynamic_list1 .= '			
		
		
									<tbody>
													<tr class="cart_item">
														<td class="product-name">
															'.$cart_product_name.'
														</td>
														<td class="product-name">
															'.$cart_product_piece.'
														</td>
														<td class="product-total">
															<span class="amount">
																<span class="df-Price-currencySymbol"></span>'.$cart_product_price.'
															</span>
														</td>
													</tr>

												</tbody>
												<tfoot>
													
													<tr class="shipping">
														<th style="text-align: left;">Kargo Ücreti</th>
														<td class="product-name">
														</td>
														<td>
															<span class="amount">
																<span class="df-Price-currencySymbol"></span>'.$kargo_price.'₺  
															</span>
														</td>
													</tr>
													
													<tr class="order-total">
														<th style="text-align: left;">Sipariş Toplamı</th>
														<td class="product-name">
														</td>
														<td>
															<span class="amount">
																<span class="df-Price-currencySymbol"></span>'.$totalcart.' ₺
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
			

<link href="css\online-quote-form.css" rel="stylesheet">

<script  src="assets/js/il-ilce.js"></script>
<script  src="assets/js/il-ilce-bireysel.js"></script>
<script  src="assets/js/il-ilce-kurumsal.js"></script>


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
</head>
<body class="nuewin">

	<div class="site-wrapper clearfix">

		<?php include"header.php"?>





		<!-- Content
		================================================== -->
		<div class="site-content">
			<div class="container">

				<div class="board">
                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                  
                    <div class="tab-content">
<div class="QuoteForm-section wrapper">
    <div class="display-table">
        <div class="display-table-cell">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="clearfix form-wrap">
                            <div class="col-sm-12 col-md-12">
                                <form class="QuoteForm" data-toggle="validator" enctype="multipart/form-data"
                                    id="QuoteForm" name="QuoteForm">
                                    <div class="section-wrap">
                                        <div class="section" id="section-1">
                                            <fieldset>
                                                <div class="form-layer-steps form-layer-tolal-steps-5">
                                                    <div class="form-layer-progress">
                                                        <div class="form-layer-progress-line" style="width:0%"></div>
                                                    </div>
                                                    <div class="form-layer-step active">
                                                        <div class="form-layer-step-icon activestep"><i
                                                                class="fa fa-file-invoice"></i></div>
                                                        <p>Fatura Bilgileri
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon"><i
                                                                class="fa fa-shipping-fast"></i></div>
                                                        <p>Kargo Bilgileri
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon"><i class="fa fa-credit-card"></i>
                                                        </div>
                                                        <p>Ödeme
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon"><i class="fa fa-check"></i>
                                                        </div>
                                                        <p>İşlem Tamamlandı
                                                    </div>
                                                </div>
                                                <div class="help-block with-errors mandatory-error"></div>                                                
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

																												<input type="text" name="bireysel_faturaName" id="bireysel_faturaName" value="<?php if(isset($_POST['bireysel_faturaName'])) echo $_POST['bireysel_faturaName'] ?>"  class="form-control" placeholder="Lütfen adınızı girin..." required>
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
																												<p for="bireysel_faturaPhone">Telefon Numarası<abbr class="required" title="required">*</abbr></p>
																												<input type="text" name="bireysel_faturaPhone" id="bireysel_faturaPhone" value="<?php if(isset($_POST['bireysel_faturaPhone'])) echo $_POST['bireysel_faturaPhone'] ?>" class="form-control" placeholder="Lütfen telefon numaranızı yazın...">
																											</div>
																										</div>
																										<div class="col-md-6">
																											<div class="form-group">
																												<p for="bireysel_faturaEmail">E-mail <abbr class="required" title="required">*</abbr></p>
																												<input type="email" name="bireysel_faturaEmail" id="bireysel_faturaEmail" value="<?php if(isset($_POST['bireysel_faturaEmail'])) echo $_POST['bireysel_faturaEmail'] ?>" class="form-control" placeholder="Lütfen e-mail adresinizi girin...">
																											</div>
																										</div>

																									</div>
																									
																									<div class="row">
																										<div class="col-md-6">
																											<div class="form-group">
																												<p for="bireysel_fatura_il">İl</p>
																												<select name="bireysel_fatura_il" id="bireysel_fatura_il" value="<?php if(isset($_POST['bireysel_fatura_il'])) echo $_POST['bireysel_fatura_il'] ?>" class="form-control">
																													<option value="0">İl Seçiniz...</option>
																												</select>
																											</div>
																										</div>
																										<div class="col-md-6">
																											<div class="form-group">
																												<p for="bireysel_fatura_ilce">İlçe</p>
																												<select name="bireysel_fatura_ilce" id="bireysel_fatura_ilce" value="<?php if(isset($_POST['bireysel_fatura_ilce'])) echo $_POST['bireysel_fatura_ilce'] ?>" class="form-control" disabled="disabled">
																													<option value="0">İlçe Seçiniz...</option>
																												</select>
																											</div>
																										</div>
																									</div>
																						

																									<div class="form-group form-group--sm">
																										<p for="bireysel_faturaAdres">Tam Adres<abbr class="required" title="required">*</abbr></p>
																										<textarea type="text" name="bireysel_faturaAdres" id="bireysel_faturaAdres" class="form-control" value="<?php if(isset($_POST['bireysel_faturaAdres'])) echo $_POST['bireysel_faturaAdres'] ?>" placeholder="Lütfen tam adresinizi girin..."></textarea>
																									</div>
																									<!--<div class="place-order">
																											<input type="submit" class="btn btn-primary btn-lg btn-block" name="df_checkout_place_order" value="Faturayı Kaydet ve Devam Et">
																									</div>	-->		
																									<input id="bireysel" type="button" class="example--23 btn btn-primary btn-lg btn-block example--22 "  value="Faturayı Kaydet ve Devam Et">
																								</div>
																							</div>
																						</div>
																					</form>
																						
																						<!-- Billing Details / End -->
															  
															  
															  </div>
															  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
																	<!-- Billing Details -->
																	<form name="RegForm" onsubmit="return GEEKFORGEEKS()" action="kurumsal_fatura_kontrol.php" method="post"  class="modal-form">
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
																												<p for="kurumsal_fatura_ad">Ad <abbr class="required" title="required">*</abbr></p>
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
																													<option value="0">İl Seçiniz...</option>
																												</select>
																											</div>
																										</div>
																										<div class="col-md-6">
																											<div class="form-group">
																												<p for="kurumsal_fatura_ilce">İlçe</p>
																												<select name="kurumsal_fatura_ilce" id="kurumsal_fatura_ilce" value="<?php if(isset($_POST['kurumsal_fatura_ilce'])) echo $_POST['kurumsal_fatura_ilce'] ?>" class="form-control" disabled="disabled">
																													<option value="0">İlçe Seçiniz...</option>
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
																									<input id="kurumsal" type="button" onclick="nextStep2()" class="btn btn-primary btn-lg btn-block " name="df_checkout_place_order" value="Faturayı Kaydet ve Devam Et">

																									<div class="place-order">
																									</div>	

																								</div>
																							</div>
																						</div>
																	</form>
																						
															  
															  </div>
																
															</div>	
													</div>	
													<div class="col-md-4">								
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
																						<th class="product-name">Adet</th>
																						<th class="product-total">Toplam</th>
																					</tr>
																				</thead>
																				<p><?php echo $dynamic_list; ?> </p>
												<tfoot>
													
													<tr class="shipping">
														<th style="text-align: left;">Kargo Ücreti</th>
														<td class="product-name">
														</td>
														<td>
															<span class="amount">
																<span class="df-Price-currencySymbol"></span>Ücretsiz
															</span>
														</td>
													</tr>
													
													<tr class="order-total">
														<th style="text-align: left;">Sipariş Toplamı</th>
														<td class="product-name">
														</td>
														<td>
															<span class="amount">
																<span class="df-Price-currencySymbol"></span><?echo $totalcart; ?>₺
															</span>
														</td>
													</tr>
												</tfoot>
																			</table>
																		</div>
																	</div>
																	<!-- Checkout Review Order / End -->
																</div>
															</div>
													<!-- Order / End -->
								
													</div>			
											    </div>

															
											
                                            </fieldset>
                                        </div>
                                        <div class="section slide-right" id="section-2">
                                            <fieldset>
                                                <div class="form-layer-steps form-layer-tolal-steps-5">
                                                    <div class="form-layer-progress">
                                                        <div class="form-layer-progress-line" style="width:30%"></div>
                                                    </div>
                                                    <div class="form-layer-step active">
                                                        <div class="form-layer-step-icon"><i class="fa fa-file-invoice"></i>
                                                        </div>
                                                        <p>Fatura Bilgileri
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon activestep"><i
                                                                class="fa fa-shipping-fast"></i></div>
                                                        <p>Kargo Bilgileri 
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon"><i class="fa fa-credit-card"></i>
                                                        </div>
                                                        <p>Ödeme
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon"><i class="fa fa-check"></i>
                                                        </div>
                                                        <p>İşlem Tamamlandı
                                                    </div>
                                     
								
								
										<!-- Checkout Form -->
										
                                        </div>
													<form action="kargo_bilgi_kontrol.php" method="POST" class="df-checkout">
											
														<div class="row">
											
															<div class="col-md-8">
																<!-- Shipping Details -->
																<div class="card card--lg">
																	<div class="card__header card__header--has-checkbox">
																		<h4>Kargo Detayları</h4>
																		
																	</div>
																	<!--<select class="form-control">
																	<option value="0">Select car:</option>
																	<option value="1">Audi</option>
																	<option value="2">BMW</option>
																	<option value="3">Citroen</option>
																	<option value="4">Ford</option>
																	<option value="5">Honda</option>
																	<option value="6">Jaguar</option>
																	<option value="7">Land Rover</option>
																	<option value="8">Mercedes</option>
																	<option value="9">Mini</option>
																	<option value="10">Nissan</option>
																	<option value="11">Toyota</option>
																	<option value="12">Volvo</option>
																  </select>-->
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
																							<p for="shipping_phone">Telefon <abbr class="required" title="required">*</abbr></p>
																							<input type="text" name="shipping_phone" id="shipping_phone" value="<?php if(isset($_POST['shipping_phone'])) echo $_POST['shipping_phone'] ?>" class="form-control" placeholder="Lütfen adınızı giriniz...">
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
																								<option value="0">İl Seçiniz...</option>
																							</select>
																						</div>
																					</div>
																					<div class="col-md-6">
																						<div class="form-group">
																							<p for="ship_ilce">İlçe</p>
																							<select name="ship_ilce" id="ship_ilce" value="<?php if(isset($_POST['ship_ilce'])) echo $_POST['ship_ilce'] ?>" class="form-control" disabled="disabled">
																								<option value="0">İlçe Seçiniz...</option>
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
																							<th class="product-name">Adet</th>
																							<th class="product-total">Toplam</th>
																						</tr>
																					</thead>
																					<p><?php echo $dynamic_list; ?> </p>
																				<tfoot>
													
													<tr class="shipping">
														<th style="text-align: left;">Kargo Ücreti</th>
														<td class="product-name">
														</td>
														<td>
															<span class="amount">
																<span class="df-Price-currencySymbol"></span>Ücretsiz
															</span>
														</td>
													</tr>
													
													<tr class="order-total">
														<th style="text-align: left;">Sipariş Toplamı</th>
														<td class="product-name">
														</td>
														<td>
															<span class="amount">
																<span class="df-Price-currencySymbol"></span><?echo $totalcart; ?>₺
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
																				<input id="kargo" type="button" onclick="setTimeout(bekle, 4000)" class="btn btn-primary btn-lg btn-block example--33"  value="Siparişinizi Tamamlayın..!">
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

                                            </fieldset>
                                        <div class="section slide-right" id="section-3">
                                            <fieldset>

                                                <div class="form-layer-steps form-layer-tolal-steps-5">
                                                    <div class="form-layer-progress">
                                                        <div class="form-layer-progress-line" style="width:50%"></div>
                                                    </div>
                                                    <div class="form-layer-step active">
                                                        <div class="form-layer-step-icon"><i class="fa fa-file-invoice"></i>
                                                        </div>
                                                        <p>Fatura Bilgileri
                                                    </div>
                                                    <div class="form-layer-step active">
                                                        <div class="form-layer-step-icon"><i
                                                                class="fa fa-shipping-fast"></i></div>
                                                        <p>Kargo Bilgileri
                                                    </div>
                                                    <div class="form-layer-step ">
                                                        <div class="form-layer-step-icon activestep"><i
                                                                class="fa fa-credit-card"></i></div>
                                                        <p>Ödeme
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon"><i class="fa fa-check"></i>
                                                        </div>
                                                        <p>İşlem Tamamlandı
                                                    </div>
                                                </div>
                                                
                                             
                                              
                                              
                                               
                                             
                                            </fieldset>
                                        </div>
									
                                        
										</div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
						
			
		</div>
</div>
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
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
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
	<!--<script src="js\validator.min.js"></script>
	<script src="js\online-quote-request-form.js"></script>-->
	<script>!function (e, a, t, n, g, c, o) { e.GoogleAnalyticsObject = g, e.ga = e.ga || function () { (e.ga.q = e.ga.q || []).push(arguments) }, e.ga.l = 1 * new Date, c = a.createElement(t), o = a.getElementsByTagName(t)[0], c.async = 1, c.src = "https://www.google-analytics.com/analytics.js", o.parentNode.insertBefore(c, o) }(window, document, "script", 0, "ga"), ga("create", "UA-93541536-2", "auto"), ga("send", "pageview")</script>
	
</body>
</html>

<script>
   
		 
	
	$(document).ready(function(){
		  $("#bireysel").click(function(){
		
			var formData = {
                'bireysel_faturaName': $('input[name=bireysel_faturaName]').val(),
                'bireysel_faturaSurname': $('input[name=bireysel_faturaSurname]').val(),
                'bireysel_faturaPhone': $('input[name=bireysel_faturaPhone]').val(),
                'bireysel_faturaEmail': $('input[name=bireysel_faturaEmail]').val(),
                'bireysel_fatura_il': $('#bireysel_fatura_il option:selected').val(),
                'bireysel_fatura_ilce': $('#bireysel_fatura_ilce option:selected').val(),
				'bireysel_faturaAdres': $('textarea[name=bireysel_faturaAdres]').val()
		
				
            };
			
			$.ajax({
			url: "bireysel_fatura_kontrol.php",
			type: "post",
			data:formData,
			success: function(result){
			   type1=$('input[name=bireysel_faturaName]').val();

			 			 type2=$('input[name=bireysel_faturaSurname]').val();

			 if(type1 == ""){
				 

 $("body").overhang({
      type : "error",
      message: "Ad alanı boş bırakılamaz.",
	  	        duration: 2

    });
  }	
 else if(type2==null || type2=="")  {
    $("body").overhang({
      type : "error",
      message: "Soyad alanı boş bırakılamaz.",
	  	        duration: 2

    });
  

}
			 else{
				 
$("#section-1 .help-block.with-errors").html('');
$("#section-1").removeClass("open");$("#section-1").addClass("slide-left");$("#section-2").removeClass("slide-right");
$("#section-2").addClass("open");			 }

			}});
			 			

		  });
		  
		  $("#kurumsal").click(function(){
		
			var formData = {
                'kurumsal_faturaUnvan': $('input[name=kurumsal_faturaUnvan]').val(),
                'kurumsal_fatura_phone': $('input[name=kurumsal_fatura_phone]').val(),
                'kurumsal_fatura_ad': $('input[name=kurumsal_fatura_ad]').val(),
                'kurumsal_fatura_soyad': $('input[name=kurumsal_fatura_soyad]').val(),
                'kurumsal_faturaVergiDairesi': $('input[name=kurumsal_faturaVergiDairesi]').val(),
                'kurumsal_faturaVergiNo': $('input[name=kurumsal_faturaVergiNo]').val(),
				'kurumsal_fatura_il': $('#kurumsal_fatura_il option:selected').val(),
				'kurumsal_fatura_ilce': $('#kurumsal_fatura_ilce option:selected').val(),
                'kurumsal_fatura_adres': $('textarea[name=kurumsal_fatura_adres]').val()
				
            };
			
			$.ajax({
			url: "kurumsal_fatura_kontrol.php",
			type: "post",
			data:formData,
			success: function(result){
			  
			}});
			
			
		  });
		  
		  
		  
		  
		  
		});
		
		
		


		

						
</script>

<script>
$("#kargo").click(function(){
		
			var formData = {
                'shipping_name': $('input[name=shipping_name]').val(),
                'shipping_surname': $('input[name=shipping_surname]').val(),
                'shipping_phone': $('input[name=shipping_phone]').val(),
                'ShipEmail': $('input[name=ShipEmail]').val(),
                'ship_il': $('#ship_il option:selected').val(),
                'ship_ilce': $('#ship_ilce option:selected').val(),
				
				'ShipAddress': $('textarea[name=ShipAddress]').val(),
				'adres_not': $('textarea[name=adres_not]').val(),
				'kargo_not': $('textarea[name=kargo_not]').val()
		
				
            };
			
			$.ajax({
			url: "kargo_bilgi_kontrol.php",
			type: "post",
			data:formData,
			success: function(result){
			  
			}});
		  
		  });
		  
		  
		  document.write("kargo not =" + kargo_not)
</script>
<script>
 $(".example--12").click(function () {
    $("body").overhang({
      type : "success",
      message: "Fatura bilgileri kaydedildi."
    });
  });
   $(".example--33").click(function () {
    $("body").overhang({
      type: "info",
      message: "⏲️ Ödeme sayfasına yönlendiriliyorsunuz... ",
      duration: 5,
      upper: true
    });
  });
  
</script>
		   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		   
		       <script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>


			<script> /**
 * index.js
 * Paul Krishnamurthy 2016
 *
 * https://paulkr.com
 * paul@paulkr.com
 */

$(document).ready(function () {

  $(".sample").click(function () {
    $("body").overhang({
      type : "success"
    });
  });

  $(".example--1").click(function () {
    $("body").overhang({
      type : "success",
      message: "Ürün sepete eklendi."
    });
  });

  $(".example--2").click(function () {
    $("body").overhang({
      type: "error",
      message: "Ürünü sepetten kaldırdınız.",
	        duration: 2,

    });
  });
// deger1 = '';
<?
include 'config.php';
session_start();
if (isset($_SESSION["UserID"])){
$userkontrol = $_SESSION["UserID"];
}else{
	$userkontrol = '0';
	}
 
 ?>
deger1 = <? echo $userkontrol;?>;
	  $(".example--33").click(function () {
		    if (deger1 > 0){ 

$("body").overhang({
      type: "info",
      message: "⏲️ Ödeme sayfasına yönlendiriliyorsunuz... ",
      duration: 5,
      upper: true
    });
setTimeout(function(){location.href="payment.php"} , 4000);    }
 
else{
	alert('asd');
	
} });
	  


  

  $(".example--4").click(function () {
    $("body").overhang({
      type: "warn",
      message: "A user has reported you!",
      duration: 3,
      overlay: true
    });
  });

  $(".example--5").click(function () {
    $("body").overhang({
      type: "prompt",
      message: "What's your name?",
      overlay: true
    });
  });

  $(".example--6").click(function () {
    $("body").overhang({
      type: "info",
      message: $("body").data("overhangPrompt") || "You have not entered anything!"
    });
  });

  $(".example--7").click(function () {
    $("body").overhang({
      type: "confirm",
      message: "Are you sure?",
      overlay: true
    });
  })

  $(".example--8").click(function () {
    var selected = $("body").data("overhangConfirm");

    if (selected === null) {
      selected = "You have not entered anything!";
    } else {
      selected = selected ? "True!" : "False!";
    }

    $("body").overhang({
      type: "info",
      message: selected
    });
  });

  $(".example--9").click(function () {
    $("body").overhang({
      custom: true,
      textColor: "#FCE4EC",
      primary: "#F06292",
      accent: "#FCE4EC",
      message: "This is my custom message 😜"
    });
  });

  $(".example--10").click(function () {
    $("body").overhang({
      type: "confirm",
      primary: "#40D47E",
      accent: "#27AE60",
      yesColor: "#3498DB",
      message: "Do you want to continue?",
      overlay: true,
      callback: function (value) {
        var response = value ? "Yes" : "No";
        alert("You made your selection of: " + response);
      }
    });
  });

  $(".example--11").click(function () {
    var snapchatIcon = '<i class="fa fa-snapchat-ghost" style="color: #FFFC00" aria-hidden="true"></i>';
    var snapchatNote = ' Add "thepaulkr" on snapchat!';

    $("body").overhang({
      type: "confirm",
      primary: "#333333",
      accent: "#FFFC00",
      message: snapchatIcon + snapchatNote,
      custom: true,
      html: true,
      overlay: true,
      overlayColor: "#FFFF00",
      callback: function (value) {
        if (value) {
          window.location.href = "https://www.snapchat.com/add/thepaulkr";
        } else {
          alert("Maybe next time then...");
        }
      }
    });
  });

});
</script>
<script>/**
 * overhang.min.js
 * Paul Krishnamurthy 2016
 *
 * https://paulkr.com
 * paul@paulkr.com
 */

$.fn.overhang=function(e){function o(e,o){r.fadeOut(100),a.slideUp(c.speed,function(){e&&c.callback(null!==o?n.data(o):"")})}var n=$(this),a=$("<div class='overhang'></div>"),r=$("<div class='overhang-overlay'></div>");$(".overhang").remove(),$(".overhang-overlay").remove();var t={success:["#2ECC71","#27AE60"],error:["#E74C3C","#C0392B"],warn:["#E67E22","#D35400"],info:["#3498DB","#2980B9"],prompt:["#9B59B6","#8E44AD"],confirm:["#1ABC9C","#16A085"],"default":["#95A5A6","#7F8C8D"]},s={type:"success",custom:!1,message:"Ürün sepete eklendi.",textColor:"#FFFFFF",yesMessage:"Yes",noMessage:"No",yesColor:"#2ECC71",noColor:"#E74C3C",duration:1.5,speed:500,closeConfirm:!1,upper:!1,easing:"easeOutBounce",html:!1,overlay:!1,callback:function(){}},c=$.extend(s,e);c.type=c.type.toLowerCase();var l=["success","error","warn","info","prompt","confirm"];-1===$.inArray(c.type,l)&&(c.type="default",console.log("You have entered invalid type name for an overhang message. Overhang resorted to the default theme.")),c.custom?(c.primary=e.primary||t["default"][0],c.accent=e.accent||t["default"][1]):(c.primary=t[c.type][0]||t["default"][0],c.accent=t[c.type][1]||t["default"][1]),("prompt"===c.type||"confirm"===c.type)&&(c.primary=e.primary||t[c.type][0],c.accent=e.accent||t[c.type][1],c.closeConfirm=!0),a.css("background-color",c.primary),a.css("border-bottom","6px solid "+c.accent);var p=$("<span class='overhang-message'></span>");p.css("color",c.textColor),c.html?p.html(c.message):p.text(c.upper?c.message.toUpperCase():c.message),a.append(p);var i=$("<input class='overhang-prompt-field' />"),u=$("<button class='overhang-yes-option'>"+c.yesMessage+"</button>"),d=$("<button class='overhang-no-option'>"+c.noMessage+"</button>");if(u.css("background-color",c.yesColor),d.css("background-color",c.noColor),c.closeConfirm){var m=$("<span class='overhang-close'></span>");m.css("color",c.accent),"confirm"!==c.type&&a.append(m)}if("prompt"===c.type?(a.append(i),n.data("overhangPrompt",null),i.keydown(function(e){13==e.keyCode&&(n.data("overhangPrompt",i.val()),o(!0,"overhangPrompt"))})):"confirm"===c.type&&(a.append(u),a.append(d),a.append(m),n.data("overhangConfirm",null),u.click(function(){n.data("overhangConfirm",!0),o(!0,"overhangConfirm")}),d.click(function(){n.data("overhangConfirm",!1),o(!0,"overhangConfirm")})),n.append(a),a.slideDown(c.speed,c.easing),c.overlay&&(c.overlayColor&&r.css("background-color",c.overlayColor),n.append(r)),c.closeConfirm&&!e.duration)m.click(function(){"prompt"!==c.type&&"confirm"!==c.type?o(!0,null):o(!1,null)});else if(c.closeConfirm&&e.duration){var f=setTimeout(function(){a.slideUp(c.speed,function(){o(!0,null)})},1e3*c.duration);m.click(function(){clearTimeout(f),"prompt"!==c.type&&"confirm"!==c.type?o(!0,null):o(!1,null)})}else a.delay(1e3*c.duration).slideUp(c.speed,function(){o(!0,null)})};
</script>