
<?php

error_reporting(0);

//fetch_data.php

include('config.php');
$katad =$_SESSION["katad"] ;
if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM products  where isActive = '1' && ProductName LIKE '$katad'
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND ProductPrice BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		 AND brand IN('".$brand_filter."')
		";
	}
	if(isset($_POST["ProductName"]))
	{
		$ram_filter = implode("','", $_POST["ProductName"]);
		$query .= "
		 AND ProductName IN('".$ram_filter."')
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
		$product_id = $row['ProductID'];
        $product_name = $row['ProductName'];
        $product_price = $row['ProductPrice'];
		$product_img = $row['ProductImage'];
		$product_img2 = $row['ProductImage2'];
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
										<div class="item-wrap">
											<a style="height:300px;width:200px;" href="product.php?s=&id='.$product_id.'" title="Spor ayakkabı" class="product-image">
											<img id="product-collection-image-107"  class="additional_img" src="'.$product_img.'"  width="217" height="217" alt="Spor ayakkabı" />					<img class="regular_img" id="product-original-image-107" src="'.$product_img2.'"  width="217" height="217" alt="Spor ayakkabı" />				</a>
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
												<div class="actions" style="top:200px">
													<ul class="add-to-links">
														<li><button type="button" title="Sepete ekle" class="button btn-cart icon-white" onclick="kaydet('.$product_id.')"><span><span>Sepete Ekle</span></span></button></li>
														<li><a title="Alışveriş listesine ekle" href="shopping-list-add.php?a='.$product_id.'" class="link-wishlist icon-white">Alışveriş listesine ekle</a></li>
														<li> <a title="Karşılaştır" href="#" class="link-compare icon-white">Karşılaştır</a></li>
													</ul>
													<div class="clear"></div>
													<button type="button" class="button quick-view"  style="opacity: 0;"><span class="pr-29"><span>Hızlı Bak</span></span></button>
												</div>
											</div>								
										</div>
									</li>
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
}
else{
    $res = $connect->prepare("SELECT * FROM products  where ProductMainCategoryID=$katid LIMIT 10");
    $res->execute();
}


 

$productCount = $res->rowCount();
if ($productCount > 0) {
    while ($row = $res->fetch()) {
        $product_id = $row['ProductID'];
        $product_name = $row['ProductName'];
        $product_price = $row['ProductPrice'];
		$product_img = $row['ProductImage'];
		$product_img2 = $row['ProductImage2'];
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

		
	
							';
    }
}
else {
    $dynamic_list = "We have no products listed here.";
}
$connect = null;



?>

