<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js">
$(document).ready(function() {
  function deneme(){
	//$("#accordion").accordion({ header: "h3", collapsible: true, active: false });
	

	};

  deneme();
});

	
</script>
<?php
$katid = '';
$katid = $_GET["kategori_id"];
session_start();
 ?>
<? 
 function load_secenek1(){
	 include "config.php";
$id = $_GET["id"];
$oid = $_GET["oid"];
$ooid = $_GET["ooid"];

$res = $connect->prepare("SELECT DISTINCT ov.optionsID,o.optionsID,optionValuesShortening,p.optionID,p.optionsID
FROM products as p INNER JOIN stock as s ON p.ProductID=s.urunID
INNER JOIN stockoptions as so ON s.stockID=so.stockID 
INNER JOIN productsoptions as po ON po.id=so.productOptionsID 
INNER JOIN optionvalues as ov ON ov.optionValuesID=po.optionsValuesID 
INNER JOIN options as o ON o.optionsID=ov.optionsID 
where urunID=$id && ov.optionsID=$oid ");
$res->execute([$_GET["cat"]]);
$userid = $_SESSION["UserID"];


$output='';


while($row = $res->fetch()){
	
    $output .= '<option value="'.$row["optionValuesShortening"].'">'.$row["optionValuesShortening"].'</option>';
}
echo $output;


}
 
 ?>
 <?php
					
session_start();
$userID = $_SESSION["UserID"];
include "config.php";
$dynamic_list = "";
$kargo_price=0;
	$res = $connect->prepare("SELECT * FROM products where ProductMainCategoryID=$katid");
	$res->execute([$_GET["cat"]]);
	
		$productCount = $res->rowCount();
		if ($productCount > 0) {
			while ($row = $res->fetch()){
			$product_id = $row['ProductID'];
			$isim = $row['ProductName'];
			$fiyat = $row['ProductPrice'];
			$resim = $row['ProductImage'];
			$resim1 = $row['alt_image1'];
			$resim2 = $row['alt_image2'];
			$resim3 = $row['alt_image3'];
			$aciklama = $row['ProductDesc'];


	$dynamic_list .= '			
	
						
								
			<div class="modal fade" id="modal-login-register-tabs-sepet'.$product_id.'" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-lg modal--login" role="document">
						<div class="modal-content">
							
							<div class="modal-body">
				
							<div class="modal-account-holder">

				<div style="max-height: 660px;" class="products products--list products--list-lg">
		
					<div style="max-height: 545px;" class="product__item card">
		
						<div class="product__img">
							<div class="product__img-holder">
		
								<!-- Product Slider - Soccer -->
								<div class="product__slider-soccer-wrapper">
									<!-- Product Thumbs -->
									<div class="product__slider-thumbs slick-initialized slick-slider slick-vertical">
										<div aria-live="polite" class="slick-list draggable" style="height: 277.05px;"><div class="slick-track" style="opacity: 1; height: 278px; transform: translate3d(0px, 0px, 0px);" role="listbox"><div class="product__slide-thumb slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 62px;" tabindex="-1" role="option" aria-describedby="slick-slide10">
											<div class="product__slide-thumb-holder">
												<img src="'.$resim1.'" alt="">
											</div>
										</div><div class="product__slide-thumb slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 62px;" tabindex="-1" role="option" aria-describedby="slick-slide11">
											<div class="product__slide-thumb-holder">
												<img src="'.$resim2.'" alt="">
											</div>
										</div><div class="product__slide-thumb slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 62px;" tabindex="-1" role="option" aria-describedby="slick-slide12">
											<div class="product__slide-thumb-holder">
												<img src="'.$resim3.'" alt="">
											</div>
										</div></div></div>
										
										
									</div>
									<!-- Product Thumbs / End -->
		
									<!-- Product Slider -->
									
									<div class="product__slider-soccer slick-initialized slick-slider">
										<div aria-live="polite" class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 1250px; transform: translate3d(-250px, 0px, 0px);" role="listbox"><div class="product__slide slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 250px;" tabindex="-1">
												<img class="drift-demo-trigger2" data-zoom="assets/images/product/1-1.PNG" src="assets/images/product/1-1.PNG" alt="">
										</div><div class="product__slide slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 250px;" tabindex="-1" role="option" aria-describedby="slick-slide00">
												<img id="largeImage" class="drift-demo-trigger " data-zoom="'.$resim3.'" src="'.$resim3.'" alt="">
										</div><div class="product__slide slick-slide" data-slick-index="1" aria-hidden="true" style="width: 250px;" tabindex="-1" role="option" aria-describedby="slick-slide01">
												<img class="drift-demo-trigger1" data-zoom="assets/images/product/1-1.PNG" src="assets/images/product/1-1.PNG" alt="">
										</div><div class="product__slide slick-slide" data-slick-index="2" aria-hidden="true" style="width: 250px;" tabindex="-1" role="option" aria-describedby="slick-slide02">
												<img class="drift-demo-trigger2" data-zoom="assets/images/product/1-1.PNG" src="assets/images/product/1-1.PNG" alt="">
										</div><div class="product__slide slick-slide slick-cloned" data-slick-index="3" aria-hidden="true" style="width: 250px;" tabindex="-1">
												<img id="" class="drift-demo-trigger " data-zoom="assets/images/product/1-1.PNG" src="assets/images/product/1-1.PNG" alt="">
										</div></div></div>
		
										
		
										
									</div>
									<!-- Product Slider / End -->
								</div>
								<!-- Product Slider - Soccer / End -->
		
								
		
							</div>
						</div>
		
						<div style="margin-left: -100px; padding: 62px 0px !important;" class="product__content card__content ">
		<div class="detail">
							<header class="product__header">
								<div class="product__header-inner">
									<h2 style="font-size: 19px;" class="product__title">'.$isim.'</h2>
									<div class="product__ratings">
										<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
										<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
										<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
										<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
										<svg class="svg-inline--fa fa-star fa-w-18 empty" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star empty"></i> -->
									</div>
								</div>
								
							</header>
							<span style="margin-bottom:10px;" class="product__price">'.$fiyat.' ₺</span>
							<span style="text-decoration: line-through; color:#dc3545;margin-left: 10px;" class="product__price">'.$fiyat.' ₺</span>
		
							<div class="product__excerpt product__excerpt--sm">
								<h6>Açıklama</h6>
    Ürün Açıklaması: Bu alanda ürüne ait açıklamalar, ürün özellikleri ve genel kullanım alanları hakkında kısa bilgiler yazılabilir..
							</div>
		
							
			<form id="form1" name="form1" method="post" class="product__params d-block d-md-flex">
				<div class="input-group mb-3 w-md-50 w-100 mr-2">
					<select name="boyut" id="boyut" class="form-control text-dark" required>
								<option class="text-dark" value="">Boyut Seçiniz.</option>
								            load_secenek1();
					</select>
				</div>
			</form>
		</div>
		<div class="d-flex product__param-item product__param-item--color product__param-item--color-lg mt-5 mt-md-0">
			<form action="#" class="form-product-color d-flex justify-content-center">
										<div name="resimler" id="resimler" class="variant-container d-flex">
					'.$dynamic_list3.'     
</div>
									</form>
		</div>


<script>
    function showNotify(){
        Metro.notify.create("This is a notify", "Title", {});
    }
</script>
								<footer class="product__footer">

									<input onclick="kaydet()" type="button" class="btn btn-primary-inverse btn-icon product__add-to-cart" id="'.$product_id.'" value="Sepete Ekle">
																	</footer>
						</div>
					</div>
						
				</div>
									
								</div>
							</div>
						</div>
					</div>
		</div>
										
	';
	
	
	
    }
	
	
	
	
}




?><script>//gonder olan kısıma bizim kayıt butonumuzun id'si yazılacak
							function kaydet() {
								
							$.ajax({ // Ajax işlemini başlatıyoruz.
							type:'POST', // Veri gönderme metodunu Post olarak seçiyoruz.
							url:"shopping-cart-add.php?a=&b=1" // Verilerin postlanağı adresi belirliyoruz.
							});}
							
						</script>
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
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">

	<!-- Google Web Fonts
	================================================== -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CSource+Sans+Pro:400,700" rel="stylesheet">

	<!-- CSS
	================================================== -->
	<!-- Vendor CSS -->
	<link href="assets/css/fontawesome.min.css" rel="stylesheet">
	<link href="assets/css/all.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	<link href="assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
	<link href="assets/vendor/slick/slick.css" rel="stylesheet">
	<link href="assets/css/red2.css" rel="stylesheet">
	<link href="assets/css/theme.css" rel="stylesheet">
	<link rel="stylesheet" media="screen, projection" href="../4mynot4give/assets/css/drift-basic.css">
	<script src="assets/js/fontawesome.min.js" rel="stylesheet"></script>
	<script src="assets/js/all.min.js" rel="stylesheet"></script>
	
	<!-- Template CSS-->
	<link href="assets/css/style-soccer.css" rel="stylesheet">
	<link href="assets/css/desktop.css" rel="stylesheet">
	<link href="assets/css/red2.css" rel="stylesheet">
	<link href="assets/css/theme.css" rel="stylesheet">
	<link href="assets/css/filtre.css" rel="stylesheet">
	<link href="assets/css/filtre2.css" rel="stylesheet">
	<!-- Custom CSS-->
	<link href="assets/css/custom.css" rel="stylesheet">
	<script src="assets/js/all.min.js" rel="stylesheet"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body class="nuewin">

	<div class="site-wrapper clearfix">

		<?php include"header.php"?>

		
		
		<!-- Content
		================================================== -->
		<div class="site-content">
			<div class="container">
		
				<div class="row">
		
					<!-- Products -->
					<div class="col-md-9 order-md-2">
		
						<!-- Shop Grid -->
						<div class="card card--clean">
							<header class="card__header card__header--shop-filter">
		
								<div class="shop-filter">
									<h5 class="shop-filter__result">9 SAYFA / 105 ÜRÜN</h5>
									<ul class="shop-filter__params">
										<li class="shop-filter__control">
											<select class="form-control input-xs">
												<option>AKILLI SIRALAMA</option>
												<option>ÜRÜN ADI (A-Z)</option>
												<option>ÜRÜN ADI (Z-A)</option>
												<option>ARTAN FİYAT</option>
												<option>AZALAN FİYAT</option>
												<option>YÜKSEK OYLAMA</option>
												<option>DÜŞÜK OYLAMA</option>
												<option>AKILLI SIRALAMA</option>
												<option>AZALAN FİYAT</option>
												<option>ARTAN FİYAT</option>
											</select>
										</li>
									</ul>
									<div class="shop-filter__layout">
										<a href="category-grid.php?kategori_id=<? echo $katid; ?>" class="shop-filter__grid-layout icon-grid-layout ">
											<span class="icon-grid-layout__inner">
												<span class="icon-grid-layout__item"></span>
												<span class="icon-grid-layout__item"></span>
												<span class="icon-grid-layout__item"></span>
											</span>
										</a>
										<a href="category-list.php?kategori_id=<? echo $katid; ?>" class="shop-filter__list-layout icon-list-layout ">
											<span class="icon-list-layout__inner">
												<span class="icon-list-layout__item"></span>
												<span class="icon-list-layout__item"></span>
												<span class="icon-list-layout__item"></span>
											</span>
										</a>
									</div>
								</div>
		
							</header>
							<div class="card__content">
		
								<!-- Products -->
								<ul class="products products--list products--list-condensed">
		
									<!-- Product #0 -->
												<?php 
		include 'config.php';
		$res = $connect->prepare("SELECT * FROM products where ProductMainCategoryID=$katid LIMIT 10");
		$res->execute([$_GET["cat"]]);
		$productCount = $res->rowCount();
		if ($productCount > 0) {
			while ($row = $res->fetch()){
			$product_id = $row['ProductID'];
			$isim = $row['ProductName'];
			$fiyat = $row['ProductPrice'];
			$resim = $row['ProductImage'];
			$aciklama = $row['ProductDesc'];
			echo'
			
			
			

									<li class="product__item card">
		
		
										<div class="product__img">
											<div class="product__img-holder mb-3 mt-3">
												<img src="'.$resim.'" alt="">
											</div>
										</div>
		
										<div class="product__content card__content">
		
											<header class="product__header">
												<div class="product__header-inner">
													<span class="product__category">NIKE</span>
													<h2 class="product__title"><a href="#">'.$isim.'</a></h2>
													<div class="product__ratings">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star empty"></i>
													</div>
												</div>
												
											</header>
											<span style="margin-bottom:10px;" class="product__price">'.$fiyat.' ₺</span>
											<span style="text-decoration: line-through; color:#dc3545;margin-left: 10px;" class="product__price">'.$fiyat.' ₺</span>
											<div class="product__excerpt">
												'.$aciklama.'
											</div>
		
											<footer class="product__footer">
												<a style="color:#fff;" name="product'.$product_id.'"  id="product'.$product_id.'" data-toggle="modal" data-target="#modal-login-register-tabs-sepet'.$product_id.'" class="btn btn-primary-inverse btn-icon product__add-to-cart"><i class="icon-bag"></i> SEPETE EKLE</a>
												<a href="#" class="btn btn-default btn-single-icon product__wish"><i class="icon-heart"></i></a>
												<!--<a href="#" class="btn btn-default btn-single-icon product__view"><i class="icon-eye"></i></a>-->
											</footer>
										</div>
									</li>
									
										<script>
										
											   function productaktar(deger){
												 
												   denemeitem = document.getElementById("product").getAttribute("name");
												   //alert(document.getElementById("product").getAttribute("name"));
												   document.getElementById("kuponkodalani").value = deger;
											   }
										</script>
									';
									
												
		}}
	
	?> 


	<script>
    $('#product').on('click', function(e){
      e.preventDefault();
      $('#modal-login-register-tabs-sepet').modal('show').find('.modal-content').load($(this).attr('href='+product_id));
    });
  </script>
	<p><?php echo $dynamic_list; ?> </p>
<script>//gonder olan kısıma bizim kayıt butonumuzun id'si yazılacak

							function urungonder(){
								document.getElementById("kuponkodalani").value = deger;
							}
							function kaydet(product_id){
							$.ajax({ // Ajax işlemini başlatıyoruz.
							type:'POST', // Veri gönderme metodunu Post olarak seçiyoruz.
							url:"fast-shopping-cart-add.php?a=<?echo $_SESSION["UserID"];?> &b="+product_id // Verilerin postlanağı adresi belirliyoruz.
							});}
							
						
							 
							 
						</script>
		
								</ul>
								<!-- Products / End -->
							</div>
						</div>
						<!-- Shop Grid / End -->

						<!-- Shop Pagination -->
						<nav class="shop-pagination" aria-label="Shop navigation">
							<ul class="pagination pagination--condensed pagination--lg justify-content-end">
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><span class="page-link">...</span></li>
								<li class="page-item"><a class="page-link" href="#">16</a></li>
							</ul>
						</nav>
						<!-- Shop Pagination / End -->
		
					</div>
					<!-- Products / End -->
		
					<!-- Sidebar -->
					<div class="sidebar sidebar--shop col-md-3 order-md-1">
		
						<!-- Widget: Categories -->
						<aside class="widget card widget--sidebar widget_categories">
							<div class="widget__title card__header">
								<h4>KATEGORİLER</h4>
							</div>
							<div class="widget__content card__content">
								<ul class="widget__list">
									<li><a href="#">TÜM ÜRÜNLER</a></li>

									<?php 
									$sorgu = $connect->query("SELECT * FROM categories WHERE highCategoriesID = 0 AND isDeleted = false order by categoriesRow ASC", PDO::FETCH_ASSOC);
			            			if($sorgu->rowCount()){
			          				foreach ($sorgu as $kayit) {
			          				 $idalt = $kayit['categoriesID'];
			          				 $sorgualt = $connect->query("SELECT * FROM categories where highCategoriesID = $idalt AND isDeleted = false", PDO::FETCH_ASSOC);
			          				 $kontrol = $sorgualt->rowCount();
          							 if($kontrol == 0){
			          				 ?>
			          				 <li><a class="accordion" id="accordion" ><?php echo $kayit['categoriesName'] ?></a></li>
			          				<?php } else { ?>
			          				 <li><a class="accordion" id="accordion"><?php echo $kayit['categoriesName'] ?></a>
			          				 	<div id="<?php echo $kayit['categoriesName'] ?>">
			          				 		<?php $categoriesName[]=$kayit['categoriesName']; ?>
			          				 	<ul>
			          				 <?php 
			          				 
			          				 if($sorgualt->rowCount()){
			          				foreach ($sorgualt as $kayitalt) {
			          				 ?>
									<li><a href="#"><?php echo $kayitalt['categoriesName'] ?></a></li>
									
									<?php } } ?></ul> </div>
									</li>

			          				 <?php 
									 }} } ?>



									<!-- <li><a href="#">KADIN</a></li>
									<a class="accordion"><li class="has-children">AYAKKABILAR</a>
										<ul>
											<li><a href="#">GÜNLÜK</a></li>
											<li><a href="#">YÜRÜYÜŞ</a></li>
											<li><a href="#">KOŞU</a></li>
										</ul>
									</li>
									<li><a href="#">ERKEK</a></li>
									<li><a href="#">ÇOCUK</a></li> -->
								</ul>
							</div>
						</aside>
						<!-- Widget: Categories / End -->
		
						<!-- Widget: Color Filter -->
						<!--<aside class="widget card widget--sidebar widget_color-picker">
							<form action="#" class="color-picker-form">
								<div class="widget__title card__header card__header--has-btn">
									<h4>RENK FİLTRESİ</h4>
									<button class="btn btn-default btn-outline btn-xs card-header__button">UYGULA</button>
								</div>
								<div class="widget__content card__content">
						
									<ul class="filter-color">
										<li class="filter-color__item">
											<label class="checkbox">
												<input type="checkbox" id="product_color_1" value="1" class="color-violet">
												<span class="checkbox-indicator"></span>
											</label>
										</li>
										<li class="filter-color__item">
											<label class="checkbox">
												<input type="checkbox" id="product_color_2" value="2" class="color-blue" checked>
												<span class="checkbox-indicator"></span>
											</label>
										</li>
										<li class="filter-color__item">
											<label class="checkbox">
												<input type="checkbox" id="product_color_3" value="3" class="color-light-blue">
												<span class="checkbox-indicator"></span>
											</label>
										</li>
										<li class="filter-color__item">
											<label class="checkbox">
												<input type="checkbox" id="product_color_4" value="4" class="color-cyan">
												<span class="checkbox-indicator"></span>
											</label>
										</li>
										<li class="filter-color__item">
											<label class="checkbox">
												<input type="checkbox" id="product_color_5" value="5" class="color-aqua">
												<span class="checkbox-indicator"></span>
											</label>
										</li>
										<li class="filter-color__item">
											<label class="checkbox">
												<input type="checkbox" id="product_color_6" value="6" class="color-green">
												<span class="checkbox-indicator"></span>
											</label>
										</li>
										<li class="filter-color__item">
											<label class="checkbox">
												<input type="checkbox" id="product_color_7" value="7" class="color-yellow">
												<span class="checkbox-indicator"></span>
											</label>
										</li>
										<li class="filter-color__item">
											<label class="checkbox">
												<input type="checkbox" id="product_color_8" value="8" class="color-orange">
												<span class="checkbox-indicator"></span>
											</label>
										</li>
										<li class="filter-color__item">
											<label class="checkbox">
												<input type="checkbox" id="product_color_9" value="9" class="color-red" checked>
												<span class="checkbox-indicator"></span>
											</label>
										</li>
										<li class="filter-color__item">
											<label class="checkbox">
												<input type="checkbox" id="product_color_10" value="10" class="color-black" checked>
												<span class="checkbox-indicator"></span>
											</label>
										</li>
										<li class="filter-color__item">
											<label class="checkbox">
												<input type="checkbox" id="product_color_11" value="11" class="color-white">
												<span class="checkbox-indicator"></span>
											</label>
										</li>
									</ul>
								</div>
							</form>
						</aside>-->
						<!-- Widget: Color Filter / End -->
		
						<!-- Widget: Filter Size - Boxed -->
						<!--<aside class="widget card widget--sidebar widget_filter-size">
							<form action="#" class="filter-size-form">
								<div class="widget__title card__header card__header--has-btn">
									<h4>BEDEN</h4>
									<button class="btn btn-default btn-outline btn-xs card-header__button">UYGULA</button>
								</div>
								<div class="widget__content card__content">
									<div class="checkbox-table">
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-35" value="35">
											<span class="checkbox-indicator">35</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-35-5" value="35.5">
											<span class="checkbox-indicator">35.5</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-36" value="36">
											<span class="checkbox-indicator">36</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-36-5" value="36.5">
											<span class="checkbox-indicator">36.5</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-37" value="37">
											<span class="checkbox-indicator">37</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-37-5" value="37-5">
											<span class="checkbox-indicator">37.5</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-38" value="38">
											<span class="checkbox-indicator">38</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-38-5" value="38-5" checked>
											<span class="checkbox-indicator">38.5</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-39" value="39">
											<span class="checkbox-indicator">39</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-39-5" value="39-5">
											<span class="checkbox-indicator">39.5</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-40" value="40">
											<span class="checkbox-indicator">40</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-40-5" value="40-5" checked>
											<span class="checkbox-indicator">40.5</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-41" value="41">
											<span class="checkbox-indicator">41</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-41-5" value="41-5">
											<span class="checkbox-indicator">41.5</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-42" value="42">
											<span class="checkbox-indicator">42</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-42-5" value="42-5">
											<span class="checkbox-indicator">42.5</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-43" value="43">
											<span class="checkbox-indicator">43</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-43-5" value="43-5">
											<span class="checkbox-indicator">43.5</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-44" value="44">
											<span class="checkbox-indicator">44</span>
										</label>
										<label class="checkbox checkbox--cell">
											<input type="checkbox" id="size-44-5" value="44-5">
											<span class="checkbox-indicator">44.5</span>
										</label>
									</div>
								</div>
							</form>
						</aside>-->
						<!-- Widget: Filter Size - Boxed / End -->
		
						<!-- Widget: Filter Price -->
						<aside class="widget card widget--sidebar widget-filter-price">
							<form action="#" class="filter-price-form">
								<div class="widget__title card__header card__header--has-btn">
									<h4>FİYAT FİLTRESİ</h4>
									<button class="btn btn-default btn-outline btn-xs card-header__button">UYGULA</button>
								</div>
								<div class="widget__content card__content">
						
									<div class="list-group">
										<h3>Fiyat</h3>
										<input type="hidden" id="hidden_minimum_price" value="0" />
										<input type="hidden" id="hidden_maximum_price" value="1000" />
										<p id="price_show">1 - 1000</p>
										<div id="price_range"></div>
									</div>	
						
								</div>
							</form>
						</aside>
						<!-- Widget: Filter Price / End -->
		
						<!-- Widget: Hot Products -->
						<aside class="widget card widget--sidebar widget-products">
							<div class="widget__title card__header">
								<h4>Son Eklenen Ürünler</h4>
							</div>
							<div class="widget__content card__content">
								<ul class="products-list">
						<?php 
						include "config.php";
$dynamic_list7 = "";
$id = $_GET["id"];
    $res = $connect->prepare("SELECT * FROM products order by ProductID DESC limit 4");
    $res->execute([$_GET["cat"]]);
$userid = $_SESSION["UserID"];

    while ($row = $res->fetch()) {
        $product_id = $row['ProductID'];
        $product_name = $row['ProductName'];
        $product_brand = $row['brand'];
        $product_price = $row['ProductPrice'];
		$product_img = $row['ProductImage'];
        $product_cat = $row['ProductAltCategoryID'];
        $product_subcat = $row['ProductMainCategoryID'];
		$product_cat_name = $row['ProductAltCategoryName'];
        $product_subcat_name = $row['ProductMainCategoryName'];
        $product_details = $row['ProductDesc'];
        $check = $product_details;
		
		echo '
		<li class="products-list__item">
										<figure class="products-list__product-thumb">
											<a href="product.php?&id='.$product_id.'">
												<img width="70" src="'.$product_img.'" alt="">
											</a>
										</figure>
										<div class="products-list__inner">
											<span class="products-list__product-cat">DAFRON</span>
											<h5 class="products-list__product-name"><a href="product.php?&id='.$product_id.'">'.$product_name.'</a></h5>
											<div class="products-list__product-ratings">
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18 empty" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star empty"></i> -->
											</div>
											<div class="products-list__product-sum">
												<span class="products-list__product-price">'.$product_price.' ₺</span>
											</div>
										</div>
									</li>
									';
	}
						
						?>
									
									
						
								</ul>
							</div>
						</aside>
						<!-- Widget: Hot Products / End -->
		
					</div>
					<!-- Sidebar / End -->
		
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
	<script src="assets/js/Drift.js"></script>
	
	<!-- Vendor JS -->
	<script src="assets/vendor/twitter/jquery.twitter.js"></script>
	
	<!-- Template JS -->
	<script src="assets/js/init.js"></script>
	<script src="assets/js/custom.js"></script>

	<!-- Vendor JS -->
	<script src="assets/vendor/twitter/jquery.twitter.js"></script>
	
</body>
</html>
<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data_list';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var ProductName = get_filter('ProductName');
        var ProductCode = get_filter('ProductCode');

        $.ajax({
            url:"fetch_data_list.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ProductName:ProductName, ProductCode:ProductCode},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1,
        max:1000,
        values:[1, 1000],
        step:1,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>
<script>
    $(document).ready(function () {
        $('#boyut').change(function () {
            var boyut_adi = $(this).val();
			var id = <?echo $id;  ?>;
            $.ajax({
                url: "./fetch_boyut.php",
                method: "POST",
                data: { boyutAdi: boyut_adi, p_id : id},
                dataType: "text",
                success: function (data) {
                    $('#yakatipi').html(data);
					
					    $.ajax({
                url: "./fetch_boyut1.php",
                method: "POST",
                data: { boyutAdi: boyut_adi, p_id : id},
                dataType: "text",
                success: function (data) {
                    $('#resimler').html(data);

                }




            });
					$('#yakatipi').change(function () {
            var yaka_adi = $(this).val();
						var id = <?echo $id;  ?>;

            $.ajax({
                url: "./fetch_yaka.php",
                method: "POST",
                data: { boyutAdi: boyut_adi,  yakaAdi :yaka_adi,p_id : id },
                dataType: "text",
                success: function (data) {
                    $('#koltipi').html(data);
					$.ajax({
                url: "./fetch_boyut2.php",
                method: "POST",
                data: { boyutAdi: boyut_adi,  yakaAdi :yaka_adi,p_id : id},
                dataType: "text",
                success: function (data) {
                    $('#resimler').html(data);

                }




            });
 $('#koltipi').change(function () {
            var renk_adi = $(this).val();
						var id = <?echo $id;  ?>;

            $.ajax({
                url: "./fetch_renk.php",
                method: "POST",
                data: { boyutAdi: boyut_adi,  yakaAdi :yaka_adi,p_id : id, renkAdi:renk_adi },
                dataType: "text",
                success: function (data) {
                    $('#resimler').html(data);
 
                }




            });
			$.ajax({
                url: "./fetch_boyut3.php",
                method: "POST",
                data: { boyutAdi: boyut_adi,  yakaAdi :yaka_adi,p_id : id, renkAdi:renk_adi},
                dataType: "text",
                success: function (data) {
                    $('#resimler').html(data);

                }




            });


        });
                }




            });


        });
                }




            });


        });
    });

</script>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>
<script>
	$('#thumbs img').click(function(){
    $('#largeImage').attr('src',$(this).attr('src').replace('thumb','large'));
    $('#description').html($(this).attr('alt'));
});
	
</script>

<?php 
echo '<script type="text/javascript">',
     '$(document).ready(function() {
  function functionName() {'; ?>
  	var categoriesName = [<?php echo '"'.implode('","', $categoriesName).'"' ?>];
<?php echo 'for(var i=0;i<categoriesName.length;i++){
  		$( "#"+categoriesName[i] ).hide();
  	}

  }

  functionName();
});',
     '</script>'
;
?>

