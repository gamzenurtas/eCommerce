<?php
$mysqli = new mysqli("localhost","dafron_dbdemo","4mynot4give","dafron_dbdemo");/* Bağlantıyı Kontrol Et */

$ret ='';
$isim =  $mysqli->real_escape_string($_POST['isim']);
$sql="SELECT * FROM customers WHERE UserEmail='".$isim."'";

$result = $mysqli->query($sql);
$nt = $result->fetch_array();
if ($result->num_rows){
	    $ret .= '<span class="kirmizi"><i class="fa fa-times"></i>Email ismi kullanılamaz!</span>';

} else {
	    $ret .= '<span class="yesil"><i class="fa fa-check"></i>Email ismi kullanılabilir.</span>';

}
echo $ret;
?> 