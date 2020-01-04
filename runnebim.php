<?php
// Define database
/*

// Connecting database
try {
	$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}


	$res = $connect->exec("SELECT * from cdItem");
    while ($row = $res->fetch()) {
		$productid = $row['ItemCode'];
		echo $productid; echo '</br>';
	}

	if ($baglanti)
    	    echo "<span style='color:green'>Bağlandı2</span>"."</br>"; 	
	

*/




$baglanti = odbc_connect('DRIVER={SQL Server};SERVER=91.93.128.76, 1434;DATABASE=V3_Test','SA','Giz2000.');
//$sorgu2 = odbc_exec($baglanti,"UPDATE $tablo SET adisoyadi='Suat DİLEK' where tcno='$tc'");


$sorgu = odbc_exec($baglanti,"SELECT * FROM (
 SELECT * FROM func_ProductPriceAndInventory_Dafron(N'TR','PSF','PSF','Dafron','1-2-2-2')
) as ReportTable ");


while( $bilgi = odbc_fetch_array($sorgu) ){
$ProductCode=$bilgi["ProductCode"];
$ProductDescription=$bilgi["ProductDescription"];
$ColorCode=$bilgi["ColorCode"];
$ColorDescription=$bilgi["ColorDescription"];
$VatRate=$bilgi["VatRate"];
$Price1=$bilgi["Price1"];
$WarehouseALLInventoryQty=$bilgi["WarehouseALLInventoryQty"];
$Barcode=$bilgi["Barcode"];
$ProductHierarchyLevel01=$bilgi["ProductHierarchyLevel01"];
$ProductHierarchyLevel02=$bilgi["ProductHierarchyLevel02"];
$Price1=$bilgi["Price1"];
 echo '</br> <b>Ürün Kodu : </b> ';echo $ProductCode;
 echo '</br> <b>Ürün Açıklaması : </b> ';echo $ProductDescription;
 echo '</br> <b>Ürün Renk Kodu : </b> ';echo $ColorCode;
 echo '</br> <b>Ürün Renk Açıklaması : </b> ';echo $ColorDescription;
 echo '</br> <b>Vergi Sınıfı : </b> ';echo $VatRate;
 echo '</br> <b>Fiyat : </b> ';echo $Price1;
 echo '</br> <b>Toplam Stok :</b> ';echo $WarehouseALLInventoryQty;
 echo '</br> <b>Barkod :</b> ';echo $Barcode;
 echo '</br> <b>Ana Kategori :</b> ';echo $ProductHierarchyLevel01;
 echo '</br> <b>Kategori :</b> ';echo $ProductHierarchyLevel02;
 echo '</br></br>';
}
 
 /*
 $sorgu = odbc_exec($baglanti,"SELECT * FROM cdItem where ItemCode='101715.10983' ");


while( $bilgi = odbc_fetch_array($sorgu) ){
	echo 'Ürun Kodu : ';
	$itemkodu = $bilgi["ItemCode"];	
	  echo $bilgi["ItemCode"];
	  echo '</br> ';
	  echo 'Vergi Sınıfı : ';
	  echo $bilgi["ItemTaxGrCode"];
	$sorgu1 = odbc_exec($baglanti, "SELECT * from cdItemDesc where ItemCode = '$itemkodu'");
		$bilgi1 = odbc_fetch_array($sorgu1);
	$sorgu2 = odbc_exec($baglanti, "SELECT * from prItemVariant where ItemCode = '$itemkodu'");
		$bilgi2 = odbc_fetch_array($sorgu2);
	$itemcolor = $bilgi2['ColorCode'];
	$itemnumber = $bilgi2['ItemDim1Code'];
	
  $itemdesc = $bilgi1["ItemDescription"];
  echo '</br>';
  echo 'Ürün Açıklaması : ';
  echo $itemdesc;
  echo '</br>Ürün Rengi : ';
  echo $itemcolor;
  echo '</br> Ürün Numarası :';
  echo $itemnumber;
  echo '</br> </br>';

}
*/
/*
$sorgu = odbc_exec($baglanti, "SELECT TOP 50 * FROM trOrderHeader");
	while($bilgi = odbc_fetch_array($sorgu)){
	echo '</br>';
	echo $bilgi["OrderHeaderID"];
	}

*/
/*
$deger1 = "865EDAE5-34DB-4D7C-A2E4-A9C700AFAE11";
$deger2 = "S";
$sql = "INSERT INTO AllOrders (OrderHeaderID,OrderTypeCode, ProcessCode,CurrAccTypeCode,CurrAccCode,CompanyCode,OfficeCode,DocCurrencyCode) VALUES ('$deger1','11','$deger2','','','11','','')";
$sorgu = odbc_exec($baglanti, $sql);
*/




 
	

//$dbh = new PDO("sqlsrv:Server=91.93.128.76, 1434;Database=V3_Test", "SA", "Giz2000.");
?>