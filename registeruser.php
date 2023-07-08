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
<title>فرم ثبت نام کاربری - register</title>
<link type="text/css" href="css/bootstrap-rtl.min.css" rel="stylesheet">
<link type="text/css" href="css/font-awesome.min.css" rel="stylesheet" />
<link type="text/css" href="css/style.css" rel="stylesheet" />
</head>
<body dir="rtl">

<div class="container">
<div class="d-flex justify-content-center h-100">
<div class="card">
<div class="card-header">
<h3>ورود</h3>
<div class=" alert-danger">


</div>

</div>

<div class="card-body">

<?php
if (isset($_SESSION['error'])){
	
    echo $_SESSION['error'][0]; 
	echo $_SESSION['error'][1];
	echo $_SESSION['error'][2];
		
	session_unset();

}
if (isset($_SESSION['wrongform'])){
	echo $_SESSION['wrongform']; 					
	session_unset();
	}

	if (isset($_SESSION['sucss'])){					
		echo $_SESSION['sucss']; 
		session_unset();

		}
?>
<form   method="post"  action="RUN.php"  auto compelet="off">

	<div class="input-group form-group">
		<div class="input-group-prepend">
			<span class="input-group-text input-icon"><i class="fas fa-user"></i></span>
		</div>
		<input type="text" class="form-control"  placeholder="نام کاربری" name="name" id="name">
	</div>

	<div class="input-group form-group">
		<div class="input-group-prepend">
			<span class="input-group-text input-icon"><i class="fas fa-user"></i></span>
		</div>
		<input type="email" class="form-control"  placeholder="ایمیل کاربری" name="email" id="email">
	</div>

	<div class="input-group form-group">
		<div class="input-group-prepend">
			<span class="input-group-text input-icon"><i class="fas fa-key"></i></span>
		</div>
		<input type="password" class="form-control"  placeholder="رمز عبور" name="pwd"  id="pwd"  >
	</div>

	<div class="input-group form-group">		
		<input type="hidden" class="form-control"   name="token" id="token" value="<?php echo  $randomtoken; ?>"/>
	</div>
	

	<div class="form-group">
		<input type="submit" value="ثبت نام" class="btn float-right login_btn" name="register" id="register" >
	</div>

</form>
<div class="card-footer">
					<div class="d-flex justify-content-center rights">
						<a href="index.php" style="text-decoration:none; color:red;"> login </a>
					</div>
</div>				
</div>
</div>
</div>

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

