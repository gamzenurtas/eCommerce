<?php 
 include "config.php";
$id = $_GET["id"];

$res = $connect->prepare("SELECT DISTINCT  secenek3,urunID FROM  color as c INNER JOIN products as p ON p.ProductID=c.product_id INNER JOIN stock as s ON p.ProductID=s.urunID where   urunID='".$_POST["p_id"]."'  group by secenek3  ");
    $res->execute([$_GET["cat"]]);
$userid = $_SESSION["UserID"];
while($row = $res->fetch()){
	
    $output .= '<option value="'.$row["secenek1"].'">'.$row["secenek3"].'</option>';
	  
}

echo $output; 
?>