<?php
										require 'config.php';

									



	
$connect->exec("INSERT INTO contact (messageID, messageName, messageEmail, messageText) VALUES ('" . $_POST["messageID"] . "', '" . $_POST["messageName"] . "', '" . $_POST["messageEmail"] . "', '" . $_POST["messageText"] . "')");

	
	require 'contact.php';
						





					
										

									?>


