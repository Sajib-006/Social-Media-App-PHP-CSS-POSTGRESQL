<?php 
		session_start();
		echo $_SESSION['usid'];
		
		
?>
<!DOCTYPE html>
<html>
<head>
	<title> SignIn Page </title>
	 <link rel = "stylesheet" type="text/css" href="Form2.css">
</head>
<body>
	<?php 
		
		include("welcome.php");
		
?>		
	<form class="" action="signin.php" method="post">
		<div class="container">
			<label><h3> SignIn</h3> </label><br><br>
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
	if(isset($uname)){
		
		$row=pg_query("select * from signin where username='$uname' AND password='$pass'  LIMIT 1 ");
		echo pg_num_rows($row), "<br>" , pg_affected_rows($row);
		if( pg_num_rows($row)>=1 )
		{
			echo"<h4>You have successfully logged in.</h4>";
			$res=pg_query("select * from signin where username= '$uname' AND password='$pass' LIMIT 1");
			$arr = pg_fetch_array($res, NULL, PGSQL_ASSOC);
			echo $_SESSION['usid']=$arr['userid'];
			echo'<a href="home.php"></h3>Go to home</h3></a>';
			
		}
		else
		{
			echo"<h4>You have entered incorrect User name or password.</h4>";
			exit();	
		}	
	}	
	
	
	?>
</body>

</html>
