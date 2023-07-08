<?php
namespace Kamran\Login\class;

Abstract class Loginuser{

private  $dbname="login";
private $hostname="localhost";
private $username="root";
private $password="";
private $connect;

public  function DBconect(){

try{
$this->connect= new \PDO("mysql:host=$this->hostname;dbname=$this->dbname",$this->username,$this->password);
$this->connect->exec("SET CHARACTER SET utf8");
$this->connect->exec('set names utf8');

return $this->connect ;

}catch(PDOException $error){
	return 'error';
}
}

public function insertuser($name,$email,$password,$ip){

	$sqli=$this->connect->prepare("INSERT INTO `login`(`id`, `name`, `email`, `password`, `ip`)VALUES(NULL,?,?,?,?)");
	$sqli->bindvalue(1 ,$name);
	$sqli->bindvalue(2 ,$email);
	$sqli->bindvalue(3 ,$password);
	$sqli->bindvalue(4 ,$ip);
	$sqli->execute();
	return $sqli;
	
}


public function loginuser($emaill,$passwordl){

	$sqli=$this->connect->prepare("SELECT * FROM `login` WHERE email =? AND password=?");
	$sqli->bindvalue(1,$emaill);
	$sqli->bindvalue(2,$passwordl);
	$sqli->execute();
	if ($sqli->rowcount()>=1) {
		return $sqli;
	}

         return false;
	
}


public function emailsearch($emailuser){

	$sqliemail=$this->connect->prepare("SELECT * FROM `login` WHERE email =? ");
	$sqliemail->bindvalue(1,$emailuser);
	$sqliemail->execute();
	if ($sqliemail->rowcount()>=1){
		return $sqliemail;
	} 
	return false;
	
}

public function inserttoken($token,$Temail){

	$sql=$this->connect->prepare("UPDATE `login` SET `token`=? WHERE email=? LIMIT 1");
	$sql->bindValue(1,$token);
	$sql->bindValue(2,$Temail);
	$sql->execute();
	return $sql;
}


public function findtoken($find){

	$sqltoken=$this->connect->prepare("SELECT * FROM `login` WHERE token =? ");
	$sqltoken->bindvalue(1,$find);
	$sqltoken->execute();
	if ($sqltoken->rowcount()>=1) {
		return $sqltoken;
	}
	return $false;
	
}

public function uppassword($pass,$ado){

	$sql=$this->connect->prepare("UPDATE `login` SET `password`=? WHERE token =? LIMIT 1");
	$sql->bindValue(1,$pass);
	$sql->bindValue(2,$ado);
	$sql->execute();
	return $sql;
}






}
?>