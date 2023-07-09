<?php
session_start();
     if(isset($_COOKIE['time']) ){
  header("location:profil.php");
exit;
	 }

$randomtoken = base64_encode( openssl_random_pseudo_bytes(32));
$_SESSION['token']=$randomtoken;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>فرم بازیابی رمز عبور  </title>
	<link type="text/css" href="css/bootstrap-rtl.min.css" rel="stylesheet">
	<link type="text/css" href="css/font-awesome.min.css" rel="stylesheet" />
	<link type="text/css" href="css/style.css" rel="stylesheet" />
</head>
<body dir="rtl">

	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3>فرم بازیابی رمز عبور</h3>
					<div class=" alert-danger">
				
					</div>
					
				</div>
				<div class="card-body">

				<?php
	if (isset($_SESSION['active'])){
						
		echo $_SESSION['active']; 
									   
	   session_unset();

   }
if (isset($_SESSION['emailsearch'])){
						
	echo $_SESSION['emailsearch']; 
								   
   session_unset();
}

					if (isset($_SESSION['erroremail'])){
						
				     	echo $_SESSION['erroremail']; 
														
						session_unset();

					}


				?>
				<br>

					<form   method="post"   action="RUN.php">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icon"><i class="fas fa-user"></i></span>
							</div>
							<input type="email" class="form-control" id="emailsearch" placeholder="ایمیل کاربری" name="emailsearch">
						</div>	
						
						<div class="input-group form-group">
							
							<input type="hidden" class="form-control"   name="token" id="token" value="<?php echo  $randomtoken; ?>"/>
						</div>
						

						<div class="form-group">
							<input type="submit" value="ثبت" class="btn float-right login_btn" name="remember">
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>

	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body><!-- This template has been downloaded from Webrubik.com -->
</html>
