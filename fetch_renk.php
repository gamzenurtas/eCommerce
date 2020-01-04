<?php
 include "config.php";
$id = $_GET["id"];
$res = $connect->prepare("SELECT DISTINCT  secenek2,secenek1,renkimg,secenek3,secenek4,urunID,ProductName,renk_img,ProductID,secenek2,renk_id FROM  color as c INNER JOIN products as p ON p.ProductID=c.product_id INNER JOIN stock as s ON p.ProductID=s.urunID where urunID='".$_POST["p_id"]."' && secenek4='".$_POST["renkAdi"]."' && secenek3='".$_POST["yakaAdi"]."' && secenek1='".$_POST["boyutAdi"]."' && secenek2=renk_id  ");
    $res->execute([$_GET["cat"]]);
$userid = $_SESSION["UserID"];
$output= '';
while($row = $res->fetch()){
	
    $output .= ' <div class="v-siyah radio-variant" data-bind="event: { mouseover: function() { colorVariantHover(&quot;&quot;, &quot;Siyah&quot;) }, mouseout: colorVariantBlur, click: setActiveVariantContainer}">
            <input data-bind="checked: variantProperties().observe(&quot;Renk&quot;), click: function() { colorVariantSelected(&quot;Siyah&quot;); return true; }" id="'.$renk_image.'" type="radio" class="radio" name="Renk" value="Siyah">

            <label class="label white thumbnail" data-value="Siyah" for="'.$renk_image.'" data-propertyname="Renk" data-position="3">
                <img id="renk" alt="Siyah" class=""  src="'.$row["renk_img"].'" width="80" height="80">
            </label>
        </div>';
}


echo $output;



?>