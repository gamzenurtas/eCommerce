<?php
																				include	 'config.php';
																				session_start();

																				$userID = $_SESSION["UserID"];
																				$UserEmail = $_POST["UserEmail"];
																				$UserPassword = $_POST["UserPassword"];
																				$UserFirstName = $_POST["UserFirstName"];
																				$UserLastName = $_POST["UserLastName"];
																				$UserPhone = $_POST["UserPhone"];
																			
																																								
$connect->exec("UPDATE customers SET UserEmail= '$UserEmail' WHERE UserID='$userID' ");
										 
										
						?>