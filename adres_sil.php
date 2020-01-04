<?php
										include	 'config.php';
																				
																				$id = $_GET["id"];

										
										
										
																	$connect->exec("DELETE from ship where ShipID = '$id' ");
																	
																	header("Location: account.php"); 
										 
										
						?>
						
			