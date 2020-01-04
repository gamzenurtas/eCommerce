<?php
										require 'config.php';

									
   
		$userID = $_SESSION["UserID"];	
		$id1=$_SESSION["urunid1"]; 	
		$saattime = strval( date('H:i'));
		$tarihdate = strval( date("d/m/Y"));
		$myip = strval( $_SERVER['REMOTE_ADDR']); 



	
$connect->exec("INSERT INTO kullanici_yorum (urunID, userID, yorumPuan, yorumBaslik, yorum, tarih, saat, ip) 
VALUES ('" . $id1 . "', '" . $userID . "', '" . $_POST["yorumPuan"] . "', '" . $_POST["yorumBaslik"] . "', '" . $_POST["yorum"] . "', '" . $tarihdate . "', '" . $saattime . "', '" . $myip . "')");


						

?>
									


