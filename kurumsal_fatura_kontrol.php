<?php
										require 'config.php';
											
										$connect->exec("INSERT INTO kurumsal_fatura (kurumsal_faturaUnvan, kurumsal_fatura_ad, kurumsal_fatura_soyad, kurumsal_fatura_phone, kurumsal_faturaVergiDairesi, kurumsal_faturaVergiNo, kurumsal_fatura_il, kurumsal_fatura_ilce, kurumsal_fatura_adres) VALUES ('" . $_POST["kurumsal_faturaUnvan"] . "' , '" . $_POST["kurumsal_fatura_ad"] . "', '" . $_POST["kurumsal_fatura_soyad"] . "','" . $_POST["kurumsal_fatura_phone"] . "', '" . $_POST["kurumsal_faturaVergiDairesi"] . "', '" . $_POST["kurumsal_faturaVergiNo"] . "', '" . $_POST["kurumsal_fatura_il"] . "', '" . $_POST["kurumsal_fatura_ilce"] . "', '" . $_POST["kurumsal_fatura_adres"] . "')");
																	
										require 'kargo_bilgi.php';

			?>