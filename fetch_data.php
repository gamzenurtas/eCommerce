

<script src="assets/js/fontawesome.min.js" rel="stylesheet"></script>
<script src="assets/js/all.min.js" rel="stylesheet"></script>
 <script type="text/javascript" src="assets/js/prototype.js"></script>
<script type="text/javascript" src="assets/js/jquery-1.11.0.min.js"></script>

<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/jquery/jquery-migrate.min.js"></script>





<?php


//fetch_data.php

include('config.php');
$katid = $_SESSION['katid'];
if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM products WHERE isActive = '1' && ProductMainCategoryID = '$katid'
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND ProductPrice BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["ProductColorCode"]))
	{
		$color_filter = implode("','", $_POST["ProductColorCode"]);
		$query .= "
		 AND ProductColorCode IN('".$color_filter."')
		";
	}
	if(isset($_POST["optionValuesName"]))
	{
		$option_filter = implode("','", $_POST["optionValuesName"]);
		$query .= "
		 AND optionValuesName IN('".$option_filter."')
		";
	}
	if(isset($_POST["ProductCode"]))
	{
		$storage_filter = implode("','", $_POST["ProductCode"]);
		$query .= "
		 AND ProductCode IN('".$storage_filter."')
		";
	}

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
	foreach($result as $row)
		{
			$option_id=$row['optionID'];
						$options_id=$row['optionsID'];

		$product_id = $row['ProductID'];
        $product_name = $row['ProductName'];
        $product_price = $row['ProductPrice'];
		$product_img = $row['ProductImage'];
		$product_img2 = $row['ProductImage2'];
		$product_color = $row['ProductColorCode'];
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
	
		
			$output .= '
			<form id="form1" name="form1" method="post" class="product__params">		
		<li class="item "> 
										<div class="item-wrap d-flex justify-content-center align-items-center flex-column">
											<a style="height:300px;width:200px;"href="product.php?s=&id='.$product_id.'&oid='.$option_id.'&ooid='.$options_id.'" title="'.$product_name.'" title="" class="product-image new4">
											<img id=" "  class="additional_img" src="'.$product_img.'"  width="200px" height="300px" alt="Spor ayakkabı" />	
											<img class="regular_img" id=" largeImage" src="'.$product_img2.'"  width="200px" height="300px" alt="Spor ayakkabı" />				</a>
											<div class="product-hover">
												<h2 class="product-name d-flex justify-content-center align-items-center text-center"><a class="text-dark" href="product.php?s=&id='.$product_id.'&oid='.$option_id.'&ooid='.$options_id.'" title="'.$product_name.'">'.$product_name.'</a></h2>
												<div class="price-box d-flex justify-content-center align-items-center text-center">
													<span class="regular-price" id="product-price-107">
														<span class="price">₺'.$product_price.'</span>     
														<span class="price" style="text-decoration:line-through;">₺'.$product_price.'</span>                                 
													</span>
													
												</div>
											
											</div>

											<div class="name">
												<div class="actions" style="top:200px">
													<ul class="add-to-links">
														<li><button type="button" title="Sepete ekle" class="button btn-cart icon-white example--1" onclick="kaydet('.$product_id.')"><span><span>Sepete Ekle</span></span></button></li>
														<li><a title="Alışveriş listesine ekle" href="shopping-list-add.php?a='.$product_id.'" class="link-wishlist icon-white">Alışveriş listesine ekle</a></li>
														<li> <a title="Karşılaştır" href="#" class="link-compare icon-white">Karşılaştır</a></li>
													</ul>
													<div class="clear"></div>
													<button type="button" class="button quick-view"  style="opacity: 0;"><span class="pr-29"><span>Hızlı Bak</span></span></button>
												</div>
											</div>								
										</div>
									</li>
										<ul class="configurable-swatch-list configurable-swatch-sneakers_color clearfix d-flex justify-content-center align-items-center text-center">
													<li class="option-yellow-purple" data-product-id="107" data-option-label="yellow-purple">
														<a href="javascript:void(0)" urple" class="swatch-link swatch-link-134 has-image"  style="height: 32px; width: 32px;">
															<span  class="swatch-label" style="height: 30px; width: 30px; line-height: 30px;">
																<img src="'.$alt_img1.'"  width="30" height="30" />
															</span>
														</a>
													</li>
												
													<li class="option-purple-blue" data-product-id="107" data-option-label="purple-blue">
														<a href="javascript:void(0)" name="purple-blue" class="swatch-link swatch-link-134 has-image" title="purple-blue" style="height: 32px; width: 32px;">
															<label id="thumbs" class="swatch-label" style="height: 30px; width: 30px; line-height: 30px;">
																<img src="'.$alt_img2.'" alt="purple-blue" width="30" height="30" />
															</label>
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
</form>		
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}



$katid = $_GET["kategori_id"];

$dynamic_list = "";
if(isset($_GET["cat"])){
    $res = $connect->prepare("SELECT * FROM products WHERE ProductID=$id");
    $res->execute([$_GET["cat"]]);
}else{
$connect->prepare("SELECT * FROM products  where ProductMainCategoryID=$katid LIMIT 10");
}



 




?>
	
	
