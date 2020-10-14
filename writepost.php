<!DOCTYPE html>
<html>
<head>
	<title> Write post </title>
	 <link rel = "stylesheet" type="text/css" href="Form2.css">
</head>
<body>
	<?php
	
	
	include("header.php");
		
		echo $_SESSION['usid'], "<br>";
		$u=intval($_SESSION['usid']);
		?>
	
	<form class="" action="writepost_submit.php" method="post">
		<div class="container">
			<label><h3> What's on your mind? </h3> </label><br><br>
			<textarea rows="10" cols="60" name="status" > </textarea><br>
			<button type="submit" claas="btn" name="submit_post"> Submit </button>
		</div>
	</form>
	
</body>

</html>
