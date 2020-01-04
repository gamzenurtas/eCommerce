

<!-- for nuewinbannerstyle -->
<link href="assets/css/nuewinbannerstyle.css" rel="stylesheet">


<!-- NUEWIN SLIDER SHOW : START -->
<div class="hero-slider-wrapper">
	<div class="hero-slider">
<!-- SLIDE 1 : START -->
			  <?php 
include "config.php";
    $res = $connect->prepare("SELECT * FROM slider");
    $res->execute([$_GET["cat"]]);
	$productCount = $res->rowCount();
	if ($productCount > 0) {
    while ($row = $res->fetch()) {
        $slider_id = $row['sliderName'];
        $slider_image = $row['sliderImage'];
        $slider_link = $row['sliderLink'];
echo 
	$slider_image;
	;
}	}
	
	
	?>

	</div>
	<div class="hero-slider-thumbs-wrapper">
		<div class="container">
			<div style="margin-left:47%; margin-bottom:5%"class="hero-slider-thumbs">
				<div style="max-width:5%;" class="hero-slider-thumbs__item">
					<i class="fa fa-circle"></i>
				</div>
				<div style="max-width:5%;" class="hero-slider-thumbs__item">
					<i class="fa fa-circle"></i>
				</div>
				<div style="max-width:5%;" class="hero-slider-thumbs__item">
					<i class="fa fa-circle"></i>
				</div>
			</div>
		</div>
	</div>
</div>
<ul class="df-color-pallete">
	<li class="df-color-pallete__item color-swich-1"><em><b>DAFRON</b> ONLINE</em></li>
	<li class="df-color-pallete__item color-swich-2">
		<spam><i class="free-delivery"></i><br> 150 ÜZERİ ÜCRETSİZ</spam>
	</li>
	<li class="df-color-pallete__item color-swich-3">
		<spam><i class="sale-s"></i><br> %40'A VARAN İNDİRİM</spam>
	</li>
	<li class="df-color-pallete__item color-swich-4">
		<spam><i class="secure-payment"></i><br> GÜVENLİ ÖDEME</spam>
	</li>
	<li class="df-color-pallete__item color-swich-5">
		<spam><i class="happy-customer"></i><br> %100 MÜŞTERİ MEMNUNİYETİ</spam>
	</li>
</ul>


<ul class="df-color-pallete">

			  <?php 
include "config.php";
$dynamic_list = "";
for($sayi = 1; $sayi < 5; $sayi++) {

    $res = $connect->prepare("SELECT * FROM banner WHERE bannerID=$sayi");
    $res->execute([$_GET["cat"]]);
	$productCount = $res->rowCount();
	if ($productCount > 0) {
    while ($row = $res->fetch()) {
        $product_id = $row['bannerName'];
        $product_img = $row['bannerImage'];
        $product_price = $row['bannerLink'];
echo '
	<li>
	<a href="category-grid.php">
		<figure class="nuewinbannerstyle1 color4">
		  <img src="'.$product_img.'" alt="nuewin000" />
		  <figcaption>
			<h2>'.$product_id.'</h2>
		  </figcaption>
		</figure>
	</a>
	</li>
	';
}	}
	
	}
	?>

</ul>
<ul class="df-color-pallete">

			  <?php 
include "config.php";
$dynamic_list = "";
for($sayi = 5; $sayi < 9; $sayi++) {

    $res = $connect->prepare("SELECT * FROM banner WHERE bannerID=$sayi");
    $res->execute([$_GET["cat"]]);
	$productCount = $res->rowCount();
	if ($productCount > 0) {
    while ($row = $res->fetch()) {
        $product_id = $row['bannerName'];
        $product_img = $row['bannerImage'];
        $product_price = $row['bannerLink'];
echo '
	<li>
	<a href="category-grid.php">
		<figure class="nuewinbannerstyle1 color4">
		  <img src="'.$product_img.'" alt="nuewin000" />
		  <figcaption>
			<h2>'.$product_id.'</h2>
		  </figcaption>
		</figure>
	</a>
	</li>
	';
}	}
	
	}
	?>

</ul>


