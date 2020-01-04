<?php
					
session_start();
$userID = $_SESSION["UserID"];
include "config.php";
$dynamic_list = "";
$dynamic_list1 = "";
$kargo_price=0;
    $res = $connect->prepare("SELECT * FROM ship where userID = $userID ");
    $res->execute([$_GET["id"]]);



$productCount = $res->rowCount();
if ($productCount > 0) {
			
    while ($row = $res->fetch()) {
        $ship_id = $row['ShipID'];
        $shipping_name = $row['shipping_name'];
		$shipping_surname = $row['shipping_surname'];
		$shipping_phone = $row['shipping_phone'];
		$ship_il = $row['ship_il'];
        $ship_ilce = $row['ship_ilce'];
        $ShipAddress = $row['ShipAddress'];
        $ShipEmail = $row['ShipEmail'];
		$durum = $row['durum'];
        $adres_not = $row['adres_not'];

	if($durum=='1'){	
	$dynamic_list .= '			
	
						
								
										<div class="col-md-6">
											<div class="titleBox">
												<span style="color:#0175ad" class="title">Gölbaşı / ANKARA</span> 
												<i style="margin-left: 200px;" data-toggle="modal" data-target="#modal-login-register-tabs-edit" class="fa fa-edit"></i>
												<i id="adres_sil" onclick="adres_sil();" style="float: right; margin-top: 5px;"  class="fa fa-trash"></i>
											</div>
											<div id="adres_ekle" class="form-group">
													<label>
														<span class="username">'.$shipping_name.' '.$shipping_surname.' </span>
												  
														<div class="address-line-1">'.$ShipAddress.'</div>
														<div class="address-line-2"></div>
													
														<span class="address"></span>
														<span class="location">'.$ship_ilce.' - '.$ship_il.' </span>
														<span class="tel">'.$shipping_phone.'</span>
													</label>
											</div>
										</div>
										<div class="modal fade" id="modal-login-register-tabs-edit" tabindex="-1" role="dialog">
												<div style="max-width: 500px;margin: 15px auto !important;" class="modal-dialog modal-lg modal--login" role="document">
														<div class="modal-content">
															
															<div class="modal-body">
																
																<div class="modal-account-holder">
																	<div style="flex-basis: 100%;" class="modal-account__item">
																		<h5>Adres Düzenle</h5>
																		<!-- Register Form -->
																		<form class="modal-form">
																														<div style="border: 0px solid rgba(0,0,0,0.125);" class="card card--lg">
																															
																															<div style="padding: unset !important;" class="card__content">
																																<div class="df-billing-fields">

																																	
																																	<div class="row">

																																		<div class="col-md-6">
																																			<div class="form-group">
																																				<p style="margin-bottom: 0.5em;" for="shipping_name">Ad <abbr class="required" title="required">*</abbr></p>
																																				<input type="hidden" name="shipping_idg" id="shipping_idg" value="'.$ship_id.'" class="form-control" placeholder="Lütfen adınızı giriniz...">
																																				<input type="text" name="shipping_nameg" id="shipping_nameg" value="'.$shipping_name.'" class="form-control" placeholder="Lütfen adınızı giriniz...">
																																			</div>
																																		</div>
																																		<div class="col-md-6">
																																			<div class="form-group">
																																				<p style="margin-bottom: 0.5em;" for="shipping_surname">Soyad</p>
																																				<input type="text" name="shipping_surnameg" id="shipping_surnameg" value="'.$shipping_surname.'" class="form-control" placeholder="Lütfen soyadınızı giriniz...">
																																			</div>
																																		</div>
																																		

																																	</div>

																																	<div class="row">
																																		<div class="col-md-6">
																																			<div class="form-group">
																																				<p style="margin-bottom: 0.5em;" for="shipping_phone">Cep Telefonu</p>
																																				<input type="text" name="shipping_phoneg" id="shipping_phoneg" value="'.$shipping_phone.'" class="form-control" placeholder="Lütfen telefon numaranızı giriniz...">
																																			</div>
																																		</div>
																																		<div class="col-md-6">
																																			<div class="form-group">
																																				<p style="margin-bottom: 0.5em;" for="ShipEmail">E-mail</p>
																																				<input type="text" name="ShipEmailg" id="ShipEmailg" value="'.$ShipEmail.'" class="form-control" placeholder="Lütfen e-mail adresinizi giriniz...">
																																			</div>
																																		</div>
																																		

																																	</div>
																																	<div class="row">
																																		<div class="col-md-6">
																																			<div class="form-group">
																																				<p style="margin-bottom: 0.5em;" for="ship_il">İl</p>
																																				<select name="ship_ilg" id="ship_ilg" value="'.$ship_il.'" class="form-control">
																																					<option value="0">İl Seçiniz...</option>
																																					
																																				</select>
																																			</div>
																																		</div>
																																		<div class="col-md-6">
																																			<div class="form-group">
																																				<p style="margin-bottom: 0.5em;" for="ship_ilce">İlçe</p>
																																				<select name="ship_ilceg" id="ship_ilceg" value="'.$ship_ilce.'" class="form-control">
																																					<option value="0">İlçe Seçiniz...</option>																												
																																				</select>
																																			</div>
																																		</div>

																																	</div>
																																	
																																	<div class="form-group">
																																		 
																																	</div>
																																	

																																	<div class="form-group mb-0">
																																		<p style="margin-top: -25px; margin-bottom: 0.5em;" for="ShipAddress">Adres</p>
																																		<textarea style="height:150px;" name="ShipAddressg" id="ShipAddressg" value="'.$ShipAddress.'" rows="7" class="form-control" placeholder="Lütfen adres giriniz.."></textarea>
																																	</div>
																																	<div class="form-group mb-0">
																																		<p style="margin-top: 13px; margin-bottom: 0.5em;" for="adres_not">Adres ile İlgili Not</p>
																																		<textarea style="height:150px;" name="adres_notg" id="adres_notg" value="'.$adres_not.'" rows="7" class="form-control" placeholder="Eczanenin yanı, marketin üstü gibi ayrıntılar.."></textarea>
																																	</div>
																																			
																																	<div class="place-order">
																																		<input  id="adres_duzenle" class="btn btn-primary btn-lg btn-block"  value="Kaydet">
																																	</div>	

																																</div>
																															</div>
																														</div>
																									</form>
																			<script>
																			
																			function kaydetadres(){
																				var number=document.getElementById("number").value;  
																			}
																			</script>
																		<!-- Register Form / End -->
												
																	</div>
															
																
																</div>
															</div>
														</div>
													</div>
										</div>
														
										
	';
	
	}
	else{
		
		
		
	}
    }
}
else {
    $dynamic_list = "We have no products listed here.";
}



$res = $connect->prepare("SELECT * FROM completedorder where userID = $userID ");
$res->execute([$_GET["id"]]);



$productCount = $res->rowCount();
if ($productCount > 0) {
		
    while ($row = $res->fetch()) {
        $islemID = $row['islemID'];
        $faturaid = $row['faturaid'];
		$kargoid = $row['kargoid'];
		$adresid = $row['adresid'];
		$urunid = $row['urunid'];
        $urunname = $row['urunname'];
        $urunprice = $row['urunprice'];
        $urunpiece = $row['urunpiece'];
		$userid = $row['userid'];
        $siparisdurum = $row['siparisdurum'];

	$dynamic_list1 .= '			
	
						<div style="float:left; width:100%; height:60px;  " class="colsuz">
				<div style="float:left; width:10%; height:30px;margin-top:15px;  " class="resimmm">
					<div style="float:left; margin-left:5%; width:80%; height:20px;margin-top:5px;  " class="adi">
						<font size = "2">Fotoğraf</font>
					</div>
				</div>
				<div style="float:left; margin-left:2%; width:40%; height:30px;margin-top:15px;  " class="adi">
					<div style="float:left; margin-left:5%; width:80%; height:20px;margin-top:5px;  " class="adi">
						<font size = "2">Ürün Bilgisi</font>
					</div>

				</div>
				<div style="float:left; margin-left:2%; width:7%; height:30px;margin-top:15px;  " class="fiyat">
				<div style="float:left; margin-left:10%; width:80%; height:20px;margin-top:5px;  " class="adi">
						<font size = "2">Fiyat</font>
					</div>
				</div>
				<div style="float:left;margin-left:2%; width:5%; height:30px;margin-top:15px;  " class="boyut">
					<div style="float:left; margin-left:10%; width:80%; height:20px;margin-top:5px;  " class="adi">
						<font size = "2">Boyut</font>
					</div>
				</div>
				<div style="float:left; margin-left:2%; width:5%; height:30px;margin-top:15px;  " class="renk">
					<div style="float:left; margin-left:10%; width:80%; height:20px;margin-top:5px;  " class="adi">
						<font size = "2">Renk</font>
					</div>
				</div>
				<div style="float:left; margin-left:2%; width:10%; height:30px;margin-top:15px;  " class="miktar">
					<div style="float:left; margin-left:10%; width:80%; height:20px;margin-top:5px;  " class="adi">
						<font size = "2">Miktar</font>
					</div>
				</div>
				<div style="float:left; margin-left:2%; width:10%; height:30px;margin-top:15px;  " class="toplam">
					<div style="float:left; margin-left:10%; width:80%; height:20px;margin-top:5px;  " class="adi">
						<font size = "2">Toplam</font>
					</div>	
				</div>			
			</div>			
            <div style="float:left; width:100%; height:100px; margin-top:20px; background-color:#fff;  " class="colsuz">
				<div style="float:left; width:10%; height:70px;margin-top:15px; margin-left:1%;  " class="resimmm">
					<div style="float:left;width:100%;height:70px; " class="">
					<img style="width:100%; height:70px;" src="http://test.nuewin.com/4mynot4give/assets/images/product/1-1.PNG">
					</div>
				</div>
				<div style="float:left; margin-left:2%; width:40%; height:70px;margin-top:15px;" class="adi">
					<div style="float:left; margin-left:5%; width:90%; height:30px;margin-top:20px;" class="adi">
						<font    style="font-weight: 400; size = 2;">TOFAŞ EV SAHİBİ TARAFTAR FORMASI</font>
					</div>

				</div>
				<div style="float:left; margin-left:2%; width:7%; height:70px;margin-top:15px;  " class="fiyat">
					<div style="float:left; margin-left:10%; width:80%; height:30px;margin-top:20px;" class="adi">
						<font style="font-weight: 400; size = 2;">89₺</font>
					</div>
				</div>
				<div style="float:left;margin-left:2%; width:5%; height:70px;margin-top:15px;  " class="boyut">
					<div style="float:left; margin-left:50%; width:80%; height:30px;margin-top:20px;  " class="adi">
						<font style="font-weight: 400; size = 2;">M</font>
					</div>
				</div>
				<div style="float:left; margin-left:2%; width:5%; height:70px;margin-top:15px;  " class="renk">
					<div style="float:left; margin-left:10%; width:80%; height:30px;margin-top:20px;  " class="adi">
						<font style="font-weight: 400; size = 2;">Turuncu</font>
					</div>
				</div>
				<div style="float:left; margin-left:2%; width:10%; height:70px;margin-top:15px;  " class="miktar">
					<div style="float:left; margin-left:50%; width:80%; height:30px;margin-top:20px;  " class="adi">
						<font style="font-weight: 400; size = 2;">4</font>
					</div>
				</div>
				<div style="float:left; margin-left:2%; width:10%; height:70px;margin-top:15px;  " class="toplam">
					<div style="float:left; margin-left:10%; width:80%; height:30px;margin-top:20px;  " class="adi">
						<font style="font-weight: 400; size = 2;">356₺</font>
					</div>
				</div>			
			
			</div>
			            <div style="float:left;margin-top:20px; width:100%; height:100px;  " class="colsuz">
            <div style="float:left; width:10%; height:70px;margin-top:15px;  " class="resimmm">
			
			</div>
			<div style="float:left; margin-left:2%; width:40%; height:70px;margin-top:15px;  " class="adi">
			
			</div>
			<div style="float:left; margin-left:2%; width:7%; height:70px;margin-top:15px;  " class="fiyat">
			
			</div>
			<div style="float:left;margin-left:2%; width:5%; height:70px;margin-top:15px;  " class="boyut">
			
			</div>
			<div style="float:left; margin-left:2%; width:5%; height:70px;margin-top:15px;  " class="renk">
			
			</div>
			<div style="float:left; margin-left:2%; width:10%; height:70px;margin-top:15px;  " class="miktar">
			
			</div>
			<div style="float:left; margin-left:2%; width:10%; height:70px;margin-top:15px;  " class="toplam">
			
			</div>
			
			
			
			
			</div>
			            <div style="float:left;margin-top:20px; width:100%; height:100px;  " class="colsuz">
            <div style="float:left; width:10%; height:70px;margin-top:15px;  " class="resimmm">
			
			</div>
			<div style="float:left; margin-left:2%; width:40%; height:70px;margin-top:15px;  " class="adi">
			
			</div>
			<div style="float:left; margin-left:2%; width:7%; height:70px;margin-top:15px;  " class="fiyat">
			
			</div>
			<div style="float:left;margin-left:2%; width:5%; height:70px;margin-top:15px;  " class="boyut">
			
			</div>
			<div style="float:left; margin-left:2%; width:5%; height:70px;margin-top:15px;  " class="renk">
			
			</div>
			<div style="float:left; margin-left:2%; width:10%; height:70px;margin-top:15px;  " class="miktar">
			
			</div>
			<div style="float:left; margin-left:2%; width:10%; height:70px;margin-top:15px;  " class="toplam">
			
			</div>
			
			
			
			
			</div>

														
										
	';
	
	

    }
}
else {
    $dynamic_list = "We have no products listed here.";
}



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
	<link href="../4mynot4give/assets/css/fontawesome.min.css" rel="stylesheet">
	<link href="../4mynot4give/assets/css/all.min.css" rel="stylesheet"> 
	<link href="../assets/css/theme.css" rel="stylesheet">
	<link href="../4mynot4give/assets/css/red2.css" rel="stylesheet">
	<!-- Template CSS-->
	<link href="../4mynot4give/assets/css/style-soccer.css" rel="stylesheet">

	<!-- Custom CSS-->
	<link href="assets/css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<script src="../4mynot4give/assets/js/fontawesome.min.js" rel="stylesheet"></script>
	<script src="../4mynot4give/assets/js/all.min.js" rel="stylesheet"></script>
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

#adres_ekle{
	float: left;
    background-color: #f6f6f6;
    width: 100%;
    min-height: 170px;
	padding: 20px;
    float: left;
    text-align: left;
}
#adres_icon{
	margin-top: 40px;
    width: 100%;
    height: 30px;
}
#yeni_adres{
    bottom: 15px;
    width: 100%;
    height: 24px;
    text-align: center;
    cursor: pointer;
    padding: 0;
}
.form-control:not(textarea) {
    height: 35px !important;
}
.username{
	display: block;
    width: 100%;
    font-family: source_sans_prosemibold;
    margin-bottom: 10px;
}
.address{
	float: left;
    display: block;
    width: 100%;
    margin-bottom: 5px;
}

.fa-edit:hover {
    color: #0175ad;
}
.fa-trash:hover {
    color: red;
}

      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      /* Useful stuff and generic styling */
@import 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300';
*, *:after, *:before {box-sizing: border-box;}





/*Reusable parts*/
.module {
  margin-bottom: 2em;
  background: rgba(255,255,255,1);
  color: rgba(37,40,42,1);
  float:left;width:100%;
  height: 100%;
  box-shadow: 0 5px 20px rgba(0,0,0,.5);
  border-radius: .5em;
}
.module [class*='col-'] .inner {
  padding: 2em 0;
}
.red {color: rgba(241,0,0,1);}
.green {color :rgba(78,170,62,1);}
.uppercase {text-transform: uppercase;}
.btn {
  display:inline-block;
  padding: .75em 2em;
  line-height: 1.5;
  background: rgba(18,119,189,1);
  color: rgba(255,255,255,1);
  font-weight: 400;
  border-radius: 0;
  margin: .5em;
  box-shadow: 0 2px 5px rgba(0,0,0,.1);
  letter-spacing: .05em;
  transition: .5s ease all;
  max-width:100%;
  border-radius: .25em;
}
.btn:hover {
  background: rgba(13,137,223,1);
  color: rgba(255,255,255,1);
  transform: translate(0,-.125em);
  box-shadow: 0 4px 10px rgba(0,0,0,.1);
}
.btn-green {background: rgba(78,170,62,1);}
.btn-green:hover {background: rgba(72,188,52,1);}
.btn-black {background: rgba(37,40,42,1);}
.btn-black:hover {background: rgba(85,91,96,1);}




/*Responsive Table & Accordion Styles*/
.tabular-data {
  overflow:hidden;
  position: relative;
}
.data-group {
  border-bottom: 1px solid rgba(220,220,220,1);
}
.data-inactive {
  color: rgba(120,120,120,1);
  background: rgba(230,230,230,1);
  padding: 1.5em;
  float:left;
  width: 100%;
}
.data-header {
  font-weight:bold;
  text-transform: uppercase;
  color: rgba(85,91,96,.5);
  padding: 1.5em;
}
.data-group:last-child {border:none;}
.data-group .data-expands,
.data-group .expandable {
  will-change:
    max-height,
    padding,
    opacity,
    background;
  transition:
    ease max-height .5s,
    ease padding .5s,
    ease opacity .5s,
    ease background .5s;
}
.data-group .data-expands {
  cursor: pointer;
  padding: 1.5em;
  float:left;
  width: 100%;
}
.data-group .title {font-weight:600}
.data-group .expandable {
  transform-origin: top;
  margin: 0 1.25em 0;
  padding: 0 1.5em;
  font-weight: 600;
  max-height: 0;
  overflow: hidden;
  opacity: 0;
}
.data-group .expandable p {
  font-weight: 400;
  color: rgba(100,100,100,1);
}
.data-group .expandable hr {
  margin: 1em 0;
}
.data-group .expandable .btn {
  margin: 0;
  padding: .75em 0;
  width: 100%;
}
.row-active, .row-open {
  background: rgba(245,245,245,1);
  opacity: 1 !important;
}
.row-open {
  max-height: 999px !important;
  padding: 1.5em !important;
}
.row-toggle {
  position: relative;
  cursor: pointer;
  float: right;
  display: block;
  margin: .3em 0.5em 0 0;
  font-size: 2em;
  transition: ease transform .5s;
  transform-origin: center;
  line-height: 1;
  font-weight: bold;
}
.row-toggle .horizontal,
.row-toggle .vertical {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-left: -8px;
  content:" ";
  width: 16px;
  height: 2px;
  background: rgba(120,120,120,1);
  transition: ease transform .5s;
  transform-origin: center;
}
.row-toggle .vertical {
  transform: rotate(90deg);
}
.row-toggle-twist,
.row-toggle-twist .vertical {
  transform: rotate(180deg);
}
@media screen and (max-width: 992px) {
  .data-group .title {display:inline-block;padding-bottom: 1em;}
}
</style>
<body class="nuewin">

	<div class="site-wrapper clearfix">

		<?php include"header.php"?>

		
		
		
		
		<!-- Content
		================================================== -->
		<div class="site-content">
			<div class="container">
		
				<div class="row">
		
				<div class="col-md-3">
		
						<!-- Account Navigation -->
						<div class="card">
							<div class="card__header">
								<h4>Hoşgeldiniz!</h4>
							</div>
							<div class="card__content">
								<nav class="df-account-navigation">
									<ul>
										<li class="df-account-navigation__link">
											<a class="tablinks"  onclick="openCity(event, 'kisisel')">Kişisel Bilgilerim</a>
										</li>
										<li class="df-account-navigation__link">
											<a class="tablinks"  onclick="openCity(event, 'adres')">Adres Bilgilerim</a>
										</li>
										<li class="df-account-navigation__link">
											<a class="tablinks"  onclick="openCity(event, 'siparis')">Sipariş Bilgilerim</a>
										</li>
										<li class="df-account-navigation__link">
											<a class="tablinks"  onclick="openCity(event, 'kupon')">Kupon Bilgilerim</a>
										</li>
										<li class="df-account-navigation__link">
											<a class="tablinks"  onclick="openCity(event, 'liste')">Alışveriş Listesi</a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
						<!-- Account Navigation / End -->
				</div>
		
				<div class="col-md-9">
		
						<!-- Personal Information -->
						<div id="kisisel" class="tabcontent">
							<div class="card__header">
								<h4>Kişisel Bilgiler</h4>
							</div>
							<div id="kisisel" class="card__content">
								<form action="#" class="df-personal-info">
									<?php 
									$a = $_SESSION['UserID'];
									$account = $connect->query("SELECT * FROM customers WHERE UserID = $a", PDO::FETCH_ASSOC);
									foreach($account as $kullanici) {
									 ?>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="account-email">Email</label>
												<input type="email" class="form-control" name="account-email" id="account-email" value="<?php echo $kullanici['UserEmail'] ?>" readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="account-phone">Telefon</label>
												<input type="text" class="form-control" name="account-phone" id="account-phone" value="<?php echo $kullanici['UserPhone'] ?>" readonly>
											</div>
										</div>
										
									</div>
		
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="account-password">Şifre Değiştir</label>
												<input type="password" class="form-control" value="" name="account-password" id="account-password" placeholder="**********">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="account-password-repeat">Şifre Doğrulama</label>
												<input type="password" class="form-control" value="" name="account-password-repeat" id="account-password-repeat" placeholder="**********">
											</div>
										</div>
									</div>
		
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="account-first-name">Ad</label>
												<input type="text" class="form-control" value="<?php echo $kullanici['UserFirstName'] ?>" name="account-first-name" id="account-first-name" placeholder="Adınızı giriniz">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="account-last-name">Soyad</label>
												<input type="text" class="form-control" value="<?php echo $kullanici['UserLastName'] ?>" name="account-last-name" id="account-last-name" placeholder="Soyadınızı giriniz">
											</div>
										</div>
									</div>
									<?php } ?>
		
		
									<div class="form-group--submit">
										<button type="submit" class="btn btn-default btn-lg btn-block">Kaydet</button>
									</div>
		
								</form>
							</div>
						</div>
						<div style="display:none" id="adres" class="tabcontent">
							<div class="card__header">
								<h4>Adres Bilgileri</h4>
							</div>
							<div id="adres" class="card__content">
								<form action="#" class="df-personal-info">
									<h4>Yeni Adres Ekle</h4>

									<div class="row">
										<div style="margin-top: 25px;" class="col-md-6">
											
											<div style="height: 170px;" id="adres_ekle" class="form-group">
												<a href="#" data-toggle="modal" data-target="#modal-login-register-tabs"><i id="adres_icon" class="fa fa-plus"></i></a>
												<label id="yeni_adres">Yeni Adres Ekle</label>
											</div>
											
										</div>
									
									<!--Adres Ekle Modal-->	
										<div class="modal fade" id="modal-login-register-tabs" tabindex="-1" role="dialog">
												<div style="max-width: 500px;margin: 15px auto !important;" class="modal-dialog modal-lg modal--login" role="document">
														<div class="modal-content">
															
															<div class="modal-body">
																
																<div class="modal-account-holder">
																	<div style="flex-basis: 100%;" class="modal-account__item">
																		<h5>Adres Ekle</h5>
																		<!-- Register Form -->
																		<form action="" method="post"  class="modal-form">
																														<div style="border: 0px solid rgba(0,0,0,0.125);" class="card card--lg">
																															
																															<div style="padding: unset !important;" class="card__content">
																																<div class="df-billing-fields">

																																	
																																	<div class="row">

																																		<div class="col-md-6">
																																			<div class="form-group">
																																				<p style="margin-bottom: 0.5em;" for="shipping_name">Ad <abbr class="required" title="required">*</abbr></p>
																																				<input type="text" name="shipping_name" id="shipping_name" value="<?php if(isset($_POST['shipping_name'])) echo $_POST['shipping_name'] ?>" class="form-control" placeholder="Lütfen adınızı giriniz...">
																																			</div>
																																		</div>
																																		<div class="col-md-6">
																																			<div class="form-group">
																																				<p style="margin-bottom: 0.5em;" for="shipping_surname">Soyad</p>
																																				<input type="text" name="shipping_surname" id="shipping_surname" value="<?php if(isset($_POST['shipping_surname'])) echo $_POST['shipping_surname'] ?>" class="form-control" placeholder="Lütfen soyadınızı giriniz...">
																																			</div>
																																		</div>
																																		

																																	</div>

																																	<div class="row">
																																		<div class="col-md-6">
																																			<div class="form-group">
																																				<p style="margin-bottom: 0.5em;" for="shipping_phone">Cep Telefonu</p>
																																				<input type="text" name="shipping_phone" id="shipping_phone" value="<?php if(isset($_POST['shipping_phone'])) echo $_POST['shipping_phone'] ?>" class="form-control" placeholder="Lütfen telefon numaranızı giriniz...">
																																			</div>
																																		</div>
																																		<div class="col-md-6">
																																			<div class="form-group">
																																				<p style="margin-bottom: 0.5em;" for="ShipEmail">E-mail</p>
																																				<input type="text" name="ShipEmail" id="ShipEmail" value="<?php if(isset($_POST['ShipEmail'])) echo $_POST['ShipEmail'] ?>" class="form-control" placeholder="Lütfen e-mail adresinizi giriniz...">
																																			</div>
																																		</div>
																																		

																																	</div>
																																	<div class="row">
																																		<div class="col-md-6">
																																			<div class="form-group">
																																				<p style="margin-bottom: 0.5em;" for="ship_il">İl</p>
																																				<select style="height: 45px !important;" name="ship_il" id="ship_il" value="<?php if(isset($_POST['ship_il'])) echo $_POST['ship_il'] ?>" class="form-control">
																																					<option value="0">İl Seçiniz...</option>
																																			
																																				</select>
																																			</div>
																																		</div>
																																		<div class="col-md-6">
																																			<div class="form-group">
																																				<p style="margin-bottom: 0.5em;" for="ship_ilce">İlçe</p>
																																				<select style="height: 45px !important;" name="ship_ilce" id="ship_ilce" value="<?php if(isset($_POST['ship_ilce'])) echo $_POST['ship_ilce'] ?>" class="form-control" disabled="disabled">
																																					<option value="0">İlçe Seçiniz...</option>
																																			
																																				</select>
																																			</div>
																																		</div>

																																	</div>
																																	
																																	<div class="form-group">
																																		 
																																	</div>
																																	

																																	<div class="form-group mb-0">
																																		<p style="margin-top: -25px; margin-bottom: 0.5em;" for="ShipAddress">Adres</p>
																																		<textarea style="height:150px;" name="ShipAddress" id="ShipAddress" value="<?php if(isset($_POST['ShipAddress'])) echo $_POST['ShipAddress'] ?>" rows="7" class="form-control" placeholder="Lütfen adres giriniz.."></textarea>
																																	</div>
																																	<div class="form-group mb-0">
																																		<p style="margin-top: 13px; margin-bottom: 0.5em;" for="adres_not">Adres ile İlgili Not</p>
																																		<textarea style="height:150px;" name="adres_not" id="adres_not" value="<?php if(isset($_POST['adres_not'])) echo $_POST['adres_not'] ?>" rows="7" class="form-control" placeholder="Eczanenin yanı, marketin üstü gibi ayrıntılar.."></textarea>
																																	</div>
																																			
																																	<div class="place-order">
																																		<input  id="kargo"  type="submit" class="btn btn-primary btn-lg btn-block"  value="Kaydet">
																																	</div>	

																																</div>
																															</div>
																														</div>
																									</form>
																			<script>
																			
																			function kaydetadres(){
																				var number=document.getElementById("number").value;  
																			}
																			</script>
																		<!-- Register Form / End -->
												
																	</div>
															
																
																</div>
															</div>
														</div>
													</div>
										</div>
										<!--Adres Düzenle Modal-->
										
										<p><?php echo $dynamic_list; ?> </p>
									</div>
		
		
							
		
								</form>
							</div>
						</div>
						
						<div style="display:none;" id="siparis" class="tabcontent">
							
			
					<div class="card__header">
						<h4>Sipariş Bilgilerim</h4>
					</div>


  




  <!-- Container -->
<div class="container">
  <!-- Table -->
  <div class="tabular-data module">

    <!-- Table Head -->
    <div class="data-group data-header hidden-sm hidden-xs">
      <div class="row">
        <div class="col-md-2">
          <strong class="uppercase">Sipariş Kodu </strong>
        </div>
        <div class="col-md-6">
          <strong class="uppercase">Teslimat Bilgisi</strong>
        </div>
        <div class="col-md-4">
          <strong class="uppercase">Ödeme Bilgisi</strong>
        </div>
      </div>
    </div>
    <!-- Table Head -->
    <!-- Table Row -->
    <div class="data-group">
      <div class="row">
        <div class="data-expands">
          <div style="float:left" class="col-lg-2 col-md-2">
            1245346
          </div>
          <div style="float:left" class="col-lg-6 col-md-6">
            <span class="title">Cromulent waste removal may behoove us.</span>
          </div>
          <div style="float:left" class="col-lg-3 col-md-3">
            <div class="green uppercase"><strong><i class="fa fa-check-circle"></i> Sipariş Tamamlandı</strong>
              <span class="row-toggle">
                <span class="horizontal"></span>
                <span class="vertical"></span>
              </span>
            </div>
          </div>
        </div>
        <div style="width:100%;background-color: rgb(255, 255, 255);" class="expandable">
          <div style="width:100%;" class="row">
			
				....
          </div>
        </div>
      </div>
    </div>
    <!-- Table Row -->
    <!-- Table Row -->
    <div class="data-group">
      <div class="row">
        <div class="data-expands">
          <div class="col-lg-1 col-md-1">
            7245623
          </div>
          <div class="col-lg-8 col-md-5">
            <span class="title">Having a bibble with a minimum of three friends.</span>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="green uppercase"><strong><i class="fa fa-check-circle"></i> Approved</strong>
              <span class="row-toggle">
                <span class="horizontal"></span>
                <span class="vertical"></span>
              </span>
            </div>
          </div>
        </div>
        <div class="expandable">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-1 col-md-7 col-md-offset-1">
              <p>I'm the Doctor, I'm worse than everyone's aunt. *catches himself* And that is not how I'm introducing myself. You hate me; you want to kill me! Well, go on! Kill me! KILL ME! Father Christmas. Santa Claus. Or as I've always known him: Jeff.</p>

              <p>I hate yogurt. It's just stuff with bits in. You hit me with a cricket bat. All I've got to do is pass as an ordinary human being. Simple. What could possibly go wrong? The way I see it, every life is a pile of good things and bad things.…hey.…the good things don't always soften the bad things; but vice-versa the bad things don't necessarily spoil the good things and make them unimportant.</p>
            </div>
            <div class="col-lg-3 col-md-4">
              <div class="row">
                <div class="col-xs-12 visible-sm visible-xs"><hr></div>
                <div class="col-xs-6">Left Bracket</div>
                <div class="col-xs-6 text-right">20.00</div>
                <div class="col-xs-6">Right Bracket</div>
                <div class="col-xs-6 text-right">20.00</div>
                <div class="col-xs-6">Tax</div>
                <div class="col-xs-6 text-right">1.50</div>
                <div class="col-xs-12"><hr></div>
                <div class="col-xs-6">Total</div>
                <div class="col-xs-6 text-right">$41.50</div>
                <div class="col-xs-12">
                  <hr>
                </div>
                <div class="col-xs-6"><a href="#" class="btn btn-black"><i class="fa fa-phone"></i> Contact</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Table Row -->
    <!-- Table Row -->
    <div class="data-group">
      <div class="row">
        <div class="data-expands">
          <div class="col-lg-1 col-md-1">
            9356257
          </div>
          <div class="col-lg-8 col-md-5">
            <span class="title">A delightful tune from the doodle sack.</span>
          </div>
          <div class="col-lg-3 col-md-3">
            <div class="uppercase"><strong><i class="fa fa-wrench"></i> In Progress</strong>
              <span class="row-toggle">
                <span class="horizontal"></span>
                <span class="vertical"></span>
              </span>
            </div>
          </div>
        </div>
        <div class="expandable">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-1 col-md-7 col-md-offset-1">
              <p>Well, what do you expect, mother? But I bought a yearbook ad from you, doesn't that mean anything anymore? Across from where? It's called 'taking advantage.' It's what gets you ahead in life.</p>
              <p>Not tricks, Michael, illusions. Get me a vodka rocks. And a piece of toast. Whoa, this guy's straight? Bad news. Andy Griffith turned us down. He didn't like his trailer. Michael!</p>
            </div>
            <div class="col-lg-3 col-md-4">
              <div class="row">
                <div class="col-xs-12 visible-sm visible-xs"><hr></div>
                <div class="col-xs-6">Cleaning</div>
                <div class="col-xs-6 text-right">40.00</div>
                <div class="col-xs-6">Polish</div>
                <div class="col-xs-6 text-right">20.00</div>
                <div class="col-xs-12"><hr></div>
                <div class="col-xs-6">Total</div>
                <div class="col-xs-6 text-right">$60.00</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Table Row -->
  </div>
  <!-- Table -->
</div>

  




					
						<!-- Personal Information / End -->
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
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  

    <script  src="assets/js/il-ilce.js"></script>
	 <script>
			// Expandable Data Table
		$('.data-expands').each(function(){
			$(this).click(function(){
				$(this).toggleClass('row-active');
				$(this).parent().find('.expandable').toggleClass('row-open');
				$(this).parent().find('.row-toggle').toggleClass('row-toggle-twist');
			});
		});
			
	</script>
	<script>


function openCity(evt, cityName) {

  var i, tabcontent, tablinks;
  
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
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
				
            };
			
			$.ajax({
			url: "adres_ekle_kontrol.php",
			type: "post",
			data:formData,
			success: function(result){
			  
			}});
		  
		  window.location = "account.php"
		  });
		  
		  
</script>
<script>
$("#adres_duzenle").click(function(){
		
			var formData = {

				'shipping_id': $('input[name=shipping_idg]').val(),
                'shipping_name': $('input[name=shipping_nameg]').val(),
                'shipping_surname': $('input[name=shipping_surnameg]').val(),
                'shipping_phone': $('input[name=shipping_phoneg]').val(),
                'ShipEmail': $('input[name=ShipEmailg]').val(),
                'ship_il': $('#ship_ilg option:selected').val(),
                'ship_ilce': $('#ship_ilceg option:selected').val(),
				'ShipAddress': $('textarea[name=ShipAddressg]').val(),
				'adres_not': $('textarea[name=adres_notg]').val(),
				
            };
			
			$.ajax({
			url: "adres_duzenle.php",
			type: "post",
			data:formData,

});
		  });
		  
		  
		  document.write("kargo not =" + kargo_not)
</script>
<script>
function adres_sil(){
		 
			
			var formData = {
                'shipping_name': $('input[name=shipping_name]').val(),
                'shipping_surname': $('input[name=shipping_surname]').val(),
                'shipping_phone': $('input[name=shipping_phone]').val(),
                'ShipEmail': $('input[name=ShipEmail]').val(),
                'ship_il': $('#ship_il option:selected').val(),
                'ship_ilce': $('#ship_ilce option:selected').val(),
				'ShipAddress': $('textarea[name=ShipAddress]').val(),
				'adres_not': $('textarea[name=adres_not]').val(),
				
            };
			
			$.ajax({
			url: "adres_sil.php",
			type: "post",
			data:formData,
			success: function(result){
			  
			}});
		 
		  window.location = "account.php"
		  });
  
		  
</script>
</body>
</html>
