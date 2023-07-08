<?php
require 'vendor/autoload.php';
require_once 'helper.php';
use Kamran\Login\class\User;

$register=new User();
$PDO=$register->DBconect();


if($PDO){

//-----START REGISTER

	if (isset($_POST['register'])){                                 
		if (chektoken($_POST['token'])) {                         
		if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['pwd']) && !empty($_POST['token'])  ) {
			$name=test_input($_POST['name']);                          
			$email=test_input($_POST['email']);
			$password=md5(test_input($_POST['pwd']));
			$token=test_input($_POST['token']);

			
		$ip=$_SERVER["REMOTE_ADDR"];
		$register->insertuser($name,$email,$password,$ip);
		if(!$register){

		$_SESSION['wrongform']='لطفا اطلاعات صحیح را وارد کنید';
		header("location:registeruser.php");
		exit();	
	}else{
		$_SESSION['sucss']='با موفقیت ثبت شد';
		header("location:registeruser.php");
	}
		
}	

else{                                                              //form check
if (empty($name)) {
	
	$errorsone = 'نام خود را وارد نمایید.';
}
if (empty($email)) {

	$errorstwo =  'آدرس ایمیل خود را وارد نمایید.';
}

if (empty($password)) {
	
	$errorsthree =  ' پسورد خود را وارد نمایید.';
}
$_SESSION['error']=array($errorsone,$errorstwo,$errorsthree);
header("location:registeruser.php");
		exit();
}
	}

}

//-----END REGISRET
	
//-----START LOGIN
	    if (isset($_POST['login'])){
		if (chektoken($_POST['token'])) {  //set token
		if (!empty($_POST['emaill']) && !empty($_POST['pwdl']) && !empty($_POST['token'])) {

		$emaillog=test_input($_POST['emaill']);
		$passwordlog=md5(test_input($_POST['pwdl']));

		$loginuser= $register->loginuser($emaillog , $passwordlog);
		if(!$loginuser){
		$_SESSION['filderror'] =  'ایمیل و پسورد صحیح را وارد کنید.';
		header("location:index.php");
		}  
		else
		{

		$timeuser=$ip.'123456789asdfghjklpoiuytrewq987456';		
		setcookie('time',$timeuser,time()+(10));
		$_SESSION['login'] =  ' wellcome.';
			header("location:profil.php");

			}

		}
	

	else
	{

	if (empty($emaillog) && empty($passwordlog)) {		
		$_SESSION['errorlogin']=  'لطفا فرم لاگین را کامل  پر کنید.';
	}
		header("location:index.php");
	
}
}
else{
header("location:index.php");
}

}	

//-----END LOGIN




if (isset($_POST['remember'])){
if (chektoken($_POST['token'])) {                             
if (!empty($_POST['emailsearch']) &&  !empty($_POST['token'])   ){

	$emailsearch=test_input($_POST['emailsearch']);
   $search=test_input($_POST['emailsearch']);

    $emailsearch= $register->emailsearch($emailsearch);
	if(!$emailsearch){

	$_SESSION['emailsearch'] =  'ایمیل  صحیح را وارد کنید.';
    header("location:remember.php");
}  
else
{
$tokenup=base64_encode( openssl_random_pseudo_bytes(32));
//$do="tokenup";
//$_SESSION['tokenactive']=$tokenup;

$active=$register->inserttoken($tokenup,$search);

$sendemail=email($search,$tokenup);
if($sendemail){

$_SESSION['active'] =  ' لینک فعال سازی برای شما ارسال شد.';
	header("location:remember.php");
}
	}

}


else
{

if (empty($emailsearch) ) {		
$_SESSION['erroremail']=  'لطفا فرم ایمیل را کامل  پر کنید.';
}
header("location:remember.php");

}
}
else{
header("location:remember.php");
}



}

	if(isset($_GET['do'])){
	$do=($_GET['do']);
	$_SESSION['do']=$do;
	$findtoken= $register->findtoken($do);
	if (!$findtoken) {    
		header("location:remember.php");
	                     
}	else{

	header("location:passchange.php");  
}

}



if (isset($_POST['change'])){
if (chektoken($_POST['token'])) {  //set token
	
	if (isset ($_SESSION['do'])){
		
		$ado=test_input($_SESSION['do']);
		if (!empty($_POST['pwdchange']) && !empty($_POST['token']) && !empty($ado) ) {
			$pwdchange=md5(test_input($_POST['pwdchange']));
			$uppassword= $register->uppassword($pwdchange,$ado);
			if(!$uppassword){
				header("location:passchange.php");

	}else{
		session_unset();
		session_destroy();
		header("location:index.php");
		} 

		}

		else
		{
			if (empty($pwdchange)) {		
				$_SESSION['errorpass']=  'لطفا پسورد را کامل  پر کنید.';
			
				header("location:passchange.php");
			}
		}
		
	}else{

		if (!isset ($_SESSION['do'])){
			$_SESSION['errordo']=  ' خطا در سیستم لطفا از اول شروع کنید .';
			header("location:passchange.php");
	}

}



	}

}

}



		?>