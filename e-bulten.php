<?php
										require 'config.php';
											
										$connect->exec("INSERT INTO ebulten (userEmail) VALUES ('".$_POST["userEmail"]."')");
																	
										
			?>