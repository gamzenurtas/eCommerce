<!-- NUEWIN HEADER : START -->

<!-- NUEWIN HEADER MOBILE : START -->
<?php
	require 'config.php';
	session_start;
	$dynamic_list1 = " ";
 		$dynamic_list3 = " ";

if (($_SESSION["UserID"]>0) && ($_SERVER['REQUEST_URI']!='/4mynot4give/shopping-cart.php')) {
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
        $dynamic_list1 .= '			
		
		<div id="dolusepet'.$cart_id.'">
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
										<a name="dolusepet'.$cart_id.'" onclick="deleteitem('.$cart_id.');deleteprice('.$cart_id.');"  class="example--2  header-cart__close"><i class="fas fa-times"></i></a>
									</div>
								</li>
</div>


								<!-- Products / End -->';
    }
					$dynamic_list2 .= '																<div id="dolupara">

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
else if(($_SESSION["UserID"]>0) && ($_SERVER['REQUEST_URI']=='/4mynot4give/shopping-cart.php')){
	    $dynamic_list3 = "</br><h6 style='margin-left:10px;'>Zaten alışveriş sepetindesiniz.</h6>";

	
}

else {
    $dynamic_list1 = "</br><h6 style='margin-left:10px;'>Sepetinizde listelenecek bir ürün bulunmuyor.</h6>";
}
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
							url:"shopping_price.php?a="+cart_id, // Verilerin postlanağı adresi belirliyoruz.
 success: function(result) {
            $('#dolupara').html(result);
        }
});
}

</script>
	<div id="search_widget" class="form-search search-widget header__search"
						data-search-controller-url="">
						<form class="bizim" id="searchform" method="get" action="search-list.php" >
							<input type="hidden">
							<input id="arama1"  name="arama" type="text" class="te" placeholder=" Arama yapın..."
								placeholder="Binlerce Ürün Arasından Arama Yapın...">
							<button onclick="aramafunc()" type="button">
								<i class="fa fa-search mt-7 fa-2x h-62"></i>
								<span id="circularG">
									<span id="circularG_1" class="circularG"></span>
									<span id="circularG_2" class="circularG"></span>
									<span id="circularG_3" class="circularG"></span>
									<span id="circularG_4" class="circularG"></span>
									<span id="circularG_5" class="circularG"></span>
									<span id="circularG_6" class="circularG"></span>
									<span id="circularG_7" class="circularG"></span>
									<span id="circularG_8" class="circularG"></span>
								</span>
							</button>
						</form>
						<a id="sf-close" class="pa" href="javascript:void(0)"> <i class="fa fa-times"></i>
						</a>
					</div>

<div class="header-mobile clearfix" id="header-mobile">
	<div class="header-mobile__logo">
		<a href="#"><img src="assets/images/soccer/logo.png" srcset="assets/images/soccer/logo@2x.png 2x"
				alt="Alchemists" class="header-mobile__logo-img"></a>
	</div>
	<div class="header-mobile__inner">
		<a id="header-mobile__toggle" class="burger-menu-icon"><span class="burger-menu-icon__line"></span></a>
		<span class="header-mobile__search-icon sf-open" id="header-mobile__search-icon" > <i class="fa fa-search sf-open"></i>  </span>
	</div>
</div>
<!-- NUEWIN HEADER MOBILE : STOP -->
<!-- NUEWIN HEADER DESKTOP : START -->
<header class="header header--layout-1">

	<!-- HEADER TOP : START -->
	<div class="header__top-bar clearfix">
		<div class="container">
			<div class="header__top-bar-inner">
				<ul class="nav-account">
				<hr class="d-md-none d-block new1">

					<li class="nav-account__item nav-account__item--wishlist"><a href="wishlist.php"><i
								class="fa fa-heart i-blue blue"></i> ALIŞVERİŞ LİSTEM <span class="highlight">( <?echo $alisverislistesayi; ?> )
								ÜRÜN</span></a>
					</li>
<hr class="d-md-none d-block new1">

					<li class="nav-account__item"><a href="#">PARA BİRİMİ: <span class="highlight">₺ TRY</span></a>
						<ul class="main-nav__sub r-34">
							<li><a href="#">₺ TRY</a></li>
							<li><a href="#">$ USD</a></li>
							<li><a href="#">£ EUR</a></li>
						</ul>
					</li>
					<hr class="d-md-none d-block new1">

					<li class="nav-account__item"><a href="#">DİL AYARLARI: <span class="highlight"><b>TR</b>
								TÜRKÇE</span></a>
						<ul class="main-nav__sub r-52">
							<li><a href="#"><b>TR</b> TÜRKÇE</a></li>
							<li><a href="#"><b>EN</b> ENGLISH</a></li>
						</ul>
					</li>
					<hr class="d-md-none d-block new1">

					<?
if (!isset($_SESSION['UserID'])){
echo '


<li class="nav-account__item "><a href="#" data-toggle="modal" data-target="#modal-login-register-tabs"><i class="fa fa-lock i-blue blue"></i> Giriş Yap </a>

';
} else {
echo '
<li class="nav-account__item nuewin-11"><a href="account.php">'.$_SESSION["UserFirstName"].' '.$_SESSION["UserLastName"].'</a><ul style="min-width: 148px !important;" class="main-nav__sub r-52">
							<li><a href="account.php"><b>Kişisel</b> Bilgilerim</a></li>
							<li><a href="account.php"><b>Adres </b> Bilgilerim</a></li>
							<li><a href="account.php"><b>Sipariş </b> Bilgilerim</a></li>
							<li><a href="account.php"><b>Kupon </b> Bilgilerim</a></li>
						</ul></li>
<li class="nav-account__item  "><a href="logout.php"><i class="fas fa-power-off"></i> Çıkış Yap</a>


';
}

?>


				</ul>
			</div>
		</div>
	</div>
	<!-- HEADER TOP : STOP -->
	<!-- HEADER BOTTOM : START -->
	<div class="header__primary header" id="nuewinHeader">
		<div class="container">
			<div class="header__primary-inner">
				<div class="header-logo">
					<a href="index.php"><img src="assets/images/soccer/logo.png"
							srcset="assets/images/soccer/logo@2x.png 2x" alt="DAFRON ONLINE"
							class="header-logo__img"></a>
				</div>
				<!-- HEADER MEGAMENU : START -->
				<nav class="main-nav clearfix ">
					<ul class="main-nav__list">

						<?php
						$sorgu = $connect->query("SELECT * FROM categories WHERE highCategoriesID = 0 AND isDeleted = false order by categoriesRow ASC", PDO::FETCH_ASSOC);
            			if($sorgu->rowCount()){
          				foreach ($sorgu as $kayit) {

          					$id1 = $kayit['categoriesID'];
          					$sorgu1 = $connect->query("SELECT * FROM categories WHERE highCategoriesID = $id1 AND isDeleted = false", PDO::FETCH_ASSOC);
          					$kontrol = $sorgu1->rowCount();
          					if($kontrol == 0){
          				 ?>
						 <hr class="d-md-none d-block new1">

          				 <li class=""><a href="category-grid.php?kategori_id=<?php echo $kayit['categoriesID'] ?>"><span><?php echo $kayit['categoriesName']; ?></span></a></li>

          				<?php } else { ?>
<hr class="d-md-none d-block new1">

						<li class=""><a href="category-grid.php?kategori_id=<?php echo $kayit['categoriesID'] ?>"><span><?php echo $kayit['categoriesName']; ?></span></a>

							<div class="main-nav__megamenu clearfix">
								<?php

									$sorgu1 = $connect->query("SELECT * FROM categories WHERE highCategoriesID = $id1 AND isDeleted = false order by categoriesRow asc  limit 3 ", PDO::FETCH_ASSOC);
			            			if($sorgu1->rowCount()){
			          				foreach ($sorgu1 as $kayit1) {
			          				 ?>
								<ul class="col-lg-2 col-md-3 col-12 main-nav__ul">

<hr class="d-md-none d-block new1">

									<li class="main-nav__title"><?php echo $kayit1['categoriesName']; ?></li>
									<?php
									$id2 = $kayit1['categoriesID'];
									$sorgu2 = $connect->query("SELECT * FROM categories WHERE highCategoriesID = $id2 AND isDeleted = false  order by categoriesRow asc", PDO::FETCH_ASSOC);
			            			if($sorgu2->rowCount()){
			          				foreach ($sorgu2 as $kayit2) {
			          				 ?>
<hr class="d-md-none d-block new1">

									<li><a href="category-grid.php?kategori_id=<?php echo $kayit2['categoriesID'] ?>"><?php echo $kayit2['categoriesName']; ?></a></li>
<hr class="d-md-none d-block new1">

									<?php } } ?>
								</ul><?php }} ?>
								<div class="col-lg-3 col-md-3 col-12">
									<ul class="posts posts--simple-list">
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="category-grid.php"><img class="blue-border"
														src="assets/images/samples/menu-kosu-ayakkabi.jpg" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">AYAKKABILAR</span>
												</div>
												<h6 class="posts__title"><a href="#">KOŞU AYAKKABILARI</a></h6>
												<time datetime="2016-08-21" class="posts__date dark-blue">DÜNYACA ÜNLÜ
													MARKALAR</time>
											</div>
										</li>
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="category-grid.php"><img class="blue-border"
														src="assets/images/samples/menu-antreman-ayakkabi.jpg"
														alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">AYAKKABILAR</span>
												</div>
												<h6 class="posts__title"><a href="#">ANTREMAN AYAKKABILARI</a></h6>
												<time datetime="2016-08-23" class="posts__date dark-blue">SPORUN HER
													DALINDA BİZ VARIZ</time>
											</div>
										</li>
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="category-grid.php"><img class="blue-border"
														src="assets/images/samples/menu-outdoor-ayakkabi.jpg"
														alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">AYAKKABILAR</span>
												</div>
												<h6 class="posts__title"><a href="#">OUTDOOR</a></h6>
												<time datetime="2016-08-21" class="posts__date dark-blue">%100 KONFORU
													YAKALAYIN</time>
											</div>
										</li>
									</ul>
								</div>
								<div class="col-lg-3 col-md-3 col-12">
									<ul class="posts posts--simple-list">
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="category-grid.php"><img class="blue-border"
														src="assets/images/samples/menu-yuruyus-ayakkabi.jpg"
														alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">AYAKKABILAR</span>
												</div>
												<h6 class="posts__title"><a href="#">YÜRÜYÜŞ AYAKKABILARI</a></h6>
												<time datetime="2016-08-21" class="posts__date dark-blue">FARKINIZI
													YARATIN</time>
											</div>
										</li>
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="category-grid.php"><img class="blue-border"
														src="assets/images/samples/menu-bot-cizme.jpg" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">AYAKKABILAR</span>
												</div>
												<h6 class="posts__title"><a href="#">BOT - ÇİZME</a></h6>
												<time datetime="2016-08-23" class="posts__date dark-blue">RAHATLIK VE
													KALİTE BİR ARADA</time>
											</div>
										</li>
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="category-grid.php"><img class="blue-border"
														src="assets/images/samples/menu-bayan-forma.jpg" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">FORMALAR</span>
												</div>
												<h6 class="posts__title"><a href="#">KADIN FORMA KOLEKSİYONU</a></h6>
												<time datetime="2016-08-21" class="posts__date dark-blue">BASKETBOL -
													FUTBOL - VOLEYBOL</time>
											</div>
										</li>
									</ul>
								</div>
							</div>
						 </li>
						<?php } } } ?>
<hr class="d-md-none d-block new1">

						
						<li class=""><a href="#"><span>SPOR BRANŞLARI</span></a>
							<div class="main-nav__megamenu clearfix">

								<?php
								$sorgubrans = $connect->query("SELECT * FROM sporbranch WHERE isDeleted = false limit 12", PDO::FETCH_ASSOC);
		            			if($sorgubrans->rowCount()){
		            			$sayac=0;
		          				foreach ($sorgubrans as $kayitbrans) {
		          				$sayac++;
		          				if($sayac%3==1){
		          				 ?>

								<div class="col-lg-3 col-md-3 col-12">
									<ul class="posts posts--simple-list">

									<?php } ?>
<hr class="d-md-none d-block new1">

										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="#"><img style="height: 80px" class="blue-border"
														src="<?php echo $kayitbrans['sporBranchImage'] ?>" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label"><?php 	echo $kayitbrans['sporBranchName'] ?></span>
												</div>
												<time datetime="2016-08-21" class="posts__date dark-blue"><?php echo $kayitbrans['sporBranchDescription'] ?></time>
											</div>
										</li>

										<?php if($sayac%3==0){ ?>

									</ul>
								</div>

								<?php } ?>

								<?php } } ?>

							</div>
						</li>
<hr class="d-md-none d-block new1">

						<li class=""><a href="#"><span>MARKALAR</span></a>
							<div class="main-nav__megamenu clearfix">

								<?php
								$sorgumarka = $connect->query("SELECT * FROM brands WHERE isDeleted = false limit 12", PDO::FETCH_ASSOC);
		            			if($sorgumarka->rowCount()){
		            			$sayac=0;
		          				foreach ($sorgumarka as $kayitmarka) {
		          				$sayac++;
		          				if($sayac%2==1){
		          				 ?>

								<div class="col-lg-2 col-md-3 col-12">
									<ul class="posts posts--simple-list">

									<?php } ?>
<hr class="d-md-none d-block new1">

										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="#"><img style="height: 80px" class="blue-border"
														src="<?php echo $kayitmarka['brandsPhoto'] ?>" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label"><?php 	echo $kayitmarka['brandsName'] ?></span>
												</div>
												<time datetime="2016-08-21" class="posts__date dark-blue"><?php echo $kayitmarka['brandsDescription'] ?></time>
											</div>
										</li>

										<?php if($sayac%2==0){ ?>

									</ul>
								</div>

								<?php } ?>

								<?php } } ?>

							</div>
						</li>
					</ul>
					
					
					<a href="#" class="pushy-panel__toggle sf-open">
						<i class="search-btn h-62"></i>
					</a>

					<ul  class="info-block info-block--header  ">
						<li class="info-block__item info-block__item--shopping-cart js-info-block__item--onhover h-62  ">
							<a  title="Sepetim" onclick="setTimeout(bekle, 4000)" class="pushy-panel__toggleee nuewinn bag-btn try-button example--3  "></a>
									<ul id="header-cart" class="header-cart">
									<div id="savechildren" style="max-width:600px;" name="savechildren">
<?php echo $dynamic_list1 ; ?>
<?php echo $dynamic_list3 ; ?>

</div>
<?php echo $dynamic_list2 ; ?>


							</ul>

							
						</li>
					</ul>
					<a href="#" class="pushy-panel__toggle">
						<i class="gift-btn h-62"></i>
					</a>
					<a href="http://test.nuewin.com/4mynot4give/b2blogin.php" class="pushy-panel__togglee b2b-nuewin">
						<i  class="b2b-btn h-62"></i>
					</a>

				</nav>
				<!-- HEADER MEGAMENU : STOP -->
			</div>
		</div>
	</div>
	<!-- HEADER BOTTOM : STOP -->
</header>
<?php 
include 'config.php';
session_start();
$userkontrol = '';
if($_SESSION["UserID"] != null){
	$userkontrol = $_SESSION["UserID"];
}
?>

<!-- NUEWIN HEADER MOBILE : STOP 
<script>

$(document).ready(function() {

        $("#cartin").load("veriler.php");

});

setInterval(function() {$("#cartin").load('cartin.php');}, 1000);
</script>-->
<script>
	window.onscroll = function () { nuewinFunction() };

	var header = document.getElementById("nuewinHeader");
	var nuewinSticky = header.offsetTop;


	function nuewinFunction() {
		if (window.pageYOffset > nuewinSticky) {
			header.classList.add("nuewinSticky");
		} else {
			header.classList.remove("nuewinSticky");
		}
	}
</script>

<script>
	function aramafunc() {
        	var kelime=
        	document.getElementById("arama1").value;
        	window.open("search-list.php?arama="+kelime+"","_self")


	}
	$(function() {
    $("#arama1").keypress(function (e) {
        if(e.which == 13) {
        	var kelime='%'+
        	document.getElementById("arama1").value+'%';
        	window.open("search-list.php?arama="+kelime+"","_self")
        }
    });
});
</script>
<?
include 'config.php';
session_start();
$userkontrol = '';
$userkontrol = $_SESSION["UserID"];


 ?>
<link href="assets/css/overhang.min.css" rel="stylesheet">



    		   		       <script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>

		   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

		   

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
	  $(".example--3").click(function () {
		    if (deger1 > 0){ 

	window.location.href ='shopping-cart.php';
 }
 
else{
	$("body").overhang({
      type: "info",
      message: "⏲️ Üye girişiniz olmadığı için alışveriş sepetini görüntüleyemiyorsunuz.Giriş sayfasına yönlendiriliyorsunuz... ",
      duration: 5,
      upper: true
    });
setTimeout(function(){location.href="shopping-cart.php"} , 4000);   
	
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