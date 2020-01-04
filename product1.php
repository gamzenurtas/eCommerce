<!DOCTYPE html>
<?php
include "config.php";
$dynamic_list3 = "";

$id = $_GET["id"];
    $res = $connect->prepare("SELECT ProductName,renk_img,ProductID,secenek2,renk_id FROM color as c INNER JOIN products as p ON p.ProductID=c.product_id INNER JOIN stock as s ON p.ProductID=s.urunID where ProductID=$id && renk_id=secenek2  ");
    $res->execute([$_GET["cat"]]);
$userid = $_SESSION["UserID"];

    while ($row = $res->fetch()) {
        $rid = $row['id'];
        $renk_id = $row['renk_id'];
        $renk_image = $row['renk_img'];
		$product_id = $row['product_id'];
       
		$dynamic_list3 .= ' <div class="v-siyah radio-variant" data-bind="event: { mouseover: function() { colorVariantHover(&quot;&quot;, &quot;Siyah&quot;) }, mouseout: colorVariantBlur, click: setActiveVariantContainer}">
            <input data-bind="checked: variantProperties().observe(&quot;Renk&quot;), click: function() { colorVariantSelected(&quot;Siyah&quot;); return true; }" onclick="resimyol();" id="'.$renk_image.'" type="radio" class="radio" name="Renk" value="Siyah">

            <label class="label white thumbnail" data-value="Siyah" for="'.$renk_image.'" data-propertyname="Renk" data-position="3">
                <img id="renk" alt="Siyah" class="" src="'.$renk_image.'" width="80" height="80">
            </label>
        </div>';
		
	}

	
 ?>
 <script>
 function resimyol(){
	 document.write("resme tıklandı");
 }
 
 </script>
 <? 
 function load_secenek1(){
	 include "config.php";
$id = $_GET["id"];

$res = $connect->prepare("SELECT  secenek1,urunID FROM stock where urunID=$id group by secenek1");
    $res->execute([$_GET["cat"]]);
$userid = $_SESSION["UserID"];


$output='';


while($row = $res->fetch()){
	
    $output .= '<option value="'.$row["secenek1"].'">'.$row["secenek1"].'</option>';
}
echo $output;


}
 
 ?>
 
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
		<link href="../4mynot4give/assets/css/theme.css" rel="stylesheet">
	<!-- Template CSS-->
	<link href="assets/css/style-soccer.css" rel="stylesheet">
		<link href="../4mynot4give/assets/css/desktop.css" rel="stylesheet">
	<link href="../4mynot4give/assets/css/red2.css" rel="stylesheet">

	<!-- Custom CSS-->
<script src="../4mynot4give/assets/js/fontawesome.min.js" rel="stylesheet"></script>
			<script src="../4mynot4give/assets/js/all.min.js" rel="stylesheet"></script>
</head>
<body class="nuewin">

	<div class="site-wrapper clearfix">

		<?php include"header.php"?>
		
		
		
		
		
		
		
		
		
		<!-- Content
		================================================== -->
		<div class="site-content">
			<div class="container">
		
				<!-- Single Product -->
				<div class="products products--list products--list-lg">
		
					<div class="product__item card">
		
						<div class="product__img">
							<div class="product__img-holder">
		
								<!-- Product Slider - Soccer -->
								<div class="product__slider-soccer-wrapper">
									<!-- Product Thumbs -->
									<div class="product__slider-thumbs">
										<div class="product__slide-thumb">
											<div class="product__slide-thumb-holder">
												<img src="../4mynot4give/assets/images/product/product-demo.jpg" alt="">
											</div>
										</div>
										<div class="product__slide-thumb">
											<div class="product__slide-thumb-holder">
												<img src="../4mynot4give/assets/images/product/product-demo.jpg" alt="">
											</div>
										</div>
										<div class="product__slide-thumb">
											<div class="product__slide-thumb-holder">
												<img src="../4mynot4give/assets/images/product/product-demo.jpg" alt="">
											</div>
										</div>
									</div>
									<!-- Product Thumbs / End -->
		
									<!-- Product Slider -->
									<div class="product__slider-soccer">
										<div class="product__slide">
											<img src="../4mynot4give/assets/images/product/product-demo.jpg" alt="">
										</div>
		
										<div class="product__slide">
											<img src="../4mynot4give/assets/images/product/product-demo.jpg" alt="">
										</div>
		
										<div class="product__slide">
											<img src="../4mynot4give/assets/images/product/product-demo.jpg" alt="">
										</div>
									</div>
									<!-- Product Slider / End -->
								</div>
								<!-- Product Slider - Soccer / End -->
		
								
		
							</div>
						</div>
		
						<div class="product__content card__content">
		
							<header class="product__header">
								<div class="product__header-inner">
									<span class="product__category"><?echo $product_subcat_name ; ?></span>
									<h2 class="product__title"><?echo $product_name; ?></h2>
									<div class="product__ratings">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star empty"></i>
									</div>
								</div>
								<div class="product__price"><?echo $product__price; ?></div>
							</header>
		
							<div class="product__excerpt product__excerpt--sm">
								<h6>Açıklama</h6>
    <?echo $product_details; ?>							</div>
		
							<form id="form1" name="form1" method="post" class="product__params d-flex">
		
								<div class="input-group mb-3 w-50 mr-2">
  
  <select name="boyut" id="boyut" class="form-control text-dark" required>
								<option class="text-dark" value="">Boyut Seçiniz.</option>
								                <?php echo load_secenek1(); ?>

							</select>
</div>

<div class="input-group mb-3 w-50 mr-2">
  
  <select name="yakatipi" id="yakatipi" class="form-control text-dark" required>
								<option value="">Yaka Tipi Seçiniz.</option>

	</select>
</div>
<div class="input-group mb-3 w-50">
  
  <select name="koltipi" id="koltipi" class="form-control text-dark" required>
								<option value="">Kol Tipi Seçiniz.</option>

	</select>
</div>

															</form>
															<div class="d-flex product__param-item product__param-item--color product__param-item--color-lg">
									<form action="#" class="form-product-color d-flex justify-content-center">
										<div name="resimler" id="resimler" class="variant-container d-flex">
       <?php echo $dynamic_list3; ?> 
       
</div>
									</form>
								</div>

								<div class="product__param-item product__param-item--quantity w-100">
									<label>Adet</label>
									<div class="quantity-control">
										<button class="btn btn-xs"><i class="fa fa-minus"></i></button>
										<input type="number" step="1" value="2" size="4" class="form-control input-sm">
										<button class="btn btn-xs"><i class="fa fa-plus"></i></button>
									</div>
								</div>
							
<script>
    function showNotify(){
        Metro.notify.create("This is a notify", "Title", {});
    }
</script>
								<footer class="product__footer">
									<input type="button" class="btn btn-primary-inverse btn-icon product__add-to-cart" onclick="kaydet()" id="button" value="Sepete Ekle">
									<a href="#" class="btn btn-default btn-single-icon product__wish" ><i class="icon-heart"></i></a>
								</footer>
						</div>
					</div>
						<script>//gonder olan kısıma bizim kayıt butonumuzun id'si yazılacak
							function kaydet(){
							$.ajax({ // Ajax işlemini başlatıyoruz.
							type:'POST', // Veri gönderme metodunu Post olarak seçiyoruz.
							url:"shopping-cart-add.php?a=<?php echo $product_id ?>&b=<?php echo $product_name ?>&c=<?php echo $product_price ?>&d=<?php echo $userid ?>&e=<?php echo "1" ?>" // Verilerin postlanağı adresi belirliyoruz.
							});}
							
						</script>
				</div>
				<!-- Single Product / End -->
		
				<!-- Single Product Tabbed Content -->
				<div class="product-tabs card card--xlg">
				
					<!-- Nav tabs -->
					<ul class="nav nav-tabs nav-justified nav-product-tabs" role="tablist">
						<li class="nav-item"><a class="nav-link active" href="#tab-desciption" role="tab" data-toggle="tab"><small>Ürün</small>Tam açıklama</a></li>
						<li class="nav-item"><a class="nav-link" href="#tab-info" role="tab" data-toggle="tab"><small>Ürün</small>Ekstra bilgi</a></li>
						<li class="nav-item"><a class="nav-link" href="#tab-reviews" role="tab" data-toggle="tab"><small>Ürün</small>Müşteri yorumu (3)</a></li>
					</ul>
				
					<!-- Tab panes -->
					<div class="tab-content card__content">
				
						<!-- Tab: Description -->
						<div role="tabpanel" class="tab-pane fade show active" id="tab-desciption">
				
							<header class="product-tabs__header">
								<h2>Ürün tam açıklaması</h2>
							</header>
							
							<p>Nike</p>
							
							<div class="spacer"></div>
							
							<h4>US and International Sneaker Size</h4>
							<p>Nike</p>
							
							<p>Nike</p>
							
							<div class="spacer"></div>
							
							<div class="row">
								<div class="col-md-4">
									<!-- Icobox -->
									<div class="icobox icobox--center">
										<div class="icobox__icon icobox__icon--filled icobox__icon--lg icobox__icon--circle">
											<i class="icon-badge"></i>
										</div>
										<div class="icobox__content">
											<h4 class="icobox__title icobox__title--lg">Kalite güvencesi</h4>
											<div class="icobox__description">
Nike											</div>
										</div>
									</div>
									<!-- Icobox / End -->
								</div>
								<div class="col-md-4">
									<!-- Icobox -->
									<div class="icobox icobox--center">
										<div class="icobox__icon icobox__icon--filled icobox__icon--lg icobox__icon--circle">
											<i class="icon-energy"></i>
										</div>
										<div class="icobox__content">
											<h4 class="icobox__title icobox__title--lg">Ultra dayanıklılık</h4>
											<div class="icobox__description">
Nike											</div>
										</div>
									</div>
									<!-- Icobox / End -->
								</div>
								<div class="col-md-4">
									<!-- Icobox -->
									<div class="icobox icobox--center">
										<div class="icobox__icon icobox__icon--filled icobox__icon--lg icobox__icon--circle">
											<i class="icon-like"></i>
										</div>
										<div class="icobox__content">
											<h4 class="icobox__title icobox__title--lg">Süper komfor</h4>
											<div class="icobox__description">
Nike											</div>
										</div>
									</div>
									<!-- Icobox / End -->
								</div>
							</div>
				
						</div>
						<!-- Tab: Description / End -->
				
						<!-- Tab: Shipping -->
						<div role="tabpanel" class="tab-pane fade" id="tab-info">
				
							<header class="product-tabs__header">
								<h2>Ek bilgi</h2>
							</header>
							
							<p>Nike</p>
							
							<div class="spacer"></div>
							
							<h4>Nike Hakkında</h4>
							
							<p>Nike</p>
							
							<p>Nike</p>
				
						</div>
						<!-- Tab: Shipping / End -->
				
						<!-- Tab: Reviews -->
						<div role="tabpanel" class="tab-pane fade" id="tab-reviews">
				
							<section class="product-tabs__section">
							
								<header class="product-tabs__header">
									<h2>3 Müşteri yorumu</h2>
									<div class="ratings">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star empty"></i>
										<span class="ratings-result">
											4.33/5 3 kişinin yorumu
										</span>
									</div>
								</header>
								
								<!-- Product Reviews -->
								<ul class="comments comments--left-thumb">
									<li class="comments__item">
										<div class="comments__inner">
											<header class="comment__header">
												<div class="comment__author">
													<figure class="comment__author-avatar">
														<img src="assets/images/samples/avatar-10.jpg" alt="">
													</figure>
													<div class="comment__author-info">
														<h5 class="comment__author-name">asdasda adasda</h5>
														<time class="comment__post-date" datetime="2016-08-23">5 saat önce</time>
														<div class="comment__ratings ratings">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star empty"></i>
														</div>
													</div>
												</div>
											</header>
											<div class="comment__body">
												<h4 class="comment__title">Mükemmel nike!!</h4>
Nike											</div>
										</div>
									</li>
									<li class="comments__item">
										<div class="comments__inner">
											<header class="comment__header">
												<div class="comment__author">
													<figure class="comment__author-avatar">
														<img src="assets/images/samples/avatar-9.jpg" alt="">
													</figure>
													<div class="comment__author-info">
														<h5 class="comment__author-name">qweqweqwe qwe qwe</h5>
														<time class="comment__post-date" datetime="2016-08-23">2 gün önce</time>
														<div class="comment__ratings ratings">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
													</div>
												</div>
											</header>
											<div class="comment__body">
												<h4 class="comment__title">Gördüğüm en iyi model</h4>
Nike											</div>
										</div>
									</li>
									<li class="comments__item">
										<div class="comments__inner">
											<header class="comment__header">
												<div class="comment__author">
													<figure class="comment__author-avatar">
														<img src="assets/images/samples/avatar-7.jpg" alt="">
													</figure>
													<div class="comment__author-info">
														<h5 class="comment__author-name">ergfsgsfg</h5>
														<time class="comment__post-date" datetime="2016-08-23">4 ay önce</time>
														<div class="comment__ratings ratings">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star empty"></i>
														</div>
													</div>
												</div>
											</header>
											<div class="comment__body">
												<h4 class="comment__title">Komforlu ve uygun fiyat</h4>
Nike											</div>
										</div>
									</li>
								</ul>
								<!-- Product Reviews / End -->
							
							</section>
							
							<section class="product-tabs__section">
							
								<header class="product-tabs__header">
									<h2>Yorum yaz</h2>
								</header>
								
								<!-- Reviews Form -->
								<form action="#" class="reviews-form">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label" for="review-stars">Yorum yıldızları</label>
												<select name="review-stars" id="review-stars" class="form-control">
													<option value="5">5 yıldızlı oylama</option>
													<option value="4">4 yıldızlı oylama</option>
													<option value="3">3 yıldızlı oylama</option>
													<option value="2">2 yıldızlı oylama</option>
													<option value="1">1 yıldızlı oylama</option>
												</select>
											</div>
											<div class="form-group">
												<label class="control-label" for="review-title">Yorum başlığı</label>
												<input type="text" id="review-title" name="review-title" class="form-control">
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label" for="textarea-review">Senin yorumun</label>
												<textarea name="textarea-review" id="textarea-review" rows="5" class="form-control"></textarea>
											</div>
										</div>
									</div>
									<div class="form-group form-group--submit">
										<button type="submit" class="btn btn-default btn-block btn-lg">Yorumunu gönder</button>
									</div>
								</form>
								<!-- Reviews Form / End -->
							
							</section>
				
						</div>
						<!-- Tab: Reviews / End -->
					</div>
				
				</div>
				<!-- Single Product Tabbed Content / End -->
		
				<!-- Related Products -->
				<div class="card card--clean">
					<header class="card__header">
						<h4>İlgili ürünler</h4>
					</header>
					<div class="card__content">
				
						<!-- Products -->
						<ul class="products products--grid products--grid-condensed products--grid-light products--grid-4">
				
							<!-- Product #0 -->
							<li class="product__item card">
				
								<div class="product__img">
									<div class="product__img-holder">
										<a href="_soccer_shop-product.html"><img src="../4mynot4give/assets/images/product/product-demo.jpg" alt=""></a>
									</div>
								</div>
				
								<div class="product__content card__content">
				
									<header class="product__header">
										<div class="product__header-inner">
											<span class="product__category">Adidas</span>
											<div class="product__ratings">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star empty"></i>
											</div>
											<h2 class="product__title"><a href="_soccer_shop-product.html">Sundown Sneaker</a></h2>
											<div class="product__price">₺28.00</div>
										</div>
									</header>
								</div>
							</li>
							<!-- Product #0 / End -->
							<!-- Product #1 -->
							<li class="product__item card">
				
								<div class="product__img">
									<div class="product__img-holder">
										<a href="_soccer_shop-product.html"><img src="../4mynot4give/assets/images/product/product-demo.jpg" alt=""></a>
									</div>
								</div>
				
								<div class="product__content card__content">
				
									<header class="product__header">
										<div class="product__header-inner">
											<span class="product__category">Adidas</span>
											<div class="product__ratings">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<h2 class="product__title"><a href="_soccer_shop-product.html">Atlantic Sneaker</a></h2>
											<div class="product__price">₺30.00</div>
										</div>
									</header>
								</div>
							</li>
							<!-- Product #1 / End -->
							<!-- Product #2 -->
							<li class="product__item card">
				
								<div class="product__img">
									<div class="product__img-holder">
										<a href="_soccer_shop-product.html"><img src="../4mynot4give/assets/images/product/product-demo.jpg" alt=""></a>
									</div>
								</div>
				
								<div class="product__content card__content">
				
									<header class="product__header">
										<div class="product__header-inner">
											<span class="product__category">Nike</span>
											<div class="product__ratings">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star empty"></i>
												<i class="fa fa-star empty"></i>
											</div>
											<h2 class="product__title"><a href="_soccer_shop-product.html">Aquarium Sneaker</a></h2>
											<div class="product__price">₺26.00</div>
										</div>
									</header>
								</div>
							</li>
							<!-- Product #2 / End -->
							<!-- Product #3 -->
							<li class="product__item card">
				
								<div class="product__img">
									<div class="product__img-holder">
										<a href="_soccer_shop-product.html"><img src="../4mynot4give/assets/images/product/product-demo.jpg" alt=""></a>
									</div>
								</div>
				
								<div class="product__content card__content">
				
									<header class="product__header">
										<div class="product__header-inner">
											<span class="product__category">Nike</span>
											<div class="product__ratings">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star empty"></i>
											</div>
											<h2 class="product__title"><a href="_soccer_shop-product.html">Carbon Fiber Hoodie</a></h2>
											<div class="product__price">₺45.00</div>
										</div>
									</header>
								</div>
							</li>
							<!-- Product #3 / End -->
				
						</ul>
						<!-- Products / End -->
				
					</div>
				</div>
				<!-- Related Products / End -->
		
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
											<h5>Kayıt olun</h5>
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
<script>


			 $.ajax({
                url: "./fetch_resim.php",
                method: "POST",
                data: {},
                dataType: "text",
                success: function (data) {
                    $('#resimler').html(data);
 
                }




            });
			
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
                    $('#resimler').html(data);
					$('#resimler').change(function () {
            var yaka_adi = $(this).val();
						var id = <?echo $id;  ?>;

            $.ajax({
                url: "./fetch_yaka.php",
                method: "POST",
                data: { boyutAdi: boyut_adi,  yakaAdi :yaka_adi,p_id : id },
                dataType: "text",
                success: function (data) {
                    $('#koltipi').html(data);
 
                }




            });



        });
                }




            });


        });
    });

</script>


