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
$denemetab='
								<li>								
								<a href="#messages" data-toggle="tab" title="Kargo Bilgileri">
								
										<span class="round-tabs three">
											<i class="fa fa-shipping-fast"></i>
										</span> 
									</a>
								</li>
';
$denemetab1='
<li>
									<a href="#settings" data-toggle="tab" title="Ödeme">
										<span class="round-tabs four">
											<i class="fa fa-credit-card"></i>
										</span> 
									</a>
								</li>
';
$denemetab2='

<li>
									<a href="#doner" data-toggle="tab" title="İşlem Tamamlandı!">
										<span class="round-tabs five">
											<i class="fa fa-check"></i>
										</span> 
									</a>
								</li>	
';


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
<link href="../assets/css/theme.css" rel="stylesheet">
	<link href="../4mynot4give/assets/css/red2.css" rel="stylesheet">
<link href="../4mynot4give/assets/css/fontawesome.min.css" rel="stylesheet">
		<link href="../4mynot4give/assets/css/all.min.css" rel="stylesheet"> 
	<!-- Template CSS-->
	<link href="assets/css/style-soccer.css" rel="stylesheet">
 <link rel="stylesheet" href="../4mynot4give/assets/css/bootstrapp.min.css">
    <!-- Optional theme -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="../4mynot4give/assets/js/bootstrapp.min.js"></script>
	<!-- Custom CSS-->
	<link href="assets/css/custom.css" rel="stylesheet">
	<script src="../4mynot4give/assets/js/fontawesome.min.js" rel="stylesheet"></script>
	<script src="../4mynot4give/assets/js/all.min.js" rel="stylesheet"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>    
	<link rel="stylesheet" href="assets\custom\css\form-wizard-blue.css">

<link href="css\sweetalert.css" rel="stylesheet">
<link href="css\online-quote-form.css" rel="stylesheet">
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



<script src="js\bootstrap-datepicker.min.js"></script>
<script src="js\validator.min.js"></script>
<script src="js\sweetalert.min.js"></script>
<script src="js\online-quote-request-form.js"></script>
<script>!function (e, a, t, n, g, c, o) {e.GoogleAnalyticsObject = g, e.ga = e.ga || function () {(e.ga.q = e.ga.q || []).push(arguments)}, e.ga.l = 1 * new Date, c = a.createElement(t), o = a.getElementsByTagName(t)[0], c.async = 1, c.src = "https://www.google-analytics.com/analytics.js", o.parentNode.insertBefore(c, o) }(window, document, "script", 0, "ga"), ga("create", "UA-93541536-2", "auto"), ga("send", "pageview")</script>
	<div class="site-wrapper clearfix">

		<?php include"header.php"?>





		<!-- Content
		================================================== -->
		<div class="site-content">
			<div class="container">
				<div class="QuoteForm-section wrapper">
    <div class="display-table">
        <div class="display-table-cell">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="clearfix form-wrap">
                            
                           
                            <div class="col-sm-12 col-md-8">
                                <form class="QuoteForm" data-toggle="validator" enctype="multipart/form-data"
                                    id="QuoteForm" name="QuoteForm">
                                    <div class="section-wrap">
                                        <div class="section" id="section-1">
                                            <fieldset>
                                                <h3 class="section-title">Step 1 of 5</h3>
                                                <div class="form-layer-steps form-layer-tolal-steps-5">
                                                    <div class="form-layer-progress">
                                                        <div class="form-layer-progress-line" style="width:0%"></div>
                                                    </div>
                                                    <div class="form-layer-step active">
                                                        <div class="form-layer-step-icon activestep"><i
                                                                class="fa fa-home"></i></div>
                                                        <p>Fatura Bilgileri
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon"><i
                                                                class="fa fa-paint-brush"></i></div>
                                                        <p>Kargo Bilgileri
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon"><i class="fa fa-clock-o"></i>
                                                        </div>
                                                        <p>Schedule
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon"><i
                                                                class="fa fa-address-card"></i></div>
                                                        <p>Ödeme
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon"><i class="fa fa-check"></i>
                                                        </div>
                                                        <p>İşlem Onayı
                                                    </div>
                                                </div>
                                                <div class="help-block with-errors mandatory-error"></div>
                                                
                                                <h4>Select Cleaning Type<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validcleaningtype">
                                                    <ul class="list-unstyled mgs-radio mgsstyleradio">
                                                        <li><input id="cleaningtype1" name="cleaningtype" type="radio"
                                                                value="Shifting Cleaning"><label
                                                                for="cleaningtype1">Shifting Cleaning</label>
                                                        <li><input id="cleaningtype2" name="cleaningtype" type="radio"
                                                                value="Seasonal Cleaning"><label
                                                                for="cleaningtype2">Seasonal Cleaning</label></li>
                                                    </ul>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <h4>Property Address<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validpropertyaddress"><input id="propertyaddress"
                                                        name="propertyaddress" class="form-control"
                                                        data-error="Please enter Property address"
                                                        placeholder="Property Address*" required="">
                                                    <div class="input-group-icon"><i class="fa fa-map-marker"></i></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group quoteForm-step-1"><button
                                                        class="btn btn-default disable" type="button">Are You
                                                        ready!</button> <button class="btn btn-custom pull-right"
                                                        type="button" onclick="nextStep2()">Next <span
                                                            class="fa fa-arrow-right"></span></button></div>
                                            </fieldset>
                                        </div>
                                        <div class="section slide-right" id="section-2">
                                            <fieldset>
                                                <h3 class="section-title">Step 2 of 5</h3>
                                                <div class="form-layer-steps form-layer-tolal-steps-5">
                                                    <div class="form-layer-progress">
                                                        <div class="form-layer-progress-line" style="width:30%"></div>
                                                    </div>
                                                    <div class="form-layer-step active">
                                                        <div class="form-layer-step-icon"><i class="fa fa-home"></i>
                                                        </div>
                                                        <p>Fatura Bilgileri
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon activestep"><i
                                                                class="fa fa-paint-brush"></i></div>
                                                        <p>Kargo Bilgileri
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon"><i class="fa fa-clock-o"></i>
                                                        </div>
                                                        <p>Ödeme
                                                    </div>                                                    
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon"><i class="fa fa-check"></i>
                                                        </div>
                                                        <p>İşlem Onayı
                                                    </div>
                                                </div>
                                                <h4>ProPerty Size (sq. ft.)<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validpropertysize">
                                                    <ul class="list-unstyled mgs-radio mgsstyleradio">
                                                        <li><input id="propertysize1" name="propertysize" type="radio"
                                                                value="0-1000"><label for="propertysize1">0-1000</label>
                                                        <li><input id="propertysize2" name="propertysize" type="radio"
                                                                value="1001 - 1500"><label for="propertysize2">1001 -
                                                                1500</label>
                                                        <li><input id="propertysize3" name="propertysize" type="radio"
                                                                value="1501 - 2000"><label for="propertysize3">1501 -
                                                                2000</label>
                                                        <li><input id="propertysize4" name="propertysize" type="radio"
                                                                value="2001 - 2500"><label for="propertysize4">2001 -
                                                                2500</label>
                                                        <li><input id="propertysize5" name="propertysize" type="radio"
                                                                value="2501 - 3000"><label for="propertysize5">2501 -
                                                                3000</label>
                                                        <li><input id="propertysize6" name="propertysize" type="radio"
                                                                value="3000+"><label for="propertysize6">3000+</label>
                                                        </li>
                                                    </ul>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <h4>Bedrooms<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validbedrooms">
                                                    <ul class="list-unstyled mgs-radio mgsstyleradio">
                                                        <li><input id="bedrooms1" name="bedrooms" type="radio"
                                                                value="1"><label for="bedrooms1">1</label>
                                                        <li><input id="bedrooms2" name="bedrooms" type="radio"
                                                                value="2"><label for="bedrooms2">2</label>
                                                        <li><input id="bedrooms3" name="bedrooms" type="radio"
                                                                value="3"><label for="bedrooms3">3</label>
                                                        <li><input id="bedrooms4" name="bedrooms" type="radio"
                                                                value="4"><label for="bedrooms4">4</label>
                                                        <li><input id="bedrooms5" name="bedrooms" type="radio"
                                                                value="5"><label for="bedrooms5">5</label>
                                                        <li><input id="bedrooms6" name="bedrooms" type="radio"
                                                                value="5+"><label for="bedrooms6">5+</label></li>
                                                    </ul>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <h4>Bathrooms<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validbathrooms">
                                                    <ul class="list-unstyled mgs-radio mgsstyleradio">
                                                        <li><input id="bathrooms1" name="bathrooms" type="radio"
                                                                value="1"><label for="bathrooms1">1</label>
                                                        <li><input id="bathrooms2" name="bathrooms" type="radio"
                                                                value="2"><label for="bathrooms2">2</label>
                                                        <li><input id="bathrooms3" name="bathrooms" type="radio"
                                                                value="3"><label for="bathrooms3">3</label>
                                                        <li><input id="bathrooms4" name="bathrooms" type="radio"
                                                                value="4"><label for="bathrooms4">4</label>
                                                        <li><input id="bathrooms5" name="bathrooms" type="radio"
                                                                value="5"><label for="bathrooms5">5</label>
                                                        <li><input id="bathrooms6" name="bathrooms" type="radio"
                                                                value="5+"><label for="bathrooms6">5+</label></li>
                                                    </ul>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <h4>Bath Tubs<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validbathtubs">
                                                    <ul class="list-unstyled mgs-radio mgsstyleradio">
                                                        <li><input id="bathtubs1" name="bathtubs" type="radio"
                                                                value="Null"><label for="bathtubs1">Null</label>
                                                        <li><input id="bathtubs2" name="bathtubs" type="radio"
                                                                value="1"><label for="bathtubs2">1</label>
                                                        <li><input id="bathtubs3" name="bathtubs" type="radio"
                                                                value="2"><label for="bathtubs3">2</label>
                                                        <li><input id="bathtubs4" name="bathtubs" type="radio"
                                                                value="3"><label for="bathtubs4">3</label>
                                                        <li><input id="bathtubs5" name="bathtubs" type="radio"
                                                                value="4"><label for="bathtubs5">4</label>
                                                        <li><input id="bathtubs6" name="bathtubs" type="radio"
                                                                value="5"><label for="bathtubs6">5</label></li>
                                                    </ul>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <h4>Sitting/Conference Room<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validsittingroom">
                                                    <ul class="list-unstyled mgs-radio mgsstyleradio">
                                                        <li><input id="sittingroom1" name="sittingroom" type="radio"
                                                                value="Yes"><label for="sittingroom1">Yes</label>
                                                        <li><input id="sittingroom2" name="sittingroom" type="radio"
                                                                value="No"><label for="sittingroom2">No</label></li>
                                                    </ul>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <h4>Dining Room<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validdiningroom">
                                                    <ul class="list-unstyled mgs-radio mgsstyleradio">
                                                        <li><input id="diningroom1" name="diningroom" type="radio"
                                                                value="Yes"><label for="diningroom1">Yes</label>
                                                        <li><input id="diningroom2" name="diningroom" type="radio"
                                                                value="No"><label for="diningroom2">No</label></li>
                                                    </ul>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <h4>Kitchen<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validkitchen">
                                                    <ul class="list-unstyled mgs-radio mgsstyleradio">
                                                        <li><input id="kitchen1" name="kitchen" type="radio"
                                                                value="Null"><label for="kitchen1">Null</label>
                                                        <li><input id="kitchen2" name="kitchen" type="radio"
                                                                value="1"><label for="kitchen2">1</label>
                                                        <li><input id="kitchen3" name="kitchen" type="radio"
                                                                value="2"><label for="kitchen3">2</label></li>
                                                    </ul>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <h4>Oven<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validoven">
                                                    <ul class="list-unstyled mgs-radio mgsstyleradio">
                                                        <li><input id="oven1" name="oven" type="radio"
                                                                value="Null"><label for="oven1">Null</label>
                                                        <li><input id="oven2" name="oven" type="radio" value="1"><label
                                                                for="oven2">1</label>
                                                        <li><input id="oven3" name="oven" type="radio" value="2"><label
                                                                for="oven3">2</label>
                                                        <li><input id="oven4" name="oven" type="radio" value="3"><label
                                                                for="oven4">3</label>
                                                        <li><input id="oven5" name="oven" type="radio" value="4"><label
                                                                for="oven5">4</label></li>
                                                    </ul>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <h4>Kitchen Items<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validkitchenitems">
                                                    <ul class="list-unstyled mgs-checkbox mgsstylecheckbox">
                                                        <li><input id="kitchenitems1" name="kitchenitems[]"
                                                                type="checkbox" value="Not Required"><label
                                                                for="kitchenitems1">Not Required</label>
                                                        <li><input id="kitchenitems2" name="kitchenitems[]"
                                                                type="checkbox" value="Refrigerator"><label
                                                                for="kitchenitems2">Refrigerator</label>
                                                        <li><input id="kitchenitems3" name="kitchenitems[]"
                                                                type="checkbox" value="Washing Machine"><label
                                                                for="kitchenitems3">Washing Machine</label>
                                                        <li><input id="kitchenitems4" name="kitchenitems[]"
                                                                type="checkbox" value="Microwave"><label
                                                                for="kitchenitems4">Microwave</label>
                                                        <li><input id="kitchenitems5" name="kitchenitems[]"
                                                                type="checkbox" value="Tumble Dryer"><label
                                                                for="kitchenitems5">Tumble Dryer</label></li>
                                                    </ul>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group quoteForm-step-2"><button class="btn btn-custom"
                                                        type="button" onclick="previousStep1()"><span
                                                            class="fa fa-arrow-left"></span> Back</button> <button
                                                        class="btn btn-custom pull-right" type="button"
                                                        onclick="nextStep3()">Next <span
                                                            class="fa fa-arrow-right"></span></button></div>
                                            </fieldset>
                                        </div>
                                        <div class="section slide-right" id="section-3">
                                            <fieldset>
                                                <h3 class="section-title">Step 3 of 5</h3>
                                                <div class="form-layer-steps form-layer-tolal-steps-5">
                                                    <div class="form-layer-progress">
                                                        <div class="form-layer-progress-line" style="width:50%"></div>
                                                    </div>
                                                    <div class="form-layer-step active">
                                                        <div class="form-layer-step-icon"><i class="fa fa-home"></i>
                                                        </div>
                                                        <p>Fatura Bilgileri
                                                    </div>
                                                    <div class="form-layer-step active">
                                                        <div class="form-layer-step-icon"><i
                                                                class="fa fa-paint-brush"></i></div>
                                                        <p>Kargo Bilgileri
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon activestep"><i
                                                                class="fa fa-clock-o"></i></div>
                                                        <p>Ödeme
                                                    </div>                                                   
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon"><i class="fa fa-check"></i>
                                                        </div>
                                                        <p>İşlem Onayı
                                                    </div>
                                                </div>
                                                <h4>Frequency of Cleaning<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validfrequencycleaning">
                                                    <ul class="list-unstyled mgs-radio mgsstyleradio">
                                                        <li><input id="frequencycleaning1" name="frequencycleaning"
                                                                type="radio" value="Daily"><label
                                                                for="frequencycleaning1">Daily</label>
                                                        <li><input id="frequencycleaning2" name="frequencycleaning"
                                                                type="radio" value="Weekly"><label
                                                                for="frequencycleaning2">Weekly</label>
                                                        <li><input id="frequencycleaning3" name="frequencycleaning"
                                                                type="radio" value="Monthly"><label
                                                                for="frequencycleaning3">Monthly</label>
                                                        <li><input id="frequencycleaning4" name="frequencycleaning"
                                                                type="radio" value="One Time"><label
                                                                for="frequencycleaning4">One Time</label></li>
                                                    </ul>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <h4>Preferred Day(s)<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validpreferreddays">
                                                    <ul class="list-unstyled mgs-checkbox mgsstylecheckbox">
                                                        <li><input id="preferreddays1" name="preferreddays"
                                                                type="checkbox" value="Monday"><label
                                                                for="preferreddays1">Monday</label>
                                                        <li><input id="preferreddays2" name="preferreddays"
                                                                type="checkbox" value="Tuesday"><label
                                                                for="preferreddays2">Tuesday</label>
                                                        <li><input id="preferreddays3" name="preferreddays"
                                                                type="checkbox" value="Wednesday"><label
                                                                for="preferreddays3">Wednesday</label>
                                                        <li><input id="preferreddays4" name="preferreddays"
                                                                type="checkbox" value="Thursday"><label
                                                                for="preferreddays4">Thursday</label>
                                                        <li><input id="preferreddays5" name="preferreddays"
                                                                type="checkbox" value="Friday"><label
                                                                for="preferreddays5">Friday</label>
                                                        <li><input id="preferreddays6" name="preferreddays"
                                                                type="checkbox" value="Saturday"><label
                                                                for="preferreddays6">Saturday</label>
                                                        <li><input id="preferreddays7" name="preferreddays"
                                                                type="checkbox" value="Sunday"><label
                                                                for="preferreddays7">Sunday</label></li>
                                                    </ul>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <h4>Preferred Time<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validpreferredtime">
                                                    <ul class="list-unstyled mgs-radio mgsstyleradio">
                                                        <li><input id="preferredtime1" name="preferredtime" type="radio"
                                                                value="Morning"><label
                                                                for="preferredtime1">Morning</label>
                                                        <li><input id="preferredtime2" name="preferredtime" type="radio"
                                                                value="Afternoon"><label
                                                                for="preferredtime2">Afternoon</label>
                                                        <li><input id="preferredtime3" name="preferredtime" type="radio"
                                                                value="Evening"><label
                                                                for="preferredtime3">Evening</label></li>
                                                    </ul>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <h4>Priority<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validpriority">
                                                    <ul class="list-unstyled mgs-radio mgsstyleradio">
                                                        <li><input id="priority1" name="priority" type="radio"
                                                                value="Low"><label for="priority1">Low</label>
                                                        <li><input id="priority2" name="priority" type="radio"
                                                                value="Medium (within 1 week)"><label
                                                                for="priority2">Medium (within 1 week)</label>
                                                        <li><input id="priority3" name="priority" type="radio"
                                                                value="Argent (within 3 Dys)"><label
                                                                for="priority3">Argent (within 3 Days)</label></li>
                                                    </ul>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <h4>Preferred Date<span class="mandatory">*</span>:</h4>
                                                <div class="form-group validpreferreddate" id="preferred-date"><input
                                                        id="preferreddate" name="preferreddate" class="form-control"
                                                        data-error="Please Select Preferred Date"
                                                        placeholder="mm-dd-yyyy" required="">
                                                    <div class="input-group-icon"><i class="fa fa-calendar"></i></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group quoteForm-step-3"><button class="btn btn-custom"
                                                        type="button" onclick="previousStep2()"><span
                                                            class="fa fa-arrow-left"></span> Back</button> <button
                                                        class="btn btn-custom pull-right" type="button"
                                                        onclick="nextStep4()" id="nextStepFour">Next <span
                                                            class="fa fa-arrow-right"></span></button></div>
                                            </fieldset>
                                        </div>
                                        <div class="section slide-right" id="section-4">
                                            <fieldset>
                                                <h3 class="section-title">Step 4 of 5</h3>
                                                <div class="form-layer-steps form-layer-tolal-steps-5">
                                                    <div class="form-layer-progress">
                                                        <div class="form-layer-progress-line" style="width:70%"></div>
                                                    </div>
                                                    <div class="form-layer-step active">
                                                        <div class="form-layer-step-icon"><i class="fa fa-home"></i>
                                                        </div>
                                                        <p>Fatura Bilgileri
                                                    </div>
                                                    <div class="form-layer-step active">
                                                        <div class="form-layer-step-icon"><i
                                                                class="fa fa-paint-brush"></i></div>
                                                        <p>Kargo Bilgileri
                                                    </div>
                                                    <div class="form-layer-step active">
                                                        <div class="form-layer-step-icon"><i class="fa fa-clock-o"></i>
                                                        </div>
                                                        <p>Ödeme
                                                    </div>
                                                    <div class="form-layer-step">
                                                        <div class="form-layer-step-icon"><i class="fa fa-check"></i>
                                                        </div>
                                                        <p>İşlem Onayı
                                                    </div>
                                                </div>
                                                <div class="help-block with-errors mandatory-error"></div>
                                                <h4>Provide Requirement Details:</h4>
                                                <div class="form-group validreqdetails"><textarea class="form-control"
                                                        id="requirementdetails" name="requirementdetails"
                                                        placeholder="Provide Requirement Details*" rows="3"
                                                        data-error="Provide Requirement Details" required=""></textarea>
                                                    <div class="input-group-icon"><i class="fa fa-info-circle"></i>
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group"><textarea class="form-control"
                                                        id="additionalinfo" name="additionalinfo"
                                                        placeholder="Additional Info(optional)" rows="3"></textarea>
                                                    <div class="input-group-icon"><i class="fa fa-info-circle"></i>
                                                    </div>
                                                </div>
                                                <h4>Provide Your Identity:</h4>
                                                <div class="form-group validfname"><input id="fname" name="fname"
                                                        class="form-control" data-error="Please enter First Name"
                                                        placeholder="First Name*" required="">
                                                    <div class="input-group-icon"><i class="fa fa-user"></i></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group validlname"><input id="lname" name="lname"
                                                        class="form-control" data-error="Please enter Last Name"
                                                        placeholder="Last Name*" required="">
                                                    <div class="input-group-icon"><i class="fa fa-user"></i></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group validgender"><select class="form-control"
                                                        data-error="Please Select Gender" id="gender" name="gender"
                                                        required="">
                                                        <option value="">--- Select Your Gender* ---
                                                        <option value="Male">Male
                                                        <option value="Femal">Female</option>
                                                    </select>
                                                    <div class="input-group-icon"><i class="fa fa-mars"></i></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group validaddress"><input id="address" name="address"
                                                        class="form-control" data-error="Please enter address"
                                                        placeholder="Address*" required="">
                                                    <div class="input-group-icon"><i class="fa fa-map-marker"></i></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group validemail"><input id="email" name="email"
                                                        type="email" class="form-control"
                                                        data-error="Please enter valid email" placeholder="Email*"
                                                        required="">
                                                    <div class="input-group-icon"><i class="fa fa-envelope"></i></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group validphone"><input id="phone" name="phone"
                                                        class="form-control" data-error="Please enter valid phone"
                                                        placeholder="Phone*" required="">
                                                    <div class="input-group-icon"><i class="fa fa-phone"></i></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group validpreferedcontact">
                                                    <h4>Preferred Contact Method*:</h4><label
                                                        class="radio-inline"><input id="preferedcontact1"
                                                            name="preferedcontact" type="radio"
                                                            value="email">email</label> <label
                                                        class="radio-inline"><input id="preferedcontact2"
                                                            name="preferedcontact" type="radio"
                                                            value="Phone">Phone</label>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group validagree">
                                                    <div class="checkbox"><label><input id="aggre" name="aggre"
                                                                type="checkbox" value="1">Aggre with terms &
                                                            conditions</label></div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                <div class="form-group quoteForm-step-4"><button class="btn btn-custom"
                                                        type="button" onclick="previousStep3()"><span
                                                            class="fa fa-arrow-left"></span> Back</button> <button
                                                        class="btn btn-custom pull-right" type="button"
                                                        onclick="nextStep5()">Next <span
                                                            class="fa fa-arrow-right"></span></button></div>
                                            </fieldset>
                                        </div>
                                        <div class="section slide-right review-submit-section" id="section-5">
                                            <fieldset>
                                                <h3 class="section-title">Step 5 of 5: Review & Submit</h3>
                                                <div class="form-layer-steps form-layer-tolal-steps-5">
                                                    <div class="form-layer-progress">
                                                        <div class="form-layer-progress-line" style="width:100%"></div>
                                                    </div>
                                                    <div class="form-layer-step active">
                                                        <div class="form-layer-step-icon"><i class="fa fa-home"></i>
                                                        </div>
                                                        <p>Fatura Bilgileri
                                                    </div>
                                                    <div class="form-layer-step active">
                                                        <div class="form-layer-step-icon"><i
                                                                class="fa fa-paint-brush"></i></div>
                                                        <p>Kargo Bilgileri
                                                    </div>
                                                    <div class="form-layer-step active">
                                                        <div class="form-layer-step-icon"><i class="fa fa-clock-o"></i>
                                                        </div>
                                                        <p>Ödeme
                                                    </div>
                                                    <div class="form-layer-step" id="lastsection-laststep">
                                                        <div class="form-layer-step-icon activestep"><i
                                                                class="fa fa-check"></i></div>
                                                        <p>İşlem Onayı
                                                    </div>
                                                </div>
                                                <h4>Your Inputed Data Summery:</h4>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 columnbottommargin">
                                                        <h5>Step One</h5>
                                                        <div class="section-info-box">
                                                            <p id="servicetypeData">
                                                                <p id="cleaningtypeData">
                                                                    <p id="propertyaddressData">
                                                        </div>
                                                        <h5>Step Two</h5>
                                                        <div class="section-info-box">
                                                            <p id="propertysizetData">
                                                                <p id="bedroomsData">
                                                                    <p id="bathroomsData">
                                                                        <p id="bathtubsData">
                                                                            <p id="sittingroomData">
                                                                                <p id="diningroomData">
                                                                                    <p id="kitchenData">
                                                                                        <p id="ovenData">
                                                                                            <p id="kitchenitemsData">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 columnbottommargin">
                                                        <h5>Step Three</h5>
                                                        <div class="section-info-box">
                                                            <p id="frequencycleaningData">
                                                                <p id="preferreddaysData">
                                                                    <p id="preferredtimeData">
                                                                        <p id="priorityData">
                                                                            <p id="preferreddateData">
                                                        </div>
                                                        <h5>Step Four</h5>
                                                        <div class="section-info-box">
                                                            <p id="requirementdetailsData">
                                                                <p id="additionalinfoData">
                                                                    <p id="firstNameData">
                                                                        <p id="lastNameData">
                                                                            <p id="genderData">
                                                                                <p id="addressData">
                                                                                    <p id="emailaddressData">
                                                                                        <p id="phoneData">
                                                                                            <p id="preferedcontactData">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div><strong>Would you like to provide any Attachment (as like
                                                                Photo)?</strong></div>
                                                        <div class="form-group attachmentFile"><label
                                                                class="input-group-btn"><span class="btn">Browse… <input
                                                                        id="userfile" name="userfile"
                                                                        type="file"></span></label> <input
                                                                id="attachedFile" class="form-control"
                                                                placeholder="Browse to select file" readonly=""></div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <div id="humanCheckCaptchaBox"></div>
                                                        <div id="firstDigit"></div>+<div id="secondDigit"></div>= <input
                                                            id="humanCheckCaptchaInput" name="humanCheckCaptchaInput"
                                                            class="form-control" data-error="Please solve Captcha"
                                                            placeholder="" required="" maxlength="3">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <p id="AggreData"><strong>Aggre with terms &
                                                                conditions:</strong> <input id="aggre2" name="aggre2"
                                                                type="checkbox" value="1" checked="" disabled="">
                                                            <div class="hidden" id="mgsContactSubmit"></div>
                                                            <div class="form-group quoteForm-step-5"
                                                                id="final-step-buttons"><button class="btn btn-custom"
                                                                    type="button" onclick="previousStep4()"><span
                                                                        class="fa fa-arrow-left"></span> Back</button>
                                                                <button class="btn btn-custom pull-right" type="submit"
                                                                    id="Submit">Send Quote Request</button></div>
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

				<div class="board">
                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                    <div class="board-inner">
						<ul class="nav nav-tabs d-flex justify-content-center" id="myTab">
								<div class="liner"></div>
								 

								<li class="active">
									<a href="#profile" data-toggle="tab" title="Fatura Bilgileri">
										<span class="round-tabs two">
											<i class="fa fa-file-invoice"></i>
										</span> 
									</a>
								</li>
								<? echo $denemetab; ?>
								<? echo $denemetab1; ?>
								<? echo $denemetab2; ?>
								
														
						</ul>
					</div>

                    <div class="tab-content">
						<div class="tab-pane fade active" id="profile">
							
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
																			<input onclick="btn1()" type="submit" class="btn btn-primary btn-lg btn-block" name="df_checkout_place_order" value="Faturayı Kaydet ve Devam Et">
																			<script>
																			function btn1(){
																				
																			}
																			</script>
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
							
							
							
						
						
														  
						</div>
						<div class="tab-pane fade" id="messages">
							<div class="site-content">
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
								</div>
						</div>
						<div class="tab-pane fade" id="settings">
							<h3 class="head text-center">Drop comments!</h3>
							<p class="narrow text-center">
								Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
							</p>
							<p class="text-center">
								<a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
							</p>
						</div>
						<div class="tab-pane fade" id="doner">
							<div class="text-center">
								<i class="img-intro icon-checkmark-circle"></i>
							</div>
							<h3 class="head text-center">thanks for staying tuned! <span style="color:#f48260;">♥</span> Bootstrap</h3>
							<p class="narrow text-center">
								Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
							</p>
						</div>
						<div class="clearfix"></div>
					</div>

				</div>
				<!-- Checkout Form -->
				
			</div>
				
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
	<script>

		
	</script>
</body>
</html>
