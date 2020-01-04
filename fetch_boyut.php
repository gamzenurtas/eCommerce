
<?php
 include "config.php";
$id = $_GET["id"];

$res = $connect->prepare("SELECT DISTINCT  p.optionsID,p.optionID,p.ProductImage,so.stockID,s.stockID,p.ProductName,po.productsID,p.ProductID,po.optionsValuesID,po.id,p.ProductID,so.productOptionsID,ov.optionValuesID,ov.optionsID,o.optionsID
FROM productsoptions as po 
INNER JOIN products as p ON po.productsID=p.ProductID
INNER JOIN stockoptions as so ON so.productOptionsID=po.id
INNER JOIN stock as s ON s.stockID=so.stockID
INNER JOIN optionvalues as ov ON ov.optionValuesID=po.optionsValuesID
INNER JOIN options as o ON o.optionsID=ov.optionsID
 where  urunID='".$_POST["p_id"]."'&&  p.optionsID='".$_POST["oo_id"]."'&& p.optionID='".$_POST["o_id"]."'     ");
    $res->execute([$_GET["cat"]]);
$userid = $_SESSION["UserID"];
$output1=''; 
 
while($row = $res->fetch()){
	  $output .= ' <div class="v-siyah radio-variant" data-bind="event: { mouseover: function() { colorVariantHover(&quot;&quot;, &quot;Siyah&quot;) }, mouseout: colorVariantBlur, click: setActiveVariantContainer}">
            <input data-bind="checked: variantProperties().observe(&quot;Renk&quot;), click: function() { colorVariantSelected(&quot;Siyah&quot;); return true; }" id="'.$row["ProductID"].'" type="radio" class="radio" name="Renk" value="Siyah">

            <label class="label white thumbnail" data-value="Siyah" for="'.$row["ProductID"].'" data-propertyname="Renk" data-position="3">
                <img id="renk" alt="Siyah" class=""  src="'.$row["ProductImage"].'" width="80" height="80">
            </label>
        </div>';
	
}


echo $output;
echo $output1;



?>