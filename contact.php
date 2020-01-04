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
	<div class="site-content">
			<div class="container">
		
				<!-- Contact Area -->
				<div class="card">
					<header class="card__header">
						<h4>İletişim Formu</h4>
					</header>
					<div class="card__content">
		
						<div class="row">
							<div class="col-sm-6 col-xs-12 ">
								<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6021.280648324381!2d28.883749999999996!3d41.011245!3m2!1i1024!2i768!4f13.1!5e0!3m2!1str!2sus!4v1553891353164!5m2!1str!2sus" width="500" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
							</div>
							<div style="display: flex;justify-content: center;align-items: center;flex-direction: column;" class="col-sm-6 col-xs-12 ">
		    
								<!-- Contact Form -->
								<form action="contact_kontrol.php" method="post" class="contact-form">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="messageName">Adınız<span class="required">*</span></label>
												<input type="text" name="messageName" id="messageName" value="<?php if(isset($_POST['messageName'])) echo $_POST['messageName'] ?>" class="form-control" placeholder="Adınız...">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="messageEmail">Email <span class="required">*</span></label>
												<input type="email" name="messageEmail" id="messageEmail" value="<?php if(isset($_POST['messageEmail'])) echo $_POST['messageEmail'] ?>" class="form-control" placeholder="E-mail adresiniz...">
											</div>
										</div>
									
									</div>
									<div class="form-group">
										<label for="messageText">Mesajınız<span class="required">*</span></label>
										<textarea name="messageText" rows="5" class="form-control" value="<?php if(isset($_POST['messageText'])) echo $_POST['messageText'] ?>"placeholder="Mesajınız..."></textarea>
									</div>
									<div class="form-group form-group--submit">
										<button type="submit" class="btn btn-primary-inverse btn-lg btn-block">Gönder</button>
									</div>
								</form>
								<!-- Contact Form / End -->
							</div>
						</div>
		
					</div>
				</div>
				<!-- Contact Area / End -->
		
			</div>
		</div>	
	
	
	
	
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

</body>
</html>