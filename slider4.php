<body class="  cms-index-index grid-fluid cms-athlete-home-us">
<? 
include "config.php";

?>
<div class="wrapper">
        
    <div class="page">
        	
<!-- END REVOLUTION SLIDER -->        <div class="main-container col-layouts col1-layout">
	        <div class="content-container">
		        <div class="main row clearfix ml-0 mr-0 ">
	                <div class="col-main grid_18">
	                    	                    						<div class="std">



<div class="fc_container fc_border_box clearfix"> 
<div class="row mr-0 ml-0">
	<div class="col-md-6" style="padding:2.5% 5%;"> 

<div class="product-slider-container category-products  product-columns-3">
	<div class="clearfix title-container">
		<h3 style="font-size:24px;">All-Star Lisanslı Ürünleri</h3><div class="slider-nav" id="slider_athlete_5c83e77ee0c0a_nav" ><ul></ul></div>
	</div>
	<div class="slider-container">
	    <ul id="slider_athlete_5c83e77ee0c0a" class="carousel-slider products-grid clearfix"
	        data-items="[ [0, 2], [426, 3] ]"
	        data-autoscroll="2"
	        data-scroll="item"
	        data-rewind="1"
		>



		<?php
						$id = $_GET["id"];
						$oid = $_GET["oid"];
						$ooid = $_GET["ooid"];
						$sorgu = $connect->query("SELECT * FROM products where ProductMainCategoryID=3 order by ProductID DESC limit 7", PDO::FETCH_ASSOC);
            			if($sorgu->rowCount()){
          				foreach ($sorgu as $kayit) { 
								$option_id=$kayit['optionID'];
								$options_id=$kayit['optionsID'];
								$product_id = $kayit['ProductID'];						
          				 ?>

	    	<li class="item  sale-product">
	            <div class="item-wrap d-flex justify-content-center align-items-center flex-column">
					<a style="width:167px!important;height:300px!important;"  href="product.php?s=&id=<?php echo $product_id ?>&oid=<?php echo $option_id ?>&ooid=<?php echo $options_id?>" title="'.$product_name.'" title="Dafron Online" class="product-image d-flex justify-content-center align-items-center ">
						<div  class="sale-label label-bottom-left"></div>	
						<img class="additional_img d-flex justify-content-center align-items-center" src="<?php echo $kayit['ProductImage'] ?>"    />	
						<img class="regular_img" src="<?php echo $kayit['ProductImage'] ?>"   />               
					</a>
                <div class="product-hover">
	                <h2 class="product-name d-flex justify-content-center align-items-center text-center">
						<a href="product.php?s=&id=<?php echo $kayit["ProductID"] ?>" title="Dafron Online"><?php echo $kayit["ProductName"] ?></a>
					</h2>
	                <div class="price-box d-flex justify-content-center align-items-center text-center">
                        <p class="old-price">
							<span class="price-label"></span>
							<span class="price" id="old-price-11_slider">
								<?php echo $kayit['ProductPrice'] ?>  ₺              
							</span>
						</p> 
					</div>
	            </div>
                <div class="name">	                		                	                
                    <div class="actions" style="top: 196px;">
	                    <ul class="add-to-links">
						 	<li class=""><button type="button" title="Sepete ekle" class="button btn-cart icon-white" onclick="kaydet(<? echo $kayit["ProductID"]; ?>)" data-click="setLocation('#')"><span><span>Sepete ekle</span></span></button></li>
						    <li><a title="Alışveriş listesine ekle" href="shopping-list-add.php?a=<?php echo $kayit["ProductID"];?>" class="link-wishlist icon-white">Alışveriş listesine ekle</a></li>
                            <li class=""><a title="Karşılaştır" href="#" class="link-compare icon-white">Karşılaştır</a></li>
                        </ul>
	                    <div class="clear"></div>
						<button type="button" class="button quick-view" style="opacity: 0;"><span><span>Hızlı Bak</span></span></button>
					</div>
                </div>
				<script>
							function kaydet(product_id){
							$.ajax({ // Ajax işlemini başlatıyoruz.
							type:'GET', // Veri gönderme metodunu Post olarak seçiyoruz.
							url:"fast-shopping-cart-add.php?a=<?echo $_SESSION["UserID"];?> &b="+product_id // Verilerin postlanağı adresi belirliyoruz.
							});}
						
							
				</script>
		            
	            </div>
            </li>

        <?php } } ?>
        		                



        </ul>
	</div>
</div>

</div>
<div class="col-md-6" style="padding:2.5% 5%;"> 

<div class="product-slider-container category-products  product-columns-3">
	<div class="clearfix title-container">
		<h3 style="font-size:24px;">Tofaş Basketbol Lisanslı Ürünleri</h3><div class="slider-nav" id="slider_athlete_5c83e77ee0c0a_nav" ><ul></ul></div>
	</div>
	<div class="slider-container">
	    <ul id="slider_athlete_5c83e77ee0c0a" class="carousel-slider products-grid clearfix"
	        data-items="[ [0, 2], [426, 3] ]"
	        data-autoscroll="2"
	        data-scroll="item"
	        data-rewind="1"
		>
					<?php
						$id = $_GET["id"];
						$oid = $_GET["oid"];
						$ooid = $_GET["ooid"];
						$sorgu1 = $connect->query("SELECT * FROM products where ProductMainCategoryID=2 order by ProductID DESC limit 7", PDO::FETCH_ASSOC);
            			if($sorgu1->rowCount()){
          				foreach ($sorgu1 as $kayit1) {
							$option_id1=$kayit1['optionID'];
							$options_id1=$kayit1['optionsID'];
							$product_id1 = $kayit1['ProductID'];	
          				 ?>
	    	<li class="item  sale-product">
	            <div  class="item-wrap d-flex justify-content-center align-items-center flex-column">
					<a style="width:167px!important;height:300px!important;"   href="product.php?s=&id=<?php echo $product_id1 ?>&oid=<?php echo $option_id1 ?>&ooid=<?php echo $options_id1?>"  class="product-image new5">
	                           <img class="additional_img d-flex justify-content-center align-items-center" src="<?php echo $kayit1['ProductImage'] ?>"  alt="Dafron Online" />	                
							   <img class="regular_img" src="<?php echo $kayit1['ProductImage'] ?>"   />                
					</a>
                <div class="product-hover">
	                <h2 class="product-name d-flex justify-content-center align-items-center text-center">
						<a href="#"><?php echo $kayit1['ProductName'] ?></a>
					</h2>
	                <div class="price-box d-flex justify-content-center align-items-center text-center">
                        <p class="old-price">
							<span class="price-label"></span>
							<span class="price" id="old-price-11_slider">
								<?php echo $kayit1['ProductPrice'] ?>  ₺              
							</span>
						</p>
					</div>
	            </div>
                <div class="name">	                		                	                
                    <div class="actions" style="top: 196px;">
	                    <ul class="add-to-links">
						 	<li class=""><button type="button" title="Sepete ekle" class="button btn-cart icon-white" onclick="kaydet(<?echo $kayit1['ProductID']; ?>)" data-click="setLocation('#')"><span><span>Sepete ekle </span></span></button></li>
						    <li><a title="Alışveriş listesine ekle" href="shopping-list-add.php?a=<?php echo $kayit1["ProductID"];?>" class="link-wishlist icon-white">Alışveriş listesine ekle</a></li>
                            <li class=""><a title="Karşılaştır" href="#" class="link-compare icon-white">Karşılaştır</a></li>
                        </ul>
	                    <div class="clear"></div>
						<button type="button" class="button quick-view" style="opacity: 0;"><span><span>Hızlı Bak</span></span></button>
					</div>
                </div>
				
		            
	            </div>
            </li>
			


        <?php } } ?>



        		               
        </ul>
	</div>
</div>

</div>
</div>
</div>



</div>	                </div>
	            </div>
            </div>
	        <!-- brands slider BOF -->

<!-- brands slider EOF -->

        </div>
	    	    

   </div>
</div>
</body>