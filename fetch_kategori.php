<?php 
 include "config.php";
$id = $_GET["id"];

$res = $connect->prepare("SELECT DISTINCT  secenek1,urunID FROM  color as c INNER JOIN products as p ON p.ProductID=c.product_id INNER JOIN stock as s ON p.ProductID=s.urunID where   urunID='".$_POST["p_id"]."' && secenek2=renk_id && renk_img='".$_POST["renkId"]."'  group by secenek3  ");
    $res->execute([$_GET["cat"]]);
$userid = $_SESSION["UserID"];
while($row = $res->fetch()){
	
    $output .= '<option value="'.$row["secenek1"].'">'.$row["secenek1"].'</option>';
	  
}

echo $output; 
?>