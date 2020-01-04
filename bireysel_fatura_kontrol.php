<?php
										require 'config.php';
											
			$connect->exec("INSERT INTO bireysel_fatura (bireysel_faturaName, bireysel_faturaSurname, bireysel_faturaPhone, bireysel_faturaEmail, bireysel_fatura_il, bireysel_fatura_ilce, bireysel_faturaAdres  ) VALUES ('" . $_POST["bireysel_faturaName"] . "' , '" . $_POST["bireysel_faturaSurname"] . "', '" . $_POST["bireysel_faturaPhone"] . "', '" . $_POST["bireysel_faturaEmail"] . "', '" . $_POST["bireysel_fatura_il"] . "', '" . $_POST["bireysel_fatura_ilce"] . "', '" . $_POST["bireysel_faturaAdres"] . "')");
				$son_id = $connect->lastInsertId();
								$_SESSION['bireysel_fatura_id'] = $son_id;					

			?>