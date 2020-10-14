<!DOCTYPE html>
<html>
<head>
	<title> SignUp Page </title>
	 <link rel = "stylesheet" type="text/css" href="Form2.css">
</head>
<body>
	<?php 
	include("welcome.php"); 
	include_once 'connectiondemo.php';
	$uname=$_POST['email'];
	$pass=$_POST['password'];
	
	if(isset($_POST['signup_btn'])){
		$sql2 = "INSERT INTO signin VALUES(DEFAULT,'$uname','$pass')";
		pg_query($sql2);
		$res=pg_query("select * from signin where username= '$uname' AND password='$pass' LIMIT 1");
		$arr = pg_fetch_array($res, NULL, PGSQL_ASSOC);
		
		$x= $arr['userid'];
		echo $x;
		pg_query("INSERT INTO profile VALUES($x,NULL,NULL,NULL,NULL,NULL)" );
		echo"<h4>You have successfully created account</h4><br>";
	}
	?>
	 <a href="signin.php"> <h3> Click here to sign in</h3></a> 
	 
</body>
</html>