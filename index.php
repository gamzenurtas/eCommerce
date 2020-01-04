<!DOCTYPE html>
<html lang="TR">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<title>DAFRON ONLINE | DAİMA GÜCÜN ÜZERİNDE!</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sports Club, League and News HTML Template">
	<meta name="author" content="Dan Fisher">
	<meta name="keywords" content="sports club news HTML template"> 
	  
	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="assets/images/soccer/favicons/favicon.png">
	<link rel="apple-touch-icon" sizes="120x120" href="assets/images/soccer/favicons/favicon.png">
	<link rel="apple-touch-icon" sizes="152x152" href="assets/images/soccer/favicons/favicon.png">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<!-- Google Web Fonts
	================================================== -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CSource+Sans+Pro:400,700" rel="stylesheet">

	<!-- CSS
	================================================== -->
	<!-- Vendor CSS -->
	<link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
	<link href="assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
	<link href="assets/vendor/slick/slick.css" rel="stylesheet">
	
	<!-- Template CSS-->
	<link href="assets/css/style-soccer.css" rel="stylesheet">
<link href="assets/css/theme.css" rel="stylesheet">

	<link href="assets/css/red2.css" rel="stylesheet">
			<link href="assets/css/fontawesome.min.css" rel="stylesheet">
		<link href="assets/css/all.min.css" rel="stylesheet">

	<script src="assets/js/all.min.js"></script>
	<script src="assets/js/fontawesome.min.js"></script>

	<!-- Template CSS-->

	<!-- Custom CSS-->




</head>
<body class="nuewin">

	<div class="site-wrapper clearfix">

		<?php include"header.php"?>

		<?php include"slider.php"?>	
		<?php include"slider4.php"?>	
<ul class="df-color-pallete">
			  <?php 
					include "config.php";
					$dynamic_list = "";
					for($sayi = 1; $sayi < 5; $sayi++) {

						$res = $connect->prepare("SELECT * FROM altbanner WHERE altbannerID=$sayi");
						$res->execute([$_GET["cat"]]);
						$productCount = $res->rowCount();
						if ($productCount > 0) {
						while ($row = $res->fetch()) {
							$altbannerName= $row['altbannerName'];
							$altbannerImage = $row['altbannerImage'];
							$altbannerLink = $row['altbannerLink'];
					echo '
						<li>
							<a href="category-grid.php">
								<figure class="nuewinbannerstyle1 color4">
								  <img src="'.$altbannerImage.'" alt="nuewin000" />
								  <figcaption>
									<h2>'.$altbannerName.'</h2>
								  </figcaption>
								</figure>
							</a>	
						</li>
						';
					}	}
						
						}
						?>		
</ul>
<ul class="df-color-pallete">
	 <?php 
					include "config.php";
					$dynamic_list = "";
					for($sayi = 5; $sayi < 9; $sayi++) {

						$res = $connect->prepare("SELECT * FROM altbanner WHERE altbannerID=$sayi");
						$res->execute([$_GET["cat"]]);
						$productCount = $res->rowCount();
						if ($productCount > 0) {
						while ($row = $res->fetch()) {
							$altbannerName= $row['altbannerName'];
							$altbannerImage = $row['altbannerImage'];
							$altbannerLink = $row['altbannerLink'];
					echo '
						<li>
							<a href="category-grid.php">
								<figure class="nuewinbannerstyle1 color4">
								  <img src="'.$altbannerImage.'" alt="nuewin000" />
								  <figcaption>
									<h2>'.$altbannerName.'</h2>
								  </figcaption>
								</figure>
							</a>	
						</li>
						';
					}	}
						
						}
						?>		
</ul>
<ul class="df-color-pallete">
	<?php 
					include "config.php";
					$dynamic_list = "";
					for($sayi = 9; $sayi < 13; $sayi++) {

						$res = $connect->prepare("SELECT * FROM altbanner WHERE altbannerID=$sayi");
						$res->execute([$_GET["cat"]]);
						$productCount = $res->rowCount();
						if ($productCount > 0) {
						while ($row = $res->fetch()) {
							$altbannerName= $row['altbannerName'];
							$altbannerImage = $row['altbannerImage'];
							$altbannerLink = $row['altbannerLink'];
					echo '
						<li>
							<a href="category-grid.php">
								<figure class="nuewinbannerstyle1 color4">
								  <img src="'.$altbannerImage.'" alt="nuewin000" />
								  <figcaption>
									<h2>'.$altbannerName.'</h2>
								  </figcaption>
								</figure>
							</a>	
						</li>
						';
					}	}
						
						}
						?>	
</ul>
				<?php include"slider3.php"?>	

		
		<!-- Content
		================================================== -->
				




</html>
				</html>
		
		<!-- Content / End -->
		

		<!-- Footer
		================================================== -->
		<?php include"footer.php"?>
		<!-- Footer / End -->
		
		
		<!-- Login/Register Tabs Modal -->
		<div class="modal fade" id="modal-login-register-tabs" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-lg modal--login" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>
							<div class="modal-body">
				
								<div class="modal-account-holder">
									<div class="modal-account__item">
				
										<!-- Register Form -->
										<form  class="modal-form">
											<h5>Şimdi Kayıt Zamanı</h5>
											<div class="form-group">
												<input type="email" class="form-control" placeholder="Mail Adresinizi Giriniz...">
											</div>
											<div class="form-group">
												<input type="password" class="form-control" placeholder="Şifrenizi Giriniz...">
											</div>
											<div class="form-group">
												<input type="password" class="form-control" placeholder="Şifrenizi Tekrar Giriniz...">
											</div>
											<div class="form-group form-group--submit">
												<a href="#" class="btn btn-primary btn-block">Üyelik Oluştur</a>
											</div>
											<div class="modal-form--note">
													Hesabınızı etkinleştirmek için bir bağlantı içeren gelen kutunuzda bir onay e-postası alacaksınız. </div>
										</form>
										<!-- Register Form / End -->
				
									</div>
									<div class="modal-account__item">
				
										<!-- Login Form -->
										<form  class="modal-form">
											<h5>Giriş Yap</h5>
											<div class="form-group">
												<input type="email" class="form-control" placeholder="Mail Adresinizi Giriniz...">
											</div>
											<div class="form-group">
												<input type="password" class="form-control" placeholder="Şifrenizi Giriniz...">
											</div>
											<div class="form-group form-group--pass-reminder">
												<label class="checkbox checkbox-inline">
													<input type="checkbox" id="inlineCheckbox1" value="option1" checked=""> Beni Hatırla
													<span class="checkbox-indicator"></span>
												</label>
												<a href="#">Şifremi Unuttum?</a>
											</div>
											<div class="form-group form-group--submit">
												<a href="#" class="btn btn-primary-inverse btn-block">Şimdi Giriş Yap</a>
											</div>
											<div class="modal-form--social">
												<h6>veya Sosyal Medya Hesabı ile Giriş Yapın</h6>
												<ul class="social-links social-links--btn text-center">
													<li class="social-links__item">
														<a href="#" class="social-links__link social-links__link--lg social-links__link--fb"><i class="fab fa-facebook-f"></i></a>
													</li>
													<li class="social-links__item">
														<a href="#" class="social-links__link social-links__link--lg social-links__link--twitter"><i class="fab fa-twitter"></i></a>
													</li>
													<li class="social-links__item">
														<a href="#" class="social-links__link social-links__link--lg social-links__link--gplus"><i class="fab fa-google-plus-g"></i></a>
													</li>
												</ul>
											</div>
										</form>
										<!-- Login Form / End -->
				
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>
		<!-- Login/Register Tabs Modal / End -->

	</div>

	<!-- Javascript Files
	================================================== -->
	<!-- Core JS -->
	
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/jquery/jquery-migrate.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
	<script src="assets/js/core.js"></script>
	
	<!-- Vendor JS -->
	<script src="assets/vendor/twitter/jquery.twitter.js"></script>
	
	<!-- Template JS -->
	<script src="assets/js/init.js"></script>
	<script src="assets/js/custom.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>

		   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/index.js"></script>

		   

		    <script src="assets/js/overhang.min.js"></script>	 

</body>
</html>
