<?php
 include "config.php";
$id = $_GET["id"];

$res = $connect->prepare("SELECT * secenek4,secenek2,secenek3,secenek1,urunID,renkimg FROM stock ");
    $res->execute([$_GET["cat"]]);
$userid = $_SESSION["UserID"];
$output= '<img src="assets/images/samples/avatar-10.jpg" alt="">';
while($row = $res->fetch()){
	
    $output .= '<img src="'.$row["renkimg"].'" alt="resimfetch">';
}
echo $output;



?>