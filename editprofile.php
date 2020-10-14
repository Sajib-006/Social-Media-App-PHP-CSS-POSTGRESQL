<!DOCTYPE html>
<html>
<head>
	<title> Edit Profile </title>
	 <link rel = "stylesheet" type="text/css" href="Form2.css">
</head>
<body>
	<?php
	
	session_start();
	include("header.php");
		//$_SESSION['usid']=$_GET['uid'];
		//echo "userid ", $usid;
		//echo gettype($_GET['uid']);
		echo $_SESSION['usid'], "<br>";
		//echo gettype($usid);
		$u=intval($_SESSION['usid']);
		?>
	
	<form class="" action="profile.php" method="post">
		<div class="container">
			<label><h2> Edit Profile </h2> </label><br><br>
			<label> User Name:  </label>
			<input type="text" name="email"><br><br>
			<label> Occupation:  </label>
			<input type="text" name="occ" ><br><br>
			<label> Work place:  </label>
			<input type="text" name="wp" ><br><br>
			<label> Birth date:  </label>
			<input type="text" name="bd" ><br><br>
			<label> Gender:  </label>
			<input type="radio" name="gender" value="male"> Male<br>
			<input type="radio" name="gender" value="female"> Female<br>
			<input type="radio" name="gender" value="other"> Other<br>
			
			<button type="submit" claas="btn" name="log"> Submit </button>
		</div>
	</form>
	
</body>

</html>
