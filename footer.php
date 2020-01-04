<style>
.yesil {
	color:#0C6;
}
.kirmizi {
	color:#F00;
}
</style>
<!-- NUEWIN FOOTER HEADING : START -->

<div class="page-heading">
	<div class="container">
		<div class="row">
			
			
			
			<div class="col-md-6 offset-md-3">
				<h1 class="page-heading__title">E-BÜLTEN<span class="highlight">SERVİSİ</span></h1>
				<ol class="page-heading__breadcrumb breadcrumb">
					<li class="breadcrumb-item">YENİ ÜRÜNLER VE İNDİRİMLERDEN HABERDAR OLUN</li>
				</ol>
				<form action="#" id="newsletter" class="inline-form">
					<div class="input-group">
						<input type="text" id="userEmail" name="userEmail" class="form-control" placeholder="E-Posta adresinizi ekleyin...">
						<span class="input-group-append">
							<button id="e-bulten" class="btn btn-lg btn-default" type="button">E-POSTA EKLE</button>
							<script>
$("#e-bulten").click(function(){
		
			var formData = {
                'userEmail': $('input[name=userEmail]').val()
             	
            };
			
			$.ajax({
			url: "e-bulten.php",
			type: "post",
			data:formData,
			success: function(result){
			  
			}});
		  });
		  
		  
		 
</script>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- NUEWIN FOOTER HEADING : STOP -->
<footer id="footer" class="footer">
<!-- NUEWIN FOOTER WIDGETS : START -->
	<div class="footer-widgets">
		<div class="footer-widgets__inner">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="footer-col-inner">
<!-- FOOTER COMPANY LOGO : START -->
							<div class="footer-logo footer-logo--has-txt">
								<a href="index.php">
									<img width="100" src="assets/images/soccer/logo.png" srcset="assets/images/soccer/logo@2x.png 2x" alt="DAFRON ONLINE" class="footer-logo__img">
									<div class="footer-logo__heading">
										<h5 class="footer-logo__txt">DAFRON ONLINE</h5>
										<span class="footer-logo__tagline">Prosport Spor Ürünleri Tic. Ltd. Şti.</span>
									</div>
								</a>
							</div>
<!-- FOOTER COMPANY LOGO : STOP -->
<!-- FOOTER INFO : START -->
							<div class="widget widget--footer widget-contact-info">
								<div class="widget__content">
									<div class="widget-contact-info__desc">
										<p>Kalite gücümüzden oluşan güven ile Müşterilerimizin memnuniyetini KAZANMAK* amacıyla oluşturduğumuz “DAFRON” markası altında beğeninize sunuyoruz.</p>
									</div>
									<div class="widget-contact-info__body info-block">
										<div class="info-block__item">
											<h6 class="info-block__heading">E-POSTA</h6>
											<a class="info-block__link" href="mailto:info@dafron.com">info@dafron.com</a><br>
										</div>
										<div class="info-block__item">
											<h6 class="info-block__heading">E-TİCARET</h6>
											<a class="info-block__link" href="mailto:eticaret@dafron.com">eticaret@dafron.com</a><br>
										</div>
										<div class="info-block__item">
											<h6 class="info-block__heading">TELEFON</h6>
											<a class="info-block__link" href="telephone:02122211012">0 (212) 221 10 12</a><br>
										</div><br>
										<div class="asd">
										<div class="row">
										<div class="info-block__item info-block__item--nopadding">
											<ul class="social-links">
												<li class="social-links__item ">
													<a href="#" class="social-links__link"><i class="fab fa-facebook-f"></i> Facebook</a>
												</li>
												<li class="social-links__item nuewin-twitter">
													<a href="#" class="social-links__link"><i class="fab fa-twitter"></i> Twitter</a>
												</li>
												<li class="social-links__item nuewin-google">
													<a href="#" class="social-links__link"><i class="fab fa-google-plus-g"></i> Google+</a>
												</li>
											</ul>
										</div>
										<div class="info-block__item info-block__item--nopadding">
											<ul class="social-links">
												<li class="social-links__item ">
													<a href="#" class="social-links__link"><i class="fab fa-instagram"></i> Instagram</a>
												</li>
												<li class="social-links__item nuewin-youtube">
													<a href="#" class="social-links__link"><i class="fab fa-youtube"></i> Youtube</a>
												</li>
												<li class="social-links__item nuewin-link">
													<a href="#" class="social-links__link"><i class="fab fa-linkedin-in"></i> Linkedin</a>
												</li>
											</ul>
										</div>
										</div>
										</div>
									</div>
								</div>
							</div>
<!-- FOOTER INFO : STOP -->
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="footer-col-inner">
<!-- FOOTER INFO CONTENT1 : START -->
							<div class="widget widget--footer widget-popular-posts">
								<div class="widget__content">
									<ul class="posts posts--simple-list">
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="#"><img width="70" src="assets/images/icons/footer-about-us.png" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">KURUMSAL</span>
												</div>
												<h6 class="posts__title posts__title--color-hover"><a href="staticpage.php">HAKKIMIZDA<br> MİSYON &amp; VİZYON<br> BİZ KİMİZ?</a></h6>
											</div>
										</li>
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="#"><img width="70" src="assets/images/icons/footer-support.png" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">DESTEK MERKEZİ</span>
												</div>
												<h6 class="posts__title posts__title--color-hover"><a href="sabitsayfa.php">İPTAL, İADE &amp; DEĞİŞİM<br> KARGO &amp; TESLİMAT<br> ÖDEME</a></h6>
											</div>
										</li>
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="#"><img width="70" src="assets/images/icons/footer-human-resources.png" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">İNSAN KAYNAKLARI</span>
												</div>
												<h6 class="posts__title posts__title--color-hover"><a href="#">PERSONEL İLANLARI<br> BAŞVURU FORMU<br> YÖNETİM POLİTİKAMIZ</a></h6>
											</div>
										</li>
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="#"><img width="70" src="assets/images/icons/footer-media-center.png" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">MEDYA MERKEZİ</span>
												</div>
												<h6 class="posts__title posts__title--color-hover"><a href="#">ARŞİV<br> FİRMA LOGOLARIMIZ<br> BLOG</a></h6>
											</div>
										</li>
										</ul>
									</div>
								<br>
							</div>
<!-- FOOTER INFO CONTENT1 : STOP -->
						</div>
					</div>
					<div class="clearfix visible-sm"></div>
					<div class="col-sm-6 col-md-3">
						<div class="footer-col-inner">
<!-- FOOTER INFO CONTENT2 : START -->
							<div class="widget widget--footer widget-featured-posts">
								<div class="widget__content">
									<ul class="posts posts--simple-list">
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="#"><img width="70" src="assets/images/icons/footer-brands.png" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">MARKALAR</span>
												</div>
												<h6 class="posts__title"><a href="#">KOLEKSİYON<br> KALİTE<br> KONFOR</a></h6>
											</div>
										</li>
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="#"><img width="70" src="assets/images/icons/footer-campaign.png" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">KAMPANYA</span>
												</div>
												<h6 class="posts__title"><a href="#">ÜCRETSİZ KARGO<br> SÜPER FIRSATLAR<br> İNDİRİM REYONU</a></h6>
											</div>
										</li>
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="#"><img width="70" src="assets/images/icons/footer-sport.png" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">SPOR BRANŞLARI</span>
												</div>
												<h6 class="posts__title"><a href="#">TEKSTİL ÜRÜNLERİ<br> EKİPMANLAR<br> YARDIMCI ÜRÜNLER</a></h6>
											</div>
										</li>
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="#"><img width="70" src="assets/images/icons/footer-outlet.png" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">OUTLET</span>
												</div>
												<h6 class="posts__title posts__title--color-hover"><a href="#">SEZON SONU<br> SERİSİ BİTMİŞ<br> TEK ÜRÜNLER</a></h6>
											</div>
										</li>
									</ul>
								</div>
							</div>
<!-- FOOTER INFO CONTENT2 : STOP -->
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="footer-col-inner">
<!-- FOOTER INFO CONTENT3 : START -->
							<div class="widget widget--footer widget-featured-posts">
								<div class="widget__content">
									<ul class="posts posts--simple-list">
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="#"><img width="70" src="assets/images/icons/footer-b2b-system.png" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">B2B SİSTEMİMİZ</span>
												</div>
												<h6 class="posts__title posts__title--color-hover"><a href="#">BAYİLİK HİZMETİMİZ<br> DROPSHIPING<br> SATIŞ ORTAKLIĞI</a></h6>
											</div>
										</li>
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="#"><img width="70" src="assets/images/icons/footer-b2b-portal.png" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">B2B PORTAL</span>
												</div>
												<h6 class="posts__title posts__title--color-hover"><a href="#">SPOR MAĞAZALARI<br> KURUMSAL SATIŞ<br> SOSYAL MEDYA DESTEĞİ</a></h6>
											</div>
										</li>
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="#"><img width="70" src="assets/images/icons/footer-contract.png" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">SÖZLEŞMELER</span>
												</div>
												<h6 class="posts__title posts__title--color-hover"><a href="sabitsayfa.php">ÜYELİK<br> GİZLİLİK<br> MESAFELİ SATIŞ</a></h6>
											</div>
										</li>
										<li class="posts__item posts__item--category-1">
											<figure class="posts__thumb">
												<a href="#"><img width="70" src="assets/images/icons/footer-contact.png" alt=""></a>
											</figure>
											<div class="posts__inner">
												<div class="posts__cat">
													<span class="label posts__cat-label">İLETİŞİM</span>
												</div>
												<h6 class="posts__title posts__title--color-hover"><a href="#">BİZE ULAŞIN<br> DİLEK, İSTEK &amp; ŞİKAYET<br> SATIŞ TAMAMLAMA</a></h6>
											</div>
										</li>
									</ul>
								</div>
							</div>
<!-- FOOTER INFO CONTENT3 : STOP -->
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-sm-3 col-md-3">
					</div>
					<div class="col-sm-9 col-md-9">
						<div class="footer-col-inner" style="">
							<div class="widget widget--footer widget-contact-info" style="">
								<div class="widget__content">
									<div class="widget-contact-info__desc">
										<div class="row">
												<div class="col-sm-3 col-md-3">
													<img src="assets/images/trolley1.png" alt="">					
												</div>
												<div class="col-sm-9 col-md-9" style="display: flex;justify-content: center;align-items: center;flex-direction: column;">
												<h1 class="page-heading__title" style="color:black;text-align: center;font-size: 20px;">Toplu Alımlarınıza Özel Teklifler </h1><br>
												<p style="text-align: center;">Okulunuza, kulübünüze ya da kendinize dafron.com’dan satın almak istediğiniz 2000 TL ve üzerindeki spor malzemeleri için özel teklif isteyebilirsiniz.</p>
												<a href="teklif_hakkinda.php" class="btn-teklif" style="border: 1px solid #1e2837;color: #1e2837;font-size: 14px;padding: 7px 15px;margin-top: 5px;display: inline-block;text-decoration: none;font-weight: 700;">TEKLİF AL</a></div>									
										</div>
									</div>					
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
<!-- FOOTERS PAYAMENT : START -->
		<div class="container">
			<div class="payment">
				<ul class="payment-logos">
					<li>
						<a href="#" target="_blank"><img width="100" src="assets/images/icons/advantagecard.jpg" alt=""></a>
					</li>
					<li>
						<a href="#" target="_blank"><img width="100" src="assets/images/icons/axesscard.jpg" alt=""></a>
					</li>
					<li>
						<a href="#" target="_blank"><img width="100" src="assets/images/icons/combocard.jpg" alt=""></a>
					</li>
					<li>
						<a href="#" target="_blank"><img width="100" src="assets/images/icons/bonuscard.jpg" alt=""></a>
					</li>
					<li>
						<a href="#" target="_blank"><img width="100" src="assets/images/icons/cardfinanscard.jpg" alt=""></a>
					</li>
					<li>
						<a href="#" target="_blank"><img width="100" src="assets/images/icons/maximumcard.jpg" alt=""></a>
					</li>
					<li>
						<a href="#" target="_blank"><img width="100" src="assets/images/icons/parafcard.jpg" alt=""></a>
					</li>
					<li>
						<a href="#" target="_blank"><img width="100" src="assets/images/icons/worldcard.jpg" alt=""></a>
					</li>
				</ul>
			</div>
		</div>
<!-- FOOTERS PAYAMENT : STOP -->
	</div>
<!-- NUEWIN FOOTER WIDGETS : STOP -->
<!-- FOOTER FINISH : START-->
	<div class="footer-secondary">
		<div class="container">
			<div class="footer-secondary__inner">
				<div class="row">
					<div class="col-md-4">
						<div class="footer-copyright"><a class="text-white" href="#">DAFRON ONLINE</a> 2019 &nbsp; | &nbsp; TÜM HAKLARI SAKLIDIR</div>
					</div>
					<div class="col-md-8">
						<ul class="footer-nav footer-nav--right footer-nav--condensed footer-nav--sm">
							<li class="footer-nav__item text-white"><a class="text-white" href="#">ANA SAYFA</a></li>
							<li class="footer-nav__item text-white"><a class="text-white"href="#">KURUMSAL</a></li>
							<li class="footer-nav__item text-white"><a class="text-white" href="#">BLOG</a></li>
							<li class="footer-nav__item text-white"><a class="text-white" href="#">KULLANIM KOŞULLARI</a></li>
							<li class="footer-nav__item text-white"><a class="text-white" href="#">DESTEK MERKEZİ</a></li>
							<li class="footer-nav__item text-white"><a class="text-white" href="#">İLETİŞİM</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- FOOTER FINISH : STOP-->
</footer>
<!-- SAĞ TIK ENGELLEME 
<script language="JavaScript">

<!--

document.oncontextmenu = function(){return false}

if(document.layers) {

window.captureEvents(Event.MOUSEDOWN);

window.onmousedown = function(e){

if(e.target==document)return false;

}

}

else {

document.onmousedown = function(){return false}

}

// -->

</script>
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
										
										<form action="register_kontrol.php" method="post"  class="modal-form">
											<h5>Şimdi Kayıt Zamanı</h5>
											<div class="form-group">
												<input type="email" pattern="[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*"  id="UserEmail" name="UserEmail" value="<?php if(isset($_POST['UserEmail'])) echo $_POST['UserEmail'] ?>" class="form-control" placeholder="Mail Adresinizi Giriniz..." required>
											<div id="hatabilgi"></div>


											</div>
											<div class="form-group">
												<input type="text" name="UserFirstName" pattern="^\p{L}+$+\s?^\p{L}+$" value="<?php if(isset($_POST['UserFirstName'])) echo $_POST['UserFirstName'] ?>" class="form-control" placeholder="Adınızı Giriniz..." required>
											</div>
											<div class="form-group">
												<input type="text" name="UserLastName" pattern="^\p{L}+$+\s?^\p{L}+$" value="<?php if(isset($_POST['UserLastName'])) echo $_POST['UserLastName'] ?>" class="form-control" placeholder="Soyadınızı Giriniz..." required>
											</div>
											<div class="form-group">
												<input type="text" id="UserPhone" name="UserPhone"  value="<?php if(isset($_POST['UserPhone'])) echo $_POST['UserPhone'] ?>" class="form-control " placeholder="Telefon Numarınızı Giriniz..." required>
											</div>
											<div class="form-group">
												<input type="password" name="UserPassword" value="<?php if(isset($_POST['UserPassword'])) echo $_POST['UserPassword'] ?>" class="form-control" placeholder="Şifrenizi Giriniz..." required>
											</div>
										
											<div class="form-group form-group--submit">
												<input type="submit" value="Üyelik Oluştur"  name="register" value="Register" class="btn btn-primary btn-block"/>
											</div>
											<div class="modal-form--note">
													Resmi ya da özel kurum üyeliği için lütfen <a href="kurumsal_uyelik.php">tıklayınız</a>.  </div>
										</form>
										<!-- Register Form / End -->
				
									</div>
							
									<div class="modal-account__item">										
										<!-- Login Form -->									
										<form  id="loginForm" class="well form-horizontal" action="login_kontrol.php" method="post">
											<h5>Giriş Yap</h5>
											<div class="form-group">
												<input type="email" id="email" name="UserEmail" value="<?php if(isset($_POST['UserEmail'])) echo $_POST['UserEmail'] ?>" autocomplete="off"
													   data-validation="required email" data-maxlength="100" maxlength="100"
													   data-required-message="Lütfen e-posta adresinizi girin." required tabindex="1" class="form-control" placeholder="Mail Adresinizi Giriniz...">
											</div>
											<div class="form-group">
												<input type="password" name="UserPassword" id="UserPassword" autocomplete="off" value="<?php if(isset($_POST['UserPassword'])) echo $_POST['UserPassword'] ?>"
														data-validation="required minlength maxlength" data-minlength="6" data-maxlength="15" required tabindex="2" class="form-control" placeholder="Şifrenizi Giriniz...">
											</div>
											<div class="form-group form-group--pass-reminder d-flex justify-content-between">
												<label class="checkbox checkbox-inline">
													<input type="checkbox" class="check" id="inlineCheckbox1" value="option1" checked=""> Beni hatırla
													<span class="checkbox-indicator"></span>
												</label>
												<a href="forget.php">Şifremi unuttum?</a>
											</div>
											<div class="form-group form-group--submit">
												<input id="loginButton" type="submit" name="login" value="Giriş Yap" class="btn btn-primary-inverse btn-block"/><br />
												<input type="hidden" id="returnUrl" name="returnUrl" value=""/>
											</div>
											<div class="modal-form--social">
												<h6>veya sosyal medya hesabınızla giriş yapın</h6>
												<ul class="social-links social-links--btn text-center">
													<li class="social-links__item">
														<a href="#" class="social-links__link social-links__link--lg social-links__link--fb d-flex justify-content-center align-items-center"><i class="fab fa-facebook-f"></i></a>
													</li>
													<li class="social-links__item">
														<a href="#" class="social-links__link social-links__link--lg social-links__link--twitter d-flex justify-content-center align-items-center"><i class="fab fa-twitter"></i></a>
													</li>
													<li class="social-links__item">
														<a href="#" class="social-links__link social-links__link--lg social-links__link--gplus d-flex justify-content-center align-items-center"><i class="fab fa-google-plus-g"></i></a>
													</li>
												</ul>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>
		<!-- Login/Register Tabs Modal / End -->

	</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js'></script>
<script>
 
$(":input").inputmask();

$("#UserPhone").inputmask({"mask": "(999) 999-9999"});
 
</script>

<style>
.yesil {
    color:#0C6;
}
.kirmizi {
    color:#F00;
}
</style>
<script>
(function($){
    $(document).on("keyup", "#UserEmail",function(){
        $.post( "./ajax.php", { isim: $(this).val() } )
            .done(function( data ) {
            $("#hatabilgi").html(data);
        });
    });
})(jQuery);
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
