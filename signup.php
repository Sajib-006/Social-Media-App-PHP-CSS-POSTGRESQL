<!DOCTYPE html>
<html>
<head>
	<title> SignUp Page </title>
	 <link rel = "stylesheet" type="text/css" href="Form2.css">
</head>
<body>
	<?php include("welcome.php"); ?>	
	<form class="" action="gotosignin.php" method="post">
		<div class="container">
			<label><h2> SignUp </h2></label><br><br>
			<label> User Name:  </label>
			<input type="text" name="email"><br><br>
			<label> Password:  </label>
			<input type="password" name="password" ><br><br>
			
			<button type="submit" claas="btn" name="signup_btn"> Submit </button>
		</div>
	</form>
	
</body>

</html>
