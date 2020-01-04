 <?php
			include	 'config.php';


				$userID = $_SESSION["userID"];	
				$hatamesaji = $_POST['hatamesaji'];
				$kuponkodd = $_POST['kuponkodalani'];
				echo $hatamesaji;														

				$connect->exec("UPDATE coupon SET hatamesaji= '$hatamesaji' where couponID = '$kuponkodd'; ");										 
										
						?>