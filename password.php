
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>فرم بازیابی رمز عبور - remember password </title>
	<link type="text/css" href="css/bootstrap-rtl.min.css" rel="stylesheet">
	<link type="text/css" href="css/font-awesome.min.css" rel="stylesheet" />
	<link type="text/css" href="css/style.css" rel="stylesheet" />
</head>
<body dir="rtl">

	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3>رمز عبورجدید</h3>
					<div class=" alert-danger">
				
					</div>
					<div class="d-flex justify-content-end social_icon">
						<span><i class="fab fa-facebook-square"></i></span>
						<span><i class="fab fa-google-plus-square"></i></span>
						<span><i class="fab fa-twitter-square"></i></span>
					</div>
				</div>
				<div class="card-body">
					<form   method="post"   action="php/exe.php">
						<div class="input-group form-group">
							<div class="input-group-prepend">
							<span class="input-group-text input-icon"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" id="pass" placeholder="پسورد" name="pass">
						</div>	
						
						<div class="input-group form-group">
							
							<input type="hidden" class="form-control" id="txt-password"  name="token" id="token" value=""/>
						</div>
						

						<div class="form-group">
							<input type="submit" value="ثبت" class="btn float-right login_btn" name="rempass">
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
