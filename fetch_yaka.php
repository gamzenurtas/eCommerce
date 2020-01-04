<?php
 include "config.php";
$id = $_GET["id"];

$res = $connect->prepare("SELECT DISTINCT  secenek4,secenek2,secenek3,secenek1,urunID FROM stock where urunID='".$_POST["p_id"]."' && secenek3='".$_POST["yakaAdi"]."' && secenek1='".$_POST["boyutAdi"]."' group by secenek4  ");
    $res->execute([$_GET["cat"]]);
$userid = $_SESSION["UserID"];
$output= '<option value="">Kol Tipi Seçiniz</option>';
while($row = $res->fetch()){
	
    $output .= '<option value="'.$row["secenek4"].'">'.$row["secenek4"].'</option>';
}


echo $output;



?>