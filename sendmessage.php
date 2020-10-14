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
	
	<form class="" action="sendmessage_submit.php" method="post">
		<div class="container">
		<label><h2> Send Message </h2> </label><br><br>
			<label> Send To:  </label>
			<input type="text" name="receiver" placeholder="<?php echo "email"?>"><br><br>
			<label><h3> <b>Write text:</b>  </h3> </label><br><br>
			<textarea rows="10" cols="60" name="status" > </textarea><br>
			<button type="submit" claas="btn" name="submit_message"> Send </button>
		</div>
	</form>
	
</body>

</html>
