<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js">
$(document).ready(function() {
  function deneme(){
	//$("#accordion").accordion({ header: "h3", collapsible: true, active: false });
	

	};

  deneme();
});

	
</script>
<?php
include "config.php";



$dynamic_list = "";
if(isset($_GET["cat"])){
    $res = $connect->prepare("SELECT * FROM products WHERE category=? LIMIT 10");
    $res->execute([$_GET["cat"]]);
}
else{
    $res = $connect->prepare("SELECT * FROM products LIMIT 10");
    $res->execute();
}



$productCount = $res->rowCount();
if ($productCount > 0) {
    while ($row = $res->fetch()) {
        $product_id = $row['ProductID'];
        $product_name = $row['ProductName'];
        $product_price = $row['ProductPrice'];
		$product_img = $row['ProductImage'];
		$alt_img1 = $row['alt_image1'];
		$alt_img2 = $row['alt_image2'];
		$alt_img3 = $row['alt_image3'];
		$alt_img4 = $row['alt_image4'];
        $product_cat = $row['ProductAltCategoryID'];
        $product_subcat = $row['ProductMainCategoryID'];
		$product_cat_name = $row['ProductAltCategoryName'];
        $product_subcat_name = $row['ProductMainCategoryName'];
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
        $dynamic_list .= '			
		
		<li class="item ">
										<div class="item-wrap">
											<a href="#" title="Spor ayakkabı" class="product-image">
											<img id="product-collection-image-107"  class="additional_img" src="'.$product_img.'"  width="217" height="217" alt="Spor ayakkabı" />					<img class="regular_img" id="product-original-image-107" src="../4mynot4give/assets/images/product/product-demo-1.jpg"  width="217" height="217" alt="Spor ayakkabı" />				</a>
											<div class="product-hover">
												<h2 class="product-name"><a href="product.php?s=&id='.$product_id.'" title="'.$product_name.'">'.$product_name.'</a></h2><br/>
												<div class="price-box">
													<span class="regular-price" id="product-price-107">
														<span class="price">₺'.$product_price.'</span>     
														<span class="price" style="text-decoration:line-through;">₺'.$product_price.'</span>                                 
													</span>
													
												</div>
												<ul class="configurable-swatch-list configurable-swatch-sneakers_color clearfix">
													<li class="option-yellow-purple" data-product-id="107" data-option-label="yellow-purple">
														<a href="javascript:void(0)" name="yellow-purple" class="swatch-link swatch-link-134 has-image" title="yellow-purple" style="height: 32px; width: 32px;">
															<span class="swatch-label" style="height: 30px; width: 30px; line-height: 30px;">
																<img src="'.$alt_img1.'" alt="yellow-purple" width="30" height="30" />
															</span>
														</a>
													</li>
												
													<li class="option-purple-blue" data-product-id="107" data-option-label="purple-blue">
														<a href="javascript:void(0)" name="purple-blue" class="swatch-link swatch-link-134 has-image" title="purple-blue" style="height: 32px; width: 32px;">
															<span class="swatch-label" style="height: 30px; width: 30px; line-height: 30px;">
																<img src="'.$alt_img2.'" alt="purple-blue" width="30" height="30" />
															</span>
														</a>
													</li>
													<li class="option-green-yellow" data-product-id="107" data-option-label="green-yellow">
														<a href="javascript:void(0)" name="green-yellow" class="swatch-link swatch-link-134 has-image" title="green-yellow" style="height: 32px; width: 32px;">
															<span class="swatch-label" style="height: 30px; width: 30px; line-height: 30px;">
																<img src="'.$alt_img3.'" alt="green-yellow" width="30" height="30" />
															</span>
														</a>
													</li>
													<li class="option-blue-green" data-product-id="107" data-option-label="blue-green">
														<a href="javascript:void(0)" name="blue-green" class="swatch-link swatch-link-134 has-image" title="blue-green" style="height: 32px; width: 32px;">
															<span class="swatch-label" style="height: 30px; width: 30px; line-height: 30px;">
																<img src="'.$alt_img4.'" alt="blue-green" width="30" height="30" />
															</span>
														</a>
													</li>
												</ul>
											</div>

											<div class="name">
												<div class="actions">
													<ul class="add-to-links">
														<li><button type="button" title="Sepete ekle" class="button btn-cart icon-white" onclick="setLocation(#)"><span><span>Sepete Ekle</span></span></button></li>
														<li><a title="Alışveriş listesine ekle" href="#" class="link-wishlist icon-white">Alışveriş listesine ekle</a></li>
														<li> <a title="Karşılaştır" href="#" class="link-compare icon-white">Karşılaştır</a></li>
													</ul>
													<div class="clear"></div>
													<button type="button" class="button quick-view" style="opacity: 0;"><span class="pr-29"><span>Hızlı Bak</span></span></button>
												</div>
											</div>								
										</div>
									</li>
		
		
	
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
	<link href="assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	<link href="assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
	<link href="assets/vendor/slick/slick.css" rel="stylesheet">
	
	<link href="../4mynot4give/assets/css/red2.css" rel="stylesheet">
	<!-- Template CSS-->
	<link href="assets/css/style-soccer.css" rel="stylesheet">
	
	<link href="../4mynot4give/assets/css/red2.css" rel="stylesheet">
			<link href="../4mynot4give/assets/css/fontawesome.min.css" rel="stylesheet">
		<link href="../4mynot4give/assets/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../4mynot4give/assets/css/styles.css" media="all" />
<link rel="stylesheet" type="text/css" href="../4mynot4give/assets/css/local.css" media="all" />
<link rel="stylesheet" type="text/css" href="../4mynot4give/assets/css/options_base_gr.css" media="all" />
<link href="../4mynot4give/assets/css/theme.css" rel="stylesheet">

	<!-- Template CSS-->

	<!-- Custom CSS-->

<script src="../4mynot4give/assets/js/fontawesome.min.js" rel="stylesheet"></script>
			<script src="../4mynot4give/assets/js/all.min.js" rel="stylesheet"></script>
<script type="text/javascript" src="../4mynot4give/assets/js/prototype.js"></script>
<script type="text/javascript" src="../4mynot4give/assets/js/jquery-1.11.0.min.js"></script>

	<script src="/4mynot4give/assets/vendor/jquery/jquery.min.js"></script>
	<script src="/4mynot4give/assets/vendor/jquery/jquery-migrate.min.js"></script>



<script type="text/javascript" src="../4mynot4give/assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../4mynot4give/assets/js/jquery.anystretch.1.2.min.js"></script>
<script type="text/javascript" src="../4mynot4give/assets/js/jquery.noconflictt.js"></script>

<script type="text/javascript" src="../4mynot4give/assets/js/script.js"></script>
<script type="text/javascript" src="../4mynot4give/assets/js/product-media.js"></script>
<script type="text/javascript" src="../4mynot4give/assets/js/swatches-list.js"></script>

<script type="text/javascript">
        var nuewinn = {"cart":{"products":[],"totals":{"total":{"type":"total","label":"Total","amount":0,"value":"$0.00"}},"subtotals":{"products":{"type":"products","label":"Subtotal","amount":0,"value":"$0.00"},"discounts":null,"shipping":{"type":"shipping","label":"Shipping","amount":0,"value":"Free"},"tax":null},"products_count":0,"summary_string":"0 items","labels":{"tax_short":"(tax incl.)","tax_long":"(tax included)"},"id_address_delivery":0,"id_address_invoice":0,"is_virtual":false,"vouchers":{"allowed":1,"added":[]},"discounts":[],"minimalPurchase":0,"minimalPurchaseRequired":""},"currency":{"name":"US Dollar","iso_code":"USD","iso_code_num":"840","sign":"$"},"customer":{"lastname":null,"firstname":null,"email":null,"last_passwd_gen":null,"birthday":null,"newsletter":null,"newsletter_date_add":null,"ip_registration_newsletter":null,"optin":null,"website":null,"company":null,"siret":null,"ape":null,"outstanding_allow_amount":0,"max_payment_days":0,"note":null,"is_guest":0,"id_shop":null,"id_shop_group":null,"id_default_group":1,"date_add":null,"date_upd":null,"reset_password_token":null,"reset_password_validity":null,"id":null,"is_logged":false,"gender":{"type":null,"name":null,"id":null},"risk":{"name":null,"color":null,"percent":null,"id":null},"addresses":[]},"language":{"name":"English (English)","iso_code":"en","locale":"en-US","language_code":"en-us","is_rtl":"0","date_format_lite":"m\/d\/Y","date_format_full":"m\/d\/Y H:i:s","id":1},"page":{"title":"","canonical":null,"meta":{"title":"Search","description":"","keywords":"","robots":"index"},"page_name":"search","body_classes":{"lang-en":true,"lang-rtl":false,"country-US":true,"currency-USD":true,"layout-full-width":true,"page-search":true,"tax-display-disabled":true},"admin_notifications":[]},"shop":{"name":"Claue","email":"claue@domain.com","registration_number":"","long":false,"lat":false,"logo":"\/claue\/img\/claue-logo-1495467822.jpg","stores_icon":"\/claue\/img\/logo_stores.png","favicon":"\/claue\/img\/favicon.ico","favicon_update_time":"1495467822","address":{"formatted":"Claue<br>184 Main Rd E, St Albans VIC 3021, Australia<br>Vietnam","address1":"184 Main Rd E, St Albans VIC 3021, Australia","address2":"","postcode":"","city":"","state":null,"country":"Vietnam"},"phone":"+01 23456789","fax":""},"urls":{"base_url":"http:\/\/demos.prestagold.com\/claue\/","current_url":"http:\/\/demos.prestagold.com\/claue\/en\/search?controller=search&s=asdas","shop_domain_url":"http:\/\/demos.prestagold.com","img_ps_url":"http:\/\/demos.prestagold.com\/claue\/img\/","img_cat_url":"http:\/\/demos.prestagold.com\/claue\/img\/c\/","img_lang_url":"http:\/\/demos.prestagold.com\/claue\/img\/l\/","img_prod_url":"http:\/\/demos.prestagold.com\/claue\/img\/p\/","img_manu_url":"http:\/\/demos.prestagold.com\/claue\/img\/m\/","img_sup_url":"http:\/\/demos.prestagold.com\/claue\/img\/su\/","img_ship_url":"http:\/\/demos.prestagold.com\/claue\/img\/s\/","img_store_url":"http:\/\/demos.prestagold.com\/claue\/img\/st\/","img_col_url":"http:\/\/demos.prestagold.com\/claue\/img\/co\/","img_url":"http:\/\/demos.prestagold.com\/claue\/themes\/tea_claue\/assets\/img\/","css_url":"http:\/\/demos.prestagold.com\/claue\/themes\/tea_claue\/assets\/css\/","js_url":"http:\/\/demos.prestagold.com\/claue\/themes\/tea_claue\/assets\/js\/","pic_url":"http:\/\/demos.prestagold.com\/claue\/upload\/","pages":{"address":"http:\/\/demos.prestagold.com\/claue\/en\/address","addresses":"http:\/\/demos.prestagold.com\/claue\/en\/addresses","authentication":"http:\/\/demos.prestagold.com\/claue\/en\/login","cart":"http:\/\/demos.prestagold.com\/claue\/en\/cart","category":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=category","cms":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=cms","contact":"http:\/\/demos.prestagold.com\/claue\/en\/contact-us","discount":"http:\/\/demos.prestagold.com\/claue\/en\/discount","guest_tracking":"http:\/\/demos.prestagold.com\/claue\/en\/guest-tracking","history":"http:\/\/demos.prestagold.com\/claue\/en\/order-history","identity":"http:\/\/demos.prestagold.com\/claue\/en\/identity","index":"http:\/\/demos.prestagold.com\/claue\/en\/","my_account":"http:\/\/demos.prestagold.com\/claue\/en\/my-account","order_confirmation":"http:\/\/demos.prestagold.com\/claue\/en\/order-confirmation","order_detail":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=order-detail","order_follow":"http:\/\/demos.prestagold.com\/claue\/en\/order-follow","order":"http:\/\/demos.prestagold.com\/claue\/en\/order","order_return":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=order-return","order_slip":"http:\/\/demos.prestagold.com\/claue\/en\/credit-slip","pagenotfound":"http:\/\/demos.prestagold.com\/claue\/en\/page-not-found","password":"http:\/\/demos.prestagold.com\/claue\/en\/password-recovery","pdf_invoice":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=pdf-invoice","pdf_order_return":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=pdf-order-return","pdf_order_slip":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=pdf-order-slip","prices_drop":"http:\/\/demos.prestagold.com\/claue\/en\/prices-drop","product":"http:\/\/demos.prestagold.com\/claue\/en\/index.php?controller=product","search":"http:\/\/demos.prestagold.com\/claue\/en\/search","sitemap":"http:\/\/demos.prestagold.com\/claue\/en\/sitemap","stores":"http:\/\/demos.prestagold.com\/claue\/en\/stores","supplier":"http:\/\/demos.prestagold.com\/claue\/en\/supplier","register":"http:\/\/demos.prestagold.com\/claue\/en\/login?create_account=1","order_login":"http:\/\/demos.prestagold.com\/claue\/en\/order?login=1"},"theme_assets":"\/claue\/themes\/tea_claue\/assets\/","actions":{"logout":"http:\/\/demos.prestagold.com\/claue\/en\/?mylogout="}},"configuration":{"display_taxes_label":false,"low_quantity_threshold":3,"is_b2b":false,"is_catalog":false,"show_prices":true,"opt_in":{"partner":true},"quantity_discount":{"type":"discount","label":"Discount"},"voucher_enabled":1,"return_enabled":0,"number_of_days_for_return":14},"field_required":[],"breadcrumb":{"links":[{"title":"Home","url":"http:\/\/demos.prestagold.com\/claue\/en\/"}],"count":1},"link":{"protocol_link":"http:\/\/","protocol_content":"http:\/\/"},"time":1552217050,"static_token":"4bbb84a853943eaf0b862c463fc3322d","token":"83105d439b0510a164a283a5aa34c4de"};
      </script>
</head>
<body class="nuewin">

	<div class="site-wrapper clearfix">

		<?php include"header.php"?>
<div class="site-content">
			<div class="container">
		
				<div class="row">
		
					<!-- Products -->
					<div class="col-md-9 order-md-2">
		
						<!-- Shop Grid -->
						<div class="card card--clean">
							<header class="card__header card__header--shop-filter">
		
								<div class="shop-filter">
																	<h5 class="shop-filter__result">11</h5>
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
										<a href="category-grid.php" class="shop-filter__grid-layout icon-grid-layout ">
											<span class="icon-grid-layout__inner">
												<span class="icon-grid-layout__item"></span>
												<span class="icon-grid-layout__item"></span>
												<span class="icon-grid-layout__item"></span>
											</span>
										</a>
										<a href="category-list.php" class="shop-filter__list-layout icon-list-layout ">
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
								<ul class="products-grid d-flex flex-wrap w-100">
									<p><?php echo $dynamic_list; ?> </p>
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
						<aside class="widget card widget--sidebar widget_color-picker">
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
												<input type="checkbox" id="product_color_2" value="2" class="color-blue" checked="">
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
												<input type="checkbox" id="product_color_9" value="9" class="color-red" checked="">
												<span class="checkbox-indicator"></span>
											</label>
										</li>
										<li class="filter-color__item">
											<label class="checkbox">
												<input type="checkbox" id="product_color_10" value="10" class="color-black" checked="">
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
						</aside>
						<!-- Widget: Color Filter / End -->
		
						<!-- Widget: Filter Size - Boxed -->
						<aside class="widget card widget--sidebar widget_filter-size">
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
											<input type="checkbox" id="size-38-5" value="38-5" checked="">
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
											<input type="checkbox" id="size-40-5" value="40-5" checked="">
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
						</aside>
						<!-- Widget: Filter Size - Boxed / End -->
		
						<!-- Widget: Filter Price -->
						<aside class="widget card widget--sidebar widget-filter-price">
							<form action="#" class="filter-price-form">
								<div class="widget__title card__header card__header--has-btn">
									<h4>FİYAT FİLTRESİ</h4>
									<button class="btn btn-default btn-outline btn-xs card-header__button">UYGULA</button>
								</div>
								<div class="widget__content card__content">
						
									<div class="slider-range-wrapper">
										<div id="slider-range" class="slider-range noUi-target noUi-ltr noUi-horizontal"><div class="noUi-base"><div class="noUi-origin" style="left: 0%;"><div class="noUi-handle" data-handle="0" style="z-index: 5;"></div></div><div class="noUi-connect" style="left: 0%; right: 22.2222%;"></div><div class="noUi-origin" style="left: 77.7778%;"><div class="noUi-handle" data-handle="1" style="z-index: 4;"></div></div></div></div>
										<div class="slider-range-label">
											FİYAT: ₺<span id="slider-range-value-min">0.00</span> - ₺<span id="slider-range-value-max">350.00</span>
										</div>
									</div>
						
								</div>
							</form>
						</aside>
						<!-- Widget: Filter Price / End -->
		
						<!-- Widget: Hot Products -->
						<aside class="widget card widget--sidebar widget-products">
							<div class="widget__title card__header">
								<h4>ÖNERİLEN ÜRÜNLER</h4>
							</div>
							<div class="widget__content card__content">
								<ul class="products-list">
						
									<li class="products-list__item">
										<figure class="products-list__product-thumb">
											<a href="#">
												<img width="70" src="assets/images/product/product-demo-1.jpg" alt="">
											</a>
										</figure>
										<div class="products-list__inner">
											<span class="products-list__product-cat">NİKE</span>
											<h5 class="products-list__product-name"><a href="#">AIR MAX</a></h5>
											<div class="products-list__product-ratings">
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18 empty" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star empty"></i> -->
											</div>
											<div class="products-list__product-sum">
												<span class="products-list__product-price">₺250.00</span>
											</div>
										</div>
									</li>
									<li class="products-list__item">
										<figure class="products-list__product-thumb">
											<a href="#">
												<img width="70" src="assets/images/product/product-demo-1.jpg" alt="">
											</a>
										</figure>
										<div class="products-list__inner">
											<span class="products-list__product-cat">NIKE</span>
											<h5 class="products-list__product-name"><a href="#">AIR MAX</a></h5>
											<div class="products-list__product-ratings">
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
											</div>
											<div class="products-list__product-sum">
												<span class="products-list__product-price">₺250.00</span>
											</div>
										</div>
									</li>
									<li class="products-list__item">
										<figure class="products-list__product-thumb">
											<a href="#">
												<img width="70" src="assets/images/product/product-demo-1.jpg" alt="">
											</a>
										</figure>
										<div class="products-list__inner">
											<span class="products-list__product-cat">NIKE</span>
											<h5 class="products-list__product-name"><a href="#">AIR MAX</a></h5>
											<div class="products-list__product-ratings">
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18 empty" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star empty"></i> -->
												<svg class="svg-inline--fa fa-star fa-w-18 empty" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star empty"></i> -->
											</div>
											<div class="products-list__product-sum">
												<span class="products-list__product-price">₺250.00</span>
											</div>
										</div>
									</li>
						
								</ul>
							</div>
						</aside>
						<!-- Widget: Hot Products / End -->
		
					</div>
					<!-- Sidebar / End -->
		
				</div>
		
			</div>
		</div>
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
	
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
	<script src="assets/js/core.js"></script>
	
	<!-- Vendor JS -->
	<script src="assets/vendor/twitter/jquery.twitter.js"></script>
	
	<!-- Template JS -->
	<script src="assets/js/init.js"></script>
	<script src="assets/js/custom.js"></script>

</body>
</html>

<script type="text/javascript">
	//<![CDATA[
	if (typeof Olegnax == "undefined") var Olegnax = {};
	if (typeof Olegnax.Ajaxcart == "undefined") {
		Olegnax.Ajaxcart = {
			translation : {},
			options : {},
			helpers : {}
		};
	}
	Olegnax.Ajaxcart.baseUrl = 'https://athlete.olegnax.com/index.php/';
	Olegnax.Ajaxcart.options.status = 1;
	Olegnax.Ajaxcart.options.quick_view = 0;
	Olegnax.Ajaxcart.options.wishlist = 1;
	Olegnax.Ajaxcart.options.compare = 1;

	Olegnax.Ajaxcart.translation.quick_view = 'Quick View';
	//]]>
</script>
<script type="text/javascript">
    $j(document).on('product-media-loaded', function(event, galleryType) {
        function swapHandler(smallImgUrl, bigImgUrl) {
            switch (galleryType) {
                case 'cloudzoom':
                    $j('#cloud_zoom').data('zoom').destroy();
                    $j('#cloud_zoom img').attr('src', smallImgUrl);
                    $j('#cloud_zoom').attr('href', bigImgUrl);
                    $j('#cloud_zoom').CloudZoom();
                    break;
                case 'fancybox':
                default:
                    $j('.product-img-box .product-image a').attr('href', bigImgUrl);
                    $j('.product-img-box .product-image img').attr('src', smallImgUrl);
            }
        }
        ConfigurableMediaImages.init('small_image', swapHandler);
                ConfigurableMediaImages.setImageFallback(18, $j.parseJSON('{"option_labels":[],"small_image":{"18":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/h\/1\/h1.jpg"},"base_image":[]}'));
                ConfigurableMediaImages.setImageFallback(107, $j.parseJSON('{"option_labels":{"yellow-purple":{"configurable_product":{"small_image":null,"base_image":null},"products":["104"]},"purple-blue":{"configurable_product":{"small_image":null,"base_image":null},"products":["105"]},"green-yellow":{"configurable_product":{"small_image":null,"base_image":null},"products":["106"]},"blue-green":{"configurable_product":{"small_image":null,"base_image":null},"products":["103"]}},"small_image":{"104":"../4mynot4give/assets/images/product/product-demo.jpg","105":"../4mynot4give/assets/images/product/product-demo-1.jpg","106":"../4mynot4give/assets/images/product/product-demo.jpg","103":"../4mynot4give/assets/images/product/product-demo.jpg","107":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/s\/p\/sport-boots-s_1_2.jpg"},"base_image":[]}'));
                ConfigurableMediaImages.setImageFallback(11, $j.parseJSON('{"option_labels":{"black":{"configurable_product":{"small_image":null,"base_image":null},"products":["12"]},"blue":{"configurable_product":{"small_image":null,"base_image":null},"products":["13"]},"red":{"configurable_product":{"small_image":null,"base_image":null},"products":["14"]}},"small_image":{"12":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/f\/o\/footbal-boots-soccer-boots-s1_3_1.jpg","13":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/f\/o\/footbal-boots-soccer-boots-s4_3_1.jpg","14":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/f\/o\/footbal-boots-soccer-boots-s3_3_1.jpg","11":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/f\/o\/footbal-boots-soccer-boots-s1_3.jpg"},"base_image":[]}'));
                ConfigurableMediaImages.setImageFallback(24, $j.parseJSON('{"option_labels":[],"small_image":{"24":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/c\/1\/c1.jpg"},"base_image":[]}'));
                ConfigurableMediaImages.setImageFallback(3, $j.parseJSON('{"option_labels":[],"small_image":{"3":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/f\/o\/football-boots-soccer-boots-s2.jpg"},"base_image":[]}'));
                ConfigurableMediaImages.setImageFallback(25, $j.parseJSON('{"option_labels":[],"small_image":{"25":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/c\/3\/c3.jpg"},"base_image":[]}'));
                ConfigurableMediaImages.setImageFallback(9, $j.parseJSON('{"option_labels":[],"small_image":{"9":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/f\/o\/footbal-boots-soccer-boots-s3_1.jpg"},"base_image":[]}'));
                ConfigurableMediaImages.setImageFallback(26, $j.parseJSON('{"option_labels":[],"small_image":{"26":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/c\/2\/c2.jpg"},"base_image":[]}'));
                ConfigurableMediaImages.setImageFallback(4, $j.parseJSON('{"option_labels":[],"small_image":{"4":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/s\/p\/sport-boots-s2.jpg"},"base_image":[]}'));
                ConfigurableMediaImages.setImageFallback(21, $j.parseJSON('{"option_labels":[],"small_image":{"21":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/h\/4\/h4.jpg"},"base_image":[]}'));
                ConfigurableMediaImages.setImageFallback(6, $j.parseJSON('{"option_labels":[],"small_image":{"6":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/s\/p\/sport-boots-s4.jpg"},"base_image":[]}'));
                ConfigurableMediaImages.setImageFallback(7, $j.parseJSON('{"option_labels":[],"small_image":{"7":"https:\/\/athlete.olegnax.com\/media\/catalog\/product\/cache\/10\/image\/473x473\/9df78eab33525d08d6e5fb8d27136e95\/s\/p\/sport-shoe-s5.jpg"},"base_image":[]}'));
                $j(document).trigger('configurable-media-images-init', ConfigurableMediaImages);
    });
</script>
<script type="text/javascript">
    jQuery(function ($j) {
        $j(document).trigger('product-media-loaded', 'listing');
    });
</script>
<script type="text/javascript">
//<![CDATA[
Mage.Cookies.path     = '/';
Mage.Cookies.domain   = '.athlete.olegnax.com';
//]]>
</script>

<script type="text/javascript">
//<![CDATA[
optionalZipCountries = ["HK","IE","MO","PA"];
//]]>
</script>
            <!-- BEGIN GOOGLE ANALYTICS CODE -->
        <script type="text/javascript">
        //<![CDATA[
            var _gaq = _gaq || [];
            
_gaq.push(['_setAccount', 'UA-49287065-1']);

_gaq.push(['_trackPageview']);
            
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        //]]>
        </script>
        <!-- END GOOGLE ANALYTICS CODE -->
    <script type="text/javascript">//<![CDATA[
        var Translator = new Translate([]);
        //]]></script>
		<script type="text/javascript">
	//<![CDATA[
	var Athlete = {};
	Athlete.url = 'https://athlete.olegnax.com/';
	Athlete.store = 'gr';
	Athlete.header_search = 1;
	Athlete.button_icons = 'black';
	Athlete.text = {};
	Athlete.text.out_of = '%s out of 5';
		Athlete.login_bg = '//athlete.olegnax.com/media/olegnax/athlete/default/login1_2.jpg';
		Athlete.totop = 1;
	Athlete.responsive = 1;
	Athlete.sticky = 1;
	Athlete.breakpoints = [426,756,960,1200,1300,1380,1520];
	//]]>
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

