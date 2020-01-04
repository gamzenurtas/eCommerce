<?php
										require 'config.php';

									
        $EmailSay = $connect->prepare("SELECT * FROM customers WHERE UserEmail = ?");
		   $EmailSay->execute(array($_POST['UserEmail']));
        $kontrol = $EmailSay->fetch(PDO::FETCH_ASSOC);
		$myip = strval( $_SERVER['REMOTE_ADDR']);


if($kontrol>0){

$errMsg =  "<script>
$('body').overhang({
  type: 'error',
  message: 'Bu Mail Zaten Kayıtlı!!',
    duration: 5,

  closeConfirm: true
});</script>";
					require 'register.php';
						echo $errMsg;
}
else{
	
$connect->exec("INSERT INTO customers (UserEmail, UserPassword, UserFirstName, UserLastName, UserIP, UserPhone, UserType, companyName, kurumsalUnvan, vergiNo, vergiDairesi, tel) VALUES ('" . $_POST["UserEmail"] . "', '" .  md5($_POST["UserPassword"]) . "', '" . $_POST["UserFirstName"] . "', '" . $_POST["UserLastName"] . "', '" .$myip. "', '" . $_POST["UserPhone"] . "', '2', '" . $_POST["companyName"] . "', '" . $_POST["kurumsalUnvan"] . "', '" . $_POST["vergiNo"] . "', '" . $_POST["vergiDairesi"] . "', '" . $_POST["tel"] . "')");
$errMsg1 ="<script>$('body').overhang({
  type: 'success',
  message: 'Başarıyla üye oldunuz.'
});</script>";
	require 'login.php';
							echo $errMsg1;

}



					
										

									?>
									
<link href="../4mynot4give/assets/css/overhang.min.css" rel="stylesheet">



    		   		       <script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>

		   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../4mynot4give/assets/js/index.js"></script>

		   

		    <script src="../4mynot4give/assets/js/overhang.min.js"></script>


