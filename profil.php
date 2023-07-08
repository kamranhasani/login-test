<?php
session_start();

     if(!isset($_COOKIE['time']) ){
  header("location:index.php");
exit;
	 }
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
if (isset($_SESSION['login'])){
						
                        echo $_SESSION['login']; 
                                                       
                       session_unset();
                    
                    }
                    ?>
</body>
</html>