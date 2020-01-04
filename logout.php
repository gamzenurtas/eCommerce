<?php
ob_start(); 

	require 'config.php';

	session_destroy();
						
	$errMsg2 =  "<script>
$('body').overhang({
  type: 'success',
  message: 'Başarıyla çıkış yaptınız.',
  duration: 3,
});</script>";
	require 'index.php';

							echo $errMsg2;
							ob_end_flush(); 


?>
<link href="../4mynot4give/assets/css/overhang.min.css" rel="stylesheet">



    		   		       <script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>

		   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../4mynot4give/assets/js/index.js"></script>

		   

		    <script src="../4mynot4give/assets/js/overhang.min.js"></script>