<!DOCTYPE html>
<html>
<head>
	<title> Login Page </title>
</head>
<body>
		
	<form class="" action="logindemo.php" method="post">
		<div class="container">
			<label> SignUp </label><br><br>
			<label> User Name:  </label>
			<input type="text" name="email"><br><br>
			<label> Password:  </label>
			<input type="password" name="password" ><br><br>
			
			<button type="submit" claas="btn" name="log"> Login </button>
		</div>
	</form>
	<?php
	include_once 'connectiondemo.php';
	$uname=$_POST['email'];
	$pass=$_POST['password'];
	//$sql = sql_query("select * from exm 
	//$sql = 'INSERT INTO "exm" VALUES(2,219)';
	//$sql3='INSERT INTO "reply" VALUES(12,13)';
	//pg_query($sql3);
	if(isset($uname)){
	$sql2 = "INSERT INTO signin VALUES(DEFAULT,' ".$uname." ',' ".$pass." ')";
	//pg_query($sql);
	pg_query($sql2);
	echo"You have successfully created account";
	}
	//$sql4="INSERT INTO pxm VALUES('12','13')";
	//pg_query($sql4);
	?>
</body>

</html>
