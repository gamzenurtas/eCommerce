<?php
	require 'config.php';

	if(isset($_POST['login'])) {
		$errMsg = '';
		$errMsg2 = '';

		// Get data from FORM
		$UserEmail = $_POST['UserEmail'];
		$UserPassword = $_POST['UserPassword'];

		if($UserEmail == '')
			$errMsg = 'Enter email';
		if($UserPassword == '')
			$errMsg = 'Enter password';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT * FROM customers WHERE UserEmail = :UserEmail');
				$stmt->execute(array(
					':UserEmail' => $UserEmail
					));
					$stmt1 = $connect->prepare('SELECT * FROM customers WHERE UserPassword = :UserPassword');
				
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
								$data1 = $stmt1->fetch(PDO::FETCH_ASSOC);

				if($data == false){
					$errMsg =  "<script>
$('body').overhang({
  type: 'error',
  message: 'Bu Mail Hatalı!!',
    duration: 5,

  closeConfirm: true
});</script>";
					require 'index.php';
						echo $errMsg;

				}
				elseif($data['UserPassword'] != md5($_POST['UserPassword'])){
					
$errMsg1 =  "<script>
$('body').overhang({
  type: 'error',
  message: 'Bu Şifre Hatalı!!',
      duration: 5,

  closeConfirm: true
});</script>";					require 'index.php';
						echo $errMsg1;
					
					
				}
				
				else {
				//	<!--if($password == $data['password']) {  -->
						$errMsg2 =  "<script>
$('body').overhang({
  type: 'success',
  message: 'Başarıyla giriş yaptınız.',
  duration: 3,
});</script>";					

						$_SESSION['UserID'] = $data['UserID'];
						$_SESSION['UserEmail'] = $data['UserEmail'];
						$_SESSION['UserPassword'] = $data['UserPassword'];
						$_SESSION['UserFirstName'] = $data['UserFirstName'];
						$_SESSION['UserLastName'] = $data['UserLastName'];
						

						require 'index.php';
						echo $errMsg2;

						


				//	}
					
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>
<link href="../4mynot4give/assets/css/overhang.min.css" rel="stylesheet">



    		   		       <script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>

		   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../4mynot4give/assets/js/index.js"></script>

		   

		    <script src="../4mynot4give/assets/js/overhang.min.js"></script>
