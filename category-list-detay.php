<!DOCTYPE html>
<?php
include "config.php";
$dynamic_list4 = "";
$id = $_GET["id"];
    $res = $connect->prepare("SELECT * FROM products WHERE ProductID=$id && ProductID='".$_POST["item_id"]."'");
    $res->execute([$_GET["cat"]]);
$userid = $_SESSION["UserID"];
$_SESSION["urunid1"] = $id; 

    while ($row = $res->fetch()) {
        $product_id = $row['ProductID'];
        $product_name = $row['ProductName'];
        $product_price = $row['ProductPrice'];
		$product_img = $row['ProductImage'];
        $product_cat = $row['ProductAltCategoryID'];
        $product_subcat = $row['ProductMainCategoryID'];
		$product_cat_name = $row['ProductAltCategoryName'];
        $product_subcat_name = $row['ProductMainCategoryName'];
        $product_details = $row['ProductDesc'];
        $check = $product_details;
		
		$dynamic_list4 .= '
		
		<a href="shopping-list-add.php?a='.$product_id.'" class="btn btn-default btn-single-icon product__wish" ><i class="icon-heart"></i></a>
		
		';
		$dynamic_list5 .= '
		
							<header class="product-tabs__header">
								<h2>Ürün Açıklaması</h2>
							</header>
							
							<p>'.$product_details.'</p>
		
		';
	
	}
 ?>

 <?php
include "config.php";
$dynamic_list4 = "";
$id = $_GET["id"];
    $res = $connect->prepare("SELECT * FROM customers INNER JOIN kullanici_yorum ON customers.UserID = kullanici_yorum.userID WHERE urunID=$id");
    $res->execute([$_GET["cat"]]);
$userid = $_SESSION["UserID"];
$_SESSION["urunid1"] = $id; 


    while ($row = $res->fetch()) {
       
		
		$yorum = $row['yorum'];
		$ad = $row['UserFirstName'];
		$soyad = $row['UserLastName'];
		
		$dynamic_list6 .= '
		
							<div class="comments__inner">
											<header class="comment__header">
												<div class="comment__author">
													<figure class="comment__author-avatar">
														<img src="assets/images/samples/avatar-10.jpg" alt="">
													</figure>
													<div class="comment__author-info">
														<h5 class="comment__author-name">'.$ad.' '.$soyad.'</h5>
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
												<h4 class="comment__title">'.$yorum.'</h4>
Nike											</div>
										</div>
		
		';
	}
 ?>
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
       
		$dynamic_list3 .= ' <div class="v-siyah radio-variant" name="renk" id="renk" data-bind="event: { mouseover: function() { colorVariantHover(&quot;&quot;, &quot;Siyah&quot;) }, mouseout: colorVariantBlur, click: setActiveVariantContainer}">
            <input data-bind="checked: variantProperties().observe(&quot;Renk&quot;), click: function() { colorVariantSelected(&quot;Siyah&quot;); return true; }" id="'.$renk_image.'" type="radio" class="radio" name="Renk" value="Siyah">

            <label id="thumbs" class="label white thumbnail " data-value="Siyah" for="'.$renk_image.'" data-propertyname="Renk" data-position="3">
                <img id="renk" alt="Siyah" class="" src="'.$renk_image.'" width="80" height="80">
            </label>
        </div>';
		
	}

	
 ?>
 
 <? 
 function load_secenek1(){
	 include "config.php";
$id = $_GET["id"];

$res = $connect->prepare("SELECT DISTINCT * 
FROM stock as s 
INNER JOIN stockoptions as so ON s.stockID=so.stockID 
INNER JOIN productsoptions as po ON po.id=so.productOptionsID 
INNER JOIN optionvalues as ov ON ov.optionValuesID=po.optionsValuesID 
INNER JOIN options as o ON o.optionsID=ov.optionsID 
where urunID=$id  ");
    $res->execute([$_GET["cat"]]);
$userid = $_SESSION["UserID"];


$output='';


while($row = $res->fetch()){
	
    $output .= '<option value="'.$row["optionValuesShortening"].'">'.$row["optionValuesShortening"].'</option>';
}
echo $output;


}
 
 ?>
<html lang="TR">
<head>
<style type="text/css">
		body {
			font-family: Helvetica Neue, Arial, sans;
			margin-top: 2em;
			background: #FAFAFA;
		}

		.wrapper {
			margin: 0 auto;
			width: 860px;
		}

		.drift-demo-trigger {
			width: 100%;
		}
		.drift-demo-trigger1 {
			width: 100%;
		}
		.drift-demo-trigger2 {
			width: 100%;
		}

		.detail {
			    position: relative;
    /* width: 55%; */
    /* margin-left: 5%; */
    float: left;
    height: 340px!important;
    /* margin-top: 60px!important; */
		}

		h1 {
			color: #013C4A;
			margin-top: 1em;
			margin-bottom: 1em;
		}

		p {
			max-width: 32em;
			margin-bottom: 1em;
			color: #23637f;
			line-height: 1.6em;
		}

		p:last-of-type {
			margin-bottom: 2em;
		}

		a {
			color: #00C0FA;
		}

		.ix-link {
			display: block;
			margin-bottom: 3em;
		}

		@media (max-width: 900px) {
			.wrapper {
				text-align: center;
				width: auto;
			}

			.detail,
			.drift-demo-trigger,.drift-demo-trigger1,.drift-demo-trigger2 {
				float: none;
			}

			.drift-demo-trigger,.drift-demo-trigger1,.drift-demo-trigger2 {
				max-width: 100%;
				width: auto;
				margin: 0 auto;
			}

			.detail {
				margin: 0;
				width: auto;
			}

			p {
				margin: 0 auto 1em;
			}

			.responsive-hint {
				display: none;
			}

			.drift-bounding-box {
				display: none;
			}
		}
	</style>
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
	<link rel="stylesheet" media="screen, projection" href="assets/css/drift-basic.css">
	<link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	<link href="assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
	<link href="assets/vendor/slick/slick.css" rel="stylesheet">
	<link href="assets/css/fontawesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link href="assets/css/all.min.css" rel="stylesheet">
	<link href="assets/css/theme.css" rel="stylesheet">
	<!-- Template CSS-->
	<link href="assets/css/style-soccer.css" rel="stylesheet">
	<link href="assets/css/desktop.css" rel="stylesheet">
	<link href="assets/css/red2.css" rel="stylesheet">

	<!-- Custom CSS-->
	  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="assets/js/fontawesome.min.js" rel="stylesheet"></script>
<script src="assets/js/all.min.js" rel="stylesheet"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body class="nuewin">

	<div class="site-wrapper clearfix">

		
		
		
		
		
		
		
		
		
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
												<img src="<?echo $product_img; ?>" alt="">
											</div>
										</div>
										<div class="product__slide-thumb">
											<div class="product__slide-thumb-holder">
												<img src="<?echo $product_img; ?>" alt="">
											</div>
										</div>
										<div class="product__slide-thumb">
											<div class="product__slide-thumb-holder">
												<img src="<?echo $product_img; ?>" alt="">
											</div>
										</div>
									</div>
									<!-- Product Thumbs / End -->
		
									<!-- Product Slider -->
									
									<div class="product__slider-soccer">
										<div class="product__slide">
												<img id="largeImage" class="drift-demo-trigger " data-zoom="<?echo $product_img; ?>" src="<?echo $product_img; ?>" alt="">
										</div>
		
										<div class="product__slide">
												<img class="drift-demo-trigger1" data-zoom="<?echo $product_img; ?>" src="<?echo $product_img; ?>" alt="">
										</div>
		
										<div class="product__slide">
												<img class="drift-demo-trigger2" data-zoom="<?echo $product_img; ?>" src="<?echo $product_img; ?>" alt="">
										</div>
									</div>
									<!-- Product Slider / End -->
								</div>
								<!-- Product Slider - Soccer / End -->
		
								
		
							</div>
						</div>
		
						<div class="product__content card__content ">
		<div class="detail">
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
		
		
		
		
							<form id="form1" name="form1" method="post" class="product__params d-block d-md-flex">
		
								<div class="input-group mb-3 w-md-50 w-100 mr-2">
  
  <select name="boyut" id="boyut" class="form-control text-dark" required>
								<option class="text-dark" value="">Boyut Seçiniz.</option>
								            <?php     echo load_secenek1(); ?>

							</select>
</div>

<!--<div class="input-group mb-3 w-md-50 w-100 mr-2">
  
  <select name="yakatipi" id="yakatipi" class="form-control text-dark" required>
								<option value="">Yaka Tipi Seçiniz.</option>

							</select>
</div>
<div class="input-group mb-3 w-md-50 w-100">
  
  <select name="koltipi" id="koltipi" class="form-control text-dark" required>
								<option value="">Kol Tipi Seçiniz.</option>

							</select>
</div>-->

															</form>
															</div>
															<div class="d-flex product__param-item product__param-item--color product__param-item--color-lg mt-5 mt-md-0">
									<form action="#" class="form-product-color d-flex justify-content-center">
										<div name="resimler" id="resimler" class="variant-container d-flex">
       <?php echo $dynamic_list3; ?> 
       
</div>
									</form>
								</div>


<script>
    function showNotify(){
        Metro.notify.create("This is a notify", "Title", {});
    }
</script>
								<footer class="product__footer">

									<input onclick="kaydet()" type="button" class="btn btn-primary-inverse btn-icon product__add-to-cart"  id="button" value="Sepete Ekle">
									<?php echo $dynamic_list4; ?>
								</footer>
						</div>
					</div>
						<script>//gonder olan kısıma bizim kayıt butonumuzun id'si yazılacak
							function kaydet() {
								
							$.ajax({ // Ajax işlemini başlatıyoruz.
							type:'POST', // Veri gönderme metodunu Post olarak seçiyoruz.
							url:"shopping-cart-add.php?a=<?php echo $userid?>&b=<?php echo $id ?>" // Verilerin postlanağı adresi belirliyoruz.
							});}
							
						</script>
				</div>
				<!-- Single Product / End -->
		
				<!-- Single Product Tabbed Content -->
				<div class="product-tabs card card--xlg">
				
					<!-- Nav tabs -->
					<ul class="nav nav-tabs nav-justified nav-product-tabs" role="tablist">
						<li class="nav-item"><a class="nav-link active" href="#tab-desciption" role="tab" data-toggle="tab"><small>Ürün</small>Tam açıklama</a></li>
						<li class="nav-item"><a class="nav-link" href="#tab-info" role="tab" data-toggle="tab"><small>Ürün</small>Taksit Seçenekleri</a></li>
						<li class="nav-item"><a class="nav-link" href="#tab-reviews" role="tab" data-toggle="tab"><small>Ürün</small>Müşteri yorumu </a></li>
					</ul>
				
					<!-- Tab panes -->
					<div class="tab-content card__content">
				
						<!-- Tab: Description -->
						<div role="tabpanel" class="tab-pane fade show active" id="tab-desciption">
							
							<?php echo $dynamic_list5; ?>
							
							
							<div class="spacer"></div>
							
						
				
						</div>
						<!-- Tab: Description / End -->
						<div role="tabpanel" class="tab-pane fade" id="tab-info">
				
							<header class="product-tabs__header">
								<h2>PAYTR TAKSİT SEÇENEKLERİ</h2>
							</header>
							
							<p>PAYTR den gelen ekran yansıtılacaktır..</p>
							
							<div class="spacer"></div>
							
				
						</div>
					
				
						<!-- Tab: Reviews -->
						<div role="tabpanel" class="tab-pane fade" id="tab-reviews">
				
							<section class="product-tabs__section">
							<?php echo $dynamic_list6; ?>
								
								<!-- Product Reviews / End -->
							
							</section>
							
							<section class="product-tabs__section">
							
								<header class="product-tabs__header">
									<h2>Yorum yaz</h2>
								</header>
								
								<!-- Reviews Form -->
								<form action="yorum_kontrol.php" method="post" class="reviews-form">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label" for="yorumPuan">Yorum yıldızları</label>
												<select name="yorumPuan" id="yorumPuan" value="<?php if(isset($_POST['yorumPuan'])) echo $_POST['yorumPuan'] ?>" class="form-control">
													<option value="5">5 yıldızlı oylama</option>
													<option value="4">4 yıldızlı oylama</option>
													<option value="3">3 yıldızlı oylama</option>
													<option value="2">2 yıldızlı oylama</option>
													<option value="1">1 yıldızlı oylama</option>
												</select>
											</div>
											<div class="form-group">
												<label class="control-label" for="yorumBaslik">Yorum başlığı</label>
												<input type="text" id="yorumBaslik" name="yorumBaslik" value="<?php if(isset($_POST['yorumBaslik'])) echo $_POST['yorumBaslik'] ?>" class="form-control">
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label" for="yorum">Senin yorumun</label>
												<textarea name="yorum" id="yorum" value="<?php if(isset($_POST['yorum'])) echo $_POST['yorum'] ?>" rows="5" class="form-control"></textarea>
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
						<h4>Son eklenilen ürünler</h4>
					</header>
						<div class="card__content">
							<ul class="products products--grid products--grid-condensed products--grid-light products--grid-4">

				
						<!-- Products -->
				
							<!-- Product #0 -->
				
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

					<li class="product__item card">

							<div class="product__img">
									<div style="width:300px;height:200px;"class="product__img-holder">
										<a href="product.php?&id='.$product_id.'"><img style="height:200px;" src="'.$product_img.'" alt=""></a>
									</div>
								</div>
				
								<div class="product__content card__content">
				
									<header class="product__header">
										<div class="product__header-inner">
											<span class="product__category">DAFRON</span>
											<div class="product__ratings">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<h2 class="product__title"><a href="product.php?&id='.$product_id.'">'.$product_name.'</a></h2>
											<div class="product__price">'.$product_price.' ₺</div>
										</div>
									</header>
								</div>
					</li>
		
		';
	}
 ?></ul>
	</div>
						
							<!-- Product #0 / End -->
							
							<!-- Product #3 / End -->
				
					
						<!-- Products / End -->
				
				
				</div>
				<!-- Related Products / End -->
		
			</div>
		</div>
		
		<!-- Content / End -->
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<!-- Footer
		================================================== -->
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
	<script src="assets/js/Drift.js"></script>

	<!-- Vendor JS -->
	<script src="assets/vendor/twitter/jquery.twitter.js"></script>
	
	<!-- Template JS -->
	<script src="assets/js/init.js"></script>
	<script src="assets/js/custom.js"></script>

</body>
</html>
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
    $(document).ready(function () {
        $('#renk').change(function () {
            var kategori_id = $(this).val();
			            var id = <?php echo $id; ?>;
			var renk_id = <?php echo $renk_image; ?>;

            $.ajax({
                url: "./fetch_kategori.php",
                method: "POST",
                data: { kategoriId: kategori_id,p_id:id,renkId:renk_id },
                dataType: "text",
                success: function (data) {
                    $('#boyut').html(data);

                }




            });
			
			


        });
    });

</script>
	<script>
		new Drift(document.querySelector('.drift-demo-trigger'), {
			paneContainer: document.querySelector('.detail'),
			inlinePane: 900,
			inlineOffsetY: -85,
			containInline: true,
			hoverBoundingBox: true
		});
		new Drift(document.querySelector('.drift-demo-trigger1'), {
			paneContainer: document.querySelector('.detail'),
			inlinePane: 900,
			inlineOffsetY: -85,
			containInline: true,
			hoverBoundingBox: true
		});
		new Drift(document.querySelector('.drift-demo-trigger2'), {
			paneContainer: document.querySelector('.detail'),
			inlinePane: 900,
			inlineOffsetY: -85,
			containInline: true,
			hoverBoundingBox: true
		});
	</script>
	<script>
	$('#thumbs img').click(function(){
    $('#largeImage').attr('src',$(this).attr('src').replace('thumb','large'));
    $('#description').html($(this).attr('alt'));
});
	
	</script>
